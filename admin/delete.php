<?php
if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
    exit();
}

if($_SESSION['']==1){
    header("Location: ./");
    exit();
}

if(!isset($_GET['id'])|| !ctype_digit($_GET['id'])){
    header("Location: ./");
    exit();
}

$id_a_sup = (int) $_GET['id'];
    
$sup_art = mysqli_query($db,"DELETE FROM produits WHERE id=$id_a_sup;");

if(!mysqli_affected_rows($db)){
    $affiche ="Produit introuvable, et donc non supprimé!";
}else{
    $affiche = "Votre produit a bien été supprimé!";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administration - Supression</title>
       
    </head>
    <body>
        <h1>(Test) bonjour<?=$_SESSION['login']?></h1>
        <h2>(test) Vous êtes connecté en tant que <?=$_SESSION['permission']?></h2>
        <h3><a href="./">Accueil</a>
            
            <?php
            if($_SESSION['']!=1){
                ?>
            <a href="?action=insert">Insérer</a>
            <?php
            }
            ?>
            <a href="?action=deco">Se déconnecter</a></h3>
        
        <div id="produits">
            
            <?php
            echo $affiche;
            ?>
            
        </div>
        </p>
    </body>
</html>