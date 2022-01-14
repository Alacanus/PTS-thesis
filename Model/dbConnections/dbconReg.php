<?php
//check post
if(isset($_POST["submit"])){
    //get data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdx2 = $_POST["pwdx2"];
    $email = $_POST["email"];

    //insta signupctr class

    include "dbHandler.php";
    include "../../Controller/Classes/signupClass.php";
    include "../../Controller/Authorize/signupCtr.php";


    $signup = new SignupCtr($uid, $pwd, $pwdx2, $email);


    $signup->signupUser();

    //if signined, to to pge

    header("location: ../../View/mockindex.php");
}