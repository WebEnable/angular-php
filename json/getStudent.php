<?php
$data = array();
session_start();
if ((isset($_SESSION['username'])!="admin") && (isset($_SESSION['initiated'])!=1))
	{
		$data['message'] = 'Thank you for visiting this page, but this is a restricted Page';
		$data['success'] = false;
		echo json_encode($data);
	}
	else{
//		echo json_encode($_GET);

		function clean($var)
		{
			$var = stripslashes($var);
			$var = htmlentities($var);
			$var = strip_tags($var);
			return mysql_real_escape_string($var);
		}

		include_once '../config/functions.php';
		$studentId = clean($_GET['studentId']);
		$studentName = clean($_GET['sudentName']);
		$Wall = new WallUpdates();
		$studentList=$Wall->getStudentListJson($studentId, $studentName);
}
?>