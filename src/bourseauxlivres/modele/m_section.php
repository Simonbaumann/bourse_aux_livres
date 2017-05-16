<?php
    /*
     * Classe section - Ensemble des fonctionnalités modèles de la table section
     * Attributs :
     * id libelle 
     */
    class m_section {
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'une section
         * Params : libelle
         */
        public function ajouter_section($libelle){
            $ajouter_section = $this->base_de_donnee->prepare('INSERT INTO section (libelle) 
            values (?) ');

            $ajouter_section->bindValue(1, $libelle, PDO::PARAM_STR);
            $ajouter_section->execute();   
        } 

        /*
         * Obtenir une section 
         * Params : id
         */
        public function get_section($id){
            $get_section = $this->base_de_donnee->prepare('SELECT * FROM section WHERE id = ?');

            $get_section->bindValue(1, $id, PDO::PARAM_INT);
            $get_section->execute();
            
            $retour = $get_section->fetch(PDO::FETCH_OBJ);
            $get_section->closeCursor();
                
            return $retour;
        } 

        /*
         * Liste l'ensemble des sections
         * Params : none
         */
        public function lister_sections(){
            $lister_sections = $this->base_de_donnee->prepare('SELECT * FROM section');

            $lister_sections->execute();
            
            $retour = $lister_sections->fetchAll(PDO::FETCH_OBJ);
            $lister_sections->closeCursor();
                
            return $retour;
        } 

        /*
         * Mise à jour d'une section
         * Params : id, libelle
         */
        public function update_section($id, $libelle){
            $update_section = $this->base_de_donnee->prepare('UPDATE section SET  libelle = ? WHERE id = ?');
            
            $update_section->bindValue(1, $libelle, PDO::PARAM_STR);
            $update_section->bindValue(2, $id, PDO::PARAM_INT);
            $update_section->execute();
        } 

        /*
         * Supprimer une section
         * Params : id
         */
        public function delete_section($id){
            $delete_section = $this->base_de_donnee->prepare('DELETE FROM section WHERE id = ?');
            $delete_section->bindValue(1, $id, PDO::PARAM_INT);
            $delete_section->execute();
        }

        public function get_section_generale(){
            $get_section_generale = $this->base_de_donnee->prepare('SELECT * FROM section WHERE libelle = ?');

            $get_section_generale->bindValue(1, 'Generale', PDO::PARAM_STR);
            $get_section_generale->execute();
            
            $retour = $get_section_generale->fetch(PDO::FETCH_OBJ);
            $get_section_generale->closeCursor();
                
            return $retour;
        }
    }
?>