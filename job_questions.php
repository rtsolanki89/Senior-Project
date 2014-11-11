<html>
    <head>
        <meta charset="utf-8">		
        <title>Job Traxs</title>
                <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/forms.css">
        <script>
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
    <body class="bg-red">


        <?php
        session_start();
        $view = filter_input(INPUT_POST, 'view');
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
                                    echo '<form action = "job_applied.php" method = "POST" class="sky-form" enctype="multipart/form-data">';
                                    $job_search = mysql_query("select * from job_post where Job_ID = '$view'");
                                    while ($row = mysql_fetch_array($job_search)) {
                                        ?>
                                        <fieldset>
                                            <section>
                                                <label class="input">    
                                                    <?php
                                                    echo '<table width="100%">';
                                                    echo '<div class="sky-form">';

                                                    echo '<tr><th align="left" width="50%" height="32px">1: ' . $row['question1'] . '</th>';
                                                    echo '<tr><td width="50%"><label class="textarea">
                                                            <i class="icon-append icon-question"></i>
                                                            <textarea rows="5" cols="100" name="a1" placeholder="Answer: "></textarea>
                                                            </label></td></tr>';

                                                    echo '<tr><th align="left" height="32px">2: ' . $row['question2'] . '</th>';
                                                    echo '<tr><td><label class="textarea">
                                                            <i class="icon-append icon-question"></i>
                                                            <textarea rows="10" name="a2" placeholder="Answer: "></textarea>
                                                            </label></td></tr>';

                                                    echo '<tr><th align="left" height="32px">3: ' . $row['question3'] . '</th>';
                                                    echo '<tr><td><label class="textarea">
                                                            <i class="icon-append icon-question"></i>
                                                            <textarea rows="5" name="a3" placeholder="Answer: "></textarea>
                                                            </label></td></tr>';

                                                    echo '<tr><th align="left" height="32px">4: ' . $row['question4'] . '</th>';
                                                    echo '<tr><td><label class="textarea">
                                                            <i class="icon-append icon-question"></i>
                                                            <textarea rows="5" name="a4" placeholder="Answer: "></textarea>
                                                            </label></td></tr>';

                                                    echo '<tr><th align="left" height="32px">5: ' . $row['question5'] . '</th>';
                                                    echo '<tr><td><label class="textarea">
                                                            <i class="icon-append icon-question"></i>
                                                            <textarea rows="5" name="a5" placeholder="Answer: "></textarea>
                                                            </label></td></tr>';

                                                    echo '</div>';

                                                    echo '</table>';
                                                    ?>
                                                </label>
                                            </section>
                                        </fieldset>

                                        <?php
                                        echo '<footer>';
                                        echo '<input type = "hidden" name = "view" value = "' . $row['Job_ID'] . '">';
                                        echo '<button type = "submit" class = "button">Submit</button>';
                                        echo '</form>';

                                        echo '<form action = "search_jobs.php" method = "POST" class="sky-form">';
                                        echo '<input type = "hidden" name = "search" value = "' . $_SESSION['search'] . '">';
                                        echo '<button type = "submit" class = "button">Go Back</button>';
                                        echo '</form>';
                                    }
                                    if (!$job_search) {
                                        echo 'DB ERROR';
                                        echo 'MySQL ERROR' . mysql_error();
                                    }
                                    ?>

                                </div>
                            </div></ul></div>

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