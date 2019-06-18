-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 juin 2019 à 13:03
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nids`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionneur_capteur`
--

DROP TABLE IF EXISTS `actionneur_capteur`;
CREATE TABLE IF NOT EXISTS `actionneur_capteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `Actif` tinyint(1) NOT NULL,
  `NumeroSerie` int(11) NOT NULL,
  `id_element_catalogue` int(11) NOT NULL,
  `id_CeMac` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_CeMac` (`id_CeMac`),
  KEY `id_element_catalogue` (`id_element_catalogue`),
  KEY `id_piece` (`id_piece`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `actionneur_capteur`
--

INSERT INTO `actionneur_capteur` (`id`, `nom`, `Etat`, `Actif`, `NumeroSerie`, `id_element_catalogue`, `id_CeMac`, `id_piece`, `id_utilisateur`, `id_categorie`) VALUES
(14, 'Mouvement', 1, 1, 723163653, 3, 1, 4, 1, 1),
(19, 'Mouvement 5', 1, 1, 723163658, 3, 1, 2, 1, 1),
(21, 'Volet Nord', 1, 1, 976787, 4, 1, 4, 1, 1),
(22, 'Volet Sud', 1, 1, 976788, 4, 1, 4, 1, 1),
(23, 'Nieme capteur', 1, 1, 5646544, 3, 1, 2, 1, 1),
(24, 'Luminosité', 1, 1, 4913184, 2, 1, 6, 1, 1),
(25, 'Temp', 1, 1, 4564564, 1, 1, 1, 1, 1),
(26, 'Température', 1, 0, 15613218, 1, 10, 6, 4, 12),
(27, 'Mouvement', 1, 0, 56184123, 3, 21, 6, 4, 21),
(28, 'Volet', 1, 0, 21512151, 4, 12, 6, 4, 12),
(29, 'Temp', 1, 0, 16546138, 1, 12, 7, 4, 12),
(30, 'Lumi', 1, 0, 5184514, 2, 1515184, 7, 4, 25),
(31, 'Volet', 1, 1, 151811, 4, 15111, 1, 1, 35151),
(32, 'Lumi', 1, 1, 18919, 2, 1, 1, 1, 1),
(33, 'Lumi', 1, 1, 1561561564, 2, 1, 17, 17, 1),
(34, 'Mouv', 1, 1, 45564564, 3, 1, 17, 17, 1),
(35, 'volet', 1, 1, 651551, 4, 1, 17, 17, 1);

-- --------------------------------------------------------

--
-- Structure de la table `administratif`
--

DROP TABLE IF EXISTS `administratif`;
CREATE TABLE IF NOT EXISTS `administratif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Valeur` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `Titre`, `Contenu`, `Date`, `id_utilisateur`) VALUES
(1, 'Problème cafetière non connectée', 'Quelqu\'un saurait-il faire svp ?', '2019-05-20 16:55:06', 15),
(2, '[RESOLU] Comment changer de statut ?', 'Bonjour, j\'aimerai devenir gestionnaire comment puis-je faire ?', '2019-05-20 21:31:34', 8),
(3, 'test', 'test', '2019-05-27 09:56:30', 1),
(4, 'sqefssd', 'sdcsvdvcdvxfvfd', '2019-05-31 14:11:38', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_faq`
--

DROP TABLE IF EXISTS `article_faq`;
CREATE TABLE IF NOT EXISTS `article_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Contenu` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article_faq`
--

INSERT INTO `article_faq` (`id`, `Titre`, `Contenu`) VALUES
(3, 'Ces produits sont-ils compatibles avec mon équipement ?', 'Nos produits sont compatibles avec non seulement tout type d’aménagement de domicile : appartement ou maison, mais aussi avec n’importe quel appareil capable d’avoir accès à une page web.'),
(4, 'Comment ajouter un nouveau capteur à mon équipement ?', 'Afin d’ajouter un nouveau capteur à votre équipement, il vous suffit de le lier avec votre compte client à l’aide de son numéro de série sur la page de gestion des capteurs accessible par la page de gestion de profil.'),
(5, 'Comment fonctionne votre système ?', 'Les ordres données par vous-même à l’aide de votre page web gestion des capteurs se transmettent à partir de nos serveurs à l’aide la connexion internet de votre routeur qui diffuse ensuite en Wi-Fi, Bluetooth, or Ethernet.'),
(6, 'Que faire si j’ai oublié mon mot de passe ?', 'Une fonctionnalité “Mot de passe oublié” est disponible sur le site, ce qui vous permet de réinitialiser votre mot de passe à partir d’un mail automatique envoyé à votre adresse e-mail liée à votre compte.'),
(7, 'Que se passe-t-il si une personne non désirée est détectée par vos capteurs ?', 'Dans un premier temps, un boîtier est placé à l’entrée pour que vous puissiez rentrer facilement sans une longue procédure de vérification. En revanche, si le code entré n’est pas bon au bout de 30 secondes, un standardiste appelle votre maison par le fixe du domicile et demande un code de vérification. Si le code répondu est faux, ou si il n’y a pas de réponse, le client et la police sont immédiatement contactés.'),
(8, 'Que faire en cas de problème ?', 'Il faut éteindre et rallumer.');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `Nom`) VALUES
(1, 'Cat1');

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

DROP TABLE IF EXISTS `cemac`;
CREATE TABLE IF NOT EXISTS `cemac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `id_logement` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cemac_ibfk_1` (`id_logement`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`id`, `Nom`, `Etat`, `id_logement`) VALUES
(1, 'CeMACC', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `Note` int(11) DEFAULT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `Date_publication`, `Contenu`, `Note`, `id_article`, `id_utilisateur`) VALUES
(1, '2019-05-22 11:56:15', 'first!', 0, 2, 15),
(2, '2019-05-22 12:06:48', 'Il faut appuyer sur le bouton modifier à côté du type dans l\'édition de profil', 0, 1, 15),
(3, '2019-05-27 09:23:23', 'TEST', 0, 1, 18),
(4, '2019-05-27 09:57:21', 'test', 0, 2, 1),
(5, '2019-05-27 09:58:18', 'zdscsd', 0, 2, 1),
(6, '2019-05-31 14:08:09', 'YOLO', 0, 1, 1),
(7, '2019-05-31 14:08:35', 'YLOY', 0, 2, 1),
(8, '2019-05-31 14:10:14', 'OUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII !!!', 0, 1, 1),
(9, '2019-05-31 14:11:31', 'OUIIUIIUIUIUUI ::::', 0, 1, 1),
(10, '2019-05-31 15:16:07', 'dsddedsfsdds', 0, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

DROP TABLE IF EXISTS `donnees`;
CREATE TABLE IF NOT EXISTS `donnees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_heure_reception` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Valeur` int(11) NOT NULL,
  `id_actionneur_capteur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `donnees_ibfk_1` (`id_actionneur_capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=505 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `donnees`
--

INSERT INTO `donnees` (`id`, `Date_heure_reception`, `Valeur`, `id_actionneur_capteur`) VALUES
(1, '2019-06-03 11:56:44', 65484, 1),
(2, '2019-06-03 11:56:45', 65484, 1),
(3, '2019-06-03 11:56:45', 2, 1),
(4, '2019-06-03 11:56:47', 65484, 1),
(5, '2019-06-03 11:56:47', 2, 1),
(6, '2019-06-03 11:56:49', 65484, 1),
(7, '2019-06-03 11:56:49', 2, 1),
(8, '2019-06-03 11:56:51', 65484, 1),
(9, '2019-06-03 11:56:52', 2, 1),
(10, '2019-06-05 11:02:19', 58, 1),
(11, '2019-06-05 11:02:19', 2, 2),
(12, '2019-06-05 11:02:21', 55, 1),
(13, '2019-06-05 11:02:21', 2, 2),
(14, '2019-06-05 11:02:23', 58, 1),
(15, '2019-06-05 11:02:23', 2, 2),
(16, '2019-06-05 11:02:25', 58, 1),
(17, '2019-06-05 11:02:26', 2, 2),
(18, '2019-06-05 11:02:28', 58, 1),
(19, '2019-06-05 11:02:28', 2, 2),
(20, '2019-06-05 11:02:30', 41, 1),
(21, '2019-06-05 11:02:30', 2, 2),
(22, '2019-06-05 11:02:32', 41, 1),
(23, '2019-06-05 11:02:33', 2, 2),
(24, '2019-06-05 11:02:35', 41, 1),
(25, '2019-06-05 11:02:35', 2, 2),
(26, '2019-06-05 11:02:37', 59, 1),
(27, '2019-06-05 11:02:37', 2, 2),
(28, '2019-06-05 11:02:39', 58, 1),
(29, '2019-06-05 11:02:39', 2, 2),
(30, '2019-06-05 11:02:42', 59, 1),
(31, '2019-06-05 11:02:42', 2, 2),
(32, '2019-06-05 11:02:44', 59, 1),
(33, '2019-06-05 11:02:44', 2, 2),
(34, '2019-06-05 11:02:46', 59, 1),
(35, '2019-06-05 11:02:46', 2, 2),
(36, '2019-06-05 11:02:49', 59, 1),
(37, '2019-06-05 11:02:49', 2, 2),
(38, '2019-06-05 11:02:51', 59, 1),
(39, '2019-06-05 11:02:51', 2, 2),
(40, '2019-06-05 11:02:53', 59, 1),
(41, '2019-06-05 11:02:53', 2, 2),
(42, '2019-06-05 11:02:56', 41, 1),
(43, '2019-06-05 11:02:56', 1, 2),
(44, '2019-06-05 11:02:58', 41, 1),
(45, '2019-06-05 11:02:58', 1, 2),
(46, '2019-06-05 11:03:00', 41, 1),
(47, '2019-06-05 11:03:00', 1, 2),
(48, '2019-06-05 11:03:03', 41, 1),
(49, '2019-06-05 11:03:03', 1, 2),
(50, '2019-06-05 11:03:05', 59, 1),
(51, '2019-06-05 11:03:05', 2, 2),
(52, '2019-06-05 11:03:07', 58, 1),
(53, '2019-06-05 11:03:07', 2, 2),
(54, '2019-06-05 11:03:09', 41, 1),
(55, '2019-06-05 11:03:10', 1, 2),
(56, '2019-06-05 11:03:12', 41, 1),
(57, '2019-06-05 11:03:12', 1, 2),
(58, '2019-06-05 11:03:14', 41, 1),
(59, '2019-06-05 11:03:14', 1, 2),
(60, '2019-06-05 11:03:16', 41, 1),
(61, '2019-06-05 11:03:17', 1, 2),
(62, '2019-06-05 11:03:19', 41, 1),
(63, '2019-06-05 11:03:19', 1, 2),
(64, '2019-06-05 11:03:21', 41, 1),
(65, '2019-06-05 11:03:21', 1, 2),
(66, '2019-06-05 11:03:23', 58, 1),
(67, '2019-06-05 11:03:23', 2, 2),
(68, '2019-06-05 11:03:26', 57, 1),
(69, '2019-06-05 11:03:26', 2, 2),
(70, '2019-06-05 11:03:28', 59, 1),
(71, '2019-06-05 11:03:28', 2, 2),
(72, '2019-06-05 11:03:30', 58, 1),
(73, '2019-06-05 11:03:30', 2, 2),
(74, '2019-06-05 11:03:39', 58, 1),
(75, '2019-06-05 11:03:39', 2, 2),
(76, '2019-06-05 11:03:40', 59, 1),
(77, '2019-06-05 11:03:40', 2, 2),
(78, '2019-06-05 11:03:42', 58, 1),
(79, '2019-06-05 11:03:42', 2, 2),
(80, '2019-06-05 11:03:44', 58, 1),
(81, '2019-06-05 11:03:44', 2, 2),
(82, '2019-06-05 11:03:46', 58, 1),
(83, '2019-06-05 11:03:47', 2, 2),
(84, '2019-06-05 11:03:49', 58, 1),
(85, '2019-06-05 11:03:49', 2, 2),
(86, '2019-06-05 11:03:51', 59, 1),
(87, '2019-06-05 11:03:51', 2, 2),
(88, '2019-06-05 11:03:53', 58, 1),
(89, '2019-06-05 11:03:54', 2, 2),
(90, '2019-06-05 11:03:56', 58, 1),
(91, '2019-06-05 11:03:56', 2, 2),
(92, '2019-06-05 11:03:58', 58, 1),
(93, '2019-06-05 11:03:58', 2, 2),
(94, '2019-06-05 11:04:00', 58, 1),
(95, '2019-06-05 11:04:00', 2, 2),
(96, '2019-06-05 11:04:03', 58, 1),
(97, '2019-06-05 11:04:03', 2, 2),
(98, '2019-06-05 11:04:05', 59, 1),
(99, '2019-06-05 11:04:05', 3, 2),
(100, '2019-06-05 11:04:07', 58, 1),
(101, '2019-06-05 11:04:07', 3, 2),
(102, '2019-06-05 11:04:10', 58, 1),
(103, '2019-06-05 11:04:10', 3, 2),
(104, '2019-06-05 11:04:12', 58, 1),
(105, '2019-06-05 11:04:12', 3, 2),
(106, '2019-06-05 11:04:14', 58, 1),
(107, '2019-06-05 11:04:14', 3, 2),
(108, '2019-06-05 11:04:17', 58, 1),
(109, '2019-06-05 11:04:17', 3, 2),
(110, '2019-06-05 11:04:19', 59, 1),
(111, '2019-06-05 11:04:19', 2, 2),
(112, '2019-06-05 11:04:21', 59, 1),
(113, '2019-06-05 11:04:21', 2, 2),
(114, '2019-06-05 11:04:24', 58, 1),
(115, '2019-06-05 11:04:24', 2, 2),
(116, '2019-06-05 11:04:26', 58, 1),
(117, '2019-06-05 11:04:26', 2, 2),
(118, '2019-06-05 11:04:28', 58, 1),
(119, '2019-06-05 11:04:28', 2, 2),
(120, '2019-06-05 11:04:30', 59, 1),
(121, '2019-06-05 11:04:31', 2, 2),
(122, '2019-06-05 11:04:33', 58, 1),
(123, '2019-06-05 11:04:33', 2, 2),
(124, '2019-06-05 11:04:35', 58, 1),
(125, '2019-06-05 11:04:35', 2, 2),
(126, '2019-06-05 11:04:37', 58, 1),
(127, '2019-06-05 11:04:38', 2, 2),
(128, '2019-06-05 11:04:40', 58, 1),
(129, '2019-06-05 11:04:40', 2, 2),
(130, '2019-06-05 11:04:42', 58, 1),
(131, '2019-06-05 11:04:42', 2, 2),
(132, '2019-06-05 11:04:44', 58, 1),
(133, '2019-06-05 11:04:44', 2, 2),
(134, '2019-06-05 11:04:47', 59, 1),
(135, '2019-06-05 11:04:47', 2, 2),
(136, '2019-06-05 11:51:49', 59, 1),
(137, '2019-06-05 11:51:49', 2, 2),
(138, '2019-06-05 11:51:51', 59, 1),
(139, '2019-06-05 11:51:51', 2, 2),
(140, '2019-06-05 11:51:53', 60, 1),
(141, '2019-06-05 11:51:53', 2, 2),
(142, '2019-06-05 11:51:56', 59, 1),
(143, '2019-06-05 11:51:56', 2, 2),
(144, '2019-06-05 11:51:58', 60, 1),
(145, '2019-06-05 11:51:58', 2, 2),
(146, '2019-06-05 11:52:00', 58, 1),
(147, '2019-06-05 11:52:00', 2, 2),
(148, '2019-06-05 11:52:03', 60, 1),
(149, '2019-06-05 11:52:03', 2, 2),
(150, '2019-06-05 11:52:05', 59, 1),
(151, '2019-06-05 11:52:05', 2, 2),
(152, '2019-06-05 11:52:07', 59, 1),
(153, '2019-06-05 11:52:07', 2, 2),
(154, '2019-06-05 11:52:09', 60, 1),
(155, '2019-06-05 11:52:10', 2, 2),
(156, '2019-06-05 11:52:12', 59, 1),
(157, '2019-06-05 11:52:12', 2, 2),
(158, '2019-06-05 11:52:14', 60, 1),
(159, '2019-06-05 11:52:14', 2, 2),
(160, '2019-06-05 11:52:16', 59, 1),
(161, '2019-06-05 11:52:17', 2, 2),
(162, '2019-06-05 11:52:19', 60, 1),
(163, '2019-06-05 11:52:19', 2, 2),
(164, '2019-06-05 11:52:21', 60, 1),
(165, '2019-06-05 11:52:21', 2, 2),
(166, '2019-06-05 11:52:23', 59, 1),
(167, '2019-06-05 11:52:23', 2, 2),
(168, '2019-06-05 11:52:26', 60, 1),
(169, '2019-06-05 11:52:26', 2, 2),
(170, '2019-06-05 11:52:28', 59, 1),
(171, '2019-06-05 11:52:28', 2, 2),
(172, '2019-06-05 11:52:30', 59, 1),
(173, '2019-06-05 11:52:30', 2, 2),
(174, '2019-06-05 11:52:33', 59, 1),
(175, '2019-06-05 11:52:33', 2, 2),
(176, '2019-06-05 11:52:35', 60, 1),
(177, '2019-06-05 11:52:35', 2, 2),
(178, '2019-06-05 11:52:37', 58, 1),
(179, '2019-06-05 11:52:37', 2, 2),
(180, '2019-06-05 11:52:40', 60, 1),
(181, '2019-06-05 11:52:40', 2, 2),
(182, '2019-06-05 11:52:42', 58, 1),
(183, '2019-06-05 11:52:42', 2, 2),
(184, '2019-06-05 11:52:44', 60, 1),
(185, '2019-06-05 11:52:44', 2, 2),
(186, '2019-06-05 11:52:46', 58, 1),
(187, '2019-06-05 11:52:47', 2, 2),
(188, '2019-06-05 11:52:49', 60, 1),
(189, '2019-06-05 11:52:49', 2, 2),
(190, '2019-06-05 11:52:51', 58, 1),
(191, '2019-06-05 11:52:51', 2, 2),
(192, '2019-06-05 11:52:53', 60, 1),
(193, '2019-06-05 11:52:54', 2, 2),
(194, '2019-06-05 11:52:56', 59, 1),
(195, '2019-06-05 11:52:56', 2, 2),
(196, '2019-06-05 11:52:58', 60, 1),
(197, '2019-06-05 11:52:58', 2, 2),
(198, '2019-06-05 11:53:00', 60, 1),
(199, '2019-06-05 11:53:01', 2, 2),
(200, '2019-06-05 11:53:03', 60, 1),
(201, '2019-06-05 11:53:03', 2, 2),
(202, '2019-06-05 11:53:05', 59, 1),
(203, '2019-06-05 11:53:05', 2, 2),
(204, '2019-06-05 11:53:07', 59, 1),
(205, '2019-06-05 11:53:07', 2, 2),
(206, '2019-06-05 11:53:10', 59, 1),
(207, '2019-06-05 11:53:10', 2, 2),
(208, '2019-06-05 11:53:12', 60, 1),
(209, '2019-06-05 11:53:12', 2, 2),
(210, '2019-06-05 11:53:14', 59, 1),
(211, '2019-06-05 11:53:14', 2, 2),
(212, '2019-06-05 11:53:17', 58, 1),
(213, '2019-06-05 11:53:17', 2, 2),
(214, '2019-06-05 11:53:19', 59, 1),
(215, '2019-06-05 11:53:19', 2, 2),
(216, '2019-06-05 11:53:21', 60, 1),
(217, '2019-06-05 11:53:21', 2, 2),
(218, '2019-06-05 11:53:24', 60, 1),
(219, '2019-06-05 11:53:24', 2, 2),
(220, '2019-06-05 11:53:26', 60, 1),
(221, '2019-06-05 11:53:26', 2, 2),
(222, '2019-06-05 11:53:28', 60, 1),
(223, '2019-06-05 11:53:28', 2, 2),
(224, '2019-06-05 11:53:30', 59, 1),
(225, '2019-06-05 11:53:31', 2, 2),
(226, '2019-06-05 11:53:33', 59, 1),
(227, '2019-06-05 11:53:33', 2, 2),
(228, '2019-06-05 11:53:35', 60, 1),
(229, '2019-06-05 11:53:35', 2, 2),
(230, '2019-06-05 11:53:37', 59, 1),
(231, '2019-06-05 11:53:38', 2, 2),
(232, '2019-06-05 11:53:40', 59, 1),
(233, '2019-06-05 11:53:40', 2, 2),
(234, '2019-06-05 11:53:42', 59, 1),
(235, '2019-06-05 11:53:42', 2, 2),
(236, '2019-06-05 11:53:44', 59, 1),
(237, '2019-06-05 11:53:44', 2, 2),
(238, '2019-06-05 11:53:47', 58, 1),
(239, '2019-06-05 11:53:47', 2, 2),
(240, '2019-06-05 11:53:49', 60, 1),
(241, '2019-06-05 11:53:49', 2, 2),
(242, '2019-06-05 11:53:51', 60, 1),
(243, '2019-06-05 11:53:51', 2, 2),
(244, '2019-06-05 11:53:54', 60, 1),
(245, '2019-06-05 11:53:54', 2, 2),
(246, '2019-06-05 11:53:56', 60, 1),
(247, '2019-06-05 11:53:56', 2, 2),
(248, '2019-06-05 11:53:58', 60, 1),
(249, '2019-06-05 11:53:58', 2, 2),
(250, '2019-06-05 11:54:01', 60, 1),
(251, '2019-06-05 11:54:01', 2, 2),
(252, '2019-06-05 11:54:03', 60, 1),
(253, '2019-06-05 11:54:03', 2, 2),
(254, '2019-06-05 11:54:05', 60, 1),
(255, '2019-06-05 11:54:05', 2, 2),
(256, '2019-06-05 11:54:07', 60, 1),
(257, '2019-06-05 11:54:08', 2, 2),
(258, '2019-06-05 11:54:10', 60, 1),
(259, '2019-06-05 11:54:10', 2, 2),
(260, '2019-06-05 11:54:12', 58, 1),
(261, '2019-06-05 11:54:12', 2, 2),
(262, '2019-06-05 11:54:14', 59, 1),
(263, '2019-06-05 11:54:15', 2, 2),
(264, '2019-06-05 11:54:17', 60, 1),
(265, '2019-06-05 11:54:17', 2, 2),
(266, '2019-06-05 11:54:19', 60, 1),
(267, '2019-06-05 11:54:19', 2, 2),
(268, '2019-06-05 11:54:21', 60, 1),
(269, '2019-06-05 11:54:22', 2, 2),
(270, '2019-06-05 11:54:24', 60, 1),
(271, '2019-06-05 11:54:24', 2, 2),
(272, '2019-06-05 11:54:26', 60, 1),
(273, '2019-06-05 11:54:26', 2, 2),
(274, '2019-06-05 11:54:28', 60, 1),
(275, '2019-06-05 11:54:28', 2, 2),
(276, '2019-06-05 11:54:31', 59, 1),
(277, '2019-06-05 11:54:31', 2, 2),
(278, '2019-06-05 11:54:33', 58, 1),
(279, '2019-06-05 11:54:33', 2, 2),
(280, '2019-06-05 11:54:35', 60, 1),
(281, '2019-06-05 11:54:35', 2, 2),
(282, '2019-06-05 11:54:38', 60, 1),
(283, '2019-06-05 11:54:38', 2, 2),
(284, '2019-06-05 11:54:40', 59, 1),
(285, '2019-06-05 11:54:40', 2, 2),
(286, '2019-06-05 11:54:42', 60, 1),
(287, '2019-06-05 11:54:42', 2, 2),
(288, '2019-06-05 11:54:44', 59, 1),
(289, '2019-06-07 13:04:20', 58, 1),
(290, '2019-06-07 13:04:20', 2, 2),
(291, '2019-06-07 13:04:23', 59, 1),
(292, '2019-06-07 13:04:23', 2, 2),
(293, '2019-06-07 13:04:25', 59, 1),
(294, '2019-06-07 13:04:25', 2, 2),
(295, '2019-06-07 13:04:27', 58, 1),
(296, '2019-06-07 13:04:27', 2, 2),
(297, '2019-06-07 13:04:29', 58, 1),
(298, '2019-06-07 13:04:29', 2, 2),
(299, '2019-06-07 13:04:32', 58, 1),
(300, '2019-06-07 13:04:32', 2, 2),
(301, '2019-06-07 13:04:34', 58, 1),
(302, '2019-06-07 13:04:34', 2, 2),
(303, '2019-06-07 13:04:36', 58, 1),
(304, '2019-06-07 13:04:36', 2, 2),
(305, '2019-06-07 13:04:39', 58, 1),
(306, '2019-06-07 13:04:39', 2, 2),
(307, '2019-06-07 13:04:41', 59, 1),
(308, '2019-06-07 13:04:41', 2, 2),
(309, '2019-06-07 13:04:43', 59, 1),
(310, '2019-06-07 13:04:43', 2, 2),
(311, '2019-06-07 13:04:46', 58, 1),
(312, '2019-06-07 13:04:46', 2, 2),
(313, '2019-06-07 13:04:48', 58, 1),
(314, '2019-06-07 13:04:48', 2, 2),
(315, '2019-06-07 13:04:50', 58, 1),
(316, '2019-06-07 13:04:50', 2, 2),
(317, '2019-06-07 13:04:53', 58, 1),
(318, '2019-06-07 13:04:53', 2, 2),
(319, '2019-06-07 13:04:55', 57, 1),
(320, '2019-06-07 13:04:55', 2, 2),
(321, '2019-06-07 13:04:57', 57, 1),
(322, '2019-06-07 13:04:57', 2, 2),
(323, '2019-06-07 13:05:00', 57, 1),
(324, '2019-06-07 13:05:00', 2, 2),
(325, '2019-06-07 13:05:02', 57, 1),
(326, '2019-06-07 13:05:02', 2, 2),
(327, '2019-06-07 13:05:04', 58, 1),
(328, '2019-06-07 13:05:04', 2, 2),
(329, '2019-06-07 13:05:07', 58, 1),
(330, '2019-06-07 13:05:07', 2, 2),
(331, '2019-06-07 13:05:09', 57, 1),
(332, '2019-06-07 13:05:09', 2, 2),
(333, '2019-06-07 13:05:11', 58, 1),
(334, '2019-06-07 13:05:11', 2, 2),
(335, '2019-06-07 13:05:13', 57, 1),
(336, '2019-06-07 13:05:13', 2, 2),
(337, '2019-06-07 13:05:16', 57, 1),
(338, '2019-06-07 13:05:16', 2, 2),
(339, '2019-06-07 13:05:18', 58, 1),
(340, '2019-06-07 13:05:18', 3, 2),
(341, '2019-06-07 13:05:20', 59, 1),
(342, '2019-06-07 13:05:20', 3, 2),
(343, '2019-06-07 13:05:23', 58, 1),
(344, '2019-06-07 13:05:23', 3, 2),
(345, '2019-06-07 13:05:25', 59, 1),
(346, '2019-06-07 13:05:25', 3, 2),
(347, '2019-06-07 13:05:27', 58, 1),
(348, '2019-06-07 13:05:27', 3, 2),
(349, '2019-06-07 13:05:30', 58, 1),
(350, '2019-06-07 13:05:30', 3, 2),
(351, '2019-06-07 13:05:32', 59, 1),
(352, '2019-06-07 13:05:32', 3, 2),
(353, '2019-06-07 13:05:34', 58, 1),
(354, '2019-06-07 13:05:34', 3, 2),
(355, '2019-06-07 13:08:19', 58, 1),
(356, '2019-06-07 13:08:19', 3, 2),
(357, '2019-06-07 13:08:21', 57, 1),
(358, '2019-06-07 13:08:21', 3, 2),
(359, '2019-06-07 13:08:23', 58, 1),
(360, '2019-06-07 13:08:23', 3, 2),
(361, '2019-06-07 13:08:26', 59, 1),
(362, '2019-06-07 13:08:26', 3, 2),
(363, '2019-06-07 13:08:28', 57, 1),
(364, '2019-06-07 13:08:28', 3, 2),
(365, '2019-06-07 13:08:30', 58, 1),
(366, '2019-06-07 13:08:30', 3, 2),
(367, '2019-06-07 13:08:33', 58, 1),
(368, '2019-06-07 13:08:33', 3, 2),
(369, '2019-06-07 13:08:35', 58, 1),
(370, '2019-06-07 13:08:35', 3, 2),
(371, '2019-06-07 13:08:37', 58, 1),
(372, '2019-06-07 13:08:37', 3, 2),
(373, '2019-06-07 13:08:40', 58, 1),
(374, '2019-06-07 13:08:40', 3, 2),
(375, '2019-06-07 13:08:42', 58, 1),
(376, '2019-06-07 13:08:42', 3, 2),
(377, '2019-06-07 13:08:44', 57, 1),
(378, '2019-06-07 13:08:44', 3, 2),
(379, '2019-06-07 13:08:46', 57, 1),
(380, '2019-06-07 13:08:46', 3, 2),
(381, '2019-06-07 13:08:49', 57, 1),
(382, '2019-06-07 13:08:49', 3, 2),
(383, '2019-06-07 13:08:51', 58, 1),
(384, '2019-06-07 13:08:51', 3, 2),
(385, '2019-06-07 13:08:53', 58, 1),
(386, '2019-06-07 13:08:53', 3, 2),
(387, '2019-06-07 13:08:56', 57, 1),
(388, '2019-06-07 13:08:56', 3, 2),
(389, '2019-06-07 13:08:58', 58, 1),
(390, '2019-06-07 13:09:00', 58, 1),
(391, '2019-06-07 13:09:00', 2, 2),
(392, '2019-06-07 13:09:03', 58, 1),
(393, '2019-06-07 13:09:03', 2, 2),
(394, '2019-06-07 13:09:05', 58, 1),
(395, '2019-06-07 13:09:05', 2, 2),
(396, '2019-06-07 13:09:07', 58, 1),
(397, '2019-06-07 13:09:07', 2, 2),
(398, '2019-06-07 13:09:10', 57, 1),
(399, '2019-06-07 13:09:10', 2, 2),
(400, '2019-06-07 13:09:12', 58, 1),
(401, '2019-06-07 13:09:12', 2, 2),
(402, '2019-06-07 13:09:14', 58, 1),
(403, '2019-06-07 13:09:14', 2, 2),
(404, '2019-06-07 13:09:17', 58, 1),
(405, '2019-06-07 13:09:17', 2, 2),
(406, '2019-06-07 13:09:19', 58, 1),
(407, '2019-06-07 13:09:19', 2, 2),
(408, '2019-06-07 13:09:21', 58, 1),
(409, '2019-06-07 13:09:21', 2, 2),
(410, '2019-06-07 13:09:24', 58, 1),
(411, '2019-06-07 13:09:24', 2, 2),
(412, '2019-06-07 13:09:26', 57, 1),
(413, '2019-06-07 13:09:26', 2, 2),
(414, '2019-06-07 13:13:23', 58, 1),
(415, '2019-06-07 13:13:23', 3, 2),
(416, '2019-06-07 13:13:26', 59, 1),
(417, '2019-06-07 13:13:26', 3, 2),
(418, '2019-06-07 13:13:28', 57, 1),
(419, '2019-06-07 13:13:28', 3, 2),
(420, '2019-06-07 13:13:30', 58, 1),
(421, '2019-06-07 13:13:30', 3, 2),
(422, '2019-06-07 13:13:32', 57, 1),
(423, '2019-06-07 13:13:33', 3, 2),
(424, '2019-06-07 13:13:35', 58, 1),
(425, '2019-06-07 13:13:35', 3, 2),
(426, '2019-06-07 13:13:37', 57, 1),
(427, '2019-06-07 13:13:37', 3, 2),
(428, '2019-06-07 13:13:39', 58, 1),
(429, '2019-06-07 13:13:40', 3, 2),
(430, '2019-06-07 13:13:42', 58, 1),
(431, '2019-06-07 13:13:42', 3, 2),
(432, '2019-06-07 13:13:44', 58, 1),
(433, '2019-06-07 13:13:44', 3, 2),
(434, '2019-06-07 13:13:46', 58, 1),
(435, '2019-06-07 13:13:46', 3, 2),
(436, '2019-06-07 13:13:49', 58, 1),
(437, '2019-06-07 13:13:49', 3, 2),
(438, '2019-06-07 13:13:51', 57, 1),
(439, '2019-06-07 13:13:51', 3, 2),
(440, '2019-06-07 13:13:53', 58, 1),
(441, '2019-06-07 13:13:53', 3, 2),
(442, '2019-06-07 13:13:56', 56, 1),
(443, '2019-06-07 13:13:56', 3, 2),
(444, '2019-06-07 13:13:58', 57, 1),
(445, '2019-06-07 13:14:00', 58, 1),
(446, '2019-06-07 13:14:00', 3, 2),
(447, '2019-06-07 13:14:03', 57, 1),
(448, '2019-06-07 13:14:03', 3, 2),
(449, '2019-06-07 13:14:05', 57, 1),
(450, '2019-06-07 13:14:05', 3, 2),
(451, '2019-06-07 13:14:07', 57, 1),
(452, '2019-06-07 13:14:07', 3, 2),
(453, '2019-06-07 13:14:10', 57, 1),
(454, '2019-06-07 13:14:10', 3, 2),
(455, '2019-06-07 13:14:12', 57, 1),
(456, '2019-06-07 13:14:12', 3, 2),
(457, '2019-06-07 13:14:14', 58, 1),
(458, '2019-06-07 13:14:14', 3, 2),
(459, '2019-06-07 13:14:17', 58, 1),
(460, '2019-06-07 13:14:17', 3, 2),
(461, '2019-06-07 13:14:19', 58, 1),
(462, '2019-06-07 13:14:19', 3, 2),
(463, '2019-06-07 13:14:21', 58, 1),
(464, '2019-06-07 13:14:21', 3, 2),
(465, '2019-06-07 13:14:23', 58, 1),
(466, '2019-06-07 13:14:23', 3, 2),
(467, '2019-06-07 13:14:26', 58, 1),
(468, '2019-06-07 13:14:26', 3, 2),
(469, '2019-06-07 13:14:28', 58, 1),
(470, '2019-06-07 13:14:28', 3, 2),
(471, '2019-06-07 13:14:30', 58, 1),
(472, '2019-06-07 13:14:30', 3, 2),
(473, '2019-06-07 13:14:33', 58, 1),
(474, '2019-06-07 13:14:33', 3, 2),
(475, '2019-06-07 13:14:35', 57, 1),
(476, '2019-06-07 13:14:35', 3, 2),
(477, '2019-06-07 13:14:37', 58, 1),
(478, '2019-06-07 13:14:37', 3, 2),
(479, '2019-06-07 13:14:40', 58, 1),
(480, '2019-06-07 13:14:40', 3, 2),
(481, '2019-06-07 13:14:42', 57, 1),
(482, '2019-06-07 13:14:42', 3, 2),
(483, '2019-06-07 13:14:44', 58, 1),
(484, '2019-06-07 13:14:44', 3, 2),
(485, '2019-06-07 13:14:47', 58, 1),
(486, '2019-06-07 13:14:47', 3, 2),
(487, '2019-06-12 13:52:55', 58, 1),
(488, '2019-06-12 13:52:56', 41, 2),
(489, '2019-06-12 13:52:58', 57, 1),
(490, '2019-06-12 13:52:58', 41, 2),
(491, '2019-06-12 13:53:00', 57, 1),
(492, '2019-06-12 13:53:00', 41, 2),
(493, '2019-06-12 13:53:02', 58, 1),
(494, '2019-06-12 13:53:02', 41, 2),
(495, '2019-06-12 14:07:02', 60, 34),
(496, '2019-06-12 14:07:02', 41, 33),
(497, '2019-06-12 14:07:04', 60, 34),
(498, '2019-06-12 14:07:04', 41, 33),
(499, '2019-06-12 14:07:06', 61, 34),
(500, '2019-06-12 14:07:07', 41, 33),
(501, '2019-06-12 14:07:09', 60, 34),
(502, '2019-06-12 14:07:09', 41, 33),
(503, '2019-06-12 14:07:11', 60, 34),
(504, '2019-06-12 14:07:11', 41, 33);

-- --------------------------------------------------------

--
-- Structure de la table `element_catalogue`
--

DROP TABLE IF EXISTS `element_catalogue`;
CREATE TABLE IF NOT EXISTS `element_catalogue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `Photo` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `element_catalogue`
--

INSERT INTO `element_catalogue` (`id`, `Type`, `Description`, `Photo`) VALUES
(1, 'Température', 'Ce capteur permet de mesurer la température dans la pièce dans laquelle il se situe', 'Temperature'),
(2, 'Luminosité', 'Ce capteur mesure la luminosité de la pièce dans laquelle il se situe', 'Luminosite'),
(3, 'Mouvement', 'Ce capteur détecte tout mouvement se situant entre 20 cm et 60 cm', 'Mouvement'),
(4, 'Volet', 'Grâce aux actionneurs, les volets peuvent être descendus en un clic', 'Volet');

-- --------------------------------------------------------

--
-- Structure de la table `heritage`
--

DROP TABLE IF EXISTS `heritage`;
CREATE TABLE IF NOT EXISTS `heritage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur_prim` int(11) NOT NULL,
  `id_utilisateur_sec` int(11) NOT NULL,
  `id_logement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur_prim` (`id_utilisateur_prim`),
  KEY `id_utilisateur_sec` (`id_utilisateur_sec`),
  KEY `id_logement` (`id_logement`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `heritage`
--

INSERT INTO `heritage` (`id`, `id_utilisateur_prim`, `id_utilisateur_sec`, `id_logement`) VALUES
(2, 4, 3, 3),
(5, 4, 2, 2),
(23, 15, 8, 1),
(25, 15, 17, 1);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Temperature_consigne` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_ibfk_1` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id`, `Adresse`, `Temperature_consigne`, `id_utilisateur`) VALUES
(1, '23 avenue de Paris, 78000 Versailles', 20, 15),
(2, '2 rue Berthier, 78000 Versailles', 20, 4),
(3, '3 square du Dragon, 78150 Le Chesnay', 20, 4),
(5, '4 rue Berthier, 78000 Versailles', 20, 1),
(6, '10 rue de vanves', 20, 18),
(7, '10 rue de Vanves', 20, 17);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_logement` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `piece_ibfk_1` (`id_logement`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id`, `Nom`, `id_logement`) VALUES
(1, 'Chambre de Gérard', 1),
(2, 'Cave de Julien', 1),
(3, 'Buandrie', 1),
(4, 'Cuisine', 1),
(5, 'Salle de bain', 1),
(6, 'Salle de bain', 2),
(7, 'Cuisine', 2),
(8, 'Buandrie', 2),
(9, 'Chambre à coucher', 2),
(10, 'Salle de bain', 3),
(11, 'Cuisine', 3),
(12, 'Chambre à coucher', 3),
(14, 'Salle de jeu', 3),
(15, 'Salle de jeu', 2),
(16, 'Salle de bain', 6),
(17, 'L212', 7);

-- --------------------------------------------------------

--
-- Structure de la table `programmation`
--

DROP TABLE IF EXISTS `programmation`;
CREATE TABLE IF NOT EXISTS `programmation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Instruction` int(11) NOT NULL,
  `Type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Moment d'activation` datetime NOT NULL,
  `Moment de desactivation` datetime NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `programmation_ibfk_1` (`id_logement`),
  KEY `programmation_ibfk_2` (`id_piece`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `programmation_capteur`
--

DROP TABLE IF EXISTS `programmation_capteur`;
CREATE TABLE IF NOT EXISTS `programmation_capteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_capteur` int(11) NOT NULL,
  `id_programmation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `programmation_capteur_ibfk_1` (`id_capteur`),
  KEY `programmation_capteur_ibfk_2` (`id_programmation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `programmation_categorie`
--

DROP TABLE IF EXISTS `programmation_categorie`;
CREATE TABLE IF NOT EXISTS `programmation_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `id_programmation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_programmation` (`id_programmation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`id`, `Nom`) VALUES
(1, 'client'),
(2, 'gestionnaire'),
(3, 'SAV'),
(4, 'administrateur'),
(5, 'WebMaster');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Adresse_mail` varchar(320) CHARACTER SET ascii NOT NULL,
  `numeroTel` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date_naissance` date NOT NULL,
  `Mot_de_passe` varchar(1000) CHARACTER SET ascii NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `Question_verif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Reponse_verif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `essais` int(11) DEFAULT NULL,
  `indiceBDD` int(11) NOT NULL DEFAULT '0',
  `id_type_utilsateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_ibfk_1` (`id_type_utilsateur`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Nom`, `Prenom`, `Adresse_mail`, `numeroTel`, `Date_naissance`, `Mot_de_passe`, `Etat`, `Question_verif`, `Reponse_verif`, `essais`, `indiceBDD`, `id_type_utilsateur`) VALUES
(1, 'MENVUSSA', 'Gérard', 'gerard.menvuss4@gmail.com', '05 54 54 54 54', '1990-12-22', '$2y$10$Eawe7JBwgcVunzGFtECTNuaXlUR8OtebJtd10OXpIMXK7ak8LAlqi', 0, 'Que voulez-vous ?', 'rien', 0, 504, 5),
(2, 'HIFFY', 'Eugène', 'eugene.hiffy@gmail.com', '07 87 26 12 12', '1998-01-31', '$2y$10$wjol0zsWtb8OoAyt8PjY4eolyZuKYxZK5BQe1J/lWtQj9WWShgavS', 0, 'Que voulez-vous manger ?', 'Des patates', 0, 504, 1),
(3, 'HIC', 'Bazil', 'bazil.hic@gmail.com', '07 54 64 12 14', '1987-07-05', 'Bi1Fr4is', 0, 'Que voulez-vous prendre ?', 'Un pari sur l\'avenir', 0, 504, 1),
(4, 'TIME', 'Vincent', 'vic.time@gmail.com', '06 78 45 40 17', '2000-07-09', '$2y$10$yLbuWRFui/VcVSptcccySOVetSziwGNtf1UTIIeWk0.VbY.hnWr1e', 0, 'Quel est votre premier animal de compagnie ?', 'Un chien', 0, 504, 2),
(7, 'PARIZOT', 'Julien', 'julien.parizot@isep.fr', NULL, '1998-02-12', '$2y$10$YXOcjoUfBdHBCkT2MekdM.xofbVd.PVXiG5/puwLc2JELoydNT06W', 0, NULL, NULL, 1, 504, 1),
(8, 'Corcaud', 'Bastien', 'bastien.corcaud@isep.fr', NULL, '1996-05-21', '$2y$10$JvdKq9M.vNDUEdYhKY7H6uU.4NxeyxtY/S9H5niEH/bE5ro/jXaai', 0, NULL, NULL, 0, 504, 1),
(14, 'V0', 'SA', 'contactservice123456@gmail.com', NULL, '2019-05-19', '$2y$10$WcYbSBsG53WD.8uUoxQQO.9ZVWfR3qseX33Ky4K/J6MvUupxZYog.', 0, NULL, NULL, 0, 504, 3),
(15, 'OLIVIER', 'Raphaël', 'training2015won@gmail.com', NULL, '1998-09-12', '$2y$10$KfLhnRQ7Pz79yacMKgKlBOCPf8bjnce5RRDKvaaeVPjW57li/foFy', 0, NULL, NULL, 0, 504, 1),
(16, 'Nids', 'Admin', 'contactservice123456@gmail.com', NULL, '2002-02-02', '$2y$10$pbhQOCht8uk1IrIb24JAsOejhvOe3Jz4ZKNfuoJr7RFZkIGV7CJVi', 0, NULL, NULL, 0, 504, 4),
(17, 'AUBOURG', 'Cyril', 'cyril.aubourg@isep.fr', NULL, '1998-01-08', '$2y$10$Eawe7JBwgcVunzGFtECTNuaXlUR8OtebJtd10OXpIMXK7ak8LAlqi', 1, NULL, NULL, 0, 504, 1),
(18, 'parizot', 'julien', 'julien@parizot.org', NULL, '1998-01-01', '$2y$10$JOdAN0xsNOL6ONGTCieww.mHQARdPWLedBzf1WUTpDdUMJAfv3Gl2', 0, NULL, NULL, NULL, 504, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `heritage`
--
ALTER TABLE `heritage`
  ADD CONSTRAINT `heritage_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `heritage_ibfk_2` FOREIGN KEY (`id_utilisateur_prim`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `heritage_ibfk_3` FOREIGN KEY (`id_utilisateur_sec`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `logement_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_type_utilsateur`) REFERENCES `type_utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
