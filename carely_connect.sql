-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2025 at 08:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Database: `carely_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `room_id`, `contact`, `message`, `created_at`) VALUES
(1, 'Room101', '+8801891983888', 'Need assistance with medication', '2025-10-04 16:53:58'),
(2, 'Room205', '+8801234567890', 'Fell down, urgent help required', '2025-10-04 16:53:58'),
(3, '2312', '019182112123', 'help her', '2025-10-04 16:54:32'),
(4, '2312', '019182112123', 'help her', '2025-10-04 16:55:10'),
(5, '23423', '019182112123', 'ertertert', '2025-10-13 17:31:47'),
(6, '456', '019182112123', 'Powe supply', '2025-10-14 15:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `blood_pressure`
--

CREATE TABLE `blood_pressure` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `systolic` int(11) NOT NULL,
  `diastolic` int(11) NOT NULL,
  `reading_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `medication` decimal(10,2) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `doctor_fees` decimal(10,2) NOT NULL,
  `donation` decimal(10,2) NOT NULL,
  `utility_cost` decimal(10,2) NOT NULL,
  `maintenance` decimal(10,2) NOT NULL,
  `events_cost` decimal(10,2) NOT NULL,
  `food_cost` decimal(10,2) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `medication`, `salary`, `doctor_fees`, `donation`, `utility_cost`, `maintenance`, `events_cost`, `food_cost`, `date_added`) VALUES
(1, 45000.00, 15000.00, 50000.00, 5000.00, 13000.00, 70000.00, 7000.00, 29000.00, '2025-10-14 08:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_at`) VALUES
(12, 'sdedsd', 'hussss', 'usmsisir@gmail.com', '01891983888', 'esfsfs', '2025-10-14 15:31:53'),
(14, 'sdedsd', 'hussss', 'usmsisir@gmail.com', '01891983888', 'sedfsf', '2025-10-15 08:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `contributors`
--

CREATE TABLE `contributors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contributors`
--

INSERT INTO `contributors` (`id`, `name`, `avatar_url`, `message`, `created_at`, `is_featured`) VALUES
(1, 'Shihab Khan', 'https://via.placeholder.com/50?text=SK', 'We are honored to support your care home. It brings us great joy to contribute to such a warm and nurturing environment. We admire the dedication you put into making this home a wonderful place for all residents.', '2025-10-04 17:41:49', 1),
(2, 'Afsana Islam', 'https://via.placeholder.com/50?text=AI', 'We are honored to support your care home. It brings us great joy to contribute to such a warm and nurturing environment. We admire the dedication you put into making this home a wonderful place for all residents.', '2025-10-04 17:41:49', 1),
(3, 'Nahid Hassan', 'https://via.placeholder.com/50?text=NH', 'It is our pleasure to contribute to your wonderful care home. We are inspired by the dedication and compassion you show every day, and the donation helps to support our community.', '2025-10-04 17:41:49', 1),
(4, 'Shihab Khan', 'https://via.placeholder.com/50?text=SK', 'We are honored to support your care home. It brings us great joy to contribute to such a warm and nurturing environment. We admire the dedication you put into making this home a wonderful place for all residents.', '2025-10-04 17:44:40', 1),
(5, 'Afsana Islam', 'https://via.placeholder.com/50?text=AI', 'We are honored to support your care home. It brings us great joy to contribute to such a warm and nurturing environment. We admire the dedication you put into making this home a wonderful place for all residents.', '2025-10-04 17:44:40', 1),
(6, 'Nahid Hassan', 'https://via.placeholder.com/50?text=NH', 'It is our pleasure to contribute to your wonderful care home. We are inspired by the dedication and compassion you show every day, and the donation helps to support our community.', '2025-10-04 17:44:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_email` varchar(255) NOT NULL,
  `donor_phone` varchar(20) NOT NULL,
  `donation_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('bkash','nagad','rocket','jamuna_bank') NOT NULL,
  `donation_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `donor_email`, `donor_phone`, `donation_amount`, `payment_method`, `donation_date`, `created_at`) VALUES
(4, 'riad', 'heysifat@gmail.com', '01881281232', 5000.00, 'bkash', '2025-10-15 13:58:23', '2025-10-15 07:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `event_time`, `location`, `description`, `date_added`) VALUES
(1, 'Yoga', '2025-10-02', '14:11:00', 'dhaka', 'sdfsdf', '2025-10-14 10:08:05'),
(2, 'Yoga', '2025-10-02', '15:50:00', 'dhaka', 'new', '2025-10-14 11:46:52');

-- --------------------------------------------------------



--
-- Dumping data for table `financial_assistance`
--

INSERT INTO `financial_assistance` (`id`, `name`, `age`, `gender`, `qualification`, `contact`, `yearly_salary`, `present_address`, `permanent_address`, `opinion`, `created_at`) VALUES
(1, 'sifat', 25, 'male', 'Honors', '01891983888', 25000.00, 'badda', 'Natore', 'Hello, I want to join here.', '2025-10-14 07:23:53'),
(2, 'sifat', 25, 'male', 'Honors', '01891983888', 25000.00, 'badda', 'Natore', 'i want yo join\r\n', '2025-10-14 14:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `food_preferences`
--

CREATE TABLE `food_preferences` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `bed_no` varchar(50) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `salty` enum('regular','non') DEFAULT NULL,
  `sugar` enum('regular','non') DEFAULT NULL,
  `spicy` enum('regular','non') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_preferences`
--

INSERT INTO `food_preferences` (`id`, `name`, `age`, `bed_no`, `room_no`, `phone_no`, `salty`, `sugar`, `spicy`, `created_at`) VALUES
(11, 'sifat', 25, '657', '78', '01891983888', 'regular', 'regular', 'non', '2025-10-13 17:20:21'),
(12, 'Messi', 39, '567', '78', '01891983888', 'regular', 'regular', 'regular', '2025-10-14 05:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `emergency_contact` varchar(20) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `room_type` enum('single','shared') NOT NULL,
  `diseases` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`diseases`)),
  `caregiver_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `age`, `gender`, `emergency_contact`, `room_no`, `room_type`, `diseases`, `caregiver_id`, `created_at`) VALUES
(1, 'sifat', 34, 'male', '435345', '56', 'single', '[\"diabetes\",\"dieting\"]', '678', '2025-10-14 07:40:05'),
(2, 'Cup', 56, 'female', '435345', '56', 'shared', '[\"hypertension\",\"dieting\"]', '655', '2025-10-14 16:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `emergency_contact` varchar(100) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `age`, `gender`, `emergency_contact`, `salary`, `qualification`, `position`, `created_at`) VALUES
(2, 'Sifat', 45, 'male', '4564', 67.00, 'Honors', 'general-staff', '2025-10-15 15:22:21'),

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','staff','user') DEFAULT 'staff',
 
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'sifat', '$2y$10$example', 'sifat@carelyconnect.com', 'staff', '2025-10-04 15:15:26'),
(2, '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'test@example.com', 'staff', '2025-10-06 07:24:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_room_id` (`room_id`),
  ADD KEY `idx_contact` (`contact`);

--
-- Indexes for table `blood_pressure`
--
ALTER TABLE `blood_pressure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_phone` (`phone`);

--
-- Indexes for table `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_featured` (`is_featured`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_donation_date` (`donation_date`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_assistance`
--
ALTER TABLE `financial_assistance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `food_preferences`
--
ALTER TABLE `food_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_room_no` (`room_no`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blood_pressure`
--
ALTER TABLE `blood_pressure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contributors`
--
ALTER TABLE `contributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financial_assistance`
--
ALTER TABLE `financial_assistance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;




-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
