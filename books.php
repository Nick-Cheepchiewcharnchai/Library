<!DOCTYPE html>
<html>
<head>

    <title>Subjects</title>
    
</head>
<body>
    <form action="addbooks.php" method="post">
        Book name:<input type="text" name="book"><br>
        Author forename:<input type="text" name="forename"><br>
        Author surname:<input type="text" name="surname"><br>
        Genre:<input type="text" name="genre"><br>
        Published year:<input type="text" name="published"><br>
  
  <input type="submit" value="Add Book">
</form>
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblBooks");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["BookName"].' '.$row["AuthorForename"].' '.$row["AuthorSurname"].' '.$row["PublishedYear"]."<br>");
		}
?>   
</body>
</html>
