<?php
// PAGE PARAMETRE.PHP

//SESSION START
session_start();
error_reporting(E_WARNING | E_ERROR);
error_reporting(E_ALL); ini_set('display_errors',1);

// On récupère "config.inc.php" et "functions.inc.php"
include ('includes/common.app.php');

// Contient toutes les valeurs pour la date de naissance
// include('includes/formulaire-birthday.inc.php');



if($_SESSION['logged_in'] = 'ok'){




	// Sanitisation
	$username = trim(strip_tags($_POST['username']));
	$username = $username;
	$ville = trim(strip_tags($_POST['ville']));
	$sexe = trim(strip_tags($_POST['sexe']));
	//$birthday = trim(strip_tags($_POST['birthday']));
	//$birthday_aaaa = trim(strip_tags($_POST['birthday-aaaa']));
	//$birthday_mm = trim(strip_tags($_POST['birthday-mm']));
	//$birthday_jj = trim(strip_tags($_POST['birthday-jj']));
	$website = trim(strip_tags($_POST['website']));
	$description = trim(strip_tags($_POST['description']));









	// Validation
	$errors = array();
	$query = $connexion->query("SELECT id FROM compte_user WHERE username = '$_SESSION[username]'");
	$query2 = $connexion->query("SELECT id FROM compte_user WHERE username = '$username'");

	$row = $query->fetch();
	$row2 = $query2->fetch();
	if($row[0]==$row2[0] || $row2[0]==""){
		$user_exist = 0;
		$id = $row[0];
	} else {
		$user_exist = 1;
	}


	$reponse = $connexion->query("SELECT username, ville, sexe, website, description FROM compte_user WHERE id = $id");
	$reponse->execute();
	$donnee = $reponse->fetch();
	foreach ($donnee as $parametre => $valeurs) {
		$_SESSION[$parametre] = $valeurs;
	}





	if(!empty($_POST)){
		if($username==''){
			$errors['username']= '<img src="img/error.png" alt="croix-erreur" class="croix-error"/> Veuillez spécifier un nom d\'utilisateur';
		}

		if(count($errors) < 1){
			// On vérifie si le pseudo n'existe pas déjà
			if($user_exist == 1){
				$errors['username']= 'Ce pseudo existe déjà';
			}
			else {
				//$birthday = $birthday_aaaa.'-'.$birthday_mm.'-'.$birthday_jj;

				// Modifier les informations
				$_SESSION['username']=$username;
				$_SESSION['ville']=$ville;
				$_SESSION['sexe']=$sexe;
				//$_SESSION['birthday']=$birthday;
				$_SESSION['website']=$website;
				$_SESSION['description']=$description;


				
				$req = $connexion->prepare("UPDATE compte_user 
					SET username = :username, ville = :ville, sexe = :sexe, website= :website, description = :description 
					WHERE id = :id");
				$req->execute(array(
					'username' => $username,
					'ville' => $ville,
					'sexe' => $sexe,
					//'birthday' => $birthday,
					'website' => $website,
					'description' => $description,
					'id' => $id
				));
			}
		}
	}

}



?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<title>Paramètres | Q-RBEX</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php include('includes/links.inc.php'); ?>

	</head>

	<body>

		<div id="sb-site">

			<?php include('includes/header.inc.php'); ?>

			<div id="container-withpadd">

				<h2 class="margtop-h2">Paramètres</h2>
				<form method="post" action="parametre.php" enctype="multipart/form-data">
					<fieldset>
						<!-- PHOTO PROFIL -->
						<!--<img src="#" alt="photo-profil de 'username'">-->
						<!--<label>Photo de profil (max. 1 Mo)</label>
						<input type="file" id="envoi_photo" name="photo-profil">
						<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />-->

						<label class="champ-form" id="label-pseudo"><span>Pseudo : </span><input type="text" name="username" value="<?php echo $_SESSION['username']; ?>"></label>

						<label class="champ-form" id="label-ville"><span>Ville : </span><input type="text" name="ville" value="<?php echo $_SESSION['ville']; ?>"></label>
						
						<!-- SEXE -->
						<input type="radio" id="homme-form" value="m" <?php if(isset($_SESSION['sexe']) AND $_SESSION['sexe']=="m") {echo 'checked="checked"';} ?> name="sexe"><label for="homme-form">Homme</label>
						<input type="radio" id="femme-form" value="f" <?php if(isset($_SESSION['sexe']) AND $_SESSION['sexe']=="f") {echo 'checked="checked"';} ?> name="sexe"><label for="femme-form">Femme</label>
						
						<!-- DATE DE NAISSANCE -->
						<!--<label class="label-para">Date de naissance :</label>
						<select name="birthday-jj" class="champ-form" id="birthday-jj">
							<?php
							foreach($birthday_jj as $iso => $jour){

								// Affiche l'option pour chaque entrée du tableau $pays
								echo '<option value="'.$iso.'">'.$jour.'</option>';
							}
							?>
						</select>
						<select name="birthday-mm" class="champ-form" id="birthday-mois">
							<?php
							foreach($birthday_mm as $iso => $mois){

								// Affiche l'option pour chaque entrée du tableau $pays
								echo '<option value="'.$iso.'">'.$mois.'</option>';
							}
							?>
						</select>
						<select name="birthday-aaaa" class="champ-form" id="birthday-aaaa">
							<?php
							foreach($birthday_aaaa as $iso => $annee){

								// Affiche l'option pour chaque entrée du tableau $pays
								echo '<option value="'.$iso.'">'.$annee.'</option>';
							}
							?>
						</select>-->
						
						<label class="champ-form" id="label-web"><span>Site web : </span><input type="text" name="website" value="<?php echo $_SESSION['website']; ?>"></label>
						
						<label class="label-para">Description :</label>
						<textarea name="description"><?php echo $_SESSION['description']; ?></textarea>

						<input type="submit" class="btn-pp btn-rouille" value="Sauvegarder">
					</fieldset>
				</form>

				<hr />

				<button class="popup-button btn-pp btn-beige" data-modal="popup">Désactiver le compte</button>




			</div><!-- end container -->






			<div class="modal blur-effect" id="popup">
				<div class="popup-content">
					<h2>Attention!</h2>
					<p>Es-tu sûr de vouloir nous quitter?</p> 
					<p>Il te sera impossible de faire marche arrière.</p>
						
					<div class="close close-para btn-pp btn-rouille">Non, je veux encore explorer!</div>
					<hr />
					<a href="supprimer.php" class="adieu btn-pp">Oui, je quitte Q-RBEX...</a>	
				</div>
			</div>

		</div><!-- end sb-site -->


		<div class="sb-slidebar sb-right">
			<?php include('includes/slidebar.inc.php'); ?>
		</div><!-- end sb-slidebar -->







		<!--********************************************
		****************** JAVASCRIPT ******************
		*********************************************-->

		<?php include('includes/js.inc.php'); ?>

		
	</body>
</html>
