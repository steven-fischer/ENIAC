<!-- Author: ENIAC. Robert Hudson
    Date: 2/23/17
    Filename: contactUs.php-->

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
		<title>Contact Us</title>
		<meta name="description" contect="ENIAC Contact us Page">
        <!--Author: Heather, Viewport added for responsiveness.-->
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
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
		  <form  action=# method="post" enctype="multipart/form-data">
		      <!--for displaying error messages instead of alerts -->  
                <div class="errorMessage">
                    <?php messageDisplay();
                        ?>
                </div>
              <br/>
              <div>
                  <h2 id="forgot"><strong>Please fill out this form to contact us</strong></h2>
                </div><br />
                <div class="textContact">
                    <label for="name">Name:</label>
                </div><br>
                <div class="inputContact">
                    <input type="text" name="name" id="name" 
                           <?= isset($_POST['name'])? 'value = "'.$_POST["name"].'"' : ''?> autofocus/> 
                </div>
                <br />
                <div class="textContact">
                    <label for="email">Email Address:</label>
                </div><br>
                <div class="inputContact">
                    <input type="email" name="email" id="email" <?= isset($_POST['email'])? 'value = "'.$_POST["email"].'"' : ''?> />
                </div>
                <br /><br/>
              <div class="textContact">
                    <label for="message">Comments:</label>
                </div><br>
                <div class="inputContact">
                    <textarea name="message" name="message" id="message" <?= isset($_POST['message'])? 'value = "'.$_POST["message"].'"' : ''?> rows ="10" cols = "30" ></textarea>
                </div>
                <br /><br/>
                  <div id="button">
                    <input type="submit" id= "contactUs" name = "contactUs" value="Send Message" />
                  </div>
            </form>
         </section>
        
			<?php
        
        if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"]))
        {
            contactUs($_POST["name"], $_POST["email"], $_POST["message"]);
        }
        else
        {
            $_SESSION["errorMessage"]  = "**All fields are required to send a message.**";
            
        }
           
			?>
		<footer class ="col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>