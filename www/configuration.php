<?php
switch($_GET['mode']){
	case '' :
		$mode = 'home';
		$title = 'Page d\'accueil';
	break;
	case 'contact' :
		$mode = 'contact';
		$title = 'Contactez-nous';
	break;
	case 'creches' :
		$mode = 'creches';
		$title = 'Nos crèches';
	break;
	case 'recrutement' :
		$mode = 'recrutement';
		$title = 'Funny crèche recrute';
	break;
	case 'creche-dijon' :
		$mode = 'creche-dijon';
		$title = 'La Funny Crèche de DIJON';
	break;
	case 'creche-dijon-cazotte' :
		$mode = 'creche-dijon-cazotte';
		$title = 'La Funny Crèche de DIJON - Cazotte';
	break;
	case 'creche-neuilly-sur-marne' :
		$mode = 'creche-neuilly-sur-marne';
		$title = 'La Funny Crèche de NEUILLY SUR MARNE';
	break;
	case 'creche-noisy-le-grand' :
		$mode = 'creche-noisy-le-grand';
		$title = 'La Funny Crèche de NOISY LE GRAND';
	break;
	case 'creche-beaune-tonneliers' :
		$mode = 'creche-beaune-tonneliers';
		$title = 'La Funny Crèche de BEAUNE - Tonneliers';
	break;
	case 'creche-demigny' :
		$mode = 'creche-demigny';
		$title = 'La Funny Crèche de DEMIGNY';
	break;
	case 'creche-saint-loup' :
		$mode = 'creche-saint-loup';
		$title = 'La Funny Crèche de SAINT-LOUP-GEANGES';
	break;
	case 'projet-pedagogique' :
		$mode = 'projet-pedagogique';
		$title = 'La Funny Crèche - Le projet pédagogique';
	break;
      case 'ouvertures-prochaines' :
		$mode = 'ouvertures-prochaines';
		$title = 'La Funny Crèche - Les prochaines ouvertures de crèches';
	break;
	case 'creche-beaune-verdun' :
		$mode = 'creche-beaune-verdun';
		$title = 'La Funny Crèche de BEAUNE - Verdun';
	break;
	case 'creche-plombiere' :
		$mode = 'creche-plombiere';
		$title = 'La Funny Crèche de Plombières-lès-Dijon';
	break;
	case 'creche-nuits' :
		$mode = 'creche-nuits';
		$title = 'La Funny Crèche de Nuits-Saint-Georges';
	break;
	case 'creche-mont' :
		$mode = 'creche-mont';
		$title = 'La Funny Crèche de Mont-de-Marsan';
	break;
	case 'creche-varois' :
		$mode = 'creche-varois';
		$title = 'La Funny Crèche de Varois-et-Chaignot';
	break;
	case 'mentions-legales' :
  		  $mode = 'mentions-legales';
   		 $title = 'Mentions légales & Politique de confidentialité';
	break;
}