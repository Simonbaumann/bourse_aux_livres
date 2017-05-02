<section class="contenu"> 
<?php
	if($bienEnvoye){
		echo '<strong>Information : </strong>'.$code_retour[13];
	}

	if(!$bienEnvoye && $codeRetour != -1){
		echo '<strong>Attention : </strong>'.$code_retour[$codeRetour];
	}

	if(!$bienEnvoye){
?>
		<form action="<?php header("HTTP/1.1 303"); ?>" method="post">
			Nom de compte : <br />
			<input type="text" id="login" name="login" value="<?php echo $admin->login; ?>"><br>
			E-mail : <br />
			<input type="email" name="email" value="<?php echo $admin->email; ?>"><br>
			Mot de passe : <br />
			<input type="password" name="password" placeholder="************"><br>
			Confirmation mot de passe : <br />
			<input type="password" name="confirmPassword" placeholder="************"><br>

			<input type="submit" value="Mettre à jour">
		</form> 
<?php
	}
?>
<hr>
</section>