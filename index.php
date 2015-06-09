<?php

// index.php

	//SESSION START
	session_start();
	error_reporting(E_WARNING | E_ERROR);
	error_reporting(E_ALL); ini_set('display_errors',1);

	// On récupère "config.inc.php" et "functions.inc.php"
	include ('includes/common.app.php');



	/* Connexion compte */
	
	if($_SESSION['logged_in'] != 'ok'){

		// Sanitisation
		$username = trim(strip_tags($_POST['username']));
		$password = trim(strip_tags($_POST['password']));

		// Validation
		$errors = array();
		if(!empty($_POST)){
			if($username==''){
				$errors['username']= '<img src="img/error.png" alt="croix-erreur" class="croix-error"/> Veuillez spécifier un nom d\'utilisateur';
			}
			if($password==''){
				$errors['password']= '<img src="img/error.png" alt="croix-erreur" class="croix-error"/> Veuillez spécifier un mot de passe';
			}
		}
		if(!empty($_POST) && count($errors) < 1){
			// pas d'erreur, on vérifie si l'utilisateur est connu

			// Hachage du mot de passe
			$pass_hache = sha1($_POST['password']);

			// Vérification des identifiants
			$req = $connexion->prepare('SELECT id FROM compte_user WHERE username = :username AND password = :password');
			$req->execute(array(
				'username' => $username,
				'password' => $pass_hache
			));

			$resultat = $req->fetch();

			if (!$resultat){
				echo "Mauvais identifiant ou mot de passe !";
			} else {
				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['username'] = $username;
				$_SESSION['logged_in'] = 'ok';
				header('Location: ./index.php'); //recharge la page
				exit;
			}
		}
		include ("login.view.php");
	} else {
		include ("directory.view.php");
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Q-RBEX | Une recherche aux lieux oubliés</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />


		<meta name="mobile web-app-capable" = "yes">
		<meta name="apple-mobile-web-app-title" content="Q-RBEX">
		<meta name="apple-mobile-web-app-capable" content="yes">



		<link href="img/icon/qrbex-icon-57px.png" rel="apple-touch-icon-precomposed" />
		<link href="img/icon/qrbex-icon-72px.png" rel="apple-touch-icon-precomposed" sizes="72x72" />
		<link href="img/icon/qrbex-icon-76px.png" rel="apple-touch-icon-precomposed" sizes="76x76" />
		<link href="img/icon/qrbex-icon-114px.png" rel="apple-touch-icon-precomposed" sizes="114x114" />
		<link href="img/icon/qrbex-icon-120px.png" rel="apple-touch-icon-precomposed" sizes="120x120" />
		<link href="img/icon/qrbex-icon-128px.png" rel="apple-touch-icon-precomposed" sizes="128x128" />
		<link href="img/icon/qrbex-icon-144px.png" rel="apple-touch-icon-precomposed" sizes="144x144" />
		<link href="img/icon/qrbex-icon-152px.png" rel="apple-touch-icon-precomposed" sizes="152x152" />
		<link href="img/icon/qrbex-icon-180px.png" rel="apple-touch-icon-precomposed" sizes="180x180" />
		<link href="img/icon/qrbex-icon-128px.png" rel="icon" sizes="128x128" />
		<link href="img/icon/qrbex-icon-192px.png" rel="icon" sizes="192x192" />


		
		<link href="img/startup/apple-startup-320x460.jpg" media="(device-width: 320px)" rel="apple-startup-image" />
		<link href="img/startup/apple-startup-640x920.jpg" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />


	</head>
</html>