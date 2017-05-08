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
	require_once('modele/m_ouvrage.php');


	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();
	$m_session = new m_session($base_de_donnee);
	$m_ouvrage = new m_ouvrage($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	
	/**** VERIF SESSION ****/
	$c_session->session();
	if($_SESSION['id'] == -1) header('Location: connexion');

	$nom_page = 'Liste des ouvrages';

	$ouvrages = $m_ouvrage->lister_ouvrages();
?>