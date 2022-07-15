<?php
session_start();
include '../registrationdb.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Admin Dasboard</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->

                <?php
                if ($_SESSION['Admin_Name']) {
                ?>
                    <li>
                        <a href="logout.php" tite="Logout">
                            <span class="glyphicon glyphicon-log-in"></span>

                        <?php
                    } else {
                        header("Location:login.php");
                    }
                        ?>
                        Logout</a>
                    </li>



            </ul>
        </div>
    </nav>

    <div class="container">

        <h2 align="center">
            Welcome <?php echo $_SESSION['Admin_Name']; ?>.
        </h2>
        <h3 align="center">Manage Users</h3>
        <br>

        <table>
            <tr>
                <th>ID</th>
                <th>Full_Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php $sql = $conn->query("Select * from tbl_users");
            foreach ($sql as $key => $data) {
            ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['Full_Name']; ?></td>
                    <td><?php echo $data['Role']; ?></td>
                    <td>
                        <?php if ($data['Status_Check'] == "1") {
                            echo "<a href=inactive.php?id=" . $data['id'] . "  class='btn btn-danger '>inactive</a>";
                        } else {
                            echo "<a href=active.php?id=" . $data['id'] . " class='btn btn-success'>active</a>";
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>

    </div>

</body>

</html>