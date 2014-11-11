<html>
    <head>
        <meta charset="utf-8">		
        <title>Job Traxs</title>
                <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/forms.css">
    </head>
    <body class="bg-red">


        <?php
        session_start();
        $jobid = filter_input(INPUT_POST, 'job_id');
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('location:index.php');
        }
        if (isset($_SESSION['CurrentUser'])) {
            $ID = $_SESSION['CurrentUser'];
            include 'database_connection.php';
            ?>
            <div class="sky-form">
                <p align="left"><img src="images/logo1.png">
                    <a href="index.php" class="button">Logout</a>
                    <a href="employer.php" class="button"><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></a>
                </p>                
            </div> 
            <table align="left">
                <td>
                    <div class="body">
                        <ul>				
                            <div class="typography">
                                <div class="sky-form" method="POST">
                                    <?php
                                    $applications = mysql_query("select * from "
                                            . "job_post as jp,"
                                            . "job_applications as ja"
                                            . "where ja.Job_ID = jp.Job_ID"
                                            . "jp.ID = '" . $jobid . "'");
                                    while ($row = mysql_fetch_array($applications)) {
                                        ?>
                                        <fieldset>
                                            <section>
                                                <label class="input">    
                                                    <?php
                                                    echo '<table>';

                                                    echo '<tr><td width="10%" height="32px">Job ID: </td>';
                                                    echo '<td width="40%">' . $row['Job_ID'] . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '<tr><td height="32px">Job Title: </td>';
                                                    echo '<td>' . $row['job_title'] . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '<tr><td height="32px">Company Name: </td>';
                                                    echo '<td>' . $row['company_name'] . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '<tr><td height="32px">Company Link: </td>';
                                                    echo '<td>' . $row['company_link'] . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '<tr><td height="32px">Country: </td>';
                                                    echo '<td>' . $row['city'] . ' ,' . $row['state'] . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '<tr><td height="32px">Pay: </td>';
                                                    echo '<td>' . $row['pay'] . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '<tr><td valign="top" height="32px">About This Job: </td>';
                                                    echo '<td>' . nl2br($row['about_job']) . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';
                                                    
                                                    echo '<tr><td valign="top" height="32px">Preferred Skills: </td>';
                                                    echo '<td>' . nl2br($row['preferred_skills']) . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '<tr><td valign="top"  height="32px">Experience: </td>';
                                                    echo '<td>' . $row['experience'] . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '<tr><td valign="top" height="32px">Education: </td>';
                                                    echo '<td>' . nl2br($row['education']) . '</td></tr>';
                                                    
                                                    echo '<tr><td><hr></td><td><hr></td></tr>';

                                                    echo '</table>';
                                                    ?>
                                                </label>
                                            </section>
                                        </fieldset>
                                        <?php
                                        echo '<footer>';
                                        echo '<form action = "job_questions.php" method = "POST" class="sky-form">';
                                        echo '<input type = "hidden" name = "view" value = "' . $row['Job_ID'] . '">';
                                        echo '<button type = "submit" class = "button">Apply Job</button>';
                                        echo '</form>';
                                        echo '<form action = "search_jobs.php" method = "POST" class="sky-form">';
                                        echo '<input type = "hidden" name = "search" value = "' . $_SESSION['search'] . '">';
                                        echo '<button type = "submit" class = "button">Go Back</button>';
                                        echo '</form>';
                                        echo '</footer>';
                                    }
                                    if (!$applications) {
                                        echo 'DB ERROR';
                                        echo 'MySQL ERROR' . mysql_error();
                                    }
                                    ?>
                                </div>
                            </div>
                        </ul>
                    </div>
                </td>
            </table>
            <?php
        } else {
            header('location:index.php');
        }
        ?>
    </div>
</div>	
</ul>
</div>   
</body>
</html>

