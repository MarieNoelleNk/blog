<?php

require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/AdminManager.php';

class UserController
{
    private $post;
    private $comment;
    private $admin;


    public function __construct ()
    {
        $this->post = new PostManager();
        $this->comment = new CommentManager();
        $this->admin = new AdminManager();
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


    public function signalComment($id, $postId)
    {
        $signal = $this->comment->reportComment($id);

        if($signal){
            header('Location: index.php?action=post&id='.$postId);
            echo 'votre commentaire est signalé';
        }else{
            echo 'pas de signalement effectué';
        }
    }

    public function goToConnect(){
        require'view/frontend/loginView.php';
    }

    function connectAsAdmin($login,$password)
    {
        $adminInfo = $this->admin->checkLogin($login,$password);

        if ($adminInfo) {

            $_SESSION['admin'] = true;
            $_SESSION['login'] = $adminInfo['login'];
            header('Location: index.php?action=adminPost');
        } else {
            header('Location:index.php?action=connection');
            echo 'Identifiants incorrects!';
        }

    }
}