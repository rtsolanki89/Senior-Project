<!DOCTYPE html> 
<html>
    <head>
        <title>JobTraxs</title>
        <?php session_start() ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/forms.css">
        <script src="javascript/login.js"></script>
    </head>
    <body class="bg-blue">
        <div class="sky-form">
            <p align="center"><img src="images/logo1.png"></p>
        </div>    
        <div class="body body-s">

            <form action="profile_validation.php" class="sky-form" method="post" name="login" onsubmit="return validation_login()">
                <header>Login or Register at JobTraxs</header>

                <fieldset>					
                    <section>
                        <div class="row">
                            <label class="label col col-4">Username</label>
                            <div class="col col-8">
                                <label class="input">
                                    <i class="icon-append icon-user"></i>
                                    <input type="text" name="username">
                                </label>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="row">
                            <label class="label col col-4">Password</label>
                            <div class="col col-8">
                                <label class="input">
                                    <i class="icon-append icon-lock"></i>
                                    <input type="password" name="password">
                                </label>
                            </div>
                        </div>
                    </section>


                </fieldset>
                <footer>
                    <button type="submit" class="button">Log in</button>
                    <a href="register.php" class="button button-secondary">Register</a>
                </footer>
            </form>
        </div>
        <div class="sky-form">
            <p align="center">Project By: Raj Thakur Solanki</p>
        </div> 
        <?php session_unset();
        session_destroy();
        ?>
    </body>
</html>