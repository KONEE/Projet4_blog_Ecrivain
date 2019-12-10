<?php
namespace controller;
use model\PostManager;
use model\BddManager;
use model\CommentManager;

class Frontend
{
    public function listPosts()
    {
        $postManager = new PostManager(); // Création d'un objet
        $posts       = $postManager->getPosts(); // Appel d'une fonction de cet objet
        require('view/frontend/listPostsView.php');
    }
    public function post()
    {
        $postManager    = new PostManager();
        $commentManager = new CommentManager();
        $post           = $postManager->getPost($_GET['id']);
        $comments       = $commentManager->getComments($_GET['id']);
        require('view/frontend/postView.php');
    }
    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $affectedLines  = $commentManager->postComment($postId, $author, $comment);
        if ($affectedLines === false) {
            
            $_SESSION['message_error'] = 'Impossible d\'ajouter le commentaire !';
            header('Location: index.php?action=post&id=' . $postId . $_SESSION['message_error']);
            
        } else {
            
            $_SESSION['message_succes'] = 'commmentaire posté avec succes';
            header('Location: index.php?action=post&id=' . $postId . $_SESSION['message_succes']);
            exit();
        }
    }
    public function sendMail($name, $mail, $message)
    {
        if (mail("saadokone@gmail.com", $name, $message)) {
            header('Location: index.php?action=showContact&succes=Message envoyer avec succes!!!');
            exit();
            
        } else {
            header('Location: index.php?action=showContact&error=ERREUR');
            exit();
        }
    }
    public function showAbout()
    {
    }
    public function showContact()
    {
    }
    //connexion Administrateur
    public function connexion($pseudo, $pass)
    {
        $connexionManager = new PostManager();
        $user             = $connexionManager->userConnexion($pseudo);
        // var_dump($user);
        if ($_SESSION['id']) {
            header('Location: index.php?action=postArticle');
            exit();
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $isPasswordCorrect = password_verify($pass, $user['pass']);
            if ($isPasswordCorrect) {
                $_SESSION['id']    = $user['id'];
                $_SESSION['state'] = 'Vous êtes connecté en tant que Administrateur';
                header('Location: index.php?action=postArticle');
                exit();
            } else {
                $_SESSION['message_error'] = 'Administrateur Inconnu';
                header('Location: index.php?action=connexion&' . $_SESSION['message_error']);
                exit();
            }
        } else {
            require('view/backend/connexionView.php');
        }
    }
    // signaler un commentaire
    function signalCom($postId, $comId)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->tagCom($comId);
        if ($affectedLines === false) {
            $_SESSION['message_error'] = 'Impossible de signaler le commentaire';
            header('Location: index.php?action=post&id=' . $postId . $_SESSION['message_error']);
            exit();
        } else {
            $_SESSION['message_succes'] = 'commentaire signalé';
            header('Location: index.php?action=post&id=' . $postId . '&' . $comId . ':' . $_SESSION['message_succes']);
            exit();
        }
    }
    public function signalComment()
    {
        $commentManager = new CommentManager();
        $com            = $commentManager->getSignalCom();
        $signalCom      = $com->fetchAll();
        require('view/backend/signalView.php');
    }
} 