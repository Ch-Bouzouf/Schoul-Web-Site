-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2020 at 01:57 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `pseudo` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`pseudo`, `mdp`) VALUES
('bouzouf99', 'insea123');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` date NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `fichier` varchar(200) NOT NULL,
  `etude` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  `vkey` varchar(100) NOT NULL,
  `cin` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `age`, `tel`, `email`, `filiere`, `fichier`, `etude`, `url`, `img`, `vkey`, `cin`) VALUES
(105, 'Bouzouf', 'Chaymae', '2020-07-24', '0682481779', 'chaymaebouzouf99@gmail.com', 'DSE', '56-curriculum-vitae-etudiant.docx', 'Femme', 'HAY IRIS ,Rue RAHMA,OUJDA', 'WhatsApp Image 2020-06-20 at 16.21.28.jpeg', 'qwertz123', 'F649349');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
