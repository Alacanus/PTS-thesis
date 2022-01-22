<?php

/** bindValue for more flexibility
 * PDO::PARAM_BOOL (int)
 * PDO::PARAM_NULL (int)
 * PDO::PARAM_INT (int)
 * PDO::PARAM_STR (int)
*/
function register_user(string $email, string $username, string $password, string $fname, string $lname, string $activation_code, int $expiry = 1 * 24  * 60 * 60): bool
{
    $sql = 'INSERT INTO users(username, email, password, firstname, lastname, activation_code, activation_expiry)
            VALUES(:username, :email, :password, :firstname, :lastname, :activation_code,:activation_expiry)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':firstname', $fname, PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lname, PDO::PARAM_STR);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $statement->bindValue(':activation_code', password_hash($activation_code, PASSWORD_DEFAULT));
    $statement->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + $expiry));

    return $statement->execute();
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

//isset check null
function is_user_logged_in():bool{
    return isset($_SESSION['username']);
}

function require_login():void{
    if(!is_user_logged_in()){
        redirect_to('login.php');
    }
}

function logout():void{
    if(is_user_logged_in()){
        unset($_SESSION['username'], $_SESSION['userID']);
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


