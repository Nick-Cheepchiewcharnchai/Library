<?php
    include_once('connection.php')
    $stmt = $conn->prepare('SECLECT * FROM tbl books');
    $stmt->execute();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo($row["BookName"].' '.$row["BookID"]."<br>");
        }
?>