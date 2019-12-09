<?php
$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$mail=$_POST['mail'];
$Classe=$_POST['Classe'];
$mdp= SHA1($_POST['mdp']);
$identifiant= $_POST['identifiant'];
try{
$bdd= new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8','root','');
}
catch(Exception $e){
  die('Erreur:'.$e->getMessage());
}
$req = $bdd->prepare('INSERT into etudiant (Nom, Prenom, mail, Classe, mdp, identifiant) value(?,?,?,?,?,?)');
$req -> execute(array($Nom, $Prenom, $mail, $Classe, $mdp, $identifiant));
 //echo '<meta http-equiv="refresh" content="0;URL=Connexion.php">';
 header('Location: formulaire_connexion_etudiant.php');

?>
