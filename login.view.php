<!DOCTYPE html>
<html>

	<head>
		<title>Connexion | Q-RBEX</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php include('includes/links.inc.php'); ?>

	</head>

	<body class="page-connexion">

		<div id="container-withpadd">

			<h1>Q-RBEX</h1>

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
						</ol>

						<input type="submit" value="Connexion" id="btn-connect" class="btn-rouille">
					</fieldset>


				</form>

			</div><!-- end bloc-connexion -->


			<a href="inscription.php" class="btn-pp btn-beige">Créer un nouveau compte</a>

		</div><!-- end container -->



		<!-- jQuery -->
		<script src="js/jquery-2.1.3.min.js"></script>

		<!-- HUGRID (PROVISOIRE) -->

		<!--<script src="js/jquery-1.6.2.min.js"></script>-->
		<script src="js/hugrid.js"></script>
		<script src="js/grille.js"></script>

	</body>

</html>