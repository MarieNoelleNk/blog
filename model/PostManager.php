<?php

require_once('Manager.php');

class PostManager extends Manager {

    public function getPosts () {

        $database = $this->dbconnect();

        $request = $database->query('SELECT id, chapter, title, content, DATE_FORMAT(publication, "%d/%m/%Y à %Hh%imin%ss") AS date_creation FROM posts ORDER BY publication DESC ');

        return $request;
    }

    public function getPost ($postId) {

        $database = $this->dbconnect();

        $request = $database->prepare('SELECT id, chapter, title, content, date_format(publication, "%d/%m/%Y à %Hh%imin%ss") AS date_creation  FROM posts WHERE id=?');

        $request->execute(array($postId));

        $post = $request->fetch();

        return $post;
    }

    public function addPost ($chapter,$title, $content) {

        $database = $this->dbconnect();

        $request = $database->prepare('INSERT INTO posts (chapter, title, content, publication) VALUES (?,?,?,NOW())');

        $new_chapter =$request->execute(array($chapter,$title, $content));

        return $new_chapter;

    }

    public function modifyPost ( $title, $content, $postId) {

        $database = $this->dbconnect();

        $request = $database->prepare('UPDATE posts SET title=:title, content=:content WHERE id=:id');

        $request->execute(array(
            ':title' => $title,
            ':content' => $content,
            ':id' => $postId,
        ));

        return true;
    }

    public function removePost ($postId) {

        $database = $this->dbconnect();

        $comment = $database->prepare('DELETE FROM comments WHERE post_id=?');

        $comment->execute([$postId]);

        $request = $database->prepare('DELETE FROM posts WHERE id=? LIMIT 1');

        $request->execute(array($postId));

        $delete = $request->rowCount();

        return $delete;
    }



}
