<?php 
	if(isset($liste_photos)){
		foreach($liste_photos as $photo) {
			echo '<img src="' . $photo->lien . '" height="800px" width="100%"/>';
		}
	}
?>
