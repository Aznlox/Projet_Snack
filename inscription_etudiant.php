<?php

session_start();
$identifiant= $_POST['identifiant'];
$mdp= $_POST['mdp'];

try
{
$bdd = new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8', 'root', '');
}
catch (exception $e)
{
  die('Erreur:'.$e->getMessage());
}
$reponse = $bdd->prepare('SELECT * FROM utilisateurs WHERE identifiant= :identifiant AND admin= : admin AND mdp = :mdp)') ;
$reponse->execute(array('identifiant'=>$identifiant,'mdp'=> $mdp,'admin'=> $admin));
$donne = $reponse->fetch();

if($donne AND $admin)
{
  $_SESSION['login'] = $identifiant;
  header('Location: page_connectee_admin.php');  
}
if($donne)
{
  $_SESSION['login'] = $identifiant;
  header('Location: page_connectee_etudiant.php');
}
else {
  $_SESSION['message'] = "mauvais mot de passe ou identifiant";
    header("Location: inscription_etudiant.php");
}



?>
