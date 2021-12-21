-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 12:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(2, 'puma', NULL, 0, '2021-10-14 07:27:32', '2021-12-15 00:22:53'),
(3, 'bata', NULL, 1, '2021-10-18 05:09:46', '2021-12-15 00:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(3, 'category 1', NULL, 1, '2021-12-13 08:05:15', '2021-12-15 00:07:30'),
(5, 'category 2', NULL, 0, '2021-12-15 00:07:45', '2021-12-15 00:22:24'),
(6, 'category 3', NULL, 0, '2021-12-15 00:07:51', '2021-12-16 05:49:21'),
(7, 'cat 5', NULL, 1, '2021-12-16 05:49:15', '2021-12-16 05:49:15');

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
(5, '2021_10_14_051329_create_permission_tables', 2),
(6, '2021_10_14_110241_update_user', 3),
(7, '2021_10_14_123711_create_brands_table', 4),
(8, '2021_10_14_130414_create_categories_table', 5),
(9, '2021_10_15_052452_create_products_table', 6),
(10, '2021_10_15_054524_create_product_categories_table', 6),
(11, '2021_10_15_054751_create_tags_table', 6),
(12, '2021_10_15_054815_create_product_tags_table', 6),
(13, '2021_10_19_052710_create_packages_table', 7),
(14, '2021_10_19_054327_create_package_products_table', 7),
(15, '2021_12_16_082934_create_user_categories_table', 8),
(16, '2021_12_16_100009_create_user_tags_table', 9),
(17, '2021_12_16_100035_create_types_table', 9),
(18, '2021_12_16_100048_create_user_types_table', 9),
(19, '2021_12_16_100010_create_user_tags_table', 10),
(20, '2021_12_16_100011_create_user_tags_table', 11),
(21, '2021_12_20_113239_create_reviews_table', 12);

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

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 9),
(5, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 13),
(5, 'App\\Models\\User', 14),
(5, 'App\\Models\\User', 15),
(5, 'App\\Models\\User', 16),
(5, 'App\\Models\\User', 17),
(5, 'App\\Models\\User', 18),
(5, 'App\\Models\\User', 19),
(5, 'App\\Models\\User', 20),
(5, 'App\\Models\\User', 21);

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

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'view_permissions', 'web', '2021-10-18 06:17:22', '2021-10-18 06:17:22'),
(10, 'create_permissions', 'web', '2021-10-18 06:17:29', '2021-10-18 06:17:29'),
(11, 'update_permissions', 'web', '2021-10-18 06:17:36', '2021-10-18 06:17:36'),
(12, 'delete_permissions', 'web', '2021-10-18 06:17:43', '2021-10-18 06:17:43'),
(13, 'view_roles', 'web', '2021-10-18 06:17:58', '2021-10-18 06:17:58'),
(14, 'create_roles', 'web', '2021-10-18 06:18:04', '2021-10-18 06:18:04'),
(15, 'update_roles', 'web', '2021-10-18 06:18:13', '2021-10-18 06:18:13'),
(16, 'delete_roles', 'web', '2021-10-18 06:18:19', '2021-10-18 06:18:19'),
(17, 'view_users', 'web', '2021-10-18 06:18:26', '2021-10-18 06:18:26'),
(18, 'create_users', 'web', '2021-10-18 06:18:32', '2021-10-18 06:18:32'),
(19, 'update_users', 'web', '2021-10-18 06:18:40', '2021-10-18 06:18:40'),
(20, 'delete_users', 'web', '2021-10-18 06:18:45', '2021-10-18 06:18:45'),
(21, 'view_staff', 'web', '2021-12-15 05:35:45', '2021-12-15 05:35:45'),
(22, 'create_staff', 'web', '2021-10-18 06:18:56', '2021-10-18 06:18:56'),
(23, 'update_staff', 'web', '2021-10-18 06:19:01', '2021-10-18 06:19:01'),
(24, 'delete_staff', 'web', '2021-10-18 06:19:08', '2021-10-18 06:19:08'),
(25, 'view_customers', 'web', '2021-10-18 06:19:17', '2021-10-18 06:19:17'),
(26, 'create_customers', 'web', '2021-10-18 06:19:26', '2021-10-18 06:19:26'),
(27, 'update_customers', 'web', '2021-10-18 06:19:31', '2021-10-18 06:19:31'),
(28, 'delete_customers', 'web', '2021-10-18 06:19:36', '2021-10-18 06:19:36'),
(29, 'view_brands', 'web', '2021-10-18 06:19:42', '2021-10-18 06:19:42'),
(30, 'create_brands', 'web', '2021-10-18 06:19:46', '2021-10-18 06:19:46'),
(31, 'update_brands', 'web', '2021-10-18 06:19:52', '2021-10-18 06:19:52'),
(32, 'delete_brands', 'web', '2021-10-18 06:19:57', '2021-10-18 06:19:57'),
(33, 'view_categories', 'web', '2021-10-18 06:20:03', '2021-10-18 06:20:03'),
(34, 'create_categories', 'web', '2021-10-18 06:20:07', '2021-10-18 06:20:07'),
(35, 'update_categories', 'web', '2021-10-18 06:20:12', '2021-10-18 06:20:12'),
(36, 'delete_categories', 'web', '2021-10-18 06:20:20', '2021-10-18 06:20:20'),
(37, 'view_products', 'web', '2021-10-18 06:20:41', '2021-10-18 06:20:41'),
(38, 'create_products', 'web', '2021-10-18 06:20:46', '2021-10-18 06:20:46'),
(39, 'update_products', 'web', '2021-10-18 06:20:51', '2021-10-18 06:20:51'),
(40, 'delete_products', 'web', '2021-10-18 06:20:59', '2021-10-18 06:20:59'),
(41, 'view_packages', 'web', '2021-10-19 04:40:04', '2021-10-19 04:40:04'),
(42, 'create_packages', 'web', '2021-10-19 04:50:40', '2021-10-19 04:50:40'),
(43, 'update_packages', 'web', '2021-10-19 04:50:48', '2021-10-19 04:50:48'),
(44, 'delete_packages', 'web', '2021-10-19 04:50:56', '2021-10-19 04:50:56'),
(45, 'status_change_packages', 'web', '2021-12-14 02:16:07', '2021-12-14 02:16:07'),
(46, 'status_change_products', 'web', '2021-12-14 02:16:17', '2021-12-14 02:16:17'),
(47, 'status_change_brands', 'web', '2021-12-15 00:21:42', '2021-12-15 00:21:42'),
(48, 'status_change_categories', 'web', '2021-12-15 00:21:49', '2021-12-15 00:21:49'),
(52, 'status_change_users', 'web', '2021-12-15 05:35:28', '2021-12-15 05:35:28'),
(53, 'status_change_staff', 'web', '2021-12-15 05:35:37', '2021-12-15 05:35:37'),
(54, 'status_change_customers', 'web', '2021-12-15 05:35:45', '2021-12-15 05:35:45'),
(57, 'view_reviews', 'web', '2021-12-21 00:35:12', '2021-12-21 00:35:12'),
(58, 'create_reviews', 'web', '2021-12-21 00:35:22', '2021-12-21 00:35:22'),
(59, 'update_reviews', 'web', '2021-12-21 00:35:34', '2021-12-21 00:35:34'),
(60, 'delete_reviews', 'web', '2021-12-21 00:35:41', '2021-12-21 00:35:41');

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field1` float DEFAULT NULL,
  `field2` float DEFAULT NULL,
  `field3` float DEFAULT NULL,
  `field4` float DEFAULT NULL,
  `field5` float DEFAULT NULL,
  `overall` double(8,2) NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `exp`, `field1`, `field2`, `field3`, `field4`, `field5`, `overall`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 'ddsf sdf', 1, 1, 1, 1, 1, 1.00, 1, 21, '2021-12-20 06:55:18', '2021-12-21 00:53:54'),
(2, 'sdsdf sd', 5, 5, 5, 5, 5, 5.00, 1, 21, '2021-12-20 08:13:57', '2021-12-21 00:54:13');

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

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2021-10-14 01:17:32', '2021-12-21 00:36:08'),
(5, 'Business', 'web', '2021-10-14 06:37:07', '2021-12-16 00:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(52, 1),
(53, 1),
(54, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'dsf sdfsd', NULL, '2021-10-15 06:25:14', '2021-10-15 06:25:14'),
(2, 'mhg fgh fg', NULL, '2021-10-15 06:25:14', '2021-10-15 06:25:14'),
(3, 'hfgh ', NULL, '2021-10-15 06:25:15', '2021-10-15 06:25:15'),
(4, 'fg', NULL, '2021-10-15 06:25:15', '2021-10-15 06:25:15'),
(5, 'hf', NULL, '2021-10-15 06:25:16', '2021-10-15 06:25:16'),
(6, 'h', NULL, '2021-10-15 06:25:16', '2021-10-15 06:25:16'),
(7, 'fgh', NULL, '2021-10-15 06:25:16', '2021-10-15 06:25:16'),
(8, 'frdgerf', NULL, '2021-10-15 06:25:17', '2021-10-15 06:25:17'),
(9, 'ert', NULL, '2021-10-15 06:25:17', '2021-10-15 06:25:17'),
(10, 'reg', NULL, '2021-10-15 06:25:17', '2021-10-15 06:25:17'),
(11, 'we', NULL, '2021-10-15 06:25:17', '2021-10-15 06:25:17'),
(12, 'werwe', NULL, '2021-10-15 06:25:17', '2021-10-15 06:25:17'),
(13, 'werwer', NULL, '2021-10-15 06:25:17', '2021-10-15 06:25:17'),
(14, 'qqq', NULL, '2021-10-15 06:55:48', '2021-10-15 06:55:48'),
(15, 'www', NULL, '2021-10-15 06:55:48', '2021-10-15 06:55:48'),
(16, 'eeee', NULL, '2021-10-15 06:55:48', '2021-10-15 06:55:48'),
(17, 'rrrr', NULL, '2021-10-15 06:55:48', '2021-10-15 06:55:48'),
(18, 'ttt', NULL, '2021-10-15 06:55:48', '2021-10-15 06:55:48'),
(19, 'qqqq', NULL, '2021-10-15 06:57:41', '2021-10-15 06:57:41'),
(20, 'wwww', NULL, '2021-10-15 06:57:41', '2021-10-15 06:57:41'),
(21, 'weee', NULL, '2021-10-15 06:57:41', '2021-10-15 06:57:41'),
(22, 'wwewe', NULL, '2021-10-15 06:57:41', '2021-10-15 06:57:41'),
(23, '123', NULL, '2021-10-15 07:00:41', '2021-10-15 07:00:41'),
(24, '123123', NULL, '2021-10-15 07:00:41', '2021-10-15 07:00:41'),
(25, '123123123', NULL, '2021-10-15 07:00:41', '2021-10-15 07:00:41'),
(26, '23', NULL, '2021-10-15 07:00:42', '2021-10-15 07:00:42'),
(27, '3', NULL, '2021-10-15 07:00:42', '2021-10-15 07:00:42'),
(28, '4', NULL, '2021-10-15 07:00:42', '2021-10-15 07:00:42'),
(29, '34', NULL, '2021-10-15 07:00:42', '2021-10-15 07:00:42'),
(30, '5', NULL, '2021-10-15 07:00:42', '2021-10-15 07:00:42'),
(31, '54', NULL, '2021-10-15 07:00:42', '2021-10-15 07:00:42'),
(32, 'dw as', NULL, '2021-10-15 07:02:14', '2021-10-15 07:02:14'),
(33, 'asd ', NULL, '2021-10-15 07:02:14', '2021-10-15 07:02:14'),
(34, 'as', NULL, '2021-10-15 07:02:14', '2021-10-15 07:02:14'),
(35, 'd as', NULL, '2021-10-15 07:02:14', '2021-10-15 07:02:14'),
(36, 'd', NULL, '2021-10-15 07:02:14', '2021-10-15 07:02:14'),
(37, ' as', NULL, '2021-10-15 07:02:14', '2021-10-15 07:02:14'),
(38, ' d', NULL, '2021-10-15 07:02:14', '2021-10-15 07:02:14'),
(39, 'sad asdasd ', NULL, '2021-10-15 07:03:07', '2021-10-15 07:03:07'),
(40, 'ads', NULL, '2021-10-15 07:03:07', '2021-10-15 07:03:07'),
(41, 'ad ', NULL, '2021-10-15 07:03:07', '2021-10-15 07:03:07'),
(42, 'ds', NULL, '2021-10-15 07:03:07', '2021-10-15 07:03:07'),
(43, 'aaa', NULL, '2021-10-18 01:28:26', '2021-10-18 01:28:26'),
(44, 'tag 1', NULL, '2021-12-16 06:30:13', '2021-12-16 06:30:13'),
(45, 'tag2', NULL, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(46, 'tag3', NULL, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(47, 'tag4', NULL, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(48, 'sss', NULL, '2021-12-16 07:40:07', '2021-12-16 07:40:07'),
(49, 'ffff', NULL, '2021-12-16 07:40:07', '2021-12-16 07:40:07'),
(50, 'asdas', NULL, '2021-12-17 03:04:36', '2021-12-17 03:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 Active | 0 Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'type 1', NULL, 1, '2021-12-16 05:03:43', '2021-12-16 05:03:43'),
(2, 'type 2', NULL, 1, '2021-12-16 05:03:54', '2021-12-16 05:04:09'),
(3, 'type 3', NULL, 1, '2021-12-16 05:17:50', '2021-12-16 05:18:10'),
(4, 'type 4', NULL, 0, '2021-12-16 05:20:15', '2021-12-16 05:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `review_avg` float DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `banner_image`, `phone`, `about`, `bio`, `meta_title`, `meta_desc`, `status`, `review_avg`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', '2021-12-17 12:08:06', '$2y$10$mzMnAXNi0R4Rqqrr81MGFO1kH2gKnXz54lbBw0iQyxljl6rDDg2H2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-10-14 04:54:02', '2021-10-13 06:23:54'),
(2, 'test', 'test@123.com', NULL, '$2y$10$2BFXb7jJHeEa/K3RJEqxZ.LJDPKgZXI8qI/1z5hd5KcoNq2JJBi32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-10-18 05:43:21', '2021-10-14 04:12:02'),
(3, 'qwqw', 'asdasd@as.as', NULL, '$2y$10$36CLGKvzOrBzAVDt52ut2.oeY78Ws8HaQNLgjlu0WkB89p915D5Oi', NULL, NULL, NULL, '234234234', NULL, NULL, NULL, NULL, 1, NULL, '2021-10-14 06:59:01', '2021-10-14 06:42:34'),
(5, 'jowibuk', 'admin@admin.coms', NULL, '$2y$10$Sy6JWSYuw38qJEmKTVLSVuZBaKSc2fR1EYgkzocDp6Iik9t9WcmQC', NULL, NULL, NULL, '21312312312', NULL, NULL, NULL, NULL, 1, NULL, '2021-12-15 05:58:21', '2021-10-14 07:00:52'),
(6, 'robin', 'robin@robin.com', NULL, '$2y$10$mzMnAXNi0R4Rqqrr81MGFO1kH2gKnXz54lbBw0iQyxljl6rDDg2H2', 'jX6raE3UjLpmPRbPMyv9tONZqb1z2RKmWhrpZZMYgRdp8vQuZwvRYFCfIZRg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-12-16 02:05:09', '2021-10-14 23:50:06'),
(7, 'admin', 'robin@robins.com', NULL, '$2y$10$awGJRzthsA40gDoEJFinR.k8dlzieO5nJaySzQLGKosubMYVDR7km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-12-15 02:38:46', '2021-10-18 05:37:48'),
(8, 'newuser', 'newuser@test.com', NULL, '$2y$10$5HMZkImPQrMkZo10O6q9G.QUPTK1euaXE9WEQZhSCQJs8NWkJKkRq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-12-15 05:57:47', '2021-12-15 04:34:46'),
(9, 'new business', 'newbusiness@test.com', NULL, '$2y$10$UskgU19R79a9TIzfN5Eta.D933WcztI6O/4VY804TaJaBZm0/D13u', NULL, NULL, NULL, '1312', NULL, NULL, NULL, NULL, 1, NULL, '2021-12-16 00:53:44', '2021-12-16 00:53:44'),
(10, 'vnbus', 'vnbus@test.com', NULL, '$2y$10$4LzuMiSjy3oNYzTFIcyDheTvQ3u8uRLQJEmJ2.UFmH6pLsYVAvNme', NULL, NULL, NULL, '132423', NULL, NULL, NULL, NULL, 1, NULL, '2021-12-16 01:00:42', '2021-12-16 01:00:42'),
(11, 'sam', 'sam@test.com', NULL, '$2y$10$YfEVIAasfj2jcB4Vgwy6xOpc.xxtPfw0K7AIb3ishS5LVuMlK2GLa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-12-16 02:05:02', '2021-12-16 02:04:43'),
(12, 'manager 1', 'manager1@test.com', NULL, '$2y$10$gLcjl6TMjk7DDot3FCYrj.vzgn/Imnqi1w.iwwz3xSgswuFcvapBi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-12-16 02:08:11', '2021-12-16 02:07:31'),
(13, 'denver', 'denver@test.com', NULL, '$2y$10$nmCfG4oA3IMLYpGHcD8cD.AfE9G/fq6BxYQKw1vu2QdbA5182h6EK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-12-16 02:30:08', '2021-12-16 02:29:35'),
(14, 'business1', 'business1@test.com', NULL, '$2y$10$A92NEtzu2KR5wt0qRFjeWeMxiN3QaCDTtO1FiNLmkHfNpAxUkDlVm', NULL, NULL, NULL, '1234', NULL, NULL, NULL, NULL, 1, NULL, '2021-12-16 06:30:13', '2021-12-16 06:30:13'),
(15, 'business2', 'business2@test.com', NULL, '$2y$10$I8SuHcPFR/tMv2LeiOzlq.SRa0EmN5pzS77SWd8NLWNaubf6V9Zkq', NULL, NULL, NULL, '1234', NULL, NULL, NULL, NULL, 1, NULL, '2021-12-16 06:31:57', '2021-12-16 06:31:57'),
(16, 'business3', 'business3@test.com', NULL, '$2y$10$a7GaqU9viaUlQSpGP9uKyefdQ/cO5T54EQLZZwxp7faKQBRwclo8G', NULL, NULL, NULL, '1234', NULL, NULL, NULL, NULL, 1, NULL, '2021-12-17 02:09:08', '2021-12-16 06:33:18'),
(17, 'business4', 'business4@test.com', NULL, '$2y$10$kBcT5NtTADd/cRZCN3jNee0G1ETkMJqPW5UCnTCBQYsifCkeeueJC', NULL, NULL, NULL, '1234', NULL, NULL, NULL, NULL, 0, NULL, '2021-12-17 00:44:56', '2021-12-16 06:34:26'),
(18, 'business5', 'business5@test.com', NULL, '$2y$10$UqR9nd.jTeHwijaMBYMd4eYg1OgoXGVv7iNyDv/9v/BqtdehtPgxO', NULL, NULL, NULL, '1234', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '', 1, NULL, '2021-12-21 02:49:40', '2021-12-16 06:36:02'),
(19, 'business6', 'business6@test.com', NULL, '$2y$10$eDYMRapG/TO8KlmTZ6FfM.9GJXCQSi5I2mokKIY1JdcazT.y3VHhe', NULL, 'business_images/dJ6s8o51UZYpY863StkfEEVmmLngpOfpIsOrlkxD.png', 'business_banner_images/Y8zGBVmNne0zR57CtgUUXvrQi9Ua7iR0zePV1n9c.png', '1234', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '', 1, NULL, '2021-12-21 02:49:11', '2021-12-16 06:36:26'),
(20, 'bus1-', 'bus1@test.com', '2021-12-16 18:30:00', '$2y$10$wmnjZHCy3NuQ2ix.rgxIcO0xrYgTKQ9qWRU8yIlaUeLDaapcMZuHC', NULL, 'business_images/iQPDU4nmhi6yRujFnWRELCLEKrEqgrb9zVIERdnC.jpg', 'business_banner_images/omnDgYSIi4mu8IIqp34fdoBmyFdrPs3ewRxz0o1h.png', '1232', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'meta_titleee', 'meta_desccccc', 1, NULL, '2021-12-21 05:09:00', '2021-12-16 07:40:07'),
(21, 'busi--', 'busi--@test.com', '2021-12-17 12:35:17', '$2y$10$nhG04M/vVREY9eHRwVMdDeBMEL3w3P9R7nwr.q2V2.pBuM0EDK/P6', NULL, '', '', '12345678', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'title meta', 'desc meta', 1, 3, '2021-12-21 02:48:31', '2021-12-17 03:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE `user_categories` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(17, 3, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(17, 7, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(21, 3, '2021-12-21 02:48:31', '2021-12-21 02:48:31'),
(19, 3, '2021-12-21 02:49:11', '2021-12-21 02:49:11'),
(18, 3, '2021-12-21 02:50:25', '2021-12-21 02:50:25'),
(18, 7, '2021-12-21 02:50:25', '2021-12-21 02:50:25'),
(20, 7, '2021-12-21 05:21:42', '2021-12-21 05:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_tags`
--

CREATE TABLE `user_tags` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tags`
--

INSERT INTO `user_tags` (`user_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(17, 44, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(17, 45, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(17, 46, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(17, 47, '2021-12-16 06:34:26', '2021-12-16 06:34:26'),
(21, 50, '2021-12-21 02:48:31', '2021-12-21 02:48:31'),
(19, 44, '2021-12-21 02:49:11', '2021-12-21 02:49:11'),
(19, 45, '2021-12-21 02:49:11', '2021-12-21 02:49:11'),
(18, 44, '2021-12-21 02:50:25', '2021-12-21 02:50:25'),
(18, 45, '2021-12-21 02:50:25', '2021-12-21 02:50:25'),
(18, 46, '2021-12-21 02:50:25', '2021-12-21 02:50:25'),
(18, 47, '2021-12-21 02:50:25', '2021-12-21 02:50:25'),
(20, 33, '2021-12-21 05:21:42', '2021-12-21 05:21:42'),
(20, 48, '2021-12-21 05:21:42', '2021-12-21 05:21:42'),
(20, 49, '2021-12-21 05:21:42', '2021-12-21 05:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_id`, `type_id`, `created_at`, `updated_at`) VALUES
(39, 21, 2, '2021-12-21 02:48:31', '2021-12-21 02:48:31'),
(42, 19, 2, '2021-12-21 02:49:11', '2021-12-21 02:49:11'),
(43, 18, 2, '2021-12-21 02:50:25', '2021-12-21 02:50:25'),
(52, 20, 2, '2021-12-21 05:21:42', '2021-12-21 05:21:42'),
(53, 20, 3, '2021-12-21 05:21:42', '2021-12-21 05:21:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_from_foreign` (`from`),
  ADD KEY `reviews_to_foreign` (`to`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD KEY `user_categories_user_id_foreign` (`user_id`),
  ADD KEY `user_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `user_tags`
--
ALTER TABLE `user_tags`
  ADD KEY `user_tags_user_id_foreign` (`user_id`),
  ADD KEY `user_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_types_user_id_foreign` (`user_id`),
  ADD KEY `user_types_type_id_foreign` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_to_foreign` FOREIGN KEY (`to`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD CONSTRAINT `user_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tags`
--
ALTER TABLE `user_tags`
  ADD CONSTRAINT `user_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_types`
--
ALTER TABLE `user_types`
  ADD CONSTRAINT `user_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
