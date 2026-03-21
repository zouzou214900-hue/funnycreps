
<?php 
if($_POST) {

    $errors = [];

    // AJOUT : Validation RGPD
    if (!isset($_POST['rgpd'])) {
        $errors[] = "Vous devez accepter la politique de confidentialité pour envoyer votre demande.";
    }

    if (count($errors) < 1) {
        foreach($_POST as $cle => $val) {
            if($cle == 'rgpd') continue; // Ne pas inclure la case RGPD dans le mail
            $cle = str_replace("_"," ",$cle);
            $cle = ucfirst($cle);
            $body .= "<strong>$cle</strong> : $val<br/>";
        }

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        $headers[] = 'From: '.$_POST["email"];
        $headers[] = 'Reply-To: '.$_POST["email"];

        $mailer = mail("n.michaud@funny-creche.fr, c.chavet@funny-creche.fr", "Demande de recrutement depuis le site Funny crèche", $body, implode("\r\n", $headers));

        $message = "<div class='col-md-6 offset-lg-3 alert alert-success alert-dismissible fade show' role='alert'>
            <strong style='color:#000'>Votre demande a bien été prise en compte.</strong><br/> Vous serez recontacté dans les meilleurs délais.
            <button type='button' class='close' data-dismiss='alert' aria-label='Fermer'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
    } else {
        $message = "<div class='col-md-6 offset-lg-3 alert alert-danger alert-dismissible fade show' role='alert'>
            <ul>";
        foreach($errors as $error) {
            $message .= "<li>" . $error . "</li>";
        }
        $message .= "</ul>
            <button type='button' class='close' data-dismiss='alert' aria-label='Fermer'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
    }

} else {
    $message = '';
}
?>
<!-- Banner start -->
<div class="banner banner-contact" id="banner" style="margin-top:50px;">
    <div id="bannerCarousole">
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100" src="img/recrutement.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <br/>
                            <br/>
                            <h1>Nos crèches<br/>recrutent</h1>
                            <p>
                                Des micro-crèches privées présentes à Dijon, Plombières-lès-Dijon, Varois-et-Chaignot, Demigny, Saint-Loup, Beaune, Noisy-le-Grand, Neuilly-sur-Marne, Nuits-Saint-Georges et Mont-de-Marsan
                            </p>
                        </div>

                        <div class="main-title text-center">
                            <h4>N'hésitez pas à postuler sur le formulaire ci-dessous.</h4>
                        </div>

                        <form action="recrutement.html" method="POST">
                            <?php echo $message; ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group name">
                                                <input type="text" required name="nom_prenom" class="form-control" placeholder="Votre nom et prénom">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group email">
                                                <input type="email" required name="email" class="form-control" placeholder="Votre Email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group number">
                                                <input type="text" required name="telephone" class="form-control" placeholder="Votre numéro de téléphone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group number">
                                                <select name="structure" required class="form-control">
                                                    <option value="">--Sélectionnez une micro-crèche --</option>
                                                    <optgroup label="Structures existantes">
                                                        <option value="contact.dijon-eiffel@funny-creche.fr">DIJON - Eiffel</option>
                                                        <option value="contact.dijon-cazotte@funny-creche.fr">DIJON - Cazotte</option>
                                                        <option value="contact.plombieres@funny-creche.fr">Plombières-lès-Dijon</option>
                                                        <option value="contact.varois@funny-creche.fr">Varois-et-Chaignot</option>
                                                        <option value="contact.demigny@funny-creche.fr">DEMIGNY</option>
                                                        <option value="contact.saintloup@funny-creche.fr">Saint-loup Géanges</option>
                                                        <option value="contact.beaune-centre@funny-creche.fr">Beaune - Tonneliers</option>
                                                        <option value="contact.beaune-verdun@funny-creche.fr">Beaune - Verdun</option>
                                                        <option value="contact.noisylegrand@funny-creche.fr">Noisy le grand</option>
                                                        <option value="contact.neuilly@funny-creche.fr">NEUILLY SUR MARNE</option>
                                                        <option value="contact.mont-de-marsan@funny-creche.fr">Mont-de-Marsan</option>
                                                        <option value="contact.nuits@funny-creche.fr">Nuits-Saint-Georges</option>
                                                    </optgroup>
                                                    <optgroup label="Prochaine ouverture">
                                                        <option value="n.michaud@funny-creche.fr">DAIX (ouverture septembre 2026)</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group number">
                                                <select name="type_emploi" required class="form-control">
                                                    <option value="">--Sélectionnez un type d'emploi--</option>
                                                    <option value="CAP Petite Enfance">CAP Petite Enfance</option>
                                                    <option value="Auxiliaire de puériculture">Auxiliaire de puériculture</option>
                                                    <option value="Educatrice de Jeunes enfants">Educatrice de Jeunes enfants</option>
                                                    <option value="Stagiaire">Stagiaire</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group message">
                                                <textarea required class="form-control" name="message" rows='5' placeholder="Votre message"></textarea>
                                            </div>
                                        </div>
                                        <!-- AJOUT : Case RGPD -->
                                        <div class="col-md-12" style="margin-bottom: 15px; text-align: left;">
                                            <div class="form-check">
                                                <input type="checkbox" required name="rgpd" id="rgpd" class="form-check-input">
                                                <label class="form-check-label" for="rgpd" style="font-size:13px; color:#FFF;">
                                                    J'accepte que mes données personnelles soient utilisées pour traiter ma candidature, conformément à la <a href="mentions-legales.html" target="_blank" style="color:#e386d7;">politique de confidentialité</a> de Funny Crèche.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="send-btn">
                                                <button type="submit" class="btn btn-lg btn-theme">Envoyer ma demande</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->

<!-- Services start -->
<div class="featured-properties content-area">
    <div class="container">
        <div class="main-title">
            <h1>Les différents types de poste à pourvoir</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="service-info">
                    <h3>CAP Petite Enfance</h3>
                    <p>Titulaire d'un diplôme C.A.P. Petite Enfance, vous gérerez un groupe de 10 enfants âgés de 4 mois à 3 ans en travaillant au sein d'une équipe de trois personnes.<br/><br/>
                    Vous serez en contact quotidien avec les enfants et leurs parents afin d'assurer un suivi entre la maison et la crèche.<br/>
                    Vous réaliserez les soins d'hygiène quotidiens des enfants et construirez une relation de confiance.<br/>
                    Vous aiderez les enfants à acquérir une autonomie et à découvrir ses propres talents.<br/><br/></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="service-info">
                    <h3>Auxiliaire de puériculture</h3>
                    <p>Titulaire d'un diplôme d'auxiliaire de puériculture, vous gérerez un groupe de 10 enfants âgés de 4 mois à 3 ans en travaillant au sein d'une équipe de trois personnes.<br/>
                    Vous veillerez au respect du projet pédagogique et assurerez un suivi personnalisé et individuel avec les enfants et les parents.<br/>
                    Vous assurerez la prise des repas des enfants et la gestion des biberons, en respectant les protocoles établis afin de répondre au mieux au rythme de chaque enfant.<br/>
                    Vous accompagnerez les enfants dans leur développement physique, moteur et affectif.</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="service-info">
                    <h3>Educatrice de Jeunes enfants</h3>
                    <p>Titulaire d'un diplôme d'EJE, vous aurez la responsabilité d'un groupe de 10 enfants, encadrerez et animerez une équipe de trois personnes.<br/><br/>
                    Vous participerez à la vie quotidienne de la micro-crèche et veillerez au respect et à l'application du projet pédagogique auprès des enfants.<br/><br/>
                    Vous serez en relation directe et étroite avec les familles et assurerez également la gestion administrative de la structure.<br/><br/></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="service-info">
                    <h3>Stagiaires</h3>
                    <p>En cours de formation aux métiers de la petite enfance, nos structures sont en mesure de vous accueillir pour vos stages professionnels, dans la limite de nos capacités d'encadrement.<br/><br/></p>
                </div>
            </div>
        </div>
    </div>
</div>
