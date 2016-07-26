<?php
	include('database.php');
	
	$_POST = json_decode(file_get_contents("php://input"), true);
	
	$query = "UPDATE weapon SET weaponname=:weaponName, weapondescription=:weaponDescription";
	
	if($_POST['weaponCategory'])
	{
		$query = $query . ", weaponcategory=:weaponCategory";
	}
	
	$query = $query . " WHERE weaponid=:weaponId";
	
	$result = $database->prepare($query);
	$result->bindValue(':weaponName', $_POST['weaponName']);
	$result->bindValue(':weaponDescription', $_POST['weaponDescription']);
	if($_POST['weaponCategory'])
	{
		$result->bindValue(':weaponCategory', $_POST['weaponCategory']);
	}
	$result->bindValue(':weaponId', $_POST['weaponId']);
	$result->execute();
?>