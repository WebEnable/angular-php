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
	    <th>Name</th>
	    <th>Class</th>
	    <th>Year</th>
	    <th>Email / Mobile</th>
	    <th>Notes</th>
	    <th>Edit</th>
	  </tr>
	</thead>
	<tbody>
		<tr>
			<td>Filter</td>
			<td><input type="search" ng-model="search.sName" placeholder="Filter Name" class="form-control" /></td>
			<td><input type="search" ng-model="search.sClass" placeholder="Filter Class" class="form-control" /></td>
			<td><input type="search" ng-model="search.sYear" placeholder="Filter Year" class="form-control" /></td>
			<td><input type="search" ng-model="search.sEmail" placeholder="Filter Email" class="form-control" />
			<input type="search" ng-model="search.sMobile" placeholder="Filter Mobile" class="form-control" /></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
	<tbody class="studentList">
	  <tr ng-repeat="studentLists in studentList | startFrom:currentPage*pageSize | limitTo:pageSize | filter:search:strict ">
	    <td>{{$index + 1 + (currentPage * pageSize)}}</td>
	    <td>{{studentLists.sName}}</td>
	    <td>{{studentLists.sClass}}</td>
	    <td>{{studentLists.sYear}}</td>
	    <td><strong>Email </strong>: {{studentLists.sEmail}}<br>
	    <strong>Mobile </strong>: {{studentLists.sMobile}}<br>
	    <strong>Email Cc </strong>: {{studentLists.sEmailCc}}</td>
	    <td>{{studentLists.sNotes}}</td>
	    <td>
	    <a type="button" class="btn btn-default" ng-href="#!/admin/edit/{{studentLists.sID}}/{{studentLists.sName}}">
	    <span class="glyphicon glyphicon-edit"></span> Edit</a></td>
	  </tr>
	</tbody>
  </table>
</div>

<ul class="pager">
  <li class="previous">
  <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
  &larr; Previous
    </button>
    </li>
  <li class="next">
      <button ng-disabled="currentPage >= studentList.length/pageSize - 1" ng-click="currentPage=currentPage+1">
        Next  &rarr;</button></li>
</ul>
 
    {{currentPage+1}}/{{numberOfPages()}}

	</div>

<div class="col-md-9 " ng-if="!UserService.isLogged"><div class="jumbotron"><h1>Nilesh Tutorial</h1><p></p><p><a class="btn btn-primary btn-lg" href="#!/">Login</a></p></div></div>

</div>

</div>