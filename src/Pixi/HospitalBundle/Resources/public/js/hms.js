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
    }])
    .controller("PharmacyInvoiceController", ["$scope","$http","$resource","$modal","$filter", function($scope,$http, $resource, $modal, $filter){
        $scope.columns = [
            {
                name: "billedTo",
                displayName: "Billed To",
                type: "string"
            },
            {
                name: "patient",
                displayName: "Patient",
                targetEntity: "Patient",
                type: "Object"
            },
            {
                name: "doctor",
                displayName: "Doctor",
                targetEntity: "Doctor",
                type: "Object"
            },
            {
                name: "created",
                displayName: "Created",
                type: "datetime"
            },
            {
                name: "subTotal",
                displayName: "Sub Total",
                type:"double"
            },
            {
                name: "discount",
                displayName: "Discount",
                type: "float"
            },
            {
                name: "total",
                displayName: "Total",
                type:"double"
            }
        ];
        $scope.editColumns = [
            {
                name: "billedTo",
                displayName: "Billed To",
                type: "string"
            },
            {
                name: "patient",
                displayName: "Patient",
                targetEntity: "Patient",
                type: "Object"
            },
            {
                name: "doctor",
                displayName: "Doctor",
                targetEntity: "Doctor",
                type: "Object"
            },
            {
                name: "percentageDiscount",
                displayName: "Discount in Percentage",
                type: "boolean"
            },
            {
                name: "discount",
                displayName: "Discount",
                type: "float"
            },
        ]
        $http({
            url: "/api/pharmacyInvoice",
            method: "OPTIONS"
        }).success(function (options) {
            if (!$scope.columns) {
                $scope.columns = options;
                initViewAndEditColumns();
            }
            function populateOptions(columnArray) {
                for (var i = 0; i < columnArray.length; i++) {
                    var original = $filter("filter")(options, {name: columnArray[i].name}, true)[0];
                    if (original && columnArray[i].targetEntity && !columnArray[i].options) {
                        columnArray[i].options = original.options
                    }
                }
            }

            var ca = [$scope.columns, $scope.editColumns]
            for (var i = 0; i < ca.length; i++) {
                populateOptions(ca[i]);
            }
        });
        $http.get("/api/product").success(function(products){
            $scope.products = products;
        })
        $scope.load = function(){
            $http.get("/api/pharmacyInvoice").success(function(invoices){
                $scope.items = invoices;
            })
        }
        $scope.reload = function () {
            $scope.load();
        }
        $scope.createItem = function(){

        }
        $scope.editItem = function(){

        }
        $scope.load();

        var model = $resource("/api/pharmacyInvoice/:id", {id:"@id"})
        $scope.createItem = function () {
            $scope.item = {
                inventoryItems: [{product: null, quantity:0}]
            };
            $modal.open({
                scope: $scope,
                templateUrl: "/bundles/pixihospital/template/pharmacyInvoiceEdit.html"
            }).result.then(function (item) {
                    model.save({}, item).$promise.then($scope.reload);
                })
        }
        $scope.viewItem = function (itemId) {
            model.get({id: itemId}, function (item, headers) {
                $scope.item = item;
                $modal.open({
                    scope: $scope,
                    templateUrl: "/bundles/pixihospital/template/pharmacyInvoiceView.html",
                    size:"lg"
                })
            })
        }
        $scope.editItem = function (itemId) {
            model.get({id: itemId}, function (item, headers) {
                $scope.item = item;
                $modal.open({
                    scope: $scope,
                    templateUrl: "/bundles/pixihospital/template/pharmacyInvoiceEdit.html",
                }).result.then(function (item) {
                        model.save({itemId: item.id}, item).$promise.then($scope.reload)
                    })
            })
        }
        $scope.deleteItem = function (itemId) {
            model.get({id: itemId}, function (item, headers) {
                $scope.item = item;
                $modal.open({
                    scope: $scope,
                    templateUrl: "templates/resource/delete.html",

                }).result.then(function (item) {
                        model.delete({id: item.id}).$promise.then($scope.reload)
                    })
            })
        }
        $scope.editDate = function (column) {
            column.isEditing = true
        }


        $scope.addProduct = function(){
            if($scope.item){
                $scope.item.inventoryItems.push({product: null, quantity:1})
            }
        }


    }]);