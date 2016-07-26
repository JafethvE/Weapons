<?php
	include('database.php');
	
	$_POST = json_decode(file_get_contents("php://input"), true);
	
	$query = "INSERT INTO weapon (weaponname, weapondescription, weaponcategory) VALUES (:weaponName, :weaponDescription, :weaponCategory)";
	
	$result = $database->prepare($query);
	$result->bindValue(':weaponName', $_POST['weaponName']);
	$result->bindValue(':weaponDescription', $_POST['weaponDescription']);
	$result->bindValue(':weaponCategory', $_POST['weaponCategory']);
	$result->execute();
?>