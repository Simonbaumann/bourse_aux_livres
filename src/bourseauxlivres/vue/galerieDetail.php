<section class="contenu"> <!-- pas plus que 10 images -->

	<?php
		if ($codeRetour == 10) {
			echo 'Erreur ! '. $code_retour[$codeRetour];
		} else {
		
			if(isset($photo)){
	?>
		<h1>Détail de l'image <?php echo $photo->titre ?></h1>
	<?php
		}
	}
	?>

	
</section>