<?php
require __DIR__ . '/../../config/database.php';
const APP_URL = 'http://localhost/PTS-thesis';

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$link = "https";
else $link = "http";
// Here append the common URL characters.
$link .= "://";
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
define("MYURL", $link);

const SENDER_EMAIL_ADDRESS = 'no-reply@email.com';
function db(): PDO
{

    static $pdo;
    try{
        if (!$pdo) {
            return new PDO(
                sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_HOST, DB_NAME),
                DB_USER,
                DB_PASSWORD,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        db()->commit();
    }catch (Exeption $e){
        die();
    }


    return $pdo;
}