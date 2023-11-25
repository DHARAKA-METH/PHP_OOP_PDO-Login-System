<?php

class Signup extends Dbh
{

    public function isuseduid($uid)// check is alredy taken username
    {

        $query = "SELECT username FROM users WHERE username=:username;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $uid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return false;
        } else {
            return true;
        }
    }


    //---get all data from database

    public function getdata($uid){

        $query = "SELECT * FROM users WHERE username=:username;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $uid);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }





    public function setUser($uid, $pwd, $email)
    {

        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
        $query = "INSERT INTO users(username,email,pwd)VALUES(:username,:email,:pwd);";


        // $query = "INSERT INTO users(username,email,pwd)VALUES(?,?,?);";
        // $stmt = $this->connect()->prepare($query);
        // if (!$stmt->execute(array($uid, $email, $hashedpwd))) {

        //     $stmt = null;
        //     header("location:../index.php?error=stmtfaild");
        //     exit();
        // }else{
        //     header("location:../index.php?error=signupsuccess");

        // }


        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $uid);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $hashedpwd);
        $stmt->execute();

        $stmt = null;
        // header("location:../index.php?error=signupsuccess");
        // exit();
    }
}
