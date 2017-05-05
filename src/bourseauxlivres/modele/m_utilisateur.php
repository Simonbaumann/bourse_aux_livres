<?php
    /*
     * Classe utilisateur - Ensemble des fonctionnalités modèles de la table utilisateur
     * Attributs :
     * id, adresse_email, password, is_admin
     */
	class m_utilisateur{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
	   
        /*
         * Permet la connexion
         * Params : adresse email et password
         */
        public function connexion($adresse_email, $password){
            $connexion = $this->base_de_donnee->prepare('SELECT * FROM utilisateur WHERE adresse_email = ? AND password = ?');
            
            $connexion->bindValue(1, $adresse_email, PDO::PARAM_STR);
			$connexion->bindValue(2, hash('sha256', $password), PDO::PARAM_STR);
			$connexion->execute();
            
			$retour = $connexion->fetch(PDO::FETCH_OBJ);
			$connexion->closeCursor();
     
            return  $retour;  
        }
        
        /*
         * Verification compte existant
         * Params : adresse email
         */
        public function verification_compte_existant($adresse_email){
            $verification_compte_existant = $this->base_de_donnee->prepare('SELECT adresse_email FROM utilisateur where adresse_email = ?');

            $verification_compte_existant->bindValue(1, $adresse_email, PDO::PARAM_STR);
            $verification_compte_existant->execute();
            
            $retour = $verification_compte_existant->fetch(PDO::FETCH_OBJ);
            $verification_compte_existant->closeCursor();
                
            return $retour;
        }
        
        /*
         * Mis à jour du compte utilisateur
         * Params : id, adresse email, password et is_admin
         */
        public function mise_a_jour_compte_utilisateur($id, $adresse_email, $password, $is_admin){
            $mise_a_jour_compte = $this->base_de_donnee->prepare('UPDATE utilisateur SET  adresse_email = ?, password = ?, is_admin = ? WHERE id = ?');
            
            $mise_a_jour_compte->bindValue(1, $adresse_email, PDO::PARAM_STR);
			$mise_a_jour_compte->bindValue(2, hash('sha256', $password), PDO::PARAM_STR);
            $mise_a_jour_compte->bindValue(3, $is_admin, PDO::PARAM_BOOL);
            $mise_a_jour_compte->bindValue(4, $id, PDO::PARAM_INT);
            $mise_a_jour_compte->execute();
            return $mise_a_jour_compte;
        }

        /*
         * Mis à jour des droits de l'utilisateur
         * Params : id, is_admin
         */
        public function mise_droit_utilisateur($id, $is_admin){
            $mise_droit_utilisateur = $this->base_de_donnee->prepare('UPDATE utilisateur SET  is_admin = ? WHERE id = ?');
            
            $mise_droit_utilisateur->bindValue(1, $is_admin, PDO::PARAM_BOOL);
            $mise_droit_utilisateur->bindValue(2, $id, PDO::PARAM_INT);
            $mise_droit_utilisateur->execute();
            return $mise_droit_utilisateur;
        }

        /*
         * Obtenir information utilisateur
         * Params : id
         */
        public function obtenir_information_utilisateur($id){
            $obtenir_information_utilisateurs = $this->base_de_donnee->prepare('SELECT * FROM utilisateur WHERE id = ?');

            $obtenir_information_utilisateurs->bindValue(1, $id, PDO::PARAM_INT);
            $obtenir_information_utilisateurs->execute();
            
            $retour = $obtenir_information_utilisateurs->fetch(PDO::FETCH_OBJ);
            $obtenir_information_utilisateurs->closeCursor();
                
            return $retour;
        }

        /*
         * Creation d'un compte utilisateur
         * Params : adresse email, password et is_admin
         */
        public function creation_compte_utilisateur($adresse_email, $password, $is_admin){
            $inscription = $this->base_de_donnee->prepare('INSERT INTO utilisateur (adresse_email, password, is_admin) 
            values (?, ?, ?) ');

            $inscription->bindValue(1, $adresse_email, PDO::PARAM_STR);
            $inscription->bindValue(2, hash('sha256', $password), PDO::PARAM_STR);
            $inscription->bindValue(3, $is_admin, PDO::PARAM_BOOL);
            $inscription->execute();   
            return $inscription;
        } 

        /*
         * Liste l'ensemble des comptes utilisateurs
         * Params : none
         */
        public function lister_comptes_utilisateurs(){
            $lister_comptes_utilisateurs = $this->base_de_donnee->prepare('SELECT * FROM utilisateur');

            $lister_comptes_utilisateurs->execute();
            
            $retour = $lister_comptes_utilisateurs->fetchAll(PDO::FETCH_OBJ);
            $lister_comptes_utilisateurs->closeCursor();
                
            return $retour;
        } 

        /*
         *  Permet la suppression d'un compte d'utilisateur
         *  Params : id
         */
        public function supprimer_compte_utilisateurs($id){
            $supprimer_compte_utilisateurs = $this->base_de_donnee->prepare('DELETE FROM utilisateur WHERE id = ?');
            $supprimer_compte_utilisateurs->bindValue(1, $id, PDO::PARAM_INT);
            $supprimer_compte_utilisateurs->execute();
            return $supprimer_compte_utilisateurs;
        }

        /*
         *  Verification d'un compte existant
         *  Params : adresse_email
         */
        public function is_compte_existant($adresse_email){
            $is_compte_existant = $this->base_de_donnee->prepare('SELECT * FROM utilisateur WHERE adresse_email = ?');

            $is_compte_existant->bindValue(1, $adresse_email, PDO::PARAM_STR);
            $is_compte_existant->execute();
            
            $retour = $is_compte_existant->fetch(PDO::FETCH_OBJ);
            $is_compte_existant->closeCursor();
                
            return $retour;
        }
	}
?>