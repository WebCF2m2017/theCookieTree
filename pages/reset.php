<?php
ini_set("SMTP", "smtp.numericable.be");
$token = uniqid(rand(), true);
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();
if(!empty($_POST['email'])){
	$email = htmlspecialchars(strip_tags(trim($_POST['email'])),ENT_QUOTES);
	
	$expe = "yde75694@loaoa.com";
    $to = $email;
    $subject = 'Réinitialisation de mot de passe';
    $message = 'Vous avez demandé à réinitialiser votre mot de passe.';
    $headers = 'From:'.$expe.'' . "\r\n" .
    'Reply-To:'.$expe. '' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

    echo "<h3>Un email a bien été envoyé à ".$email."</h3>";
}
?>
<div class="container">
		<p>Entrez votre adresse électronique et cliquez sur le bouton «Réinitialiser votre mot de passe» afin que nous vous redirigions vers une page pour redéfinir un nouveau mot de passe.</p>
        <form action="?change" method="POST" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal ">
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

