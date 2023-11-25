<?php
session_start();
 if(isset($_SESSION['loginsuccess'])){
    header("location:profile.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Sign-up Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>
    <div class="form-container">
        <!-- Login Form -->
        <form id="login-form" action="include/login.inc.php" method="post">
            <label for="login-username">Username:</label>
            <input type="text" id="login-username" name="username" placeholder="Enter your username">

            <label for="login-password">Password:</label>
            <input type="text" id="login-password" name="pwd" placeholder="Enter your password">

            <button type="submit" name="login_submit">Login</button>
        </form>

        <!-- Sign-up Form --------------------------------------------------------------------->


        <form id="signup-form" action="include/signup.inc.php" method="post">
            <label for="signup-username">Username:</label>
            <input type="text" id="signup-username" name="username" placeholder=" username">

            <label for="signup-email">Email:</label>
            <input type="text" id="signup-email" name="email" placeholder="Enter your email">

            <label for="signup-password">Password:</label>
            <input type="text" id="signup-password" name="pwd" placeholder="  password">

            <label for="signup-retype-password">Retype Password:</label>
            <input type="text" id="signup-retype-password" name="pwdrepeat" placeholder="Retype your password">

            <button type="submit" name="signup_submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
