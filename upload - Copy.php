<!-- Author: Robert Hudson
    Class: IS 302
    Project: Portfolio Website
    Date: 2/4/2017
    Filename: upload.php-->

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
		<title>picture upload</title>
		<meta name="description" contect="ENIAC Picture Upload Page">
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
            <ul><a href="editPortfolio.php"><strong>Return to the Previous Page</strong></a></ul>
		</div>		
        <section class = "formLayout col-12">	
		  <p id = "info"><?php 
              
$exts = array('.jpeg','.png','.jpg','.gif');
    foreach($exts as $ext)//loop through extensions to find the one that exists
    {
        if(file_exists(docFolder.$_SESSION["name"].$ext))   //if they have a profile pic
    {
        unlink(docFolder.$_SESSION["name"].$ext);       //delete it 
    }
}
//then upload a new one
$target_dir = docFolder;
$fileName = basename($_FILES["profilePicture"]["name"]);
$fileName = $_SESSION["name"] . strrchr($fileName, '.');
$target_file = $target_dir . $fileName;
$uploadOk = 1;      //good to go
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


if ($_FILES["profilePicture"]["size"] > picSizeLimit) //check file size
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;  //flag for error
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" )    //check file format
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0; //flag for error
}

if($uploadOk == 0)  //error found no upload
{
    echo " Sorry, your file was not uploaded.";
}
else    //if no errors
{
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_dir.$fileName )) 
    {
        echo "Your file ". basename( $_FILES["profilePicture"]["name"]). " has been uploaded.";
        logToFile($_SESSION["name"], ' uploaded a portfolio picture');    //success
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
              ?></p>
         </section>
			
		<footer class = "col-12">
            <a href="contactUs.php">Contact Us</a>
		</footer>
	</body>
</html>