-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 08 Février 2017 à 13:30
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `naturopathe`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueil`
--

CREATE TABLE `accueil` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `dateEnvoi` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `accueil`
--

INSERT INTO `accueil` (`id`, `contenu`, `dateEnvoi`, `auteur`) VALUES
(1, '<b class="bbcode-p"><h1 class="bbcode-h1">Qu\'est-ce-que la Naturopathie ?</h1></b><br />\r\n<br />\r\n<h2 class="bbcode-h2">La naturopathie est une hygi&egrave;ne de vie et le naturopathe un &eacute;ducateur de la sant&eacute;.</h2><br />\r\n<br />\r\nLa naturopathie ne soigne pas, elle est l&agrave;, pour aider &agrave; renforcer la force vitale de chacun d\'entre nous, ce qui nous permettra de combattre la maladie &agrave; l\'aide de diff&eacute;rents conseils et techniques tant au niveau alimentaire, sportif, environnemental, psychologique et &eacute;motionnel.<br />\r\n<br />\r\nLe r&ocirc;le du naturopathe est de faire comprendre et d&rsquo;apprendre &agrave; utiliser les moyens naturels, en fonction de l&rsquo;organisme et des rythmes de vie de chaque individu. C&rsquo;est-&agrave;-dire, savoir s&rsquo;alimenter correctement, apprendre &agrave; respirer, &agrave; optimiser la qualit&eacute; de sommeil, &agrave; contr&ocirc;ler le stress, &agrave; renforcer l&rsquo;exercice physique, etc... Et ce, afin de pr&eacute;venir ou r&eacute;cup&eacute;rer un d&eacute;s&eacute;quilibre install&eacute;, maintenir un syst&egrave;me immunitaire actif, pour en d&eacute;finitive, prolonger l&rsquo;&eacute;tat de sant&eacute; le plus longtemps possible, et am&eacute;liorer la qualit&eacute; de vie.<br />\r\n<br />\r\n<br />\r\nCette discipline s&rsquo;applique &agrave; quiconque souhaite s&rsquo;investir et se responsabiliser pour devenir un meilleur acteur de sa sant&eacute;, en r&eacute;formant son mode de vie au quotidien. C\'est avant tout une m&eacute;decine de pr&eacute;vention qui ne remplace en rien la m&eacute;decine allopathique. <i class="bbcode-p">Ces deux m&eacute;decines sont compl&eacute;mentaires.</i>', '1485870965', 'lala');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `email`) VALUES
(1, 'admin', 'a184ebbf0fb95211de38b9bc2be7e6c8dc55f69527af327c28ce6c15615d4757', 'naturopathe@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` text NOT NULL,
  `message` text NOT NULL,
  `dateEnvoie` int(11) NOT NULL,
  `lu` tinyint(1) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `sujet`, `message`, `dateEnvoie`, `lu`, `ip`) VALUES
(1, 'Gicquel', 'Lucas', 'lucas.gicquel@gmail.com', 'Lala', 'lala', 1484058562, 0, '::1'),
(2, 'Gicquel', 'Lucas', 'lucas.gicquel@gmail.com', 'Lala', 'azeaze', 1484058741, 0, '::1'),
(3, '', 'Lucas', 'lucas.gicquel@gmail.com', 'aze', 'aze', 1484059152, 0, '::1'),
(5, 'test', 'test', 'test@test.fr', 'test', 'azeaze', 1484751348, 0, '::1'),
(6, 'Le plus beau ', 'Gicquel', 'jetaime@fort.com', 'Lala', 'Cum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.\r\n\r\nNihil morati post haec militares avidi saepe turbarum adorti sunt Montium primum, qui divertebat in proximo, levi corpore senem atque morbosum, et hirsutis resticulis cruribus eius innexis divaricaturn sine spiramento ullo ad usque praetorium traxere praefecti.\r\n\r\nSed maximum est in amicitia parem esse inferiori. Saepe enim excellentiae quaedam sunt, qualis erat Scipionis in nostro, ut ita dicam, grege. Numquam se ille Philo, numquam Rupilio, numquam Mummio anteposuit, numquam inferioris ordinis amicis, Q. vero Maximum fratrem, egregium virum omnino, sibi nequaquam parem, quod is anteibat aetate, tamquam superiorem colebat suosque omnes per se posse esse ampliores volebat.', 1485791688, 0, '::1');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `lien` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `date_ajout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `titre`, `description`, `lien`, `nom`, `extension`, `date_ajout`) VALUES
(8, 'azeaze', 'azeaze', 'http://localhost:8098/naturopathe/vue/uploads/galeries/ee2ffe89bcfc290db8016495e0434a60.jpg', 'ee2ffe89bcfc290db8016495e0434a60.jpg', '', '1484753251'),
(9, 'azeqsdd', 'qsdqsd', 'http://localhost:8098/naturopathe/vue/uploads/galeries/64c6118f6dd8a086945821621543f02a.jpg', '64c6118f6dd8a086945821621543f02a.jpg', '', '1484753256'),
(11, 'bitoku', 'azazea', 'http://localhost:8098/naturopathe/vue/uploads/galeries/baa89f3ff7be728c3e4a6da602e373a1.jpg', 'baa89f3ff7be728c3e4a6da602e373a1.jpg', '', '1485870848'),
(12, 'zaaza', 'azeaze', 'http://localhost:8098/naturopathe/vue/uploads/galeries/820df3d891dca350affd85f9649aa03b.jpg', '820df3d891dca350affd85f9649aa03b.jpg', '', '1485870977');

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE `presentation` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `presentation`
--

INSERT INTO `presentation` (`id`, `texte`) VALUES
(1, 'Ceci est une pr&eacute;sentation<br />\r\n<br />\r\n<br />\r\nCum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.<br />\r\n<br />\r\nNihil morati post haec militares avidi saepe turbarum adorti sunt Montium primum, qui divertebat in proximo, levi corpore senem atque morbosum, et hirsutis resticulis cruribus eius innexis divaricaturn sine spiramento ullo ad usque praetorium traxere praefecti.<br />\r\n<br />\r\nSed maximum est in amicitia parem esse inferiori. Saepe enim excellentiae quaedam sunt, qualis erat Scipionis in nostro, ut ita dicam, grege. Numquam se ille Philo, numquam Rupilio, numquam Mummio anteposuit, numquam inferioris ordinis amicis, Q. vero Maximum fratrem, egregium virum omnino, sibi nequaquam parem, quod is anteibat aetate, tamquam superiorem colebat suosque omnes per se posse esse ampliores volebat.<br />\r\n');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accueil`
--
ALTER TABLE `accueil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accueil`
--
ALTER TABLE `accueil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
