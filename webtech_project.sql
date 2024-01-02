-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2024 at 06:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaboration`
--

CREATE TABLE `collaboration` (
  `collaboration_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collaboration`
--

INSERT INTO `collaboration` (`collaboration_id`, `user_id`, `event_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bd112', 2, 'collaborated', '2023-12-27 14:17:41', '2023-12-27 14:18:01'),
(2, 'mostakin1', 1, 'collaborated', '2023-12-27 15:24:02', '2023-12-27 15:24:51'),
(3, 'bd112', 1, 'pending', '2023-12-27 22:32:45', '2023-12-27 22:32:45'),
(4, 'bd112', 1, 'collaborated', '2023-12-27 22:37:04', '2024-01-01 15:52:28'),
(5, 'mostakin1', 1, 'collaborated', '2023-12-30 18:23:38', '2024-01-01 15:52:23'),
(6, 'mostakin1', 1, 'collaborated', '2023-12-30 18:53:17', '2023-12-30 18:57:40'),
(7, 'mostakin1', 2, 'collaborated', '2023-12-30 18:53:20', '2023-12-30 18:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `Event_Name` varchar(20) NOT NULL,
  `Event_Sponsers` varchar(20) NOT NULL,
  `Event_Desc` varchar(20) NOT NULL,
  `Event_sd` datetime NOT NULL,
  `Event_end` datetime NOT NULL,
  `Event_location` varchar(20) NOT NULL,
  `event_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`Event_Name`, `Event_Sponsers`, `Event_Desc`, `Event_sd`, `Event_end`, `Event_location`, `event_id`) VALUES
('Boi Mela', 'Daraz', 'For who love Books', '2023-11-10 00:00:00', '2023-11-16 00:00:00', 'Dhaka', 1),
('Tesla', 'Elon Musk', 'Electric Car', '2023-12-25 00:00:00', '2024-01-24 00:00:00', 'Dhaka', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_entries`
--

CREATE TABLE `feedback_entries` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_entries`
--

INSERT INTO `feedback_entries` (`id`, `user_name`, `feedback`, `submission_date`) VALUES
(1, 'fahim', 'it\'s good', '2023-12-27 14:27:54'),
(2, 'Mostakin', 'Awesome', '2023-12-27 15:25:26'),
(3, 'mostakin', 'adfasdf', '2023-12-27 22:53:26'),
(4, 'fahim', 'kjhkjhjk', '2023-12-27 23:56:15'),
(5, 'fahim', 'Very Good', '2023-12-30 18:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `status` enum('pending','active') DEFAULT 'pending',
  `otp` int(6) DEFAULT NULL,
  `entered_otp` int(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `user_id`, `package`, `status`, `otp`, `entered_otp`, `created_at`) VALUES
(1, 'bd110', '6_months', 'active', 657910, NULL, '2023-12-27 14:35:50'),
(2, 'mostakin1', '3_months', 'active', 749319, NULL, '2023-12-27 15:26:56'),
(3, 'mostakin1', '3_months', 'pending', 475839, NULL, '2023-12-27 23:38:07'),
(4, 'mostakin1', '12_months', 'active', 683734, NULL, '2023-12-27 23:39:28'),
(5, 'mostakin1', '6_months', 'active', 284865, NULL, '2023-12-27 23:57:35'),
(6, 'mostakin1', '3_months', 'pending', 354081, NULL, '2023-12-28 23:48:57'),
(7, 'mostakin1', '12_months', 'active', 638317, NULL, '2023-12-30 19:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(50) DEFAULT NULL,
  `receiver_id` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`) VALUES
(1, 'bd110', 'djdjdj', 'hi', '2023-12-27 14:27:32'),
(2, 'bd110', 'djdjdj', 'hi', '2023-12-27 14:29:56'),
(3, 'mostakin1', 'Apex', 'Hi\r\n', '2023-12-27 15:26:18'),
(4, 'mostakin1', 'jahid', 'Hello\r\n', '2023-12-27 17:48:35'),
(5, 'bd112', 'jahid', 'heelo\r\n', '2023-12-27 23:00:21'),
(7, 'mostakin1', 'Mostakin', 'Hello boy', '2023-12-30 19:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `sender_id` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `sender_id`, `message`, `timestamp`) VALUES
(1, 'mostakin1', NULL, 'Hi', '2024-01-01 14:46:50'),
(2, 'user001', NULL, 'hey', '2024-01-01 15:28:32'),
(3, 'admin1', NULL, 'de', '2024-01-01 15:29:01'),
(4, 'admin1', '0', 'de', '2024-01-01 15:30:46'),
(5, 'mostakin1', '0', 'ttttt', '2024-01-01 15:31:07'),
(6, 'mostakin1', '0', 'aaaa', '2024-01-01 15:32:05'),
(7, 'mostakin1', '0', 'aaaa', '2024-01-01 15:33:03'),
(8, 'mostakin1', '0', 'hey', '2024-01-01 15:33:15'),
(9, 'mostakin1', '0', 'aaaaaa', '2024-01-01 15:35:02'),
(10, 'mostakin1', '0', 'aaaaaa', '2024-01-01 15:36:54'),
(11, 'user001', '0', 'asfasf', '2024-01-01 15:56:04'),
(12, 'user001', 'Admin110', 'asfasf', '2024-01-01 15:56:52'),
(13, 'mostakin1', 'Admin110', 'hey', '2024-01-01 15:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `reg_info`
--

CREATE TABLE `reg_info` (
  `id` varchar(11) NOT NULL,
  `name` varchar(129) NOT NULL,
  `password` varchar(111) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `type` varchar(122) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_info`
--

INSERT INTO `reg_info` (`id`, `name`, `password`, `email`, `gender`, `dob`, `type`, `image`) VALUES
('user001', 'Mostakinlol', '12345678', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'USER', NULL),
('Admin101', 'Mostakinlol', '12345678', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'Admin', NULL),
('user088', 'Mostakinlol', '12345678', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'User', NULL),
('Admin103', 'Mostakinlol', '123456jishad', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'Admin', NULL),
('User110', 'Mostakinlol', '123456jishad', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'User', NULL),
('User111', 'Mostakinlol', '123456jishad', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'User', NULL),
('Admin110', 'Mostakinlol', '123456jishad', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'Admin', NULL),
('bd110', 'Mostakinlol', '123456fahim', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'Influencer', NULL),
('bd112', 'Mostakinlol', '123456fahim', 'mostakin1@gmail.com', 'Female', '2001-07-12', 'Brand', NULL),
('mostakin1', 'asdfasdf', 'mostakin1234', 'mostakin@gmail.com', 'Female', '2024-01-16', 'Brand', '387626643_897213345330222_1631921007942104558_n_1703970106.jpg'),
('admin1', 'Admin', '1234admin', 'admin1@gmail.com', 'Male', '2001-06-05', 'Admin', NULL),
('', 'tesla', '$2y$10$TnNmACN19XqkhbrP4zT11OB0ymYeXAvlfLYON65FiYpHoYj66VE/2', 'tesla@gmail.com', '', '0000-00-00', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `status_text` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes_count` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `user_id`, `status_text`, `image_path`, `created_at`, `likes_count`) VALUES
(12, 'mostakin1', 'i\'m mostakin', 'upload/20230610_205757.jpg', '2023-12-28 20:28:02', 0),
(16, 'bd110', 'Fahim bro', 'upload/20230626_163036.jpg', '2023-12-28 23:02:41', 0),
(17, 'mostakin1', 'Hello Eishat', 'upload/b1ba448a-0d50-4d64-ab72-1a1c345e8faa.jpg', '2023-12-30 18:52:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `support_from_admin`
--

CREATE TABLE `support_from_admin` (
  `Admin` text NOT NULL,
  `User` text NOT NULL,
  `Admin_email` text NOT NULL,
  `Subject` text NOT NULL,
  `Messege` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_from_admin`
--

INSERT INTO `support_from_admin` (`Admin`, `User`, `Admin_email`, `Subject`, `Messege`) VALUES
('Mushfiq', 'Brinta', 'mushfiq@gmail.com', 'Payment', 'Hold patience we will look for it and we will contact you as soon as possible through your email'),
('Russel', 'Hlaching', 'hlaching22@gmail.com', '	Purchase issue', 'Our server is on maintainace. Please wait till than.'),
('Russel', 'DB', 'russel2@gmail.com', 'Registration Issue', 'Please check now '),
('Devdoot', 'DB', 'devdootparial@gmail.com', 'Registration Issue', 'Our site is on under maintaince'),
('Devdoot', 'Jishad', 'jishad@gmail.com', 'login prblm', 'wait till update'),
('punam', 'adityo', 'punam@gmail.com', 'faqs', 'solve');

-- --------------------------------------------------------

--
-- Table structure for table `support_requests`
--

CREATE TABLE `support_requests` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `issue` text NOT NULL,
  `reply` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_requests`
--

INSERT INTO `support_requests` (`id`, `user_id`, `issue`, `reply`, `created_at`) VALUES
(1, 'mostakin1', 'asdfasdf', 'ok', '2023-12-27 16:19:11'),
(2, 'mostakin1', 'I have problem in messaging', 'ok', '2023-12-27 16:20:11'),
(3, 'mostakin1', 'facing problem', 'ok', '2023-12-27 23:27:53'),
(4, 'mostakin1', 'sdfasf', 'ok', '2023-12-27 23:45:20'),
(5, 'mostakin1', 'I cannot login', 'ok', '2023-12-30 19:04:12'),
(6, 'mostakin1', 'login issue', 'ok', '2024-01-01 15:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `Mobile_Number` int(11) NOT NULL,
  `Actions` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_Name`, `User_Email`, `Mobile_Number`, `Actions`) VALUES
(1, 'Brinta', 'brinta@gmail.com', 1883957585, ''),
(2, 'Devdoot', 'devdoot@gmail.com', 1889955588, ''),
(3, 'Hlaching', 'hlaching@gmail.com', 1883569575, ''),
(4, 'kamal', 'kamal@gmail.com', 142426373, ''),
(5, 'Rahim', 'rahim44@gmail.com', 1884974510, ''),
(13, 'dsfd', 'sdfdsf@gmail.com', 1883569575, ''),
(14, 'kamal', 'sdfdsf@gmail.com', 1883569575, ''),
(15, 'Mofiz', 'mofiz77@gmail.com', 177556622, ''),
(21, 'rifat', 'rifat77@gmail.com', 23423423, ''),
(22, 'fahim', 'fahim77@gmail.com', 349238423, ''),
(23, 'hannan', 'hannan@gmail.com', 234324234, 'Suspended');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD PRIMARY KEY (`collaboration_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback_entries`
--
ALTER TABLE `feedback_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_requests`
--
ALTER TABLE `support_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collaboration`
--
ALTER TABLE `collaboration`
  MODIFY `collaboration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback_entries`
--
ALTER TABLE `feedback_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `support_requests`
--
ALTER TABLE `support_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
