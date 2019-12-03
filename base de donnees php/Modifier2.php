<form method="post" action="Modifier3.php">

Nom du membre à modifier:
<input type="text" name="ModNom" required/>
<br><br>

Prénom du membre à modifier:
<input type="text" name="ModPrenom" required/><br><br>

Nom:
<input type="text" name="nom" required/>
<br><br>

Prenom:
    <input type="text" name="prenom" required/><br><br>


Age:
    <input type="number" name="age" required><br><br>

Metier:
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

Pays:
<input type="radio" name="pays" value="France" checked>France
<input type="radio" name="pays" value="Allemagne">Allemagne
<input type="radio" name="pays" value="Espagne">Espagne
<input type="radio" name="pays" value="Portugal">Portugal
<input type="radio" name="pays" value="USA">USA
<input type="radio" name="pays" value="Angleterre">Angleterre<br><br>


<input type="button" value="Annuler" onclick="window.location.href='Exo4 fonction.php'"/>
<input type="submit" value="Modifier"/><br><br>

</form>
