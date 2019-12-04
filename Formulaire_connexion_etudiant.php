
<!DOCTYPE html>

<html>

  <head>
    <title>Connexion</title> <!-- Voici le titre qui devrait s'afficher dans l'onglet-->
  </head>

  <body>
  </br>
</br>
</br>
</br>
</br>
</br>
<!-- On saute des lignes pour la visibilité-->
<div align="center">
<!-- On ouvre une balise qui sert à rassembler des élements divers, en plus cela nous permet de centrer les éléments rassemblés-->
<form id="contact_form" action="inscription_etudiant.php" method="POST">
  <!-- On introduit un formulaire que l'on lie à un fichier php-->
  <div>
    <label class="required" for="id">Identifiant:</label><br />
    <input id="id" class="input" name="identifiant" type="text" value="" size="30" required/><br />
    <!-- On demande à l'utilisateur  son identifiant avec une zone de texte pour qu'il écrive -->
  </div>

  <div>
    <label class="required" for="mdp">Mot De Passe:</label><br />
    <input id="mdp" class="input" name="mdp" type="password" value="" size="30" required/><br />
    <!-- On demande à l'uttilisateur le mot de passe avec une zone de texte-->
  </div>
    <input id="submit_button" type="submit" value="Connexion" />


<!-- On met à disposition un bouton de connexion pour envoyer toutes ces données.-->

</form>
</div>
</body>

</html>
