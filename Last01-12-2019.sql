-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 01 déc. 2019 à 18:35
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_produit`
--
DROP DATABASE IF EXISTS `gestion_produit`;
CREATE DATABASE IF NOT EXISTS `gestion_produit` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestion_produit`;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `quantite` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `idProduit`, `idCompte`, `commentaire`, `quantite`) VALUES
(1, 2, 1, 'Bonne réception.', 2),
(2, 3, 1, 'Pas de commentaire sur la livraison et produit de bonne qualitate', 4);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `idCompte` int(11) NOT NULL,
  `login` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL,
  `profil` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `login`, `password`, `profil`) VALUES
(1, 'admin', '$2y$10$sr0.gq1ds2TdMgqi1UzwIu1wxejp2J1ysA2nH14fgpq10QK9WiX2m', 'Manager'),
(2, 'admin2', '$2y$10$URg9x7N80ffkGKBXPJodluw0GDX8vfF1IVUkzOqp9cCkwZiqJNp8S', 'Manager');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `libelle` varchar(220) NOT NULL,
  `categorie` varchar(220) DEFAULT NULL,
  `marque` varchar(220) DEFAULT NULL,
  `quantite` int(11) NOT NULL DEFAULT 0,
  `prixUnitaire` int(11) NOT NULL DEFAULT 0,
  `tva` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `reference` varchar(220) NOT NULL,
  `lienImage` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `libelle`, `categorie`, `marque`, `quantite`, `prixUnitaire`, `tva`, `description`, `reference`, `lienImage`) VALUES
(2, 'Rogue V2700', 'Carte maman', 'Asus', 28, 312, 12, 'Une carte maman de performance pas du tous renomé', 'A-R-V700', 'https://media.hardware.fr/r500/ld/products/00/04/94/74/LD0004947482_2.jpg'),
(3, 'Gamer+ 27\"', 'Ecran', 'iiyama', 52, 112, 12, 'Un écran de bonne fabrique, flemme..', 'I-G+-27\"', 'https://media.ldlc.com/r1600/ld/products/00/03/67/57/LD0003675708_2.jpg'),
(4, 'Rogue V2700', 'Carte maman', 'Asus', 28, 312, 12, 'Une carte maman de performance pas du tous renomé', 'test1', 'https://media.hardware.fr/r500/ld/products/00/04/94/74/LD0004947482_2.jpg'),
(5, 'Rogue V2700', 'Carte maman', 'Asus', 28, 312, 12, 'Une carte maman de performance pas du tous renomé', 'test2', 'https://media.hardware.fr/r500/ld/products/00/04/94/74/LD0004947482_2.jpg'),
(6, 'Rogue V2700', 'Carte maman', 'Asus', 28, 312, 12, 'Une carte maman de performance pas du tous renomé', 'test3', 'https://media.hardware.fr/r500/ld/products/00/04/94/74/LD0004947482_2.jpg'),
(7, 'Rogue V2700', 'Carte maman', 'Asus', 28, 312, 12, 'Une carte maman de performance pas du tous renomé', 'test4', 'https://media.hardware.fr/r500/ld/products/00/04/94/74/LD0004947482_2.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idCompte`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `idCompte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
