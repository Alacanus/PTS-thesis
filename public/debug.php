<?php
session_start();
require __DIR__ . '/../src/bootstrap.php';

// echo '<pre>';

// var_dump($_SESSION['upload_token']);

// echo '</pre>';

$client = init_Client();

$client->revokeToken();
unset($_SESSION['upload_token']);
unset($_SESSION['post']);


