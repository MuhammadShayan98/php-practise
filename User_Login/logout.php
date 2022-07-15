<?php

session_start();
session_destroy();
unset($_SESSION['id']);
unset($_SESSION["Admins_Name"]);
header("location:login.php");
