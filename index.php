<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>I2IT RESULT</title>
  <link rel="stylesheet" href="./styles/loginform.css">
  <style>
    h1 {
      background-color: rgb(108, 127, 74);
      font-size: 50px;
    }
  </style>
</head>

<body>
  <form action="result.php" method="post">
    <div class="imgcontainer">
      <img src="I2IT.png" alt="Avatar" class="avatar">
    </div>
    <div class="container">
      <h2>****Check Result****</h2>
<?php
  session_start();

  if(isset($_SESSION["error"]))
  {
    ?>
    <center><div class="error">
    <?php echo $_SESSION["error"]; ?>
  </div></center>
  <?php
  unset($_SESSION["error"]);
  }

?>

      <label for="seatno"><b>Seat number:</b></label>
      <input type="text" placeholder="Enter Seat number" name="seat" value="<?php if(isset($_SESSION["seatno"])){echo $_SESSION["seatno"];} ?>" required>
      <label for="psw"><b>Mother Name:</b></label>
      <input type="text" placeholder="Enter Mother Name " name="mothername" value="<?php if(isset($_SESSION["mothername"])){echo $_SESSION["mothername"];}  unset($_SESSION["seatno"]); unset($_SESSION["mothername"]); ?>" required>
      <button type="submit">Show</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="reset" class="cancelbtn">Reset</button>
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>
  </form>
  </div>

</body>

</html>