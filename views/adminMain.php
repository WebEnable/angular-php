<?php 
session_start();
if ((isset($_SESSION['username'])!="admin") && (isset($_SESSION['initiated'])!=1))
			{
?>				<div class="container">
				<div class="jumbotron">
				<h1>Nilesh Tutorial</h1>
				<p></p>
				<p><a class="btn btn-primary btn-lg" href="#!/">Login</a>
				</p>
				</div>
				</div>
<?php			}
		else{ ?>
<div class="container margin-bottom-50">
<div clas="row">
	<div class="col-md-3">
	  <div ng-include src="'views/listGroups.php'" class="list-group"></div>
	</div>
	<div class="col-md-9" ng-if="UserService.isLogged"><h1>Hello</h1></div>
</div>

</div>
<?php
	}
?>