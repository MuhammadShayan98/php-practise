<?php
session_start();
unset($_SESSION["Admin_Name"]);
unset($_SESSION["passwords"]);
header("Location:login.php");
?>