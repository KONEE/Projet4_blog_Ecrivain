<?php
class PostManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
//******************************************** ajout*/
//ajouter un article
public function postArticle($title,$content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $post->execute(array($title,$content));

        return $affectedLines;
    }
// Supprime un article
public function deleteArticle($postId) {
    $bdd = $this->dbConnect();
    $post = $bdd->prepare("DELETE FROM posts WHERE id=".$_GET['id']);
    $affectedLines = $post->execute(array($postId));
   // return $affectedLines;
}
// editer un artticle 
public function editArticle($title,$content,$id){
    $bdd = $this->dbConnect();
    $post = $db->prepare("UPDATE post SET title = ?, content = ? WHERE id = ?'");
    $post = $req->execute(array($title, $content, $id));
    return $post;

}
//***************************************************************** */


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'dbuser', '',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        return $db;
    }
}

