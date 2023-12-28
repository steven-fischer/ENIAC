<!-- Author: Robert Hudson
    Class: IS 302
    Project: Portfolio Website
    Date: 2/14/2017
    Filename: forgotPassword.php-->
<?php
session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
if (!isset($_SESSION)) 
{
    session_start(); //if its not started, start it
}
  
include("private/functions.php");

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Password Reset</title>
		<meta name="description" contect="ENIAC Forgotten Password Page">
		<link rel="stylesheet" type="text/css" href="main.css">
        <script src = "prototype.js" type = "text/javascript"></script>
        <script src = "cookie.js" type = "text/javascript"></script>
        <link rel="shortcut icon" href="logo.jpg">
	</head>
	<body>
        <!--Author: Heather
            Created header.  Changed header to div tag in order to make page more responsive.
        -->
		<div class ="header col-12">
            <div class ="banner">
                <div>
			<!--Added link to logo. Heather-->
                <a href="index.php"><img src="logo.jpg" alt="logo of the BASIS 2018 Cohort's portfolio website" id="logo"></a>
			     <h1>BASIS Cohort 2018 Portfolio Site</h1>
                <p id="eniac">powered by the ENIAC group</p>
                </div>
            </div>
		</div>
        <div class="nav col-12">
            <?php  navigation() ?>
        </div>
        <section class = "formLayout col-12">
            <form action="#" method="post" enctype="multipart/form-data">
                <!--for displaying error messages instead of alerts -->  
                <div class="errorMessage">
                    <?php messageDisplay(); ?>
                </div>
                <br/>
                <div>
                <h2 id="forgot"><strong>We're sorry you have forgotten your password.</strong></h2>
                </div>
                
                <p id="info">Enter your username. An email will be sent to your email address on file.</p>
                <div><br/>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" maxlength = "20"/> <br />
                </div>
                <br/>
                <input type="submit" name="submit" value="send email" />
            
            </form>
        </section>	
        
        <?php
        
        if(!empty($_POST["username"]))
            {
                forgotPassword();
            }
            else
            {
                $_SESSION["errorMessage"] = "***Please enter username***";
            }
        ?>
		<footer class="col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>