<?php
/**
 * @var $conn mysqli
 */
require '../vendor/autoload.php';

include __DIR__ . '\..\db.php';

$class = "test class";
$sub = array();
$max_marks = array();


//EXCEL START
//$inputFileName = '../Book1.xlsx';
$inputFileName = $uploadPath;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();

$exam_name = $worksheet->getCellByColumnAndRow(2, 1)->getValue();

for($i = 3; $i<= 7; $i++)
{
    array_push($sub,$worksheet->getCellByColumnAndRow($i, 4)->getValue());
    array_push($max_marks,$worksheet->getCellByColumnAndRow($i, 3)->getValue());
    echo $sub[$i-3];
    echo $max_marks[$i-3];
}

$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5


echo '<table border>' . "\n";
for ($row = 4; $row <= $highestRow; ++$row) {
    echo '<tr>' . PHP_EOL;
    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
        $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
        echo '<td>' . $value . '</td>' . PHP_EOL;
    }
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;



//db upload task
$sql = "INSERT INTO exam_details (EXAM_NAME, S1, M1, S2, M2, S3, M3, S4, M4, S5, M5)
VALUES ('$exam_name', '$sub[0]', '$max_marks[0]', '$sub[1]', '$max_marks[1]', '$sub[2]', '$max_marks[2]', '$sub[3]', '$max_marks[3]', '$sub[4]', '$max_marks[4]')";

if ($conn->query($sql) === TRUE) {
    $exam_id = $conn->insert_id;
  echo "New record created successfully, id = " . $exam_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  exit();
}



$sql = "INSERT INTO marks (exam_id, stud_name, mother_name, m1, m2, m3, m4, m5)";

$data = array();

for($i = 1; $i<= 7; $i++)
{
    array_push($data,$worksheet->getCellByColumnAndRow($i, 5)->getValue());
}

$sql .= "SELECT '$exam_id','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]' ";



for ($row = 6; $row <= $highestRow; ++$row) {
    $data = array();
    for($i = 1; $i<= 7; $i++)
    {
        array_push($data,$worksheet->getCellByColumnAndRow($i, $row)->getValue());
    }
    $sql .= "  UNION ALL  ";
    $sql .= "SELECT '$exam_id','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]' ";
}

$sql .= ";";


if ($conn->query($sql) === TRUE) {
  echo "ALL MARKS UPLOADED SUCCESFULLY";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  exit();
}