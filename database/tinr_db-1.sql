-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 05:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(255) NOT NULL,
  `name` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `password` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `name`, `email`, `password`) VALUES
(4, 'zinitchi', 'zinitchinurieko@gmail.com', '$2y$10$u7/vSja2bpfuhzlG/.h4fuzD9NeNp3.df.0o3gbDyYEbM/au.P9Sm'),
(5, 'pyro', 'pyrobansuelo2019@gmail.com', '$2y$10$lhm5O7/5sdNh.AV8c9T26eeRfRGeY19gH.QGZWDqip/0VHAm1h.Ra'),
(6, 'Pi', 'pyrobansuelo@gmail.com', '$2y$10$z07976nwCrZVG8dSY2eRsO.xPWgQot6vxVyK6ZgF4Hmq8f.B6yDVK');

-- --------------------------------------------------------

--
-- Table structure for table `admincredentials`
--

CREATE TABLE `admincredentials` (
  `username` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `admin_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admincredentials`
--

INSERT INTO `admincredentials` (`username`, `password`, `admin_id`) VALUES
('tinr_admin1156', 'pnrsuperfasttrainnobreaksnodelaybesttrainisekai1158', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(255) NOT NULL,
  `payment` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `departure` mediumtext NOT NULL,
  `destination` mediumtext NOT NULL,
  `time` mediumtext NOT NULL,
  `date` mediumtext NOT NULL,
  `topay` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `payment`, `email`, `departure`, `destination`, `time`, `date`, `topay`) VALUES
(1, '646b74a7bcab81.26687265.jpg', 'pyrobansuelo@gmail.com', 'Santa Mesa', 'Pandacan', '21:00', '2023-05-24', 15);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `booking_id` int(255) NOT NULL,
  `payment` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `departure` mediumtext NOT NULL,
  `destination` mediumtext NOT NULL,
  `time` mediumtext NOT NULL,
  `date` mediumtext NOT NULL,
  `status` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`booking_id`, `payment`, `email`, `departure`, `destination`, `time`, `date`, `status`) VALUES
(2, '646b74cf0a38a8.54717841.jpg', 'pyrobansuelo2019@gmail.com', 'Espana', 'San Andres', '21:02', '2023-05-17', 'APPROVED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admincredentials`
--
ALTER TABLE `admincredentials`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admincredentials`
--
ALTER TABLE `admincredentials`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
