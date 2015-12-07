/**
 * Created by sanjoy on 8/31/15.
 */

angular.module("pixi.resource", ["ui.bootstrap", "ngResource"])
    .controller("ResourceController", ResourceController)
    .directive("pixiResource", function () {
        return {
            restrict: "E",
            scope: {
                title: "@",
                listTitle: "@",
                endpoint: "@",
                columns: "=",
                viewColumns: "=",
                editColumns: "=",
                actions: "="
            },
            controller: "ResourceController",
            templateUrl: "templates/resource/list.html"
        }
    })


ResourceController.$inject = ["$scope", "$http", "$resource", "$uibModal", "$filter"];

function ResourceController($scope, $http, $resource, $modal, $filter) {
    if(!$scope.actions){
        $scope.actions = {
            view: null,
            create: null,
            edit: null,
            delete: null,
        }
    }
    $scope.isActionRestricted = function(actionName){
        return typeof $scope.actions[actionName] === "undefined";
    }
    $http({
        url: $scope.endpoint,
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

        var ca = [$scope.columns, $scope.editColumns, $scope.viewColumns]
        for (var i = 0; i < ca.length; i++) {
            populateOptions(ca[i]);
        }
    });
    function initViewAndEditColumns() {
        if (!$scope.viewColumns) {
            $scope.viewColumns = $scope.columns
        }
        if (!$scope.editColumns) {
            $scope.editColumns = $scope.columns
        }
    }

    initViewAndEditColumns();
    $scope.pagination = {
        offset: 0,
        limit: 10
    },
        $scope.load = function () {
            $http.get($scope.endpoint, {params: $scope.pagination}).success(function (items) {
                $scope.items = items;
            })
        }
    $scope.reload = $scope.load;
    var model = $resource($scope.endpoint + "/:itemId", {itemId: "@id"});

    $scope.createItem = function () {
        $scope.item = {};
        $modal.open({
            scope: $scope,
            templateUrl: $scope.actions.create || "templates/resource/edit.html"
        }).result.then(function (item) {
                model.save({}, item).$promise.then($scope.reload);
            })
    }
    $scope.viewItem = function (itemId) {
        model.get({itemId: itemId}, function (item, headers) {
            $scope.item = item;
            $modal.open({
                scope: $scope,
                templateUrl: $scope.actions.view || "templates/resource/view.html",
            })
        })
    }
    $scope.editItem = function (itemId) {
        model.get({itemId: itemId}, function (item, headers) {
            $scope.item = item;
            $modal.open({
                scope: $scope,
                templateUrl: $scope.actions.edit || "templates/resource/edit.html",
            }).result.then(function (item) {
                    model.save({itemId: item.id}, item).$promise.then($scope.reload)
                })
        })
    }
    $scope.deleteItem = function (itemId) {
        model.get({itemId: itemId}, function (item, headers) {
            $scope.item = item;
            $modal.open({
                scope: $scope,
                templateUrl: $scope.actions.delete || "templates/resource/delete.html",

            }).result.then(function (item) {
                    model.delete({itemId: item.id}).$promise.then($scope.reload)
                })
        })
    }
    $scope.editDate = function(column){
        column.isEditing = true
    }

    $scope.load();
}

