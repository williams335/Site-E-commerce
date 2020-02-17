-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 08:01 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(150) NOT NULL,
  `mail` text NOT NULL,
  `motdepasse` text NOT NULL,
  `confirme` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `pseudo`, `mail`, `motdepasse`, `confirme`) VALUES
(1, 'admin', 'doodzerjoop@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0),
(2, 'Jean', 'companyconnection6@gmail.com', '2d2a5ef9df00484e80eeaf007238ffd6798a3ca7', 0),
(5, 'Joop', 'doodzerj@gmail.com', '012ebfdf4d4a05864e00cc2bd4de1c75cc393497', 0),
(6, 'Joop335', 'joop@gmail.com', '012ebfdf4d4a05864e00cc2bd4de1c75cc393497', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jeux`
--

CREATE TABLE IF NOT EXISTS `jeux` (
  `Nom` text NOT NULL,
  `Ages` int(11) NOT NULL,
  `TypeJeux` varchar(1000) NOT NULL,
  `Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jeux`
--

INSERT INTO `jeux` (`Nom`, `Ages`, `TypeJeux`, `Description`) VALUES
('barbie', 5, 'poupée', 'poupée pour enfants'),
('avengers', 7, 'bonhomme', 'bonhomme pour enfants'),
('avengers1', 7, 'bonhomme', 'bonhomme pour enfants'),
('avengers2', 7, 'bonhomme', 'bonhomme pour enfants');

-- --------------------------------------------------------

--
-- Table structure for table `jeuxludothèque`
--

CREATE TABLE IF NOT EXISTS `jeuxludothèque` (
  `Nom` text NOT NULL,
  `NbJeux` int(11) NOT NULL,
  `NbJeuxDispos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jeuxludothèque`
--

INSERT INTO `jeuxludothèque` (`Nom`, `NbJeux`, `NbJeuxDispos`) VALUES
('barbie', 20, 20),
('avengers', 20, 20),
('avengers1', 10, 10),
('avengers2', 15, 15),
('barbie1', 20, 20),
('barbie1', 20, 20),
('barbie', 20, 20),
('avengers', 10, 10),
('avengers1', 15, 15),
('avengers2', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prêts`
--

CREATE TABLE IF NOT EXISTS `prêts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `Nom` text NOT NULL,
  `Date_t` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `prêts`
--

INSERT INTO `prêts` (`id`, `pseudo`, `Nom`, `Date_t`) VALUES
(2, 'Jean', 'barbie', '2018-08-30'),
(3, 'Joop', 'barbie', '2018-08-30'),
(4, 'Joop335', 'barbie', '2018-08-30'),
(5, 'Joop335', 'avengers1', '2018-08-30'),
(6, 'Joop335', 'avengers', '2018-08-30'),
(7, 'Joop335', 'avengers2', '2018-08-30'),
(8, 'Joop', 'barbie', '2018-08-30'),
(9, 'Joop', 'barbie', '2018-08-30'),
(10, 'Joop', 'barbie', '2018-08-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
