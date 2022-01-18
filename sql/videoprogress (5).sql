-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 08:27 AM
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
-- Table structure for table `videoprogress`
--

CREATE TABLE `videoprogress` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `videoId` int(11) NOT NULL,
  `progress` int(11) NOT NULL DEFAULT 0,
  `finished` tinyint(4) NOT NULL DEFAULT 0,
  `dateModified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videoprogress`
--

INSERT INTO `videoprogress` (`id`, `username`, `videoId`, `progress`, `finished`, `dateModified`) VALUES
(1, 'mathias', 18, 5, 1, '2021-07-02 14:10:52'),
(2, 'mathias', 17, 0, 0, '2021-06-30 21:30:04'),
(3, 'mathias', 28, 0, 0, '2021-06-30 21:30:11'),
(4, 'mathias', 30, 0, 0, '2021-06-30 21:30:14'),
(5, 'mathias', 19, 0, 1, '2021-06-30 22:21:47'),
(6, 'mathias', 20, 0, 1, '2021-06-30 22:22:45'),
(7, 'mathias', 21, 2, 0, '2021-06-30 22:37:13'),
(8, 'mathias', 22, 0, 0, '2021-06-30 21:53:40'),
(9, 'mathias', 23, 0, 0, '2021-06-30 21:53:40'),
(10, 'mathias', 24, 0, 0, '2021-06-30 21:53:41'),
(11, 'mathias', 25, 0, 0, '2021-06-30 21:53:42'),
(12, 'mathias', 26, 0, 0, '2021-06-30 21:53:42'),
(13, 'mathias', 27, 0, 0, '2021-06-30 21:53:43'),
(14, 'mathias', 29, 0, 0, '2021-06-30 21:53:44'),
(15, 'mathias', 31, 0, 0, '2021-06-30 21:53:46'),
(16, 'mathias', 32, 0, 1, '2021-07-02 03:42:10'),
(17, 'mathias', 33, 0, 0, '2021-06-30 21:53:47'),
(18, 'mathias', 34, 0, 1, '2021-06-30 21:53:53'),
(19, 'mathias', 35, 0, 1, '2021-06-30 21:57:27'),
(20, 'mathias', 36, 0, 1, '2021-06-30 21:57:56'),
(21, 'mathias', 293, 0, 1, '2021-06-30 22:36:04'),
(22, 'mathias', 294, 0, 1, '2021-06-30 22:50:12'),
(23, 'mathias', 1262, 3, 0, '2021-07-01 02:32:02'),
(24, 'mathias', 1651, 3, 0, '2021-06-30 23:43:52'),
(25, 'mathias', 1020, 3, 0, '2021-07-01 00:48:11'),
(26, 'mathias', 1108, 0, 0, '2021-07-01 00:59:41'),
(27, 'mathias', 902, 3, 0, '2021-07-01 02:31:55'),
(28, 'mathias', 1307, 0, 0, '2021-07-01 02:32:42'),
(29, 'mathias', 714, 0, 0, '2021-07-01 02:32:53'),
(30, 'mathias', 434, 0, 1, '2021-07-01 19:24:40'),
(31, 'mathias', 435, 0, 1, '2021-07-01 19:24:55'),
(32, 'mathias', 675, 3, 0, '2021-07-03 01:29:48'),
(33, 'mathias', 794, 0, 0, '2021-07-01 19:25:44'),
(34, 'mathias', 1395, 0, 0, '2021-07-01 19:25:47'),
(35, 'mathias', 702, 0, 0, '2021-07-01 21:33:58'),
(36, 'mathias', 436, 0, 1, '2021-07-02 02:36:27'),
(37, 'mathias', 437, 0, 1, '2021-07-02 02:36:33'),
(38, 'mathias', 438, 0, 1, '2021-07-02 02:36:40'),
(39, 'mathias', 1144, 0, 1, '2021-07-02 03:46:45'),
(40, 'mathias', 1308, 0, 1, '2021-07-02 14:02:06'),
(41, 'mathias', 1309, 0, 1, '2021-07-02 14:02:15'),
(42, 'mathias', 1310, 0, 1, '2021-07-02 14:02:28'),
(43, 'nyie', 17, 0, 1, '2021-07-02 23:00:35'),
(44, 'mathias', 247, 0, 0, '2021-07-03 01:07:44'),
(45, 'haz', 18, 3, 0, '2021-07-03 02:22:45'),
(46, 'haz', 1307, 3, 0, '2021-07-03 02:22:58'),
(47, 'mathias', 439, 0, 1, '2021-07-03 02:34:18'),
(48, 'mathias', 1823, 0, 1, '2021-07-03 05:50:12'),
(49, 'mathias', 307, 0, 1, '2021-07-03 06:07:48'),
(50, 'mathias', 249, 0, 1, '2021-07-03 06:13:45'),
(51, 'mathias', 250, 0, 1, '2021-07-03 06:13:50'),
(52, 'mathias', 251, 0, 1, '2021-07-03 06:13:54'),
(53, 'mathias', 1934, 0, 1, '2021-07-03 21:07:57'),
(54, 'admin', 1742, 0, 0, '2021-07-04 20:08:39'),
(55, 'admin', 19, 0, 1, '2021-07-05 00:18:18'),
(56, 'admin', 1987, 0, 0, '2021-07-05 18:25:34'),
(57, 'admin', 18, 2, 0, '2021-07-06 13:56:36'),
(58, 'admin', 1935, 0, 0, '2021-07-06 14:22:51'),
(59, 'admin', 1304, 0, 0, '2021-07-06 14:24:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `videoprogress`
--
ALTER TABLE `videoprogress`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `videoprogress`
--
ALTER TABLE `videoprogress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
