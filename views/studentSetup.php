<?php 
session_start();
if ((isset($_SESSION['username'])!="Admin") && (isset($_SESSION['initiated'])!=1))
			{
?>
<div class="container margin-bottom-50"><div class="jumbotron"><h1>Nilesh Tutorial</h1><p></p><p><a class="btn btn-primary btn-lg" href="#/">Login</a></p></div></div>
<?php			}
		else{ ?>
<div class="container margin-bottom-50" >


<div clas="row">
	<div class="col-md-3">
	  <div ng-include src="'views/listGroups.php'" class="list-group"></div>
	</div>
	<div class="col-md-9" ng-if="UserService.isLogged">
<div class="page-header">
  <h3>Add Students</h1>
</div>

<div class="alert alert-success" ng-if="success">New Student record added</div>
<!-- <div class="alert alert-success" ng-if="!success">Error: No Record added</div> -->	
		<form role="form" name="studentForm">
		  <div class="form-group">
		    <label for="student_name">Student Name</label>
		    <input type="text" name="studentName" class="form-control input-lg" id="student_name" placeholder="Student Name"  ng-model="formData.studentName">
		  </div>
		  <div class="form-group">
		    <label for="EmailId">Email</label>
		    <input type="email" name="studentEmail" class="form-control input-lg" id="EmailId" placeholder="Email" ng-model="formData.studentEmail">
		    <span ng-show="studentForm.studentEmail.$invalid && !studentForm.studentEmail.$pristine" class="help-block">Enter a valid email.</span>

		    <p class="help-block"></p>
		  </div>
		  <div class="form-group">
		    <label for="EmailId">Email Cc</label>
		    <input type="text" name="studentEmailCC" class="form-control input-lg" id="EmailIdCc" placeholder="Email Cc" ng-model="formData.studentEmailCC">
		  </div>
		  <div class="form-group">
		    <label for="Class">Class</label>
		    <input type="text" name="studentClass" class="form-control input-lg" id="Class" placeholder="Class" ng-model="formData.studentClass">
		  </div>
		  <div class="form-group">
		    <label for="Year">Year</label>
		    <input type="text" name="studentYear" class="form-control input-lg" id="Year" placeholder="Year" ng-model="formData.studentYear">
		  </div>
		  <div class="form-group">
		    <label for="Mobile">Mobile</label>
		    <input type="text" name="studentMobile" class="form-control input-lg" id="Mobile" placeholder="Mobile Number" ng-model="formData.studentMobile">
		  </div>
		  <div class="form-group">
		    <label for="Notes">Notes</label>
		    <textarea name="studentNotes" class="form-control" rows="3" id="Notes" ng-model="formData.studentNotes"></textarea>
		  </div>
		  <button type="submit" class="btn-primary btn-lg" ng-click="addStudent()">Add</button>
		  <button type="reset" class="btn-primary btn-lg" ng-click="clearForm()">Clear</button>
		</form>
		</div>
	</div>
		<!-- <pre>{{formData}}</pre> -->
</div>
<?php }?>