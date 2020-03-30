-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 déc. 2019 à 08:43
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `snack`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) DEFAULT NULL,
  `mdp` varchar(100) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Classe` varchar(50) DEFAULT NULL,
  `Nom` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `identifiant`, `mdp`, `mail`, `Prenom`, `Classe`, `Nom`, `role`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'nakhila@orange.fr', 'Amine', 'BTS SIO SLAM 1', 'NAKHIL', 'etudiant'),
(2, 'cuistot', 'ab912bd91463ea54c5fd9971639e8b6ba4afff1f', 'a.nakhil@lprs.fr', 'Moussa', NULL, 'Traoré', 'ADMIN'),
(3, 'antoine01', '07f6080363f9213b9082942e3afb62e7d625293b', 'a.vasone@lprs.fr', 'Antoine', 'BTS SLAM 1', 'Vasone', 'ADMIN'),
(4, 'loic123', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'loicguo@gmail.com', 'loic', 'BTS SIO SLAM 1', 'guo', 'etudiant'),
(5, 'serva', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'qlignani@gmail.com', 'serva', 'BTS SIO SLAM 1', 'serva', 'etudiant'),
(6, 't', '8efd86fb78a56a5145ed7739dcb00c78581c5375', 't@t.fr', 't', '1bts', 't', 'etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
CREATE TABLE IF NOT EXISTS `inscrit` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `choix` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscrit`
--

INSERT INTO `inscrit` (`id`, `nom`, `prenom`, `choix`) VALUES
(1, 't', 't', '0'),
(2, 'NAKHIL', 'Amine', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
