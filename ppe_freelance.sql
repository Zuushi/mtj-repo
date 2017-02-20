-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 20 Février 2017 à 17:31
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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
  `id_soci` int(255) DEFAULT NULL,
  `nom_soci` varchar(255) DEFAULT NULL,
  `date_publi` date NOT NULL,
  `date_debut` date NOT NULL,
  `duree` varchar(50) NOT NULL,
  `salaire` int(11) NOT NULL,
  `description` text NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `competences` varchar(255) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `spe` varchar(50) NOT NULL,
  `id_free` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id_ann`, `titre`, `id_soci`, `nom_soci`, `date_publi`, `date_debut`, `duree`, `salaire`, `description`, `lieu`, `competences`, `cat`, `spe`, `id_free`) VALUES
(1, 'Site de vente', 1, 'Web Dreams', '2016-10-18', '2016-11-21', '1 mois', 5000, 'Création d\'un site de vente en ligne.', 'Paris', 'Nous recherchons un développeur Symfony expérimenté. ', 'dev', 'php', NULL),
(2, 'Site vitrine', 2, 'B2B Websites', '2016-11-17', '2016-11-24', '1 semaine', 500, 'Création d\'un site vitrine', 'Nice', 'Maîtrise du framework Bootstrap.', 'dev', 'css', NULL),
(3, 'Programme JAVA', 3, 'Software Constructor', '2016-11-25', '2016-12-23', '1 mois', 3000, 'Developpement d\'un programme sous JAVA', 'Paris ', 'Maîtrise de JAVA', 'prog', 'java', NULL),
(4, 'Administrateur CISCO', 4, 'Monster Networks', '2016-11-25', '2016-11-29', '2 mois', 1300, 'Administration réseau', 'Marseille', 'Avoir la certification CISCO systeme', 'reseau', 'cisco', NULL),
(5, 'Site de vente', 5, 'Web2Web', '2016-10-01', '2016-11-21', '6 mois', 15000, 'Création d\'un site de vente en ligne.', 'Lyon', 'Nous recherchons un développeur Laravel expérimenté avec forte maitrise PHP/SQL. ', 'dev', 'php', NULL),
(6, 'Site vitrine', 6, 'B2C Webapps', '2016-11-17', '2016-11-24', '4 semaine', 4500, 'Création d\'un site vitrine pour un de nos clients', 'Bordeaux', 'Maîtrise du framework Bootstrap, des connaissances en base de données seraient un plus.', 'dev', 'css', NULL),
(7, 'Jeu Vidéo en Typescript', 7, 'Gamers-World', '2016-11-25', '2016-12-23', '1 mois', 6000, 'Au sein de notre équipe vous développerait notre tout dernier jeu vidéo ! Nous recherchons des personnes expérimentés soucieux de créer continuellement sur les dernières technologies en matière de graphisme et d\'instruments de construction de scène de jeux !', 'Paris ', 'Maîtrise de Typescript, expérience exigé de 5 ans minimum', 'dev', 'a1', NULL),
(8, 'Administrateur Windows Servers', 8, 'Netelnonik Networks', '2016-11-25', '2016-12-16', '1 semaine', 100001, 'Dans une galaxie lointaine, très lointaine, une entreprise recrute un développeur/programmeur PHP avec de fortes connaissances en SQL !', 'New York', 'php', 'reseau', 'windows', NULL),
(9, 'Site de vente', 9, 'Webomag', '2016-10-18', '2016-11-21', '1 mois', 2000, 'Création d\'un site de vente en ligne.', 'Nantes', 'Nous recherchons un développeur Symfony expérimenté. ', 'dev', 'php', NULL),
(10, 'Airbus Software', 10, 'Airbus', '2016-11-17', '2016-11-24', '5 ans', 45500, 'Airbus makes the freedom of flight possible by designing, manufacturing and supporting the world’s best aircraft. Join our team to developp next generation softwares', 'London', 'Great experience in JAVA is massively recommanded.', 'prog', 'a2', NULL),
(11, 'Gérer Linux Servers', 11, 'LinkNdCo', '2016-11-25', '2016-12-23', '7 mois', 21000, 'Gérer notre nouveau parc informatique Linux Servers', 'Paris ', 'Connaissances en commandes Shell indispensables!', 'reseau', 'a3', NULL),
(12, 'Programmation A.I.', 12, 'A.I.ROBOTS', '2016-11-25', '2026-11-29', '10 ans', 75000, 'Programmation en Python', 'Berlin', 'Nos objectifs sont clairs, être le leader en matière d\'intelligence articificielle dans le monde!', 'prog', 'python', NULL),
(13, 'Ruby developpement', 13, 'Ruby Dreams', '2016-10-18', '2016-11-21', '1 mois', 5000, 'Création d\'un site de vente en ligne avec Ruby.', 'Paris', 'Nous recherchons un développeur Ruby expérimenté. ', 'dev', 'a1', NULL),
(14, 'Programmation en C', 14, 'Inside-Systems', '2016-11-17', '2016-11-24', '1 semaine', 2500, 'Amélioration de nos systèmes embarqués codé en C', 'Nice', 'Maîtrise des technologies des systèmes embarqués', 'prog', 'c', NULL),
(15, 'Site en JavaScript', 15, 'Site Constructor', '2016-11-25', '2016-12-23', '1 mois', 3000, 'Développement d\'un site en JavaScript et PHP pour l\'un de nos clients. Vous aurez en charge la responsabilité" du projet.', 'Paris ', 'Maîtrise de JavaScript', 'dev', 'js', NULL),
(16, 'Administrateur Securité', 16, 'Monster Networks', '2016-11-25', '2016-11-29', '2 mois', 1300, 'Administration réseau et sécurité', 'Marseille', 'Etre au courant des dernières technologies en matière d\'attaque informatique', 'reseau', 'securite', NULL),
(44, 'C++', 17, 'Nasa', '2016-12-21', '2016-12-16', '1 semaine', 10021001, 'Dans une galaxie lointaine, très lointaine, une entreprise recrute un développeur/programmeur PHP avec de fortes connaissances en SQL !', 'New York', 'php', 'prog', 'c++', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mbr_admin`
--

CREATE TABLE `mbr_admin` (
  `id_admin` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mbr_admin`
--

INSERT INTO `mbr_admin` (`id_admin`, `pseudo`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `mbr_free`
--

CREATE TABLE `mbr_free` (
  `id_free` int(11) NOT NULL,
  `siret_free` varchar(18) DEFAULT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `date_inscr` date NOT NULL,
  `test` int(1) DEFAULT NULL,
  `competences` text,
  `site_web` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `langues` varchar(255) DEFAULT NULL,
  `localisation` varchar(50) DEFAULT NULL,
  `cat` varchar(255) DEFAULT NULL,
  `spe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mbr_free`
--

INSERT INTO `mbr_free` (`id_free`, `siret_free`, `nom`, `prenom`, `mail`, `password`, `telephone`, `date_inscr`, `test`, `competences`, `site_web`, `photo`, `tarif`, `langues`, `localisation`, `cat`, `spe`) VALUES
(8, '04 8587 5456 3132', 'graille', 'jonathan', 'jo@jo.jo', '$2y$10$Kzy5LRWAmNj87h616YRdoe37/mP9g0ll5cxOScTEyXq8p9wBs7lKG', '04 94 58 32 01', '2016-12-02', 6, 'Je suis un compte test, le but est de remplir ce champs le plus possible pour tester son affichage... yolo', 'www.test-site.com', '', 2555555, 'français, anglais', 'Marseille', 'programmeur', 'python'),
(9, '0', 'Armani', 'Tom', 'armani.tom@gmail.com', '$2y$10$erzRtkc2lzqFBnsjA4hbZeygwPPxuTN7NPWPUMlT7gHJ2rqM56QbG', '', '2016-12-08', 3, 'Développeur Java\r\nProfessionnel Android', 'www.armani.tom.com', '', 1500, 'anglais, français', 'Paris', 'programmeur', 'java'),
(10, '0', 'Biarmani', 'Tom', 'biarmani@gmail.com', '$2y$10$jlHpPNERJLFdlh6Ljr65gOKZwMTHw17dMInv829tS8ew64Gip2Ulu', '', '2016-12-08', 5, 'Développeur C/C#\r\nProfessionnel systèmes embarqués', 'www.biarmani.tom.com', '', 2000, 'anglais, français', 'Nice', 'programmeur', 'C'),
(11, '0', 'Ciarmani', 'Charles', 'ciarmani.charles@gmail.com', '$2y$10$o2/cnJjw1TTaKlLKt.EB5unlKu5soPiPTjgqgr0gpoLJSb3uFPxsq', '', '2016-12-08', 6, 'Développeur .NET/C#\r\nProfessionnel systèmes réseaux', 'www.ciarmani.charles.com', NULL, 3000, 'anglais, français', 'Marseille', 'programmeur', 'C'),
(12, '0', 'Lucas', 'Thomas', 'lucas.thomas@gmail.com', '$2y$10$erzRtkc2lzqFBnsjA4hbZeygwPPxuTN7NPWPUMlT7gHJ2rqM56QbG', '', '2016-12-08', 3, 'Programmeur Python / I.A.', 'www.lucas-thomas.com', NULL, 1500, 'anglais, Russe', 'Bordeaux', 'programmeur', 'python'),
(13, '0', 'Bhal', 'Nicolas', 'bhal.nicolas@gmail.com', '$2y$10$jlHpPNERJLFdlh6Ljr65gOKZwMTHw17dMInv829tS8ew64Gip2Ulu', '', '2016-12-08', 4, 'Développeur C/C++', 'www.bhal.nicolas.com', NULL, 2000, 'anglais, Espagnol', 'Nice', 'programmeur', 'C'),
(14, '0', 'Lure', 'Lucile', 'lure.lucile@gmail.com', '$2y$10$erzRtkc2lzqFBnsjA4hbZeygwPPxuTN7NPWPUMlT7gHJ2rqM56QbG', '', '2016-12-08', 6, 'Web Designer HTML5/CSS3', 'www.lure.lucile.com', NULL, 1500, 'anglais, Allemand', 'Lyon', 'web', 'html'),
(15, '0', 'Bheon', 'Maxime', 'bheon.maxime@gmail.com', '$2y$10$jlHpPNERJLFdlh6Ljr65gOKZwMTHw17dMInv829tS8ew64Gip2Ulu', '', '2016-12-08', 1, 'Developpeur FS JavaScript', 'www.bheon-max.com', NULL, 2000, 'anglais, Italien', 'Nantes', 'web', 'js'),
(16, '0', 'Salameran', 'Jose', 'salameran.jose@gmail.com', '$2y$10$erzRtkc2lzqFBnsjA4hbZeygwPPxuTN7NPWPUMlT7gHJ2rqM56QbG', '', '2016-12-08', 5, 'Developpeur/Programmeur PHP', 'www.Salameran-jose.com', NULL, 1500, 'anglais, Portugais', 'Marseille', 'web', 'php'),
(17, '0', 'Guerand', 'Sophie', 'sophie.guerand@gmail.com', '$2y$10$jlHpPNERJLFdlh6Ljr65gOKZwMTHw17dMInv829tS8ew64Gip2Ulu', '', '2016-12-08', 2, 'Ingénieur Securité Réseaux', 'www.sécu-huerand.com', NULL, 2000, 'anglais, ukrainien', 'Dijon', 'reseau', 'securite'),
(18, '0', 'Brosni', 'Dimitri', 'milo.dimitri@gmail.com', '$2y$10$erzRtkc2lzqFBnsjA4hbZeygwPPxuTN7NPWPUMlT7gHJ2rqM56QbG', '', '2016-12-08', 5, 'Professionnel CISCO systems', 'www.bro-dimitri.com', NULL, 4500, 'anglais, Russe', 'Moscou', 'reseau', 'cisco'),
(19, '0', 'Bresckov', 'Roslov', 'Bresckov.Roslov@mail.ru', '$2y$10$jlHpPNERJLFdlh6Ljr65gOKZwMTHw17dMInv829tS8ew64Gip2Ulu', '', '2016-12-08', 1, 'Professionnel Windows 2008 Servers', 'www.bres-roslov.com', NULL, 2000, 'anglais, Russe', 'Krasnoïarsk', 'reseau', 'windows'),
(20, '0', 'Ariani', 'Ariane', 'ariani.ariane@gmail.com', '$2y$10$erzRtkc2lzqFBnsjA4hbZeygwPPxuTN7NPWPUMlT7gHJ2rqM56QbG', '', '2016-12-08', 4, 'Développeur Ruby', 'www.armani.tom.com', NULL, 2500, 'anglais, français', 'Paris', 'web', 'a1'),
(21, '0', 'Hermes', 'Tom', 'hermes.tom@gmail.com', '$2y$10$jlHpPNERJLFdlh6Ljr65gOKZwMTHw17dMInv829tS8ew64Gip2Ulu', '', '2016-12-18', 2, 'Professionnel Perl', 'www.hermes.tom.com', NULL, 2000, 'anglais, français', 'Nice', 'programmeur', 'a2'),
(22, '0', 'Teves', 'Charles', 'theves.charles@gmail.com', '$2y$10$o2/cnJjw1TTaKlLKt.EB5unlKu5soPiPTjgqgr0gpoLJSb3uFPxsq', '', '2016-12-08', 6, 'Professionnel Linux Servers', 'www.theves.charles.com', NULL, 3000, 'anglais, français', 'Marseille', 'reseau', 'a3');

-- --------------------------------------------------------

--
-- Structure de la table `mbr_society`
--

CREATE TABLE `mbr_society` (
  `id_soc` int(11) NOT NULL,
  `raison_sociale` varchar(255) NOT NULL,
  `siret` varchar(18) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscr` date NOT NULL,
  `capital` int(11) DEFAULT NULL,
  `site_web` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `siege_social` varchar(255) DEFAULT NULL,
  `recruteur` varchar(255) DEFAULT NULL,
  `caracteristiques` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mbr_society`
--

INSERT INTO `mbr_society` (`id_soc`, `raison_sociale`, `siret`, `mail`, `password`, `date_inscr`, `capital`, `site_web`, `logo`, `siege_social`, `recruteur`, `caracteristiques`) VALUES
(7, 'Gamers-World', '01 2345 6789 0124', 'gamers.worlds@gmail.com', '$2y$10$Ud7B7AAxmwLh72jmJi1FaObHyT1aKBaYMzO6Y3Awb.5N6hOxYPfsm', '2016-12-20', 12000, 'gamers.worlds.com', 'http://vignette3.wikia.nocookie.net/sf-wikia/images/1/1e/Maxis_logo.png/revision/latest?cb=20120809192031.jpg', 'Paris', 'gamers world recruteur', 'Gamers World, société fondée en 1990 est un entreprise leader sur le marché des jeux vidéo grâce à ses créations dépassant à chaque fois toute attentes !'),
(17, 'Nasa', '123456', 'ja@ja.ja', '$2y$10$Ze/8VrL.aUkvKWWF9Pg5CuaihYbTL0H9HmaEDM55qY2hwzh7a4uVG', '2016-12-15', 0, 'lol', 'http://www.dafont.com/forum/attach/orig/5/2/524557.png', 'Floride', 'M.toutlemonde', 'un deux trois soleil');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id_mess` int(11) NOT NULL,
  `id_free` int(11) DEFAULT NULL,
  `id_soci` int(11) DEFAULT NULL,
  `message_free` text,
  `message_soci` text,
  `date_message` date DEFAULT NULL,
  `heure_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messagerie`
--

INSERT INTO `messagerie` (`id_mess`, `id_free`, `id_soci`, `message_free`, `message_soci`, `date_message`, `heure_message`) VALUES
(28, 10, 17, NULL, 'Félicitation ! La société Nasa souhaite entrer en contact avec vous pour un éventuel contrat !', '2016-12-24', '3:6'),
(55, 8, 17, 'Félicitation ! M.GRAILLE souhaite entrer en contact avec vous pour un éventuel contrat ! Celui-ci a postuler à votre offre C++', NULL, '2016-12-25', '23:0'),
(56, 8, 17, 'Bonjour ! Je me présente, M.GRAILLE Jonathan, très heureux de parler avec vous ! Je vais très bien merci ! Je vous contact au sujet de l\'offre pour devenir astronaute, est-elle toujours d\'actualité ?', NULL, '2016-12-25', '23:0'),
(58, 8, 17, NULL, 'Bonjour ! Je suis le recruteur pour la Nasa ! Comment allez-vous ?', '2016-12-25', '23:2'),
(59, 25, NULL, NULL, 'Félicitation ! La société  souhaite entrer en contact avec vous pour un éventuel contrat !', '2017-01-17', '22:35'),
(60, NULL, 17, 'Félicitation ! M. souhaite entrer en contact avec vous pour un éventuel contrat ! Celui-ci a postuler à votre offre php test', NULL, '2017-01-17', '22:36'),
(61, 25, NULL, NULL, 'Félicitation ! La société  souhaite entrer en contact avec vous pour un éventuel contrat !', '2017-01-17', '22:42'),
(62, 25, NULL, NULL, 'Félicitation ! La société  souhaite entrer en contact avec vous pour un éventuel contrat !', '2017-01-17', '22:42'),
(63, 25, NULL, NULL, 'Félicitation ! La société  souhaite entrer en contact avec vous pour un éventuel contrat !', '2017-01-17', '22:42'),
(64, 25, NULL, NULL, 'Félicitation ! La société  souhaite entrer en contact avec vous pour un éventuel contrat !', '2017-01-17', '22:43'),
(65, 8, 17, 'bonjour je suis revenu!', NULL, '2017-01-17', '22:47'),
(66, 8, 17, 'Avez vous des nouvelles de notre engagement ?', NULL, '2017-02-08', '12:27');

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

CREATE TABLE `qcm` (
  `id_question` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `1` varchar(255) NOT NULL,
  `2` varchar(255) NOT NULL,
  `3` varchar(255) NOT NULL,
  `4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `qcm`
--

INSERT INTO `qcm` (`id_question`, `question`, `1`, `2`, `3`, `4`) VALUES
(1, 'Java et JavaScript sont-ils deux mêmes langages informatiques ?', 'Non, le Java est un langage orienté objet et compilé alors que le JavaScript est un langage de script orienté objet et procédural.', 'Oui, JavaScript est une extension de Java.', 'Non, le JavaScript est un langage orienté objet et compilé alors que le Java est un langage de script et procédural.', 'Oui, ce sont des langages orientés objet et compilés.'),
(2, 'Quelle est la différence entre un bit et un byte ?', '8 bits = 1 octect, 1 byte = 1 octect.', 'Aucune.', '8 bits = 8 octect, 1 byte = 8 octect.', '1 bits = 1 octect, 1 byte = 1 octect.'),
(3, 'Qu\'est-ce qu\'un switch ?', 'Un switch désigne un commutateur réseau, équipement ou appareil qui permet l\'interconnexion d\'appareils communicants, terminaux, ordinateurs, serveurs...', 'C\'est un ordinateur très puissant qui a été inventé par les Soviétiques dans les années 1980.', 'C\'est un appareil qui permet de scanner les codes-barres et de retransmettre les informations sur ordinateur.', 'C\'est un appareil qui permet de changer le sens de circulation du courant dans les cartes-mères.'),
(4, 'Quelle est la fonction qui permet d\'afficher un message à l\'écran en Python ?', '"print".', '"printf".', '"scanf".', '"alert".'),
(5, 'Quelle est la différence entre la base 10 et le système décimal ?', 'Aucune.', 'En base de 10 on compte de 10 en 10 alors qu\'en décimal on compte 1 en 1 (ex: 10, 20, 30.. 1, 2 ,3 ..).', 'La base de 10 est un langage orienté objet alors que le système décimal est un langage procédural.', 'En base de 10 on compte de 1 en 1 de même pour le système décimal (ex: 1, 2 ,3 ..).'),
(6, 'Qu\'est-ce que le "Spanning Tree Protocol" ?', 'Le Spanning Tree Protocol est un protocole réseau de niveau 2 permettant de déterminer une topologie réseau sans boucle (appelée arbre) dans les LAN avec ponts.', 'Le Spanning Tree Protocol est un protocole réseau de niveau 3 permettant la connexion et déconnexion automatique de chaque ordinateur entrant et sortant sur un réseau local.', 'Le Spanning Tree Protocol est un protocole réseau en arbre qui détermine les privilèges de chaque branche d\'un réseau.', 'Le Spanning Tree Protocol est un système d\'exploitation Linux qui permet le débogage rapide de logiciels.'),
(7, 'Qu\'est-ce qu\'une adresse MAC ?', 'Une adresse MAC (Media Access Control), est un identifiant physique stocké dans une carte réseau ou une interface réseau similaire. Elle est réputé unique au monde.', 'Une adresse MAC (Mega Adress Card), ou IP, est associé à chaque carte réseau et logiciel de routage.', 'Une adresse MAC est une adresse de messagerie avec laquelle on peut contacter les administrateurs de forum.', 'L\'adresse MAC est une adresse à laquelle on peut accéder à tout les fichiers stockés sur un réseau.'),
(8, 'En quelle année le langage C a-t-il était inventé ?', '1972', '1965', '1975', '1980'),
(9, 'À partir de quelle version la notion de PHP Data Objects a-t-elle été instauré ?', '5.0', '6.0', '5.5', '7.0'),
(10, 'Quel est le principe de git ?', 'git est un logiciel de gestion de versions décentralisé. C\'est un logiciel libre.', 'C\'est un logiciel de retouche d\'image et photo, comme Gimp par exemple.', 'C\'est un logiciel de capture d\'écran ainsi que de capture vidéo compatible sur tout les systèmes d\'exploitation.', 'git est un mini système d\'exploitation qu\'on peut intégrer à un Raspberry Pi 3.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_ann`),
  ADD KEY `id_free` (`id_free`);

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
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id_mess`);

--
-- Index pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_ann` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `mbr_admin`
--
ALTER TABLE `mbr_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `mbr_free`
--
ALTER TABLE `mbr_free`
  MODIFY `id_free` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `mbr_society`
--
ALTER TABLE `mbr_society`
  MODIFY `id_soc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
