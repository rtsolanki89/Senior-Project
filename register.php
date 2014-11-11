<!DOCTYPE html> 
<html>
    <?php session_start(); ?>
    <head>
        <title>Job Traxs</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/forms.css">
        <script src="javascript/registration.js"></script>
    </head>
    <body class="bg-purple">
        <div class="sky-form">
            <p align="center"><img src="images/logo1.png"></p>
        </div>
        <div class="body body-s">

            <form action="registration_validation.php" class="sky-form" method="post" name="register" onsubmit="return validation_register()">
                <header>Registration Page (Step 1)</header>

                <fieldset>

                    <section>
                        <label class="select">
                            <select name="profession">
                                <option value="0" selected disabled>Profession</option>
                                <option value="Student">Student</option>
                                <option value="Employer">Employer</option>
                            </select>
                            <i></i>
                        </label>
                    </section>


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
                        <label class="input">
                            <i class="icon-append icon-lock"></i>
                            <input type="password" placeholder="Password" name="password">
                            <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                        </label>
                    </section>

                    <section>
                        <label class="input">
                            <i class="icon-append icon-lock"></i>
                            <input type="password" placeholder="Confirm password" name="repassword">
                            <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                        </label>
                    </section>
                </fieldset>

                <fieldset>
                    <div class="row">
                        <section class="col col-6">
                            <label class="input">
                                <input type="text" placeholder="First name" name="fname">
                            </label>
                        </section>
                        <section class="col col-6">
                            <label class="input">
                                <input type="text" placeholder="Last name" name="lname">
                            </label>
                        </section>
                    </div>

                    <section>
                        <label class="select">
                            <select name="gender">
                                <option value="0" selected disabled>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <i></i>
                        </label>
                    </section>
                    <label class="label col col-2">DOB</label>

                    <section class="col col-3">
                        <label class="input">
                            <input type="text" maxlength="4" placeholder="Year" name="year">
                        </label>
                    </section>

                    <section class="col col-4">
                        <label class="select">
                            <select name="month">
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

                    <section class="col col-3">
                        <label class="select">
                            <select name="day">
                                <option value="0" selected disabled>Day</option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="21">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </label>
                    </section>

                </fieldset>

                <fieldset>
                    <section>
                        <label class="select">
                            <select name="security">
                                <option value="0" selected disabled>Security Question for Password Change</option>
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
                    <button type="submit" class="button">Submit</button>
                </footer>
            </form>

        </div>
        <div class="sky-form">
            <p>Project By: Raj Thakur Solanki</p>
        </div>    
    </body>
</html>