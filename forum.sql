-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 27, 2020 at 06:17 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `conversation` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `statut` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `pseudo`, `password`, `email`, `id_droits`, `avatar`, `statut`, `date`) VALUES
(1, 'wowow', 'WOW', 'pass', 'wow@gmail.com', 1, 'upload/SylvanasBfA.png', '0', '2020-06-24 13:30:04'),
(2, 'wow1', 'wowow', 'password', 'wow1@gmail.com', 1, 'upload/profilpic2.jpg', '0', '2020-06-24 13:30:04'),
(3, 'admin', 'admin', 'password', 'admin@gmail.com', 3, 'upload/profiledefault.jpg', '3', '2020-06-24 13:30:04'),
(4, 'pseudo', 'pseudo', 'pseudo', '', 1, 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '0', '2020-06-25 13:00:00'),
(5, 'hello', 'hello', 'hello', 'hello@gmail.com', 1, 'https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg', '0', '2020-06-25 14:21:20');

--

