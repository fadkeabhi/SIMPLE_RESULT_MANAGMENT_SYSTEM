<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    require("file_upload_html.php");
}
else{
    header("location: login.php");
}

?>

