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
	require_once('modele/m_accueil.php');
	require_once('modele/m_admin.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();

	$m_session = new m_session($base_de_donnee);
	$m_admin = new m_admin($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_admin);
	$m_accueil = new m_accueil($base_de_donnee);

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

	$accueil = $m_accueil->get_accueil();

	$bienEnvoye = false;
	if(isset($_POST['message'])){
		if(!empty($_POST['message'])){
		
			// bbcode description et texte
			$message = $t_texte->convertBBcodeToHtml($_POST['message']);
		
			/* On récupère les données en session */
			$datePublication = time();

			//Appel de la fonction ajouter article
			$m_accueil->updateAccueil($message, $datePublication);

			if($m_accueil){
				$bienEnvoye = true;
				$accueil = $m_accueil->get_accueil();// reload
			}
		}
	}

?>