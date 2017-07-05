<?php
if(isset($_POST['nom'])&& 
    isset($_POST['login'])&&
    isset($_POST['mail'])&&
    isset($_POST['checkboxes'])&&
    isset($_POST['text'])&&
    isset($_POST['conditions'])&&

    !empty($_POST['nom'])&&
    !empty($_POST['login'])&&
    !empty($_POST['mail'])&&
    !empty($_POST['checkboxes'])&&
    !empty($_POST['text'])&&
    !empty($_POST['conditions'])){




    $lemail = filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL);     
    $login = trim($_POST['login']);
    $nom = trim($_POST['nom']);
    $letexte = trim($_POST['text']);
    $gateaux = $_POST['checkboxes'];
    $conditions = $_POST['conditions'];
        
        if($lemail){
          //  $to ='marjolainepapin@gmail.com';
            $to ='test@hotmail.com';
            $message = "Mail de votre site theCookieTree \r\n";
            $message .= 'Nom: '. $nom .' Prenom: ' .$login. "\r\n";
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



if(!strstr($_SERVER['PHP_SELF'],"index.php")){
    header("Location: ./");
}

$sql = "SELECT i.produits_id, p.categ_id, p.description, p.titre, c.types, GROUP_CONCAT(i.url SEPARATOR '|||') as iurl
    FROM produits p
    LEFT JOIN categ c
        ON c.id = p.categ_id
    LEFT JOIN img i
        ON i.produits_id = p.id
    WHERE p.categ_id = 1
      GROUP BY p.id
        ORDER BY i.produits_id ASC
    ;";

$recup_sql = mysqli_query($db, $sql)or die(mysqli_error($db));


//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------


$sql2 = "SELECT i.produits_id, p.categ_id, p.description, p.titre, c.types, GROUP_CONCAT(i.url SEPARATOR '|||') as iurl
    FROM produits p
    LEFT JOIN categ c
        ON c.id = p.categ_id
    LEFT JOIN img i
        ON i.produits_id = p.id
    WHERE p.categ_id = 2
      GROUP BY p.id
        ORDER BY i.produits_id ASC
    ;";

$recup_sql2 = mysqli_query($db, $sql2)or die(mysqli_error($db));

//-----------------------------------------------------

$sql3 = "SELECT u.login, u.nomentreprise as nom, u.mail
    FROM util u   
    WHERE u.id = 1
    ;";

$recup_sql3 = mysqli_query($db, $sql3)or die(mysqli_error($db));


//----------------------------------

$sql4 = "SELECT p.id as product_id, p.titre, c.id, c.types
    FROM produits p    
      INNER JOIN categ c 
    ON c.id = p.categ_id
    ;";

$recup_sql4 = mysqli_query($db, $sql4)or die(mysqli_error($db));

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
  <title>Contact</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.galerie.css">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
    <script src="js/commandejs.js"></script>
  </head>
  <body>
   <?php include_once 'menu.php'; 
        while($util = mysqli_fetch_assoc($recup_sql3)){
   ?>
   <div class="container">
  
            <form class="form-horizontal" method="POST" action="">
      <fieldset>

      <!-- Form Name -->
      <legend>Form Name</legend>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Utilisateur</label>  
        <div class="col-md-4">
        <?php
       echo "<input id='textinput' name='login' type='text' value='{$util['login']}' class='form-control input-md'>"
          ?>
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Entreprise</label>  
        <div class="col-md-4">
        <?php
        echo "<input id='textinput' name='nom' type='text' value='{$util['nom']}' class='form-control input-md'>"
          ?>
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">E-mail</label>  
        <div class="col-md-4">
        <?php
        echo "<input id='textinput' name='mail' type='text' placeholder='placeholder' value='{$util['mail']}' class='form-control input-md'>"
          ?>
        </div>
      </div>

      <!-- Multiple Checkboxes -->

      <div class="form-group">
        <label class="col-md-4 control-label" for="checkboxes">Multiple Checkboxes</label>
        <div class="col-md-4">
      <?php while($gateaux = mysqli_fetch_assoc($recup_sql4)): ?>
        <div class="checkbox">
          <label for="checkboxes-<?= $gateaux['product_id'] ?>">
            <input type="checkbox" name="checkboxes[<?= $gateaux['product_id'] ?>]" id="checkboxes-<?= $gateaux['product_id'] ?>" value="true">
            <?php echo $gateaux['titre'] ?>
          </label>
        </div>
      <?php endwhile; ?>
      

        </div>
      </div>
  
      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textarea">Instructions ou extas</label>
        <div class="col-md-4">                     
          <textarea class="form-control" id="textarea" name="text"></textarea>
        </div>
      </div>

      <!-- Multiple Checkboxes -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="checkboxes">Conditions Générales de Vente</label>
        <div class="col-md-4">
        <div class="checkbox">
          <label for="checkboxes-0">
            <input type="checkbox" name="conditions" id="checkboxes-0" value="1">
            Je suis d'accord.
          </label>
        </div>
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton">Commander</label>
        <div class="col-md-4">
          <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-success">Commander</button>
        </div>
      </div>

      </fieldset>
      </form>
      <?php } ?>
  
   </div>
  </body>
</html>