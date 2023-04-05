-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 06:10 PM
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
(1, '13:06:00', '2023-04-03', 60);

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
('intage ', 16, 'mintage', 'mintage', 20000, 'mintage', 0, 'book-biology-title-3d-rendering-260nw-1261231615.jpg'),
('download', 17, 'sameer', '888', 20000, 'mintage', 0, 'download.jpg'),
('maths', 20, 'jawad', '2 Months', 2000, 'new age', NULL, 'download2.jpg');

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
(30, 2, '21', '2023-04-02 19:00:03', 1),
(31, 2, 'jidsjfij', '2023-04-02 19:09:17', 1),
(32, 2, 'khfsdhfudf', '2023-04-02 19:09:23', 1);

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
(4, 'Jawad Ahmed', 'jawad.ahmed.dhillow56@gmail.com', 'Gourmet Street Ali Town,Thokar Niaz Baig', 'Lahore', 'Lhore', '53700', 'jawad', 'x+3XKn1hp1XW7FxpPlZZgA==', 'oc', '2018', '355', 0);

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
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `correct_answer` varchar(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tsa_questions`
--

INSERT INTO `tsa_questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_answer`, `subject`, `marks`, `created_at`, `updated_at`) VALUES
(25, 'how', 'hey', 'why', 'you', 'they', 'you', 'Math', 2, '2023-04-01 20:38:34', '2023-04-01 20:38:34'),
(26, 'how', 'hey', 'why', 'you', 'they', 'you', 'Math', 2, '2023-04-01 20:38:47', '2023-04-01 20:38:47');

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
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `user_type`, `password`, `create_date`) VALUES
(1, 'Jawad', 'Ahmed', 2147483647, 'jawad@gmail.com', 'Admin', '$2y$10$K9zmGCpOn.tP9G4XRT2lyO5y./uw0jP58qbnIUx.HuM50XomrPT5i', '2023-03-26 00:07:41'),
(2, 'Jawad567', 'Ahmed', 2147483647, 'jawad1@gmail.com', 'Teacher', '$2y$10$snRahwgdhdVUnaRrd4CLNO0D4UsSR0pI4zx1.G2MBJDROGDaXShB.', '2023-03-26 04:07:49'),
(3, 'sameer', 'sohail', 2147483647, 'sameer@gmail.com', 'Student', '$2y$10$QbHWhZQQago13okZmXaY7.ItlvgNd6FX0yZJ61KhNy36oiXdUG6UK', '2023-04-02 00:48:42'),
(4, 'ali', 'ishaq', 17852, 'ali@gmail.com', 'Teacher', '$2y$10$NNVKSX24QZv9JLayE7tCXOObV9/9owYj0a64ob1CM95QkL94lPICe', '2023-04-04 03:40:08');

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `tsa_questions`
--
ALTER TABLE `tsa_questions`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tsa_questions`
--
ALTER TABLE `tsa_questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tutor_reviews`
--
ALTER TABLE `tutor_reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tutor_reviews`
--
ALTER TABLE `tutor_reviews`
  ADD CONSTRAINT `tutor_reviews_ibfk_1` FOREIGN KEY (`feedback_tutor_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
