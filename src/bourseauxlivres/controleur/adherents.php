<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_session.php');
	require_once('class/t_texte.php');
	require_once('class/c_utilisateur.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_admin.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	
	$m_session = new m_session($base_de_donnee);
	
	$nom_page = 'Liste des adhérents';
?>