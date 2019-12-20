<?php
session_start();
$mdp = SHA1($_POST['mdp']);
$identifiant = $_SESSION['identifiant'];

//On modifit le mdp de l'utilisateur et on lui remet l'état de vérifié
$bdd = new PDO('mysql:host=localhost;dbname=snack','root','');
$req = $bdd->prepare('UPDATE etudiant set verif = 1 , mdp = ?  where identifiant = ?');
$req->execute(array($mdp, $identifiant));

header('location:../view/formulaire_connexion_etudiant.php');

 ?>
