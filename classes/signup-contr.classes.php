
<?php

class SignupContr extends Signup
{

    private $uid;
    private $email;
    private $pwd;
    private $pwdrepeat;

    // this inputs are difine classses

    public function __construct($uid, $email, $pwd, $pwdrepeat) // this inputes are gitting by user
    // in here when create instens this function will be auto run
    {

        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
    }



    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            header("location:../index.php?error=emptyinput");
            exit();
        }

        if ($this->invalidUid() == false) {
            header("location:../index.php?error=invalidUserID");
            exit();
        }

        if ($this->invalidEmail() == false) {
            header("location:../index.php?error=invalidEmail");
            exit();
        }

        if ($this->isuseduid($this->uid) == false) {
            header("location:../index.php?error=username_alredy_taken");
            exit();
        }

        if ($this->pwdmatch() == false) {
            header("location:../index.php?error=password_doesn't_match");
            exit();
        }
        // sign up user       
        $this->setUser($this->uid, $this->pwd, $this->email);
    }



    // --------session info----
    public function SessionInfo()
    {
        session_start();
        $result = $this->getdata($this->uid);
        $_SESSION['loginsuccess'] = $result;
    }


    private function emptyInput()
    {

        $result = false;

        if (empty($this->uid) || empty($this->email) || empty($this->pwd) || empty($this->pwdrepeat)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


    private function invalidUid()
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


    private function invalidEmail()
    {

        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


    private function pwdmatch()
    {

        $result = false;
        if ($this->pwd !== $this->pwdrepeat) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
