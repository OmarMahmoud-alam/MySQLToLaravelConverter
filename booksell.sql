-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 02:46 PM
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
-- Database: `booksell`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`user_id`, `id`, `long`, `lat`, `created_at`, `updated_at`) VALUES
(1, 1, 31.6055666, 31.0990991, '2023-10-27 09:24:19', '2023-10-27 09:24:19'),
(1, 2, 31.6055666, 30.0990991, '2023-10-27 09:25:30', '2023-10-27 09:25:30'),
(2, 3, 31.6055666, 31.0990991, '2023-10-27 11:26:15', '2023-10-27 11:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `addresse_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `price` decimal(8,3) NOT NULL,
  `discription` text DEFAULT 'their No discription',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `addresse_id`, `name`, `author`, `status`, `price`, `discription`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'dark knight', 'margarita mix', 'مستعمل بحاله جيد', 20.000, 'it\'s a good book about dark knight fight bad gang that want to control the work', '2023-10-27 09:25:42', '2023-10-27 09:25:42'),
(2, 1, 2, 'رسائل سقطت من ساعي البريد', 'مش مه', 'مستعمل بحاله متوسط', 15.000, 'تحدث عن قصة عدده شخصيات ركبوا القطر', '2023-10-27 09:27:42', '2023-10-27 09:27:42'),
(3, 1, 2, 'سيلوجيات النمو للانسان', 'عالم عظيم', 'جديد', 30.000, 'النسخ الاول من الكتاب بحاله متوسط لا يوجد ورق مفقود', '2023-10-27 09:44:07', '2023-10-27 09:44:07'),
(4, 1, 2, 'الارض', 'يوسف الشريف', 'مستعمل بحاله جيد', 20.000, 'كتاب يحكي عن الفلاحين فى زمن الاحتلال الانجليزي', '2023-10-27 09:47:01', '2023-10-27 09:47:01'),
(5, 1, 2, 'الارض', 'يوسف الشريف', 'مستعمل بحاله جيد', 20.000, 'كتاب يحكي عن الفلاحين فى زمن الاحتلال الانجليزي', '2023-10-27 09:47:13', '2023-10-27 09:47:13'),
(6, 1, 1, 'احببت لاجئة', 'محمد المهد', 'جديد', 15.000, 'كتاب يحكي عن الفلاحين فى زمن الاحتلال الانجليزي', '2023-10-27 09:49:21', '2023-10-27 09:49:21'),
(7, 1, 1, 'فتاه الياقة الزرقاء', 'محمد النمس', 'جديد', 15.000, 'كتاب يحكي عن فتاه زات ياقة زرقاء', '2023-10-27 09:52:09', '2023-10-27 09:52:09'),
(8, 1, 2, 'قوة الثقة بالنفس', 'محمد الكاتب', 'جديد', 40.000, 'كتاب يحكي عن ثقة بالنفس مع عزه النفس لدي الانسان', '2023-10-27 09:54:34', '2023-10-27 09:54:34'),
(9, 1, 2, 'كيف تنشط ذاكرتك', 'محمد الكاتب', 'مستعمل بحاله متوسط', 35.000, 'كتاب يحكي عن ثقة بالنفس مع  تنشيط الذاكره', '2023-10-27 09:55:16', '2023-10-27 09:55:16'),
(10, 1, 1, 'الخروج عن النص', 'محمد العاقل', 'مستعمل بحاله متوسط', 30.000, 'روايه عن الكاتب العبقري الفز الى مفيش منه اتنين', '2023-10-27 09:56:31', '2023-10-27 09:56:31'),
(11, 2, 3, 'من سلسله تاريخ اسلامي', 'جرجي عثمان', 'مستعمل بحاله جيد', 20.000, 'كتاب عن تاريخ الاسلامي العام منهج اهل السنه', '2023-10-27 11:27:53', '2023-10-27 11:27:53'),
(12, 2, 3, 'شطرنج للجميع', 'عمر محمود', 'فاقد بعض الورق', 30.000, 'كتاب تعلم الشطرنج', '2023-10-27 12:42:54', '2023-10-27 12:42:54'),
(13, 2, 3, 'خروج عن النص', 'عمر محمد', 'فاقد بعض الورق', 35.000, 'احلى روايه سبب البيع عايز غيري يستمع بالروايه كمان', '2023-10-27 12:44:17', '2023-10-27 12:44:17'),
(14, 2, 3, 'شطرنج للجميع', 'ايةي', 'مستعمل بحاله جيد', 35.000, 'استني. بنب لا يمكن أن يكون فى طريق دفع بفودافون', '2023-10-27 12:59:44', '2023-10-27 12:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`book_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 4),
(4, 8),
(5, 4),
(5, 8),
(6, 1),
(6, 6),
(6, 7),
(7, 1),
(7, 6),
(7, 7),
(8, 2),
(8, 3),
(9, 6),
(9, 7),
(10, 6),
(10, 7),
(11, 5),
(11, 8),
(11, 9),
(12, 12),
(13, 12),
(14, 2),
(14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'رومانسي'),
(2, 'رعب'),
(3, 'روايات قصير'),
(4, 'روايات طويل'),
(5, 'قصص جيب'),
(6, 'اكشن'),
(7, 'غموض'),
(8, 'تاريخي'),
(9, 'دين'),
(10, 'فقه'),
(11, 'طبي'),
(12, 'هندسي');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) NOT NULL,
  `user1_id` int(10) UNSIGNED NOT NULL,
  `user2_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`) VALUES
(21, 2, 1, '2023-10-31 05:32:01', '2023-10-31 05:32:01'),
(32, 3, 2, '2023-10-31 06:54:44', '2023-10-31 06:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `place_link` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `startat` datetime NOT NULL,
  `endedat` datetime NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `name`, `place_link`, `discription`, `startat`, `endedat`, `online`, `created_at`, `updated_at`) VALUES
(1, 2, 'czxxx', 'xczxczxczxczc', 'csdcsdcsdcsdcsdd', '2023-10-06 16:20:23', '2023-10-06 16:20:23', 0, NULL, NULL),
(2, 5, 'dadasdasd', 'dasdsadsd', 'dasdasdasdada', '2023-10-06 16:20:23', '2023-10-06 18:20:23', 0, '2023-10-06 11:30:29', '2023-10-06 11:30:29'),
(3, 5, 'OmarEvents', 'dasdsadsd', 'dasdasdasdada', '2023-10-06 16:20:23', '2023-10-06 18:20:23', 0, '2023-10-06 11:31:02', '2023-10-06 11:31:02'),
(4, 5, 'OmarEvents', 'dasdsadsd', 'dasdasdasdada', '2023-10-06 16:20:23', '2023-10-06 18:20:23', 0, '2023-10-06 12:00:06', '2023-10-06 12:00:06'),
(5, 5, 'OmarEvents', 'dasdsadsd', 'dasdasdasdada', '2023-10-06 16:20:23', '2023-10-06 18:20:23', 0, '2023-10-06 12:00:10', '2023-10-06 12:00:10'),
(6, 5, 'OmarEvents', 'dasdsadsd', 'dasdasdasdada', '2023-10-06 16:20:23', '2023-10-06 18:20:23', 0, '2023-10-06 12:00:14', '2023-10-06 12:00:14'),
(7, 5, 'OmarEvents', 'dasdsadsd', 'dasdasdasdada', '2023-10-06 16:20:23', '2023-10-06 18:20:23', 0, '2023-10-07 16:02:16', '2023-10-07 16:02:16'),
(8, 5, 'anas fjf', 'dasdsadsd', 'dasdasdasdas', '2023-10-06 16:20:23', '2023-10-06 18:20:23', 0, '2023-10-08 14:12:57', '2023-10-08 14:12:57'),
(9, 5, 'anas fjf', 'dasdsadsd', 'dasdasdasdas', '2023-10-06 16:20:23', '2023-10-06 18:20:23', 0, '2023-10-09 12:19:07', '2023-10-09 12:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE `event_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_interests`
--

CREATE TABLE `event_interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('interset','comming') NOT NULL DEFAULT 'interset',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `messagechats`
--

CREATE TABLE `messagechats` (
  `sender_id` int(10) UNSIGNED NOT NULL,
  `reciever_id` int(10) UNSIGNED NOT NULL,
  `chat_id` int(10) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messagechats`
--

INSERT INTO `messagechats` (`sender_id`, `reciever_id`, `chat_id`, `message`, `created_at`, `updated_at`) VALUES
(2, 1, 21, 'rh', '2023-10-31 05:32:01', '2023-10-31 05:32:01'),
(3, 2, 32, 'hi', '2023-10-31 06:54:44', '2023-10-31 06:54:44'),
(3, 2, 32, 'how are you', '2023-10-31 06:55:04', '2023-10-31 06:55:04'),
(2, 3, 32, 'ok', '2023-10-31 06:55:39', '2023-10-31 06:55:39'),
(2, 3, 32, 'ok how about you', '2023-10-31 06:55:55', '2023-10-31 06:55:55'),
(3, 2, 32, 'I am good', '2023-10-31 06:59:02', '2023-10-31 06:59:02'),
(2, 3, 32, 'oh yes', '2023-10-31 07:00:05', '2023-10-31 07:00:05'),
(3, 2, 32, 'nonono', '2023-10-31 07:00:12', '2023-10-31 07:00:12'),
(2, 3, 32, 'ok', '2023-10-31 07:11:56', '2023-10-31 07:11:56');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_30_124028_create_categories_table', 1),
(6, '2023_09_30_164143_create_books_table', 1),
(7, '2023_09_30_165428_create_book_categories_table', 1),
(8, '2023_09_30_173659_create_ratings_table', 1),
(11, '2023_10_01_164514_create_favourites_table', 2),
(12, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(13, '2019_05_11_000000_create_otps_table', 4),
(16, '2023_10_05_133656_create_chats_table', 5),
(17, '2023_10_05_133712_create_messagechats_table', 5),
(18, '2023_10_06_115119_create_events_table', 6),
(19, '2023_10_06_115208_create_event_comments_table', 6),
(20, '2023_10_06_115231_create_event_interests_table', 7),
(21, '2023_9_29_164530_create_addresses_table', 8),
(22, '2023_10_07_140057_create_photos_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `validity` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `identifier`, `token`, `validity`, `valid`, `created_at`, `updated_at`) VALUES
(1, 'omar.freecourse@gmail.com', '569114', 60, 0, '2023-10-27 09:21:37', '2023-10-27 09:22:14'),
(2, 'test@g.com', '620032', 60, 0, '2023-10-27 10:09:04', '2023-10-27 10:09:18'),
(3, 'anas.allam567@gmail.com', '978023', 60, 0, '2023-10-31 06:49:14', '2023-10-31 06:49:48'),
(4, 'test1ssaa0@test.com', '518072', 60, 1, '2023-11-28 12:43:49', '2023-11-28 12:43:49'),
(5, 'test1ssasa0@test.com', '864159', 60, 1, '2023-11-28 12:44:22', '2023-11-28 12:44:22'),
(6, 'test1iisa0@test.com', '916067', 60, 1, '2023-11-28 13:07:19', '2023-11-28 13:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\User', 3, 'Personal Access Token', 'a8e830bb1bd850640ab5c3fd455a860ba944f6066231274100d47a2292028029', '[\"*\"]', '2023-10-31 07:01:53', NULL, '2023-10-31 06:49:13', '2023-10-31 07:01:53'),
(5, 'App\\Models\\User', 1, 'Personal Access Token', '2c186845794c388c6b36a8b22606a30b4ed3c9d46646bf8f4dee03d97068679f', '[\"*\"]', '2023-10-31 07:14:37', NULL, '2023-10-31 07:14:36', '2023-10-31 07:14:37'),
(6, 'App\\Models\\User', 1, 'Personal Access Token', 'c9a5fb1cfed84079e79b29e24ade6a4a1fb4283574aaa870f02e7d73ecdcadcb', '[\"*\"]', '2023-10-31 07:52:23', NULL, '2023-10-31 07:14:37', '2023-10-31 07:52:23'),
(7, 'App\\Models\\User', 4, 'Personal Access Token', '75b0c52d15882c34492d306efd850e03aaac15d2b3073cc0db83752f42460298', '[\"*\"]', NULL, NULL, '2023-11-28 11:34:53', '2023-11-28 11:34:53'),
(8, 'App\\Models\\User', 5, 'Personal Access Token', '1967976c606ba56f3b53b3902ca64760e3866441362f5d620bb4a832148ad655', '[\"*\"]', NULL, NULL, '2023-11-28 12:43:49', '2023-11-28 12:43:49'),
(9, 'App\\Models\\User', 6, 'Personal Access Token', 'c8491e8324cd3a9c21a59e067daebb538f75d721a90b36b35c783875b002afe4', '[\"*\"]', NULL, NULL, '2023-11-28 12:44:21', '2023-11-28 12:44:21'),
(10, 'App\\Models\\User', 7, 'Personal Access Token', 'e34d17fcdfb1afcf10f6342fd34c9b193e1574ff31271bd9f8162517f751f557', '[\"*\"]', NULL, NULL, '2023-11-28 13:07:19', '2023-11-28 13:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Photoable_type` varchar(255) NOT NULL,
  `Photoable_id` bigint(20) UNSIGNED NOT NULL,
  `src` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `Photoable_type`, `Photoable_id`, `src`, `type`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\book', 1, 'kZxrbyCg1698405942.jpg', 'photo', '2023-10-27 09:25:42', '2023-10-27 09:25:42'),
(2, 'App\\Models\\book', 2, 'ydVkmGN11698406062.jpg', 'photo', '2023-10-27 09:27:42', '2023-10-27 09:27:42'),
(3, 'App\\Models\\book', 2, 'hgJtnkup1698406062.jpg', 'photo', '2023-10-27 09:27:43', '2023-10-27 09:27:43'),
(4, 'App\\Models\\book', 3, 'FGfA388z1698407048.jpg', 'photo', '2023-10-27 09:44:08', '2023-10-27 09:44:08'),
(5, 'App\\Models\\book', 3, 'zvK9xTmV1698407048.jpg', 'photo', '2023-10-27 09:44:09', '2023-10-27 09:44:09'),
(6, 'App\\Models\\book', 3, 'SmWBgH2y1698407049.jpg', 'photo', '2023-10-27 09:44:09', '2023-10-27 09:44:09'),
(7, 'App\\Models\\book', 4, 'tPdXQtBa1698407221.jpg', 'photo', '2023-10-27 09:47:01', '2023-10-27 09:47:01'),
(8, 'App\\Models\\book', 5, '0ZISOeHV1698407234.jpg', 'photo', '2023-10-27 09:47:14', '2023-10-27 09:47:14'),
(9, 'App\\Models\\book', 6, 'VwZm2Xcb1698407361.jpg', 'photo', '2023-10-27 09:49:21', '2023-10-27 09:49:21'),
(10, 'App\\Models\\book', 6, 'u1j8Vxqy1698407362.jpg', 'photo', '2023-10-27 09:49:22', '2023-10-27 09:49:22'),
(11, 'App\\Models\\book', 7, 'OeU3grpZ1698407529.jpg', 'photo', '2023-10-27 09:52:09', '2023-10-27 09:52:09'),
(12, 'App\\Models\\book', 7, 'qCfZNEAd1698407530.jpg', 'photo', '2023-10-27 09:52:10', '2023-10-27 09:52:10'),
(13, 'App\\Models\\book', 8, 'tNX2CgAB1698407674.jpg', 'photo', '2023-10-27 09:54:34', '2023-10-27 09:54:34'),
(14, 'App\\Models\\book', 8, 'rd4LG81v1698407675.jpg', 'photo', '2023-10-27 09:54:35', '2023-10-27 09:54:35'),
(15, 'App\\Models\\book', 9, '1JmHFj451698407716.jpg', 'photo', '2023-10-27 09:55:16', '2023-10-27 09:55:16'),
(16, 'App\\Models\\book', 9, 'vqoWhXPG1698407717.jpg', 'photo', '2023-10-27 09:55:17', '2023-10-27 09:55:17'),
(17, 'App\\Models\\book', 10, 'r7wl6BEZ1698407792.jpg', 'photo', '2023-10-27 09:56:32', '2023-10-27 09:56:32'),
(18, 'App\\Models\\book', 10, 'zzNaGD8p1698407792.jpg', 'photo', '2023-10-27 09:56:33', '2023-10-27 09:56:33'),
(19, 'App\\Models\\User', 2, 'S21B6jON1698411365.jpg', 'photo', '2023-10-27 10:56:05', '2023-10-27 10:56:05'),
(20, 'App\\Models\\book', 11, 'NvzfhWjK1698413274.jpg', 'photo', '2023-10-27 11:27:54', '2023-10-27 11:27:54'),
(21, 'App\\Models\\book', 11, 'PbQPQoVa1698413274.jpg', 'photo', '2023-10-27 11:27:54', '2023-10-27 11:27:54'),
(22, 'App\\Models\\book', 11, '0sKQSDeS1698413275.jpg', 'photo', '2023-10-27 11:27:55', '2023-10-27 11:27:55'),
(23, 'App\\Models\\book', 12, 'Zk5m9trb1698417775.jpg', 'photo', '2023-10-27 12:42:55', '2023-10-27 12:42:55'),
(24, 'App\\Models\\book', 12, 'nWr5uIZQ1698417776.jpg', 'photo', '2023-10-27 12:42:56', '2023-10-27 12:42:56'),
(25, 'App\\Models\\book', 13, 'tL9jkAxn1698417858.jpg', 'photo', '2023-10-27 12:44:18', '2023-10-27 12:44:18'),
(26, 'App\\Models\\book', 13, 'klRJwnxP1698417859.jpg', 'photo', '2023-10-27 12:44:19', '2023-10-27 12:44:19'),
(27, 'App\\Models\\book', 14, '6w9pAUcd1698418785.jpg', 'photo', '2023-10-27 12:59:45', '2023-10-27 12:59:45'),
(28, 'App\\Models\\book', 14, 'd6Azn9hH1698418786.jpg', 'photo', '2023-10-27 12:59:46', '2023-10-27 12:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`user_id`, `seller_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(2, 1, 3, NULL, '2023-10-27 10:09:29', '2023-10-27 12:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `darkmode` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `state`, `address_id`, `phone`, `darkmode`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mero', 'omar.freecourse@gmail.com', '2023-10-27 09:22:14', '$2y$10$2SFXD4GqdQKoYXI06IyuxOoAfsJPziZdaQFJlWRHqJqCQF61aUhNq', NULL, NULL, NULL, 0, NULL, '2023-10-27 09:21:37', '2023-10-27 09:22:14'),
(2, 'test1', 'test@g.com', '2023-10-27 10:09:18', '$2y$10$/SziX3kToqSQhZlEd6Yz1.pB0mpq60Dmo3aHWjgK9WxFPJFC8uFny', NULL, NULL, '01095513638', 0, NULL, '2023-10-27 10:09:04', '2023-10-27 13:00:27'),
(3, 'anas', 'anas.allam567@gmail.com', '2023-10-31 06:49:48', '$2y$10$.s/RqFe5fcmhSG.JpfBAPuWEFRIVCGI5vs./kpxN6xMmLSqZl1PWa', NULL, NULL, NULL, 0, NULL, '2023-10-31 06:49:13', '2023-10-31 06:49:48'),
(4, 'test', 'test@test.com', NULL, '$2y$12$Hqp4fUvBbjV5UG94Drv4ge1C.ccwRsT/o/flaliagandU5gMNA0IS', NULL, NULL, NULL, 0, NULL, '2023-11-28 11:34:53', '2023-11-28 11:34:53'),
(5, 'test', 'test1ssaa0@test.com', NULL, '$2y$10$pmCGYwm4of78OposiKnlsulUjAhoJ7GsmmIac4bHLghNpIADjo5cK', NULL, NULL, NULL, 0, NULL, '2023-11-28 12:43:49', '2023-11-28 12:43:49'),
(6, 'test', 'test1ssasa0@test.com', NULL, '$2y$10$ZKaL50qTjN7R3/VgFEUh7OAdwKtlKbqBZFl4qqNkeBIvy653vF9pq', NULL, NULL, NULL, 0, NULL, '2023-11-28 12:44:21', '2023-11-28 12:44:21'),
(7, 'test', 'test1iisa0@test.com', NULL, '$2y$10$wEa0g5Slb8z9qgThXUL27Oi4LeVUxqba0NkVI4gu31vOv355UZ.U6', NULL, NULL, NULL, 0, NULL, '2023-11-28 13:07:19', '2023-11-28 13:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`),
  ADD KEY `books_address_id_foreign` (`addresse_id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`book_id`,`category_id`),
  ADD KEY `book_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_comments_user_id_foreign` (`user_id`),
  ADD KEY `event_comments_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_interests`
--
ALTER TABLE `event_interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_interests_user_id_foreign` (`user_id`),
  ADD KEY `event_interests_event_id_foreign` (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messagechats`
--
ALTER TABLE `messagechats`
  ADD KEY `messagechats_sender_id_foreign` (`sender_id`),
  ADD KEY `messagechats_reciever_id_foreign` (`reciever_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_id_index` (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_photoable_type_photoable_id_index` (`Photoable_type`,`Photoable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`user_id`,`seller_id`),
  ADD KEY `ratings_user_id_seller_id_index` (`user_id`,`seller_id`),
  ADD KEY `ratings_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `address_id_for_user` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_interests`
--
ALTER TABLE `event_interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_address_id_foreign` FOREIGN KEY (`addresse_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD CONSTRAINT `book_categories_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD CONSTRAINT `event_comments_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_interests`
--
ALTER TABLE `event_interests`
  ADD CONSTRAINT `event_interests_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_interests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messagechats`
--
ALTER TABLE `messagechats`
  ADD CONSTRAINT `messagechats_reciever_id_foreign` FOREIGN KEY (`reciever_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messagechats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `address_id_for_user` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
