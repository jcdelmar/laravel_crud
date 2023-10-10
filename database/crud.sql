-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 03:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_company` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_company`, `contact_phone`, `contact_email`, `user_id`, `remember_token`, `created_at`, `updated_at`, `is_deleted`) VALUES
(31, 'John Smith Jr.', 'FDC', '0995123', 'john@gmail.com', 13, NULL, '2023-10-04 00:42:41', '2023-10-04 00:46:02', 1),
(32, 'Jack Mcgill', 'FDC', '12345', 'jack@gmail.com', 13, NULL, '2023-10-04 00:43:04', '2023-10-04 00:43:04', 1),
(33, 'Howard Hamlin', '', '', '', 13, NULL, '2023-10-04 00:43:26', '2023-10-04 00:43:26', 1),
(34, 'Edward Newgate', 'FDC', '099512423', 'ed@gmail.com', 13, NULL, '2023-10-04 00:43:45', '2023-10-04 00:43:45', 1),
(35, 'Tony Chops', 'ABC', '0991245532', 'tony@gmail.com', 13, NULL, '2023-10-04 00:44:18', '2023-10-04 00:44:18', 1),
(36, 'Neil Owens', 'PLW', '0991231', 'neil@gmail.com', 13, NULL, '2023-10-04 00:44:51', '2023-10-04 00:44:51', 1),
(37, 'Emma Anne', 'ORG', '0124235346', 'emma@yahoo.com', 13, NULL, '2023-10-04 00:46:49', '2023-10-04 00:46:49', 0),
(38, 'Thomas Clark', 'YEM', '132653732', 'clarkth@yahoo.com', 13, NULL, '2023-10-04 00:47:27', '2023-10-04 00:47:27', 1),
(39, 'Nico Marne', 'AYM', '09231', 'nic@yahoo.com', 13, NULL, '2023-10-04 00:55:58', '2023-10-04 00:55:58', 1),
(40, 'test3', '', '', '', 14, NULL, '2023-10-04 00:58:23', '2023-10-04 00:58:23', 0),
(41, 'John del mar', '', '', '', 15, NULL, '2023-10-04 01:12:23', '2023-10-04 01:12:23', 1),
(42, '*\'`  ,`\'', 'ABC', '0995123123', 'jake@gmail.com', 15, NULL, '2023-10-04 01:13:00', '2023-10-04 01:19:38', 0),
(43, 'Sam Fisher', 'PRL', '123456', 'sam@yahoo.com', 15, NULL, '2023-10-04 01:14:16', '2023-10-04 01:14:16', 0),
(44, 'William Fisher', 'FIS', '09912431532', 'will@gmail.com', 15, NULL, '2023-10-04 01:14:31', '2023-10-04 01:14:31', 0),
(45, 'Victor Fraser', 'VIC', '099135246', 'vic@gmail.com', 15, NULL, '2023-10-04 01:14:45', '2023-10-04 01:14:45', 0),
(46, 'Thomas Coleman', 'TOM', '0991535346', 'tom@gmail.com', 15, NULL, '2023-10-04 01:15:00', '2023-10-04 01:15:00', 0),
(47, 'John', 'FDC', '', '', 13, NULL, '2023-10-04 01:30:03', '2023-10-04 01:30:03', 1),
(48, 'Victor', 'FDC', '', '', 13, NULL, '2023-10-04 01:30:08', '2023-10-04 01:30:08', 1),
(49, 'RANZ', 'FDC', '', '', 13, NULL, '2023-10-04 01:30:14', '2023-10-04 01:30:14', 0),
(50, 'asd', '', '', '', 13, NULL, '2023-10-09 10:43:43', '2023-10-09 10:43:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_03_151053_contacts', 2),
(6, '2023_10_03_171213_add_timestamps_to_contacts', 3),
(7, '2023_10_03_171735_add_is_active_to_contacts', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'tester account', 'test@test.com', NULL, '$2y$10$lTPTALlMEUslI6NqNwkJ7.I6.c/XEG9cEDcykMasKjI9mjj2nJN52', NULL, '2023-10-03 22:47:44', '2023-10-03 22:47:44'),
(14, 'test', 'test3@test.com', NULL, '$2y$10$4cosoPsRMrN7x/xCTNlKYeidDIpY/Dqr0ENFKOI7MNicYWi9uu1Cy', NULL, '2023-10-04 00:56:42', '2023-10-04 00:56:42'),
(15, 'tester', 'newtest@gmail.com', NULL, '$2y$10$b9kgjaa/r9E8nJevQ2yQ4uD4J5.74aLfnFyu66vwIEdv5FSqtKRH6', NULL, '2023-10-04 01:08:24', '2023-10-04 01:08:24'),
(16, 'tester', 'test5@test.com', NULL, '$2y$10$oxOywmIbm81FNcJ7rH2wTe2nCkqhb0vIqF0DYGt/sAAYC9kEC7dga', NULL, '2023-10-04 01:09:38', '2023-10-04 01:09:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_user_id` (`user_id`),
  ADD KEY `contacts_name` (`contact_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contact_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
