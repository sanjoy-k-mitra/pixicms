/**
 * Created by sanjoy on 12/7/15.
 */
angular.module('pixi.admin')
    .controller('AccountsController', ['$scope', '$http', function ($scope, $http) {
        $scope.viewColumns = [
            {
                name: "name",
                displayName: "Name",
                type:"string"
            },
            {
                name: "isActive",
                displayName: "Active",
                type:"boolean"
            },
            {
                name: "description",
                displayName: "Description",
                type:"text"
            },
            {
                name: "created",
                displayName: "Created",
                type:"datetime"
            },
            {
                name: "modified",
                displayName: "Modified",
                type:"datetime"
            }
        ];
        $scope.editColumns = [
            {
                name: "name",
                displayName: "Name",
                type:"string"
            },
            {
                name: "isActive",
                displayName: "Active",
                type:"boolean"
            },
            {
                name: "description",
                displayName: "Description",
                type:"text"
            }
        ]
        $scope.columns = [
            {
                name: "id",
                displayName: "ID",
                type: "integer"
            },
            {
                name: "name",
                displayName: "Name",
                type:"string"
            },
            {
                name: "isActive",
                displayName: "Active",
                type:"boolean"
            },
            {
                name: "description",
                displayName: "Description",
                type:"text"
            },
            {
                name: "created",
                displayName: "Created",
                type:"datetime"
            },
            {
                name: "modified",
                displayName: "Modified",
                type:"datetime"
            }
        ]
    }])
    .controller('FeesController', ['$scope', '$http', function ($scope, $http) {
        $scope.viewColumns = [
            {
                name: "name",
                displayName: "Name",
                type:"string"
            },
            {
                name: "account",
                displayName: "Account",
                targetEntity:"Account",
                type:"object"
            },
            {
                name: "isApplicable",
                displayName: "Applicable",
                type:"boolean"
            },
            {
                name: "amount",
                displayName: "Amount",
                type:"float"
            },
            {
                name: "created",
                displayName: "Created",
                type:"datetime"
            },
            {
                name: "modified",
                displayName: "Modified",
                type:"datetime"
            }
        ];
        $scope.editColumns = [
            {
                name: "name",
                displayName: "Name",
                type:"string"
            },
            {
                name: "account",
                displayName: "Account",
                targetEntity:"Account",
                type:"object"
            },
            {
                name: "isApplicable",
                displayName: "Applicable",
                type:"boolean"
            },
            {
                name: "amount",
                displayName: "Amount",
                type:"float"
            }
        ]
        $scope.columns = [
            {
                name: "id",
                displayName: "ID",
                type: "integer"
            },
            {
                name: "name",
                displayName: "Name",
                type:"string"
            },
            {
                name: "account",
                displayName: "Account",
                targetEntity:"Account",
                type:"object"
            },
            {
                name: "isApplicable",
                displayName: "Applicable",
                type:"boolean"
            },
            {
                name: "amount",
                displayName: "Amount",
                type:"float"
            },
            {
                name: "created",
                displayName: "Created",
                type:"datetime"
            },
            {
                name: "modified",
                displayName: "Modified",
                type:"datetime"
            }
        ]
    }])