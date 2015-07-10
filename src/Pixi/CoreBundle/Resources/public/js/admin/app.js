/**
 * Created by sanjoy on 6/26/15.
 */
(function () {
    var app = angular.module('PixiAdminApp', ['sbAdminApp'])
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
                                        '/bundles/pixicore/scripts/directives/sidebar/sidebar.js',
                                        '/bundles/pixicore/scripts/directives/sidebar/sidebar-search/sidebar-search.js'
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
        }])
        .controller('ApplicationController', ['$scope', function ($scope) {
            $scope.applicationTitle = "Admin Panel | PixiAdminApp";

        }])
})();