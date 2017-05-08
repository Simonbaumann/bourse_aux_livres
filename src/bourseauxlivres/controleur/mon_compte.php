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
	$m_utilisateur = new m_utilisateur($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_utilisateur);
	
	/**** VERIF SESSION ****/
	$c_session->session();
	if($_SESSION['id'] == -1) header('Location: connexion');

	/*** TRAITEMENTS ***/
	$nom_page = 'Mon compte';
	$utilisateur = $m_utilisateur->obtenir_information_utilisateur($_SESSION['id']);

	if(isset($_POST['password1']) && isset($_POST['password2'])) {
		$password1 = $f_formulaire->testInputData($_POST['password1']);
		$password2 = $f_formulaire->testInputData($_POST['password2']);

		$taille1 = strlen($password1);
		$taille2 = strlen($password2);

		if($taille1 >= 4 && $taille2 >= 4){
			if($password1 == $password2){
				$id = $utilisateur->id;
				$adresse_email = $utilisateur->adresse_email;
				$is_admin = $utilisateur->is_admin;
				$resultat = $m_utilisateur->mise_a_jour_compte_utilisateur($id, $adresse_email, $password1, $is_admin);

				if($resultat) {
					$codeRetour = 4;
				}
			}else{
				// Mdp différent
				$codeRetour = 2;
			}
		}else{
			// Mot de passe pas assez grand
			$codeRetour = 10;
		}
	}else {
		// Tout n'est pas renseigné
		$codeRetour = 1;
	}
?>