<?php

session_start();
unset($_SESSION['loginsuccess']);
session_destroy();
header("location:../index.php");