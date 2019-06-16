<?php

require_once 'controller/HomeCtrl.php';
require_once 'controller/PostCtrl.php';
require_once 'view/View.php';

class Router
{
    private $homeCtrl;
    private $postCtrl;

    public function __construct()
    {
        $this->homeCtrl = new HomeCtrl();
        $this->postCtrl = new PostCtrl();
    }


    // Traite une requête entrante
    public function routerRequest() {
        try{
            if (isset($_GET['action'])){
                if($_GET['action'] == 'post'){
                    if($_GET['id'] && $_GET['id']>0){
                        $postId = intval($_GET['id']);
                        if ($postId != 0){
                            $this->postCtrl->showPost($postId);
                        }
                        else{
                            throw new Exception('Identifiant de billet non valide');
                        }
                    }else{
                        throw new Exception('Identifiant de billet non defini');
                    }
                }else {
                    throw new Exception('Action non valide');
                }
            } else {
                $this->homeCtrl->loadHome();
            }
        } catch( Exception $e){

            echo 'Erreur: '.$e->getMessage();

        }
    }
}