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
                window.open("http://www.rtsolanki.com/change_photo.php","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400");
            }
        </script>
    </head>

    <body class="bg-orange">
        <?php
        session_start();
        $id = $_SESSION['ID'];
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
                            <form action="photo_upload.php" class="sky-form" method="post" enctype="multipart/form-data">
                                <header align="center"><?php echo $_SESSION['fname'] .' ' . $_SESSION['lname']; ?></header>
                                <fieldset>  
                                    <section>
                                        <?php
                                        $k = 1;
                                        $resume = mysql_query("select * from profile_picture as p, login as l where p.ID = l.ID and p.ID = '" . $id . "'");
                                        if(mysql_num_rows($resume) === 0)
                                            {
                                            echo '<table width="100%">';
                                                echo '<td align="center"><img src = "images/empty.png" width="150px" height="150px"></td>';
                                                echo '</table>';
                                            }
                                            else{
                                        while ($row1 = mysql_fetch_array($resume)) {
                                            $photo = $row1['name'];
                                            
                                        }
                                        echo '<table width="100%">';
                                            echo '<td align="center"><img src = "' . $photo . '" width="250px" height="250px"></td>';
                                            echo '</table>';
                                            }?>
                                    </section>
                                </fieldset>

                                <footer>                            
                                    <section>
                                        <label for="file" class="input input-file">
                                            <div class="button"><input type="file" id="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="">
                                        </label>
                                    </section>
                                    <button type="submit" class="button">Upload</button>
                                    <a href="student.php" class="button button-secondary">Cancel</a>
                                </footer>

                            </form>
                        </ul>
                    </div>
                </td>
            </table>
            <?php
        } else {
            header('location:index.php');
        }
        ?>