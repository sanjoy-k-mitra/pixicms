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
                columns:"="
            },
            controller: "ResourceController",
            templateUrl:"templates/resource/list.html"
        }
    })


ResourceController.$inject = ["$scope", "$http", "$resource", "$modal"];

function ResourceController($scope, $http, $resource, $modal){
    $http.get($scope.endpoint).success(function(items){
        $scope.items = items;
    })
    var model = $resource($scope.endpoint + "/:itemId", {itemId:"@id"});
    $scope.viewItem = function(itemId){
        model.get({itemId:itemId}, function(){
            $modal.open({
                templateUrl:"templates/resource/view.html"
            })
        })
    }
}

