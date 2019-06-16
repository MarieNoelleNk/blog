<?php

require_once ('Model.php');

class PostModel extends Model {

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

}

