<?php



class Hanlder {
    protected function connect() {
        try{
            $username ="root";
            $password ="";
            $person1 = new PDO('mysql:host=localhost;dbname=pts', $username, $password);
            return $person1;
        }
        catch(PDOException $e){
            print "Error!: ". $e->getMessage(). "<br>";
            die();
        }
    }
}