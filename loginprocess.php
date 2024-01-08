<?php

    session_start();

    include_once ("connection.php");

    array_map("htmlspecialchars", $_POST);

    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE Forename =:username ;" );
    $stmt->bindParam(':username', $_POST['Username']);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    { 
        $hashed= $row['Password'];
        
        if(password_verify($attempt,$hashed)){
            $_SESSION['name']=$row["Forename"];
            $_SESSION['loggedInID']=$row["UserID"];
            if (!isset($_SESSION['backURL'])){
                $backURL= "/";
            }else{
                $backURL=$_SESSION['backURL'];
            }
            unset($_SESSION['backURL']);
            header('Location: ' . $backURL);
        }else{
            header('Location: login.php');
        }
    }

    $conn=null;

?>