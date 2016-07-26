app.service('categoryService', ['$http', function($http) {
	this.getCategories = function() {
		return $http.post('api/categories_overview.php');
	}
}]);