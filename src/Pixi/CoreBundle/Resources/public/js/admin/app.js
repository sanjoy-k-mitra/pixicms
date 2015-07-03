/**
 * Created by sanjoy on 6/26/15.
 */
(function(){
    var app = angular.module('PixiApp', [])
        .controller('ApplicationController', ['$scope', function($scope){
            $scope.applicationTitle = "Admin Panel | PixiApp";

        }])
})();