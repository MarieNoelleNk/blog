<?php

require_once 'controller/UserController.php';
require_once 'controller/AdminController.php';

class Router
{
    private $adminCtrl;
    private $userCtrl;

    public function __construct()
    {
        $this->adminCtrl = new AdminController();
        $this->userCtrl = new UserController();
    }


    public function routerRequest() {
        try{
            if (isset($_GET['action'])){

                if($_GET['action'] == 'post'){

                    if(isset($_GET['id'])&& $_GET['id']>0){

                        $this->userCtrl->showSinglePost($_GET['id']);
                    }
                    else{
                        throw new Exception('Identifiant de chapitre non valide');
                    }

                }elseif($_GET['action'] == 'login') {

                    if (isset($_POST['login']) && isset($_POST['password'])) {

                        $this->userCtrl->connectAsAdmin($_POST['login'],$_POST['password']);

                    } else {
                        throw new Exception('Identifiants non conformes');
                    }

                }elseif ($_GET['action'] == 'editPost'){

                    if(isset($_GET['id'])&& $_GET['id']>0){

                        $this->adminCtrl->readPost($_GET['id']);
                    }
                    else{
                        throw new Exception('Identifiant de chapitre non valide');
                    }

                }elseif($_GET['action'] == 'adminPost') {
                    $this->adminCtrl->readAllPosts();

                }elseif($_GET['action'] == 'addPost') {

                    if (!empty($_POST['title']) && !empty($_POST['content'])) {

                        $this->adminCtrl->createPost($_POST['title'],$_POST['content']);
                    } else {
                        throw new Exception('Remplissez tous les champs du chapitre:(');
                    }

                }elseif($_GET['action'] == 'modifyPost') {

                    if (!empty($_GET['id']) && $_GET['id'] > 0) {

                        if (!empty($_POST['title']) && !empty($_POST['content'])) {

                            $this->adminCtrl->updatePost($_POST['title'], $_POST['content'],$_GET['id']);
                        }else{
                            throw new Exception('Remplissez tous les champs de ce chapitre:(');
                        }
                    } else {
                        throw new Exception('cette mise à jour ne peut aboutir :(');
                    }

                }elseif($_GET['action'] == 'deletePost') {

                    if (!empty($_GET['id']) && $_GET['id'] > 0) {

                        $this->adminCtrl->deletePost($_GET['id']);
                    } else {
                        throw new Exception('identifiant non conforme pour la suppression :(');
                    }

                }elseif($_GET['action'] == 'makeComment') {

                    if (isset($_GET['id']) && $_GET['id'] > 0) {

                        if (!empty($_POST['author']) && !empty($_POST['comments'])) {

                            $this->userCtrl->createComment($_GET['id'], $_POST['author'], $_POST['comments']);
                        } else {
                            throw new Exception('Remplissez tous les champs de ce commentaire');
                        }

                    } else {
                        throw new Exception('Identifiant de com non valide');

                    }
                }elseif($_GET['action'] == 'signalComment') {

                    if (isset($_GET['id']) && $_GET['id'] > 0) {

                        $this->userCtrl->signalComment($_GET['id']);

                    } else {
                        throw new Exception('Le signalement ne peut être effectué');

                    }
                }elseif($_GET['action'] == 'approveComment') {

                    if (!empty($_GET['id']) && $_GET['id'] > 0) {
                        $this->adminCtrl->validateComment($_GET['id']);
                    } else {
                        throw new Exception('identifiant non conforme pour la validation :(');
                    }

                }
                else{
                    throw new Exception('Action non valide');
                }
            } else {
                $this->userCtrl->showPosts();
            }
        } catch( Exception $e){

            echo 'Erreur: '.$e->getMessage();

        }
    }
}