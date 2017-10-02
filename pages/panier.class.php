<?php 

class panier{

	public function __construct(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(!isset($_SESSION['panier'])){
			$_SESSION['panier'] = array();
		}
		if(isset($_GET['delPanier'])){
			$this->del($_GET['delPanier']);
		}
	}

	public function add($product_id){
		if(isset($_SESSION['panier'][$product_id])){
		$_SESSION['panier'][$product_id]++;
		}else{
		$_SESSION['panier'][$product_id] = 1;
	}
}

	public function del($product_id){
		unset($_SESSION['panier'][$product_id]);
	}

	public function recalc(){
		foreach ($_SESSION['panier'] as $product_id => $quantity){
			$_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id];
		}
			$_SESSION['panier'] = $_POST['panier']['quantity'];

	}


}
