-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2024 at 05:58 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online university election`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `registerNo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileNo` varchar(15) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registerNo` (`registerNo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `registerNo`, `email`, `mobileNo`, `pwd`) VALUES
(1, 'BRYAN KIJA', '2023-01-00069', 'kijabrayn@gmail.com', '0742666275', '$2y$12$chU6dSqnCR16Hu5LsHp7neKBXpycCd3beuhU.8jmLk.rn.LwTx5jy');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `age`, `course`, `year`, `position`, `image`) VALUES
(1, 'STEVE JOBS', 25, 'Diploma in computer science', '2', 'president', '89245bf3687872944dc67b0e907bd23f.jpg'),
(2, 'LEONARD TRULY', 23, 'Bachelor in computer science', '1', 'vice-president', '20211018_123341.jpg'),
(3, 'WILLIAM KALLY', 25, 'Bachelor in computer science', '2', 'chairperson', '20210907_141108.jpg'),
(4, 'JADDO WILL', 17, 'Bachelor in computer science', '2', 'president', '7bd4d8b2a71da864e26a725fb3ea79f9.jpg'),
(5, 'MACROM LEON', 17, 'Bachelor in computer science', '2', 'chairperson', '77ed29d5f2a0b16e0e3a8e996576c1ae.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `registerNo` varchar(20) NOT NULL,
  `college` varchar(20) NOT NULL,
  `program` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `studyYear` varchar(10) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `email`, `mobileNo`, `gender`, `registerNo`, `college`, `program`, `studyYear`, `pwd`) VALUES
(1, 'ODONG ODARA', 'odaraodongo@gmail.com', '0765234765', 'male', '2023-01-00078', 'coict', 'Computer Science.', '1 year', '$2y$12$4LabhsIq7hezapOjt3wK6eXRiZzxO432YvzGrLGn5UKDJcaXxDufO'),
(2, 'SUDY KARRIZO', 'karrizosuddy@gmail.com', '0675234789', 'male', '2023-01-00078', 'coet', 'Electrical Engineering', '2 year', '$2y$12$1uxCKW0itkfszzXq1qiZCun/uHMSyJas9PYz0kCMGjDImkYlOOdzq'),
(3, 'BRIAN KIJA', 'kijabrayn@gmail.com', '0765345212', 'male', '2023-01-00068', 'coict', 'Computer Science.', '1 year', '$2y$12$QCP2fHQ0xPPIFusTZ/dMquIUT4FvLl7veBXoptH9slifCIj1aJndi'),
(4, 'WYCLIF RUTTO', 'ruttowyclif@gmail.com', '0657234678', 'male', '2023-01-00045', 'coict', 'Computer Science.', '1 year', '$2y$12$JGW4MYNIAuoVDjzV1W/ry.ZTlsr2IV7gVBToI7a2A86DSQdFbz8pG'),
(5, 'DAMIAN CHAULA', 'chauladamian@gmail.com', '076543452', 'male', '2023-01-00072', 'coss', 'Archeology', '1 year', '$2y$12$lbUAlR/kgVLvJvg3TxsZQOlhUxLPrBb1pqxQ8/VLwZTcpyexjNzIu'),
(6, 'LEONAD WILL', 'wylcifgaole@gmai.com', '076543456', 'male', '2023-01-00076', 'coict', 'Computer Science.', '1 year', '$2y$12$BmDbLOaF/MSax0wThN5J4Oxj7pRJbmNTy8Aq0OFKxyW/mHjVNS4Xy');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `candidate_id` int NOT NULL,
  `position` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_vote` (`user_id`,`position`),
  KEY `candidate_id` (`candidate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `candidate_id`, `position`) VALUES
(1, 1, 1, 'president'),
(2, 1, 3, 'vice-president'),
(3, 1, 5, 'chairperson'),
(4, 3, 2, 'president'),
(5, 4, 3, 'chairperson'),
(6, 6, 1, 'president'),
(7, 6, 2, 'vice-president'),
(8, 6, 3, 'chairperson'),
(9, 5, 5, 'chairperson');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
