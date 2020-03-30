<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


	<title>Mot de passe oublier</title>
    </head>

    <body>
        <div>Mot de passe oublier</div>
        <form method="post">

            <?php
                if (isset($er_mail)){
            ?>
                <div><?= $er_mail ?></div>
            <?php

   }
            ?>

            <input type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>

            <button type="submit" name="oublie">Envoyer</button>
        </form>
    </body>
</html>
