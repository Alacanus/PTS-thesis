<?php
require __DIR__ . '/../../config/database.php';
const APP_URL = 'http://localhost/PTS-thesis';
$dirs = __DIR__;
$newdir = rtrim($dirs, "src");
$APP_URL = $newdir;

const SENDER_EMAIL_ADDRESS = 'no-reply@email.com';
function db(): PDO
{
    static $pdo;

    if (!$pdo) {
        return new PDO(
            sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_HOST, DB_NAME),
            DB_USER,
            DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}