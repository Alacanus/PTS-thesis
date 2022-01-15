<?php



class Hanlder {
    protected function connect() {
        try{
            $username ="u657624546_eslp";
            $password ="Zxcvbnm1";
            $person1 = new PDO('mysql:host=localhost;dbname=u657624546_pts', $username, $password);
            return $person1;
        }
        catch(PDOException $e){
            print "Error!: ". $e->getMessage(). "<br>";
            die();
        }
    }
}