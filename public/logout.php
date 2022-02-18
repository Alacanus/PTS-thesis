<?php

require __DIR__ . '/../src/bootstrap.php';
<<<<<<< HEAD
audit_trail('User logouted of the system');
=======
if(isset($_SESSION['user_id'])){
    audit_trail('User logouted of the system', 3);
}

>>>>>>> origin
logout();