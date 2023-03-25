<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $user = $_SESSION["username"];
}
else{
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UPLOAD RESULT</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Upload a File:
        <input type="file" name="the_file" id="fileToUpload">
        <input type="submit" name="submit" value="Start Upload">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = []; // Store errors here

    //hide notice
    error_reporting(E_ALL ^ E_NOTICE);  


    $fileExtensionsAllowed = ['xlsx']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . time() . "_" . basename($fileName); 



      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }
}

else
{
    exit();
}

include './file_to_db.php';
?>