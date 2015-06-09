<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Q-RBEX</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php include('includes/links.inc.php'); ?>
		
	</head>

	<body>

		<div id="sb-site">

			<header>
				<h1>Q-RBEX</h1>
				<ul>
					<li class="sb-toggle-right"><img src="img/picto-menu.png" alt="picto menu" /></li>
				</ul>
			</header>

			<div id="container-nopadd">

				<form method="post" id="recherche">
					<fieldset>
						<select class="champ-recherche">
							<option>Durée parcours</option>
						</select>

						<input type="submit" class="btn-recherche">
					</fieldset>
				</form>

				<ul id="liste-urbex">
					<li class="vignette-urbex">
						<a href="accueil-ateliers-sncb.php">
							<h2 class=" align-picto"><img class="categories" src="img/categories/train.png" alt="picto catégorie train" />Les ateliers de la SNCB</h2>
							<img class="photo-vignette" src="img/vign-lieux/vign-ateliers-sncb.jpg" alt="photographie des ateliers de la SNCB">
							<ul>
								<li>Catégorie: Train</li>
								<li>Province: Namur</li>
								<li>Etat: Abandon</li>
								<li>Durée: 1h de marche</li>
							</ul>
						</a>
					</li>

					<!--<li class="vignette-urbex">
						<a href="accueil-eurofonderie.php">
							<h2 class=" align-picto"><img class="categories" src="img/categories/usine.png" alt="picto catégorie usine" />Eurofonderie</h2>
							<img class="photo-vignette" src="img/vign-lieux/vign-eurofonderie.jpg" alt="photographie de l'Eurofonderie">
							<ul>
								<li>Catégorie: Usine</li>
								<li>Province: Namur</li>
								<li>Etat: Abandon</li>
								<li>Durée: 1h de marche</li>
							</ul>
						</a>
					</li>

					<li class="vignette-urbex">
						<a href="accueil-boulonnerie.php">
							<h2 class=" align-picto"><img class="categories" src="img/categories/usine.png" alt="picto catégorie usine" />La boulonnerie</h2>
							<img class="photo-vignette" src="img/vign-lieux/vign-boulon.jpg" alt="photographie d'une boulonnerie'">
							<ul>
								<li>Catégorie: Usine</li>
								<li>Province: Namur</li>
								<li>Etat: Abandon</li>
								<li>Durée: 2h de voiture</li>
							</ul>
						</a>
					</li>

					<li class="vignette-urbex">
						<a href="accueil-cimetiere-trains.php">
							<h2 class=" align-picto"><img class="categories" src="img/categories/train.png" alt="picto catégorie train" />Le cimetière des trains</h2>
							<img class="photo-vignette" src="img/vign-lieux/vign-cimetiere-trains.jpg" alt="photographie du cimetière des trains">
							<ul>
								<li>Catégorie: Train</li>
								<li>Province: Hainaut</li>
								<li>Etat: Abandon</li>
								<li>Durée: 2h de voiture</li>
							</ul>
						</a>
					</li>-->
				</ul>



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
