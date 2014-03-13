<?php
require 'dbconfig.php';
class WallUpdates {
	public function studentListJson(){
		$data = array();
		$query = mysql_query("SELECT * FROM `studentinfo` ORDER BY sName ASC, sClass ASC") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {  
		while($row=mysql_fetch_array($query, MYSQL_ASSOC))
			//$data['success']=true;
			$data[]=$row;
		}
		else{  
			$data['success']=false;
		};
		Print json_encode($data);	
	}

	public function getStudentListJson($studentId, $studentName){
		$data = array();
		$query = mysql_query("SELECT * FROM `studentinfo` WHERE (sID = '$studentId') AND (sName = '$studentName' )") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {  
		while($row=mysql_fetch_array($query, MYSQL_ASSOC))
			$data[]=$row;
			$data['success']=true;	    
		}
		else  {
			$data['success']=false;
		}
		Print json_encode($data);
	}
	public function AnswerSheetListJson(){
		$data = array();
		$query = mysql_query("SELECT * FROM `answersheet` ORDER BY aID ASC") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {  
		while($row=mysql_fetch_array($query, MYSQL_ASSOC))
			//$data['success']=true;
			$data[]=$row;
		}
		else  {
			$data['success']=false;
		}
		Print json_encode($data);
	}

}

function addStudentInfo($studentName,$studentEmail,$studentEmailCC,$studentClass,$studentYear,$studentMobile,$studentNotes)
{
 $ip=$_SERVER['REMOTE_ADDR'];
	 $query = mysql_query("INSERT INTO `studentinfo` (`sID`, `sName`, `sEmail`, `sEmailCc`, `sClass`, `sYear`, `sNotes`, `sMobile`) VALUES (NULL, '$studentName', '$studentEmail', '$studentEmailCC', '$studentClass', '$studentYear', '$studentNotes', '$studentMobile')") or die(mysql_error());			
	 return true;			 
}
function addAnswerSheet($classAnswer,$subjectAnswer,$testDate,$newfilename)
{
	 $query = mysql_query("INSERT INTO `answersheet` (`aClass`, `aSubject`, `aPdfFile`, `aDate`,`aHide` ) VALUES ('$classAnswer','$subjectAnswer','$newfilename','$testDate', 1)") or die(mysql_error());	
	 return true;			 
}

function sendWelcomeEmail()
{
	ini_set('sendmail_from', 'we@webenable.co');
	$to      = 'nobody@example.com';
	$subject = 'the subject';
	$message = 'hello';

	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=iso-8859-1";
	$headers[] = "From: Sender Name <sender@domain.com>";
	$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
	$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
	$headers[] = "Subject: {$subject}";
	$headers[] = "X-Mailer: PHP/".phpversion();

mail($to, $subject, $email, implode("\r\n", $headers),'O DeliveryMode=b');


//mail($to, $subject, $message, $headers);

}
?>