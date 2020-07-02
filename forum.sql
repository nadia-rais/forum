-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 02, 2020 at 08:49 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id_conversation` int(11) NOT NULL,
  `msg_conv` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `date_conversation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id_conversation`, `msg_conv`, `id_utilisateur`, `id_topic`, `date_conversation`) VALUES
(12, 'wowowowowowowowow', 3, 16, '2020-07-02 07:46:31'),
(13, 'CHEVALIER', 3, 16, '2020-07-02 07:46:52'),
(14, 'hello conversation', 3, 19, '2020-07-02 07:56:06'),
(15, 'hello super topic', 3, 19, '2020-07-02 07:56:15');

-- --------------------------------------------------------


--
-- Table structure for table `liker`
--

CREATE TABLE `liker` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `reaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liker`
--

INSERT INTO `liker` (`id`, `id_utilisateur`, `id_message`, `reaction`) VALUES
(42, 1, 48, 1),
(43, 11, 49, 1),
(44, 2, 49, 1),
(46, 2, 48, -1),
(61, 5, 48, -1),
(77, 4, 49, -1),
(81, 4, 48, -1),
(133, 14, 49, 1),
(163, 14, 69, 1),
(166, 14, 48, 1),
(167, 14, 52, 1),
(168, 14, 51, -1),
(171, 14, 91, 1),
(172, 3, 96, 1),
(175, 3, 95, -1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `message` varchar(140) NOT NULL,
  `date_msg` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `message`, `date_msg`, `id_utilisateur`, `id_conversation`) VALUES
(48, 'hello super topic', '2020-06-30 10:56:02', 4, 1),
(49, 'génial ce nouveau personnage', '2020-06-30 10:57:24', 1, 1),
(50, 'super ce thread', '2020-06-30 11:00:41', 11, 1),
(51, 'mega cool le topic', '2020-07-01 12:47:26', 5, 1),
(52, 'super cool de discuter avec vous', '2020-07-01 21:58:57', 14, 1),
(69, 'top top top', '2020-07-01 22:45:05', 14, 1),
(91, 'galeria', '2020-07-01 23:21:37', 14, 1),
(92, 'hello conversation', '2020-07-02 07:55:14', 3, 13),
(93, 'super topic', '2020-07-02 07:55:22', 3, 13),
(94, 'test topic', '2020-07-02 07:56:26', 3, 15),
(95, 'super chouette', '2020-07-02 07:56:33', 3, 15),
(96, 'mega cool le topic', '2020-07-02 07:56:41', 3, 15),
(97, 'cool super cool', '2020-07-02 07:57:04', 3, 15),
(98, 'bonne journée', '2020-07-02 08:20:20', 14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'wow@gmail.com'),
(3, 'wow1@gmail.com'),
(4, 'wow2@gmail.com'),
(7, 'wow3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `signaler`
--

CREATE TABLE `signaler` (
  `id` int(11) NOT NULL,
  `signalement` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signaler`
--

INSERT INTO `signaler` (`id`, `signalement`, `id_utilisateur`, `id_message`) VALUES
(1, '1', 5, 1),
(2, 'propos nazes', 3, 4);

-- --------------------------------------------------------
--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `topic_name` varchar(50) NOT NULL,
  `date_topic` datetime NOT NULL,
  `droits_topic` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_topic`, `topic_name`, `date_topic`, `droits_topic`, `id_utilisateur`) VALUES
(19, 'HELLO', '2020-07-02 07:55:57', 1, 3),
(21, 'WOWOW PERSONNAGES', '2020-07-02 08:10:59', 1, 3),
(22, 'WOWOW MAJ', '2020-07-02 08:11:16', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pseudo` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `date` datetime NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `pseudo`, `password`, `email`, `avatar`, `date`, `id_droits`) VALUES
(1, 'wowow', 'WOW', 'pass', 'wow@gmail.com', 'upload/SylvanasBfA.png', '2020-06-24 13:30:04', 1),
(2, 'wow1', 'wowow', 'password', 'wow1@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpgs', '2020-06-24 13:30:04', 1),
(3, 'admin', 'admin', 'password', 'admin@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '2020-06-24 13:30:04', 3),
(4, 'pseudo', 'pseudo', 'pseudo', 'pseudo@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '2020-06-25 13:00:00', 1),
(5, 'hello', 'hello', 'hello', 'hello@gmail.com', 'https://worldofwarcraft.judgehype.com/screenshots/news2015/532.jpg', '2020-06-25 14:21:20', 1),
(7, 'moderateur', 'modo', 'password', 'moderateur@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '2020-06-25 12:30:12', 2),
(8, 'moderateur2', 'modo2', 'password', 'moderateur2@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '2020-06-26 15:30:12', 2),
(11, 'juju', 'juju', 'password', 'juju@gmail.com', 'upload/136982.jpg', '2020-06-28 12:55:08', 2),
(12, 'welcome', 'welcome', 'password', 'welcome@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '2020-06-29 11:50:56', 1),
(13, 'jojo', 'test', 'password', 'test@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '2020-06-29 15:24:13', 1),
(14, 'jojo', 'momo', 'password', 'mo@gmail.com', 'data:image/jpeg;base64,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', '2020-07-01 21:28:56', 1);

