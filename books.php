<!DOCTYPE html>
<html>
<head>

    <title>Books</title>
    
</head>
<body>

    <?php
        #session_start(); 
        #$_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
        #if (!isset($_SESSION['name']))
        #{   
        #    header("Location:login.php");
        #}
    ?>

    <form action="addbooks.php" method="post">
        Book name:<input type="text" name="book"><br>
        Author forename:<input type="text" name="forename"><br>
        Author surname:<input type="text" name="surname"><br>
        Genre:<select name="genre">
                <option value="Tragedy">Tragedy</option>
                <option value="Comedy">Comedy</option>
                <option value="Romance">Romance</option>
                <option value="Fantasy">Fantasy</option>
                <option value="SciFi">Sci-Fi</option>
                <option value="Mystery">Mystery</option>
                <option value="NonFiction">Non-Fiction</option>
                <option value="Horror">Horror</option>
            </select>
        <br>
        Published year:<input type="text" name="published"><br>
        <input type="radio" name="Availability" value="Available" checked> Available<br>
        <input type="radio" name="Availability" value="NotAvailable"> Not available<br>
        
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
