<?php

include "login.classes.php";

class logincontr extends login{

    private $uid;
    private $pwd;

    public function __construct($uid,$pwd)
    {     
        $this->uid=$uid;
        $this->pwd=$pwd;

    }

    public function loginuser(){

        if($this->emptyInput() ==false){
            header("location:../index.php?error=emptyinput");
            exit();
        }

        if($this->iscorrectusername($this->uid)==false){
            header("location:../index.php?error=invalid_username_or_not_registered");
            exit();

        }

        if(($this->iscorrectusername($this->uid)==true) AND !($this->checkpassword( $this->uid,$this->pwd))){
            header("location:../index.php?error=invalid_password");
            exit();

        }
    }

// --------session info----
    public function SessionInfo(){
            session_start();
            $result= $this->getdata($this->uid);
            $_SESSION['loginsuccess']=$result;

    }






      // -----------create function


    private function emptyInput()
    {

        $result = false;

        if (empty($this->uid) || empty($this->pwd)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


    private function iscorrectusername($uid){

        $result= $this->getdata($uid);
        if($result){
          return true;
           }else{
            return false;
           }

    }


    private function checkpassword($uid,$pwd){

       $result= $this->getdata($uid);
       if($result){
        if(password_verify($pwd,$result['pwd'])){
            return true;
        }else{
            return false;
        }
        return false;
       }


    }




}