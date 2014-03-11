<?php
session_start();
if ($_SESSION['username']!="Admin" && $_SESSION['password']!="Loged")
			{header("location:logout.php");}
			
?>
<?php include_once 'config/functions.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="pics/logorrnagar.png" />
<title>Raja Rajeshawari Nagar</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="css/rrnagar.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/dateinput.css"/>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="js/jquery.tools.min.js"></script>

</head>

<body>
<div id="outer" >
<header  class="container">
<div id="header" class="row-fluid ">


<div class="logo span2"><img src="pics/logorrnagar.png"  alt="RajaRajeshwari Nagar"></div>
<div class="rrnagar span10 pull-right">
<img src="pics/Rajarajeshwari-Nagar.png" alt="RajaRajeshwari Nagar" class="pull-right"></div>

</div>
<div class="hdr_menu">
<!-- <a href="#form_event" data-load-form="form_event">Post an Event</a> | <a href="#form_enrl" data-load-form="form_enrl">Enroll For Free</a> -->
</div>

<div id="t_header" class="container">
<div class="t_hdr pull-right"  >
<a href="index.php"><i class="icon-home icon-white"></i></a>
<span>+91 9449 63 1221</span></div>
</div>
<div id="catg" >
<ul>
<li class="<?php if(isset($_GET['admin'])){echo 'selected';}?>"><a href="admin_menu.php?admin">Admin Menu</a></li>
<li class="<?php if(isset($_GET['enroll'])){echo 'selected';}?>"><a href="admin_menu.php?enroll">Enroll <sup>(<?php new_enroll();?>)</sup></a> </li>
<li class="<?php if(isset($_GET['events'])){echo 'selected';}?>"><a href="admin_menu.php?events">Events <sup>(<?php new_event();?>)</sup> </a></li>
<li> <a href="logout.php">LogOut</a></li>

</ul>
</div>
</header>
<div id="main_body" class="container">

<?php if(isset($_GET['admin'])){?>

<?php }elseif (isset($_GET['enroll'])){ 
	if(isset($_GET['enrl_id'])){
		include_once 'edit_enroll_update.php';
} else {include_once 'edit_enroll.php';}?>
<?php }elseif (isset($_GET['events'])){
	if(isset($_GET['ent_id'])){
		include_once 'edit_event_update.php';
} else { include_once 'edit_event.php';}?>
<?php }?>
<hr class="bs-docs-separator">

</div>
<footer id="footer" class="container navbar-fixed-bottom">
<span class="cpyrt">&copy; 2012 Rajarajeshwari Nagar.</span>
<a class="we" href="http://www.webenable.co/" title="Web Enable"></a>

</footer>
</div>
<script src="js/rrnagar.js"></script>
</body>

</html>

