/**
 * Created by sanjoy on 8/31/15.
 */

angular.module("pixi.resource", ["ui.bootstrap", "ngResource"])
    .controller("ResourceController", ResourceController)
    .directive("resourceList", function(){
        return {
            restrict: "E",
            scope: {
                title:"@",
                endpoint:"@",
                columns:"="
            },
            templateUrl:"templates/resource/list.html"
        }
    })
    .directive("resourceViewer", function(){
        return {
            restrict: "E",
            templateUrl: "templates/resource/view.html"
        }
    })
    .directive("resourceEditor", function () {
        return {
            restrict: "E",
            templateUrl: "templates/resource/edit.html"
        }
    })


ResourceController.$inject = ["$scope", "$http", "$resource", "$modal"];

ResourceController.prototype.endpointUrl = "http://localhost:8000/api/resource/"
ResourceController.prototype.columns = [
    {
        name:"id",
        displayName:"ID",
        type: "integer"
    }
]

var baseUrl = window.location.protocol + "://" + window.location.host;

function ResourceController($scope, $http, $resource){
    $scope.columns.forEach(function(i){
        console.log(i);
    })


    //this.Model = $resource(this.endpointUrl + "/:id", {id: "@id"});
    //var object = this.Model.get({id: 2}, function(){
    //    object.name = "Sanjoy Kumar Mitra";
    //    object.$save();
    //})
}

