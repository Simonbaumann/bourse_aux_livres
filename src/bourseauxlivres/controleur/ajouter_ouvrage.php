<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_session.php');
	require_once('class/t_texte.php');
	require_once('class/c_utilisateur.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_accueil.php');
	require_once('modele/m_utilisateur.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	
	$m_session = new m_session($base_de_donnee);
	/*$m_admin = new m_admin($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_admin);*/

	/**** VERIF SESSION ****/
	/*$c_session->session();

	$m_accueil = new m_accueil($base_de_donnee);
	$accueil = $m_accueil->get_accueil();*/

	$nom_page = 'Ajout d\'ouvrage';
?>