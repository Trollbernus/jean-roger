-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 17 août 2019 à 22:35
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fofococo`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `lien` varchar(255) NOT NULL,
  `nomfichier` varchar(255) NOT NULL,
  `date_post` datetime NOT NULL,
  `ordre` int(11) NOT NULL,
  `suppr` tinyint(1) NOT NULL,
  `date_suppr` datetime NOT NULL,
  `id_sujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `mail`, `texte`, `lien`, `nomfichier`, `date_post`, `ordre`, `suppr`, `date_suppr`, `id_sujet`) VALUES
(1, 'oxylos.neest@gmail.com', 'La bourgeoisie au goulag.', 'http://bipedes-ailes.blogspot.com/', '2019_0715_000000_001_goulag.jpeg', '2019-07-15 00:00:00', 1, 0, '2019-07-15 00:00:00', 1),
(2, 'v', 'v', 'v', '2019_0715_000000_002_goulag_.jpeg', '2019-07-15 00:00:00', 2, 0, '2019-07-15 00:00:00', 1),
(3, 'v', 'v', 'https://www.deviantart.com/obuscane', '2019_0721_02_001_tinyaxedanslspace1.jpg', '2019-07-21 00:00:00', 1, 0, '2019-07-21 00:00:00', 2),
(8, 'v', 'v', 'v', '2019_08_11_20_25_2_tinyaxedanslspace.jpg', '2019-08-11 20:27:30', 2, 0, '2019-08-11 20:27:30', 2),
(9, 'v', 'v', 'v', '2019_08_12_14_10_f6d2d2617ca5d0b14e0111550d15ea60_mariageoue.jpg', '2019-08-12 14:13:21', 1, 0, '2019-08-12 14:13:21', 4),
(10, 'v', 'v', 'v', '2019_08_12_14_15_10198cb5e3d3f7ab807fa244a65d65a9_mariageoue.jpg', '2019-08-12 14:16:28', 1, 0, '2019-08-12 14:16:28', 6),
(11, 'v', 'v', 'v', '2019_08_12_14_19_b0f7511b2f0f0834fd50198d88a981c2_mariageoue.jpg', '2019-08-12 14:19:18', 1, 0, '2019-08-12 14:19:18', 7),
(12, 'v', 'v', 'v', '2019_08_12_14_19_b0f7511b2f0f0834fd50198d88a981c2_mariageoue.jpg', '2019-08-12 14:19:46', 1, 0, '2019-08-12 14:19:46', 8),
(13, 'v', 'v', 'v', '2019_08_12_14_19_b0f7511b2f0f0834fd50198d88a981c2_mariageoue.jpg', '2019-08-12 14:19:54', 2, 0, '2019-08-12 14:19:54', 8),
(14, 'v', 'v', 'v', '2019_08_12_14_32_5c5336f0b6a5bda363242ec2efe44bfc_mariageoue.jpg', '2019-08-12 14:33:28', 1, 0, '2019-08-12 14:33:28', 10),
(15, 'v', 'v', 'v', '2019_08_12_14_35_e6b86ff8f7f6d1d6f4ef2d26b574608a_mariageoue.jpg', '2019-08-12 14:35:43', 1, 0, '2019-08-12 14:35:43', 11),
(20, 'v', 'Les mariages ça pue', 'v', 'v', '2019-08-13 02:27:48', 2, 0, '2019-08-13 02:27:48', 11),
(21, 'v', 'Le communisme c\'est trop bien', 'v', 'v', '2019-08-13 02:36:14', 1, 0, '2019-08-13 02:36:14', 12),
(22, 'v', 'Oui ohlala le communisme c\'est vraiment génial et super !!!!!!!!!!', 'v', 'v', '2019-08-15 18:04:32', 2, 0, '2019-08-15 18:04:32', 12),
(23, 'v', 'v', 'v', '2019_08_15_18_08_fe74f31467a59aaf815e8699a8f5ac5d_stalinethug.gif', '2019-08-15 18:08:47', 3, 0, '2019-08-15 18:08:47', 12),
(30, 'v', 'Marx<br />\r\nEngels<br />\r\nLénine<br />\r\nStaline', 'v', 'v', '2019-08-15 18:32:43', 4, 0, '2019-08-15 18:32:43', 12);

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE `sujets` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_crea` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `date_suppr` datetime NOT NULL,
  `archive` int(11) NOT NULL,
  `suppr` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_init` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`id`, `titre`, `date_crea`, `date_fin`, `date_suppr`, `archive`, `suppr`, `type`, `id_init`) VALUES
(1, 'Goulag autogéré', '2019-07-15 12:14:00', '2019-07-20 20:19:00', '2019-08-01 00:00:00', 2, 0, 'Goulag', 0),
(2, 'Les cocos dans l\'espace', '2019-07-21 16:26:00', '2019-07-21 18:11:00', '2019-07-21 18:11:00', 0, 0, 'Histoire', 0),
(3, 'Le mystérieux sujet verrouillé', '2019-08-09 22:37:00', '2019-08-09 22:37:00', '2019-08-09 22:37:00', 1, 0, 'Archive mystérieuse', 0),
(11, 'Le topic mariages.', '2019-08-12 14:35:43', '2019-08-12 14:35:43', '2019-08-12 14:35:43', 0, 0, 'on s\\en occupera après', 0),
(12, 'Le communisme !!!', '2019-08-13 02:36:14', '2019-08-13 02:36:14', '2019-08-13 02:36:14', 0, 0, 'on s\\en occupera après', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `sujets`
--
ALTER TABLE `sujets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
