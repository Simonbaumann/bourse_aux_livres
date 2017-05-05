<?php
	class c_session{
		
		private $modele;
		private $texte;
		
		public function __construct($p_modele, $ptexte){
			$this->modele = $p_modele;
			$this->texte = $ptexte;
		}
		
        /* Vérifie la variable de session id */
		public function session(){
			if(!isset($_SESSION['id'])){
				$_SESSION['id'] = -1;
			}
            if(!isset($_SESSION['token'])){
                $_SESSION['token'] = uniqid(rand(), true); //On génére un jeton totalement unique (c'est capital :D)
            }
            $_SESSION['token_time'] = time(); //On enregistre aussi le timestamp correspondant au moment de la création du token
		}
        
        /* Prend en paramètre l'id de session mobile (ou 0) et renvoie l'id après vérification */
        public function session_mobile($id){
            $ip = $_SERVER['REMOTE_ADDR'];
            
            $this->modele->timeout_mobile();
            
            if($id != 0) {
                $id_verif = $this->modele->verifie_session_mobile($id, $ip);
                
                if(empty($id_verif)) {
                    $id = $this->texte->random_generateur(32);
                    $this->modele->nouvelle_session_mobile($id, $ip);
                } else {
                    $this->modele->update_session_mobile($id, $ip);
                }
            } else {
                $id = $this->texte->random_generateur(32);
                $this->modele->nouvelle_session_mobile($id, $ip);
            }
            
            return $id;
        }
        
        /* SESSION TIME OUT */
        public function sesion_timeout(){
        	$tempsActuel = time();

        	if($tempsActuel - $_SESSION['time'] >= 600){
        		header('Location: deconnexion');
        	}
        }

        /* Verification du token */
        public function verification_token($p_SESSION, $p_POST){
            //Si le jeton est présent dans la session et dans le formulaire
            if(isset($p_SESSION['token']) && isset($p_SESSION['token_time']) && isset($p_POST['token'])){
                //Si le jeton de la session correspond à celui du formulaire
                if($p_SESSION['token'] == $p_POST['token']){
                    //On stocke le timestamp qu'il était il y a 15 minutes
                    $timestamp_ancien = time() - (15*60);
                    //Si le jeton n'est pas expiré
                    if($p_SESSION['token_time'] >= $timestamp_ancien){
                            //Ok
                            return 1;
                    }else{
                        return -1;
                    }
                }else{
                    return -1;
                }
            }else{
                return -1;
            }
        }
	}
?>