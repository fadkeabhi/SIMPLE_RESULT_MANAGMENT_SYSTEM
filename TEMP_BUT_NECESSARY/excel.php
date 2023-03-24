<?php

require 'vendor/autoload.php';

$inputFileName = './Name_List For_F.E.(2019 PATTERN)_Exam.xlsx';

/** Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

// $cellValue = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, 2)->getValue();

//print($cellValue);

$worksheet = $spreadsheet->getActiveSheet();

echo '<table border>' . PHP_EOL;
foreach ($worksheet->getRowIterator() as $row) {
    echo '<tr>' . PHP_EOL;
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                                                       //    even if a cell value is not set.
                                                       // For 'TRUE', we loop through cells
                                                       //    only when their value is set.
                                                       // If this method is not called,
                                                       //    the default value is 'false'.
    foreach ($cellIterator as $cell) {
        echo '<td>' .
             $cell->getValue() .
             '</td>' . PHP_EOL;
    }
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;