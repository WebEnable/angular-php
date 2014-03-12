<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <body ng-app="NileshTutorial" >
  <header ng-include src="'views/headers.php'" class="clearfix"></header>
  <div ng-view="" class="clearfix"></div>
  <footer ng-include src="'views/footer.html'" class="footer clearfix"></footer>
  
  <script src="js/jquery.min.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/angular-route/angular-route.min.js"></script>
	<script src="js/angular-resource/angular-resource.min.js"></script>
	<script src="js/angular-cookies/angular-cookies.min.js"></script>
	<script src="js/angular-sanitize/angular-sanitize.min.js"></script>
	<script src="js/app.js"></script>
	<script src="js/controllers/main.js"></script>
  <script src="js/service/service.js"></script>
  <script src="js/ui-bootstrap-tpls-0.10.0.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>