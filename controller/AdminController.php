<?php

require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/AdminManager.php';

class AdminController
{
    private $post;
    private $comments;


    public function __construct()
    {
        $this->post= new PostManager();
        $this->comments = new CommentManager();

    }

    public function createPost($chapter,$title,$content)
    {
        $post = $this->post->addPost($chapter,$title,$content);

        if ($post){
            header('Location: index.php?action=adminPost');
        }else{
            throw new Exception('Impossible d\'ajouter le chapitre !');
        }

        include 'view/backend/createPostView.php';
    }


    public function goToCreate(){

        include 'view/backend/createPostView.php';

    }


    public function readPost($postId)
    {
        $post = $this->post->getPost($postId);

        include 'view/backend/adminPostView.php';

    }

    public function readAllPosts()
    {
        $posts = $this->post->getPosts();

        include 'view/backend/adminView.php';

    }

    public function goToPost($postId)
    {
        $post = $this->post->getPost($postId);

        include 'view/backend/editPostView.php';

    }

    public function updatePost($title,$content,$postId)
    {
        $post = $this->post->modifyPost($title,$content,$postId);

        if ($post == true){
            header('Location: index.php?action=readPost&id='.$postId);
        }else{
            throw new Exception('Impossible de modifier le chapitre !');
        }

        include 'view/backend/editPostView.php';

    }

    public function deletePost($postId)
    {
        $post = $this->post->removePost($postId);

        if ($post >0){
            header('Location: index.php?action=adminPost');
        }else{
            throw new Exception('Impossible de supprimer le chapitre !');
        }

    }

    public function readComment($id)
    {
        $comment = $this->comments->getComment($id);

        include 'view/backend/singleCommentView.php';

    }

    public function showAllComments()
    {
        $comments = $this->comments->getAllComments();

        include 'view/backend/adminCommentsView.php';

    }

    public function removeComment($id){

        $comment = $this->comments->deleteComment($id);

        if ($comment){
            header('location:index.php?action=showComment');
        }else{
            throw new Exception('Impossible de supprimer le commentaire !');
        }


    }

    public function validateComment($id)
    {
        $comment = $this->comments->approveComment($id);

        if ($comment >0){
            header('Location: index.php?action=showComment');
        }else{
            throw new Exception('Impossible de valider le commentaire !');
        }

    }

    public function logOut()
    {
        session_start();
        session_destroy();
        header('Location:index.php');
    }
}