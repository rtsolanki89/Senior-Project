<?php
session_start();
$message = "";

$username = $_SESSION['CurrentUser'];
$job_id = uniqid();
$id = $_SESSION['ID'];
$jtitle = filter_input(INPUT_POST, 'jtitle');
$cname = filter_input(INPUT_POST, 'cname');
$clink = filter_input(INPUT_POST, 'clink');

$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$pay = filter_input(INPUT_POST, 'pay');
$about = filter_input(INPUT_POST, 'about');
$skills = filter_input(INPUT_POST, 'skills');
$experience = filter_input(INPUT_POST, 'experience');
$education = filter_input(INPUT_POST, 'education');

$q1 = filter_input(INPUT_POST, 'q1');
$q2 = filter_input(INPUT_POST, 'q2');
$q3 = filter_input(INPUT_POST, 'q3'); 
$q4 = filter_input(INPUT_POST, 'q4');
$q5 = filter_input(INPUT_POST, 'q5');

include 'database_connection.php';


$job_post = "insert into job_post(Job_ID,ID,username,job_title,company_name,company_link,city,state,pay,about_job,preferred_skills,experience,education,question1,question2,question3,question4,question5,status) "
        . "VALUES ('$job_id','$id','$username','$jtitle','$cname','$clink','$city','$state','$pay','$about','$skills','$experience','$education','$q1','$q2','$q3','$q4','$q5','Active')";
$result_job_post = mysql_query($job_post);
if (!$result_job_post) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
} else {
    $message = "Job Posted";
    echo "<script type='text/javascript'>alert ('$message'); window.history(-1);</script>";
}
?> 
</body>
</html>


