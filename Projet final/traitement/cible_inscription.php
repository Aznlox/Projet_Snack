<?php
//cette page sert au traitement php de la page d'inscription 
$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$mail=$_POST['mail'];
$Classe=$_POST['Classe'];
// on importe les données entrées par l'uttilisateur lors de l'inscription dans des variables du meme nom 
$mdp= SHA1($_POST['mdp']);
//pour la mot de passe, on entre dans la variable "mdp"
$identifiant= $_POST['identifiant'];
$role="etudiant";
try{
$bdd= new PDO('mysql:host=localhost;dbname=snack;charset=utf8','root','');
}
catch(Exception $e){
  die('Erreur:'.$e->getMessage());
}
$reponse = $bdd->prepare('SELECT * FROM etudiant WHERE Nom= :Nom and Prenom= :Prenom and :mail or identifiant= :identifiant') ;  //on prepare la requete de php pour accéder aux identifiants et aux mdp dans la base de données en sql
$reponse->execute(array('Nom'=>$Nom,'Prenom'=>$Prenom, 'mail'=>$mail,'identifiant'=>$identifiant)); //on insère sous forme de tableau les données que l'on veut récupérer de la base
$donne = $reponse->fetch(); //on execute finalement la requete
if($donne)
 {
  header('Location: ../view/erreur_identifiant.php');
}
else {

  $req = $bdd->prepare('INSERT into etudiant (Nom, Prenom, mail, Classe, mdp, identifiant,role) value(?,?,?,?,?,?,?)');
  $req -> execute(array($Nom, $Prenom, $mail, $Classe, $mdp, $identifiant,$role));
   //echo '<meta http-equiv="refresh" content="0;URL=Connexion.php">';
   header('Location: ../view/formulaire_connexion_etudiant.php');

}
?>
