-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 20, 2023 at 09:46 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upraise_sacco`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `member_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phonenumber` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`member_id`, `username`, `password`, `phonenumber`) VALUES
(1, 'kasolo_denis', 'denis', '0700000001'),
(2, 'mark_henry', 'henry', '0700000002'),
(3, 'john_smith', 'smith', '0700000003'),
(4, 'john_doe', 'johndoe', '0700000004'),
(5, 'william_george', 'george', '0700000005'),
(6, 'ronald_gola', 'ronald', '0700000006'),
(7, 'mary_jane', 'jane', '0700000007'),
(8, 'golola_moses', 'moses', '0700000008'),
(9, 'harry_kane', 'kane', '0700000009'),
(10, 'lionel_messi', 'messi', '0700000010'),
(11, 'neymar_junior', 'neymar', '0700000011'),
(12, 'mbampe_junior', 'mbampe', '0700000012');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
