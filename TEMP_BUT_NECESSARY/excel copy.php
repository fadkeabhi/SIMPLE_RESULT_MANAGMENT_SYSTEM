<?php

require 'vendor/autoload.php';

$inputFileName = './Book1.xlsx';

/** Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

// $cellValue = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, 2)->getValue();

//print($cellValue);

$worksheet = $spreadsheet->getActiveSheet();


// Get the highest row and column numbers referenced in the worksheet
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
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