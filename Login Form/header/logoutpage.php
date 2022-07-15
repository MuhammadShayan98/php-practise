<?php
session_start();
unset($_SESSION["User_Name"]);
unset($_SESSION["User_Passwords"]);
header('Location: ../Login page/login.php');
?>