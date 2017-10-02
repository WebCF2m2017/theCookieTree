<?php
if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
    exit();
}

if($_SESSION['idrole']!=1){
    header("Location: ./");
    exit();
}

if(!isset($_GET['id'])|| !ctype_digit($_GET['id'])){
    header("Location: ./");
    exit();
}

$id_a_sup = (int) $_GET['id'];
    $sup_img = mysqli_query($db,"DELETE FROM img WHERE Produits_id=$id_a_sup");
    $sup_art = mysqli_query($db,"DELETE FROM produits WHERE id=$id_a_sup;");

if(!mysqli_affected_rows($db)){
    $affiche ="Produit introuvable, et donc non supprimé!";
}else{
    $affiche = "<center><h3>Votre produit a bien été supprimé!</h3></center>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administration - Supression</title>
       
    </head>
    <body>
            
        <div id="produits">
            
            <?php
            echo $affiche;
            ?>
            
        </div>
        </p>
    </body>
</html>