<?php 
session_start();
include_once 'config/functions.php';

if($_SESSION['security_code'] == $_REQUEST['security_code'])
{

					//Function to sanitize values received from the form. Prevents SQL injection
					function clean($str) {
						$str = @trim($str);
						if(get_magic_quotes_gpc()) {
							$str = stripslashes($str);
						}
						return mysql_real_escape_string($str);
					}
				//FILTER_SANITIZE_EMAIL
				  function spamcheck($field)
				  { $field=filter_var($field, FILTER_SANITIZE_EMAIL);
				  	  if(filter_var($field, FILTER_VALIDATE_EMAIL))
				  	    { return TRUE; }
				  	  else { return FALSE; }
				  }

	//Sanitize the POST values
	

    
    //$evt_paid = clean($_POST['evt_paid']);
	$evt_title = clean($_POST['evt_title']);
	if ($evt_title == ""){ header( 'Location: admin_menu.php?msg_st=evt_title_false&events&ent_id='.$evt_id );}
	$evt_id = clean($_POST['evt_id']);
	$evt_desc = clean($_POST['evt_desc']);
    $evt_desc = str_split($evt_desc, 250);
	$evt_desc = $evt_desc[0];

    $evt_fdate = clean($_POST['evt_fdate']);
	$evt_tdate = clean($_POST['evt_tdate']);if($evt_tdate==""){$evt_tdate=$evt_fdate;}
	if(isset($_POST['hide_dates'])){$hide_dates = '1';}
	else{$hide_dates='0';}
	
    
    //echo $evt_tdate;
    if (strtotime($evt_tdate) < strtotime(date('Y-m-d'))) 
    {
    header( 'Location: admin_menu.php?msg_st=evt_tdate_false1&&eventsent_id='.$evt_id );
    }
    
    if (strtotime($evt_fdate)> strtotime($evt_tdate)) 
    {
    header( 'Location: admin_menu.php?msg_st=evt_tdate_false2&eventsent_id='.$evt_id );
    }

    


    $evt_url = clean($_POST['evt_url']);if ($evt_url == ""){ $evt_url="NULL";}
	//$evt_attc = clean($_POST['evt_attc']);if ($evt_attc == ""){ $evt_attc="NULL";}
	
    




    	//$evt_attc = clean($_POST['evt_attc']);if ($evt_attc == ""){ $evt_attc="NULL";}

     if ($_FILES["evt_attc_new"]["name"]!="") 
	{ 
		$evt_attc = basename($_FILES['evt_attc_new']['name']);

        
        $ext = findexts ($_FILES['evt_attc_new']['name']) ;
        
        //echo "extension ".$ext."<br/>";


if ((($_FILES["evt_attc_new"]["type"] == "image/jpeg")|| ($_FILES["evt_attc_new"]["type"] == "image/pjpeg") 
|| ($_FILES["evt_attc_new"]["type"] == "image/png") || ($_FILES["evt_attc_new"]["type"] == "image/gif")
|| ($ext =="pdf") || ($ext =="doc")|| ($ext =="docx") || ($ext =="xls") || ($ext =="xlsx") || ($ext =="ppt") || ($ext =="pptx")
|| ($ext =="ods") || ($ext =="odp") || ($ext =="odp")
|| ($_FILES["evt_attc_new"]["type"] == "application/x-zip")|| ($ext =="rar")
)
&& ($_FILES["evt_attc_new"]["size"] < 10485760))
{


         		
  
$words = explode(" ", $evt_title);
for($i=0;$i<count($words); $i++)
{ $words_i.=$words[$i].'_';
}  
$time=$words_i.time();
	

         $target_d = "event/"; //File Directory 
         $target = $target_d .$time.".".$ext;
           
           if(move_uploaded_file($_FILES['evt_attc_new']['tmp_name'], $target)) 
            { 
				            $evt_attc=$time.".".$ext;
							//echo "The file uploaded";	
            }
            else { 
            header( 'Location: admin_menu.php?upload=false&ent_id='.$evt_id ) ;
            echo "Sorry, there was a problem uploading your file."; }
 }
 else{ 
 header( 'Location: admin_menu.php?format=false&eventsent_id='.$evt_id ) ;
 echo "File format not Supported"; }
 }
 else
 {
 $evt_attc=clean($_POST['evt_attc']);
 }
 update_event_data_edited($evt_id,$evt_title,$evt_desc,$evt_fdate,$evt_tdate,$hide_dates,$evt_url,$evt_attc);

		header( 'Location: admin_menu.php?msg_st=updated_event&events&ent_id='.$evt_id);
	

}
	else {
				header( 'Location: admin_menu.php?msg_st=wrong_captara&events&ent_id='.$evt_id );
	}
 ?>
