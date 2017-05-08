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
	require_once('modele/m_ouvrage.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();
	$m_session = new m_session($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$m_ouvrage = new m_ouvrage($base_de_donnee);

	/**** VERIF SESSION ****/
	$c_session->session();
	if($_SESSION['id'] == -1) header('Location: connexion');
	
	$nom_page = 'Suppression d\'un ouvrage';

	/** Contrôle des paramètres */
	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$isbnOuvrage = $url_param[0];
		} else { $isbnOuvrage = -1; }
	} else { $isbnOuvrage = -1; }

	$codeRetour = -1;

	/* On récupère les données de l'utilisateur */
	// Si l'id de l'utilisateur est cohérent
	if(isset($isbnOuvrage) && $isbnOuvrage != -1) {
		$ouvrage = $m_ouvrage->get_ouvrage($isbnOuvrage);
	}else {
		// Sinon problème de paramètres
		$codeRetour = 5;
	}

	// Variables
	$isbn = $isbnOuvrage;

	if(isset($_POST['submit'])) {
		// Suppression du compte
		$resultat = $m_ouvrage->delete_ouvrage($isbn);
		if($resultat) {
			$codeRetour = 6;
		}
	}
?>