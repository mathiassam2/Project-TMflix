-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 04:42 PM
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
-- Table structure for table `filmactors`
--

CREATE TABLE `filmactors` (
  `seriesId` int(11) NOT NULL,
  `actorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmactors`
--

INSERT INTO `filmactors` (`seriesId`, `actorId`) VALUES
(115, 13),
(115, 14),
(115, 15),
(48, 16),
(48, 17),
(48, 18),
(117, 19),
(117, 20),
(117, 21),
(118, 22),
(118, 23),
(118, 24),
(119, 25),
(119, 26),
(119, 27),
(84, 31),
(84, 32),
(84, 33),
(87, 37),
(87, 38),
(87, 39),
(117, 40),
(48, 71);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmactors`
--
ALTER TABLE `filmactors`
  ADD PRIMARY KEY (`actorId`,`seriesId`),
  ADD KEY `idx_fk_film_id` (`seriesId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmactors`
--
ALTER TABLE `filmactors`
  ADD CONSTRAINT `test1` FOREIGN KEY (`actorId`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test2` FOREIGN KEY (`seriesId`) REFERENCES `entities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
