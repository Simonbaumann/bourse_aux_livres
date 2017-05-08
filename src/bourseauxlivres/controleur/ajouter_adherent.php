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
	require_once('modele/m_adherent.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();
	$m_session = new m_session($base_de_donnee);
	$m_adherent = new m_adherent($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	
	/**** VERIF SESSION ****/
	$c_session->session();
	if($_SESSION['id'] == -1) header('Location: connexion');


	$nom_page = 'Ajout d\'un adherent';

	/**** TRAITEMENTS ****/
	$codeRetour = -1;


	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['codePostal'])) {
		$nom = $f_formulaire->testInputData($_POST['nom']);
		$prenom = $f_formulaire->testInputData($_POST['prenom']);
		$adresse = $f_formulaire->testInputData($_POST['adresse']);
		$ville = $f_formulaire->testInputData($_POST['ville']);
		$code_postal = $f_formulaire->testInputData($_POST['codePostal']);

		// Ajout en base
		$resultat = $m_adherent->ajouter_adherent($nom, $prenom, $adresse, $ville, $code_postal, time());
		if($resultat) {
			$codeRetour = 4;
		}

	}else{
		// Tout n'est pas renseigné
		$codeRetour = 1;
	}
?>