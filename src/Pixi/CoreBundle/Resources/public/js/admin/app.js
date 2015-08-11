/**
 * Created by sanjoy on 6/26/15.
 */
(function () {
    var app = angular.module('pixiAdminApp', ['ui.router', 'oc.lazyLoad', 'ui.bootstrap', 'sbAdminApp', 'toggle-switch', 'ngAnimate', 'ngCookies', 'ngResource', 'ngTouch', 'ngSanitize', 'chart.js'])
        .config(['$stateProvider', '$urlRouterProvider', '$ocLazyLoadProvider', function ($stateProvider, $urlRouterProvider, $ocLazyLoadProvider) {
            $ocLazyLoadProvider.config({
                debug: true,
                events: true
            })

            $urlRouterProvider.otherwise('/dashboard/home')

            $stateProvider
                .state('dashboard', {
                    url: '/dashboard',
                    templateUrl: '/bundles/pixicore/template/admin/dashboard/main.html',
                })
                .state('dashboard.home',{
                    url:'/home',
                    controller: 'MainCtrl',
                    templateUrl:'/bundles/pixicore/template/admin/dashboard/home.html',
                })
                .state('dashboard.permission', {
                    template:"<resource-list name='permission' title='Permissions' endpoint='/api/permission/'/>",
                    url:'/permissions'
                })
                .state('dashboard.role', {
                    template:"<resource-list name='role' title='Roles' endpoint='/api/userRole/'/>",
                    url:'/userRoles'
                })
                .state('dashboard.user', {
                    template:"<resource-list name='user' title='Users' endpoint='/api/user/'/>",
                    url:'/users'
                })
                .state('dashboard.form',{
                    templateUrl:'/bundles/pixicore/template/admin/form.html',
                    url:'/form'
                })
                .state('dashboard.blank',{
                    templateUrl:'/bundles/pixicore/template/admin/pages/blank.html',
                    url:'/blank'
                })
                .state('login',{
                    templateUrl:'/bundles/pixicore/template/admin/pages/login.html',
                    url:'/login'
                })
                .state('dashboard.chart',{
                    templateUrl:'/bundles/pixicore/template/admin/chart.html',
                    url:'/chart',
                    controller:'ChartCtrl',
                })
                .state('dashboard.table',{
                    templateUrl:'/bundles/pixicore/template/admin/table.html',
                    url:'/table'
                })
                .state('dashboard.panels-wells',{
                    templateUrl:'/bundles/pixicore/template/admin/ui-elements/panels-wells.html',
                    url:'/panels-wells'
                })
                .state('dashboard.buttons',{
                    templateUrl:'/bundles/pixicore/template/admin/ui-elements/buttons.html',
                    url:'/buttons'
                })
                .state('dashboard.notifications',{
                    templateUrl:'/bundles/pixicore/template/admin/ui-elements/notifications.html',
                    url:'/notifications'
                })
                .state('dashboard.typography',{
                    templateUrl:'/bundles/pixicore/template/admin/ui-elements/typography.html',
                    url:'/typography'
                })
                .state('dashboard.icons',{
                    templateUrl:'/bundles/pixicore/template/admin/ui-elements/icons.html',
                    url:'/icons'
                })
                .state('dashboard.grid',{
                    templateUrl:'/bundles/pixicore/template/admin/ui-elements/grid.html',
                    url:'/grid'
                })
        }])
        .controller('ApplicationController', ['$scope', function ($scope) {
            $scope.applicationTitle = "Admin Panel | PixiAdminApp";

        }])
})();