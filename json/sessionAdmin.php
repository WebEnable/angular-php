<?php 
$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

session_start();
if ((isset($_SESSION['username'])!="admin") && (isset($_SESSION['initiated'])!=1))
	{
	$errors['error'] = 'Not Login';
	$data['session'] = false;
	$data['username'] = '';
	$data['errors']  = $errors;
	}
else{
	$data['session'] = true;
	$data['username'] = $_SESSION['username'];

	$data['message'] = 'Success!';
	}
echo json_encode($data);