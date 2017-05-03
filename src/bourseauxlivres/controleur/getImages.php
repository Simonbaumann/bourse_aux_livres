<?php

	/* TODO 
	* Il nous faut récuperer la requête get côté ajax
	* Si c'est ok alors on retourne la liste des iamges en bdd
	* Si c'est pas bon alors emettre erreur
	* et si aucune bonne requête est définit (pas de get) on die la page
	*/

	if(isset($_POST) && isset($_POST['image'])){

		/**** MODELE ****/
		require_once('modele/m_admin.php');
		require_once('modele/m_slider.php');
		require_once('modele/m_utilisateur.php');

		/**** OBJETS ****/
		$m_galerie = new m_galerie($base_de_donnee);
		
		$liste_photos = $m_galerie->listerPhotos();
	}else{
		exit();
	}

	
?>