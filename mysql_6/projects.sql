-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2016 at 03:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8_bin NOT NULL,
  `year` year(4) NOT NULL,
  `program` varchar(100) COLLATE utf8_bin NOT NULL,
  `price` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `year`, `program`, `price`) VALUES
(1, 'BIO-C3', 2014, 'BONUS', 7400264),
(2, 'TRIPOLIS', 2014, 'LMT', 158770),
(3, 'JRTC_NEW', 2010, 'LATLIT, Interreg, Latvia-Lithuania Cross Border Cooperation Programme', 1057586),
(4, 'BSCP', 2015, 'EASME', 1568000),
(5, 'BALMAN', 2015, 'LMT,  Lithuania - Latvia - China (Taiwan) research project fund', 1335246),
(6, 'MAURAKUMA', 2014, 'LMT', 157842),
(7, 'BALSAM', 2013, 'European Commission, Marine Strategy Framework Directive pilot projects', 923606),
(9, 'MARES', 2012, 'ASMUS MUNDUS, Horizon 2020', 201600),
(10, 'VECTORS', 2012, 'uropean Commission, 7 BP', 8388607),
(11, 'DENOFLIT', 2010, 'LIFE+ Nature & Biodiversity', 3139398),
(12, 'TRUFFLE', 2012, 'Latvia-Lithuania Cross Border Cooperation Programme', 638880),
(13, 'LAKES FOR ', 2012, 'Latvia-Lithuania Cross Border Cooperation Programme', 2025108),
(14, 'IANUS', 2012, 'lmt', 443060),
(15, 'PROTEUS', 2012, 'LMT', 199084),
(16, 'SAMBAH', 2010, 'LIFE+ Nature & Biodiversity', 160564),
(17, 'PREHAB', 2010, 'BONUS', 527260),
(18, 'KRABAS', 2011, 'LMT', 86306),
(19, 'MEECE', 2008, 'European Commission, 7 BP', 8388607),
(20, 'EEE', 2008, 'The Norwegian Financial Mechanism and the Republic of Lithuania', 1978144),
(21, 'MOPODECO', 2010, 'ordic countries Council of Ministers', 201088),
(22, 'Cross-bord', 2012, 'Latvia-Lithuania Cross Border Cooperation Programme', 1556216),
(23, 'Cross-bord', 2012, 'Latvijos ir Lietuvos bendradarbiavimo per sieną programa - LATLIT', 1556),
(24, 'aa', 2150, 'labas', 5028),
(25, 'aa', 2150, 'labas', 5028),
(26, 'Naujas', 2013, 'JTF', 200),
(27, 'aa', 2150, 'labas', 5028),
(28, 'Test', 2012, 'FFF', 200000),
(29, 'aa', 2150, 'labas', 5028),
(30, 'Geras', 2012, 'ADda', 1110),
(31, 'aa', 2150, 'labas', 5028),
(32, 'aa', 2150, 'labas', 5028),
(33, 'Baltic aca', 2015, 'Test', 200000),
(34, 'Naujas pro', 2012, 'Super', 200000),
(35, 'Naujas pro', 2013, 'Super', 200),
(36, 'Naujas pro', 0000, 'Super', 0),
(37, 'Naujas pro', 0000, 'Super', 0),
(38, 'Naujas pro', 0000, 'Super', 0),
(39, 'Naujas pro', 2014, 'Super', 2222),
(40, 'BC8', 2014, 'sadasdads asd ', 2222),
(41, 'BIO-C11', 2014, 'FFF', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
