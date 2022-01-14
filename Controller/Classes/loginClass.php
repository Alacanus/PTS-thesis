<?php



class Login extends Hanlder {


    protected  function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? or users_email = ?;');


        if(!$stmt->execute(array($uid, $pwd))){
            $stmt = null;
            header("locatio: ../index.php?error=stmtfaild");
            exit();
        }

        if($stmt ->rowCount() == 0){
            $stmt = null;
            header("location: ../../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);
        if($checkpwd == false){
            $stmt = null;
            header("location: ../../index.php?error=wroungpassword");
            exit();
        }elseif($checkpwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? or users_email = ? AND users_pwd = ?;');

            if(!$stmt->execute(array($uid, $uid, $pwd))){
                $stmt = null;
                header("locatio: ../index.php?error=stmtfaild");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../../mockindex2.php");
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            
        }
        $stmt = null;

    }
}