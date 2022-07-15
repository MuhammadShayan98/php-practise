<?php
include '../registrationdb.php';
session_start();
$message = "";
if (count($_POST) > 0) {
	$result = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE Admin_Name='" . $_POST["Admin_Name"] . "' and passwords = '" . $_POST["passwords"] . "'");
	$row  = mysqli_fetch_array($result);
	if (is_array($row)) {
		$_SESSION["Admin_Name"] = $row['Admin_Name'];
		$_SESSION["passwords"] = $row['passwords'];
	} else {
		$message = "Invalid Username or Password!";
	}
}
if (isset($_SESSION["Admin_Name"])) {
	header("Location: index.php");
}
?>
<html>

<head>
	<title>User Login</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>


	<div class="container">
		<div class="screen">
			<div class="screen__content">
				<form class="login" name="frmUser" method="post" action="">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" placeholder="User name / Email" name="Admin_Name">
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="text" class="login__input" placeholder="Password" name="passwords">
					</div>
					<button class="button login__submit">
						<span class="button__text" type="submit" name="submit" value="Submit">Log In Now</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</form>
				<div class="social-login">
					<h3>log in via</h3>
					<div class="social-icons">
						<a href="#" class="social-login__icon fab fa-instagram"></a>
						<a href="#" class="social-login__icon fab fa-facebook"></a>
						<a href="#" class="social-login__icon fab fa-twitter"></a>
					</div>
				</div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>


</body>

</html>