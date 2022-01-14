<?php



class SignupCtr extends Signup{
    private $uid;
    private $pwd;
    private $pwdx2;
    private $email;

    public function __construct($uid, $pwd, $pwdx2, $email){
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdx2 = $pwdx2;
        $this->email = $email;

    }

    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../index.php?error=invalidemail");
            exit();
        }
        if($this->matchpwd() == false){
            header("location: ../index.php?error=matchpwd");
            exit();
        }
        if($this->datamatch() == false){
            header("location: ../index.php?error=dbmatch");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    

    private function emptyInput(){
        $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdx2) || empty($this->email)){
            $result = false;
        }else
        {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else
        {
            $result = true;
        }
        return $result;
    }

    private function matchpwd(){
        $result;
        if($this->pwd !== $this->pwdx2){
            $result = false;
        }else
        {
            $result = true;
        }
        return $result;
    }

    private function datamatch(){
        $result;
        if($this->checkuser($this->uid, $this->email)){
            $result = false;
        }else
        {
            $result = true;
        }
        return $result;
    }
    //add more validation
}