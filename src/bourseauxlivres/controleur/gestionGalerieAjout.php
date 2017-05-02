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
	require_once('modele/m_galerie.php');
	require_once('modele/m_admin.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();
	
	$m_session = new m_session($base_de_donnee);
	$m_admin = new m_admin($base_de_donnee);
	$m_galerie = new m_galerie($base_de_donnee);
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


	/* TRAITEMENTS GALERIE AJOUT */
	$bienEnvoye = false;
	$champsMalSaisie = false;
	$autoriserMaj = false;
	$urlFichierWrong = false;
	if(isset($_POST['titre']) && isset($_POST['description'])){
		if(!empty($_POST['titre']) && !empty($_POST['description'])){

			/* GESTION PARTIE FICHIER */
			$nomFichier = md5(uniqid()); // On génère un nom unique
			$target = CHEMIN_UPLOAD_PHOTOS; // Emplacement de stockage sur le serveur

			$codeRetour = $f_formulaire->uploadPicture($_FILES, $target, $nomFichier);
			// Si c'est ok
			if($codeRetour == 17){
				$nomFichier = $nomFichier .'.'.strtolower(substr(strrchr($_FILES['fichier']['name'], '.'),1)); // on récupère l'extension
				$lien = ADRESSE_ABSOLUE_URL . $target . $nomFichier;
				$autoriserMaj = true;
			}

			if($autoriserMaj){
				// Check du contenu déspécialisation
				$titre = $f_formulaire->testInputData($_POST['titre']);
				$description = $f_formulaire->testInputData($_POST['description']);
				$date_ajout = time();

				//Appel de la fonction ajouter article
				$m_galerie->addPhotos($titre, $description, $lien, $nomFichier, '', $date_ajout);

				if($m_galerie){
					$bienEnvoye = true;
				}
			}else{
				$urlFichierWrong = true;
			}
		}else{
			$champsMalSaisie = true;
		}
	}
?>