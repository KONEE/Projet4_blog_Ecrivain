<?php
namespace model;
use model\BddManager;

class PostManager extends BddManager
{
    public function getPosts()
    {
        $db  = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC ');
        return $req;
    }
    public function getPost($postId)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array(
            $postId
        ));
        $post = $req->fetch();
        return $post;
    }
    //ajouter un article
    public function postArticle($title, $content)
    {
        $db            = $this->dbConnect();
        $post          = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES(?,?, NOW())');
        $affectedLines = $post->execute(array(
            $title,
            $content
        ));
        return $affectedLines;
    }
    // Supprimer un article
    public function deleteArticle($postId)
    {
        $bdd           = $this->dbConnect();
        $post          = $bdd->prepare("DELETE FROM posts WHERE id= ?" /*. $_GET['id']*/);
        $affectedLines = $post->execute(array(
            $postId
        ));
    }
    // editer un artticle
    public function editArticle($title, $content, $id)
    {
        $bdd           = $this->dbConnect();
        $post          = $bdd->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ? ");
        $affectedLines = $post->execute(array(
            $title,
            $content,
            $id
        ));
        return $affectedLines;
    }
    public function userConnexion($pseudo)
    {
        $db  = $this->dbConnect();
        //  Récupération de l'utilisateur et de son pass hashé
        $req = $db->prepare('SELECT id, pseudo,pass FROM membresAdmin WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo
        ));
        $resultat = $req->fetch();
        return $resultat;
    }
    public function createUser($pseudo,$email)
    {
        $db         = $this->dbConnect();
        // Hachage du mot de passe
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        // Insertion
        $req        = $db->prepare('INSERT INTO membresAdmin(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, CURDATE())');
        $resultat   = $req->execute(array(
            $pseudo,// $_POST['pseudo'],
            $pass_hache,
            $email// $_POST['email']
        ));
    }
    public function existPseudo($pseudo)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM membresAdmin WHERE pseudo = ?');
        $req->execute(array(
            $pseudo//$_POST['pseudo']
        ));
        $resultat = $req->rowCount();
        return $resultat;
    }
    public function existEmail($email)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM membresAdmin WHERE email = ?');
        $req->execute(array(
            $email// $_POST['email']
        ));
        $resultat = $req->rowCount();
        return $resultat;
    }
}