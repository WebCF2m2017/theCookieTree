<?php

if(!empty($_POST['pseudo'])&&!empty($_POST['mdp']) &&!empty($_POST['mdp2'])&& !empty($_POST['email']) &&!empty($_POST['nom']) &&!empty($_POST['prenom'])){
    if($_POST['mdp'] == $_POST['mdp2']){
        $pseudo = htmlspecialchars(strip_tags(trim($_POST['pseudo'])),ENT_QUOTES);
        $mdp = htmlspecialchars(strip_tags(trim($_POST['mdp'])),ENT_QUOTES);
        $mdp = sha256($mdp);
        $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        $nom = htmlspecialchars(strip_tags(trim($_POST['nom'])),ENT_QUOTES);
        $prenom = htmlspecialchars(strip_tags(trim($_POST['prenom'])),ENT_QUOTES);

        $trouvelogin = mysqli_query($db,"SELECT login FROM util WHERE login= '$pseudo'");
        if(mysqli_num_rows($trouvelogin)){
            $erreur = "<center><h2>Le pseudo que vous venez d'entrer est déjà utilisé</center></h2>";  
            }
        $trouvemail = mysqli_query($db,"SELECT mail FROM util WHERE mail= '$email'");
        if(mysqli_num_rows($trouvemail)){
            $erreur = "<center><h2>L'adresse email que vous venez d'entrer est déjà utilisée</h2></center>";  
            }

        if(!empty($_POST['entreprise'])){
            $entreprise = htmlspecialchars(strip_tags(trim($_POST['entreprise'])),ENT_QUOTES);
        }else{
            $entreprise = "/";
        }

        $insert = "INSERT INTO util (login,mdp,mail,nom,nomentreprise,prenom,droit_id) VALUES ('$pseudo','$mdp','$email','$nom','$entreprise','$prenom',1)";
        $on_insert = mysqli_query($db,$insert);
        
        if($on_insert){
            $expe = "tqh05558@loaoa.com";
            $to = $email;
            $subject = 'Inscription theCookieTree';
            $message = 'Merci de vous être inscrit chez theCookieTree. Nous vous souhaitons une agréable visite! Votre pseudo est '.$pseudo.'.';
            $headers = 'From:'.$expe.'' . "\r\n" .
            'Reply-To:'.$expe. '' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);

            $verifmail = "<center>Votre compte a bien été créer, un email vous a été envoyé</center>";

        }
    }else{
        $erreur = "<h3>Vos deux mots de passe doivent être identiques</h3>";
    }
    

}
?>

    <div class="container">
        <form action="" method="POST" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal ">
    <div class="row">
<div class="form-group">
<div class  ="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal">
    <label for="pseudo">Pseudo <span class="required">*</span></label>
    <br />
    <input type="text" id="pseudo" name="pseudo" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Pseudo" />
    <br />

    <label for="mdp">Mot de passe <span class="required">*</span></label>
    <br />
    <input type="password" name="mdp" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Mot de passe" /><br />
    <label for="mdp">Confirmation de mot de passe <span class="required">*</span></label>
    <br />
    <input type="password" name="mdp2" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Mot de passe" /><br />


    <label for="email">Email <span class="required">*</span></label>
    <br />
    <input type="email" id="email" name="email" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Email" />
    <br />
    <label for="nom">Nom <span class="required">*</span></label>
    <br />
    <input type="text" id="nom" name="nom" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Nom" />
    <br />
    <label for="prenom">Prénom <span class="required">*</span></label>
    <br />
    <input type="text" id="prenom" name="prenom" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="prenom" />
    <br />
    <label for="entreprise">Entreprise</label>
    <br />
    <input type="text" id="entreprise" name="entreprise" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Le nom de votre entreprise/commerce" />
    <br />
</div>
</div>
</div>
    
    <div class="row">
    <div class="form-group">
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal">

            <input type="submit" class="form-control btn btn-primary" value="Inscription"  />
    </div>
    </div>
    </div>
    </div>    
        </form>
    </div>
        <?php
            if(isset($erreur)){ echo "<h3>$erreur</h3>";}
            if(isset($verifmail)){echo "<h3>$verifmail</h3>";}
        ?>
