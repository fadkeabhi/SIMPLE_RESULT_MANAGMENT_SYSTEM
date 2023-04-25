<?php

session_start();

include 'db.php';

$exit = 0;

if (!isset($_POST['seat']))
{
    echo 'direct access not allowed';
    exit();
}
if ($_POST['mothername'] == '' && $_POST['seat'] == '')
{
    $msg = "Please enter the SEAT NO. AND MOTHER's NAME.";
    $exit = 1;
}
elseif ($_POST['mothername'] == '')
{
    $msg = "Please enter the MOTHER's NAME.";
    $exit = 1;
}
elseif ($_POST['seat'] == '')
{
    $msg = "Please enter the SEAT NO.";
    $exit = 1;
}
if($exit == 1)
{
    echo $msg;
    exit();
}

$seat_no = strtolower($_POST["seat"]);
$mother_name = strtolower($_POST["mothername"]);
$seat_no = $cleanStr = preg_replace('/[^A-Za-z0-9 ]/', '', $seat_no);
$mother_name = $cleanStr = preg_replace('/[^A-Za-z0-9 ]/', '', $mother_name);

$sql = "SELECT * FROM marks WHERE seat_no = '$seat_no' AND mother_name = '$mother_name' ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  //get subject info
  
  while($row = $result->fetch_assoc()) 
  {
	$temp = $row["exam_id"];
    $sql = "SELECT * FROM exam_details WHERE id = '$temp' ORDER BY id DESC LIMIT 1";
    $result1 = $conn->query($sql);
    if ($result->num_rows == 0)
    {
      die("ERROR, exam not found");
    }

    $_SESSION["seatno"] = $seat_no;
    $_SESSION["mothername"] = $mother_name;

    while($row1 = $result1->fetch_assoc())
    {

      ?>   
        <a href="./result.php?eid=<?php echo $temp?>"> <?php echo $row1["EXAM_NAME"] ?> </a>
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