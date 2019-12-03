<?php

$modnom=$_POST['ModNom'];
$modprenom=$_POST['ModPrenom'];
$nom=$_POST['nom'];
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
$requ = $bdd->prepare('DELETE FROM `utilisateur` WHERE `nom` = ? AND `prenom`= ? ');
$requ -> execute(array($modnom,$modprenom));
$req = $bdd->prepare("INSERT into utilisateur (NOM, Prenom, Age, Metier, Pays_de_residence) VALUES(?,?,?,?,?)");
$req -> execute(array($nom, $prenom, $age, $metier, $pays));

header("location:Exo4 fonction.php");

?>
