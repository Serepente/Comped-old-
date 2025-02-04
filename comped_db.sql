-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 09:44 AM
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
-- Database: `comped_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `borrower_name` varchar(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `borrowed_item` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `user_id`, `borrower_name`, `school_id`, `borrowed_item`, `quantity`, `date_issued`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 'allen veloso', '2324332', 'Microcontroller', 23, '2025-01-29', '2025-01-30', 'Returned', '2025-01-26 06:18:18', '2025-01-26 06:18:18'),
(9, 1, 'allen', '2324332', 'Sensor', 100, '2025-01-29', '2025-01-31', 'Pending', '2025-01-26 06:24:48', '2025-01-26 06:24:48'),
(10, 1, 'allen veloso', '2324332', 'Breadboard', 1, '2025-01-27', '2025-01-29', 'Pending', '2025-01-26 06:25:38', '2025-01-26 06:25:38'),
(11, 1, 'kimberly', '203043024034', 'Sensor', 1, '2025-01-27', '2025-01-29', 'Returned', '2025-01-26 23:15:51', '2025-01-26 23:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_location`, `event_date`, `check_in_time`, `check_out_time`, `created_at`, `updated_at`) VALUES
(2, 'Rambol sa UB', 'Founders Lounge', '2025-01-29', '09:00:00', '17:00:00', '2025-01-26 16:52:19', '2025-01-26 16:52:19'),
(3, 'Lumba-anay pa otog oten', 'Room A304', '2025-02-14', '09:00:00', '17:00:00', '2025-01-26 17:01:11', '2025-01-26 17:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `payment_name`, `amount`, `status`, `description`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'UB-Days Contribution', 500.00, 'Pending', 'Para ub days bayad na diha', '2025-01-27 09:54:27', '2025-01-27 09:54:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'hiii yong', 0, '2025-01-24 08:24:15', '2025-01-24 08:24:15'),
(2, 2, 1, 'haluuuuu', 0, '2025-01-24 08:26:45', '2025-01-24 08:26:45'),
(3, 1, 3, 'bayot', 0, '2025-01-24 08:29:28', '2025-01-24 08:29:28'),
(4, 3, 1, 'apuch', 0, '2025-01-24 08:30:09', '2025-01-24 08:30:09'),
(5, 1, 3, 'bayot!', 0, '2025-01-24 08:45:26', '2025-01-24 08:45:26'),
(6, 1, 3, 'blalbalblablab', 0, '2025-01-24 09:40:13', '2025-01-24 09:40:13'),
(7, 4, 1, 'len', 0, '2025-01-24 09:46:17', '2025-01-24 09:46:17'),
(8, 1, 3, 'bayotttttttt', 0, '2025-01-24 10:00:37', '2025-01-24 10:00:37'),
(9, 1, 3, 'sa', 0, '2025-01-25 10:06:49', '2025-01-25 10:06:49'),
(10, 1, 3, 'asa ka', 0, '2025-01-25 10:06:58', '2025-01-25 10:06:58'),
(11, 1, 3, 'hoy bayot!', 0, '2025-01-25 10:08:02', '2025-01-25 10:08:02'),
(12, 1, 3, 'asa', 0, '2025-01-25 10:10:36', '2025-01-25 10:10:36'),
(13, 1, 3, 'hi', 0, '2025-01-25 10:12:57', '2025-01-25 10:12:57'),
(14, 1, 3, 'hi', 0, '2025-01-25 10:17:29', '2025-01-25 10:17:29'),
(15, 1, 3, 'hi', 0, '2025-01-25 10:18:53', '2025-01-25 10:18:53'),
(16, 1, 3, 'as', 0, '2025-01-25 10:36:25', '2025-01-25 10:36:25'),
(17, 1, 3, 'sasasa', 0, '2025-01-25 10:36:28', '2025-01-25 10:36:28'),
(18, 1, 4, 'saaman', 0, '2025-01-25 10:48:19', '2025-01-25 10:48:19'),
(19, 1, 4, 'sad', 0, '2025-01-25 11:15:27', '2025-01-25 11:15:27'),
(20, 1, 4, 'huhu', 0, '2025-01-25 11:15:33', '2025-01-25 11:15:33'),
(21, 1, 4, 'sassa', 0, '2025-01-25 11:22:56', '2025-01-25 11:22:56'),
(22, 1, 3, 'hsfoHFPKJS;AFJMSLFMLAS,DL\'SAD,ALDKLAW,DL,LM,GLAD,FLSA,FLAFMLADMDASLD,SL;ADM,LS,DLSD', 0, '2025-01-25 11:32:13', '2025-01-25 11:32:13'),
(23, 1, 3, 'YOT', 0, '2025-01-25 11:34:19', '2025-01-25 11:34:19'),
(24, 3, 1, 'SAAMAN', 0, '2025-01-25 11:36:23', '2025-01-25 11:36:23'),
(25, 1, 4, 'heyyyyy', 0, '2025-01-26 23:13:11', '2025-01-26 23:13:11'),
(26, 4, 1, 'oten bilat', 0, '2025-01-26 23:14:50', '2025-01-26 23:14:50'),
(27, 1, 4, 'hi benji', 0, '2025-02-04 00:38:11', '2025-02-04 00:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_01_22_172452_create_users_table', 1),
(2, '2025_01_22_180942_add_column_to_users_table', 1),
(3, '2025_01_23_184805_add_profile_pic_to_users_table', 1),
(4, '2025_01_24_161420_create_messages_table', 2),
(5, '2025_01_26_131709_create_borrows_table', 3),
(6, '2025_01_26_133746_add_quantity_to_borrows_table', 4),
(7, '2025_01_26_134735_add_quantity_to_borrows_table', 5),
(8, '2025_01_26_134947_add_quantity_to_borrows_table', 6),
(9, '2025_01_26_140155_modify_borrows_table', 7),
(10, '2025_01_26_162927_create_events_table', 8),
(11, '2025_01_26_165457_add_event_location_to_events_table', 9),
(12, '2025_01_27_092952_create_finance_table', 10),
(13, '2025_01_27_093416_create_finance_table', 11),
(14, '2025_01_27_100318_add_status_to_finance_table', 12),
(15, '2025_01_27_101243_update_status_column_in_finance_table', 13),
(16, '2025_01_27_112351_create_payments_table', 14),
(17, '2025_01_27_112549_create_payments_table', 15),
(18, '2025_01_31_103830_create_payments_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `finance_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `gcash_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending-Approval',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `rfid` varchar(255) DEFAULT NULL,
  `schoolyear` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'images/default-pp.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `rfid`, `schoolyear`, `google_id`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'Don Allen Veloso', 'velosodonallen@gmail.com', '$2y$12$pcxWckifX02V4hMhmSsmKuwP66WT7E55Kly72enaPcU4vnmxWrEfu', 'student', '21421232', '2029', '102093360060356768774', 'images/default-pp.jpg', '2025-01-23 11:11:47', '2025-01-23 11:11:52'),
(2, 'yong allen', 'allen@gmail.com', '$2y$12$4oP1WzclYMrS695L3ldb4O/xa7Ame1biasP4iYCkI.O73/Yj6p8Fe', 'student', '2142123211', '2029', NULL, 'images/default-pp.jpg', '2025-01-23 11:12:15', '2025-01-23 11:12:29'),
(3, 'claidy kn bayot', 'claidyko@gmail.com', '$2y$12$ShXn0iW1OE7EYRbJyJRWQutWrVv6VZjt26h7ZcpN6QH1WLWSLS7Ty', 'student', '4243252452353', '2025', NULL, 'images/default-pp.jpg', '2025-01-23 22:53:26', '2025-01-23 22:53:36'),
(4, 'Mark Barota', 'markbarota13@gmail.com', '$2y$12$uAKzxUEZqb1GDKRpJjs.ZOem69yrRIyPpdD3ZwxhIrHYSeMdbjci2', 'student', '21421232111', '2019', '107053830849235655955', 'images/default-pp.jpg', '2025-01-24 09:45:50', '2025-01-24 09:45:56'),
(5, 'benjie', 'benkjie@gmail.com', '$2y$12$CrxcK/9c6jIj0G5r2xxAnOj8tmmySju6GSNcCyGbftJKZ78TDNhHa', NULL, NULL, NULL, NULL, 'images/default-pp.jpg', '2025-01-26 23:41:07', '2025-01-26 23:41:07'),
(6, 'kieth lutgo', 'romelkeith08@gmail.com', '$2y$12$MfjTrJByPXjGaUvaoPW1/etkkRrUOGTGZ.QCRYLHSi/TtdYlZybbO', 'student', '123412414324343', '2025', NULL, 'images/default-pp.jpg', '2025-01-26 23:44:16', '2025-01-26 23:44:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrows_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_finance_id_foreign` (`finance_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_finance_id_foreign` FOREIGN KEY (`finance_id`) REFERENCES `finance` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
