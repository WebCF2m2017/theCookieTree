<?php
if(isset($_POST['lemail'])&& 
    isset($_POST['letexte'])&&
    !empty($_POST['lemail'])&&
    !empty($_POST['letexte'])){


    $lemail = filter_var($_POST['lemail'],FILTER_VALIDATE_EMAIL);     
    $letexte = trim($_POST['letexte']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
        
        if($lemail){
          //  $to ='marjolainepapin@gmail.com';
            $to ='test@hotmail.com';
            $message = "Mail de votre site theCookieTree \r\n";
            $message .= 'Nom: '. $nom .' Prenom: ' .$prenom. "\r\n";
            $message .= "message: \r\n";
            $message .= $letexte;

            $headers =   'From: '. $lemail . "\r\n" .
                         'Reply-To: '. $lemail . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();


            if (mail($to, $message, $headers))
                $mailsent = '<p style="text-align: center;"> Mail envoyé! </p>';
            else
               die('Error');

        }else{
             $erreur = " <a href='#' class='btn btn-danger' onclick='history.go(-1)'>Retour sur le formulaire</a> <h5>Verifiez tous les champs.</h5>";
        }
} 

?>
        


<div class="container"> 
<div class="row">

<form action="" method="POST" name="envoiemail" class="col-lg-6 col-lg-offset-2 form-horizontal ">

<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <label for="prenom">Nom et prénom <span class="required">*</span></label><br />
    <input type="text" id="prenom" name="prenom" class="nameform form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Nom" />
    <input type="text" name="nom" class="nameform form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Prénom" /><br />
</div>
</div>


<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <label for="lemail">Email <span class="required">*</span></label><br />
        <input type="email" name="lemail" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" placeholder="Email" /><br />

</div>
</div>


<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label>Votre message <span class="required">*</span></label><br />
        <textarea name="letexte" id="field5" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" placeholder="Votre message"></textarea><br />
</div>
</div>

<div class="row">
<div class="btn-group pull-left">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <i class="fa fa-paper-plane" aria-hidden="true"></i>
        <input type="submit" class="btn-info btn btn-primary" value="Envoyer l'email"/>
        <?php if(isset($erreur)){echo $erreur;} ?>
</div>
</div>
</div>
</form>

<aside class="col-lg-2 col-lg-offset-1 ">
        <address>
           <p>Pour me contacter :</p>
           <strong>Marjolaine Papin</strong><br>
           +32 (0) 470 82 74 95<br>
           marjolainepapin@gmail.com
        </address>
</aside>
</div>

</div>


    
    <?php
    if(isset($mailsent)){
        echo '<h2>' . $mailsent . '</h2>';
    }
    ?>
    

</div>