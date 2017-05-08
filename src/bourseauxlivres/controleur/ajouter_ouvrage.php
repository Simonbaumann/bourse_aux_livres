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

	$nom_page = 'Ajout d\'ouvrage';

	$code_retour = -1;
	if(isset($_POST['nom']) && isset($_POST['editeur']) && isset($_POST['type']) && isset($_POST['classe'])) {
		$nom = $f_formulaire->testInputData($_POST['nom']);
		$editeur = $f_formulaire->testInputData($_POST['editeur']);
		$type = $f_formulaire->testInputData($_POST['type']);
		$classe = $f_formulaire->testInputData($_POST['classe']);

		if($_POST['classe'] == 'Seconde' && $_POST['section'] != 'Generale') {
			$codeRetour = 5; // AMODIFIERRRRRRRRRRRRRRRRRRRR
		} else {
			$resultat = $m_ouvrage->ajouter_ouvrage($nom, $editeur, $type, $classe, $section, time());

			if ($resultat) {
				$codeRetour = 4;
			}
		}

	} else {
		// Tout n'est pas renseigné
		$codeRetour = 2;
	}
?>