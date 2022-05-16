-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-05-2022 a las 05:03:04
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `salas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_sala`
--

DROP TABLE IF EXISTS `reserva_sala`;
CREATE TABLE IF NOT EXISTS `reserva_sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sala_id` int(11) NOT NULL,
  `persona_reserva` varchar(80) NOT NULL,
  `marcacion_calendario` text NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_hasta` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sala` varchar(80) DEFAULT NULL,
  `ubicacion` varchar(150) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado_sala` int(11) NOT NULL DEFAULT '0',
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `nombre_sala`, `ubicacion`, `descripcion`, `estado_sala`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Salón Azul', 'Arriba', 'Salón para personas mayores de 18 años', 1, '2022-05-15 23:57:46', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
