/**
 * Created by sanjoy on 8/31/15.
 */

angular.module("pixi.resource", ["ui.bootstrap", "ngResource"])
    .controller("ResourceController", ResourceController)
    .directive("pixiResource", function(){
        return {
            restrict: "E",
            scope: {
                title:"@",
                listTitle:"@",
                endpoint:"@",
                columns:"=",
                viewColumns:"=",
                editColumns:"="
            },
            controller: "ResourceController",
            templateUrl:"templates/resource/list.html"
        }
    })


ResourceController.$inject = ["$scope", "$http", "$resource", "$modal"];

function ResourceController($scope, $http, $resource, $modal){
    if(!$scope.viewColumns){
        $scope.viewColumns = $scope.columns
    }
    if(!$scope.editColumns){
        $scope.editColumns = $scope.columns
    }
    $http.get($scope.endpoint).success(function(items){
        $scope.items = items;
    })
    var model = $resource($scope.endpoint + "/:itemId", {itemId:"@id"});

    $scope.viewItem = function(itemId){
        model.get({itemId:itemId}, function(item,headers){
            $scope.item = item;
            $modal.open({
                scope:$scope,
                templateUrl:"templates/resource/view.html",
            })
        })
    }
    $scope.editItem = function(itemId){
        model.get({itemId:itemId}, function(item,headers){
            $scope.item = item;
            $modal.open({
                scope:$scope,
                templateUrl:"templates/resource/edit.html",
            })
        })
    }
    $scope.deleteItem = function(itemId){
        model.get({itemId:itemId}, function(item,headers){
            $scope.item = item;
            $modal.open({
                scope:$scope,
                templateUrl:"templates/resource/edit.html",
            })
        })
    }
}

