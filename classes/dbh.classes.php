<?php

class Dbh{
    protected function connect(){

        try {
            $username="root";
            $password="";
            $dbh=new PDO('mysql:hots=localhost;dbname=myfirstdatabase',$username,$password);
            return $dbh;
        } catch (PDOException $e ) {
            echo "error!: ".$e->getMessage()."<br/>";
            die();
        
        }
    }
}