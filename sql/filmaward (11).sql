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
-- Table structure for table `filmaward`
--

CREATE TABLE `filmaward` (
  `seriesID` int(11) NOT NULL,
  `awardID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmaward`
--

INSERT INTO `filmaward` (`seriesID`, `awardID`) VALUES
(115, 1),
(115, 2),
(48, 3),
(48, 4),
(118, 5),
(118, 6),
(119, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmaward`
--
ALTER TABLE `filmaward`
  ADD PRIMARY KEY (`awardID`,`seriesID`),
  ADD KEY `idx_fk_series_id` (`seriesID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmaward`
--
ALTER TABLE `filmaward`
  ADD CONSTRAINT `filmaward_ibfk_1` FOREIGN KEY (`seriesID`) REFERENCES `entities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `toAward` FOREIGN KEY (`awardID`) REFERENCES `award` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
