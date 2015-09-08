angular.module('pixi.admin', ["pixi.resource", "ui.bootstrap", "ngResource"])
    .controller("SidebarController", ["$scope", "$http", function ($scope, $http) {
        $scope.open = function(event){
            var li = $(event.target).parent('li');
            li.toggleClass('active');
        }

    }])
    .controller("PermissionController", ["$scope", function($scope){
        $scope.columns = [
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
        ];
    }])
    .controller("RoleController", ["$scope", function($scope){
        $scope.columns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "permissions",
                displayName: "Permissions",
                targetEntity: "Permission",
                type: "List"
            }
        ];
    }])
    .controller("UserController", ["$scope", function($scope){
        $scope.columns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "email",
                displayName: "Email",
                type: "string"
            },
            {
                name: "userRole",
                displayName: "Role",
                targetEntity: "UserRole",
                type: "Object"
            },
            {
                name: "username",
                displayName: "User Name",
                type: "string"
            },
            {
                name: "isActive",
                displayName: "Active",
                type: "boolean"
            },

        ]
    }])
    .directive('sidebar', ['$location', function () {
        return {
            templateUrl: '/admin/sidebar',
            restrict: 'E',
            replace: true,
            controller: "SidebarController"
        }
    }]);
