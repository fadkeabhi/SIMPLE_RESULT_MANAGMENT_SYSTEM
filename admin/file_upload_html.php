<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PHP File Upload</title>
    <link rel="stylesheet" href="styles/file_upload.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Rich-Text-Editor/richtext.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="Rich-Text-Editor/jquery.richtext.js"></script>


</head>
<body>
    <a href="logout.php"><input type="button" value="LogOut" class="logout"/></a>
    <div class="container" style="border: 40px black;">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <h2>Upload a File:</h2> 
            <input type="file" name="the_file" id="fileToUpload">
            <input type="submit" name="submit" value=" Upload">
            <br>
            <a href="uploads/sample.xlsx">Download Sample</a>

        </form>
    </div>
    <br>
    <hr>
    <form action="save_note.php" method="post">
        <h3>Edit Note</h3>
        <center><div style="max-width:500px;text-align: center;">
        <textarea name="note" class="content" ><?php
      include '../db.php';
      $sql = "SELECT note FROM notes ORDER BY id DESC LIMIT 1";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) 
      {
        while($row = $result->fetch_assoc()) 
        {
          echo html_entity_decode($row["note"]);
        }
      }

    ?></textarea>
    </div></center>
        <br>
        <button type="submit">Save </button>
    </form>
    <script>
        $(document).ready(function() {
            $('.content').richText({height:"50px"});
        });
    </script>
</body>
</html>