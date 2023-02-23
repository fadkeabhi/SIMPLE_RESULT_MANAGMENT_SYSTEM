<?php

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

$sql = "SELECT * FROM marks WHERE seat_no = '$seat_no' AND mother_name = '$mother_name' ORDER BY id DESC LIMIT 1";
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

    while($row1 = $result1->fetch_assoc())
    {
		echo "STUDENT NAME : " . $row["stud_name"] . "<br>";
		echo "MOTHERS NAME : " . $row["mother_name"] . "<br>";
		echo "SEAT NO : " . $row["seat_no"] . "<br>";
		echo "EXAM : " . $row1["EXAM_NAME"] . "<br>";

		echo $row1["S1"] . " : ". $row["m1"] . "/" .  $row1["M1"] . "<br>";
		echo $row1["S2"] . " : ". $row["m2"] . "/" .  $row1["M2"] . "<br>";
		echo $row1["S3"] . " : ". $row["m3"] . "/" .  $row1["M3"] . "<br>";
		echo $row1["S4"] . " : ". $row["m4"] . "/" .  $row1["M4"] . "<br>";
		echo $row1["S5"] . " : ". $row["m5"] . "/" .  $row1["M5"] . "<br>";

    }



    
  }
} else 
{
  echo "INVALID INFORMATION";
}