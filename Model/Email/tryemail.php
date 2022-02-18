<?php

//require_once __DIR__ . '/../../mail_app/vendor/autoload.php';
// require_once('PHPMailer/PHPmailerAutoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\PTS-thesis\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\PTS-thesis\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\PTS-thesis\PHPMailer\src\SMTP.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = '';
$mail->Password = '';
$mail->SetFrom('bo-reply@pts-thesis.com');
$mail->Subject = 'Hello world';
$mail->Body = 'A test email';
$mail->AddAddress('@marklinsangan@pts-thesis.website');

$mail->Send();
// try{



//     $to      = 'markhenrick.linsangan@benilde.edu.ph';
// $subject = 'This is a test email';
// $message = 'Hi there';

// $headers = [
//     'From' => 'markhenrick.linsangan@gmail.com',
//     'Reply-To' => 'markhenrick.linsangan@gmail.com',
//     'X-Mailer' => 'PHP/' . phpversion()
// ];


// if (mail($to, $subject, $message,  $headers)) {
//     echo 'email was sent.';
// } else {
//     echo 'An error occurred.';
// }
// }catch(Exception $e){
//     echo $e->getMessage();
// }


