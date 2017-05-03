<?php
	/**** SESSION ****/
	session_start();

	/**** CLASS CONTROLEUR ****/
	require_once('class/c_session.php');
	require_once('class/t_texte.php');
	require_once('class/c_utilisateur.php');

	/**** MODELE ****/
	require_once('modele/m_session.php');
	require_once('modele/m_presentation.php');
	require_once('modele/m_utilisateur.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();

	$m_session = new m_session($base_de_donnee);
	$m_admin = new m_admin($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_admin);
	$m_presentation = new m_presentation($base_de_donnee);

	/**** VERIF SESSION ****/
	$c_session->session();

	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$num_page = $url_param[0];
		} else { $num_page = 1; }
	} else { $num_page = 1; }


	/* CONTROLE ADMIN */
	if($_SESSION['id'] == 0) {
		header('Location: '.ADRESSE_ABSOLUE_URL.'accueil');
	}

	$presentation = $m_presentation->get_presentation();

	$bienEnvoye = false;
	if(isset($_POST['message'])){
		if(!empty($_POST['message'])){
			// bbcode description et texte
			$message = $t_texte->convertBBcodeToHtml($_POST['message']);
		
			/* On récupère les données en session */
			$datePublication = time();

			//Appel de la fonction ajouter article
			$m_presentation->updatePhoto($message, $datePublication);

			if($m_presentation){
				$bienEnvoye = true;
			}
		}
	}
?>