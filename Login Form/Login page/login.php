<?php
include '../registrationdb.php';
session_start();

$message = "";

if (count($_POST) > 0) {

    $Role_id = $_POST['Role_id'];

    $result = mysqli_query($conn, "SELECT * FROM tbl_Users WHERE User_Name='" . $_POST["User_Name"] . "' and User_Password = '" . $_POST["User_Password"] . "'");

    $row  = mysqli_fetch_array($result);
    
    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["Full_Name"] = $row['Full_Name'];
        $_SESSION["User_Name"] = $row['User_Name'];
        $_SESSION["User_Password"] = $row['User_Password'];

        if ($row) {
            if ($Role_id == 1) {
                header("location: ../pages/page1.php");
            } elseif ($Role_id == 2) {
                header("location: ../pages/page2.php");
            } elseif ($Role_id == 3) {
                header("location: ../pages/page3.php");
            }else{
                header("location: login.php");
            }
        }
    } else {
        $message = "Invalid Username and Password!";
    }
}

?>

<html>

<head>
    <title>User Login</title>
</head>

<style>
    body {
    font-family: Montserrat, sans-serif;
}

    input {
        padding: 8px;
        width: 30%;
        border-radius: 6px;
    }

    .Button {
        background-color: #010c42;
        color: white;
    }
    .Button:hover{
        background-color: #051d99;
        color: white;
    }
    .container{
        border: 2px solid black;
        margin: 120px;
        padding: 12px;
    }
</style>

<body>
    <div class="container">
    <form name="frmUser" method="post" action="" align="center">
        
        <div class="message"><?php if ($message != "") {
                                    echo $message;
                                } ?></div>
        <h1 align="center">User Login </h1>
        <p>
            <select onchange="toggle_form_element(this)" name='Role_id' id="parts">
                <option value="-">Please choose</option>
                <option value="1">Student</option>
                <option value="2">Teacher</option>
                <option value="3">HOD</option>
            </select>
        </p>

        Username:<br>
        <input type="text" name="User_Name" placeholder="User Name" required>
        <br>
        Password:<br>
        <input type="password" name="User_Password" placeholder="Password" required>
        <br><br>
        <input class="Button" type="submit" name="submit" value="Submit">
    </form>
    </div>
</body>

</html>