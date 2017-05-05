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
	$c_utilisateur = new c_utilisateur($m_utilisateur);

	// Attribution de la session
	$c_session->session();

	$retour = -1;

	if(isset($_POST['email']) && isset($_POST['password'])) {
		$email = $f_formulaire->testInputData($_POST['email']);
		$password = $f_formulaire->testInputData($_POST['password']);

		$retour = $c_utilisateur->connexion($email, $password);

		header('Location: ' . ADRESSE_ABSOLUE_URL . 'accueil');
	}
?>