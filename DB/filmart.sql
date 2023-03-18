-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 09:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_bn` varchar(255) NOT NULL,
  `brand_name_en` varchar(255) NOT NULL,
  `brand_slug_bn` varchar(255) NOT NULL,
  `brand_slug_en` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_bn`, `brand_name_en`, `brand_slug_bn`, `brand_slug_en`, `brand_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Gucci', 'Gucci', 'Gucci', 'gucci', 'backend/images/brand/1758981610833387.jpg', '2023-02-27 05:20:00', '2023-02-27 04:59:45', '2023-02-27 05:20:00'),
(2, 'স্যামসাং', 'Samsung', 'স্যামসাং', 'samsung', 'backend/images/brand/1758982269106477.png', NULL, '2023-02-27 05:10:13', '2023-02-27 05:20:25'),
(3, 'নিউট্রিজিনা', 'NEUTROGENA', 'নিউট্রিজিনা', 'neutrogena', 'backend/images/brand/1759055285983733.png', NULL, '2023-02-28 00:30:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_bn` varchar(255) NOT NULL,
  `category_name_en` varchar(255) NOT NULL,
  `category_slug_bn` varchar(255) NOT NULL,
  `category_slug_en` varchar(255) NOT NULL,
  `category_icon` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_bn`, `category_name_en`, `category_slug_bn`, `category_slug_en`, `category_icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'ইলেক্ট্রনিক', 'Electronic', 'ইলেক্ট্রনিক', 'electronic', 'backend/images/category/1758711914433767.png', NULL, '2023-02-24 04:47:08', '2023-02-24 05:33:02'),
(9, 'মহিলাদের ফ্যাশন', 'Women\'s Fashion', 'মহিলাদের-ফ্যাশন', 'women\'s-fashion', 'backend/images/category/1758716469334648.png', NULL, '2023-02-24 05:38:53', '2023-02-24 06:45:26'),
(10, 'ক্রীড়া ও বহিরাঙ্গন', 'Sports & Outdoors', 'ক্রীড়া-ও-বহিরাঙ্গন', 'sports-&-outdoors', 'backend/images/category/1758712338321298.png', NULL, '2023-02-24 05:39:47', '2023-02-24 06:27:05'),
(11, 'শিশুদের জিনিসপত্র', 'Babies Accessories', 'শিশুদের-জিনিসপত্র', 'babies-accessories', 'backend/images/category/1758712516407655.png', NULL, '2023-02-24 05:42:36', '2023-02-24 05:42:36'),
(12, 'পুরুষদের ফ্যাশন', 'Men\'s Fashion', 'পুরুষদের-ফ্যাশন', 'men\'s-fashion', 'backend/images/category/1758716409805350.png', NULL, '2023-02-24 06:44:29', '2023-02-24 06:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_single_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'active is 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SAVE 60%', 60, '2023-03-11', 1, '2023-02-27 22:08:33', '2023-02-27 22:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'active is = 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `district_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gazipur', 1, '2023-02-27 23:08:59', '2023-02-27 23:08:59'),
(2, 1, 'Dhaka', 1, '2023-02-27 23:09:30', '2023-02-27 23:09:30'),
(3, 1, 'Faridpur', 1, '2023-02-27 23:09:45', '2023-02-27 23:09:45'),
(4, 1, 'Kishoreganj', 1, '2023-02-27 23:09:58', '2023-02-27 23:09:58'),
(5, 1, 'Madaripur', 1, '2023-02-27 23:10:37', '2023-02-27 23:10:37'),
(6, 5, 'Chittagong', 1, '2023-02-27 23:23:52', '2023-02-27 23:23:52'),
(7, 5, 'Cox\'s Bazar', 1, '2023-02-27 23:24:17', '2023-02-27 23:24:17'),
(8, 4, 'Balaganj Upazila.', 1, '2023-02-27 23:27:02', '2023-02-27 23:27:02'),
(9, 4, 'Beanibazar', 1, '2023-02-27 23:27:33', '2023-02-27 23:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'active is  1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 0, '2023-02-27 22:52:17', '2023-02-27 23:02:00'),
(4, 'Sylhet', 0, '2023-02-27 22:53:27', '2023-02-27 23:26:34'),
(5, 'Chattogram', 0, '2023-02-27 22:54:00', '2023-02-27 23:01:39');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_30_044920_create_roles_table', 1),
(5, '2021_07_04_162724_create_brands_table', 1),
(6, '2021_07_08_160946_create_categories_table', 1),
(7, '2021_07_10_100441_create_sub_categories_table', 1),
(8, '2021_07_10_152655_create_sub_sub_categories_table', 1),
(9, '2021_07_14_175959_create_products_table', 1),
(10, '2021_07_16_081519_create_multi_images_table', 1),
(11, '2021_07_18_091059_create_sliders_table', 1),
(12, '2021_08_09_144833_create_wishlists_table', 1),
(13, '2021_08_17_063714_create_coupons_table', 1),
(14, '2021_08_17_141812_create_divisions_table', 1),
(15, '2021_08_17_200513_create_districts_table', 1),
(16, '2021_08_18_092846_create_states_table', 1),
(17, '2021_08_24_101832_create_shippings_table', 1),
(18, '2021_08_24_182702_create_orders_table', 1),
(20, '2021_09_22_141340_create_review_models_table', 1),
(21, '2021_10_04_141054_create_comments_table', 1),
(22, '2021_10_05_070035_create_comment_replies_table', 1),
(23, '2021_08_24_182724_create_order_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `product_id`, `photo_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'backend/images/product/multiImage/1758803354166805.jpg', NULL, '2023-02-25 05:46:26', NULL),
(2, '1', 'backend/images/product/multiImage/1758803354380772.jpg', NULL, '2023-02-25 05:46:26', NULL),
(3, '1', 'backend/images/product/multiImage/1758803354580820.jpg', NULL, '2023-02-25 05:46:27', NULL),
(4, '2', 'backend/images/product/multiImage/1758960483231718.png', NULL, '2023-02-26 23:23:56', NULL),
(5, '2', 'backend/images/product/multiImage/1758960483537049.jpg', NULL, '2023-02-26 23:23:56', NULL),
(6, '3', 'backend/images/product/multiImage/1758966626758036.jpg', NULL, '2023-02-27 01:01:35', NULL),
(7, '3', 'backend/images/product/multiImage/1758966626956833.jpg', NULL, '2023-02-27 01:01:35', NULL),
(8, '3', 'backend/images/product/multiImage/1758966627232870.jpg', NULL, '2023-02-27 01:01:35', NULL),
(9, '4', 'backend/images/product/multiImage/1758968904368750.jpg', NULL, '2023-02-27 01:37:47', NULL),
(10, '4', 'backend/images/product/multiImage/1758968904493886.jpg', NULL, '2023-02-27 01:37:47', NULL),
(11, '5', 'backend/images/product/multiImage/1758969707903052.jpg', NULL, '2023-02-27 01:50:34', NULL),
(12, '5', 'backend/images/product/multiImage/1758969708198450.jpg', NULL, '2023-02-27 01:50:34', NULL),
(13, '6', 'backend/images/product/multiImage/1758970562573137.jpeg', NULL, '2023-02-27 02:04:08', NULL),
(14, '6', 'backend/images/product/multiImage/1758970562782842.jpg', NULL, '2023-02-27 02:04:09', NULL),
(15, '7', 'backend/images/product/multiImage/1758982850945006.jpg', NULL, '2023-02-27 05:19:28', NULL),
(16, '7', 'backend/images/product/multiImage/1758982851254776.jpg', NULL, '2023-02-27 05:19:28', NULL),
(17, '7', 'backend/images/product/multiImage/1758982851435182.jpg', NULL, '2023-02-27 05:19:28', NULL),
(18, '8', 'backend/images/product/multiImage/1759066330434176.jpg', NULL, '2023-02-28 03:26:20', NULL),
(19, '8', 'backend/images/product/multiImage/1759066330667458.jpg', NULL, '2023-02-28 03:26:20', NULL),
(20, '9', 'backend/images/product/multiImage/1759067393189071.jpeg', NULL, '2023-02-28 03:43:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `postCode` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_month` varchar(255) NOT NULL,
  `order_year` varchar(255) NOT NULL,
  `confirmed_date` varchar(255) DEFAULT NULL,
  `processing_date` varchar(255) DEFAULT NULL,
  `picked_date` varchar(255) DEFAULT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `cancel_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `return_reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `postCode`, `address`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House no:2 Road:12 Banani', NULL, 'SSL Payment', '63fde8897ec38', 'BDT', 134049.00, NULL, 'SPM84249262', '28 February 2023', 'February', '2023', '28 February 2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Confirm', '2023-02-28 05:42:01', '2023-02-28 06:08:31'),
(2, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House no:2 Road:12 Banani', NULL, 'SSL Payment', '63fde88a16f0c', 'BDT', 134049.00, NULL, 'SPM75733111', '28 February 2023', 'February', '2023', '28 February 2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Confirm', '2023-02-28 05:42:02', '2023-02-28 06:09:10'),
(3, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House no:2 Road:12 Banani', NULL, 'SSL Payment', '63fde90f4d8c3', 'BDT', 134049.00, NULL, 'SPM11317647', '28 February 2023', 'February', '2023', '28 February 2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Confirm', '2023-02-28 05:44:15', '2023-02-28 06:09:16'),
(4, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House no:2 Road:12 Banani', NULL, 'SSL Payment', '63fde90fbde81', 'BDT', 134049.00, NULL, 'SPM45675717', '28 February 2023', 'February', '2023', '28 February 2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Confirm', '2023-02-28 05:44:15', '2023-02-28 06:09:22'),
(5, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House no:12 road:10 Banani dhaka', 'card_1MgRewL1ewd4d4iDMEXzUEI0', 'Stripe', 'txn_3MgRexL1ewd4d4iD14e02mHw', 'usd', 134049.00, '63fde9e383996', 'SPM56589803', '28 February 2023', 'February', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2023-02-28 05:47:50', NULL),
(6, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House no:12 road:10 Banani dhaka', 'card_1MgRf1L1ewd4d4iDDM3uwuMe', 'Stripe', 'txn_3MgRf3L1ewd4d4iD0xWlIGPw', 'usd', 134049.00, '63fde9e9f3259', 'SPM90248934', '28 February 2023', 'February', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2023-02-28 05:47:55', NULL),
(7, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House :12 road:12 banani', 'card_1MgRjVL1ewd4d4iDSkVNCQdy', 'Stripe', 'txn_3MgRjWL1ewd4d4iD1D8Ig7Cj', 'usd', 134049.00, '63fdeafeb9a2d', 'SPM30910222', '28 February 2023', 'February', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2023-02-28 05:52:32', NULL),
(8, 6, 1, 2, 4, 'zerin', 'zerin@gmail.com', '017989887766', 4234, 'House:23 Road:3', 'card_1MgSJcL1ewd4d4iD8U0gMMYe', 'Stripe', 'txn_3MgSJdL1ewd4d4iD0F5dvYcw', 'usd', 28540.00, '63fdf3bdc74d8', 'SPM70082682', '28 February 2023', 'February', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2023-02-28 06:29:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) DEFAULT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_name_bn` varchar(255) NOT NULL,
  `product_slug_en` varchar(255) NOT NULL,
  `product_slug_bn` varchar(255) NOT NULL,
  `product_tags_en` varchar(255) NOT NULL,
  `product_tags_bn` varchar(255) NOT NULL,
  `product_title_en` varchar(255) NOT NULL,
  `product_title_bn` varchar(255) NOT NULL,
  `product_desc_en` text NOT NULL,
  `product_desc_bn` text NOT NULL,
  `product_size_en` varchar(255) DEFAULT NULL,
  `product_size_bn` varchar(255) DEFAULT NULL,
  `product_color_en` varchar(255) DEFAULT NULL,
  `product_color_bn` varchar(255) DEFAULT NULL,
  `product_code` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `product_thumbnail` varchar(255) NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `spacial_offer` int(11) DEFAULT NULL,
  `spacial_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_bn`, `product_slug_en`, `product_slug_bn`, `product_tags_en`, `product_tags_bn`, `product_title_en`, `product_title_bn`, `product_desc_en`, `product_desc_bn`, `product_size_en`, `product_size_bn`, `product_color_en`, `product_color_bn`, `product_code`, `product_qty`, `selling_price`, `discount_price`, `product_thumbnail`, `hot_deals`, `featured`, `spacial_offer`, `spacial_deals`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 9, 4, 'HelloKimi 6 PCS Anime Figurine Toys Japan Anime Naruto Figure PVC Action Figurine Model Doll Figure Toys Collection Doll Toys Naruto Uzumaki Model Toys', 'হ্যালোকিমি 6 পিসি এনিমে ফিগারিন খেলনা জাপান এনিমে নারুটো ফিগার পিভিসি অ্যাকশন ফিগারিন মডেল ডল ফিগার খেলনা সংগ্রহ পুতুল খেলনা naruto uzumaki মডেল খেলনা', 'hellokimi-6-pcs-anime-figurine-toys-japan-anime-naruto-figure-pvc-action-figurine-model-doll-figure-toys-collection-doll-toys-naruto-uzumaki-model-toys', 'হ্যালোকিমি-6-পিসি-এনিমে-ফিগারিন-খেলনা-জাপান-এনিমে-নারুটো-ফিগার-পিভিসি-অ্যাকশন-ফিগারিন-মডেল-ডল-ফিগার-খেলনা-সংগ্রহ-পুতুল-খেলনা-naruto-uzumaki-মডেল-খেলনা', 'hellokimi', 'হ্যালোকিমি', 'HelloKimi 6 PCS Anime Figurine Toys Japan Anime Naruto Figure PVC Action Figurine Model Doll Figure Toys Collection Doll Toys Naruto Uzumaki Model Toys', 'হ্যালোকিমি 6 পিসি এনিমে ফিগারিন খেলনা জাপান এনিমে নারুটো ফিগার পিভিসি অ্যাকশন ফিগারিন মডেল ডল ফিগার খেলনা সংগ্রহ পুতুল খেলনা naruto uzumaki মডেল খেলনা', 'Product name: Japan Anime Figurine Toys\r\nProduct material: PVC\r\nProduct weight: About 90g\r\nProduct size: 7-8CM\r\nClean Paint Job and Stance: These toy utilizing cool style sculpting technology to bring out the coolest possible scenes.\r\nGreat Addition to The Collection: Combine these figurine model dolls, letting the world of Demon Slayer unfold right on your tabletop.\r\nSafe and Durable: With all of our products made from PVC materials, that they are not only fun but also safe for you.\r\nGreat Gift: As a surprising gift for children adults definitely a collection necessary for Naruto.', 'Product name: Japan Anime Figurine Toys\nProduct material: PVC\nProduct weight: About 90g\nProduct size: 7-8CM\nClean Paint Job and Stance: These toy utilizing cool style sculpting technology to bring out the coolest possible scenes.\nGreat Addition to The Collection: Combine these figurine model dolls, letting the world of Demon Slayer unfold right on your tabletop.\nSafe and Durable: With all of our products made from PVC materials, that they are not only fun but also safe for you.\nGreat Gift: As a surprising gift for children adults definitely a collection necessary for Naruto.', '30', NULL, NULL, NULL, 1000, 2000, 200, 100, 'backend/images/product/thumbnail/1758959309456669.jpg', 1, 1, NULL, NULL, 1, '2023-02-27 04:26:52', '2023-02-26 23:02:19', '2023-02-27 04:26:52'),
(2, 11, 4, 6, 'Aveeno Baby Moisturizing Lotion, 150ml', 'Aveeno বেবি ময়েশ্চারাইজিং লোশন, 150ml', 'aveeno-baby-moisturizing-lotion-150ml', 'Aveeno-বেবি-ময়েশ্চারাইজিং-লোশন-150ml', 'Lotion,Aveeno', 'Aveeno,লোশন', 'Aveeno Baby Moisturizing Lotion', 'Aveeno-বেবি-ময়েশ্চারাইজিং-লোশন', 'Product details of Aveeno Baby Moisturizing Lotion, 150ml\r\nProduct Type: Baby Lotion\r\nCapacity: 150 ml\r\nParabens Free\r\nLeaves skin feeling moisturised 24 hours\r\n\r\nSuitable for body and face With a soft fragrance\r\nPaediatrician tested\r\nMade In France', 'Product details of Aveeno বেবি ময়েশ্চারাইজিং লোশন, 150ml\r\nProduct Type: Baby Lotion\r\nCapacity: 150 ml\r\nParabens Free\r\nLeaves skin feeling moisturised 24 hours\r\nSuitable for body and face With a soft fragrance\r\nPaediatrician tested\r\nMade In France', '150ml', '১৫০ এম এল', NULL, NULL, 5890, 300, 650, 550, 'backend/images/product/thumbnail/1758960483018567.jpg', 1, NULL, NULL, NULL, 1, NULL, '2023-02-26 23:23:56', NULL),
(3, 11, 4, 5, 'Aveeno Baby Daily Care 2-in-1 Shampoo & Conditioner 300ml, Made in UK', 'Aveeno বেবি ডেইলি কেয়ার 2-ইন-1 শ্যাম্পু এবং কন্ডিশনার 300ml, যুক্তরাজ্যে তৈরি', 'aveeno-baby-daily-care-2-in-1-shampoo-&-conditioner-300ml-made-in-uk', 'Aveeno-বেবি-ডেইলি-কেয়ার-2-ইন-1-শ্যাম্পু-এবং-কন্ডিশনার-300ml-যুক্তরাজ্যে-তৈরি', 'Aveeno,shampoo&conditioner,baby', 'Aveeno,শ্যাম্পু-এবং-কন্ডিশনার,বেবি', 'Aveeno Baby Daily Care 2-in-1 Shampoo & Conditioner', 'Aveeno-বেবি-ডেইলি-কেয়ার-2-ইন-1-শ্যাম্পু-এবং-কন্ডিশনার', '<h2><strong>Product details of Aveeno Baby Daily Care 2-in-1 Shampoo &amp; Conditioner 300ml, Made in UK</strong></h2>\r\n\r\n<ul>\r\n	<li>Scent Natural Oat Extract</li>\r\n	<li>Brand Aveeno Baby</li>\r\n	<li>Product Gently cleanses and nourishes</li>\r\n	<li>Hair type All</li>\r\n	<li>Format Lotion</li>\r\n	<li>AVEENO Baby Daily Care 2-in-1 Shampoo and Conditioner gently cleanses and nourishes baby&#39;s hair for easy combing</li>\r\n	<li>for baby&#39;s delicate skin. pH-balanced and tear-free</li>\r\n	<li>free from sulphates, soap and dyes. Paediatrician and Dermatologist tested</li>\r\n	<li>Made in UK</li>\r\n</ul>', '<h2>Aveeno বেবি ডেইলি কেয়ার 2-ইন-1 শ্যাম্পু এবং কন্ডিশনার 300ml, যুক্তরাজ্যে তৈরি</h2>\r\n\r\n<ul>\r\n	<li>Scent Natural Oat Extract</li>\r\n	<li>Brand Aveeno Baby</li>\r\n	<li>Product Gently cleanses and nourishes</li>\r\n	<li>Hair type All</li>\r\n	<li>Format Lotion</li>\r\n	<li>AVEENO Baby Daily Care 2-in-1 Shampoo and Conditioner gently cleanses and nourishes baby&#39;s hair for easy combing</li>\r\n	<li>for baby&#39;s delicate skin. pH-balanced and tear-free</li>\r\n	<li>free from sulphates, soap and dyes. Paediatrician and Dermatologist tested</li>\r\n	<li>Made in UK</li>\r\n</ul>', '300ml', '৩০০ এম এল', NULL, NULL, 58900, 400, 1600, 1299, 'backend/images/product/thumbnail/1758966626330089.jpg', 1, 1, 1, NULL, 1, NULL, '2023-02-27 01:01:35', NULL),
(4, 7, 7, 11, 'Canon EOS 90D DSLR Camera (Body Only) - Black', 'ক্যানন eos 90d dslr ক্যামেরা (কেবলমাত্র বডি)-কালো', 'canon-eos-90d-dslr-camera-(body-only)---black', 'ক্যানন-eos-90d-dslr-ক্যামেরা-(কেবলমাত্র-বডি)-কালো', 'canon,camera', 'ক্যানন,ক্যামেরা', 'Canon EOS 90D DSLR Camera (Body Only)', 'ক্যানন-eos-90d-dslr-ক্যামেরা', '<h2>Product details of Canon EOS 90D DSLR Camera (Body Only) - Black</h2>\r\n\r\n<ul>\r\n	<li>32.5MP APS-C CMOS Sensor</li>\r\n	<li>DIGIC 8 Image Processor</li>\r\n	<li>UHD 4K30p &amp; Full HD 120p Video Recording</li>\r\n	<li>3&quot; 1.04m-Dot Vari-Angle Touchscreen LCD</li>\r\n</ul>\r\n\r\n<p>A DSLR Camera is a digital camera body that allows light to enter a single lens where it hits a mirror that reflects the light either upwards or downward into the camera&rsquo;s viewfinder.</p>\r\n\r\n<h2>Specifications of Canon EOS 90D DSLR Camera (Body Only) - Black</h2>\r\n\r\n<ul>\r\n	<li>Brand: Canon</li>\r\n	<li>SKU:164494755_BD-1097284252</li>\r\n	<li>Sensor Size: APS-C</li>\r\n	<li>Megapixels: 31-35</li>\r\n	<li>Video Capture Resolution: 4K UHD 2160p (3840 x 2160)</li>\r\n	<li>Lens Kit: No</li>\r\n	<li>ISO Range: 100-25600</li>\r\n	<li>View Finder (%): Optical</li>\r\n	<li>Sensor Type: CMOS</li>\r\n	<li>Model: 90D</li>\r\n</ul>\r\n\r\n<p><strong>What&rsquo;s in the box:</strong> Canon EOS 90D DSLR Camera (Body Only) - Black</p>', '<h2>ক্যানন eos 90d dslr ক্যামেরা (কেবলমাত্র বডি)-কালো</h2>\r\n\r\n<ul>\r\n	<li>32.5MP APS-C CMOS Sensor</li>\r\n	<li>DIGIC 8 Image Processor</li>\r\n	<li>UHD 4K30p &amp; Full HD 120p Video Recording</li>\r\n	<li>3&quot; 1.04m-Dot Vari-Angle Touchscreen LCD</li>\r\n</ul>\r\n\r\n<p>A DSLR Camera is a digital camera body that allows light to enter a single lens where it hits a mirror that reflects the light either upwards or downward into the camera&rsquo;s viewfinder.</p>\r\n\r\n<h2>Specifications of ক্যানন eos 90d dslr ক্যামেরা (কেবলমাত্র বডি)-কালো</h2>\r\n\r\n<ul>\r\n	<li>Brand: Canon</li>\r\n	<li>SKU:164494755_BD-1097284252</li>\r\n	<li>Sensor Size: APS-C</li>\r\n	<li>Megapixels: 31-35</li>\r\n	<li>Video Capture Resolution: 4K UHD 2160p (3840 x 2160)</li>\r\n	<li>Lens Kit: No</li>\r\n	<li>ISO Range: 100-25600</li>\r\n	<li>View Finder (%): Optical</li>\r\n	<li>Sensor Type: CMOS</li>\r\n	<li>Model: 90D</li>\r\n</ul>\r\n\r\n<p><strong>What&rsquo;s in the box:</strong> Canon EOS 90D DSLR Camera (Body Only) - Black</p>', NULL, NULL, 'Black', 'কালো', 1000, 20, 130000, NULL, 'backend/images/product/thumbnail/1758968904094672.jpg', NULL, 1, 1, NULL, 1, NULL, '2023-02-27 01:37:47', NULL),
(5, 7, 8, 10, 'OPPO A95 8GB RAM 128GB ROM - 5000 mAh Battery', 'Oppo a95 8gb ram 128gb rom-5000 mah ব্যাটারি', 'oppo-a95-8gb-ram-128gb-rom---5000-mah-battery', 'Oppo-a95-8gb-ram-128gb-rom-5000-mah-ব্যাটারি', 'OPPO', 'Oppo', 'OPPO A95 8GB RAM 128GB ROM - 5000 mAh Battery', 'Oppo a95 8gb ram 128gb rom-5000 mah ব্যাটারি', '<h2>OPPO A95 8GB RAM 128GB ROM - 5000 mAh Battery</h2>\r\n\r\n<ul>\r\n	<li>NO RETURN applicable if the seal is broken</li>\r\n	<li>Dimensions: 160.3 x 73.8 x 8 mm (6.31 x 2.91 x 0.31 in)</li>\r\n	<li>Weight: 175 g (6.17 oz)</li>\r\n	<li>SIM: Dual SIM (Nano-SIM, dual stand-by)</li>\r\n	<li>Display Type: AMOLED, 430 nits (typ), 800 nits (peak)</li>\r\n	<li>Size: 6.43 inches</li>\r\n	<li>OS: Android 11, ColorOS 11.1</li>\r\n	<li>Chipset: Qualcomm SM6115 Snapdragon 662 (11 nm)</li>\r\n	<li>CPU: Octa-core</li>\r\n	<li>GPU: Adreno 618</li>\r\n	<li>Memory Card slot: microSDXC</li>\r\n	<li>Internal: 128GB 8GB RAM</li>\r\n	<li>Main Camera (Quad): 48MP+2MP+2MP</li>\r\n	<li>AI Front Camera : 16MP</li>\r\n	<li>USB: USB Type-C 2.0, USB On-The-Go</li>\r\n	<li>Sensors: Fingerprint (under display, optical), accelerometer, gyro, proximity, compass</li>\r\n	<li>Battery Type:Li-Po 5000 mAh, non-removable</li>\r\n	<li>Charging: Fast charging 33W, 54% in 30 min (advertised)</li>\r\n</ul>\r\n\r\n<h2>Specifications of OPPO A95 8GB RAM 128GB ROM - 5000 mAh Battery</h2>\r\n\r\n<ul>\r\n	<li>Brand: OPPO</li>\r\n	<li>SKU:232766355_BD-1175539127</li>\r\n	<li>Battery Capacity (mAh):5000 - 5999 mAh</li>\r\n	<li>Screen Size (inches): 6 Inch and Above</li>\r\n	<li>Operating System:Android</li>\r\n	<li>Camera Front (Megapixels): 16 - 20MP</li>\r\n	<li>RAM Memory: 8 GB</li>\r\n	<li>Camera Back (Megapixels): 21 - 25 MP</li>\r\n	<li>Storage Capacity: 128GB</li>\r\n	<li>Number of SIM: Dual SIM</li>\r\n</ul>\r\n\r\n<p><em><strong>What&rsquo;s in the box: </strong></em>NO RETURN applicable if the seal is broken</p>', '<h2>&nbsp;Oppo a95 8gb ram 128gb rom-5000 mah ব্যাটারি</h2>\r\n\r\n<ul>\r\n	<li>NO RETURN applicable if the seal is broken</li>\r\n	<li>Dimensions: 160.3 x 73.8 x 8 mm (6.31 x 2.91 x 0.31 in)</li>\r\n	<li>Weight: 175 g (6.17 oz)</li>\r\n	<li>SIM: Dual SIM (Nano-SIM, dual stand-by)</li>\r\n	<li>Display Type: AMOLED, 430 nits (typ), 800 nits (peak)</li>\r\n	<li>Size: 6.43 inches</li>\r\n	<li>OS: Android 11, ColorOS 11.1</li>\r\n	<li>Chipset: Qualcomm SM6115 Snapdragon 662 (11 nm)</li>\r\n	<li>CPU: Octa-core</li>\r\n	<li>GPU: Adreno 618</li>\r\n	<li>Memory Card slot: microSDXC</li>\r\n	<li>Internal: 128GB 8GB RAM</li>\r\n	<li>Main Camera (Quad): 48MP+2MP+2MP</li>\r\n	<li>AI Front Camera : 16MP</li>\r\n	<li>USB: USB Type-C 2.0, USB On-The-Go</li>\r\n	<li>Sensors: Fingerprint (under display, optical), accelerometer, gyro, proximity, compass</li>\r\n	<li>Battery Type:Li-Po 5000 mAh, non-removable</li>\r\n	<li>Charging: Fast charging 33W, 54% in 30 min (advertised)</li>\r\n</ul>\r\n\r\n<h2>Specifications of Oppo a95 8gb ram 128gb rom-5000 mah ব্যাটারি</h2>\r\n\r\n<ul>\r\n	<li>Brand: OPPO</li>\r\n	<li>SKU:232766355_BD-1175539127</li>\r\n	<li>Battery Capacity (mAh):5000 - 5999 mAh</li>\r\n	<li>Screen Size (inches): 6 Inch and Above</li>\r\n	<li>Operating System:Android</li>\r\n	<li>Camera Front (Megapixels): 16 - 20MP</li>\r\n	<li>RAM Memory: 8 GB</li>\r\n	<li>Camera Back (Megapixels): 21 - 25 MP</li>\r\n	<li>Storage Capacity: 128GB</li>\r\n	<li>Number of SIM: Dual SIM</li>\r\n</ul>\r\n\r\n<p><em><strong>What&rsquo;s in the box: </strong></em>NO RETURN applicable if the seal is broken</p>', NULL, NULL, 'Blue', 'নীল', 30900, 3, 27990, NULL, 'backend/images/product/thumbnail/1758969707634960.jpg', NULL, 1, NULL, NULL, 1, NULL, '2023-02-27 01:50:33', NULL),
(6, 7, 8, 9, 'Samsung Galaxy A03 (4GB/64GB)', 'স্যামসাং গ্যালাক্সি A03 4GB/64GB Smartphone', 'samsung-galaxy-a03-(4gb/64gb)', 'স্যামসাং-গ্যালাক্সি-A03-4GB/64GB-Smartphone', 'Samsung', 'স্যামসাং,স্যামসাং গ্যালাক্সি', 'Samsung Galaxy A03 (4GB/64GB) Smartphone', 'স্যামসাং গ্যালাক্সি A03 4GB/64GB Smartphone', '<h2>Samsung Galaxy A03 (4GB/64GB) Smartphone&nbsp;</h2>\r\n\r\n<ul>\r\n	<li>NO RETURN applicable if the seal is broken</li>\r\n	<li>Prices are subject to change upon direction on 5% VAT from Government</li>\r\n	<li>Display Size: 6.5&quot; HD+TFT</li>\r\n	<li>Camera (Rear): 48 +2 MP</li>\r\n	<li>Camera (Front): 5MP</li>\r\n	<li>Processor: Octa-Core 1.6 GHz</li>\r\n	<li>RAM: 4GB</li>\r\n	<li>ROM: 64GB</li>\r\n	<li>Battery: 5000 mAh</li>\r\n	<li>Network: 4G, LTE</li>\r\n	<li>Dimensions:164.2 x 75.9 x 9.1</li>\r\n	<li>Weight: 196g</li>\r\n	<li>phone</li>\r\n</ul>', '<h2>Samsung Galaxy A03 (4GB/64GB) Smartphone&nbsp;</h2>\r\n\r\n<ul>\r\n	<li>NO RETURN applicable if the seal is broken</li>\r\n	<li>Prices are subject to change upon direction on 5% VAT from Government</li>\r\n	<li>Display Size: 6.5&quot; HD+TFT</li>\r\n	<li>Camera (Rear): 48 +2 MP</li>\r\n	<li>Camera (Front): 5MP</li>\r\n	<li>Processor: Octa-Core 1.6 GHz</li>\r\n	<li>RAM: 4GB</li>\r\n	<li>ROM: 64GB</li>\r\n	<li>Battery: 5000 mAh</li>\r\n	<li>Network: 4G, LTE</li>\r\n	<li>Dimensions:164.2 x 75.9 x 9.1</li>\r\n	<li>Weight: 196g</li>\r\n</ul>', NULL, NULL, 'black,blue', 'কালো,নীল', 3090098, 4, 16999, 16467, 'backend/images/product/thumbnail/1758970562424845.jpeg', 1, 1, 1, 1, 1, '2023-02-28 03:28:04', '2023-02-27 23:17:06', '2023-02-28 03:28:04'),
(7, 11, 9, 4, 'HelloKimi 6 PCS Anime Figurine Toys Japan Anime Naruto Figure PVC Action Figurine Model Doll', 'হ্যালোকিমি 6 পিসি এনিমে ফিগারিন খেলনা জাপান এনিমে নারুটো ফিগার পিভিসি অ্যাকশন ফিগারিন মডেল ডল ফিগার খেলনা সংগ্রহ পুতুল খেলনা naruto uzumaki মডেল খেলনা', 'hellokimi-6-pcs-anime-figurine-toys-japan-anime-naruto-figure-pvc-action-figurine-model-doll-', 'হ্যালোকিমি-6-পিসি-এনিমে-ফিগারিন-খেলনা-জাপান-এনিমে-নারুটো-ফিগার-পিভিসি-অ্যাকশন-ফিগারিন-মডেল-ডল-ফিগার-খেলনা-সংগ্রহ-পুতুল-খেলনা-naruto-uzumaki-মডেল-খেলনা', 'hellokimi', 'হ্যালোকিমি', 'HelloKimi 6 PCS Anime Figurine Toys Japan Anime Naruto Figure PVC Action Figurine Model Doll Figure Toys Collection Doll Toys Naruto Uzumaki Model Toys', 'হ্যালোকিমি 6 পিসি এনিমে ফিগারিন খেলনা জাপান এনিমে নারুটো ফিগার পিভিসি অ্যাকশন ফিগার', '<h2>HelloKimi 6 PCS Anime Figurine Toys Japan Anime Naruto Figure PVC Action Figurine Model Doll&nbsp;</h2>\r\n\r\n<ul>\r\n	<li>Product name: Japan Anime Figurine Toys</li>\r\n	<li>Product material: PVC</li>\r\n	<li>Product weight: About 90g</li>\r\n	<li>Product size: 7-8CM</li>\r\n	<li>Clean Paint Job and Stance: These toy utilizing cool style sculpting technology to bring out the coolest possible scenes.</li>\r\n	<li>Great Addition to The Collection: Combine these figurine model dolls, letting the world of Demon Slayer unfold right on your tabletop.</li>\r\n	<li>Safe and Durable: With all of our products made from PVC materials, that they are not only fun but also safe for you.</li>\r\n	<li>Great Gift: As a surprising gift for children adults definitely a collection necessary for Naruto.</li>\r\n</ul>', '<h2>&nbsp;হ্যালোকিমি 6 পিসি এনিমে ফিগারিন খেলনা জাপান এনিমে নারুটো ফিগার পিভিসি অ্যাকশন ফিগারিন মডেল ডল ফিগার খেলনা সংগ্রহ পুতুল খেলনা naruto uzumaki মডেল খেলনা</h2>\r\n\r\n<ul>\r\n	<li>Product name: Japan Anime Figurine Toys</li>\r\n	<li>Product material: PVC</li>\r\n	<li>Product weight: About 90g</li>\r\n	<li>Product size: 7-8CM</li>\r\n	<li>Clean Paint Job and Stance: These toy utilizing cool style sculpting technology to bring out the coolest possible scenes.</li>\r\n	<li>Great Addition to The Collection: Combine these figurine model dolls, letting the world of Demon Slayer unfold right on your tabletop.</li>\r\n	<li>Safe and Durable: With all of our products made from PVC materials, that they are not only fun but also safe for you.</li>\r\n	<li>Great Gift: As a surprising gift for children adults definitely a collection necessary for Naruto.</li>\r\n</ul>', NULL, NULL, 'black', NULL, 58900, 677, 209, 150, 'backend/images/product/thumbnail/1758982850738847.jpg', NULL, NULL, NULL, NULL, 1, NULL, '2023-02-28 03:17:44', '2023-02-28 03:17:44'),
(8, 7, 8, 9, 'Samsung Galaxy A03 (4GB/64GB) Smartphone', 'স্যামসাং গ্যালাক্সি A03 4GB/64GB Smartphone', 'samsung-galaxy-a03-(4gb/64gb)-smartphone', 'স্যামসাং-গ্যালাক্সি-A03-4GB/64GB-Smartphone', 'Samsung', 'স্যামসাং', 'Samsung Galaxy A03 (4GB/64GB) Smartphone', 'স্যামসাং-গ্যালাক্সি-A03-4GB/64GB-Smartphone', '<h2>Samsung Galaxy A03 (4GB/64GB) Smartphone&nbsp;</h2>\r\n\r\n<p><strong>NO RETURN applicable if the seal is broken</strong></p>\r\n\r\n<ul>\r\n	<li>Prices are subject to change upon direction on 5% VAT from Government</li>\r\n	<li>Display Size: 6.5&quot; HD+TFT</li>\r\n	<li>Camera (Rear): 48 +2 MP</li>\r\n	<li>Camera (Front): 5MP</li>\r\n	<li>Processor: Octa-Core 1.6 GHz</li>\r\n	<li>RAM: 4GB</li>\r\n	<li>ROM: 64GB</li>\r\n	<li>Battery: 5000 mAh</li>\r\n	<li>Network: 4G, LTE</li>\r\n	<li>Dimensions:164.2 x 75.9 x 9.1</li>\r\n	<li>Weight: 196g</li>\r\n	<li>phone</li>\r\n</ul>', '<h2>স্যামসাং গ্যালাক্সি A03 4GB/64GB Smartphone</h2>\r\n\r\n<p><br />\r\n<strong>NO RETURN applicable if the seal is broken</strong></p>\r\n\r\n<ul>\r\n	<li>Prices are subject to change upon direction on 5% VAT from Government</li>\r\n	<li>Display Size: 6.5&quot; HD+TFT</li>\r\n	<li>Camera (Rear): 48 +2 MP</li>\r\n	<li>Camera (Front): 5MP</li>\r\n	<li>Processor: Octa-Core 1.6 GHz</li>\r\n	<li>RAM: 4GB</li>\r\n	<li>ROM: 64GB</li>\r\n	<li>Battery: 5000 mAh</li>\r\n	<li>Network: 4G, LTE</li>\r\n	<li>Dimensions:164.2 x 75.9 x 9.1</li>\r\n	<li>Weight: 196g</li>\r\n	<li>phone</li>\r\n</ul>', NULL, NULL, 'Black,blue', 'কালো,নীল', 5890, 5, 16999, 16467, 'backend/images/product/thumbnail/1759066462237534.jpeg', NULL, NULL, NULL, NULL, 1, '2023-02-28 03:31:24', '2023-02-28 03:26:20', '2023-02-28 03:31:24'),
(9, 7, 8, 9, 'Samsung Galaxy A03 (4GB/64GB) Smartphone Mobile', 'স্যামসাং গ্যালাক্সি A03 4GB/64GB Smartphone', 'samsung-galaxy-a03-(4gb/64gb)-smartphone-mobile', 'স্যামসাং-গ্যালাক্সি-A03-4GB/64GB-Smartphone', 'samsung', 'গ্যালাক্সি', 'Samsung Galaxy A03 (4GB/64GB) Smartphone', 'স্যামসাং গ্যালাক্সি A03 4GB/64GB Smartphone', '<h2>&nbsp;Samsung Galaxy A03 (4GB/64GB) Smartphone Mobile</h2>\r\n\r\n<p><strong>NO RETURN applicable if the seal is broken</strong></p>\r\n\r\n<ul>\r\n	<li>Prices are subject to change upon direction on 5% VAT from Government</li>\r\n	<li>Display Size: 6.5&quot; HD+TFT</li>\r\n	<li>Camera (Rear): 48 +2 MP</li>\r\n	<li>Camera (Front): 5MP</li>\r\n	<li>Processor: Octa-Core 1.6 GHz</li>\r\n	<li>RAM: 4GB</li>\r\n	<li>ROM: 64GB</li>\r\n	<li>Battery: 5000 mAh</li>\r\n	<li>Network: 4G, LTE</li>\r\n	<li>Dimensions:164.2 x 75.9 x 9.1</li>\r\n	<li>Weight: 196g</li>\r\n	<li>phone</li>\r\n</ul>', '<h2>স্যামসাং গ্যালাক্সি A03 4GB/64GB Smartphone</h2>\r\n\r\n<p><strong>NO RETURN applicable if the seal is broken</strong></p>\r\n\r\n<ul>\r\n	<li>Prices are subject to change upon direction on 5% VAT from Government</li>\r\n	<li>Display Size: 6.5&quot; HD+TFT</li>\r\n	<li>Camera (Rear): 48 +2 MP</li>\r\n	<li>Camera (Front): 5MP</li>\r\n	<li>Processor: Octa-Core 1.6 GHz</li>\r\n	<li>RAM: 4GB</li>\r\n	<li>ROM: 64GB</li>\r\n	<li>Battery: 5000 mAh</li>\r\n	<li>Network: 4G, LTE</li>\r\n	<li>Dimensions:164.2 x 75.9 x 9.1</li>\r\n	<li>Weight: 196g</li>\r\n	<li>#phone</li>\r\n</ul>', NULL, NULL, 'black', NULL, 1000, 5, 17000, 16467, 'backend/images/product/thumbnail/1759067393020931.jpeg', NULL, NULL, NULL, NULL, 1, NULL, '2023-02-28 03:43:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review_models`
--

CREATE TABLE `review_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `authID` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `postCode` int(11) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `authID`, `division_id`, `district_id`, `state_id`, `shipping_name`, `shipping_email`, `shipping_phone`, `postCode`, `shipping_address`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House no:2 Road:12 Banani', 'sshost', '2023-02-28 05:41:55', '2023-02-28 05:41:55'),
(2, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House no:12 road:10 Banani dhaka', 'stripe', '2023-02-28 05:45:47', '2023-02-28 05:45:47'),
(3, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'House :12 road:12 banani', 'stripe', '2023-02-28 05:51:41', '2023-02-28 05:51:41'),
(4, 5, 1, 2, 4, 'Tajrin Zerin', 'zerin.opediatech@gmail.com', '017989887766', 1200, 'Banani', 'stripe', '2023-02-28 06:11:47', '2023-02-28 06:11:47'),
(5, 6, 1, 2, 4, 'zerin', 'zerin@gmail.com', '017989887766', 4234, 'House:23 Road:3', 'stripe', '2023-02-28 06:28:32', '2023-02-28 06:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subTitle_en` varchar(255) DEFAULT NULL,
  `subTitle_bn` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_bn` varchar(255) DEFAULT NULL,
  `sliderImage` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `subTitle_en`, `subTitle_bn`, `title_en`, `title_bn`, `description_en`, `description_bn`, `sliderImage`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/sliders/1759054032130114.jpg', 1, '2023-02-28 00:10:52', '2023-02-28 00:12:39'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/sliders/1759054045541300.jpg', 1, '2023-02-28 00:11:04', '2023-02-28 00:13:05'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/sliders/1759054054455566.jpg', 1, '2023-02-28 00:11:13', '2023-02-28 00:13:07'),
(4, 'NEUTROGENA', NULL, NULL, NULL, NULL, NULL, 'backend/images/sliders/1759054076328571.jpg', 1, '2023-02-28 00:11:34', '2023-02-28 00:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'active is = 1 ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `division_id`, `district_id`, `state_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 'Sadar', 1, '2023-02-27 23:28:22', '2023-02-27 23:28:22'),
(2, 5, 6, 'ABC', 1, '2023-02-27 23:28:33', '2023-02-27 23:28:33'),
(4, 1, 2, 'Banani', 1, '2023-02-27 23:32:28', '2023-02-27 23:32:28'),
(5, 4, 9, 'xyz', 1, '2023-02-28 06:31:30', '2023-02-28 06:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_bn` varchar(255) NOT NULL,
  `subcategory_name_en` varchar(255) NOT NULL,
  `subcategory_slug_bn` varchar(255) NOT NULL,
  `subcategory_slug_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_bn`, `subcategory_name_en`, `subcategory_slug_bn`, `subcategory_slug_en`, `created_at`, `updated_at`) VALUES
(4, 11, 'শিশুর ব্যক্তিগত পরিচর্যা', 'Baby Personal Care', 'শিশুর-ব্যক্তিগত-পরিচর্যা', 'baby-personal-care', '2023-02-24 06:22:42', '2023-02-25 01:09:20'),
(5, 10, 'বক্সিং, মার্শাল আর্টস এবং এমএমএ', 'Boxing, Martial Arts & MMA', 'বক্সিং,-মার্শাল-আর্টস-এবং-এমএমএ', 'boxing,-martial-arts-&-mma', '2023-02-24 06:23:42', '2023-02-24 06:54:23'),
(6, 10, 'ব্যায়াম এবং ফিটনেস', 'Exercise & Fitness', 'ব্যায়াম-এবং-ফিটনেস', 'exercise-&-fitness', '2023-02-24 06:26:14', '2023-02-24 06:26:14'),
(7, 7, 'ক্যামেরা', 'Cameras', 'ক্যামেরা', 'cameras', '2023-02-24 22:12:34', '2023-02-24 22:12:34'),
(8, 7, 'মোবাইল এবং ট্যাবলেট', 'Mobiles & Tablets', 'মোবাইল-এবং-ট্যাবলেট', 'mobiles-&-tablets', '2023-02-24 22:14:05', '2023-02-24 22:14:05'),
(9, 11, 'খেলনা', 'Toys', 'খেলনা', 'toys', '2023-02-24 22:15:14', '2023-02-24 22:15:14'),
(11, 12, 'কাপড়', 'Cloths', 'কাপড়', 'cloths', '2023-02-25 00:59:34', '2023-02-25 00:59:34'),
(12, 9, 'কাপড়', 'Cloths', 'কাপড়', 'cloths', '2023-02-25 00:59:46', '2023-02-25 00:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_bn` varchar(255) NOT NULL,
  `subsubcategory_name_en` varchar(255) NOT NULL,
  `subsubcategory_slug_bn` varchar(255) NOT NULL,
  `subsubcategory_slug_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_bn`, `subsubcategory_name_en`, `subsubcategory_slug_bn`, `subsubcategory_slug_en`, `created_at`, `updated_at`) VALUES
(1, 9, 12, 'শাড়ি', 'Sarees', 'শাড়ি', 'sarees', '2023-02-25 01:02:55', '2023-02-25 01:02:55'),
(2, 9, 12, 'কুর্তি', 'Kurtis', 'কুর্তি', 'kurtis', '2023-02-25 01:03:45', '2023-02-25 01:03:45'),
(3, 12, 11, 'জিন্স', 'Jeans', 'জিন্স', 'jeans', '2023-02-25 01:05:21', '2023-02-25 01:05:21'),
(4, 11, 9, 'অ্যাকশান ফিগার', 'Action Figures', 'অ্যাকশান-ফিগার', 'action-figures', '2023-02-25 01:07:13', '2023-02-25 01:07:13'),
(5, 11, 4, 'শ্যাম্পু ও কন্ডিশনার', 'Shampoo & Conditioners', 'শ্যাম্পু-ও-কন্ডিশনার', 'shampoo-&-conditioners', '2023-02-25 01:10:27', '2023-02-25 01:10:27'),
(6, 11, 4, 'লোশন এবং ক্রিম', 'Lotions & Creams', 'লোশন-এবং-ক্রিম', 'lotions-&-creams', '2023-02-25 01:34:46', '2023-02-25 02:57:26'),
(7, 10, 6, 'ট্রেডমিলস', 'Treadmills', 'ট্রেডমিলস', 'treadmills', '2023-02-25 01:36:19', '2023-02-25 01:38:54'),
(8, 10, 6, 'বাইক অনুশীলন', 'Exercise Bikes', 'বাইক-অনুশীলন', 'exercise-bikes', '2023-02-25 01:37:32', '2023-02-25 01:37:32'),
(9, 7, 8, 'Samsung মোবাইল', 'Samsung Mobile', 'Samsung-মোবাইল', 'samsung-mobile', '2023-02-25 01:40:05', '2023-02-25 01:41:39'),
(10, 7, 8, 'OPPO মোবাইল', 'OPPO Mobile', 'OPPO-মোবাইল', 'oppo-mobile', '2023-02-25 01:41:30', '2023-02-25 01:41:30'),
(11, 7, 7, 'ডিএসএলআর', 'DSLR', 'ডিএসএলআর', 'dslr', '2023-02-25 01:45:59', '2023-02-25 01:45:59'),
(12, 7, 7, 'আয়নাবিহীন', 'Mirrorless', 'আয়নাবিহীন', 'mirrorless', '2023-02-25 01:46:54', '2023-02-25 01:46:54'),
(14, 10, 5, 'প্রতিরক্ষামূলক জিনিসপত্র', 'Protective Gear', 'প্রতিরক্ষামূলক-জিনিসপত্র', 'protective-gear', '2023-02-25 01:57:21', '2023-02-25 01:57:21'),
(15, 12, 11, 'শার্ট', 'Casual Shirts', 'শার্ট', 'casual-shirts', '2023-02-25 02:01:04', '2023-02-25 02:01:04'),
(16, 10, 5, 'ঘুসাঘুসির দস্তানা', 'Boxing Gloves', 'ঘুসাঘুসির-দস্তানা', 'boxing-gloves', '2023-02-25 02:03:39', '2023-02-25 02:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `Isban` tinyint(4) NOT NULL DEFAULT 0,
  `last_seen` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `Isban`, `last_seen`, `email`, `phone`, `provider_id`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 1, 0, '2023-03-01 08:53:59', 'admin@gmail.com', '091112223', NULL, 'fontend/assets/images/upload/profile_img.png', NULL, '$2y$10$OAN0b3TvzrBL9DcGVNo6yulbq2kTqVJsAY0kQL99rUL8PoT3kgIyO', NULL, NULL, '2023-03-01 02:53:59'),
(5, 'Tajrin Zerin', 2, 0, '2023-02-28 12:26:08', 'zerin.opediatech@gmail.com', NULL, '116022661947697804492', 'https://lh3.googleusercontent.com/a/AGNmyxaR8fGrJBzJRYExZY_cGdK7YAszWRi4g9kzQINy=s96-c', NULL, NULL, NULL, '2023-02-24 03:25:55', '2023-02-28 06:26:08'),
(6, 'zerin', 2, 0, '2023-02-28 12:32:03', 'zerin@gmail.com', '01790113718', NULL, 'fontend/assets/images/upload/profile_img.png', NULL, '$2y$10$P9/.zU9xSamFOGMtMcpiuOrCf.bNRD4L.ksMLfBs6DT3o2VqQRkWK', NULL, '2023-02-28 06:27:14', '2023-02-28 06:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 6, '2023-02-27 02:04:42', NULL),
(2, 4, 5, '2023-02-28 00:46:46', NULL),
(3, 4, 4, '2023-02-28 00:46:50', NULL),
(4, 5, 2, '2023-02-28 05:38:34', NULL),
(5, 5, 3, '2023-02-28 05:38:36', NULL),
(6, 5, 4, '2023-02-28 05:38:38', NULL);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_reply_id_foreign` (`reply_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
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
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_models`
--
ALTER TABLE `review_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_models_user_id_foreign` (`user_id`),
  ADD KEY `review_models_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review_models`
--
ALTER TABLE `review_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_reply_id_foreign` FOREIGN KEY (`reply_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review_models`
--
ALTER TABLE `review_models`
  ADD CONSTRAINT `review_models_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
