-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 11:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(10) NOT NULL,
  `control_access` varchar(50) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  `time_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `control_access`, `date_created`, `time_created`) VALUES
(3, 'martins', '02/Nov/2016', '2016-11-02 10:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `administratives`
--

CREATE TABLE `administratives` (
  `id` int(10) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `school_motto` varchar(255) DEFAULT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `school_stamp` varchar(255) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `administratives`
--

INSERT INTO `administratives` (`id`, `school_name`, `school_motto`, `school_logo`, `school_stamp`, `upload_date`, `upload_time`) VALUES
(8, 'SURE FOUNDATION COMPREHENSIVE COLLEGE', 'No. 33 Ada George Road, Rivers State, Nigeria', 'admin/logo.JPG', 'admin/sig.JPG', '15/Dec/2024', '2024-12-15 09:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) NOT NULL,
  `classes` varchar(50) DEFAULT NULL,
  `date_added` varchar(50) DEFAULT NULL,
  `time_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classes`, `date_added`, `time_added`) VALUES
(6, 'JSS1', '30/Oct/2016', '2016-10-30 12:07:47'),
(7, 'JSS2', '30/Oct/2016', '2016-10-30 12:10:34'),
(8, 'JSS3', '30/Oct/2016', '2016-10-30 12:10:42'),
(12, 'SSS1', '14/Nov/2016', '2016-11-14 17:49:51'),
(13, 'SSS2', '14/Nov/2016', '2016-11-14 17:49:58'),
(15, 'SSS3', '24/Dec/2016', '2016-12-24 18:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `current_season`
--

CREATE TABLE `current_season` (
  `id` int(10) NOT NULL,
  `current_session` varchar(20) DEFAULT NULL,
  `current_term` varchar(50) DEFAULT NULL,
  `date_declared` varchar(50) DEFAULT NULL,
  `time_declared` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `current_season`
--

INSERT INTO `current_season` (`id`, `current_session`, `current_term`, `date_declared`, `time_declared`) VALUES
(1, '2024/2025', 'First Term', '30/Oct/2016', '2016-10-30 10:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `id` int(10) NOT NULL,
  `end_of_term` varchar(50) DEFAULT NULL,
  `next_term_begins` varchar(50) DEFAULT NULL,
  `date_declared` varchar(50) DEFAULT NULL,
  `time_declared` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`id`, `end_of_term`, `next_term_begins`, `date_declared`, `time_declared`) VALUES
(2, '0', '30/01/2017', '25/Dec/2016', '2016-12-25 11:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `jss`
--

CREATE TABLE `jss` (
  `id` int(10) NOT NULL,
  `jss_subjects` varchar(100) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jss`
--

INSERT INTO `jss` (`id`, `jss_subjects`, `upload_date`, `upload_time`) VALUES
(6, 'Business Studies', '28/Oct/2016', '2016-10-28 03:53:55'),
(7, 'Social Studies', '28/Oct/2016', '2016-10-28 03:54:08'),
(8, 'Physical &amp; Health Education', '28/Oct/2016', '2016-10-28 03:54:14'),
(9, 'Computer Science', '28/Oct/2016', '2016-10-28 03:54:19'),
(10, 'Basic Education', '28/Oct/2016', '2016-10-28 03:54:26'),
(11, 'Civic Education', '28/Oct/2016', '2016-10-28 03:54:32'),
(12, 'Introductory Technology', '28/Oct/2016', '2016-10-28 03:54:36'),
(13, 'Mathematics', '17/Jan/2017', '2017-01-17 17:14:12'),
(14, 'English Language', '17/Jan/2017', '2017-01-17 17:14:21'),
(15, 'Agric Science', '17/Jan/2017', '2017-01-17 17:14:39'),
(16, 'Christian Religious Knowledge', '17/Jan/2017', '2017-01-17 17:14:47'),
(17, 'Home Economics', '17/Jan/2017', '2017-01-17 17:14:53'),
(18, 'French', '17/Jan/2017', '2017-01-17 17:15:29'),
(19, 'Literature in English', '17/Jan/2017', '2017-01-17 17:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `jss_subject_number`
--

CREATE TABLE `jss_subject_number` (
  `id` int(10) NOT NULL,
  `number_of_subject` int(10) DEFAULT NULL,
  `declared_date` varchar(20) DEFAULT NULL,
  `declared_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jss_subject_number`
--

INSERT INTO `jss_subject_number` (`id`, `number_of_subject`, `declared_date`, `declared_time`) VALUES
(1, 15, '01/Nov/2016', '2016-11-01 04:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `pin1`
--

CREATE TABLE `pin1` (
  `id` int(10) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `first_term_pin` varchar(100) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `upload_date` varchar(20) DEFAULT NULL,
  `upload_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pin1`
--

INSERT INTO `pin1` (`id`, `term`, `first_term_pin`, `serial_number`, `upload_date`, `upload_time`) VALUES
(132, 'First Term', '5593224238514389', '202412150', '15/Dec/2024', '2024-12-15 14:18:03'),
(133, 'First Term', '5550616915250430', '202412151', '15/Dec/2024', '2024-12-15 14:18:03'),
(134, 'First Term', '5565918312054990', '202412152', '15/Dec/2024', '2024-12-15 14:18:03'),
(135, 'First Term', '5599873685756277', '202412153', '15/Dec/2024', '2024-12-15 14:18:03'),
(136, 'First Term', '5500608368217400', '202412154', '15/Dec/2024', '2024-12-15 14:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `pin2`
--

CREATE TABLE `pin2` (
  `id` int(10) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `second_term_pin` varchar(100) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `upload_date` varchar(100) DEFAULT NULL,
  `upload_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pin3`
--

CREATE TABLE `pin3` (
  `id` int(10) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `third_term_pin` varchar(50) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `upload_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) NOT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `students_sub_total` int(50) DEFAULT NULL,
  `students_sub_average` float(11,3) DEFAULT NULL,
  `class_position` int(10) DEFAULT NULL,
  `upload_date` varchar(20) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `reg_number`, `name`, `class`, `term`, `session`, `students_sub_total`, `students_sub_average`, `class_position`, `upload_date`, `upload_time`) VALUES
(32, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'First Term', '2024/2025', 279, 18.600, 1, '15/Dec/2024', '2024-12-15 14:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `results1`
--

CREATE TABLE `results1` (
  `id` int(10) NOT NULL,
  `class` varchar(10) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `reg_number` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `subjects` varchar(100) DEFAULT NULL,
  `ca` int(10) DEFAULT NULL,
  `project` int(10) DEFAULT NULL,
  `exam` int(10) DEFAULT NULL,
  `subject_total` int(10) DEFAULT NULL,
  `subject_rank` int(10) DEFAULT NULL,
  `date_of_upload` varchar(20) DEFAULT NULL,
  `time_of_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `results1`
--

INSERT INTO `results1` (`id`, `class`, `term`, `session`, `reg_number`, `name`, `subjects`, `ca`, `project`, `exam`, `subject_total`, `subject_rank`, `date_of_upload`, `time_of_upload`) VALUES
(273, 'JSS1', 'First Term', '2024/2025', '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'Business Studies', 12, 5, 33, 50, 1, '15/Dec/2024', '2024-12-15 14:04:44'),
(274, 'JSS1', 'First Term', '2024/2025', '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'Social Studies', 22, 1, 44, 67, 1, '15/Dec/2024', '2024-12-15 14:05:07'),
(275, 'JSS1', 'First Term', '2024/2025', '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'Physical &amp; Health Education', 22, 1, 66, 89, 1, '15/Dec/2024', '2024-12-15 14:05:29'),
(276, 'JSS1', 'First Term', '2024/2025', '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'Computer Science', 11, 7, 55, 73, 1, '15/Dec/2024', '2024-12-15 14:05:52'),
(277, 'JSS1', 'First Term', '2024/2025', '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'Home Economics', 22, 4, 23, 49, 1, '15/Dec/2024', '2024-12-15 21:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) NOT NULL,
  `sessions` varchar(20) DEFAULT NULL,
  `date_added` varchar(50) DEFAULT NULL,
  `time_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `sessions`, `date_added`, `time_added`) VALUES
(5, '2024/2025', '15/Dec/2024', '2024-12-15 08:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `sss`
--

CREATE TABLE `sss` (
  `id` int(10) NOT NULL,
  `sss_subjects` varchar(100) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sss`
--

INSERT INTO `sss` (`id`, `sss_subjects`, `upload_date`, `upload_time`) VALUES
(5, 'Further Maths', '27/Oct/2016', '2016-10-27 18:42:09'),
(6, 'Economics', '27/Oct/2016', '2016-10-27 18:42:13'),
(7, 'Government', '27/Oct/2016', '2016-10-27 18:42:30'),
(8, 'Physics', '27/Oct/2016', '2016-10-27 18:42:47'),
(9, 'Agric Science', '27/Oct/2016', '2016-10-27 18:42:52'),
(10, 'Geography', '28/Oct/2016', '2016-10-28 12:21:51'),
(11, 'Commerce', '28/Oct/2016', '2016-10-28 12:21:58'),
(12, 'Christian Religious Education', '28/Oct/2016', '2016-10-28 12:22:02'),
(13, 'Literature', '28/Oct/2016', '2016-10-28 12:22:16'),
(14, 'Accounting', '28/Oct/2016', '2016-10-28 12:22:21'),
(15, 'Mathematics', '29/Dec/2016', '2016-12-29 12:41:14'),
(16, 'English Language', '29/Dec/2016', '2016-12-29 12:41:23'),
(17, 'Biology', '29/Dec/2016', '2016-12-29 12:41:30'),
(18, 'Chemistry', '29/Dec/2016', '2016-12-29 12:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `sss_subject_number`
--

CREATE TABLE `sss_subject_number` (
  `id` int(10) NOT NULL,
  `number_of_subject` int(10) DEFAULT NULL,
  `declared_date` varchar(20) DEFAULT NULL,
  `declared_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sss_subject_number`
--

INSERT INTO `sss_subject_number` (`id`, `number_of_subject`, `declared_date`, `declared_time`) VALUES
(1, 9, '01/Nov/2016', '2016-11-01 04:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `othername` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `mob` varchar(50) DEFAULT NULL,
  `yob` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `sponsor_name` varchar(50) DEFAULT NULL,
  `sponsor_phone` varchar(20) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `gen_password` varchar(20) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `date_of_reg` varchar(20) DEFAULT NULL,
  `time_of_reg` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `gender`, `firstname`, `lastname`, `othername`, `dob`, `mob`, `yob`, `contact_phone`, `address`, `state`, `nationality`, `sponsor_name`, `sponsor_phone`, `relationship`, `class`, `reg_number`, `gen_password`, `passport`, `date_of_reg`, `time_of_reg`) VALUES
(96, 'Female', 'Success', 'Are', 'Iyanuoluwa', '16', 'May', '2016', '08146289869', 'House 9, Ifelodun Estate', 'Kogi', 'Nigerian', 'Are Funmilayo', '08146289869', 'Parent', 'JSS1', '20244JSS1SFCC1', 'sfcc', 'image/Untitled (2).png', '15/Dec/2024', '2024-12-15 10:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `subjects` varchar(100) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `registration_date` varchar(20) DEFAULT NULL,
  `registration_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `reg_number`, `name`, `class`, `subjects`, `term`, `session`, `registration_date`, `registration_time`) VALUES
(376, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Business Studies', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(377, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Social Studies', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(378, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Physical &amp; Health Education', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(379, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Computer Science', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(380, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Basic Education', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(381, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Civic Education', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(382, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Introductory Technology', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(383, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Mathematics', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(384, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'English Language', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(385, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Agric Science', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(386, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Christian Religious Knowledge', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(387, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Home Economics', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(388, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'French', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(389, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS1', 'Literature in English', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 13:57:36'),
(390, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Business Studies', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:04'),
(391, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Social Studies', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:04'),
(392, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Physical &amp; Health Education', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:04'),
(393, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Computer Science', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:04'),
(394, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Basic Education', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:04'),
(395, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Civic Education', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:04'),
(396, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Introductory Technology', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:05'),
(397, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Mathematics', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:05'),
(398, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'English Language', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:05'),
(399, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Agric Science', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:05'),
(400, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Christian Religious Knowledge', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:05'),
(401, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Home Economics', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:05'),
(402, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'French', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:05'),
(403, '20244JSS1SFCC1', 'Success Are Iyanuoluwa', 'JSS2', 'Literature in English', 'First Term', '2024/2025', '15/Dec/2024', '2024-12-15 14:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `lga` text DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_of_reg` varchar(50) DEFAULT NULL,
  `time_of_reg` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `title`, `fullname`, `address`, `phone`, `state`, `lga`, `nationality`, `email`, `password`, `date_of_reg`, `time_of_reg`) VALUES
(17, 'mr', 'Samuel Kolawole Are', 'House 9, Ifelodun Estate', '07046040727', 'Kogi', 'Yagba East', 'Nigerian', 'aremartins801@gmail.com', 'samuel', '15/Dec/2024', '2024-12-15 08:35:16'),
(0, 'miss', 'Success Are', 'House 9, Ifelodun Estate', '07046040727', '--select--', 'DDD', 'Nigerian', 'aresuccess54@gmail.com', 'success', '15/Dec/2024', '2024-12-15 22:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `unused_pins`
--

CREATE TABLE `unused_pins` (
  `id` int(20) NOT NULL,
  `term` varchar(50) DEFAULT NULL,
  `unused_pins` varchar(100) DEFAULT NULL,
  `serial_number` varchar(100) DEFAULT NULL,
  `upload_date` varchar(30) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `unused_pins`
--

INSERT INTO `unused_pins` (`id`, `term`, `unused_pins`, `serial_number`, `upload_date`, `upload_time`) VALUES
(41, 'First Term', '5593224238514389', '202412150', '15/Dec/2024', '2024-12-15 14:18:03'),
(42, 'First Term', '5550616915250430', '202412151', '15/Dec/2024', '2024-12-15 14:18:03'),
(43, 'First Term', '5565918312054990', '202412152', '15/Dec/2024', '2024-12-15 14:18:03'),
(44, 'First Term', '5599873685756277', '202412153', '15/Dec/2024', '2024-12-15 14:18:03'),
(45, 'First Term', '5500608368217400', '202412154', '15/Dec/2024', '2024-12-15 14:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `used_pins`
--

CREATE TABLE `used_pins` (
  `id` int(20) NOT NULL,
  `used_pins` varchar(50) DEFAULT NULL,
  `user_reg_number` varchar(50) DEFAULT NULL,
  `used_count` int(10) DEFAULT NULL,
  `user_class` varchar(50) DEFAULT NULL,
  `used_term` varchar(50) DEFAULT NULL,
  `used_session` varchar(50) DEFAULT NULL,
  `date_used` varchar(50) DEFAULT NULL,
  `time_used` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `lga` text DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_of_reg` varchar(50) DEFAULT NULL,
  `time_of_reg` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `fullname`, `address`, `phone`, `state`, `lga`, `nationality`, `email`, `password`, `date_of_reg`, `time_of_reg`) VALUES
(17, 'mr', 'Martins Kolawole Are', 'House 9, Ifelodun Estate', '07046040727', 'Kogi', 'Yagba East', 'Nigerian', 'aremartins801@gmail.com', 'martins', '15/Dec/2024', '2024-12-15 08:35:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administratives`
--
ALTER TABLE `administratives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_season`
--
ALTER TABLE `current_season`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss`
--
ALTER TABLE `jss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss_subject_number`
--
ALTER TABLE `jss_subject_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin1`
--
ALTER TABLE `pin1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin2`
--
ALTER TABLE `pin2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin3`
--
ALTER TABLE `pin3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results1`
--
ALTER TABLE `results1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss`
--
ALTER TABLE `sss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss_subject_number`
--
ALTER TABLE `sss_subject_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unused_pins`
--
ALTER TABLE `unused_pins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_pins`
--
ALTER TABLE `used_pins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `administratives`
--
ALTER TABLE `administratives`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `current_season`
--
ALTER TABLE `current_season`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `dates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jss`
--
ALTER TABLE `jss`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jss_subject_number`
--
ALTER TABLE `jss_subject_number`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pin1`
--
ALTER TABLE `pin1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `pin2`
--
ALTER TABLE `pin2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pin3`
--
ALTER TABLE `pin3`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `results1`
--
ALTER TABLE `results1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sss`
--
ALTER TABLE `sss`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sss_subject_number`
--
ALTER TABLE `sss_subject_number`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT for table `unused_pins`
--
ALTER TABLE `unused_pins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `used_pins`
--
ALTER TABLE `used_pins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
