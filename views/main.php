<div class="container  margin-bottom-50">
	<div class="row">
	<div class="col-md-5" ng-if="!UserService.isLogged">
	
		<form role="form" class="form-signin" ng-submit="login()" method="post">
<!-- 		  <div class="form-group">
		    <label for="EmailID">Email address</label> -->
		    <h2 class="form-signin-heading">Please sign in</h2>
		    <input type="email" name="loginEmail" class="form-control" id="EmailID" placeholder="Email ID" required  ng-model="loginData.loginEmail">
<!-- 		  </div>
		  <div class="form-group">
		    <label for="Password1">Password</label> -->
		    <input type="password" name="loginPassowrd" class="form-control" id="Password1" placeholder="Password" required  ng-model="loginData.loginPassowrd">
<!-- 		  </div> -->
		  <button type="submit" class="btn-primary btn-lg" ng-click="login()">Submit</button>
		</form>
	</div>
	<div class="col-md-3" ng-if="UserService.isLogged">
	  <div ng-include src="'views/listGroups.php'" class="list-group"></div>
	</div>
	<div class="col-md-7"></div>
	</div>
</div>
<!-- <pre>
	{{UserService}}
</pre> -->