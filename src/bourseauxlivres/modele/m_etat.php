<?php
    /*
     * Classe etat - Ensemble des fonctionnalités modèles de la table etat
     * Attributs :
     * id libelle decote
     */
    class m_etat{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'un etat
         * Params : libelle decote
         */
        public function ajouter_etat($libelle, $decote){
            $ajouter_etat = $this->base_de_donnee->prepare('INSERT INTO classe (libelle, etat) 
            values (?, ?) ');

            $ajouter_etat->bindValue(1, $libelle, PDO::PARAM_STR);
            $ajouter_etat->bindValue(2, $etat, PDO::PARAM_STR);
            $ajouter_etat->execute();   
        } 

        /*
         * Obtenir un etat 
         * Params : id
         */
        public function get_etat($id){
            $get_etat = $this->base_de_donnee->prepare('SELECT * FROM etat WHERE id = ?');

            $get_etat->bindValue(1, $id, PDO::PARAM_INT);
            $get_etat->execute();
            
            $retour = $get_etat->fetch(PDO::FETCH_OBJ);
            $get_etat->closeCursor();
                
            return $retour;
        } 

        /*
         * Liste l'ensemble des etat
         * Params : none
         */
        public function lister_etats(){
            $lister_etats = $this->base_de_donnee->prepare('SELECT * FROM etat');

            $lister_etats->execute();
            
            $retour = $lister_etats->fetch(PDO::FETCH_OBJ);
            $lister_etats->closeCursor();
                
            return $retour;
        } 

        /*
         * Mise à jour d'un etat
         * Params : id, libelle, decote
         */
        public function update_etat($id, $libelle, $decote){
            $update_etat = $this->base_de_donnee->prepare('UPDATE etat SET  libelle = ?, decote = ? WHERE id = ?');
            
            $update_etat->bindValue(1, $libelle, PDO::PARAM_STR);
            $update_etat->bindValue(2, $decote, PDO::PARAM_STR);
            $update_etat->bindValue(3, $id, PDO::PARAM_INT);
            $update_etat->execute();
        } 

        /*
         * Supprimer un etat
         * Params : id
         */
        public function delete_etat($id){
            $delete_etat = $this->base_de_donnee->prepare('DELETE FROM etat WHERE id = ?');
            $delete_etat->bindValue(1, $id, PDO::PARAM_INT);
            $delete_etat->execute();
        }
    }
?>