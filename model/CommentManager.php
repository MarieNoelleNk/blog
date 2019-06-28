<?php

require_once('Manager.php');

class CommentManager extends Manager {

    public function getComments ($postId) {

        $database = $this->dbconnect();

        $comments= $database->prepare('SELECT id, post_id, author, comments, date_format(publication, "%d/%m/%Y à  %Hh%imin%ss")AS date_creation,report_comment FROM comments WHERE post_id =? ORDER BY publication DESC');

        $comments->execute(array($postId));

        return $comments;
    }

    public function getAllComments () {

        $database = $this->dbconnect();

        $comments= $database->query('SELECT id, post_id, author, comments, date_format(publication, "%d/%m/%Y à  %Hh%imin%ss")AS date_creation,report_comment FROM comments ORDER BY report_comment DESC');

        return $comments;
    }

    public function addComment($postId, $author, $comment){

        $database = $this->dbconnect();

        $new_comment = $database->prepare('INSERT INTO comments (post_id,author,comments,publication) VALUES (?, ?,?,NOW())');
        $new_comment->execute(array($postId, $author, $comment));

        return $new_comment;
    }

    public function reportComment($id)
    {
        $database = $this-> dbConnect();

        $request = $database->prepare('UPDATE comments SET report_comment = 1 WHERE id = ?');

        $request->execute(array($id));

        $signal = $request->rowCount();

        return $signal;
    }

    public function getReportedComments()
    {
        $database = $this->dbConnect();

        $comments = $database->query('SELECT id, post_id, author, comments, date_format(publication, "%d/%m/%Y à  %Hh%imin%ss")AS date_creation FROM comments INNER JOIN posts ON posts.id = comments.post_id WHERE report_comment =1 ORDER BY date_creation DESC');

        return $comments;

    }

    public function deleteComment($id){

        $database = $this->dbconnect();

        $comment = $database->prepare('DELETE FROM comments WHERE id = ?');

        $comment->execute(array($id));

        return $comment;

    }

    public function approveComment($id)
    {
        $database = $this->dbConnect();

        $request = $database->prepare('UPDATE comments SET report_comment = 0 WHERE id = ?');

        $request->execute(array($id));

        $signal = $request->rowCount();

        return $signal;
    }


}