<?php
session_start();
$message = "";
$ID = $_SESSION['applicant'];
$file = filter_input(INPUT_POST, 'application_status');

include 'database_connection.php';

$status = "update job_applications set application_status='$file' where ID='$ID'";


$result_status = mysql_query($status);

if (!$result_status) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
} else {
    $message = "Application Status Changed to " . $file . "";
    echo "<script type='text/javascript'>alert ('$message'); window.history.go(-2); </script>";
}
?> 
</body>
</html>