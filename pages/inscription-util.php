<!DOCTYPE html>
<html>
<head>
	<title>Inscription utilisateur</title>
</head>
<body>
	<form method="post">
		<label>Pseudo: <input type="text" name="pseudo"/></label><br/>
		<label>Mot de passe: <input type="password" name="passe"/></label><br/>
		<label>Confirmation du mot de passe: <input type="password" name="passe2"/></label><br/>
		<label>Adresse e-mail: <input type="text" name="email"/></label><br/>
		<input type="submit" value="M'inscrire"/>
	</form>

</body>
	<?php
	if(!empty($_POST['pseudo']))
	{
	// …
		// C'est quand que tu vas commencer a travailler?
	// …
	}
	?>

</html>
