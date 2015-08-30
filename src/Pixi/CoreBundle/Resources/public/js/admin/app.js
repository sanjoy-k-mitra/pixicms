/**
 * Created by sanjoy on 6/26/15.
 */
(function () {
    var app = angular.module('pixiAdminApp', ['ui.router','ngResource', 'pixi.core'])
        .config(['$stateProvider', '$urlRouterProvider', '$ocLazyLoadProvider', function ($stateProvider, $urlRouterProvider, $ocLazyLoadProvider) {

            $urlRouterProvider.otherwise('/dashboard/home')

            $stateProvider
                .state('dashboard', {
                    url: '/dashboard',
                    templateUrl: '/bundles/pixicore/template/admin/dashboard/main.html',
                })
                .state('dashboard.home',{
                    url:'/home',
                    templateUrl:'/bundles/pixicore/template/admin/dashboard/home.html',
                })
                .state('dashboard.permission', {
                    template:"<resource-list name='Permission' title='Permissions' endpoint='/api/permission/'/>",
                    url:'/permissions'
                })
                .state('dashboard.role', {
                    template:"<resource-list name='Role' title='Roles' endpoint='/api/userRole/'/>",
                    url:'/userRoles'
                })
                .state('dashboard.user', {
                    template:"<resource-list name='User' title='Users' endpoint='/api/user/'/>",
                    url:'/users'
                })
        }])
})();