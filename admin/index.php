<?php

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
</head>
<body>
	<?php
	include_once '../menu.php';
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
	            require_once 'accueil_admin.php';
	        }
	?>
</body>
</html>