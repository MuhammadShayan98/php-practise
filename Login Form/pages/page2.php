<?php
include '../header/header.php';
include '../registrationdb.php';
include './page2ctrl.php';

// $user = $_SESSION["id"];
$sql = "SELECT * FROM tbl_Course";
$result = mysqli_query($conn, $sql);

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
        <h1>
            Teacher
        </h1>
        <h3>
           
                Welcome <?php echo $_SESSION["Full_Name"]; ?>

        </h3>
       

        <br>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Add Course
        </button>

        <br>
        <br>
        <table>
        <tr>
            <th> Id</th>
            <th>Course Name</th>
            <th colspan="2">Action</th>


        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr class="<?php if (isset($classname)) echo $classname; ?>">
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["Course_Name"]; ?></td>
                <!-- <td><button type="submit" name="submit" value="submit"> Delete</button></td> -->
                <td><a class="btn btn-primary"  target="_blank" href="Edit-process.php?id=<?php echo $row["id"]; ?>">Edit</a></td>

                <td><a class="btn btn-danger" href="delete-process.php?id=<?php echo $row["id"]; ?>">Delete</a></td>

            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
     
    </div>
    <br>
    <br>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form method="post">

                        <table>
                            <tr>
                                <input type="text" value="Course_Name" name="Course_Name">
                                <input type="submit"  value="submit" name="submit" class="btn btn-primary"></input>

                            </tr>
                        </table>
                    </form>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
              
            </div>
        </div>
    </div>


<br><br><br>




</body>

</html>