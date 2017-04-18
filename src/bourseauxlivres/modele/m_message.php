<?php
	class m_message{

		private $base_de_donnee;
		
		public function __construct($base_de_donnee){
			$this->base_de_donnee = $base_de_donnee;
		}
        
        /*
            PERMET DE LISTE L'ENSEMBLE DES MESSAGES
        */
		public function liste_message($numPage) {
            // Calcul num page - 1 * nbr element par page 
            $calcul = ($numPage - 1) * NB_ELEMENT_PAGE;
     
			$liste_message = $this->base_de_donnee->prepare('SELECT * FROM messagecontact LIMIT ?, '.NB_ELEMENT_PAGE);
            $liste_message->bindValue(1, $calcul, PDO::PARAM_INT);
			$liste_message->execute();
        
			$retour = $liste_message->fetchAll(PDO::FETCH_OBJ);
			$liste_message->closeCursor();
        
			return $retour;
		}

        /*
            PERMET D'OBTENIR UN MESSAGE
        */    
        public function get_message($id){
            $get_message = $this->base_de_donnee->prepare('SELECT * FROM messagecontact WHERE id=?');
            $get_message->bindValue(1, $id, PDO::PARAM_INT);
            $get_message->execute();
            
            $retour = $get_message->fetch(PDO::FETCH_OBJ);
            $get_message->closeCursor();
                
            return $retour;
        }

        /*
            PERMET D'AJOUTER UN MESSAGE
        */    
        public function add_message($nom, $prenom, $email, $sujet, $message, $dateEnvoie, $lu, $ip){
            $add_message = $this->base_de_donnee->prepare('INSERT INTO messagecontact (nom, prenom, email, sujet, message, dateEnvoie, lu, ip) 
            values (?, ?, ?, ?, ?, ?, ?, ?) ');
            $add_message->bindValue(1, $nom, PDO::PARAM_STR);
            $add_message->bindValue(2, $prenom, PDO::PARAM_STR);
            $add_message->bindValue(3, $email, PDO::PARAM_STR);
            $add_message->bindValue(4, $sujet, PDO::PARAM_STR);
            $add_message->bindValue(5, $message, PDO::PARAM_STR);
            $add_message->bindValue(6, $dateEnvoie, PDO::PARAM_STR);
            $add_message->bindValue(7, $lu, PDO::PARAM_BOOL);
            $add_message->bindValue(8, $ip, PDO::PARAM_STR);
            $add_message->execute();
        }
    
        /*
            PERMET DE SUPPRIMER UN ARTICLE
        */    
        public function delete_message($id){
            $delete_message = $this->base_de_donnee->prepare('DELETE FROM messagecontact WHERE id = ?');
            $delete_message->bindValue(1, $id, PDO::PARAM_INT);
            $delete_message->execute();
        }

        /*
            PERMET DE COMPTER LES MESSAGES NON LU
        */    
        public function count_unread_message(){
            $count_unread_message = $this->base_de_donnee->prepare('SELECT COUNT(*) as nbMessagesNonLu FROM messagecontact WHERE lu = 0');
            $count_unread_message->execute();

            $retour = $count_unread_message->fetch(PDO::FETCH_OBJ);
            $count_unread_message->closeCursor();
                
            return $retour;
        }
        /*
            MARQUE UN MESSAGE COMME LU
        */    
        public function set_as_read($id){
            $set_as_read = $this->base_de_donnee->prepare('UPDATE messagecontact SET  lu = 1 WHERE id = ?');
            $set_as_read->bindValue(1, $id, PDO::PARAM_INT);
            $set_as_read->execute();
        }
        /*
            MARQUE UN MESSAGE COMME NON LU LU
        */    
        public function set_as_unread($id){
            $set_as_read = $this->base_de_donnee->prepare('UPDATE messagecontact SET  lu = 0 WHERE id = ?');
            $set_as_read->bindValue(1, $id, PDO::PARAM_INT);
            $set_as_read->execute();
        }
}
?>