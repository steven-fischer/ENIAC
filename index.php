<!-- Author: ENIAC. Robert Hudson, Samuel Stageberg
    Class: IS 300
    Project: Group ToDo list login website
    Date: 12/4/16
    /
    Filename: index.php-->

<?php

#sessions stuff
    //to save session info outside of htdocs but folder must exist
session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
if (!isset($_SESSION)) 
{
    session_start(); //if its not started, start it
}



include("private/functions.php");
if(isset($_SESSION["name"]))
{
   autoLogout(); 
}
?>


<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<meta name="description" contect="ENIAC Home Page">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="main.css">
        <script src = "prototype.js" type = "text/javascript"></script>
        <script src = "cookie.js" type = "text/javascript"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="private/hcurrent.js"></script>
        <link rel="shortcut icon" href="logo.jpg">
	</head>
	<body>
		<!--Author: Heather
            Created header.  Changed header to div tag in order to make page more responsive.
        -->
		<div class ="header col-12">
            <div class ="banner">
			<!--Added link to logo. Heather-->
                <div>
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
            <!--for displaying error messages instead of alerts -->  
                <div class="errorMessage">
                    <?php messageDisplay(); ?>
                </div>
                <br/>
		  <p id = "info">&nbsp;&nbsp;This website is for all of the members enrolled in the 2018 cohort of the "Bachelors of Applied Science in Information Systems (BASIS)" program at Olympic College in Bremerton, Washington.  Their resumes and portfolio experience have been uploaded here. This site provides employers background information on potential employees.</p>
         </section>
		<footer class = "col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>