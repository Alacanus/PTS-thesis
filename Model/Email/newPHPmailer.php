<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require '..\..\..\..\..\src\Exception.php';
require __DIR__ . '/../../PHPMailer/src/Exception.php';
require __DIR__ . '/../../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions

$dtB = new DateTime();
echo $dtB->format('Y-m-d H:i:s');
die();
// try {
//     $mail = new PHPMailer(true);
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     // $mail->Host       = 'smtp.gamil.email';                       //Set the SMTP server to send through
//     $mail->Host = 'smtp.titan.email';
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username = 'no-reply@pts-thesis.website';        //SMTP username
//     $mail->Password = 'Zn=m4v*Jrv4?L)4c';                       //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->SetFrom('no-reply@pts-thesis.website');
//     $mail->addAddress('markhenrick.linsangan@gmail.com', 'MARK');     //Add a recipient Name is optional    
//     $mail->addReplyTo('marklinsangan@pts-thesis.website', 'Admin');
//     // $mail->addCC('cc@example.com');
//     // $mail->addBCC('bcc@example.com');

//     //Attachments
//     // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'IT works';
//     $mail->Body    = 'proper email';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }