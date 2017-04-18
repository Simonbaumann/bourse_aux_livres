<?php
class m_presentation{

		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        

		// ###### getter des données ######
        /*
            Récupère la première ligne de la présentation
            Il n'y aura qu'une seule ligne dans cette table -> pas d'insertion, juste de la mise à jour
        */
		public function get_presentation() {
         
				$presentation = $this->base_de_donnee->prepare('SELECT * FROM presentation WHERE id = 1');
				$presentation->execute();
				$retour = $presentation->fetch(PDO::FETCH_OBJ);
        		$presentation->closeCursor();
				return $retour;
		}

		/*
            PERMET DE METTRE A JOUR l'accueil
        */    
        public function updatePhoto($texte){
            $updatePhoto = $this->base_de_donnee->prepare('UPDATE presentation SET  texte = ? WHERE id = 1');

            $updatePhoto->bindValue(1, $texte, PDO::PARAM_STR);
            $updatePhoto->execute();
        }
}
?>