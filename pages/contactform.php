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
                $mailsent = '<p> Mail envoyé! </p>';
            else
               die('Error');

        }else{
             $erreur = " <a href='#' class='btn btn-danger' onclick='history.go(-1)'>Retour sur le formulaire</a> <h5>Verifiez tous les champs.</h5>";
        }
} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <style type="text/css">
            textarea {
            max-width:100%;
        }
        .nameform{
            width: 50%;
        }
        h5{
            text-align: left;
        }
        </style>
</head>
<body>
    <div class="container">
		<h1 class="page-header">Titre</h1>
	<form action="" method="POST" name="envoiemail" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal ">
    
<div class="row">
<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <label for="prenom">Full Name <span class="required">*</span></label><br />
    <input type="text" id="prenom" name="prenom" class="nameform form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="First" />
    <input type="text" name="nom" class="nameform form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Last" /><br />
</div>
</div>
</div>
<div class="row">
<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <label for="lemail">Email <span class="required">*</span></label><br />
        <input type="email" name="lemail" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12"  /><br />

</div>
</div>
</div>
<div class="row">
<div class="form-group">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label>Your Message <span class="required">*</span></label><br />
        <textarea name="letexte" id="field5" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12"></textarea><br />
</div>
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
    
    <?php
    if(isset($mailsent)){
        echo '<h2>' . $mailsent . '</h2>';
    }
    ?>
    
</form>
</div>
</body>
</html>