<?php
    /*
     * Classe manuel - Ensemble des fonctionnalités modèles de la table manuel
     * Attributs :
     * $id, $id_ouvrage, $id_etat, $prix, $id_adherent_depot
     */
    class m_manuel{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'un manuel 
         * Params : id_ouvrage, id_etat, prix, id_adherent_depot
         */
        public function ajouter_manuel($id_ouvrage, $id_etat, $prix, $id_adherent_depot){
            $ajouter_manuel = $this->base_de_donnee->prepare('INSERT INTO manuel (id_ouvrage, id_etat, prix, id_adherent_depot) 
            values (?, ?, ?, ?)');

            $ajouter_manuel->bindValue(1, $id_ouvrage, PDO::PARAM_STR);
            $ajouter_manuel->bindValue(2, $id_etat, PDO::PARAM_STR);
            $ajouter_manuel->bindValue(3, $prix, PDO::PARAM_STR);
            $ajouter_manuel->bindValue(4, $id_adherent_depot, PDO::PARAM_STR);
            $ajouter_manuel->execute();    

            return $ajouter_manuel;
        } 

        /*
         * Obtenir un manuel 
         * Params : id
         */
        public function get_manuel($id){
            $get_manuel = $this->base_de_donnee->prepare('SELECT * FROM manuel WHERE id = ?');

            $get_manuel->bindValue(1, $id, PDO::PARAM_INT);
            $get_manuel->execute();
            
            $retour = $get_manuel->fetch(PDO::FETCH_OBJ);
            $get_manuel->closeCursor();
                
            return $retour;
        } 

        /*
         * Liste l'ensemble des manuels
         * Params : none
         */
        public function lister_manuels(){
            $lister_manuels = $this->base_de_donnee->prepare('SELECT * FROM manuel');

            $lister_manuels->execute();
            
            $retour = $lister_manuels->fetchAll(PDO::FETCH_OBJ);
            $lister_manuels->closeCursor();
                
            return $retour;
        } 

        /*
         * Mise à jour d'un manuel
         * Params : $id, $id_ouvrage, $id_etat, $prix, $id_adherent_depot
         */
        public function update_manuel($id, $id_ouvrage, $id_etat, $prix, $id_adherent_depot){
            $update_etablissement = $this->base_de_donnee->prepare('UPDATE manuel SET  id_ouvrage = ?, id_etat = ?, prix = ?, id_adherent_depot = ? WHERE id = ?');
            
            $update_manuel->bindValue(1, $id_ouvrage, PDO::PARAM_STR);
            $update_manuel->bindValue(2, $id_etat, PDO::PARAM_STR);
            $update_manuel->bindValue(3, $prix, PDO::PARAM_STR);
            $update_manuel->bindValue(4, $id_adherent_depot, PDO::PARAM_STR);
            $update_manuel->bindValue(5, $id, PDO::PARAM_STR);
            $update_manuel->execute();
        } 

        /*
         * Supprimer un manuel
         * Params : id
         */
        public function delete_manuel($id){
            $delete_manuel = $this->base_de_donnee->prepare('DELETE FROM manuel WHERE id = ?');
            $delete_manuel->bindValue(1, $id, PDO::PARAM_INT);
            $delete_manuel->execute();
        }
    }
?>