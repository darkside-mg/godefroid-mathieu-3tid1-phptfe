<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Q-RBEX</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php include('includes/links.inc.php'); ?>

		<link rel="stylesheet" type="text/css" href="css/slick.css"/>
		
		
	</head>

	<body>

		<div id="sb-site">

			<?php include('includes/header-jeu.inc.php'); ?>


			<div id="container-jeu">
				
				<div id="content" class="navigation-jeu">
					<div class="page-jeu">

						<!-- rajouter div pour padding left right? -->
						<div class="padd-page">

							<h2 class="margtop-h2">Les ateliers de la SNCB</h2>
							<h3>Etape 1</h3>
							<p><span>Coordonnées</span>
							<span>50.468534, 4.862527</span></p>

							<h4>Questions</h4>
							<p><span class="questions">Quel animal ne trouve-t-on pas à l'entrée de la gare de Namur?</span>
							<span>Un lion: A = 4</span>
							<span>Un escargot: A = 8</span>
							<span>Une coquille Saint-Jacques: A = 6</span></p>

							<hr />
							<h3>Etape 2</h3>
							<p><span>Coordonnées</span>
							<span>50.4(A-2)55A1, 4.A3A99A</span></p>

							<h4>Questions</h4>
							<p><span class="questions">Combien y a-t-il de voies ferrées qui traversent la route?</span>
							<span class="quest-suiv">Réponse: nombre = B</span></p>
							<p><span class="questions">Que manquent-ils à ces voies ferrées?</span>
							<span>Des feux de signalisation: C = 5</span>
							<span>Des barrières: C = 3</span>
							<span>Des feux de signalisations et des barrières: C = 7</span></p>

							<hr />
							<h3>Etape 3</h3>
							<p><span>Coordonnées</span>
							<span>50.4(3+C)00(1+B)4, 4.AC3B7C</span></p>

							<h4>Questions</h4>
							<p><span class="questions">Quelle est la couleur principale de ce pont?</span>
							<span>Gris: D = 3</span>
							<span>Bleu: D = 5</span>
							<span>Vert: D = 7</span>
							<span>Rouge: D = 9</span></p>
							<p><span>Traversez le pont et rendez-vous sous celui-ci.</span>
							<span>Une boîte contenant un casse-tête y est caché.</span>
							<span>Résolvez le casse-tête pour obtenir la réponse E.</span></p>

							<hr />
							<h3>Etape finale</h3>
							<p><span>Coordonnées</span>
							<span>50.4(D-E)4(A+B)6, 4.8(E-2)C9B9</span></p>
							<button class="popup-button btn-pp btn-rouille" data-modal="popup" >Loguez votre visite</button>

						</div>
					</div>




					<div class="page-jeu">



						<!--Google Maps -->
						<div id="map-canvas"></div>



						<!-- Ajouter coordonnées -->
						<form method="post" id="ajout-form">

							<div id="bouton-affichage-ajout">Afficher le formulaire de nouvelles coordonnées</div>

							<fieldset>
							<div class="contenu-padd">
								<legend>Ajouter une coordonnée</legend>
								<input type="text" name="nom_etape" placeholder="Nom de l'étape">

								<label for="coord-nord">Nord</label>
								<input id="coord-nord" type="number" name="coord-nord" placeholder="50.000000">
								
								<label for="coord-est">Est</label>
								<input id="coord-est" type="number" name="coord-est" placeholder="4.000000">
								
								<input type="submit" class="btn-pp btn-rouille" value="Ajouter">
							</div><!-- end contenu-padd -->
							</fieldset>
						</form>


					</div>




					<div class="page-jeu">

						<div class="padd-page">

							<h2 class="margtop-h2">Les ateliers de la SNCB</h2>

							<p>Il n'y a aucune photo pour ce jeu.</p>

							<!--<h3>Photographie question 1</h3>
							<img src="#" alt="photo pour répondre à une question" />-->

							<!--
							<p>Il n'y a pas de photo pour cette recherche.</p>
							-->

							<hr />

						</div>

					</div>
				</div>
				
			</div>


			<div class="modal blur-effect" id="popup">
				<div class="popup-content">
					<h2>Localisation finale trouvée?</h2>
					<label class="label-coord-finale" for="coord-nord">Nord</label>
					<input class="coord-finale" id="coord-nord" type="number" name="coord-nord" placeholder="50.000000">
								
					<label class="label-coord-finale" for="coord-est">Est</label>
					<input class="coord-finale" id="coord-est" type="number" name="coord-est" placeholder="4.000000">
								
					<input type="submit" class="btn-pp btn-rouille" id="ajout-coord-finale" value="Ajouter">

					<div class="close" id="exit-coord-finale">Annuler</div>	
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





<!-- GOOGLE MAPS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyUXoSp_wxeVQJX7NiSphlCSpBLFoiaRs">
	/* CONTIENT LA CLE, A NE PAS SUPPRIMER */
</script>

<script src"https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-50.429876,4.613830&radius=500&types=food&name=cruise&key=AIzaSyCyUXoSp_wxeVQJX7NiSphlCSpBLFoiaRs"></script>


<script>
/*
 * When you add a marker using a Place instead of a location, the Maps API
 * will automatically add a 'Save to Google Maps' link to any info window
 * associated with that marker.
 */

	function initialize() {

		var styles = [{
			"featureType": "landscape",
			"elementType": "geometry.fill",
			"stylers": [
				{ "color": "#232323" }
			]
		},{
			"featureType": "water",
			"stylers": [
				{ "color": "#454545" }
			]
		},{
			"featureType": "road",
			"elementType": "geometry",
			"stylers": [
				{ "color": "#FB7D52" }
			]
		},{
			"elementType": "labels",
			"stylers": [
				{ "visibility": "off" },
				{ "color": "#FB7D52" }
			]
		},{
			"elementType": "labels.text.stroke",
			"stylers": [
				{ "color": "#d515ad" },
				{ "visibility": "off" }
			]
		},{
			"featureType": "transit",
			"stylers": [
				{ "color": "#FFCE74" }
			]
		},{
			"featureType": "poi",
			"elementType": "geometry",
			"stylers": [
				{ "visibility": "on" },
				{ "color": "#232323" }
			]
		},{
			"featureType": "poi.park",
			"stylers": [
				{ "color": "#97D17A" }
			]
		}];



		var styledMap = new google.maps.StyledMapType(styles, {name: "Gmap stylée"});


		var mapOptions = {
			center: { lat: 50.468534, lng: 4.862527},
			zoom: 15
		};/* End var mapOptions */




		var map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);/* End var map */




	//   // Try HTML5 geolocation
	//   if(navigator.geolocation) {
	//     navigator.geolocation.getCurrentPosition(function(position) {
	//       var pos = new google.maps.LatLng(position.coords.latitude,
	//                                        position.coords.longitude);

	//       var infowindow = new google.maps.InfoWindow({
	//         map: map,
	//         position: pos,
	//         content: 'Location found using HTML5.'
	//       });

	//       map.setCenter(pos);
	//     }, function() {
	//       handleNoGeolocation(true);
	//     });
	//   } else {
	//     // Browser doesn't support Geolocation
	//     handleNoGeolocation(false);
	//   }
	// }

	// function handleNoGeolocation(errorFlag) {
	//   if (errorFlag) {
	//     var content = 'Error: The Geolocation service failed.';
	//   } else {
	//     var content = 'Error: Your browser doesn\'t support geolocation.';
	//   }

	//   var options = {
	//     map: map,
	//     position: new google.maps.LatLng(60, 105),
	//     content: content
	//   };

	//   var infowindow = new google.maps.InfoWindow(options);
	//   map.setCenter(options.position);
	// }





		map.mapTypes.set('map_style', styledMap);
		102.
		map.setMapTypeId('map_style');

		var marker = new google.maps.Marker({
			map: map,

			icon: {
				url: "img/marker-map.png",
				size: new google.maps.Size(32, 47),
				anchor: new google.maps.Point(16, 47)
			},

			// A Place requires a Place ID or Query string, and a Location.
			place: {

				// ChIJN1t_tDeuEmsRUsoyG83frY4 is the Place ID for Google Sydney
				placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4',
				location: {lat: 50.468534, lng: 4.862527}
			}, /* LA PLACEID EST A MODIFIER, MAIS PAR QUOI? */

			// Attributions help users find your site again.
			attribution: {
				source: 'Google Maps JavaScript API',
				webUrl: 'http://mathieugodefroid.be'
			}
		});/* End var marker */

	

	}/* End function initialize() */

	google.maps.event.addDomListener(window, 'load', initialize);

</script>
	
		
	</body>
</html>
