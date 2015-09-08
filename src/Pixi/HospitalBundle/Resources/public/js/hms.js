/**
 * Created by sanjoy on 9/8/15.
 */

angular.module("pixi.admin")
    .controller("PatientController", ["$scope", function($scope){
        $scope.columns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "age",
                displayName: "Age",
                type: "integer"
            },
            {
                name: "referral",
                displayName: "Referral",
                targetEntity: "Doctor",
                type: "Object"
            },

        ]

    }])
    .controller("ProductController", ["$scope", "$modal", "$resource", function($scope, $modal, $resource){
        var InventoryItem = $resource("/api/inventoryItem")
        $scope.editColumns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "genericName",
                displayName: "Generic Name",
                type: "string"
            },
            {
                name: "measurement",
                displayName: "Measurement",
                type: "string"
            },
            {
                name: "category",
                displayName: "Category",
                targetEntity: "Category",
                type: "Object"
            },
            {
                name: "manufacturer",
                displayName: "Manufacturer",
                targetEntity: "Manufacturer",
                type: "Object"
            },
            {
                name: "cost",
                displayName: "Buying Price",
                type: "float"
            },{
                name: "price",
                displayName: "Selling Price",
                type: "float"
            },

        ]
        $scope.columns = $scope.editColumns.concat([{
            name: "quantity",
            displayName: "Quantity",
            type: "integer"
        }])
        $scope.performCustomAction = function(action, item){
            $scope.item = item;
            $scope.inventoryItem = {
                product: item,
                quantity: 0
            }
            $modal.open({
                scope: $scope,
                templateUrl: '/bundles/pixihospital/template/addInventory.html'
            }).result.then(function(inventoryItem){
                    InventoryItem.save({}, inventoryItem).$promise.then(function(){
                        console.log("Success");
                    }, function(){
                        console.log("Error");
                    });
                });
        }
        $scope.actions = ["Load Inventory"];
    }])
    .controller("DoctorController", ["$scope", function($scope){
        $scope.columns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "department",
                displayName: "Department",
                type: "string"
            },
            {
                name: "apointmentFee",
                displayName: "Apointment Fee",
                type: "float"
            },

        ]
    }])
    .controller("BedController", ["$scope", function($scope){
        $scope.columns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            },
            {
                name: "ward",
                displayName: "ward",
                type: "string"
            },
            {
                name: "dailyCost",
                displayName: "Daily Rent",
                type: "float"
            },

        ]
    }])
    .controller("CategoryController", ["$scope", function($scope){
        $scope.columns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            }
        ]
    }])
    .controller("ManufacturerController", ["$scope", function($scope){
        $scope.columns = [
            {
                name: "name",
                displayName: "Name",
                type: "string"
            }
        ]
    }]);