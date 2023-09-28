-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 23 sep. 2023 à 19:12
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
-- Base de données : `fci_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

CREATE TABLE `cotisation` (
  `ID` int(11) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `VISIBLE` int(11) NOT NULL,
  `devise` int(11) DEFAULT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  `MONTANT` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `statuts` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

CREATE TABLE `entree` (
  `ID` int(11) NOT NULL,
  `DATE_ENTREE` date NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `OBSERVATION` text NOT NULL,
  `VISIBLE` int(11) NOT NULL,
  `devise` int(11) DEFAULT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  `MONTANT` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `ID` int(11) NOT NULL,
  `NUMERO` text NOT NULL,
  `NOM` text NOT NULL,
  `POSTNOM` text NOT NULL,
  `PRENOM` text NOT NULL,
  `LIEU_DE_TRAVAIL` text NOT NULL,
  `NUMERO_DE_TELEPHONE` text NOT NULL,
  `NOM_UTILISATEUR` text NOT NULL,
  `MOT_DE_PASSE` text NOT NULL,
  `PROFILE` text NOT NULL,
  `STATUT` text NOT NULL,
  `VISIBLE` int(11) NOT NULL,
  `ROLE` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`ID`, `NUMERO`, `NOM`, `POSTNOM`, `PRENOM`, `LIEU_DE_TRAVAIL`, `NUMERO_DE_TELEPHONE`, `NOM_UTILISATEUR`, `MOT_DE_PASSE`, `PROFILE`, `STATUT`, `VISIBLE`, `ROLE`) VALUES
(1, '1', 'admin', 'admin', 'admin', 'admin', '0', 'admin', 'admin', '', '1', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `ID` int(11) NOT NULL,
  `DATE_PAIE` date NOT NULL,
  `MEMBRE` int(11) NOT NULL,
  `COTISATION` int(11) NOT NULL,
  `VISIBLE` int(11) NOT NULL,
  `devise` int(11) DEFAULT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  `MONTANT` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

CREATE TABLE `sortie` (
  `ID` int(11) NOT NULL,
  `DATE_SORTIE` date NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `OBSERVATION` text NOT NULL,
  `VISIBLE` int(11) NOT NULL,
  `devise` int(11) DEFAULT NULL,
  `taux` decimal(10,0) DEFAULT NULL,
  `MONTANT` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cotisation`
--
ALTER TABLE `cotisation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cotisation`
--
ALTER TABLE `cotisation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entree`
--
ALTER TABLE `entree`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sortie`
--
ALTER TABLE `sortie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
