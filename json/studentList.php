<?php
$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

session_start();
if ((isset($_SESSION['username'])!="admin") && (isset($_SESSION['initiated'])!=1))
			{
				$data['message'] = 'Thank you for visiting this page, but this is a restricted Page';
				echo json_encode($data);
			}
		else{
include_once '../config/functions.php';
$Wall = new WallUpdates();
$studentList=$Wall->studentListJson();
}
?>