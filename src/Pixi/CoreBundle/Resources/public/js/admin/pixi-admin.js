angular.module('pixi.admin', ["pixi.resource", "ui.bootstrap", "ngResource"])
    .controller("SidebarController", ["$scope", "$http", function ($scope, $http) {
        $scope.open = function(event){
            var li = $(event.target).parent('li');
            li.toggleClass('active');
        }

    }])
    .controller("PermissionController", ["$scope", function($scope){
        $scope.editColumns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "key",
                displayName: "Key",
                type: "string"
            },
            {
                name: "description",
                displayName: "Description",
                type: "string"
            }
        ]
        $scope.viewColumns = $scope.editColumns;
        $scope.columns = [{
                name: "id",
                displayName: "ID",
                type: "integer"
            }].concat($scope.editColumns);
    }])
    .controller("RoleController", ["$scope", function($scope){
        $scope.editColumns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "permissions",
                displayName: "Permissions",
                targetEntity: "Permission",
                type: "Object"
            }
        ]
        $scope.viewColumns = $scope.editColumns;
        $scope.columns = [{
                name: "id",
                displayName: "ID",
                type: "integer"
            }].concat($scope.editColumns);
    }])
    .directive('sidebar', ['$location', function () {
        return {
            templateUrl: '/admin/sidebar',
            restrict: 'E',
            replace: true,
            controller: "SidebarController"
        }
    }]);
