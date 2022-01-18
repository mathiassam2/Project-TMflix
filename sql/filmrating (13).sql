-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 08:26 AM
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
-- Table structure for table `filmrating`
--

CREATE TABLE `filmrating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `seriesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmrating`
--

INSERT INTO `filmrating` (`id`, `rating`, `seriesID`) VALUES
(1, 96, 115),
(2, 95, 48),
(3, 87, 117),
(4, 88, 118),
(5, 97, 119);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmrating`
--
ALTER TABLE `filmrating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seriesTest` (`seriesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmrating`
--
ALTER TABLE `filmrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmrating`
--
ALTER TABLE `filmrating`
  ADD CONSTRAINT `seriesTest` FOREIGN KEY (`seriesID`) REFERENCES `entities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
