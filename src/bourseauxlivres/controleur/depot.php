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
	require_once('modele/m_adherent.php');
	require_once('modele/m_ouvrage.php');
	require_once('modele/m_classe.php');
	require_once('modele/m_section.php');
	require_once('modele/m_matiere.php');
	require_once('modele/m_etat.php');
	require_once('modele/m_manuel.php');

	/**** OBJETS ****/
	$t_texte = new t_texte();
	$f_formulaire = new f_formulaire();
	$m_utilisateur = new m_utilisateur($base_de_donnee);
	$m_session = new m_session($base_de_donnee);
	$c_session = new c_session($m_session, $t_texte);
	$c_utilisateur = new c_utilisateur($m_utilisateur);
	$m_ouvrage = new m_ouvrage($base_de_donnee);
	$m_adherent = new m_adherent($base_de_donnee);
	$m_classe = new m_classe($base_de_donnee);
	$m_section = new m_section($base_de_donnee);
	$m_matiere = new m_matiere($base_de_donnee);
	$m_etat = new m_etat($base_de_donnee);
	$m_manuel = new m_manuel($base_de_donnee);

	/**** VERIF SESSION ****/
	$c_session->session();
	if($_SESSION['id'] == -1) header('Location: connexion');
	
	$codeRetour = -1;
	$nom_page = 'Dépôts de livres';

	/** Contrôle des paramètres */
	if(!empty($url_param[0])) {
		if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
			$nEtape = $url_param[0];
		} else { $nEtape = 1; }
	} else { $nEtape = 1; }


	$rechercheAdherents = false;
	$rechercheOuvrages = false;

	$etats = $m_etat->lister_etats();
	// Traitement recherche des adhérents
	if(isset($_POST['rechercheAdherents']) && !empty($_POST['rechercheAdherents'])){
		$value = $f_formulaire->testInputData($_POST['rechercheAdherents']);
		$adherents = $m_adherent->rechercher_adherents($value);
		$rechercheAdherents = true;
	}else {
		$codeRetour = 11; // Vide
	}

	// Traitement recherche des ouvrages
	if(isset($_POST['rechercheOuvrages']) && !empty($_POST['rechercheOuvrages'])){
		$value = $f_formulaire->testInputData($_POST['rechercheOuvrages']);
		$ouvrages = $m_ouvrage->rechercher_ouvrages($value);
		$rechercheOuvrages = true;
	} else {
		$codeRetour = 11; // Vide
	}


	//Taitement ajout d'un adhérent au panier
	if(isset($_POST['ajoutAdherentPanier']) && !empty($_POST['ajoutAdherentPanier'])) {
		$_SESSION['depot_adherent_select'] = $m_adherent->get_adherent($_POST['ajoutAdherentPanier']);
		header('Location: ' .ADRESSE_ABSOLUE_URL. 'depot/2');
	}

	
	// Traitement ajout des ouvrages au panier 
	if(isset($_POST['ajoutManuelPanier']) && !empty($_POST['ajoutManuelPanier']) && isset($_POST['etatManuel'])) {
		$ajout = true;
		$array = null;
		$array_ouvrage_etat = null;
		$idEtat = $_POST['etatManuel'];

		if(!isset($_SESSION['depot_manuel_select']) && !isset($_SESSION['depot_manuel_select']['manuels']) && !isset($_SESSION['depot_manuel_select']['etats_manuels'])){
			$array = array();
			$array_ouvrage_etat = array();
		}else{
			$array = $_SESSION['depot_manuel_select']['manuels'];
			$array_ouvrage_etat = $_SESSION['depot_manuel_select']['etats_manuels'];
		}

		$ouvrage = $m_ouvrage->get_ouvrage($_POST['ajoutManuelPanier']);
		
		if(!empty($array)){
			foreach ($array as $value) {
				if($value->isbn == $ouvrage->isbn){
					$codeRetour = 12;// déjà présent dans le panier
					$ajout = false;
				}
			}
		}else{
			$ajout = true;
		}

		if($ajout){
			array_push($array_ouvrage_etat, $idEtat);
			array_push($array, $ouvrage);
			unset($_SESSION['depot_manuel_select']);
			$_SESSION['depot_manuel_select']['manuels'] = $array;	
			$_SESSION['depot_manuel_select']['etats_manuels'] = $array_ouvrage_etat;
		}
	}

	// Traitement pour retirer un élément du panier
	if(isset($_POST['supprimerElementPanier']) && !empty($_POST['supprimerElementPanier'])){
		$isbn = $_POST['supprimerElementPanier'];
		
		foreach ($_SESSION['depot_manuel_select']['manuels'] as $key => $value) {
			if($value->isbn == $isbn){
				unset($_SESSION['depot_manuel_select']['manuels'][$key]);
				unset($_SESSION['depot_manuel_select']['etats_manuels'][$key]);
			}
		}
	}

	// Ajout en base de données
	if($nEtape == 4 && isset($_SESSION['depot_manuel_select']) && !empty($_SESSION['depot_manuel_select']) && isset($_SESSION['depot_adherent_select'])) {
		$nom_page = 'Ajout en base de données';

		foreach ($_SESSION['depot_manuel_select']['manuels'] as $key => $value) {
			$prix = (double) ($value->prix_neuf * $m_etat->get_etat($_SESSION['depot_manuel_select']['etats_manuels'][$key])->decote);
			$resultat = $m_manuel->ajouter_manuel($value->isbn, $_SESSION['depot_manuel_select']['etats_manuels'][$key], $prix, $_SESSION['depot_adherent_select']->id);
		}

		unset($_SESSION['depot_manuel_select']);
		unset($_SESSION['depot_adherent_select']);
	}	
?>