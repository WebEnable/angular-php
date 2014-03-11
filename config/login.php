<?php 
require 'dbconfig.php';

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data
	
function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}

if ((empty($_POST['loginEmail'])) && (empty($_POST['loginPassowrd']))){
	$errors['error'] = 'Form Incomplete';
	$data['success'] = false;
	$data['errors']  = $errors;
}
else{
	$loginEmail = clean($_POST['loginEmail']);
	$loginPassword = clean($_POST['loginPassowrd']);
	
	$qry = "SELECT * FROM `nileshtutorial`.`login` WHERE UserEmail='$loginEmail'";
	$result=mysql_query($qry);
    if (!$result) die("Database access failed: " . mysql_error());
	elseif (mysql_num_rows($result))
	{
		$salt1 = "web";
		$salt2 = "enable";
		$token = md5("$salt1$loginPassword$salt2");

		while($field=mysql_fetch_assoc($result)){
			if (($token == $field['Password']) && ($field['uID'] == 1)){
				session_start();
				session_regenerate_id();
				$_SESSION['initiated'] = 1;
				$_SESSION['username'] = "admin";
				$data['username'] = "admin";
				$data['success'] = true;
			}
			elseif(($token == $field['Password']) && ($field['uID'] > 1)){
				session_start();
				session_regenerate_id();
				$_SESSION['initiated'] = 1;
				$_SESSION['username'] = "User";
				$data['username'] = "user";
				$data['success'] = true;
			}
			else{
				$errors['error'] = 'Please try again';
				$data['success'] = false;
				$data['errors']  = $errors;
			}
		}
	}
}
echo json_encode($data);