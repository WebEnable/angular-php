<?php
session_start();
if ((isset($_SESSION['username'])!="Admin") && (isset($_SESSION['initiated'])!=1))
			{
				$data = array();
				$data['message'] = 'Thank you for visiting this page, but this is a restricted Page';
				echo json_encode($data);
			}
		else{
include_once '../config/functions.php';
$Wall = new WallUpdates();
$AnswerSheetList=$Wall->AnswerSheetListJson();
}
?>