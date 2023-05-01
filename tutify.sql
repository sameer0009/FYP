-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 02:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutify`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `id` int(11) NOT NULL,
  `class_time` time NOT NULL,
  `class_date` date NOT NULL,
  `class_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`id`, `class_time`, `class_date`, `class_duration`) VALUES
(1, '13:06:00', '2023-04-03', 60),
(2, '11:37:00', '2023-04-05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_name` varchar(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `course_intsructor` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_price` int(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `id` int(255) DEFAULT NULL,
  `course_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_name`, `course_id`, `course_intsructor`, `course_duration`, `course_price`, `course_description`, `id`, `course_image`) VALUES
('Physics ', 22, 'Jawad', '2 months', 4500, 'Physics is a fundamental branch of science that studies the properties and behavior of matter and energy in the universe. ', NULL, 'phys.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `enrolment`
--
-- Error reading structure for table tutify.enrolment: #1932 - Table &#039;tutify.enrolment&#039; doesn&#039;t exist in engine
-- Error reading data for table tutify.enrolment: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `tutify`.`enrolment`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `enrolmentt`
--

CREATE TABLE `enrolmentt` (
  `enrolment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrolment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `created_at`, `is_read`) VALUES
(0, 2, '10255465', '2023-04-11 21:11:09', 1),
(0, 2, 'jdh', '2023-04-12 16:22:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` text NOT NULL,
  `expmonth` varchar(2) NOT NULL,
  `expyear` varchar(4) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `sameadr` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `fullname`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expmonth`, `expyear`, `cvv`, `sameadr`) VALUES
(1, 'Jawad Ahmed', 'jawad.ahmed.dhillow56@gmail.com', 'Gourmet Street Ali Town,Thokar Niaz Baig', 'Lahore', 'Lhore', '53700', 'jawad', 'xaCVlJYbHuaKhYaOAmPNCw==', 'oc', '2018', '355', 0),
(2, 'Jawad Ahmed', 'jawad.ahmed.dhillow56@gmail.com', 'Gourmet Street Ali Town,Thokar Niaz Baig', 'Lahore', 'Lhore', '53700', 'jawad', 'C6J4xN9g+1hkJbkkWGoIsg==', 'oc', '2018', '355', 0),
(3, 'Jawad Ahmed', 'jawad.ahmed.dhillow56@gmail.com', 'Gourmet Street Ali Town,Thokar Niaz Baig', 'Lahore', 'Lhore', '53700', 'jawad', 'H51KcnYz3lR5VKraTFto0Q==', 'oc', '2018', '355', 0),
(4, 'Jawad Ahmed', 'jawad.ahmed.dhillow56@gmail.com', 'Gourmet Street Ali Town,Thokar Niaz Baig', 'Lahore', 'Lhore', '53700', 'jawad', 'x+3XKn1hp1XW7FxpPlZZgA==', 'oc', '2018', '355', 0),
(5, '', '', '', '', '', '', '', 'SHjVLDjC4z1yQtiOCr4wgQ==', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile_s`
--

CREATE TABLE `profile_s` (
  `address` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `picture` longblob NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_s`
--

INSERT INTO `profile_s` (`address`, `postal_code`, `area`, `country`, `state`, `picture`, `id`) VALUES
('Gourmet Street Ali Town,Thokar Niaz Baig', '53700', 'asd', 'Pakistan', 'Lhore', 0x626f6f6b2d62696f6c6f67792d7469746c652d33642d72656e646572696e672d3236306e772d313236313233313631352e6a7067, 3);

-- --------------------------------------------------------

--
-- Table structure for table `profile_t`
--

CREATE TABLE `profile_t` (
  `address` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `ehistory` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `degree` longblob NOT NULL,
  `picture` longblob NOT NULL,
  `hourly_rate` decimal(10,2) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_t`
--

INSERT INTO `profile_t` (`address`, `postal_code`, `area`, `country`, `state`, `ehistory`, `experience`, `degree`, `picture`, `hourly_rate`, `id`) VALUES
('malik colony near high school no 1 phool nagar', '55260', 'Lahore', 'Pakistan', 'Lahore', 'nill', '2 year', 0x73616d6d6d6d2e706466, 0x3333332e6a7067, '50.00', 2),
('malik colony near high school no 1 phool nagar', '55260', 'Lahore', 'Pakistan', 'Lahore', 'nill', 'Computer science', 0x426c6f636b636861696e20546563686e6f6c6f67792e706466, 0x3333332e6a7067, '50.00', 4),
('malik colony near high school no 1 phool nagar', '55260', 'Lahore', 'Pakistan', 'Lahore', 'nill', 'Cloud Computing', 0x7175657374696f6e732e706466, 0x312e6a7067, '100.00', 6),
('h1 121 sabzazar lahore', '5700', 'Lahore', 'Pakistan', 'Lahore', 'nill', '2 year', 0x6a617761642e706466, 0x312e6a7067, '100.00', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `subject`) VALUES
(1, 'English'),
(4, 'computer'),
(5, 'Physics ');

-- --------------------------------------------------------

--
-- Table structure for table `tsa_questions`
--

CREATE TABLE `tsa_questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `correct_answer` varchar(110) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tsa_questions`
--

INSERT INTO `tsa_questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_answer`, `subject`, `marks`, `created_at`, `updated_at`) VALUES
(28, 'childhood friends name?', 'umar', 'ali', 'farzal', 'none of above', 'none of above', 'Science', 1, '2023-04-06 05:27:13', '2023-04-09 18:25:16'),
(29, 'what is this?', 'boll', 'script', 'mobile', 'none of above', 'none of above', 'English', 1, '2023-04-09 16:16:09', '2023-04-09 18:25:22'),
(30, 'what is this?', 'boll', 'script', 'mobile', 'none of above', 'none of above', 'english', 1, '2023-04-09 16:21:55', '2023-04-09 18:25:26'),
(31, 'life on earth', 'easy', 'diificult', 'dsjkh', 'none of above', 'easy', 'Science', 1, '2023-04-09 17:14:21', '2023-04-09 17:14:21'),
(32, '20+20', '40', '50', '30', '0', '40', 'Math', 1, '2023-04-09 17:19:16', '2023-04-09 17:19:16'),
(33, 'what is computer?', 'Machine', 'calculator', 'nothing', 'option4', 'machine', 'computer', 1, '2023-04-09 18:57:32', '2023-04-09 18:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `tsa_quiz_results`
--

CREATE TABLE `tsa_quiz_results` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_reviews`
--

CREATE TABLE `tutor_reviews` (
  `id` int(255) NOT NULL,
  `feedback_tutor_id` int(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_name` varchar(255) NOT NULL,
  `tutor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor_reviews`
--

INSERT INTO `tutor_reviews` (`id`, `feedback_tutor_id`, `student_id`, `rating`, `comment`, `created_at`, `student_name`, `tutor_name`) VALUES
(32, 2, 3, 5, 'hooo gyaaaa', '2023-04-04 11:40:48', 'sameer', 'Jawad567'),
(33, 4, 3, 5, 'ok', '2023-04-04 11:41:32', 'sameer', 'ali');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `user_type`, `password`, `verification_code`, `create_date`) VALUES
(1, 'Jawad', 'Ahmed', 2147483647, 'jawad@gmail.com', 'Admin', '$2y$10$K9zmGCpOn.tP9G4XRT2lyO5y./uw0jP58qbnIUx.HuM50XomrPT5i', NULL, '2023-03-26 00:07:41'),
(2, 'Jawad.', 'Ahmed', 2147483647, 'jawad1@gmail.com', 'Teacher', '$2y$10$snRahwgdhdVUnaRrd4CLNO0D4UsSR0pI4zx1.G2MBJDROGDaXShB.', NULL, '2023-03-26 04:07:49'),
(3, 'sameer', 'sohail', 2147483647, 'sameer@gmail.com', 'Student', '$2y$10$QbHWhZQQago13okZmXaY7.ItlvgNd6FX0yZJ61KhNy36oiXdUG6UK', NULL, '2023-04-02 00:48:42'),
(4, 'ali', 'ishaq', 17852, 'ali@gmail.com', 'Teacher', '$2y$10$NNVKSX24QZv9JLayE7tCXOObV9/9owYj0a64ob1CM95QkL94lPICe', NULL, '2023-04-04 03:40:08'),
(20, 'sohail', 'ishaq', 1584564, 'sohail@gmail.com', 'Tutor', '$2y$10$w7xmCYvhaxH.MB8ZsqCs/ezq9cUM51Zxj6dlFXq3H53B/P9yyQXam', NULL, '2023-04-12 21:24:32'),
(25, 'Muhammad Sameer', 'sohail', 2147483647, 'sameersohail0009@gmail.com', 'Teacher', '$2y$10$3cNmOKn6qpmz0AMPG7/I.eY7aNXPxsTOpubkCXnTvtUM6kezzX6He', 'ab9805015e5906cb800f122c0b11bdba', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `enrolmentt`
--
ALTER TABLE `enrolmentt`
  ADD PRIMARY KEY (`enrolment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_s`
--
ALTER TABLE `profile_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_t`
--
ALTER TABLE `profile_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsa_questions`
--
ALTER TABLE `tsa_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsa_quiz_results`
--
ALTER TABLE `tsa_quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `tutor_reviews`
--
ALTER TABLE `tutor_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_tutor_id` (`feedback_tutor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `enrolmentt`
--
ALTER TABLE `enrolmentt`
  MODIFY `enrolment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tsa_questions`
--
ALTER TABLE `tsa_questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tsa_quiz_results`
--
ALTER TABLE `tsa_quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tutor_reviews`
--
ALTER TABLE `tutor_reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `enrolmentt`
--
ALTER TABLE `enrolmentt`
  ADD CONSTRAINT `enrolmentt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `enrolmentt_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `tsa_quiz_results`
--
ALTER TABLE `tsa_quiz_results`
  ADD CONSTRAINT `tsa_quiz_results_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `tblsubjects` (`id`);

--
-- Constraints for table `tutor_reviews`
--
ALTER TABLE `tutor_reviews`
  ADD CONSTRAINT `tutor_reviews_ibfk_1` FOREIGN KEY (`feedback_tutor_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
