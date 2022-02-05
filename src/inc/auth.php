<?php

/** bindValue for more flexibility
 * PDO::PARAM_BOOL (int)
 * PDO::PARAM_NULL (int)
 * PDO::PARAM_INT (int)
 * PDO::PARAM_STR (int)
*/
function register_user(string $email, string $username, string $password, string $fname, string $lname, string $userType, string $activation_code, int $expiry = 1 * 24  * 60 * 60): bool
{
    $sql = 'INSERT INTO users(username, email, password, firstname, lastname, roleID, activation_code, activation_expiry)
            VALUES(:username, :email, :password, :firstname, :lastname, :userType, :activation_code,:activation_expiry)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':firstname', $fname, PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lname, PDO::PARAM_STR);
    $statement->bindValue(':userType', $userType, PDO::PARAM_INT);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $statement->bindValue(':activation_code', password_hash($activation_code, PASSWORD_DEFAULT));
    $statement->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + $expiry));

    return $statement->execute();
}

function get_db_Options(string $tableName, string $optionVal, string $optionName) {
    $option_list = '';
    $sql = "SELECT * FROM `$tableName`";
    $statement = db()->prepare($sql);
    $statement->execute();
    while($data=  $statement->fetchAll(PDO::FETCH_ASSOC)) {
        $option_list = $data;
       //$option_list.="<option value='$data[$optionVal]'>$data[$optionName]</option>";
    }
    return $option_list;
 }

function find_user_by_username(string $username){
    $sql = 'SELECT username, password, active, email FROM users WHERE username= :username';
    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
    /**
     * PDO::FETCH_ASSOC (int)
     * Specifies that the fetch method shall return each row as 
     * an array indexed by column name as returned in the corresponding 
     * result set. If the result set contains multiple columns with the 
     * same name, PDO::FETCH_ASSOC returns only a 
     * single value per column name.
     */
}

function find_user_by_email(string $email){
    $sql = 'SELECT userID, email, active FROM users WHERE email= :email';
    $statement = db()->prepare($sql);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function is_user_active($user){
    //check userstatus
    return (int)$user['active'] === 1;
}

function login(string $username, string $password):bool{
    $user = find_user_by_username($username);
    //if user found, check password

    if($user && is_user_active($user) && password_verify($password, $user['password'])){
        //prevent session fixation attack
        session_regenerate_id();

        //set session details
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['userID'];
        $_SESSION['userEmail'] = $user['email'];
        // $_SESSION['audit_id'] = $user['auditID'];
        //$_SESSION['user_id'] = $user['id'];


        return true;
    }
    return false;
}

//changepassowrd

function change_passwrod(string $email):bool{
    $user = find_user_by_email($email);
    //if user found, check password

    if($user && is_user_active($user)){
        //prevent session fixation attack
        session_regenerate_id();
        // session_destroy();
        // session_start();
        $_SESSION = array();
        $_SESSION['user_id']= $user['userID'];
        $_SESSION['userEmail'] = $user['email'];
        return true;
    }
    return false;
}

function reset_Password(string $password, string $password2):bool{
    if($password == $password2){
        $sql = "UPDATE users
        SET password = :password 
        WHERE userID = :userID and email = :email";
    $statement = db()->prepare($sql);
    $statement->bindParam(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
    $statement->bindValue(':email', $_SESSION['userEmail'], PDO::PARAM_STR);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));

    // execute the UPDATE statment
    if ($statement->execute()) {
        return true;
        }   
    return false;
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

function is_user_2fa():void{
    if(!is_user_logged_in() && !isset($_SESSION['2fa'])){
        redirect_to('login.php');
    }
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


