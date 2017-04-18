<section class="contenu">
	<h1>Gestion de l'accueil</h1>
	<?php
		if($bienEnvoye){
			echo '<strong>Information : </strong>'.$code_retour[11];
		}
	?>
		<form action="<?php header("HTTP/1.1 303"); ?>" method="post">
			Message : <br />
			<div id="bbcode">
				<ul>
					<li><button type="button" class="btn btn-primary" title="Gras"  onclick="gras(message)">B</button></li>
					<li><button type="button" class="btn btn-primary" title="Italic" onclick="italic(message)">I</span></button></li>
					<li><button type="button" class="btn btn-primary" title="Souligné" onclick="souligne(message)"><b>U</b></button></li>
					<li><button type="button" class="btn btn-primary" title="Gauche" onclick="gauche(message)">gauche</span></button></li>
					<li><button type="button" class="btn btn-primary" title="Centré" onclick="centré(message)">centre</span></button></li>
					<li><button type="button" class="btn btn-primary" title="Droite" onclick="droite(message)">droite</span></button></li>
					<li><button type="button" class="btn btn-primary" title="Justifié" onclick="justifie(message)">justifié</span></button></li>
					<li><button type="button" class="btn btn-primary" title="Lien" onclick="lien(message)">Lien</span></button></li>
					<li><button type="button" class="btn btn-primary" title="Titre 1" onclick="titre1(message)">T<sub>1</sub></button></li>
					<li><button type="button" class="btn btn-primary" title="Titre 2" onclick="titre2(message)">T<sub>2</sub></span></button></li>
					<li><button type="button" class="btn btn-primary" title="Titre 3" onclick="titre3(message)">T<sub>3</sub></span></button></li>
				</ul>
			</div>
			<textarea id="message" name="message" rows="2000" cols="20" placeholder="Votre message..." style="height:800px;"><?php echo $t_texte->convertHtmlToBBcode($accueil->contenu); ?></textarea>

			<input type="submit" value="Envoyer">
		</form> 

</section>