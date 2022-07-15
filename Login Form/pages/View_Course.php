<?php
include '../registrationdb.php';
include './ViewCoursectrl.php';

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
    table {
        margin: 0 auto;
        font-size: large;
        border: 1px solid black;
    }

    h1 {
        text-align: center;
        color: #006600;
        font-size: xx-large;
        font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
    }

    td {
        background-color: #E4F5D4;
        border: 1px solid black;
    }

    th,
    td {
        font-weight: bold;
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }

    td {
        font-weight: lighter;
    }
</style>

<body>
    <div align='center'>
        <h3>View Course</h3>
        <br>
        <table >
            <tr>
                <th> Id</th>
                <th>Course Name</th>

            </tr>
            <?php
            $res =  View_Course();
            $i = 0;
            while ($row = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["Course_Name"]; ?></td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </table>

    </div>
</body>

</html>