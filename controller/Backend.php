<?php
namespace Controller;

use model\PostManager;
use model\BddManager;
use PDO;


class Backend {
    
    private $isConnect = false;

    public function __construct( ){

        if(isset($_SESSION['id'])){
            $this->isConnect = true;
        }

    }
    public function getIsConnect(){
        return $this->isConnect;
    }
    public function setIsConnect($isConnexion){
        $this->isConnect = $isConnexion;
    }

    function listPostsAdmin()
    {
        //var_dump($_SERVER);
        $postManager = new PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

        require('view/backend/adminView.php');
    }


    function addPosts($title,$images, $content)
    {
        $PostManager = new PostManager();


        $affectedLines = $PostManager->postArticle($title,$images,$content);
        
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
}