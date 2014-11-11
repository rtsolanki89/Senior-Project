<?php
session_start();
$message = "";

$username = $_SESSION['username'];
$id = $_SESSION['ID'];
$comapny = filter_input(INPUT_POST, 'company');
$clink = filter_input(INPUT_POST, 'clink');
$title = filter_input(INPUT_POST, 'title');
$desc = filter_input(INPUT_POST, 'desc');

$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$country = filter_input(INPUT_POST, 'country');
$postal = filter_input(INPUT_POST, 'postal');

$syear = filter_input(INPUT_POST, 'syear');
$smonth = filter_input(INPUT_POST, 'smonth');
$sdate = $syear . '/' . $smonth . '/' . '00';

$eyear = filter_input(INPUT_POST, 'eyear');
$emonth = filter_input(INPUT_POST, 'emonth');
$edate = $eyear . '/' . $emonth . '/' . '00';

$checkbox = filter_input(INPUT_POST, 'checkbox');
include 'database_connection.php';

if ($comapny === '' || $clink === '' || $title === '' || $desc === '' || $city === '' || $state === '' || $country === '' || $postal === '' || $sdate === '' || $edate === '') {
    $comapny = $clink = $title = $desc = $city = $state = $country = "NONE";
    $postal = "000000";
    $sdate = $edate = "00/00/00";
}
else if ($checkbox === 'checked')
{
    $edate = "00/00/00";
}
$education = "insert into experience(ID,username,company_name,company_link,title,description,city,state,country,postalcode,startdate,enddate) "
        . "VALUES ('$id','$username','$comapny','$clink','$title','$desc','$city','$state','$country','$postal','$sdate','$edate')";
$result_education = mysql_query($education);

$photo = "insert into profile_picture(ID,name)"
        . "values('$id','images/empty.png')";
$result_photo = mysql_query($photo);

$resume = "insert into resume(ID,resume_name,name)"
        . "values('$id','null','null')";
$result_resume = mysql_query($resume);

   $to = $_SESSION['email'];
   $subject = "Thank You !!!";
   $body = "Thank you very much for taking your time to register at Jobtraxs Recruitment System. 
                    
Sincerely
Team Jobtraxs.";
   $header = "From:jobtraxsrecruitmentsystem@gmail.com \r\n";
   mail ($to,$subject,$body,$header);

if ($result_education) {
    header('Location: index.php');
} else if (!$result_education) {
    echo 'DB ERROR';
    echo 'MySQL ERROR' . mysql_error();
    exit();
}
?> 
</body>
</html>


