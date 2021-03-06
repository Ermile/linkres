-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 12:04 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linkres`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklists`
--

CREATE TABLE IF NOT EXISTS `blacklists` (
`id` smallint(5) unsigned NOT NULL,
  `blacklist_cat` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `blacklist_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `blacklist_counter` int(10) unsigned NOT NULL DEFAULT '0',
  `blacklist_status` enum('enable','disable','expire') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'enable',
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blacklists`
--

INSERT INTO `blacklists` (`id`, `blacklist_cat`, `blacklist_name`, `blacklist_counter`, `blacklist_status`, `date_modified`) VALUES
(31, 'sexual', 'sex', 0, 'enable', NULL),
(32, 'sexual', 'fuck', 0, 'enable', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE IF NOT EXISTS `reserves` (
`id` smallint(5) unsigned NOT NULL,
  `reserves_cat` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `reserves_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `reserves_counter` int(10) unsigned NOT NULL DEFAULT '0',
  `reserves_status` enum('enable','disable','expire') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'enable',
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`id`, `reserves_cat`, `reserves_name`, `reserves_counter`, `reserves_status`, `date_modified`) VALUES
(31, 'sexual', 'sex', 0, 'enable', NULL),
(32, 'sexual', 'fuck', 0, 'enable', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE IF NOT EXISTS `urls` (
`id` int(10) unsigned NOT NULL,
  `url_long` varchar(999) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `url_clicks` int(10) unsigned NOT NULL DEFAULT '0',
  `url_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url_status` enum('enable','disable','expire','hidden') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'enable',
  `url_special` bit(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117650 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `url_long`, `url_clicks`, `url_created`, `url_status`, `url_special`) VALUES
(6, 'http://localhost/phpmyadmin/index.php?db=&amp;table=&amp;server=1&amp;target=&amp;token=1530075b31cfaff6522178b5fc2f3fb9#PMAURL-3:sql.php?db=linkres&amp;table=urls&amp;server=1&amp;target=&amp;token=1530075b31cfaff6522178b5fc2f3fb9', 0, '2015-04-12 02:24:19', 'enable', NULL),
(7, 'http://localhost/phpmyadmin/index.php?db=&amp;table=&amp;server=1&amp;target=&amp;token=1530075b31cfaff6522178b5fc2f3fb9#PMAURL-3:sql.php?db=linkres&amp;table=urls&amp;server=1&amp;target=&amp;token=1530075b31cfaff6522178b5fc2f3fb9sad', 0, '2015-04-12 02:24:32', 'enable', NULL),
(8, 'http://localhost/phpmyadmin/index.php?db=&amp;table=&amp;server=1&amp;target=&amp;token=1530075b31cfaff6522178b5fc2f3fb9#PMAURL-3:sql.php?db=linkres&amp;table=urls&amp;server=1&amp;target=&amp;token=1530075b31cfaff6522178b5fc2f3fb9sadfowegfo8ugwqe89fgw', 0, '2015-04-12 02:24:36', 'enable', NULL),
(9, 'http://localhost/phpmyadmin/index.php?db=&amp;table=&amp;server=1&amp;target=&amp;token=1530075b31cfaff6522178b5fc2f3fb9#PMAURL-3:sql.php?db=linkres&amp;table=urls&amp;server=1&amp;target=&amp;token=1530075b31cfaff6522178b5fc2f3fb9sadfowegfo8ugwqe89fgddas', 0, '2015-04-12 02:24:48', 'enable', NULL),
(10000, 'fsfefqergqerg', 0, '2015-04-12 02:29:39', 'enable', NULL),
(10001, 'fsfefqergqerg3', 0, '2015-04-12 02:32:30', 'enable', NULL),
(117649, 'fsfefqergqerg3g', 0, '2015-04-12 02:33:40', 'enable', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `user_nickname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_nickname`) VALUES
(15, 'Hasan'),
(150, 'Mahdi'),
(190, 'javad'),
(191, NULL),
(192, NULL),
(193, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklists`
--
ALTER TABLE `blacklists`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cat+name+value` (`blacklist_cat`,`blacklist_name`,`blacklist_counter`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cat+name+value` (`reserves_cat`,`reserves_name`,`reserves_counter`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blacklists`
--
ALTER TABLE `blacklists`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117650;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
