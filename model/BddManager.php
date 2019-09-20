<?php
//namespace \opt\lampp\htdocs\blog\model ;
    

class  BddManager {
    protected function dbConnect(){
       
            $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'dbuser', '');
        return $db;
       
    }
}