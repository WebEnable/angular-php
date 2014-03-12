<div class="container margin-bottom-50" >
<div clas="row">
	<div class="col-md-3">
	  <div ng-include src="'views/listGroups.php'" class="list-group"></div>
	</div>
	<div class="col-md-9" ng-if="UserService.isLogged">
<div class="table-responsive">
  <table class="table table-bordered">
	<thead>
	  <tr>
	    <th>#</th>
	    <th>Class</th>
	    <th>Subject</th>
	    <th>Date</th>
	    <th>Answer Sheet</th>
	    <th>Edit</th>
	  </tr>
	</thead>
	<tbody>
		<tr>
			<td>Filter</td>
			<td><input type="search" ng-model="search.aClass" placeholder="Filter Class" class="form-control" /></td>
			<td><input type="search" ng-model="search.aSubject" placeholder="Filter Subject" class="form-control" /></td>
			<td><input type="search" ng-model="search.aDate" placeholder="Filter Date" class="form-control" /></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
	<tbody class="studentList">
	  <tr ng-repeat="answerSheetLists in answerSheetList | startFrom:currentPageA*pageSizeA | limitTo:pageSizeA | filter:search:strict ">
	    <td>{{$index + 1 + (currentPageA * pageSizeA)}}</td>
	    <td>{{answerSheetLists.aClass}}</td>
	    <td>{{answerSheetLists.aSubject}}</td>
	    <td>{{answerSheetLists.aDate}}</td>
	    <td>
	    <a class="btn btn-default" ng-href="config/downloadPdf.php?pdfName={{answerSheetLists.aPdfFile}}" target="_blank" >
	    <span class="glyphicon glyphicon-download" ></span> Download </a></td>
	    <td><a type="button" class="btn btn-default" >
	    <span class="glyphicon glyphicon-edit"></span> Delet</a></td>
	  </tr>
	</tbody>
  </table>
</div>

<ul class="pager">
  <li class="previous">
  <button ng-disabled="currentPageA == 0" ng-click="currentPageA=currentPageA-1">
  &larr; Previous
    </button>
    </li>
  <li class="next">
      <button ng-disabled="currentPageA >= answerSheetList.length/pageSizeA - 1" ng-click="currentPageA=currentPageA+1">
        Next  &rarr;</button></li>
</ul>
 
    {{currentPageA+1}}/{{numberOfPagesA()}}

	</div>
</div>

</div>