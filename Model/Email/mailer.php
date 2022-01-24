<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\PTS-thesis\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\PTS-thesis\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\PTS-thesis\PHPMailer\src\SMTP.php';

class MailerPHP{

    private $emailrecipt;
    private $emailtitle;
    private $emailbody;
    private $emailAttach;
    Private $emailCode;

    public function __construct($emailrecipt, $emailtitle, $emailbody, $emailAttach, $emailCode){
        $this->emailrecipt = $emailrecipt;
        $this->emailtitle = $emailtitle;
        $this->emailbody = $emailbody;
        $this->emailAttach = $emailAttach;
        $this->emailCode = $emailCode;
       // $this->emailCode = $emailCode; get user details



    }


    public function sendEmailNotif(){
        try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();                                             
                $mail->Host = 'smtp.titan.email';
                $mail->SMTPAuth   = true;
                $mail->Username = 'no-reply@pts-thesis.website';
                $mail->Password = 'Zn=m4v*Jrv4?L)4c';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->SetFrom('no-reply@pts-thesis.website');
                $mail->addAddress($this->emailrecipt, 'MARK');     //Add a recipient Name is optional    
                $mail->addReplyTo('marklinsangan@pts-thesis.website', 'Admin');
            
                //Attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');        //Add attachments Optional name
                $mail->addAttachment($this->emailAttach); 
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $this->emailtitle;
                $mail->Body    = $this->emailbody;
            
                $mail->send();
                //echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }

}