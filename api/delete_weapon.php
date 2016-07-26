<?php
	include('database.php');
	
	$_POST = json_decode(file_get_contents("php://input"), true);
	
	$query = "DELETE FROM weapon WHERE weaponid=:weaponId";
	
	$result = $database->prepare($query);
	$result->bindValue(':weaponId', $_POST['deleteWeapon']);
	$result->execute();
?>