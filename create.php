<!-- Author: ENIAC. Josh html, Heather minor html editing, Robert password functionality and input, Samuel some input types
    Class: IS 300
    Project: Group login website
    Date: 12/2/16
    /
    Filename: create.php-->
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
        <title>Create Account Page</title>
        <meta name="description" contect="Create Account">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="main.css">
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
			<form action="create.php" method="post" enctype="multipart/form-data">
                    
                 <!--for displaying error messages instead of alerts -->  
                <div class="errorMessage">
                    <?php messageDisplay();
                        ?>
                </div >
                <div class = "errorMessage"> 
                <?php

                    if (isset($_POST['submit']))
                    {
                        if($_POST['submit'] == "Create")    //if they click submit
                        {
                            createAccount();  //call to create account
                        }
                        else{   //send them the email confirmation code
                              sendEmail($_POST['email']);                 
                        }
                    }
                    ?>
                    </div>
                <br/>
                    <div class="textField">
                        <label for="username">Username:</label>
                    </div>
                    <div class="inputField">
                        <input type="text" <?= isset($_POST['username'])? 'value = "'.$_POST["username"].'"' : ''?> name="username" id="username" maxlength = "20"autofocus/>
                    </div><br />
           
                    <div class="textField">
                        <label for="password">Password:</label>
                    </div>
                    <div class="inputField tip">
                        <!--using regex password must have one uppercase, one lowercase, and one number, and be atleast 10 characters long-->
                        <input type="password" <?= isset($_POST['password'])? 'value = "'.$_POST["password"].'"' : ''?> name="password" id="password" maxlength = "20" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}" required/>
                        
                        <!--Author: Heather
                        Moved password instruction to a hover tooltip over the password field.-->
                        <span class ="tipText"> Password must contain at least: <br /><strong>one uppercase, one lowercase, <br />one number, and be at least 10 <br/>characters long.</strong></span>
                    </div><br />
                    <div class="textField">
                        <label for="pwconfirm">Confirm Password:</label>
                    </div>
                    <div class="inputField">
                        <input type="password" <?= isset($_POST['pwconfirm'])? 'value = "'.$_POST["pwconfirm"].'"' : ''?> name="pwconfirm" id="pwconfirm" required/>
                    </div>
                    <br />
                    <div class="textField">
                        <label for="firstname">First Name:</label>
                    </div>
                    <div class="inputField">
                        <input type="text" <?= isset($_POST['firstname'])? 'value = "'.$_POST["firstname"].'"' : ''?> name="firstname" id="firstname" maxlength = "20" pattern = "^[a-zA-Z]+$"/>
                    </div>
                    <br />
                    <div class="textField">
                        <label for="lastname">Last Name:</label>
                    </div>
                    <div class="inputField">
                        <input type="text" <?= isset($_POST['lastname'])? 'value = "'.$_POST["lastname"].'"' : ''?> name="lastname" id="lastname" maxlength = "20" pattern = "^[a-zA-Z]+$"/>
                    </div>
                    <br />
                    <div class="textField">
                        <label for="email">Email:</label>
                    </div>
                    <div class="inputField">                       
                        <input type="email" <?= isset($_POST['email'])? 'value = "'.$_POST["email"].'"' : ''?> name="email" id="email" maxlength = "50" required/>
						</div><br />
						<div>
                        <input type="submit" name="submit" value="Email Code" id ="code"/>
						</div><br />
                    <div class="textField">
                        <label for="verify">Verification Code:</label>
                    </div>
                    <div class="inputField">
                        <input type="text" name="verify" id="verify" maxlength = "20"/>
                    </div><br />
                    
                    <div class="textField">
                        <label for="phonenum">Phone Number:</label>
                    </div>
                    <div class="inputField tip">
                        
                        <input type="text" <?= isset($_POST['phonenum'])? 'value = "'.$_POST["phonenum"].'"' : ''?> name="phonenum" id="phonenum" maxlength = "10" pattern = "^[0-9]{1,10}$"/>
                        <span class="tipText">10 digits only, no spaces or characters.</span>
                    </div><br />
					
                    <div class ="tip">
                        <input type="submit" name="submit" value="Create" /> <p>**THIS SITE USES COOKIES**</p>
                        <span class="tipText">Account will be activated once verification occurs.</span>
                    </div>

			</form>
        </section>
	  
       <footer class ="col-12">
           <a href="contactUs.php">Contact Us</a>
       </footer>
    </body>
</html>
