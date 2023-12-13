<!DOCTYPE html>
<html>
<head>
    
    <title>Borrow</title>
    
</head>
<body>

<form action="assignbook.php" method = "post">
	<select name = "student">

	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Role = 0 ORDER BY Surname ASC");
	$stmt->execute();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["UserID"].'>'.$row["Surname"].', '.$row["Forename"].'</option>');
	}
	?>

	</select>

	<select name = "book">

	<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM Tblbooks WHERE InLibrary = '0' ORDER BY Bookname ASC");
	$stmt->execute();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo('<option value='.$row["BookID"].'>'.$row["BookName"].', '.$row["AuthorSurname"].', '.$row["AuthorForename"].'</option>');
	}
	?>

	</select>

	<input type="submit" value="Borrow">

</form>

	<?php
        include_once('connection.php');

		$stmt = $conn->prepare("SELECT * FROM TblUsers");
		$stmt->execute();
		$stmt = $conn->prepare("SELECT * FROM TblBooks");
		$stmt->execute();
        $stmt = $conn->prepare("SELECT * FROM TblBorrow");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo($row["UserID"].' '.$row["BookID"]."<br>");
            }
    ?>   
	
</body>
</html>