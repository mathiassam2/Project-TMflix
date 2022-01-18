-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 04:43 PM
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
-- Table structure for table `filmdirector`
--

CREATE TABLE `filmdirector` (
  `seriesID` int(11) NOT NULL,
  `directorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmdirector`
--

INSERT INTO `filmdirector` (`seriesID`, `directorID`) VALUES
(115, 1),
(115, 2),
(48, 3),
(117, 4),
(117, 5),
(118, 6),
(118, 7),
(119, 8),
(1, 9),
(1, 10),
(1, 11),
(84, 12),
(51, 13),
(51, 14),
(51, 15),
(87, 16),
(87, 17),
(48, 54);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmdirector`
--
ALTER TABLE `filmdirector`
  ADD PRIMARY KEY (`directorID`,`seriesID`),
  ADD KEY `idx_fk_film_id` (`seriesID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmdirector`
--
ALTER TABLE `filmdirector`
  ADD CONSTRAINT `toDirector` FOREIGN KEY (`directorID`) REFERENCES `director` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
