<?php 

$panier = new panier();


if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
}

$sql = "SELECT i.produits_id, p.categ_id, p.description, p.titre, c.types, GROUP_CONCAT(i.url SEPARATOR '|||') as iurl
    FROM produits p
    LEFT JOIN categ c
        ON c.id = p.categ_id
    LEFT JOIN img i
        ON i.produits_id = p.id
    WHERE p.categ_id = 1
      GROUP BY p.id
        ORDER BY i.produits_id ASC
    ;";

$recup_sql = mysqli_query($db, $sql)or die(mysqli_error($db));

  $sql2 = "SELECT i.produits_id, p.categ_id, p.description, p.titre, c.types, GROUP_CONCAT(i.url SEPARATOR '|||') as iurl
    FROM produits p
    LEFT JOIN categ c
        ON c.id = p.categ_id
    LEFT JOIN img i
        ON i.produits_id = p.id
    WHERE p.categ_id = 2
      GROUP BY p.id
        ORDER BY i.produits_id ASC
    ;";

$recup_sql2 = mysqli_query($db, $sql2)or die(mysqli_error($db));


?>
  <script>
     function maConfirm(id){
         var a = confirm("Voulez vous vraiment supprimer cet article? ID="+id);
         if(a){
             document.location.href="?action=delete&id="+id;
         }
     }
 </script>
  <div class="container">
  <div class="row">

  <section class="col-md-12">

<div class="page-header">
  <center><h2>Au-delà du blé</h2></center>
</div>
<?php

while($gluten = mysqli_fetch_assoc($recup_sql)){

    echo " <section class='col-md-12'>";
    echo "<div class='row' id='galerie'>";

    echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3'>";

    echo "<h3>{$gluten['titre']}</h3>";
    if(isset($_SESSION['idrole']) && $_SESSION['idrole'] == 1){
      echo " <a href='?action=update&id={$gluten['produits_id']}'><img src='./admin/img/icon_edit.png' alt='modif'/></a> ";
      echo " <a href='' onclick='maConfirm({$gluten['produits_id']});return false;'><img src='./admin/img/delete_doc.jpg' alt='supprimer'/></a> ";
    }
    echo "<p class='textes'>{$gluten['description']}</p>";


    echo "<a href='?id={$gluten['produits_id']}' onclick='bienajoute();' class='add addPanier'><h4 style='color:black;'><img width='40' heigt='40' src='images/add.png'/>Ajouter au panier</h4></a> ";

    
  

    echo "</div>";

              echo " <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'> ";

                    $url = explode("|||",$gluten['iurl']);
                
                    for ($i=0; $i<count($url);$i++){
                      if(empty($url[$i])){

                        echo "";

                      }else{
                        
              echo " <div class='img-thumbs-3'> ";
                   if($i==0){
                    echo "<a href='{$url[$i]}' data-title='{$gluten['titre']}<br>{$gluten['description']}' data-lightbox='Triple'><img class='img-responsive img-thumbnail' src='{$url[$i]}' alt='{$gluten['titre']}' title='{$gluten['titre']}'></a>";
                 }else{
                  echo "<a href='{$url[$i]}' data-title='{$gluten['titre']}<br>{$gluten['description']}' data-lightbox='Triple'><img style='display:none' src='{$url[$i]}' alt='{$gluten['titre']}' title='{$gluten['titre']}'></a>";
                 }


              echo "</div>";


                }
            }
              echo "</div>";

  }

      echo "</section>";
  ?>
  </div>

  <script>
     function maConfirm(id){
         var a = confirm("Voulez vous vraiment supprimer cet article? ID="+id);
         if(a){
             document.location.href="?action=delete&id="+id;
         }
     }
 </script>
  <div class="container">
  <div class="row">

  <section class="col-md-12">

<div class="page-header">
  <center><h2>Vegan</h2></center>
</div>
<?php

while($vegan = mysqli_fetch_assoc($recup_sql2)){

    echo " <section class='col-md-12'>";
    echo "<div class='row' id='galerie'>";

    echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3'>";

    echo "<h3>{$vegan['titre']}</h3>";
    if(isset($_SESSION['idrole']) && $_SESSION['idrole'] == 1){
      echo " <a href='?action=update&id={$vegan['produits_id']}'><img src='./admin/img/icon_edit.png' alt='modif'/></a> ";
      echo " <a href='' onclick='maConfirm({$vegan['produits_id']});return false;'><img src='./admin/img/delete_doc.jpg' alt='supprimer'/></a> ";
    }
    echo "<p class='textes'>{$vegan['description']}</p>";

    echo "<a href='?id={$vegan['produits_id']}' class='add addPanier' onclick='bienajoute();'><h4 style='color:black;'><img width='40' heigt='40' src='images/add.png'/>Ajouter au panier</h4></a> ";



    echo "</div>";

              echo " <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'> ";

                    $url = explode("|||",$vegan['iurl']);
                
                    for ($i=0; $i<count($url);$i++){
                      if(empty($url[$i])){

                        echo "";

                      }else{
                        
              echo " <div class='img-thumbs-3'> ";
              
                   if($i==0){
                    echo "<a href='{$url[$i]}' data-title='{$vegan['titre']}<br>{$vegan['description']}' data-lightbox='Triple'><img class='img-responsive img-thumbnail' src='{$url[$i]}' alt='{$vegan['titre']}' title='{$vegan['titre']}'></a>";
                 }else{
                  echo "<a href='{$url[$i]}' data-title='{$vegan['titre']}<br>{$vegan['description']}' data-lightbox='Triple'><img style='display:none' src='{$url[$i]}' alt='{$vegan['titre']}' title='{$vegan['titre']}'></a>";
                 }


              echo "</div>";


                }
            }
              echo "</div>";

  }

      echo "</section>";
  ?>
  </div>