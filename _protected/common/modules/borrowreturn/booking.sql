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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `entry_status` tinyint(4) NOT NULL COMMENT 'สถานะรายการ',
  `booking_at` datetime NOT NULL COMMENT 'วันที่-ขอยืม',
  `user_id` int(11) NOT NULL COMMENT 'ผู้ขอ',
  `belongto_id` int(11) NOT NULL COMMENT 'สังกัดองค์กร',
  `position_id` int(11) NOT NULL COMMENT 'ตำแหน่ง',
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วัตถุประสงค์',
  `isin_university` tinyint(1) NOT NULL COMMENT 'ใน-นอกมหาวิทยาลัย',
  `university_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานที่ใช้งาน',
  `acquire_at` datetime NOT NULL COMMENT 'วันที่-มารับของ',
  `return_at` datetime NOT NULL COMMENT 'วันที่-มาคืนของ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `belongto_id` (`belongto_id`),
  ADD KEY `position_id` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`belongto_id`) REFERENCES `std_belongto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `std_position` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
