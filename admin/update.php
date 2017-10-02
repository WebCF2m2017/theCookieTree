<?php
if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
    exit();
}
if($_SESSION['idrole'] != 1 || !isset($_SESSION['clef_de_session'])){
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
            echo "<center>Vous n'avez pas les droits pour modifier cet article.</center>";
        }
            
        // insertion
        $sql_insert = mysqli_query($db, $sql_insert);
        echo "<center><h3>Vous avez bien modifié l'article</h3></center>";
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
        <div class="container"> 
            <div class="row">
                <form action="" method="POST" name="modifier" class="col-lg-6 col-lg-offset-2 form-horizontal ">

                    <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <label for="titre">Titre <span class="required">*</span></label><br />
                            <input type="text" name="titre" value='<?=$ligne['titre']?>' class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" placeholder="Titre" /><br />

                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Votre descriptif <span class="required">*</span></label><br />
                            <textarea name="letexte" id="field5" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12"><?=$ligne['description']?></textarea><br />
                    </div>
                    </div>
                    <input type="hidden" name="categ_id" value='<?=$ligne['categ_id']?>' />
            <div class="row">
            <div class="btn-group pull-left">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <i class="fa fa-paper-plane" aria-hidden="true"></i>
        <input type="submit" class="btn-info btn btn-primary" value="Modifier"/>
        <?php if(isset($erreur)){echo $erreur;} ?>
            </div>
            </div>
            </div>
        </form>
            <?php
                }
                ?>
    
    </body>
</html>