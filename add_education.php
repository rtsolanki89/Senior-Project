<!DOCTYPE html> 
<html>
    <head>
        <title>Sky Forms</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/forms.css">
        <script src="javascript/education.js"></script>
    </head>
    <body class="bg-blue">
            <?php 
    session_start(); 
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
                    <a href="index.php" class="button">Job Applied</a>
                    <a href="student.php" class="button"><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></a>
                </p>                
            </div> 
        <div class="body body-s">

            <form action="add_education_validation.php" class="sky-form" method="post" name="education" onsubmit="return validation_education()">
                <header>Add Education Details</header>

                <fieldset>					
                    <section>
                        <label class="input">
                            <i class="icon-append icon-group"></i>
                            <input type="text" placeholder="School Name" name="school">
                            <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                        </label>
                    </section>

                    <div class="row">
                        <section class="col col-6">
                            <label class="input">
                                <input type="text" placeholder="City" name="city">
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input">
                                <input type="text" placeholder="Postal Code" name="postal">
                            </label>
                        </section>
                    </div>

                    <div class="row">
                        <section class="col col-6">
                            <label class="input">
                                <input type="text" placeholder="State" name="state">
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input">
                                <input type="text" placeholder="Country" name="country">
                            </label>
                        </section>
                    </div>

                    <div class="row">
                        <section class="col col-6">
                            <label class="input">
                                <input type="text" placeholder="Degree" name="degree">
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input">
                                <input type="text" placeholder="Major" name="major">
                            </label>
                        </section>
                    </div>    

                    <label class="label col col-7">Start Date :</label>
                    <section class="col col-4">
                        <label class="input">
                            <input type="text" maxlength="4" placeholder="Year" name="syear">
                        </label>
                    </section>

                    <section class="col col-4">
                        <label class="select">
                            <select name="smonth">
                                <option value="0" selected disabled>Month</option>
                                <option value="1">January</option>
                                <option value="1">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </label>
                    </section>

                    <label class="label col col-7">End Date :&nbsp;&nbsp;</label>
                    <section class="col col-4">
                        <label class="input">
                            <input type="text" maxlength="4" placeholder="Year" name="eyear">
                        </label>
                    </section>

                    <section class="col col-4">
                        <label class="select">
                            <select name="emonth">
                                <option value="0" selected disabled>Month</option>
                                <option value="1">January</option>
                                <option value="1">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </label>
                    </section>
                </fieldset>
                <footer>
                    <button type="submit" class="button">Submit</button>

                </footer>
            </form>

        </div>
        <div class="sky-form">
            <p>Project By: Raj Thakur Solanki</p>
        </div> 
            <?php
        } else {
            header('location:index.php');
        }?>
    </body>
</html>