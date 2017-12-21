-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 06:33 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syllabus`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `credit` float NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `code`, `name`, `credit`, `semester`) VALUES
(148, '125\r\n', 'Integral Calculus and Differential Equation\r\n', 3, 2),
(149, '126\r\n', 'Statistics and Probability\r\n', 3, 2),
(150, '127\r\n', 'Discrete Mathematics\r\n', 3, 2),
(151, '211\r\n', 'Object Oriented Programming\r\n', 3, 3),
(152, '212\r\n', 'OO Programming Language Practical\r\n', 1.5, 3),
(190, '423\r\n', 'Computer and Network Security\r\n', 3, 8),
(189, '422\r\n', 'Web Engineering Practical\r\n', 1.5, 8),
(188, '421\r\n', 'Web Engineering\r\n', 3, 8),
(187, '417\r\n', 'Digital Signal Processing\r\n', 3, 7),
(186, '416\r\n', 'Peripheral and Interfacing Practical\r\n', 1, 7),
(185, '415\r\n', 'Peripheral and Interfacing\r\n', 3, 7),
(184, '414\r\n', 'Parallel and Distributed Processing\r\n', 3, 7),
(183, '413\r\n', 'Artificial Intelligence and Neural Network\r\n', 3, 7),
(182, '412\r\n', 'Computer Networking Practical\r\n', 1.5, 7),
(181, '411\r\n', 'Computer Networking\r\n', 3, 7),
(180, '328\r\n', 'System Analysis and Design\r\n', 3, 6),
(179, '327\r\n', 'Compiler Design Practical\r\n', 1.5, 6),
(178, '326\r\n', 'Compiler Design\r\n', 3, 6),
(176, '324\r\n', 'Computer Graphics& Multimedia\r\n', 3, 6),
(177, '325\r\n', 'Computer Graphics and Practical\r\n', 1.5, 6),
(175, '323\r\n', 'Numerical Analysis\r\n', 3, 6),
(174, '322\r\n', 'Software Engineering Practical\r\n', 1.5, 6),
(173, '321\r\n', 'Software Engineering\r\n', 3, 6),
(172, '316\r\n', 'Technical Writing & Communications\r\n', 3, 5),
(171, '315\r\n', 'Sociology\r\n', 3, 5),
(169, '313\r\n', 'Assembly Language Practical\r\n', 1.5, 5),
(170, '314\r\n', 'Engineering Mathematics\r\n', 3, 5),
(167, '311\r\n', 'Theory of Computation\r\n', 3, 5),
(168, '312\r\n', 'Microprocessor and Assembly Language\r\n', 3, 5),
(166, '227\r\n', 'Economics\r\n', 3, 4),
(165, '226\r\n', 'Data Communications\r\n', 3, 4),
(164, '225\r\n', 'Computer Organization and Architecture\r\n', 3, 4),
(163, '224\r\n', 'Databese Management System Practical\r\n', 1.5, 4),
(162, '223\r\n', 'Databese Management System\r\n', 3, 4),
(161, '222\r\n', 'Algorithm Design Practical\r\n', 1.5, 4),
(159, '219\r\n', 'Basic Accounting\r\n', 3, 3),
(160, '221\r\n', 'Algorithm Design\r\n', 3, 4),
(158, '218\r\n', 'Electronic Devices and Circuits Practical\r\n', 1.5, 3),
(157, '217\r\n', 'Electronic Devices and Circuits\r\n', 3, 3),
(156, '216\r\n', 'Mathematics For CSE\r\n', 3, 3),
(155, '215\r\n', 'Digital Logic Design Practical\r\n', 1.5, 3),
(153, '213\r\n', 'Operating System\r\n', 3, 3),
(154, '214\r\n', 'Digital Logic Design\r\n', 3, 3),
(147, '124\r\n', 'Introduction to Electrical Engineering Practical\r\n', 1.5, 2),
(146, '123\r\n', 'Introduction to Electrical Engineering\r\n', 3, 2),
(145, '122\r\n', 'Data Structure Practical\r\n', 1.5, 2),
(143, '116\r\n', 'English\r\n', 3, 1),
(144, '121\r\n', 'Data Structure\r\n', 3, 2),
(142, '115\r\n', 'Differential Calculus Ordinate Geometry\r\n', 3, 1),
(141, '114\r\n', 'Physics (Electricity and Magnetism)\r\n', 3, 1),
(140, '113\r\n', 'Programming Language Practical\r\n', 1.5, 1),
(139, '112\r\n', 'Programming Language\r\n', 3, 1),
(138, '111\r\n', 'Introduction to Computer System\r\n', 3, 1),
(191, '42X\r\n', 'Elective Course\r\n', 3, 8),
(192, '499\r\n', 'Project\r\n', 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `id` int(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `details` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cse_user`
--

CREATE TABLE `cse_user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse_user`
--

INSERT INTO `cse_user` (`id`, `name`, `user_name`, `email`, `password`) VALUES
(10, NULL, 'admin', 'admin@nucse.net', 'Admin2018');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id` int(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id` int(10) NOT NULL,
  `semester` int(7) NOT NULL,
  `code` varchar(8) NOT NULL,
  `title` varchar(500) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `cse_user`
--
ALTER TABLE `cse_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `cse_user`
--
ALTER TABLE `cse_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
