<?php
session_start();
use controller\Frontend;
use controller\Backend;
use controller\UserController;

require ('Autoloader.php');
Autoloader::register();
$callFrontend = new Frontend();
$callBackend = new Backend();
$callUserController = new UserController();

    /************************les action Frontend**************************/
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        $callFrontend->listPosts();
    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $callFrontend->post();
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    } elseif ($_GET['action'] == 'showAbout') {
        require ('view/frontend/about.php');
    } elseif ($_GET['action'] == 'showContact') {
        require ('view/frontend/contact.php');
    } elseif ($_GET['action'] == 'sendMessages') {
        $callFrontend->sendMail($_POST["name"], $_POST['email'], $_POST['message']);
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $callFrontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    } elseif ($_GET['action'] == 'connexion') {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $callUserController->connexion($_POST['pseudo'], $_POST['pass']);
            $callBackend->setIsConnect(TRUE);
            header('Location: index.php?action=postArticle&'.$_SESSION['state']);
            //createA(); BON !
            
        } else {
            require ('view/backend/connexionView.php');
            //createA();
            
        }
    } elseif ($_GET['action'] == 'deconnexion') {
        $callBackend->setIsConnect(false);
        session_destroy();
        require ('view/backend/connexionView.php');
    } elseif ($callBackend->getIsconnect()) {
        /************************les action backend**************************/
        if ($_GET['action'] == 'postArticle') { 
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $callBackend->addPosts($_POST['title'], $_POST['images'], $_POST['content']); 
                
            } else {
                
                $callBackend->listPostsAdmin();
            }
        } elseif ($_GET['action'] == 'deleteArticle') { 
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $callBackend->deletePost($_GET['id']); 
                
            } else {
                $callBackend->listPostsAdmin();
            }
        } elseif ($_GET['action'] == 'editArticle') {
            // var_dump($_POST);
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $callBackend->editAdd($_POST['title'], $_POST['content'], $_GET['id']);
                }
                $callBackend->editPost($_GET['id']);
            }
        }
    } else {
        //formulaire de connexion
        header('Location: index.php?action=connexion');
    }
} else {
    $callFrontend->listPosts();
}
