<div class="container">
        		<form action="" method="POST" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal ">
    				<div class="row">
						<div class="form-group">
							<div class  ="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal">
    							<label for="mdp">Mot de passe <span class="required">*</span></label>
							    <br />
							    <input type="password" name="mdp" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Nouveau mot de passe" /><br />
							    <label for="mdp">Confirmation de mot de passe <span class="required">*</span></label>
							    <br />
							    <input type="password" name="mdp2" class=" form-control field-divided col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="Confirmation de mot de passe" /><br />
							</div>
						</div>
					</div>
    
    		<div class="row">
    			<div class="form-group">
    				<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-8 col-sm-offset-2 col-xs-12 form-horizontal">

            			<input type="submit" class="form-control btn btn-primary" value="Modifier"  />
    				</div>
    			</div>
    		</div>
    		</div>    
        		</form>
    		</div>
    <?php
    $token = $_GET['token'];
    		if(isset($_POST['mdp']) && isset($_POST['mdp2'])){
	    		if($_POST['mdp'] == $_POST['mdp2']){
			        $mdp = htmlspecialchars(strip_tags(trim($_POST['mdp'])),ENT_QUOTES);
			        $mdp = sha256($mdp);

			        $changer = mysqli_query($db,"UPDATE util SET mdp = '$mdp' WHERE token = '$token'");
			        if($changer){
			        	$supprimetoken = mysqli_query($db,"UPDATE util SET token ='' WHERE  token='$token'");
			        	echo "<center><h3>Votre mot de passe a bien été modifié!</h3></center>";
			        	echo"<script>
					            window.setTimeout(function() {
					            window.location = './';}, 3000);
				            </script>";
			        }
				}else{
					$erreur = "<h3>Vos deux mots de passe doivent être identiques</h3>";
				}
			}
			if(isset($erreur)){echo $erreur;}