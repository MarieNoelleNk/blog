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

                switch ($_GET['action']){

                    case 'post':

                        if(isset($_GET['id'])&& $_GET['id']>0){

                            $this->userCtrl->showSinglePost($_GET['id']);
                        }
                        else{
                            throw new Exception('Identifiant de chapitre non valide');
                        }

                        break;

                    case 'login':

                        if (isset($_POST['login']) && isset($_POST['password'])) {

                            $this->userCtrl->connectAsAdmin($_POST['login'],$_POST['password']);

                        } else {
                            throw new Exception('Identifiants non conformes');
                        }

                        break;

                    case 'editPost':

                        if(isset($_GET['id'])&& $_GET['id']>0){

                            $this->adminCtrl->readPost($_GET['id']);
                        }
                        else{
                            throw new Exception('Identifiant de chapitre non valide');
                        }

                        break;

                    case 'adminPost':

                        $this->adminCtrl->readAllPosts();

                        break;

                    case 'addPost';

                        if (!empty($_POST['title']) && !empty($_POST['content'])) {

                            $this->adminCtrl->createPost($_POST['title'],$_POST['content']);
                        } else {
                            throw new Exception('Remplissez tous les champs du chapitre:(');
                        }

                        break;

                    case 'modifyPost':

                        if (!empty($_GET['id']) && $_GET['id'] > 0) {

                            if (!empty($_POST['title']) && !empty($_POST['content'])) {

                                $this->adminCtrl->updatePost($_POST['title'], $_POST['content'],$_GET['id']);
                            }else{
                                throw new Exception('Remplissez tous les champs de ce chapitre:(');
                            }
                        } else {
                            throw new Exception('cette mise à jour ne peut aboutir :(');
                        }

                        break;

                    case 'deletePost':

                        if (!empty($_GET['id']) && $_GET['id'] > 0) {

                            $this->adminCtrl->deletePost($_GET['id']);
                        } else {
                            throw new Exception('identifiant non conforme pour la suppression :(');
                        }

                        break;

                    case 'makeComment':

                        if (isset($_GET['id']) && $_GET['id'] > 0) {

                            if (!empty($_POST['author']) && !empty($_POST['comments'])) {

                                $this->userCtrl->createComment($_GET['id'], $_POST['author'], $_POST['comments']);
                            } else {
                                throw new Exception('Remplissez tous les champs de ce commentaire');
                            }

                        } else {
                            throw new Exception('Identifiant de com non valide');

                        }

                        break;

                    case 'signalComment':

                        if (isset($_GET['id']) && $_GET['id'] > 0) {

                            if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0) {

                                $this->userCtrl->signalComment($_GET['id'], $_GET['chapterId'] );
                            } else {
                                throw new Exception('Ce chapitre ne correspond pas');
                            }

                        } else {
                            throw new Exception('Le signalement ne peut être effectué');

                        }

                        break;

                    case 'showComment':

                        $this->adminCtrl->showAllComments();

                        break;

                    case 'singleComment':

                        if (isset($_GET['id']) && $_GET['id'] > 0) {

                            $this->adminCtrl->readComment($_GET['id']);
                        } else {
                            throw new Exception('Identifiant de com non valide');

                        }

                        break;

                    case 'approveComment':

                        if (!empty($_GET['id']) && $_GET['id'] > 0) {

                            $this->adminCtrl->validateComment($_GET['id']);

                        } else {
                            throw new Exception('identifiant non conforme pour la validation :(');
                        }

                        break;

                    default:

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