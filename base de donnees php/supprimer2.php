<?php
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];

try{
  $bdd= new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
}
  catch(Exception $e){
    die('Erreur:'.$e->getMessage());
}
$req = $bdd->prepare('DELETE FROM `utilisateur` WHERE `nom` = ? AND `prenom`=?');
$req -> execute(array($nom,$prenom));
header("location:Exo4 fonction.php");
?>
