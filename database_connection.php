<?php
$login = "root";
$pass = "Bullshit89@";
$db = "project";

// MySql Connection
if(!$link = mysql_connect("localhost", $login, $pass))     
{
    echo 'Could not connect to SQl';
    exit;
}
// Database Connection
if(!mysql_select_db($db, $link))
{
    echo 'Could not select database';
    exit;
}

