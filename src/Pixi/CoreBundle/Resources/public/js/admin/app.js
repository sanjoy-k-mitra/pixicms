/**
 * Created by sanjoy on 6/26/15.
 */
(function(){
    var app = angular.module('PixiAdminApp', ['oc.lazyLoad', 'ui.router', 'ui.bootstrap', 'angular-loading-bar'])
        .config(['$stateProvider', '$urlRouterProvider', '$ocLazyLoadProvider', function($stateProvider, $urlRouterProvider, $ocLazyLoadProvider){
            $ocLazyLoadProvider.config({
                debug: true,
                events: true
            })

            $urlRouterProvider.otherwise('/dashboard')

            $stateProvider
                .state('dashboard', {
                    url:'/dashboard',
                    templateUrl:'/template/PixiCoreBundle:Admin:dashboard.html',
                    resolve: {
                        loadMyDirectives: function(){

                        }
                    }
                })
        }])
        .controller('ApplicationController', ['$scope', function($scope){
            $scope.applicationTitle = "Admin Panel | PixiAdminApp";

        }])
})();