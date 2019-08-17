<?php

// Chargement des classes
require_once('model/PostManager.php');




function addPosts($title, $content)
{
    $PostManager = new PostManager();

    $affectedLines = $PostManager->postArticle($title,$content);

    //require('view/frontend/adminView.php');
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article !');
    }
    else {
        header('Location: index.php');
        
       
    }
}