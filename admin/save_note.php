<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $user = $_SESSION["username"];
}
else{
    header("location: login.php");
}

if(isset($_POST["note"]))
{
    require("../db.php");
    $temp = htmlentities($_POST["note"]);
    $sql="UPDATE notes SET note = '$temp' WHERE id = 1";
    $result = $conn->query($sql);
}


    header("location: index.php");


?>