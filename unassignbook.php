<?php

header('Location:borrow.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
    #print_r($POST);
	include_once("connection.php");
	array_map("htmlspecialchars", $_POST);

	$stmt = $conn->prepare("INSERT INTO TblBorrow (UserID,BookID) VALUES (:UserID,:BookID)");

	$stmt->bindParam(':UserID', $_POST["student"]);
	$stmt->bindParam(':BookID', $_POST["book"]);
	$stmt->execute();

    $stmt = $conn->prepare("INSERT INTO TblBooks (InLibrary) VALUES ('0')");
}

catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}

$conn=null;

?>