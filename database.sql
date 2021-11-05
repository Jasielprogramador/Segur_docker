-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 05-11-2021 a las 13:44:37
-- Versión del servidor: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Erregistroa`
--

CREATE TABLE `Erregistroa` (
  `IzenAbizen` varchar(45) DEFAULT NULL,
  `nan` varchar(45) NOT NULL,
  `telefonoa` int(11) DEFAULT NULL,
  `JaiotzeData` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pasahitza` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Erregistroa`
--

INSERT INTO `Erregistroa` (`IzenAbizen`, `nan`, `telefonoa`, `JaiotzeData`, `email`, `pasahitza`) VALUES
('asierrosa', '888888-X', 675675222, '2000-03-03', 'arosa003@ikasle.ehu.eus', 'asier123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liburuak`
--

CREATE TABLE `liburuak` (
  `isbn` int(11) DEFAULT NULL,
  `izena` varchar(45) DEFAULT NULL,
  `editoriala` varchar(45) DEFAULT NULL,
  `salmentak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `liburuak`
--

INSERT INTO `liburuak` (`isbn`, `izena`, `editoriala`, `salmentak`) VALUES
(12, 'Asier', 'alaya', 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Erregistroa`
--
ALTER TABLE `Erregistroa`
  ADD PRIMARY KEY (`nan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
