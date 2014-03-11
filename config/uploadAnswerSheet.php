<?php
include_once 'functions.php';
session_start();
if ((isset($_SESSION['username'])!="Admin") && (isset($_SESSION['initiated'])!=1))
			{
				header("location: ../index.php#/");
			}
		else{

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

//sanitize strings
function clean($var)
{
	$var = stripslashes($var);
	$var = htmlentities($var);
	$var = strip_tags($var);
	return mysql_real_escape_string($var);
}

$data['post'] = $_POST;
$data['files'] = $_FILES;

if (($_FILES["pdfFile"]["name"]!="") && ($_FILES['pdfFile']['type'] == "application/pdf") && ($_FILES['pdfFile']['size'] < 5009221) && (!empty($_POST['classAnswer'])) && (!empty($_POST['subjectAnswer'])))
{
	$filename = $_FILES["pdfFile"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); 
	$file_ext = substr($filename, strripos($filename, '.')); 
	$time=time();

	$newfilename = $time . md5($file_basename) . $file_ext;

	move_uploaded_file($_FILES["pdfFile"]["tmp_name"], "../upload/" . $newfilename);
	$data['fileName'] = $newfilename;
	$data['fileNamePath'] = "../upload/".$newfilename;

	$classAnswer = clean($_POST['classAnswer']);
	$subjectAnswer = clean($_POST['subjectAnswer']);

	addAnswerSheet($classAnswer,$subjectAnswer,$newfilename);
	
}
else{
	$errors['error'] = 'File not able to upload';
	$data['errors'] = $errors;
}
echo json_encode($data);
}
?>