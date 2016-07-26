app.controller('categoryController', ['$scope', 'categoryService', function($scope, categoryService) {
	 
	$scope.getCategories = function() {
		categoryService.getCategories().success(function(data) {
			$scope.weaponCategories = data;
		});
	};
	
	$scope.getCategories();
}
]);