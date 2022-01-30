-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 21, 2021 at 09:33 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saiweb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_folder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `sub_folder_id`, `group_id`, `permission_id`, `title`, `title_en`, `description`, `description_en`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 6, 1, 'السياسات', 'Policies', NULL, NULL, '1', '2021-01-19 05:18:38', '2021-08-17 03:25:04'),
(4, NULL, 6, 1, 'القوانين والتشريعات', 'Roles and Regulations', NULL, NULL, '1', '2021-01-18 05:34:11', '2021-01-18 05:34:11'),
(9, NULL, 1, 1, 'الأدلة والمعايير الرقابية', 'Audit Manuals and Standards', NULL, NULL, '1', '2021-02-01 05:50:41', '2021-12-21 01:05:34'),
(10, 9, 6, 1, 'المستوى الأول: المبادئ التأسيسية', NULL, NULL, NULL, '1', '2021-02-01 05:51:41', '2021-08-17 03:40:37'),
(11, 9, 6, 1, 'المستوى الثاني : الشروط الأساسية لعمل الأجهزة العليا للرقابة', NULL, NULL, NULL, '1', '2021-02-01 05:53:32', '2021-02-01 05:53:32'),
(12, 9, 6, 1, 'المستوى الثالث : المبادئ الأساسية للرقابة المالية والمحاسبة', NULL, NULL, NULL, '1', '2021-02-01 05:54:16', '2021-02-01 05:54:16'),
(13, 9, 6, 1, 'المستوى الرابع : التوجيهات الإرشادية للرقابة المالية والمحاسبة', NULL, NULL, NULL, '1', '2021-02-01 05:55:20', '2021-02-01 05:55:20'),
(14, 9, 6, 1, 'توجيهات الأنتوساي للحكم الرشيد', NULL, NULL, NULL, '1', '2021-02-01 05:56:03', '2021-02-01 05:56:03'),
(15, 9, 6, 1, 'أدلة العمل الرقابي للجهاز', NULL, NULL, NULL, '1', '2021-02-01 05:56:41', '2021-02-01 05:56:41'),
(16, 9, 6, 1, 'الكتب الإرشادية القطاعية', NULL, NULL, NULL, '1', '2021-02-01 06:00:36', '2021-02-01 06:00:36'),
(17, 9, 6, 1, 'معايير الانتوساي', NULL, NULL, NULL, '1', '2021-02-01 06:04:49', '2021-02-01 06:04:49'),
(18, 9, 6, 1, 'أدلة التدقيق الداخلي', NULL, NULL, NULL, '1', '2021-02-01 06:06:00', '2021-02-18 03:50:55'),
(25, 9, 6, 1, 'أدلة عمل أجهزة ودواوين الرقابة بمجلس التعاون لدول الخليج العربي', NULL, NULL, NULL, '1', '2021-02-01 06:40:56', '2021-02-01 06:40:56'),
(44, NULL, 6, 1, 'هيئة مكافحة ومنع الفساد', 'Anti-Corruption Commission', NULL, NULL, '1', '2021-05-30 00:38:18', '2021-08-17 03:18:02'),
(87, NULL, 6, 1, 'إقرار الذمة المالية', 'Financial Disclosure for government Official', NULL, NULL, '1', '2021-08-07 23:41:52', '2021-08-07 23:41:52'),
(93, NULL, 2, 1, 'النظام الأساسي للدولة', 'Basic Statute of the State', NULL, NULL, '1', '2021-09-22 02:39:09', '2021-10-11 03:48:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_folder` (`sub_folder_id`),
  ADD KEY `folders_group_id_foreign` (`group_id`),
  ADD KEY `folders_permission_id_foreign` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `folders_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `sub_folder` FOREIGN KEY (`sub_folder_id`) REFERENCES `folders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
