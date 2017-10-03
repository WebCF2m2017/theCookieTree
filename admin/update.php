<?php
if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
    exit();
}

if(!isset($_GET['id'])|| !ctype_digit($_GET['id'])){
    header("Location: ./");
    exit();
}
$id = (int)$_GET['id'];
// si on est admin on prend tous les utilisateurs pour le select
if($_SESSION['idrole']==1){
    $recup_produit = "SELECT id, titre, description, categ_id from produits where id=$id";
    $select_produit = mysqli_query($db,$recup_produit);
}

// si le formulaire est envoyé
if(isset($_POST['titre'])&&isset($_POST['letexte'])&&isset($_POST['categ_id'])){
    // mise en variable locale
    $titre = htmlspecialchars(strip_tags(trim($_POST['titre'])),ENT_QUOTES);
    $texte = htmlspecialchars(strip_tags(trim($_POST['letexte'])),ENT_QUOTES);
    // si l'id est un format non valide (tentative d'attaque), il vaudra 0
    $categ_id = (int) $_POST['categ_id'];
    
    // vérification de validité des champs (ils envoient tous == true)
    if($titre&&$texte&&$categ_id){
        // si on est utilisateur
        if($_SESSION['idrole']==1){
            $id = (int)$_GET['id'];
            $sql_insert = "UPDATE produits SET titre='$titre', description='$texte',categ_id='$categ_id' where id='$id'";
        }else{
            echo"Vous n'avez pas les droits pour modifier cet article.";
        }
            
        // insertion
        $sql_insert = mysqli_query($db, $sql_insert);
        echo "Vous avez bien modifié l'article";
        echo"<script>
            window.setTimeout(function() {
            window.location = './';}, 5000);
            </script>";
    }else{
        $erreur ="Veuillez remplir tous les champs <a href='#' onclick='history.go(-1);'>Retour au formulaire</a>";
    }
    
}else{
    
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administration - Update</title>
    </head>
    <body>
        
        <?php
                while($ligne= mysqli_fetch_assoc($select_produit)){
                    ?>
                    <form action="" name="onsenfout" method="POST">
            <input type="text" name="titre" placeholder="Titre" value='<?=$ligne['titre']?>' required /><br/>
            <textarea name="letexte" placeholder="Description" required><?=$ligne['description']?></textarea><br/>
            <?php
            // on est utilisateur
            if($_SESSION['idrole']==1){
            ?>
            
            <input type="hidden" name="categ_id" value='<?=$ligne['categ_id']?>' />
            <?php
            // 
            }else{
            ?>
            

            <?php
            }
            if(isset($erreur)){
                echo $erreur;
            }
            ?>

            <input type="submit" value="Modifier" />
        </form>
            <?php
                }
                ?>
    
    </body>
</html>