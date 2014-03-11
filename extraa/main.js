'use strict';

angular.module('RRngreachOut')
  .controller('MainCtrl', function ($scope, $location, $routeParams,$http) {
  	$http.get('rrnagr-reachout.php').success(function(data) {
    $scope.mainInfo = data.reachOutNew;
    $scope.MonthArray = [];
    $scope.YearArray = [];
    $scope.IssueArray = [];

  	$.each($scope.mainInfo, function () {
  		$scope.MonthArray.push(this.MonthN);
  		$scope.YearArray.push(this.Year);
  		$scope.IssueArray.push(this.Issue);
  	});
  
    $location.path('/'+ $scope.YearArray[0] + '/' + $scope.MonthArray[0] + '/' + $scope.IssueArray[0] );

    });

    

  });

angular.module('RRngreachOut')
  .controller('pdfCntrl', function ($scope, $location, $routeParams,$http) {
    $scope.Year = $routeParams.year;
    $scope.Month = $routeParams.month;
    $scope.Issue = $routeParams.issue;

    $http.get('rrnagr-reachout.php').success(function(data) {
        $scope.mainInfo = data.reachOut;
        $scope.listFile = jQuery.grep($scope.mainInfo, function(element, index){
                return (element.Year == $routeParams.year &&  element.MonthN == $routeParams.month  && element.Issue == $routeParams.issue ); 
            });

      });

  });

angular.module('RRngreachOut')
    .controller('hdrCntrl', function ($scope, $location, $routeParams,$http) {

    $http.get('rrnagr-reachout.php').success(function(data) {
      $scope.mainInfo = data.reachOut;
      $scope.mainInfoNew = data.reachOutNew;

      $scope.YearArray = [];
      $scope.MonthArray = [];
      $.each($scope.mainInfo, function () {
        $scope.YearArray.push(this.Year);
      }); 

      $scope.$watch('reachOut.Year', function() {
            $scope.listMonth = jQuery.grep($scope.mainInfo, function(element, index){
                return element.Year == $scope.reachOut.Year ; 
            });
            var monthL = $scope.listMonth.length;
            $scope.reachOut.MonthN = $scope.listMonth[0];
      });

      $scope.$watch('reachOut.MonthN', function() {
            $scope.listIssue = jQuery.grep($scope.mainInfo, function(element, index){
                return (element.Year == $scope.reachOut.Year && element.MonthN == $scope.reachOut.MonthN.MonthN ) ; 
            });
            $scope.reachOut.Issue = $scope.listIssue[0]; 
      });
  
    });

    $http.get('rrnagr-slide.php').success(function(data) {
      $scope.slidesJson = data.reachOut;
       $scope.slides = [];
      $.each($scope.slidesJson, function () {
        $scope.slides.push(this);
      });
  
    });

    $scope.reachOut={
      Year : '2013'
    }
    $scope.pathUrl =  $location.path();
    var res = $scope.pathUrl.split("/");

    $scope.searchPdf = function() {
      $location.path('/'+ $scope.reachOut.Year + '/' + $scope.reachOut.MonthN.MonthN + '/' + $scope.reachOut.Issue.Issue  );
      $('#collapse-1').collapse('hide');
    };

  });