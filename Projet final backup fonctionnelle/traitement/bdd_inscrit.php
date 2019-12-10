<?php
session_start();

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
if(isset($_POST['choix'])){
  $choix = $_POST['choix'];
}
else{
  $choix = '0';
}

//on vérifit si l'utilisateur a déja fait un choix et on modifit son choix
$bdd = new PDO('mysql:host=localhost;dbname=snack','root','');
$response = $bdd->prepare('SELECT * from Inscrit where nom= ? AND prenom= ?');
$response->execute(array($nom, $prenom));
$donnee = $response->fetch();
if ($donnee) {
  $req = $bdd->prepare('UPDATE Inscrit set choix = ? where nom = ? AND prenom = ?');
  $req->execute(array($choix, $nom, $prenom));
}

//Si c'est un nouvel Inscrit on le rajoute dans la bdd
else{
  $req = $bdd->prepare('INSERT into Inscrit(nom, prenom, choix) VALUES(?, ?, ?)');
  $req->execute(array($nom, $prenom, $choix));
}
header('location:../vu/merci.php');

 ?>
