-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 22 mars 2019 à 14:16
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `NIDS`
--

-- --------------------------------------------------------

--
-- Structure de la table `ACTIONNEUR_CAPTEUR`
--

CREATE TABLE `ACTIONNEUR_CAPTEUR` (
  `id` int(11) NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `Actif` tinyint(1) NOT NULL,
  `NumeroSerie` int(11) NOT NULL,
  `id_element_catalogue` int(11) NOT NULL,
  `id_CeMac` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ADMINISTRATIF`
--

CREATE TABLE `ADMINISTRATIF` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Valeur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE`
--

CREATE TABLE `ARTICLE` (
  `id` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE_FAQ`
--

CREATE TABLE `ARTICLE_FAQ` (
  `id` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORIE`
--

CREATE TABLE `CATEGORIE` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CeMAC`
--

CREATE TABLE `CeMAC` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `id_logement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `COMMENTAIRE`
--

CREATE TABLE `COMMENTAIRE` (
  `id` int(11) NOT NULL,
  `Date_publication` datetime NOT NULL,
  `Contenu` text NOT NULL,
  `Note` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `DONNEES`
--

CREATE TABLE `DONNEES` (
  `id` int(11) NOT NULL,
  `Date_heure_reception` datetime NOT NULL,
  `Valeur` int(11) NOT NULL,
  `id_actionneur_capteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ELEMENT_CATALOGUE`
--

CREATE TABLE `ELEMENT_CATALOGUE` (
  `Num_serie` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `HERITAGE`
--

CREATE TABLE `HERITAGE` (
  `id` int(11) NOT NULL,
  `id_utilisateur_prim` int(11) NOT NULL,
  `id_utilisateur_sec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `LOGEMENT`
--

CREATE TABLE `LOGEMENT` (
  `id` int(11) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Temperature_consigne` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PIECE`
--

CREATE TABLE `PIECE` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `id_logement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PROGRAMMATION`
--

CREATE TABLE `PROGRAMMATION` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Instruction` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Moment d'activation` datetime NOT NULL,
  `Moment de desactivation` datetime NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PROGRAMMATION_CAPTEUR`
--

CREATE TABLE `PROGRAMMATION_CAPTEUR` (
  `id` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `id_programmation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PROGRAMMATION_CATEGORIE`
--

CREATE TABLE `PROGRAMMATION_CATEGORIE` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_programmation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_UTILISATEUR`
--

CREATE TABLE `TYPE_UTILISATEUR` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse_mail` varchar(255) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `Question_verif` varchar(255) NOT NULL,
  `Reponse_verif` varchar(255) NOT NULL,
  `id_type_utilsateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR_ARTICLE`
--

CREATE TABLE `UTILISATEUR_ARTICLE` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR_COMMENTAIRE`
--

CREATE TABLE `UTILISATEUR_COMMENTAIRE` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ACTIONNEUR_CAPTEUR`
--
ALTER TABLE `ACTIONNEUR_CAPTEUR`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ADMINISTRATIF`
--
ALTER TABLE `ADMINISTRATIF`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ARTICLE_FAQ`
--
ALTER TABLE `ARTICLE_FAQ`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `CeMAC`
--
ALTER TABLE `CeMAC`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `COMMENTAIRE`
--
ALTER TABLE `COMMENTAIRE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `DONNEES`
--
ALTER TABLE `DONNEES`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `HERITAGE`
--
ALTER TABLE `HERITAGE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `LOGEMENT`
--
ALTER TABLE `LOGEMENT`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PIECE`
--
ALTER TABLE `PIECE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PROGRAMMATION`
--
ALTER TABLE `PROGRAMMATION`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PROGRAMMATION_CAPTEUR`
--
ALTER TABLE `PROGRAMMATION_CAPTEUR`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PROGRAMMATION_CATEGORIE`
--
ALTER TABLE `PROGRAMMATION_CATEGORIE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TYPE_UTILISATEUR`
--
ALTER TABLE `TYPE_UTILISATEUR`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `UTILISATEUR_ARTICLE`
--
ALTER TABLE `UTILISATEUR_ARTICLE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `UTILISATEUR_COMMENTAIRE`
--
ALTER TABLE `UTILISATEUR_COMMENTAIRE`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ACTIONNEUR_CAPTEUR`
--
ALTER TABLE `ACTIONNEUR_CAPTEUR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ADMINISTRATIF`
--
ALTER TABLE `ADMINISTRATIF`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ARTICLE_FAQ`
--
ALTER TABLE `ARTICLE_FAQ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `CeMAC`
--
ALTER TABLE `CeMAC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `COMMENTAIRE`
--
ALTER TABLE `COMMENTAIRE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `DONNEES`
--
ALTER TABLE `DONNEES`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `HERITAGE`
--
ALTER TABLE `HERITAGE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `LOGEMENT`
--
ALTER TABLE `LOGEMENT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PIECE`
--
ALTER TABLE `PIECE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PROGRAMMATION`
--
ALTER TABLE `PROGRAMMATION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PROGRAMMATION_CAPTEUR`
--
ALTER TABLE `PROGRAMMATION_CAPTEUR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PROGRAMMATION_CATEGORIE`
--
ALTER TABLE `PROGRAMMATION_CATEGORIE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TYPE_UTILISATEUR`
--
ALTER TABLE `TYPE_UTILISATEUR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `UTILISATEUR_ARTICLE`
--
ALTER TABLE `UTILISATEUR_ARTICLE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `UTILISATEUR_COMMENTAIRE`
--
ALTER TABLE `UTILISATEUR_COMMENTAIRE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;