-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2021 at 09:02 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int NOT NULL,
  `target` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `sorted` tinyint(1) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `target`, `sender`, `query`, `sorted`, `comment`) VALUES
(107, 'riyan', 'danishangural', 'ownbwrnbwrbtmw4t', 1, 'of'),
(108, 'riyan', 'danishangural', 'qiernerwign', 1, 'vfi b'),
(109, 'riyan', 'danishangural', 'onfvonefb', 1, 'veerpmb');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `username`, `isadmin`) VALUES
(1, 'danish angural', 'danishangural28@gmail.com', '$2y$10$4Qp9VfNhNf6WIA8t09rXruNEXXbw3en6XZSeo4rbQAuviAhBC2VVu ', 'danishangural', 0),
(2, 'riyan', 'riyanjain@gmail.com', '$2y$10$4Qp9VfNhNf6WIA8t09rXruNEXXbw3en6XZSeo4rbQAuviAhBC2VVu ', 'riyan', 1),
(3, NULL, 'bharghavi@gmail.com', '$2y$10$kH5a53QWOfmMCfrnNqKgrOpJRpaGDLC89.7T7gYSGCi0WVwBgTs9O', 'Bharghavi', 1),
(4, NULL, 'aniket@gmail.com', '$2y$10$.YxsH4n2rQEQ3THzE7EtR.NKn/d6JHLnuwpTsMLPq1na4/TyGRicy', 'Aniket', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;