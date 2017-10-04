<?php
session_start();
ob_start();

require_once '../pages/connect.php';
require_once '../pages/fonction.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<body>
	<?php
	include_once '../menu.php';
	if(!isset($_SESSION['clef_de_session'])){
    	require_once 'connexion.php';
	}else{
    // si la clef est toujours valide
    if($_SESSION['clef_de_session']== session_id()){
		if(isset($_GET['action'])){
	            // switch du type d'action
	            switch($_GET['action']){
	                // on veut se déconnecter
	                case "deco":
	                    header("Location: disconnect.php");
	                    break;
	                // on veut insérer
	                case "insert":
	                    require_once 'insert.php';
	                    break;
	                // on veut supprimer
	                case "delete":
	                    require_once 'delete.php';
	                    break;
	                // on veut modifier
	                case "update":
	                    require_once 'update.php';
	                    break;
	                default :
	                    header("Location: ./");
	            }
	            
	        }else{
	            // appel de l'accueil
	            header("Location: ./");
	        }
	    }
	}
	?>
</body>
</html>