<!DOCTYPE html> 
<html>
    <?php session_start(); ?>
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
        <div class="sky-form">
            <p align="center"><img src="images/logo1.png"></p>
        </div>
        <div class="body body-s">

            <form action="education_validation.php" class="sky-form" method="post" name="education" onsubmit="return validation_education()">
                <header>Education Page (Step 2)</header>

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

                <fieldset>

                    <section>
                        <label class="label">Skills</label>
                        <label class="textarea">
                            <i class="icon-append icon-comment"></i>
                            <textarea rows="5" name="skills"></textarea>
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
    </body>
</html>