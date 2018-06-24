-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 07:04 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_log`
--

CREATE TABLE `attendance_log` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `session_id` int(11) NOT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer_entered` varchar(1000) DEFAULT NULL,
  `true_or_false` varchar(6) DEFAULT NULL,
  `feedback` varchar(1000) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_log`
--

INSERT INTO `attendance_log` (`id`, `student_name`, `roll_number`, `attendance_status`, `session_id`, `question`, `answer_entered`, `true_or_false`, `feedback`, `created`) VALUES
(2, 'John Wick', '4pa14cs001', 'PRESENT', 2, NULL, 'N/A', NULL, NULL, '2018-05-03 01:17:44'),
(7, 'John Wick', '4pa14cs001', 'PRESENT', 5, 'What is your name?', 'Spiderman', 'TRUE', 'very good', '2018-05-03 10:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `teacher` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `option_1` varchar(1000) NOT NULL,
  `option_2` varchar(1000) NOT NULL,
  `option_3` varchar(1000) DEFAULT 'N/A',
  `option_4` varchar(1000) DEFAULT 'N/A',
  `answer` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `subject`, `teacher`, `password`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `created`) VALUES
(1, 'Maths', 'Reena', 'chocolate', '', '', '', 'N/A', 'N/A', NULL, '2018-05-03 01:27:44'),
(2, 'Science', 'Geetha', 'pineapple', '', '', '', 'N/A', 'N/A', NULL, '2018-04-30 02:31:59'),
(3, 'English', 'Smitha', 'pancake', '', '', '', 'N/A', 'N/A', NULL, '2018-04-30 10:20:23'),
(5, 'Superhero', 'Steve', 'avengers', 'What is your name?', 'Spiderman', 'Superman', 'Batman', 'Hulk', 1, '2018-05-03 09:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll_number`, `password`) VALUES
(1, 'Adam Warlock', '4pa14cs002', '12345'),
(2, 'John Wick', '4pa14cs001', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `user_name`, `password`) VALUES
(1, 'Teacher 1', 'teacher1', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
