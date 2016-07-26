app.controller('weaponController', ['$scope', '$routeParams', 'weaponService', 'categoryService', function($scope, $routeParams, weaponService, categoryService) {
	
	$scope.formData = {};
	
	$scope.getWeapons = function() {
		weaponService.getWeapons($routeParams.category).success(function(data) {
			$scope.weapons = data;
		});
	};
	
	$scope.getWeapon = function() {
		weaponService.getWeapon($routeParams.weapon).success(function(data) {
			$scope.weapon = data;
		});
		categoryService.getCategories().success(function(data) {
			$scope.weaponCategories = data;
		});
	};
	
	$scope.updateWeapon = function() {
		weaponService.updateWeapon($scope.weapon);
	};
	
	$scope.newWeaponForm = function() {
		categoryService.getCategories().success(function(data) {
			$scope.weaponCategories = data;
		});
	};
	
	$scope.newWeapon = function() {
		weaponService.newWeapon($scope.weapon);
	}
	
	$scope.deleteWeapon = function() {
		weaponService.deleteWeapon($routeParams.deleteWeapon);
		categoryService.getCategories().success(function(data) {
			$scope.weaponCategories = data;
		});
	};
	
	if($routeParams.category)
	{
		$scope.getWeapons();
	}
	
	else if($routeParams.weapon) {
		$scope.getWeapon();
	}
	
	else if($routeParams.deleteWeapon) {
		$scope.deleteWeapon();
	}
	
	else {
		$scope.newWeaponForm();
	}
}
]);