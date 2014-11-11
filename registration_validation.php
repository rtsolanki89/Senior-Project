<?php
session_start();
$message = "";
$id = uniqid();
$_SESSION['ID'] = $id;
$profession = filter_input(INPUT_POST, 'profession');
$_SESSION['profession'] = $profession;
$email = filter_input(INPUT_POST, 'email');
$_SESSION['email'] = $email;
$username = filter_input(INPUT_POST, 'username');
$_SESSION['username'] = $username;
$password = md5(filter_input(INPUT_POST, 'password'));
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$year = filter_input(INPUT_POST, 'year');
$month = filter_input(INPUT_POST, 'month');
$day = filter_input(INPUT_POST, 'day');
$dob = $year . '/' . $month . '/' . $day;
$gender = filter_input(INPUT_POST, 'gender');
$security = filter_input(INPUT_POST, 'security');
$answer = md5(filter_input(INPUT_POST, 'answer'));
include 'database_connection.php';

$sql = "select * from login where username = '$username'";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
if (mysql_num_rows($query)) {
    $message = " Username or Email already registered";
    echo "<script type='text/javascript'>alert('$message'); window.history.back();</script>";
} else {
    $login = "insert into login(ID,profession,username,email,password,security,answer) "
            . "VALUES ('$id','$profession','$username','$email','$password','$security','$answer')";
    $result_login = mysql_query($login);

    $profile = "insert into user_profile(ID,username,first_name,last_name,gender,dob) "
            . "VALUES ('$id','$username','$fname','$lname','$gender','$dob')";
    $result_profile = mysql_query($profile);
    mkdir("$id");
}
if ($_SESSION['profession'] === "Student") {
    header('Location: education_details.php');
} else if ($_SESSION['profession'] === "Employer") {
    header('Location: experience_details.php');
}

if (!$result_profile) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
}
?> 
</body>
</html>

