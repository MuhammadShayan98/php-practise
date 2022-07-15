<?php
include '../registrationdb.php';


// $sql = "DELETE FROM tbl_Course WHERE id='". $_GET["id"] . "'";

$sql=mysqli_query($conn,"DELETE FROM tbl_Course WHERE id='". $_GET["id"] . "'");

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Record has been deleted")</script>';
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
header('location: page2.php');

mysqli_close($conn);

