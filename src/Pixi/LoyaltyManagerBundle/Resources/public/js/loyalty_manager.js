/**
 * Created by sanjoy on 8/31/15.
 */
angular.module("pixi.admin")
    .controller("OfferController", OfferController);

OfferController.$inject = ["$scope", "$http", "$resource", "$modal"]



function OfferController($scope, $http, $resource, $modal) {
    $scope.columns = [
        {
            name: "id",
            displayName: "ID",
            type: "integer"
        },
        {
            name: "name",
            displayName: "Name",
            type: "string"
        },
        {
            name: "description",
            displayName: "Description",
            type: "text"
        },
        {
            name: "point",
            displayName: "Point",
            type: "integer"
        },

    ]
}