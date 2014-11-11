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
            $show = mysql_query("select l.profession,l.email,p.first_name,p.last_name,p.dob,e.school,e.city,e.state,e.country,e.postal_code,e.end_date,e.degree,e.major,e.skills,"
                    . "er.company_name,er.company_link,er.title,er.description,er.enddate "
                    . "from profile as p, login as l, education as e, experience as er "
                    . "where l.username = p.username = e.username = er.username and l.username = '" . $username . "'");
            while ($row1 = mysql_fetch_array($show)) {
                $profession = $row1['profession'];
                $email = $row1['email'];
                $fname = $row1['first_name'];
                $lname = $row1['last_name'];
                $dob = $row1['dob'];
                $school = $row1['school'];
                $city = $row1['city'];
                $state = $row1['state'];
                $country = $row1['country'];
                $postal_code = $row1['postal_code'];
                $end_date = $row1['end_date'];
                $degree = $row1['degree'];
                $major = $row1['major'];
                $skills = $row1['skills'];
                $company = $row1['company_name'];
                $clink = $row1['company_link'];
                $title = $row1['title'];
                $desc = $row1['description'];
                $edate = $row1['end_date'];
            }
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
                    <a href="index.php" class="button">Job Applied</a>
                    <a href="index.php" class="button">Job Search</a>
                    <a href="student.php" class="button"><?php echo $fname . ' ' . $lname; ?></a>
                </p>                
            </div>  
            <div class="body">
                <ul>				
                    <div class="typography">
                        <form action="edit_information.php" class="sky-form">
                            <header>Edit Personal Details</header>
                            <fieldset>
                                <section>
                                    <label class="input">    
                                        <?php
                                        ?>
                                    </label>
                                </section>
                            </fieldset>

                            <footer>
                                <a href="">Update Personal Details</a>
                            </footer>
                        </form>
                    </div>	
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