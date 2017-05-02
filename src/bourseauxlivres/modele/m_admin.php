<?php
	class m_admin{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
	
        public function connexion($compte, $password){
            $connexion = $this->base_de_donnee->prepare('SELECT * FROM admin WHERE login = ? AND password = ?');
            
            $connexion->bindValue(1, $compte, PDO::PARAM_STR);
			$connexion->bindValue(2, hash('sha256', $password), PDO::PARAM_STR);
			$connexion->execute();
            
			$retour = $connexion->fetch(PDO::FETCH_OBJ);
			$connexion->closeCursor();
     
            return  $retour;  
        }
        
        public function verification_compte_existant($compte){
            $verification_compte_existant = $this->base_de_donnee->prepare('SELECT login FROM admin where login = ?');

            $verification_compte_existant->bindValue(1, $compte, PDO::PARAM_STR);
            $verification_compte_existant->execute();
            
            $retour = $verification_compte_existant->fetch(PDO::FETCH_OBJ);
            $verification_compte_existant->closeCursor();
                
            return $retour;
        }
       
        public function mise_a_jour_compte_admin($id, $login, $password, $email){
            $mise_a_jour_compte = $this->base_de_donnee->prepare('UPDATE admin SET  login = ?, password = ?, email = ? WHERE id = ?');
            
            $mise_a_jour_compte->bindValue(1, $login, PDO::PARAM_STR);
			$mise_a_jour_compte->bindValue(2, hash('sha256', $password), PDO::PARAM_STR);
            $mise_a_jour_compte->bindValue(3, $email, PDO::PARAM_STR);
            $mise_a_jour_compte->bindValue(4, $id, PDO::PARAM_INT);
            $mise_a_jour_compte->execute();
        }
        
        public function obtenir_information_admin($id){
            $obtenir_information_utilisateurs = $this->base_de_donnee->prepare('SELECT * FROM admin WHERE id = ?');

            $obtenir_information_utilisateurs->bindValue(1, $id, PDO::PARAM_INT);
            $obtenir_information_utilisateurs->execute();
            
            $retour = $obtenir_information_utilisateurs->fetch(PDO::FETCH_OBJ);
            $obtenir_information_utilisateurs->closeCursor();
                
            return $retour;
        }

        public function creation_compte_admin($login, $password, $email){
            $inscription = $this->base_de_donnee->prepare('INSERT INTO admin (login, password, email) 
            values (?, ?, ?) ');

            $inscription->bindValue(1, $login, PDO::PARAM_STR);
            $inscription->bindValue(2, hash('sha256', $password), PDO::PARAM_STR);
            $inscription->bindValue(3, $email, PDO::PARAM_STR);
            $inscription->execute();   
        } 
	}
?>