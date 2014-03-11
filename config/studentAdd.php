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
//sanitize email
function spamcheck($field)
{ 
	$field=filter_var($field, FILTER_SANITIZE_EMAIL);
	if(filter_var($field, FILTER_VALIDATE_EMAIL))
		{ return TRUE; }
	else { return FALSE; }
}

if ((empty($_POST['studentName'])) && (empty($_POST['studentEmail'])) && (empty($_POST['studentClass'])) && (empty($_POST['studentYear']))){
	$errors['error'] = 'Form Incomplete';
	$data['success'] = false;
	$data['errors']  = $errors;
}
else{
	$studentName = clean($_POST['studentName']);
	$studentEmail = clean($_POST['studentEmail']);
	$studentEmailCC = clean($_POST['studentEmailCC']);	
	$studentClass = clean($_POST['studentClass']);
	$studentYear = clean($_POST['studentYear']);
	$studentMobile = clean($_POST['studentMobile']);
	$studentNotes = clean($_POST['studentNotes']);
	
	addStudentInfo($studentName,$studentEmail,$studentEmailCC,$studentClass,$studentYear,$studentMobile,$studentNotes);

	$data['success'] = true;
	$data['message'] = 'Success!';
}
echo json_encode($data);
}