<?php

header('Location: borrow.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
	include_once("connection.php");
	array_map("htmlspecialchars", $_POST);

	$stmt = $conn->prepare("INSERT INTO TblBorrow (UserID,BookID) VALUES (UserID,BookID)");

	$stmt->bindParam(':UserID', $_POST["UserID"]);
	$stmt->bindParam(':BookID', $_POST["BookID"]);
	$stmt->execute();
}

catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}

$conn=null;

?>