<?php 

$json = array('error => true');



if(isset($_GET['id'])){
	$product = $DB->query('SELECT id FROM produits WHERE id=:id', array('id' => $_GET['id']));
	var_dump($product);
		if(empty($product)){
			$json['message'] = "Ce produit n'existe pas";
		}
		$panier->add($product[0]->id);
		$json['error'] = false;
		$json['message'] = 'Le produit a bien été ajouté à votre panier <a href="javascript:history.back()">retourner sur le catalogue</a>';
}else{
	$json['message'] = "Vous n'avez pas sélectionné de produits à ajouter au panier";
}

echo json_encode($json);

?>
