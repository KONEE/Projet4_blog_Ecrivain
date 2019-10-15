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
/*if($callBackend->getIsconnect()){
    //les action backend
}
else{
    //formulaire de connexion
}
if($_GET['action']){

}*/
//var_dump($_SESSION);



if($callBackend->getIsconnect() && isset($_GET['action'])){
    //les action backend
    if ($_GET['action'] == 'postArticle') { //si action = fonction 'postArticle dans PostManager     
        if (!empty($_POST['title']) && !empty($_POST['images']) && !empty($_POST['content']) ) {
            $callBackend-> addPosts($_POST['title'],$_POST['images'],$_POST['content']); // appel fction de frontend   
         }
         else {  
           $callBackend -> listPostsAdmin();    
         }
    }
    elseif ($_GET['action'] == 'deleteArticle' ) { //si action = fonction 'deleteArticle' dans PostManager
         if(isset($_GET['id']) && $_GET['id'] > 0){  
            $callBackend->deletePost($_GET['id']); // appel fction de backend
         }
         else {  
           $callBackend -> listPostsAdmin();    
         }
    }
    elseif ($_GET['action'] == 'editArticle') {
         // var_dump($_POST); 
         if (isset($_GET['id']) && $_GET['id'] > 0){
             if ($_SERVER['REQUEST_METHOD']==='POST'){
                 $callBackend->editAdd($_POST['title'],$_POST['content'],$_GET['id']) ;   
             }
             $callBackend->editPost($_GET['id']);   
         } 
     }
}
else{
    //formulaire de connexion
    header('Location: index.php?action=connexion');
}