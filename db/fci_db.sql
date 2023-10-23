-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 14 oct. 2023 à 12:47
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

--
-- Déchargement des données de la table `cotisation`
--

INSERT INTO `cotisation` (`ID`, `DESCRIPTION`, `VISIBLE`, `devise`, `taux`, `MONTANT`) VALUES
(1, 'Association', 1, 2, 1, 12000),
(2, 'TVA', 1, 2, 1, 15000);

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

--
-- Déchargement des données de la table `devise`
--

INSERT INTO `devise` (`id`, `description`, `taux`, `visible`, `statuts`) VALUES
(1, 'USD (Dollars Americain)', 2500, 1, 0),
(2, 'CDF(Franc Congolais)', 1, 1, 1);

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

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`ID`, `DATE_ENTREE`, `DESCRIPTION`, `OBSERVATION`, `VISIBLE`, `devise`, `taux`, `MONTANT`) VALUES
(1, '2023-09-26', 'DON', 'DG', 1, 1, 2500, 10);

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
  `ROLE` int(11) DEFAULT 0,
  `ADRESSE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`ID`, `NUMERO`, `NOM`, `POSTNOM`, `PRENOM`, `LIEU_DE_TRAVAIL`, `NUMERO_DE_TELEPHONE`, `NOM_UTILISATEUR`, `MOT_DE_PASSE`, `PROFILE`, `STATUT`, `VISIBLE`, `ROLE`, `ADRESSE`) VALUES
(1, '1', 'admin', 'admin', 'admin', 'admin', '0', 'admin', 'admin', 'blank-profile-picture-973460_1280.png', '1', 1, 1, 'Goma/Virunga'),
(2, '2', 'Mumbere', 'Tsongo', 'Nathanael', 'GOMA', '0995247814', 'nathan', '12', 'blank-profile-picture-973460_1280.png', '1', 1, 0, 'Goma/Katoyi'),
(3, '3', 'Klein', 'Maghuru', 'David', 'Goma', '0995247814', 'user', '0000', 'blank-profile-picture-973460_1280.png', '0', 1, 0, 'Goma/Himbi'),
(4, '4', 'Jean-Louis', 'Aganze', 'Ciza', 'Goma', '0995247814', 'user', '0000', '', '1', 0, 0, NULL),
(5, '5', 'JO', 'DEN', 'EL', 'Goma', '04', 'den', '0', 'blank-profile-picture-973460_1280.png', '1', 1, 0, 'Goma/Birere'),
(6, '6', 'Mumbere', 'Tsongo', 'Nath', 'Goma', '0995247814', 'nath', '0000', '', '1', 1, 0, 'Goma/Virunga');

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

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`ID`, `DATE_PAIE`, `MEMBRE`, `COTISATION`, `VISIBLE`, `devise`, `taux`, `MONTANT`) VALUES
(1, '2023-09-28', 2, 2, 1, 2, 1, 15000),
(2, '2023-09-28', 3, 2, 1, 2, 1, 15000),
(3, '2023-09-28', 5, 2, 1, 2, 1, 10000);

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
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`ID`, `DATE_SORTIE`, `DESCRIPTION`, `OBSERVATION`, `VISIBLE`, `devise`, `taux`, `MONTANT`) VALUES
(1, '2023-09-27', 'DG', 'Transport', 1, 2, 1, 20000);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `entree`
--
ALTER TABLE `entree`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sortie`
--
ALTER TABLE `sortie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
