<?php
namespace model;
use model\BddManager;

class CommentManager extends BddManager
{
    public function getComments($postId)
    {
        $db       = $this->dbConnect();
        $comments = $db->prepare('SELECT id,post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr,tag FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array(
            $postId
        ));
        return $comments;
    }
    public function postComment($postId, $author, $comment)
    {
        $db            = $this->dbConnect();
        $comments      = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date,tag) VALUES(?, ?, ?, NOW(),1)');
        $affectedLines = $comments->execute(array(
            $postId,
            $author,
            $comment
        ));
        return $affectedLines;
    }
    /***************corrections*********************** */
    // Récupère les commentaires signaler d'un article
    public function getSignalCom()
    {
        $db            = $this->dbConnect();
        $commentSignal = $db->query('SELECT *,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE tag = 0 ORDER BY comment_date DESC');
        return $commentSignal;
    }
    
    
    // Supprime un commentaire
    public function deleteCom($comId)
    {
        $db            = $this->dbConnect();
        $comment       = $db->prepare("DELETE FROM comments WHERE id=  :id" /*. $_GET['id']*/);
        $affectedLines = $comment->execute(array(
            'id' => $comId
        ));
        
    }
    // suppression des commentaires liés a un articles
    public function deleteComments($postId)
    {
        $db       = $this->dbConnect();
        $comments = $db->prepare(' DELETE FROM comments WHERE post_id = ? ');
        $comments->execute(array(
            $postId
        ));
    }
    // signal un commentaire
    public function tagCom($comId)
    {
        $db            = $this->dbConnect();
        $comment       = $db->prepare("UPDATE comments SET tag = 0 WHERE id = ? " /*. $_GET['id']*/);
        $affectedLines = $comment->execute(array(
            $comId
        ));
    }
    public function validCom($comId)
    {
        $db            = $this->dbConnect();
        $comment       = $db->prepare("UPDATE comments SET tag = 1 WHERE id= ?" /*. $_GET['id']*/);
        $affectedLines = $comment->execute(array(
            $comId
        ));
    }
}