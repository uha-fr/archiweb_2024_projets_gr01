-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 fév. 2024 à 11:07
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `manger`
--
CREATE DATABASE IF NOT EXISTS `manger` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `manger`;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id_ingredient` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `categorie` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `calories` int NOT NULL,
  `url_image` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_ingredient`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id_ingredient`, `nom`, `categorie`, `calories`, `url_image`) VALUES
(1, 'Tomate', 'Fruit', 25, '../assets/img/ingredients/tomate.jpeg'),
(2, 'Poivron', 'Légume', 12, '../assets/img/ingredients/poivron.jpeg'),
(3, 'Pomme', 'Fruit', 56, '../assets/img/ingredients/pomme.jpeg'),
(4, 'Banane', 'Fruit', 95, '../assets/img/ingredients/banane.jpeg'),
(5, 'Pomme de terre', 'Légume', 12, '../assets/img/ingredients/pomme2terre.jpeg'),
(7, 'Carotte', 'Légume', 58, '../assets/img/ingredients/carotte.jpeg'),
(8, 'Oeuf', '', 99, '../assets/img/ingredients/oeuf.jpeg'),
(9, 'Sucre', '', 5, '../assets/img/ingredients/sucre.jpeg'),
(10, 'Poireau', 'Légume', 12, '../assets/img/ingredients/poireau.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id_recette` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `instruction` text COLLATE utf8mb4_general_ci NOT NULL,
  `difficulte` int NOT NULL,
  `categorie` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `temps_preparation` int NOT NULL,
  `temps_cuisson` int DEFAULT NULL,
  `calorie` int NOT NULL,
  `url_image` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `visibility` enum('Public','Private') COLLATE utf8mb4_general_ci DEFAULT 'Private',
  `id_createur` int NOT NULL,
  PRIMARY KEY (`id_recette`),
  KEY `id_createur` (`id_createur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id_recette`, `nom`, `description`, `instruction`, `difficulte`, `categorie`, `temps_preparation`, `temps_cuisson`, `calorie`, `url_image`, `visibility`, `id_createur`) VALUES
(1, 'Tomate automate', 'Tomate aux tomates', '1.Tomate\r\n2.Automate\r\n3.Aux tomates ?', 1, 'Plat', 1, NULL, 25, '../assets/img/recettes/automate.jpeg', 'Private', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recette_ingredient`
--

DROP TABLE IF EXISTS `recette_ingredient`;
CREATE TABLE IF NOT EXISTS `recette_ingredient` (
  `id_recette` int NOT NULL,
  `id_ingredient` int NOT NULL,
  `quantite` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_recette`,`id_ingredient`),
  KEY `id_ingredient` (`id_ingredient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recette_ingredient`
--

INSERT INTO `recette_ingredient` (`id_recette`, `id_ingredient`, `quantite`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recette_ustensile`
--

DROP TABLE IF EXISTS `recette_ustensile`;
CREATE TABLE IF NOT EXISTS `recette_ustensile` (
  `id_recette` int NOT NULL,
  `id_ustensile` int NOT NULL,
  PRIMARY KEY (`id_recette`,`id_ustensile`),
  KEY `id_ustensile` (`id_ustensile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ustensile_equipement`
--

DROP TABLE IF EXISTS `ustensile_equipement`;
CREATE TABLE IF NOT EXISTS `ustensile_equipement` (
  `id_ustensile` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `url_image` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_ustensile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `poids` int NOT NULL,
  `taille` int NOT NULL,
  `type_utilisateur` enum('Standard','Premium','Nutritionniste','Admin') COLLATE utf8mb4_general_ci DEFAULT 'Standard',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `email`, `mot_de_passe`, `poids`, `taille`, `type_utilisateur`) VALUES
(1, 'lurio', 'bruno.stier@uha.fr', '$2y$10$lK1pUYnjmxwlEDudRa35feIYr.7aVZT7cWv4XBVVTNbM8Ok7Nr5tC', 65, 180, 'Admin'),
(2, 'Isheep', 'isheep@gmail.com', '$2y$12$iTmmR9cw0T24V/mI9eFwLu4oIg9X0wrnNwUPakoyxLOckQrQTw/x.', 0, 0, 'Standard');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_ingredient`
--

DROP TABLE IF EXISTS `utilisateur_ingredient`;
CREATE TABLE IF NOT EXISTS `utilisateur_ingredient` (
  `id_utilisateur` int NOT NULL,
  `id_ingredient` int NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_ingredient`),
  KEY `id_ingredient` (`id_ingredient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur_ingredient`
--

INSERT INTO `utilisateur_ingredient` (`id_utilisateur`, `id_ingredient`, `quantite`) VALUES
(1, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
