/**
 * Created by sanjoy on 8/31/15.
 */

angular.module("pixi.admin", ["ui.bootstrap", "ngResource"])
    .controller("ResourceController", ResourceController)

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

    this.Model = $resource(this.endpointUrl + "/:id", {id: "@id"});
    var object = this.Model.get({id: 1}, function(){
        object.name = "Sanjoy Kumar Mitra";
        object.$save();
    })
}

