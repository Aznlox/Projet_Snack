<?php
session_start();

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
//on entre dans les varaiables "nom" et "prénom", les données de la session
if(isset($_POST['choix'])){
  $choix = $_POST['choix'];
}
else{
  $choix = '0';
}

//on vérifie si l'utilisateur a déja fait un choix et on modifie son choix
$bdd = new PDO('mysql:host=localhost;dbname=snack','root','');
$response = $bdd->prepare('SELECT * from Inscrit where nom= ? AND prenom= ?');
$response->execute(array($nom, $prenom));
$donnee = $response->fetch();
if ($donnee) 
{
  $req = $bdd->prepare('UPDATE Inscrit set choix = ? where nom = ? AND prenom = ?');
  $req->execute(array($choix, $nom, $prenom));
}

//Si c'est un nouvel inscrit on le rajoute dans la bdd
else{
  $req = $bdd->prepare('INSERT into Inscrit(nom, prenom, choix) VALUES(?, ?, ?)');
  $req->execute(array($nom, $prenom, $choix));
}
header('location:../view/merci.php');

 ?>
