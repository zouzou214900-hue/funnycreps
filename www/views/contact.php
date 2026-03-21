<?php 

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function getCentres(){ 
    return [
        "eiffel"              => "contact.dijon-eiffel@funny-creche.fr",
        "dijon-cazotte"       => "contact.dijon-cazotte@funny-creche.fr",
        "plombieres"          => "contact.plombieres@funny-creche.fr",
        "varois"              => "contact.varois@funny-creche.fr",
        "demigny"             => "contact.demigny@funny-creche.fr",
        "saintloup"           => "contact.saintloup@funny-creche.fr",
        "beaune-centre"       => "contact.beaune-centre@funny-creche.fr",
        "beaune-verdun"       => "contact.beaune-verdun@funny-creche.fr",
        "noisylegrand"        => "contact.noisylegrand@funny-creche.fr",
        "neuilly"             => "contact.neuilly@funny-creche.fr",
        "mont-de-marsan"      => "contact.mont-de-marsan@funny-creche.fr",
        "nuits-saint-georges" => "contact.nuits@funny-creche.fr",
        "daix"                => "n.michaud@funny-creche.fr"
    ];
}

$messageSuccessOrError = '';
$errors = [];

function sendEmailToStructure($data) {
    $centres = getCentres();
    $structure = $data['structure'];
    $to = $centres[$structure];

    $imageFilePath = dirname(__DIR__) . '/img/logo.png';

    $message = '<div style="font-family: Arial, sans-serif; color: #333;">';
    $message .= '<div style="text-align: center; margin-bottom: 20px;">';
    $message .= '<img src="cid:logo" alt="logo" style="max-width: 150px;"/>';
    $message .= '</div>';
    $message .= '<div style="padding: 10px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9;">';
    $message .= '<h2 style="color: #E91E63; text-align: center;">Demande de contact</h2>';
    $message .= '<p><strong>Prenom Nom :</strong> ' . htmlspecialchars($data["nom_prenom"], ENT_QUOTES, 'UTF-8') . '</p>';
    $message .= '<p><strong>Telephone :</strong> ' . htmlspecialchars($data['telephone'], ENT_QUOTES, 'UTF-8') . '</p>';
    $message .= '<p><strong>E-mail :</strong> ' . htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8') . '</p>';
    $message .= '<p><strong>Structure :</strong> ' . htmlspecialchars($structure, ENT_QUOTES, 'UTF-8') . '</p>';
    $message .= '<p><strong>Message : </strong>' . nl2br(htmlspecialchars($data["message"], ENT_QUOTES, 'UTF-8')) . '</p>';
    $message .= '</div>';
    $message .= '<div style="text-align: center; margin-top: 20px;">';
    $message .= '<p style="color: #777;">Merci de nous avoir contactes. Nous reviendrons vers vous sous peu.</p>';
    $message .= '<p style="font-size: 10px; color: red;">Attention aux spams ! Veillez a ne pas cliquer sur des liens frauduleux.</p>';
    $message .= '</div>';
    $message .= '</div>';

    $subject = "Demande de contact depuis le site Funny creche";

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        // Les variables d'environnement sont chargées par configuration.php
        $mail->Username = $_ENV['SMTP_USER'] ?? '';
        $mail->Password = $_ENV['SMTP_PASS'] ?? '';

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('medias@funny-creche.fr', 'Demande de Contact via le site www.Funny-Creche.fr');
        $mail->addAddress($to);
        $mail->addReplyTo('medias@funny-creche.fr', 'Support Site');
        $mail->addCC('c.chavet@funny-creche.fr');
        $mail->addBCC('n.michaud@funny-creche.fr');
        $mail->addBCC('medias@funny-creche.fr');

        $structuresWithCoordinatriceBaune = ['demigny', 'saintloup', 'beaune-centre', 'beaune-verdun'];
        if (in_array($structure, $structuresWithCoordinatriceBaune)) {
            $mail->addCC('coordinatrice.beaune@funny-creche.fr');
        }

        $structuresWithCoordinatriceDigon = ['daix', 'varois', 'eiffel', 'dijon-cazotte', 'plombieres'];
        if (in_array($structure, $structuresWithCoordinatriceDigon)) {
            $mail->addCC('coordinatrice.dijon@funny-creche.fr');
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddEmbeddedImage($imageFilePath, 'logo');
        $mail->AltBody = strip_tags($message);

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Erreur envoi mail Funny Creche : " . $mail->ErrorInfo);
        return false;
    }
}

if ($_POST) {

    $centres = getCentres();

    // Vérification du token CSRF
    if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $errors[] = "Requête invalide. Veuillez recharger la page et réessayer.";
    }

    if (!isset($_POST['security_question']) || $_POST['security_question'] != 4) {
        $errors[] = "La reponse a la question de securite est incorrecte. Veuillez reessayer.";
    }

    if (!empty($_POST['website'])) {
        $errors[] = "Votre soumission a ete identifiee comme du spam.";
    }

    // AJOUT : Validation RGPD
    if (!isset($_POST['rgpd'])) {
        $errors[] = "Vous devez accepter la politique de confidentialite pour envoyer votre demande.";
    }

    if (!array_key_exists('structure', $_POST)) {
        $errors[] = "Vous n'avez pas selectionne de structure.";
    }

    if (array_key_exists('structure', $_POST) && !array_key_exists($_POST['structure'], $centres)) {
        $errors[] = "Desole, nous n'avons pas reconnu la structure que vous souhaitez contacter.";
    }

    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse e-mail saisie n'est pas valide.";
    }

    if (!empty($_POST['telephone'])) {
        $tel = trim($_POST['telephone']);
        if (!preg_match('/^[0-9 \+\.\-\(\)]{6,20}$/', $tel)) {
            $errors[] = "Le numero de telephone semble incorrect.";
        }
    }

    if (!empty($_POST['message'])) {
        $msg = trim($_POST['message']);
        if (mb_strlen($msg) < 15) {
            $errors[] = "Votre message est trop court. Merci de preciser votre demande.";
        }
    }

    if (!empty($_POST['message'])) {
        $messageCheck = strtolower($_POST['message']);
        $linkCount = substr_count($messageCheck, 'http://') + substr_count($messageCheck, 'https://');

        if ($linkCount > 1) {
            $errors[] = "Votre message contient trop de liens et a ete considere comme du spam.";
        }

        if (!isset($_POST['telephone']) 
            || !preg_match('/^(06|07)[0-9]{8}$/', str_replace([' ', '.', '-', '/'], '', $_POST['telephone']))) {
            $errors[] = "Votre numero de telephone doit commencer par 06 ou 07 et contenir 10 chiffres.";
        }

        if (strpos($messageCheck, 'www.') !== false) {
            $errors[] = "Votre message contient une adresse web et a ete considere comme du spam.";
        }

        $blacklistWords = ['viagra','casino','crypto','seo','backlink','adult','sexe','porn'];
        foreach ($blacklistWords as $bad) {
            if (strpos($messageCheck, $bad) !== false) {
                $errors[] = "Votre message a ete identifie comme du spam.";
                break;
            }
        }
    }

    if (isset($_POST['message']) && preg_match('/[\p{Cyrillic}]/u', $_POST['message'])) {
        $errors[] = "Votre message contient des caracteres non autorises.";
    }

    $mailer = false;

    if (count($errors) < 1) {
        $mailer = sendEmailToStructure($_POST);
    }

    if ($mailer) {
        $messageSuccessOrError = "<div class='col-md-6 offset-lg-3 alert alert-success alert-dismissible fade show' role='alert'>
            <strong style='color:#000'>Votre demande a bien ete prise en compte.</strong><br/> Vous serez recontacte dans les meilleurs delais.
            <button type='button' class='close' data-dismiss='alert' aria-label='Fermer'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    } else {
        $messageSuccessOrError = "<div class='col-md-6 offset-lg-3 alert alert-danger alert-dismissible fade show' role='alert'>
            <strong style='color:#000'>Une erreur est survenue lors de l'envoi du mail.</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Fermer'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
    }
}
?>
<!-- Banner start -->
<div class="banner banner-contact" id="banner" style="margin-top:50px;">
    <div id="bannerCarousole">
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100" src="img/bebe-phone2.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <br/><br/>
                            <h1>Contactez-nous !</h1>
                            <p>Nous serons heureux de pouvoir vous recontacter pour un premier echange.</p>
                        </div>
                        <div class="opening-hours">
                            <h4>Horaires d'ouverture <sup>*</sup></h4>
                            <ul class="list-style-none">
                                <li><strong style='color:#FFF;'>Du lundi au vendredi de</strong> <span style='color:#FFF;'>07:30 - 18:30</span></li>
                            </ul>
                            <p><sup>* Selon la structure d'accueil</sup></p>
                        </div>
                        <form action="contact.html" method="POST">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo $messageSuccessOrError; ?>
                            <?php if (count($errors) > 0) : ?>
                                <div class='col-md-6 offset-lg-3 alert alert-danger alert-dismissible fade show' role='alert'>
                                    <ul>
                                        <?php foreach($errors as $error) : ?>
                                            <li><?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group name">
                                                <input type="text" required name="nom_prenom" class="form-control" placeholder="Votre nom et prenom">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group email">
                                                <input type="email" required name="email" class="form-control" placeholder="Votre Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group number">
                                                <input type="text" required name="telephone" class="form-control" placeholder="Votre numero de telephone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group number">
                                                <select name="structure" required class="form-control">
                                                    <?php
                                                        $centres = [
                                                            "eiffel"              => "DIJON - Eiffel",
                                                            "dijon-cazotte"       => "DIJON - Cazotte",
                                                            "plombieres"          => "PLOMBIERES-LES-DIJON",
                                                            "varois"              => "VAROIS-ET-CHAIGNOT",
                                                            "demigny"             => "DEMIGNY",
                                                            "saintloup"           => "Saint-loup Geanges",
                                                            "beaune-centre"       => "Beaune - Tonneliers",
                                                            "beaune-verdun"       => "Beaune - Verdun",
                                                            "noisylegrand"        => "Noisy le grand",
                                                            "neuilly"             => "NEUILLY SUR MARNE",
                                                            "mont-de-marsan"      => "Mont-de-Marsan",
                                                            "nuits-saint-georges" => "Nuits-Saint-Georges",
                                                            "daix"                => "DAIX (ouverture septembre 2026)"
                                                        ];
                                                    ?>
                                                    <option value="">--Selectionnez une structure d'accueil--</option>
                                                    <optgroup label="Structures existantes">
                                                        <?php
                                                            foreach($centres as $key => $centre) {
                                                                echo '<option value="' . $key . '" ';
                                                                if(array_key_exists('s', $_GET) && $_GET['s'] == $key) {
                                                                    echo 'selected';
                                                                }
                                                                echo '>' . $centre . '</option>';
                                                            }
                                                        ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group message">
                                                <textarea required class="form-control" name="message" rows='5' placeholder="Votre message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group security-question">
                                                <label for="security_question">Question de securite : Combien font 2 + 2 ?</label>
                                                <input type="number" required name="security_question" class="form-control" placeholder="Entrez votre reponse">
                                            </div>
                                        </div>
                                        <!-- AJOUT : Case RGPD -->
                                        <div class="col-md-12" style="margin-bottom: 15px; text-align: left;">
                                            <div class="form-check">
                                                <input type="checkbox" required name="rgpd" id="rgpd" class="form-check-input">
                                                <label class="form-check-label" for="rgpd" style="font-size:13px; color:#FFF;">
                                                    J'accepte que mes donnees personnelles soient utilisees pour traiter ma demande, conformement a la <a href="mentions-legales.html" target="_blank" style="color:#e386d7;">politique de confidentialite</a> de Funny Creche.
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Honeypot field -->
                                        <div class="form-group honeypot" style="display:none;">
                                            <label for="website">Si vous voyez ce champ, laissez-le vide.</label>
                                            <input type="text" name="website" class="form-control" placeholder="Laissez ce champ vide">
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

<!-- Adresses start -->
<div class="featured-properties content-area">
    <div class="container">
        <div class="main-title">
            <h1>Les adresses de nos creches</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>DIJON - Cazotte</h4>
                10 Rue Cazotte - 21000 Dijon<br/>
                <i class="fa fa-phone"></i> Mme. Fournil 09 85 14 97 75<br/>
                <i class="fa fa-envelope"></i> contact.dijon-cazotte@funny-creche.fr
                <br/><a href="creche-dijon-cazotte.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10818.927573259556!2d5.0344635!3d47.319576!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f29da3e1d24b11%3A0x7fcbfa7192b2346f!2sFunny%20Cr%C3%A8che%20Cazotte!5e0!3m2!1sfr!2sfr!4v1682283664830!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>DIJON - Eiffel</h4>
                14 Rue de l'esperance - 21000 Dijon<br/>
                <i class="fa fa-phone"></i> Mme. Fournil 09 51 73 20 86<br/>
                <i class="fa fa-envelope"></i> contact.dijon-eiffel@funny-creche.fr
                <br/><a href="creche-dijon.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43276.50789888258!2d5.052742348430785!3d47.318602205066625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f29dbb6474c059%3A0x45b29f50d17421ec!2s14%20Rue%20de%20l'Esp%C3%A9rance%2C%2021000%20Dijon!5e0!3m2!1sfr!2sfr!4v1580399118576!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>PLOMBIERES-LES-DIJON</h4>
                17 rue Albert Remy - 21370 Plombieres-les-Dijon<br/>
                <i class="fa fa-phone"></i> Mme. Fournil 09 84 53 70 15<br/>
                <i class="fa fa-envelope"></i> contact.plombieres@funny-creche.fr
                <br/><a href="creche-plombiere.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2703.7339943963498!2d4.973356641021645!3d47.33906610653355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f29d9cf09ce62f%3A0x1bcfc73e762a6fc3!2sFunny%20Cr%C3%A8che%20Plombi%C3%A8res!5e0!3m2!1sfr!2sfr!4v1682284397805!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>VAROIS-ET-CHAIGNOT</h4>
                21B Route de Fontaine-Francaise - 21490 Varois-et-Chaignot<br/>
                <i class="fa fa-phone"></i> Mme. Fournil 07 59 68 67 01<br/>
                <i class="fa fa-envelope"></i> contact.varois@funny-creche.fr
                <br/><a href="creche-varois.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1556.084636351029!2d5.13292190543368!3d47.352457812929224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ed601367bf8427%3A0xe6a0687b81dbd2c6!2s21%20Rte%20de%20Fontaine-Fran%C3%A7aise%2C%2021490%20Varois-et-Chaignot!5e0!3m2!1sfr!2sfr!4v1738185677691!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>DEMIGNY</h4>
                28 rue des rosees - 71150 Demigny<br/>
                <i class="fa fa-phone"></i> Mme. Pividori 09 50 67 33 86<br/>
                <i class="fa fa-envelope"></i> contact.demigny@funny-creche.fr
                <br/><a href="creche-demigny.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21797.233939470814!2d4.825588338912023!3d46.929179242519346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f2f10fb2857f27%3A0x2fc573037ca43f3d!2s28%20Rue%20des%20Ros%C3%A9es%2C%2071150%20Demigny!5e0!3m2!1sfr!2sfr!4v1580399178653!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>NEUILLY-SUR-MARNE</h4>
                7 rue Paul Langevin - 93330 Neuilly-sur-marne<br/>
                <i class="fa fa-phone"></i> Mme Martin - 09 50 57 22 36<br/>
                <i class="fa fa-envelope"></i> contact.neuilly@funny-creche.fr
                <br/><a href="creche-neuilly-sur-marne.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.4569209331366!2d2.5198804158006394!3d48.86856550794401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6126b9729347d%3A0xc9ed66a9a867e147!2s7%20Rue%20Paul%20Langevin%2C%2093330%20Neuilly-sur-Marne!5e0!3m2!1sfr!2sfr!4v1580399205040!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>NOISY-LE-GRAND</h4>
                15 rue de l'universite, 93160 Noisy-le-grand<br/>
                <i class="fa fa-phone"></i> Mme Martin - 09 85 10 67 70<br/>
                <i class="fa fa-envelope"></i> contact.noisylegrand@funny-creche.fr
                <br/><a href="creche-noisy-le-grand.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.092038576079!2d2.5502371155203414!3d48.83738307928549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e60e0ebd33d1b7%3A0xd36fa37382e3438a!2s15%20Rue%20de%20l'Universit%C3%A9%2C%2093160%20Noisy-le-Grand!5e0!3m2!1sfr!2sfr!4v1658307194973!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>SAINT-LOUP</h4>
                2 rue Fleurant - 71350 St Loup-Geanges<br/>
                <i class="fa fa-phone"></i> Mme. Pividori 09 84 34 60 53<br/>
                <i class="fa fa-envelope"></i> contact.saintloup@funny-creche.fr
                <br/><a href="creche-saint-loup.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2723.8355017819035!2d4.907867515607698!3d46.94527207914643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f2ee056ff57895%3A0xc1b0a2339baefe99!2s2%20Rue%20Fleurant%2C%2071350%20Saint-Loup-G%C3%A9anges!5e0!3m2!1sfr!2sfr!4v1622620010466!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>BEAUNE - Tonneliers</h4>
                7 rue des Tonneliers, 21200 BEAUNE<br/>
                <i class="fa fa-phone"></i> Mme. Pividori 09 52 15 56 94<br/>
                <i class="fa fa-envelope"></i> contact.beaune-centre@funny-creche.fr
                <br/><a href="creche-beaune-tonneliers.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2719.807288836544!2d4.834807829388643!3d47.02438761246263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f2f345f565f3ff%3A0x899fbdaa48d90ae4!2s7%20Rue%20des%20Tonneliers%2C%2021200%20Beaune!5e0!3m2!1sfr!2sfr!4v1658307323102!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>BEAUNE - Verdun</h4>
                43 C Route de Verdun, 21200 BEAUNE<br/>
                <i class="fa fa-phone"></i> Mme. Pividori 09 84 49 77 31<br/>
                <i class="fa fa-envelope"></i> contact.beaune-verdun@funny-creche.fr
                <br/><a href="creche-beaune-verdun.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2720.504419895013!2d4.851530800000001!3d47.010703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f2f316f2198c05%3A0xf465aa56633d3f7c!2s43c%20Rte%20de%20Verdun%2C%2021200%20Beaune!5e0!3m2!1sfr!2sfr!4v1682284658938!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>MONT-DE-MARSAN</h4>
                1750 Avenue Marechal Juin, 40000 MONT-DE-MARSAN<br/>
                <i class="fa fa-phone"></i> Mme. Brethes 05 58 44 35 53<br/>
                <i class="fa fa-envelope"></i> contact.mont-de-marsan@funny-creche.fr
                <br/><a href="creche-mont.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16167.08618487691!2d-0.49376057457015304!3d43.9072070052023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd55d05e4bc22a81%3A0xc48febdf8fb18a8b!2s1750%20Av.%20du%20Mar%C3%A9chal%20Juin%2C%2040000%20Mont-de-Marsan!5e0!3m2!1sfr!2sfr!4v1694634666050!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>NUITS-SAINT-GEORGES</h4>
                2 Rue Charles Andre Remi Arnault - 21700 Nuits-Saint-Georges<br/>
                <i class="fa fa-phone"></i> Mme. Pividori 09 54 93 76 87<br/>
                <i class="fa fa-envelope"></i> contact.nuits@funny-creche.fr
                <br/><a href="creche-nuits.html" class="btn btn-lg btn-lg-outline" style="color:#e386d7;"><i class="fa fa-plus-square-o"></i> Plus d'infos</a>
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2714.16443635606!2d4.964583112052922!3d47.13504442030131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f291a54106be7d%3A0xb55a6b8ae6c76d58!2s2%20Rue%20Charles%20Andr%C3%A9%20R%C3%A9mi%20Arnoult%2C%2021700%20Nuits-Saint-Georges!5e0!3m2!1sfr!2sfr!4v1740170756072!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6 col-pad text-center" style="padding: 30px 30px;">
                <h4>DAIX <span style="font-size:14px; color:#E91E63;">Ouverture septembre 2026</span></h4>
                <div style="display:inline-block; background:#fff0f8; border:2px dashed #E91E63; border-radius:10px; padding:10px 20px; margin-bottom:10px;">
                    <strong>Nouvelle micro-creche !</strong><br/>
                    Nous ouvrons prochainement nos portes a Daix.<br/>
                    N'hesitez pas a nous contacter pour plus d'informations.
                </div>
                <br/>
                19 Rue de Dijon - 21121 Daix<br/>
                <i class="fa fa-phone"></i> Mme. Fournil - 07 83 52 07 07<br/>
                <i class="fa fa-envelope"></i> coordinatrice.dijon@funny-creche.fr
                <br/><br/>
                <iframe loading="lazy" style="border-radius: 10px;border:0;padding:5px;background:pink" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2701.0!2d5.0185!3d47.3608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s19%20Rue%20de%20Dijon%2C%2021121%20Daix!5e0!3m2!1sfr!2sfr!4v1700000000000!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Featured Properties end -->
