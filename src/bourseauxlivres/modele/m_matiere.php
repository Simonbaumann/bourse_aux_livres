<?php
    /*
     * Classe matiere - Ensemble des fonctionnalités modèles de la table mateire
     * Attributs :
     * id libelle
     */
    class m_matiere{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'une matiere
         * Params : libelle
         */
        public function ajouter_matiere($libelle){
            $ajouter_matiere = $this->base_de_donnee->prepare('INSERT INTO matiere (libelle) 
            values (?)');

            $ajouter_matiere->bindValue(1, $libelle, PDO::PARAM_STR);
            $ajouter_matiere->execute();   
        } 

        /*
         * Obtenir une matiere
         * Params : id
         */
        public function get_matiere($id){
            $get_matiere = $this->base_de_donnee->prepare('SELECT * FROM matiere WHERE id = ?');

            $get_matiere->bindValue(1, $id, PDO::PARAM_INT);
            $get_matiere->execute();
            
            $retour = $get_matiere->fetch(PDO::FETCH_OBJ);
            $get_matiere->closeCursor();
                
            return $retour;
        } 

        /*
         * Liste l'ensemble des matiere
         * Params : none
         */
        public function lister_matieres(){
            $lister_matieres = $this->base_de_donnee->prepare('SELECT * FROM matiere');

            $lister_matieres->execute();
            
            $retour = $lister_matieres->fetchAll(PDO::FETCH_OBJ);
            $lister_matieres->closeCursor();
                
            return $retour;
        } 

        /*
         * Mise à jour d'une matiere
         * Params : id, libelle         */
        public function update_matiere($id, $libelle){
            $update_matiere = $this->base_de_donnee->prepare('UPDATE matiere SET  libelle = ? WHERE id = ?');
            
            $update_matiere->bindValue(1, $libelle, PDO::PARAM_STR);
            $update_matiere->bindValue(2, $id, PDO::PARAM_INT);
            $update_matiere->execute();
        } 

        /*
         * Supprimer un matiere
         * Params : id
         */
        public function delete_matiere($id){
            $delete_matiere = $this->base_de_donnee->prepare('DELETE FROM matiere WHERE id = ?');
            $delete_matiere->bindValue(1, $id, PDO::PARAM_INT);
            $delete_matiere->execute();
        }
    }
?>