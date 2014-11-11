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
            function validation()
            {
                var retVal = confirm("Do you want to continue ?");
                if (retVal == true) {
                    return true;
                } else {
                    return false;
                }
            }
            function validation_password()
            {
                var retVal = confirm("Do you want to continue?");
                if (retVal == true) {
                    return true;
                } else {
                    return false;
                }
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </head>

    <body class="bg-orange">
        
        <?php
        session_start();
        $id = $_SESSION['ID'];
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('location:index.php');
        }
        if (isset($_SESSION['CurrentUser'])) {
            $ID = $_SESSION['CurrentUser'];?>
            <div class="sky-form">
                <p align="left"><img src="images/logo1.png">
                    <a href="index.php" class="button">Logout</a>
                    <a href="student.php" class="button"><?php echo $fname . ' ' . $lname; ?></a>
                </p>                
            </div>  
            <table width="100%">
                <td><form action="search_jobs.php" class="sky-form" method="POST" ID="search">

                        <section>
                            <label class="input">
                                <i class="icon-append icon-search"></i>
                                <input type="text" placeholder="What kind of job are you looking for? or You can search for Company Names" name="search">
                                <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>

                            </label>
                        </section>

                    </form></td>
            </table>   
        <div class="body body-s">

            <form action="forgot_password_validation.php" class="sky-form" method="post" name="login" onsubmit="return validation_login()">
                <header>Forgot Password</header>

                <fieldset>					
                    <section>
                        <label class="input">
                            <i class="icon-append icon-user"></i>
                            <input type="text" placeholder="Username" name="username">
                            <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                        </label>
                    </section>

                    <section>
                        <label class="input">
                            <i class="icon-append icon-envelope-alt"></i>
                            <input type="email" placeholder="Email address" name="email">
                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                        </label>
                    </section>

                    <section>
                        <label class="select">
                            <select name="security">
                                <option value="0" selected disabled>Security Question</option>
                                <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend? </option>
                                <option value="What is the middle name of your oldest child?">What is the middle name of your oldest child?</option>
                            </select>
                            <i></i>
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <i class="icon-append icon-lock"></i>
                            <input type="text" placeholder="Security Question Answer" name="answer">
                            <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                        </label>
                    </section>


                </fieldset>
                <footer>
                    <button type="submit" class="button">Change Password</button>
                    <a href="student.php" class="button button-secondary">Go Back</a>
                </footer>
            </form>
        </div>
        <div class="sky-form">
            <p align="center">Project By: Raj Thakur Solanki</p>
        </div> 
        <?php
        } else {
            header('location:index.php');
        }
        ?>
    </body>
</html>

