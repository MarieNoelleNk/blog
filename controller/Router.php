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

                    /**********************  ACTIONS FRONTEND   ***************************/

                    //lire un chapitre et ses commentaires

                    case 'post':

                        if(isset($_GET['id'])&& $_GET['id']>0){

                            $this->userCtrl->showSinglePost($_GET['id']);
                        }
                        else{
                            throw new Exception('Identifiant de chapitre non valide');
                        }

                        break;

                    //Ajouter un commentaire

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

                    //Signaler un commentaire

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

                    case 'connection':

                        $this->userCtrl->goToConnect();
                        break;

                    //Se connecter en tant qu'administrateur

                    case 'login':

                        if (isset($_POST['login']) && isset($_POST['password'])) {

                            $this->userCtrl->connectAsAdmin($_POST['login'],$_POST['password']);

                        } else {
                            throw new Exception('Identifiants non conformes');
                        }

                        break;

                    /*********************************  ACTIONS BACKEND  *********************************/

                    //afficher l'interface

                    case 'adminPost':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

                            $this->adminCtrl->readAllPosts();

                        }else{

                            $this->userCtrl->redirectForConnexion();
                        }

                        break;

                    // Afficher l'éditeur de texte

                    case 'getPage':
                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

                            $this->adminCtrl->goToCreate();
                        }else{

                            $this->userCtrl->redirectForConnexion();
                        }

                    break;

                    // Ajouter un nouveau chapitre

                    case 'addPost':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {

                            if (!empty($_POST['chapter']) && !empty($_POST['title']) && !empty($_POST['content'])) {

                                $this->adminCtrl->createPost($_POST['chapter'], $_POST['title'], $_POST['content']);
                            } else {
                                throw new Exception('Remplissez tous les champs du chapitre:(');
                            }
                        }else {

                            $this->userCtrl->redirectForConnexion();
                        }

                    break;

                    // Afficher un chapitre en tant qu'administrateur

                    case 'readPost';

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {

                            if (isset($_GET['id']) && $_GET['id'] > 0) {

                                $this->adminCtrl->readPost($_GET['id']);
                            } else {
                                throw new Exception('Identifiant de chapitre non valide');
                            }
                        }else{
                            $this->userCtrl->redirectForConnexion();
                        }

                    break;

                    // Afficher l'éditeur de chapitre

                    case 'editPost':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {

                            if (isset($_GET['id']) && $_GET['id'] > 0) {

                                $this->adminCtrl->goToPost($_GET['id']);
                            } else {
                                throw new Exception('Identifiant de chapitre non valide');
                            }
                        }else{
                            $this->userCtrl->redirectForConnexion();
                        }

                        break;

                    // Actualiser le chapitre

                    case 'modifyPost':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {

                            if (!empty($_GET['id']) && $_GET['id'] > 0) {

                                if (!empty($_POST['title']) && !empty($_POST['content'])) {

                                    $this->adminCtrl->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
                                } else {
                                    throw new Exception('Remplissez tous les champs de ce chapitre:(');
                                }
                            } else {
                                throw new Exception('cette mise à jour ne peut aboutir :(');
                            }
                        }else{

                            $this->userCtrl->redirectForConnexion();
                        }

                        break;

                    // Effacer un chapitre

                    case 'deletePost':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

                            if (!empty($_GET['id']) && $_GET['id'] > 0) {

                                $this->adminCtrl->deletePost($_GET['id']);
                            } else {
                                throw new Exception('identifiant non conforme pour la suppression :(');
                            }
                        }else {
                            $this->userCtrl->redirectForConnexion();
                        }
                        break;

                    // Afficher l'interface de modération de commentaires

                    case 'showComment':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

                            $this->adminCtrl->showAllComments();
                        }else{
                            $this->userCtrl->redirectForConnexion();
                        }
                    break;

                    // Afficher un commentaire

                    case 'singleComment':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

                            if (isset($_GET['id']) && $_GET['id'] > 0) {

                                $this->adminCtrl->readComment($_GET['id']);
                            } else {
                                throw new Exception('Identifiant de com non valide');

                            }
                        }else{
                            $this->userCtrl->redirectForConnexion();
                        }

                        break;

                    // Approuver le commentaire

                    case 'approveComment':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

                            if (!empty($_GET['id']) && $_GET['id'] > 0) {

                                $this->adminCtrl->validateComment($_GET['id']);

                            } else {
                                throw new Exception('identifiant non conforme pour la validation :(');
                            }
                        }else{
                            $this->userCtrl->redirectForConnexion();
                        }
                        break;

                    // Supprimer le commentaire

                    case 'deleteComment':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

                            if (!empty($_GET['id']) && $_GET['id'] > 0) {

                                $this->adminCtrl->removeComment($_GET['id']);
                            } else {
                                throw new Exception('identifiant non conforme pour la suppression :(');
                            }
                        }else {
                            $this->userCtrl->redirectForConnexion();
                        }

                        break;

                    // Se déconnecter

                    case 'disconnect':

                        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){

                            $this->adminCtrl->logOut();

                        }else{
                            $this->userCtrl->redirectForConnexion();
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