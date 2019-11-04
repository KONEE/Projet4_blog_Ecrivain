<?php
namespace model;
use model\BddManager;
use PDO;
class PostManager extends BddManager {
    public function getPosts() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title,images, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        return $req;
    }
    public function getPost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title,images, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }
    //ajouter un article
    public function postArticle($title, $images, $content) {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts (title,images, content, creation_date) VALUES(?, ?,?, NOW())');
        $affectedLines = $post->execute(array($title, $images, $content));
        
        return $affectedLines;
    }
    // Supprimer un article
    public function deleteArticle($postId) {
        $bdd = $this->dbConnect();
        $post = $bdd->prepare("DELETE FROM posts WHERE id=" . $_GET['id']);
        $affectedLines = $post->execute(array($postId));
    }
    // editer un artticle
    public function editArticle($title, $content, $id) {
        $bdd = $this->dbConnect();
        $post = $bdd->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ? ");
        $affectedLines = $post->execute(array($title, $content, $id));
        return $affectedLines;
    }
}
