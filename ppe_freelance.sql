-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 02 Décembre 2016 à 09:27
-- Version du serveur :  5.7.16-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe_freelance`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id_ann`, `titre`, `date_publi`, `date_debut`, `duree`, `salaire`, `description`, `lieu`, `competences`, `cat`, `spe`) VALUES
(1, 'Site de vente', '2016-10-18', '2016-11-21', '1 mois', 5000, 'Création d\'un site de vente en ligne.', 'Paris', 'Nous recherchons un développeur Symfony expérimenté. ', 'dev', 'php'),
(2, 'Site vitrine', '2016-11-17', '2016-11-24', '1 semaine', 500, 'Création d\'un site vitrine', 'Nice', 'Maîtrise du framework Bootstrap.', 'dev', 'css'),
(3, 'Programme JAVA', '2016-11-25', '2016-12-23', '', 3000, 'Developpement d\'un programme sous JAVA', 'Paris ', 'Maîtrise de JAVA', 'prog', 'java'),
(4, 'Administrateur CISCO', '2016-11-25', '2016-11-29', '', 1300, 'Administration réseau', 'Marseille', 'Avoir la certification CISCO systeme', 'reseau', 'cisco');

-- --------------------------------------------------------

--
-- Structure de la table `mbr_admin`
--

CREATE TABLE `mbr_admin` (
  `id_admin` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mbr_free`
--

CREATE TABLE `mbr_free` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mbr_free`
--

INSERT INTO `mbr_free` (`id_free`, `nom`, `prenom`, `mail`, `password`, `date_inscr`, `test`, `competences`, `site_web`, `photo`, `tarif`, `langues`, `localisation`) VALUES
(1, 'tom', 'salvadore', 'tom.salvadore@gmail.com', '1234', '2016-11-08', 0, '', '', '', 0, '', ''),
(6, 'test', 'test', 'test@test.test', '$2y$10$YdgQ4tqUcZbt9TON9DFSMOwPwTUTw1Vqr556hoWhrvAMwhyUPU9Me', '2016-11-09', 0, '', '', '', 0, '', ''),
(7, 'iji', 'ij', 'tom@tom.com', '$2y$10$GIU7j6xp2yN73iX1sdxHWevDZFBLuw44uG23VW1siL2M5Tg8UDfwS', '2016-11-25', 0, '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `mbr_society`
--

CREATE TABLE `mbr_society` (
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
-- Structure de la table `qcm`
--

CREATE TABLE `qcm` (
  `id_question` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse_v` varchar(255) NOT NULL,
  `reponse_f1` varchar(255) NOT NULL,
  `reponse_f2` varchar(255) NOT NULL,
  `reponse_f3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `qcm`
--

INSERT INTO `qcm` (`id_question`, `question`, `reponse_v`, `reponse_f1`, `reponse_f2`, `reponse_f3`) VALUES
(1, 'Java et JavaScript sont-ils deux mêmes langages informatiques ?', 'Non, le Java est un langage orienté objet et compilé alors que le JavaScript est un langage de script et procédural.', 'Aucune', 'Non, le JavaScript est un langage orienté objet et compilé alors que le Java est un langage de script et procédural.', 'Oui, ce sont des langages orientés objet et compilés.'),
(2, 'Quelle est la différence entre un bit et un byte ?', '8 bits = 1 octect, 1 byte = 1 octect.', 'Aucune.', '8 bits = 8 octect, 1 byte = 8 octect.', '1 bits = 1 octect, 1 byte = 1 octect.'),
(3, 'Qu\'est-ce qu\'un switch ?', 'Un switch désigne un commutateur réseau, équipement ou appareil qui permet l\'interconnexion d\'appareils communicants, terminaux, ordinateurs, serveurs...', 'C\'est un ordinateur très puissant qui a été inventé par les Soviétiques dans les années 1980.', 'C\'est un appareil qui permet de scanner les codes-barres et de retransmettre les informations sur ordinateur.', 'C\'est un appareil qui permet de changer le sens de circulation du courant dans les cartes-mères.'),
(4, 'Quelle est la fonction qui permet d\'afficher un message à l\'écran en Python ?', '"print".', '"printf".', '"scanf".', '"alert".'),
(5, 'Quelle est la différence entre la base 10 et le système décimal ?', 'Aucune.', 'En base de 10 on compte de 10 en 10 alors qu\'en décimal on compte 1 en 1 (ex: 10, 20, 30.. 1, 2 ,3 ..).', 'La base de 10 est un langage orienté objet alors que le système décimal est un langage procédural.', 'En base de 10 on compte de 1 en 1 de même pour le système décimal (ex: 1, 2 ,3 ..).'),
(6, 'Qu\'est-ce que le "Spanning Tree Protocol" ?', 'Le Spanning Tree Protocol est un protocole réseau de niveau 2 permettant de déterminer une topologie réseau sans boucle (appelée arbre) dans les LAN avec ponts.', 'Le Spanning Tree Protocol est un protocole réseau de niveau 3 permettant la connexion et déconnexion automatique de chaque ordinateur entrant et sortant sur un réseau local.', 'Le Spanning Tree Protocol est un protocole réseau en arbre qui détermine les privilèges de chaque branche d\'un réseau.', 'Le Spanning Tree Protocol est un système d\'exploitation Linux qui permet le débogage rapide de logiciels.'),
(7, 'Qu\'est-ce qu\'une adresse MAC?', 'Une adresse MAC (Media Access Control), est un identifiant physique stocké dans une carte réseau ou une interface réseau similaire. Elle est réputé unique au monde.', 'Une adresse MAC (Mega Adress Card), ou IP, est associé à chaque carte réseau et logiciel de routage.', 'Une adresse MAC est une adresse de messagerie avec laquelle on peut contacter les administrateurs de forum.', 'L\'adresse MAC est une adresse à laquelle on peut accéder à tout les fichiers stockés sur un réseau.'),
(8, 'En quelle année le langage C a-t-il était inventé ?', '1972', '1965', '1975', '1980'),
(9, 'À partir de quelle version la notion de PHP Data Objects a-t-elle été instauré ?', '5.0', '6.0', '5.5', '7.0'),
(10, 'Quel est le principe de git ?', 'git est un logiciel de gestion de versions décentralisé. C\'est un logiciel libre.', 'C\'est un logiciel de retouche d\'image et photo, comme Gimp par exemple.', 'C\'est un logiciel de capture d\'écran ainsi que de capture vidéo compatible sur tout les systèmes d\'exploitation.', 'git est un mini système d\'exploitation qu\'on peut intégrer à un Raspberry Pi 3.');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL,
  `result` varchar(25) NOT NULL,
  `id_free` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_ann`);

--
-- Index pour la table `mbr_admin`
--
ALTER TABLE `mbr_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `mbr_free`
--
ALTER TABLE `mbr_free`
  ADD PRIMARY KEY (`id_free`);

--
-- Index pour la table `mbr_society`
--
ALTER TABLE `mbr_society`
  ADD PRIMARY KEY (`id_soc`);

--
-- Index pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`id_question`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `id_free` (`id_free`),
  ADD KEY `id_free_2` (`id_free`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_ann` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `mbr_admin`
--
ALTER TABLE `mbr_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mbr_free`
--
ALTER TABLE `mbr_free`
  MODIFY `id_free` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `mbr_society`
--
ALTER TABLE `mbr_society`
  MODIFY `id_soc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`id_free`) REFERENCES `mbr_free` (`id_free`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
