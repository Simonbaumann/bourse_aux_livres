<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_session.php');
	require_once('class/t_texte.php');
	require_once('class/c_utilisateur.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_utilisateur.php');
	require_once('modele/m_slider.php');
	require_once('modele/m_presentation.php');

	/**** OBJETS ****/
	$m_presentation = new m_presentation($base_de_donnee);
	$presentation = $m_presentation->get_presentation();

?>