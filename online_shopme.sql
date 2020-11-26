-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2020 at 03:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Outfits', '2020-05-30 01:51:17', '2020-05-30 01:51:17'),
(2, 'Footwear', '2020-05-30 01:51:24', '2020-05-30 01:51:24'),
(3, 'Bags', '2020-05-30 01:51:32', '2020-05-30 01:51:37'),
(4, 'Accessroies', '2020-05-30 01:51:48', '2020-05-30 01:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `category_id`, `color`, `created_at`, `updated_at`) VALUES
(1, 1, 'Black', '2020-05-30 01:55:21', '2020-05-30 01:55:21'),
(2, 1, 'White', '2020-05-30 01:55:26', '2020-05-30 01:55:26'),
(3, 1, 'Red', '2020-05-30 01:55:31', '2020-05-30 01:55:31'),
(4, 1, 'Pink', '2020-05-30 01:55:37', '2020-05-30 01:55:37'),
(5, 2, 'Black', '2020-05-30 01:56:02', '2020-05-30 01:56:02'),
(6, 2, 'White', '2020-05-30 01:56:10', '2020-05-30 01:56:10'),
(7, 2, 'Red', '2020-05-30 01:56:21', '2020-05-30 01:56:21'),
(8, 2, 'Purpple', '2020-05-30 01:56:26', '2020-05-30 01:56:26'),
(9, 4, 'White', '2020-05-30 02:02:08', '2020-05-30 02:02:08'),
(10, 4, 'Gold', '2020-05-30 02:02:29', '2020-05-30 02:02:29'),
(11, 1, 'Purpple', '2020-07-14 07:20:44', '2020-07-14 07:20:44'),
(12, 1, 'Green', '2020-07-14 07:22:01', '2020-07-14 07:22:01'),
(13, 1, 'White', '2020-07-14 07:22:19', '2020-07-14 07:22:19'),
(14, 1, 'Yellow', '2020-07-14 07:24:21', '2020-07-14 07:24:21'),
(15, 4, 'Green', '2020-07-14 07:33:19', '2020-07-14 07:33:19'),
(16, 4, 'Pink', '2020-07-14 07:33:27', '2020-07-14 07:33:27'),
(17, 4, 'PinkDark', '2020-07-14 07:34:29', '2020-07-14 07:34:29'),
(18, 4, 'Purpple', '2020-07-14 07:36:04', '2020-07-14 07:36:04'),
(19, 2, 'Pink', '2020-07-14 07:45:04', '2020-07-14 07:45:04'),
(20, 3, 'White', '2020-07-14 07:51:36', '2020-07-14 07:51:36'),
(21, 3, 'Black', '2020-07-14 07:51:41', '2020-07-14 07:51:41'),
(22, 3, 'Pink', '2020-07-14 07:55:01', '2020-07-14 07:55:01'),
(23, 3, 'Blue', '2020-07-14 07:55:10', '2020-07-14 07:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `color_item`
--

CREATE TABLE `color_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_item`
--

INSERT INTO `color_item` (`id`, `item_id`, `color_id`, `created_at`, `updated_at`) VALUES
(7, 1, 1, NULL, NULL),
(8, 1, 2, NULL, NULL),
(9, 1, 3, NULL, NULL),
(10, 1, 4, NULL, NULL),
(11, 2, 9, NULL, NULL),
(12, 2, 10, NULL, NULL),
(13, 3, 2, NULL, NULL),
(14, 3, 3, NULL, NULL),
(15, 4, 12, NULL, NULL),
(16, 4, 13, NULL, NULL),
(17, 5, 4, NULL, NULL),
(18, 5, 11, NULL, NULL),
(19, 5, 12, NULL, NULL),
(20, 5, 13, NULL, NULL),
(21, 5, 14, NULL, NULL),
(22, 6, 5, NULL, NULL),
(23, 6, 6, NULL, NULL),
(27, 7, 15, NULL, NULL),
(28, 7, 16, NULL, NULL),
(29, 7, 17, NULL, NULL),
(30, 7, 18, NULL, NULL),
(31, 8, 5, NULL, NULL),
(32, 8, 6, NULL, NULL),
(33, 10, 19, NULL, NULL),
(34, 11, 20, NULL, NULL),
(35, 11, 21, NULL, NULL),
(36, 12, 22, NULL, NULL),
(37, 12, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_fees`
--

CREATE TABLE `delivery_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `township_id` bigint(20) UNSIGNED NOT NULL,
  `fee` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_fees`
--

INSERT INTO `delivery_fees` (`id`, `township_id`, `fee`, `created_at`, `updated_at`) VALUES
(1, 1, '2000', '2020-05-30 01:53:05', '2020-05-30 01:53:05'),
(2, 1, '1500', '2020-05-30 01:53:11', '2020-05-30 01:53:35'),
(3, 3, '2000', '2020-05-30 01:53:17', '2020-05-30 01:53:17'),
(4, 4, '2500', '2020-05-30 01:53:24', '2020-05-30 01:53:24'),
(5, 5, '2000', '2020-07-14 07:58:28', '2020-07-14 07:58:28'),
(6, 6, '2000', '2020-07-14 07:58:33', '2020-07-14 07:58:33');

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `user_id`, `item_name`, `item_price`, `discount_price`, `item_image`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'New 2020 T-Shirt', '8000', NULL, '[\"image\\/item\\/5ed219959d1991590827413.jpg\",\"image\\/item\\/5ed219959d2301590827413.jpg\",\"image\\/item\\/5ed219959d2641590827413.jpg\",\"image\\/item\\/5ed219959d2901590827413.jpg\"]', 'How is sweety', '2020-05-30 02:00:13', '2020-05-30 02:00:13'),
(2, 4, 1, 'Cosmetics Shlef', '21800', '21000', '[\"image\\/item\\/5ed21a6166e2b1590827617.jpg\",\"image\\/item\\/5ed21a6166eac1590827617.jpg\"]', 'To store your accessroies', '2020-05-30 02:03:37', '2020-05-30 02:03:37'),
(3, 1, 1, 'Crop Top Girl', '5500', NULL, '[\"image\\/item\\/5f0db7e48c4cd1594734564.jpg\",\"image\\/item\\/5f0db7e48c5661594734564.jpg\"]', 'Pretty Crop Top with BKK Collection', '2020-07-14 07:19:24', '2020-07-14 07:19:24'),
(4, 1, 1, 'Small Sweater Girl', '5500', NULL, '[\"image\\/item\\/5f0db8d5737ce1594734805.jpg\",\"image\\/item\\/5f0db8d5738501594734805.jpg\"]', 'Crop Top Sweater For Girls', '2020-07-14 07:23:25', '2020-07-14 07:23:25'),
(5, 1, 1, 'Stick T shirt', '5500', NULL, '[\"image\\/item\\/5f0db9946f20b1594734996.jpg\",\"image\\/item\\/5f0db9946f2821594734996.jpg\",\"image\\/item\\/5f0db9946f2cb1594734996.jpg\"]', 'Stick T shirt With 5 colors', '2020-07-14 07:26:36', '2020-07-14 07:26:36'),
(6, 2, 1, 'Shoe with String', '9500', NULL, '[\"image\\/item\\/5f0dba6ddf5b41594735213.jpg\",\"image\\/item\\/5f0dba6ddf6321594735213.jpg\"]', 'Free Style', '2020-07-14 07:30:13', '2020-07-14 07:30:13'),
(7, 4, 1, 'Sweet Bed Cover', '28000', NULL, '[\"image\\/item\\/5f0dbbc25ed031594735554.jpg\",\"image\\/item\\/5f0dbbc25ed831594735554.jpg\",\"image\\/item\\/5f0dbbc25edb51594735554.jpg\"]', 'To be home sweet home', '2020-07-14 07:35:54', '2020-07-14 07:35:54'),
(8, 2, 1, 'High Heel', '14000', NULL, '[\"image\\/item\\/5f0dbc79695dd1594735737.jpg\",\"image\\/item\\/5f0dbc79696711594735737.jpg\"]', 'High Heel with pretty', '2020-07-14 07:38:57', '2020-07-14 07:38:57'),
(9, 2, 1, 'Lady Shoe', '14000', NULL, '[\"image\\/item\\/5f0dbd35d5b4e1594735925.jpg\",\"image\\/item\\/5f0dbd35d5bf91594735925.jpg\"]', 'Lady Shoe with Peal', '2020-07-14 07:42:05', '2020-07-14 07:42:05'),
(10, 2, 1, 'Erke Pink', '35000', NULL, '[\"image\\/item\\/5f0dbe95225f51594736277.jpg\"]', 'Erke Boot', '2020-07-14 07:47:57', '2020-07-14 07:47:57'),
(11, 3, 1, 'Travel Bag', '23000', NULL, '[\"image\\/item\\/5f0dbfa8586601594736552.jpg\",\"image\\/item\\/5f0dbfa8586df1594736552.jpg\"]', 'Pretty Travel Bag', '2020-07-14 07:52:32', '2020-07-14 07:52:32'),
(12, 3, 1, 'Burma Bag', '28000', NULL, '[\"image\\/item\\/5f0dc09160b471594736785.jpg\",\"image\\/item\\/5f0dc09160bc91594736785.jpg\"]', 'Purma Bag Collection', '2020-07-14 07:56:25', '2020-07-14 07:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `item_size`
--

CREATE TABLE `item_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_size`
--

INSERT INTO `item_size` (`id`, `item_id`, `size_id`, `created_at`, `updated_at`) VALUES
(6, 1, 5, NULL, NULL),
(7, 1, 6, NULL, NULL),
(8, 1, 7, NULL, NULL),
(9, 1, 8, NULL, NULL),
(10, 1, 9, NULL, NULL),
(11, 3, 5, NULL, NULL),
(12, 3, 6, NULL, NULL),
(13, 3, 7, NULL, NULL),
(14, 3, 8, NULL, NULL),
(15, 4, 6, NULL, NULL),
(16, 4, 7, NULL, NULL),
(17, 4, 8, NULL, NULL),
(18, 5, 7, NULL, NULL),
(19, 5, 8, NULL, NULL),
(20, 5, 9, NULL, NULL),
(21, 6, 1, NULL, NULL),
(22, 6, 2, NULL, NULL),
(23, 6, 3, NULL, NULL),
(24, 8, 2, NULL, NULL),
(25, 8, 3, NULL, NULL),
(26, 8, 4, NULL, NULL),
(27, 9, 1, NULL, NULL),
(28, 9, 2, NULL, NULL),
(29, 9, 3, NULL, NULL),
(30, 9, 4, NULL, NULL),
(31, 10, 1, NULL, NULL),
(32, 10, 2, NULL, NULL),
(33, 10, 3, NULL, NULL),
(34, 10, 4, NULL, NULL);

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
(4, '2020_05_26_054734_create_categories_table', 1),
(5, '2020_05_26_054800_create_townships_table', 1),
(6, '2020_05_26_054806_create_delivery_fees_table', 1),
(7, '2020_05_26_054820_create_sizes_table', 1),
(8, '2020_05_26_054825_create_items_table', 1),
(9, '2020_05_26_054842_create_orders_table', 1),
(10, '2020_05_26_054850_create_order_details_table', 1),
(11, '2020_05_27_163021_create_permission_tables', 1),
(12, '2020_05_28_055116_create_colors_table', 1),
(13, '2020_05_28_093745_create_item_size_table', 1),
(14, '2020_05_28_094221_create_color_item_table', 1);

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
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `voucher_no`, `order_date`, `address`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '5f0df2e6081b0', '2020-07-14 18:01:10', '8A, MTP Condo, Insein Road, Hlaing, Yangon', '71000', 1, '2020-07-14 11:31:10', '2020-07-14 11:31:43'),
(2, 3, '5f0df3afeaee7', '2020-07-14 18:04:31', '9C, Peal Condo, 189, Latha , Yangon', '31400', 0, '2020-07-14 11:34:31', '2020-07-14 11:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `subtotal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `item_id`, `voucher_no`, `qty`, `subtotal`, `size_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 11, '5f0df2e6081b0', 2, '46000', NULL, 'image/item/5f0dbfa8586601594736552.jpg', '2020-07-14 11:31:10', '2020-07-14 11:31:10'),
(2, 11, '5f0df2e6081b0', 1, '23000', NULL, 'image/item/5f0dbfa8586df1594736552.jpg', '2020-07-14 11:31:10', '2020-07-14 11:31:10'),
(3, 12, '5f0df3afeaee7', 1, '28000', NULL, 'image/item/5f0dc09160b471594736785.jpg', '2020-07-14 11:34:32', '2020-07-14 11:34:32'),
(4, 9, '5f0df3afeaee7', 1, '1400', '2', 'image/item/5f0dbd35d5bf91594735925.jpg', '2020-07-14 11:34:32', '2020-07-14 11:34:32');

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
(1, 'admin', 'web', '2020-07-14 08:17:06', '2020-07-14 08:17:06'),
(2, 'user', 'web', '2020-07-14 08:17:06', '2020-07-14 08:17:06');

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
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `category_id`, `size`, `created_at`, `updated_at`) VALUES
(1, 2, '35', '2020-05-30 01:53:42', '2020-05-30 01:54:08'),
(2, 2, '36', '2020-05-30 01:53:45', '2020-05-30 01:54:21'),
(3, 2, '37', '2020-05-30 01:53:50', '2020-05-30 01:54:17'),
(4, 2, '38', '2020-05-30 01:53:54', '2020-05-30 01:54:12'),
(5, 1, 'XS', '2020-05-30 01:54:28', '2020-05-30 01:54:28'),
(6, 1, 'S', '2020-05-30 01:54:33', '2020-05-30 01:54:33'),
(7, 1, 'M', '2020-05-30 01:54:37', '2020-05-30 01:54:37'),
(8, 1, 'L', '2020-05-30 01:54:41', '2020-05-30 01:54:41'),
(9, 1, 'XL', '2020-05-30 01:54:44', '2020-05-30 01:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `townships`
--

CREATE TABLE `townships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `township` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `townships`
--

INSERT INTO `townships` (`id`, `township`, `created_at`, `updated_at`) VALUES
(1, 'Mahar Aung Myae', '2020-05-30 01:52:13', '2020-05-30 01:52:13'),
(2, 'Chan Aye Thar Zan', '2020-05-30 01:52:26', '2020-05-30 01:52:26'),
(3, 'Kyawl Se Kan', '2020-05-30 01:52:40', '2020-05-30 01:52:40'),
(4, 'Chan Mya Thar Si', '2020-05-30 01:52:56', '2020-05-30 01:52:56'),
(5, 'Hlaing', '2020-07-14 07:58:13', '2020-07-14 07:58:13'),
(6, 'Latha', '2020-07-14 07:58:19', '2020-07-14 07:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_no`, `address`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ma Ma', 'mama@gmail.com', NULL, '$2y$10$Lax70xoYur1JdCCiP/x/N.gGpo.hAycvCN3vdOTEnAW7iFDfvp4U6', '09876542124', 'Hlaing, Yangon', 'image/profile/avatar.png', NULL, '2020-07-14 08:22:33', '2020-07-14 08:22:33'),
(3, 'Ko Ko', 'koko@gmail.com', NULL, '$2y$10$3rB0IquzuU1z4logE85yhubjzf/xpfoEqy8DHxkj/lsYCFd71ShSq', '09876544554', 'Latha, Yangon', 'image/profile/avatar.png', NULL, '2020-07-14 11:34:05', '2020-07-14 11:34:05'),
(4, 'Honey Htun', 'honeyhtun@gmail.com', NULL, '$2y$10$7/Lf6lFOKqJKcnTIpLssdOJ.iLGbPwhxG8HKTntZgWqU45gepdaze', '0987654245', 'Khant Balu, Saging', 'image/profile/5f0e087b40ba31594755195.jpg', NULL, '2020-07-14 13:03:15', '2020-07-14 13:03:15'),
(5, 'Min Pike Hmu', 'minpikehmu@gmail.com', NULL, '$2y$10$Jp0hbqI0QbyNPG2U4buwL.ktJ2TvYbuG2JWtiV2LKUe9NS/vyP7Pu', '0987654', 'lkjhgfd', 'image/profile/5f0e0ef67448c1594756854.jpg', NULL, '2020-07-14 13:30:54', '2020-07-14 13:30:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_item`
--
ALTER TABLE `color_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_item_item_id_foreign` (`item_id`),
  ADD KEY `color_item_color_id_foreign` (`color_id`);

--
-- Indexes for table `delivery_fees`
--
ALTER TABLE `delivery_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_size`
--
ALTER TABLE `item_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_size_item_id_foreign` (`item_id`),
  ADD KEY `item_size_size_id_foreign` (`size_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `color_item`
--
ALTER TABLE `color_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `delivery_fees`
--
ALTER TABLE `delivery_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item_size`
--
ALTER TABLE `item_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `townships`
--
ALTER TABLE `townships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `color_item`
--
ALTER TABLE `color_item`
  ADD CONSTRAINT `color_item_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_size`
--
ALTER TABLE `item_size`
  ADD CONSTRAINT `item_size_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
