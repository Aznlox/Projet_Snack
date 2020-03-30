<html>
<form method="post" action="Inscription2.php">



<nom><ag>Nom:</ag>
	<ad><input type="text" name="Nom"/>
	</ad></nom><br><br>

  <nom><ag>prenom:</ag>
  	<ad><input type="text" name="prenom"/>
  	</ad></nom><br><br>

    <nom><ag>age:</ag>
    	<ad><input type="number" name="age"/>
    	</ad></nom><br><br>

      <ag>Métier:</ag>
				<select name="metier">
<?php
try{
$bdd= new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
}

catch(Exception $e){
die('Erreur:'.$e->getMessage());
}

$reponse=$bdd->query('SELECT metier FROM metiers');
$donne=$reponse->fetchall();
foreach ($donne as $value) {
echo '<option>'.$value['metier'].'</option>';
}

?>
</select><br><br>

        <nom><ag>pays:</ag>
<ad><input type="radio" name="pays" value="France">France
<input type="radio" name="pays" value="Espagne"> Espagne
<input type="radio" name="pays" value="Russie"> Russie
<input type="radio" name="pays" value="Angleterre">Angleterre
<input type="radio" name="pays" value="Chine"> Chine
<input type="radio" name="pays" value="USA"> USA
        	</ad></nom><br><br>

<mdp><ag>Votre mot de passe:</ag>
<ad><input type="password" name="mdp"/></ad></mdp><br><br>
<ad><input type="submit" value="s'inscrire" onclick="window.location.href='Exo4 fonction.php'"/></ad><br><br>
</form>
</html>
