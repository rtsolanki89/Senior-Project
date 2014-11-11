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
        $job_view = filter_input(INPUT_POST, 'search');
        $_SESSION['job_view'] = $job_view;
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
                    <a href="student.php" class="button"><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></a>
                </p>                
            </div> 
            <form action="search_jobs.php" class="sky-form" method="post">
                <section>
                    <label class="input">
                        <i class="icon-append icon-search"></i>
                        <input type="text" placeholder="What kind of job are you looking for? or You can search for Company Names" name="search">
                        <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                    </label>
                </section>                                          
            </form> 
            <table align="left">
                <td>
                    <div class="body">
                        <ul>				
                            <div class="typography">
                                <div class="sky-form" method="POST">
                                    <?php
                                    $job_search = mysql_query("select * from job_post where Job_ID = '$job_view'");
                                    while ($row = mysql_fetch_array($job_search)) {
                                        ?>
                                        <fieldset>
                                            <section>
                                                <label class="input">    
                                                    <?php
                                                    echo '<table>';

                                                    echo '<tr><td width="10%" height="32px">Job ID: </td>';
                                                    echo '<td width="40%">' . $row['Job_ID'] . '</td></tr>';

                                                    echo '<tr><td height="32px">Job Title: </td>';
                                                    echo '<td>' . $row['job_title'] . '</td></tr>';

                                                    echo '<tr><td height="32px">Company Name: </td>';
                                                    echo '<td>' . $row['company_name'] . '</td></tr>';

                                                    echo '<tr><td height="32px">Company Link: </td>';
                                                    echo '<td>' . $row['company_link'] . '</td></tr>';

                                                    echo '<tr><td height="32px">Country: </td>';
                                                    echo '<td>' . $row['city'] . ' ,' . $row['state'] . '</td></tr>';

                                                    echo '<tr><td height="32px">Pay: </td>';
                                                    echo '<td>' . $row['pay'] . '</td></tr>';

                                                    echo '<tr><td valign="top" height="32px">About This Job: </td>';
                                                    echo '<td>' . nl2br($row['about_job']) . '</td></tr>';

                                                    echo '<tr><td valign="top"  height="32px">Experience: </td>';
                                                    echo '<td>' . $row['experience'] . '</td></tr>';

                                                    echo '<tr><td valign="top" height="32px">Education: </td>';
                                                    echo '<td>' . nl2br($row['education']) . '</td></tr>';

                                                    echo '</table>';
                                                    ?>
                                                </label>
                                            </section>
                                        </fieldset>
                                        <?php
                                        echo '<footer>';
                                        echo '<form action = "student.php" class="sky-form">';
                                        echo '<button type = "submit" class = "button">Go Back</button>';
                                        echo '</form>';
                                        echo '</footer>';
                                    }
                                    if (!$job_search) {
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