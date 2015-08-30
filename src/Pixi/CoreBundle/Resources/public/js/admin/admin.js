angular.module('pixi.admin', [])
    .controller("SidebarController", ["$scope", "$http", function ($scope, $http) {
    $scope.selectedMenu = 'dashboard';
    $scope.collapseVar = 0;
    $scope.multiCollapseVar = 0;

    $scope.check = function (x) {

        if (x == $scope.collapseVar)
            $scope.collapseVar = 0;
        else
            $scope.collapseVar = x;
    };
    $scope.isChecked = function(x){
        return $scope.collapseVar == x;
    }

    $scope.multiCheck = function (y) {

        if (y == $scope.multiCollapseVar)
            $scope.multiCollapseVar = 0;
        else
            $scope.multiCollapseVar = y;
    };
}])
    .directive('sidebar', ['$location', function () {
        return {
            templateUrl: '/admin/sidebar',
            restrict: 'E',
            replace: true,
            scope: {},
            controller: "SidebarController"
        }
    }])
;