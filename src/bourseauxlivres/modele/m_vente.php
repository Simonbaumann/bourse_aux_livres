<?php
    /*
     * Classe vente - Ensemble des fonctionnalités modèles de la table vente
     * Attributs :
     * id_manuel id_adherent_acheteur
     */
    class m_vente {
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'une vente
         * Params : id_manuel id_adherent_acheteur
         */
        public function ajouter_vente($id_manuel, $id_adherent_acheteur){
            $ajouter_vente = $this->base_de_donnee->prepare('INSERT INTO vente (id_manuel, id_adherent_acheteur) 
            values (?, ?) ');

            $ajouter_vente->bindValue(1, $id_manuel, PDO::PARAM_STR);
            $ajouter_vente->bindValue(2, $id_adherent_acheteur, PDO::PARAM_STR);
            $ajouter_vente->execute();   
        } 

        /*
         * Obtenir l'ensemble des livres achetés par un adhérents
         * Params : id_adherent_acheteur
         */
        public function get_livre_acheter_par_adherent($id_adherent_acheteur){
            $get_livre_acheter_par_adherent = $this->base_de_donnee->prepare('SELECT * FROM vente WHERE id_adherent_acheteur = ?');

            $get_livre_acheter_par_adherent->bindValue(1, $id_adherent_acheteur, PDO::PARAM_INT);
            $get_livre_acheter_par_adherent->execute();
            
            $retour = $get_livre_acheter_par_adherent->fetch(PDO::FETCH_OBJ);
            $get_livre_acheter_par_adherent->closeCursor();
                
            return $retour;
        } 

        /*
         * Obtenir manuel vendu
         * Params : id_manuel
         */
        public function get_livre_vendu($id_manuel){
            $get_livre_vendu = $this->base_de_donnee->prepare('SELECT * FROM vente WHERE id_manuel = ?');

            $get_livre_vendu->bindValue(1, $id_manuel, PDO::PARAM_INT);
            $get_livre_vendu->execute();
            
            $retour = $get_livre_vendu->fetch(PDO::FETCH_OBJ);
            $get_livre_vendu->closeCursor();
                
            return $retour;
        }

        /*
         * Liste l'ensemble des ventes
         * Params : none
         */
        public function lister_ventes(){
            $lister_ventes = $this->base_de_donnee->prepare('SELECT * FROM vente');

            $lister_ventes->execute();
            
            $retour = $lister_ventes->fetch(PDO::FETCH_OBJ);
            $lister_ventes->closeCursor();
                
            return $retour;
        } 

        /*
         * Supprimer une vente
         * Params : id_manuel
         */
        public function delete_vente($id_manuel){
            $delete_vente = $this->base_de_donnee->prepare('DELETE FROM vente WHERE id_manuel = ?');
            $delete_vente->bindValue(1, $id_manuel, PDO::PARAM_INT);
            $delete_vente->execute();
        }
    }
?>