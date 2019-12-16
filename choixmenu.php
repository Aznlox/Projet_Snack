<!DOCTYPE html>
<html><link rel="stylesheet" href="style.css"> <!--on importe la feuille css -->
<body>

<form action="merci.php"><!--on ouvre un formulaire en html et on importe le fichier de traitement en php -->
  <CENTER><!--on ouvre une balise pour centrer tout l'affichage jusqu'à la balise fermente -->
<p>Choix des paninis:</p>
<input type="radio" name="viande" value="viande"> Panini viande<br>
  <input type="radio" name="poisson" value="poisson"> Panini poisson<br>
  <input type="radio" name="fromage" value="fromage"> Panini fromage<br>
  <input type="radio" name="" value="fromage"> Menu du jour<br>
<p>Notre salade:</p>
  <input type="radio" name="age" value="salade">Salade<br>
    <!--on ouvre des inputs pour laisser le choix des menus-->
  <br><input type="submit" value="Valider">
    <!-- on met un bouton de validation-->
</CENTER><!--on ferme la balise pour centrer l'affichage -->
</form>

</body>
</html>
