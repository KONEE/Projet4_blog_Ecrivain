<?php
namespace controller;
use model\BddManager;
use model\UserManager;
class UserController {
    public function connexion($pseudo, $pass) {
        $connexionManager = new UserManager();
        $user = $connexionManager->userConnexion($pseudo);
        // var_dump($user);
        if (!$user) {
            throw new \Exception('Mauvais identifiant ou mot de passe !');
        } else {
            $isPasswordCorrect = password_verify($pass, $user['pass']);
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $user['id'];
                //$_SESSION['pseudo'] = $user['pseudo'];
                // echo 'Vous êtes connecté !';
                
            } else {
                echo 'Mauvais identifiant ou mot de passeeee !';
            }
        }
    }
    public function createA() {
        $connexionManager = new UserManager();
        $admin = $connexionManager->createUser();
        if ($admin === false) {
            echo 'echec recommencer';
        } else {
            echo ' creation d\'un nouveau Administrateur';
        }
    }
}
