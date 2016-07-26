<?php

//Includes the Weapon class.
Require_once('Classes/weapon.class.php');

//Connects to the database.
include('database.php');

//Initialises the array that is to be sent back.
$weapons = array();

//Integer used to put the weapons in the array, so that they are properly sent back as JSon array.
$i = 0;

//Sets a default image to prevent null errors
$defaultImage = "default.jpg";

$params = json_decode(file_get_contents('php://input'), true);

$category = $params['category'];

$query = "SELECT weapon.*, weaponcategory.weaponcategoryname FROM weapon LEFT JOIN weaponcategory ON weapon.weaponcategory = weaponcategory.weaponcategoryid WHERE weaponcategory = '" . $category . "'";

//Runs the query to get all weapons and, with the data from that, fills the weapons array.
foreach($database->query($query) as $row) {
    $weapon = new Weapon();
	$weapon->weaponId = $row['weaponid'];
	$weapon->weaponName = $row['weaponname'];
	$weapon->weaponDescription = $row['weapondescription'];
	$weapon->weaponCategory = $row['weaponcategoryname'];
	$weapon->weaponImage = $defaultImage;
	
	if($row['weaponimage'])
	{
		$weapon->weaponImage = $row['weaponimage'];
	}
	
	$weapons[$i] = $weapon;
	$i++;
}

//Encodes the weapons array to JSon.
echo json_encode($weapons);
?>