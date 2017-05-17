/*
 * Paramétrage
 */


--
-- Contenu de la table `etablissement`
--
INSERT INTO `etablissement` (`id`, `nom`, `adresse`, `ville`, `code_postal`, `numero_telephone`) VALUES
(1, 'Lycée Marcelin Berthelot', 'Toulouse', '42 chemin des etudes', '31300', '0985456368'),
(2, 'Lycée Fosch', 'Rodez', '12 rue du Thor', '12000', '0985201475'),
(3, 'Lycée Henri Malepere', 'Montauban', '05 Avenue Saint Pierre', '34000', '0587963214');


--
-- Contenu de la table `classe`
--
INSERT INTO `classe` (`id`, `libelle`) VALUES
(1, 'Seconde'),
(2, 'Première'),
(3, 'Terminale');


--
-- Contenu de la table `section`
--
INSERT INTO `section` (`id`, `libelle`) VALUES
(1, 'Generale'),
(2, 'S'),
(3, 'ES'),
(4, 'L'),
(5, 'STMG'),
(6, 'ST2S');

--
-- Contenu de la table `matiere`
--
INSERT INTO `matiere` (`id`, `libelle`) VALUES
(1, 'Français'),
(2, 'Chimie'),
(3, 'Histoire'),
(4, 'Géographie'),
(5, 'Anglais'),
(6, 'Espagnol'),
(7, 'Physique'),
(8, 'Mathématiques'),
(9, 'SVT'),
(10, 'Philosophie'),
(11, 'Economie');


--
-- Contenu de la table `ouvrage`
--
INSERT INTO `ouvrage` (`isbn`, `nom`, `type`, `editeur`, `classe`, `section`, `prix_neuf`, `date_cotisation`) VALUES
(1002, 'Mathématiques', '1', 'Nathan', 1, 1, 24.95, '1494947053'),
(1003, 'Mathématiques', '1', 'Nathan', 1, 1, 15.63, '1494947080'),
(1004, 'Mathématiques', '1', 'Nathan', 1, 1, 41, '1494947118'),
(2103, 'PhysicPlus', '7', 'Hardue', 3, 2, 23.2, '1494242125'),
(3570, 'Mathrodur', '8', 'CasseTete', 1, 1, 10.12, '1494242125'),
(4685, 'PhysicPlus', '7', 'Sciences', 2, 6, 41.3, '1494242125'),
(14785, 'HexaMaths', '8', 'Galimar', 2, 2, 5.36, '1494242125'),
(24583, 'TopChimie', '2', 'Edichim', 2, 3, 6.96, '1494242125'),
(31872, 'Mathrodur', '8', 'CasseTete', 2, 1, 7.85, '1494242125'),
(35415, 'GéoPlus', '4', 'LeMonde', 2, 6, 6.23, '1494242125'),
(35746, 'English', '5', 'Improve', 3, 6, 14.36, '1494242125'),
(45628, 'Français', '1', 'French', 1, 1, 25.36, '1494242125'),
(55410, 'EcoPlus', '11', 'Galimar', 2, 5, 14.25, '1494242125'),
(85411, 'GeoPlus', '4', 'Galimar', 1, 1, 25.5, '1494242125'),
(85421, 'HistEnBar', '3', 'Jaquelin', 1, 1, 30.2, '1494242125'),
(85462, 'Leanr English', '5', 'Zaion', 1, 1, 14.78, '1494242125'),
(85743, 'Espanish', '6', 'Improve', 2, 4, 24.3, '1494242125'),
(97663, 'Philo', '10', 'Pourquoi', 3, 4, 6.36, '1494242125'),
(98700, 'English', '5', 'Improve', 3, 1, 7.25, '1494242125'),
(99852, 'EcoEco', '11', 'PicSous', 3, 5, 8.65, '1494242125'),
(99855, 'La terre', '9', 'Parceque', 3, 3, 32.56, '1494242125'),
(99856, 'Mathématiques', '8', 'Nathan', 2, 3, 32.56, '1494951584'),
(99857, 'azeaze', '1', 'Nathan', 1, 1, 32.56, '1494951624');


--
-- Contenu de la table `utilisateur`
--
INSERT INTO `utilisateur` (`id`, `adresse_email`, `password`, `is_admin`) VALUES
(17, 'simonbaumann20@gmail.com', '989912a995707472189c91ca7cf85d47abc5a5d836a8596d4447555b98b91d7d', 1),
(19, 'k.viguier@gmail.com', '989912a995707472189c91ca7cf85d47abc5a5d836a8596d4447555b98b91d7d', 1),
(20, 'simonbaumann21@gmail.com', '989912a995707472189c91ca7cf85d47abc5a5d836a8596d4447555b98b91d7d', 0);


--
-- Contenu de la table `adherent`
--
INSERT INTO `adherent` (`id`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `date_cotisation`) VALUES
(2, 'Baumann', 'Simon', 'Rue du lourd', 'Toulouse', '31000', '1494242125'),
(3, 'Viguier', 'Kristen', 'Rue des peks', 'Abli', '81000', '1494242127'),
(4, 'Rich', 'Guillaume', 'Rue des billets', 'Albi', '81200', '1494242130'),
(5, 'Montmoulinex', 'Damien', 'Impasse Docker ', 'Toulouse', '31000', '1494242136'),
(6, 'Bataille', 'Valentin', 'Chemin du pigeonier ', 'Montauban', '34000', '1494242136'),
(7, 'Mouly', 'Xavier', 'Rue de l\'accordeon', 'Bordeaux', '38000', '1494242140'),
(8, 'Pitiot', 'Paul', 'Impasse Javamon', 'Genebriere', '34500', '1494242142');


--
-- Contenu de la table `etat`
--
INSERT INTO `etat` (`id`, `intitule`, `decote`) VALUES
(1, 'TB', '0.25'),
(2, 'B', '0.40'),
(3, 'AB', '0.50'),
(4, 'E', '0.65');

--
-- Contenu de la table `manuel`
--

INSERT INTO `manuel` (`id`, `id_ouvrage`, `id_etat`, `prix`, `id_adherent_depot`) VALUES
(14, 1002, 3, 12.475, 2),
(15, 97663, 3, 3.18, 2);
