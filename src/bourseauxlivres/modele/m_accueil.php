<?php
class m_accueil{

		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        

		// ###### getter des données ######
        /*
            Récupère la première ligne de l'accueil
            Il n'y aura qu'une seule ligne dans cette table -> pas d'insertion, juste de la mise à jour
        */
		public function get_accueil() {
				$accueil = $this->base_de_donnee->prepare('SELECT * FROM accueil WHERE id = 1');
				$accueil->execute();
				$retour = $accueil->fetch(PDO::FETCH_OBJ);
        		$accueil->closeCursor();
				return $retour;
		}

		/*
            PERMET DE METTRE A JOUR l'accueil
        */    
        public function updateAccueil($contenu){
            $updatePhoto = $this->base_de_donnee->prepare('UPDATE accueil SET contenu = ? WHERE id = 1');

            $updatePhoto->bindValue(1, $contenu, PDO::PARAM_STR);
            $updatePhoto->execute();
        }
}
?>