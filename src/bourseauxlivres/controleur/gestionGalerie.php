<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_session.php');
	require_once('class/t_texte.php');
	require_once('class/c_utilisateur.php');
	require_once('class/f_formulaire.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_admin.php');
	require_once('modele/m_slider.php');
	require_once('modele/m_utilisateur.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();

	$m_session = new m_session($base_de_donnee);
	$m_admin = new m_admin($base_de_donnee);
	$m_galerie = new m_galerie($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_admin);

	/**** VERIF SESSION ****/
	$c_session->session();

	/* CONTROLE ADMIN */
	if($_SESSION['id'] == 0) {
		header('Location: '.ADRESSE_ABSOLUE_URL.'accueil');
	}

	/** Contrôle des paramètres */
	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$num_page = $url_param[0];
		} else { $num_page = 1; }
	} else { $num_page = 1; }

    //Suppression d'une photo
    if(isset($_POST['idToDelete']) && !empty($_POST['idToDelete'])){
    	$id = $_POST['idToDelete'];
    	$photo = $m_galerie->getPhoto($id);
    	$nomFichier = $photo->nom;

    	// Suppression photo en base et sur serveur
    	$f_formulaire->suppression_fichier(CHEMIN_UPLOAD_PHOTOS, $nomFichier);
    	$m_galerie->deletePhoto($id);

    	header('Location: ' . ADRESSE_ABSOLUE_URL .'gestionGalerie/');
    }

	
	$liste_photos = $m_galerie->listerPhotos();
	$nb_photos = $m_galerie->countPhotos();
?>