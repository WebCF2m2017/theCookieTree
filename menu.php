<?php
	if(!isset($_SESSION['clef_de_session'])){
?>
	<div class="container">
			<nav class="navbar navbar-inverse">
				<ul class="nav navbar-nav">
					<li><a href="http://localhost/theCookieTree">Accueil</a></li>
					<li><a href="http://localhost/theCookieTree?entreprise">Entreprise</a></li>
					<li>
						<a data-toggle="dropdown" href="http://localhost/theCookieTree?produits">Produits <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Au-delà du blé</a></li>
							<li><a href="#">Vegan</a></li>
						</ul>
					</li>
					<li><a href="http://localhost/theCookieTree?contact">Contact</a></li>
					<li><a href="http://localhost/theCookieTree?galerie">Galerie</a></li>
					<li><a href="http://localhost/theCookieTree/admin/">Connexion</a></li>
				</ul>
			</nav>
		</div>
<?php
	}else{
?>
		<div class="container">
			<nav class="navbar navbar-inverse">
				<ul class="nav navbar-nav">
					<li><a href="http://localhost/theCookieTree">Accueil</a></li>
					<li><a href="http://localhost/theCookieTree?entreprise">Entreprise</a></li>
					<li>
						<a data-toggle="dropdown" href="http://localhost/theCookieTree?produits">Produits <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#"></a></li>
							<li><a href="#">AYA</a></li>
						</ul>
					</li>
					<li><a href="http://localhost/theCookieTree?contact">Contact</a></li>
					<li><a href="http://localhost/theCookieTree?galerie">Galerie</a></li>
					<li><a href="http://localhost/theCookieTree/?action=insert">Insertion</a></li>
					<li><a href="http://localhost/theCookieTree/admin/disconnect.php">Deconnexion</a></li>
				</ul>
			</nav>
		</div>
<?php
	}
?>
