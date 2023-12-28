<!-- Author: Robert Hudson
    Class: IS 302
    Project: Portfolio Website
    Date: 12/29/2017
    Filename: editPortfolio.php-->
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
		<title>Editing <?= $_SESSION["name"] ?>'s Portfolio</title>
		<meta name="description" contect="ENIAC Edit Portfolio Page">
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
                <a href="index.php"><img src="logo.jpg" alt="logo of the BASIS 2018 Cohort's portfolio " id="logo"></a>
			     <h1>BASIS Cohort 2018 Portfolio Site</h1>
                <p id="eniac">powered by the ENIAC group</p>
                </div>
            </div>
		</div>
        <div class="nav col-12">
            <?php  navigation() ?>
        </div>
        <section class = "formLayout col-12">			
                
            
            <form action="editPortfolio.php" method="post" enctype="multipart/form-data" >
                 <div class="errorMessage">
                    <?php messageDisplay(); ?>
                </div><br/>          
            <div class="textField">
                <label for="aboutMe">About Me</label></div>
            <div class = "inputProfile"><textarea name="aboutMe" id = "aboutMe" placeholder="Tell us about yourself." autofocus rows ="5" cols = "40" ></textarea></div>
                    <br /> <br />               
            
            <div class="textField">
                <label for="edu">Education</label></div>
            <div class="inputProfile"><textarea name="edu" id = "edu" placeholder="List your education experience here." rows ="5" cols = "40" ></textarea></div>
                    <br /><br />
            
            <div class="textField">
                <label for="proj">Portfolio</label></div>
            <div class="inputProfile"><textarea name="proj" id = "proj" placeholder="Describe projects that you have contributed to." rows ="5" cols = "40" ></textarea></div>
                    <br /><br />
            
            <div class="textField">
                <label for="skills">Skills</label></div>
            <div class="inputProfile"><textarea name="skills" id = "skills" placeholder="Please list your skills here." rows ="5" cols = "40"></textarea></div>
                    <br /><br />
            
            <div class="textField">
                <label for="fun">Fun</label></div>
            <div class="inputProfile"><textarea name="fun"  id = "fun"placeholder="What do you do for fun?" rows ="5" cols = "40"></textarea></div>
                    <br /><br />
            
            <div class="textField"><label for="goals">Goals</label></div>
            <div class="inputProfile"><textarea name="goals" id = "goals" placeholder="What are your goals?" rows ="5" cols = "40"></textarea></div>
            <br /><br />
                
            <div class="textField"><label for="contact">Contact Info</label></div>
            <div class="inputProfile"><textarea name="contact"  id = "contact" placeholder="Examples being an email address, personal website url, linkedIn page." rows ="5" cols = "40"></textarea>
            </div>
            <br />
              
            <div id ="primarySpec">
                 <?php 
                    $row = populateRadioButton();
                    ?>
                    <fieldset>
                        <legend>Primary Specialty</legend>
                         <input type="radio" name="type" id = "major-pro" value="Programming" <?php echo ($row["major"] == 'Programming')? 'checked' : ' ' ?> />

                        <label for ="major-pro">Programming</label><br>

                        <input type="radio" name="type" id = "major-net" value="Networking" <?php echo ($row["major"] == 'Networking')? 'checked' : ' ' ?> />

                        <label for ="major-net">Networking</label><br>

                         <input type="radio" name="type" id = "major-web" value="Web Development" <?php echo ($row["major"] == 'Web Development')? 'checked' : ' ' ?> />

                        <label for ="major-web">Web Development</label><br>

                         <input type="radio" name="type" id = "major-dat" value="Database" <?php echo ($row["major"] == 'Database')? 'checked' : ' ' ?> />

                        <label for ="major-dat">Database</label><br>

                        <input type="radio" name="type" id = "major-PM" value="Project Management" <?php echo ($row["major"] == 'Project Management')? 'checked' : ' ' ?> />

                        <label for ="major-PM">Project Management</label><br>
                 </fieldset>
            </div>   
               <br />  
                
            <fieldset>
                <legend>Change your phone number or email below:</legend>
            <div class="textField">
                <label for="phone">Phone Number</label></div>
            <div class = "inputProfile inputField"><input type="type" name="phone" id = "phone" maxlength = "10"></div>
                    <br />
                <div class="textField">
                <label for="email">Email:</label></div>
            <div class = "inputProfile inputField"><input type="type" name="email" id = "email" type = "email"></div>
                <br />
                <div class="textField">
                <label for="fname">First Name</label></div>
            <div class = "inputProfile inputField"><input type="type" name="fname" id = "fname" maxlength = "30"></div>
                    <br />
                <div class="textField">
                <label for="lname">Last Name</label></div>
            <div class = "inputProfile inputField"><input type="type" name="lname" id = "lname" maxlength = "30"></div>
                
            </fieldset>
                
                <br />
            <div id="button">
                <input type = "submit" name="submit"  onclick ="location.href='portfolioIndex.php';" value ="Submit Data to portfolio"/>
            </div>
                
            </form>
        </section>
        
                
            <?php
			addToPortfolio(); 
			?>
            
            <!--Changed instructions for file types to tooltips for photo and resume.  Heather-->
            <section class ="uploadLayout formLayout col-12">
                  <form action = "upload.php" method = "post" enctype="multipart/form-data"><br />
                    <label for = "profilePicture">Upload picture for portfolio here:</label>
                <section class = "tip">
                    <input type="file" name="profilePicture" id="profilePicture" /><br />
                    <span class ="tipText">only JPG, JPEG, PNG and GIF files are allowed</span>
                </section>
                <section class="tip">
                      <input type="submit" value="Upload Image" name="submit" /> 
                     <span class="tipText"><?php ifPicOnFile(); ?></span>
                </section>
                </form>

                <form action = "uploadResume.php" method = "post" enctype="multipart/form-data">
                    <label for = "resumeToUpload">Upload copy of your resume here: </label>
                 <section class = "tip">
                    <input type="file" name="resumeToUpload" id="resumeToUpload" /> <br />   
                     <span class = "tipText">must be .pdf .doc or .docx</span>
                </section>
                <section class="tip">
                    <input type="submit" value="Upload resume" name="submit" />
                    <span class="tipText"><?php ifResumeOnFile(); ?><br /></span>
                </section>
                    <p id="info">* If you would like to delete your account please click here:<br /><a href="deleteAccount.php" id="buttonAttr"><button type="button">DELETE ACCOUNT.</button></a> </p>
                </form>
            </section>
        
        
		<footer class = "col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>
