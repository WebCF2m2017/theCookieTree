<?php
$token = uniqid(rand(), true);
if(!empty($_POST['email'])){
	$email = htmlspecialchars(strip_tags(trim($_POST['email'])),ENT_QUOTES);

    $cherche = mysqli_query($db, "SELECT id as idutil FROM util WHERE mail='$email'");
    $tab = mysqli_fetch_assoc($cherche);
    if(isset($tab['idutil'])){
        $expe = "tqh05558@loaoa.com";
        $to = $email;
        $subject = 'Réinitialisation de mot de passe';
        $message = 'Lien = http://localhost/theCookieTree/?token='.$token.' Vous avez demandé à réinitialiser votre mot de passe. token=' . $token;
        $headers = 'From:'.$expe.'' . "\r\n" .
        'Reply-To:'.$expe. '' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);

        $reussis = "<h3>Un email a bien été envoyé à ".$email."</h3>";

        $insertoken = mysqli_query($db,"UPDATE util SET token ='$token' WHERE mail ='$email'");
    }else{
        $erreur = "<h3>L'adresse email que vous avez saisie n'appartient à aucun compte</h3>";
    }
    }
?>
<div class="container">
		<p>Entrez votre adresse électronique et cliquez sur le bouton «Réinitialiser votre mot de passe» afin que nous vous redirigions vers une page pour redéfinir un nouveau mot de passe.</p>
        <form action="" method="POST" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal ">
    		<div class="row">
				<div class="form-group">
				<div class  ="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal">
    				<label for="email">Email</label>
    				<br />
    				<input type="email" id="email" name="email" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Email" />
    				<input type="hidden" name="token" id="token" value="<?= $token ?>">
				</div>
				</div>
			</div>
    
    		<div class="row">
    		<div class="form-group">
    		<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal">

            <input type="submit" class="form-control btn btn-primary" value="Réinitialisez votre mot de passe"  />
    		</div>
    		</div>
    		</div>
    </form>
</div>
<?php
    if(isset($erreur)){echo $erreur;}
    if(isset($reussis)){echo $reussis;}
?>

