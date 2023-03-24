-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 01:53 PM
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
-- Database: `simple_result_display_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--  password = admin
-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `id` int(11) NOT NULL,
  `EXAM_NAME` tinytext NOT NULL,
  `S1` tinytext DEFAULT NULL,
  `M1` int(3) NOT NULL,
  `S2` tinytext DEFAULT NULL,
  `M2` int(3) NOT NULL,
  `S3` tinytext DEFAULT NULL,
  `M3` int(3) NOT NULL,
  `S4` tinytext DEFAULT NULL,
  `M4` int(3) NOT NULL,
  `S5` tinytext DEFAULT NULL,
  `M5` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`id`, `EXAM_NAME`, `S1`, `M1`, `S2`, `M2`, `S3`, `M3`, `S4`, `M4`, `S5`, `M5`) VALUES
(1, '0', '0', 0, '0', 0, '0', 0, '0', 0, '0', 0),
(2, '0', '0', 0, '0', 0, '0', 0, '0', 0, '0', 0),
(3, '#ENTER MAX MARKS OF EACH SUBJECT ABOVE THE SUBJECT NAME', 'test', 0, 'SUB2', 0, 'SUB3', 0, 'SUB4', 0, 'SUB5', 0),
(4, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(6, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(7, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(8, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(9, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(10, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(11, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(12, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(13, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(14, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(15, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(16, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(17, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(18, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(19, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30),
(20, 'Enter Exam name here', 'SUB1', 30, 'SUB2', 30, 'SUB3', 30, 'SUB4', 30, 'SUB5', 30);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `seat_no` tinytext NOT NULL,
  `stud_name` tinytext NOT NULL,
  `mother_name` tinytext NOT NULL,
  `m1` int(3) NOT NULL,
  `m2` int(3) NOT NULL,
  `m3` int(3) NOT NULL,
  `m4` int(3) NOT NULL,
  `m5` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `exam_id`, `seat_no`, `stud_name`, `mother_name`, `m1`, `m2`, `m3`, `m4`, `m5`) VALUES
(61, 15, '', 'NAME 1', 'NAME 1', 30, 25, 12, 25, 15),
(62, 15, '', 'NAME 2', 'NAME 2', 23, 12, 16, 28, 9),
(63, 15, '', 'NAME 3', 'NAME 3', 16, 23, 20, 24, 3),
(64, 15, '', 'NAME 4', 'NAME 4', 9, 16, 24, 16, 4),
(65, 15, '', 'NAME 5', 'NAME 5', 23, 9, 28, 20, 25),
(66, 15, '', 'NAME 6', 'NAME 6', 9, 16, 16, 24, 16),
(67, 15, '', 'NAME 7', 'NAME 7', 9, 20, 24, 16, 25),
(68, 15, '', 'NAME 8', 'NAME 8', 23, 24, 15, 20, 30),
(69, 16, 's1', 'NAME 1', 'NAME 1', 30, 25, 12, 25, 15),
(70, 16, 's2', 'NAME 2', 'NAME 2', 23, 12, 16, 28, 9),
(71, 16, 's3', 'NAME 3', 'NAME 3', 16, 23, 20, 24, 3),
(72, 16, 's4', 'NAME 4', 'NAME 4', 9, 16, 24, 16, 4),
(73, 16, 's5', 'NAME 5', 'NAME 5', 23, 9, 28, 20, 25),
(74, 16, 's6', 'NAME 6', 'NAME 6', 9, 16, 16, 24, 16),
(75, 16, 's7', 'NAME 7', 'NAME 7', 9, 20, 24, 16, 25),
(76, 16, 's8', 'NAME 8', 'NAME 8', 23, 24, 15, 20, 30),
(84, 17, 's1', 'NAME 1', 'NAME 1', 30, 25, 12, 25, 15),
(85, 17, 's2', 'NAME 2', 'NAME 2', 23, 12, 16, 28, 9),
(86, 17, 's3', 'NAME 3', 'NAME 3', 16, 23, 20, 24, 3),
(87, 17, 's4', 'NAME 4', 'NAME 4', 9, 16, 24, 16, 4),
(88, 17, 's5', 'NAME 5', 'NAME 5', 23, 9, 28, 20, 25),
(89, 17, 's6', 'NAME 6', 'NAME 6', 9, 16, 16, 24, 16),
(90, 17, 's7', 'NAME 7', 'NAME 7', 9, 20, 24, 16, 25),
(91, 17, 's8', 'NAME 8', 'NAME 8', 23, 24, 15, 20, 30),
(99, 18, 's1', 'name 1', 'name 1', 30, 25, 12, 25, 15),
(100, 18, 's2', 'name 2', 'name 2', 23, 12, 16, 28, 9),
(101, 18, 's3', 'name 3', 'name 3', 16, 23, 20, 24, 3),
(102, 18, 's4', 'name 4', 'name 4', 9, 16, 24, 16, 4),
(103, 18, 's5', 'name 5', 'name 5', 23, 9, 28, 20, 25),
(104, 18, 's6', 'name 6', 'name 6', 9, 16, 16, 24, 16),
(105, 18, 's7', 'name 7', 'name 7', 9, 20, 24, 16, 25),
(106, 18, 's8', 'name 8', 'name 8', 23, 24, 15, 20, 30),
(107, 19, 's1', 'name 1', 'name 1', 30, 25, 12, 25, 15),
(108, 19, 's2', 'name 2', 'name 2', 23, 12, 16, 28, 9),
(109, 19, 's3', 'name 3', 'name 3', 16, 23, 20, 24, 3),
(110, 19, 's4', 'name 4', 'name 4', 9, 16, 24, 16, 4),
(111, 19, 's5', 'name 5', 'name 5', 23, 9, 28, 20, 25),
(112, 19, 's6', 'name 6', 'name 6', 9, 16, 16, 24, 16),
(113, 19, 's7', 'name 7', 'name 7', 9, 20, 24, 16, 25),
(114, 19, 's8', 'name 8', 'name 8', 23, 24, 15, 20, 30),
(122, 20, 's1', 'name 1', 'name 1', 30, 25, 12, 25, 15),
(123, 20, 's2', 'name 2', 'name 2', 23, 12, 16, 28, 9),
(124, 20, 's3', 'name 3', 'name 3', 16, 23, 20, 24, 3),
(125, 20, 's4', 'name 4', 'name 4', 9, 16, 24, 16, 4),
(126, 20, 's5', 'name 5', 'name 5', 23, 9, 28, 20, 25),
(127, 20, 's6', 'name 6', 'name 6', 9, 16, 16, 24, 16),
(128, 20, 's7', 'name 7', 'name 7', 9, 20, 24, 16, 25),
(129, 20, 's8', 'name 8', 'name 8', 23, 24, 15, 20, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
