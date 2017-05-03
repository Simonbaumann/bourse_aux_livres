<?php
    /*
     * Classe classe - Ensemble des fonctionnalités modèles de la table classe
     * Attributs :
     * id libelle
     */
    class m_classe{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'une classe
         * Params : libelle
         */
        public function ajouter_classe($libelle){
            $ajouter_adherent = $this->base_de_donnee->prepare('INSERT INTO classe (libelle) 
            values (?) ');

            $ajouter_classe->bindValue(1, $libelle, PDO::PARAM_STR);
            $ajouter_classe->execute();   
        } 

        /*
         * Obtenir une classe 
         * Params : id
         */
        public function get_classe($id){
            $get_classe = $this->base_de_donnee->prepare('SELECT * FROM classe WHERE id = ?');

            $get_classe->bindValue(1, $id, PDO::PARAM_INT);
            $get_classe->execute();
            
            $retour = $get_classe->fetch(PDO::FETCH_OBJ);
            $get_classe->closeCursor();
                
            return $retour;
        } 

        /*
         * Liste l'ensemble des classes
         * Params : none
         */
        public function lister_classes(){
            $lister_classes = $this->base_de_donnee->prepare('SELECT * FROM classe');

            $lister_classes->execute();
            
            $retour = $lister_classes->fetch(PDO::FETCH_OBJ);
            $lister_classes->closeCursor();
                
            return $retour;
        } 

        /*
         * Mise à jour d'une classe
         * Params : id, libelle
         */
        public function update_classe($id, $libelle){
            $update_classe = $this->base_de_donnee->prepare('UPDATE classe SET  libelle = ? WHERE id = ?');
            
            $update_classe->bindValue(1, $nom, PDO::PARAM_STR);
            $update_classe->bindValue(2, $id, PDO::PARAM_INT);
            $update_classe->execute();
        } 

        /*
         * Supprimer une classe
         * Params : id
         */
        public function delete_classe($id){
            $delete_classe = $this->base_de_donnee->prepare('DELETE FROM classe WHERE id = ?');
            $delete_classe->bindValue(1, $id, PDO::PARAM_INT);
            $delete_classe->execute();
        }
    }
?>