-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2016 at 12:55 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_misc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loop_urls`
--

CREATE TABLE IF NOT EXISTS `tbl_loop_urls` (
  `tlu_id` int(11) NOT NULL COMMENT 'Unique ID for each URL',
  `tlu_payload` int(11) NOT NULL COMMENT 'URL''s ?ID=x field',
  `tlu_active` int(11) NOT NULL COMMENT 'Active flag: 0 or 1',
  `tlu_desc` text NOT NULL COMMENT 'URL text description'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loop_urls`
--

INSERT INTO `tbl_loop_urls` (`tlu_id`, `tlu_payload`, `tlu_active`, `tlu_desc`) VALUES
(8, 1, 1, 'Blah'),
(9, 2, 1, 'Blah'),
(10, 3, 1, 'Blah'),
(11, 4, 1, 'Blah'),
(12, 5, 0, 'Blah'),
(13, 6, 1, 'Blah'),
(14, 7, 1, 'Blah'),
(15, 8, 1, 'Blah'),
(16, 9, 1, 'Blah'),
(17, 10, 1, 'Blah'),
(18, 11, 0, 'Blah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_loop_urls`
--
ALTER TABLE `tbl_loop_urls`
  ADD PRIMARY KEY (`tlu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_loop_urls`
--
ALTER TABLE `tbl_loop_urls`
  MODIFY `tlu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID for each URL',AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
