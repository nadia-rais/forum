-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 02, 2020 at 07:10 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

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
(13, 'CHEVALIER', 3, 16, '2020-07-02 07:46:52'),
(14, 'hello conversation', 3, 19, '2020-07-02 07:56:06'),
(15, 'hello super topic', 3, 19, '2020-07-02 07:56:15'),
(16, 'hello', 11, 22, '2020-07-02 11:45:43');

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
(175, 3, 95, -1),
(180, 13, 94, 1),
(184, 13, 95, -1),
(189, 13, 102, 1),
(190, 13, 101, 1),
(192, 11, 101, -1),
(194, 11, 102, 1);

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
(98, 'bonne journée', '2020-07-02 08:20:20', 14, 14),
(99, 'super', '2020-07-02 11:45:48', 11, 16),
(100, 'super', '2020-07-02 11:45:52', 11, 16),
(101, 'hello super topic', '2020-07-02 11:46:37', 11, 14),
(102, 'hello conversation', '2020-07-02 11:46:45', 11, 14);

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
-- Table structure for table `signalement_conv`
--

CREATE TABLE `signalement_conv` (
  `id` int(11) NOT NULL,
  `signalement` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_conv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `signalement_message`
--

CREATE TABLE `signalement_message` (
  `id` int(11) NOT NULL,
  `signalement` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signalement_message`
--

INSERT INTO `signalement_message` (`id`, `signalement`, `id_utilisateur`, `id_message`) VALUES
(1, 'bof', 11, 99),
(2, 'chelou cette discussion', 11, 102),
(3, 'chelou cette discussion', 11, 102);

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
(11, 'jaja', 'juju', 'password', 'juju@gmail.com', 'upload/136982.jpg', '2020-06-28 12:55:08', 2),
(12, 'welcome', 'welcome', 'password', 'welcome@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '2020-06-29 11:50:56', 1),
(13, 'new', 'nono', 'password', 'test@gmail.com', 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '2020-06-29 15:24:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id_conversation`);

--
-- Indexes for table `liker`
--
ALTER TABLE `liker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signalement_conv`
--
ALTER TABLE `signalement_conv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signalement_message`
--
ALTER TABLE `signalement_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signaler`
--
ALTER TABLE `signaler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id_conversation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `liker`
--
ALTER TABLE `liker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signalement_conv`
--
ALTER TABLE `signalement_conv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signalement_message`
--
ALTER TABLE `signalement_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `signaler`
--
ALTER TABLE `signaler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
