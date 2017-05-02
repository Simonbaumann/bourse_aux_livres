<section class="contenu"> 
<?php
	if($bienEnvoye){
		echo '<strong>Information : </strong>'.$code_retour[27];
	}

	if(!$bienEnvoye && $codeRetour != -1){
		echo '<strong>Attention : </strong>'.$code_retour[$codeRetour];
	}

	if(!$bienEnvoye){
?>
		<form action="<?php header("HTTP/1.1 303"); ?>" method="post">
			Nom : <br />
			<input type="text" id="nom" name="nom" placeholder="Nom"><br>
			Prénom : <br />
			<input type="text" id="prenom" name="prenom" placeholder="Prénom"><br>
			E-mail : <br />
			<input type="email" name="email" placeholder="E-mail"><br>
			Sujet : <br />
			<input type="text" name="sujet" placeholder="Sujet"><br>
			Message : <br />
			<textarea name="message" rows="10" cols="30" placeholder="Votre message..."></textarea>

			<input type="submit" value="Envoyer">
		</form> 
<?php
	}
?>
</section>