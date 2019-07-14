<?php

require_once('Manager.php');

class CommentManager extends Manager {

    private $database;

    public function __construct()
    {
        $this->database = $this->dbconnect();

    }

    public function getComment($id){

        $comment = $this->database->prepare('SELECT id, post_id, author, comments, date_format(publication, "%d/%m/%Y à  %Hh%imin%ss")AS date_creation FROM comments WHERE id =? ');

        $comment->execute(array($id));

        $singleComment = $comment->fetch();

        return $singleComment;

    }

    public function getComments ($postId) {

        $comments= $this->database->prepare('SELECT id, post_id, author, comments, date_format(publication, "%d/%m/%Y à  %Hh%imin%ss")AS date_creation,report_comment FROM comments WHERE post_id =? ORDER BY publication DESC');

        $comments->execute(array($postId));

        return $comments;
    }

    public function getAllComments () {

        $comments= $this->database->query('SELECT id, post_id, chapter, author, comments, date_format(publication, "%d/%m/%Y à  %Hh%imin%ss")AS date_creation,report_comment FROM comments ORDER BY report_comment DESC');

        return $comments;
    }

    public function addComment($postId,$chapter, $author, $comment){

        $new_comment = $this->database->prepare('INSERT INTO comments (post_id,chapter, author,comments,publication) VALUES (?,?, ?,?,NOW())');
        $new_comment->execute(array($postId,$chapter, $author, $comment));

        return $new_comment;
    }

    public function reportComment($id)
    {
        $request = $this->database->prepare('UPDATE comments SET report_comment = 1 WHERE id = ?');

        $request->execute(array($id));

        $signal = $request->rowCount();

        return $signal;
    }

    public function getReportedComments()
    {
        $comments = $this->database->query('SELECT id, post_id, author, comments, date_format(publication, "%d/%m/%Y à  %Hh%imin%ss")AS date_creation FROM comments INNER JOIN posts ON posts.id = comments.post_id WHERE report_comment =1 ORDER BY date_creation DESC');

        return $comments;

    }

    public function deleteComment($id){

        $comment = $this->database->prepare('DELETE FROM comments WHERE id = ?');

        $comment->execute(array($id));

        return $comment;

    }

    public function approveComment($id)
    {
        $request = $this->database->prepare('UPDATE comments SET report_comment = 0 WHERE id = ?');

        $request->execute(array($id));

        $signal = $request->rowCount();

        return $signal;
    }

}