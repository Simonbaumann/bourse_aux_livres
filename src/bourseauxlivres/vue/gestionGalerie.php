<section class="contenu" style="width:100%">
	<h1 style="padding-left: 30px;">Gestion des photos</h1>
	<?php
		if ($nb_photos->nbr < NB_MAX_PHOTOS_GALERIE) {
			echo '<p style="padding-left: 15px;">
					<a href="' .ADRESSE_ABSOLUE_URL . 'gestionGalerieAjout" alt="Ajouter une nouvelle photo" title="Ajouter une nouvelle photo">Ajouter une nouvelle photo</a>
				</p>';
		}
	?>

	<table style="width:100%">
		<tr>
			<th>Titre</th>
			<th style="padding-left: 20px;">Photo</th>
			<th style="padding-left: 20px;">Description</th>
			<th>Date ajout</th>
			<th></th>
		</tr>
	<?php
		foreach($liste_photos as $photo) {
			echo 
				'<tr style="font-size:12px;">'. 
					'<td width="10%">' . $photo->titre . '</td>'.
					'<td width="28%"><img src="'. $photo->lien .'" alt="'. $photo->titre .'" width="100" height="100"></td>'.
					'<td width="50%" style="padding-left: 20px;">'. htmlspecialchars(mb_strimwidth($photo->description, 0, 50, "...")).'</td>'.
					'<td width="10%"><p style="font-size:11px; font-style:italic;">'. $t_texte->quand($photo->date_ajout) .'</p></td>'.
					'<td width="2%">
						<form method="post" action="" onsubmit="return confirmationSuppression()">
								<input type="hidden" name="idToDelete" value="' . $photo->id . '">
								<input type="submit" value="Supprimer" style="padding: 10px 10px; font-size: 12px;">
						</form>
					</td>'.
				'</tr>';
		}
	?>
	</table>

	<hr>
</section>