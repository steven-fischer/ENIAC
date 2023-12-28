<!-- Author: Robert Hudson
    Class: IS 302
    Project: Portfolio Website
    Date: 2/4/2017
    Filename: uploadResume.php-->
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
		<title>Resume Upload</title>
		<meta name="description" contect="ENIAC Resume Upload Page">
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
			<!--Added link to logo. Heather-->
                <a href="index.php" id="logoLink"><img src="logo.jpg" alt="logo of the BASIS 2018 Cohort's portfolio website" id="logo"></a>
			     <h1>BASIS Cohort 2018 Portfolio Site</h1>
                <p id="eniac">powered by the ENIAC group</p>
            </div>
		</div>
        <div class="nav col-12">
            <ul><a href="editPortfolio.php">Return to the Previous Page</a></ul>
		</div>		
        <section class = "formLayout col-12">	
		  <p id = "info">
              <?php

$target_dir = docFolder;   
$fileName = basename($_FILES["resumeToUpload"]["name"]);
$fileName = $_SESSION["name"] . strrchr($fileName, '.'); 
$target_file = $target_dir . $fileName;
$uploadOk = 1;      //good to go
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

//check file size
if ($_FILES["resumeToUpload"]["size"] > resumeSizeLimit) //if too big
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0; //flag it
}

if($FileType != "doc" && $FileType != "pdf" && $FileType != "docx") //if not the right type
{
    echo "Sorry only , doc, docx and pdf files are allowed.";
    $uploadOk = 0; //flag it
}

if($uploadOk == 0)  //errors found
{
    echo "Sorry, your file was not uploaded.";
}
else    //good to go
{
    if (true)//move_uploaded_file($_FILES["resumeToUpload"]["tmp_name"], $target_dir .$fileName )) 
    {
		$fileBlob = fopen($_FILES["resumeToUpload"]["tmp_name"] ,'rb'); //read the binary data 'rb' from the temporary uploaded file
		
		$user = $_SESSION["name"];     //gets username from webpage
		$user = stripslashes(htmlspecialchars($user));  //protect it
		$db = dbConnect();
		$query = $db->quote($user);     //protect it
		$sql = "UPDATE login SET resumeFile = :blob, resumeExt = '$FileType' WHERE Username = $query";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':blob', $fileBlob, PDO::PARAM_LOB);
		$stmt->execute();	//store the binary data as a blob
		
        echo "The file ". basename( $_FILES["resumeToUpload"]["name"]). " has been uploaded.";
        logToFile($_SESSION["name"], ' uploaded a resume');
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
              ?>
            </p>
         </section>
			
		<footer class = "col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>