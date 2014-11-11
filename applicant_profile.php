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
        <script type="text/javascript">
        </script>
    </head>

    <body class="bg-orange">

        <?php
        session_start();
        
        $ids = filter_input(INPUT_POST, 'ID');
        $_SESSION['applicant'] = $ids;
        $id = $_SESSION['applicant'];
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('location:index.php');
        }
        if (isset($_SESSION['CurrentUser'])) {
            $ID = $_SESSION['CurrentUser'];
            include 'database_connection.php';

            $student_details = mysql_query("select l.profession,l.email,"
                    . "p.first_name,p.last_name,p.dob,"
                    . "e.school,e.city,e.state,e.country,e.postal_code,e.start_date,e.end_date,e.degree,e.major,e.skills,"
                    . "er.company_name,er.company_link,er.title,er.description,er.enddate "
                    . "from login as l, "
                    . "user_profile as p,  "
                    . "education as e, "
                    . "experience as er "
                    . "where l.ID = p.ID and "
                    . "l.ID = e.ID and "
                    . "l.ID = er.ID "
                    . "and l.ID = '" . $id . "'"
                    . "ORDER BY e.end_date");
            
            while ($row = mysql_fetch_array($student_details)) {
                $profession = $row['profession'];
                $email = $row['email'];
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $dob = $row['dob'];

                $school = $row['school'];
                $city = $row['city'];
                $state = $row['state'];
                $country = $row['country'];
                $postal_code = $row['postal_code'];
                $start_date = $row['start_date'];
                $end_date = $row['end_date'];
                $degree = $row['degree'];
                $major = $row['major'];
                $skills = $row['skills'];

                $company = $row['company_name'];
                $clink = $row['company_link'];
                $title = $row['title'];
                $desc = $row['description'];
                $edate = $row['end_date'];
            }
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $today = new DateTime();
            $birthdate = new DateTime($dob);
            $interval = $today->diff($birthdate);
            $date = $interval->format('%y years');

            $test = new DateTime($end_date);
            if ($today < $test) {
                $end_date = "Currently Studying";
            } else {
                $end_date = "Holds Degree in";
            }
            ?> 

            <div class="sky-form">
                <p align="left"><img src="images/logo1.png">
                    <a href="index.php" class="button">Logout</a>
                    <a href="employer.php" class="button"><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></a>
                </p>                
            </div>  

            <table with="100%" align="left">
                <td valign="top">
                    <div class="body">
                        <ul>
                            <form action="change_status.php" class="sky-form" method="post" enctype="multipart/form-data">
                                <header align="center"><?php echo $fname . ' ' . $lname; ?></header>
                                <fieldset>  
                                    <section>
                                        <?php
                                        $photo_view = mysql_query("select * from profile_picture as p, login as l where p.ID = l.ID and p.ID = '" . $id . "'");
                                        if (mysql_num_rows($photo_view) === 0) {
                                            echo '<table width="100%">';
                                            echo '<td align="center"><img src = "images/empty.png" width="150px" height="150px"></td>';
                                            echo '</table>';
                                        } else {
                                            while ($row1 = mysql_fetch_array($photo_view)) {
                                                $photo = $row1['name'];
                                            }
                                            echo '<table width="100%">';
                                            echo '<td align="center"><img src = "' . $photo . '" width="150px" height="150px"></td>';
                                            echo '</table>';
                                        }
                                        ?>
                                    </section>
                                </fieldset>

                                <footer>  
                                    <?php 
                                    $astatus = mysql_query("Select * from job_applications where ID = '".$id."'");
                                    while ($row2 = mysql_fetch_array($astatus)) {
                                        $status = $row2['application_status'];
                                    }
                                    ?>
                                    <h2 align="center"><?php echo $status; ?></h2>
                                    <br>
                                    <section>
                                        <h3 align="center">Change Application Status</h3>
                        <label class="select">
                            <select name="application_status">
                                <option value="0" selected disabled>Status</option>
                                <option value="In-Review">In-Review</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            <i></i>
                        </label>
                    </section>
                                    <button type="submit" class="button">Change Status</button>
                                </footer>
                                
                            </form>
                        </ul>
                    </div>
                    <div class="body">
                        <ul>	
                            <form action="upload_resume.php" class="sky-form" method="post" enctype="multipart/form-data">
                                <header align="center">Applicant Resume</header>
                                <fieldset>  
                                    <section>
                                        <?php
                                        $resume_view = mysql_query("select * from resume as r, login as l where r.ID = l.ID and r.ID = '" . $id . "'");
                                            while ($row1 = mysql_fetch_array($resume_view)) {

                                                $resume = $row1['name'];
                                            }
                                            if ($resume === NULL) {
                                                echo '<h3 align="center">No Resume Uploaded</h3>';
                                            } else if ($resume === '') {
                                                echo '<h3 align="center">Name Not Given' . $resume . '</h3>';
                                            }
                                            else {
                                                echo '<h3 align="center"><a href="applicant_resume_view.php">' . $resume . '</a></h3>';
                                            }
                                        
                                        ?>
                                    </section>
                                </fieldset>

                                <footer>   
                                </footer>

                            </form>
                        </ul>
                    </div> 
                </td>
                <td valign="top" widht="60%" align="left">
                    <div class="body">
                        <ul>	
                            <form action="forgot_password.php" method="POST" onsubmit="return validation_password()" id="password"></form>
                            <form action="edit_information.php" class="sky-form">
                                <header>Applicant Personal Details</header>
                                <fieldset>
                                    <section>
                                        <label class="input">    
                                            <?php
                                            echo '<table width="100%">';
                                            echo '<tr><td width="25%" height="32px">Name: </td>';
                                            echo '<td width="50%" height="32px">' . $fname . ' ' . $lname . '</td></tr>';
                                            echo '<tr><td height="32px">Profession: </td>';
                                            echo '<td height="32px">' . $_SESSION['profession'] . '</td></tr>';
                                            echo '<tr><td height="32px">' . 'Age: </td>';
                                            echo '<td height="32px">' . $date . '</td></tr>';
                                            echo '<tr><td height="32px">School: </td>';
                                            echo '<td height="32px">' . $school . ', ' . $city . ' (' . $postal_code . ')' . ', ' . $state . ', ' . $country . '</td></tr>';
                                            echo '<tr><td height="32px">Education: </td>';
                                            echo '<td height="32px">' . $end_date . ' - ' . $degree . ' (' . $major . ')</td></tr>';
                                            echo '<tr><td height="32px">Skills:</td>';
                                            echo '<td height="32px">' . nl2br($skills) . '</td></tr>';
                                            if ($company === "NONE") {
                                                echo '<tr><td height="32px"><p>Experience: </td>';
                                                echo '<td height="32px">None<br></td></tr>';
                                            } else {
                                                echo '<tr><td height="32px">Experience : </td>';
                                                echo '<td height="32px">' . $title . ' at ' . $company . '</td></tr>';
                                            }
                                            echo '</table>';
                                            ?>
                                        </label>
                                    </section>
                                </fieldset>

                                <footer>
                                </footer>
                            </form>
                        </ul>
                    </div>
                    <div class="body">
                        <ul>	
                            <form action="edit_information.php" class="sky-form">
                                <header>Applicant Experience</header>
                                <fieldset>
                                    <section>
                                        <label class="input">    
                                            <?php
                                            $Experience_details = mysql_query("select * "
                                                    . "from login as l , experience as er "
                                                    . "where l.ID = er.ID and er.ID = '" . $id . "'");
                                            while ($row = mysql_fetch_array($Experience_details)) {

                                                echo '<table width="100%">';
                                                if ($company === "NONE") {
                                                    echo '<tr><td width="25%" height="32px"><p>Experience: </td>';
                                                    echo '<td height="32px">None<br></td></tr>';
                                                } else {
                                                    echo '<tr><td width="25%" height="32px">Working For: </td>';
                                                    echo '<td height="32px">' . $row['company_name'] . ', ' . $row['city'] . ' (' . $row['postalcode'] . ')' . ', ' . $row['state'] . ', ' . $row['country'] . '</td></tr>';
                                                    echo '<tr><td height="32px">Company Link: </td>';
                                                    echo '<td height="32px"><a href = "http://' . $clink . '">' . $clink . '</a></td></tr>';
                                                    echo '<tr><td height="32px">' . 'Title: </td>';
                                                    echo '<td height="32px">' . $row['title'] . '</td></tr>';
                                                    echo '<tr><td height="32px">Description: </td>';
                                                    echo '<td height="32px">' . $row['description'] . '</td></tr>';
                                                }
                                                echo '</table>';
                                            }
                                            ?>
                                        </label>
                                    </section>
                                </fieldset>

                                <footer>
                                </footer>
                            </form>
                        </ul>
                    </div> 
                </td>
                <td width="40%" align="left" valign="top">
                    <div class = "body">
                        <ul>
                            <form class = "sky-form">
                                <header>Applicant Education Details</header>
                                <?php
                                $i = 1;
                                $education_details = mysql_query("select l.profession,"
                                        . "e.school,e.city,e.state,e.country,e.postal_code,"
                                        . "e.start_date,e.end_date,e.degree,e.major,e.skills "
                                        . "from login as l, education as e "
                                        . "where l.ID = e.ID and l.ID = '" . $id . "'");

                                while ($row1 = mysql_fetch_array($education_details)) {
                                    $school = $row1['school'];
                                    $city = $row1['city'];
                                    $state = $row1['state'];
                                    $country = $row1['country'];
                                    $postal_code = $row1['postal_code'];
                                    $start_date = $row1['start_date'];
                                    $end_date = $row1['end_date'];
                                    $degree = $row1['degree'];
                                    $major = $row1['major'];
                                    $skills = $row1['skills'];

                                    $test = new DateTime($end_date);
                                    if ($today < $test) {
                                        $end_date = "Currently Studying";
                                    } else {
                                        $end_date = "Holds Degree in";
                                    }
                                    echo '<fieldset>';
                                    echo '<section>';
                                    echo '<label class = "input">';
                                    echo '<table width="100%">';
                                    echo '<tr><th valign="top" width="10%">' . $i ++ . ':  </th>';
                                    echo '<th align="left" width="50%">' . $school . ', ' . $city . ', ' . $state . ', ' . $country . '</th></tr>';
                                    echo '<tr><td></td><td>' . $degree . '</td></tr>';
                                    echo '<tr><td></td><td>' . $major . '</td></tr>';
                                    echo '<tr><td></td><td>' . $end_date . ' - ' . $degree . ' (' . $major . ') </td></tr>';
                                    echo '<td></td><td></td>';
                                    echo '<td></td><td></td>';
                                    echo '</table>';
                                    echo '</label>';
                                    echo '</section>';
                                    echo '</fieldset>';
                                    ?>
                                <?php }
                                ?>
                                <footer>         
                                </footer>

                            </form>
                        </ul>
                    </div> 
                    <div class="body">
                        <ul>	
                            <form action="my_job.php" class="sky-form" method="POST">
                                <header>Answer Submitted by Applicant</header>

                                <?php
                                $j = 1;
                                $jobs = mysql_query("select * from job_applications where ID = '" . $id . "'");

                                while ($row1 = mysql_fetch_array($jobs)) {
                                    $application_status = $row1['application_status'];
                                    echo '<fieldset>';
                                    echo '<section>';
                                    echo '<label class = "input">';
                                    echo '<table width="100%">';
                                    echo '<tr><th valign="top" width="10%">' . $j ++ . ':  </th>';
                                    echo '<th width = "30%">Answer 1:</th><th> ' . nl2br($row1['answer1']) . '</th></tr>';
                                    echo '<th></th><th width = "25%">Answer 2:</th><th> ' . nl2br($row1['answer2']) . '</th></tr>';
                                    echo '<tr><th></th><th >Answer 3:</th><th> ' . nl2br($row1['answer3']) . '</th></tr>';
                                    echo '<tr><th></th><th >Answer 4:</th><th> ' . nl2br($row1['answer4']) . '</th></tr>';
                                    echo '<tr><th></th><th >Answer 5:</th><th> ' . nl2br($row1['answer5']) . '</th></tr>';
                                    echo '</table>';
                                    echo '</label>';
                                    echo '</section>';
                                    echo '</fieldset>';
                                    ?>
                                    <footer>         
                                    </footer>
                                    <?php
                                }
                                ?>

                            </form>
                        </ul>
                    </div>                   
                </td>
            </table>
            <!--/ tabs -->
            <?php
        } else {
            header('location:index.php');
        }
        ?>

    </body>
</html>