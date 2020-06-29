-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 juin 2020 à 15:10
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id_conversation` int(11) NOT NULL,
  `msg_conv` varchar(255) NOT NULL,
  `date_conversation` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id_conversation`, `msg_conv`, `date_conversation`, `id_utilisateur`, `id_topic`) VALUES
(1, 'Apply Aeyo', '0000-00-00 00:00:00', 1, 1),
(2, 'Apply Greg', '0000-00-00 00:00:00', 1, 1),
(3, 'Je test si ça marche', '0000-00-00 00:00:00', 1, 2),
(4, 'test 2', '2020-06-29 12:38:23', 1, 2),
(5, 'C 1 test', '2020-06-29 13:02:42', 2, 21),
(6, 'Le blabla', '2020-06-29 15:08:42', 2, 22);

-- --------------------------------------------------------

--
-- Structure de la table `liker`
--

CREATE TABLE `liker` (
  `id` int(11) NOT NULL,
  `reaction` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_msg` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `message`, `date_msg`, `id_utilisateur`, `id_conversation`) VALUES
(1, 'Problème', '2020-06-29 12:46:09', 1, 3),
(2, 'Test', '2020-06-29 13:03:05', 2, 5),
(3, 'Yo', '2020-06-29 15:08:53', 2, 6),
(4, 'Ca blablate ou quoi ?', '2020-06-29 15:08:58', 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `signaler`
--

CREATE TABLE `signaler` (
  `id` int(11) NOT NULL,
  `signalement` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `date_topic` datetime NOT NULL,
  `droits_topic` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `pseudo` varchar(80) NOT NULL,
  `date` datetime NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `avatar`, `pseudo`, `date`, `id_droits`) VALUES
(1, 'admin', 'admin', 'admin@hotmail.fr', 'test', '', '0000-00-00 00:00:00', 3),
(2, 'test', 'test', 'rodolphemoriana@hotmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', 'aeyo', '2020-06-29 12:54:09', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id_conversation`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `signaler`
--
ALTER TABLE `signaler`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id_conversation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `signaler`
--
ALTER TABLE `signaler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
