<?php 
session_start();
include_once 'config/functions.php';
?>

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

</header>
<div id="main_body" class="container">
<?php if(isset($_GET['msg'])){
	?>
<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<?php if($_GET['msg']=='login_failed'){?><strong> Login Failed:</strong> Please try again with correct user name and password<?php }?>

 
</div>
<?php }?>
<div class="row-fluid">

<div class="span8">

<form class="form-horizontal" action="admin_login_auth.php" method="post">
 <legend>Admin Login</legend>
  <div class="control-group">
    <label class="control-label" for="inputName">User Name</label>
    <div class="controls">
      <input type="text" id="inputName" placeholder="User Name"  name="admin_name" required="required">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="admin_pass" required="required">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
   
      <button type="submit" class="btn">Sign in</button>
    </div>
  </div>
</form>


</div>


</div>
<hr class="bs-docs-separator">

</div>
<footer id="footer" class="container navbar-fixed-bottom">
<span class="cpyrt">&copy; 2012 Rajarajeshwari Nagar.</span>
<a class="we" href="http://www.webenable.co/" title="Web Enable"></a>

</footer>
</div>

</body>

</html>

