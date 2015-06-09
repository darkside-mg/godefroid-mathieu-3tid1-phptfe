<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Profil | Q-RBEX</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php include('includes/links.inc.php'); ?>
		
	</head>

	<body>

		<div id="sb-site">

			<?php include('includes/header.inc.php'); ?>

			<div id="container-nopadd">

				<div id="bloc-profil">
					<!--<img src="img/photo-profil-defaut.jpg" id="photo-profil" alt="Photo profil de l'utilisateur" />-->
					<p><span class="pseudo"><?php echo $_SESSION['username']; ?></span></p>
					<p><span class="infos-profil"><?php echo $_SESSION['ville']; ?> - <span id="sexe-<?php echo $_SESSION['sexe']; ?>">Sexe</span> - 0 lieu localisé</span></p>
					<a href="<?php echo $_SESSION['website']; ?>" class="site-user" target="_blank"><?php echo $_SESSION['website']; ?></a>
				</div><!-- end bloc-profil -->

				<div class="contenu-padd">

					<h3>Description</h3>
					<p><?php echo $_SESSION['description']; ?></p>

					<hr />

					<h3>Lieux localisés</h3>

					<p>Vous n'avez pas encore trouvé de lieu.</p>

				</div><!-- end contenu-padd -->

				<ol id="historique">

					<!--<li>
						<a href="accueil-ateliers-sncb.php">
							<h4>Les ateliers de la SNCB</h4>
							<p><span>Localisé le 06 Mai 2015.</span></p>
						</a>
					</li>-->
				</ol>

				<div class="contenu-padd">
					<hr />
				</div><!-- end contenu-padd -->

			</div><!-- end container -->

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
