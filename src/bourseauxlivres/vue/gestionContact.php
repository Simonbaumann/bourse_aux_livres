<section class="contenu" style="width:100%">
	<h1 style="padding-left: 30px;">Gestion des contacts</h1>
	

	<table style="width:100%">
		<tr>
			<th>Expéditeur</th>
			<th style="padding-left: 20px;">Sujet</th>
			<th style="padding-left: 20px;">Message</th>
			<th>Date envoi</th>
		</tr>
	<?php
		foreach($liste_messages as $message) {
			echo 
				'<tr style="font-size:12px;">'. 
					'<td width="10%">' . '<a href="' . ADRESSE_ABSOLUE_URL ."gestionContactDetail/" . $message->id . '">'. $message->nom . ' ' . $message->prenom .' </a>' . '</td>'.
					'<td width="25%" style="padding-left: 20px;">'. htmlspecialchars(mb_strimwidth($message->sujet, 0, 50, "...")) .'</td>'.
					'<td width="50%" style="padding-left: 20px;">'. htmlspecialchars(mb_strimwidth($message->message, 0, 50, "...")) .'</td>'.
					'<td width="10%"><p style="font-size:11px; font-style:italic;">'. $t_texte->quand($message->dateEnvoie) .'</p></td>'.
					'<td width="2%">
						<form method="post" action="" onsubmit="return confirmationSuppression()">
								<input type="hidden" name="idToDelete" value="' . $message->id . '">
								<input type="submit" value="Supprimer" style="padding: 10px 10px; font-size: 12px;">
						</form>
					</td>'.
				'</tr>';
		}
	?>
	</table>

	<hr>
</section>