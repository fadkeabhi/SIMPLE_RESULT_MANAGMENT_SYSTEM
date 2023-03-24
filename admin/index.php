<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $user = $_SESSION["username"];
}
else{
    header("location: login.php");
}

?>


LOGGED IN

<a href="logout.php">LOGOUT</a>
<a href="upload.php">UPLOAD NEW EXAM DATA</a>