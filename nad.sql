-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2023 at 12:46 AM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nad`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL,
  `parentId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `createdDate`, `name`, `parentId`) VALUES
(1, '2023-08-04 00:41:23', 'Director', 0),
(2, '2023-08-04 00:41:38', 'Board', 0),
(3, '2023-08-04 00:41:52', 'Managing Director', 1),
(4, '2023-08-04 00:42:11', 'Personal Assistant', 1),
(5, '2023-08-04 00:42:26', 'Personal Assistant\'s Assistant', 4),
(6, '2023-08-04 00:42:44', 'Head Manager', 3),
(7, '2023-08-04 00:42:53', 'Manager', 6),
(8, '2023-08-04 00:43:04', 'UI Team Lead', 7),
(9, '2023-08-04 00:43:17', 'Developer Team Lead', 7),
(10, '2023-08-04 00:43:31', 'UI Senior Developer', 8),
(11, '2023-08-04 00:43:43', 'UI Developer', 10),
(12, '2023-08-04 00:43:56', 'UI Junior Developer', 11),
(13, '2023-08-04 00:44:07', 'UI Intern', 12),
(14, '2023-08-04 00:44:16', 'UI Trainy', 12),
(15, '2023-08-04 00:44:49', 'Senior Developer', 9),
(16, '2023-08-04 00:45:00', 'Junior Developer', 15),
(17, '2023-08-04 00:45:08', 'Intern Developer', 15),
(18, '2023-08-04 00:45:18', 'Trainy Developer', 15),
(19, '2023-08-04 00:45:29', 'President', 2),
(20, '2023-08-04 00:45:42', 'Vice President', 19),
(21, '2023-08-04 00:45:55', 'Members', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
