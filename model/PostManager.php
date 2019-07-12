<?php

require_once('Manager.php');

class PostManager extends Manager {

    private $database;

    public function __construct()
    {
        $this->database = $this->dbconnect();
    }

    public function getPosts () {

        $request =$this->database ->query('SELECT id, chapter, title, content, DATE_FORMAT(publication, "%d/%m/%Y à %Hh%imin%ss") AS date_creation FROM posts ORDER BY publication DESC ');

        return $request;
    }

    public function getPost ($postId) {

        $request = $this->database->prepare('SELECT id, chapter, title, content, date_format(publication, "%d/%m/%Y à %Hh%imin%ss") AS date_creation  FROM posts WHERE id=?');

        $request->execute(array($postId));

        $post = $request->fetch();

        return $post;
    }

    public function addPost ($chapter,$title, $content) {

        $request = $this->database->prepare('INSERT INTO posts (chapter, title, content, publication) VALUES (?,?,?,NOW())');

        $new_chapter =$request->execute(array($chapter,$title, $content));

        return $new_chapter;

    }

    public function modifyPost ( $title, $content, $postId) {

        $request = $this->database->prepare('UPDATE posts SET title=:title, content=:content WHERE id=:id');

        $request->execute(array(
            ':title' => $title,
            ':content' => $content,
            ':id' => $postId,
        ));

        return true;
    }

    public function removePost ($postId) {

        $comment = $this->database->prepare('DELETE FROM comments WHERE post_id=?');

        $comment->execute([$postId]);

        $request = $this->database->prepare('DELETE FROM posts WHERE id=? LIMIT 1');

        $request->execute(array($postId));

        $delete = $request->rowCount();

        return $delete;
    }



}
