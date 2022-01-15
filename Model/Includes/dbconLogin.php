<?php
//check post
if(isset($_POST["submit"])){
    //get data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];


    //insta signupctr class

    include "../../Model/dbConnections/dbHandler.php";
    include "../../Controller/Classes/loginClass.php";
    include "../../Controller/Authorize/loginCtr.php";


    $login = new LoginCtr($uid, $pwd);


    $login->loginUser();

    //if signined, to to pge

    header("location: ../../View/mockindex.php");
}