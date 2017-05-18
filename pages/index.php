<?php

session_start();

/*require_once 'config.php';
require_once 'connect.php';
require_once 'fonction.php';
*/
if(isset($_GET)){
	require_once 'accueil.php';
	
}elseif(isset($_GET['contactform'])){
	require_once 'contactform.php';

}elseif(isset($_GET['galerie'])){
	require_once 'galerie.php';

}elseif(isset($_GET['entreprise'])){
	require_once 'entreprise.php';

}elseif(isset($_GET['produits'])){
	require_once 'produits.php';

}else{
	require_once 'accueil.php';
}