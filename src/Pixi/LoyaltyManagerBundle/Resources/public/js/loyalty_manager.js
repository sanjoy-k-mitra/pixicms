/**
 * Created by sanjoy on 8/31/15.
 */
angular.module("pixi.admin")
    .controller("OfferController", OfferController);

OfferController.$inject = ["$scope", "$http", "$resource", "$modal"]

$.extend(OfferController.prototype, {
    endpointUrl: "http://10.10.0.1:8000/api/offer",
    columns: [
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
});

function OfferController($scope, $http, $resource, $modal) {
    ResourceController.call(this, $scope, $http, $resource, $modal);
}