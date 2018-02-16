-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2018 a las 14:45:57
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbproyectofebrero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

DROP TABLE IF EXISTS `amigos`;
CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(50) NOT NULL,
  `idfriend` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id`, `iduser`, `idfriend`) VALUES
(21, '5a86e6a354d3a', '5a86e6b0c485e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

DROP TABLE IF EXISTS `recursos`;
CREATE TABLE IF NOT EXISTS `recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `recursoid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `nombre`, `userid`, `recursoid`) VALUES
(22, 'Computadora', '5a86e6a354d3a', '5a86e6e0754fd'),
(23, 'Celular', '5a86e6a354d3a', '5a86e6f163423'),
(24, 'Play', '5a86e6b0c485e', '5a86e6fdbfb6f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
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
  `respuesta` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `idsolicitante`, `idrecurso`, `idsolicitado`, `fInicio`, `fFin`, `hInicio`, `hFin`, `respuesta`) VALUES
(9, '5a86e6b0c485e', '', '', '2018-02-17', '2018-02-17', '12:30', '14:30', ''),
(10, '5a86e6b0c485e', '', '', '2018-02-17', '2018-02-17', '01:25', '02:26', ''),
(11, '5a86e6b0c485e', '', '', '2018-02-17', '2018-02-17', '02:30', '02:45', ''),
(12, '5a86e6b0c485e', '5a86e6e0754fd', '5a86e6a354d3a', '2018-02-17', '2018-02-17', '11:30', '12:30', 'Permitido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `mail`, `contrasena`, `unid`) VALUES
(23, 'papa', 'papa', 'papa@papa.com', 'papa', '5a86e6a354d3a'),
(24, 'hijo', 'hijo', 'hijo@hijo.com', 'hijo', '5a86e6b0c485e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
