<?php
    /*
     * Classe adherents - Ensemble des fonctionnalités modèles de la table adherent
     * Attributs :
     * id nom prenom adresse ville code_postal
     */
    class m_adherent{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'un adherent
         * Params : nom, prenom, adresse, ville, code postal
         */
        public function ajouter_adherent($nom, $prenom, $adresse, $ville, $code_postal, $date_cotisation){
            $ajouter_adherent = $this->base_de_donnee->prepare('INSERT INTO adherent (nom, prenom, adresse, ville, code_postal, date_cotisation) 
            values (?, ?, ?, ?, ?, ?) ');

            $ajouter_adherent->bindValue(1, $nom, PDO::PARAM_STR);
            $ajouter_adherent->bindValue(2, $prenom, PDO::PARAM_STR);
            $ajouter_adherent->bindValue(3, $adresse, PDO::PARAM_STR);
            $ajouter_adherent->bindValue(4, $ville, PDO::PARAM_STR);
            $ajouter_adherent->bindValue(5, $code_postal, PDO::PARAM_STR);
            $ajouter_adherent->bindValue(6, $date_cotisation, PDO::PARAM_STR);
            $ajouter_adherent->execute();   
            return $ajouter_adherent;
        } 

        /*
         * Obtenir un adherent 
         * Params : id
         */
        public function get_adherent($id){
            $get_adherent = $this->base_de_donnee->prepare('SELECT * FROM adherent WHERE id = ?');

            $get_adherent->bindValue(1, $id, PDO::PARAM_INT);
            $get_adherent->execute();
            
            $retour = $get_adherent->fetch(PDO::FETCH_OBJ);
            $get_adherent->closeCursor();
                
            return $retour;
        } 

        /*
         * Liste l'ensemble des adhérents
         * Params : none
         */
        public function lister_adherents(){
            $lister_adherents = $this->base_de_donnee->prepare('SELECT * FROM adherent');

            $lister_adherents->execute();
            
            $retour = $lister_adherents->fetchAll(PDO::FETCH_OBJ);
            $lister_adherents->closeCursor();
                
            return $retour;
        } 

        /*
         * Mise à jour d'un adhérent
         * Params : id, nom, prenom, adresse, ville, code_postal
         */
        public function update_adherent($id, $nom, $prenom, $adresse, $ville, $code_postal){
            $update_adherent = $this->base_de_donnee->prepare('UPDATE adherent SET  nom = ?, prenom = ?, adresse = ?, ville = ?, code_postal = ? WHERE id = ?');
            
            $update_adherent->bindValue(1, $nom, PDO::PARAM_STR);
            $update_adherent->bindValue(2, $prenom, PDO::PARAM_STR);
            $update_adherent->bindValue(3, $adresse, PDO::PARAM_STR);
            $update_adherent->bindValue(4, $ville, PDO::PARAM_STR);
            $update_adherent->bindValue(5, $code_postal, PDO::PARAM_STR);
            $update_adherent->bindValue(6, $id, PDO::PARAM_INT);
            $update_adherent->execute();
        } 

        /*
         * Supprimer un adhérent
         * Params : id
         */
        public function delete_adherent($id){
            $delete_adherent = $this->base_de_donnee->prepare('DELETE FROM adherent WHERE id = ?');
            $delete_adherent->bindValue(1, $id, PDO::PARAM_INT);
            $delete_adherent->execute();
            return $delete_adherent;
        }

        /*
            Permet de rechercher des adhérents
        */
        public function rechercher_adherents($recherche){
            
            //permet de stocker le résultat dans un tableau, on supprime les espaces
            $s = explode(" ", $recherche);
            // On stocke notre requête dans une variable qu'on pourra modifier en fonction des résultats
            $sqlAND = "SELECT * FROM adherent";
            $sqlOR = "SELECT * FROM adherent";
            $i=0; // indice

            // On va parcourir le tableau $s
            foreach($s as $mots){
                // pour éviter injection sql
                $mots = addslashes($mots); 

                if(strlen($mots)>3){ // pour éviter les petits mots comme le de etc... 
                    if($i==0){
                        $sqlAND.= " WHERE ";
                        $sqlOR.= " WHERE ";
                    }
                    else{
                        $sqlAND.= " AND ";
                        $sqlOR.= " OR ";
                    }
                    // On met en place enfin la requête sql
                    $sqlAND.="nom like '%$mots%' AND prenom like '%$mots%'";
                    $sqlOR.="nom like '%$mots%' OR prenom like '%$mots%'";
                    // On incrémente l'indice
                    $i++;
                }

                // UNION des 2 requêtes AND et OR
                $sql = $sqlAND ." UNION ".$sqlOR;

                // Traitement requête
                $rechercher_adherents = $this->base_de_donnee->prepare($sql);
                $rechercher_adherents->execute();

                $retour = $rechercher_adherents->fetchAll(PDO::FETCH_OBJ);
                $rechercher_adherents->closeCursor();
                    
                return $retour;
            }
        }
    }
?>