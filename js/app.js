'use strict';

angular.module('NileshTutorial', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'ngRoute',
  'ui.bootstrap'
  ])
  .config(function ($routeProvider) {
      $routeProvider
        .when('/', {
          controller: 'MainCtrl',
          templateUrl: 'views/main.php'
        })
        .when('/admin', {
          controller: 'adminMainCtrl',
          templateUrl: 'views/adminMain.php'
        })
        .when('/admin/student/list', {
          controller: 'studentListCtrl',
          templateUrl: 'views/StudentList.php'
        })
        .when('/admin/add/student', {
          controller:'addStudentCntrl',
          templateUrl:'views/studentSetup.php'
        })
        .when('/admin/add/test', {
          controller:'addTestCntrl',
          templateUrl:'views/testSetup.php'
        })
        .when('/admin/add/marks', {
          controller:'addTestMarks',
          templateUrl:'views/updateMarks.php'
        })
        .when('/admin/upload/answersheet/:id', {
          controller:'uploadAnswerSheet',
          templateUrl:'views/answerSheetUpload.php'
        })
        .when('/admin/answersheet/list', {
          controller:'AnswerSheetList',
          templateUrl:'views/answerSheetList.php'
        })
        .when('/logout', {
          controller:'logoutCntrl',
          templateUrl:'views/logout.php'
        })
        .otherwise({
          redirectTo: '/'
        });
});
 
