-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 08:25 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`) VALUES
(13, 'Bryan Craston'),
(14, 'Aaron Paul'),
(15, 'Anna Gunn'),
(16, 'Andy Samberg'),
(17, 'Andre Braugher'),
(18, 'Stephanie Beatriz'),
(19, 'Christina Hendricks'),
(20, 'Retta'),
(21, 'Mae Whitman'),
(22, 'Viola Davis'),
(23, 'Billy Brown'),
(24, 'Alfred Enoch'),
(25, 'Jonathan Groff'),
(26, 'Holt McCallany'),
(27, 'Anna Torv'),
(28, 'Jennifer Aniston'),
(29, 'Courteney Cox'),
(30, 'David Schwimmer'),
(31, 'Aaron Paul'),
(32, 'Imogen Poots'),
(33, 'Rami Malek'),
(34, 'Tommy Kenny'),
(35, 'Bill Fagenabakke'),
(36, 'Clancy Brown'),
(37, 'Emilia Clarke'),
(38, 'Kit Harington'),
(39, 'Sophie Turner'),
(40, 'Maisie Williams'),
(58, 'ACTOR BODOH'),
(59, 'Apek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
