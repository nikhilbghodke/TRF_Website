-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2019 at 07:48 AM
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
  `id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `githubLink` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `teamdid` varchar(50) NOT NULL,
  `likes` int(100) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `tags` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `status`, `githubLink`, `photo`, `teamdid`, `likes`, `date`, `tags`, `description`) VALUES
('1', 'hello', 'work', 'shdadbh', NULL, '1', 0, '2019-06-25', '1,2', ''),
('2', 'bye', 'shsh', 'fjdjd', NULL, '3', 0, '2019-06-07', '1,2', ''),
('4', 'we are good', 'on going', 'https:', NULL, '7', 0, '2019-06-18', '1,3', ''),
('4', 'teri', 'gg', 'ggg', NULL, '1,4,5', 0, '2019-06-04', '1,2', '3rfjerjfhjkefkjhfu4f 4fbbkjfnjnf4fnjkf fkjn\r\njebjkfebkjfjknfrkfn 4nknkefnknfkwrlfnkrfnkjfn');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
('1', 'Machine learning'),
('2', 'ai'),
('3', 'ait'),
('5', 'backend'),
('4', 'webT'),
('4', 'webT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `Year` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Branch`, `Year`) VALUES
('1', 'wawgb', 'ge', 'drhh'),
('2', 'rutu', 'ge', 'bhnr'),
('3', 'manish', 'csad', 'vdxf'),
('4', 'aniket', 'kbk', 'nkn'),
('5', 'vaibhav', 'lc,', 'bjkug'),
('6', 'nikhil', 'fygh', 'fg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
