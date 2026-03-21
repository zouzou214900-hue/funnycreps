<!-- Banner start -->
<div class="banner banner-creche" id="banner">
    <div id="bannerCarousole" >
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100" src="img/neuilly.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h1>FUNNY Crèche - NEUILLY SUR MARNE</h1>
                            <p>
				7 rue Paul Langevin - 93330 Neuilly-sur-marne
                            </p>
                            <a href="tel:0950572236" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-phone"></i> Mme Cylenn MARTIN - 09.50.57.22.36</a>
                            <a href="mailto:contact.neuilly@funny-creche.fr?Subject=Demande d'informations" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-envelope"></i> contact.neuilly@funny-creche.fr</a>
                        <br/><br/>
							<a href="contact.html?s=contact.neuilly@funny-creche.fr" class="btn btn-lg btn-theme"><i class="fa fa-sign-in"></i> Inscrire votre enfant</a>

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
            <h1>La micro-crèche de Neuilly sur marne</h1>
        </div>

            <h2 class="colorpink">Funny crèche à Neuilly sur Marne</h2>

            <p>
                La structure a ouvert ses portes à l’été 2018 dans un <b class="colorpink">espace complètement modernisé
                et adaptée à vos petits bouts</b>. Un bel espace extérieur sécurisé de 40m² lui a été rajouté pour les belles journées.<br><br>

                Située dans la zone industrielle des Chanoux à Neuilly sur Marne, à 6 minutes en voiture du RER A de Neuilly plaisance et desservie par les Bus, cette structure pourra accueillir
				<b class="colorpink">jusqu’à 10 enfants simultanément</b> dans un <b class="colorpink">cadre apaisant, dédié à leur éveil</b>. <br>
                Destinée aux enfants de la commune et aux enfants des salariés de Neuilly-sur-marne et ses alentours, la
                micro-crèche est ouverte de 8.00 à 18.30 du lundi au vendredi.<br><br>

               La CAF et le Conseil Général de Seine St Denis ont validé et ont participé financièrement à ce projet et permis une nouvelle offre de garde d’enfants sur la commune.<br><br>

            </p>

            <h2 class="colorpink after-none">Et si on préparait la prochaine rentrée&nbsp;? </h2><br>

             <!-- ?? berceaux restent à pourvoir pour cette rentrée 2023, n'hésitez pas à nous contacter. -->

Notre Directrice saura se rendre disponible pour tous les renseignements nécessaires avant toute préinscriptions et visite de la structure.<br/>
<br/>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="pricing-1 plan ">
                    <div class="plan-header">
                        <h5>Exemple tarifaire pour Neuilly sur Marne <sup>*</sup</h5>
                        <p>Adhésion annuelle </p>
                        <br/>
                        <div class="plan-price">80<sup>€</sup><span>/an</span> </div>
						<br/><br/>
						<h6 style="color:#e386d7"><i class="fa fa-info-circle"></i> Aide de la CAF et crédit d'impot</h6>
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
                    <p><i>* Revenus foyer N-2 avec 2 enfants compris entre 24 735 et 54 968 €</i></p>
						<div class="plan-button text-center">
                            <a href="contact.html?s=contact.neuilly@funny-creche.fr" class="btn btn-outline pricing-btn"><i class="fa fa-sign-in"></i> Inscrire mon enfant</a>
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
        var defaultLat = 48.868562;
        var defaultLng =  2.5198804;
        var mapOptions = {
            center: new google.maps.LatLng(defaultLat, defaultLng),
            zoom: 16,
            scrollwheel: false,
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng(48.868562, 2.5198804,12);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        (function (marker) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("" +
                    "<div class='map-properties contact-map-content'>" +
                    "<div class='map-content'>" +
                    "<strong>Funny Crèche - NEUILLY SUR MARNE</strong>" +
                    "<p class='address'>7 rue Paul Langevin, 93330 Neuilly-sur-marne </p>" +
                    "<ul class='map-properties-list'> " +
                    "<li><i class='flaticon-phone'></i>  07.60.12.30.00</li> " +
                    "<li><i class='flaticon-phone'></i> contact.neuilly@funny-creche.fr</li> " +
                    "</ul>" +
                    "</div>" +
                    "</div>");
                infoWindow.open(map, marker);
            });
        })(marker);
    }
    LoadMap();
</script>