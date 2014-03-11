<div class="container  margin-bottom-50" >
<div clas="row">
	<div class="col-md-3">
	  <div ng-include src="'views/listGroups.php'" class="list-group"></div>
	</div>
	<div class="col-md-9" ng-if="UserService.isLogged">
		<form role="form" action="config/uploadAnswerSheet.php" enctype="multipart/form-data" method="post">
		  <div class="form-group "> 
		    <label for="Class">Class</label>
		    <select class="form-control  input-lg" ng-model="classes" name="YclassAnswer" ng-options="option as option for option in ClassSubject.classes"></select>

		    <input type="hidden" name="classAnswer" value="{{classes}}">
		    <!-- 
		    <input type="text" class="form-control input-lg"  id="Class" placeholder="Class"> -->
		  </div>
		  <div class="form-group">
		    <label for="subject">Subject</label>
		    <select class="form-control  input-lg" ng-model="subjects" name="YsubjectAnswer" ng-options="option as option for option in ClassSubject.Subjects"></select>

		   	<input type="hidden" name="subjectAnswer" value="{{subjects}}">

		    <!-- <input type="text" class="form-control input-lg" id="subject" name="subjectAnswer" placeholder="Subject"> -->
		  </div>
		  <div class="form-group">
		    <label for="InputFile">Upload Answer Sheet</label>
		    <input type="file" id="InputFile" class="form-control input-lg" name="pdfFile"  accept="application/pdf">
		    <p class="help-block">Please upload pdf files</p>
		  </div>

		  <p class="input-group">
              <input type="text" class="form-control input-lg" datepicker-popup="{{format}}" ng-model="dt" is-open="opened" min="" max="minDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
              <span class="input-group-btn">
                <button class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
		  <button type="submit" class="btn-primary btn-lg">Add</button>
		</form>
	</div>
	</div>
</div>