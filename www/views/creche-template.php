<?php
/**
 * Template unique pour toutes les pages de micro-crèches.
 * Les données sont fournies via $crecheData (tableau défini dans configuration.php).
 */
$c = $crecheData;
$email      = htmlspecialchars($c['email'], ENT_QUOTES, 'UTF-8');
$mapKey     = htmlspecialchars($googleMapsKey, ENT_QUOTES, 'UTF-8');

// JSON-LD LocalBusiness / ChildCare pour le SEO
$addrParts = array('@type' => 'PostalAddress', 'streetAddress' => $c['address'], 'addressCountry' => 'FR');
if (preg_match('/^(.*),\s*(\d{5})\s+(.+)$/', $c['address'], $addrMatch)) {
    $addrParts = array(
        '@type'           => 'PostalAddress',
        'streetAddress'   => trim($addrMatch[1]),
        'postalCode'      => $addrMatch[2],
        'addressLocality' => trim($addrMatch[3]),
        'addressCountry'  => 'FR'
    );
}
$ldJson = array(
    '@context'      => 'https://schema.org',
    '@type'         => 'ChildCare',
    'name'          => 'Funny Crèche - ' . $c['map_name'],
    'url'           => 'https://www.funny-creche.fr/' . $mode . '.html',
    'telephone'     => $c['phone_display'],
    'email'         => $c['email'],
    'address'       => $addrParts,
    'geo'           => array(
        '@type'     => 'GeoCoordinates',
        'latitude'  => $c['map_lat'],
        'longitude' => $c['map_lng']
    ),
    'image'         => 'https://www.funny-creche.fr/' . $c['banner_image'],
    'openingHours'  => 'Mo-Fr 07:30-18:30',
    'priceRange'    => 'EUR'
);
?>
<script type="application/ld+json">
<?php echo json_encode($ldJson, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>

<!-- Banner start -->
<div class="banner banner-creche" id="banner">
    <div id="bannerCarousel">
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100"
                     src="<?php echo htmlspecialchars($c['banner_image'], ENT_QUOTES, 'UTF-8'); ?>"
                     alt="Funny Crèche - <?php echo htmlspecialchars($c['banner_title'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h1><?php echo htmlspecialchars($c['banner_title'], ENT_QUOTES, 'UTF-8'); ?></h1>
                            <p><?php echo htmlspecialchars($c['banner_address'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <a href="tel:<?php echo htmlspecialchars($c['banner_phone_href'], ENT_QUOTES, 'UTF-8'); ?>"
                               class="btn btn-lg btn-white-lg-outline">
                                <i class="fa fa-phone"></i>
                                <?php echo htmlspecialchars($c['banner_phone_text'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                            <a href="mailto:<?php echo $email; ?>?Subject=Demande%20d%27informations"
                               class="btn btn-lg btn-white-lg-outline">
                                <i class="fa fa-envelope"></i> <?php echo $email; ?>
                            </a>
                            <br/><br/>
                            <a href="contact.html?s=<?php echo $email; ?>"
                               class="btn btn-lg btn-theme">
                                <i class="fa fa-sign-in"></i> Inscrire votre enfant
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->

<!-- Contenu crèche start -->
<div class="featured-properties content-area">
    <div class="container">

        <div class="main-title">
            <h2><?php echo htmlspecialchars($c['page_h1'], ENT_QUOTES, 'UTF-8'); ?></h2>
        </div>

        <h3 class="colorpink"><?php echo htmlspecialchars($c['page_h2'], ENT_QUOTES, 'UTF-8'); ?></h3>

        <p><?php echo $c['description']; ?></p>

        <h3>Et si on préparait la prochaine rentrée&nbsp;?</h3>
        <p>
            Notre directrice saura se rendre disponible pour tous les renseignements nécessaires
            avant toute préinscription et visite de la structure.<br/><br/>
            Contact&nbsp;: <b class="colorpink"><?php echo htmlspecialchars($c['contact_person'], ENT_QUOTES, 'UTF-8'); ?></b><br/>
            Téléphone&nbsp;: <a href="tel:<?php echo htmlspecialchars($c['phone_href'], ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($c['phone_display'], ENT_QUOTES, 'UTF-8'); ?>
            </a><br/>
            Email&nbsp;: <a href="mailto:<?php echo $email; ?>?Subject=Demande%20de%20renseignements">
                <?php echo $email; ?>
            </a><br/>
            Adresse&nbsp;: <?php echo htmlspecialchars($c['address'], ENT_QUOTES, 'UTF-8'); ?>
        </p>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="pricing-1 plan">
                    <div class="plan-header">
                        <h5>Exemple tarifaire pour <?php echo htmlspecialchars($c['pricing_city'], ENT_QUOTES, 'UTF-8'); ?> <sup>*</sup></h5>
                        <p>Adhésion annuelle</p>
                        <br/>
                        <div class="plan-price">
                            <?php echo htmlspecialchars($c['pricing_adhesion'], ENT_QUOTES, 'UTF-8'); ?><sup>€</sup><span>/an</span>
                        </div>
                        <br/><br/>
                        <h6 class="colorpink">
                            <i class="fa fa-info-circle"></i> Aide de la CAF et crédit d'impôt
                        </h6>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-globe"></i>Nombre de jours : <?php echo htmlspecialchars($c['pricing_jours'], ENT_QUOTES, 'UTF-8'); ?></li>
                            <li><i class="fa fa-thumbs-up"></i>Nombre d'heures : <?php echo htmlspecialchars($c['pricing_heures'], ENT_QUOTES, 'UTF-8'); ?></li>
                            <li><i class="fa fa-signal"></i>Exemple tarif horaire : <?php echo htmlspecialchars($c['pricing_tarif'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;€</li>
                            <li><i class="flaticon-people"></i>Total hebdomadaire : <?php echo htmlspecialchars($c['pricing_hebdo'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;€</li>
                            <li><i class="fa fa-star"></i>Total mensuel : <?php echo $c['pricing_mensuel']; ?>&nbsp;€</li>
                            <li><i class="fa fa-rocket"></i>Aide de la CAF* : <?php echo htmlspecialchars($c['pricing_caf'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;€</li>
                            <li><i class="fa fa-server"></i>Reste à charge : <?php echo htmlspecialchars($c['pricing_reste'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;€</li>
                            <li><strong>Reste à charge toutes aides déduites : <?php echo htmlspecialchars($c['pricing_reste_aides'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;€</strong></li>
                            <li><em>* Tarif indicatif susceptible d'être révisé.</em></li>
                        </ul>
                    </div>
                </div>
                <p class="pricing-disclaimer">
                    * Déduction fiscale limitée à 3&nbsp;500&nbsp;€ par enfant gardé donnant droit à un avantage fiscal
                    plafonné à 1&nbsp;750&nbsp;€ par enfant (environ 145&nbsp;€/mois).
                </p>
                <p><i>* Revenus foyer N-2 avec 2 enfants compris entre 24&nbsp;735 et 54&nbsp;968&nbsp;€</i></p>
                <div class="plan-button text-center">
                    <a href="contact.html?s=<?php echo $email; ?>"
                       class="btn btn-outline pricing-btn">
                        <i class="fa fa-sign-in"></i> Inscrire mon enfant
                    </a>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>

    </div>
</div>
<!-- Contenu crèche end -->

<!-- Google map start -->
<div class="section">
    <div class="map">
        <div id="map" class="contact-map"></div>
    </div>
</div>
<!-- Google map end -->

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $mapKey; ?>"></script>
<script>
(function () {
    var lat  = <?php echo (float)$c['map_lat']; ?>;
    var lng  = <?php echo (float)$c['map_lng']; ?>;
    var zoom = <?php echo (int)$c['map_zoom']; ?>;
    var name    = <?php echo json_encode($c['map_name']); ?>;
    var address = <?php echo json_encode($c['map_address']); ?>;
    var phone   = <?php echo json_encode($c['map_phone']); ?>;
    var email   = <?php echo json_encode($c['email']); ?>;

    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: zoom,
        scrollwheel: false
    };
    var map        = new google.maps.Map(document.getElementById('map'), mapOptions);
    var infoWindow = new google.maps.InfoWindow();
    var marker     = new google.maps.Marker({ position: new google.maps.LatLng(lat, lng), map: map });

    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.setContent(
            "<div class='map-properties contact-map-content'>" +
            "<div class='map-content'>" +
            "<strong>" + name + "</strong>" +
            "<p class='address'>" + address + "</p>" +
            "<ul class='map-properties-list'>" +
            "<li><i class='flaticon-phone'></i> " + phone + "</li>" +
            "<li><i class='flaticon-mail'></i> " + email + "</li>" +
            "</ul></div></div>"
        );
        infoWindow.open(map, marker);
    });
}());
</script>
