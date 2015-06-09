<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Les ateliers de la SNCB | Q-RBEX</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php include('includes/links.inc.php'); ?>

	</head>

	<body>

		<div id="sb-site">

			<?php include('includes/header-jeu.inc.php'); ?>

			<div id="container-withpadd">

				<h2 class="margtop-h2 align-picto"><img class="categories" src="img/categories/train.png" alt="picto catégorie train" />Les ateliers de la SNCB</h2>
				<img src="img/couv-lieux/couv-ateliers-sncb.jpg" class="photo-description" alt="Photographie des ateliers de la SNCB" />
				<ul id="detail-lieu">
					<li>Catégorie: Train</li>
					<li>Province: Namur</li>
					<li>Etat: Abandon</li>
					<li>Trouvé X fois</li><!-- Compteur php? -->
					<li>Durée: 1h de marche</li>
				</ul>

				<hr />

				<h3>Précautions et matériel</h3>
				<ul class="precautions">
					<li><img src="img/symboles/danger.png" class="pictos" alt="Danger" /></li>
					<li><img src="img/symboles/eboulement.png" class="pictos" alt="Risque d'éboulement" /></li>
					<li><img src="img/symboles/ronces.png" class="pictos" alt="Ronçes" /></li>
					<li><img src="img/symboles/risque-chutes.png" class="pictos" alt="Risque de chutes" /></li>
					<li><img src="img/symboles/tique.png" class="pictos" alt="Tique" /></li>
				</ul>

				<h3>Histoire du lieu</h3>
				<p>Construit en 1900, ce bâtiment était un lieu de passage pour les cheminots de la gare marchandise toute proche.</p>
				<p>En 1979, une explosion de chaudière mit feu au bâtiment, coûtant la vie à une personne.</p>
				<p>Aujourd’hui, le bâtiment est un lieu privilégié par les photographes et les joueurs d’airsoft.</p>

				<hr />

				<a href="jeu-ateliers-sncb.php" class="btn-pp btn-rouille">Commencer la partie</a>
				<!-- Ce bouton devra être compté pour la page "partie en cours" -->

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
