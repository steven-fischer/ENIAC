<!-- Author: Heather Johnson, Robert Hudson
    Class: IS 302
    Project: Portfolio Website
    Date: 12/29/2017
    Filename: faq.php-->
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
		<title>Frequently Asked Questions</title>
		<meta name="description" contect="ENIAC FAQ Page">
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

            <form action="faq.php" method="post" enctype="multipart/form-data" class = "faq">
                <!--Author: Heather-->

                <div class="publicQuest">
                    <div>
                        <dt class = "question">How do I login to the site?<dt>
                        <dd class ="answer">Click the login button. An account is first required to login.</dd>
                    </div><br/>
                    <div>
                        <dt class = "question">What do I do if I run into an issue with the site?</dt>
                        <dd class ="answer"><a href="contactUs.php" id="buttonAttr"><button type="button">CLICK HERE TO EMAIL US</button></a></dd>
                    </div><br/>
                    <div>
                        <dt class = "question">How long does it take to get a response on fixing an account issue?</dt>
                        <dd class ="answer">It can take up to 24 hours to receive a response.</dd>
                    </div><br/>
                    <div>
                        <dt class = "question">How can I sign up for an account?</dt>
                        <dd class ="answer">If you go to login there is an option to create an account.</dd>
                    </div><br/>
                    <div>
                        <dt class = "question">About how long does it take for an account to be active?</dt>
                        <dd class ="answer">It should take less than 24 hours for an account to become active.</dd>
                    </div><br/>
                    <div>
                        <dt class = "question">How do I delete my account?</dt>
                        <dd class ="answer"><a href="deleteAccount.php" id="buttonAttr"><button type="button">DELETE ACCOUNT.</button></a></dd>
                    </div><br/>
                    <div>
                        <dt class = "question">What file types are compatible to upload to my portfolio?</dt>
                        <dd class ="answer">Acceptable formats for resumes are: .doc, .docx, and .pdf</dd>
                        <dd class ="answer">And acceptable formats for portfolio pictures are: .jpg, .jpeg, .png and .gif</dd>
                    </div><br/>  
                    <div>
                        <dt class = "question">Is there a limit on the file size that can be uploaded?</dt>
                        <dd class ="answer">The size limit for a resume is: <?php echo resumeSizeLimit  / 1000000?> MB</dd>
                        <dd class ="answer">The size limit for a portfolio picture is: <?php echo picSizeLimit  / 1000000?> MB</dd>
                    </div><br/>
                    <div>
                        <dt class = "question">Does this site use cookies?</dt>
                        <dd class ="answer">Yes.</dd>
                    </div><br/>
                    <div>
                        <dt class = "question">What if I forgot my password?</dt>
                        <dd class ="answer"><a href="forgotPassword.php" id ="buttonAttr"><button type = "button">CLICK HERE</button></a> And a temporary password will be email to you.</dd>
                    </div>
                    <br/>
                    <div>
                        <dt class = "question">How do I reset my password?</dt>
                        <dd class ="answer">Once you have your temporary password <a href="resetPassword.php" id ="buttonAttr"><button type = "button">CLICK HERE</button></a> to reset it</dd>
                    </div>
                </div>           
            
            </form>
            
        </section>
        
		<footer class="col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>
