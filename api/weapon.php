<?php

//Includes the Weapon class.
Require_once('Classes/weapon.class.php');

//Connects to the database.
include('database.php');

//Sets a default image to prevent null errors
$defaultImage = "default.jpg";

$params = json_decode(file_get_contents('php://input'), true);

$weapon = $params['weapon'];

$query = "SELECT weapon.*, weaponcategory.weaponcategoryname, weaponcategory.weaponcategoryid FROM weapon LEFT JOIN weaponcategory ON weapon.weaponcategory = weaponcategory.weaponcategoryid WHERE weaponid = '" . $weapon . "'";

//Runs the query to get all weapons and, with the data from that, fills the weapons array.
foreach($database->query($query) as $row) {
    $weapon = new Weapon();
	$weapon->weaponId = $row['weaponid'];
	$weapon->weaponName = $row['weaponname'];
	$weapon->weaponDescription = $row['weapondescription'];
	$weapon->weaponCategoryId = $row['weaponcategoryid'];
	$weapon->weaponCategoryName = $row['weaponcategoryname'];
	$weapon->weaponImage = $defaultImage;
	
	if($row['weaponimage'])
	{
		$weapon->weaponImage = $row['weaponimage'];
	}
}

//Encodes the weapons array to JSon.
echo json_encode($weapon);
?>