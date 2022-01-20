<?php



class Login extends Hanlder {


    protected  function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? or email = ?;');


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
        $checkpwd = password_verify($pwd, $pwdHashed[0]["password"]);
        if($checkpwd == false){
            $stmt = null;
            header("location: ../../index.php?error=wroungpassword");
            exit();
        }elseif($checkpwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? or email = ? AND password = ?;');

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