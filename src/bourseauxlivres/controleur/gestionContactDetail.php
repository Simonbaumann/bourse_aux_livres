<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_session.php');
	require_once('class/t_texte.php');
	require_once('class/c_utilisateur.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_contact.php');
	require_once('modele/m_utilisateur.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	
	$m_session = new m_session($base_de_donnee);
	$m_admin = new m_admin($base_de_donnee);
	$m_contact = new m_contact($base_de_donnee);
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
			$idMessage = $url_param[0];
		} else { $idMessage = -1; }
	} else { $idMessage = -1; }


	/* On récupère le message */
	$codeRetour = -1;
	if ($idMessage > 0) {
		$message = $m_contact->get_message($idMessage);
	} else {
		$codeRetour = 10;
	}

    //Suppression d'un message
    if(isset($_POST['idToDelete']) && !empty($_POST['idToDelete'])){
    	$m_contact->delete_message($_POST['idToDelete']);
    	 header('Location: ' . ADRESSE_ABSOLUE_URL .'gestionContact/');
    }

?>