-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2016 at 02:58 AM
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
-- Table structure for table `borrowreturn`
--

CREATE TABLE `borrowreturn` (
  `booking_id` int(11) NOT NULL COMMENT 'bookingID',
  `confirm_status` tinyint(1) NOT NULL COMMENT 'สถานะ-อนุมัติ',
  `confirm_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ความเห็น-อนุมัติ',
  `confirm_staff_id` int(11) NOT NULL COMMENT 'เจ้าหน้าที่-อนุมัติ',
  `confirm_at` datetime NOT NULL COMMENT 'วันที่-อนุมัติ',
  `deliver_status` tinyint(1) NOT NULL COMMENT 'สถานะ-จ่ายของ',
  `deliver_staff_id` int(11) NOT NULL COMMENT 'เจ้าหน้าที่-จ่ายของ',
  `deliver_at` datetime NOT NULL COMMENT 'วันที่-จ่ายของ',
  `return_status` tinyint(1) NOT NULL COMMENT 'สถานะ-การคืน',
  `return_loss` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สิ่งที่ไม่คืน',
  `return_because` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ไม่คืนเนื่องจาก',
  `return_staff_id` int(11) NOT NULL COMMENT 'เจ้าหน้าที่-รับคืน',
  `return_at` datetime NOT NULL COMMENT 'วันที่-รับคืน',
  `entry_note` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเหตุ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowreturn`
--
ALTER TABLE `borrowreturn`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `confirm_staff_id` (`confirm_staff_id`),
  ADD KEY `deliver_staff_id` (`deliver_staff_id`),
  ADD KEY `return_staff_id` (`return_staff_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowreturn`
--
ALTER TABLE `borrowreturn`
  ADD CONSTRAINT `borrowreturn_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowreturn_ibfk_2` FOREIGN KEY (`confirm_staff_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowreturn_ibfk_3` FOREIGN KEY (`deliver_staff_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowreturn_ibfk_4` FOREIGN KEY (`return_staff_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
