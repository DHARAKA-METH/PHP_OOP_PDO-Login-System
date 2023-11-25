<?php

session_start();
if (!isset($_SESSION['loginsuccess'])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Your Website Title</title>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    
</head>

<body>
    <div class="container">
        <h1>Welcome to <?php echo $_SESSION['loginsuccess']['username'] ?></h1>
        <p><?php echo $_SESSION['loginsuccess']['email'] ?></p>
        <form action="include/logout.inc.php" method="post">
            <button class="logout-button">Logout</button>
        </form>
    </div>
</body>

</html>