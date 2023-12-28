<!-- used for acessing the log file-->
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
ensure_logged_in();
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Admin stuff</title>
		<meta name="description" contect="ENIAC ADMIN ">
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
		  <form  action=# method="post" enctype="multipart/form-data">
		      <!--for displaying error messages instead of alerts -->  
                <div class="errorMessage">
                    <?php messageDisplay(); ?>
                </div>
              <?php 
               if (accountType() == 'student')  //if they are a student
               {
                 $config = parse_ini_file('private/config.ini');  
                $filename = $config["file"]; //connect to file on file
                echo "<a href='$filename'>Download log file</a>";
              
               }
                ?>
             </form>
            
             
         </section>
		
	</body>
</html>