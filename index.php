<?php

session_start();

/*require_once 'config.php';
require_once 'connect.php';
require_once 'fonction.php';
require_once ''
*/
if(empty($_GET)&&empty($_POST)){
	require_once 'pages/accueil.php';
	
}elseif(isset($_GET['contact'])){
	require_once 'pages/contactform.php';

}elseif(isset($_GET['galerie'])){
	require_once 'pages/galerie.php';

}elseif(isset($_GET['entreprise'])){
	require_once 'pages/entreprise.php';

}elseif(isset($_GET['produits'])){
	require_once 'pages/produits.php';

}else{
	require_once 'pages/accueil.php';
}