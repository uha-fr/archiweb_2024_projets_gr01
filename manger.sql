-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 fév. 2024 à 22:08
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

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

CREATE TABLE `ingredient` (
  `id_ingredient` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `calories` int(11) NOT NULL,
  `url_image` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id_ingredient`, `nom`, `categorie`, `calories`, `url_image`) VALUES
(1, 'Tomate', 'Fruit', 25, 'src/img/ingredients/tomate.jpeg'),
(2, 'Poivron', 'Légume', 12, 'src/img/ingredients/poivron.jpeg'),
(3, 'Pomme', 'Fruit', 56, 'src/img/ingredients/pomme.jpeg'),
(4, 'Banane', 'Fruit', 95, 'src/img/ingredients/banane.jpeg'),
(5, 'Pomme de terre', 'Légume', 12, 'src/img/ingredients/pomme2terre.jpeg'),
(7, 'Carotte', 'Légume', 58, 'src/img/ingredients/carotte.jpeg'),
(8, 'Oeuf', '', 99, 'src/img/ingredients/oeuf.jpeg'),
(9, 'Sucre', '', 5, 'src/img/ingredients/sucre.jpeg'),
(10, 'Poireau', 'Légume', 12, 'src/img/ingredients/poireau.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id_recette` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `instruction` text NOT NULL,
  `difficulte` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `temps_preparation` int(11) NOT NULL,
  `temps_cuisson` int(11) DEFAULT NULL,
  `calorie` int(11) NOT NULL,
  `url_image` varchar(100) DEFAULT NULL,
  `visibility` enum('Public','Private') DEFAULT 'Private',
  `id_createur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id_recette`, `nom`, `description`, `instruction`, `difficulte`, `categorie`, `temps_preparation`, `temps_cuisson`, `calorie`, `url_image`, `visibility`, `id_createur`) VALUES
(1, 'Tomate automate', 'Tomate aux tomates', '1.Tomate\r\n2.Automate\r\n3.Aux tomates ?', 1, 'Plat', 1, NULL, 25, 'src/img/recettes/automate.jpeg', 'Private', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recette_ingredient`
--

CREATE TABLE `recette_ingredient` (
  `id_recette` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1
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

CREATE TABLE `recette_ustensile` (
  `id_recette` int(11) NOT NULL,
  `id_ustensile` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ustensile_equipement`
--

CREATE TABLE `ustensile_equipement` (
  `id_ustensile` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `url_image` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `poids` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `type_utilisateur` enum('Standard','Premium','Nutritionniste','Admin') DEFAULT 'Standard'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `utilisateur_ingredient` (
  `id_utilisateur` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur_ingredient`
--

INSERT INTO `utilisateur_ingredient` (`id_utilisateur`, `id_ingredient`, `quantite`) VALUES
(1, 1, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id_ingredient`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id_recette`),
  ADD KEY `id_createur` (`id_createur`);

--
-- Index pour la table `recette_ingredient`
--
ALTER TABLE `recette_ingredient`
  ADD PRIMARY KEY (`id_recette`,`id_ingredient`),
  ADD KEY `id_ingredient` (`id_ingredient`);

--
-- Index pour la table `recette_ustensile`
--
ALTER TABLE `recette_ustensile`
  ADD PRIMARY KEY (`id_recette`,`id_ustensile`),
  ADD KEY `id_ustensile` (`id_ustensile`);

--
-- Index pour la table `ustensile_equipement`
--
ALTER TABLE `ustensile_equipement`
  ADD PRIMARY KEY (`id_ustensile`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `utilisateur_ingredient`
--
ALTER TABLE `utilisateur_ingredient`
  ADD PRIMARY KEY (`id_utilisateur`,`id_ingredient`),
  ADD KEY `id_ingredient` (`id_ingredient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id_ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ustensile_equipement`
--
ALTER TABLE `ustensile_equipement`
  MODIFY `id_ustensile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
