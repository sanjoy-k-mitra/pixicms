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
    .controller("ProductController", ["$scope", function($scope){

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

    }])
