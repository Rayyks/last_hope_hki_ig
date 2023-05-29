-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 10:15 AM
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
-- Database: `real`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL DEFAULT 'pdf',
  `letter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `path`, `filename`, `extension`, `letter_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, NULL, '1685000883-project-portfolio.pdf', 'pdf', 6, 6, '2023-05-25 08:48:04', '2023-05-25 08:48:04'),
(4, NULL, '1685001080-rayyand.pdf', 'pdf', 7, 6, '2023-05-25 08:51:20', '2023-05-25 08:51:20'),
(5, NULL, '1685001080-my_resume.pdf', 'pdf', 7, 6, '2023-05-25 08:51:20', '2023-05-25 08:51:20'),
(6, NULL, '1685001080-atomic-habits.pdf', 'pdf', 7, 6, '2023-05-25 08:51:20', '2023-05-25 08:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `code`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SHC', 'Hak Cipta', 'hak kekayaan intelektual', '2023-05-23 18:03:17', '2023-05-23 18:03:17'),
(2, 'asdas', 'asdas', 'asd', '2023-05-23 18:12:01', '2023-05-23 18:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `code`, `value`, `created_at`, `updated_at`) VALUES
(1, 'default_password', 'admin', NULL, '2023-05-25 07:56:27'),
(2, 'page_size', '5', NULL, '2023-05-25 07:56:27'),
(3, 'app_name', 'Sentra Hak Kekayaan Intelektual', NULL, '2023-05-25 07:56:27'),
(4, 'institution_name', 'idk', NULL, '2023-05-25 07:56:27'),
(5, 'institution_address', 'Jl. Belum Jadi', NULL, '2023-05-25 07:56:27'),
(6, 'institution_phone', '082121212121', NULL, '2023-05-25 07:56:27'),
(7, 'institution_email', 'admin@admin.com', NULL, '2023-05-25 07:56:27'),
(8, 'language', 'id', NULL, NULL),
(9, 'pic', 'Unknown', NULL, '2023-05-25 07:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `dispositions`
--

CREATE TABLE `dispositions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `content` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `letter_status` bigint(20) UNSIGNED NOT NULL,
  `letter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispositions`
--

INSERT INTO `dispositions` (`id`, `to`, `due_date`, `content`, `note`, `letter_status`, `letter_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, NULL, 'asdw', 1, 6, 1, '2023-05-25 08:53:00', '2023-05-25 08:55:02');

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
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nik` int(30) NOT NULL,
  `nomor_wa` int(255) NOT NULL,
  `kkt` varchar(30) NOT NULL,
  `nama_ketua` varchar(30) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `letter_date` date DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'incoming' COMMENT 'Surat Masuk (incoming)/Surat Keluar (outgoing)',
  `classification_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `email`, `nik`, `nomor_wa`, `kkt`, `nama_ketua`, `from`, `to`, `letter_date`, `received_date`, `description`, `note`, `type`, `classification_code`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Asep@gmail.com', 217112233, 807060504, 'Dosen', 'Puan', 'Asep Asep', NULL, '2023-05-25', NULL, 'Om Bagi Duit Om', 'Makasi', 'incoming', 'SHC', 6, '2023-05-25 08:48:03', '2023-05-25 08:48:03'),
(7, 'rayyand321@gmail.com', 2171021, 821, 'Dosen A', 'Unknown', 'Rayyand Kananda Syahputra', NULL, '2023-05-25', NULL, 'Tolong Saya dikejar...... dikejar deadline :\')', 'Please sertifikatnya', 'incoming', 'SHC', 6, '2023-05-25 08:51:20', '2023-05-25 08:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `letter_statuses`
--

CREATE TABLE `letter_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `letter_statuses`
--

INSERT INTO `letter_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Di Terima', '2023-05-23 18:03:23', '2023-05-23 18:03:23'),
(2, 'Di Tolak', '2023-05-23 18:03:27', '2023-05-23 18:03:31'),
(3, 'Pending', '2023-05-23 18:03:35', '2023-05-23 18:03:35');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_05_081849_create_configs_table', 1),
(7, '2022_12_05_083409_create_letter_statuses_table', 1),
(8, '2022_12_05_083945_create_classifications_table', 1),
(9, '2022_12_05_084544_create_letters_table', 1),
(10, '2022_12_05_092303_create_dispositions_table', 1),
(11, '2022_12_05_093329_create_attachments_table', 1),
(12, '2023_05_24_010539_create_pengajuan_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'staff',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `profile_picture` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `phone`, `role`, `is_active`, `profile_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '2023-05-23 18:02:33', '$2y$10$7mJU8aAHRKt2D6Q265Pb.Og11GtgCdQxjJR6topCqDeylApcWP1lm', NULL, NULL, '082121212121', 'admin', 1, NULL, 'OJ2iMgw7UZFJTzRpPWMUzxvTIS184DHvp4ySidiGo9gHZIZeRHryYHjqAj6M', '2023-05-23 18:02:33', '2023-05-23 18:02:33'),
(5, 'gugugaga', 'gaga@gmail.com', NULL, '$2y$10$643.Xvf6tWbHXOGoX5V7NeDOY2LVZYE8NqUvnl6pNHs4Ej45.d8km', NULL, NULL, NULL, 'staff', 0, NULL, NULL, '2023-05-23 18:45:35', '2023-05-25 08:22:08'),
(6, 'Rayyand Kananda Syahputra', 'Rayyand@gmail.com', NULL, '$2y$10$P3mqe45cahaph4B6FsUuU.rY/0MwNb9VVodbp9hOEb4Z0COKFrl6i', NULL, NULL, NULL, 'staff', 1, NULL, NULL, '2023-05-25 08:22:37', '2023-05-25 08:22:37'),
(7, 'Nanda', 'Nanda@gmail.com', NULL, '$2y$10$rO.gA7iJX4jKDnh8QkNJheW.vy31h12ZBkF984PDNEGthsw/NYWFy', NULL, NULL, NULL, 'staff', 1, NULL, NULL, '2023-05-25 09:06:23', '2023-05-25 09:06:23'),
(8, 'Eko', 'eko@gmail.com', NULL, '$2y$10$uxlB./gZIW7/r4HkSGtSnemKey5KqE.Udam2PE97m5ChaYfy6fojO', NULL, NULL, NULL, 'staff', 1, NULL, NULL, '2023-05-25 09:14:53', '2023-05-25 09:14:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_letter_id_foreign` (`letter_id`),
  ADD KEY `attachments_user_id_foreign` (`user_id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classifications_code_unique` (`code`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configs_code_unique` (`code`);

--
-- Indexes for table `dispositions`
--
ALTER TABLE `dispositions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dispositions_letter_status_foreign` (`letter_status`),
  ADD KEY `dispositions_letter_id_foreign` (`letter_id`),
  ADD KEY `dispositions_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `letters_reference_number_unique` (`email`),
  ADD KEY `letters_classification_code_foreign` (`classification_code`),
  ADD KEY `letters_user_id_foreign` (`user_id`);

--
-- Indexes for table `letter_statuses`
--
ALTER TABLE `letter_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dispositions`
--
ALTER TABLE `dispositions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `letter_statuses`
--
ALTER TABLE `letter_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_letter_id_foreign` FOREIGN KEY (`letter_id`) REFERENCES `letters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dispositions`
--
ALTER TABLE `dispositions`
  ADD CONSTRAINT `dispositions_letter_id_foreign` FOREIGN KEY (`letter_id`) REFERENCES `letters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dispositions_letter_status_foreign` FOREIGN KEY (`letter_status`) REFERENCES `letter_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dispositions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `letters`
--
ALTER TABLE `letters`
  ADD CONSTRAINT `letters_classification_code_foreign` FOREIGN KEY (`classification_code`) REFERENCES `classifications` (`code`),
  ADD CONSTRAINT `letters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
