<?php
if (!isset($_SESSION)) { session_start();}
//require __DIR__ . '/../config/app.php';
require_once __DIR__ . '/libs/titlehelper.php';
require_once __DIR__ . '/libs/sanitization.php';
require_once __DIR__ . '/libs/connection.php';
require_once __DIR__ . '/inc/auth.php';
require_once __DIR__ . '/libs/validation.php';
require_once __DIR__ . '/libs/flash.php';
require_once __DIR__ . '/libs/filter.php';
require_once __DIR__ . '/../Model/AES/crypt0.php';
require_once __DIR__ . '/inc/dbCRUD.php';



include __DIR__ . "/../Model/Includes/getConVar.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../PHPMailer/src/Exception.php';
require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';
$globalARR = array();


function global_arr(string $arrKey){
    global $globalARR;
    switch ($arrKey) {
        case 1:
          return $globalARR['classcrt1'];
          break;
        case 2:
          return $globalARR['classcrt2'];
          break;
        case 3:
          return $globalARR['classcrt3'];
          break;
        default:
          return $globalARR;
      }
}
function generate_activation_code(): string
{
    return bin2hex(random_bytes(16));
}

function audit_trail(string $logDesc, int $userAction = 1){
    $datetime = new DateTime();
    $datetime = $datetime->format('d/m/Y');
    $userIP = getUserIpAddr();
    $sesID = session_id();

    $logs = 'With IP: '. $userIP . '<'.$datetime.'>' .'= '.$logDesc;

    if(isset($_SESSION['user_id'])){
        $sql2 = "INSERT INTO audittrail (logs, userID, actionID, tableName) VALUES (:logs, :userID, :actionID, :sessionID)"; //add REPLACE sql-case
        $statement2 = db()->prepare($sql2);
        $statement2->bindParam(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
        $statement2->bindParam(':logs', $logs, PDO::PARAM_STR);
        $statement2->bindParam(':actionID', $userAction, PDO::PARAM_INT);
        $statement2->bindParam(':sessionID', $sesID);

        return $statement2->execute();

    }
}




function send_authentication_email(string $email, string $options ,$activation_code):Void
{
    if($options == 'register'){
        $activation_link = MYURL . "/public/activate.php?email=$email&activation_code=$activation_code&change_password=false";
    $subject = 'PTS activation Email';
        $message = <<<MESSAGE
        Hello,
        Please click on the following link to activate your account:
        $activation_link
        MESSAGE;
    }elseif($options == 'twofacotr'){
    $subject = "PTS two factor code";
        $message = <<<MESSAGE
        Hello,
        Please use the following code to access your account:
        $activation_code
        MESSAGE;
        $_SESSION['activation_code'] = $activation_code;
    }elseif($options == 'changePassword'){
        $subject = "PTS Password reset";
        $activation_link = MYURL . "/public/activate.php?email=$email&activation_code=$activation_code&change_password=true";
            $message = <<<MESSAGE
            Hello,
            Please use the following link to reset your account:
            $activation_link
            MESSAGE;
        }
    
    //send the email

    try {
        
        $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.titan.email';
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username = 'no-reply@pts-thesis.website';            //SMTP username
        $mail->Password = '3Lbe8jY=JSs$m^vy';                       //SMTP password will try to hide this
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->SetFrom('no-reply@pts-thesis.website');
        $mail->addAddress($email);     //Add a recipient Name is optional    
        $mail->addReplyTo('marklinsangan@pts-thesis.website', 'Admin');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo "<script>alert('Message has been sent');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}

function delete_user_by_id(int $userID, int $active = 0){
    $sql = 'DELETE FROM users WHERE userID =:id and active=:active';

    $statement = db()->prepare($sql);
    $statement->bindValue('id', $userID, PDO::PARAM_INT);
    $statement->bindValue(':active', $active, PDO::PARAM_INT);

    return $statement->execute();
}
function find_unverified_user(string $activation_code, string $email)
{

    $sql = 'SELECT userID, activation_code, activation_expiry < now() as expired
            FROM users
            WHERE active = 0 AND email=:email';

    $statement = db()->prepare($sql);

    $statement->bindValue(':email', $email);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        $dtA = $user['expired'];
        $dtB = new DateTime();
        // already expired, delete the in active user with expired activation code
        if ($dtA > $dtB) {
            delete_user_by_id($user['userID']);
            return null;
        }
        // verify the password
        if (password_verify($activation_code, $user['activation_code'])) {
            return $user;
        }
    }

    return null;
}

function activate_user(int $user_id): bool
{
    $sql = 'UPDATE users set active = 1, activated_at = now() WHERE userID=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $user_id, PDO::PARAM_INT);

    return $statement->execute();
}


function auth_Level( string $requirement)
{
    $sql = 'SELECT roleType FROM userroles 
      JOIN users
      ON users.roleID = userroles.roleID
  WHERE users.userID = :userID';

    $statement = db()->prepare($sql);
    $statement->bindValue(':userID', $_SESSION['user_id'], PDO::PARAM_INT);

    $statement->execute();
    $result= $statement->fetch(PDO::FETCH_ASSOC);
    if($result['roleType'] == $requirement){
        return true;
    }
    return false;
}

//isset check null
function is_user_logged_in():bool{
    return isset($_SESSION['username']);
}

function require_login():void{
    if(!is_user_logged_in()){
        redirect_to('login.php');
    }
}

function is_user_2fa(){
    if(isset($_SESSION['2fa']) && isset($_SESSION['username'])){
    return 'true';
    // redirect_to('login.php');
    }
    return 'false';
}

function logout():void{
    if(is_user_logged_in()){
        $_SESSION = array();
        session_destroy();
        redirect_to('login.php');
    }
}

function current_user(){
    if (is_user_logged_in()){
        return $_SESSION['username'];
        //pull from session
    }
    return null;
}


