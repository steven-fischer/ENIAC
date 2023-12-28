<!-- Author: Steve Fischer, Heather Johnson
    Class: IS 302
    Project: Portfolio Website
    Date: 12/24/2016
    Filename: about.php-->
<?php

#sessions stuff
    //to save session info oujtside of htdocs but folder must exist
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
		<title>About Us</title>
		<meta name="description" contect="ENIAC about Page">
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
            <p id="info">&nbsp;&nbsp;The ENIAC team are members of the 2018 cohort in the BAS-IS program.  BAS-IS stands for Bachelors in Applied Science in Information Systems.  The team is comprised of students with a range of skills from front-end work in Web Design to database support, and more.  This portfolio hosting site is the first major project of our bachelor’s program spanning two quarters, from Fall of 2016 to Winter of 2017.  In the Fall of 2016, the group started with project planning, wireframes, and some initial coding.  The bulk of the project work was completed during the Winter quarter, which mostly comprised of the front-end and back-end coding.</p>
        </section>	
		<footer class="col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>