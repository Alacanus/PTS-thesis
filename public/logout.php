<?php

require __DIR__ . '/../src/bootstrap.php';
if(isset($_SESSION['user_id'])){
    audit_trail('User logouted of the system', 3);
}

unset($_SESSION['upload_token']);
logout();

redirect_to('login.php');

