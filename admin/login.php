<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Include config file
require_once "../db.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $err = "Please enter your password.";
    } else{
        $password = md5(trim($_POST["password"]));
    }
    
    // Validate credentials
    if(empty($err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM admin WHERE username = '$username' && password = '$password' ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows == 0)
        {
            $err ="ERROR, Invalid credintials";
        }
        else
        {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username; 
            header("location: index.php");
        }


    }
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>

    <form method="POST">
        <?php     
            if(!empty($err)){  ?>
        <div class="error">
         <?php     echo $err;  ?>
        </div>
         <?php  }  ?>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="LOGIN">

    </form>
    
</body>
</html>