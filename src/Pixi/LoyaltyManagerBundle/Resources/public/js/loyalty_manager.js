/**
 * Created by sanjoy on 8/31/15.
 */
angular.module("pixi.admin")
    .controller("ItemController", ItemController);

ItemController.$inject = ["$scope", "$http"]



function ItemController($scope, $http) {
    $scope.columns = [
        {
            name: "id",
            displayName: "ID",
            type: "integer"
        },
        {
            name: "code",
            displayName: "Code",
            type: "text"
        },
        {
            name: "name",
            displayName: "Name",
            type: "string"
        },
        {
            name: "point",
            displayName: "Point",
            type: "integer"
        },

    ]
}