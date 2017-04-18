<section class="contenu">
	<h1>Visualisation du message</h1>

	<?php
		if ($codeRetour == 10) {
			echo 'Erreur ! ' . $code_retour[$codeRetour];
		} else {
		
			if(isset($message)){
	?>
		<p>
			<?php echo '<b>Expéditeur :</b> ' . htmlspecialchars($message->nom) . ' ' . htmlspecialchars($message->prenom) . '. <i>Envoyé le ' . $t_texte->quand($message->dateEnvoie) . '</i>';
				  echo '<br><br>';
				  echo '<b>Email :</b> ' . htmlspecialchars($message->email);?>
		</p>

		<p> 
			<b>Sujet</b> : <br />
			<?php echo htmlspecialchars($message->sujet); ?>
		</p>
		<p>
			<b>Message</b> : <br />
			<?php echo htmlspecialchars($message->message); ?>
		</p>

		<hr>
		
		<form method="post" action="" onsubmit="return confirmationSuppression()">
			<input type="hidden" name="idToDelete" value="<?php echo ($message->id); ?>">
			<input type="submit" value="Supprimer">
		</form>
	<?php
		}
	}
	?>
</section>