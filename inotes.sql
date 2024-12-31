-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 31, 2024 at 11:03 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `inotes`
--

DROP TABLE IF EXISTS `inotes`;
CREATE TABLE IF NOT EXISTS `inotes` (
  `Sr. no` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(150) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sr. no`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inotes`
--

INSERT INTO `inotes` (`Sr. no`, `Title`, `Description`, `Timestamp`) VALUES
(1, 'Hello', 'Today it last tuesday and now update rapository', '2024-12-29 12:42:54'),
(3, 'Today', 'Today its 2024 last Sunday.', '2024-12-29 13:01:10'),
(5, '4:26pm', 'at homeside working', '2024-12-29 16:14:06'),
(6, 'test2', 'testing 2', '2024-12-30 09:07:04'),
(7, 'test3', 'testing3', '2024-12-30 09:07:16'),
(8, 'test4', 'testing4', '2024-12-30 09:07:28'),
(9, 'test9', 'testing9', '2024-12-30 09:07:42'),
(11, 'test11', 'testing11', '2024-12-30 09:08:06'),
(15, 'testing 14', 'testing 14', '2024-12-31 11:02:32'),
(12, 'hii there', 'i am using the php', '2024-12-31 10:53:45'),
(13, 'test 12', 'testing 12', '2024-12-31 10:57:21'),
(14, 'testing 13', 'testing 13', '2024-12-31 10:58:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
