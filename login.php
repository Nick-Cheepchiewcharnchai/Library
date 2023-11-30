<!DOCTYPE html>
<html>
<head>
  
    <title>Login</title>
  
</head>
<body>

    <?php
        session_start(); 
        $_SESSION['backURL'] = $_SERVER['REQUEST_URI']

        
        if (!isset($_SESSION['name']))
        {   
            header("Location:login.php");
        }
    ?>

    <form action="loginprocess.php" method= "POST">
        User name:<input type="text" name="Username"><br>
        Password:<input type="password" name="Pword"><br>
        <input type="submit" value="Login">
    </form>

</body>
</html>