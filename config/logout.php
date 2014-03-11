<?php
$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	destroy_session_and_data();
	$data['success'] = true;
	$data['username'] = '';
	$data['message'] = 'logout';

}
else{
	$data['success'] = false;
	$data['username'] = '';
	$data['message'] = 'No session';
}
//else header("location: ../index.php?msg=login_again");

function destroy_session_and_data()
{
	$_SESSION = array();
	if (session_id() != "" || isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time() - 2592000, '/');
		session_destroy();

		//header("location: ../index.php?msg=login_again");
	}
}

echo json_encode($data);