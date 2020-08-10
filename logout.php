<?php
include('functions.php');
//session_start(); //Start the current session
unset($_SESSION['name']);
session_destroy(); //Destroy it! So we are logged out now
header("location:login.php"); // Move back to login.php with a logout message
?>