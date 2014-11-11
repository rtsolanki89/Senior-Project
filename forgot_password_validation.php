<?php
session_start();
$message = "";
$email = filter_input(INPUT_POST, 'email');
$username = filter_input(INPUT_POST, 'username');
$security = filter_input(INPUT_POST, 'security');
$answer = md5(filter_input(INPUT_POST, 'answer'));
include 'database_connection.php';

$password = mysql_query("select * from login where username = '" . $username . "' and email='" . $email . "'");
            while ($row = mysql_fetch_array($password)) {
                $login_ID = $row['ID'];
                $login_email = $row['email'];
                $login_username = $row['mail'];
                $login_security = $row['security'];
                $login_answer = $row['answer'];
            }
            $_SESSION['ID'] = $login_ID;
            if($login_answer === $answer)
            {
                header('Location: change_password.php');
            }
 else {
     $message = "Wrong Answer !!!";
    echo "<script type='text/javascript'>alert('$message'); window.history.back();</script>";
 }
if (!$password) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
}
?> 
</body>
</html>
