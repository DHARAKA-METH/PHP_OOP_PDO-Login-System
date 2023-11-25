<?php

if (isset($_POST['login_submit'])) {

    // Grabbing the data 

    $uid = $_POST['username'];
    $pwd = $_POST['pwd'];


    include "../classes/dbh.classes.php";
    include "../classes/login-contr.classes.php";
    include "../classes/login.classes.php";

    // instantiate loginupcontr classs

    $loginuser = new logincontr($uid, $pwd);

    // Runnong error handleins and user login
    $loginuser->loginuser();


    // going to front page
    header("location:../profile.php?error=loginsuccess");
    $loginuser->SessionInfo();
}
