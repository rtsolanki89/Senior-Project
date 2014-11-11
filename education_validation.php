<?php
session_start();
$message = "";

$username = $_SESSION['username'];
$id = $_SESSION['ID'];
$school = filter_input(INPUT_POST, 'school');
$city = filter_input(INPUT_POST, 'city');
$postal = filter_input(INPUT_POST, 'postal');
$state = filter_input(INPUT_POST, 'state');
$country = filter_input(INPUT_POST, 'country');
$degree = filter_input(INPUT_POST, 'degree');
$major = filter_input(INPUT_POST, 'major');

$syear = filter_input(INPUT_POST, 'syear');
$smonth = filter_input(INPUT_POST, 'smonth');
$sdate = $syear . '/' . $smonth . '/' . '00';

$eyear = filter_input(INPUT_POST, 'eyear');
$emonth = filter_input(INPUT_POST, 'emonth');
$edate = $eyear . '/' . $emonth . '/' . '00';

$skills = filter_input(INPUT_POST, 'skills');
$add = filter_input(INPUT_POST, 'add_school');
include 'database_connection.php';

$education = "insert into education(ID,username,school,city,postal_code,state,country,start_date,end_date,degree,major,skills) "
        . "VALUES ('$id','$username','$school','$city','$postal','$state','$country','$sdate','$edate','$degree','$major','$skills')";
$result_education = mysql_query($education);

header('Location: experience_details.php');

if (!$result_education) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
}
?> 
</body>
</html>


