// spec.js
describe('Weapons', function() {
  it('should display weaponcategories', function() {
    browser.get('localhost/Weapons/#/');
    var weaponCategories = element.all(by.repeater("weaponCategory in weaponCategories"));
	
	expect(weaponCategories.count()).toEqual(4);
  });
});