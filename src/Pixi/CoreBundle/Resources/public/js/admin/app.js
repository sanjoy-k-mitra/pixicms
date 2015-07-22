/**
 * Created by sanjoy on 6/26/15.
 */
(function () {
    var app = angular.module('pixiAdminApp', ['sbAdminApp'])
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
                    resolve: {
                        loadMyDirectives: function ($ocLazyLoad) {
                            $ocLazyLoad.load(
                                {
                                    name: 'sbAdminApp',
                                    files: [
                                        '/bundles/pixicore/scripts/directives/header/header.js',
                                        '/bundles/pixicore/scripts/directives/header/header-notification/header-notification.js',
                                        '/bundles/pixicore/scripts/directives/sidebar/sidebar.js'
                                    ]
                                })
                            $ocLazyLoad.load(
                                {
                                    name: 'toggle-switch',
                                    files: ["/bundles/pixicore/lib/angular-toggle-switch/angular-toggle-switch.min.js",
                                        "/bundles/pixicore/lib/angular-toggle-switch/angular-toggle-switch.css"
                                    ]
                                })
                            $ocLazyLoad.load(
                                {
                                    name: 'ngAnimate',
                                    files: ['/bundles/pixicore/lib/angular-animate/angular-animate.js']
                                })
                            $ocLazyLoad.load(
                                {
                                    name: 'ngCookies',
                                    files: ['/bundles/pixicore/lib/angular-cookies/angular-cookies.js']
                                })
                            $ocLazyLoad.load(
                                {
                                    name: 'ngResource',
                                    files: ['/bundles/pixicore/lib/angular-resource/angular-resource.js']
                                })
                            $ocLazyLoad.load(
                                {
                                    name: 'ngSanitize',
                                    files: ['/bundles/pixicore/lib/angular-sanitize/angular-sanitize.js']
                                })
                            $ocLazyLoad.load(
                                {
                                    name: 'ngTouch',
                                    files: ['/bundles/pixicore/lib/angular-touch/angular-touch.js']
                                })
                        }
                    }
                })
                .state('dashboard.home',{
                    url:'/home',
                    controller: 'MainCtrl',
                    templateUrl:'/bundles/pixicore/template/admin/dashboard/home.html',
                    resolve: {
                        loadMyFiles:function($ocLazyLoad) {
                            return $ocLazyLoad.load({
                                name:'sbAdminApp',
                                files:[
                                    '/bundles/pixicore/scripts/controllers/main.js',
                                    '/bundles/pixicore/scripts/directives/timeline/timeline.js',
                                    '/bundles/pixicore/scripts/directives/notifications/notifications.js',
                                    '/bundles/pixicore/scripts/directives/chat/chat.js',
                                    '/bundles/pixicore/scripts/directives/dashboard/stats/stats.js'
                                ]
                            })
                        }
                    }
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
                    resolve: {
                        loadMyFile:function($ocLazyLoad) {
                            return $ocLazyLoad.load({
                                name:'chart.js',
                                files:[
                                    '/bundles/pixicore/lib/angular-chart.js/dist/angular-chart.min.js',
                                    '/bundles/pixicore/lib/angular-chart.js/dist/angular-chart.css'
                                ]
                            }),
                                $ocLazyLoad.load({
                                    name:'sbAdminApp',
                                    files:['/bundles/pixicore/scripts/controllers/chartContoller.js']
                                })
                        }
                    }
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