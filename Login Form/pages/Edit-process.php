<?php
include_once '../registrationdb.php';
include '../header/header.php';

if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tbl_Course set  Course_Name='" . $_POST['Course_Name'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";

}
$result = mysqli_query($conn,"SELECT * FROM tbl_Course WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);

?>
<html>
<head>
<title>Update Employee Data</title>
<style>
    .container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    input{
        padding: 10px;
        width: 100%;
        border-radius: 8px;
    }
</style>
</head>
<body>

<div class="container">
    <br>
    <h3>Update Data</h3>
    <br>

<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<b>ID: </b> <br>
<input type="text" name="id" class="id" value="<?php echo $row['id']; ?>">
<br>
<br>
<b> Course Name:</b><br>
<input type="text" name="Course_Name" class="Course_Name" value="<?php echo $row['Course_Name']; ?>">
<br>
<br>
<input class="btn btn-primary" type="submit" name="submit" value="Submit" class="buttom">

</form>
</div>

</body>
</html>