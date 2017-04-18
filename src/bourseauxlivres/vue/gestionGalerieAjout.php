<section class="contenu">
	<h1>Ajout d'une photo</h1>
		<?php 
			if($bienEnvoye){
				echo '<p><strong>Information : </strong>'.$code_retour[11].'</p>';
			}
			if($champsMalSaisie){
				echo '<p><strong>Information : </strong>'.$code_retour[4].'</p>';
			}
			if($urlFichierWrong){
				echo '<p><strong>Information : </strong>'.$code_retour[24].'</p>';
			}
			if(isset($codeRetour) && $codeRetour != 17){
				echo '<p><strong>Information : </strong>'.$code_retour[$codeRetour].'</p>';
			}
		?>	

		<form action="" method="post" enctype="multipart/form-data">
			Titre : <br />
			<input type="text" id="titre" name="titre" placeholder="Titre"><br />
			Description : <br />
			<textarea id="description" name="description" rows="10" cols="30" placeholder="Votre description..."></textarea><br />
			Fichier : <br />
			<input name="fichier" type="file">

			<input type="submit" value="Envoyer">
		</form> 
	<hr>

</section>