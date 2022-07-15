<?php
include '../registrationdb.php';
if (isset($_POST['submit'])) {

    $Course_Name = $_POST['Course_Name'];
    $sql = mysqli_query($conn, "INSERT INTO tbl_Course (Course_Name)
     VALUES ('$Course_Name')");
}
