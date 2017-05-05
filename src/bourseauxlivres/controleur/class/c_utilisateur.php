<?php
	class c_utilisateur {
		
		private $modele;
		
		public function __construct($p_modele){
			$this->modele = $p_modele;
		}
		
        public function connexion($adresse_email, $password) {
			if(!empty($adresse_email) AND !empty($password)) {
				$verification = $this->modele->connexion($adresse_email, $password);
				var_dump($verification);
				if(!empty($verification)){
					$_SESSION['id'] = $verification->id;
					$_SESSION['time'] = time();
					$_SESSION['email'] = $verification->adresse_email;
					$_SESSION['is_admin'] = $verification->is_admin;
					return 7;
				}else{
					return 8;
				}
			} else { return 9; }
		}
        
        public function deconnexion() {
            setcookie('u', '', time()+1);
            setcookie('p', '', time()+1);
            
            $_SESSION['id'] = 0;
            session_destroy();
        }


}?>