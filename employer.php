<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">		
        <title>Job Traxs</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/tabs.css">
        <link rel="stylesheet" href="css/forms.css">
    </head>

    <body class="bg-cyan">
        <?php
        session_start();
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('location:index.php');
        }
        if (isset($_SESSION['CurrentUser'])) {
            $username = $_SESSION['CurrentUser'];
            include 'database_connection.php';
            $employee = mysql_query("select p.first_name,p.last_name,p.dob,er.company_name,er.company_link,er.title,er.description,er.enddate "
                    . "from user_profile as p, login as l,  experience as er "
                    . "where l.username = p.username and l.username = er.username and l.username = '" . $username . "'");
            while ($row = mysql_fetch_array($employee)) {
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $dob = $row['dob'];
                $company = $row['company_name'];
                $clink = $row['company_link'];
                $title = $row['title'];
                $desc = $row['description'];
                $edate = $row['enddate'];
            }
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            if (!$employee) {
                echo 'DB ERROR';
                echo 'MySQL ERROR' . mysql_error();
                exit();
            }

            $today = new DateTime();
            $birthdate = new DateTime($dob);
            $interval = $today->diff($birthdate);
            $date = $interval->format('%y years');
            ?>    
            <div class="sky-form">
                <p align="left"><img src="images/logo1.png"><a href="index.php" class="button">Logout</a></p> 
            </div>  
            <div class="body">

                <!-- tabs -->
                <div class="sky-tabs sky-tabs-amount-4 sky-tabs-pos-top-justify sky-tabs-anim-flip sky-tabs-response-to-icons">
                    <input type="radio" name="sky-tabs" checked id="sky-tab1" class="sky-tab-content-1">
                    <label for="sky-tab1"><span><span><i class="fa fa-user-md"></i>Profile</span></span></label>

                    <input type="radio" name="sky-tabs" id="sky-tab2" class="sky-tab-content-2">
                    <label for="sky-tab2"><span><span><i class="fa fa-upload"></i>Host Job</span></span></label>

                    <input type="radio" name="sky-tabs" id="sky-tab3" class="sky-tab-content-3">
                    <label for="sky-tab3"><span><span><i class="fa fa-save"></i>Job Hosted</span></span></label>


                    <ul>
                        <li class="sky-tab-content-1">					
                            <div class="typography">
                                <form action="" class="sky-form">
                                    <header>Personal Details</header>
                                    <fieldset>
                                        <section>
                                            <label class="input">
                                                <?php
                                                echo '<p>' . $fname . ' ' . $lname . ' (' . ' ' . $_SESSION['profession'] . ') </p>';
                                                echo '<p>' . 'Age: ' . $date . ' </p>';
                                                echo '<p>Experience : ' . $title . ' at ' . $company . '</p>';
                                                echo '<p>Company Link : <a href = "http://' . $clink . '">' . $clink . '</a></p>';
                                                echo '<p>Description : ' . nl2br($desc) . '</p>';
                                                ?>
                                            </label>
                                        </section>
                                    </fieldset>
                                </form>
                            </div>
                        </li>

                        <li class="sky-tab-content-2">
                            <div class="typography">
                                <form action="job_post_submit.php" class="sky-form" method="post">
                                    <header>Host Job</header>

                                    <fieldset>					
                                        <section>
                                            <label class="input">
                                                <i class="icon-append icon-anchor"></i>
                                                <input type="text" placeholder="Job Title" name="jtitle">
                                                <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                                            </label>
                                        </section>

                                        <section>
                                            <label class="input">
                                                <i class="icon-append icon-user-md"></i>
                                                <input type="text" placeholder="Company Name" name="cname">
                                                <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                                            </label>
                                        </section>

                                        <section>
                                            <label class="input">
                                                <i class="icon-append icon-link"></i>
                                                <input type="text" placeholder="Company Link" name="clink">
                                                <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                                            </label>
                                        </section>   

                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="input">
                                                    <input type="text" placeholder="City" name="city">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="input">
                                                    <input type="text" placeholder="State" name="state">
                                                </label>
                                            </section>
                                            <section class="col col-4">
                                                <label class="input">
                                                    <i class="icon-append icon-money"></i>    
                                                    <input type="text" placeholder="Pay ($Min - $Max)" name="pay">
                                                </label>
                                            </section>    
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <section>
                                            <label class="label">About this Job</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="10" name="about"></textarea>
                                            </label>
                                        </section> 

                                        <section>
                                            <label class="label">Preferred Skills</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="5" name="skills"></textarea>
                                            </label>
                                        </section> 

                                        <section>
                                            <label class="label">Experience</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="2" name="experience"></textarea>
                                            </label>
                                        </section>     

                                        <section>
                                            <label class="label">Education Requirement</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="2" name="education"></textarea>
                                            </label>
                                        </section>

                                        <section>
                                            <label class="label">Question 1:</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="1" name="q1"></textarea>
                                            </label>
                                        </section> 

                                        <section>
                                            <label class="label">Question 2:</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="1" name="q2"></textarea>
                                            </label>
                                        </section> 

                                        <section>
                                            <label class="label">Question 3:</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="1" name="q3"></textarea>
                                            </label>
                                        </section> 

                                        <section>
                                            <label class="label">Question 4:</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="1" name="q4"></textarea>
                                            </label>
                                        </section> 
                                        
                                        <section>
                                            <label class="label">Question 5:</label>
                                            <label class="textarea">
                                                <i class="icon-append icon-comment"></i>
                                                <textarea rows="1" name="q5"></textarea>
                                            </label>
                                        </section>                                         
                                    </fieldset>
                                    <footer>
                                        <button type="submit" class="button">Submit</button>
                                    </footer>
                                </form>
                            </div>
                        </li>

                        <li class="sky-tab-content-3">
                            <div class="typography">
                                <?php
                                $job_post = mysql_query("select * from job_post where username='" . $username . "'");
                                while ($row1 = mysql_fetch_array($job_post)) {
                                    $Job_ID = $row1['Job_ID'];
                                    $job_title = $row1['job_title'];
                                    $company_name = $row1['company_name'];
                                    $pay = $row1['pay'];
                                    $status = $row1['status']
                                    ?>            
                                <form action="job_applications.php" class="sky-form" method="GET">
                                        <header><?php echo $job_title; ?></header>
                                        <fieldset>
                                            <section>
                                                <label class="input">
                                                    <?php
                                                    echo '<p>Job ID: ' . $Job_ID . '</p>';
                                                    echo '<p>Job Title: ' . $job_title . '</p>';
                                                    echo '<p>Company Name: ' . $company_name . '</p>';
                                                    echo '<p>Pay: ' . $pay . '</p>';
                                                    echo '<p>Job Status: ' . $status . '</p>';
                                                    ?>                                                    
                                                </label>
                                            </section>
                                        </fieldset>
                                    <footer>        
                                        <button type="submit" class="button" name="job_id" value="<?php echo $Job_ID ?>">Application Received</button>                                        
                                    </footer>                                        
                                    </form> 
                                <br>
                                <?php } ?>
                            </div>
                        </li>					
                    </ul>
                </div>
                <!--/ tabs -->

            </div>
            <?php
        } else {
            header('location:index.php');
        }
        ?>
    </body>
</html>