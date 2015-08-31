-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2015 at 10:53 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL,
  `book_isbn` varchar(100) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_writer` varchar(100) NOT NULL,
  `book_price` double NOT NULL,
  `book_quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_isbn`, `book_name`, `book_writer`, `book_price`, `book_quantity`) VALUES
(1, '9786160810802', 'ติดตั้งระบบเครือข่าย Linux Server', 'พิศาล พิทยาธุรวิวัฒน์', 299, 3),
(2, '9786162000270', 'Photoshop + Lightroom for Digital Photographer +CD', 'เกียรติพงษ์ บุญจิตร', 259, 5),
(3, '9786160822195', 'พัฒนาเว็บแอปพลิเคชั่นด้วย PHP ร่วมกับ MySQL และ jQuery', 'บัญชา ปะสีละเตสัง', 340, 5);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_surname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `rentals` (
  `rental_id` int(11) NOT NULL COMMENT 'รหัสยืม',
  `rental_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ยืม',
  `member_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `book_id` int(11) NOT NULL COMMENT 'รหัสหนังสือ',
  `rental_quantity` int(11) NOT NULL COMMENT 'จำนวน',
  `rental_sendback` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่ส่งคืน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='การยืม - คืน';

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
