<?php

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mail=$_POST['mail'];
$classe=$_POST['classe'];
$mdp=$_POST['mdp'];

try{
$bdd= new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8','root','');
}

catch(Exception $e){
  die('Erreur:'.$e->getMessage());
}

$req = $bdd->prepare('insert into utilisateur (nom, prenom, mail, classe, mdp) value(?,?,?,?,?)');
$req -> execute(array($nom, $prenom, $mail, $classe, $mdp));
 echo '<meta http-equiv="refresh" content="0;URL=Connexion.php">';
?>