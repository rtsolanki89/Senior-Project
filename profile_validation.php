<?php

session_start();
$username = filter_input(INPUT_POST, 'username');
$password = md5(filter_input(INPUT_POST, 'password'));
$user = "";
$passw = "";
$profession = "";
$today;
include 'database_connection.php';
// Login Validation Query
$result = mysql_query("select * from login where username ='$username' and password = '$password'");
while ($row = mysql_fetch_array($result)) {
    $profession = $row['profession'];
    $user = $row['username'];
    $email = $row['email'];
    $passw = $row['password'];
    $id = $row['ID'];
}
$_SESSION['profession'] = $profession;
$_SESSION['CurrentUser'] = $user;
$_SESSION['ID'] = $id;
if ($username == $user && $password == $passw) {
    if ($_SESSION['profession'] === "Student") {
        header('Location: student.php');
    } else if ($_SESSION['profession'] === "Employer") {
        header('Location: employer.php');
    }
} else {
    $message = "Wrong Username/Password !!!";
    echo "<script type='text/javascript'>alert('$message'); window.history.back();</script>";
}
 