<?php

//Includes the Weapon class.
Require_once('Classes/weaponCategory.class.php');

//Connects to the database.
include('database.php');

//Initialises the array that is to be sent back.
$weaponCategories = array();

//Integer used to put the weapons in the array, so that they are properly sent back as JSon array.
$i = 0;

//Sets a default image to prevent null errors
$defaultImage = "default.jpg";

//Runs the query to get all weapons and, with the data from that, fills the weapons array.
foreach($database->query('SELECT weaponcategory.*, COUNT(weaponid) AS weaponamount FROM weaponcategory LEFT JOIN weapon ON weapon.weaponcategory = weaponcategory.weaponcategoryid GROUP BY weaponcategoryname') as $row) {
    $weaponCategory = new WeaponCategory();
	$weaponCategory->weaponCategoryId = $row['weaponcategoryid'];
	$weaponCategory->weaponCategoryName = $row['weaponcategoryname'];
	$weaponCategory->weaponCategoryDescription = $row['weaponcategorydescription'];
	$weaponCategory->weaponCategoryImage = $defaultImage;
	$weaponCategory->weaponCategoryWeaponAmount = $row['weaponamount'];
	
	$result = $database->prepare('SELECT weaponimage FROM weapon WHERE weaponcategory =:weaponCategory AND weaponimage IS NOT NULL');
	$result->bindValue(':weaponCategory', $weaponCategory->weaponCategoryId, PDO::PARAM_INT);
	$result->execute();
	$images = $result->fetchAll(PDO::FETCH_COLUMN, 0);
	
	$image = $images[array_rand($images)];
	
	if($image)
	{
		$weaponCategory->weaponCategoryImage = $image;
	}
	
	$weaponCategories[$i] = $weaponCategory;
	$i++;
}

//Encodes the weapons array to JSon.
echo json_encode($weaponCategories);
?>