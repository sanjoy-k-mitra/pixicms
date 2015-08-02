/**
 * Created by sanjoy on 8/3/15.
 */
var app = angular.module('pixiAdminApp')
    .controller("ResourceListController", ["$scope", "$http", "$attrs", function ($scope, $http, $attrs) {
        $scope.resource = {
            name:$attrs.title || $attrs.name,
            endpointUrl:$attrs.endpoint
        }
        $scope.resource.columns = [];
        $http({method:"OPTIONS", url: $scope.resource.endpointUrl}).then(function(resp){
            $scope.resource.options = resp.data;
            for(column in $scope.resource.options){
                $scope.resource.columns.push(column);
            }
        })
        $http.get($scope.resource.endpointUrl).success(function(resp){
            $scope.items = resp;
        });
        $scope.showForm = false;
        $scope.showPrompt = false;
        $scope.view = function(item){
            $scope.item = item;
            $scope.showForm = true;
        }
        $scope.edit = function(item){
            $scope.item = item;
            $scope.showForm = true;
        }
        $scope.delete = function(item){
            $scope.item = item;
            $scope.showPrompt = true;
        }
    }])
    .directive("resourceList", function () {
        return {
            restrict: "E",
            scope: {},
            templateUrl: "/bundles/pixicore/template/admin/resource/list.html",
            link: function($scope, $element, $attrs){
                console.log("ResourceList directive invoked");
            },
            controller: "ResourceListController"
        }
    })
    .directive("resourceForm", function(){
        return {
            restrict: "E",
            scope:true,
            replace: true,
            templateUrl: "/bundles/pixicore/template/admin/resource/form.html",
            link:function(scope, element, attrs){
                scope.title = attrs.title || attrs.name;
                scope.$watch(attrs.visible, function(value){
                    if(value == true)
                        $(element).modal('show');
                    else
                        $(element).modal('hide');
                });

                $(element).on('shown.bs.modal', function(){
                    //scope.$apply(function(){
                        scope.$parent[attrs.visible] = true;
                    //});
                });

                $(element).on('hidden.bs.modal', function(){
                    //scope.$apply(function(){
                        scope.$parent[attrs.visible] = false;
                    //});
                });
            }
        }
    })
    .directive("resourcePrompt", function(){
        return {
            restrict: "E",
            scope:true,
            replace: true,
            templateUrl: "/bundles/pixicore/template/admin/resource/prompt.html",
            link:function(scope, element, attrs){
                scope.title = attrs.title || attrs.name;
                scope.$watch(attrs.visible, function(value){
                    if(value == true)
                        $(element).modal('show');
                    else
                        $(element).modal('hide');
                });

                $(element).on('shown.bs.modal', function(){
                    //scope.$apply(function(){
                        scope.$parent[attrs.visible] = true;
                    //});
                });

                $(element).on('hidden.bs.modal', function(){
                    //scope.$apply(function(){
                        scope.$parent[attrs.visible] = false;
                    //});
                });
            }
        }
    })