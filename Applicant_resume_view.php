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

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            function openWin()
            {
                window.open("http://www.rtsolanki.com/change_photo.php", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
            }
        </script>
    </head>

    <body class="bg-orange">
        <?php

        function read_file_docx($filename) {
            $striped_content = '';
            $content = '';
            if (!$filename || !file_exists($filename))
                return false;
            $zip = zip_open($filename);
            if (!$zip || is_numeric($zip))
                return false;
            while ($zip_entry = zip_read($zip)) {
                if (zip_entry_open($zip, $zip_entry) == FALSE)
                    continue;
                if (zip_entry_name($zip_entry) != "word/document.xml")
                    continue;
                $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                zip_entry_close($zip_entry);
            }
            // end while 
            zip_close($zip);
            //echo $content; 
            //echo "<hr>";
            //file_put_contents('1.xml', $content);	 
            $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
            $content = str_replace('</w:r></w:p>', "\r\n", $content);
            $striped_content = strip_tags($content);
            return $striped_content;
        }

        session_start();
        $id = $_SESSION['applicant'];
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
            <form action="search_jobs.php" class="sky-form" method="POST">
                <section>
                    <label class="input">
                        <i class="icon-append icon-search"></i>
                        <input type="text" placeholder="What kind of job are you looking for? or You can search for Company Names" name="search">
                        <b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
                    </label>
                </section>                                          
            </form>  
            <table with="100%" align="center">
                <td valign="top">
                    <div class="body">
                        <ul>
                            <dic class="sky-form">
                                <header align="center"><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></header>
                                <fieldset>  
                                    <section>
                                        <?php
                                        $resume_view = mysql_query("select * from resume as r, login as l where r.ID = l.ID and r.ID = '" . $id . "'");
                                        if(mysql_num_rows($resume_view) === 0)
                                            {
                                            echo '<table width="100%">';
                                                echo '<td align="center">No Resume Uploaded</td>';
                                                echo '</table>';
                                            }
                                            else{
                                        while ($row1 = mysql_fetch_array($resume_view)) {
                                            $resume = $row1['resume_name'];
                                            
                                        }
                                        if($resume === 'images/')
                                        {
                                          echo '<table width="100%">';
                                            echo '<td align="center">No Resume Uploaded</td>';
                                            echo '</table>';  
                                        }
                                        else{
                                        $filename = $resume;
                                        $content = read_file_docx($filename);
                                        if ($content !== false) {

                                            echo '<table><td align="center">' . nl2br($content) . '</td></table>';
                                        } else {
                                            echo 'Couldn\'t the file. Please check that file.';
                                        }
                                            }}
                                        ?> 
                                    </section>
                                </fieldset>

                                <footer>   
                                    <form action="applicant_profile.php" method="post">
                                        <button type="submit" class="button" value="<?php echo $id; ?>" name="ID">Go Back</button>
                            </form>
                                </footer>

                                </div>
                        </ul>
                    </div>
                </td>
            </table>
            <?php
        } else {
            header('location:index.php');
        }
        ?>