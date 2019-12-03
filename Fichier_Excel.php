<?php
session_start();

//Code pour utiliser des fichier Excel
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//Setup des titres
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Commandes_Snack.xlsx');
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'NOM');
$sheet->setCellValue('B1', 'PRENOM');
$sheet->setCellValue('C1', 'PANINI VIANDE');
$sheet->setCellValue('D1', 'PANINI FROMAGE');
$sheet->setCellValue('E1', 'PANINI POISSON');
$sheet->setCellValue('F1', 'SALADE');

$writer->save('Commandes_Snack.xlsx');

//Fonction pour inscrire les utilisateur au snack
function insert($colonne, $ligne, $nom, $prenom){
  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Commandes_Snack.xlsx');
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A'.$ligne, $nom);

  $sheet->setCellValue('B'.$ligne, $prenom);

  $sheet->setCellValue($colonne.$ligne, 'x');
  $writer->save('Commandes_Snack.xlsx');
}

//Récupérer la prochaine ligne
$_POST
$ligne =


?>
