<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Espace Inscription</title>
	<meta charset="UTF-8">
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
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="../lib/css/menu-deroulant.css"/>
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../lib/images/logo.png);">
					<span class="login100-form-title-1">
						Inscrivez-vous
					</span>
				</div>

				<form class="login100-form validate-form" action="../traitement/cible_inscription.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Le nom est nécéssaire">
						<span class="label-input100">Nom</span>
						<input class="input100" type="text" name="Nom" placeholder="Entrez votre nom" required/>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="le prénom est nécéssaire">
						<span class="label-input100">Prénom</span>
						<input class="input100" type="text" name="Prenom" placeholder="Entrez votre prénom" required/>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="le mail est nécéssaire">
						<span class="label-input100">Mail</span>
						<input class="input100" type="email" name="mail" placeholder="Entrez votre adresse mail" required/>
						<span class="focus-input100"></span>
					</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="un identifiant est nécéssaire">
							<span class="label-input100">Identifiant</span>
						<input class="input100" type="text" name="identifiant" placeholder="Entrez un identifiant" required/>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate = "Veuillez votre classe">
						<span class="label-input100">Classe</span>
						<select name="Classe" id="classe-select">
								<option value="">Choisir une classe</option>
								<option value="SLAM 1">SLAM 1</option>
								<option value="SLAM 2">SLAM 2</option>
								<option value="SISR 1">SISR 1</option>
								<option value="SISR 2">SISR 2</option>
								<option value="CPRP 1">CPRP 1</option>
								<option value="CPRP 2">CPRP 2</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Veuillez entrer un mot de passe">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="mdp" placeholder="Entrer votre MDP" required/>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">


						<div>
							<script type="text/javascript">
</script>

						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Inscription
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
