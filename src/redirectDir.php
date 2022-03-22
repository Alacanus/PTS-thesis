<?php
$return_arr = array(0);
// var_dump($_GET);
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$link = "https";
else $link = "http";
// Here append the common URL characters.
$link .= "://";
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
$link .= "/pts-thesis/public/";

if(isset($_GET['viewSummary'])){
    if($_GET['viewSummary'] == 1){
        echo $link . '../public/classRooms/createClassSummary.php?classID='. $_GET['classID'];
    }
}

if(isset($_GET['editClass'])){
    if($_GET['editClass'] == 1 && $_GET['step']== 1){
        echo $link . '../public/classRooms/createClass1.php?classID='. $_GET['classID'];
    }

    if($_GET['editClass'] == 1 && $_GET['step']== 2){
        echo $link . '../public/classRooms/createClass'.$_GET['step'].'.php?classID='. $_GET['classID'];
    }

    if($_GET['editClass'] == 1 && $_GET['step']== 3){
        echo $link . '../public/classRooms/createClass'.$_GET['step'].'.php?classID='. $_GET['classID'];
    }

    if($_GET['editClass'] == 1 && $_GET['step']== 4){
        echo $link . '../public/classRooms/createClass'.$_GET['step'].'.php?classID='. $_GET['classID'];
    }
    if($_GET['editClass'] == 1 && $_GET['step']== 6){
        echo $link . '../public/classRooms/createClassSummary.php?'. $_GET['classID'];
    }
}

if(isset($_GET['purChase'])){
    echo $link . '../public/enrollment/newStudent.php?classID='. $_GET['classID'];
    
} //classIDnewStudent.php


