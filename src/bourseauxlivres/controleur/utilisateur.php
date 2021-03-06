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
	require_once('modele/m_utilisateur.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();
	$m_session = new m_session($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$m_utilisateur = new m_utilisateur($base_de_donnee);

	/**** VERIF SESSION ****/
	$c_session->session();
	if($_SESSION['id'] == -1) header('Location: connexion');
	if($_SESSION['is_admin'] != 1) header('Location: '. ADRESSE_ABSOLUE_URL . 'accueil');
	
	$nom_page = 'Editer droit d\'un utilisateur';

	/** Contrôle des paramètres */
	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$idUtilisateur = $url_param[0];
		} else { $idUtilisateur = -1; }
	} else { $idUtilisateur = -1; }

	$codeRetour = -1;

	/* On récupère les données de l'utilisateur */
	// Si l'id de l'utilisateur est cohérent
	if(isset($idUtilisateur) && $idUtilisateur != -1) {
		$utilisateur = $m_utilisateur->obtenir_information_utilisateur($idUtilisateur);
	}else {
		// Sinon problème de paramètres
		$codeRetour = 5;
	}

	// Variables
	$id = $idUtilisateur;

	if(isset($_POST['submit'])) {
		if(isset($_POST['is_admin']) && $_POST['is_admin'] == 1) {
			$is_admin = true;
		}else {
			$is_admin = false;
		}
		// Maj du compte
		$resultat = $m_utilisateur->mise_droit_utilisateur($id, $is_admin);
		if($resultat) {
			$codeRetour = 4;
			$utilisateur = $m_utilisateur->obtenir_information_utilisateur($idUtilisateur);
		}
	}else {
		// Tout n'est pas renseigné
		$codeRetour = 1;
	}

?>