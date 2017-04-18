<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_session.php');
	require_once('class/t_texte.php');
	require_once('class/c_utilisateur.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_admin.php');
	require_once('modele/m_slider.php');
	require_once('modele/m_galerie.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();

	$m_session = new m_session($base_de_donnee);
	$m_admin = new m_admin($base_de_donnee);
	$m_galerie = new m_galerie($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_admin);

	/**** VERIF SESSION ****/
	$c_session->session();

	/** Contrôle des paramètres */
	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$idPhoto = $url_param[0];
		} else { $idPhoto = -1; }
	} else { $idPhoto = -1; }

	/* On récupère le message */
	$codeRetour = -1;
	if($idPhoto > 0){
		$photo = $m_galerie->getPhoto($idPhoto);
	}else{
		$codeRetour = 10;
	}

    //Suppression d'un message
    if(isset($_POST['idToDelete']) && !empty($_POST['idToDelete'])){
    	$m_galerie->deletePhoto($_POST['idToDelete']);
    	header('Location: ' . ADRESSE_ABSOLUE_URL .'gestionGalerie/');
    }

	
	$liste_photos = $m_galerie->listerPhotos();
?>