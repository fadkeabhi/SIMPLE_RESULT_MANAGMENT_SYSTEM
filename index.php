<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Result Display System</title>
    <link rel="stylesheet" href="./styles/loginform.css?" />
  </head>
  <body>
    <div class="container1">
      <img src="./I²IT-Logo-New.png" alt="#" class="container" />
    </div>
    <div class="exam">
      <p>Exam Results</p>
    </div>

    <?php
    session_start();
  
    if(isset($_SESSION["error"]))
    {
      ?>
    <div class="error">
    <?php echo $_SESSION["error"]; ?>
    </div>
    <?php
    unset($_SESSION["error"]);
    }
    ?>


    <form action="middle.php" method="post">
      <div class="inputBox">
        <input type="text" required="required" name="seat" />
        <span>Seat Number</span>
      </div>
      <div class="inputBox">
        <input type="text" required="required" name="mothername" />
        <span>Mother's Name</span>
      </div>
      <div>
        <input type="submit" value="Submit" class="submission" />
        <input type="reset" value="Re-enter" class="submission" />
      </div>
    </form>
    <div class="note">

      <?php
      include 'db.php';
      $sql = "SELECT note FROM notes ORDER BY id DESC LIMIT 1";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) 
      {
        while($row = $result->fetch_assoc()) 
        {
          echo html_entity_decode($row["note"]);
        }
      }

    ?>

    </div>
  </body>
</html>

