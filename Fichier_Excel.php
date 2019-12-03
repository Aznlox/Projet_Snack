<?php
session_start();

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Commandes_Snack.xlsx');
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'NOM');
$sheet->setCellValue('B1', 'PRENOM');
$sheet->setCellValue('C1', 'PANINI VIANDE');
$sheet->setCellValue('D1', 'PANINI FROMAGE');
$sheet->setCellValue('E1', 'PANINI POISSON');
$sheet->setCellValue('F1', 'SALADE');

$writer->save('Commandes_Snack.xlsx');

function insertNOM($ligne, $nom){
  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Commandes_Snack.xlsx');
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A'.$ligne, $nom);
  $writer->save('Commandes_Snack.xlsx');
}

function insertPRENOM($ligne, $prenom){
  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Commandes_Snack.xlsx');
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('B'.$ligne, $prenom);
  $writer->save('Commandes_Snack.xlsx');
}

function insertCHOIX($colonne, $ligne){
  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Commandes_Snack.xlsx');
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue($colonne.$ligne, 'x');
  $writer->save('Commandes_Snack.xlsx');
}




?>
