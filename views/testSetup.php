<div class="container margin-bottom-50">
<div clas="row">
	<div class="col-md-3">
	  <div ng-include src="'views/listGroups.php'" class="list-group"></div>
	</div>
	<div class="col-md-9" ng-if="UserService.isLogged">
		<form role="form" action="" ng-submit="addTest()" name="testAddForm">
			<div class="input-group">
              <input type="text" class="form-control input-lg" datepicker-popup="{{format}}" ng-model="testData.dt" is-open="opened" min="" max="minDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
              <span class="input-group-btn" name="testDate">
                <button class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
          	</div>
		
			<div class="form-group "> 
				<label for="Class">Class</label>
				<select class="form-control  input-lg" ng-model="testData.classes" name="classAnswer" ng-options="option as option for option in ClassSubject.classes"></select>
				<input type="hidden" name="YclassAnswer" value="{{classes}}">
			</div>

			<div class="form-group">
				<label for="subject">Subject</label>
				<select class="form-control  input-lg" ng-model="testData.subjects" name="subjectAnswer" ng-options="option as option for option in ClassSubject.Subjects"></select>
				<input type="hidden" name="YsubjectAnswer" value="{{subjects}}">
			</div>

			<div class="form-group">
				<label for="Chapter">Chapter</label>
				<input type="text" class="form-control input-lg" ng-model="testData.testChapter" name="testChapter" id="chapter" placeholder="Chapter">
			</div>
		  <div class="form-group">
		    <label for="t1t2">T1/T2</label>
		    <input type="text" class="form-control input-lg" id="t1t2" ng-model="testData.testChapter" name="testT1T2" placeholder="Test-1 or Test-2">
		  </div>
		  <div class="form-group">
		    <label for="maxMarks">Max Marks</label>
		    <input type="text" class="form-control input-lg" id="maxMarks" test="testData.testMaxMarks" placeholder="Max Marks">
		  </div>
		  <button type="submit" class="btn-primary btn-lg">Add</button>
		</form>

	</div>
</div>

</div>