/*
 * Paramétrage
 */

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id`, `libelle`) VALUES
(1, 'Seconde'),
(2, 'Première'),
(3, 'Terminale');

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
(9, 'Science et vie de la terre'),
(10, 'Philosophie'),
(11, 'Economie');

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
(2, 'Baumann', 'Simon', 'Rue du wiwizzz', 'Toulouse', '31000', '1494242125'),
(3, 'Baumann', 'Simon', 'Rue du wiwizzz', 'Toulouse', '31000', '1494242127'),
(4, 'Baumann', 'Simon', 'Rue du wiwizzz', 'Toulouse', '31000', '1494242130'),
(5, 'Baumann', 'Simon', 'Rue du wiwizzz', 'Toulouse', '31000', '1494242136');
