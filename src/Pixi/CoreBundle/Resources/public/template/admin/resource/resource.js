/**
 * Created by sanjoy on 8/3/15.
 */
var app = angular.module('pixiAdminApp')
    .controller("ResourceController", ["$scope", "$http", "$rootScope", "$attrs", function ($scope, $http, $rootScope, $attrs) {
        if(!$rootScope[$attrs.name]){
            $rootScope[$attrs.name] = {
                columns: [],
                dateColumns: []
            };
        }
        $scope.resource = {
            name:$attrs.title || $attrs.name,
            endpointUrl:$attrs.endpoint,
            columns: $rootScope[$attrs.name].columns,
            dateColumns: $rootScope[$attrs.name].dateColumns,
            options: $rootScope[$attrs.name].options,
            items: $rootScope[$attrs.name].items
        }
        if(!$rootScope[$attrs.name].options){
            $http({method:"OPTIONS", url: $scope.resource.endpointUrl}).then(function(resp){
                $scope.resource.options = $rootScope[$attrs.name].options = resp.data;
                for(column in $scope.resource.options){
                    if($scope.resource.options[column].type == "date" || $scope.resource.options[column].type == "datetime"){
                        $rootScope[$attrs.name].dateColumns.push(column);
                    }
                    $rootScope[$attrs.name].columns.push(column);
                }
            })
        }
        if(!$rootScope[$attrs.name].items){
            $scope.items = $rootScope[$attrs.name].items = [];
            $http.get($scope.resource.endpointUrl).success(function(resp){
                angular.forEach(resp, function(o){
                    angular.forEach($rootScope[$attrs.name].dateColumns, function(c){
                        o[c] = new Date(o[c]);
                    })
                    $rootScope[$attrs.name].items.push(o);
                })
            });
        }

        $scope.showForm = false;
        $scope.editForm = false;
        $scope.showPrompt = false;

        $scope.view = function(item){
            $scope.item = item;
            $scope.showForm = true;
        }
        $scope.edit = function(item){
            $scope.item = item;
            $scope.editForm = true;
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
            controller: "ResourceController"
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