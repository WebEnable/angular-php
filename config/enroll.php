<div class="enroll">


<div class="jp-title clearfix">
    
    <ul class="unstyled clearfix">
    <li class="scrollingtext">
     <h4>Happy Sankrati :: Advertise or Enroll for Free</h4>
     </li>
    </ul>
</div>



<div class="clearfix sildeshow_rrnagar">
<div class="box_skitter box_skitter_large">
<?php 
$input_style = array("cubeSpread", "blindHeight", "cubeShow", "cubeSize", "cube", "cubeRandom","cubeStop","blind","blindHeight","blindWidth","directionTop","directionBottom","cubeSpread" );
$rand_keys = array_rand($input_style, 2);

?><ul>
<?php 
				$files = glob("slide/*.jpg"); 
				for ($i=0; $i<count($files); $i++) 
				{
				$slide_name = $files[$i];
				
				echo '<li><a href="#"><img src="'.$slide_name.'" class="'.$input_style[$rand_keys[0]].'" /></a></li>';
				} 

				?>
					
				</ul>
			</div>

</div>


<div class="clearfix ">
<?php

$list_enroll=$Wall->enroll_list();
if (is_array($list_enroll) ){
	?>
<ul class="thumbnails enroll">
<?php 
foreach($list_enroll as $data)
 {
$enrl_id=$data['enrl_id'];

$enrl_org=$data['enrl_org'];
$enrl_dscrp=$data['enrl_dscrp'];
$enrl_adr1=$data['enrl_adr1'];

$enrl_lct=$data['enrl_lct'];
$enrl_city=$data['enrl_city'];
$enrl_pin=$data['enrl_pin'];
$enrl_email=$data['enrl_email'];

$enrl_phn=$data['enrl_phn'];
$enrl_kwd=$data['enrl_kwd'];

$enrl_pic=$data['enrl_pic'];
$enrl_url=$data['enrl_url'];

$enrl_prt=$data['enrl_prt'];
$enrl_date=$data['enrl_date'];
$enrl_new=$data['enrl_new'];
?>

<li class="span4">
    
<div class="media">
<div class="thumbnail enroll ">
<h6>  
<?php if(($enrl_url<>'')&&($enrl_url<>'NULL')){?><a  href="<?php echo $enrl_url; ?>"  target="_blank"> <?php echo $enrl_org;?> </a><?php }else{echo $enrl_org;}?>
</h6>





<div class="clearfix">
<?php      if(($enrl_pic <> "") && ($enrl_pic <> "NULL")){
        ?>
        <a href="enroll/<?php echo $enrl_pic; ?>" class="pull-left" rel="lightbox" title="<?php echo $enrl_org;?>" ><img src="enroll/<?php echo $enrl_pic; ?>" class="media-object" alt="<?php echo $enrl_org;?>" style="width: 40px"></a>

        <?php }?>

<div class="media-body <?php echo $enrl_id;?>">
<p><?php echo $enrl_dscrp;?><br/>
<?php echo $enrl_phn;?><br/>
<a href="mailto:<?php echo $enrl_email;?>"><?php echo $enrl_email;?></a></p>

</div>
</div>
<div class="enrol_id"> #<?php echo $enrl_id;?></div>
</div>

</div>
</li>
<?php }
 ?>
 </ul>
 <?php }?>
</div>
</div>