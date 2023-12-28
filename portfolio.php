<!-- Author: Samuel Stageberg, robert hudson
    Class: IS 302
    Project: Portfolio Website
    Date: 12/28/2017 -  2/9/2017
    Filename: portfolio.php-->
<?php
session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
if (!isset($_SESSION)) 
{
    session_start(); //if its not started, start it
}

include("private/functions.php");
ensure_logged_in();
autoLogout();
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Viewing <?php $_GET['username'] ?> 's Portfolio</title>
		<meta name="description" content="Portfolio Display Page">
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
        <section class = "portfolioDisplay">	
            <form action="portfolio.php" method="post" enctype="multipart/form-data" >
            
            <?php    
            $userInfo =  buildPortfolio($_GET['username']); //get name of user and send it to the function, return results as an array to be display in html tags
            ?>
            <div class = "row">
                <div class = "col-5 col-m-12 left">
                    <div class="aside"><!--id ="contactInfo"-->
                         <?php 
                            displayPortfolio($userInfo);
                          ?>
                    </div>
                </div>
            </div>
            </form>
        </section>
        
		<footer class="col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>