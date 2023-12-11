<?php

header('Location:books.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
	include_once("connection.php");
	array_map("htmlspecialchars", $_POST);
	
	$stmt = $conn->prepare("INSERT INTO TblBooks (BookID,BookName,AuthorSurname,AuthorForename,Genre,PublishedYear) VALUES (NULL,:book,:surname,:forename,:genre,:published)");

	$stmt->bindParam(':book', $_POST["book"]);
	$stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':genre', $_POST["genre"]);
    $stmt->bindParam(':published', $_POST["published"]);

	$stmt->execute();
}

catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
    
$conn=null;

?>
