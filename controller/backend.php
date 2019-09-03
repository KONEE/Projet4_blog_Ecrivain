<?php

// Chargement des classes
require_once('model/PostManager.php');


function listPostsAdmin()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/adminView.php');
}


function addPosts($title, $content)
{
    $PostManager = new PostManager();

    $affectedLines = $PostManager->postArticle($title,$content);

    //require('view/frontend/adminView.php');
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article !');
    }
    else {
        header('Location: index.php?action=postArticle');
        
       
    }
}
function deletePost($postId){
    $PostManager = new PostManager();

    $affectedLines = $PostManager->deleteArticle($postId);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article !');
    }
    else {
        header('Location: index.php?action=deleteArticle'); 
    }

}

function editPost($title,$content,$postId){
    $PostManager = new PostManager();

    $affectedLines = $PostManager->editArticle($title,$content,$postId);

   
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article !');
    }
    else {
        header('Location: index.php?action=editArticle');  
    }

} 


function sendMail($names,$subject,$mail,$phone,$messages ){
    if( mail ( "saadokone@gmail.com" ,  $subject , $message  )){
       echo "Message reçu" ;
    }
    else{
        echo "errorr";
    }
    

}