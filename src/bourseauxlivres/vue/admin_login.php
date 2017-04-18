<section class="contenu">
	<h1 class="titre1">Page de connexion - panel administrateur</h1>
<?php
	if($codeRetour != -1){
		echo '<center><strong>Information : </strong>'.$code_retour[$codeRetour].'</center>';
	}
?>
	<form action="" method="post">
		Nom de compte : <br />
		<input type="text" id="login" name="login" placeholder="Votre nom de compte..."><br>
		Mot de passe : <br />
		<input type="password" id="password" name="password" placeholder="*****"><br>
		<input type="submit" value="Se connecter">
	</form>
</section>