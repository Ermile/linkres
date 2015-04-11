-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2015 at 07:42 PM
-- Server version: 5.5.40-0ubuntu1
-- PHP Version: 5.6.4-1+deb.sury.org~utopic+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linkbor`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE IF NOT EXISTS `url` (
`id` int(10) NOT NULL,
  `url` varchar(999) COLLATE utf8_persian_ci NOT NULL,
  `short` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `md5` varchar(32) COLLATE utf8_persian_ci NOT NULL,
  `counter` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `url`, `short`, `md5`, `counter`) VALUES
(1, 'asdfsadf', 'asdfsadf', '63d0cea9d550e495fde1b81310951bd7', NULL),
(2, 'http://google.com', 'asm', '7c5cc52fdb69c634bf9c216c1c2d001b', 0),
(3, 'http://yahoo.com', 'Asm', 'cf37c17a233d3e6855b79dc4360075ab', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
