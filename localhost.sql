-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 19 Octobre 2016 à 14:18
-- Version du serveur :  5.7.12-0ubuntu1.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecole`
--
CREATE DATABASE IF NOT EXISTS `ecole` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecole`;

-- --------------------------------------------------------

--
-- Structure de la table `Epreuve`
--

CREATE TABLE `Epreuve` (
  `numepreuve` int(11) NOT NULL,
  `datepreuve` date NOT NULL,
  `lieu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `numetu` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `datenaiss` date NOT NULL,
  `rue` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Matiere`
--

CREATE TABLE `Matiere` (
  `codemat` varchar(3) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  `coef` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Matiere`
--

INSERT INTO `Matiere` (`codemat`, `libelle`, `coef`) VALUES
('ECO', 'Economie', 0.4),
('INF', 'Informatique', 0.4),
('STA', 'Statistiques', 0.2);

-- --------------------------------------------------------

--
-- Structure de la table `Notation`
--

CREATE TABLE `Notation` (
  `numetu` int(11) NOT NULL,
  `numepreuve` int(11) NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `yolo`
--

CREATE TABLE `yolo` (
  `ID` int(11) NOT NULL,
  `Prename` varchar(50) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `StreetA` varchar(150) NOT NULL,
  `StreetB` varchar(150) NOT NULL,
  `StreetC` varchar(150) NOT NULL,
  `County` varchar(100) NOT NULL,
  `Postcode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Epreuve`
--
ALTER TABLE `Epreuve`
  ADD PRIMARY KEY (`numepreuve`);

--
-- Index pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`numetu`);

--
-- Index pour la table `Matiere`
--
ALTER TABLE `Matiere`
  ADD PRIMARY KEY (`codemat`);

--
-- Index pour la table `Notation`
--
ALTER TABLE `Notation`
  ADD KEY `numetu` (`numetu`),
  ADD KEY `numepreuve` (`numepreuve`);

--
-- Index pour la table `yolo`
--
ALTER TABLE `yolo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `yolo`
--
ALTER TABLE `yolo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
