-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 07, 2021 at 09:23 AM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Erregistroa`
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
-- Dumping data for table `Erregistroa`
--

INSERT INTO `Erregistroa` (`IzenAbizen`, `nan`, `telefonoa`, `JaiotzeData`, `email`, `pasahitza`) VALUES
('asierrosa', '888888-X', 675675222, '2000-03-03', 'arosa003@ikasle.ehu.eus', 'asier123');

-- --------------------------------------------------------

--
-- Table structure for table `liburuak`
--

CREATE TABLE `liburuak` (
  `isbn` int(11) DEFAULT NULL,
  `izena` varchar(45) DEFAULT NULL,
  `editoriala` varchar(45) DEFAULT NULL,
  `salmentak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liburuak`
--

INSERT INTO `liburuak` (`isbn`, `izena`, `editoriala`, `salmentak`) VALUES
(12, 'Asier', 'alaya', 11),
(1890, '1984', 'Libros de bolsillo', 110000),
(98988, 'Icaria', 'Editorial premios planeta', 33333),
(98977, 'Bolsas de viaje ', 'Julio Verne', 89898),
(99999, 'El gato Negro', 'Poe obras clasicas', 11111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Erregistroa`
--
ALTER TABLE `Erregistroa`
  ADD PRIMARY KEY (`nan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
