-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 05:25 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dropit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(50) NOT NULL,
  `bagian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `bagian`) VALUES
(1, 'Super Admin'),
(2, 'Umum dan Perlengkapan'),
(3, 'Pelayanan Medik'),
(4, 'Penunjang Medik'),
(5, 'Bagian Keuangan'),
(6, 'Bagian Pengembangan'),
(7, 'Bagian SDM dan Kepegawaian'),
(8, 'Komite Keperawatan'),
(9, 'Komite Medik'),
(10, 'Komite Mutu'),
(11, 'Komite Nakes Lain'),
(12, 'Komite Rekam Medik'),
(13, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(30) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_dokumen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dokumen` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `user_id`, `kategori_id`, `name`, `nomor_dokumen`, `tgl_dokumen`, `url`, `is_active`, `created_at`, `updated_at`) VALUES
(29, 1, NULL, 'admin', '123qwqwwqw', '12-12-2012', 'Surat Benchmarking RSUP Dr. Rivai Abdullah.pdf', 0, '2023-01-27 06:21:52', '2023-01-26 01:34:01'),
(30, 1, NULL, 'cb', 'www', '12-03-2311', 'id card - adri.pdf', 1, '2023-01-27 01:09:28', '2023-01-27 01:09:28'),
(31, 3, NULL, 'yanmed', '123', '12-12-2012', 'Surat Tugas Ledyana - RSMH 27 Oct 2022.pdf', 1, '2023-01-27 01:17:19', '2023-01-27 01:17:19'),
(32, 3, NULL, 'vv', 'qw', '12-03-2333', 'Pengajuan Operasional Aplikasi SIMRSGOS V.2.pdf', 1, '2023-01-27 01:15:57', '2023-01-27 01:15:57'),
(33, 2, NULL, 'umper', '321', '12-12-2012', 'id card - adri.pdf', 1, '2023-01-26 02:42:08', '2023-01-26 02:42:08'),
(34, 13, 1, 'it', '123', '12-12-2012', 'id card - adri.pdf', 1, '2023-01-27 03:22:38', '2023-01-27 01:58:44'),
(35, 13, NULL, 'tes', 'qwerty', '12-02-2017', 'id card - adri.pdf', 1, '2023-01-27 02:37:00', '2023-01-27 02:37:00'),
(36, 13, NULL, 'tessssss', '123', '21-02-1999', 'Surat Tugas Ledyana - RSMH 27 Oct 2022.pdf', 1, '2023-01-27 02:48:58', '2023-01-27 02:48:58'),
(37, 13, NULL, 'deti', '21', '12-04-2015', 'rincian biaya iht pormiki.pdf', 1, '2023-01-27 02:53:24', '2023-01-27 02:53:24'),
(38, 13, NULL, 'pinch', 'ejweijew/1212', '11-12-2015', 'Surat Benchmarking RSUP Dr. Rivai Abdullah.pdf', 1, '2023-01-27 03:24:53', '2023-01-27 03:24:53'),
(39, 13, NULL, 'tes dari admin', '12121', '12-02-2013', 'Permohonan Narsum PORMIKI.pdf', 1, '2023-01-27 06:24:07', '2023-01-27 06:24:07'),
(40, 9, NULL, 'tes', '12wssqs', '12-12-2012', '202302 - HFIS BPJS 2023.pdf', 1, '2023-02-14 04:14:29', '2023-02-14 04:14:29'),
(41, 2, NULL, 'tes umper', '123', '12-12-2012', '202302 - HFIS BPJS 2023.pdf', 1, '2023-02-17 03:56:01', '2023-02-17 03:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Pedoman'),
(2, 'Panduan'),
(3, 'Program Kerja'),
(4, 'Surat Keputusan Direktur'),
(5, 'Alur'),
(6, 'Surat Edaran Direktur'),
(7, 'Regulasi Penunjang Lain');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_13_080504_create_file_table', 1),
(6, '2023_01_24_093730_create_permission_tables', 2),
(7, '2023_01_24_093852_create_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bagian_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `bagian_id`) VALUES
(1, 'admin', 'detinadya@gmail.com', '$2y$10$Pi94jVRWMilza4nf1nCwiuAPDb439zQ/f5/vgFWriP5H6WhFMs9lm', 'CHVH2YS2Rxy2nGBhzsn5FtuhlITKyE60tCdBogWMRlfyzuflHXjL6g8wL0rS', '2023-01-15 20:32:11', '2023-01-15 20:32:11', 1),
(2, 'Bagian Umum dan Perlengkapan', 'umper@gmail.com', '$2y$10$Os8GhpkP8DDfXHSAwRSHTeiqxT4qPm9GqlCypqNDH9MA6Yl4EoMDC', NULL, '2023-01-24 02:07:48', '2023-01-24 02:07:48', 2),
(3, 'Bidang Pelayanan Medik', 'yanmed@gmail.com', '$2y$10$HZw7j2i/tByMveJLVociu.1O8RsuGXgxRk3Zp09/tmZjEoPqCv1FG', NULL, '2023-01-24 05:37:46', '2023-01-24 05:37:46', 3),
(4, 'Bidang Penunjang Medik', 'jangmed@gmail.com', '$2y$10$JgxOz3eX1mPtqaq2CMhXze77h8sVz0zPajuq0idpGoYANqhttCUOu', NULL, '2023-01-24 05:38:43', '2023-01-24 05:38:43', 4),
(5, 'Bagian Keuangan', 'keuangan@gmail.com', '$2y$10$rTvTuuJ5.KBe8yGtCMQBmOBKfC5UK687icJxxAmnHDbUgPggOr5Qa', NULL, '2023-01-24 05:39:43', '2023-01-24 05:39:43', 5),
(6, 'Bagian Pengembangan', 'pengembangan@gmail.com', '$2y$10$wlXdC93Zla7H5zMFm/BbQup2rNkgPTDt/R9cAj0NdTq.mRbk/oi1W', NULL, '2023-01-24 05:40:09', '2023-01-24 05:40:09', 6),
(7, 'Bagian SDM & Kepegawaian', 'sdm@gmail.com', '$2y$10$orOvep/F3LjMlrcwmeDMdekFh1u1OBpb3eOuHDMOpovG7kif4hGom', NULL, '2023-01-24 05:40:35', '2023-01-24 05:40:35', 7),
(8, 'Komite Keperawatan', 'kom.keperawatan@gmail.com', '$2y$10$AdejtMHGjZyZZJToF7CSSuAJmqRzUjtBqxqlY0OtIznuxfoU0LKjK', NULL, '2023-01-24 05:41:20', '2023-01-24 05:41:20', 8),
(9, 'Komite Medik', 'kom.medik@gmail.com', '$2y$10$A9EMH3CjtkoGv5YTjEFQOumOOSwQqSoMLFA9SyuGBU.31RVFU.0aW', NULL, '2023-01-24 05:41:45', '2023-01-24 05:41:45', 9),
(10, 'Komite Mutu', 'kom.mutu@gmail.com', '$2y$10$YjT.q7BWpEzJUJli7f4zjuUh/GvLk3qpRW3t6u5FLPn9eT6/erzmy', NULL, '2023-01-24 05:43:55', '2023-01-24 05:43:55', 10),
(11, 'Komite Nakes Lain', 'kom.nakes.lain@gmail.com', '$2y$10$0pyN.qX7KUrKBimbQIklFeZppzZKD.cv5OxCcu5tpHpInNN96UP/W', NULL, '2023-01-24 05:46:43', '2023-01-24 05:46:43', 11),
(12, 'Komite Rekam Medik', 'kom.rekam.medik@gmail.com', '$2y$10$81WcNHU.NS5XWNjWWJK9e.QpphHU.AcWjwuOmtnsc2o8uyOqsH.B.', NULL, '2023-01-24 05:48:33', '2023-01-24 05:48:33', 12),
(13, 'IT', 'admin@email.com', '$2y$10$U/jcY/WW45MlAQvXPRLhauztuH7CEFboKHvdlvkix7V5LRpTlMqX2', NULL, '2023-01-27 02:05:20', '2023-01-27 02:05:20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `bagian_id` (`bagian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `bagian` (`id`),
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
