<?php

// PAGE INSCRIPTION.PHP

//SESSION START
session_start();
error_reporting(E_WARNING | E_ERROR);
error_reporting(E_ALL); ini_set('display_errors',1);

include ('includes/common.app.php');


if($_SESSION['logged_in'] == 'ok'){
		header('location: index.php');
		exit;
	}

	if( isset($_POST["username"]) && !empty($_POST['username'])){

		// Pot de miel
		if($_POST['pdm'] != ''){
			die("YOU SHALL NOT PASS!");
		}

		// Sanitisation
		$username = trim(strip_tags($_POST['username']));
		$password = trim(strip_tags($_POST['password']));
		$email = trim(strip_tags($_POST['email']));
		$reglement = trim(strip_tags($_POST['reglement']));


		// Validation
		$errors = array();

		$query = $connexion->query("SELECT id FROM compte_user WHERE username = '$username'"); 
		$user_exist = $query->rowCount();

		if($username==''){
			$errors['username']= '<img src="img/error.png" alt="croix-erreur" class="croix-error"/> Veuillez spécifier un nom d\'utilisateur';
		}

		if($password==''){
			$errors['password']= '<img src="img/error.png" alt="croix-erreur" class="croix-error"/> Veuillez spécifier un mot de passe';
		}

		if($email==''){
			$errors['email']= '<img src="img/error.png" alt="croix-erreur" class="croix-error"/> Veuillez spécifier votre adresse email';
		}

		//if(is_valid_email($email)== false){
		//	$errors['email']= "Votre email n'est pas valide" ;
		//}

		if($reglement==''){
			$errors['reglement']= '<img src="img/error.png" alt="croix-erreur" class="croix-error"/> Vous devez accepter le règlement';
		}

		if(count($errors) < 1){

			// Hachage du mot de passe
			$pass_hache = sha1($_POST['password']);

			// On vérifie si le pseudo n'existe pas déjà
			if($user_exist == 1){

				$errors['username']= 'Ce pseudo existe déjà';

			}
			else {
				// Insertion
				$req = $connexion->prepare('INSERT INTO compte_user(username, password, email, date_inscription) VALUES(:username, :password, :email, NOW())');
				$req->execute(array(
					'username' => $username,
					'password' => $pass_hache,
					'email' => $email
				));



				$req = $connexion->prepare('SELECT id FROM compte_user WHERE username = :username AND password = :password');
				$req->execute(array(
					'username' => $username,
					'password' => $pass_hache
				));

				$resultat = $req->fetch();



				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['username'] = $username;
				$_SESSION['logged_in'] = 'ok';


			
				// Préparation du mail contenant le lien d'activation
				$destinataire = $email;
				$sujet = "Bienvenue sur Q-RBEX" ;
				$entete = "From: godefroid.mathieu@gmail.com" ;
				$message = 'Bienvenue '. $username .' !

				Nous avons bien enregistré votre inscription sur Q-RBEX et nous vous en remercions.
				Vous pouvez désormais vous connecter sur Q-RBEX et partir à la découverte des lieux oubliés.
			
				Voici les informations à conserver:

				Votre compte utilisateur: '. $username .'
				Votre mot de passe: '. $password .'



				Q-RBEX
				mathieugodefroid.be/tfe/version-juin/landingpage-qrbex/
			
				---------------------------------------------------------
				Ceci est un mail automatique, merci de ne pas y répondre.';
			
				// Envoi du mail
				mail($destinataire, $sujet, $message, $entete) ;

				// Inscription réussi, on est automatiquement connecté
				header('location: index.php');
				exit;
			}

		}
	}

?>


<!DOCTYPE html>
<html>

	<head>
		<title>Inscription | Q-RBEX</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php include('includes/links.inc.php'); ?>

	</head>

	<body class="page-connexion">

		<input id="retour-connexion" type="button" onclick="javascript:history.back()">

		<div id="container-withpadd">

			<div id="bloc-connect">

				<form method="post">
					<fieldset>
						<ol>
							<li>
								<input type="text" id="username" class="champ-form" name="username" placeholder="Pseudo" value="<?php echo $_POST['username']; ?>">
								<div class="errordisplay">
		                    	<?php if ($errors['username'] != ''){
		                        	echo ($errors['username']);
		                    	}?>
		                    	</div>
							</li>
							
							<li>
								<input type="password" id="password" class="champ-form" name="password" placeholder="Mot de passe" value="<?php echo $_POST['password']; ?>">
								<div class="errordisplay">
		                    	<?php if ($errors['password'] != ''){
		                        	echo ($errors['password']);
		                    	}?>
		                    	</div>
							</li>

							<li>
								<input type="email" id="email" class="champ-form" name="email" placeholder="Email" value="<?php echo $_POST['email']; ?>">
								<div class="errordisplay">
		                    	<?php if ($errors['email'] != ''){
		                        	echo ($errors['email']);
		                    	}?>
		                    	</div>
							</li>

							<li>
								<label class="pdm">POT DE MIEL: si tu es une espèce vivante dotée d'une certaine intelligence, ne remplis pas ce champ!</label>
								<input class="pdm" type="text" name="pdm">
							</li>

							<li>
								<input id="reglement" type="checkbox" name="reglement">
								<label for="reglement">J'ai lu et j’accepte le règlement et les conditions d’utilisation (<a href="conditions.php" target="_blank">lire les conditions</a>).</label>
								<div class="errordisplay">
		                    	<?php if ($errors['reglement'] != ''){
		                        	echo ($errors['reglement']);
		                    	}?>
		                    	</div>
							</li>
						</ol>

						<input type="submit" value="Inscription" id="btn-connect" class="btn-rouille">
					</fieldset>


				</form>

			</div><!-- end bloc-connexion -->

		</div><!-- end container -->



		<!-- jQuery -->
		<script src="js/jquery-2.1.3.min.js"></script>

		<!-- HUGRID (PROVISOIRE) -->

		<!--<script src="js/jquery-1.6.2.min.js"></script>-->
		<script src="js/hugrid.js"></script>
		<script src="js/grille.js"></script>

	</body>

</html>