-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.byetcluster.com
-- Generation Time: Aug 07, 2024 at 11:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35820168_tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_todolist`
--

CREATE TABLE `tbl_todolist` (
  `id` int(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_completed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_todolist`
--

INSERT INTO `tbl_todolist` (`id`, `item`, `status`, `date_added`, `date_completed`) VALUES
(42, 'asd', 'PENDING', '2024-08-08 00:15:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_todolist`
--
ALTER TABLE `tbl_todolist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_todolist`
--
ALTER TABLE `tbl_todolist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
