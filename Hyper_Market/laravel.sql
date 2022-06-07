-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 09:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(100) NOT NULL,
  `buliding` varchar(100) NOT NULL,
  `floor` int(50) NOT NULL,
  `flat` int(8) NOT NULL,
  `notes` longtext DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `buliding`, `floor`, `flat`, `notes`, `user_id`, `region_id`, `created_at`, `update_at`) VALUES
(1, '24', ' block 8', 45, 5, NULL, 2, 2, '2022-02-18 22:02:14', '2022-02-18 22:02:14'),
(2, 'street', '5', 3, 2, NULL, 1, 1, '2022-02-18 22:02:14', '2022-02-18 22:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(2, 'john', 'Johnyousssef32@gmail.com', '01119023851', '2022-03-01 03:30:26', '$2y$10$yXev5P8JgEQxRSu/sHR7/ugdP2d/Y1NJXfEjPP1Mve4NGnPXrCaUq', 'wOGxL7Tqn8AXRvn8Cceu3rZ0ZhydTUIGGEdk0uJ2xWPTUrTeZurf2ID0COZT', '2022-03-01 03:30:26', '2022-03-01 03:30:26', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT ' 0=> exist   1-=>brand not exist',
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_ar`, `name_en`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'سامسونج', 'Samsung', 1, 'samsung.png', '2021-11-18 09:10:26', '2021-11-18 09:10:26'),
(2, 'ديل', 'DELL', 1, 'dell.png', '2021-11-18 09:10:26', '2021-11-18 09:10:26'),
(3, 'لينوفو', 'Lenovo', 1, 'lenovo.png', '2021-11-18 09:10:26', '2021-11-18 09:10:26'),
(4, 'ابل', 'apple', 1, 'apple.png', '2021-11-18 09:10:26', '2021-11-18 09:10:26'),
(5, 'oppo', 'oppo', 1, 'oppo.png', '2021-11-24 04:57:47', '2021-11-24 04:57:47'),
(6, 'lg', 'lg', 1, 'lg.png', '2021-11-24 04:57:47', '2021-11-24 04:57:47'),
(7, 'HP', 'HP', 1, 'hp.png', '2022-02-23 09:24:06', '2022-02-23 09:24:06'),
(8, 'ASUS', 'ASUS', 1, 'asus.png', '2022-02-23 09:24:06', '2022-02-23 09:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(3) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `status`, `created_at`, `updated_at`) VALUES
(20, 'ادوات كهربائية', 'electorinics', 1, '2021-11-17 10:05:23', '2021-11-17 10:10:48'),
(32, 'مطبخ', 'kitchen', 1, '2021-11-18 09:54:51', '2021-11-18 09:54:51'),
(33, 'سوبرماركت', 'supermarket', 1, '2022-02-23 07:26:47', '2022-02-23 07:26:47'),
(34, 'موضة وازياء', 'fashion', 1, '2022-02-23 07:26:47', '2022-02-23 07:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT ' 0=>no charge , 1=>has charge',
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_ar`, `name_en`, `status`, `region_id`, `update_at`, `created_at`) VALUES
(1, 'مدينة نصر', 'Nasr city', 1, 1, '2022-02-18 21:56:33', '2022-02-18 21:56:33'),
(2, 'الزقازيق', 'zagazig', NULL, 2, '2022-02-18 21:56:33', '2022-02-18 21:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double UNSIGNED NOT NULL,
  `code_expired_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name_en`, `name_ar`, `email`, `phone`, `type`, `salary`, `code_expired_at`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rupert Kuhlman', 'Prof. Charles Crona DDS', 'jewel.leuschke@example.net', '01119023851', 'Marketing', 2500.5, NULL, '2022-04-07 07:30:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TGPJ5IKBJS', '2022-04-07 07:30:08', '2022-04-07 07:30:08'),
(3, 'Mr. Devonte Bartoletti', 'Dr. Eudora Pouros', 'swill@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'R5ies1XBlO', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(4, 'Destiney Olson', 'Breanna Grady', 'alayna.franecki@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'utWd6ZMcBe', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(5, 'Haylee Hudson', 'Mrs. Sallie Aufderhar Sr.', 'bednar.archibald@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aWX2t3K4Pf', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(6, 'Prof. Marc Boyle PhD', 'Caden Langosh', 'arianna77@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i2BggmNsDi', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(7, 'Caleb Bahringer', 'Durward Collins', 'huel.jasen@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JRFG8aWyfR', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(8, 'Dr. Yasmin McCullough', 'Alfredo Goldner', 'alverta.frami@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mWeUG91hsP', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(9, 'Prof. Nick Adams', 'Prof. Walton Bergstrom I', 'kiley05@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'W7gIxrLHgv', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(10, 'Jaylin Reichert', 'Kole Heidenreich IV', 'vonrueden.adah@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5L0qA4okz7', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(11, 'Arvilla D\'Amore', 'Scarlett Morar PhD', 'scot74@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '39lIkbdJzM', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(12, 'Rhianna Weber', 'Norberto Nolan', 'abner.crona@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bdhtHhueT8', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(13, 'Prof. Porter Predovic Jr.', 'Dr. Guido Macejkovic', 'kuhlman.courtney@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Wio9qjss76', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(14, 'Mr. Justyn Schiller', 'Johnathon Davis', 'sincere.wisozk@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MYZG4vuRgI', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(15, 'Arnold Stanton', 'Malvina Hintz', 'chelsie.thiel@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zrWOUWP0NL', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(16, 'Prof. Reymundo Stiedemann DDS', 'Jaylen Ward', 'trath@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CysZwSsSET', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(17, 'Glen Farrell', 'Willard Gottlieb', 'wwillms@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dCOolfE7n5', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(18, 'Prof. Cale Reichert IV', 'Judah Witting V', 'darion94@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '010VI0SBGV', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(19, 'Larry Ritchie', 'Candido Muller', 'estevan33@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ng5g03FtDf', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(20, 'Leonel Grant', 'Armani Vandervort', 'ottilie90@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'j9yKBHjy3Y', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(21, 'Issac Ledner', 'Owen Reynolds', 'hturcotte@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OpmO6BV9ym', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(22, 'Mr. Donald Batz V', 'Effie Johnston', 'kohler.trycia@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KCiwFuiVhs', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(23, 'Korbin Emmerich', 'Lorine Purdy', 'vernie.nolan@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XYEreyFyTl', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(24, 'Leone Farrell DDS', 'Glenda Jacobi', 'malcolm.schuppe@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pnnQLmmRdG', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(25, 'Prof. Friedrich Mohr', 'Paris Schinner IV', 'savanah90@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NhjyB49heS', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(26, 'Prof. Timothy Abshire I', 'Gillian Satterfield DDS', 'asa00@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eW2P7bstw2', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(27, 'Prof. Lane Schneider DDS', 'Jennifer Reinger II', 'pwehner@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mdAXWfUUlm', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(28, 'Miss Lilian Huels', 'Dr. Deonte Klein', 'bernhard.jayson@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rmqeF4kxZU', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(29, 'Maximus Treutel', 'Ms. Lenore Wiegand', 'omari.harber@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BQ6RJXT49I', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(30, 'Sage Conn', 'Sydnee Ryan', 'goldner.isabel@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ogeLNCiefD', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(31, 'Lawrence Welch', 'Durward Schinner', 'anastasia.wolff@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rxVjRpbFze', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(32, 'Tyson Swaniawski', 'Elenora Feeney', 'sandy.stroman@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 's4HVE2R4yM', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(33, 'Lempi Rogahn Jr.', 'Halie Schultz', 'asauer@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '84VKodmvty', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(34, 'Dr. Jacynthe McLaughlin', 'Dolores Flatley III', 'jlarkin@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3kZCAbrX2K', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(35, 'Frederic Mante Sr.', 'Emmett Simonis MD', 'mwuckert@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rqNeFX7Pes', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(36, 'Mr. Ray Becker IV', 'Prof. Arnoldo Mayer Sr.', 'collins.marietta@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Bb8mYkv5LA', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(37, 'Ms. Pasquale Vandervort MD', 'Myrtie Kreiger', 'laury.littel@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9x5gQUfJty', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(38, 'Paxton Kilback', 'Beaulah Kreiger', 'ritchie.shirley@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NCcXMzszJq', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(39, 'Shanie Mann Jr.', 'Dangelo Schimmel', 'orlo54@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6YqSy5Vt93', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(40, 'Alexandra Dickens', 'Karen Bauch', 'fvon@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DmuuXMeJ7V', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(41, 'Miss Renee Wolff III', 'Jamaal Keebler', 'macejkovic.carlotta@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'D3jus1tfeB', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(42, 'Prof. Makenna Hermann Jr.', 'Minerva Gleichner', 'chauncey.tillman@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'brPMYVDSa3', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(43, 'Dr. Thurman Brown PhD', 'Nora Konopelski', 'chaim.mcclure@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'O4mYCD7Cis', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(44, 'Rodolfo Schowalter', 'Alessia Conroy DVM', 'marquise.marquardt@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cRMKVyX7qy', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(45, 'Prof. Pasquale Gislason IV', 'Geovany Gaylord', 'jerad50@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WUgaQEsLo1', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(46, 'Kaley Ankunding', 'Kylie Christiansen', 'tmonahan@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gpceO4WhQb', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(47, 'Maximillian Wyman', 'Roosevelt Roberts', 'oroberts@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WQcBjIDtEc', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(48, 'Mr. Wilber Kunze DVM', 'Dovie Raynor', 'veronica08@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'obqFDPE9fL', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(49, 'Santa Lebsack', 'Mr. Clifton Bins', 'jwolf@example.org', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OC4bFqULlo', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(50, 'Carleton Ruecker', 'Carleton Torp', 'enolan@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3HcOT6kRRM', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(51, 'Myra Hills', 'Joanne Aufderhar', 'dmueller@example.net', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gkYy6sBYoe', '2022-04-07 07:32:22', '2022-04-07 07:32:22'),
(52, 'Dr. Keira Dickinson', 'Mabel Douglas', 'aglae.jakubowski@example.com', NULL, 'Marketing', 2500.5, NULL, '2022-04-07 07:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '14Di0H6fQA', '2022-04-07 07:32:22', '2022-04-07 07:32:22');

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
(5, '2022_02_28_114939_create_admins_table', 1),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(7, '2022_03_02_171049_create_sessions_table', 2),
(8, '2022_04_07_085657_employees', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `title_ar` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `discount` int(3) NOT NULL,
  `discount_type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>numeric 1=> percentage',
  `end_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer_product`
--

CREATE TABLE `offer_product` (
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price_after_discount` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) DEFAULT 0 COMMENT '0=>bending 1=>chip  2=> on my way  3=>deliverd',
  `total_price` decimal(8,2) NOT NULL,
  `deliverd_data` timestamp NOT NULL DEFAULT current_timestamp(),
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `price` decimal(8,2) NOT NULL,
  `code` int(5) UNSIGNED NOT NULL,
  `quantity` int(4) DEFAULT 1,
  `image` varchar(100) NOT NULL,
  `des_ar` longtext NOT NULL,
  `des_en` longtext NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ar`, `name_en`, `status`, `price`, `code`, `quantity`, `image`, `des_ar`, `des_en`, `sub_category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(40, 'لابتوب', 'laptop', 1, '250.00', 12345, 1, '621f925f8ac1e.png', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, '2021-11-18 09:13:16', '2021-11-29 07:33:02'),
(41, 'a 50', 'a 50', 0, '4000.00', 321244, 1, 'a50.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 5, 1, '2021-11-18 09:13:16', '2021-11-24 05:18:24'),
(42, 'tv 55 inch', 'tv 55 inch', 1, '10000.00', 55525, 1, 'tv55.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 7, 4, '2021-11-18 09:13:16', '2021-11-29 07:33:40'),
(43, 'MacBook PRo', 'MacBook PRo', 1, '40000.00', 52524, 2, 'mac.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 4, '2021-09-22 04:07:40', '2021-11-29 07:33:28'),
(44, 's21', 's21', 1, '15000.00', 123213, 10, 's21.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 5, 1, '2021-09-22 04:07:40', '2021-11-24 04:54:58'),
(45, 'iphone 13', 'iphone 13', 1, '25000.00', 12525, 20, 'iphone13.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 5, 4, '2021-09-22 04:07:40', '2021-11-24 04:57:21'),
(46, 'Reno 6', 'Reno 6', 1, '10000.00', 4444, 5, 'reno.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 5, 5, '2021-09-22 04:07:40', '2021-11-29 07:33:20'),
(47, 'Lenovo Lapttop', 'Lenovo Lapttop', 0, '17000.00', 77545, 1, 'lenovo.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\nهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 3, '2021-09-22 04:07:40', '2021-11-24 04:58:02'),
(48, 'Dell Laptop', 'Dell Laptop', 1, '20000.00', 42424, 0, 'dell.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 2, '2021-09-22 04:07:40', '2021-11-24 04:58:07'),
(49, 'Lg TV', 'Lg TV', 1, '12000.00', 5545, 3, 'lg.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 7, 6, '2021-09-22 04:07:40', '2021-11-24 04:58:16'),
(50, 'Samsung Tv', 'Samsung Tv', 1, '15000.00', 7777, 7, 'samsung.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 7, 1, '2021-09-22 04:07:40', '2021-11-24 04:55:32'),
(51, 'Chepsi', 'Chepsi', 1, '10.00', 4247, 0, 'chepsi.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 9, NULL, '2021-09-22 04:07:40', '2021-11-24 09:30:49'),
(56, 'سامسونج 70', 'samsung a70', 1, '2500.00', 29112021, 5, 'a50.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 5, 1, '2021-11-29 06:21:36', '2021-11-29 06:21:36'),
(57, 'جبنة فيتا', 'feta cheese', 1, '5.00', 1100, 100, 'feta.png', 'تفاصيل', 'description', 11, NULL, '2022-02-23 09:11:17', '2022-02-23 09:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT ' 0=>nocharge   1=>has charge',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `update_at`) VALUES
(1, ' القاهره', 'cairo', 1, '2022-02-18 21:54:25', '2022-02-18 21:54:25'),
(2, 'الشرقيه', 'sharqia', 1, '2022-02-18 21:54:25', '2022-02-18 21:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT 0,
  `comment` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`product_id`, `user_id`, `value`, `comment`, `created_at`, `update_at`) VALUES
(42, 2, 5, 'mafe4 a7la mno', '2022-02-24 13:54:12', '2022-02-24 13:54:12'),
(44, 2, 5, 'a7la wa7ed', '2022-02-24 13:53:23', '2022-02-24 13:53:23'),
(44, 5, 3, 'bad product !!', '2022-02-24 13:24:48', '2022-02-24 13:24:48'),
(44, 23, 1, 'm4 hagebo tany', '2022-02-24 13:24:26', '2022-02-24 13:24:26'),
(45, 4, 5, '7betooo awiiii', '2022-02-24 13:13:47', '2022-02-24 13:13:47'),
(45, 5, 2, '8aly 3la fady', '2022-02-24 13:13:26', '2022-02-24 13:13:26'),
(45, 22, 4, '3gbny awii ', '2022-02-24 13:13:06', '2022-02-24 13:13:06'),
(45, 23, 3, 'gamed awii', '2022-02-23 20:44:54', '2022-02-23 20:44:54'),
(47, 23, 5, 'kwis', '2022-02-26 20:43:26', '2022-02-26 20:43:26'),
(48, 1, 4, 'tagrboo momtaza we 4rka 7lwa', '2022-02-24 13:24:10', '2022-02-24 13:24:10'),
(48, 4, 3, 'lazeazz', '2022-02-24 13:23:34', '2022-02-24 13:23:34'),
(48, 21, 4, 'good product', '2022-02-24 13:23:18', '2022-02-24 13:23:18'),
(48, 23, 5, 'laptop momtaz', '2022-02-24 13:22:58', '2022-02-24 13:22:58'),
(51, 2, 5, 'gamed gamed', '2022-02-24 13:54:44', '2022-02-24 13:54:44'),
(51, 22, 2, '4rka nsaba', '2022-02-24 13:22:37', '2022-02-24 13:22:37'),
(51, 23, 5, '3ard dah gameddd\r\n', '2022-02-24 13:22:13', '2022-02-24 13:22:13'),
(56, 1, 4, 'momtazzz', '2022-02-24 13:25:16', '2022-02-24 13:25:16'),
(56, 4, 3, '7lwwww', '2022-02-24 13:25:32', '2022-02-24 13:25:32'),
(56, 23, 5, 'mobile gamed', '2022-02-24 13:25:03', '2022-02-24 13:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ASz0r6kbwHoxoynh2zM2jCozPpgvNAlvblIfdGYS', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36 Edg/98.0.1108.62', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQ0tVUUpHdE9EOTdWZ1l1Z0dLdDZBZGRRUm96ZzRJR0R3UVZBTllOTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTY0NjIzNTAyMTt9czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR5WGV2NVA4SmdFUXhSU3Uvc0hSNy91Z2RQMmQvWTFOSlhmRWpQUDFNdmU0TkduUFhyQ2FVcSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkeVhldjVQOEpnRVF4UlN1L3NIUjcvdWdkUDJkL1kxTkpYZkVqUFAxTXZlNE5HblBYckNhVXEiO30=', 1646235096);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name_ar`, `name_en`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'لابتوبات', 'laptops', 'default.png', 1, 20, '2021-11-18 09:09:38', '2021-11-24 04:54:39'),
(5, 'موبايلات', 'mobiles', 'default.png', 1, 20, '2021-11-18 09:09:38', '2021-11-18 09:09:38'),
(6, 'كمبيوتر', 'desktop', 'default.png', 1, 20, '2021-11-18 09:09:38', '2021-11-18 09:09:38'),
(7, 'تلفزيونات', 'tv', 'default.png', 1, 20, '2021-11-18 09:13:41', '2021-11-18 09:13:41'),
(9, 'شيبسي', 'chepsi', 'default.png', 1, 33, '2021-11-24 04:56:26', '2021-11-24 04:56:26'),
(10, 'ادوات تجميل', 'makeup', '1.png', 1, 34, '2022-02-23 07:28:06', '2022-02-23 07:28:06'),
(11, 'جبن', 'cheese', 'cheese.png', 1, 33, '2022-02-23 09:11:01', '2022-02-23 09:11:01');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Miss Samara Beer', 'fgreenholt@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'XXPlcFypCU', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(2, 'Orval Block', 'yolson@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'SAxS8EMwNw', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(3, 'Bridgette Osinski', 'hodkiewicz.anne@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'WJpBfULYi6', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(4, 'Prof. Ambrose Considine PhD', 'oullrich@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'c01FnwswDG', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(5, 'Mrs. Melba Heaney', 'everette.thompson@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Yy9AjsnEzK', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(6, 'Shea Harvey DVM', 'schmidt.alfreda@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'm7l1KvxAJt', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(7, 'Ms. Kelli Okuneva DVM', 'glover.kian@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '0SF96VI4wW', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(8, 'Eldora Gorczany', 'uritchie@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'nDCqRorqyB', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(9, 'Spencer Ruecker II', 'maybell.frami@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'C9HTFbsYVo', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(10, 'Ms. Flo Wilderman III', 'parker.crist@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'GjK5Ol0rY0', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(11, 'Yoshiko Franecki', 'white.alison@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'BvorhLXIVp', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(12, 'Dereck Cartwright', 'damion48@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'jIfL9pF379', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(13, 'Ewell Kassulke', 'jkonopelski@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '5mD1gi61tW', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(14, 'Dr. Noelia Leuschke', 'kianna17@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'g9gwk6XYBt', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(15, 'Alicia Klein', 'strosin.herminia@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '9dLJcMqYnX', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(16, 'Mr. Zechariah Weber', 'feeney.mike@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '4L08pafCho', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(17, 'Cloyd Will', 'frunte@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'dR5JKMeA4o', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(18, 'Tianna Von', 'troy.dicki@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'pOqaiaiJaG', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(19, 'Miss Janelle Hahn', 'alyson62@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'eWcRvboK7B', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(20, 'Damaris Marquardt', 'hershel.dubuque@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'G8gNGHk6dP', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(21, 'Dr. Morgan Braun', 'xschiller@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'YGgMRwWvM4', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(22, 'Prof. Josefa Fahey', 'damore.cameron@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'fWdfLSCLGF', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(23, 'Prof. Kamille Nicolas', 'luther.wehner@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2GfnyUWZPn', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(24, 'Avery Cruickshank', 'citlalli.brekke@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ljpEXqbvwD', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(25, 'Mrs. Emie Ebert', 'tyree.miller@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'GUP8oZZixA', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(26, 'Van Dibbert PhD', 'romaine65@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'aCMbqXTAG7', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(27, 'Hosea Abbott', 'lesly.hane@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'BeUn6aRzwM', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(28, 'Vincent Parisian', 'onie.kub@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Q3a39vcf2g', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(29, 'Muhammad Weissnat', 'dangelo.donnelly@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'do8wNHjdcD', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(30, 'Granville Ernser', 'gottlieb.duncan@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ZtzlWb9ik9', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(31, 'Jerry Walter', 'herman.rusty@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'rWhSCnhFzW', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(32, 'Stanford Kertzmann', 'mann.molly@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'JpeGxCCuqZ', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(33, 'Paolo Buckridge I', 'carmen80@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'EYyh6S3yeP', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(34, 'Jaqueline Wolff', 'parisian.braxton@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'GDAwpRgwGd', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(35, 'Elmo Koepp DVM', 'dovie.fisher@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'bdMFeEcpek', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(36, 'Mr. Lesley Green', 'antoinette24@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'o1XvdP0SSV', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(37, 'Jammie Metz', 'renee48@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vodTN6mWim', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(38, 'Rylan Abernathy', 'beverly01@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'lCt3zuFbAo', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(39, 'Karianne McLaughlin IV', 'kellie.adams@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'nlVksDtehM', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(40, 'Emory Franecki', 'urunolfsson@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'tySsOFHrrt', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(41, 'Jacklyn Morissette', 'elliott65@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'PiurAzLgPG', '2022-04-07 07:18:11', '2022-04-07 07:18:11'),
(42, 'Leslie Pouros', 'larue.schowalter@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '7h1itWtcSe', '2022-04-07 07:18:12', '2022-04-07 07:18:12'),
(43, 'Mrs. Barbara Jacobs IV', 'garrett54@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'kbWJ8bnsRM', '2022-04-07 07:18:12', '2022-04-07 07:18:12'),
(44, 'Magnus Wintheiser IV', 'lprice@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'GL4lZ1caZK', '2022-04-07 07:18:12', '2022-04-07 07:18:12'),
(45, 'Esta O\'Kon', 'brice97@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'cCdc1IFten', '2022-04-07 07:18:12', '2022-04-07 07:18:12'),
(46, 'Helena Abernathy', 'wilkinson.juvenal@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'onsBU5w7R6', '2022-04-07 07:18:12', '2022-04-07 07:18:12'),
(47, 'Maximilian O\'Hara', 'mkuvalis@example.org', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'h5x9UrBliX', '2022-04-07 07:18:12', '2022-04-07 07:18:12'),
(48, 'Harvey Kuvalis', 'meta.rosenbaum@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'x3drmrpmFx', '2022-04-07 07:18:12', '2022-04-07 07:18:12'),
(49, 'Florence Russel', 'ywilkinson@example.net', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'a0ltMRFtoW', '2022-04-07 07:18:12', '2022-04-07 07:18:12'),
(50, 'Sheila Tromp', 'iokon@example.com', '2022-04-07 07:18:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'K5FXeTMwV9', '2022-04-07 07:18:12', '2022-04-07 07:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_adderss_fk` (`region_id`),
  ADD KEY `user_address_fk` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD KEY `card_product-fk` (`product_id`),
  ADD KEY `card_user-fk` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_city_fk` (`region_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `employees_phone_unique` (`phone`) USING BTREE;

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
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_product`
--
ALTER TABLE `offer_product`
  ADD KEY `offer_product_id` (`product_id`),
  ADD KEY `offer_offers_id` (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_order_fk` (`address_id`),
  ADD KEY `coupon_order_fk` (`coupon_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `orders_order_products_fk` (`order_id`),
  ADD KEY `products_order_product_fk` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `brands_products_fk` (`brand_id`),
  ADD KEY `subcategory_products_fk` (`sub_category_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `product_review_fk` (`product_id`),
  ADD KEY `user_review_fk` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_subcategories_fk` (`category_id`);

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
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `wishlists-users_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
