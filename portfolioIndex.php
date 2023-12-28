<!-- Author: Robert Hudson
    Class: IS 302
    Project: Portfolio Website
    Date: 2/25/2017
    Filename: portfolioIndex.php-->
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
		<title>List of students with portfolios</title>
		<meta name="description" content="ENIAC Profile Index Page">
		<link rel="stylesheet" type="text/css" href="main.css">
        <script src = "prototype.js" type = "text/javascript"></script>
        <script src = "cookie.js" type = "text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="private/my.js"></script>
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
            <form  action="portfolioIndex.php" method="post" enctype="multipart/form-data">
        <!--id ="sidebar" class ="side-nav"-->
        <div class = "row">
        <div class = "col-m-12 left">
        <div id="aside "class = "side-nav">
            <ul>
                <li><a href="#section-search"><button type="button" class="profButton">Search</button></a></li>
                <li><a href="#section-name"><button type="button" class="profButton">By Name</button></a></li>
                <li><a href="#section-major"><button type="button" class="profButton">By field of study</button></a></li>
             </ul>
        </div>
        </div>
        <div class ="col-m-12" id= "profileInfo">
            <div id = "section-search" class ="tab-content">
                <div id ="searchText">
                    <label for = "search">Search our website here:</label>
                </div><br />
                
                <div>
                    <input type="text" name="search" id="search"/>
                
                    <div id="button">
                        <input type="submit"   id = "search" value="search" />
                     </div>
                </div>
                
                <?php
        
                if(!empty($_POST["search"]))
                {
                    searchSite();
                }
                ?>
            </div>
            <div id = "section-major" class ="tab-content">
                <?php
                buildIndexByMajor();
                ?>
            </div>
            <div id = "section-name" class ="tab-content">
                <?php
                buildIndex();
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
