-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2015 at 06:40 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_webapp`
--
DROP DATABASE `library_webapp`;
CREATE DATABASE IF NOT EXISTS `library_webapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `library_webapp`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--
-- Creation: Sep 02, 2015 at 03:27 PM
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL,
  `book_isbn` varchar(100) DEFAULT '0',
  `book_name` varchar(255) NOT NULL,
  `book_writer` varchar(100) NOT NULL,
  `book_price` double DEFAULT '0',
  `book_quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `books`:
--

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_isbn`, `book_name`, `book_writer`, `book_price`, `book_quantity`) VALUES
(1, '9786160810802', 'ติดตั้งระบบเครือข่าย Linux Server', 'พิศาล พิทยาธุรวิวัฒน์', 299, 3),
(2, '9786162000270', 'Photoshop + Lightroom for Digital Photographer +CD', 'เกียรติพงษ์ บุญจิตร', 259, 5),
(3, '9786160822195', 'พัฒนาเว็บแอปพลิเคชั่นด้วย PHP ร่วมกับ MySQL และ jQuery', 'บัญชา ปะสีละเตสัง', 340, 5),
(4, '0000000000000', 'Ragnarok', 'As', 299, 100),
(5, '1234567890123', 'Weeky Online', 'Wo', 50, 1),
(6, '9789742121259', 'เรียนรู้ระบบเน็ตเวิร์กจากอุปกรณ์ของ Cisco', 'เอกสิทธิ์ วิริยจารี', 420, 10),
(7, '', 'มานี มานะ', 'ไม่รู้', 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--
-- Creation: Aug 31, 2015 at 01:11 PM
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_surname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `members`:
--

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_surname`) VALUES
(1, 'Arthit', 'Takashi'),
(2, 'Somsak', 'Kamon'),
(3, 'Prasert', 'Arthit');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--
-- Creation: Aug 31, 2015 at 01:11 PM
--

DROP TABLE IF EXISTS `rentals`;
CREATE TABLE IF NOT EXISTS `rentals` (
  `rental_id` int(11) NOT NULL COMMENT 'รหัสยืม',
  `rental_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ยืม',
  `member_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `book_id` int(11) NOT NULL COMMENT 'รหัสหนังสือ',
  `rental_quantity` int(11) NOT NULL COMMENT 'จำนวน',
  `rental_sendback` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่ส่งคืน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='การยืม - คืน';

--
-- RELATIONS FOR TABLE `rentals`:
--   `book_id`
--       `books` -> `book_id`
--   `member_id`
--       `members` -> `member_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Sep 01, 2015 at 03:37 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_displayname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_displayname`) VALUES
(2, 'admin', 'admin', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยืม';
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
