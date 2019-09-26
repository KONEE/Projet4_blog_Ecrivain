<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/BddManager.php');

function listPostsAdmin()
{
    //var_dump($_SERVER);
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/backend/adminView.php');
}


function addPosts($title,$images, $content)
{
    //var_dump($images);
    if(isset($images['file'])){
		$name_file = "images".$images['file']['name'];
		$tmp_name = $images['file']['tmp_name'];
		$local_image = "public/images";
		
		move_uploaded_file($tmp_name,"$local_image/$name_file");
	}
    $PostManager = new PostManager();

    $affectedLines = $PostManager->postArticle($title,"$local_image/$name_file",$content);

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

function editPost($postId){
    $PostManager = new PostManager();

    $data = $PostManager->getPost($postId);

   
    if (!$data) {
        throw new Exception('Impossible d\'editer un article !');
    }
    else {
        require('view/backend/editView.php');  
    }

} 
 function editAdd( $title,$content,$id){
     $PostManager = new PostManager();
     $data = $PostManager -> editArticle($title,$content,$id);

 }

function sendMail($names,$subject,$mail,$phone,$messages ){
    if( mail ( "saadokone@gmail.com" ,  $subject , $message  )){
       echo "Message reçu" ;
    }
    else{
        echo "errorr";
    }
    

}