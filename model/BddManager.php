<?php
namespace model;
require_once 'config.php';
class BddManager {
    protected function dbConnect() {
        try {
            $db = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
            return $db;
        }
        catch(PDOException $e) {
            echo 'Ã‰chec lors de la connexion : ' . $e->getCode() . $e->getMessage();
        }
    }
}
