/**
 * Created by sanjoy on 8/31/15.
 */
angular.module("pixi.admin")
    .controller("ItemController", ItemController);

ItemController.$inject = ["$scope"]



function ItemController($scope) {
    $scope.editColumns = [
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
        }
    ];
    $scope.viewColumns = $scope.editColumns;
    $scope.columns = [
        {
            name: "id",
            displayName: "ID",
            type: "integer"
        }
    ].concat($scope.viewColumns)
}