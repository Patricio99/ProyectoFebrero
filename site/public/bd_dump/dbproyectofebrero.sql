-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2018 at 11:22 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amigos`
--

INSERT INTO `amigos` (`id`, `iduser`, `idfriend`) VALUES
(21, '5a86e6a354d3a', '5a86e6b0c485e');

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recursos`
--

INSERT INTO `recursos` (`id`, `nombre`, `userid`, `recursoid`) VALUES
(22, 'Computadora', '5a86e6a354d3a', '5a86e6e0754fd'),
(23, 'Celular', '5a86e6a354d3a', '5a86e6f163423');

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRec` varchar(50) NOT NULL,
  `idsolicitante` varchar(50) NOT NULL,
  `idrecurso` varchar(50) NOT NULL,
  `idsolicitado` varchar(50) NOT NULL,
  `fInicio` varchar(20) NOT NULL,
  `fFin` varchar(20) NOT NULL,
  `hInicio` varchar(20) NOT NULL,
  `hFin` varchar(20) NOT NULL,
  `respuesta` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `nombreRec`, `idsolicitante`, `idrecurso`, `idsolicitado`, `fInicio`, `fFin`, `hInicio`, `hFin`, `respuesta`) VALUES
(13, 'Celular', '5a86e6b0c485e', '5a86e6f163423', '5a86e6a354d3a', '2018-02-19', '2018-02-19', '00:30', '03:50', 'Denegado'),
(12, 'Computadora', '5a86e6b0c485e', '5a86e6e0754fd', '5a86e6a354d3a', '2018-02-17', '2018-02-17', '11:30', '12:30', 'Permitido');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `mail`, `contrasena`, `unid`) VALUES
(23, 'papa', 'papa', 'papa@papa.com', 'papa', '5a86e6a354d3a'),
(24, 'hijo', 'hijo', 'hijo@hijo.com', 'hijo', '5a86e6b0c485e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
