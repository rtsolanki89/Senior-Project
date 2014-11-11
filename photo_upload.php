<?php
session_start();
$message = "";
$ID = $_SESSION['ID'];
$file = filter_input(INPUT_POST, 'file');

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);


move_uploaded_file($_FILES["file"]["tmp_name"], $ID. '/' . $_FILES["file"]["name"]);
$photo = $ID. '/' . $_FILES["file"]["name"];


include 'database_connection.php';

$photo_upload = "update profile_picture set name='$photo' where ID='$ID'";


$result_photo = mysql_query($photo_upload);

if (!$result_photo) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
} else {
    $message = "Photo Uploaded";
    echo "<script type='text/javascript'>alert ('$message'); </script>";
    header('location:student.php');
}
?> 
</body>
</html>