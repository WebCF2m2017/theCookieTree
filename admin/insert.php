<?php
if(!isset($_SESSION['clef_de_session'])){
    header("Location: ./");
    exit();
}
	$sql_categ ="SELECT c.id, c.types FROM categ c";
	$categ = mysqli_query($db,$sql_categ);

	if(empty($_POST)){
		?>
		<div class="container">
		<h1 class="page-header">Insertion d'article</h1>
<div class="row">

<form action="" method="POST" name="Insertion produit" class="col-lg-6 col-lg-offset-2 form-horizontal ">

<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <label for="titre">Titre du produit <span class="required">*</span></label><br />
    <input type="text" id="titre" name="titre" class="nameform form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" />
    <label for="description">Description du produit <span class="required">*</span></label><br />
    <input type="text" name="description" class="nameform form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6"  /><br />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<label>Première url d'image <span class="required">*</span></label><br/>
        <input name="url" id="url" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" ></input><br />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label>Deuxième url d'image <span class="required">*</span></label><br/>
        <input name="url1" id="url1" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" ></input><br />
</div>
</div>
<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label>Troisième url d'image  <span class="required">*</span></label><br/>
        <input name="url2" id="url2
        " class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" ></input><br />
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



<div class="btn-group pull-left">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <i class="fa fa-paper-plane" aria-hidden="true"></i>
        <input type="submit" class="btn-info btn btn-primary" value="Envoyer l'email"/>
        <?php if(isset($erreur)){echo $erreur;} ?>

</div>
</div>
<?php
	}else{
		if(!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['url']) && !empty($_POST['url1']) && !empty($_POST['url2']) && !empty($_POST['categorie'])){

			$titre =htmlspecialchars(strip_tags(trim($_POST['titre'])),ENT_QUOTES);
			$description=htmlspecialchars(strip_tags(trim($_POST['description'])),ENT_QUOTES);
			$categorie=htmlspecialchars(strip_tags(trim($_POST['categorie'])),ENT_QUOTES);
			$url=htmlspecialchars(strip_tags(trim($_POST['url'])),ENT_QUOTES);
			$url1=htmlspecialchars(strip_tags(trim($_POST['url1'])),ENT_QUOTES);
			$url2=htmlspecialchars(strip_tags(trim($_POST['url2'])),ENT_QUOTES);
			if($titre && $description && $url && $url1 && $url2 && $categorie){
				if($_SESSION['idrole'] == 1){
					$insert = "INSERT INTO produits (titre,description,categ_id) VALUES ('$titre','$description','$categorie')";
				}else{
					header("Location: ./");
            		exit();
				}
				$on_insert = mysqli_query($db, $insert);
			}else{
				echo "<h1>Veuillez remplir les champs</h1>";
			}
		}
		if($on_insert){
			$lastid = mysqli_insert_id($db);
			$insertimage ="INSERT INTO img (url,Produits_id) VALUES ('$url','$lastid'),('$url1','$lastid'),('$url2','$lastid')";
			$goinsert = mysqli_query($db,$insertimage);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertion de produits</title>
</head>
<body>

</body>
</html>