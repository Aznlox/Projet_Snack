<?php

session_start(); //on lance une session

$identifiant= $_POST['identifiant'];
$mdp= SHA1($_POST['mdp']);
//on introduit les données entrées par l'uttilisateurs dans des variables à part entière, en l'occurence le mdp et l'identifiant
try
{
$bdd = new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8', 'root', ''); //on se connecte à la base de données contenant les uttilisateurs
}
catch (exception $e)
{
  die('Erreur:'.$e->getMessage());
}
$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE identifiant= :identifiant  AND mdp = :mdp') ;  //on prepare la requete de php pour accéder aux identifiants et aux mdp dans la base de données en sql
$reponse->execute(array('identifiant'=>$identifiant,'mdp'=> $mdp )); //on insère sous forme de tableau les données que l'on veut récupérer de la base
$donne = $reponse->fetch(); // enfin, on execute la requete
$reponse->closeCursor();
if($donne) //condition: si la requete est corectement executé et que la variable "donne" n'est pas vide
{

  $rep = $bdd->prepare('SELECT * FROM utilisateur WHERE role= "ADMIN" AND identifiant = :identifiant') ;
 $rep->execute(array('identifiant'=>$identifiant));
  $role = $rep->fetch();
  // dans la cadre de la précédente condition, on vérifie dans la base de données si le role de l'uttilisateur est bien celui d'aministarteur

if($role){
  $_SESSION['login'] = $identifiant;
    header('Location: page_connectee_admin.php');
// si l'uttilisateur est reconnu administrateur, on le redirige vers sa page
}
else
{
  $_SESSION['login'] = $identifiant;
  $reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE identifiant= :identifiant  AND "ADMIN")') ;  //on prepare la requete de php pour accéder aux identifiants et aux mdp dans la base de données en sql
  $reponse->execute(array('identifiant'=>$identifiant)); //on insère sous forme de tableau les données que l'on veut récupérer de la base
  $donne = $reponse->fetch();
  header('Location: page_connectee_etudiant.php');
  // si l'uttilisateur est lambda, on le redirige vers sa page
}
}
else {
  $_SESSION['message'] = "mauvais mot de passe ou identifiant";
  //session_destroy();
  header("Location: Formulaire_connexion_etudiant.php");

    //si l'uttilisateur n'est pas reconnu, on détruit la session ouverte et on actualise pour rééssayer
}

?>
