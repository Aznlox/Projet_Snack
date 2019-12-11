<?php
session_start();
$mdp= SHA1($_POST['mdp']);
$identifiant = $_POST['identifiant'];

try{
$bdd= new PDO('mysql:host=localhost;dbname=snack;charset=utf8','root','');
}

catch(Exception $e){
  die('Erreur:'.$e->getMessage());
}



$reponse = $bdd->prepare('SELECT * FROM etudiant WHERE identifiant= :identifiant  AND mdp = :mdp') ;  //on prepare la requete de php pour accéder aux identifiants et aux mdp dans la base de données en sql
$reponse->execute(array('identifiant'=>$identifiant,'mdp'=> $mdp )); //on insère sous forme de tableau les données que l'on veut récupérer de la base
$donne = $reponse->fetch(); // enfin, on execute la requete

if($donne) //condition: si la requete est corectement executé et que la variable "donne" n'est pas vide
{

  $rep = $bdd->prepare('SELECT * FROM etudiant WHERE role= "ADMIN" AND identifiant = :identifiant') ;
 $rep->execute(array('identifiant'=>$identifiant));
  $role = $rep->fetch();
  // dans la cadre de la précédente condition, on vérifie dans la base de données si le role de l'uttilisateur est bien celui d'aministarteur
if($role)
{
  $_SESSION['login'] = $identifiant;
    header('Location: ../view/page_connectee_admin.php');
// si l'uttilisateur est reconnu administrateur, on le redirige vers sa page
exit();
}
else
{
  $_SESSION['login'] = $identifiant;
  $reponse = $bdd->prepare('SELECT * FROM etudiant WHERE identifiant= :identifiant  AND role="etudiant"') ;  //on prepare la requete de php pour accéder aux identifiants et aux mdp dans la base de données en sql
  $reponse->execute(array('identifiant'=>$identifiant)); //on insère sous forme de tableau les données que l'on veut récupérer de la base
  $donne = $reponse->fetch();
  $_SESSION['nom'] = $donne['Nom'];
  $_SESSION['prenom'] = $donne['Prenom'];

  header('Location: ../view/confirmation.html');
  // si l'utilisateur est lambda, on le redirige vers sa page
  exit();
}
}
else {
  echo '<body onLoad="alert(\'Identifiant ou Mot de passe incorrect\')">';

echo '<meta http-equiv="refresh" content="0;URL=../view/formulaire_connexion_etudiant.php">';


    //si l'uttilisateur n'est pas reconnu, on détruit la session ouverte et on actualise pour rééssayer
}


?>
