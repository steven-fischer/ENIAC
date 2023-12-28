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


?>


<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<meta name="description" contect="ENIAC Login Page">
        <!--Author: Heather, Viewport added for responsiveness.-->
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
                <p id="eniac"><strong>powered by the ENIAC group</strong></p>
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
                <br/>
              <div>
                  <h2 id="forgot"><strong>Please login to access your account.</strong></h2>
                </div><br />
                <div class="loginLabel">
                    <label for="username">Username:</label>
                </div>
                <div class ="loginInput">
                    <input type="text" name="username" id="username" maxlength = "20" autofocus/> 
                </div>
                <br /> 
                <div class="loginLabel">
                    <label for="password">Password:</label>
                </div>
                <div class ="loginInput">
                    <input type="password" name="password" id="password" />
                </div>
                <br /><br/>
                  <div id="button">
                    <input type="submit" id= "login" name = "login" value="Login Account" />
                    <input type="button"  onclick = "location.href='create.php';" value="Create Account" />
                      <br/> <br />
                      <a href="forgotPassword.php" id="buttonAttr"><button type = "button">Forgot Password</button></a>
                  </div>
            </form>
         </section>
			<?php
           
            login();
           
			?>	
		<footer class ="col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>