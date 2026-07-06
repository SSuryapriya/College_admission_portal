-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2026 at 05:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `father` varchar(100) DEFAULT NULL,
  `mother` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `mark` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `marksheet` varchar(255) DEFAULT NULL,
  `tc` varchar(255) DEFAULT NULL,
  `aadhar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `aadhar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicatio`
--

CREATE TABLE `applicatio` (
  `id` int(11) NOT NULL,
  `app_id` varchar(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `school_name` varchar(150) DEFAULT NULL,
  `year_passing` year(4) DEFAULT NULL,
  `mark_12th` decimal(5,2) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `medium` varchar(50) DEFAULT NULL,
  `applied_on` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `marksheet` varchar(255) DEFAULT NULL,
  `tc` varchar(255) DEFAULT NULL,
  `aadhar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicatio`
--

INSERT INTO `applicatio` (`id`, `app_id`, `name`, `dob`, `address`, `gender`, `father_name`, `mother_name`, `school_name`, `year_passing`, `mark_12th`, `email`, `course`, `medium`, `applied_on`, `status`, `marksheet`, `tc`, `aadhar`) VALUES
(3, 'A002', 'Suryapriya S', '2005-09-12', 'Kovilpatti', 'Female', 'selvam', 'deepa', 'everst', '2023', 80.00, 'surya@gmail.com', 'BCA', 'tamil', '2025-09-29', 'Rejected', 'uploads/68da96c3744fa.png', 'uploads/68da96c374b0c.png', 'uploads/68da96c375016.png'),
(13, 'A004', 'Parami', '2006-03-18', 'madurai', 'Female', 'Baskar', 'Baskar', 'Lakshmi mills Hr.Sec School', '2023', 80.00, 'parami@gmail.com', 'B.Sc Computer Science', 'Tamil', '2025-10-11', 'Selected', 'uploads/68ea5f8c829be.pdf', 'uploads/68ea5f8c831f2.pdf', 'uploads/68ea5f8c839d8.pdf'),
(15, 'A014', 'surya', '2005-09-12', 'Kovilpatti', 'Female', 'Selvam A', 'Muthudeepa S', 'Everest hr.sec school', '2023', 85.00, 'surya077@gmail.com', 'BCA', 'Tamil', '2025-10-17', 'Selected', 'uploads/68f2397260061.pdf', 'uploads/68f2397260390.pdf', 'uploads/68f2397260565.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `applicant_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `course_applied` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `correspondence_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `tc_file` varchar(255) DEFAULT NULL,
  `marksheet_file` varchar(255) DEFAULT NULL,
  `aadhar_file` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Under Review','Approved','Rejected') DEFAULT 'Pending',
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `school_name` varchar(150) NOT NULL,
  `year_of_passing` year(4) NOT NULL,
  `twelfth_mark` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `preference_1` varchar(100) NOT NULL,
  `preference_2` varchar(100) NOT NULL,
  `medium_of_study` varchar(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `tc` varchar(255) DEFAULT NULL,
  `marksheet` varchar(255) DEFAULT NULL,
  `aadhar` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Selected','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `seats`, `duration`) VALUES
(1, 'B.Sc Computer Science', 45, '3 years'),
(2, 'B.Sc Physics', 40, '3 years'),
(3, 'B.Sc Maths', 40, '3 years'),
(4, 'B.Sc Chemistry', 40, '3 years'),
(5, 'B.A English', 45, '3 years'),
(6, 'B.A History', 40, '3 years'),
(7, 'BBA', 45, '3 years'),
(9, 'B.Com', 50, '3 years'),
(10, 'BCA', 45, '4 years');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_time` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_name`, `course`, `amount`, `payment_method`, `payment_time`, `status`) VALUES
(1, 'surya', 'BCA', 200.00, 'UPI', '2025-09-21 12:59:51', 'Success'),
(4, 'Parami', 'B.Sc Computer Science', 2000.00, 'UPI', '2025-10-11 15:47:46', 'Success'),
(5, '', '', 0.00, '', '2025-10-17 14:43:17', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `password`) VALUES
(1, 'pooja', 'pooja@gmail.com', '9089786555', '56565'),
(2, '', '', '', ''),
(3, 'parameshwari', 'parami2@gmail.com', '9089786555', '7890'),
(4, '', '', '', ''),
(5, '', '', '', ''),
(6, 'surya', 'surya@gmail.com', '8681988561', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicatio`
--
ALTER TABLE `applicatio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_id` (`app_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicatio`
--
ALTER TABLE `applicatio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
