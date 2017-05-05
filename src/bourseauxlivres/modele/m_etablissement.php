<?php
    /*
     * Classe etablissement - Ensemble des fonctionnalités modèles de la table etablissement
     * Attributs :
     * id nom adresse ville code_postal numero_telephone 
     */
    class m_etablissement{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'un établissement 
         * Params : libelle
         */
        public function ajouter_etablissement($nom, $adresse, $ville, $code_postal, $numero_telephone){
            $ajouter_etablissement = $this->base_de_donnee->prepare('INSERT INTO etablissement (nom, adresse, ville, code_postal, numero_telephone) 
            values (?, ?, ?, ?, ?)');

            $ajouter_etablissement->bindValue(1, $nom, PDO::PARAM_STR);
            $ajouter_etablissement->bindValue(2, $adresse, PDO::PARAM_STR);
            $ajouter_etablissement->bindValue(3, $ville, PDO::PARAM_STR);
            $ajouter_etablissement->bindValue(4, $code_postal, PDO::PARAM_STR);
            $ajouter_etablissement->bindValue(5, $numero_telephone, PDO::PARAM_STR);
            $ajouter_etablissement->execute();    
        } 

        /*
         * Obtenir un établissement 
         * Params : id
         */
        public function get_etablissement($id){
            $get_etablissement = $this->base_de_donnee->prepare('SELECT * FROM etablissement WHERE id = ?');

            $get_etablissement->bindValue(1, $id, PDO::PARAM_INT);
            $get_etablissement->execute();
            
            $retour = $get_etablissement->fetch(PDO::FETCH_OBJ);
            $get_etablissement->closeCursor();
                
            return $retour;
        } 

        /*
         * Liste l'ensemble des établissements
         * Params : none
         */
        public function lister_etablissements(){
            $lister_etablissements = $this->base_de_donnee->prepare('SELECT * FROM etablissement');

            $lister_etablissements->execute();
            
            $retour = $lister_etablissements->fetch(PDO::FETCH_OBJ);
            $lister_etablissements->closeCursor();
                
            return $retour;
        } 

        /*
         * Mise à jour d'un établissement
         * Params : id nom adresse ville code_postal numero_telephone
         */
        public function update_etablissement($id, $nom, $adresse, $ville, $code_postal, $numero_telephone){
            $update_etablissement = $this->base_de_donnee->prepare('UPDATE etablissement SET  nom = ?, adresse = ?, ville = ?, code_postal = ?, numero_telephone = ? WHERE id = ?');
            
            $update_etablissement->bindValue(1, $nom, PDO::PARAM_STR);
            $update_etablissement->bindValue(2, $adresse, PDO::PARAM_STR);
            $update_etablissement->bindValue(3, $ville, PDO::PARAM_STR);
            $update_etablissement->bindValue(4, $code_postal, PDO::PARAM_STR);
            $update_etablissement->bindValue(5, $numero_telephone, PDO::PARAM_STR);
            $update_etablissement->bindValue(6, $id, PDO::PARAM_INT);
            $update_etablissement->execute();
        } 

        /*
         * Supprimer un établissement
         * Params : id
         */
        public function delete_etablissement($id){
            $delete_etablissement = $this->base_de_donnee->prepare('DELETE FROM etablissement WHERE id = ?');
            $delete_etablissement->bindValue(1, $id, PDO::PARAM_INT);
            $delete_etablissement->execute();
        }
    }
?>