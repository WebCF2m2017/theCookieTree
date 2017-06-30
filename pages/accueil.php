<?php
if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.accueil.css">
	<link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
</head>
<body>
	<?php require_once 'menu.php';  ?>
	<div class="container">
		<div class="col-lg-12 col-offset-lg-12 col-md-12 col-sm-12 col-xs-12">

			<img src="photo/cloches-banner.jpg" class="img-responsive">
			
			<img id="treelogo" src="photo/treelogo.png"  width="55px" height="80px">
			<h1 id="title">theCookieTree</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla ratione explicabo nihil expedita, labore, minima mollitia nisi molestias saepe illum, soluta non illo. Quas consectetur aperiam esse amet reiciendis, nesciunt.</p>
			
			

		</div>
		
	</div>
	
</body>
</html>