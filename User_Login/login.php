<?php
session_start();
include './Database/connectdb.php';

$message = "";
if (count($_POST) > 0) {

    $result = mysqli_query($conn, "SELECT * FROM tbl_userAdmin WHERE admin_email='" . $_POST["admin_email"] . "' and admin_passwords = '" . $_POST["admin_passwords"] . "'");
    $row  = mysqli_fetch_array($result);
    if ($row) {
        // echo "<script>window.open('index.php','_self')</script>"; 
        if ($row['Role_id'] == 1) {
            header("location: ./pages/student/student.php");
        } elseif ($row['Role_id'] == 2) {
            header("location: ./pages/Teacher/Teacher.php");
        } elseif ($row['Role_id'] == 3) {
            header("location:./pages/HOD/HOD.php ");
        } elseif ($row['Role_id'] == 4) {
            header("location: index.php ");
        } else {
            echo 'Wrong User';
        }

        $_SESSION["id"] = $row["id"];
        $_SESSION["Admins_Name"] = $row["Admins_Name"];
        $_SESSION["admin_email"] = $row["admin_email"];
    } else {
        $message = "Invalid Username or Password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="./images/user.png" alt="login" width="80px">
                                <br>
                                <br>
                                <h3>USER LOGIN</h3>
                            </a>
                        </div>
                        <div>
                            <h5><?php if (isset($message)) {
                                    echo $message;
                                } ?></h5>
                        </div>
                        <br>
                        <div class="login-form">

                            <form class="login" name="frmUser" method="post" action="">
        
                                <br>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="text" placeholder="Email" name="admin_email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="text" placeholder="Password" name="admin_passwords" required>
                                </div>
                                <div class="login-checkbox">
                                    <br>
                                    <!-- <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label> -->
                                    <label>
                                        <a href="./reset_password/reset_pass.php">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit" value="submit">sign in</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> -->
                            </form>

                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="./Registration/register.php">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->