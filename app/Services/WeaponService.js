app.service('weaponService', ['$http', function($http) {
	this.getWeapons = function(category) {
		return $http.post('api/weapons_overview.php', {category: category});
	}
	
	this.getWeapon = function(weapon) {
		return $http.post('api/weapon.php', {weapon: weapon});
	}
	
	this.updateWeapon = function(formData) {
		return $http.post('api/update_weapon.php', {weaponId: formData.weaponId, weaponName: formData.weaponName, weaponDescription: formData.weaponDescription, weaponCategory: formData.weaponCategory});
	}
	
	this.deleteWeapon = function(deleteWeapon) {
		return $http.post('api/delete_weapon.php', {deleteWeapon: deleteWeapon});
	}
	
	this.newWeapon = function(formData) {
		return $http.post('api/create_weapon.php', {weaponName: formData.weaponName, weaponDescription: formData.weaponDescription, weaponCategory: formData.weaponCategory});
	}
}]);