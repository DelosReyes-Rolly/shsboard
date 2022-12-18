-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 04:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shsboard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_streams`
--

CREATE TABLE `activity_streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `gradelevel_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `what` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whn` date NOT NULL,
  `whn_time` time NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `village`, `city`, `zip_code`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(2, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(3, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(4, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(5, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(6, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(7, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(8, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(9, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(10, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(11, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(12, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(13, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(14, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(15, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(16, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(17, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(18, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(19, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(20, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(21, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(22, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(23, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(24, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(25, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(26, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(27, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(28, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(29, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(30, NULL, NULL, 'Taguig city', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'Admin', 'svnhs.shs.board@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(11) DEFAULT NULL COMMENT '0 - admin',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `what` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whn` date NOT NULL,
  `whn_time` time DEFAULT NULL,
  `whr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` int(11) DEFAULT NULL COMMENT '1 - pending, 2 - approved, 3 - rejected',
  `status` int(11) NOT NULL COMMENT '1 - active, 2 - expired',
  `privacy` int(11) DEFAULT NULL COMMENT '1 - public, 2 - private',
  `expired_at` date NOT NULL,
  `approved_at` datetime DEFAULT NULL,
  `is_event` int(11) DEFAULT NULL COMMENT 'NULL - announcement, 1 - event, 2 - reminder',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courseName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `abbreviation`, `description`, `code`, `image`, `link`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, 'Accountancy, Business and Management', 'ABM', '<p>The Accountancy, Business and Management (ABM) strand would focus on the basic concepts of financial management, business management, corporate operations, and all things that are accounted for. ABM can also lead you to careers on management and accounting which could be sales manager, human resources, marketing director, project officer, bookkeeper, accounting clerk, internal auditor, and a lot more.</p>', 'SVNHS-SHS_ABM', 'LOGO ABM.png', 'https://www.youtube.com/embed/78V9v4acSZU?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(2, 'Science, Technology, Engineering, and Mathematics', 'STEM', '<p>Science, technology, engineering, and mathematics is a broad term used to group together these academic disciplines. This term is typically used to address an education policy or curriculum choices in schools. It has implications for workforce development, national security concerns and immigration policy.</p>', 'SVNHS-SHS_STEM', 'LOGO STEM.webp', 'https://www.youtube.com/embed/2dM62LWVbxY?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(3, 'Humanities and Social Sciences', 'HUMSS', '<p>The HUMSS strand in senior high school is designed to effectively prepare students who seek to pursue a college degree in liberal education. HUMSS courses cover a variety of subjects, looking at the world and its people from various points of view. The learning activities are directed towards the development of critical thinking.</p>', 'SVNHS-SHS_HUMSS', 'LOGO HUMSS.png', 'https://www.youtube.com/embed/z5rKAMAP1Rg?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(4, 'General Academic Track', 'GAS', '<p>While the other strands are career-specific, the General Academic Strand is great for students who are still undecided on which track to take. You can choose electives from the different academic strands under this track. These subjects include Humanities, Social Sciences, Applied Economics, Organization and Management, and Disaster Preparedness.</p>', 'SVNHS-SHS_GAS', 'shs.png', 'https://www.youtube.com/embed/l4R90mZRSf4?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(5, 'Home Economics', 'HE', '<p>Home economics, or family and consumer sciences, is a subject concerning human development, personal and family finance, housing and interior design, food science and preparation, nutrition and wellness, textiles and apparel, and consumer issues.</p>', 'SVNHS-SHS_HE', 'LOGO HE.jpg', 'https://www.youtube.com/embed/1zWNUF-M5js?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(6, 'Information Communication and Technology', 'ICT', '<p>ICT, or information and communications technology (or technologies), is the infrastructure and components that enable modern computing.</p>', 'SVNHS-SHS_ICT', 'LOGO ICT.png', 'https://www.youtube.com/embed/vHu5Xr_FXtA?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(7, 'Nursing Arts', 'Caregiving', '<p>The art of nursing refers to the highly valued qualities of care, compassion, and communication&mdash;three core principles guiding nursing practice. These principles encompass all aspects of patient care, including biopsychosocial needs, cultural preferences, and spiritual needs.</p>', 'SVNHS-SHS_NA', 'LOGO NURSING ARTS.png', 'https://www.youtube.com/embed/y9OzfvRtZgM?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(8, 'Electrical Installation, and Maintenance', 'EIM', '<p>What is electrical installation and maintenance? Electrical installations means the installation, repair, alteration and maintenance of electrical conductors, fittings, devices and fixtures for heating, lighting or power purposes, regardless of the voltage.</p>', 'SVNHS-SHS_EIM', 'LOGO EIM.png', 'https://www.youtube.com/embed/e-_l-CbYSyk?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, 'Grade Cetificate', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(2, 'Certification of Enrolment For 4Ps', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(3, 'Certificate of Good Moral', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(4, 'Form 137', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(5, 'Transfer-out Form', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_requests`
--

CREATE TABLE `document_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `gradelevel_id` int(11) NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1 - Pending, 2 - On Process, 3 - For Collection, 4 - Completed, 5 - Denied, 6 - For follow-up',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `address_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `email`, `gender`, `username`, `password`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, 1, 'Christine', 'Decada', 'Austin', NULL, 'sample1@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(2, 2, 'Arcee', '', 'Madrigal', NULL, 'sample2@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(3, 3, 'Mel', '', 'Tiangco', NULL, 'sample3@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(4, 4, 'Rey', '', 'Valera', NULL, 'sample4@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(5, 5, 'Grace Ann', '', 'Ursula', NULL, 'sample5@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(6, 6, 'Sharon', '', 'Cuneta', NULL, 'sample6@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(7, 7, 'Ronald', '', 'Laurente', NULL, 'sample7@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(8, 8, 'Nathan', '', 'Renato', NULL, 'sample8@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(9, 9, 'Jay', '', 'Paredes', NULL, 'sample9@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(10, 10, 'Hydelyn', '', 'Castro', NULL, 'sample10@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(11, 11, 'Rodolfo', '', 'Castro', NULL, 'sample11@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(12, 12, 'Ann', '', 'Balasi', NULL, 'sample12@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(13, 13, 'Evalyn', '', 'Delos Santos', NULL, 'sample13@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(14, 14, 'Madonna', '', 'Cruz', NULL, 'sample14@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(15, 15, 'Lily', '', 'Hipolito', NULL, 'sample15@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(16, 16, 'Lesley', '', 'Perez', NULL, 'sample16@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(17, 17, 'Joseph', '', 'Roxas', NULL, 'sample17@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(18, 18, 'Mary Ann', '', 'Restoso', NULL, 'sample18@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(19, 19, 'Jennifer', '', 'Laano', NULL, 'sample19@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(20, 20, 'Amie', '', 'Bueno', NULL, 'sample20@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(21, 21, 'Ray', '', 'Mundo', NULL, 'sample21@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(22, 22, 'Ruth', '', 'Macapagal', NULL, 'sample22@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(23, 23, 'Miriam', '', 'Defensor', NULL, 'sample23@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(24, 24, 'Marian', '', 'Rivera', NULL, 'sample24@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(25, 25, 'Maricel', '', 'Soriano', NULL, 'sample25@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(26, 26, 'Jeth', '', 'Main', NULL, 'sample26@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(27, 27, 'Ivy', '', 'Brie', NULL, 'sample27@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(28, 28, 'Reymon', '', 'Casuite', NULL, 'sample28@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(29, 29, 'Joe', '', 'Bertings', NULL, 'sample29@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(30, 30, 'Karen', '', 'Davila', NULL, 'sample30@gmail.com', '', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

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
-- Table structure for table `grade_evaluation_requests`
--

CREATE TABLE `grade_evaluation_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `gradelevel_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_levels`
--

CREATE TABLE `grade_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gradelevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_levels`
--

INSERT INTO `grade_levels` (`id`, `gradelevel`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, '11', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(2, '12', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `landings`
--

CREATE TABLE `landings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landings`
--

INSERT INTO `landings` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, 'About', '<p style=\"font-size:18px;\"><strong>Signal Village National High School (SVNHS) is a public secondary school located in Signal Village, Taguig City. Established in 1976, the school was once called the Fort Bonifacio High School Signal Annex. By 1995, it was converted into an independent school through Republic Act 8039.</strong></p>\n\n            <p>&nbsp;</p>\n            \n            <p style=\"font-size:18px;\">At present, SVNHS is a certified K-12-ready institution, offering Junior High as well as Senior High School (SHS) programs recognized by the Department of Education (DepEd). Students who intend to pursue their SHS education in this institution may school from strands under the Academic and Technical-Vocational-Livelihood (TVL) tracks.<br />\n            &nbsp;</p>\n            ', 'svnhs-about.jpg', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(2, 'Principal Message', '<p style=\"font-size:18px;\">&quot;We are all very excited about the 2021-22 school year, where classrooms once again will be full with activities and ideas that challenge and inspire our students. Our amazing teachers work hard to create an exceptional learning environment for our students. As a result, our school has been recognized at the state and national levels as being an example of not just excellent teaching, learning, but also high levels of student achievement and growth, and exemplary arts education programs. This year, we continue our journey as a Leader in Me School. &quot;</p>\n            ', 'principal.jpg', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(3, 'The DEPED VISION', '<p>We dream of Filipinos who passionately love their and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation.&nbsp;</p>\n\n            <p>As a learner-centered public insttution, the Department of Education, continuously improves itself to better serve its stakeholders.</p>', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(4, 'The DEPED Mission', '<p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and&nbsp;complete basic education where.</p>\n\n            <p><strong>Students</strong> learn in a child-friendly, gender-sensitive, safe, and motivating environment.</p>\n            \n            <p><strong>Teachers</strong> facilitate learning and constantly nurture every learner.</p>\n            \n            <p><strong>Administrators and staff,</strong> as stewards of the institution, ensure an enabling and supportive</p>\n            \n            <p><strong>Family,community, and other stakeholders</strong> are eactively engaged and share responsibility for&nbsp;developing life-long learners.</p>', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(5, 'CORE VALUES', '<p><strong>Maka-Diyos</strong></p>\n\n            <p><strong>Maka-tao</strong></p>\n            \n            <p><strong>Makakalikasan</strong></p>\n            \n            <p><strong>Makabansa</strong></p>', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(6, 'Strands Offered', '<p>High standards for instruction and learning; a warm, secure atmosphere; and participation from families and the community. The Signal Village National High School offers 4 Academic and 4 TVL Tracks. Academic track includes: Accountancy and Business Management (ABM), Humanities and Social Sciences (HUMSS), Science, Technology, Engineering and Mathematics (STEM), and General Academic Strand (GAS). TVL track includes: Home Economics (HE), Nursing Arts (Caregiving), Electrical Installation and Management (EIM), and Information and Communcation Technology (ICT). &nbsp;</p>', NULL, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_08_29_053153_admins', 1),
(4, '2022_08_29_063547_addresses', 1),
(5, '2022_08_29_064643_announcements', 1),
(6, '2022_08_29_070046_courses', 1),
(7, '2022_08_29_072426_documentrequests', 1),
(8, '2022_08_29_073339_documents', 1),
(9, '2022_08_29_073603_faculty', 1),
(10, '2022_08_29_073951_gradeevaluationrequests', 1),
(11, '2022_08_29_074552_gradelevels', 1),
(12, '2022_08_29_074825_landings', 1),
(13, '2022_08_29_075853_schoolyear', 1),
(14, '2022_08_29_080100_sections', 1),
(15, '2022_08_29_080338_semesters', 1),
(16, '2022_08_29_080751_studentgrade', 1),
(17, '2022_08_29_081118_students', 1),
(18, '2022_08_29_081555_subjects', 1),
(19, '2022_08_29_082336_subjectteacher', 1),
(20, '2022_09_12_142347_activitystreams', 1);

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
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schoolyear` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`id`, `schoolyear`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, 2022, '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, 'A', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(2, 'B', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `sem`, `created_at`, `updated_at`) VALUES
(1, 'First', '2022-12-18 07:26:55', '2022-12-18 07:26:55'),
(2, 'Second', '2022-12-18 07:26:55', '2022-12-18 07:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `LRN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gradelevel_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `gradelevel_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subjectteacher_id` int(11) NOT NULL,
  `schoolyear_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `midterm` int(11) NOT NULL,
  `finals` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subjectcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectcode`, `subjectname`, `description`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, 'A&STS1', 'Contact Center Services', 'CCS', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(2, 'AE', 'Applied Economics', 'App-Eco', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(3, 'GE1', 'General Chemistry 1', 'Gen Chem 1', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(4, 'GE2', 'General Chemistry 2', 'Gen Chem 2', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(5, 'GB1', 'General Biology 1', 'Gen Bio 1', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(6, 'GB2', 'General Biology 2', 'Gen Bio 2', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(7, 'GP1', 'General Physics 1', 'Gen Physics 1', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(8, 'GP2', 'General Physics 2', 'Gen Physics 2', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(9, 'PR1', 'Practical Research 1', 'Prac Research 1', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(10, 'PR2', 'Practical Research 2', 'Prac Research 2', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(11, 'III', 'Inquiries, Investigation, and Immersion', 'Immersion', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(12, 'CG', 'Caregiving', 'Caregiving', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(13, 'FPL', 'Filipino sa Piling Larang', 'Filipino', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(14, 'MIL', 'Media and Information Literacy', 'MIL', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(15, '21st CLPW', '21st Century Literature from the Philippines and  the World', '21st Century', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(16, 'ELS', 'Earth and Life Sciences', 'EL Science', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(17, 'Gen Math', 'General Mathematics', 'Gen Math', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(18, 'Pre Cal', 'Pre Calculus', 'Pre Cal', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(19, 'EAPP', 'English for Academic and professional Purposes', 'EAPP', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(20, 'UCSP', 'Understanding Culture, Society, and Politics', 'UCSP', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(21, 'DISS', 'Disciplines and Ideas in the Social Sciences', 'DISS', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(22, 'BF', 'Business Finance', 'BF', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(23, 'BESR', 'Business Ethics and Social Responsibility', 'BESR', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(24, 'FABM 1', 'Fundamentals of Accountancy, Business, and Management 1', 'FABM 1', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(25, 'FABM 2', 'Fundamentals of Accountancy, Business, and Management 2', 'FABM 2', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(26, 'Org and Mngt', 'Organization and Management', 'Org and Mngt', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(27, 'BM', 'Business Math', 'BM', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(28, 'PM', 'Principles of Marketing', 'PM', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(29, 'KOM', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'KOM', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(30, 'CPAR', 'Contemporary Philippines Arts from the Regions', 'CPAR', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(31, 'Stat', 'Statistics and Probability', 'Stat', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(32, 'Philo', 'Introduction to Philosophy of the Human Person', 'Philo', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(33, 'PE', 'Physical Education and Health', 'PE', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(34, 'Oral Com', 'Oral Communication', 'Oral Comm', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(35, 'RW', 'Reading and Writting', 'RW', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(36, 'Entrep', 'Entrepreneurship', 'Entrep', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(37, 'Emp Tech', 'Empowerment Technologies', 'Emp Tech', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(38, 'Pagbasa', 'Pagbasa at Pagsusuri ng Ibat-ibang Teksto Tungo sa Pananaliksik', 'Pagbasa', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(39, 'PhySci', 'Physical Science', 'PhySci', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(40, 'Per Dev', 'Personal Development', 'Per Dev', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(41, 'DRRR', 'Disaster Readiness and Risk Reduction', 'DRRR', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(42, 'Creative', 'Creative Non-Fiction', 'Creative', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(43, 'TNCT 21st Century', 'Trends, Networks, and Critical Thinking in the 21st Century', 'TNCT 21st Century', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(44, 'Pol Gov', 'Philippine Politics and Governance', 'Pol Gov', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(45, 'CESC', 'Community Engagement, Solidarity, and Citezenship', 'CESC', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL),
(46, 'DIASS', 'Discipline and Ideas in the Applied Social Science', '', '2022-12-18 07:26:55', '2022-12-18 07:26:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_teachers`
--

CREATE TABLE `subject_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `gradelevel_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `schoolyear_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_streams`
--
ALTER TABLE `activity_streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_requests`
--
ALTER TABLE `document_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grade_evaluation_requests`
--
ALTER TABLE `grade_evaluation_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_levels`
--
ALTER TABLE `grade_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landings`
--
ALTER TABLE `landings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_streams`
--
ALTER TABLE `activity_streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `document_requests`
--
ALTER TABLE `document_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_evaluation_requests`
--
ALTER TABLE `grade_evaluation_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_levels`
--
ALTER TABLE `grade_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `landings`
--
ALTER TABLE `landings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
