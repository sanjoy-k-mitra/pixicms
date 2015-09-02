/**
 * Created by sanjoy on 8/31/15.
 */
angular.module("pixi.admin")
    .controller("ItemController", ["$scope", function($scope) {
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
    }])
    .controller("OfferController", ["$scope", function($scope) {
        $scope.editColumns = [
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
    }])
    .controller("ShopController", ["$scope", function($scope) {
        $scope.editColumns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "address",
                displayName: "Address",
                type: "string"
            },
            {
                name: "lat",
                displayName: "Latitude",
                type: "float"
            },
            {
                name: "lon",
                displayName: "Longitude",
                type: "float"
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
    }])