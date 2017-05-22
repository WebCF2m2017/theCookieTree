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
    <section class="col-md-12">

    <div class="jumbotron">
      <h3><?=$gluten['types']?></h3>
    </div>

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
    <!-- end of Gluten free -->


    <!-- Vegan products -->
    <div class="row" id="galerie">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

       
           <h3>Barre latérale</h3>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil dicta fugiat modi fugit, ex, aspernatur ipsam! Odio, quidem odit ipsa porro nesciunt a! Voluptates ipsum, voluptas sit ea laudantium voluptate.</p>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

        <img src="https://scontent-amt2-1.xx.fbcdn.net/v/t1.0-9/17523371_1883794808545417_5979494171983979335_n.jpg?oh=7b47f34eaf37dd96d9716ba4dc441628&oe=59B9ACC0" class="img-responsive img-thumbnail" alt="Tulipes" title="Tulipes" />

      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

        <img src="https://scontent-amt2-1.xx.fbcdn.net/v/t1.0-9/17523371_1883794808545417_5979494171983979335_n.jpg?oh=7b47f34eaf37dd96d9716ba4dc441628&oe=59B9ACC0" class="img-responsive img-thumbnail" alt="Tulipes" title="Tulipes" />

      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

        <img src="https://scontent-amt2-1.xx.fbcdn.net/v/t1.0-9/17523371_1883794808545417_5979494171983979335_n.jpg?oh=7b47f34eaf37dd96d9716ba4dc441628&oe=59B9ACC0" class="img-responsive img-thumbnail" alt="Tulipes" title="Tulipes" />

      </div>
    </div>
    <!-- end of Vegan products -->
	  
  </body>
</html>