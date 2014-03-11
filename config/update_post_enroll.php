<?php 
session_start();
if($_SESSION['security_code'] == $_REQUEST['security_code'])
{
	include_once 'config/functions.php';
//Function to sanitize values received from the form. Prevents SQL injection
function sanitizeString($var)
{
$var = stripslashes($var);
$var = htmlentities($var);
$var = strip_tags($var);
return mysql_real_escape_string($var);

}
				//FILTER_SANITIZE_EMAIL
				  function spamcheck($field)
				  { $field=filter_var($field, FILTER_SANITIZE_EMAIL);
				  	  if(filter_var($field, FILTER_VALIDATE_EMAIL))
				  	    { return TRUE; }
				  	  else { return FALSE; }
				  }

if ($_FILES["enrl_pic_new"]["name"]!="") {
if ((($_FILES['enrl_pic_new']['type'] == "image/jpeg")
|| ($_FILES['enrl_pic_new']['type'] == "image/pjpeg")
|| ($_FILES['enrl_pic_new']['type'] == "image/png"))
&& ($_FILES['enrl_pic_new']['size'] < 5009221))
{
	if($_FILES['enrl_pic_new']['type'] == "image/jpeg"){$file_type='.jpeg';}
	elseif($_FILES['enrl_pic_new']['type'] == "image/pjpeg"){$file_type='.jpeg';}
	elseif($_FILES['enrl_pic_new']['type'] == "image/png"){$file_type='.png';}
$time=time();
$words = explode(" ", $_POST['enrl_org']);
for($i=0;$i<count($words); $i++)
{ $words_i.=$words[$i].'_';
}
$photo = $words_i.$time.$file_type;
$target_path = "enroll/";
$target_path = "$target_path$photo";
move_uploaded_file($_FILES['enrl_pic_new']['tmp_name'], $target_path);
}
}
else{$photo= sanitizeString($_POST['enrl_pic']);}


	//Sanitize the POST values
	$enrl_id = sanitizeString($_POST['enrl_id']);		
	$enrl_org = sanitizeString($_POST['enrl_org']);
	$enrl_phn = sanitizeString($_POST['enrl_phn']); 
	$enrl_dscrp = sanitizeString($_POST['enrl_dscrp']);
	$enrl_key_word =sanitizeString($_POST['enrl_kwrd']);
	$enrl_email = sanitizeString($_POST['enrl_email']);
	$enrl_adr1 = sanitizeString($_POST['enrl_adr1']); 
	$enrl_url = sanitizeString($_POST['enrl_url']);
	$today = sanitizeString($_POST['enrl_date']);
	
	
update_enroll_data_edited($enrl_id,$enrl_org,$enrl_dscrp,$enrl_adr1,$enrl_email,$enrl_phn,$enrl_key_word,$photo,$enrl_url,$today);
header( 'Location: admin_menu.php?msg_st=updated_enroll&enroll&enrl_id='.$enrl_id);
}
	else {
				header( 'Location: admin_menu.php?msg_st=wrong_captara' );
	}


?>