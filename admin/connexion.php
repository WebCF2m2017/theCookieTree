<?php
if(isset($_POST['pseudo'])&&isset($_POST['mdp'])){
    $login = htmlspecialchars(strip_tags(trim($_POST['pseudo'])),ENT_QUOTES);
    $mdp = trim($_POST['mdp']);
    $mdp = sha256($mdp);
    if($login){
        $sql="SELECT u.id, u.login, u.mdp, 
            d.id AS idrole
            FROM util u  
            INNER JOIN droit d ON d.id= u.droit_id
            WHERE u.login = '$login' AND u.mdp = '$mdp';
            ";
        $recup_util = mysqli_query($db, $sql)or die(mysqli_error($db));
        
        if(mysqli_num_rows($recup_util)){
            $_SESSION = mysqli_fetch_assoc($recup_util);
            $_SESSION['clef_de_session']=session_id();
            header("Location: ./"); 
        }else{ 
            $erreur = "Login et/ou mot de passe incorrecte(s)!";
        }
    }else{
        header("Location: ?connexion");
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
    <br /><br />
    <label for="mdp">Mot de passe <span class="required">*</span></label>
    <br />

    <input type="password" name="mdp" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Mot de passe" /><br />
</div>
</div>
</div>
    
    <div class="row">
    <div class="form-group">
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal">

            <input type="submit" class="form-control btn btn-primary" value="Connexion"  />
            <a href="?inscription">Pas encore inscrit ?</a><br>
            <a href="?reset">J'ai oublié mon mot de passe</a>
    </div>
    </div>
    </div>
    </div>    
        </form>
    </div>
        <?php
            if(isset($erreur)){ echo "<h3>$erreur</h3>";}
        ?>
