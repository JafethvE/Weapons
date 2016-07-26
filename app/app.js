var app = angular.module('weapons', ['ngRoute']);

app.config(function ($routeProvider) {
	$routeProvider.
	
	when('/', {
		templateUrl : 'app/views/categories.html',
		controller : 'categoryController'
	}).
	when('/Weapons/View/:weapon', {
		templateUrl : 'app/views/weapon.html',
		controller : 'weaponController'
	}).
	when('/Weapons/Category/:category', {
		templateUrl : 'app/views/weapons.html',
		controller : 'weaponController'
	}).
	when('/Weapons/Delete/:deleteWeapon', {
		templateUrl : 'app/views/categories.html',
		controller : 'weaponController'
	}).
	when('/Weapons/Create/', {
		templateUrl : 'app/views/create_weapon.html',
		controller : 'weaponController'
	});
});