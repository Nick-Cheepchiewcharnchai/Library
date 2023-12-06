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
        $attempt= $_POST['Password'];
        
        if(password_verify($attempt,$hashed)){
            $_SESSION['name']=$row["Forename"];
            if (!isset($_SESSION['backURL'])){
                $backURL= "/"; //Sets a default destination if no BackURL set (parent dir)
            }else{
                $backURL=$_SESSION['backURL'];
            }
            unset($_SESSION['backURL']);
            echo "yes";
            #header('Location: ' . $backURL);
        }else{
            echo "no";
            #header('Location: login.php');
        }
    }

    $conn=null;

?>