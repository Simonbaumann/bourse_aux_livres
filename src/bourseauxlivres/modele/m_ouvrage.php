<?php
    /*
     * Classe ouvrage - Ensemble des fonctionnalités modèles de la table ouvrage
     * Attributs :
     * $isbn, $nom, $type, $editeur, $classe, $section, $date_cotisation
     */
    class m_ouvrage{
		
		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
         * Ajout d'un ouvrage 
         * Params : $nom, $type, $editeur, $classe, $section, $date_cotisation
         */
        public function ajouter_ouvrage($nom, $type, $editeur, $classe, $section, $prix_neuf, $date_cotisation){
            $ajouter_ouvrage = $this->base_de_donnee->prepare('INSERT INTO ouvrage (nom, type, editeur, classe, section, prix_neuf, date_cotisation) 
            values (?, ?, ?, ?, ?, ?, ?)');

            $ajouter_ouvrage->bindValue(1, $nom, PDO::PARAM_STR);
            $ajouter_ouvrage->bindValue(2, $type, PDO::PARAM_STR);
            $ajouter_ouvrage->bindValue(3, $editeur, PDO::PARAM_STR);
            $ajouter_ouvrage->bindValue(4, $classe, PDO::PARAM_INT);
            $ajouter_ouvrage->bindValue(5, $section, PDO::PARAM_INT);
            $ajouter_ouvrage->bindValue(6, $prix_neuf, PDO::PARAM_STR);
            $ajouter_ouvrage->bindValue(7, $date_cotisation, PDO::PARAM_STR);
            $ajouter_ouvrage->execute();    

            return $ajouter_ouvrage;
        } 

        /*
         * Obtenir un ouvrage
         * Params : id
         */
        public function get_ouvrage($isbn){
            $get_ouvrage = $this->base_de_donnee->prepare('SELECT * FROM ouvrage WHERE isbn = ?');

            $get_ouvrage->bindValue(1, $isbn, PDO::PARAM_INT);
            $get_ouvrage->execute();
            
            $retour = $get_ouvrage->fetch(PDO::FETCH_OBJ);
            $get_ouvrage->closeCursor();
                
            return $retour;
        } 

        /*
         * Liste l'ensemble des ouvrages
         * Params : none
         */
        public function lister_ouvrages(){
            $lister_ouvrages = $this->base_de_donnee->prepare('SELECT * FROM ouvrage');

            $lister_ouvrages->execute();
            
            $retour = $lister_ouvrages->fetchAll(PDO::FETCH_OBJ);
            $lister_ouvrages->closeCursor();
                
            return $retour;
        } 

        /*
         * Mise à jour d'un ouvrage
         * Params : $isbn, $nom, $type, $editeur, $classe, $section, $date_cotisation
         */
        public function update_ouvrage($isbn, $nom, $type, $editeur, $classe, $section, $prix_neuf, $date_cotisation){
            $update_ouvrage = $this->base_de_donnee->prepare('UPDATE ouvrage SET  nom = ?, type = ?, editeur = ?, classe = ?, section = ?, prix_neuf = ?, date_cotisation = ? WHERE isbn = ?');
            
            $update_ouvrage->bindValue(1, $nom, PDO::PARAM_STR);
            $update_ouvrage->bindValue(2, $type, PDO::PARAM_STR);
            $update_ouvrage->bindValue(3, $editeur, PDO::PARAM_STR);
            $update_ouvrage->bindValue(4, $classe, PDO::PARAM_INT);
            $update_ouvrage->bindValue(5, $section, PDO::PARAM_INT);
            $update_ouvrage->bindValue(6, $prix_neuf, PDO::PARAM_STR);
            $update_ouvrage->bindValue(7, $date_cotisation, PDO::PARAM_STR);
            $update_ouvrage->bindValue(8, $isbn, PDO::PARAM_INT);
            $update_ouvrage->execute();
        } 

        /*
         * Supprimer un ouvrage
         * Params : id
         */
        public function delete_ouvrage($isbn){
            $delete_ouvrage = $this->base_de_donnee->prepare('DELETE FROM ouvrage WHERE isbn = ?');
            $delete_ouvrage->bindValue(1, $isbn, PDO::PARAM_INT);
            $delete_ouvrage->execute();
            return $delete_ouvrage;
        }

        /*
            Permet de rechercher des ouvrages
        */
        public function rechercher_ouvrages($recherche){
            
            //permet de stocker le résultat dans un tableau, on supprime les espaces
            $s = explode(" ", $recherche);
            // On stocke notre requête dans une variable qu'on pourra modifier en fonction des résultats
            $sqlAND = "SELECT * FROM ouvrage";
            $sqlOR = "SELECT * FROM ouvrage";
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
                    $sqlAND.="nom like '%$mots%' AND editeur like '%$mots%'";
                    $sqlOR.="nom like '%$mots%' OR editeur like '%$mots%'";
                    // On incrémente l'indice
                    $i++;
                }

                // UNION des 2 requêtes AND et OR
                $sql = $sqlAND ." UNION ".$sqlOR;

                // Traitement requête
                $rechercher_ouvrages = $this->base_de_donnee->prepare($sql);
                $rechercher_ouvrages->execute();

                $retour = $rechercher_ouvrages->fetchAll(PDO::FETCH_OBJ);
                $rechercher_ouvrages->closeCursor();
                    
                return $retour;
            }
        }
    }
?>