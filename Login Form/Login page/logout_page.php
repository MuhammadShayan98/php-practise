<?php
session_start();
unset($_SESSION["User_Name"]);
unset($_SESSION["User_Password"]);
header("Location: login.php");
?>