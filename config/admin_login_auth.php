<?php 
require 'config/dbconfig.php';
?>

<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
		
	//Select database
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$admin_name = clean($_POST['admin_name']);
	$admin_pass = clean($_POST['admin_pass']);
	
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location:admin_login.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM admin_login WHERE admin_name='$admin_name'";
	$result=mysql_query($qry);
    if (!$result) die("Database access failed: " . mysql_error());
elseif (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
$salt1 = "web";
$salt2 = "enable";
$token = md5("$salt1$admin_pass$salt2");
if ($token == $row[1])
{
session_start();
session_regenerate_id();
$_SESSION['initiated'] = 1;

$_SESSION['username'] = "Admin";
$_SESSION['password'] = "Loged";
//echo "$row[0] $row[1] : Hi $row[0],you are now logged in as '$row[0]'";
			header("location:admin_menu.php");
}
else 
			header("location:admin_login.php?msg=login_failed");
}
else 
			header("location:admin_login.php?msg=login_failed");
?>