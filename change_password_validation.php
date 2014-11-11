<?php
session_start();
$message = "";
$ID = $_SESSION['ID'];
$password = md5(filter_input(INPUT_POST, 'repassword'));
include 'database_connection.php';

$change_password = "update login set password='$password' where ID='$ID'";


$result_change_password = mysql_query($change_password);

if (!$result_change_password) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
} else {
    $message = "Password Changed Successfully";
    echo "<script type='text/javascript'>alert ('$message'); </script>";
    header('location:index.php');
}
?> 
</body>