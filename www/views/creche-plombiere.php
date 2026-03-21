
<!-- Banner start -->
<div class="banner banner-creche" id="banner">
    <div id="bannerCarousole" >
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100" src="img/plombieres-1.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h1>FUNNY Crèche <br/> PLOMBIERES-LES-DIJON
                            </h1>
                            <p>
							17 rue Albert Rémy - 21370 Plombières-lès-Dijon
                            </p>
                            <a href="tel:0984537015" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-phone"></i> Mme. Fournil 09.84.53.70.15</a>
                            <a href="mailto:contact.plombieres@funny-creche.fr?Subject=Demande d'informations" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-envelope"></i> contact.plombieres@funny-creche.fr</a>
                        <br/><br/>
							<a href="contact.html?s=contact.plombieres@funny-creche.fr" class="btn btn-lg btn-theme"><i class="fa fa-sign-in"></i> Inscrire votre enfant</a>

						</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Banner end -->



<!-- Featured Properties start -->
<div class="featured-properties content-area">

    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>La micro-crèche de Plombières-lès-Dijon</h1>
        </div>

            <h2 class="colorpink">Funny crèche à Plombières-lès-Dijon</h2>

            <p>La structure&nbsp;Funny crèche&nbsp;de Plombières-lès-Dijon se situe à l'entrée du village, à deux pas de la Lino dijonnaise.<br>

            
                La micro crèche s’étend sur <b class="colorpink">146 M²</b> offrant à vos bout’choux, <b class="colorpink">confort
                et sécurité</b>, dans un espace qui leur est totalement dédié.<br>
                <!-- Un <b class="colorpink">joli espace extérieur leur est totalement destiné</b> avec jeux et espace jardinage.<br><br> -->


                Votre funny creche peut accueillir <b class="colorpink">jusqu'à 12 enfants simultanément</b>.<br/>
             

                <h2> Et si on préparait la prochaine rentrée ?</h2>

               <br/>
Notre Directrice saura se rendre disponible pour tous les renseignements nécessaires avant toute préinscriptions et visite de la structure.<br/>
Contact :   <b class="colorpink">Mme Fournil</b><br/> 
Téléphone : <a href="tel:0984537015">09 84 53 70 15</a>  <br/>
Email : <a href="mailto:contact.plombieres@funny-creche.fr?Subject=Demande de renseignements crèche Dijon - plombiere">contact.plombieres@funny-creche.fr</a><br/>
Adresse : 17 rue Albert Rémy - 21370 Plombières-lès-Dijon<br/>
            </p>


			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="pricing-1 plan ">
                    <div class="plan-header">
                        <h5>Exemple tarifaire pour Plombières-lès-Dijon <sup>*</sup</h5>
                        <p>Adhésion annuelle </p>
                        <br/>
                        <div class="plan-price">50<sup>€</sup><span>/an</span> </div>
                        <br/><br/>
                        <h6 style="color:#e386d7"><i class="fa fa-info-circle"></i> Aide de la CAF et crédit d'impot</h6>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-globe"></i>Nombre de jours : 4</li>
                            <li><i class="fa fa-thumbs-up"></i>Nombre d'heures : 9</li>
                            <li><i class="fa fa-signal"></i>Exemple tarif horaire : 9 €</li>
                            <li><i class="flaticon-people"></i>Total hebdomadaire : 324 €</li>
                            <li><i class="fa fa-star"></i>Total mensuel : 1269 €</li>
                            <li><i class="fa fa-rocket"></i>Aide de la CAF* : 797,60€</li>
                            <li><i class="fa fa-server"></i>Reste à charge : 471,40 €</li>
							<li><strong>Reste à charge toutes aides déduites : 325,57 €</strong></li>
                         <li><em>* Tarif indicatif susceptible d'être révisé.</em></li>
                        </ul>

                    </div>
                </div>
					<p style="padding:10px;text-align: justify;">* Déduction fiscale limitée à 3500 € par enfant gardé donnant droit à un avantage fiscal plafonné à 1750 € par enfant(environ 145€/mois).
					</p>
                    <p><i>* Revenus foyer N-2 avec 2 enfants compris entre 24 735 et 54 968 €</i></p>
						<div class="plan-button text-center">
                            <a href="contact.html?s=contact.plombieres@funny-creche.fr" class="btn btn-outline pricing-btn"><i class="fa fa-sign-in"></i> Inscrire mon enfant</a>
                        </div>
				</div>
				<div class="col-lg-3"></div>
			</div>


    </div>
</div>

<!-- Google map start -->
<div class="section">
    <div class="map">
        <div id="map" class="contact-map"></div>
    </div>
</div>
<!-- Google map end -->

<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjj8go02iQwWjo6Q-DlMgb3YsP0DNWFV4"></script>
<script>
    function LoadMap(propertes) {
        var defaultLat = 47.33908899935852;
        var defaultLng =  4.975428993336578;
        var mapOptions = {
            center: new google.maps.LatLng(defaultLat, defaultLng),
            zoom: 16,
            scrollwheel: false,
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng(47.33908899935852, 4.975428993336578);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        (function (marker) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("" +
                    "<div class='map-properties contact-map-content'>" +
                    "<div class='map-content'>" +
                    "<strong>Funny Crèche - Plombières-lès-Dijon </strong>" +
                    "<p class='address'>17 rue Albert Remy - 21370 Plombières-lès-Dijon</p>" +
                    "<ul class='map-properties-list'> " +
                    "<li><i class='flaticon-phone'></i>  09.84.53.70.15</li> " +
                    "<li><i class='flaticon-phone'></i> contact.plombieres@funny-creche.fr</li> " +
                    "</ul>" +
                    "</div>" +
                    "</div>");
                infoWindow.open(map, marker);
            });
        })(marker);
    }
    LoadMap();
</script>