<?php
session_start();
$message = "";
$ID = $_SESSION['ID'];
$file = filter_input(INPUT_POST, 'file');
$name = filter_input(INPUT_POST, 'resume');

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);


move_uploaded_file($_FILES["file"]["tmp_name"], $ID. '/' . $_FILES["file"]["name"]);
$resume = $ID. '/' . $_FILES["file"]["name"];


include 'database_connection.php';

$resume_upload = "update resume set resume_name='$resume', name='$name' where ID='$ID'";


$result_resume = mysql_query($resume_upload);

if (!$result_resume) {
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
