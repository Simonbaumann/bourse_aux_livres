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
	require_once('modele/m_admin.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();
	$m_session = new m_session($base_de_donnee);
	$m_admin = new m_admin($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_admin);

	/**** VERIF SESSION ****/
	$c_session->session();

	/* CONTROLE ADMIN */
	if($_SESSION['id'] == 0) {
		header('Location: '.ADRESSE_ABSOLUE_URL.'accueil');
	}

	/** Contrôle des paramètres */
	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$num_page = $url_param[0];
		} else { $num_page = 1; }
	} else { $num_page = 1; }



	/* TRAITEMENT GESTION COMPTE */
	$admin = $m_admin->obtenir_information_admin($_SESSION['id']);

	/* mise à jour */
	$bienEnvoye = false;
	$codeRetour = -1;
	if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
		$id = $admin->id;
		$login = trim($_POST['login']);

		if($f_formulaire->verify_email($_POST['email']) == 0){
			$email = $_POST['email'];
		}else{
			$codeRetour = 9;
			$ajouterMessage = false;
		}

		$password = trim($_POST['password']);
		$confirmPassword = trim($_POST['confirmPassword']);

		if (strlen($password) >= TAILLE_MINIMAL_PASSWORD) {
			if($password == $confirmPassword){
				$m_admin->mise_a_jour_compte_admin($id, $login, $password, $email);
				if($m_admin){
					$bienEnvoye = true;
				}
			}else{
				$codeRetour = 30;
			}
		} else {
			$codeRetour = 23;
		}
	}
?>