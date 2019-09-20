<?php
//**controller */
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        //********************* */
        elseif ($_GET['action'] == 'postArticle') { //si action = fonction 'postArticle dans PostManager
            
            if (!empty($_POST['title']) && !empty($_POST['images']) && !empty($_POST['content']) ) {
                addPosts($_POST['title'],$_POST['images'],$_POST['content']); // appel fction de frontend
                
            }
            else {
                listPostsAdmin();
                //require('view/frontend/adminView.php');
                
            }
        }
        elseif ($_GET['action'] == 'deleteArticle') { //si action = fonction 'deleteArticle' dans PostManager
            if(isset($_GET['id']) && $_GET['id'] > 0){
                deletePost($_GET['id']); // appel fction de backend
            }
            else {
                listPostsAdmin();
                //require('view/frontend/adminView.php');
            }
        }
        elseif ($_GET['action'] == 'editArticle') {
            // var_dump($_POST); 
            if (isset($_GET['id']) && $_GET['id'] > 0){
                if ($_SERVER['REQUEST_METHOD']==='POST'){
                    
                    editAdd($_POST['title'],$_POST['content'],$_GET['id']) ;
                    
                }
                editPost($_GET['id']);
                
            }
            
        }
        elseif ($_GET['action'] == 'showAbout'){
            require('view/frontend/about.php');
        }
        elseif ($_GET['action'] == 'showContact'){
            require('view/frontend/contact.php');
        }
        elseif ($_GET['action'] == 'sendMessages') { 
            
            
           sendMail($_POST["name"],$_POST['email'],$_POST['message']);
                
           
        }
        //*********************************** */
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
