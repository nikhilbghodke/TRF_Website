-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2019 at 06:45 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trf_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `githubLink` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `teamdId` int(100) NOT NULL,
  `likes` int(100) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `tags` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `status`, `githubLink`, `photo`, `teamdId`, `likes`, `date`, `tags`) VALUES
(6, 'wc', 'dq', '', '', 1, 69, '2019-06-23', 'dql'),
(6, 'wc', 'dq', '', '', 1, 69, '2019-06-23', 'dql'),
(6, 'hkx', 'ON', '', 'photo_2019-05-10_13-32-48.jpg', 5, 89, '2019-05-22', 'BKAKA'),
(6, 'qwd', 'dwq', '', 'photo_2019-05-10_13-32-50.jpg', 1, 50, '2019-06-24', 'dwq'),
(90, 's', 'cwq', '', 'photo_2019-05-10_13-32-50.jpg', 5, 21, '2019-06-22', 's'),
(90, 's', 'cwq', '', 'photo_2019-05-10_13-32-50.jpg', 5, 21, '2019-06-22', 's'),
(90, 's', 'cwq', '', 'photo_2019-05-10_13-32-50.jpg', 5, 21, '2019-06-22', 's'),
(90, 's', 'cwq', '', 'photo_2019-05-10_13-32-50.jpg', 5, 21, '2019-06-22', 's'),
(90, 's', 'cwq', '', 'photo_2019-05-10_13-32-50.jpg', 5, 21, '2019-06-22', 's'),
(7, 'guk', 'jo', '', 'photo_2019-05-10_13-32-50.jpg', 12, 89, '2019-06-22', 'ggk'),
(4, 'dmol', 'sg', '', 'photo_2019-05-10_13-32-50.jpg', 4, 78, '2019-06-21', 'sg'),
(4, 'dmol', 'sg', '', 'photo_2019-05-10_13-32-50.jpg', 4, 78, '2019-06-21', 'sg'),
(4, 'dq', 'w', '', 'photo_2019-05-10_13-32-50.jpg', 4, 78, '2019-06-21', 'fw');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Machine learning');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(100) NOT NULL,
  `member1` int(100) DEFAULT NULL,
  `member2` int(100) DEFAULT NULL,
  `member3` int(100) DEFAULT NULL,
  `member4` int(100) DEFAULT NULL,
  `member5` int(100) DEFAULT NULL,
  `member6` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
