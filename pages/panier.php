<?php

if(isset($_GET['del'])){
  $panier->del($_GET['del']);
}

var_dump($_SESSION);



    if(isset( $_SESSION['id'])&& ctype_digit( $_SESSION['id'])){

        $iduser = (int) $_SESSION['id'];

        $quantites = array($_SESSION['panier']);
        $emailUser = $_SESSION['mail'];
        $utilActive = $_SESSION['nom'];
        $nomentreprise = $_SESSION['nomentreprise'];

        $ids = array_keys($_SESSION['panier']);
             if(empty($ids)){
              $products = array();
             }else{
             $products = $DB->query('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');
             }
                foreach ($products as $product){
                  
                  $nomProduits = implode(array('titre' => $product->titre));

                  var_dump($nomProduits);
                  var_dump($quantites);


                  $sql = "INSERT INTO commande (produit, quantite, nomentreprise) VALUES ($iduser,'$utilActive','$emailUser',$nomProduits,$quantite,'$nomentreprise')";

                } 

                  var_dump($utilActive);
                  var_dump($emailUser);
                  var_dump($nomentreprise);

        }else {
          header('Location: ?connexion');
        }
        

    



?>

      s<div class="container">
  
            <form class="form-horizontal" method="POST" action="">
      <fieldset>

      <!-- Form Name -->
      <legend><h3>Panier</h3></legend>

      <?php 
       $ids = array_keys($_SESSION['panier']);
       if(empty($ids)){
        $products = array();
       }else{
       $products = $DB->query('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');
       }
        foreach ($products as $product): 

      ?>


      
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">
        
        <h3 class="prodname" name="produit"><?= $product->titre; ?></h3>
        <input type="hidden" name="titre" value="<?= $product->titre; ?>">

        </label>  
          <div class="col-md-4">
         <span class="quantity"><h3 id="del">Quantite : 

           <?= $_SESSION['panier'][$product->id]; ?>

        </h3></span>
         <a href='?delPanier=<?= $product->id; ?>' class="delPanier"><h3 id="del">Supprimé cette article.</h3></a>

          </div>
      </div>
       <?php endforeach; ?>

      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textarea">Instructions ou extas</label>
        <div class="col-md-4">                     
          <textarea class="form-control" name="texte" id="textarea"></textarea>

        </div>
      </div>

      <!-- Multiple Checkboxes -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="checkboxes">Conditions Générales de Vente</label>
        <div class="col-md-4">
        <div class="checkbox">
          <label for="checkboxes-0">
            
            <input type="checkbox" name="conditions" id="checkboxes-0" value="1">

            Je suis d'accord.

          </label>
        </div>
        </div>
      </div>


      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton">Commander</label>
        <div class="col-md-4">
          <button type="submit" id="singlebutton"  class="btn btn-success">Commander</button>
        </div>
      </div>
      </fieldset>
      </form>

      <?php
    if(isset($mailsent)){
        echo '<h2>' . $mailsent . '</h2>';
    }
    ?>


   </div>