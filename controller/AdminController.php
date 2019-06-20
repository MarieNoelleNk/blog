<?php

require_once 'model/PostModel.php';
require_once 'model/CommentModel.php';
require_once 'model/AdminModel.php';

class AdminController
{
    private $post;
    private $comments;


    public function __construct()
    {
        $this->post= new PostModel();
        $this->comments = new CommentModel();
    }


    public function createPost($title,$content)
    {
        $post = $this->post->addPost($title,$content);

        if ($post){
            header('Location: index.php?action=addPost');
        }else{
            throw new Exception('Impossible d\'ajouter le chapitre !');
        }

        include 'view/backend/createPostView.php';
    }


    public function readPost($postId)
    {
        $post = $this->post->getPost($postId);
        $comments = $this->comments->getComments($postId);

        include 'view/frontend/postView.php';

    }

    public function readAllPosts()
    {
        $posts = $this->post->getPosts();

        include 'view/backend/adminView.php';

    }

    public function updatePost($postId,$title,$content)
    {
        $post = $this->post->modifyPost($postId,$title,$content);

        if ($post){
            header('Location: index.php?action=adminPost');
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

        include 'view/commentView.php';

    }

    public function lookReportedComments()
    {
        $this->comments->getReportedComments();

        include 'view/backend/reportedCommentsView.php';

    }

    public function removeComment($id){

        $comment = $this->comments->deleteComment($id);

        if ($comment >0){
            header('Location: index.php?action=adminComment');
        }else{
            throw new Exception('Impossible de supprimer le commentaire !');
        }


    }

    public function validateComment($id)
    {
        $comment = $this->comments->approveComment($id);

        if ($comment >0){
            header('Location: index.php?action=adminComment');
        }else{
            throw new Exception('Impossible de valider le commentaire !');
        }

    }


}