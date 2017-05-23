<?php

if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
}

$sql = "SELECT i.id, i.url, i.produits_id, p.categ_id, p.description, p.titre, p.id, c.id, c.types
    FROM img i
    INNER JOIN produits p
        ON i.produits_id = p.id
    INNER JOIN categ c
        ON c.id = p.categ_id
    WHERE p.categ_id = 1
        ORDER BY i.produits_id ASC;
    ";

$recup_sql = mysqli_query($db, $sql)or die(mysqli_error($db));
if(!mysqli_num_rows($recup_sql)){
    $erreur = "Produit introuvable!";
}else{
    $gluten = mysqli_fetch_assoc($recup_sql);
}

//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------


$sql = "SELECT i.id, i.url, i.produits_id, p.categ_id, p.description, p.titre, p.id, c.id, c.types
    FROM img i
    INNER JOIN produits p
        ON i.produits_id = p.id
    INNER JOIN categ c
        ON c.id = p.categ_id
    WHERE p.categ_id = 2
        ORDER BY i.produits_id ASC;
    ";

$recup_sql2 = mysqli_query($db, $sql)or die(mysqli_error($db));
if(!mysqli_num_rows($recup_sql2)){
    $erreur = "Description introuvable!";
}else{
    $vegan = mysqli_fetch_assoc($recup_sql2);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
  <title>Contact</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <style type="text/css">
    .hehe{
      text-align: center;
    }
  </style>
  </head>
  <body>
  <div class="row">

  <section class="col-md-12">
    <div class="jumbotron hehe">
      <h2>Galerie</h2>
    </div>

    <!-- Gluten free -->
  
    <div class="jumbotron">
      <h3><?=$gluten['types']?></h3>
    </div>
    <section class="col-md-12">

    <div class="row" id="galerie">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?php if(isset($erreur)){ echo "<h3>$erreur</h3>"; }else{ ?> 

             <h3><?=$gluten['titre']?></h3>

           <?php
            }
            ?>
            
              <?php if(isset($erreur2)){ echo "<p>$erreur</p>"; }else{ ?> 

                <p><?php echo nl2br($gluten['description'])?></p>
              
              <?php
               }
              ?>
      </div>
       <?php
            while ($gluten = mysqli_fetch_assoc($recup_sql)){
            ?>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

        <img src="<?=$gluten['url']?>" class="img-responsive img-thumbnail" alt="Tulipes" title="Tulipes" />

    </div>
               <?php
               }
              ?>
        </section>
    <!-- end of Gluten free -->


    <!-- Vegan products -->
    <?php
            while ($vegan = mysqli_fetch_assoc($recup_sql2)){
            ?>
     <div class="jumbotron">
      <h3><?=$vegan['types']?></h3>
    </div>
    <div class="row" id="galerie">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
             <section class="col-md-12">
            <?php if(isset($erreur)){ echo "<h3>$erreur</h3>"; }else{ ?> 

             <h3><?=$vegan['titre']?></h3>

           <?php
            }
            ?>
            
              <?php if(isset($erreur2)){ echo "<p>$erreur</p>"; }else{ ?> 

                <p><?php echo nl2br($vegan['description'])?></p>
              
              <?php
               }
              ?>
      </div>
         <?php
            while ($vegan = mysqli_fetch_assoc($recup_sql2)){
            ?>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

        <img src="<?=$vegan['url']?>" class="img-responsive img-thumbnail" alt="Tulipes" title="Tulipes" />
        
    </div>
         </section>       
              <?php
               }
              ?>
    <!-- end of Vegan products -->
	  
  </body>
</html>