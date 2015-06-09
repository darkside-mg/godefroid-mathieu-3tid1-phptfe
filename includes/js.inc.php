<!-- JQUERY -->
<script src="js/jquery-2.1.3.min.js"></script>








<!-- SLIDEBARS -->
<script src="js/slidebars.js"></script>

<script>
	(function($) {
		$(document).ready(function() {
			$.slidebars();
		});
	}) (jQuery);
</script>








<!-- POP-UP -->
<script src="js/popup.js"></script>








<!-- 
////////////////////////////////////////////////////
///////////// PARTIE JEU
////////////////////////////////////////////////////
 -->



<!-- ADAPTER HAUTEUR CARTE AU SUPPORT -->
<script>
	var x = $( window ).height();
    var y = x-88+"px";
	$('#map-canvas').height(y);
</script>






<!-- AFFICHAGE FORMULAIRE "AJOUT COORDONNEE SUR CARTE" -->
<script>
	$(document).ready(function() {
		var affichage = false;
		$('#bouton-affichage-ajout').click(function() {

			if($('#ajout-form').css({ bottom:'-320px'}) && affichage == false){
				$('#ajout-form').animate({
					bottom: '0px'	
				});
				affichage = true;

			} else {
					$('#ajout-form').animate({
						bottom: '-320px'
					});
				affichage = false;				
			}
		});
					
	});
</script>
		










<!-- SLICK (NAVIGATION JEU) -->
<script type="text/javascript" src="js/slick.min.js"></script>

<script>
	$(document).ready(function(){
		$('.navigation-jeu').slick({
			dots: true,
			infinite: false,
			speed: 600,
			slidesToShow: 1,
			adaptiveHeight: true,
			draggable: false,
			swipe: true,
			initialSlide: 0,
			arrows: false
		});
	});
</script>




