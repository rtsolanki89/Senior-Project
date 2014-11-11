<?php
session_start();
$message = "";
$application_id = uniqid();
$job_id = $_SESSION['view'];
$ID = $_SESSION['ID'];
$a1 = filter_input(INPUT_POST, 'a1');
$a2 = filter_input(INPUT_POST, 'a2');
$a3 = filter_input(INPUT_POST, 'a3');
$a4 = filter_input(INPUT_POST, 'a4');
$a5 = filter_input(INPUT_POST, 'a5');


include 'database_connection.php';

$job_submit = "insert into job_applications(application_id,Job_ID,ID,answer1,answer2,answer3,answer4,answer5,application_status) "
        . "VALUES ('$application_id','$job_id','$ID','$a1','$a2','$a3','$a4','$a5','Pending')";


$result_job_submit = mysql_query($job_submit);

if (!$result_job_submit) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
} else {
    header('Location: student.php');
}
?> 
</body>
</html>