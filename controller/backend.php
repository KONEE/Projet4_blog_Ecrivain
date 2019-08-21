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

function deletePost($id){
    $PostManager = new PostManager();

    $affectedLines = $PostManager->deleteArticle($id);

    
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article !');
    }
    else {
        header('Location: index.php?action=deleteArticle');
        
       
    }

}

function editPost($title,$content,$id){
    $PostManager = new PostManager();

    $affectedLines = $PostManager->editArticle($title,$content,$id);

   
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article !');
    }
    else {
        header('Location: index.php?action=editArticle');
        
       
    }

} 