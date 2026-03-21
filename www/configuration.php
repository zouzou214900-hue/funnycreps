<?php
// Démarrage de la session (requis pour la protection CSRF)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Chargement des variables d'environnement depuis .env
$envFile = dirname(__DIR__) . '/.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            $parts = explode('=', $line, 2);
            $_ENV[trim($parts[0])] = trim($parts[1]);
        }
    }
}

$googleMapsKey = isset($_ENV['GOOGLE_MAPS_KEY']) ? $_ENV['GOOGLE_MAPS_KEY'] : '';

// Génération du token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
}

// Valeurs meta par défaut
$metaDescription = 'Funny Crèche - Réseau de micro-crèches privées bienveillantes en France. Accueil de vos enfants de 3 mois à 6 ans en Côte-d\'Or, Saône-et-Loire, Seine-Saint-Denis et Landes.';
$ogImage         = 'img/logo.png';

// Chargement des données des crèches
require __DIR__ . '/views/data/creches.php';
$crecheData = null;

$mode_input = isset($_GET['mode']) ? $_GET['mode'] : '';

switch ($mode_input) {
    case '':
        $mode  = 'home';
        $title = 'Page d\'accueil';
        $metaDescription = 'Funny Crèche - Réseau de micro-crèches privées présentes en Côte-d\'Or, Saône-et-Loire, Seine-Saint-Denis et Landes. Accueil bienveillant de vos enfants.';
        $ogImage = 'img/home.jpg';
    break;
    case 'contact':
        $mode  = 'contact';
        $title = 'Contactez-nous';
        $metaDescription = 'Contactez Funny Crèche pour inscrire votre enfant dans une micro-crèche proche de chez vous. Formulaire de contact et adresses de toutes nos structures.';
        $ogImage = 'img/bebe-phone2.jpg';
    break;
    case 'creches':
        $mode  = 'creches';
        $title = 'Nos crèches';
        $metaDescription = 'Découvrez toutes nos micro-crèches Funny Crèche en France : Dijon, Beaune, Demigny, Nuits-Saint-Georges, Neuilly-sur-Marne, Noisy-le-Grand, Mont-de-Marsan...';
        $ogImage = 'img/creche.jpg';
    break;
    case 'recrutement':
        $mode  = 'recrutement';
        $title = 'Funny Crèche recrute';
        $metaDescription = 'Rejoignez l\'équipe Funny Crèche ! Nous recrutons des professionnelles de la petite enfance : éducatrices, auxiliaires de puériculture, accompagnantes.';
        $ogImage = 'img/recrutement.jpg';
    break;
    case 'projet-pedagogique':
        $mode  = 'projet-pedagogique';
        $title = 'La Funny Crèche - Le projet pédagogique';
        $metaDescription = 'Découvrez le projet pédagogique de Funny Crèche : éveil de l\'enfant, bienveillance, activités adaptées, respect du rythme de chacun.';
        $ogImage = 'img/pedagogie.jpg';
    break;
    case 'ouvertures-prochaines':
        $mode  = 'ouvertures-prochaines';
        $title = 'La Funny Crèche - Les prochaines ouvertures de crèches';
        $metaDescription = 'Prochaines ouvertures de micro-crèches Funny Crèche en France. Restez informés de nos nouvelles structures et pré-inscrivez votre enfant.';
    break;
    case 'mentions-legales':
        $mode  = 'mentions-legales';
        $title = 'Mentions légales & Politique de confidentialité';
        $metaDescription = 'Mentions légales et politique de confidentialité de Funny Crèche - Réseau de micro-crèches privées.';
    break;
    case 'creche-dijon':
    case 'creche-dijon-cazotte':
    case 'creche-beaune-tonneliers':
    case 'creche-beaune-verdun':
    case 'creche-demigny':
    case 'creche-saint-loup':
    case 'creche-nuits':
    case 'creche-plombiere':
    case 'creche-varois':
    case 'creche-neuilly-sur-marne':
    case 'creche-noisy-le-grand':
    case 'creche-mont':
        $mode       = $mode_input;
        $crecheData = $allCreches[$mode];
        $title      = 'La Funny Crèche de ' . $crecheData['page_h1'];
        $metaDescription = $crecheData['meta_description'];
        $ogImage    = $crecheData['banner_image'];
    break;
    default:
        $mode  = 'home';
        $title = 'Page d\'accueil';
    break;
}
