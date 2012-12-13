-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-09-2011 a las 12:00:31
-- Versión del servidor: 5.1.53
-- Versión de PHP: 5.3.4

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `estudiante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

DROP TABLE IF EXISTS `datospersonales`;
CREATE TABLE IF NOT EXISTS `datospersonales` (
  `CEDULA` varchar(15) NOT NULL,
  `NOMBRES` varchar(30) NOT NULL,
  `APELLIDOS` varchar(30) NOT NULL,
  `FECHA_NAC` date NOT NULL,
  `TEL` varchar(20) NOT NULL,
  `DIR` varchar(100) NOT NULL,
  PRIMARY KEY (`CEDULA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`CEDULA`, `NOMBRES`, `APELLIDOS`, `FECHA_NAC`, `TEL`, `DIR`) VALUES
('65858', 'NELSON ANDRES', 'WANDURRAGA', '1990-03-23', '68768768', 'CLL 70 No 67 URB. LA PANELAS'),
('6786875', 'PEPITO', 'PEREZ', '2011-08-04', '798698', 'CRA 24 No 6 - 50 5 DE NOVIEMBRE'),
('789689687', 'JOSE ALBERTO', 'SUAREZ PEREZ', '2011-09-09', '857546', 'LOS MANGUITOS');
SET FOREIGN_KEY_CHECKS=1;
