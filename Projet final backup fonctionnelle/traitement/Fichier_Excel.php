<?php
session_start();

//Code pour utiliser des fichier Excel
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//On compte les différents panini et le total
$bdd = new PDO('mysql:host=localhost;dbname=snack','root','');
$req = $bdd->prepare('SELECT COUNT(*) as nb FROM inscrit WHERE choix = "Viande"');
$req->execute();
$req = $req->fetch();
$nb_viande = $req['nb'];

$req = $bdd->prepare('SELECT COUNT(*) as nb from Inscrit where choix = "Fromage"');
$req->execute();
$req = $req->fetch();
$nb_fromage = $req['nb'];

$req = $bdd->prepare('SELECT COUNT(*) as nb from Inscrit where choix = "Poisson"');
$req->execute();
$req = $req->fetch();
$nb_poisson = $req['nb'];

$req = $bdd->prepare('SELECT COUNT(*) as nb from Inscrit where choix = "Salade"');
$req->execute();
$req = $req->fetch();
$nb_salade = $req['nb'];

$total = $nb_viande+$nb_fromage+$nb_poisson+$nb_salade;

//Setup des titres de la page Inscrit dans le fichier Excel
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet('Commandes_Snack.xlsx');
$sheetInscrit = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Inscrit');
$spreadsheet->addSheet($sheetInscrit, 0);
$sheet = $spreadsheet->getSheet(0);
$sheet->setCellValue('A1', 'NOM');
$sheet->setCellValue('B1', 'PRENOM');
$sheet->setCellValue('C1', 'PANINI VIANDE');
$sheet->setCellValue('D1', 'PANINI FROMAGE');
$sheet->setCellValue('E1', 'PANINI POISSON');
$sheet->setCellValue('F1', 'SALADE');
$writer = new Xlsx($spreadsheet);
$writer->save('Commandes_Snack.xlsx');

//Setup des titres de la page Total dans le fichier Excel
$sheetTotal = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Total');
$spreadsheet->addSheet($sheetTotal, 1);
$spreadsheet->removeSheetByIndex(2);
$sheet = $spreadsheet->getSheet(1);
$sheet->setCellValue('A1', 'Total VIANDE');
$sheet->setCellValue('B1', 'Total FROMAGE');
$sheet->setCellValue('C1', 'Total POISSON');
$sheet->setCellValue('D1', 'Total SALADE');
$sheet->setCellValue('E1', 'Total');

//Entrer des valeurs dans la page Total
$sheet->setCellValue('A2', $nb_viande);
$sheet->setCellValue('B2', $nb_fromage);
$sheet->setCellValue('C2', $nb_poisson);
$sheet->setCellValue('D2', $nb_salade);
$sheet->setCellValue('E2', $total);
$writer = new Xlsx($spreadsheet);
$writer->save('Commandes_Snack.xlsx');

//Fonction pour inscrire les utilisateur au snack dans un fichier Excel
function insert($colonne, $ligne, $nom, $prenom){
  $ligne++;
  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Commandes_Snack.xlsx');
  $sheet = $spreadsheet->getSheet(0);
  $sheet->setCellValue('A'.$ligne, $nom);

  $sheet->setCellValue('B'.$ligne, $prenom);
  if ($colonne != '0'){

    $sheet->setCellValue($colonne.$ligne, 'x');
  }
  $writer = new Xlsx($spreadsheet);
  $writer->save('Commandes_Snack.xlsx');
}

//Compteur de ligne et récupération des données
function donnee(){
  $bdd = new PDO('mysql:host=localhost;dbname=snack','root','');
  $response = $bdd->prepare('SELECT * from Inscrit');
  $response->execute();
  $donnee = $response->fetchall();
  foreach ($donnee as $value) {
    $nom = $value['nom'];
    $prenom = $value['prenom'];
    $ligne = $value['id'];
    if($value['choix'] == 'Viande'){
      $colonne = 'C';
    }
    else if($value['choix'] == 'Fromage'){
      $colonne = 'D';
    }
    else if($value['choix'] == 'Poisson'){
      $colonne = 'E';
    }
    else if($value['choix'] == 'Salade'){
      $colonne = 'F';
    }
    else{
      $colonne = '0';
    }

    insert($colonne, $ligne, $nom, $prenom);
  }
}
donnee();

//Reset de la base de donnée avec les inscrits
$req = $bdd->prepare('TRUNCATE TABLE inscrit');
$req->execute();

//Envoi du mail avec le fichier Excel aux cuisiniers
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(); // create a new object
$mail->CharSet = 'UTF-8';
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "quentin.lignani.schuman@gmail.com";
$mail->Password = "Admwb2000";
$mail->SetFrom("l.guo@lprs.fr");
$mail->Subject = "[Robert Schuman] : Réservation au Snack";
$mail->addAttachment('Commandes_Snack.xlsx');         // Add attachments
$mail->Body = "<center><b>Réservation au Snack</b><br><p>Bonjour ! Voilà les commande pour le snack en pièce jointe</p></center></html>";
$mail->AddAddress("l.guo@lprs.fr");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

?>
