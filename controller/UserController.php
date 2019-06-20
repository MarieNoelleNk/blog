<?php

require_once 'model/PostModel.php';
require_once 'model/CommentModel.php';
require_once 'model/AdminModel.php';

class UserController
{
    private $post;
    private $comment;
    private $admin;


    public function __construct ()
    {
        $this->post = new PostModel();
        $this->comment = new CommentModel();
        $this->admin = new AdminModel();
    }

    public function showPosts()
    {
        $posts = $this-> post -> getPosts();

        require('view/frontend/homeView.php');

    }

    public function showSinglePost($postId)
    {
        $post = $this-> post -> getPost($postId);
        $comments = $this->comment->getComments($postId);

        require 'view/frontend/postView.php';

    }

    public function createComment($postId,$author,$comments)
    {
        $comment = $this->comment->addComment($postId,$author,$comments);

        if ($comment){
            header('Location: index.php?action=post&id='.$postId);
        }else{
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }

    }

    public function viewSingleComment($id)
    {
        $comments = $this->comment->getComment($id);

        include 'view/commentView.php';

    }

    public function signalComment($id)
    {
        $signal = $this->comment->reportComment($id);

        if($signal>0){
            echo 'votre commentaire est signalé';
        }else{
            echo 'pas de signalement effectué';
        }

        //include 'view/commentView.php';

    }

    function connectAsAdmin($login,$password)
    {
        $adminInfo = $this->admin->checkLogin($login,$password);

        if ($adminInfo) {

            $_SESSION['admin'] = true;
            $_SESSION['login'] = $adminInfo['login'];
            echo 'Vous êtes à présent connectés';
            header('Location: index.php?action=adminPost');
        } else {
            echo 'Identifiants incorrects';
            include 'index.php';
        }
    }
}