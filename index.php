<?php

session_start();
$current_page = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo $current_page;
require_once 'pages/connect.php';
require_once 'pages/fonction.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
	include_once 'menu.php';
		if(empty($_GET)&&empty($_POST)){
			require_once 'pages/accueil.php';
			
		}elseif(isset($_GET['contact'])){
			require_once 'pages/contactform.php';

		}elseif(isset($_GET['entreprise'])){
			require_once 'pages/entreprise.php';

		}elseif(isset($_GET['produits'])){
			require_once 'pages/produits.php';

		}elseif(isset($_GET['galerie'])){
			require_once 'pages/galerie.php';

		}else{
			require_once 'pages/accueil.php';
		}
	?>
</body>
</html>
