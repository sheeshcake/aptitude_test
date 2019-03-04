-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 06:46 AM
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
-- Table structure for table `admin_t`
--

CREATE TABLE `admin_t` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_t`
--

INSERT INTO `admin_t` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer_t`
--

CREATE TABLE `answer_t` (
  `answer_id` int(11) NOT NULL,
  `answer` varchar(30) DEFAULT NULL,
  `student_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questionare_line_t`
--

CREATE TABLE `questionare_line_t` (
  `rating_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_t`
--

CREATE TABLE `question_t` (
  `question_id` int(11) NOT NULL,
  `question` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating_line_t`
--

CREATE TABLE `rating_line_t` (
  `rating_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `student_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_t`
--

CREATE TABLE `student_t` (
  `student_id` varchar(7) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(6) NOT NULL,
  `username` int(16) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_line_t`
--

CREATE TABLE `subject_line_t` (
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_t`
--

CREATE TABLE `subject_t` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_t`
--

INSERT INTO `subject_t` (`subject_id`, `subject_name`) VALUES
(1, 'Programming 1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_t`
--

CREATE TABLE `teacher_t` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(30) NOT NULL,
  `department` varchar(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_t`
--
ALTER TABLE `admin_t`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answer_t`
--
ALTER TABLE `answer_t`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `fk_answer_t_student_t1` (`student_id`);

--
-- Indexes for table `questionare_line_t`
--
ALTER TABLE `questionare_line_t`
  ADD KEY `fk_questionare_line_t_rating_line_t1` (`rating_id`),
  ADD KEY `fk_questionare_line_t_question_t1` (`question_id`),
  ADD KEY `fk_questionare_line_t_admin_t1` (`admin_id`);

--
-- Indexes for table `question_t`
--
ALTER TABLE `question_t`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `rating_line_t`
--
ALTER TABLE `rating_line_t`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `fk_rating_line_t_student_t1` (`student_id`);

--
-- Indexes for table `student_t`
--
ALTER TABLE `student_t`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject_line_t`
--
ALTER TABLE `subject_line_t`
  ADD KEY `fk_subject_line_t_teacher_t1` (`teacher_id`),
  ADD KEY `fk_subject_line_t_subject_t1` (`subject_id`),
  ADD KEY `fk_subject_line_t_student_t1` (`student_id`);

--
-- Indexes for table `subject_t`
--
ALTER TABLE `subject_t`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher_t`
--
ALTER TABLE `teacher_t`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_t`
--
ALTER TABLE `admin_t`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer_t`
--
ALTER TABLE `answer_t`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_t`
--
ALTER TABLE `question_t`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_line_t`
--
ALTER TABLE `rating_line_t`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_t`
--
ALTER TABLE `subject_t`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_t`
--
ALTER TABLE `teacher_t`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_t`
--
ALTER TABLE `answer_t`
  ADD CONSTRAINT `fk_answer_t_student_t1` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`);

--
-- Constraints for table `questionare_line_t`
--
ALTER TABLE `questionare_line_t`
  ADD CONSTRAINT `fk_questionare_line_t_admin_t1` FOREIGN KEY (`admin_id`) REFERENCES `admin_t` (`admin_id`),
  ADD CONSTRAINT `fk_questionare_line_t_question_t1` FOREIGN KEY (`question_id`) REFERENCES `question_t` (`question_id`),
  ADD CONSTRAINT `fk_questionare_line_t_rating_line_t1` FOREIGN KEY (`rating_id`) REFERENCES `rating_line_t` (`rating_id`);

--
-- Constraints for table `rating_line_t`
--
ALTER TABLE `rating_line_t`
  ADD CONSTRAINT `fk_rating_line_t_student_t1` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`);

--
-- Constraints for table `subject_line_t`
--
ALTER TABLE `subject_line_t`
  ADD CONSTRAINT `fk_subject_line_t_student_t1` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`),
  ADD CONSTRAINT `fk_subject_line_t_subject_t1` FOREIGN KEY (`subject_id`) REFERENCES `subject_t` (`subject_id`),
  ADD CONSTRAINT `fk_subject_line_t_teacher_t1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_t` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
