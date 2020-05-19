-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 mai 2020 à 23:36
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cv_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

CREATE TABLE `cursus` (
  `id_cursus` int(3) NOT NULL,
  `id_person` int(3) DEFAULT 1,
  `title` varchar(50) NOT NULL,
  `establishment_name` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `about_text` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cursus`
--

INSERT INTO `cursus` (`id_cursus`, `id_person`, `title`, `establishment_name`, `start_date`, `end_date`, `about_text`) VALUES
(1, 1, 'Bachelor informatique et systèmes d\'informations', 'Paris Ynov Campus', '2019-09-18', NULL, 'Actuellement en première année.'),
(2, 1, 'Prépa Game Design & Programming', 'ISART Digital', '2017-10-02', '2018-05-04', NULL),
(3, 1, 'Bac S - SVT', 'Lyc&eacute;e Levavasseur', '2014-08-16', '2017-07-06', '');

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(3) NOT NULL,
  `id_person` int(3) DEFAULT 1,
  `title` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `about_text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_experience`, `id_person`, `title`, `start_date`, `end_date`, `company_name`, `about_text`) VALUES
(1, 1, 'Développeur', '2019-11-12', '2020-04-14', 'Ynov Paris Labo Games', 'Lumoa, boss rush avec des mécaniques de jeux de rythme. Inspiré de l\'univers Nordique, des jeux Titan Souls, Furi, Crypt of the Necrodancer. En collaboration avec 7 autres personnes du labo.'),
(12, NULL, 'Test', '2020-05-11', '2020-05-18', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

CREATE TABLE `person` (
  `id_person` int(3) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about_text` varchar(150) NOT NULL,
  `picture_path` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `person`
--

INSERT INTO `person` (`id_person`, `firstname`, `lastname`, `address`, `telephone`, `email`, `about_text`, `picture_path`) VALUES
(1, 'Florian', 'Poinsot', '104T Boulevard Voltaire, Paris, 75011', '0692418002', 'florian.poinsot@ynov.com', 'Grand pr&ecirc;tre Pastafarien.', 'img/profile.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`id_cursus`),
  ADD KEY `id_person` (`id_person`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `id_person` (`id_person`);

--
-- Index pour la table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cursus`
--
ALTER TABLE `cursus`
  MODIFY `id_cursus` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD CONSTRAINT `cursus_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
