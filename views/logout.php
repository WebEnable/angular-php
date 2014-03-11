<div class="container  margin-bottom-50">
	<div class="row">
	<div class="col-md-6">
		<form role="form" ng-submit="login()" method="post">
		  <div class="form-group">
		    <label for="EmailID">Email address</label>
		    <input type="email" name="loginEmail" class="form-control" id="EmailID" placeholder="Enter email" required  ng-model="loginData.loginEmail">
		  </div>
		  <div class="form-group">
		    <label for="Password1">Password</label>
		    <input type="password" name="loginPassowrd" class="form-control" id="Password1" placeholder="Password" required  ng-model="loginData.loginPassowrd">
		  </div>
		  <button type="submit" class="btn-primary btn-lg" ng-click="login()">Submit</button>
		</form>
	</div>
	<div class="col-md-6"></div>
	</div>
</div>