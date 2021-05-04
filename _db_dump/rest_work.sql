-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2021 at 01:04 PM
-- Server version: 5.7.31
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest_work`
--

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
CREATE TABLE IF NOT EXISTS `shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `title`) VALUES
(1, 'A(0-8)'),
(2, 'B(8-16)'),
(3, 'C(16-24)');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `name`, `email`, `age`, `designation`) VALUES
(1, 'Worker 01', 'worker01@test.com', 32, 'Data Scientist'),
(2, 'Woker 02', 'worker02@test.com', 29, 'Apparel Patternmaker'),
(3, 'Worker 03', 'worker03@test.com', 36, 'Accountant'),
(4, 'Adela Marion', 'michael2004@yahoo.com', 42, 'Shipping Manager'),
(5, 'Matthew Popp', 'krystel_wol7@gmail.com', 48, 'Chief Sustainability Officer'),
(6, 'Alan Wallin', 'neva_gutman10@hotmail.com', 37, 'Chemical Technician'),
(7, 'Joyce Hinze', 'davonte.maye@yahoo.com', 44, 'Transportation Planner'),
(8, 'Donna Andrews', 'joesph.quitz@yahoo.com', 49, 'Wind Energy Engineer'),
(10, 'Joel Ogle', 'summer_shanah@hotmail.com', 45, 'Space Sciences Teacher'),
(19, 'Amazing Pillow 2.0', 'omar@omar.com', 2, 'manager'),
(20, 'Amazing Pillow 3.0', 'omar@omar.om', 29, 'CEO'),
(22, 'Worker 01', 'worker@omar.com', 20, 'Packer');

-- --------------------------------------------------------

--
-- Table structure for table `workershift`
--

DROP TABLE IF EXISTS `workershift`;
CREATE TABLE IF NOT EXISTS `workershift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workerid` int(11) NOT NULL,
  `shiftid` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workershift`
--

INSERT INTO `workershift` (`id`, `workerid`, `shiftid`, `date`) VALUES
(1, 1, 1, '2021-05-03'),
(2, 2, 2, '2021-05-03'),
(3, 3, 3, '2021-05-03'),
(4, 1, 1, '2021-05-04'),
(5, 2, 2, '2021-05-04'),
(6, 1, 1, '2021-05-05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
