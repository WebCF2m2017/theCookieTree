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
		<div class="col-lg-6 col-offset-lg-6 col-md-6 col-sm-12 col-xs-12">
			<img id="treelogo" src="photo/treelogo.png"  width="55px" height="80px">
			<h1 id="titleA">theCookieTree</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla ratione explicabo nihil expedita, labore, minima mollitia nisi molestias saepe illum, soluta non illo. Quas consectetur aperiam esse amet reiciendis, nesciunt.</p>
			
			<img src="photo/cloches.jpg" class="img-responsive">

		</div>
		<div class="col-lg-6 col-offset-lg-6 col-md-6 col-sm-12 col-xs-12">

			<h2 id="titleA">Au dela du blé</h2>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla ratione explicabo nihil expedita, labore, minima mollitia nisi molestias saepe illum, soluta non illo. Quas consectetur aperiam esse amet reiciendis, nesciunt.</p>

			<h2 id="titleA">Vegan</h2>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla ratione explicabo nihil expedita, labore, minima mollitia nisi molestias saepe illum, soluta non illo. Quas consectetur aperiam esse amet reiciendis, nesciunt.</p>
			
			<hr/>

			<img src="photo/instagram.png" id="media" width="50px" height="50px">
			<h3>#theCookieTree</h3>

			<hr/>

			<img src="photo/facebook.png" id="media" width="50px" height="50px">
			<h3>/theCookieTree</h3>

			<hr/>

			<img src="photo/happycow.jpg" id="media" width="50px" height="50px">
			<h3>Où nous trouver ?</h3>
			
			<hr/>

		</div>
	</div>
	
</body>
</html>