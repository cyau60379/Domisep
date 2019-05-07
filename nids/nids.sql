-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 07 mai 2019 à 11:17
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `actionneur_capteur`
--

INSERT INTO `actionneur_capteur` (`id`, `nom`, `Etat`, `Actif`, `NumeroSerie`, `id_element_catalogue`, `id_CeMac`, `id_piece`, `id_utilisateur`, `id_categorie`) VALUES
(6, 'Température', 1, 0, 656156155, 1, 1, 5, 1, 1),
(7, 'Température', 1, 0, 656156156, 1, 1, 3, 1, 1),
(8, 'Luminosité', 1, 0, 4913184, 2, 1, 1, 1, 1),
(9, 'Luminosité', 1, 0, 4913185, 2, 1, 2, 1, 1),
(10, 'Luminosité', 1, 0, 4913186, 2, 1, 3, 1, 1),
(12, 'Luminosité', 1, 0, 4913188, 2, 1, 5, 1, 1),
(13, 'Mouvement', 1, 0, 723163652, 3, 1, 1, 1, 1),
(14, 'Mouvement', 1, 0, 723163653, 3, 1, 4, 1, 1),
(15, 'Mouvement 1', 1, 0, 723163654, 3, 1, 2, 1, 1),
(16, 'Mouvement 2', 1, 0, 723163655, 3, 1, 2, 1, 1),
(17, 'Mouvement 3', 1, 0, 723163656, 3, 1, 2, 1, 1),
(18, 'Mouvement 4', 1, 0, 723163657, 3, 1, 2, 1, 1),
(19, 'Mouvement 5', 1, 0, 723163658, 3, 1, 2, 1, 1),
(20, 'Volet', 1, 0, 976786, 4, 1, 1, 1, 1),
(21, 'Volet Nord', 1, 0, 976787, 4, 1, 4, 1, 1),
(22, 'Volet Sud', 1, 0, 976788, 4, 1, 4, 1, 1),
(23, 'Super Connard', 1, 0, 515615, 3, 1, 2, 1, 1);

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
  `Titre` varchar(255) NOT NULL,
  `Contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article_faq`
--

INSERT INTO `article_faq` (`id`, `Titre`, `Contenu`) VALUES
(1, 'Qu’est-ce qu’est la domotique ?', 'La domotique sans fil permet de superviser, d\'automatiser, de programmer et de coordonner le fonctionnement de vos lampes et/ou appareils électriques.'),
(2, 'Quelles sont les technologies utilisées par la gamme de domotique sans fil NIDS ?', 'La gamme de domotique sans fil NIDS permettra la simplification de vos travaux d’innovation de votre domicile. Notre gamme utilise les connexions Wi-FI, Bluetooth, et cellulaires afin de vous permettre d’avoir un service le plus agréable et efficace possible.'),
(3, 'Ces produits sont-ils compatibles avec mon équipement ?', 'Nos produits sont compatibles avec non seulement tout type d’aménagement de domicile : appartement ou maison, mais aussi avec n’importe quel appareil capable d’avoir accès à une page web.'),
(4, 'Comment ajouter un nouveau capteur à mon équipement ?', 'Afin d’ajouter un nouveau capteur à votre équipement, il vous suffit de le lier avec votre compte client à l’aide de son numéro de série sur la page de gestion des capteurs accessible par la page de gestion de profil.'),
(5, 'Comment fonctionne votre système ?', 'Les ordres données par vous-même à l’aide de votre page web gestion des capteurs se transmettent à partir de nos serveurs à l’aide la connexion internet de votre routeur qui diffuse ensuite en Wi-Fi, Bluetooth, or Ethernet.'),
(6, 'Que faire si j’ai oublié mon mot de passe ?', 'Une fonctionnalité “Mot de passe oublié” est disponible sur le site, ce qui vous permet de réinitialiser votre mot de passe à partir d’un mail automatique envoyé à votre adresse e-mail liée à votre compte.'),
(7, 'Que se passe-t-il si une personne non désirée est détectée par vos capteurs ?', 'Dans un premier temps, un boîtier est placé à l’entrée pour que vous puissiez rentrer facilement sans une longue procédure de vérification. En revanche, si le code entré n’est pas bon au bout de 30 secondes, un standardiste appelle votre maison par le fixe du domicile et demande un code de vérification. Si le code répondu est faux, ou si il n’y a pas de réponse, le client et la police sont immédiatement contactés.');

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
(1, 'Homme en colère');

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
  `Date_publication` datetime NOT NULL,
  `Contenu` text NOT NULL,
  `Note` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `donnees`
--

INSERT INTO `donnees` (`id`, `Date_heure_reception`, `Valeur`, `id_actionneur_capteur`) VALUES
(1, '2019-04-01 13:12:20', 20, 1),
(2, '2019-04-01 13:12:20', 20, 2),
(3, '2019-04-01 13:12:20', 22, 4),
(4, '2019-04-01 13:12:20', 22, 5),
(5, '2019-04-01 13:12:20', 18, 6),
(6, '2019-04-01 13:12:20', 18, 7),
(7, '2019-04-01 13:12:20', 250, 8),
(8, '2019-04-01 13:12:20', 250, 9),
(9, '2019-04-01 13:12:20', 250, 10),
(10, '2019-04-01 13:12:20', 250, 11),
(11, '2019-04-01 13:12:20', 520, 12),
(12, '2019-04-01 13:12:20', 0, 13),
(13, '2019-04-01 13:12:20', 20, 14),
(14, '2019-04-01 13:12:20', 0, 15),
(15, '2019-04-01 13:12:20', 0, 16),
(16, '2019-04-01 13:12:20', 12, 17),
(17, '2019-04-01 13:12:20', 15, 18),
(18, '2019-04-01 13:12:20', 15, 19),
(19, '2019-04-01 13:12:20', 0, 20),
(20, '2019-04-01 13:12:20', 0, 21),
(21, '2019-04-01 13:12:20', 0, 22),
(22, '2019-05-06 10:43:45', 0, 23);

-- --------------------------------------------------------

--
-- Structure de la table `element_catalogue`
--

DROP TABLE IF EXISTS `element_catalogue`;
CREATE TABLE IF NOT EXISTS `element_catalogue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `heritage`
--

INSERT INTO `heritage` (`id`, `id_utilisateur_prim`, `id_utilisateur_sec`, `id_logement`) VALUES
(1, 4, 2, 2),
(2, 4, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Adresse` varchar(255) NOT NULL,
  `Temperature_consigne` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_ibfk_1` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id`, `Adresse`, `Temperature_consigne`, `id_utilisateur`) VALUES
(1, '23 avenue de Paris, 78000 Versailles', 20, 1),
(2, '2 rue Berthier, 78000 Versailles', 20, 4),
(3, '3 square du Dragon, 78150 Le Chesnay', 20, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(12, 'Chambre à coucher', 3);

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
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`id`, `Nom`) VALUES
(1, 'client'),
(2, 'gestionnaire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse_mail` varchar(255) NOT NULL,
  `numeroTel` varchar(14) DEFAULT NULL,
  `Date_naissance` date NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `Question_verif` varchar(255) DEFAULT NULL,
  `Reponse_verif` varchar(255) DEFAULT NULL,
  `id_type_utilsateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_ibfk_1` (`id_type_utilsateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Nom`, `Prenom`, `Adresse_mail`, `numeroTel`, `Date_naissance`, `Mot_de_passe`, `Etat`, `Question_verif`, `Reponse_verif`, `id_type_utilsateur`) VALUES
(1, 'MENVUSA', 'Gérard', 'gerard.menvusa@gmail.com', '06 66 77 88 99', '1990-01-01', '6r&4k1S3p', 1, 'Que voulez-vous manger ?', 'Des nouilles', 1),
(2, 'HIFFY', 'Eugène', 'eugene.hiffy@gmail.com', '07 87 26 12 12', '1998-01-31', 'M0l0lFait', 1, 'Que voulez-vous manger ?', 'Des patates', 1),
(3, 'HIC', 'Bazil', 'bazil.hic@gmail.com', '07 54 64 12 14', '1987-07-05', 'Bi1Fr4is', 1, 'Que voulez-vous prendre ?', 'Un pari sur l\'avenir', 1),
(4, 'Time', 'Vincent', 'vic.time@gmail.com', '06 78 45 40 17', '2000-07-09', 'TheB4nch33', 1, 'Que voulez-vous prendre ?', 'Ton argent', 2),
(5, 'parizot', 'julien', 'julien@parizot.org', NULL, '1998-02-21', '$2y$10$CvFonXCnNKgT6RvOJ912MOO2aCXdjeGvBJAB.1aAj2ks.xB1wP/NG', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_article`
--

DROP TABLE IF EXISTS `utilisateur_article`;
CREATE TABLE IF NOT EXISTS `utilisateur_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_article_ibfk_1` (`id_article`),
  KEY `utilisateur_article_ibfk_2` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_commentaire`
--

DROP TABLE IF EXISTS `utilisateur_commentaire`;
CREATE TABLE IF NOT EXISTS `utilisateur_commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_commentaire_ibfk_1` (`id_commentaire`),
  KEY `utilisateur_commentaire_ibfk_2` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Contraintes pour la table `utilisateur_article`
--
ALTER TABLE `utilisateur_article`
  ADD CONSTRAINT `utilisateur_article_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_article_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur_commentaire`
--
ALTER TABLE `utilisateur_commentaire`
  ADD CONSTRAINT `utilisateur_commentaire_ibfk_1` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_commentaire_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
