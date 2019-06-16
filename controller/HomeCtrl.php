<?php

require_once 'model/PostModel.php';
require_once 'view/View.php';

class HomeCtrl
{
    private $post;


    public function __construct ()
    {
        $this->post = new PostModel();
    }

    public function loadHome()
    {
        $posts = $this-> post -> getPosts();
        $view = new View('home');
        $view->generate(array('posts'=> $posts));
    }
}