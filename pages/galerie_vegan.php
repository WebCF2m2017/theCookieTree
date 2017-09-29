<?php



if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
}

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

  <div class="container">
  <div class="row">

  <section class="col-md-12">

<div class="jumbotron">
  <h2>Vegan</h2>
</div>
<?php

while($vegan = mysqli_fetch_assoc($recup_sql2)){

    echo " <section class='col-md-12'>";
    echo "<div class='row' id='galerie'>";

    echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3'>";

    echo "<h3>{$vegan['titre']}</h3>";
    if(isset($_SESSION['idrole'])){
      echo " <a href='?action=update&id={$vegan['produits_id']}'><img src='./admin/img/icon_edit.png' alt='modif'/></a> ";
      echo " <a href='?action=delete&id={$vegan['produits_id']}'><img src='./admin/img/delete_doc.jpg' alt='delete'/></a> ";
    }
    echo "<p class='textes'>{$vegan['description']}</p>";

  

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