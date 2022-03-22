<?php

require __DIR__ . '/bootstrap.php';


if(is_post_request()){
    // mark_Class_Status
    // if()
}

if(isset($_GET['markVerified'])){
    if($_GET['markVerified'] == 1){
        if(mark_Class_Status('VERIFIED', $_GET['classID'])){
            echo 'IT works';
        }
    }
    
    if($_GET['markVerified'] == 2){
        mark_Class_Status('UNVERIFIED', $_GET['classID']);
    }
    
    if($_GET['markVerified'] == 3){
        mark_Class_Status('DISABLED', $_GET['classID']);
    }
}//http://127.0.0.1/PTS-thesis/public/Coordinator/generateCertificate.php

if(isset($_GET['certAuth'])){
    if($_GET['certAuth'] == 1){
        echo '/PTS-thesis/public/Coordinator/generateCertificate.php?classID='.$_GET['classID'];
    }
}