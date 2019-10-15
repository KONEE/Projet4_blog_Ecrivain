<?php
namespace model;

use model\BddManager;
use PDO;

class  UserManager extends BddManager
{
    
    public function userConnexion($pseudo){
        $db = $this->dbConnect();
        //  Récupération de l'utilisateur et de son pass hashé
        $req = $db->prepare('SELECT id, pseudo,pass FROM membresAdmin WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();
        return $resultat;
    }

    public function createUser(){
        $db = $this->dbConnect();
        // Vérification de la validité des informations
       // var_dump($_POST);
        // Hachage du mot de passe
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        

        // Insertion
        $req = $db->prepare('INSERT INTO membresAdmin(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, CURDATE())');
        $resultat = $req->execute(array($_POST['pseudo'], $pass_hache, $_POST['email']));
       // $resultat->closeCursor();
    }
    
   
}