<?php

session_start();

require_once 'pages/connect.php';
require_once 'pages/fonction.php';
require 'pages/_header.php';

?>
<!DOCTYPE html>
<html>
<head>

	<title>theCookieTree</title>
	<meta charset="utf-8">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.galerie.css">
    <link rel="stylesheet" type="text/css" href="css/style.contact.css">
    <link rel="stylesheet" type="text/css" href="css/style.menu.css">
    <link rel="stylesheet" type="text/css" href="css/style.accueil.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/main.js"></script>
    <link href="css/lightbox.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style type="text/css">
            textarea {
            max-width:100%;
        }
        .nameform{
            width: 50%;
        }
        h5{
            text-align: left;
        }

    </style>

</head>
<body>
	<?php 
        require_once 'menu.php';

		if(empty($_GET)&&empty($_POST)){
			require_once 'pages/accueil.php';
			
		}elseif(isset($_GET['contact'])){
			require_once 'pages/contactform.php';
        }elseif(isset($_GET['galerie_tout'])){
            require_once 'pages/_galerie.php';
		}elseif(isset($_GET['entreprise'])){
			require_once 'pages/entreprise.php';

		}elseif(isset($_GET['produits'])){
			require_once 'pages/produits.php';

		}elseif(isset($_GET['commande'])){
			require_once 'pages/panier.php';

		}elseif(isset($_GET['galerie_gluten'])){
            require_once 'pages/galerie_gluten.php';
        }elseif(isset($_GET['order'])){
            require_once 'pages/commandes.php';    
        }elseif(isset($_GET['galerie_vegan'])){
			require_once 'pages/galerie_vegan.php';
		}elseif(isset($_GET['connexion'])){
            require_once 'admin/connexion.php';
        }elseif(isset($_GET['id'])&&!isset($_GET['action'])){
            require_once 'pages/addpanier.php';
        }elseif(isset($_GET['inscription'])){
            require_once 'pages/inscription.php';
        }elseif(isset($_GET['reset'])){
            require_once 'pages/reset.php';
        }elseif(isset($_GET['token'])){
                require_once 'pages/change.php';
        }

if(!isset($_SESSION['clef_de_session'])){
    
}else{
    // si la clef est toujours valide
    if($_SESSION['clef_de_session']== session_id()){
        
        if(isset($_GET['action'])){
            // switch du type d'action
            switch($_GET['action']){
                // on veut se déconnecter
                case "deco":
                    header("Location: admin/disconnect.php");
                    break;
                // on veut insérer
                case "insert":
                    require_once 'admin/insert.php';
                    break;
                // on veut supprimer
                case "delete":
                    require_once 'admin/delete.php';
                    break;
                // on veut modifier
                case "update":
                    require_once 'admin/update.php';
                    break;
                default :
                    header("Location: ./");
                }
            }
        }
    }

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
