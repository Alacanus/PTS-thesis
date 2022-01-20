<?php
require __DIR__ . '/../../config/database.php';
class Hanlder {
    protected function connect() {
        try{
            $pdo1 = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASSWORD);
            return $pdo1;
        }
        catch(PDOException $e){
            print "Error!: ". $e->getMessage(). "<br>";
            die();
        }
    }
}