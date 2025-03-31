-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 31 mars 2025 à 12:58
-- Version du serveur : 8.0.41-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shoe_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_compte`
--

CREATE TABLE `admin_compte` (
  `id_compte` int NOT NULL,
  `prenom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifiant` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_compte`
--

INSERT INTO `admin_compte` (`id_compte`, `prenom`, `nom`, `identifiant`, `mdp`) VALUES
(1, 'Jean ', 'Dufour', 'j.dufour', 'jduf1234!');

-- --------------------------------------------------------

--
-- Structure de la table `chaussure`
--

CREATE TABLE `chaussure` (
  `id_chaussure` int NOT NULL,
  `nom` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `marque` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille` int NOT NULL,
  `descript` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chaussure`
--

INSERT INTO `chaussure` (`id_chaussure`, `nom`, `prix`, `marque`, `taille`, `descript`, `genre`) VALUES
(1, 'jordan_1', 59.99, 'Nike', 45, '', 'Homme'),
(2, 'jordan_2', 69.99, 'Nike', 38, '', 'Femme'),
(3, 'jordan_3', 129.99, 'Nike', 44, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Homme'),
(4, 'jordan_4', 89, 'Nike', 32, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Femme'),
(5, 'jordan_5', 158, 'Nike', 52, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Homme'),
(6, 'jordan_6', 45.5, 'Nike', 39, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int NOT NULL,
  `prenom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifiant` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `prenom`, `nom`, `email`, `identifiant`, `mdp`) VALUES
(1, 'Jean', 'Dupont', 'j.dupont@hotmail.fr', 'jdplogin01', 'Jdp1969!'),
(2, 'Paul', 'Durant', 'p.durant@hotmail.fr', 'pdulogin02', 'Pdu1970!');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_compte`
--
ALTER TABLE `admin_compte`
  ADD PRIMARY KEY (`id_compte`);

--
-- Index pour la table `chaussure`
--
ALTER TABLE `chaussure`
  ADD PRIMARY KEY (`id_chaussure`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_compte`
--
ALTER TABLE `admin_compte`
  MODIFY `id_compte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `chaussure`
--
ALTER TABLE `chaussure`
  MODIFY `id_chaussure` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
