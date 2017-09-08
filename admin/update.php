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
if($_SESSION['idrole']==1){
    $sql = "SELECT id, login FROM util ORDER BY login ASC;";
    $recup_util = mysqli_query($db,$sql);
}

// si le formulaire est envoyé
if(isset($_POST['titre'])&&isset($_POST['description'])&&isset($_POST['categ_id'])){
    // mise en variable locale
    $titre = htmlspecialchars(strip_tags(trim($_POST['titre'])),ENT_QUOTES);
    $texte = htmlspecialchars(strip_tags(trim($_POST['description'])),ENT_QUOTES);
    // si l'id est un format non valide (tentative d'attaque), il vaudra 0
    $categ_id = (int) $_POST['categ_id'];
    
    // vérification de validité des champs (ils envoient tous == true)
    if($titre&&$description&&$categ_id){
        // si on est utilisateur
        if($_SESSION['idrole']==1){
            // on vérifie que l'auteur poste en son nom
            if($categ_id==$_SESSION['id']){
                $sql_insert = "INSERT INTO produits (titre,description,categ_id) VALUES ('$titre','$description',$categ_id);";
            }
        }else{
            $sql_insert = "INSERT INTO produits (titre,description,categ_id) VALUES ('$titre','$description',$categ_id);";
        }
        // insertion
        $sql_insert = mysqli_query($db, $sql_insert);
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
        <h2>Vous êtes connecté en tant que <?=$_SESSION['login']?></h2>
        <h3><a href="./">Accueil</a> <a href="?action=update">Modifier</a> <a href="?action=deco">Se déconnecter</a></h3>
        <form action="" name="onsenfout" method="POST">
            <input type="text" name="titre" placeholder="Description" required /><br/>
            <textarea name="letexte" placeholder="Votre texte" required></textarea><br/>
            <?php
            // on est utilisateur
            if($_SESSION['idrole']==1){
            ?>
            
            <input type="hidden" name="categ_id" value='<?=$_SESSION['id']?>' />
            <?php
            // 
            }else{
            ?>
            <select name="categ_id">
                <option value='0'>Choisir</option>
                <?php
                while($ligne= mysqli_fetch_assoc($recup_util)){
                    echo "<option value='{$ligne['id']}'>{$ligne['login']}</option>";
                }
                ?>
            </select>

            <?php
            }
            if(isset($erreur)){
                echo $erreur;
            }
            ?>

            <input type="submit" value="Envoyer" />
        </form>
    </body>
</html>