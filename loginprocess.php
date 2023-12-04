<?php

    session_start();

    include_once ("connection.php");

    array_map("htmlspecialchars", $_POST);

    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE forename =:username ;" );
    $stmt->bindParam(':username', $_POST['Username']);
    $attempt= $_POST['passwd'];
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    { 
        $hashed= $row['Pword'];
        
        if(password_verify($attempt,$hashed)){
            $_SESSION['name']=$row["Surname"];
            if (!isset($_SESSION['backURL'])){
                $backURL= "/"; //Sets a default destination if no BackURL set (parent dir)
            }else{
                $backURL=$_SESSION['backURL'];
            }
            unset($_SESSION['backURL']);
            header('Location: users.php');
        }else{

            header('Location: login.php');
        }
    }

    $conn=null;

?>