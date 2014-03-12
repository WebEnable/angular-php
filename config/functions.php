<?php
require 'dbconfig.php';
class WallUpdates {
	public function studentListJson(){
		$query = mysql_query("SELECT * FROM `studentinfo` ORDER BY sName ASC, sClass ASC") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {  
		while($row=mysql_fetch_array($query, MYSQL_ASSOC))
		$data[]=$row;
	    Print json_encode($data);
		}
		else  Print "NULL";		
	}
	public function AnswerSheetListJson(){
		$query = mysql_query("SELECT * FROM `answersheet` ORDER BY aID ASC") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {  
		while($row=mysql_fetch_array($query, MYSQL_ASSOC))
		$data[]=$row;
	    Print json_encode($data);
		}
		else  Print "NULL";		
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
?>