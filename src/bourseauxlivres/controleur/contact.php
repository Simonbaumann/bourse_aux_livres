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
	require_once('modele/m_contact.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();
	$m_session = new m_session($base_de_donnee);
	$m_admin = new m_admin($base_de_donnee);
	$m_contact = new m_contact($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_admin);

	/**** VERIF SESSION ****/
	$c_session->session();
	/*$c_session->calcul_nb_utilisateurs_connectes($_SERVER['REMOTE_ADDR']);
	$m_session->compter_visite($_SERVER['REMOTE_ADDR'], date('Y-m-d')); // Sous forme AAAA-mm-dd */

	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$num_page = $url_param[0];
		} else { $num_page = 1; }
	} else { $num_page = 1; }

	/* ENVOIE D'UN MESSAGE CONTACT */
	$bienEnvoye = false;
	$codeRetour = -1;
	if(isset($_POST['nom']) && isset($_POST['prenom']) &&  isset($_POST['email']) &&  isset($_POST['sujet']) &&  isset($_POST['message'])){
		$ajouterMessage = true;
		// On vérifie les données !
		if(trim($_POST['nom']) != ''){
			$nom = $_POST['nom'];
		}else{
			$codeRetour = 28;
			$ajouterMessage = false;
		}
		if(trim($_POST['prenom']) != ''){
			$prenom = $_POST['prenom'];
		}else{
			$codeRetour = 28;
			$ajouterMessage = false;
		}
		if($f_formulaire->verify_email($_POST['email']) == 0){
			$email = $_POST['email'];
		}else{
			$codeRetour = 9;
			$ajouterMessage = false;
		}

		// Déspécialisation plus non exécution du code
		$sujet = $f_formulaire->testInputData($_POST['sujet']);
		$message = $f_formulaire->testInputData($_POST['message']);
		$dateEnvoie = time();
		$lu = false;
		$ip = $_SERVER["REMOTE_ADDR"];

		if($ajouterMessage){
			// execution fonction modele
			$m_contact->add_message($nom, $prenom, $email, $sujet, $message, $dateEnvoie, $lu, $ip);
			if($m_contact){
				$bienEnvoye = true;
			}
		}
	}
	/* TODO empêcher le spam et rafraichissement de la page 

	Solution a implémente 
	http://stackoverflow.com/questions/2133964/how-to-prevent-multiple-inserts-when-submitting-a-form-in-php
	*/
?>