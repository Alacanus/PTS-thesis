<?php


require_once __DIR__ . '/../../libs/connection.php';


function registred_user_auth(string $twofactorcode, string $genCode):bool{
    if($twofactorcode == $genCode){
        return true;
    }
    return false;
}