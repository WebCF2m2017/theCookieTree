<?php
if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
    exit();
}

if(!isset($_GET['id'])|| !ctype_digit($_GET['id'])){
    header("Location: ./");
    exit();
}

// si on est admin ou modo on prend tous les utilisateurs pour le select
if($_SESSION['droit_id']!=1){
    $sql = "SELECT id, login FROM util ORDER BY login ASC;";
    $recup_util = mysqli_query($db,$sql);
}

// si le formulaire est envoyé
if(isset($_POST['titre'])&&isset($_POST['description'])&&isset($_POST['categ_id'])){
    // mise en variable locale
    $letitre = htmlspecialchars(strip_tags(trim($_POST['titre'])),ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['description'])),ENT_QUOTES);
    // si l'id est un format non valide (tentative d'attaque), il vaudra 0
    $categ_id = (int) $_POST['categ_id'];
    
    // vérification de validité des champs (ils envoient tous == true)
    if($titre&&$description&&$categ_id){
        // si on est utilisateur
        if($_SESSION['droit_id']==1){
            // on vérifie que l'auteur poste en son nom
            if($categ_id==$_SESSION['id']){
                $sql_insert = "INSERT INTO produits (titre,description,categ_id) VALUES ('$titre','$description',$categ_id);";
            }
        }else{
            $sql_insert = "INSERT INTO produits (titre,description,categ_id) VALUES ('$titre','$description',$categ_id);";
        }
        // insertion
        $on_insert = mysqli_query($db, $sql_insert);
        header("Location: ./");
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

    </body>
</html>