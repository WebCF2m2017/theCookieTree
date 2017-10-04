<?php
if(!isset($_SESSION['clef_de_session']) || $_SESSION['idrole'] != 1){
    header("Location: ./");
    exit();
}
	$sql_categ ="SELECT c.id, c.types FROM categ c";
	$categ = mysqli_query($db,$sql_categ);

	if(empty($_POST)){
		?>
		
<?php
	}else{
		if(!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['categorie'])){
			if(!empty($_POST['url'])){

			$titre =htmlspecialchars(strip_tags(trim($_POST['titre'])),ENT_QUOTES);
			$description=htmlspecialchars(strip_tags(trim($_POST['description'])),ENT_QUOTES);
			$categorie=htmlspecialchars(strip_tags(trim($_POST['categorie'])),ENT_QUOTES);
			$url=htmlspecialchars(strip_tags(trim($_POST['url'])),ENT_QUOTES);
			if($titre && $description && $categorie){
				if($url){
				if($_SESSION['idrole'] == 1){
					$insert = "INSERT INTO produits (titre,description,categ_id) VALUES ('$titre','$description','$categorie')";
				}else{
					header("Location: ./");
            		exit();
				}
			}
				$on_insert = mysqli_query($db, $insert);
			}else{
				echo "<h1>Veuillez remplir les champs</h1>";
			}
			}
		}
		if(isset($on_insert)){
			$lastid = mysqli_insert_id($db);
			$insertimage ="INSERT INTO img (url,Produits_id) VALUES ('$url','$lastid')";
			$goinsert = mysqli_query($db,$insertimage);
			$gginsert = "<h3>Vous avez bien insérer votre produit!</h3>";
		}else{
			$erreur =  "<h3>Il y a eu une erreur, veuillez réessayez";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertion de produits</title>
</head>
<body>
	<div class="container">
		<center><h1 class="page-header">Insertion d'article</h1></center>
<div class="row">

<form action="" method="POST" name="Insertion produit" class="col-lg-6 col-lg-offset-2 form-horizontal ">

<div class="form-group">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <label for="titre">Titre <span class="required">*</span></label><br />
        <input type="text" name="titre" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" placeholder="Titre" /><br />

</div>
</div>
<div class="form-group">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label>Votre descriptif <span class="required">*</span></label><br />
        <textarea name="description" id="field5" placeholder="Votre texte" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12"></textarea><br />
    </div>
    </div>

<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<label>Url d'image <span class="required">*</span></label><br/>
        <input name="url" id="url" placeholder="Insérez une url d'image" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" ></input><br />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


        <label for="categorie">Catégorie <span class="required">*</span></label><br />
            <select name="categorie">
                <option value='0'>Choisir</option>
                <?php
                while($ligne= mysqli_fetch_assoc($categ)){
                    echo "<option value='{$ligne['id']}'>{$ligne['types']}</option>";
                }
                ?>
            </select>
</div>
</div>



<div class="row">
    <div class="btn-group pull-left">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<i class="fa fa-paper-plane" aria-hidden="true"></i>
		<input type="submit" class="btn-info btn btn-primary" value="Modifier"/>
    </div>
    </div>
    </div>
</body>
</html>
<?php
if(isset($erreur)){echo $erreur;}
if(isset($gginsert)){echo $gginsert;}
?>