<?php
session_start();
use controller\Frontend;
use controller\Backend;

//echo '<pre>';
//print_r($session_name);
//var_dump($_SESSION);


require('Autoloader.php');
Autoloader::register();
$callFrontend = new Frontend();
$callBackend  = new Backend();


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
        require('view/frontend/about.php');
    } elseif ($_GET['action'] == 'showContact') {
        require('view/frontend/contact.php');
    } elseif ($_GET['action'] == 'sendMessages') {
        $callFrontend->sendMail($_POST["name"], $_POST['email'], $_POST['message']);
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $callFrontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                //$succes = 'commentaire posté!!';
            } else {
                $_SESSION['message_error'] = 'Tous les champs ne sont pas remplis !';
            }
        } else {
            $_SESSION['message_error'] = 'Aucun identifiant de Article envoyé';
        }
    } elseif ($_GET['action'] == 'signalCom') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $callFrontend->signalCom($_GET['post_id'], $_GET['id']);
            
        } else {
            //$callBackend->listPostsAdmin();
        }
    } elseif ($_GET['action'] == 'connexion') {
        $callFrontend->connexion($_POST['pseudo'], $_POST['pass']);
        //$callBackend->setIsConnect(TRUE);        
    } elseif ($_GET['action'] == 'createA') {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST['pass'] !== $_POST['pass1']) {
                $_SESSION['message_error'] = 'les mots de passe sont pas identique';
                header('Location: index.php?action=postArticle&' . $_SESSION['message_error']);
                exit();
            } elseif (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass1'])) {
                $callBackend->createA();
            } else {
                $_SESSION['message_error'] = 'tous les champs sont pas remplir';
                header('Location: index.php?action=postArticle&' . $_SESSION['message_error']);
                exit();
            }
        }
    } elseif ($_GET['action'] == 'deconnexion') {
        $callBackend->setIsConnect(false);
        session_destroy();
        require('view/backend/connexionView.php');
    } elseif ($callBackend->getIsconnect()) {
        /************************les action backend**************************/
        if ($_GET['action'] == 'postArticle') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $callBackend->addPosts($_POST['title'], $_POST['content']);
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
                    header('Location: index.php?action=postArticle');
                    exit();
                }
                $callBackend->editPost($_GET['id']);
            }
        } elseif ($_GET['action'] == 'articleComments') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $callBackend->articleComments();
            } else {
                header('Location: index.php?action=articleComments');
                exit();
            }
        } elseif ($_GET['action'] == 'signalComment') {
            $callFrontend->signalComment();
            
        } elseif ($_GET['action'] == 'valideComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $callBackend->validComment($_GET['id']);
            }
        } elseif ($_GET['action'] == 'deleteCom') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $callBackend->deleteCom($_GET['id']);
            }
        }
    } else {
        //formulaire de connexion
        header('Location: index.php?action=connexion');
        exit();
    }
} else {
    $callFrontend->listPosts();
}