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
	
	/**** VERIF SESSION ****/
	$c_session->session();
	if($_SESSION['id'] == -1) header('Location: connexion');

	$nom_page = 'Ajouter un utilisateur';

	$codeRetour = -1;
	if(isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2'])) {
		$email = $f_formulaire->testInputData($_POST['email']);
		$password1 = $f_formulaire->testInputData($_POST['password1']);
		$password2 = $f_formulaire->testInputData($_POST['password2']);
		if(isset($_POST['is_admin']) && $_POST['is_admin'] == 1){
			$is_admin = true;
		}else{
			$is_admin = false;
		}

		$taille1 = strlen($password1);
		$taille2 = strlen($password2);

		if($taille1 >= 4 && $taille2 >= 4){
			if($password1 == $password2) {

				// Vérifie si email existe déjà
				$compte = $m_utilisateur->is_compte_existant($email);
				if($compte){
					$codeRetour = 3;
				}else{
					$resultat = $m_utilisateur->creation_compte_utilisateur($email, $password1, $is_admin);

					if($resultat) {
		
						$codeRetour = 4;
					}
				}
			}else {
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