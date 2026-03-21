
<!-- Banner start -->
<div class="banner banner-creche" id="banner">
    <div id="bannerCarousole" >
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100" src="img/IMG_2030.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h1>FUNNY Crèche - NOISY LE GRAND</h1>
                            <p>
							15 rue de l'université, 93160 Noisy-le-grand
                            </p>
                            <a href="tel:0951732086" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-phone"></i> Mme MARTIN Cylenn : 09.85.10.67.70</a>
                            <a href="mailto:contact.noisylegrand@funny-creche.fr?Subject=Demande d'informations" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-envelope"></i> contact.noisylegrand@funny-creche.fr</a>
                        <br/><br/>
							<a href="contact.html?s=contact.noisylegrand@funny-creche.fr" class="btn btn-lg btn-theme"><i class="fa fa-sign-in"></i> Inscrire votre enfant</a>

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
            <h1>La micro-crèche de Noisy-le-grand</h1>
        </div>

            <h2 class="colorpink">Funny crèche à Noisy-le-grand</h2>

            <p>
                La structure a ouvert ses portes à l’été 2021 dans un <b class="colorpink">espace de 200m² complètement modernisé et adaptée à vos petits bouts</b>.<br/>
                Un bel espace extérieur sécurisé de 40m² lui a été rajouté pour les belles journées.
              
                <br/><br/>
                Située dans le quartier du pavé neuf, à 4 minutes à pied du RER A de Mont d'est et de la gare routière, cette structure pourra accueillir 
                <b class="colorpink">jusqu’à 12 enfants simultanément</b> dans un <b class="colorpink">cadre apaisant, dédié à leur éveil</b>.
                <br/>Destinée aux enfants de la commune et aux enfants des salariés de Noisy le Grand et ses alentours, la micro-crèche est ouverte de 8.00 à 18.30 du lundi au vendredi.
<br/><br/>
                La CAF et le Conseil Général de Seine St Denis ont validé et permis une nouvelle offre de garde d’enfants sur la commune.
<br/><br/>

               <h2> Et si on préparait la prochaine rentrée ?</h2>
             1 berceau reste à pourvoir pour cette rentrée 2023, n'hésitez pas à nous contacter.<br/> <br/> 
Notre Directrice et toute son équipe de professionnelles est disponible pour tous renseignements, préinscriptions, et visites des locaux.<br/>
Contact :   <b class="colorpink">Mme MARTIN Cylenn</b><br/> 
Téléphone : <a href="tel:0985106770">09 85 10 67 70</a>  <br/>
Email : <a href="mailto:contact.noisylegrand@funny-creche.fr?Subject=Demande de renseignements crèche Noisy le grand">contact.noisylegrand@funny-creche.fr</a><br/>
Adresse ; 15 rue de l'université, 93160 Noisy-le-grand<br/>
                
            </p>


			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="pricing-1 plan ">
                    <div class="plan-header">
                        <h5>Exemple tarifaire pour Noisy-le-grand<sup>*</sup</h5>
                        <p>Adhésion annuelle </p>
                        <br/>
                        <div class="plan-price">80<sup>€</sup><span>/an</span> </div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-globe"></i>Nombre de jours : 4</li>
                            <li><i class="fa fa-thumbs-up"></i>Nombre d'heures : 9</li>
                            <li><i class="fa fa-signal"></i>Exemple tarif horaire : 9,20 €</li>
                            <li><i class="flaticon-people"></i>Total hebdomadaire : 331,20 €</li>
                            <li><i class="fa fa-star"></i>Total mensuel : 1297,20 €</li>
                            <li><i class="fa fa-rocket"></i>Aide de la CAF* : 797,60€</li>
                            <li><i class="fa fa-server"></i>Reste à charge : 499,60 €</li>
							<li><strong>Reste à charge toutes aides déduites : 353,77 €</strong></li>
                         <li><em>* Tarif indicatif susceptible d'être révisé.</em></li>
                        </ul>

                    </div>
                </div>
					<p style="padding:10px;text-align: justify;">* Déduction fiscale limitée à 3500 € par enfant gardé donnant droit à un avantage fiscal plafonné à 1750 € par enfant(environ 145€/mois).
					</p>
                    <p><i>* Revenus foyer N-2 avec 2 enfants compris entre 24 735 et 54 968 €</i></p>
						<div class="plan-button text-center">
                            <a href="contact.html?s=contact.noisylegrand@funny-creche.fr" class="btn btn-outline pricing-btn"><i class="fa fa-sign-in"></i> Inscrire mon enfant</a>
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
        var defaultLat = 48.8373831;
        var defaultLng =  2.5502371;
        var mapOptions = {
            center: new google.maps.LatLng(defaultLat, defaultLng),
            zoom: 16,
            scrollwheel: false,
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng(48.8373831, 2.5502371,12);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        (function (marker) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("" +
                    "<div class='map-properties contact-map-content'>" +
                    "<div class='map-content'>" +
                    "<strong>Funny Crèche - NOISY LE GRAND </strong>" +
                    "<p class='address'>15 Rue de l'Université, 93160 Noisy-le-Grand </p>" +
                    "<ul class='map-properties-list'> " +
                    "<li><i class='flaticon-phone'></i>  09.85.10.67.70</li> " +
                    "<li><i class='flaticon-phone'></i> contact.noisylegrand@funny-creche.fr</li> " +
                    "</ul>" +
                    "</div>" +
                    "</div>");
                infoWindow.open(map, marker);
            });
        })(marker);
    }
    LoadMap();
</script>