<?php

require_once ('Model.php');

class CommentModel extends Model {

    public function getComments ($postId) {

        $database = $this->dbconnect();

        $comments= $database->prepare('SELECT id, post_id, author, comments, date_format(publication, "%d/%m/%Y à  %Hh%imin%ss")AS date_creation FROM comments WHERE post_id =? ORDER BY publication DESC');

        $comments->execute(array($postId));

        return $comments;
    }

    public function addComment($postId, $author, $comment){

        $database = $this->dbconnect();

        $new_comment = $database->prepare('INSERT INTO comments (post_id,author,comments,publication) VALUES (?, ?,?,NOW())');
        $new_comment->execute(array($postId, $author, $comment));

        return $new_comment;
    }

}