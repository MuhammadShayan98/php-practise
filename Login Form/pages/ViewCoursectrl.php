<?php
function View_Course()
{
    include '../registrationdb.php';

    $sql = 'SELECT * FROM tbl_Course';
    $result = mysqli_query($conn, $sql);
    return $result;
}
