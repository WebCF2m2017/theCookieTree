<?php 

if(isset($_GET['id'])){
	$product = $DB->query('SELECT id FROM produits WHERE id=:id', array('id' => $_GET['id']));
	var_dump($product);
		if(empty($product)){
			die("Ce produit n'existe pas");
		}
		$panier->add($product[0]->id);
		die('Le produit a bien été ajouté à votre panier <a href="javascript:history.back()">retourner sur le catalogue</a>');
}else{
	die("Vous n'avez pas sélectionné de produits à ajouter au panier");
}

?>
