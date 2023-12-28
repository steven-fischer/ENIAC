<!-- Author: Robert Hudson, Heather Johnson
    Class: IS 302
    Project: Portfolio Website
    Date: 2/10/2017
    Filename: deleteAccount.php-->
<?php
session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
if (!isset($_SESSION)) 
{
    session_start(); //if its not started, start it
}

include("private/functions.php");
autoLogout();
ensure_logged_in();
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Delete My Account</title>
		<meta name="description" contect="Delete Account Page">
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
            <form action="deleteAccount.php" method="post" enctype="multipart/form-data">
                <h2 id="forgot"><strong>Are you sure you want to delete your account?</strong></h2>
                
                <p id="info">Deleting your acount from this website will remove all your data, this cannot be undone. Your resume, picture and all data WILL be DELETED permanently. Do you wish to continue?</p>
                <input type="submit" name="submit" value="DELETE ACCOUNT" />
            
            </form>
        </section>	
        
        <?php
        deleteAccount();
        ?>
		<footer class="col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>