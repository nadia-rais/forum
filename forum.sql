-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 30 juin 2020 à 13:01
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `id_conversation` int(11) NOT NULL AUTO_INCREMENT,
  `msg_conv` varchar(255) NOT NULL,
  `date_conversation` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  PRIMARY KEY (`id_conversation`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id_conversation`, `msg_conv`, `date_conversation`, `id_utilisateur`, `id_topic`) VALUES
(1, 'Apply Aeyo', '0000-00-00 00:00:00', 1, 1),
(2, 'Apply Greg', '0000-00-00 00:00:00', 1, 1),
(3, 'Je test si ça marche', '0000-00-00 00:00:00', 1, 2),
(4, 'test 2', '2020-06-29 12:38:23', 1, 2),
(5, 'C 1 test', '2020-06-29 13:02:42', 2, 21),
(6, 'Le blabla', '2020-06-29 15:08:42', 2, 22),
(12, 'htrh', '2020-06-30 13:53:11', 3, 24),
(13, 'gregaga', '2020-06-30 13:58:32', 3, 24);

-- --------------------------------------------------------

--
-- Structure de la table `liker`
--

DROP TABLE IF EXISTS `liker`;
CREATE TABLE IF NOT EXISTS `liker` (
  `id` int(11) NOT NULL,
  `reaction` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `date_msg` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `message`, `date_msg`, `id_utilisateur`, `id_conversation`) VALUES
(1, 'Problème', '2020-06-29 12:46:09', 1, 3),
(2, 'Test', '2020-06-29 13:03:05', 2, 5),
(3, 'Yo', '2020-06-29 15:08:53', 2, 6),
(4, 'Ca blablate ou quoi ?', '2020-06-29 15:08:58', 2, 6),
(5, 'greg', '2020-06-30 13:42:34', 3, 10),
(6, 'Quel est ton ID', '2020-06-30 14:43:06', 3, 13),
(7, 'Test Signalement', '2020-06-30 14:53:00', 3, 13);

-- --------------------------------------------------------

--
-- Structure de la table `signalement_conv`
--

DROP TABLE IF EXISTS `signalement_conv`;
CREATE TABLE IF NOT EXISTS `signalement_conv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signalement` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_conv` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signalement_conv`
--

INSERT INTO `signalement_conv` (`id`, `signalement`, `id_utilisateur`, `id_conv`) VALUES
(1, 'Test_1', 3, 13),
(2, 'Test_2', 3, 12);

-- --------------------------------------------------------

--
-- Structure de la table `signalement_message`
--

DROP TABLE IF EXISTS `signalement_message`;
CREATE TABLE IF NOT EXISTS `signalement_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signalement` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `signalement_message`
--

INSERT INTO `signalement_message` (`id`, `signalement`, `id_utilisateur`, `id_message`) VALUES
(1, 'Test_1 mes', 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL,
  `date_topic` datetime NOT NULL,
  `droits_topic` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id_topic`, `topic_name`, `date_topic`, `droits_topic`, `id_utilisateur`) VALUES
(2, 'recrutement', '0000-00-00 00:00:00', 0, 1),
(3, 'apply', '0000-00-00 00:00:00', 0, 1),
(4, 'test', '0000-00-00 00:00:00', 0, 1),
(5, 'test2', '0000-00-00 00:00:00', 0, 1),
(6, 'test3', '0000-00-00 00:00:00', 0, 1),
(20, 'TEST75', '2020-06-29 12:19:15', 0, 1),
(21, 'On test tout ça', '2020-06-29 13:02:12', 0, 2),
(22, 'Blablabla', '2020-06-29 14:57:07', 1, 1),
(23, 'test 400', '2020-06-29 14:57:27', 2, 1),
(24, 'test 400', '2020-06-29 14:58:39', 2, 1),
(25, 'Private', '2020-06-29 15:03:14', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `pseudo` varchar(80) NOT NULL,
  `date` datetime NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `avatar`, `pseudo`, `date`, `id_droits`) VALUES
(1, 'admin', 'admin', 'admin@hotmail.fr', 'test', '', '0000-00-00 00:00:00', 3),
(2, 'test', 'test', 'rodolphemoriana@hotmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', 'aeyo', '2020-06-29 12:54:09', 1),
(3, 'greg', '123', 'gregpsn365@hotmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', 'Greg', '2020-06-30 13:40:12', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
