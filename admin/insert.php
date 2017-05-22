<?php
	$sql ="SELECT p.titre, p.description, i.url, c.types
			FROM categ c
			INNER JOIN produits p
			ON c.id = p.categ_id
			INNER JOIN img i
			ON i.Produits_id = p.id ";

	$requete = mysqli_query($db, $sql);
	$produits = mysqli_fetch_assoc($requete);
	var_dump($produits); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertion de produits</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
				?>
			</div>
			<div class="col-md-4">
				<p class="col-md-6">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
	</div>
</body>
</html>