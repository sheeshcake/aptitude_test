-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 03:30 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rating_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_t`
--

CREATE TABLE `student_t` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id_number` varchar(8) NOT NULL,
  `department` varchar(6) NOT NULL,
  `username` int(16) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_t`
--

INSERT INTO `student_t` (`id`, `name`, `id_number`, `department`, `username`, `password`) VALUES
(3, 'Wendale Franz Dy', 'C16-0265', 'CECS', 0, 'gabriella143');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_t`
--

CREATE TABLE `teacher_t` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_t`
--

INSERT INTO `teacher_t` (`id`, `name`, `department`, `username`, `password`, `user_type`) VALUES
(2, 'Leonie Abilay', 'CECS', 'leonie', 'abilay', 'teacher'),
(3, 'Fe Porras', 'CECS', 'fe', 'porras', 'dean');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_t`
--
ALTER TABLE `student_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_t`
--
ALTER TABLE `teacher_t`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_t`
--
ALTER TABLE `student_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_t`
--
ALTER TABLE `teacher_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
