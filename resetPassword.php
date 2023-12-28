<!-- Author: ENIAC. Robert Hudson
    Class: IS 300
    Project: Group ToDo list login website
    Date: 3.7.17
    /
    Filename: resetPassword.php-->

<?php
#sessions stuff
    //to save session info outside of htdocs but folder must exist
session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
if (!isset($_SESSION)) 
{
    session_start(); //if its not started, start it
    
}

include("private/functions.php");
ensure_logged_in();
?>


<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<meta name="description" contect="ENIAC Reset Password Page">
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
                </div><br/>
                <div>
                  <h2 id="forgot"><strong>Reset Your Password Below</strong></h2>
                </div><br />
                <br />
                <div class="resetPass">
                    <label for="password">New Password:</label>
                </div>
                    <!--using regex password must have one uppercase, one lowercase, and one number, and be atleast 10 characters long-->
                    <div class ="inputReset">
                        <input type="password" <?= isset($_POST['password'])? 'value = "'.$_POST["password"].'"' : ''?> name="password" id="password" maxlength = "20" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}" required autofocus/>
                    </div>
              <br/>
              <div class="resetPass">
                  <label for="pwconfirm">Confirm Password:</label>
              </div>
                <div class ="inputReset">
                        <input type="password" <?= isset($_POST['pwconfirm'])? 'value = "'.$_POST["pwconfirm"].'"' : ''?> name="pwconfirm" id="pwconfirm" required />
                </div>
              <br /><br/>
                  <div id="button">
                    <input type="submit" id= "resetPassword" name = "resetPassword" value="Reset Password" />
                      <br/>
                     </div>
            </form>
         </section>
			<?php
           if(isset($_POST["password"]) && isset($_POST["resetPassword"]))
           {
               resetPassword();
           }
           
           
			?>	
		<footer class ="col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>