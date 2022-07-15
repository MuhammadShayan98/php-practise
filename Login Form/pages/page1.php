<?php
include '../header/header.php';
include '../registrationdb.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    tr {
        text-align: center;
    }

    td {
        text-align: center;
        padding: 16px;
    }

    table {
        width: 45%;
        border: 2px solid black;
    }
</style>

<body>

    <div class="box">
        <h1>Student</h1>
    
        <br>
        <h2>
            Welcome <?php echo $_SESSION["Full_Name"]; ?>
        </h2>

        <br>
        <br>
        <a class="btn btn-primary" href="View_Course.php">View Course</a>
        <?php

        $table = "<table border = '1'><tr><th>Full_Name</th><th>Address</th><th>Phone_Number</th><th>Course_Name</th><th>Depart_Name</th></tr>";
        $user = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM tbl_users where id='$user' ");

        while ($row = $result->fetch_assoc()) {
            $table .= "<tr>";
            $table .= "<td>{$row['Full_Name']}</td>";
            $table .= "<td>{$row['Address']}</td>";
            $table .= "<td>{$row['Phone_Number']}</td>";
            $table .= "<td>{$row['Courses']}</td>";
            $table .= "<td>{$row['Department']}</td>";

            $table .= "</tr>";
        }
        $table .= "</table";
        print $table;
        ?>
    </div>

</body>

</html>