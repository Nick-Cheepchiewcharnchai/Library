<?php

header('Location: users.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
	include_once("connection.php");
	array_map("htmlspecialchars", $_POST);

	switch($_POST["role"]){
		case "Pupil":
			$role=0;
			break;
		case "Teacher":
			$role=1;
			break;
		case "Admin":
			$role=2;
			break;
	}

	$stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Gender,Surname,Forename,Password,House,Year ,Role)VALUES (null,:gender,:surname,:forename,:password,:house,:year,:role)");

	$hashed_password = password_hash($_POST["Pword"], PASSWORD_DEFAULT);

	$stmt->bindParam(':forename', $_POST["forename"]);
	$stmt->bindParam(':surname', $_POST["surname"]);
	$stmt->bindParam(':house', $_POST["house"]);
	$stmt->bindParam(':year', $_POST["year"]);
	$stmt->bindParam(':password', $hashed_password);
	$stmt->bindParam(':gender', $_POST["gender"]);
	$stmt->bindParam(':role', $role);
	$stmt->execute();
}

catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}

$conn=null;

?>