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
                name: "updated",
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
                name: "updated",
                displayName: "Modified",
                type:"datetime"
            }
        ]
        $scope.actions = {
            view: null,
            create: null,
            edit: null
        };
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
                type:"Object"
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
                name: "updated",
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
                type:"Object"
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
                type:"Object"
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
                name: "updated",
                displayName: "Modified",
                type:"datetime"
            }
        ]
        $scope.actions = {
            view: null,
            create: null,
            edit: null
        };
    }])
    .controller('TransfersController', ['$scope', '$http', function($scope, $http){
        $scope.editColumns = [
            {
                name: "from",
                displayName: "From",
                targetEntity:"Account",
                type:"Object"
            },
            {
                name: "to",
                displayName: "To",
                targetEntity:"Account",
                type:"Object"
            },
            {
                name: "amount",
                displayName: "Amount",
                type:"float"
            },
            {
                name: "note",
                displayName: "Note",
                type:"string"
            }
        ];
        $scope.columns = $scope.viewColumns = [
            {
                name: "from",
                displayName: "From",
                targetEntity:"Account",
                type:"Object"
            },
            {
                name: "to",
                displayName: "To",
                targetEntity:"Account",
                type:"Object"
            },
            {
                name: "amount",
                displayName: "Amount",
                type:"float"
            },
            {
                name: "note",
                displayName: "Note",
                type:"string"
            },
            {
                name: "created",
                displayName: "Created",
                type:"datetime"
            },
            {
                name: "updated",
                displayName: "Modified",
                type:"datetime"
            }
        ]
        $scope.actions = {
            view: null,
            create: null
        };
    }])
    .controller('PaymentsController', ['$scope', '$http', '$filter', function($scope, $http, $filter){
        $scope.fees = []
        $http.get("/api/fee").success(function(fees){
            $scope.fees = $filter('filter')(fees, {isActive: true}, true);
        });
        $scope.editColumns = [

        ];
        $scope.columns = $scope.viewColumns = [
            {
                name: "registrationNo",
                displayName: "Registration NO",
                type: "string"
            },
            {
                name: "comment",
                displayName: "Comment",
                type: "string"
            }
        ];
        $scope.actions = {
            view: null,
            create: null
        }
    }])