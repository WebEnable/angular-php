<?php
require 'dbconfig.php';
class Wall_Updates {
	public function list_category(){
		$query = mysql_query("SELECT * FROM category_tb ORDER BY ctg_name ASC") or die(mysql_error());
	    
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {
			while($row=mysql_fetch_array($query))
		
		$data[]=$row;
	    return $data;
	}
	}
	public function list_category_edit($ctg_id){
		$query = mysql_query("SELECT * FROM category_tb where ctg_id='$ctg_id'") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {
		while($row=mysql_fetch_array($query))
		$data[]=$row;
	    return $data;
		}
	}
	public function update_category_add($ctg_name3,$ctg_name,$ctg_discr){
		$query = mysql_query("SELECT ctg_id FROM category_tb where ctg_id='$ctg_name3'") or die(mysql_error());
		$row = mysql_num_rows($query);
		if ($row!=0){ header( 'Location: add_category.php?msg_st=false' );}
		else{
		$query = mysql_query("INSERT INTO `category_tb` (`ctg_id`, `ctg_name`, `ctg_discr`, `ctg_disp`) VALUES ('$ctg_name3', '$ctg_name', '$ctg_discr', '1')") or die(mysql_error());
		header( 'Location: add_category.php?msg_st=true' );
		}
		
	}
	public function update_category_edit($ctg_id,$ctg_name,$ctg_discr,$ctg_disp){
		$query = mysql_query("UPDATE category_tb SET ctg_name='$ctg_name',ctg_discr='$ctg_discr',ctg_disp='$ctg_disp'  WHERE ctg_id='$ctg_id'") or die(mysql_error());
	}

	public function list_enroll(){
		$query = mysql_query("SELECT * FROM rrinfo_enrl ORDER BY enrl_new ASC , enrl_prt ASC") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {  
		while($row=mysql_fetch_array($query))
		$data[]=$row;
	    return $data;
		}
	
	}
	public function enroll_list(){
		$query = mysql_query("SELECT * FROM rrinfo_enrl where enrl_disp='1' ORDER BY enrl_new ASC , enrl_prt ASC") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {  
		//print "HEllo";
		while($row=mysql_fetch_array($query))
		$data[]=$row;
	    return $data;
		}
		else  Print "NULL";
	
	}

public function list_enroll_edit($enrl_id){
		$query = mysql_query("SELECT * FROM rrinfo_enrl where enrl_id='$enrl_id' ORDER BY enrl_id ASC") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {
		while($row=mysql_fetch_array($query))
		$data[]=$row;
	    return $data;
		}
	
	}
	public function list_event($limit_event){
		$curDate = date("Y-m-d");
		$query = mysql_query("SELECT * FROM rrinfo_evnt WHERE (evt_tdate >= '$curDate') and (evt_dis<>'0') order by evt_hide_dates ASC, evt_tdate ASC  LIMIT $limit_event") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {
		while($row=mysql_fetch_array($query))
		$data[]=$row;
	    return $data;
		}
		else{ return FALSE;
	}
}
	public function list_all_event(){
		$curDate = date("Y-m-d");
		$query = mysql_query("SELECT * FROM rrinfo_evnt WHERE (evt_tdate >= '$curDate') order by evt_new,evt_tdate DESC ") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {
		while($row=mysql_fetch_array($query))
		$data[]=$row;
	    return $data;
		}
		else{ Print 'No New Events';
	}
}
	public function list_arch_event(){
		$curDate = date("Y-m-d");
		$query = mysql_query("SELECT * FROM rrinfo_evnt WHERE (evt_tdate < '$curDate') order by evt_new,evt_tdate DESC ") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {
		while($row=mysql_fetch_array($query))
		$data[]=$row;
	    return $data;
		}
		else{ Print 'No Old Events';
	}
}

	public function list_event_edit($ent_id){
		
		$query = mysql_query("SELECT * FROM rrinfo_evnt where evt_id='$ent_id' order by evt_tdate DESC ") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if ($num_rows>0) {
		while($row=mysql_fetch_array($query))
		$data[]=$row;
	    return $data;
		}
		else{ Print 'No Events';
	}
}
}

function mark_delete($enrl_id){
	$query = mysql_query("DELETE FROM rrinfo_enrl WHERE  enrl_id = '$enrl_id' ") or die(mysql_error());

}
function mark_delete_event($event_id){
	$query = mysql_query("DELETE FROM rrinfo_evnt WHERE  evt_id = '$event_id' ") or die(mysql_error());

}

function mark_display($event_id)
{
$query = mysql_query("UPDATE  rrinfo_evnt SET evt_dis=1,evt_new=1 WHERE evt_id='$event_id'") or die(mysql_error());
//sendWelcomeEmail($m_id);
}
function mark_hide($event_id)
{
$query = mysql_query("UPDATE  rrinfo_evnt SET evt_dis=0 WHERE evt_id='$event_id'") or die(mysql_error());

}
function mark_display_enrl($enrl_id)
{
$query = mysql_query("UPDATE  rrinfo_enrl SET enrl_disp=1, enrl_new=1 WHERE enrl_id='$enrl_id'") or die(mysql_error());
//sendWelcomeEmail($m_id);
}
function mark_hide_enrl($enrl_id)
{
$query = mysql_query("UPDATE  rrinfo_enrl SET enrl_disp=0 WHERE enrl_id='$enrl_id'") or die(mysql_error());

}

function list_category(){
	
	$res=mysql_query("SELECT * FROM category_tb where ctg_name !='other' order by ctg_name");
	if(!$res or mysql_num_rows($res)==0) 
	{print "<option value='other'>other</option>";
		return false;
	}
	while($field=mysql_fetch_assoc($res)){
		print "<option value='".$field['ctg_id']."'>".$field['ctg_name']."</option>";
		}
	
	}
function update_enroll_data($enrl_name,$enrl_y_mob,$enrl_org,$enrl_dscrp,$enrl_adr1,$enrl_email,$enrl_phn,$enrl_key_word,$photo,$enrl_url,$today)
{
	 $ip=$_SERVER['REMOTE_ADDR'];
 	 $query = mysql_query("INSERT INTO `rrinfo_enrl` (enrl_name,enrl_y_mob,enrl_org,enrl_dscrp,enrl_adr1,enrl_email,enrl_phn,enrl_kwd,enrl_pic,enrl_url,enrl_date,ip) 
	 	 VALUES ('$enrl_name','$enrl_y_mob','$enrl_org','$enrl_dscrp','$enrl_adr1','$enrl_email','$enrl_phn','$enrl_key_word','$photo','$enrl_url','$today','$ip')") or die(mysql_error());
			
 	 Print $query;
 	 return true;
			 
}
function update_event_data($evt_ente,$evt_mbl,$evt_email,$evt_title,$evt_desc,$evt_fdate,$evt_tdate,$hide_dates,$evt_url,$evt_attc)
{
	//$ip=$_SERVER['REMOTE_ADDR'];
 $query = mysql_query("INSERT INTO `rrinfo_evnt` (evt_ente, evt_mbl,evt_email,evt_title,evt_desc,evt_fdate, evt_tdate, evt_hide_dates, evt_url,evt_attc) 
	 	 VALUES ('$evt_ente','$evt_mbl','$evt_email','$evt_title','$evt_desc','$evt_fdate','$evt_tdate','$hide_dates','$evt_url','$evt_attc')") or die(mysql_error());
			return true;
}


function update_event_data_edited($evt_id,$evt_title,$evt_desc,$evt_fdate,$evt_tdate,$hide_dates,$evt_url,$evt_attc)
{
$query = mysql_query("UPDATE  rrinfo_evnt SET 
evt_title='$evt_title',evt_desc='$evt_desc',evt_fdate='$evt_fdate',evt_tdate='$evt_tdate',evt_hide_dates='$hide_dates',evt_url='$evt_url',evt_attc='$evt_attc'
WHERE evt_id='$evt_id'") or die(mysql_error());

}
function update_enroll_data_edited($enrl_id,$enrl_org,$enrl_dscrp,$enrl_adr1,$enrl_email,$enrl_phn,$enrl_key_word,$photo,$enrl_url,$today)
{
$query = mysql_query("UPDATE  rrinfo_enrl SET 
enrl_org='$enrl_org',enrl_dscrp='$enrl_dscrp',enrl_adr1='$enrl_adr1',enrl_email='$enrl_email',enrl_phn='$enrl_phn',enrl_kwd='$enrl_key_word',
enrl_url='$enrl_url',enrl_date='$today',enrl_pic='$photo'
WHERE enrl_id='$enrl_id'") or die(mysql_error());

}
function findexts ($evt_attc)
        { 
				        $filename = strtolower($evt_attc) ;
				        $exts = explode(".", $filename);
				        $n = count($exts)-1; 
				        $exts = $exts[$n]; return $exts; 
        } //Function to subtract extension from file  
function new_enroll(){
$query = mysql_query("SELECT count(*) FROM rrinfo_enrl where enrl_new=0 ") or die(mysql_error());

	 if($query and mysql_num_rows($query)>0){
		$f=mysql_fetch_assoc($query);
		if($f["count(*)"]==0) print '0';
	    else print $f["count(*)"];
	   }
	   else print '0';
}
function new_event(){
	$curDate = date("Y-m-d");
$query = mysql_query("SELECT count(*) FROM rrinfo_evnt where evt_new=0 and (evt_tdate >= '$curDate') ") or die(mysql_error());

	 if($query and mysql_num_rows($query)>0){
		$f=mysql_fetch_assoc($query);
		if($f["count(*)"]==0) print '0';
	    else print $f["count(*)"];
	   }
	   else print '0';
}

function sendWelcomeEmail($enr_evnt, $enr_evnt_name){
	ini_set('sendmail_from', 'we@webenable.co');
				$to  = 'we@webenable.co'; // note the comma
				
				// subject
				$subject = 'RRNAGAR.info '.$enr_evnt .':'.$enr_evnt_name;
				
				$message = 'New Registration in RRNAGAR.info \r\n';
				$message .= $enr_evnt .':'.$enr_evnt_name;
				$headers = 'To: RRNAGAR <we@webenable.co>\r\n';
				$headers .= 'From: RRNAGAR <we@webenable.co>\r\n';
				mail($to, $subject, $message, $headers);	
}

function enrol_priority($enrol_id, $enrol_priority)
{
$query = mysql_query("UPDATE  rrinfo_enrl SET enrl_prt='$enrol_priority' WHERE  enrl_id='$enrol_id'") or die(mysql_error());
//print "UPDATE  rrinfo_enrl SET enrl_prt='$enrol_priority' WHERE  enrl_id='$enrol_id'";
}
?>