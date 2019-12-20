<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Mot de passe oublié</title> <!--on nomme le titre de la page-->
	<meta charset="UTF-8"> <!--On encode en utf-8-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../lib/images/icons/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/css/util.css">
	<link rel="stylesheet" type="text/css" href="../lib/css/main.css">
<!--===============================================================================================-->
	<!--On importe les bibliothèques de bootsrap néscéssaires au design dans le vendor, on importe les feuilles css...-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../lib/images/logo.png);"> <!--On importe l'image du logo pour le mettre dans le haut du cadre du formulaire-->
					<span class="login100-form-title-1">
						Mot de passe oublié
					</span>
				</div>

				<form class="login100-form validate-form" action="../traitement/traitement_mdp_oublie.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Mail</span>
						<input class="input100" type="email" name="email" placeholder="Entrez votre e-mail" required/>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
              <?php
              session_start();
              if(isset($_SESSION['erreur_mail'])){
                if($_SESSION['erreur_mail'] == 1) {
                  echo "E-mail non existant";
                  $_SESSION['erreur_mail'] = 0;
                }
              }
              ?>
						</div>

					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Réinitialiser mon mot de passe
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>
