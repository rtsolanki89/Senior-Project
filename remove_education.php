<?php
session_start();
$message = "";

$username = $_SESSION['CurrentUser'];
$id = $_SESSION['ID'];
$school = filter_input(INPUT_POST, 'school');
include 'database_connection.php';

$education = "delete from education where school = '$school'";
$result_education = mysql_query($education);

header('Location: student.php');

if (!$result_education) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
}
?> 