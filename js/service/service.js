'use strict';

angular.module('NileshTutorial')
.factory('UserService', function($rootScope,$http) {
    $rootScope.sdo = {
      isLogged:false,
      username:'NULL'
    };
    $http.get('json/sessionAdmin.php').success(function(r) { 
      $rootScope.sdo.isLogged = r.session;
      $rootScope.sdo.username = r.username;
    });

	return $rootScope.sdo;
});
angular.module('NileshTutorial')
.factory('ClassSubject', function($rootScope) {

    $rootScope.sdo = {};
    $rootScope.sdo.classes = ['8','9','10','11','12'];
    $rootScope.sdo.Subjects = ["Biology","Chemistry","Engilsh","Hindhi","Kannada","Mathematics","Physics","Sanskrith","Sceince","Social Sceince"];
	return $rootScope.sdo;
});