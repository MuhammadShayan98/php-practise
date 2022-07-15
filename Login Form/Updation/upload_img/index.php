<!DOCTYPE html>
<html>

<head>
    <title>Insert Image in MySql using PHP</title>
</head>

<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>
    <?php
    // Include the database configuration file
    include '../../registrationdb.php';

    // Get images from the database
    $query = $conn->query("SELECT * FROM images ORDER BY uploaded_on DESC");

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $imageURL = 'upload/' . $row["file_name"];
    ?>
            <img src="<?php echo $imageURL; ?>" alt="" / width="50px">
        <?php }
    } else { ?>
        <p>No image(s) found...</p>
    <?php } ?>
</body>
</htm