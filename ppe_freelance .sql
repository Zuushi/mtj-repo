-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2016 at 07:55 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppe_freelance`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `id_ann` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `date_publi` date NOT NULL,
  `date_debut` date NOT NULL,
  `duree` varchar(50) NOT NULL,
  `salaire` int(11) NOT NULL,
  `description` text NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `competences` text NOT NULL,
  `cat` varchar(50) NOT NULL,
  `spe` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annonces`
--

INSERT INTO `annonces` (`id_ann`, `titre`, `date_publi`, `date_debut`, `duree`, `salaire`, `description`, `lieu`, `competences`, `cat`, `spe`) VALUES
(1, 'Site de vente', '2016-10-18', '2016-11-21', '1 mois', 5000, 'Création d''un site de vente en ligne.', 'Paris', 'Nous recherchons un développeur Symfony expérimenté. ', 'dev', 'php'),
(2, 'Site vitrine', '2016-11-17', '2016-11-24', '1 semaine', 500, 'Création d''un site vitrine', 'Nice', 'Maîtrise du framework Bootstrap.', 'dev', 'css'),
(3, 'Programme JAVA', '2016-11-25', '2016-12-23', '', 3000, 'Developpement d''un programme sous JAVA', 'Paris ', 'Maîtrise de JAVA', 'prog', 'java'),
(4, 'Administrateur CISCO', '2016-11-25', '2016-11-29', '', 1300, 'Administration réseau', 'Marseille', 'Avoir la certification CISCO systeme', 'reseau', 'cisco');

-- --------------------------------------------------------

--
-- Table structure for table `mbr_admin`
--

CREATE TABLE IF NOT EXISTS `mbr_admin` (
  `id_admin` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mbr_free`
--

CREATE TABLE IF NOT EXISTS `mbr_free` (
  `id_free` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_inscr` date NOT NULL,
  `test` tinyint(1) NOT NULL,
  `competences` text NOT NULL,
  `site_web` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `langues` varchar(25) NOT NULL,
  `localisation` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mbr_free`
--

INSERT INTO `mbr_free` (`id_free`, `nom`, `prenom`, `mail`, `password`, `date_inscr`, `test`, `competences`, `site_web`, `photo`, `tarif`, `langues`, `localisation`) VALUES
(1, 'tom', 'salvadore', 'tom.salvadore@gmail.com', '1234', '2016-11-08', 0, '', '', '', 0, '', ''),
(6, 'test', 'test', 'test@test.test', '$2y$10$YdgQ4tqUcZbt9TON9DFSMOwPwTUTw1Vqr556hoWhrvAMwhyUPU9Me', '2016-11-09', 0, '', '', '', 0, '', ''),
(7, 'iji', 'ij', 'tom@tom.com', '$2y$10$GIU7j6xp2yN73iX1sdxHWevDZFBLuw44uG23VW1siL2M5Tg8UDfwS', '2016-11-25', 0, '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mbr_society`
--

CREATE TABLE IF NOT EXISTS `mbr_society` (
  `id_soc` int(11) NOT NULL,
  `raison_sociale` varchar(50) NOT NULL,
  `siret` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `date_inscr` date NOT NULL,
  `capital` int(11) NOT NULL,
  `site_web` varchar(50) NOT NULL,
  `siege_social` varchar(50) NOT NULL,
  `recruteur` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(11) NOT NULL,
  `result` varchar(25) NOT NULL,
  `id_free` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_ann`);

--
-- Indexes for table `mbr_admin`
--
ALTER TABLE `mbr_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `mbr_free`
--
ALTER TABLE `mbr_free`
  ADD PRIMARY KEY (`id_free`);

--
-- Indexes for table `mbr_society`
--
ALTER TABLE `mbr_society`
  ADD PRIMARY KEY (`id_soc`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `id_free` (`id_free`),
  ADD KEY `id_free_2` (`id_free`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_ann` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mbr_admin`
--
ALTER TABLE `mbr_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mbr_free`
--
ALTER TABLE `mbr_free`
  MODIFY `id_free` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mbr_society`
--
ALTER TABLE `mbr_society`
  MODIFY `id_soc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`id_free`) REFERENCES `mbr_free` (`id_free`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
