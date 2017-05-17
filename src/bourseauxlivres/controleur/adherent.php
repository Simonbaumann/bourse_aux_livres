<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_session.php');
	require_once('class/t_texte.php');
	require_once('class/c_utilisateur.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_adherent.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$m_adherent = new m_adherent($base_de_donnee);
	$m_session = new m_session($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);

	/**** VERIF SESSION ****/
	$c_session->session();
	if($_SESSION['id'] == -1) header('Location: connexion');
	if($_SESSION['is_admin'] != 1) header('Location: '. ADRESSE_ABSOLUE_URL . 'accueil');

	/**** TRAITEMENTS ****/
	$nom_page = 'Information adhérent';
	$codeRetour = -1;

	/** Contrôle des paramètres */
	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$idAdherent = $url_param[0];
		} else { $idAdherent = -1; }
	} else { $idAdherent = -1; }

	/* On récupère les données de l'adhérent */
	// Si l'id de l'adhérent est cohérent
	if(isset($idAdherent) && $idAdherent != -1) {
		$adherent = $m_adherent->get_adherent($idAdherent);
	}else {
		// Sinon problème de paramètres
		$codeRetour = 5;
	}

?>