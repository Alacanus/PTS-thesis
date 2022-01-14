<?php



class Signup extends Hanlder {


    protected  function setUser($uid, $pwd, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email)VALUES (?,?,?);');


        $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashpwd, $email))){
            $stmt = null;
            header("locatio: ../index.php?error=stmtfaild");
            exit();
        }


    }
     
    protected  function checkuser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? or users_email = ?;');

        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("locatio: ../index.php?error=stmtfaild");
            exit();
        }

        $resultcheck;
        if($stmt->rowCount() > 0) {
            $resultcheck = true;
        }else{
            $resultcheck = false;
        }
        return $resultcheck;
    }
}