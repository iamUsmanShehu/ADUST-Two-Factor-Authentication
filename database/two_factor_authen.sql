-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 04:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `two_factor_authen`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `other_name` varchar(50) DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_exp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `surname`, `other_name`, `gender`, `email`, `phone`, `password`, `otp`, `otp_exp`) VALUES
(1, 'Usman', 'Shehu', 'Ayuba', 'male', 'iamUsmanShehu@gmail.com', '09040306788', '$2y$10$qiA5d1hA7svIsf0jFKcor.ccfXjT1jIVF4GgV/0Gxz3eMGS9iq1Zi', '754910', '2024-03-11 18:30:39'),
(2, 'Musa', 'Okudu', 'Musa', 'male', 'okudu@gmail.com', '07051892926', '$2y$10$TzjgR8y93rts9PyvBY/of.lK9JkRRT4KYkT9YEzpdF1VmEFxqsYTa', '370679', '2024-03-11 18:33:36'),
(3, 'Abubakar', 'Usman', 'Bashir', 'male', 'abubakar@gmail.com', '09132828617', '$2y$10$kUmVirKj5oBHaQMoq7PNEennmhGhntc4Tl.mfK63k2fI0XC13GPXi', '940348', '2024-03-11 18:42:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
