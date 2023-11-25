<?php

class login extends Dbh {

    public function getdata($uid){

        $query = "SELECT * FROM users WHERE username=:username;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $uid);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }


}