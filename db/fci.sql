-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 09:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fci`
--

-- --------------------------------------------------------

--
-- Table structure for table `cotisation`
--

CREATE TABLE `cotisation` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entree`
--

CREATE TABLE `entree` (
  `id` int(11) NOT NULL,
  `date_entree` date NOT NULL,
  `description` text NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `observation` text NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `nom_utilisateur` text NOT NULL,
  `mot_de_passe` text NOT NULL,
  `description` text NOT NULL,
  `profile` text NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `numero` text NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `prenom` text NOT NULL,
  `lieu_de_travail` text NOT NULL,
  `numero_de_telephone` text NOT NULL,
  `nom_utilisateur` text NOT NULL,
  `mot_de_passe` text NOT NULL,
  `profile` text NOT NULL,
  `statut` text NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `date_paie` date NOT NULL,
  `membre` int(11) NOT NULL,
  `cotisation` int(11) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sortie`
--

CREATE TABLE `sortie` (
  `id` int(11) NOT NULL,
  `date_sortie` date NOT NULL,
  `description` text NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `observation` text NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cotisation`
--
ALTER TABLE `cotisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sortie`
--
ALTER TABLE `sortie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cotisation`
--
ALTER TABLE `cotisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entree`
--
ALTER TABLE `entree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sortie`
--
ALTER TABLE `sortie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
