-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 02:56 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `about_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `admin_id`, `about_text`, `created_at`, `updated_at`) VALUES
(1, 2, '<h2 class=\"wysiwyg-text-align-center\"><b>Care 2 Us</b><br></h2><h5 class=\"wysiwyg-text-align-left\">A system that helps the patients to connect with the doctors and nurses and pharmacies easily, it helps in easing the process of requesting a doctor and others at home and ensure full medical care and follow ups. this system ensure the comfort and medical care of the patient. moreover it connects the pharmacies and the medical firms and help in making every related process to become remotely to reduce both time and effort.</h5><h4><br></h4>', '2018-04-22 11:39:39', '2018-04-25 12:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(225) NOT NULL,
  `activate` tinyint(4) NOT NULL DEFAULT '1',
  `websites_admin` tinyint(4) NOT NULL DEFAULT '0',
  `super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` text NOT NULL,
  `ads_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `mobile`, `status`, `password`, `activate`, `websites_admin`, `super_admin`, `remember_token`, `ads_admin`, `created_at`, `updated_at`) VALUES
(1, 'hager', 'hager@gmail.com', '123456', 1, '$2y$10$SLPj/6g6DpPoLuLDOub7h.qZqV6bkN7FU2PTqLQh8Sf1/XAUr3G.a', 1, 0, 1, 'VTNq0y5gsOJUYFiHgVpKyxnp1ezfCtryICMeSWMYWeigi6FSNbJbam9le7Ji', 0, '2018-04-23 14:16:14', '2018-04-23 14:16:14'),
(2, 'mohamed ragab', 'mohamed@admin.com', '552220', 1, '$2y$10$qnMiQMqhhLjMPFi18FfZ4eus/FmUF0Z5nwHFOOw5lEkHQaAyrK6fi', 1, 0, 1, '6SZ8NbEj0cV53h5XvAErp5pFb4bttT4qW3qhI8B0c5k020ZxU8YW9KwkzJa0', 0, '2018-04-23 14:22:47', '2018-04-23 14:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `ask_doctors`
--

CREATE TABLE `ask_doctors` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` varchar(40) NOT NULL,
  `doc_type_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `detials` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ask_doctors`
--

INSERT INTO `ask_doctors` (`id`, `username`, `user_id`, `doctor_id`, `doc_type_id`, `email`, `detials`, `created_at`, `updated_at`) VALUES
(3, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'gfdgfgfg', '2018-06-25 10:59:04', '2018-06-25 10:59:04'),
(4, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'dsdsdd', '2018-06-25 11:00:00', '2018-06-25 11:00:00'),
(5, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'ghg', '2018-06-25 11:23:19', '2018-06-25 11:23:19'),
(6, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'lk;ll;', '2018-06-25 13:05:31', '2018-06-25 13:05:31'),
(7, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'hggggggggggggggggg', '2018-06-26 06:59:29', '2018-06-26 06:59:29'),
(8, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'hggggggggggggggggg', '2018-06-26 07:00:08', '2018-06-26 07:00:08'),
(9, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'gfgfhfghfgh', '2018-06-26 07:02:47', '2018-06-26 07:02:47'),
(10, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'dsdsdsasdas', '2018-06-26 07:05:18', '2018-06-26 07:05:18'),
(11, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'dsdsdsasdas', '2018-06-26 07:06:02', '2018-06-26 07:06:02'),
(12, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'sssdsdsdsdsdsd', '2018-06-26 07:12:34', '2018-06-26 07:12:34'),
(13, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'kokjiji', '2018-06-26 07:17:31', '2018-06-26 07:17:31'),
(14, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'gfg', '2018-06-26 07:18:13', '2018-06-26 07:18:13'),
(15, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'gfg', '2018-06-26 07:18:37', '2018-06-26 07:18:37'),
(16, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'gfg', '2018-06-26 07:19:40', '2018-06-26 07:19:40'),
(17, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'gfg', '2018-06-26 07:20:02', '2018-06-26 07:20:02'),
(18, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'kjhkjhk', '2018-06-26 07:32:44', '2018-06-26 07:32:44'),
(19, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'kjhkjhk', '2018-06-26 07:43:41', '2018-06-26 07:43:41'),
(20, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'kjhkjhk', '2018-06-26 08:00:20', '2018-06-26 08:00:20'),
(21, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'dsdsdsdsd', '2018-06-26 08:00:48', '2018-06-26 08:00:48'),
(22, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'sasasass', '2018-06-26 08:01:40', '2018-06-26 08:01:40'),
(23, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'sasasass', '2018-06-26 08:03:54', '2018-06-26 08:03:54'),
(24, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'sasasass', '2018-06-26 08:05:08', '2018-06-26 08:05:08'),
(25, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'sasasass', '2018-06-26 08:05:13', '2018-06-26 08:05:13'),
(26, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'dfdgdfgfhghgj', '2018-06-26 08:14:19', '2018-06-26 08:14:19'),
(27, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'jhjhgjhgj', '2018-06-26 08:54:53', '2018-06-26 08:54:53'),
(28, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'jhjhgjhgj', '2018-06-26 08:56:13', '2018-06-26 08:56:13'),
(29, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'kjkhhhhh', '2018-06-26 09:26:52', '2018-06-26 09:26:52'),
(30, 'tamer', 14, '5', 2, 'tamer@gmail.com', 'hggggfgfh', '2018-06-26 09:28:12', '2018-06-26 09:28:12'),
(31, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'kjlkllk', '2018-07-02 11:23:51', '2018-07-02 11:23:51'),
(32, 'tamer', 14, '25', 1, 'tamer@gmail.com', 'jmnnnnnnnnnnhbnh', '2018-08-29 10:55:13', '2018-08-29 10:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `ask_doctor_comments`
--

CREATE TABLE `ask_doctor_comments` (
  `id` int(11) NOT NULL,
  `ask_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  `attach_file` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ask_doctor_comments`
--

INSERT INTO `ask_doctor_comments` (`id`, `ask_id`, `user_id`, `comment`, `attach_file`, `created_at`, `updated_at`) VALUES
(1, 4, 14, 'dsffe', NULL, '2018-04-05 13:05:13', '2018-04-10 13:38:14'),
(2, 6, 14, 'qqqqqqqqqqqqqqqqqq', NULL, '2018-04-10 11:20:19', '2018-04-10 13:38:17'),
(3, 10, 14, 'fdfdfdf', NULL, '2018-04-10 08:14:20', '2018-04-10 13:38:21'),
(6, 11, 14, 'hgjhjhgjhgjkhkj', NULL, '2018-04-10 11:45:58', '2018-04-10 11:45:58'),
(7, 11, 14, 'fdfddfdf', NULL, '2018-04-10 11:46:33', '2018-04-10 11:46:33'),
(8, 12, 25, 'vfgdfgdfg', NULL, '2018-04-11 10:58:45', '2018-04-11 10:58:45'),
(9, 12, 25, 'jjjj', NULL, '2018-04-11 10:59:59', '2018-04-11 10:59:59'),
(10, 12, 25, 'llll', NULL, '2018-04-16 11:50:32', '2018-04-16 11:50:32'),
(11, 12, 14, 'kkkkkkk', NULL, '2018-04-16 11:54:33', '2018-04-16 11:54:33'),
(12, 13, 14, 'kkkllgyg', NULL, '2018-04-17 07:23:22', '2018-04-17 07:23:22'),
(13, 12, 14, 'hagerrrrr', '1524065007.png', '2018-04-18 13:23:27', '2018-04-18 13:23:27'),
(14, 12, 14, 'rrrrrr', '1524066541.txt', '2018-04-18 13:49:01', '2018-04-18 13:49:01'),
(15, 32, 14, 'dsfdfsdf', NULL, '2018-09-04 13:22:17', '2018-09-04 13:22:17'),
(16, 32, 14, 'vfcc', NULL, '2018-09-04 13:26:29', '2018-09-04 13:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `type` enum('commondiseases','veterinarymedicine') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `admin_id`, `type`, `created_at`, `updated_at`) VALUES
(3, 'ddd', 1, 'commondiseases', '2018-05-08 10:05:12', '2018-05-08 10:05:12'),
(4, 'kkkk', 1, 'veterinarymedicine', '2018-05-13 07:55:33', '2018-05-13 07:55:33'),
(5, 'ttttt', 1, 'commondiseases', '2018-07-02 12:57:09', '2018-07-02 12:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gov_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `c_title`, `gov_id`) VALUES
(1, 'مدينة نصر', 6),
(2, 'العباسية', 6),
(3, 'الدقى', 11),
(4, 'الهرم', 11),
(5, 'الجمهورية', 3),
(6, 'ساحل سليم', 3);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_type` int(10) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `home_clinc` int(11) NOT NULL,
  `c_fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `client_type`, `doc_type`, `home_clinc`, `c_fname`, `c_lname`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, 1, 'abdellah', 'gaballah', '2018-01-30 11:34:16', '2018-01-30 11:34:16'),
(2, 12, 0, 0, 0, 'محمد', 'رجب', '2018-01-31 07:44:24', '2018-01-31 07:44:24'),
(3, 14, 1, 0, 0, 'asdasd', 'adad', '2018-02-18 06:53:05', '2018-02-18 06:53:05'),
(4, 19, 3, 1, 1, 'doc', 'mazen', '2018-04-03 13:36:41', '2018-04-03 13:36:41'),
(8, 25, 3, 1, 1, 'hager', 'ibrahim', '2018-04-05 08:25:02', '2018-04-05 08:25:02'),
(9, 28, 1, 0, 0, 'osma', NULL, '2018-04-05 08:29:46', '2018-04-05 08:29:46'),
(10, 29, 4, 0, 1, 'yasser', 'mostfa', '2018-04-05 08:32:23', '2018-04-05 08:32:23'),
(11, 36, 1, 0, 0, 'www', NULL, '2018-05-20 11:04:28', '2018-05-20 11:04:28'),
(12, 37, 1, 0, 0, 'weza', NULL, '2018-06-27 07:50:57', '2018-06-27 07:50:57'),
(13, 38, 1, 0, 0, 'weza', NULL, '2018-06-27 07:55:54', '2018-06-27 07:55:54'),
(14, 40, 1, 1, 1, 'tst', NULL, '2018-09-12 13:03:36', '2018-09-12 13:03:36'),
(15, 41, 1, 0, 0, 'hazzzzz', NULL, '2018-09-12 13:05:38', '2018-09-12 13:05:38'),
(16, 42, 3, 1, 0, 'busho', NULL, '2018-09-16 10:57:43', '2018-09-16 10:57:43'),
(17, 43, 1, 1, 1, 'tst2', NULL, '2018-09-16 11:01:59', '2018-09-16 11:01:59'),
(18, 44, 3, 1, 0, 'haaaaaa', NULL, '2018-09-16 11:23:58', '2018-09-16 11:23:58'),
(19, 45, 3, 1, 0, 'bishoy', NULL, '2018-09-16 11:26:30', '2018-09-16 11:26:30'),
(20, 46, 2, 0, 0, 'hazem2', NULL, '2018-09-16 11:43:44', '2018-09-16 11:43:44'),
(21, 47, 1, 0, 0, 'hazem', NULL, '2018-09-16 11:53:22', '2018-09-16 11:53:22'),
(22, 48, 2, 0, 0, 'hazaem', NULL, '2018-09-16 12:27:55', '2018-09-16 12:27:55'),
(23, 49, 1, 1, 1, 'tst2', NULL, '2018-09-16 13:11:44', '2018-09-16 13:11:44'),
(24, 50, 1, 1, 1, 'tst23', NULL, '2018-09-16 13:12:25', '2018-09-16 13:12:25'),
(25, 51, 2, 0, 0, 'hazem', NULL, '2018-10-01 08:09:52', '2018-10-01 08:09:52'),
(26, 52, 1, 1, 1, 'tst', NULL, '2018-10-01 09:08:33', '2018-10-01 09:08:33'),
(27, 53, 1, 1, 1, 'tstt', NULL, '2018-10-01 09:22:37', '2018-10-01 09:22:37'),
(28, 54, 1, 1, 1, 'tstq', NULL, '2018-10-01 09:22:59', '2018-10-01 09:22:59'),
(29, 56, 1, 0, 0, 'zzzzzzz', NULL, '2018-10-01 11:07:31', '2018-10-01 11:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `client_types`
--

CREATE TABLE `client_types` (
  `id` int(11) NOT NULL,
  `title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_types`
--

INSERT INTO `client_types` (`id`, `title`) VALUES
(1, 'مستخدم'),
(2, 'دكتور صيدلى'),
(3, 'طبيب '),
(4, 'ممرض');

-- --------------------------------------------------------

--
-- Table structure for table `common_diseases`
--

CREATE TABLE `common_diseases` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `common_diseases`
--

INSERT INTO `common_diseases` (`id`, `admin_id`, `title_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(7, 1, 6, 'dfdfdf', 'fdfdsfsdf', '2018-05-13 11:19:14', '2018-05-13 11:19:14'),
(8, 1, 6, 'uuu', 'yyyyyyyyy', '2018-05-13 11:19:14', '2018-05-13 11:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_title`) VALUES
(1, 'Egypt');

-- --------------------------------------------------------

--
-- Table structure for table `cure2us_offer`
--

CREATE TABLE `cure2us_offer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `expire_data` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cure2us_offer`
--

INSERT INTO `cure2us_offer` (`id`, `user_id`, `description`, `expire_data`, `created_at`, `updated_at`) VALUES
(2, 6, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2018-07-30', '2018-05-27 08:34:51', '2018-05-27 08:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `cv_paids`
--

CREATE TABLE `cv_paids` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `cv` text NOT NULL,
  `cash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cv_paids`
--

INSERT INTO `cv_paids` (`id`, `doctor_id`, `cv`, `cash`) VALUES
(1, 25, 'asdkjlhasd kashd jkahsd jkashd jkahs fjkash fjkash fjkash fajkshf ajksf sfjk hfjkash f', '200');

-- --------------------------------------------------------

--
-- Table structure for table `deals_types`
--

CREATE TABLE `deals_types` (
  `id` int(11) NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `deals_types`
--

INSERT INTO `deals_types` (`id`, `title`) VALUES
(1, 'طلب دواء'),
(2, 'استرجاع دواء'),
(3, 'بيان ضرائب'),
(4, 'مقترحات');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_asks`
--

CREATE TABLE `doctor_asks` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `ask` varchar(190) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doc_type`
--

CREATE TABLE `doc_type` (
  `id` int(11) NOT NULL,
  `doc_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doc_type`
--

INSERT INTO `doc_type` (`id`, `doc_type`) VALUES
(1, 'باطنة'),
(2, 'عيون');

-- --------------------------------------------------------

--
-- Table structure for table `drugs_foods`
--

CREATE TABLE `drugs_foods` (
  `id` int(11) NOT NULL,
  `medcine` varchar(200) NOT NULL,
  `food` varchar(200) NOT NULL,
  `result` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drugs_foods`
--

INSERT INTO `drugs_foods` (`id`, `medcine`, `food`, `result`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, 'hhhhhhhhhhh', 'ggggg', 'تتتتتتتتتت', 1, '2018-05-07 11:28:51', '2018-05-07 11:28:51'),
(3, 'hhhhhhhhhhh', 'yyyyyyyyyy', 'uuuuuuuuu', 1, '2018-05-07 11:28:51', '2018-05-07 11:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `excess_medicines`
--

CREATE TABLE `excess_medicines` (
  `id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `medicine_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `excess_medicines`
--

INSERT INTO `excess_medicines` (`id`, `publisher_id`, `medicine_name`, `quantity`, `updated_at`, `created_at`) VALUES
(1, 16, 'الا', 25, '2018-03-27 17:04:50', '2018-03-27 17:04:50'),
(2, 8, 'sdsads', 17, '2018-04-17 17:26:20', '2018-04-17 17:26:20'),
(3, 16, 'kklllkk', 500, '2018-07-02 14:03:18', '2018-07-02 14:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `firms`
--

CREATE TABLE `firms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `firms`
--

INSERT INTO `firms` (`id`, `user_id`, `f_name`, `f_type`, `created_at`, `updated_at`) VALUES
(1, 6, 'FRD company', 3, '2018-01-30 12:18:50', '2018-01-30 12:18:50'),
(2, 11, 'ASD', 2, '2018-01-30 13:29:30', '2018-01-30 13:29:30'),
(3, 18, 'Mix Medical', 1, '2018-02-26 07:33:59', '2018-02-26 07:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `firms_medicines`
--

CREATE TABLE `firms_medicines` (
  `id` int(11) NOT NULL,
  `firm_id` int(11) NOT NULL,
  `medicine_name_en` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine_name_ar` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine_type` int(11) NOT NULL,
  `active_substance` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_substance_en` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_substance_ar` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine_img` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prescription_img_en` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prescription_img_ar` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firms_medicines`
--

INSERT INTO `firms_medicines` (`id`, `firm_id`, `medicine_name_en`, `medicine_name_ar`, `medicine_type`, `active_substance`, `active_substance_en`, `active_substance_ar`, `price`, `discount`, `medicine_img`, `prescription_img_en`, `prescription_img_ar`) VALUES
(1, 6, 'pandol ', 'بانادول', 1, 'TYU665', 'HGG654', 'اتش جى جى 654', '30 جنية', '30%', '1519830553.jpg', NULL, NULL),
(2, 6, 'dsads', 'sdsds', 1, 'TYU665', 'HGG654', 'اتش جى جى 654', '50 جنية', '30%', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `firms_offers`
--

CREATE TABLE `firms_offers` (
  `id` int(11) NOT NULL,
  `firm_id` int(11) NOT NULL,
  `offer_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firm_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `expiry_date` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `firms_offers`
--

INSERT INTO `firms_offers` (`id`, `firm_id`, `offer_name`, `firm_name`, `medicine_name`, `offer_desc`, `status`, `paid`, `expiry_date`) VALUES
(2, 6, 'FREE', 'FRD company', 'Konjestall', 'عرض اليوم عبوتين بسعر عبوة واحدة', 1, 0, '15/06/2018'),
(3, 6, 'Extra ONE', 'FRD company', 'Banadool', 'عرض واحدة اضافى على كل خمس عبوات', 1, 1, '16/10/2018');

-- --------------------------------------------------------

--
-- Table structure for table `firm_types`
--

CREATE TABLE `firm_types` (
  `id` int(11) NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firm_types`
--

INSERT INTO `firm_types` (`id`, `title`) VALUES
(1, 'شركة انتاج'),
(2, 'شركة اكسسوارات'),
(3, 'شركة توزيع');

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` int(10) UNSIGNED NOT NULL,
  `g_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `g_title`, `country_id`) VALUES
(1, 'Alexandria', 1),
(2, 'Aswan', 1),
(3, 'Asyut', 1),
(5, 'Beni Suef', 1),
(6, 'Cairo', 1),
(9, 'Faiyum', 1),
(11, 'Giza', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_clinics`
--

CREATE TABLE `home_clinics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_type_id` int(11) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `country` int(11) NOT NULL,
  `governate` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `location` text,
  `status` enum('accept','pending','rejected','') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_clinics`
--

INSERT INTO `home_clinics` (`id`, `user_id`, `doctor_id`, `doctor_type_id`, `user_phone`, `address`, `country`, `governate`, `city`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 25, 1, '123456789', 'nasr city', 0, 0, 0, NULL, 'accept', '2018-04-11 15:16:13', '2018-04-12 09:41:33'),
(3, 14, 29, 1, '123456', 'anything', 0, 0, 0, NULL, 'accept', '2018-04-12 14:26:17', '2018-05-15 10:54:07'),
(6, 14, 29, 1, '0123456', 'sasas', 0, 0, 0, NULL, 'pending', '2018-04-16 11:39:12', '2018-04-16 15:18:58'),
(7, 14, 25, 1, '1234', 'duki', 0, 0, 0, 'https://goo.gl/maps/DQmNEJjKky42', 'pending', '2018-05-22 09:08:38', '2018-05-22 09:08:38'),
(8, 14, 25, 1, '0123456', 'duki', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-05-23 10:02:40', '2018-05-23 10:02:40'),
(9, 14, 5, 2, '123', 'duki', 1, 6, 1, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-05-23 10:04:10', '2018-05-23 10:04:10'),
(10, 14, 5, 2, '1234', 'duki', 1, 6, 1, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 11:02:46', '2018-06-25 11:02:46'),
(11, 14, 25, 1, '0123456', 'duki', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 11:12:48', '2018-06-25 11:12:48'),
(12, 14, 25, 1, '123', 'duki', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 11:15:17', '2018-06-25 11:15:17'),
(13, 14, 25, 1, '123', 'duki', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 11:19:21', '2018-06-25 11:19:21'),
(14, 14, 25, 1, '0123456', 'duki', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 11:22:32', '2018-06-25 11:22:32'),
(15, 14, 25, 1, '0123456', 'hgshdjag', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 11:33:22', '2018-06-25 11:33:22'),
(16, 14, 25, 1, '0123456', 'duki', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 11:34:59', '2018-06-25 11:34:59'),
(17, 14, 25, 1, '0123456', 'duki', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 12:58:10', '2018-06-25 12:58:10'),
(18, 14, 25, 1, '0123456', 'duki', 1, 6, 2, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-25 12:58:31', '2018-06-25 12:58:31'),
(19, 14, 5, 2, '1234', 'duki', 1, 6, 1, 'https://goo.gl/maps/wR5UnqUqzf52', 'pending', '2018-06-26 09:33:08', '2018-06-26 09:33:08'),
(20, 14, 25, 1, '1234', 'duki', 1, 6, 2, 'https://goo.gl/maps/fdP6n8mSBW82', 'pending', '2018-07-02 11:29:16', '2018-07-02 11:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `home_clinic_comments`
--

CREATE TABLE `home_clinic_comments` (
  `id` int(11) NOT NULL,
  `home_clinic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `attach_file` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_clinic_comments`
--

INSERT INTO `home_clinic_comments` (`id`, `home_clinic_id`, `user_id`, `comment`, `attach_file`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 'cdfdfd', NULL, '2018-04-11 13:02:34', '2018-04-11 13:02:34'),
(2, 1, 25, 'ddsdsd', NULL, '2018-04-11 13:02:41', '2018-04-11 13:02:41'),
(3, 1, 25, 'fffff', NULL, '2018-04-11 13:02:49', '2018-04-11 13:02:49'),
(4, 3, 29, 'dddddd', NULL, '2018-04-12 12:36:19', '2018-04-12 12:36:19'),
(5, 1, 14, 'kkkkll', NULL, '2018-04-16 11:59:41', '2018-04-16 11:59:41'),
(6, 1, 14, 'wwwwwwww', NULL, '2018-04-16 12:00:17', '2018-04-16 12:00:17'),
(7, 1, 14, 'iiiiiiiiiiiiiiiiiiiii', NULL, '2018-04-16 12:04:23', '2018-04-16 12:04:23'),
(8, 6, 14, 'ccsd', NULL, '2018-04-16 13:19:34', '2018-04-16 13:19:34'),
(11, 1, 14, 'ddddd', NULL, '2018-04-18 13:53:52', '2018-04-18 13:53:52'),
(12, 1, 14, 'fffffff', '1524066954.php', '2018-04-18 13:55:54', '2018-04-18 13:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `job_title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` int(11) NOT NULL,
  `job_address` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `expiry_date` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `publisher_id`, `job_title`, `job_type`, `job_address`, `job_desc`, `status`, `expiry_date`, `featured`) VALUES
(3, 8, 'صيدلى1', 1, 'شارع الهرم', 'نريد صيدلى يجد تركيب الادوية', 1, '05/06/2018', 0),
(5, 8, 'عامل بصيدلية', 1, 'الدقى', 'نريد عامل للعمل على نظافة الصيدلية ويشترط ان يكون امين', 1, '05/26/2018', 0),
(6, 6, 'دكتور صيدلى', 4, 'الجيزة , الدقى', 'نريد دكتور صيدلى لعمل ابحاث ع التركيبات الطبية الجديدة ويشترط الخبرة&nbsp;', 1, '05/10/2018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(11) NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `title`) VALUES
(1, 'صيدلية'),
(2, 'معمل'),
(3, 'عيادة'),
(4, 'شركة ادوية');

-- --------------------------------------------------------

--
-- Table structure for table `medical_files`
--

CREATE TABLE `medical_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `patient_name` varchar(150) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `patient_gendar` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `doctor_name` varchar(150) NOT NULL,
  `doctor_phone` varchar(50) NOT NULL,
  `doctor_address` varchar(200) NOT NULL,
  `medical_list` text NOT NULL,
  `duration_treatment` varchar(100) NOT NULL,
  `analyzes_required` text NOT NULL,
  `analyzes_result` text NOT NULL,
  `required_radiations` text NOT NULL,
  `radiations_result` text NOT NULL,
  `sensitivity_medical` text NOT NULL,
  `sensitivity_eats` text NOT NULL,
  `blood_type` varchar(200) NOT NULL,
  `smoke` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_files`
--

INSERT INTO `medical_files` (`id`, `user_id`, `patient_name`, `relationship`, `patient_gendar`, `date`, `doctor_name`, `doctor_phone`, `doctor_address`, `medical_list`, `duration_treatment`, `analyzes_required`, `analyzes_result`, `required_radiations`, `radiations_result`, `sensitivity_medical`, `sensitivity_eats`, `blood_type`, `smoke`, `created_at`, `updated_at`) VALUES
(1, 14, 'asdsadq', 'd', 'female', '2017-02-18', 'gh', 'f', 'fgh', 'ghf', 'hgf', 'ghf', 'hg', 'fhg', 'fghf', 'hgf', 'gh', 'fgh', 'yes', '2018-03-19 11:23:31', '2018-03-19 13:31:05'),
(2, 14, 'asdasd', 'dasdasd', 'ذكر', '2017-02-20', 'asd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'نعم', '2018-03-21 11:08:47', '2018-03-21 11:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_types`
--

CREATE TABLE `medicines_types` (
  `id` int(11) NOT NULL,
  `title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines_types`
--

INSERT INTO `medicines_types` (`id`, `title`) VALUES
(1, 'أقراص'),
(2, 'كبسولات'),
(3, 'كريم'),
(4, 'مرهم'),
(5, 'لبوس'),
(6, 'حقن'),
(7, 'بخاخ'),
(8, 'شراب'),
(9, 'نقط'),
(10, 'اشياء اخرى');

-- --------------------------------------------------------

--
-- Table structure for table `medicin_reactives`
--

CREATE TABLE `medicin_reactives` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `medicen` varchar(100) NOT NULL,
  `reactive` varchar(200) NOT NULL,
  `result` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicin_reactives`
--

INSERT INTO `medicin_reactives` (`id`, `admin_id`, `medicen`, `reactive`, `result`, `created_at`, `updated_at`) VALUES
(4, 1, 'rrrrrrrrr', 'rrrrrrr', 'rrrrrrrrrr', '2018-05-06 13:14:21', '2018-05-06 13:14:21'),
(5, 1, 'rrrrrrrrr', 'lllllllllllllll', 'llllllllllllll', '2018-05-06 13:14:22', '2018-05-06 13:14:22'),
(6, 1, 'ssssss', 'wwww', 'hhhhhhh', '2018-05-07 11:44:51', '2018-05-07 11:44:51'),
(7, 1, 'سيسيس', 'sdsd', 'للللللل', '2018-07-02 14:48:38', '2018-07-02 14:48:38'),
(8, 1, 'سيسيس', 'wwww', 'ffffffff', '2018-07-02 14:48:38', '2018-07-02 14:48:38');

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
(1, '2018_01_31_114230_create_governorates_table', 1),
(2, '2018_01_31_114613_create_cities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacys`
--

CREATE TABLE `pharmacys` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pharm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacys`
--

INSERT INTO `pharmacys` (`id`, `user_id`, `pharm_name`, `created_at`, `updated_at`) VALUES
(1, 8, 'ABCD Pharmacy', '2018-01-30 12:15:27', '2018-01-30 12:15:27'),
(2, 16, 'pharmacy', '2018-02-21 12:36:16', '2018-02-21 12:36:16'),
(3, 58, 'xnxx', '2018-10-02 08:14:35', '2018-10-02 08:14:35'),
(4, 59, 'pharma', '2018-10-02 08:58:38', '2018-10-02 08:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `place_types`
--

CREATE TABLE `place_types` (
  `id` int(11) NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `place_types`
--

INSERT INTO `place_types` (`id`, `title`) VALUES
(1, 'صيدلية '),
(2, 'معمل '),
(3, 'عيادة'),
(4, 'شركة ادوية '),
(5, 'مخزن ادوية');

-- --------------------------------------------------------

--
-- Table structure for table `request_excess_medicines`
--

CREATE TABLE `request_excess_medicines` (
  `id` int(11) NOT NULL,
  `excess_medicines_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `required_quantity` int(11) NOT NULL,
  `status` enum('pending','reject','accept','') NOT NULL DEFAULT 'pending',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_excess_medicines`
--

INSERT INTO `request_excess_medicines` (`id`, `excess_medicines_id`, `requester_id`, `required_quantity`, `status`, `updated_at`, `created_at`) VALUES
(22, 1, 8, 20, 'pending', '2018-03-28 12:52:22', '2018-03-28 12:52:22'),
(23, 1, 8, 20, 'pending', '2018-03-28 12:53:46', '2018-03-28 12:53:46'),
(24, 1, 8, 5, 'reject', '2018-03-28 12:56:17', '2018-03-28 12:56:17'),
(25, 1, 8, 15, 'accept', '2018-03-28 13:03:33', '2018-03-28 13:03:33'),
(26, 2, 16, 20, 'accept', '2018-04-17 13:26:43', '2018-04-17 13:26:43'),
(27, 2, 16, 20, 'reject', '2018-06-21 08:55:25', '2018-06-21 08:55:25'),
(29, 2, 16, 5, 'pending', '2018-06-21 09:53:48', '2018-06-21 09:53:48'),
(30, 2, 16, 13, 'pending', '2018-06-21 09:57:03', '2018-06-21 09:57:03'),
(31, 2, 16, 26, 'pending', '2018-06-26 07:24:30', '2018-06-26 07:24:30'),
(32, 2, 16, 5, 'pending', '2018-08-29 10:49:21', '2018-08-29 10:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `request_medicins`
--

CREATE TABLE `request_medicins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `government` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `location` text,
  `pharm_id` int(11) NOT NULL,
  `medicin` text NOT NULL,
  `detils` text NOT NULL,
  `requst_client_status` enum('pending','accept','rejected','') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_medicins`
--

INSERT INTO `request_medicins` (`id`, `user_id`, `country`, `government`, `city`, `location`, `pharm_id`, `medicin`, `detils`, `requst_client_status`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 6, 1, '', 16, 'sdasdasdasdasdas', 'asdjkashdjkasdhasjkdasdasd\r\nasd\r\nasd10 100', 'rejected', '2018-03-21 15:19:08', '2018-06-25 09:27:20'),
(2, 14, 1, 6, 1, '', 6, 'sadasd', 'asdasdasdaskldjas l;daks;d as', 'pending', '2018-03-22 07:51:41', '2018-03-22 07:51:41'),
(4, 25, 1, 6, 1, '', 16, 'llllllllllllll', 'j=bjhb', 'pending', '2018-04-17 07:46:04', '2018-04-17 07:46:04'),
(5, 14, 1, 6, 1, 'https://goo.gl/maps/wR5UnqUqzf52', 6, 'sdsdasd', 'ddddsdds', 'pending', '2018-05-22 09:58:25', '2018-05-22 12:02:59'),
(6, 14, 1, 6, 1, 'https://goo.gl/maps/wR5UnqUqzf52', 16, 'gdfgfdgfd', 'fdsfd6565', 'pending', '2018-06-25 11:30:34', '2018-06-25 11:30:34'),
(7, 14, 1, 6, 1, 'https://goo.gl/maps/wR5UnqUqzf52', 16, 'vdgdfgfd', 'fdsfdsfdgdfh', 'pending', '2018-06-26 09:35:21', '2018-06-26 09:35:21'),
(8, 14, 1, 6, 1, 'https://goo.gl/maps/wR5UnqUqzf52', 16, 'fdfdfg', 'gfdgfhgfh', 'rejected', '2018-06-26 09:50:20', '2018-06-26 11:57:15'),
(9, 14, 1, 6, 1, 'https://goo.gl/maps/wR5UnqUqzf52', 16, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'zzzzzzzzzzzzzzz', 'accept', '2018-06-26 09:50:57', '2018-06-26 11:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `request_medicins_pharm_firms`
--

CREATE TABLE `request_medicins_pharm_firms` (
  `id` int(11) NOT NULL,
  `pharm_id` int(11) NOT NULL,
  `firm_type_id` int(11) NOT NULL,
  `deal_type_id` int(11) NOT NULL,
  `expire_date` varchar(60) DEFAULT NULL,
  `firm_id` int(11) NOT NULL,
  `distribution_id` int(11) DEFAULT NULL,
  `detils` text NOT NULL,
  `requst_pharm_status` enum('panding','accept','reject','') NOT NULL DEFAULT 'panding',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_medicins_pharm_firms`
--

INSERT INTO `request_medicins_pharm_firms` (`id`, `pharm_id`, `firm_type_id`, `deal_type_id`, `expire_date`, `firm_id`, `distribution_id`, `detils`, `requst_pharm_status`, `created_at`, `updated_at`, `medicine_id`, `quantity`, `location`) VALUES
(1, 16, 2, 2, NULL, 6, 0, 'sdsdsd', 'panding', '2018-03-25 12:47:24', '2018-06-07 11:15:49', 1, 0, ''),
(3, 16, 3, 3, NULL, 6, 0, 'ddd', 'accept', '2018-03-26 09:13:28', '2018-06-07 11:15:47', 1, 0, ''),
(4, 16, 3, 3, NULL, 6, 0, '7777777777', 'reject', '2018-03-26 09:14:20', '2018-06-07 11:15:44', 1, 0, ''),
(5, 16, 1, 2, NULL, 3, 1, 'dsasdasdsad', 'panding', '2018-06-03 08:26:48', '2018-06-06 12:14:32', 1, 0, ''),
(6, 16, 3, 1, NULL, 6, 0, 'asd', 'accept', '2018-06-05 12:47:09', '2018-06-07 09:46:25', 1, 23, 'https://goo.gl/maps/wR5UnqUqzf52'),
(7, 16, 3, 1, NULL, 6, 0, 'asdasdasdas faf asf sf', 'panding', '2018-06-05 12:50:07', '2018-06-11 12:15:33', 2, 52, 'https://goo.gl/maps/wR5UnqUqzf52'),
(8, 16, 3, 1, NULL, 6, 0, 'asdasdasdas faf asf sf', 'panding', '2018-06-05 12:50:07', '2018-06-11 11:55:08', 2, 100, 'https://goo.gl/maps/wR5UnqUqzf52'),
(9, 16, 3, 1, NULL, 6, 0, 'sdsdasdas', 'reject', '2018-06-21 11:50:34', '2018-06-24 15:28:25', 1, 20, 'https://goo.gl/maps/wR5UnqUqzf52'),
(10, 16, 3, 1, NULL, 6, 0, 'sdsdasdas', 'accept', '2018-06-21 11:50:34', '2018-06-24 15:19:05', 2, 30, 'https://goo.gl/maps/wR5UnqUqzf52'),
(11, 16, 3, 1, NULL, 6, 1, 'fds', 'panding', '2018-07-02 13:48:13', '2018-07-02 13:48:13', 1, 50, 'https://goo.gl/maps/wR5UnqUqzf52'),
(12, 16, 3, 1, NULL, 6, 1, 'fds', 'panding', '2018-07-02 13:48:14', '2018-07-02 13:48:14', 2, 50, 'https://goo.gl/maps/wR5UnqUqzf52');

-- --------------------------------------------------------

--
-- Table structure for table `request_offers`
--

CREATE TABLE `request_offers` (
  `id` int(11) NOT NULL,
  `pharm_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `status` enum('panding','accept','reject','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_offers`
--

INSERT INTO `request_offers` (`id`, `pharm_id`, `offer_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 16, 2, 'panding', '2018-06-11 12:55:09', '2018-06-11 12:55:09'),
(3, 16, 3, 'panding', '2018-06-11 12:55:48', '2018-06-11 12:55:48'),
(4, 16, 2, 'panding', '2018-06-13 11:51:39', '2018-06-13 11:51:39'),
(5, 16, 2, 'panding', '2018-06-13 11:52:55', '2018-06-13 11:52:55'),
(6, 16, 2, 'panding', '2018-06-13 11:53:05', '2018-06-13 11:53:05'),
(7, 16, 2, 'panding', '2018-06-13 11:55:18', '2018-06-13 11:55:18'),
(8, 16, 2, 'panding', '2018-06-13 11:56:32', '2018-06-13 11:56:32'),
(9, 16, 2, 'panding', '2018-06-13 11:58:52', '2018-06-13 11:58:52'),
(10, 16, 2, 'panding', '2018-06-13 12:02:14', '2018-06-13 12:02:14'),
(11, 16, 2, 'accept', '2018-06-13 12:08:32', '2018-06-14 11:41:08'),
(12, 16, 2, 'reject', '2018-06-13 12:09:28', '2018-06-14 11:40:59'),
(13, 16, 2, 'panding', '2018-06-13 12:09:34', '2018-06-13 12:09:34'),
(14, 16, 2, 'panding', '2018-06-13 12:11:27', '2018-06-13 12:11:27'),
(15, 16, 2, 'panding', '2018-06-13 12:12:39', '2018-06-13 12:12:39'),
(16, 16, 2, 'panding', '2018-06-13 12:15:10', '2018-06-13 12:15:10'),
(17, 16, 2, 'panding', '2018-06-13 12:15:50', '2018-06-13 12:15:50'),
(18, 16, 2, 'panding', '2018-06-13 12:18:48', '2018-06-13 12:18:48'),
(19, 16, 2, 'panding', '2018-06-13 12:22:19', '2018-06-13 12:22:19'),
(20, 16, 2, 'panding', '2018-06-19 09:49:25', '2018-06-19 09:49:25'),
(21, 16, 2, 'panding', '2018-06-19 09:49:41', '2018-06-19 09:49:41'),
(22, 16, 2, 'panding', '2018-06-19 13:24:43', '2018-06-19 13:24:43'),
(23, 16, 2, 'panding', '2018-06-19 13:26:10', '2018-06-19 13:26:10'),
(24, 16, 2, 'panding', '2018-06-19 13:39:29', '2018-06-19 13:39:29'),
(25, 16, 2, 'panding', '2018-06-19 13:40:32', '2018-06-19 13:40:32'),
(26, 16, 2, 'panding', '2018-06-19 13:47:08', '2018-06-19 13:47:08'),
(27, 16, 2, 'panding', '2018-06-19 13:47:27', '2018-06-19 13:47:27'),
(28, 16, 2, 'panding', '2018-06-19 13:47:54', '2018-06-19 13:47:54'),
(29, 16, 2, 'panding', '2018-06-19 13:51:27', '2018-06-19 13:51:27'),
(30, 16, 2, 'panding', '2018-06-19 13:51:31', '2018-06-19 13:51:31'),
(31, 16, 2, 'panding', '2018-06-19 13:51:39', '2018-06-19 13:51:39'),
(32, 16, 2, 'panding', '2018-06-19 13:51:49', '2018-06-19 13:51:49'),
(33, 16, 2, 'panding', '2018-06-19 13:53:19', '2018-06-19 13:53:19'),
(34, 16, 2, 'panding', '2018-06-19 14:01:05', '2018-06-19 14:01:05'),
(35, 16, 2, 'panding', '2018-06-19 14:01:57', '2018-06-19 14:01:57'),
(36, 16, 2, 'panding', '2018-06-19 14:44:13', '2018-06-19 14:44:13'),
(37, 16, 2, 'panding', '2018-06-19 14:49:39', '2018-06-19 14:49:39'),
(38, 16, 3, 'panding', '2018-06-19 15:00:07', '2018-06-19 15:00:07'),
(39, 16, 2, 'panding', '2018-06-20 12:05:48', '2018-06-20 12:05:48'),
(40, 16, 2, 'panding', '2018-06-20 12:06:04', '2018-06-20 12:06:04'),
(41, 16, 2, 'panding', '2018-06-21 11:50:49', '2018-06-21 11:50:49'),
(42, 16, 3, 'panding', '2018-07-02 14:12:55', '2018-07-02 14:12:55'),
(43, 16, 2, 'panding', '2018-08-29 12:24:17', '2018-08-29 12:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `sell_buy_places`
--

CREATE TABLE `sell_buy_places` (
  `id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `place_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_type` int(11) NOT NULL,
  `place_address` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `publish_date` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sell_buy_places`
--

INSERT INTO `sell_buy_places` (`id`, `publisher_id`, `place_name`, `place_type`, `place_address`, `place_desc`, `status`, `publish_date`, `featured`) VALUES
(3, 8, 'شقة بالدور الارضى', 2, 'العباسية', 'شقة بالدو الارضى تصل لعمل معمل', 1, '02-27-2018', 1),
(4, 8, 'شقة بالدور الارضى', 2, 'العباسية', 'شقة بالدور الارضى تصلح لمعمل تحليل<br>', 3, '02/27/2018', 1),
(7, 16, 'xxsx', 3, 'xsc', 'kkkkkk', 1, '03/27/2018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sickness_types`
--

CREATE TABLE `sickness_types` (
  `id` int(11) NOT NULL,
  `sickness_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sickness_types`
--

INSERT INTO `sickness_types` (`id`, `sickness_title`) VALUES
(1, 'أمراض الجهاز التنفسي'),
(2, 'أمراض الدم'),
(3, 'أمراض الأنف و الأذن و ألأحنجرة'),
(4, 'أمراض الغدد الصماء');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `title`, `link`) VALUES
(1, 'facebook', 'www.facebook.com/abdellah.gaballah'),
(2, 'twitter', 'www.twitter.com'),
(3, 'linkedin', 'www.linkedin.com'),
(4, 'google plus', 'www.google.plus.com');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity_sold` int(11) NOT NULL,
  `firm_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `medicine_id`, `quantity_sold`, `firm_id`, `created_at`, `updated_at`) VALUES
(3, 1, 80, 6, '2018-05-28 10:26:11', '2018-05-28 10:26:11'),
(4, 1, 70, 6, '2018-05-28 12:41:16', '2018-05-28 12:41:16'),
(5, 1, 60, 6, '2018-07-02 12:24:53', '2018-07-02 12:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `title`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'vfvffgdfuuuuuuuuuu', '1526207867.jpg', 4, '2018-05-13 08:37:47', '2018-05-13 08:37:47'),
(6, 'wwwwwwwwwww', '1526210354.jpg', 3, '2018-05-13 09:19:14', '2018-05-13 09:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_abroad`
--

CREATE TABLE `treatment_abroad` (
  `id` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treatment_abroad`
--

INSERT INTO `treatment_abroad` (`id`, `hospital`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'الهلال التخصصى', 33, '2018-05-16 10:34:33', '2018-05-16 10:34:33'),
(3, 'kkk', 39, '2018-07-02 12:55:46', '2018-07-02 12:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_type` int(11) NOT NULL,
  `client_type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `u_country` int(11) NOT NULL,
  `u_governorate` int(11) NOT NULL,
  `u_city` int(11) NOT NULL,
  `u_address` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `image`, `phone`, `mobile`, `u_type`, `client_type`, `status`, `u_country`, `u_governorate`, `u_city`, `u_address`, `password`, `remember_token`, `api_token`, `confirmed`, `confirmation_code`, `admin`, `paid`, `created_at`, `updated_at`) VALUES
(5, 'abdellah@corpy.net', 'abdellah', '', '863815', '', 3, 0, 1, 1, 6, 1, '', '$2y$10$lpx7JvHTLwg/c2jSYztTgOs2Pv2pnpAP8ClAcnDbTavBB9L9CvWmC', 'BwvjxIz8lVkpwVtKCkiaPX4eaWVaGBSIz4gBDaREhjxAhwniOyL4ijqVm05x', NULL, 1, '5nyL23V8vppI4KlUPOUHgbpObVAV64', 1, 0, '2018-01-30 11:34:16', '2018-01-30 11:34:16'),
(6, 'nahla.hani@corpy.net', 'FRD', '', '032424244', '01202336623', 5, 0, 1, 1, 6, 1, 'Egypt, Cairo', '$2y$10$Cq/tX7rZAstBHIHlBJd9puBGvDOutiJ8yvwSbhDiwFYc6zeYbWoT2', 'KpegoKuTZHhLYMPX4hQNAWUMoYlt7nI5BG2jw7jD4yQ9KMLdNncSw6bnLvjE', NULL, 1, 'uVPvvp41lgVwm1ioitAhQP3psEeL39', 0, 0, '2018-01-30 12:07:34', '2018-01-30 12:07:34'),
(8, 'sohila.khaled@corpy.net', 'Sohila', '', '01332424422', '01242463555', 4, 0, 1, 1, 6, 2, 'Egypt, cairo', '$2y$10$pHMbM/x9SESJO8p/d1KjLuKFhFr8tSbkJNd2ZudOLMAPyCQvy/3NO', 'tRufsYd9jzYNCqmKftAJJrrpdGmCllWgOoZjStDow75fkMAnDmv6fRI4Ql8U', NULL, 1, 'vPbpwPU3NC5MtzjGChi0RE9Y9rTu7S', 0, 1, '2018-01-30 12:15:27', '2018-01-30 12:15:27'),
(12, 'mohamed.ragab@corpy.net', 'mohamed', '', '863815', '', 3, 1, 1, 1, 3, 5, '', '$2y$10$QzPML1YicK8PJHuYNysWne6oMBtAw/w.Gp.F3O8Mob5rncBDRdZYa', 'Q4S8XV4u2UfqGnwSqWuuiFlscMcViNzgSRUU7LxO8YVjkGnuOEAG1Uf6flXa', NULL, 0, 'XpkoEyFhRZtafV07xsTBIJCraShoKS', 0, 0, '2018-01-31 07:44:24', '2018-01-31 07:44:24'),
(13, 'test1@gamil.com', 'test', '', '06381543878', '01212728377', 3, 1, 1, 1, 6, 2, 'cairo ,egypt', '$2y$10$LoTDh.fOw5dBU/.Mktbpfe44rw8C8VjU/r0LHwyhzajL4sgh4gXde', 'gn6RyUWbYIejIeKeVsVOBYzmGPDgnyYorfyUbp6KEb0rY1uY6Xgpz0GvaAIJ', NULL, 0, 'WlNTvLZPPbs49pJR89WsbPcyl7RfER', 0, 0, '2018-02-15 12:25:51', '2018-02-15 12:25:51'),
(14, 'tamer@gmail.com', 'tamer', '', '88327', '55502', 3, 1, 1, 2, 6, 6, 'cairo, Egypt', '$2y$10$3cPnVAR2.nk/dOMNQojZ/exSRuyrVkl.JZqh8Cz1fCNMQsNjOdl5u', 'GE6wmcI9h4afCz6jO5NqStMGIPfYMQsQPMlqW2N4zaIvzS6fSkBlBYtMixE9', NULL, 1, 'i4c3EAKRRYRPN9ffF9ZMbp02r1GaD8', 0, 0, '2018-02-18 06:53:04', '2018-02-18 06:53:04'),
(16, 'pharm@gmail.com', 'pharm', '', '012525532665', '02543256532', 4, 0, 1, 1, 6, 1, 'cairo ,egypt', '$2y$10$/ZsCbAEky8yIVp8p5je4SuXVOfqAmN5mC75hqZ/YN5VLXjc1wziby', 'ZxerHm2MjBrQFNK9S8t7tbMbvwDjSXptQahyjHRzHjvE44zsu2zFb1HZE8Ap', NULL, 1, 'Fp2DVCv78UooYBjzL4uUM6rF41Yoa4', 0, 1, '2018-02-21 12:36:16', '2018-02-21 12:36:16'),
(18, 'test@gmail.com', '11test', '', '88327732', '02131552562', 5, 0, 1, 1, 11, 3, '20 عادل حسين رستم ,الدقى,الجيزة', '$2y$10$rR4bVeFlfBMy9p30zKPGyOO/73bHPeQ4CfDqYYWXeNr6VbVGt4fI6', 'ljCsLSX1jOu0UGHNXsPrOyzAbCfNp1N2ENk0tHAt3KXRs2NIdvMJHDZ4MQcl', NULL, 0, 'Yj6yU3ErMC21t5dYNriKOuLNXnndR7', 0, 0, '2018-02-26 07:33:59', '2018-02-26 07:33:59'),
(19, 'doc@gmail.com', 'doctor', '', '012345', '01345', 3, 3, 1, 1, 6, 3, '3adl hussien rostom', '$2y$10$zHl/ge2/GxmEFbKGeNpt/OCoVL6NdCNcjtJBszN0o0sdj8.y5IMqO', 'qf8qNPbXvQGNcDoPKg494nLSoucffLyBdqq7Bu8dVAfK8fgMcZHwQ0oXfXPA', NULL, 1, 'PYeIoqwlw4cKhgQQwIXJhBfDvzPgwO', 0, 0, '2018-04-03 13:36:41', '2018-04-03 13:36:41'),
(25, 'hager.ibrahim@corpy.net', 'hager', '1526821468.png', '0123456', '4535', 3, 3, 1, 1, 6, 2, 'duki', '$2y$10$pvUT1D8/cPUnh86pfnNzDuGYhbOSv435RgLxvo4L79X3wfJT/CEIe', 'FGV86drUZ4Yvc94fN6zqWNbCBRIuZFvbBTUtQiM47l3jI27MH0jjjceKpo4M', NULL, 1, 'kBiDjC5Ltsy13yauHmmpm9uIa5YPRg', 0, 0, '2018-04-05 08:25:02', '2018-04-05 08:25:02'),
(28, 'sami@corpy.net', 'sami', '', '1234', '4535', 3, 4, 1, 2, 2, 1, 'asdasd', '$2y$10$42lmAq8gO49OQVqLbEm7jOfUoHzBzwD1ingrLafp83jrnQCRKGDMO', NULL, NULL, 1, '5kBdHZowtJaRNvMjeo6UZl7MES7xxX', 0, 0, '2018-04-05 08:29:46', '2018-04-05 08:29:46'),
(29, 'yasser@gmail.com', 'yasser', '', '0123456', '4535', 3, 4, 1, 1, 6, 1, 'asdasd', '$2y$10$VZQ1ygsTkMT18Ynx5DNjgeTe1JC.1GCMauxHoLL38AUANO22gJe6m', 'nBjQtkMv6vUkgSsneZgkDElxEZBd8FhwYv7vAaDibb5NE8CE31l8Pq6qBTDp', NULL, 1, '4qEjWyqKpwV4fPcAiZJJ3OXFKlx3o6', 0, 0, '2018-04-05 08:32:23', '2018-04-05 08:32:23'),
(31, 'mazen@yahoo.com', 'mazen', '', '0123456', '4535', 2, 0, 1, 1, 2, 1, 'duki', '$2y$10$RH7q2d22//WOogPnyY6w9Oe5nrBYJYpT4.hbLLLMsY.HZHEXLuV0S', NULL, NULL, 0, 'cpSXNvuO9o3azA1N6SCmEfPJ16rZbm', 0, 0, '2018-04-22 13:38:57', '2018-04-22 13:38:57'),
(32, 'admin@yahoo.com', 'admin', '', '0123456', '4535', 1, 0, 1, 1, 2, 1, 'duki', '$2y$10$/GIGJFsCKbB334jjgzSZm.fpAdIGaAV8Y3tsqw8Uuu4CBoXB.AuNm', NULL, NULL, 0, '4i5V6mDigxtlsQ87hisUN2shO7VoC7', 0, 0, '2018-04-22 13:39:44', '2018-04-22 13:39:44'),
(33, 'menna@yahoo.com', 'menna', '', '123', '123456', 6, 0, 1, 1, 6, 3, 'duki', '$2y$10$te.FzesJg8TpeAKuowXUMehXvAUFrcM1j3aNBtrZ6gLr6QDeeFbRq', 'xwPmTyuJqKE2fetydqY7b32o4Aw0GdUa4IwdYm97x05KaeHbOX3EPWl6yVK9', NULL, 1, 'fk83X8AdBH21LIwgaPuCq65CkcyumA', 0, 0, '2018-05-16 10:34:33', '2018-05-16 10:34:33'),
(36, 'www@fhh.vom', 'www', '1526821468.png', '1234', '4535', 3, 1, 1, 1, 6, 2, 'duki', '$2y$10$HrJcArQZPKENs.lxZ/E8LejEy25BwGt1uyLDoLRzpV9tsGwSBfsUm', NULL, NULL, 0, 'lFoDyKrL57AwOtW6Bvs8mfcInBNoF7', 0, 0, '2018-05-20 11:04:28', '2018-05-20 11:04:28'),
(38, 'hager.ibrahim@corpy.net', 'weza', '1530093354.png', '1234', '4535', 3, 1, 1, 1, 6, 2, 'duki', '$2y$10$MAcWkw0HMXCbLxoVxoaXr.0AjHpfxhJLx.Zwojn6Ggi6lLI7BuE6.', NULL, NULL, 1, '5EIuOlbfDvyoIPEZ7GumsNbe3yBDDm', 0, 0, '2018-06-27 07:55:54', '2018-06-27 07:57:17'),
(39, 'hesham@yahoo.com', 'hesham', '1530543346.png', '1234', '121', 6, 0, 1, 1, 6, 1, 'hgshdjag', '$2y$10$SPTq3Osb2GDGVQeTLzhiGOQd/t.wzk1ESV1Org8RpcC.4HlzkAUqG', 'mPOXVCMV5pLfBQYL1ddpwSWDeNzoIQnm7cBrWTMPRxU3fU74Oe5PpUXgmKiM', NULL, 1, 'hfw1QwLsDmzGKGVcftVsb3qezyxF0T', 0, 0, '2018-07-02 12:55:46', '2018-07-02 12:55:46'),
(48, 'hazem_3ly@yahoo.com', 'hazaem', 'xHuu0RulGh.png', '123456', '123456', 3, 2, 1, 1, 1, -1, 'asasa', '$2y$10$xJkHcfOkN3p8afm0Ph5Vm.HL4zwQV7KDkkMxEytbgO0NScq7oVgmW', NULL, NULL, 0, 'D2GJSSMHZoHutsDlXAOjnuBagQcVIH', 0, 0, '2018-09-16 12:27:55', '2018-09-16 12:27:55'),
(49, 'hazem.alia@corpy.net', 'tst2', 'qOiFlghOgN.png', '0123456789', '0123456', 1, 1, 1, 1, 1, 1, '20 st Doki', '$2y$10$nEIoKs9ykI4qzcJmfh9Dpe5J4XcHxMQOdkCrIlzpUmp/7SuclyYPy', NULL, NULL, 0, 'tk6It7scAsAmdhtIgsuI6ApHsgfhHo', 0, 0, '2018-09-16 13:11:44', '2018-09-16 13:11:44'),
(50, 'hazem.al@corpy.net', 'tst23', 'P7Uc0FXDz4.png', '0123456789', '0123456', 1, 1, 1, 1, 1, 1, '20 st Doki', '$2y$10$1CAl4TxWZvvdSJQxkxV9e.ZRA/R24jQp8mnqR8kEq4w4CcB0gXKy.', NULL, NULL, 0, 'rzziyo1xBC53DoeeKqA4O2VueSz41a', 0, 0, '2018-09-16 13:12:25', '2018-09-16 13:12:25'),
(51, 'hazem.ali22@corpy.net', 'hazem', 'p96T0DsD9v.png', '123456', '123456', 3, 2, 1, 1, 1, -1, '22', '$2y$10$Gtgi4KZXRbpZwzVmOmfiAOseQy9CyEDxsj3EwzeSSbRT2u93QA46i', 'tjuURpXnxvj8lrpThgp0XEFI9IddEoFzn06yC8pJTWIMDiro4EBoFl1nQ0nw', 'qEyU4O4Z5d2jNzJ95aTMqF7hoV1jqcLHvFB1VvgBSiPOFmwMRv1XRt76awM4', 1, 'giuOw01EkOFl4A6V7hYQCip2fX61yP', 0, 0, '2018-10-01 08:09:52', '2018-10-02 12:07:40'),
(52, 'hazem.ali@corpy.net', 'tst', '7EhmDSZ9SR.png', '0123456789', '123456', 1, 1, 1, 1, 1, 1, '20 st Doki', '$2y$10$u.trrD.kU7ha.in/2fFSc.R90VmCfYN6OHmYCIWk5p3lthpghE7oe', NULL, NULL, 0, 'IZqoAPW190hc7bE9HbVG0yUmZrd9al', 0, 0, '2018-10-01 09:08:33', '2018-10-01 09:08:33'),
(53, 'hazem.aliss@corpy.net', 'tstt', 'yyDTCubHKF.png', '0123456789', '123456', 1, 1, 1, 1, 1, 1, '20 st Doki', '$2y$10$pDQGRR852lG97M/.MfCg5.DwqnRrPd/ybjmUCT.xBrud9U7PJ6ane', NULL, NULL, 0, 'DaYVIJ0zdPiuUDfYgyjjQ7p92Fcq6t', 0, 0, '2018-10-01 09:22:37', '2018-10-01 09:22:37'),
(54, 'hazem.alqi@corpy.net', 'tstq', 'wDvdLyxhLE.png', '0123456789', '123456', 1, 1, 1, 1, 1, 1, '20 st Doki', '$2y$10$j.u0FvoWGoxOU9iVh4.FXugZtLj4.wReZws0L3sZ9q3c2CegOHtQu', NULL, NULL, 0, 'VtnJjfDF8hjkmiB5eCsa7oI7g4Dvfk', 0, 0, '2018-10-01 09:22:59', '2018-10-01 09:22:59'),
(55, 'karimhelmy61@yahoo.com', 'karim', NULL, '01126878406', '01122225564', 4, 0, 1, 1, 1, 1, 'jjjjjjjjjjjjjjjjjjjjjj', '$2y$10$g3mfJyR109TvAGq39RO5hOPy3jqfbNEfs159Bf8XRccWxfPWh6Sa.', 'nm5mRyflDE3iD5knarjn13f9sopfEtIqW7uIeserPkPzIz1GuDd11Ukmd1HP', NULL, 0, 'SL3THqTwwYMq3ZcGcCWLEdWXmJpMwe', 0, 0, '2018-10-01 10:07:13', '2018-10-02 11:15:45'),
(56, 'zzzzzz@zzzzzz.zz', 'zzzzzzz', '90zbHAPAeD.png', '456', '456', 3, 1, 1, 1, 1, -1, 'asd', '$2y$10$zHrdROmzDGbPLtzuEcEQw.4PAxr0t8GqP8kaypLqBx9F1k40mhrQe', NULL, NULL, 0, 'QqV2h2M7zin8ClpCBBhmX3aoRlHtI7', 0, 0, '2018-10-01 11:07:31', '2018-10-01 11:07:31'),
(57, 'karimhelmya61@yahoo.com', 'karima', NULL, '01126878406', '01122225564', 4, 0, 1, 1, 1, 1, 'jjjjjjjjjjjjjjjjjjjjjj', '$2y$10$JT9x2Cvs9OE2b8ajG6aEv.rlUHrVkf0Sa8sAbsc7Ql1F1F0GZjwlm', NULL, NULL, 0, 'zKIOWkMuQodPGyDS5604ollmzZHo3W', 0, 0, '2018-10-01 12:06:29', '2018-10-01 12:06:29'),
(58, 'brazzers@yahoo.com', 'jasmine james', NULL, '0121212455', '01122225564', 4, 0, 1, 1, 1, 1, 'jjjjjjjjjjjjjjjjjjjjjj', '$2y$10$r6TNX7kAnvREsmQPU1/Nve.jR3r0nxhxcQ.OQdgqYFmlbf5.2CU5K', NULL, NULL, 0, 'GI1XndApy5Xt2aeGPc5viOlccdlzJR', 0, 0, '2018-10-02 08:14:35', '2018-10-02 08:14:35'),
(59, 'asd@asd.asd', 'asd', NULL, '123456', '123456', 4, 0, 1, 1, 1, -1, 'asdasd', '$2y$10$kP3.jRa1KowH2iYjmY0zUOF2uyeRJT8sT54kG3mXHDAlIgGbvaGOa', 'da3CGcGlfxMbl5X69BPVeHpzPoPxPzuVMi8jAE3pr1TmiKYB3rZYIn7MvJ3H', 'bJAMGRZeMq5Zo8lqQyZNWJef9kxpqhN6TRejK9ddmiwjpCAX7v2pd465bbrO', 0, 'VE9po4in424vhNLBcJdm9yVdbABCcz', 0, 0, '2018-10-02 08:58:38', '2018-10-02 11:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `u_types`
--

CREATE TABLE `u_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `u_types`
--

INSERT INTO `u_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'editor', NULL, NULL),
(3, 'client', NULL, NULL),
(4, 'pharmacy', NULL, NULL),
(5, 'firm', NULL, NULL),
(6, 'backend', NULL, NULL),
(7, 'hospital', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `veterinary_medicine`
--

CREATE TABLE `veterinary_medicine` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `veterinary_medicine`
--

INSERT INTO `veterinary_medicine` (`id`, `admin_id`, `title_id`, `question`, `answer`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 'dsdsdsd', 'fdsfdsfds', NULL, '2018-05-13 11:32:58', '2018-05-13 11:32:58'),
(3, 1, 3, 'wwwwwwwww', 'wwwwwww', NULL, '2018-05-13 11:32:58', '2018-05-13 11:32:58'),
(4, 1, 3, 'fddfdsf', 'fsdfdfds', NULL, '2018-05-13 11:42:57', '2018-05-13 11:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `admin_id`, `title`, `video_url`, `updated_at`, `created_at`) VALUES
(2, 1, 'gggggggggggfgfgdfg', 'https://www.youtube.com/embed/eBAipkjCit8', '2018-05-13 12:33:52', '2018-05-13 12:33:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ask_doctors`
--
ALTER TABLE `ask_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ask_doctor_comments`
--
ALTER TABLE `ask_doctor_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_types`
--
ALTER TABLE `client_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_diseases`
--
ALTER TABLE `common_diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cure2us_offer`
--
ALTER TABLE `cure2us_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_paids`
--
ALTER TABLE `cv_paids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals_types`
--
ALTER TABLE `deals_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_asks`
--
ALTER TABLE `doctor_asks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs_foods`
--
ALTER TABLE `drugs_foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excess_medicines`
--
ALTER TABLE `excess_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firms_medicines`
--
ALTER TABLE `firms_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firms_offers`
--
ALTER TABLE `firms_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firm_types`
--
ALTER TABLE `firm_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_clinics`
--
ALTER TABLE `home_clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_clinic_comments`
--
ALTER TABLE `home_clinic_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_files`
--
ALTER TABLE `medical_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines_types`
--
ALTER TABLE `medicines_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicin_reactives`
--
ALTER TABLE `medicin_reactives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacys`
--
ALTER TABLE `pharmacys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_types`
--
ALTER TABLE `place_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_excess_medicines`
--
ALTER TABLE `request_excess_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_medicins`
--
ALTER TABLE `request_medicins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_medicins_pharm_firms`
--
ALTER TABLE `request_medicins_pharm_firms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_offers`
--
ALTER TABLE `request_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_buy_places`
--
ALTER TABLE `sell_buy_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sickness_types`
--
ALTER TABLE `sickness_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment_abroad`
--
ALTER TABLE `treatment_abroad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_types`
--
ALTER TABLE `u_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veterinary_medicine`
--
ALTER TABLE `veterinary_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ask_doctors`
--
ALTER TABLE `ask_doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ask_doctor_comments`
--
ALTER TABLE `ask_doctor_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `client_types`
--
ALTER TABLE `client_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `common_diseases`
--
ALTER TABLE `common_diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cure2us_offer`
--
ALTER TABLE `cure2us_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cv_paids`
--
ALTER TABLE `cv_paids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deals_types`
--
ALTER TABLE `deals_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_asks`
--
ALTER TABLE `doctor_asks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc_type`
--
ALTER TABLE `doc_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drugs_foods`
--
ALTER TABLE `drugs_foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `excess_medicines`
--
ALTER TABLE `excess_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `firms`
--
ALTER TABLE `firms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `firms_medicines`
--
ALTER TABLE `firms_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `firms_offers`
--
ALTER TABLE `firms_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `firm_types`
--
ALTER TABLE `firm_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `home_clinics`
--
ALTER TABLE `home_clinics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `home_clinic_comments`
--
ALTER TABLE `home_clinic_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medical_files`
--
ALTER TABLE `medical_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines_types`
--
ALTER TABLE `medicines_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicin_reactives`
--
ALTER TABLE `medicin_reactives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pharmacys`
--
ALTER TABLE `pharmacys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `place_types`
--
ALTER TABLE `place_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_excess_medicines`
--
ALTER TABLE `request_excess_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `request_medicins`
--
ALTER TABLE `request_medicins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_medicins_pharm_firms`
--
ALTER TABLE `request_medicins_pharm_firms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request_offers`
--
ALTER TABLE `request_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sell_buy_places`
--
ALTER TABLE `sell_buy_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sickness_types`
--
ALTER TABLE `sickness_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `treatment_abroad`
--
ALTER TABLE `treatment_abroad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `u_types`
--
ALTER TABLE `u_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `veterinary_medicine`
--
ALTER TABLE `veterinary_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
