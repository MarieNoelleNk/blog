<?php

require_once 'model/PostModel.php';
require_once 'model/CommentModel.php';
require_once 'view/View.php';

class PostCtrl
{
    private $post;
    private $comments;


    public function __construct()
    {
        $this->post= new PostModel();
        $this->comments = new CommentModel();
    }

    public function showPost($postId)
    {
        $post = $this->post->getPost($postId);
        $comments = $this->comments->getComments($postId);
        $view = new View('post');
        $view->generate(array('post'=>$post, 'comments'=>$comments));
    }
}