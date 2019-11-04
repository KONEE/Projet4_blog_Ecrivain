<?php
namespace controller;
use model\PostManager;
use model\BddManager;
use model\CommentManager;
use PDO;
class Frontend {
    public function listPosts() {
        // var_dump(new PostManager());
        $postManager = new PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
        require ('view/frontend/listPostsView.php');
    }
    public function post() {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        require ('view/frontend/postView.php');
    }
    public function addComment($postId, $author, $comment) {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
    public function sendMail($name, $mail, $message) {
        if (mail("saadokone@gmail.com", $name, $message)) {
            header('Location: index.php?action=showContact&succes=Message envoyer avec succes!!!');
            
        } else {
            
            header('Location: index.php?action=showContact&error=ERREUR');
        }
    }
    public function showAbout() {
    }
    public function showContact() {
    }
}