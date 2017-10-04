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
            $to ='test@gmail.com';
            $subject = "Mail de votre site theCookieTree \r\n";
            $message = 'Nom: '. $nom . "\r\n";
            $message .= 'Prenom: ' .$prenom. "\r\n";
            $message .= "Message: \r\n";
            $message .= $letexte;

            $headers =   'From: '. $lemail . "\r\n" .
                         'Reply-To: '. $lemail . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();


            if (mail($to, $message, $headers))
                $mailsent = '<p style="text-align: center;"> Mail envoyé! </p>';
            if (mail($to, $subject, $message, $headers))
                $mailsent = '<center><h2> Mail envoyé! </h2></center>';
            else
               die('Error');

        }else{
             $erreur = " <a href='#' class='btn btn-danger' onclick='history.go(-1)'>Retour sur le formulaire</a> <h5>Verifiez tous les champs.</h5>";
        }
} 

?>
        


<div class="container"> 
<div class="row">

<form action="" method="POST" name="envoiemail" class="col-lg-8 col-lg-offset-2 form-horizontal ">

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
        
</div>
</div>
</div>
</form>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <address style="text-align: center;">
           <h3>Pour me contacter :</h3>
           <strong>Marjolaine Papin</strong><br>
           <strong>+32 (0) 470 82 74 95</strong><br>
           <strong>marjolainepapin@gmail.com</strong><br>

             <a class="btn btn-facebook btn-primary btn-info" href="https://www.facebook.com/TheOrganicCookieTree" target="_blank">
                <span class="fa fa-facebook"> Facebook</span>
              </a> 

              <a class="btn btn-instagram btn-primary btn-info" href="https://www.instagram.com/thecookietreebrussels" target="_blank">
                <span class="fa fa-instagram"> Instagram</span>
              </a>

        

        </address>
        
</div>
</div>

</div>

    <?php
    if(isset($mailsent)){echo  $mailsent;} 
    if(isset($erreur)){echo $erreur;}
    ?>
    

</div>