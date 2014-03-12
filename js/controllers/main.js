'use strict';

angular.module('NileshTutorial')
  .controller('MainCtrl', function ($scope,$http,$location,UserService) {

    $scope.UserService = UserService;

/*    if($scope.UserService.isLogged){
      $location.path('/admin');}
      else*/{
        $scope.loginData = {};
        $scope.login = function() {
        $http({
            method  : 'POST',
            url     : 'config/login.php',
            data    : $.param($scope.loginData),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
            .success(function(data) {
                if (!data.success) {
                  // if not successful, bind errors to error variables
                } else {
                  // if successful, bind success message to message
                    UserService.isLogged = data.success;
                    UserService.username = data.username;

                    $scope.loginData = {};
                    $location.path('/'+$scope.UserService.username);              
                }
            });
        };
    }
  });
angular.module('NileshTutorial')
  .controller('adminMainCtrl', function ($scope,$location,UserService) {
    $scope.UserService = UserService;

/**/
});
angular.module('NileshTutorial')
  .controller('addStudentCntrl', function ($scope, $http,$location,UserService,ClassSubject) {
    $scope.UserService = UserService;
/*    if(!$scope.UserService.isLogged){$location.path('/');}*/
        $scope.formData = {};
        $scope.addStudent = function() {
          $http({
                method  : 'POST',
                url     : 'config/studentAdd.php',
                data    : $.param($scope.formData),  // pass in data as strings
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function(data) {
                    $scope.success = data.success;

                    if (!data.success) {
                      // if not successful, bind errors to error variables

                    } else {
                      // if successful, bind success message to message
                        $scope.message = data.message;
                        $scope.formData = {};
                    }
                });
        };
        $scope.clearForm = function() {
           $scope.formData = {};
        };
      /*}*/
  });
angular.module('NileshTutorial')
  .controller('addTestCntrl', function ($scope,$location,UserService,ClassSubject) {
    $scope.UserService = UserService;
    $scope.ClassSubject= ClassSubject;
    $scope.testData = {};

        $scope.today = function() {
          $scope.testData.dt = new Date();
        };
        $scope.today();

        $scope.showWeeks = true;
        $scope.toggleWeeks = function () {
          $scope.showWeeks = ! $scope.showWeeks;
        };

        $scope.clear = function () {
          $scope.testData.dt = null;
        };
        // Disable weekend selection
        $scope.disabled = function(date, mode) {
          return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
        };

        $scope.toggleMin = function() {
          $scope.minDate = ( $scope.minDate ) ? null : new Date();
        };
        $scope.toggleMin();

        $scope.open = function($event) {
          $event.preventDefault();
          $event.stopPropagation();
          $scope.opened = true;
        };

        $scope.dateOptions = {
          'year-format': "'yy'",
          'starting-day': 1
        };

        $scope.formats = ['dd-MMMM-yyyy', 'yyyy-MM-dd', 'shortDate'];
        $scope.format = $scope.formats[1];
        $scope.classes = $scope.ClassSubject.classes[0];
        $scope.subjects = $scope.ClassSubject.Subjects[0];

  });
angular.module('NileshTutorial')
  .controller('addTestMarks', function ($scope) {
  });

angular.module('NileshTutorial')
  .controller('uploadAnswerSheet', function ($scope,$location,UserService,ClassSubject,$routeParams) {

    $scope.UserService = UserService;
    $scope.ClassSubject= ClassSubject;
    $scope.routeParams = $routeParams;

        $scope.today = function() {
          $scope.dt = new Date();
        };
        $scope.today();

        $scope.showWeeks = true;
        $scope.toggleWeeks = function () {
          $scope.showWeeks = ! $scope.showWeeks;
        };

        $scope.clear = function () {
          $scope.dt = null;
        };
        // Disable weekend selection
        $scope.disabled = function(date, mode) {
          return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
        };

        $scope.toggleMin = function() {
          $scope.minDate = ( $scope.minDate ) ? null : new Date();
        };
        $scope.toggleMin();

        $scope.open = function($event) {
          $event.preventDefault();
          $event.stopPropagation();
          $scope.opened = true;
        };

        $scope.dateOptions = {
          'year-format': "'yy'",
          'starting-day': 1
        };

        $scope.formats = ['dd-MMMM-yyyy', 'yyyy-MM-dd', 'shortDate'];
        $scope.format = $scope.formats[1];
        $scope.classes = $scope.ClassSubject.classes[0];
        $scope.subjects = $scope.ClassSubject.Subjects[0];
  });

angular.module('NileshTutorial')
  .controller('AnswerSheetList', function ($scope,$http,$location,UserService,ClassSubject) {

    $scope.UserService = UserService;
    $scope.currentPageA = 0;
    $scope.pageSizeA = 50;
//    $scope.data = [];
    $scope.numberOfPages=function(){
        return Math.ceil($scope.data.length/$scope.pageSize);                
    }

    $http.get('json/answerSheetList.php').success(function(data) { 
      $scope.answerSheetList = data;
    });

    $scope.numberOfPagesA=function(){
        return Math.ceil($scope.answerSheetList.length/$scope.pageSizeA);                
    }


/**/
  });
  
angular.module('NileshTutorial')
  .controller('hdrCntrl', function ($scope,UserService) {
      $scope.UserService = UserService;
});

angular.module('NileshTutorial')
  .controller('studentListCtrl', function ($scope,$http,UserService) {
    $scope.UserService = UserService;
    $scope.currentPage = 0;
    $scope.pageSize = 100;
//    $scope.data = [];
    $scope.numberOfPages=function(){
        return Math.ceil($scope.data.length/$scope.pageSize);                
    }

    $http.get('json/studentList.php').success(function(data) { 
      $scope.studentList = data;
    });

    $scope.numberOfPages=function(){
        return Math.ceil($scope.studentList.length/$scope.pageSize);                
    }

});


angular.module('NileshTutorial')
  .controller('logoutCntrl', function ($scope,$http,$location,UserService) {
    $scope.logoutData = "logout";
    $http({
        method  : 'POST',
        url     : 'config/logout.php',
        data    : $.param($scope.logoutData),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
    })
        .success(function(data) {
            if (!data.success) {
            } else {
                UserService.isLogged = false;
                $location.path('/');

            }
        });
});


angular.module('NileshTutorial')
.filter('startFrom', function() {
    return function(input, start) {
        start = +parseInt(start); //parse to int
        return input.slice(start);
    }
});