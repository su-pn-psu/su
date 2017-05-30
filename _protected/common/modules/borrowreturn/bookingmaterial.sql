-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2016 at 02:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingmaterial`
--

CREATE TABLE `bookingmaterial` (
  `booking_id` int(11) NOT NULL COMMENT 'bookingID',
  `material_id` int(11) NOT NULL COMMENT 'materialID',
  `return_condition` text COLLATE utf8_unicode_ci COMMENT 'สภาพตอนคืน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingmaterial`
--
ALTER TABLE `bookingmaterial`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingmaterial`
--
ALTER TABLE `bookingmaterial`
  ADD CONSTRAINT `bookingmaterial_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingmaterial_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
