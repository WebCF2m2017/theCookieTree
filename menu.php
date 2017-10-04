
<div class="container">
		<img id="photobanner" class="img-responsive" src="photo/topbanner.jpg" alt="top-banner">
</div>

<?php
	if(!isset($_SESSION['clef_de_session'])){
?>
		<div class="container">
		<nav class="navbar">
			<ul class="nav navbar-nav">
				<li><a href="./">Accueil</a></li>
				<li><a href="?entreprise">Entreprise</a></li>
				<li>
					<a data-toggle="dropdown" href="?galerie_gluten">Produits <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="?galerie_tout">Tous les produits</a></li>
						<li><a href="?galerie_gluten">Au-delà du blé</a></li>
						<li><a href="?galerie_vegan">Vegan</a></li>
					</ul>
				</li>
				<li><a href="?contact">Contact</a></li>
				<li><a href="?connexion">Connexion</a></li>
			</ul>
			</nav>
		</div>
	
		
<?php
	}elseif($_SESSION['idrole'] ==1){
?>	
		<div class="container">
			<nav class="navbar">
				<ul class="nav navbar-nav">
					<li><a href="./">Accueil</a></li>
					<li><a href="?entreprise">Entreprise</a></li>
					<li>
						<a data-toggle="dropdown" href="?galerie_gluten">Produits <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="?galerie_tout">Tous les produits</a></li>
							<li><a href="?galerie_gluten">Au-delà du blé</a></li>
							<li><a href="?galerie_vegan">Vegan</a></li>
						</ul>
					</li>
					<li><a href="?contact">Contact</a></li>
					<li><a href="?action=insert">Insertion</a></li>
					<li><a href="?order">Vos réservations</a></li>
					<li><a href="?action=deco">Deconnexion</a></li>
				</ul>
			</nav>
		</div>
<?php
	}else{
		?>
		<div class="container">
			<nav class="navbar">
				<ul class="nav navbar-nav">
					<li><a href="./">Accueil</a></li>
					<li><a href="?entreprise">Entreprise</a></li>
					<li>
						<a data-toggle="dropdown" href="?produits">Produits <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="?galerie_tout">Tous les produits</a></li>
							<li><a href="?galerie_gluten">Au-delà du blé</a></li>
							<li><a href="?galerie_vegan">Vegan</a></li>
						</ul>
					</li>
					<li><a href="?contact">Contact</a></li>
					<li><a href="?commande">Réservation</a>
					<li><a href="?order">Vos réservations</a></li>
					<li><a href="?action=deco">Déconnexion</a></li>
				</ul>
			</nav>
		</div>	
		<?php
	}
?>
