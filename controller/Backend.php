<?php
namespace Controller;
use model\PostManager;
use model\BddManager;
use model\CommentManager;

class Backend
{
    private $isConnect = false;
    public function __construct()
    {
        if (isset($_SESSION['id'])) {
            $this->isConnect = true;
        }
    }
    public function getIsConnect()
    {
        return $this->isConnect;
    }
    public function setIsConnect($isConnexion)
    {
        $this->isConnect = $isConnexion;
    }
    public function listPostsAdmin()
    {
        //var_dump($_SERVER);
        $postManager = new PostManager(); // Création d'un objet
        $posts       = $postManager->getPosts(); // Appel d'une fonction de cet objet
        $articles    = $posts->fetchAll();
        require('view/backend/adminView.php');
    }
    public function addPosts($title, $content)
    {
        $PostManager   = new PostManager();
        $affectedLines = $PostManager->postArticle($title, $content);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter un article !');
        } else {
            header('Location: index.php?action=postArticle');
        }
    }
    public function deletePost($postId)
    {
        $PostManager    = new PostManager();
        $commentManager = new CommentManager();
        $deleted        = $commentManager->deleteComments($postId);
        $affectedLines  = $PostManager->deleteArticle($postId);
        if ($affectedLines === false && $deleted === false) {
            $_SESSION['message_error'] = 'Impossible de supprimer un article !';
        } else {
            $_SESSION['message_succes'] = 'Article supprimé';
            header('Location: index.php?action=deleteArticle');
            exit();
        }
    }
    public function createA($pseudo,$email,$pass,$pass1)
    {
         
        //puplic function createA($pseudo,$email,$pass,$pass1)
        $connexionManager = new PostManager();
        $existAdmin       = $connexionManager->existPseudo();
        $existAdmin1      = $connexionManager->existEmail();
        if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass1'])) {
            if($existAdmin == 0 && $existAdmin1 == 0){
                if ($_POST['pass'] !== $_POST['pass1']) {
                    $_SESSION['message_error'] = 'les mots de passe sont pas identique';
                    header('Location: index.php?action=postArticle&' . $_SESSION['message_error']);
                    exit();
                }else{
                    $connexionManager->createUser();
                    $_SESSION['message_succes'] = "Administrateur créé avec succes";
                    header('Location: index.php?action=postArticle&' . $_SESSION['message_succes']);
                    exit();
                }

            }else{
                $_SESSION['message_error'] = "il existe un administrateur avec ce pseudo et/ou cet Email";
                header('Location: index.php?action=postArticle&' . $_SESSION['message_error']);
                exit();
            }
        }else{
             $_SESSION['message_error'] = 'tous les champs sont pas remplir';
                header('Location: index.php?action=postArticle&' . $_SESSION['message_error']);
                exit();
        }
          
        
       /* $connexionManager = new PostManager();
        $existAdmin       = $connexionManager->existPseudo();
        $existAdmin1      = $connexionManager->existEmail();
        
        if ($existAdmin == 0 && $existAdmin1 == 0) {
            $connexionManager->createUser();
            $_SESSION['message_succes'] = "Administrateur créé avec succes";
            header('Location: index.php?action=postArticle&' . $_SESSION['message_succes']);
            exit();
            
        } else {
            $_SESSION['message_error'] = "il existe un administrateur avec ce pseudo et/ou cet Email";
            header('Location: index.php?action=postArticle&' . $_SESSION['message_error']);
            exit();
        }*/
    }
    public function editPost($postId)
    {
        $PostManager = new PostManager();
        $data        = $PostManager->getPost($postId);
        if (!$data) {
            $_SESSION['message_error'] = 'Impossible d\'editer un article !';
        } else {
            $_SESSION['message_succe'] = 'Article modifié';
            require('view/backend/editView.php');
        }
    }
    public function editAdd($title, $content, $id)
    {
        $PostManager = new PostManager();
        $data        = $PostManager->editArticle($title, $content, $id);
    }
    public function articleComments()
    {
        $postManager    = new PostManager();
        $commentManager = new CommentManager();
        $post           = $postManager->getPost($_GET['id']);
        $comment        = $commentManager->getComments($_GET['id']);
        $comments       = $comment->fetchAll();
        require('view/backend/adminCom.php');
    }
    public function deleteCom($comId)
    {
        $commentManager = new CommentManager();
        $affectedLines  = $commentManager->deleteCom($comId);
        if ($affectedLines === false) {
            $_SESSION['message_error'] = 'Impossible de supprimer ce commentaire !';
            header('Location: index.php?action=signalComment&' . $_SESSION['message_error']);
            exit();
        } else {
            $_SESSION['message_succes'] = 'commentaire supprimé!';
            header('Location: index.php?action=signalComment&' . $_SESSION['message_succes']);
            exit();
        }
    }
    public function validComment($comId)
    {
        $commentManager = new CommentManager();
        $affectedLines  = $commentManager->validCom($comId);
        if ($affectedLines === false) {
            $_SESSION['message_error'] = 'Impossible de signaler le commentaire';
            header('Location: index.php?action=signalComment&' . $_SESSION['message_error']);
            exit();
        } else {
            $_SESSION['message_succes'] = 'commentaire validé';
            header('Location: index.php?action=signalComment&' . $_SESSION['message_succes']);
            exit();
        }
    }
    /* public function numComSig($postId){
    $commentManager = new CommentManager();
    $numL = $commentManager -> numCom($postId);
    
    }*/
    
}