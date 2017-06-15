<?php

session_start();

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

		}elseif(isset($_GET['galerie_gluten'])){
            require_once 'pages/galerie_gluten.php';

        }elseif(isset($_GET['galerie_vegan'])){
			require_once 'pages/galerie_vegan.php';
		}else{
            require_once 'pages/accueil.php';
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
</body>
</html>
