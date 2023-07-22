-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2023 at 02:02 PM
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
-- Database: `onlinetuitionapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `email`, `password`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Deepu(Admin)', 1, 'admin@demo.com', '1', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `description`, `subject_id`, `is_active`, `created_at`, `updated_at`, `tutor_id`) VALUES
(1, 'Batch 1', 'Test Description', 1, 1, NULL, '2023-07-18 00:16:47', 1),
(2, 'Batch 2', NULL, 1, 1, NULL, '2023-07-17 01:31:20', 1),
(3, 'Batch 3', NULL, 1, 0, NULL, '2023-07-17 01:33:53', 1),
(4, 'Batch 4', NULL, 1, 0, NULL, '2023-07-17 01:31:15', 1),
(5, 'Batch - Computer', 'Test Description', 6, 1, '2023-07-17 00:42:52', '2023-07-17 00:43:28', 1),
(6, 'Test Batch Computerr', NULL, 6, 0, '2023-07-17 03:06:53', '2023-07-17 03:07:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batchstudentmappings`
--

CREATE TABLE `batchstudentmappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` int(11) NOT NULL,
  `student_data` text NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batchstudentmappings`
--

INSERT INTO `batchstudentmappings` (`id`, `batch_id`, `student_data`, `tutor_id`, `created_at`, `updated_at`) VALUES
(1, 2, '[\"3\"]', 1, '2023-07-17 07:51:04', '2023-07-18 00:22:05'),
(6, 1, '[\"1\",\"3\"]', 1, '2023-07-18 00:22:20', '2023-07-18 02:50:23'),
(7, 3, '[\"1\"]', 1, '2023-07-18 02:51:06', '2023-07-18 02:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `description`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Grade I', NULL, NULL, '2023-07-19 13:58:00', 1),
(2, 'Class II', NULL, NULL, '2023-07-13 23:45:18', 1),
(3, 'Class III', NULL, NULL, NULL, 1),
(4, 'Class IV', NULL, NULL, '2023-07-14 01:04:33', 1),
(5, 'Class V', NULL, NULL, '2023-07-14 01:04:34', 1),
(6, 'Class VI', NULL, NULL, NULL, 1),
(7, 'Class VII', NULL, NULL, NULL, 1),
(8, 'Class VIII', NULL, NULL, NULL, 1),
(9, 'Class IX', NULL, NULL, NULL, 1),
(10, 'Class X', NULL, NULL, NULL, 1),
(11, 'Grade XI', NULL, '2023-07-13 13:18:56', '2023-07-13 23:44:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` varchar(255) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'India', '1', NULL, NULL),
(2, 'USA', '1', NULL, NULL),
(3, 'UK', '1', NULL, NULL),
(4, 'Pakistan', '1', NULL, NULL),
(5, 'Qatar', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `democlasses`
--

CREATE TABLE `democlasses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `slot_1` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `slot_2` timestamp NULL DEFAULT NULL,
  `slot_3` timestamp NULL DEFAULT NULL,
  `slot_confirmed` timestamp NULL DEFAULT NULL,
  `slot_confirmed_at` timestamp NULL DEFAULT NULL,
  `slot_confirmed_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `demo_link` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `democlasses`
--

INSERT INTO `democlasses` (`id`, `student_id`, `tutor_id`, `subject_id`, `slot_1`, `slot_2`, `slot_3`, `slot_confirmed`, `slot_confirmed_at`, `slot_confirmed_by`, `status`, `created_at`, `updated_at`, `demo_link`, `remarks`) VALUES
(1, 1, 1, 1, '2023-07-14 12:41:00', NULL, NULL, '2023-07-14 12:23:17', '2023-07-14 07:11:52', 1, 1, NULL, '2023-07-14 10:52:35', 'https://www.youtube.com/shorts/U1MWWttxJd8', 'Test'),
(2, 1, 1, 1, '2023-07-14 13:33:54', NULL, NULL, '2023-07-06 06:36:15', '2023-07-14 08:03:54', 1, 3, NULL, '2023-07-14 08:03:54', 'https://www.youtube.com/shorts/U1MWWttxJd8', NULL),
(3, 1, 1, 1, '2023-07-14 13:31:00', '2023-07-07 17:28:00', '2023-07-21 17:28:00', '2023-07-14 11:00:46', '2023-07-14 08:01:40', 1, 2, '2023-07-07 11:59:33', '2023-07-14 10:52:58', 'https://www.youtube.com/shorts/U1MWWttxJd8', 'test'),
(4, 1, 1, 1, '2023-07-07 18:33:31', '2023-07-28 17:30:00', '2023-07-26 17:30:00', NULL, NULL, NULL, 5, '2023-07-07 12:00:32', '2023-07-07 13:03:31', NULL, NULL),
(5, 1, 1, 1, '2023-07-14 13:01:00', '2023-07-08 04:30:00', '2023-07-10 18:26:00', '2023-07-14 12:41:16', '2023-07-14 07:31:33', 1, 5, '2023-07-07 12:56:22', '2023-07-14 07:59:21', 'https://www.youtube.com/shorts/U1MWWttxJd8', 'Test Demo Link Added'),
(6, 1, 1, 1, '2023-07-14 11:00:37', '2023-07-10 06:37:00', '2023-07-11 06:37:00', NULL, NULL, NULL, 5, '2023-07-11 01:07:25', '2023-07-14 05:30:37', NULL, NULL),
(7, 1, 1, 1, '2023-07-14 11:00:27', '2023-07-10 06:37:00', '2023-07-11 06:37:00', NULL, NULL, NULL, 5, '2023-07-11 01:07:46', '2023-07-14 05:30:27', NULL, NULL);

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
-- Table structure for table `learningcontents`
--

CREATE TABLE `learningcontents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `content_link` varchar(255) DEFAULT NULL,
  `content_description` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `video_description` varchar(255) DEFAULT NULL,
  `blog_link` varchar(255) DEFAULT NULL,
  `blog_description` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learningcontents`
--

INSERT INTO `learningcontents` (`id`, `class_id`, `subject_id`, `topic_id`, `content_link`, `content_description`, `video_link`, `video_description`, `blog_link`, `blog_description`, `is_active`, `created_at`, `updated_at`, `batch_id`) VALUES
(1, 10, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-07-15 06:02:01', '2023-07-18 04:10:57', 1),
(2, 10, 1, 2, '/private/var/folders/s7/nqvty94x6m7720txtf4879z00000gn/T/phpNaSsuD', 'Test Data', NULL, NULL, NULL, NULL, 0, '2023-07-15 06:09:26', '2023-07-15 07:10:24', 2),
(3, 10, 1, 3, '/private/var/folders/s7/nqvty94x6m7720txtf4879z00000gn/T/phpW8d8f5', NULL, NULL, NULL, NULL, NULL, 1, '2023-07-15 06:12:07', '2023-07-15 06:12:07', NULL),
(4, 10, 1, 3, '/private/var/folders/s7/nqvty94x6m7720txtf4879z00000gn/T/phpvxkc9p', NULL, NULL, NULL, NULL, NULL, 1, '2023-07-15 06:44:07', '2023-07-15 06:44:07', NULL),
(5, 10, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-15 06:46:53', '2023-07-15 06:46:53', NULL),
(6, 10, 6, 6, '1689423452.pdf', NULL, NULL, NULL, NULL, NULL, 1, '2023-07-15 06:47:32', '2023-07-15 06:47:32', NULL),
(7, 10, 6, 6, '1689423703.pdf', NULL, NULL, NULL, NULL, NULL, 1, '2023-07-15 06:51:43', '2023-07-15 08:01:08', NULL),
(8, 10, 6, 6, '1689426036.pdf', 'Test Content Description', '1689426036.mkv', 'Test Video Description', 'https://stackoverflow.com/', 'Test Blog Description', 1, '2023-07-15 07:30:36', '2023-07-17 02:19:59', NULL),
(9, 10, 6, 6, NULL, 'Test Content Description', NULL, 'Test Video Description', 'https://stackoverflow.com/', 'Test Blog Description', 1, '2023-07-15 07:31:43', '2023-07-15 07:31:43', NULL);

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
(8, '2023_07_04_093649_create_studentachievements_table', 1),
(9, '2023_07_04_093658_create_studentreviews_table', 1),
(10, '2023_07_04_093711_create_classes_table', 1),
(11, '2023_07_04_093720_create_subjects_table', 1),
(12, '2023_07_04_093730_create_topics_table', 1),
(13, '2023_07_04_093751_create_teacherclassmappings_table', 1),
(15, '2023_07_04_093829_create_statuses_table', 1),
(16, '2023_07_04_094053_create_userroles_table', 1),
(17, '2023_07_04_095413_create_syllabi_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 2),
(19, '2023_07_04_093536_create_studentregistrations_table', 2),
(20, '2023_07_04_093612_create_tutorregistrations_table', 2),
(21, '2023_07_04_093820_create_democlasses_table', 3),
(25, '2023_07_04_093636_create_studentprofiles_table', 5),
(26, '2023_07_07_083313_create_tutorsubjectmappings_table', 6),
(27, '2023_07_05_125907_create_tutorprofiles_table', 7),
(28, '2023_07_07_104504_create_tutorachievements_table', 8),
(29, '2023_07_07_104512_create_tutorreviews_table', 8),
(30, '2023_07_07_120658_create_countries_table', 9),
(31, '2023_07_07_122719_add_country_id_to_tutorprofiles_table', 10),
(32, '2023_07_11_062219_add_demo_link_to_democlasses_table', 11),
(34, '2023_07_11_095154_create_paymentstudents_table', 12),
(35, '2023_07_11_095855_create_studentattendances_table', 12),
(36, '2023_07_11_095002_create_paymentdetails_table', 13),
(37, '2023_07_12_061036_add_is_active_to_classes_table', 14),
(38, '2023_07_12_061104_add_is_active_to_subjects_table', 14),
(39, '2023_07_12_061223_add_is_active_to_topics_table', 14),
(40, '2023_07_12_104801_create_admins_table', 15),
(41, '2023_07_14_114349_add_remarks_to_democlasses_table', 16),
(42, '2023_07_15_072104_add_remarks_to_paymentdetails_table', 17),
(43, '2023_07_15_103119_create_learningcontents_table', 18),
(46, '2023_07_16_064014_create_student_assignment_lists_table', 19),
(47, '2023_07_16_064053_create_student_assignments_table', 19),
(49, '2023_07_16_171930_add_batch_id_to_learningcontents_table', 20),
(51, '2023_07_16_172243_add_batch_id_to_student_assignment_lists_table', 20),
(52, '2023_07_16_172357_add_batch_id_to_teacherclassmappings_table', 20),
(53, '2023_07_16_171705_create_batches_table', 21),
(54, '2023_07_17_082523_add_tutor_id_to_batches_table', 22),
(55, '2023_07_16_172054_create_batchstudentmappings_table', 23),
(56, '2023_07_18_100320_create_questionbanks_table', 24),
(57, '2023_07_19_071327_create_online_tests_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `online_tests`
--

CREATE TABLE `online_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `max_attempt` double(8,2) NOT NULL,
  `test_duration` double(8,2) NOT NULL,
  `test_start_date` varchar(255) NOT NULL,
  `test_end_date` varchar(255) NOT NULL,
  `question_id` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_tests`
--

INSERT INTO `online_tests` (`id`, `name`, `description`, `class_id`, `subject_id`, `topic_id`, `max_attempt`, `test_duration`, `test_start_date`, `test_end_date`, `question_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Test 1', 'desc', 10, 1, 1, 1.00, 1.00, '2023-07-19T16:27', '2023-07-19T16:27', '[\"2\"]', 1, '2023-07-19 05:27:30', '2023-07-20 05:41:31'),
(2, 'Computer Fundamental - Mock-1', 'Test based on fundamentals of computer', 10, 6, 6, 3.00, 5.00, '2023-07-19T16:29', '2023-07-20T16:29', '[\"3\",\"4\"]', 1, '2023-07-19 05:29:47', '2023-07-19 05:29:47');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`id`, `transaction_id`, `payment_mode`, `payment_date`, `amount`, `status`, `created_at`, `updated_at`, `remarks`) VALUES
(1, '1234-5678-9012-app0-rest', 'Credit Card', '2023-07-11 10:24:22', 115, 3, NULL, '2023-07-15 03:48:27', 'Test Payment Data'),
(2, '1234-5678-qqyz-aspa-zqkp1o2', 'Credit Card', '2023-07-11 13:40:09', 12, 3, '2023-07-11 08:10:09', '2023-07-11 08:10:09', NULL),
(3, '1234-5678-qqyz-aspa-zqkp1o2', 'Credit Card', '2023-07-12 04:56:15', 12, 5, '2023-07-11 23:26:15', '2023-07-11 23:26:15', NULL),
(4, '1234-5678-qqyz-aspa-zqkp1o2', 'Credit Card', '2023-07-12 04:57:15', 12, 3, '2023-07-11 23:27:15', '2023-07-19 14:03:13', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `paymentstudents`
--

CREATE TABLE `paymentstudents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `classes_purchased` int(11) NOT NULL,
  `rate_per_hr` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentstudents`
--

INSERT INTO `paymentstudents` (`id`, `transaction_id`, `student_id`, `class_id`, `subject_id`, `tutor_id`, `classes_purchased`, `rate_per_hr`, `created_at`, `updated_at`) VALUES
(1, '1234-5678-9012-app0-rest', 1, 1, 1, 1, 3, 12, NULL, NULL),
(2, '1234-5678-qqyz-aspa-zqkp1o2', 1, 10, 1, 1, 1, 12, '2023-07-11 08:10:09', '2023-07-11 08:10:09'),
(3, '1234-5678-qqyz-aspa-zqkp1o2', 1, 10, 1, 1, 1, 12, '2023-07-11 23:26:15', '2023-07-11 23:26:15'),
(4, '1234-5678-qqyz-aspa-zqkp1o2', 1, 10, 1, 1, 1, 12, '2023-07-11 23:27:15', '2023-07-11 23:27:15');

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

-- --------------------------------------------------------

--
-- Table structure for table `questionbanks`
--

CREATE TABLE `questionbanks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionbanks`
--

INSERT INTO `questionbanks` (`id`, `class_id`, `subject_id`, `topic_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `remarks`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, '<p>The decimal expansion of number <img src=\"https://www.careerlauncher.com/cbse-ncert/class-10/10-math-real-3-UntitOE0.JPG\"> has:</p>', 'a terminating decimal', 'non-terminating but repeating', 'non-terminating non repeating', 'terminating after two places of decimal', 'a terminating decimal', NULL, 1, '2023-07-18 06:40:11', '2023-07-18 13:32:10'),
(2, 10, 1, 1, '<p>The product of a rational and irrational number is</p>', 'rational', 'irrational', 'both of above', 'none of above', 'irrational', NULL, 1, '2023-07-18 06:47:13', '2023-07-18 13:40:09'),
(3, 10, 6, 6, '<p>Who is the father of Computers?</p>', 'James Gosling', 'Charles Babbage', 'Dennis Ritchie', 'Bjarne Stroustrup', 'Charles Babbage', 'Explanation: Charles Babbage is known as the father of computers. Charles Babbage designed and built the first mechanical computer and Difference Engine.', 1, '2023-07-18 06:47:29', '2023-07-18 13:38:01'),
(4, 10, 6, 6, '<p>What is the full form of CPU?</p>', 'Computer Processing Unit', 'Computer Principle Unit', 'Central Processing Unit', 'Control Processing Unit', 'Central Processing Unit', 'Explanation: CPU stands for Central Processing Unit. CPU is the part of a computer system that is mainly referred as the brain of the computer.', 1, '2023-07-18 07:28:12', '2023-07-18 13:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'New', NULL, NULL),
(2, 'Scheduled', NULL, NULL),
(3, 'Confirmed', NULL, NULL),
(4, 'Attended', NULL, NULL),
(5, 'Cancelled', NULL, NULL),
(6, 'Pending', NULL, NULL),
(7, 'On-Hold', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentachievements`
--

CREATE TABLE `studentachievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentachievements`
--

INSERT INTO `studentachievements` (`id`, `name`, `description`, `date`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Winner in singing competition', 'Winner in singing competition in school', '2023-01-02 08:22:06', 1, NULL, NULL),
(2, 'Certification in robotics', 'Science project on robotics', '2023-02-22 08:22:06', 1, NULL, NULL),
(3, 'Winner in essay writing', 'Winner in essay writing competition in school', '2023-05-19 08:22:06', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentattendances`
--

CREATE TABLE `studentattendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `class_starts_at` varchar(255) NOT NULL,
  `class_ends_at` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentprofiles`
--

CREATE TABLE `studentprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `grade` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `secondary_mobile` bigint(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentprofiles`
--

INSERT INTO `studentprofiles` (`id`, `name`, `dob`, `grade`, `mobile`, `secondary_mobile`, `email`, `gender`, `school_name`, `fathers_name`, `mothers_name`, `student_id`, `profile_pic`, `created_at`, `updated_at`) VALUES
(2, 'Deepesh Raj', '2023-07-06 18:30:00', '10', 1234, 1234567, 'deepesh@gmail.com', 1, 'Central School', 'My Father Name', 'My Mother Name', 1, '1688713664.jpg', '2023-07-06 07:45:16', '2023-07-07 01:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `studentregistrations`
--

CREATE TABLE `studentregistrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_mobile_verified` int(11) DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentregistrations`
--

INSERT INTO `studentregistrations` (`id`, `name`, `mobile`, `email`, `is_mobile_verified`, `mobile_verified_at`, `is_email_verified`, `email_verified_at`, `password`, `class_id`, `role_id`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Deepesh Raj', 1234, 'deepesh@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$LIJh5hZ75hBKJUJZ/AEgPO5V1F5uE8.a8JHtk25309TbekOMQC0oi', 10, 3, 1, NULL, '2023-07-05 00:48:11', '2023-07-19 13:59:13'),
(3, 'Demo Student', 9999999999, 'demostudent@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$MEqd2ZPoWjnX9ibGqoJi8O.D16HD5eDpMMAItEfNcmRA4TnJkqiLi', 10, 3, 1, NULL, '2023-07-07 12:11:34', '2023-07-15 04:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `studentreviews`
--

CREATE TABLE `studentreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentreviews`
--

INSERT INTO `studentreviews` (`id`, `name`, `ratings`, `subject_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Good Boy', '5', 1, 1, NULL, NULL),
(2, 'Bad Boy', '2.5', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_assignments`
--

CREATE TABLE `student_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `submission_link` varchar(255) NOT NULL,
  `submitted_on` varchar(255) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `reamrks` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_assignments`
--

INSERT INTO `student_assignments` (`id`, `assignment_id`, `submission_link`, `submitted_on`, `submitted_by`, `reamrks`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'www.google.com', '2023-07-17 12:45:13', 1, 'Test Remarks', 1, '2023-07-17 07:15:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment_lists`
--

CREATE TABLE `student_assignment_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assignment_description` varchar(255) DEFAULT NULL,
  `assignment_link` varchar(255) DEFAULT NULL,
  `assignment_start_date` varchar(255) DEFAULT NULL,
  `assignment_end_date` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_assignment_lists`
--

INSERT INTO `student_assignment_lists` (`id`, `name`, `class_id`, `subject_id`, `topic_id`, `student_id`, `assigned_by`, `assignment_description`, `assignment_link`, `assignment_start_date`, `assignment_end_date`, `is_active`, `created_at`, `updated_at`, `batch_id`) VALUES
(1, 'Real Numbers(Test Data)', 10, 1, 1, 1, 1, 'Test Description', 'https://ncert.nic.in/textbook/pdf/jemh101.pdf', '2023-07-16 12:20:13', '2023-07-30 12:20:13', 1, '2023-07-16 06:50:13', '2023-07-16 11:46:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`, `image`, `class_id`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Maths', NULL, '1689314709.jpg', 10, NULL, '2023-07-14 04:01:57', 1),
(2, 'English', NULL, '1689315954.jpg', 10, '2023-07-14 00:55:54', '2023-07-14 00:55:54', 1),
(3, 'Social Science', NULL, '1689315992.jpg', 10, '2023-07-14 00:56:32', '2023-07-14 00:56:32', 1),
(4, 'French', NULL, '1689316006.jpg', 10, '2023-07-14 00:56:46', '2023-07-14 00:56:46', 1),
(5, 'Science', NULL, '1689316359.png', 10, '2023-07-14 01:02:39', '2023-07-14 01:02:39', 1),
(6, 'Computer', NULL, '1689316441.png', 10, '2023-07-14 01:04:01', '2023-07-14 01:04:01', 1),
(7, 'Test Subject', 'Test Data', '', 10, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

CREATE TABLE `syllabi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `topic_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`id`, `name`, `description`, `topic_id`, `created_at`, `updated_at`) VALUES
(1, 'Real Number', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacherclassmappings`
--

CREATE TABLE `teacherclassmappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacherclassmappings`
--

INSERT INTO `teacherclassmappings` (`id`, `teacher_id`, `class_id`, `created_at`, `updated_at`, `batch_id`) VALUES
(1, 1, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `subject_id`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Real Number', 'Test Description', 1, NULL, '2023-07-15 07:09:46', 1),
(2, 'Euclids division lemma and problems on it complete', NULL, 1, NULL, '2023-07-14 05:26:02', 1),
(3, 'Finding HCF prime-factorization method', NULL, 1, NULL, NULL, 1),
(4, 'Decimal expansion of rational and irrational number with NCERT solutions', 'Decimal Topic', 1, NULL, NULL, 1),
(5, 'Without actually dividing finding the decimal expansion of rational number', NULL, 1, NULL, NULL, 1),
(6, 'Computer Fundamentals', 'Basic details about computer', 6, '2023-07-14 05:27:12', '2023-07-14 05:27:12', 1),
(7, 'Test Topic', 'Test Description', 4, '2023-07-14 05:27:57', '2023-07-15 07:09:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tutorachievements`
--

CREATE TABLE `tutorachievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorachievements`
--

INSERT INTO `tutorachievements` (`id`, `name`, `description`, `date`, `tutor_id`, `created_at`, `updated_at`) VALUES
(1, 'Best Teacher Award', 'Awarded as best teacher for maths', '2023-07-03 10:48:50', 1, NULL, NULL),
(2, 'Award for Mentorship', 'Awarded as best mentorship', '2023-07-05 10:49:53', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutorprofiles`
--

CREATE TABLE `tutorprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `secondary_mobile` bigint(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) NOT NULL,
  `intro_video_link` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `certification` varchar(255) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `detail_1` varchar(255) DEFAULT NULL,
  `detail_2` varchar(255) DEFAULT NULL,
  `detail_3` varchar(255) DEFAULT NULL,
  `tutor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorprofiles`
--

INSERT INTO `tutorprofiles` (`id`, `name`, `mobile`, `secondary_mobile`, `email`, `goal`, `qualification`, `intro_video_link`, `profile_pic`, `rate`, `expertise`, `experience`, `certification`, `headline`, `detail_1`, `detail_2`, `detail_3`, `tutor_id`, `created_at`, `updated_at`, `country_id`) VALUES
(1, 'Jancy Mary A', 12345, 9090, 'jancy@gmail.com', 'My goal', 'M.Sc', 'https://www.youtube.com/embed/LEXjY4h7z9Q', 'image.jpg', '11.50', 'Expert in maths', '10 years', 'My Certification', 'One of the best maths tutor', 'My Details 1', 'My Details 2', 'My Details 3', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutorregistrations`
--

CREATE TABLE `tutorregistrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_mobile_verified` int(11) DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorregistrations`
--

INSERT INTO `tutorregistrations` (`id`, `name`, `mobile`, `email`, `is_mobile_verified`, `mobile_verified_at`, `is_email_verified`, `email_verified_at`, `password`, `role_id`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jancy Mary', 1234, 'jancy@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$wo/divGND6IQ3eM9S.QAMeA2UaGX5ZUOudrcJEh0cGldJvWStunrC', 2, 1, NULL, '2023-07-05 00:50:10', '2023-07-15 04:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `tutorreviews`
--

CREATE TABLE `tutorreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorreviews`
--

INSERT INTO `tutorreviews` (`id`, `name`, `ratings`, `subject_id`, `tutor_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Good teaching skills', '5', 1, 1, 1, NULL, NULL),
(2, 'Teaching technique is awesome', '4', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutorsubjectmappings`
--

CREATE TABLE `tutorsubjectmappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorsubjectmappings`
--

INSERT INTO `tutorsubjectmappings` (`id`, `tutor_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Tutor', NULL, NULL),
(3, 'Student', NULL, NULL),
(4, 'Parent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `is_email_verified` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_mobile_verified` int(11) DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batchstudentmappings`
--
ALTER TABLE `batchstudentmappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `democlasses`
--
ALTER TABLE `democlasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `learningcontents`
--
ALTER TABLE `learningcontents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_tests`
--
ALTER TABLE `online_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentstudents`
--
ALTER TABLE `paymentstudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questionbanks`
--
ALTER TABLE `questionbanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentachievements`
--
ALTER TABLE `studentachievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentattendances`
--
ALTER TABLE `studentattendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentprofiles`
--
ALTER TABLE `studentprofiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentprofiles_email_unique` (`email`),
  ADD UNIQUE KEY `studentprofiles_secondary_mobile_unique` (`secondary_mobile`);

--
-- Indexes for table `studentregistrations`
--
ALTER TABLE `studentregistrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentregistrations_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `studentregistrations_email_unique` (`email`);

--
-- Indexes for table `studentreviews`
--
ALTER TABLE `studentreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_assignment_lists`
--
ALTER TABLE `student_assignment_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherclassmappings`
--
ALTER TABLE `teacherclassmappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorachievements`
--
ALTER TABLE `tutorachievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorprofiles`
--
ALTER TABLE `tutorprofiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tutorprofiles_email_unique` (`email`);

--
-- Indexes for table `tutorregistrations`
--
ALTER TABLE `tutorregistrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tutorregistrations_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `tutorregistrations_email_unique` (`email`);

--
-- Indexes for table `tutorreviews`
--
ALTER TABLE `tutorreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorsubjectmappings`
--
ALTER TABLE `tutorsubjectmappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `batchstudentmappings`
--
ALTER TABLE `batchstudentmappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `democlasses`
--
ALTER TABLE `democlasses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learningcontents`
--
ALTER TABLE `learningcontents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `online_tests`
--
ALTER TABLE `online_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymentstudents`
--
ALTER TABLE `paymentstudents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionbanks`
--
ALTER TABLE `questionbanks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentachievements`
--
ALTER TABLE `studentachievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentattendances`
--
ALTER TABLE `studentattendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentprofiles`
--
ALTER TABLE `studentprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentregistrations`
--
ALTER TABLE `studentregistrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentreviews`
--
ALTER TABLE `studentreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_assignments`
--
ALTER TABLE `student_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_assignment_lists`
--
ALTER TABLE `student_assignment_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherclassmappings`
--
ALTER TABLE `teacherclassmappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tutorachievements`
--
ALTER TABLE `tutorachievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutorprofiles`
--
ALTER TABLE `tutorprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tutorregistrations`
--
ALTER TABLE `tutorregistrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tutorreviews`
--
ALTER TABLE `tutorreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutorsubjectmappings`
--
ALTER TABLE `tutorsubjectmappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
