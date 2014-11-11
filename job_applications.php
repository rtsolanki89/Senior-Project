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
        $jobid = filter_input(INPUT_GET, 'job_id');
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
            <form action="search_jobs.php" class="sky-form" method="POST" ID="search">

                <section>
                    <label class="input">
                        <i class="icon-append icon-search"></i>
                        <input type="text" placeholder="" name="search" disabled="yes">
                        <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>

                    </label>
                </section>

            </form>
            <table align="left">
                <td>

                    <?php
                    $applications = mysql_query("select * from job_applications where Job_ID = '" . $jobid . "' and application_status = 'Pending'");
                    if (mysql_num_rows($applications) === 0) {
                        ?>
                        <div class="body">

                            <ul>				
                                <div class="typography">
                                    <div class="sky-form" method="POST">
                                        <header>Pending Applications</header>
                                        <fieldset>
                                            <section>
                                                <label class="input">    
                                                    <?php
                                                    echo '<h3 align="center">No Pending Applications</h3>';
                                                } else {
                                                    ?>
                                                    <div class="body">

                                                        <ul>				
                                                            <div class="typography">
                                                                <div class="sky-form" method="POST">
                                                                    <header>Pending Applications</header>

                                                                    <?php
                                                                    while ($row = mysql_fetch_array($applications)) {
                                                                        ?><fieldset>
                                                                            <section>
                                                                                <label class="input"> 

                                                                                    <?php
                                                                                    echo '<table width = "100%">';

                                                                                    echo '<tr><td width="60%" height="32px" align="center">Application ID: </td>';
                                                                                    echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>';
                                                                                    echo '<td width="40%" align="center">' . $row['application_id'] . '</td></tr>';

                                                                                    echo '<tr><td height="32px" align="center">Status: </td>';
                                                                                    echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>';
                                                                                    echo '<td align="center">' . $row['application_status'] . '</td></tr>';

                                                                                    echo '<tr> <td><hr></td> <td><hr></td> <td><hr></td> </tr>';
                                                                                    echo '<tr><td></td><td></td>';
                                                                                    echo '<td><form action="applicant_profile.php" method="POST"><button type="submit" class="button" value="' . $row['ID'] . '" name="ID">View Applicant Profile</button></form></td></tr>';
                                                                                    echo '</table>';
                                                                                    ?>
                                                                                </label>
                                                                            </section>
                                                                        </fieldset>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                    <?php
                                                }
                                                if (!$applications) {
                                                    echo 'DB ERROR';
                                                    echo 'MySQL ERROR' . mysql_error();
                                                }
                                                ?>

                                                </td>
                                                <td>

                                                    <?php
                                                    $applications = mysql_query("select * from job_applications where Job_ID = '" . $jobid . "' and application_status = 'In-Review'");
                                                    if (mysql_num_rows($applications) === 0) {
                                                        ?>
                                                        <div class="body">

                                                            <ul>				
                                                                <div class="typography">
                                                                    <div class="sky-form" method="POST">
                                                                        <header>In-Review Applications</header>
                                                                        <fieldset>
                                                                            <section>
                                                                                <label class="input">    
                                                                                    <?php
                                                                                    echo '<h3 align="center">No Applications In-Review</h3>';
                                                                                } else {
                                                                                    ?>
                                                                                    <div class="body">

                                                                                        <ul>				
                                                                                            <div class="typography">
                                                                                                <div class="sky-form" method="POST">
                                                                                                    <header>In-Review Applications</header>

                                                                                                    <?php
                                                                                                    while ($row = mysql_fetch_array($applications)) {
                                                                                                        ?><fieldset>
                                                                                                            <section>
                                                                                                                <label class="input"> 

                                                                                                                    <?php
                                                                                                                    echo '<table width = "100%">';

                                                                                                                    echo '<tr><td width="60%" height="32px" align="center">Application ID: </td>';
                                                                                                                    echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>';
                                                                                                                    echo '<td width="40%" align="center">' . $row['application_id'] . '</td></tr>';

                                                                                                                    echo '<tr><td height="32px" align="center">Status: </td>';
                                                                                                                    echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>';
                                                                                                                    echo '<td align="center">' . $row['application_status'] . '</td></tr>';

                                                                                                                    echo '<tr> <td><hr></td> <td><hr></td> <td><hr></td> </tr>';
                                                                                                                    echo '<tr><td></td><td></td>';
                                                                                                                    echo '<td><form action="applicant_profile.php" method="POST"><button type="submit" class="button" value="' . $row['ID'] . '" name="ID">View Applicant Profile</button></form></td></tr>';
                                                                                                                    echo '</table>';
                                                                                                                    ?>
                                                                                                                </label>
                                                                                                            </section>
                                                                                                        </fieldset>
                                                                                                    <?php } ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                                if (!$applications) {
                                                                                    echo 'DB ERROR';
                                                                                    echo 'MySQL ERROR' . mysql_error();
                                                                                }
                                                                                ?>

                                                                                </td> 
                                                                                                <td>

                    <?php
                    $applications = mysql_query("select * from job_applications where Job_ID = '" . $jobid . "' and application_status = 'Accepted'");
                    if (mysql_num_rows($applications) === 0) {
                        ?>
                        <div class="body">

                            <ul>				
                                <div class="typography">
                                    <div class="sky-form" method="POST">
                                        <header>Accepted Applications</header>
                                        <fieldset>
                                            <section>
                                                <label class="input">    
                                                    <?php
                                                    echo '<h3 align="center">No Applications Accepted</h3>';
                                                } else {?>
                                                    <div class="body">

                                                            <ul>				
                                                                <div class="typography">
                                                                    <div class="sky-form" method="POST">
                                                                        <header>Accepted Applications</header>
                                                                          
                                                                                    <?php
                                                    while ($row = mysql_fetch_array($applications)) {
                                                        ?><fieldset>
                                                                            <section>
                                                                                <label class="input"> 
                                                         
                                                                                    <?php
                                                                                    echo '<table width = "100%">';

                                                                                    echo '<tr><td width="60%" height="32px" align="center">Application ID: </td>';
                                                                                    echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>';
                                                                                    echo '<td width="40%" align="center">' . $row['application_id'] . '</td></tr>';

                                                                                    echo '<tr><td height="32px" align="center">Status: </td>';
                                                                                    echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>';
                                                                                    echo '<td align="center">' . $row['application_status'] . '</td></tr>';

                                                                                    echo '<tr> <td><hr></td> <td><hr></td> <td><hr></td> </tr>';
                                                                                    echo '<tr><td></td><td></td>';
                                                                                    echo '<td><form action="applicant_profile.php" method="POST"><button type="submit" class="button" value="' . $row['ID'] . '" name="ID">View Applicant Profile</button></form></td></tr>';
                                                                                    echo '</table>';
                                                                                        
                                                                                    ?>
                                                                                </label>
                                                                            </section>
                                                                        </fieldset>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                        <?php
                                                }
                                                if (!$applications) {
                                                    echo 'DB ERROR';
                                                    echo 'MySQL ERROR' . mysql_error();
                                                }
                                                ?>

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

