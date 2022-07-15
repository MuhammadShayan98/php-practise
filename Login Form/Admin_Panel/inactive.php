<?php
  include('../registrationdb.php');

  if (isset($_GET['id'])){

      $id=$_GET['id'];

      $sql = mysqli_query($conn, "UPDATE tbl_users
      SET Status_Check = 0
      WHERE id='$id' ;");


    //   $sql="UPDATE `tbl_users` SET 
    //       `Status_Check`= 0 WHERE id='$id'";

    //   mysqli_query($con,$sql);

  }

  header('location: index.php');
