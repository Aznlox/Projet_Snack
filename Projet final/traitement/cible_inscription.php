<?php
//cette page sert au traitement php de la page d'inscription
$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$mail=$_POST['mail'];
$Classe=$_POST['Classe'];
$identifiant= $_POST['identifiant'];
// on importe les données entrées par l'uttilisateur lors de l'inscription dans des variables du meme nom
$mdp= SHA1($_POST['mdp']);
//pour le mot de passe, on entre l'information entrée dans la variable "mdp", préalablement hashée à travrers l'algorithme SHA1
$role="etudiant";
// le rôle est par défault le rôle d'étudiant, donc on met dans cette variable "etudiant" sous forme de chaine de caractères
try{
$bdd= new PDO('mysql:host=localhost;dbname=snack;charset=utf8','root',''); // on se connecte à la base de donnée "snack", avec l'uttilisateur "root" avec l'encodage utf-8
}
catch(Exception $e){
  die('Erreur:'.$e->getMessage());
}
$reponse = $bdd->prepare('SELECT * FROM etudiant WHERE Nom= :Nom and Prenom= :Prenom and :mail or identifiant= :identifiant') ;  //on prepare la requete de php pour accéder aux identifiants et aux mdp dans la base de données en sql
$reponse->execute(array('Nom'=>$Nom,'Prenom'=>$Prenom, 'mail'=>$mail,'identifiant'=>$identifiant)); //on insère sous forme de tableau les données que l'on veut récupérer de la base
$donne = $reponse->fetch(); //on execute finalement la requete
if($donne) // si la perssone existe bel et bien, on applique la condition qui suit
 {
  header('Location: ../view/erreur_identifiant.php');// on renvoie l'utilisateur vers  la page d'erreur
}
else // si la condition précédente n'est pas vérifiée, on applique la condition suivante
{

  $req = $bdd->prepare('INSERT into etudiant (Nom, Prenom, mail, Classe, mdp, identifiant,role) value(?,?,?,?,?,?,?)'); // on prépare une requete pour accéder à la table "étudiant" de la base de données "snack", en ouvrant une nouvelle ligne dans cette table et en y entrant les informations entrées par l'uttilisateur
  $req -> execute(array($Nom, $Prenom, $mail, $Classe, $mdp, $identifiant,$role)); // on execute la requete et on met dans un tableau les variables
   //echo '<meta http-equiv="refresh" content="0;URL=Connexion.php">';
   header('Location: ../view/formulaire_connexion_etudiant.php');
  //on redirige l'utilisateur dans le formulaire de connexion

}
?>
