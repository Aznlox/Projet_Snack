<?php

$nom=$_POST['Nom'];
$prenom=$_POST['prenom'];
$age=$_POST['age'];
$metier=$_POST['metier'];
$pays=$_POST['pays'];

try{
$bdd= new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
}

catch(Exception $e){
  die('Erreur:'.$e->getMessage());
}

$req = $bdd->prepare("INSERT INTO utilisateur (NOM, Prenom, Age, Metier, Pays_de_residence) VALUES (?,?,?,?,?)");
$a = $req->execute(array($nom, $prenom, $age, $metier, $pays));

var_dump($a);
?>
