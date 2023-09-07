-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2022 at 07:48 AM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `email`, `gender`, `address`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rony Islam', '01792702312', 'rony.rng@gmail.com', 'Male', 'Dhaka, Bangladeh', NULL, '$2y$10$t/iN3KLlOQQjri.YtPEiR.sBW0hr/0W47i.8koB42lOwipKJ1PDh2', 'public/backend/upload/profile/1702263811887225.png', NULL, '2021-06-10 22:57:14', '2021-06-11 04:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `promo_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Naan', 'naan', 'public/backend/upload/category/1702265044785960.png', 'public/backend/upload/category/promo_image/1702284630877224.png', 1, '2021-06-11 03:58:59', '2021-06-13 02:55:33'),
(2, 'Plats', 'plats', 'public/backend/upload/category/1702284643924529.png', 'public/backend/upload/category/promo_image/1702284644040854.png', 1, '2021-06-11 04:01:11', '2021-06-13 02:55:33'),
(6, 'Vins', 'vins', 'public/backend/upload/category/1702282797176206.png', 'public/backend/upload/category/promo_image/1702284663251687.png', 1, '2021-06-11 08:56:23', '2021-06-13 02:55:34'),
(7, 'Wang Jensen', 'wang-jensen', 'public/backend/upload/category/1702283316064663.png', NULL, 1, '2021-06-11 09:04:17', '2021-06-13 02:55:34'),
(9, 'test promo', 'test-promo', 'public/backend/upload/category/1702284240592880.png', 'public/backend/upload/category/promo_image/1702284615903822.png', 1, '2021-06-11 09:19:19', '2021-06-13 02:55:34'),
(11, 'Aquila Marshall', 'aquila-marshall', 'public/backend/upload/category/1702441364447898.jpg', 'public/backend/upload/category/promo_image/1702441364513131.png', 1, '2021-06-13 02:56:44', '2021-06-13 02:56:44'),
(12, 'Yetta Thornton', 'yetta-thornton', 'public/backend/upload/category/1702441402319953.png', NULL, 0, '2021-06-13 02:57:20', '2021-09-16 11:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'Percentage', 10.00, 1, '2021-06-12 00:46:49', '2021-06-20 01:56:44'),
(6, 'naan', 'Percentage', 5.00, 1, '2021-06-12 01:02:48', '2021-06-12 01:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'public/backend/upload/logo/1703021459651739.png', 'public/backend/upload/favicon/1703021473296176.png', '2021-06-19 17:40:29', '2021-06-19 14:37:19');

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
(4, '2021_06_11_040148_create_admins_table', 1),
(5, '2021_06_11_092447_create_categories_table', 2),
(6, '2021_06_11_135042_create_sub_categories_table', 3),
(8, '2021_06_11_155743_create_products_table', 4),
(9, '2021_06_12_043251_create_reservations_table', 5),
(10, '2021_06_12_062654_create_coupons_table', 6),
(11, '2021_06_12_094123_create_set_menus_table', 7),
(12, '2021_06_12_105200_create_set_menu_categories_table', 8),
(13, '2021_06_12_113327_create_set_menu_products_table', 9),
(14, '2021_06_16_034938_create_payment_methods_table', 10),
(15, '2021_06_16_071121_create_order_times_table', 11),
(16, '2021_06_16_170103_create_shipping_charges_table', 12),
(17, '2021_06_17_061232_create_orders_table', 13),
(18, '2021_06_17_151710_create_order_products_table', 14),
(19, '2021_06_19_060746_create_order_logs_table', 15),
(20, '2021_06_19_184735_create_sliders_table', 16),
(21, '2021_06_19_193418_create_logos_table', 17),
(22, '2021_06_19_200843_create_min_max_amounts_table', 18),
(23, '2021_06_20_064500_create_website_settings_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `min_max_amounts`
--

CREATE TABLE `min_max_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `min_amount` double(8,2) NOT NULL,
  `max_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `min_max_amounts`
--

INSERT INTO `min_max_amounts` (`id`, `min_amount`, `max_amount`, `created_at`, `updated_at`) VALUES
(1, 100.00, 10000.00, NULL, '2021-06-19 15:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charges` double(8,2) DEFAULT NULL,
  `grand_total` double(8,2) NOT NULL,
  `is_seen` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `delivery_type`, `address`, `city`, `postal_code`, `coupon_code`, `coupon_amount`, `order_date`, `order_time`, `comments`, `payment_method`, `order_status`, `transaction_id`, `payment_status`, `shipping_charges`, `grand_total`, `is_seen`, `created_at`, `updated_at`) VALUES
(1, 3, '1', 'Parish France', 'Parish', '1262', NULL, NULL, '2021-06-30', '20.00', 'test', 'Stripe', 'Delivered', 'ch_1J3OqQBWuuxf9hWHV8yFUxWX', 'Complete', 100.00, 975.00, 1, '2021-06-17 13:16:48', '2021-06-19 15:07:27'),
(2, 3, '1', 'Parish France', 'Parish', '1262', NULL, NULL, '2021-06-29', '19:00', 'test', 'Stripe', 'New', 'ch_1J3OwgBWuuxf9hWH50TpZCMY', 'Complete', 100.00, 255.00, 1, '2021-06-17 13:23:23', '2021-06-18 23:36:38'),
(3, 3, '2', NULL, NULL, NULL, NULL, NULL, '2021-06-05', '13:30', 'Magna totam nisi sed', 'Stripe', 'New', 'ch_1J3P1cBWuuxf9hWHLJFtLHpU', 'Complete', 0.00, 655.00, 1, '2021-06-17 13:28:09', '2021-06-18 23:35:51'),
(4, 2, '2', NULL, NULL, NULL, NULL, NULL, '2021-06-25', '12:00', 'Sed deleniti unde sa', 'CB', 'New', '', NULL, 0.00, 1020.00, 1, '2021-06-18 22:26:05', '2021-06-18 23:01:45'),
(5, 2, '1', 'Dhaka Bangladesh', 'Dhaka', '1209', 'test', '124', '2021-06-29', '19:30', 'test', 'Stripe', 'Shipped', 'ch_1J3v0TBWuuxf9hWHmNMiHHrm', 'Complete', 100.00, 1222.00, 1, '2021-06-18 23:37:38', '2021-06-19 00:02:46'),
(6, 3, '1', 'Dhaka Bangladesh', 'Dhaka', '1209', 'test', '102', '2021-06-25', '20.00', 'Nemo facere veritati', 'Stripe', 'Paid', 'ch_1J46vrBWuuxf9hWH0ruboRMe', 'Complete', 100.00, 1024.00, 1, '2021-06-19 12:21:43', '2021-06-19 12:27:15'),
(7, 3, '1', 'Chilahati, Nilphamari', 'Nilphamari', '1209', NULL, NULL, '2021-06-27', '13:30', 'Magna totam nisi sed', 'Ticket Restaurant', 'New', '', NULL, 100.00, 555.00, 1, '2021-06-19 14:42:45', '2021-06-19 14:43:05'),
(8, 3, '2', NULL, NULL, NULL, NULL, NULL, '2021-06-24', '13:30', 'Nemo facere veritati', 'Ticket Restaurant', 'New', '', NULL, 0.00, 1052.00, 1, '2021-06-19 15:25:15', '2021-06-19 15:25:25'),
(9, 3, '1', 'Chilahati, Nilphamari', 'Nilphamari', '1209', 'test', '68', '2021-06-29', '13:30', 'test', 'Ticket Restaurant', 'New', '', NULL, 100.00, 713.00, 1, '2021-06-24 11:28:24', '2021-06-24 11:28:54'),
(10, 3, '2', NULL, NULL, NULL, 'test', '87', '2021-06-27', '19:30', 'stripe', 'Stripe', 'New', 'ch_1J5uWXBWuuxf9hWHfq8q5nmU', 'Complete', 0.00, 788.00, 1, '2021-06-24 11:31:22', '2021-06-24 11:32:58'),
(11, 3, '1', 'Chilahati, Nilphamari', 'Nilphamari', '1209', 'test', '72', '2021-06-28', '14:00', 'Sed deleniti unde sa', 'Stripe', 'New', 'ch_1J5uZaBWuuxf9hWHH54S4ADv', 'Complete', 100.00, 748.00, 1, '2021-06-24 11:34:31', '2021-06-24 11:34:57'),
(12, 3, '2', NULL, NULL, NULL, NULL, NULL, '2021-06-26', '13:00', 'Fugiat corporis expl', 'Stripe', 'New', 'ch_1J5uasBWuuxf9hWH8pnQ3C8h', 'Complete', 0.00, 584.00, 1, '2021-06-24 11:35:52', '2021-06-24 11:36:43'),
(13, 2, '2', NULL, NULL, NULL, NULL, NULL, '2021-09-01', '12:30', 'Ea proident lorem s', 'Ticket Restaurant', 'New', '', NULL, 0.00, 155.00, 1, '2021-09-01 11:27:20', '2021-09-01 11:27:40'),
(14, 2, '2', NULL, NULL, NULL, NULL, NULL, '2021-09-01', '12:30', 'Ea proident lorem s', 'Ticket Restaurant', 'New', '', NULL, 0.00, 155.00, 1, '2021-09-01 11:27:20', '2021-09-01 11:27:49'),
(15, 1, '1', 'Chilahati, Nilphamari', 'Nilphamari', '1209', NULL, NULL, '2021-09-12', '12:00', 'Ea proident lorem s', 'Stripe', 'New', 'ch_3JYkAsBWuuxf9hWH0iUJB1zW', 'Complete', 100.00, 1475.00, 1, '2021-09-12 00:20:11', '2021-09-12 00:21:20'),
(16, 2, '1', 'Dhaka Bangladesh', 'Dhaka', '1209', NULL, NULL, '2021-09-29', '12:00', 'Nam aliquam saepe ac', 'Stripe', 'New', 'ch_3Jf4vCBWuuxf9hWH1QfHSLBs', 'Complete', 100.00, 255.00, 0, '2021-09-29 11:42:13', '2021-09-29 11:42:13'),
(17, 2, '2', NULL, NULL, NULL, NULL, NULL, '1985-12-13', '12:00', 'Veniam quam porro n', 'Ticket Restaurant', 'New', '', NULL, 0.00, 155.00, 0, '2021-09-29 11:46:11', '2021-09-29 11:46:11'),
(18, 2, '2', NULL, NULL, NULL, NULL, NULL, '1984-06-26', '12:00', 'Eveniet sint amet', 'CB', 'New', '', NULL, 0.00, 330.00, 0, '2021-09-29 11:52:37', '2021-09-29 11:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_logs`
--

CREATE TABLE `order_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_logs`
--

INSERT INTO `order_logs` (`id`, `order_id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'In Process', '2021-06-19 00:14:49', '2021-06-19 00:14:49'),
(2, 1, 'Shipped', '2021-06-19 00:15:02', '2021-06-19 00:15:02'),
(3, 1, 'Delivered', '2021-06-19 00:16:08', '2021-06-19 00:16:08'),
(4, 6, 'In Process', '2021-06-19 12:25:00', '2021-06-19 12:25:00'),
(5, 6, 'Paid', '2021-06-19 12:27:15', '2021-06-19 12:27:15'),
(6, 1, 'Cancelled', '2021-06-19 15:06:00', '2021-06-19 15:06:00'),
(7, 1, 'Delivered', '2021-06-19 15:07:27', '2021-06-19 15:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `items` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `user_id`, `name`, `qty`, `price`, `items`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Felix Randall', '1', 720.00, 'Quincy Hart,Mallory Reyes,Harrison Franco', '2021-06-17 13:16:48', '2021-06-17 13:16:48'),
(2, 1, 3, 'Kuame Carrillo', '1', 155.00, '', '2021-06-17 13:16:48', '2021-06-17 13:16:48'),
(3, 2, 3, 'Kuame Carrillo', '1', 155.00, '', '2021-06-17 13:23:23', '2021-06-17 13:23:23'),
(4, 3, 3, 'Kuame Carrillo', '1', 155.00, '', '2021-06-17 13:28:09', '2021-06-17 13:28:09'),
(5, 3, 3, 'Cara Buck', '1', 500.00, '', '2021-06-17 13:28:09', '2021-06-17 13:28:09'),
(6, 4, 2, 'Felix Randall', '1', 720.00, 'Renee Robertson,Silas Hartman,Harrison Franco', '2021-06-18 22:26:05', '2021-06-18 22:26:05'),
(7, 4, 2, 'Omar Chavez', '1', 300.00, '', '2021-06-18 22:26:05', '2021-06-18 22:26:05'),
(8, 5, 2, 'Mira Hatfield', '1', 526.00, '', '2021-06-18 23:37:38', '2021-06-18 23:37:38'),
(9, 5, 2, 'Felix Randall', '1', 720.00, 'Renee Robertson,Silas Hartman,Harrison Franco', '2021-06-18 23:37:39', '2021-06-18 23:37:39'),
(10, 6, 3, 'Mira Hatfield', '1', 526.00, '', '2021-06-19 12:21:43', '2021-06-19 12:21:43'),
(11, 6, 3, 'Cara Buck', '1', 500.00, '', '2021-06-19 12:21:43', '2021-06-19 12:21:43'),
(12, 7, 3, 'Kuame Carrillo', '1', 155.00, '', '2021-06-19 14:42:45', '2021-06-19 14:42:45'),
(13, 7, 3, 'Omar Chavez', '1', 300.00, '', '2021-06-19 14:42:45', '2021-06-19 14:42:45'),
(14, 8, 3, 'Mira Hatfield', '2', 526.00, '', '2021-06-19 15:25:15', '2021-06-19 15:25:15'),
(15, 9, 3, 'Mira Hatfield', '1', 526.00, '', '2021-06-24 11:28:25', '2021-06-24 11:28:25'),
(16, 9, 3, 'Kuame Carrillo', '1', 155.00, '', '2021-06-24 11:28:25', '2021-06-24 11:28:25'),
(17, 10, 3, 'Kuame Carrillo', '1', 155.00, '', '2021-06-24 11:31:22', '2021-06-24 11:31:22'),
(18, 10, 3, 'Felix Randall', '1', 720.00, 'Lynn Mitchell,Mallory Reyes,Harrison Franco', '2021-06-24 11:31:22', '2021-06-24 11:31:22'),
(19, 11, 3, 'Felix Randall', '1', 720.00, 'Renee Robertson,Silas Hartman,Harrison Franco', '2021-06-24 11:34:31', '2021-06-24 11:34:31'),
(20, 12, 3, 'Keegan Sparks', '1', 584.00, '', '2021-06-24 11:35:52', '2021-06-24 11:35:52'),
(21, 14, 2, 'Kuame Carrillo', '1', 155.00, '', '2021-09-01 11:27:20', '2021-09-01 11:27:20'),
(22, 13, 2, 'Kuame Carrillo', '1', 155.00, '', '2021-09-01 11:27:20', '2021-09-01 11:27:20'),
(23, 15, 1, 'Kuame Carrillo', '1', 155.00, '', '2021-09-12 00:20:11', '2021-09-12 00:20:11'),
(24, 15, 1, 'Cara Buck', '1', 500.00, '', '2021-09-12 00:20:12', '2021-09-12 00:20:12'),
(25, 15, 1, 'Felix Randall', '1', 720.00, 'Quincy Hart,Mallory Reyes,Harrison Franco', '2021-09-12 00:20:12', '2021-09-12 00:20:12'),
(26, 16, 2, 'Kuame Carrillo', '1', 155.00, '', '2021-09-29 11:42:13', '2021-09-29 11:42:13'),
(27, 17, 2, 'Kuame Carrillo', '1', 155.00, '', '2021-09-29 11:46:11', '2021-09-29 11:46:11'),
(28, 18, 2, 'Dante Harmon', '1', 30.00, '', '2021-09-29 11:52:37', '2021-09-29 11:52:37'),
(29, 18, 2, 'Omar Chavez', '1', 300.00, '', '2021-09-29 11:52:37', '2021-09-29 11:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_times`
--

CREATE TABLE `order_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_times`
--

INSERT INTO `order_times` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '12:00', '1', '2021-06-16 01:44:29', '2021-06-26 02:22:42'),
(2, '12:30', '1', '2021-06-16 01:45:19', '2021-06-16 11:52:47'),
(3, '13:00', '1', '2021-06-16 01:45:31', '2021-06-16 11:52:46'),
(4, '13:30', '1', '2021-06-16 01:45:38', '2021-06-16 11:52:47'),
(5, '14:00', '1', '2021-06-16 01:45:46', '2021-06-16 11:52:48'),
(6, '19:00', '1', '2021-06-16 01:46:00', '2021-06-16 11:52:48'),
(7, '19:30', '1', '2021-06-16 01:46:15', '2021-06-16 11:52:49'),
(8, '20.00', '1', '2021-06-16 01:47:16', '2021-06-16 11:52:49');

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'COD', 1, '2021-06-16 03:54:20', '2021-06-16 11:51:12'),
(2, 'Stripe', 1, '2021-06-16 03:54:20', '2021-06-16 02:03:21'),
(3, 'CB', 1, '2021-06-16 03:55:07', '2021-06-16 11:51:01'),
(4, 'Ticket Restaurant', 1, '2021-06-19 18:40:50', '2021-06-19 18:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` double(8,2) NOT NULL,
  `offer_price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `description`, `regular_price`, `offer_price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Austin Bowman', 'Omnis nulla aut labo', 276.00, 200.00, 'public/backend/upload/product/1702291135207016.jpg', 1, '2021-06-11 11:08:54', '2021-06-11 11:32:47'),
(2, 2, NULL, 'Omar Chavez', 'Amet non animi', 300.00, 300.00, 'public/backend/upload/product/1702292589942641.png', 1, '2021-06-11 11:10:06', '2021-06-11 11:35:23'),
(5, 6, 6, 'Dante Harmon', 'Voluptate doloremque', 35.00, 30.00, 'public/backend/upload/product/1702292714955954.png', 1, '2021-06-11 11:34:01', '2021-06-11 11:39:28'),
(6, 7, NULL, 'Odessa Johns', 'Sunt architecto ad u', 50.00, 45.00, 'public/backend/upload/product/1702293245124892.png', 1, '2021-06-11 11:38:52', '2021-06-12 00:55:21'),
(7, 2, 3, 'test promo test promo test test', 'Riz basmati mijoté avec agneau désossé et différentes épices', 100.00, 90.00, 'public/backend/upload/product/1702343331445419.png', 1, '2021-06-12 00:58:33', '2021-06-14 06:18:23'),
(8, 1, 7, 'Keegan Sparks', 'Ut necessitatibus et', 741.00, 584.00, 'public/backend/upload/product/1702438555887722.png', 1, '2021-06-13 02:10:34', '2021-06-13 02:12:06'),
(9, 7, NULL, 'Cara Buck', 'In rerum unde eaque', 500.00, 500.00, 'public/backend/upload/product/1702438498411745.jpg', 1, '2021-06-13 02:11:11', '2021-06-13 02:11:11'),
(10, 2, NULL, 'Tyler Meyer', 'Tenetur minima non d', 381.00, 237.00, 'public/backend/upload/product/1702438537583792.png', 0, '2021-06-13 02:11:48', '2021-06-13 02:49:41'),
(11, 6, NULL, 'Kuame Carrillo', 'morceaux d’agneau tikka, poulet tikka, et,Sheekh kebab, Pakora, Oignon Bajha, Samosa Légume', 200.00, 155.00, 'public/backend/upload/product/1702438577192822.png', 1, '2021-06-13 02:12:26', '2021-06-14 05:45:59'),
(12, 1, 1, 'Mira Hatfield', 'Maiores dolore nisi', 654.00, 526.00, 'public/backend/upload/product/1702546212452544.jpg', 1, '2021-06-14 06:43:16', '2021-06-14 22:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberOfGuest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `numberOfGuest`, `number`, `email`, `date`, `time`, `message`, `status`, `is_seen`, `created_at`, `updated_at`) VALUES
(4, 'Davis Jacobs', '539', '3929886689', 'jaqag@mailinator.com', '2021-06-30', '19:00', 'Eiusmod adipisci dol', 'Pending', 1, '2021-06-19 11:14:59', '2021-06-19 11:28:05'),
(5, 'Mariko Terry', '1000', '409', 'kikawaraza@mailinator.com', '2021-06-23', '13:00', 'Ut qui fuga In opti', 'Pending', 1, '2021-06-19 11:22:16', '2021-06-19 11:27:40'),
(6, 'Bradley Carson', '886', '6903893882', 'mowywyrir@mailinator.com', '2021-06-27', '12:00', 'Dolor commodo labori', 'Pending', 1, '2021-06-19 12:08:50', '2021-06-19 12:17:22'),
(7, 'Driscoll Watts', '722', '0163829722', 'pymo@mailinator.com', '2021-06-25', '14:00', 'Ea aperiam blanditii', 'Pending', 1, '2021-06-19 12:19:33', '2021-06-19 12:19:53'),
(8, 'Alfreda Young', '585', '816', 'zamonefol@mailinator.com', '2021-06-19', '12:00', 'Minus deserunt tempo', 'Confirm', 1, '2021-06-26 02:20:42', '2021-09-16 11:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `set_menus`
--

CREATE TABLE `set_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_menus`
--

INSERT INTO `set_menus` (`id`, `name`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Felix Randall', 720.00, 'Aliquam maiores et v', 'public/backend/upload/setmenu/1702357392355893.png', '2021-06-12 04:42:02', '2021-06-12 04:42:02'),
(5, 'Kimberly Carver', 388.00, 'Obcaecati et asperio', 'public/backend/upload/setmenu/1702357401388388.jpg', '2021-06-12 04:42:11', '2021-06-12 04:42:11'),
(6, 'Fleur Mcdowell', 340.00, 'Et deleniti quia qui', 'public/backend/upload/setmenu/1702357408535660.png', '2021-06-12 04:42:17', '2021-06-12 04:42:17'),
(7, 'Randall Palmer', 505.00, 'Nostrum veritatis es', 'public/backend/upload/setmenu/1702357420986618.jpg', '2021-06-12 04:42:29', '2021-06-12 04:42:29'),
(10, 'Rony Islam', 100.00, 'test', 'public/backend/upload/setmenu/1702365851660678.jpg', '2021-06-12 06:56:29', '2021-06-12 06:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `set_menu_categories`
--

CREATE TABLE `set_menu_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setmenu_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_menu_categories`
--

INSERT INTO `set_menu_categories` (`id`, `setmenu_id`, `name`, `created_at`, `updated_at`) VALUES
(6, 4, 'Velma Kaufman', '2021-06-12 05:31:40', '2021-06-12 05:31:40'),
(7, 4, 'Iona Stafford', '2021-06-12 05:31:45', '2021-06-12 05:31:45'),
(10, 5, 'Test', '2021-06-12 06:08:24', '2021-06-12 06:08:24'),
(12, 10, 'naan', '2021-06-12 06:56:46', '2021-06-12 06:56:46'),
(13, 10, 'riz', '2021-06-12 06:57:08', '2021-06-12 06:57:08'),
(14, 4, 'Beau Chan', '2021-06-15 01:39:43', '2021-06-15 01:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `set_menu_products`
--

CREATE TABLE `set_menu_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setmenu_id` bigint(20) UNSIGNED NOT NULL,
  `setmenucategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_menu_products`
--

INSERT INTO `set_menu_products` (`id`, `setmenu_id`, `setmenucategory_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 5, 10, 'Scarlet Jordan', 'public/backend/upload/setmenu_product/1702362848439633.png', '2021-06-12 06:08:45', '2021-06-12 06:08:45'),
(4, 5, 10, 'naan', 'public/backend/upload/setmenu_product/1702362871214233.jpg', '2021-06-12 06:09:07', '2021-06-12 06:09:07'),
(8, 4, 6, 'Renee Robertson', 'public/backend/upload/setmenu_product/1702364785433092.png', '2021-06-12 06:39:33', '2021-06-12 06:39:33'),
(9, 4, 6, 'Lynn Mitchell', 'public/backend/upload/setmenu_product/1702364801557268.png', '2021-06-12 06:39:48', '2021-06-12 06:39:48'),
(12, 10, 12, 'Test', 'public/backend/upload/setmenu_product/1702365914743016.png', '2021-06-12 06:57:30', '2021-06-12 06:57:30'),
(13, 10, 13, 'Rony Islam', 'public/backend/upload/setmenu_product/1702365938124022.jpg', '2021-06-12 06:57:52', '2021-06-12 06:57:52'),
(14, 4, 7, 'Silas Hartman', 'public/backend/upload/setmenu_product/1702610323866946.jpg', '2021-06-14 23:42:16', '2021-06-14 23:42:16'),
(15, 4, 7, 'Mallory Reyes', 'public/backend/upload/setmenu_product/1702617556105096.jpg', '2021-06-15 01:37:14', '2021-06-15 01:37:14'),
(16, 4, 6, 'Quincy Hart', 'public/backend/upload/setmenu_product/1702617677424330.jpg', '2021-06-15 01:39:09', '2021-06-15 01:39:09'),
(17, 4, 14, 'Harrison Franco', 'public/backend/upload/setmenu_product/1702617779132996.jpg', '2021-06-15 01:40:46', '2021-06-15 01:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_charges` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `shipping_charges`, `created_at`, `updated_at`) VALUES
(1, '100', '2021-06-16 15:07:13', '2021-06-17 00:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'public/backend/upload/slider/1703021402258173.jpg', '2021-06-19 16:58:06', '2021-06-19 14:36:12'),
(2, 'public/backend/upload/slider/1703015863574835.jpg', '2021-06-19 16:58:06', '2021-06-19 13:08:09'),
(3, 'public/backend/upload/slider/1703015869133065.jpg', '2021-06-19 16:58:06', '2021-06-19 13:08:15'),
(4, 'public/backend/upload/slider/1703015875777473.jpg', '2021-06-19 16:58:06', '2021-06-19 13:08:21'),
(5, 'public/backend/upload/slider/1703015882360964.jpg', '2021-06-19 16:58:06', '2021-06-19 13:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Matthew Hayes', 'matthew-hayes', 'public/backend/upload/sub_category/1702282732643940.png', 1, '2021-06-11 08:39:11', '2021-06-11 09:53:52'),
(3, 2, 'Lenore Valentine', 'lenore-valentine', 'public/backend/upload/sub_category/1702281792445450.png', 1, '2021-06-11 08:40:24', '2021-06-11 09:53:59'),
(6, 6, 'Amity Puckett', 'amity-puckett', 'public/backend/upload/sub_category/1702286510691473.png', 1, '2021-06-11 09:55:24', '2021-06-11 09:55:24'),
(7, 1, 'Urielle House', 'urielle-house', 'public/backend/upload/sub_category/1702290678864373.png', 1, '2021-06-11 11:01:40', '2021-06-11 11:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arafat', 'arafat@yopmail.com', '+1 (822) 847-5507', NULL, '$2y$10$oA3SsCuB2d/SFHGnsbho9eWEWyAt3aVsIy9g6XguB/0LbIeRZPvf6', 1, NULL, '2021-06-17 01:22:56', '2021-06-17 01:22:56'),
(2, 'Hope Preston', 'rony.rng@gmail.com', '+1 (822) 847-5507', NULL, '$2y$10$I3D4sLWYlL2ngMDOl4cnsuuQ4nJ8d91HrL0q0tsZNW2AX3Hq1Wa7O', 1, NULL, '2021-06-17 01:51:35', '2021-06-17 01:51:35'),
(3, 'Tana Franks', 'rony.rngp@gmail.com', '+1 (263) 843-2974', NULL, '$2y$10$UvQiD/FhOUJKXbiU66n4suuijujTHVxx8P8BMrl4DvxWJkn5iIR5O', 1, NULL, '2021-06-17 01:52:23', '2021-06-17 01:52:23'),
(4, 'test', 'test@gmail.com', '0172981922', NULL, '$2y$10$DzGSPE2f6apcIB8YmYE.Cu5Wz9QHNM7JNvnrBue91rTPFcqlJRzlK', 0, NULL, '2021-06-17 02:59:02', '2021-06-17 02:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `name`, `address`, `phone`, `email`, `facebook`, `google_plus`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'Lerajwal Restaurant', '17 Rue des Faussets, 33000 Bordeaux, France', '+33 5 56 44 25 97', 'rony.rngp@gmail.com', 'https://www.facebook.com/profile.php?id=100007235597506', 'https://www.googleplus.com', 'https://www.twitter.com', '2021-06-20 04:52:34', '2021-06-20 01:32:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `min_max_amounts`
--
ALTER TABLE `min_max_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_logs_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_times`
--
ALTER TABLE `order_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_menus`
--
ALTER TABLE `set_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_menu_categories`
--
ALTER TABLE `set_menu_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `set_menu_categories_setmenu_id_foreign` (`setmenu_id`);

--
-- Indexes for table `set_menu_products`
--
ALTER TABLE `set_menu_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `set_menu_products_setmenu_id_foreign` (`setmenu_id`),
  ADD KEY `set_menu_products_setmenucategory_id_foreign` (`setmenucategory_id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `min_max_amounts`
--
ALTER TABLE `min_max_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_logs`
--
ALTER TABLE `order_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_times`
--
ALTER TABLE `order_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `set_menus`
--
ALTER TABLE `set_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `set_menu_categories`
--
ALTER TABLE `set_menu_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `set_menu_products`
--
ALTER TABLE `set_menu_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD CONSTRAINT `order_logs_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `set_menu_categories`
--
ALTER TABLE `set_menu_categories`
  ADD CONSTRAINT `set_menu_categories_setmenu_id_foreign` FOREIGN KEY (`setmenu_id`) REFERENCES `set_menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `set_menu_products`
--
ALTER TABLE `set_menu_products`
  ADD CONSTRAINT `set_menu_products_setmenu_id_foreign` FOREIGN KEY (`setmenu_id`) REFERENCES `set_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `set_menu_products_setmenucategory_id_foreign` FOREIGN KEY (`setmenucategory_id`) REFERENCES `set_menu_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
