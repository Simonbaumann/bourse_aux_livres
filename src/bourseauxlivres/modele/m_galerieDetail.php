<?php
	class m_galerie{

		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
            PERMET DE LISTE L'ENSEMBLE DES PHOTOS
        */
		public function listerPhotos() {
			$listerPhotos = $this->base_de_donnee->prepare('SELECT * FROM photos');
			$listerPhotos->execute();
        
			$retour = $listerPhotos->fetchAll(PDO::FETCH_OBJ);
			$listerPhotos->closeCursor();
        
			return $retour;
		}

        /*
            PERMET D'OBTENIR UNE PHOTO
        */    
        public function getPhoto($id){
            $getPhoto = $this->base_de_donnee->prepare('SELECT * FROM photos WHERE id=?');
            $getPhoto->bindValue(1, $id, PDO::PARAM_INT);
            $getPhoto->execute();
            
            $retour = $getPhoto->fetch(PDO::FETCH_OBJ);
            $getPhoto->closeCursor();
                
            return $retour;
        }

        /*
            PERMET DE METTRE A JOUR UNE PHOTO
        */    
        public function updatePhoto($id, $path, $lien, $titre){
            $update_slider = $this->base_de_donnee->prepare('UPDATE photos SET  path = ?, lien = ?, titre = ? WHERE id = ?');

            $update_slider->bindValue(1, $path, PDO::PARAM_STR);
            $update_slider->bindValue(2, $lien, PDO::PARAM_STR);
            $update_slider->bindValue(3, $titre, PDO::PARAM_STR);
            $update_slider->bindValue(4, $id, PDO::PARAM_INT);
            $update_slider->execute();
        }

        /* 
            Permet de compter le nombre de photos
        */
        public function countPhotos(){
            $countPhotos = $this->base_de_donnee->prepare('SELECT COUNT(*) AS nbr FROM photos');
            $countPhotos->execute();
            
            $retour = $countPhotos->fetch(PDO::FETCH_OBJ);
            $countPhotos->closeCursor();
                
            return $retour;
        }

        /* 
            Permet d'insérer une photo
        */
        public function addPhotos($titre, $description, $lien, $nom, $extension, $date_ajout){
            $addPhotos = $this->base_de_donnee->prepare('INSERT INTO photos (titre, description, lien, nom, extension, date_ajout) 
            values (?, ?, ?, ?, ?, ?)');

            $addPhotos->bindValue(1, $titre, PDO::PARAM_STR);
            $addPhotos->bindValue(2, $description, PDO::PARAM_STR);
            $addPhotos->bindValue(3, $lien, PDO::PARAM_STR);
            $addPhotos->bindValue(4, $nom, PDO::PARAM_STR);
            $addPhotos->bindValue(5, $extension, PDO::PARAM_INT);
            $addPhotos->bindValue(6, $date_ajout, PDO::PARAM_STR);

            $addPhotos->execute();
        }

        /*
            Permet de supprimer une photo
        */    
        public function deletePhoto($id){
            $deletePhoto = $this->base_de_donnee->prepare('DELETE FROM photos WHERE id = ?');
            $deletePhoto->bindValue(1, $id, PDO::PARAM_INT);
            $deletePhoto->execute();
        }
}
?>