
<!-- Banner start -->
<div class="banner banner-creche" id="banner">
    <div id="bannerCarousole" >
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100" src="img/creche-saint-loup.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h1>FUNNY Crèche - SAINT-LOUP</h1>
                            <p>
							2 rue Fleurant - 71350 St Loup-Géanges
                            </p>
                            <a href="tel:0984346053" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-phone"></i> Mme. Pividori 09.50.67.33.86</a>
                            <a href="mailto:contact.saintloup@funny-creche.fr?Subject=Demande d'informations" class="btn btn-lg btn-white-lg-outline"><i class="fa fa-envelope"></i> contact.saintloup@funny-creche.fr</a>
                        <br/><br/>
							<a href="contact.html?s=contact.saintloup@funny-creche.fr" class="btn btn-lg btn-theme"><i class="fa fa-sign-in"></i> Inscrire votre enfant</a>

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
            <h1>La micro-crèche de SAINT-LOUP</h1>
        </div>

            <h2 class="colorpink">
Le 8 mars 2021, Funny crèche ouvrait les portes d'une nouvelle structure dans la commune de St Loup-Géanges.

</h2>

            <p>Située à proximité du groupe scolaire, l'espace autrefois dédié à la pharmacie a été complètement repensé pour accueillir les plus petits jusqu'à leur entrée en maternelle ou en accueil periscolaire jusqu'à <b>6 ans</b> !<br/>
Une salle de vie adaptée, des espaces dédiés ainsi qu'un extérieur mis à disposition par la Mairie, permettront à vos petits-bouts de s'éveiller et s'épanouir pleinement en toute saison.<br/>

<br>

                L'équipe pédagogique saura accompagner en toute sécurité, avec bienveillance et dans le respect de tous les protocoles, les enfants et les familles de la commune et des communes avoisinantes..

<br>
<h2> Et si on préparait la prochaine rentrée ?</h2>

<!-- 6 berceaux restent à pourvoir pour cette rentrée 2023, n'hésitez pas à nous contacter.<br/> -->
<br/>
Notre Directrice saura se rendre disponible pour tous les renseignements nécessaires avant toute préinscription et visite de la structure.<br/><br/>

Contact :   <b class="colorpink">Mme Pividori</b><br/> 
Téléphone : <a href="tel:0984346053">09 84 34 60 53</a>  <br/>
Email : <a href="mailto: contact.saintloup@funny-creche.fr?Subject=Demande de renseignements crèche Saint-Loup"> contact.saintloup@funny-creche.fr</a><br/>
Adresse : 2 Rue Fleurant, 71350 Saint-Loup-Géanges<br/>
            </p>
            
            <div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="pricing-1 plan ">
                    <div class="plan-header">
                        <h5>Exemple tarifaire pour Saint-loup <sup>*</sup></h5>
                        <p>Adhésion annuelle </p>
                        <div class="plan-price">50<sup>€</sup><span>/an</span> </div>
                        
                        <h6 style="color:#e386d7"><i class="fa fa-info-circle"></i> Aide de la CAF et crédit d'impot</h6>
                    </div>
                    <div class="plan-list">
                    <ul>
                            <li><i class="fa fa-globe"></i>Nombre de jours : 4</li>
                            <li><i class="fa fa-thumbs-up"></i>Nombre d'heures : 9</li>
                            <li><i class="fa fa-signal"></i>Exemple tarif horaire : 8,80 €</li>
                            <li><i class="flaticon-people"></i>Total hebdomadaire : 316,80 €</li>
                            <li><i class="fa fa-star"></i>Total mensuel : 1240,80 €</li>
                            <li><i class="fa fa-rocket"></i>Aide de la CAF* : 797,60€</li>
                            <li><i class="fa fa-server"></i>Reste à charge : 443,20 €</li>
							<li><strong>Reste à charge toutes aides déduites : 297,37 €</strong></li>
                         <li><em>* Tarif indicatif susceptible d'être révisé.</em></li>
                        </ul>
					
                    </div>
                       
                </div>
					<p style="padding:10px;text-align: justify;">* Déduction fiscale limitée à 3500 € par enfant gardé donnant droit à un avantage fiscal plafonné à 1750 € par enfant(environ 145€/mois).
					<br/>
                    <p><i>* Revenus foyer N-2 avec 2 enfants compris entre 24 735 et 54 968 €</i></p>

						<div class="plan-button text-center">
                            <a href="contact.html?s=contact.saintloup@funny-creche.fr" class="btn btn-outline pricing-btn"><i class="fa fa-sign-in"></i> Inscrire mon enfant</a>
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
        var defaultLat = 46.945275;
        var defaultLng =  4.907867;
        var mapOptions = {
            center: new google.maps.LatLng(defaultLat, defaultLng),
            zoom: 16,
            scrollwheel: false,
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng(46.9452757, 4.9078675,17,12);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        (function (marker) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("" +
                    "<div class='map-properties contact-map-content'>" +
                    "<div class='map-content'>" +
                    "<strong>Funny Crèche - SAINT-LOUP</strong>" +
                    "<p class='address'>2 rue Fleurant, 71350 St Loup-Géanges</p>" +
                    "<ul class='map-properties-list'> " +
                    "<li><i class='flaticon-phone'></i>  09.84.34.60.53</li> " +
                    "<li><i class='flaticon-phone'></i> contact.saintloup@funny-creche.fr</li> " +
                    "</ul>" +
                    "</div>" +
                    "</div>");
                infoWindow.open(map, marker);
            });
        })(marker);
    }
    LoadMap();
</script>