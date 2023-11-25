<?php

if(isset($_POST['signup_submit'])){

    // Grabbing the data 

    $uid=$_POST['username'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $pwdrepeat=$_POST['pwdrepeat'];

    // instantiate signupcontr classs

    include "../classes/dbh.classes.php"; 
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";


    $signup=new SignupContr($uid,$email,$pwd,$pwdrepeat);
    
    // Runnong error handleins and user signup
    $signup->signupUser();
    // for after signup,login to profile page
    $signup->SessionInfo();
    header("location:../index.php?error=signup_success");
    exit();


    
    

}