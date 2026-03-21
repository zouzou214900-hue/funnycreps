<?php
ini_set('display_errors',0);
error_reporting(0);
require('configuration.php');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Funny Crèche - La micro-crèche privée - <?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	<?php require('header-css.php'); ?>

    <!-- Favicon icon -->
    <!--<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" >-->

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="js/html5shiv.min.js"></script>
    <script  src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="page_loader"></div>

<!-- Main header start -->
<header class="main-header header-transparent sticky-header header-shrink">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="/">
                <img src="img/logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php if($mode=='home') echo 'active'; ?>">
                        <a class="nav-link" href="/" >
                            Accueil
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Notre projet
                        </a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <li><a class="dropdown-item" href="projet-pedagogique.html">Projet pédagogique</a></li>
                            <li><a class="dropdown-item" href="qu-est-ce-qu-une-micro-creche.html">Qu'est ce qu'une micro-crèche</a></li>
                            <li><a class="dropdown-item" href="tarifs.html">Tarifs</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href='creches.html' id="navbarDropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Nos crèches
                        </a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink6">
                            <li><a class="dropdown-item" href="creche-dijon.html">Dijon - Eiffel</a></li>
                            <li><a class="dropdown-item" href="creche-dijon-cazotte.html">Dijon - Cazotte</a></li>
                            <li><a class="dropdown-item" href="creche-plombiere.html">Plombières-lès-Dijon</a></li>
                            <li><a class="dropdown-item" href="creche-varois.html">Varois-et-Chaignot</a></li>
                            <li><a class="dropdown-item" href="creche-nuits.html">Nuits-saint-Georges</a></li>
                            <li><a class="dropdown-item" href="creche-beaune-tonneliers.html">Beaune - Tonneliers</a></li>
                            <li><a class="dropdown-item" href="creche-beaune-verdun.html">Beaune - Verdun</a></li>
                            <li><a class="dropdown-item" href="creche-demigny.html">Demigny</a></li>
                            <li><a class="dropdown-item" href="creche-saint-loup.html">Saint-Loup-Géanges</a></li>
                            <li><a class="dropdown-item" href="creche-neuilly-sur-marne.html">Neuilly-sur-marne</a></li>
                             <li><a class="dropdown-item" href="creche-noisy-le-grand.html">Noisy-le-grand</a></li>
                             <li><a class="dropdown-item" href="creche-mont.html">Mont-de-Marsan</a></li>

                            <li><a class="dropdown-item" href="ouvertures-prochaines.html">Prochaines ouvertures</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="contact.html">Contactez-nous</a>

                    </li>
                    <li class="nav-item ">
                        <a class="btn btn-theme" style='margin-top:22px;' href="recrutement.html">Nous recrutons !</a>

                    </li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->
<?php require("views/$mode.php"); ?>
<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <img src="img/logo_blanc.png" alt="logo" class="f-logo">
                    <div class="text-center" style='color:#FFF;'>
						Retrouvez nous sur <a style='color:#FFF;' href="https://www.facebook.com/profile.php?id=100072368342434" class="">Facebook <i  class="fa fa-facebook-square"></i></a>
                    </div>
                </div>
            </div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Liens utiles
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="/">Accueil</a>
                        </li>
                        <li>
                            <a href="projet-pedagogique.html">Projet pédagogique</a>
                        </li>
                        <li>
                            <a href="contact.html">Nous contacter</a>
                        </li>
			            <li>
			                <a href="mentions-legales.html">Mentions légales</a>
			            </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Nos crèches</h4>
                    <ul class="links">
                        <li>
                            <a href="creche-dijon.html"><i class="flaticon-pin"></i>  DIJON - Eiffel</a>
                        </li>
                        <li>
                            <a href="creche-dijon-cazotte.html"><i class="flaticon-pin"></i>  DIJON - Cazotte</a>
                        </li>
                        <li>
                            <a href="creche-plombiere.html"><i class="flaticon-pin"></i>  PLOMBIERES-LES-DIJON </a>
                        </li>
                        <li>
                            <a href="creche-varois.html"><i class="flaticon-pin"></i>  VAROIS-ET-CHAIGNOT </a>
                        </li>
                        <li>
                            <a href="creche-nuits.html"><i class="flaticon-pin"></i>  NUITS-SAINT-GEORGES </a>
                        </li>
                        <li>
                            <a href="creche-beaune-tonneliers.html"><i class="flaticon-pin"></i>  BEAUNE - Tonneliers</a>
                        </li>
                        <li>
                            <a href="creche-beaune-verdun.html"><i class="flaticon-pin"></i>  BEAUNE - Verdun</a>
                        </li>
                        <li>
                             <a href="creche-demigny.html"><i class="flaticon-pin"></i>  DEMIGNY</a>
                        </li>
                        <li>
                            <a href="creche-saint-loup.html"><i class="flaticon-pin"></i>  SAINT-LOUP-GEANGES</a>
                        </li>
                        <li>
                            <a href="creche-neuilly-sur-marne.html"><i class="flaticon-pin"></i>  NEUILLY SUR MARNE</a>
                        </li>
                        
                         <li>
                            <a href="creche-noisy-le-grand.html"><i class="flaticon-pin"></i>  NOISY-LE-GRAND</a>
                        </li>
                        <li>
                            <a href="creche-mont.html"><i class="flaticon-pin"></i>  MONT-DE-MARSAN</a>
                        </li>
                     
                        <li>
                            <a href="ouvertures-prochaines.html"><i class="flaticon-calendar"></i> Prochaines ouvertures</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->


<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script  src="js/bootstrap-submenu.js"></script>
<script  src="js/rangeslider.js"></script>
<script  src="js/jquery.mb.YTPlayer.js"></script>
<script  src="js/bootstrap-select.min.js"></script>
<script  src="js/jquery.easing.1.3.js"></script>
<script  src="js/jquery.scrollUp.js"></script>
<script  src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="js/leaflet.js"></script>
<script  src="js/leaflet-providers.js"></script>
<script  src="js/leaflet.markercluster.js"></script>
<script  src="js/dropzone.js"></script>
<script  src="js/slick.min.js"></script>
<script  src="js/jquery.filterizr.js"></script>
<script  src="js/jquery.magnific-popup.min.js"></script>
<script  src="js/jquery.countdown.js"></script>
<script  src="js/maps.js"></script>
<script  src="js/app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script  src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>