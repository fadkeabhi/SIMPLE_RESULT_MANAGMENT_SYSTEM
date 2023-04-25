<?php

session_start();

include 'db.php';

$exit = 0;

if (!isset($_SESSION['seatno']) || !isset($_SESSION['mothername']) || !isset($_GET['eid']))
{
    echo 'direct access not allowed';
    exit();
}

$seat_no = strtolower($_SESSION['seatno']);
$mother_name = strtolower($_SESSION['mothername']);
$seat_no = $cleanStr = preg_replace('/[^A-Za-z0-9 ]/', '', $seat_no);
$mother_name = $cleanStr = preg_replace('/[^A-Za-z0-9 ]/', '', $mother_name);
$exam_id = $_GET['eid'];

unset($_SESSION["seatno"]);
unset($_SESSION["mothername"]);

$sql = "SELECT * FROM marks WHERE seat_no = '$seat_no' AND mother_name = '$mother_name' AND exam_id = '$exam_id' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  //get subject info
  
  while($row = $result->fetch_assoc()) 
  {
    $sql = "SELECT * FROM exam_details WHERE id = '$exam_id' ORDER BY id DESC LIMIT 1";
    $result1 = $conn->query($sql);
    if ($result->num_rows == 0)
    {
      die("ERROR, exam not found");
    }

    while($row1 = $result1->fetch_assoc())
    {

      ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Result</title>
    <link rel="stylesheet" href="./styles/resultshow.css?" />
  </head>
  <body>
    <div class="head">
      <div class="class-child"><h1><?php echo $row1["EXAM_NAME"] ?></h1></div>
      <div class="class-child"><h3>Student Name : <span> <?php echo strtoupper($row["stud_name"]) ?> </span></h3></div>
      <div class="class-child"><h3>Mothers Name : <span> <?php echo strtoupper($row["mother_name"]) ?> </span></h3></div>
      <div class="class-child"><h3>Seat Number : <span> <?php echo strtoupper($row["seat_no"]) ?> </span></h3></div>
    </div>
    <table class="content-table">
      <thead>
        <tr>
          <th>Subject</th>
          <th>Marks</th>
          <th>Out of</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $row1["S1"] ?></td>
          <td><?php echo $row["m1"] ?></td>
          <td><?php echo $row1["M1"] ?></td>
        </tr>
        <tr>
          <td><?php echo $row1["S2"] ?></td>
          <td><?php echo $row["m2"] ?></td>
          <td><?php echo $row1["M2"] ?></td>
        </tr>
        <tr>
          <td><?php echo $row1["S3"] ?></td>
          <td><?php echo $row["m3"] ?></td>
          <td><?php echo $row1["M3"] ?></td>
        </tr>
        <tr>
          <td><?php echo $row1["S4"] ?></td>
          <td><?php echo $row["m4"] ?></td>
          <td><?php echo $row1["M4"] ?></td>
        </tr>
        <tr>
          <td><?php echo $row1["S5"] ?></td>
          <td><?php echo $row["m5"] ?></td>
          <td><?php echo $row1["M5"] ?></td>
        </tr>
      </tbody>
    </table>

    <p align="center">

      <input type="button" onclick="print('form')" value="Print Result">
    </p>
    <script>
      function Print(form) {
        var printdata = document.getElementById(form);
        newwin = window.open("");
        newwin.document.write(printdata.outerHTML);
        newwin.print();
        newwin.close();
      }
    </script>

<!--     
    <div class="head">
    <input TYPE="button" onClick="window.print()" class="print-but" value="Print Result">
  </div> -->
  </body>
</html>

 
<?php
}
}
} else 
{
$_SESSION["error"] = "Invalid Information";
$_SESSION["seatno"] = $seat_no;
$_SESSION["mothername"] = $mother_name;
header("location: index.php");
}
?>