<?php

require_once('Manager.php');

class PostManager extends Manager {

    public function getPosts () {

        $database = $this->dbconnect();

        $request = $database->query('SELECT id, title, content, DATE_FORMAT(publication, "%d/%m/%Y à %Hh%imin%ss") AS date_creation FROM posts ORDER BY publication DESC ');

        return $request;
    }

    public function getPost ($postId) {

        $database = $this->dbconnect();

        $request = $database->prepare('SELECT id, title, content, date_format(publication, "%d/%m/%Y à %Hh%imin%ss") AS date_creation  FROM posts WHERE id=?');

        $request->execute(array($postId));
        $post = $request->fetch();

        return $post;
    }

    public function addPost ($title, $content) {

        $database = $this->dbconnect();

        $request = $database->prepare('INSERT INTO posts (title, content, publication) VALUES (:title,:content,NOW())');

        $request->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $request->bindValue(':content', $_POST['content'], PDO::PARAM_STR);

        $request->execute(array($title, $content));

        $post = $request->fetch();

        return $post;
    }

    public function modifyPost ($postId, $title, $content) {

        $database = $this->dbconnect();

        $request = $database->prepare('UPDATE posts SET title=:title, content=:content WHERE id=:id');

        $request->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $request->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $request->bindValue(':content', $_POST['content'], PDO::PARAM_STR);

        $request->execute(array($postId,$title,$content));

        $post = $request->fetch();

        return $post;
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

