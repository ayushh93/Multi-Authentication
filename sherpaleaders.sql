-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 10:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sherpaleaders`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutotherdetails`
--

CREATE TABLE `aboutotherdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutotherdetails`
--

INSERT INTO `aboutotherdetails` (`id`, `title1`, `value1`, `title2`, `value2`, `title3`, `value3`, `created_at`, `updated_at`) VALUES
(1, 'Expedition success rates', '100%', 'Happy Climbers', '2000+', 'Trekking success rate', '99%', NULL, '2022-10-18 01:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$.s6alutg0a4mQ0yhOfeViOySgBB9E1yFXKISUzNWWATJ4brNOWUFi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `author`, `date`, `image1`, `blog`, `image2`, `meta_keyword`, `meta_description`, `blog_url`, `blog_description`, `twitter_url`, `twitter_description`, `created_at`, `updated_at`) VALUES
(4, 'Mountaain Climbing As a sport', 'mountaain-climbing-as-a-sport', 'Anush Hada', '2021-12-12', 'car1.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis earum quis ducimus delectus quisquam aliquid rerum, corrupti ipsum aspernatur cumque natus, magni tempore voluptatum quasi beatae asperiores nisi iste odio.</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat doloribus nihil perferendis magni ipsam voluptatem sunt illum eos repudiandae ipsum!</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam at nihil ipsam, id facilis perferendis laboriosam, unde deserunt ipsum modi reiciendis fugit dicta assumenda aspernatur. Maiores dolorum quia ratione ipsum, illum, incidunt similique recusandae at commodi nisi iusto, quibusdam nihil.</p><h2>This is a sub heading</h2><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est quaerat, odit repellat libero voluptatum sapiente voluptas totam nobis laborum dolores.</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo enim similique veritatis hic labore, blanditiis neque, eum beatae veniam, qui fugit nemo iure totam perspiciatis dolores fugiat deserunt harum natus.</p>', 'car3.jpg', 'Ransomware, ITArrow,  RaaS', 'This is a blog', NULL, NULL, NULL, NULL, '2022-10-18 01:53:48', '2022-10-18 01:53:48'),
(5, 'CCNA', 'ccna', 'Anush Hada', '2011-02-03', 'daniel-leone-g30P1zcOzXo-unsplash.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis earum quis ducimus delectus quisquam aliquid rerum, corrupti ipsum aspernatur cumque natus, magni tempore voluptatum quasi beatae asperiores nisi iste odio.</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat doloribus nihil perferendis magni ipsam voluptatem sunt illum eos repudiandae ipsum!</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam at nihil ipsam, id facilis perferendis laboriosam, unde deserunt ipsum modi reiciendis fugit dicta assumenda aspernatur. Maiores dolorum quia ratione ipsum, illum, incidunt similique recusandae at commodi nisi iusto, quibusdam nihil.</p><h2>This is a sub heading</h2><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est quaerat, odit repellat libero voluptatum sapiente voluptas totam nobis laborum dolores.</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo enim similique veritatis hic labore, blanditiis neque, eum beatae veniam, qui fugit nemo iure totam perspiciatis dolores fugiat deserunt harum natus.</p>', NULL, 'sada , dasd as, asd ,asd a', 'asdfas asdf asdf asdf', NULL, NULL, NULL, NULL, '2022-10-18 01:55:04', '2022-10-18 01:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'Trekking', 1, '2022-10-16 00:48:24', '2022-10-16 00:48:24'),
(2, 'Expedition', 1, '2022-10-16 00:48:35', '2022-10-16 00:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Buddha Air', '1666078900.jpg', '2022-10-18 01:56:40', '2022-10-18 01:56:40'),
(4, 'Visit Nepal', '1666078918.jpg', '2022-10-18 01:56:58', '2022-10-18 01:56:58'),
(5, 'Anush Hada', '1666078951.png', '2022-10-18 01:57:31', '2022-10-18 01:57:31'),
(6, 'Ayush', '1666078967.png', '2022-10-18 01:57:47', '2022-10-18 01:57:47'),
(7, 'Sales Agent', '1666078980.png', '2022-10-18 01:58:00', '2022-10-18 01:58:00'),
(8, 'Ayush Karmacharya', '1666078992.png', '2022-10-18 01:58:12', '2022-10-18 01:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Sales Agent', 'sales@agent.com', '2132131213', 'asd sa asd as a', 0, '2022-10-19 05:45:56', '2022-10-19 05:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `email`, `address`, `contact_number`, `facebook_link`, `instagram_link`, `twitter_link`, `youtube_link`, `map`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'Dummy Address', '9878232424', 'https://www.facebook.com/dummy', 'https://www.instagram.com/dummy', 'https://www.twitter.com/dummy', 'https://www.youtube.com/dummy', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.980806408833!2d85.34677521407085!3d27.717878882787545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bd94df04c5%3A0x3fafb5108dbd2dac!2sIT%20Arrow%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1655190702773!5m2!1sen!2snp', NULL, '2022-10-19 05:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `costdetails`
--

CREATE TABLE `costdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costdetails`
--

INSERT INTO `costdetails` (`id`, `package_id`, `from`, `to`, `cost`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 6, 23131, '2022-10-17 23:11:12', '2022-10-17 23:11:51'),
(3, 12, 1, 5, 25000, '2022-10-18 01:28:39', '2022-10-18 01:28:39'),
(4, 12, 5, 10, 20000, '2022-10-18 01:28:39', '2022-10-18 01:28:39'),
(5, 12, 10, 20, 15000, '2022-10-18 01:28:39', '2022-10-18 01:28:39'),
(6, 10, 7, 20, 888888, '2022-10-20 01:32:43', '2022-10-20 01:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `cost_descriptions`
--

CREATE TABLE `cost_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `includes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excludes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_descriptions`
--

INSERT INTO `cost_descriptions` (`id`, `package_id`, `includes`, `excludes`, `created_at`, `updated_at`) VALUES
(1, 10, '<ol><li>Accommodations</li><li>Lunch</li><li>Dinner</li><li>Sleeping bag</li></ol>', '<ol><li>Boots</li><li>Trekking stick</li></ol>', NULL, '2022-10-18 00:51:00'),
(2, 11, '<ol><li>Guide</li><li>Accomodation</li><li>Food</li></ol>', '<ol><li>Trekking bag</li><li>Trekking Stick</li></ol>', NULL, '2022-10-18 00:52:00'),
(3, 12, '<p>Transportation</p><p>Cap</p><p>Gloves</p>', '<p>Boots</p>', NULL, '2022-10-18 01:32:01'),
(113, 13, NULL, NULL, '2022-10-18 01:35:37', '2022-10-18 01:35:37'),
(114, 14, NULL, NULL, '2022-10-19 01:30:26', '2022-10-19 01:30:26'),
(115, 15, NULL, NULL, '2022-10-19 01:31:02', '2022-10-19 01:31:02'),
(116, 16, NULL, NULL, '2022-10-19 01:32:14', '2022-10-19 01:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(8, 'CCNA', 'register.jpg', '2022-10-18 01:49:57', '2022-10-18 01:49:57'),
(9, 'Prarambha World school', 'register - Copy.jpg', '2022-10-18 01:50:12', '2022-10-18 01:50:53'),
(10, 'Test', 'register - Copy (4).jpg', '2022-10-18 01:51:07', '2022-10-18 01:51:07'),
(11, 'Registration', 'register - Copy (3).jpg', '2022-10-18 01:51:39', '2022-10-18 01:51:39'),
(12, 'Regulation', 'register - Copy (2).jpg', '2022-10-18 01:51:55', '2022-10-18 01:51:55');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'slider-2.jpg', '2022-10-10 05:26:05', '2022-10-10 05:26:05'),
(4, 'car1.jpg', '2022-10-18 01:55:36', '2022-10-18 01:55:36'),
(5, 'car2.jpg', '2022-10-18 01:55:47', '2022-10-18 01:55:47'),
(7, 'charlie-hammond-1Tm3z8GcFeU-unsplash.jpg', '2022-10-18 01:55:48', '2022-10-18 01:55:48'),
(8, 'daniel-leone-g30P1zcOzXo-unsplash.jpg', '2022-10-18 01:55:48', '2022-10-18 01:55:48'),
(9, 'dmitry-limonov-2H9odlLjZPk-unsplash.jpg', '2022-10-18 01:55:49', '2022-10-18 01:55:49'),
(10, 'jerry-zhang-Y8lCoTRgHPE-unsplash.jpg', '2022-10-18 01:55:49', '2022-10-18 01:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`id`, `package_id`, `day`, `excerpt`, `created_at`, `updated_at`) VALUES
(6, 10, 1, 'Hello this is first day', '2022-10-17 04:55:13', '2022-10-17 05:02:26'),
(7, 10, 2, 'This is second day', '2022-10-17 04:55:13', '2022-10-17 05:15:54'),
(8, 10, 3, 'This is third day', '2022-10-17 04:55:13', '2022-10-17 05:15:47'),
(9, 11, 1, 'Langtang day 1', '2022-10-17 05:17:41', '2022-10-17 05:17:41'),
(10, 11, 2, 'Langtang  day 2', '2022-10-17 05:17:41', '2022-10-17 05:17:41'),
(15, 12, 1, 'LorKakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the', '2022-10-18 01:26:59', '2022-10-18 01:26:59'),
(16, 12, 2, 'LorKakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the', '2022-10-18 01:26:59', '2022-10-18 01:26:59'),
(17, 12, 3, 'LorKakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the', '2022-10-18 01:26:59', '2022-10-18 01:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `messagefromdirectors`
--

CREATE TABLE `messagefromdirectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messagefromdirectors`
--

INSERT INTO `messagefromdirectors` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Message from director', 'photo-1586022045497-31fcf76fa6cc.jfif', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis commodo metus eget dapibus luctus. Pellentesque vel lectus orci. Curabitur a cursus lacus. Praesent euismod ipsum nec ligula vestibulum, ac bibendum urna condimentum. Phasellus et elementum nunc. Proin facilisis placerat odio, eu lobortis eros. Fusce ultricies sem pretium eros finibus, in euismod ex ullamcorper. Morbi semper neque sed turpis consequat, id vulputate risus dignissim. Aenean nibh nibh, laoreet lacinia orci id, laoreet convallis mi. Maecenas semper blandit vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc posuere consectetur est ac malesuada. Suspendisse potenti. Sed ante orci, aliquam sed cursus in, molestie a sapien.</p><p>Integer ac libero sed odio semper ultrices. Sed fringilla blandit orci quis volutpat. Sed nec elit sollicitudin, aliquam nisi a, sagittis purus. Pellentesque ut nibh eget lacus venenatis rhoncus. Quisque eleifend et erat quis aliquam. Pellentesque a orci dapibus, euismod dui vel, placerat risus. Vivamus aliquet dui at eleifend posuere. Donec massa quam, lobortis quis commodo id, varius sed neque. Suspendisse potenti. In tempor, mauris vitae rutrum scelerisque, leo neque dignissim dolor, at pretium erat ex ut dolor. Pellentesque mattis ante maximus fermentum hendrerit.</p>', NULL, '2022-10-12 01:04:15');

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
(5, '2022_06_01_065004_create_admins_table', 1),
(6, '2022_10_10_102409_create_site_settings_table', 2),
(7, '2022_10_10_104525_create_contact_details_table', 3),
(8, '2022_10_10_110729_create_galleries_table', 4),
(9, '2022_10_10_114024_create_clients_table', 5),
(10, '2022_10_10_115047_create_sliders_table', 6),
(12, '2022_10_11_045049_create_blogs_table', 7),
(17, '2022_10_11_080621_create_whyuses_table', 8),
(18, '2022_10_11_080659_create_messagefromdirectors_table', 8),
(19, '2022_10_11_080818_create_ourteams_table', 8),
(20, '2022_10_11_081521_create_reviews_table', 8),
(21, '2022_10_12_095145_create_documents_table', 9),
(23, '2022_10_12_115023_create_regions_table', 10),
(24, '2022_10_13_095141_create_aboutotherdetails_table', 11),
(31, '2022_10_14_063903_create_categories_table', 12),
(32, '2022_10_14_063954_create_subcategories_table', 12),
(33, '2022_10_14_092703_create_packages_table', 13),
(34, '2022_10_16_105717_create_packagegalleries_table', 14),
(39, '2022_10_17_051225_create_itineraries_table', 15),
(40, '2022_10_17_052337_create_recommendedgears_table', 15),
(41, '2022_10_18_044646_create_costdetails_table', 16),
(43, '2022_10_18_061907_create_cost_descriptions_table', 17),
(44, '2022_10_18_075141_create_videogalleries_table', 18),
(45, '2022_10_18_093953_create_whoarewes_table', 19),
(46, '2022_10_19_112916_create_contacts_table', 20),
(47, '2022_10_20_075059_create_privacypolicies_table', 21),
(48, '2022_10_20_075211_create_termsandconditions_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `ourteams`
--

CREATE TABLE `ourteams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ourteams`
--

INSERT INTO `ourteams` (`id`, `name`, `designation`, `image`, `facebook_link`, `instagram_link`, `twitter_link`, `created_at`, `updated_at`) VALUES
(1, 'Anush Hada', 'Frontend Developer', 'IMG_0713.JPG', 'https://www.facebook.com/dummy', 'https://www.instagram.com/dummy', 'https://www.twitter.com/dummy', '2022-10-18 01:42:10', '2022-10-18 01:42:10'),
(2, 'Ayush Karmacharya', 'Laravel Developer', 'IMG_9867.JPG', 'https://www.facebook.com/dummy', 'https://www.instagram.com/dummy', 'https://www.twitter.com/dummy', '2022-10-18 01:42:41', '2022-10-18 01:42:41'),
(3, 'Anush Hada', 'Managing Director', 'IMG_0712.JPG', 'https://www.facebook.com/dummy', 'https://www.instagram.com/dummy', 'https://www.twitter.com/dummy', '2022-10-18 01:43:49', '2022-10-18 01:43:49'),
(4, 'Anush Hada', 'Managing Director', 'IMG_0712.JPG', 'https://www.facebook.com/dummy', 'https://www.instagram.com/dummy', 'https://www.twitter.com/dummy', '2022-10-18 01:43:54', '2022-10-18 01:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `packagegalleries`
--

CREATE TABLE `packagegalleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packagegalleries`
--

INSERT INTO `packagegalleries` (`id`, `package_id`, `image`, `created_at`, `updated_at`) VALUES
(13, 12, 'car1.jpg', '2022-10-18 01:32:28', '2022-10-18 01:32:28'),
(14, 12, 'car2.jpg', '2022-10-18 01:32:44', '2022-10-18 01:32:44'),
(15, 12, 'car3.jpg', '2022-10-18 01:32:54', '2022-10-18 01:32:54'),
(16, 12, 'charlie-hammond-1Tm3z8GcFeU-unsplash.jpg', '2022-10-18 01:32:55', '2022-10-18 01:32:55'),
(17, 12, 'daniel-leone-g30P1zcOzXo-unsplash.jpg', '2022-10-18 01:32:55', '2022-10-18 01:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `elevation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accomodation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `subcategory_id`, `title`, `image`, `description`, `elevation`, `season`, `duration`, `group_size`, `accomodation`, `difficulty`, `map`, `created_at`, `updated_at`) VALUES
(10, 3, 'Mount Everest Expedition', 'download.jfif', '<p>Lorem</p>', '8848m', 'Summer', '25days', '5-15', 'Hotels/Tent', 'Challenging', 'orga-hier.jpg', '2022-10-17 04:33:36', '2022-10-17 04:33:36'),
(11, 4, 'Langtang Valley Trekking', 'istockphoto-1002107554-612x612.jpg', '<p>asdasdad</p>', '4800m', 'Autumn', '5Night/6Days', '5-15', 'Hotel', 'Moderate', 'e937b41e96b2270eefdc7c2831307452.png', '2022-10-17 05:17:14', '2022-10-17 05:17:14'),
(12, 3, 'Manaslu Region Expedition', 'daniel-leone-g30P1zcOzXo-unsplash.jpg', '<p>Kakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the Kakani village development committee administered a population of 7816 living in 1343 individual households.</p><p>As one of the most accessible settlements from Kathmandu over 2000 meters, this hill station hosts a British Gurkhas welfare bungalow and a number of hotels. The village is also home to a memorial park to the victims of Thai Airways International Flight 311.</p><p>A notable local industry is strawberry farming. With the assistance of a United Nations Development Programme project, a local farmers\' cooperative now produces close to 250 000 kg of the fruit per year.</p>', '8648m', 'Winter', '21 nights/22 days', '5-15', 'Hotels/Tent', 'Moderate', 'map.jpg', '2022-10-18 01:24:59', '2022-10-18 01:24:59'),
(13, 2, 'Annapurna Trek', 'jerry-zhang-Y8lCoTRgHPE-unsplash.jpg', '<p>Kakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the Kakani village development committee administered a population of 7816 living in 1343 individual households.</p><p>As one of the most accessible settlements from Kathmandu over 2000 meters, this hill station hosts a British Gurkhas welfare bungalow and a number of hotels. The village is also home to a memorial park to the victims of Thai Airways International Flight 311.</p><p>A notable local industry is strawberry farming. With the assistance of a United Nations Development Programme project, a local farmers\' cooperative now produces close to 250 000 kg of the fruit per year.</p>', '8848m', 'Summer', '21nights/22days', '5-15', 'Hotel', 'Moderate', 'map.jpg', '2022-10-18 01:35:36', '2022-10-19 01:31:34'),
(14, 5, '7000 expedition 1', '4185148.png', '<p>asdasd</p>', 'sadasd', 'sadasd', 'asdsa', 'sadasd', 'asda', 'Moderate', 'download.jpg', '2022-10-19 01:30:26', '2022-10-19 01:30:26'),
(15, 6, '6000 expedition', 'All Setra Wallpaper HD (1).jpg', '<p>asdsadas asd asd a</p>', 'sadasda', 'asdsad', 'adsad', 'asdasda', 'asdasd', 'Moderate', 'bluelogo-01.png', '2022-10-19 01:31:02', '2022-10-19 01:31:02'),
(16, 1, 'namche trek', 'photo-1562620669-98104534c6cd.webp', '<p>asdasdasda</p>', 'asdsad', 'asdasda', 'sadasd', 'asdasda', 'asdasdasd', 'Challenging', 'images.jfif', '2022-10-19 01:32:13', '2022-10-19 01:32:13');

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
-- Table structure for table `privacypolicies`
--

CREATE TABLE `privacypolicies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacypolicies`
--

INSERT INTO `privacypolicies` (`id`, `title`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 'Test hello', 'sfdsf sdf sdf sd', '2022-10-20 02:47:30', '2022-10-20 02:47:30'),
(2, 'asd as as a', 'as dasd asd a', '2022-10-20 02:48:45', '2022-10-20 02:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `recommendedgears`
--

CREATE TABLE `recommendedgears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `gearlist` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recommendedgears`
--

INSERT INTO `recommendedgears` (`id`, `package_id`, `gearlist`, `created_at`, `updated_at`) VALUES
(1, 10, '<ol><li>Tent</li><li>Whisey</li><li>Rum</li><li>Ciggarete</li></ol>', '2022-10-17 04:33:36', '2022-10-18 01:27:51'),
(2, 11, NULL, '2022-10-17 05:17:14', '2022-10-17 05:17:14'),
(3, 12, NULL, '2022-10-18 01:24:59', '2022-10-18 01:24:59'),
(4, 13, NULL, '2022-10-18 01:35:36', '2022-10-18 01:35:36'),
(5, 14, NULL, '2022-10-19 01:30:26', '2022-10-19 01:30:26'),
(6, 15, NULL, '2022-10-19 01:31:02', '2022-10-19 01:31:02'),
(7, 16, NULL, '2022-10-19 01:32:13', '2022-10-19 01:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `image`, `excerpt`, `created_at`, `updated_at`) VALUES
(2, 'Sales Agent', 'download (2).png', '<p>Lorem</p>', '2022-10-11 05:13:46', '2022-10-11 05:14:15'),
(3, 'Anush Hada', '1666078234.jpg', '<p>Kakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the Kakani village development committee administered a population of 7816 living in 1343 individual households.</p>', '2022-10-18 01:45:34', '2022-10-18 01:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'Sherpa Leaders', 'bluelogo-01.png', 'sherpafavicon.png', NULL, '2022-10-10 05:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `excerpt`, `image`, `created_at`, `updated_at`) VALUES
(2, 'OPEN YOUR EYES-TO THE HIDDEN WORLD', 'Stunning & Technically Challenging Peaks,\r\nScheduled for October-November (Autumn) 2022', '1666076384.jpg', '2022-10-18 01:14:44', '2022-10-18 05:29:50'),
(3, 'TOGETHER-WE EXPLORE', 'Stunning & Technically Challenging Peaks,\r\nScheduled for October-November (Autumn) 2022', '1666076494.jpg', '2022-10-18 01:16:35', '2022-10-18 05:29:41'),
(4, 'WELCOME TO THE-HIDDEN WORLD', 'Stunning & Technically Challenging Peaks,\r\nScheduled for October-November (Autumn) 2022', '1666076567.jpg', '2022-10-18 01:17:47', '2022-10-18 05:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Everest Region', '2022-10-16 00:48:54', '2022-10-16 00:48:54'),
(2, 1, 'Manang Region', '2022-10-16 00:49:08', '2022-10-16 00:49:08'),
(3, 2, '8000ers', '2022-10-16 00:49:20', '2022-10-16 00:49:20'),
(4, 1, 'Langtang Region', '2022-10-16 00:49:40', '2022-10-16 00:49:40'),
(5, 2, '7000ers', '2022-10-16 00:50:02', '2022-10-16 00:50:02'),
(6, 2, '6000ers', '2022-10-18 01:22:05', '2022-10-18 01:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `termsandconditions`
--

CREATE TABLE `termsandconditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termsandconditions`
--

INSERT INTO `termsandconditions` (`id`, `title`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 'Test asd as', '<p>sadsa asd asdasd as das as dasd asas sa da 1313123</p>', '2022-10-20 02:46:45', '2022-10-20 02:49:59');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videogalleries`
--

CREATE TABLE `videogalleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videogalleries`
--

INSERT INTO `videogalleries` (`id`, `video`, `created_at`, `updated_at`) VALUES
(2, 'SampleVideo_1280x720_1mb.mp4', '2022-10-19 02:19:23', '2022-10-19 02:19:23'),
(3, 'SampleVideo_1280x720_10mb.mp4', '2022-10-19 02:19:31', '2022-10-19 02:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `whoarewes`
--

CREATE TABLE `whoarewes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whoarewes`
--

INSERT INTO `whoarewes` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Serving Mountaineering & Expeditions for Over 10 Years', 'jonny-gios-vh3YqU7D-xM-unsplash.jpg', '<p>From the airport to the summit, our Thamserku Expeditions provide a highly established and comprehensive expedition experience for you and your team with our multi-experienced expedition leaders combined with our Nepalese born Sherpa’s, we aim to ensure your trip is a complete success.</p><p>Thamserku Expedition is part of Nepal’s leading tourism network covering trekking, holiday’s, airlines, helicopter flights and more adventure experiences in and across Nepal.</p><p>Working with our dedicated and experienced expedition leaders puts you and your team in the safest hands possible while we help plan and build your expedition package from day 1 to summit.</p><ul><li>Search from 8+ available Expedition packages.</li><li>Build a private &amp; bespoke expedition.</li><li>Contact our team, enquire directly or book online.</li><li>Over 30 years experience in high-altitude climbing.</li><li>Highly trained &amp; experienced Sherpa built company.</li><li>Climb safety and client health assessment.</li><li>Best expedition package price guarantee.</li></ul>', NULL, '2022-10-18 04:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `whyuses`
--

CREATE TABLE `whyuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whyuses`
--

INSERT INTO `whyuses` (`id`, `title`, `image`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 'Reliale', '471710.png', 'Kakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the Kakani village development committee administered a population of 7816 living in 1343 individual households.  As one of the most accessible settlements from Kathmandu over 2000 meters, this hill station hosts a British Gurkhas welfare bungalow and a number of hotels. The village is also home to a memorial park to the victims of Thai Airways International Flight 311.  A notable local industry is strawberry farming. With the assistance of a United Nations Development Programme project, a local farmers\' cooperative now produces close to 250 000 kg of the fruit per year.', '2022-10-18 01:39:14', '2022-10-18 01:39:14'),
(2, 'Support', '837928.png', 'Kakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the Kakani village development committee administered a population of 7816 living in 1343 individual households.  As one of the most accessible settlements from Kathmandu over 2000 meters, this hill station hosts a British Gurkhas welfare bungalow and a number of hotels. The village is also home to a memorial park to the victims of Thai Airways International Flight 311.  A notable local industry is strawberry farming. With the assistance of a United Nations Development Programme project, a local farmers\' cooperative now produces close to 250 000 kg of the fruit per year.', '2022-10-18 01:39:59', '2022-10-18 01:39:59'),
(3, 'Affordable', '3130453.png', 'Kakani is a Gaunpalika and former village development committee in Nuwakot District in Bagmati Pradesh of central Nepal. At the time of the 1991 Nepal census, the Kakani village development committee administered a population of 7816 living in 1343 individual households.  As one of the most accessible settlements from Kathmandu over 2000 meters, this hill station hosts a British Gurkhas welfare bungalow and a number of hotels. The village is also home to a memorial park to the victims of Thai Airways International Flight 311.  A notable local industry is strawberry farming. With the assistance of a United Nations Development Programme project, a local farmers\' cooperative now produces close to 250 000 kg of the fruit per year.', '2022-10-18 01:40:33', '2022-10-18 01:40:33'),
(4, 'Trusted', '4185148.png', 'in Nuwakot District in Kakani is a Gaunpalika and former village development committee in Nuwakot District in Kakani is a Gaunpalika and former village development committee in Nuwakot District in', '2022-10-18 01:41:02', '2022-10-19 04:39:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutotherdetails`
--
ALTER TABLE `aboutotherdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costdetails`
--
ALTER TABLE `costdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costdetails_package_id_foreign` (`package_id`);

--
-- Indexes for table `cost_descriptions`
--
ALTER TABLE `cost_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cost_descriptions_package_id_foreign` (`package_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itineraries_package_id_foreign` (`package_id`);

--
-- Indexes for table `messagefromdirectors`
--
ALTER TABLE `messagefromdirectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourteams`
--
ALTER TABLE `ourteams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagegalleries`
--
ALTER TABLE `packagegalleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packagegalleries_package_id_foreign` (`package_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_subcategory_id_foreign` (`subcategory_id`);

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
-- Indexes for table `privacypolicies`
--
ALTER TABLE `privacypolicies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendedgears`
--
ALTER TABLE `recommendedgears`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommendedgears_package_id_foreign` (`package_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `termsandconditions`
--
ALTER TABLE `termsandconditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videogalleries`
--
ALTER TABLE `videogalleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whoarewes`
--
ALTER TABLE `whoarewes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whyuses`
--
ALTER TABLE `whyuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutotherdetails`
--
ALTER TABLE `aboutotherdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `costdetails`
--
ALTER TABLE `costdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cost_descriptions`
--
ALTER TABLE `cost_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messagefromdirectors`
--
ALTER TABLE `messagefromdirectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ourteams`
--
ALTER TABLE `ourteams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packagegalleries`
--
ALTER TABLE `packagegalleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacypolicies`
--
ALTER TABLE `privacypolicies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recommendedgears`
--
ALTER TABLE `recommendedgears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `termsandconditions`
--
ALTER TABLE `termsandconditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videogalleries`
--
ALTER TABLE `videogalleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `whoarewes`
--
ALTER TABLE `whoarewes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `whyuses`
--
ALTER TABLE `whyuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `costdetails`
--
ALTER TABLE `costdetails`
  ADD CONSTRAINT `costdetails_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cost_descriptions`
--
ALTER TABLE `cost_descriptions`
  ADD CONSTRAINT `cost_descriptions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD CONSTRAINT `itineraries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packagegalleries`
--
ALTER TABLE `packagegalleries`
  ADD CONSTRAINT `packagegalleries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `recommendedgears`
--
ALTER TABLE `recommendedgears`
  ADD CONSTRAINT `recommendedgears_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
