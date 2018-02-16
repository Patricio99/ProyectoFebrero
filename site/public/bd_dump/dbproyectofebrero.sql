-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2018 at 04:22 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbproyectofebrero`
--

-- --------------------------------------------------------

--
-- Table structure for table `amigos`
--

DROP TABLE IF EXISTS `amigos`;
CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(50) NOT NULL,
  `idfriend` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amigos`
--

INSERT INTO `amigos` (`id`, `iduser`, `idfriend`) VALUES
(9, '5a7a0d761a21a', 'admin1'),
(8, '5a7a0d761a21a', 'admin'),
(15, 'admin1', 'admin'),
(16, 'admin1', 'caca'),
(17, '5a838ed1f23e8', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `recursos`
--

DROP TABLE IF EXISTS `recursos`;
CREATE TABLE IF NOT EXISTS `recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `recursoid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recursos`
--

INSERT INTO `recursos` (`id`, `nombre`, `userid`, `recursoid`) VALUES
(18, 'Auto', '5a7a0d761a21a', '5a84910ebaa16');

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsolicitante` varchar(50) NOT NULL,
  `idrecurso` varchar(50) NOT NULL,
  `idsolicitado` varchar(50) NOT NULL,
  `fInicio` varchar(20) NOT NULL,
  `fFin` varchar(20) NOT NULL,
  `hInicio` varchar(20) NOT NULL,
  `hFin` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `idsolicitante`, `idrecurso`, `idsolicitado`, `fInicio`, `fFin`, `hInicio`, `hFin`) VALUES
(1, 'admin', '5a84910ebaa16', 'admin1', '25/02/2017', '25/02/2017', '16:30', '12:30');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `mail`, `contrasena`, `unid`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', 'admin'),
(3, 'Osvaldo', 'Naveira', 'osvaldonaveira@gmail.com', 'admin', '5a7a0d761a21a'),
(19, 'admin1', 'admin1', 'admin1@admin1.com', 'admin1', 'admin1'),
(20, 'caca', 'caca', 'caca@caca.com', 'caca', 'caca'),
(21, 'Federico', 'Naveira', 'federiconaveira@gmail.com', 'admin', '5a838ed1f23e8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
