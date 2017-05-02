<?php
	class m_slider{

		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
            PERMET DE LISTE L'ENSEMBLE DES SLIDERS
        */
		public function listerSlider() {
			$listerSlider = $this->base_de_donnee->prepare('SELECT * FROM sliders');
			$listerSlider->execute();
        
			$retour = $listerSlider->fetchAll(PDO::FETCH_OBJ);
			$listerSlider->closeCursor();
        
			return $retour;
		}

        /*
            PERMET D'OBTENIR UN SLIDER
        */    
        public function get_slider($id){
            $get_slider = $this->base_de_donnee->prepare('SELECT * FROM sliders WHERE id=?');
            $get_slider->bindValue(1, $id, PDO::PARAM_INT);
            $get_slider->execute();
            
            $retour = $get_slider->fetch(PDO::FETCH_OBJ);
            $get_slider->closeCursor();
                
            return $retour;
        }

        /*
            PERMET DE METTRE A JOUR UN SLIDER
        */    
        public function update_slider($id, $path, $lien, $titre){
            $update_slider = $this->base_de_donnee->prepare('UPDATE sliders SET  path = ?, lien = ?, titre = ? WHERE id = ?');

            $update_slider->bindValue(1, $path, PDO::PARAM_STR);
            $update_slider->bindValue(2, $lien, PDO::PARAM_STR);
            $update_slider->bindValue(3, $titre, PDO::PARAM_STR);
            $update_slider->bindValue(4, $id, PDO::PARAM_INT);
            $update_slider->execute();
        }
        /*
            PERMET DE RENDRE UN SLIDER ACTIF
        */    
        public function activate_slider($id){
            $activate_slider = $this->base_de_donnee->prepare('UPDATE sliders SET  actif = true WHERE id = ?');
            $activate_slider->bindValue(1, $id, PDO::PARAM_INT);
            $activate_slider->execute();
        }
        /* 
            Permet de rendre inactif les sliders 
        */
        public function desactivate_allslider(){
            // On désactive tout afin de mettre les sliders sélectionnées actifs
            $desactivate_slider = $this->base_de_donnee->prepare('UPDATE sliders SET actif = false');
            $desactivate_slider->execute();
        }
        /* 
            Permet de compter le nombre de slider actif 
        */
        public function count_active_slider(){
            $count_active_slider = $this->base_de_donnee->prepare('SELECT COUNT(actif) AS nbr FROM sliders WHERE actif=1');
            $count_active_slider->execute();
            
            $retour = $count_active_slider->fetch(PDO::FETCH_OBJ);
            $count_active_slider->closeCursor();
                
            return $retour;
        }
        /* 
            Permet de récupérer les sliders actif s
        */
        public function liste_sliders_actifs(){
            $liste_sliders_actifs = $this->base_de_donnee->prepare('SELECT * FROM sliders WHERE actif=1');
            $liste_sliders_actifs->execute();
            
            $retour = $liste_sliders_actifs->fetchAll(PDO::FETCH_OBJ);
            $liste_sliders_actifs->closeCursor();
                
            return $retour;
        }
}
?>