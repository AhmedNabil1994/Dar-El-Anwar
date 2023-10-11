-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2023 at 10:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dar-alanwar`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_generals`
--

CREATE TABLE `about_us_generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_area_title` varchar(191) DEFAULT NULL,
  `gallery_area_subtitle` text DEFAULT NULL,
  `gallery_third_image` varchar(191) DEFAULT NULL,
  `gallery_second_image` varchar(191) DEFAULT NULL,
  `gallery_first_image` varchar(191) DEFAULT NULL,
  `our_history_title` varchar(191) DEFAULT NULL,
  `our_history_subtitle` text DEFAULT NULL,
  `upgrade_skill_logo` varchar(191) DEFAULT NULL,
  `upgrade_skill_title` varchar(191) DEFAULT NULL,
  `upgrade_skill_subtitle` text DEFAULT NULL,
  `upgrade_skill_button_name` varchar(191) DEFAULT NULL,
  `team_member_logo` varchar(191) DEFAULT NULL,
  `team_member_title` varchar(191) DEFAULT NULL,
  `team_member_subtitle` text DEFAULT NULL,
  `instructor_support_title` varchar(191) DEFAULT NULL,
  `instructor_support_subtitle` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_generals`
--

INSERT INTO `about_us_generals` (`id`, `gallery_area_title`, `gallery_area_subtitle`, `gallery_third_image`, `gallery_second_image`, `gallery_first_image`, `our_history_title`, `our_history_subtitle`, `upgrade_skill_logo`, `upgrade_skill_title`, `upgrade_skill_subtitle`, `upgrade_skill_button_name`, `team_member_logo`, `team_member_title`, `team_member_subtitle`, `instructor_support_title`, `instructor_support_subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Mere Tranquil Existence, That I Neglect My Talents Should', 'Possession Of My Entire Soul, Like These Sweet Mornings Of Spring Which I Enjoy With My Whole Heart. I Am Alone, And Charm Of Existence In This Spot, Which Was Created For The Bliss Of Souls Like Mine. I Am So Happy, My Dear Friend, So Absorbed In The Exquisite Sense Of Mere Tranquil Existence', 'uploads_demo/gallery/3.jpg', 'uploads_demo/gallery/2.jpg', 'uploads_demo/gallery/1.jpg', 'Our History', 'Possession Of My Entire Soul, Like These Sweet Mornings Of Spring Which I Enjoy With My Whole Heart. I Am Alone, And Charm Of Existence In This Spot Which', 'uploads_demo/about_us_general/upgrade.jpg', 'Upgrade Your Skills Today For Upgrading Your Life.', 'Noticed by me when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence stalks, and grow familiar with the countless', 'Find Your Course', 'uploads_demo/about_us_general/team-members-heading-img.png', 'Our Passionate Team Members', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', 'Quality Course, Instructor And Support', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `student_subjects_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `is_absent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `date`, `department_id`, `level_id`, `instructor_id`, `student_subjects_id`, `student_id`, `is_absent`, `created_at`, `updated_at`, `time`) VALUES
(48, '2023-09-06', 12, NULL, 6, 3, 5, NULL, '2023-09-16 08:25:22', '2023-09-16 08:25:22', '11:25:13'),
(49, '2023-09-11', 12, NULL, 6, 3, 5, NULL, '2023-10-06 08:25:31', '2023-09-16 08:25:31', '11:25:22'),
(53, '2023-09-12', 12, NULL, 6, 3, 5, NULL, NULL, NULL, NULL),
(54, '2023-09-13', 12, NULL, 6, 3, 5, NULL, NULL, NULL, NULL),
(55, '2023-09-14', 12, NULL, 6, 3, 5, NULL, NULL, NULL, NULL),
(56, NULL, 13, 1, 6, 3, 229, NULL, '2023-09-24 19:59:24', '2023-09-24 19:59:24', '22:57:51'),
(57, '2023-09-24', 14, NULL, NULL, 1, 5, NULL, '2023-09-24 20:00:58', '2023-09-24 20:00:58', '23:00:31'),
(58, '2023-09-24', 13, NULL, NULL, 2, 5, NULL, '2023-09-24 20:01:03', '2023-09-24 20:01:03', '23:00:58'),
(59, '2023-09-25', 13, 1, 6, 3, 229, NULL, '2023-09-25 14:02:48', '2023-09-25 14:02:48', '17:02:42'),
(60, '2023-09-26', 13, 1, 6, 3, 229, NULL, '2023-09-25 14:02:55', '2023-09-25 14:02:55', '17:02:48'),
(61, '2023-09-27', 13, 1, 6, 3, 229, NULL, '2023-09-25 14:03:21', '2023-09-25 14:03:21', '17:03:12'),
(62, '2023-09-25', 13, NULL, 6, 2, 5, NULL, '2023-09-25 19:20:02', '2023-09-25 19:20:02', '22:19:43'),
(63, '2023-09-26', 13, NULL, 6, 2, 5, NULL, '2023-09-25 19:20:12', '2023-09-25 19:20:12', '22:20:02'),
(64, '2023-09-27', 13, NULL, 6, 2, 5, NULL, '2023-09-25 19:20:19', '2023-09-25 19:20:19', '22:20:12'),
(65, '2023-09-28', 13, NULL, 6, 2, 5, NULL, '2023-09-25 19:20:26', '2023-09-25 19:20:26', '22:20:19'),
(66, '2023-09-30', 13, 1, 6, 3, 229, NULL, '2023-09-25 19:26:47', '2023-09-25 19:26:47', '22:26:36'),
(67, '2023-10-01', 13, 1, 6, 3, 229, NULL, '2023-09-25 19:27:07', '2023-09-25 19:27:07', '22:26:47'),
(68, '2023-10-02', 13, 1, 6, 3, 229, NULL, '2023-09-26 06:08:28', '2023-09-26 06:08:28', '09:08:15'),
(69, '2023-09-26', 14, NULL, 6, 1, 5, NULL, '2023-09-26 06:16:18', '2023-09-26 06:16:18', '09:16:08'),
(70, '2023-09-27', 14, NULL, 10, 1, 5, NULL, '2023-09-26 06:16:29', '2023-09-26 06:16:29', '09:16:18'),
(71, '2023-10-25', 13, NULL, 10, 2, 5, NULL, '2023-09-26 06:19:26', '2023-09-26 06:19:26', '09:19:06'),
(72, '2023-10-26', 13, NULL, 6, 2, 5, NULL, '2023-09-26 06:19:39', '2023-09-26 06:19:39', '09:19:26'),
(73, '2023-02-25', 13, 1, 6, 3, 229, NULL, '2023-09-26 07:07:33', '2023-09-26 07:07:33', '10:07:23'),
(74, '2023-10-04', 13, 1, 6, 3, 229, NULL, '2023-09-26 17:45:35', '2023-09-26 17:45:35', '20:45:22'),
(75, '2023-10-05', 13, 1, 6, 3, 229, NULL, '2023-09-26 17:45:45', '2023-09-26 17:45:45', '20:45:35'),
(76, '2023-10-19', 13, 1, 6, 3, 229, NULL, '2023-10-04 12:44:45', '2023-10-04 12:44:45', '15:44:36'),
(77, '2023-10-06', 13, 1, 6, 3, 229, NULL, '2023-10-06 10:22:23', '2023-10-06 10:22:23', '13:22:17'),
(78, '2023-10-09', 13, 1, 1, 3, 229, NULL, '2023-10-09 06:03:37', '2023-10-09 06:03:37', '09:03:37'),
(79, '2023-10-10', 13, 1, 1, 3, 229, NULL, '2023-10-10 11:48:10', '2023-10-10 11:48:10', '14:48:10'),
(80, '2023-10-11', 13, 1, 1, 3, 229, NULL, '2023-10-10 11:48:16', '2023-10-10 11:48:16', '14:48:16'),
(81, '2023-10-12', 13, 1, 1, 3, 229, NULL, '2023-10-10 11:49:51', '2023-10-10 11:49:51', '14:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '2' COMMENT '1=admin, 2=instructor, 3=student',
  `password` varchar(191) NOT NULL,
  `private_user` int(11) DEFAULT NULL,
  `hidden` tinyint(4) NOT NULL DEFAULT 1,
  `status` int(11) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `phone`, `role`, `password`, `private_user`, `hidden`, `status`, `image`, `created_at`, `updated_at`, `position`, `branch_id`) VALUES
(1, 'Admin User', 'admin@app.com', 'admin', '1234567890', '1', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', 1, 1, 1, NULL, '2023-04-03 13:37:53', '2023-09-18 04:20:45', NULL, 1),
(2, 'Hassan Admin', 'hassanadmin@gmail.com', 'Hassan125', '11235556554', '2', '$2y$10$IUUaMCdTeqCbqDmNL4JKl.ua68cAmG8ZJn.dTJXmKgq8FeVL5hzDW', NULL, 1, 1, NULL, '2023-05-18 10:53:57', '2023-05-18 10:53:57', NULL, NULL),
(3, 'هبة أحمد جليلة', 'hebaahmed221@gmail.com', 'هبة أحمد', '01551067448', '2', '$2y$10$sZgLMu55ZIyDR8Gf.UubA.WVfZc2o/Ch5aXfE9hE8/1AELVSRsFXa', NULL, 1, 1, NULL, '2023-07-13 15:41:54', '2023-07-13 15:41:54', NULL, NULL),
(4, 'مروة قناوي', 'marwakenawi20@gmail.com', 'مروة', '01014893908', '2', '$2y$10$Bx7p6L9iOxWRgvpNgnswreZvgXwnbaTgy/f91gcUy8uqPp.nKNium', NULL, 1, 1, NULL, '2023-07-13 15:46:22', '2023-07-13 15:46:22', NULL, NULL),
(5, 'Hassan Salah', 'backend@corddigital.com', 'admin@app.com', '01125525425', '2', '$2y$10$EFywizi4eB3gr3e3PaU/YO5DY59c5tfZkABegXQ5xwR.7dQvoupQW', NULL, 1, NULL, NULL, '2023-09-24 17:51:37', '2023-09-24 17:51:37', NULL, NULL),
(6, 'Cyrus Best', 'tizaxewabu@mailinator.com', 'dafali', '+1 (894) 199-8177', '2', '$2y$10$AkZFr2Sh/YqS16hcANj0N.m1Rz3830wbLtEOIgVkNtQdAxXkZ9MR2', NULL, 1, NULL, NULL, '2023-09-24 17:52:22', '2023-09-24 17:52:22', NULL, NULL),
(7, 'Joan Vega', 'cikugi@mailinator.com', 'gurumowoh', '+1 (672) 365-3712', '2', '$2y$10$cYmaBEDCtvcZ6YMPwURleercmAZoTLPyasTWqClPIt9cGE81SgNAO', NULL, 1, NULL, NULL, '2023-09-24 17:53:02', '2023-09-24 17:53:02', NULL, NULL),
(8, 'Veronica Bartlett', 'xymires@mailinator.com', 'jadahoq', '+1 (502) 282-9869', '2', '$2y$10$OOadVQ2UBEllQvD6IssUPuhhM0vmj0l4kp78l1JVslaBfobifwbjy', NULL, 1, NULL, NULL, '2023-09-24 17:53:26', '2023-09-24 17:53:26', NULL, NULL),
(9, 'Noelani Giles', 'luwubocap@mailinator.com', 'risyfyfihy', '+1 (661) 514-3803', '2', '$2y$10$PI31SNm2dDwMtpOuxuGCFeGSq.DyJGrlG0Pw./i3Z6bO8jfmBTDgu', NULL, 1, NULL, NULL, '2023-09-24 17:54:06', '2023-09-24 17:54:06', NULL, NULL),
(10, 'Burton Shaw', 'poburorymo@mailinator.com', 'sanitediba', '+1 (191) 419-1522', '2', '$2y$10$LJj8tiMn2znT0JozriICtegakCuVYLTbo0IJUSd5oQcazfA8gHVKm', NULL, 1, NULL, NULL, '2023-09-24 17:54:48', '2023-09-24 17:54:48', NULL, NULL),
(11, 'Burton Shaw', 'poburorymo@mailinator.com', 'sanitediba', '+1 (191) 419-1522', '2', '$2y$10$O4x1NSPmkE1Lwpnqrabvrege8ID0/Y/JFNs/xq2ng71GEXTdH1Thi', NULL, 1, NULL, NULL, '2023-09-24 17:54:58', '2023-09-24 17:54:58', NULL, NULL),
(12, 'Eugenia Hubbard', 'medabihoq@mailinator.com', 'leruz', '+1 (448) 954-3609', '2', '$2y$10$geq5BSHv7AYCDNCu6asj9exfvWEkKy5Tc/PJhiGA7RvX6hL6e33FC', NULL, 1, NULL, NULL, '2023-09-24 17:55:40', '2023-09-24 17:55:40', NULL, NULL),
(13, 'Caleb Hampton', 'fikok@mailinator.com', 'cikov', '+1 (495) 988-8472', '2', '$2y$10$gJ6HYtWFj2I5T8GSoU0Pe.mX2.h0St3GI/VJ1ChI0dpIMufmfk5K2', NULL, 1, NULL, NULL, '2023-09-24 17:55:58', '2023-09-24 17:55:58', NULL, NULL),
(17, 'Colton Ryan', 'nyguwoda@mailinator.com', 'wotiw', '+1 (176) 125-8173', '2', '$2y$10$lFLOtLtYai/nqGQHRMM5K.B1Q3gvUXZh8tpFs/2g0DzTlNFwxbK0S', NULL, 1, NULL, NULL, '2023-09-24 17:56:45', '2023-09-24 17:56:45', NULL, NULL),
(18, 'Wing Merritt', 'sefakyg@mailinator.com', 'fexocixyzi', '+1 (433) 212-9001', '2', '$2y$10$1g0lFJNw2iBjMcbHRRIBXuPbPO4tP1fKC25wf0hDM9b5lSAxYsaXq', NULL, 1, NULL, NULL, '2023-09-24 17:57:18', '2023-09-24 17:57:18', NULL, NULL),
(19, 'Rhea Drake', 'cufep@mailinator.com', 'cyqanabih', '+1 (959) 148-4266', '2', '$2y$10$aTMRtIP4997NSYM96YcD3e8go5lrqmEhF5.fj0n8WRnhNquoDybmW', 0, 1, NULL, NULL, '2023-09-24 17:58:09', '2023-09-24 18:22:21', NULL, NULL),
(23, 'Orson Head', 'xijafe@mailinator.com', 'vubisizici', '+1 (206) 945-9604', '2', '$2y$10$uv5lz1NZxoXYY07Jps.TuuZ0GVcMcAIzHoGwwGUW449G8SuK87nbO', 1, 1, NULL, NULL, '2023-09-24 18:23:56', '2023-09-24 18:24:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_has_permissions`
--

CREATE TABLE `admin_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `value` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `user_id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(89, 1, 'absence_icon', 'on', '2023-10-06 11:31:23', '2023-10-10 13:39:27'),
(90, 1, 'subs_icon', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(91, 1, 'goals_icon', 'on', '2023-10-06 11:31:23', '2023-10-10 13:39:27'),
(92, 1, 'total_students', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(93, 1, 'total_joining_students', 'on', '2023-10-06 11:31:23', '2023-10-06 11:33:40'),
(94, 1, 'new_students', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(95, 1, 'excluded_students', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(96, 1, 'converted_students', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(97, 1, 'absence_students', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(98, 1, 'total_employee', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(99, 1, 'total_courses', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(100, 1, 'total_best_courses', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(101, 1, 'total_get_money', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(102, 1, 'calender', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(103, 1, 'treasury', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(104, 1, 'total_sales', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41'),
(105, 1, 'percentage_of_students', 'on', '2023-10-06 11:31:23', '2023-10-06 11:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_history`
--

CREATE TABLE `affiliate_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hash` varchar(191) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `buyer_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `order_item_id` bigint(20) NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `bundle_id` bigint(20) DEFAULT NULL,
  `consultation_slot_id` bigint(20) DEFAULT NULL,
  `actual_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `commission` decimal(8,2) NOT NULL DEFAULT 0.00,
  `commission_percentage` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=due,1=paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_request`
--

CREATE TABLE `affiliate_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `comments` varchar(191) DEFAULT NULL,
  `letter` varchar(191) DEFAULT NULL,
  `affiliate_code` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `question_option_id` bigint(20) NOT NULL,
  `take_exam_id` bigint(20) NOT NULL,
  `multiple_choice_answer` mediumtext DEFAULT NULL,
  `is_correct` varchar(10) NOT NULL COMMENT 'yes, no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `department_id` varchar(250) DEFAULT NULL,
  `marks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`marks`)),
  `instructor_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 2=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `subject_id`, `name`, `department_id`, `marks`, `instructor_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 'واجب 1', '12', NULL, '', 1, '2023-09-19 15:09:07', '2023-09-19 15:09:07'),
(5, 2, 'واجب 1', '12', NULL, '12', 1, '2023-09-19 15:10:01', '2023-09-19 15:10:01'),
(6, 2, 'واجب 2', NULL, NULL, '12', 1, '2023-09-19 15:10:33', '2023-09-19 15:10:33'),
(7, 2, 'واجب 3', NULL, NULL, '12', 1, '2023-09-19 15:11:31', '2023-09-19 15:11:31'),
(8, 2, 'واجب 4', NULL, NULL, NULL, 1, '2023-09-20 05:40:44', '2023-09-20 05:40:44'),
(9, 2, 'واجب 4', NULL, NULL, '12', 1, '2023-09-20 05:42:21', '2023-09-20 05:42:21'),
(10, 2, '211', NULL, NULL, '12', 1, '2023-09-23 10:10:08', '2023-09-23 10:10:08'),
(11, 2, '121', NULL, NULL, '12', 1, '2023-09-23 10:15:32', '2023-09-23 10:15:32'),
(14, 2, 'واجب 5', NULL, NULL, '10', 1, '2023-09-26 07:55:35', '2023-09-26 07:55:35'),
(13, 2, 'واجب 1', NULL, NULL, '12', 1, '2023-09-23 10:34:03', '2023-09-23 10:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_files`
--

CREATE TABLE `assignment_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submits`
--

CREATE TABLE `assignment_submits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assignment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `marks` double(8,2) DEFAULT NULL,
  `notes` mediumtext DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `original_filename` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_homeworks`
--

CREATE TABLE `assign_homeworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `homework_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances_leaves`
--

CREATE TABLE `attendances_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) DEFAULT NULL,
  `start_date` varchar(191) DEFAULT NULL,
  `end_date` varchar(191) DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `reason` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances_leaves`
--

INSERT INTO `attendances_leaves` (`id`, `employee_id`, `start_date`, `end_date`, `date`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(1, '9', '2023-08-09T14:06', '2023-08-09T18:06', NULL, 'attend', 'here', '2023-08-09 08:06:46', '2023-08-09 08:06:46'),
(2, '11', '2023-08-09T15:32', '2023-08-09T20:32', NULL, 'attend', 'uu', '2023-08-09 09:32:36', '2023-08-09 09:32:36'),
(3, '13', '2021-10-05T11:23', NULL, NULL, 'attend', 'Debitis voluptate eu', '2023-09-24 19:47:51', '2023-09-24 19:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `opening_balance` decimal(10,2) NOT NULL,
  `closing_balance` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `date`, `opening_balance`, `closing_balance`, `created_at`, `updated_at`) VALUES
(1, '2023-09-16', 1000.00, NULL, '2023-09-15 20:26:57', '2023-09-15 20:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `account_name` varchar(191) NOT NULL,
  `account_number` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `details` mediumtext NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=published, 0=unpublished',
  `blog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `uuid`, `user_id`, `title`, `slug`, `details`, `image`, `status`, `blog_category_id`, `created_at`, `updated_at`) VALUES
(1, '35902c90-67b0-4660-b93c-9232c9bc6f38', 1, '60 Common C# Interview Questions in 2022: Ace Your Next Interview', '60-common-c-interview-questions-in-2022-ace-your-next-interview', 'Getting hired as a programmer can be a challenge. There’s a lot of talent out there, and there’s a lot of competition. Many employers are wary of “paper programmers”; people who have no programming experience but just a degree. Because of this, they often ask in-depth programming questions during their interview. These questions can be hard to answer if you haven’t properly prepared. In this article, I’ll help you prepare to ace your next interview with these questions related to the C# programming language. At the same time, you might want to practice with some C# projects. These 50 essential C# questions and answers will help you understand the technical concepts of the language. You’ll walk into a meeting with the hiring manager with confidence. As a developer myself, I use these concepts daily.', 'uploads_demo/blog/1.jpg', 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'd7825b85-de00-45c6-853f-2be8758bee6a', 1, 'PostgreSQL vs. MySQL: Which SQL Platform Should You Use?', 'postgresql-vs-mysql-which-sql-platform-should-you-use', 'MySQL and PostgreSQL are both leading database technologies built on a foundation of SQL: Structured Query Language. SQL forms the basis of how to create, access, update, and otherwise interact with data stored in a relational database. While MySQL has been the most popular platform for many years, PostgreSQL is another major contender. Many database administrators and developers will know both technologies, which are much more similar than they are different. You can learn more about the history of SQL and how the various “flavors” came to be by watching this brief video: Depending on what you’re trying to create, the data you’re trying to manage, and your own background as a programmer or analyst, you may find one language preferable over the other. But in terms of popularity and marketability, both are widely used, with MySQL maintaining the advantage here. Compared to PostgreSQL, MySQL has the largest market share and, therefore, the most job opportunities. Here’s what you need to know about MySQL vs. PostgreSQL — the differences, benefits, and disadvantages — as well as some basic information about SQL and database platforms.', 'uploads_demo/blog/2.jpg', 1, 2, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, '4e0b911f-52b6-4fab-b994-36f1ac2f10a4', 1, 'Java vs. Python: Which Is the Best Programming Language for You?', 'java-vs-python-which-is-the-best-programming-language-for-you', 'Java and Python are both excellent choices for a beginning programmer. You really can’t go wrong by choosing either one. Here are some things these languages have in common. Both are popular and in high demand.Both are open source and don’t require a paid license to use for developers.  In the case of Java, if you use the official Oracle Java version, there may be a fee for commercial use payable by your customer/employer when deploying your Java application.  However, there are free runtime versions available from multiple vendors as well. You can get started coding in either language today as long as you have an internet connection to download the installation files and a computer that runs Windows, OS X, or Linux.The two languages do have their differences, and developers sometimes prefer one or the other for various reasons. Below is a discussion of those reasons, with hopefully enough information to help you decide which language is the one for you.', 'uploads_demo/blog/3.jpg', 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, '07990c35-8a20-426a-a8ba-171411986bed', 1, 'Learn Coding in Scratch with a Cool Game Idea', 'learn-coding-in-scratch-with-a-cool-game-idea', 'A few years ago, the creation of programs and applications was aimed at only a few people with specialized knowledge. Lately, though, programming for beginners has been possible, thanks to software that has been developed, such as Scratch. In this article, you will see how to create your own game in an easy and fun way.\nWhy start Scratch Coding?\nThe rate at which jobs in the IT sector are growing is almost twice as high as in other industries, and this is only an indication of work in future new technologies. Researchers estimate that “the digital economy is worth $11.5 trillion globally, equivalent to 15.5 percent of global GDP and has grown two and a half times faster than global GDP over the past 15 years.”\nIn a few years, programming knowledge will be fully integrated into educational programs for every age. Using coding concepts, it’s possible to design projects that utilize very similar guidelines and rubrics for a digital project, thereby giving students the opportunity to learn about their topic and sharpen their coding skills at the same time. Future human resources, generations Y and Z, will have at their core the digital skills needed to program.', 'uploads_demo/blog/2.jpg', 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `uuid`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, '64455944-1730-42fb-baa6-9f3709aa138a', 'Development', 'development', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, '40c13a46-2f93-4710-b17a-cf02238ef32f', 'IT & Software', 'it-software', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, '71c56243-76dd-4d98-9251-3cc2f8e73673', 'Data Science', 'data-science', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, '98e87599-1532-47ff-a2e9-dad1efc6b92e', 'Soft Skills', 'soft-skills', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, 'd21d5188-7134-417b-9e53-7159627f2c2c', 'Business', 'business', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(6, '13f9f95d-e82b-4be7-a67b-f2eeae612f96', 'Marketing', 'marketing', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(7, '3ee50041-cd58-4093-a992-6337162979a9', 'Design', 'design', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 2=deactivate',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_histories`
--

CREATE TABLE `booking_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_user_id` bigint(20) UNSIGNED NOT NULL,
  `student_user_id` bigint(20) UNSIGNED NOT NULL,
  `consultation_slot_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) NOT NULL,
  `day` tinyint(4) NOT NULL COMMENT '0=sunday,1=monday,2=tuesday,3=wednesday,4=thursday,5=friday,6=saturday',
  `time` varchar(191) NOT NULL,
  `duration` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=Pending,1=Approve,2=Cancel,3=Completed',
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=In-person,2=Online',
  `start_url` mediumtext DEFAULT NULL,
  `join_url` mediumtext DEFAULT NULL,
  `meeting_id` varchar(191) DEFAULT NULL,
  `meeting_password` varchar(191) DEFAULT NULL,
  `meeting_host_name` varchar(191) DEFAULT NULL COMMENT 'zoom,bbb,jitsi',
  `moderator_pw` varchar(191) DEFAULT NULL COMMENT 'use only for bbb',
  `attendee_pw` varchar(191) DEFAULT NULL COMMENT 'use only for bbb',
  `cancel_reason` mediumtext DEFAULT NULL,
  `send_back_money_status` tinyint(4) DEFAULT 0 COMMENT '1=Yes, 0=No',
  `back_admin_commission` varchar(191) DEFAULT NULL COMMENT 'Admin Commission',
  `back_owner_balance` varchar(191) DEFAULT NULL COMMENT 'Instructor Commission',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'فرع 1', '123 Main St, city_id', 'branch1.jpg', 1, '2023-04-03 13:37:53', '2023-10-04 04:36:29'),
(2, 'فرع 2', '456 Park Ave, Town', 'branch2.jpg', 1, '2023-04-03 13:37:53', '2023-10-04 04:36:21'),
(3, 'فرع 3', '789 Broadway, Village', 'branch3.jpg', 1, '2023-04-03 13:37:53', '2023-10-04 04:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `bundles`
--

CREATE TABLE `bundles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `overview` longtext DEFAULT NULL,
  `price` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1=active,0=disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `code`, `name`, `driver_id`, `subscription_id`, `department_id`, `status`) VALUES
(2, 1, 'Hiroko Burns', 10, 12, NULL, NULL),
(3, 12345, 'Hassan Salah', 24, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `calenders`
--

CREATE TABLE `calenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calenders`
--

INSERT INTO `calenders` (`id`, `title`, `user_id`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'ffgfg', NULL, '2023-09-17', '2023-09-17 00:00:00', '2023-09-17 09:30:22', '2023-09-17 09:30:22'),
(2, 'ffgfg', NULL, '2023-09-17', '2023-09-17 00:00:00', '2023-09-17 09:31:01', '2023-09-17 09:31:01'),
(3, 'بيبي', NULL, '2023-09-17', '2023-09-17 00:00:00', '2023-09-17 09:31:12', '2023-09-17 09:31:12'),
(4, 'dfdf', NULL, '2023-09-17', '2023-09-17 00:00:00', '2023-09-17 09:34:50', '2023-09-17 09:34:50'),
(5, 'dsds', NULL, '2023-09-17', '2023-09-17 00:00:00', '2023-09-17 09:43:49', '2023-09-17 09:43:49'),
(6, 'kdkd', NULL, '2023-09-24', '2023-09-24 00:00:00', '2023-09-24 15:07:21', '2023-09-24 15:07:21'),
(7, 'kdkdd', NULL, '2023-09-24', '2023-09-24 00:00:00', '2023-09-24 15:09:02', '2023-09-24 15:09:02'),
(8, 'kdkdd', NULL, '2023-09-24', '2023-09-24 00:00:00', '2023-09-24 15:09:17', '2023-09-24 15:09:17'),
(9, 'ere', NULL, '2023-09-07', NULL, '2023-09-24 15:16:37', '2023-09-24 15:16:37'),
(10, 'fkfkf', NULL, '2023-09-26', NULL, '2023-09-26 05:58:28', '2023-09-26 05:58:28'),
(11, 'lkg', NULL, '2023-09-26', NULL, '2023-09-26 06:00:35', '2023-09-26 06:00:35'),
(12, 'لدينا معام', NULL, '2023-09-26', NULL, '2023-09-26 06:10:35', '2023-09-26 06:10:35'),
(13, 'لدينا معام', NULL, '2023-09-26', NULL, '2023-09-26 06:10:41', '2023-09-26 06:10:41'),
(14, 'لدينا مهام', NULL, '2023-09-26', NULL, '2023-09-26 06:11:28', '2023-09-26 06:11:28'),
(15, 'لديك مهام', NULL, '2023-09-26', NULL, '2023-09-26 06:22:07', '2023-09-26 06:22:07'),
(16, 'لدينا مهام', NULL, '2023-09-26', NULL, '2023-09-26 07:10:24', '2023-09-26 07:10:24'),
(17, 'لدينا مهام', NULL, '2023-09-26', NULL, '2023-09-26 07:10:27', '2023-09-26 07:10:27'),
(18, 'لديك مهام', NULL, '2023-09-26', NULL, '2023-09-26 17:48:26', '2023-09-26 17:48:26'),
(19, 'dsds', NULL, '2023-10-04', NULL, '2023-10-04 13:48:55', '2023-10-04 13:48:55'),
(20, 'hhd', NULL, '2023-10-16', NULL, '2023-10-04 13:49:08', '2023-10-04 13:49:08'),
(21, 'هضا مهم', NULL, '2023-10-18', NULL, '2023-10-04 13:52:27', '2023-10-04 13:52:27'),
(22, 'هضا مهم', NULL, '2023-10-20', NULL, '2023-10-04 13:52:30', '2023-10-04 13:52:30'),
(23, 'fgf', NULL, '2023-10-06', NULL, '2023-10-06 08:59:18', '2023-10-06 08:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `cart_management`
--

CREATE TABLE `cart_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consultation_slot_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consultation_details` text DEFAULT NULL,
  `consultation_date` varchar(191) DEFAULT NULL,
  `consultation_available_type` varchar(191) DEFAULT NULL,
  `bundle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bundle_course_ids` text DEFAULT NULL,
  `promotion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `main_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference` varchar(191) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `certificate_number` varchar(50) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `show_number` varchar(10) NOT NULL DEFAULT 'yes' COMMENT 'yes, no',
  `number_x_position` int(11) NOT NULL DEFAULT 0,
  `number_y_position` int(11) NOT NULL DEFAULT 0,
  `number_font_size` int(11) NOT NULL DEFAULT 18,
  `number_font_color` varchar(25) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `title_x_position` int(11) NOT NULL DEFAULT 0,
  `title_y_position` int(11) NOT NULL DEFAULT 0,
  `title_font_size` int(11) NOT NULL DEFAULT 20,
  `title_font_color` varchar(25) DEFAULT NULL,
  `show_date` varchar(10) NOT NULL DEFAULT 'yes' COMMENT 'yes, no',
  `date_x_position` int(11) NOT NULL DEFAULT 0,
  `date_y_position` int(11) NOT NULL DEFAULT 16,
  `date_font_size` int(11) NOT NULL DEFAULT 30,
  `date_font_color` varchar(25) DEFAULT NULL,
  `show_student_name` varchar(10) NOT NULL DEFAULT 'yes' COMMENT 'yes, no',
  `student_name_x_position` int(11) NOT NULL DEFAULT 0,
  `student_name_y_position` int(11) NOT NULL DEFAULT 16,
  `student_name_font_size` int(11) NOT NULL DEFAULT 32,
  `student_name_font_color` varchar(25) DEFAULT NULL,
  `show_department` varchar(255) DEFAULT NULL,
  `department_y_position` decimal(10,2) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department_x_position` decimal(10,2) DEFAULT NULL,
  `department_font_size` decimal(10,2) DEFAULT NULL,
  `department_font_color` varchar(255) DEFAULT NULL,
  `body` mediumtext DEFAULT NULL,
  `body_max_length` int(11) NOT NULL DEFAULT 80,
  `body_x_position` int(11) NOT NULL DEFAULT 0,
  `body_y_position` int(11) NOT NULL DEFAULT 16,
  `body_font_size` int(11) NOT NULL DEFAULT 20,
  `body_font_color` varchar(25) DEFAULT NULL,
  `role_1_title` varchar(191) DEFAULT NULL,
  `role_1_signature` varchar(191) DEFAULT NULL,
  `role_1_x_position` int(11) NOT NULL DEFAULT 16,
  `role_1_y_position` int(11) NOT NULL DEFAULT 16,
  `role_1_font_size` int(11) NOT NULL DEFAULT 18,
  `role_1_font_color` varchar(25) DEFAULT NULL,
  `role_2_title` varchar(191) DEFAULT NULL,
  `role_2_x_position` int(11) NOT NULL DEFAULT 0,
  `role_2_y_position` int(11) NOT NULL DEFAULT 0,
  `role_2_font_size` int(11) NOT NULL DEFAULT 18,
  `role_2_font_color` varchar(25) DEFAULT NULL,
  `path` varchar(191) DEFAULT NULL,
  `receiving_type` varchar(255) DEFAULT NULL,
  `receiving_way` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `uuid`, `certificate_number`, `image`, `show_number`, `number_x_position`, `number_y_position`, `number_font_size`, `number_font_color`, `title`, `title_x_position`, `title_y_position`, `title_font_size`, `title_font_color`, `show_date`, `date_x_position`, `date_y_position`, `date_font_size`, `date_font_color`, `show_student_name`, `student_name_x_position`, `student_name_y_position`, `student_name_font_size`, `student_name_font_color`, `show_department`, `department_y_position`, `department_id`, `department_x_position`, `department_font_size`, `department_font_color`, `body`, `body_max_length`, `body_x_position`, `body_y_position`, `body_font_size`, `body_font_color`, `role_1_title`, `role_1_signature`, `role_1_x_position`, `role_1_y_position`, `role_1_font_size`, `role_1_font_color`, `role_2_title`, `role_2_x_position`, `role_2_y_position`, `role_2_font_size`, `role_2_font_color`, `path`, `receiving_type`, `receiving_way`, `created_at`, `updated_at`, `student_id`) VALUES
(2, 'd1213a88-ab10-41c0-b5e0-a6d4c41bab19', '3135274', 'uploads/certificate/1694602288-E7Y2d7lpZq.jpg', 'yes', 0, 20, 20, '#363234', 'First Certificat', 0, 30, 20, '#000000', 'yes', 0, 40, 20, '#363234', 'yes', 0, 30, 20, '#363234', NULL, NULL, NULL, NULL, NULL, NULL, '[Hassan Salah][Course Reading] jdjdjdjd sjdnsjdjs jsdad jdksajd ndjksaldla', 80, 0, 20, 20, '#363234', 'Hassan', 'uploads/certificate/1694602260-Tuex3N7fNT.jpg', 16, 55, 20, '#363234', 'Hasona', 0, 55, 20, '#000000', '/uploads/certificate/certificate-d1213a88-ab10-41c0-b5e0-a6d4c41bab19.pdf', NULL, NULL, '2023-09-13 07:51:00', '2023-09-13 08:13:43', '208'),
(3, 'b91cdbcc-f596-4af3-aeb0-a0f35c53cb4a', '4419632', 'uploads/certificate/1694607944-CKqSnVYKw5.jpg', 'yes', 0, 631, 526, '#85eeb8', 'Deleniti aut deserun', 0, 50, 27, '#ce0509', 'yes', 0, 8, 17, '#e42a9e', 'yes', 0, 15, 12, '#0107e6', NULL, NULL, NULL, NULL, NULL, NULL, 'Irure ipsa officia', 80, 0, 34, 0, '#a940f9', 'Quo et reiciendis oc', 'uploads/certificate/1694607944-qdSnny8Fjk.jpg', 16, 10, 9, '#342dee', 'Repellendus Est inc', 0, 2, 97, '#6d9d06', NULL, NULL, NULL, '2023-09-13 09:25:44', '2023-09-13 09:25:44', '208'),
(4, '5b77ed47-6316-4995-8e4e-bbcc1077a7e7', '3410923', 'uploads/certificate/1694608340-46elp50bfa.jpg', 'yes', 0, 631, 526, '#85eeb8', 'Deleniti aut deserun', 0, 50, 27, '#ce0509', 'yes', 0, 8, 17, '#e42a9e', 'yes', 0, 15, 12, '#0107e6', NULL, 80.00, 13, NULL, 6.00, '#419caa', 'Irure ipsa officia', 80, 0, 34, 0, '#a940f9', 'Quo et reiciendis oc', 'uploads/certificate/1694608341-KbdAjdFkiQ.jpg', 16, 10, 9, '#342dee', 'Repellendus Est inc', 0, 2, 97, '#6d9d06', '/uploads/certificate/certificate-5b77ed47-6316-4995-8e4e-bbcc1077a7e7.pdf', NULL, NULL, '2023-09-13 09:32:21', '2023-09-13 09:32:21', '208'),
(5, 'e3e9310e-9266-4e70-86f1-fab9be2b62b5', '6862629', 'uploads/certificate/1694608607-ywGlxyfaHc.jpg', 'no', 0, 900, 571, '#ac49d9', 'Nam rerum pariatur', 0, 52, 50, '#fc20f9', 'no', 0, 85, 21, '#a7ab9d', 'yes', 0, 92, 100, '#f573d4', NULL, 89.00, 13, NULL, 20.00, '#7218ba', 'Dolor sint consequu', 80, 0, 14, 86, '#90310e', 'Delectus eos rerum', 'uploads/certificate/1694608607-HVtM3cree1.jpg', 16, 94, 30, '#5a384b', 'Non ea pariatur Seq', 0, 57, 70, '#eb9f10', '/uploads/certificate/certificate-e3e9310e-9266-4e70-86f1-fab9be2b62b5.pdf', NULL, NULL, '2023-09-13 09:36:47', '2023-09-13 09:36:47', '7'),
(6, '98990bec-df34-4134-aaae-ef4f42d3a28b', '6784702', 'uploads/certificate/1694608607-cjalwfCOns.jpg', 'no', 0, 900, 571, '#ac49d9', 'Nam rerum pariatur', 0, 52, 50, '#fc20f9', 'no', 0, 85, 21, '#a7ab9d', 'yes', 0, 92, 100, '#f573d4', NULL, 89.00, 13, NULL, 20.00, '#7218ba', 'Dolor sint consequu', 80, 0, 14, 86, '#90310e', 'Delectus eos rerum', 'uploads/certificate/1694608608-3ZXbsFiDIP.jpg', 16, 94, 30, '#5a384b', 'Non ea pariatur Seq', 0, 57, 70, '#eb9f10', '/uploads/certificate/certificate-98990bec-df34-4134-aaae-ef4f42d3a28b.pdf', NULL, NULL, '2023-09-13 09:36:48', '2023-09-13 09:36:48', '7'),
(7, '3de51583-abea-4509-8c31-70d62650063d', '6586119', 'uploads/certificate/1694608693-MZXF9T8H1I.jpg', 'no', 0, 20, 20, '#ac49d9', 'Nam rerum pariatur', 0, 30, 20, '#fc20f9', 'yes', 0, 40, 20, '#a7ab9d', 'yes', 0, 30, 20, '#f573d4', NULL, 30.00, 13, NULL, 30.00, '#7218ba', 'Dolor sint consequu', 80, 0, 20, 20, '#90310e', 'Delectus eos rerum', 'uploads/certificate/1694608693-fwD5wVTDaO.jpg', 16, 55, 20, '#5a384b', 'Non ea pariatur Seq', 0, 55, 20, '#eb9f10', '/uploads/certificate/certificate-3de51583-abea-4509-8c31-70d62650063d.pdf', NULL, NULL, '2023-09-13 09:38:13', '2023-09-13 09:38:13', '7'),
(8, 'da391707-ed37-4954-a798-1a859ce0b49c', '7378498', 'uploads/certificate/1694613608-oAMIDkynSk.png', 'no', 0, 620, 81, '#20e52d', 'Aliquid placeat vel', 0, 91, 55, '#cdee38', 'no', 0, 72, 37, '#1d033d', 'yes', 0, 46, 86, '#042fa9', NULL, 50.00, 12, NULL, 97.00, '#fe84c8', 'Ut similique volupta', 80, 0, 82, 54, '#b914c5', 'Ad sit sunt volupta', 'uploads/certificate/1694613609-GsE0oQ06b0.jpg', 16, 74, 24, '#f4c2d3', 'Enim quo corrupti d', 0, 0, 67, '#a704d9', '/uploads/certificate/certificate-da391707-ed37-4954-a798-1a859ce0b49c.pdf', 'yes', 'hand', '2023-09-13 11:00:09', '2023-09-13 11:00:09', '6');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_by_instructors`
--

CREATE TABLE `certificate_by_instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `certificate_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `title_x_position` int(11) NOT NULL DEFAULT 0,
  `title_y_position` int(11) NOT NULL DEFAULT 0,
  `title_font_size` int(11) NOT NULL DEFAULT 20,
  `title_font_color` varchar(25) DEFAULT NULL,
  `body` mediumtext DEFAULT NULL,
  `body_max_length` int(11) NOT NULL DEFAULT 80,
  `body_x_position` int(11) NOT NULL DEFAULT 0,
  `body_y_position` int(11) NOT NULL DEFAULT 16,
  `body_font_size` int(11) NOT NULL DEFAULT 20,
  `body_font_color` varchar(25) DEFAULT NULL,
  `signature` varchar(191) DEFAULT NULL,
  `role_2_y_position` int(11) NOT NULL DEFAULT 10,
  `path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_thread_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `attachment` varchar(191) DEFAULT NULL,
  `seen_by_customer` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `chat_thread_id`, `user_id`, `sender_id`, `message`, `attachment`, `seen_by_customer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(123, 29, 5, NULL, 'Hi', NULL, 0, '2023-10-04 10:46:19', '2023-10-04 10:46:19', NULL),
(124, 29, 6, NULL, 'Hi', NULL, 0, '2023-10-04 10:46:42', '2023-10-04 10:46:42', NULL),
(125, 29, 6, NULL, 'heelo', NULL, 0, '2023-10-04 10:46:56', '2023-10-04 10:46:56', NULL),
(126, 29, 5, NULL, 'Hi', NULL, 0, '2023-10-04 10:47:53', '2023-10-04 10:47:53', NULL),
(127, 29, 6, NULL, 'hi', NULL, 0, '2023-10-04 10:48:01', '2023-10-04 10:48:01', NULL),
(128, 29, 5, NULL, 'd', NULL, 0, '2023-10-04 10:48:05', '2023-10-04 10:48:05', NULL),
(129, 29, 5, NULL, 'Hassan', NULL, 0, '2023-10-04 10:48:45', '2023-10-04 10:48:45', NULL),
(130, 29, 6, NULL, 'fdfd', NULL, 0, '2023-10-04 10:49:30', '2023-10-04 10:49:30', NULL),
(131, 29, 5, NULL, 'dfdf', NULL, 0, '2023-10-04 10:49:34', '2023-10-04 10:49:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incoming_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `outgoing_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `view` tinyint(4) DEFAULT 2 COMMENT '1=seen,2=not seen',
  `created_user_type` tinyint(4) DEFAULT NULL COMMENT '1=student,2=instructor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_threads`
--

CREATE TABLE `chat_threads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `last_message_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_threads`
--

INSERT INTO `chat_threads` (`id`, `user_id`, `sender_id`, `last_message_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 9, 5, '2023-10-04 10:49:34', '2023-10-04 10:03:30', '2023-10-04 10:49:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `governorate_id` varchar(191) NOT NULL,
  `city_name_ar` varchar(191) NOT NULL,
  `city_name_en` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `governorate_id`, `city_name_ar`, `city_name_en`, `created_at`, `updated_at`) VALUES
(1, '1', '15 مايو', '15 May', NULL, NULL),
(2, '1', 'الازبكية', 'Al Azbakeyah', NULL, NULL),
(3, '1', 'البساتين', 'Al Basatin', NULL, NULL),
(4, '1', 'التبين', 'Tebin', NULL, NULL),
(5, '1', 'الخليفة', 'El-Khalifa', NULL, NULL),
(6, '1', 'الدراسة', 'El darrasa', NULL, NULL),
(7, '1', 'الدرب الاحمر', 'Aldarb Alahmar', NULL, NULL),
(8, '1', 'الزاوية الحمراء', 'Zawya al-Hamra', NULL, NULL),
(9, '1', 'الزيتون', 'El-Zaytoun', NULL, NULL),
(10, '1', 'الساحل', 'Sahel', NULL, NULL),
(11, '1', 'السلام', 'El Salam', NULL, NULL),
(12, '1', 'السيدة زينب', 'Sayeda Zeinab', NULL, NULL),
(13, '1', 'الشرابية', 'El Sharabeya', NULL, NULL),
(14, '1', 'مدينة الشروق', 'Shorouk', NULL, NULL),
(15, '1', 'الظاهر', 'El Daher', NULL, NULL),
(16, '1', 'العتبة', 'Ataba', NULL, NULL),
(17, '1', 'القاهرة الجديدة', 'New Cairo', NULL, NULL),
(18, '1', 'المرج', 'El Marg', NULL, NULL),
(19, '1', 'عزبة النخل', 'Ezbet el Nakhl', NULL, NULL),
(20, '1', 'المطرية', 'Matareya', NULL, NULL),
(21, '1', 'المعادى', 'Maadi', NULL, NULL),
(22, '1', 'المعصرة', 'Maasara', NULL, NULL),
(23, '1', 'المقطم', 'Mokattam', NULL, NULL),
(24, '1', 'المنيل', 'Manyal', NULL, NULL),
(25, '1', 'الموسكى', 'Mosky', NULL, NULL),
(26, '1', 'النزهة', 'Nozha', NULL, NULL),
(27, '1', 'الوايلى', 'Waily', NULL, NULL),
(28, '1', 'باب الشعرية', 'Bab al-Shereia', NULL, NULL),
(29, '1', 'بولاق', 'Bolaq', NULL, NULL),
(30, '1', 'جاردن سيتى', 'Garden City', NULL, NULL),
(31, '1', 'حدائق القبة', 'Hadayek El-Kobba', NULL, NULL),
(32, '1', 'حلوان', 'Helwan', NULL, NULL),
(33, '1', 'دار السلام', 'Dar Al Salam', NULL, NULL),
(34, '1', 'شبرا', 'Shubra', NULL, NULL),
(35, '1', 'طره', 'Tura', NULL, NULL),
(36, '1', 'عابدين', 'Abdeen', NULL, NULL),
(37, '1', 'عباسية', 'Abaseya', NULL, NULL),
(38, '1', 'عين شمس', 'Ain Shams', NULL, NULL),
(39, '1', 'مدينة نصر', 'Nasr City', NULL, NULL),
(40, '1', 'مصر الجديدة', 'New Heliopolis', NULL, NULL),
(41, '1', 'مصر القديمة', 'Masr Al Qadima', NULL, NULL),
(42, '1', 'منشية ناصر', 'Mansheya Nasir', NULL, NULL),
(43, '1', 'مدينة بدر', 'Badr City', NULL, NULL),
(44, '1', 'مدينة العبور', 'Obour City', NULL, NULL),
(45, '1', 'وسط البلد', 'Cairo Downtown', NULL, NULL),
(46, '1', 'الزمالك', 'Zamalek', NULL, NULL),
(47, '1', 'قصر النيل', 'Kasr El Nile', NULL, NULL),
(48, '1', 'الرحاب', 'Rehab', NULL, NULL),
(49, '1', 'القطامية', 'Katameya', NULL, NULL),
(50, '1', 'مدينتي', 'Madinty', NULL, NULL),
(51, '1', 'روض الفرج', 'Rod Alfarag', NULL, NULL),
(52, '1', 'شيراتون', 'Sheraton', NULL, NULL),
(53, '1', 'الجمالية', 'El-Gamaleya', NULL, NULL),
(54, '1', 'العاشر من رمضان', '10th of Ramadan City', NULL, NULL),
(55, '1', 'الحلمية', 'Helmeyat Alzaytoun', NULL, NULL),
(56, '1', 'النزهة الجديدة', 'New Nozha', NULL, NULL),
(57, '1', 'العاصمة الإدارية', 'Capital New', NULL, NULL),
(58, '2', 'الجيزة', 'Giza', NULL, NULL),
(59, '2', 'السادس من أكتوبر', 'Sixth of October', NULL, NULL),
(60, '2', 'الشيخ زايد', 'Cheikh Zayed', NULL, NULL),
(61, '2', 'الحوامدية', 'Hawamdiyah', NULL, NULL),
(62, '2', 'البدرشين', 'Al Badrasheen', NULL, NULL),
(63, '2', 'الصف', 'Saf', NULL, NULL),
(64, '2', 'أطفيح', 'Atfih', NULL, NULL),
(65, '2', 'العياط', 'Al Ayat', NULL, NULL),
(66, '2', 'الباويطي', 'Al-Bawaiti', NULL, NULL),
(67, '2', 'منشأة القناطر', 'ManshiyetAl Qanater', NULL, NULL),
(68, '2', 'أوسيم', 'Oaseem', NULL, NULL),
(69, '2', 'كرداسة', 'Kerdasa', NULL, NULL),
(70, '2', 'أبو النمرس', 'Abu Nomros', NULL, NULL),
(71, '2', 'كفر غطاطي', 'Kafr Ghati', NULL, NULL),
(72, '2', 'منشأة البكاري', 'Manshiyet Al Bakari', NULL, NULL),
(73, '2', 'الدقى', 'Dokki', NULL, NULL),
(74, '2', 'العجوزة', 'Agouza', NULL, NULL),
(75, '2', 'الهرم', 'Haram', NULL, NULL),
(76, '2', 'الوراق', 'Warraq', NULL, NULL),
(77, '2', 'امبابة', 'Imbaba', NULL, NULL),
(78, '2', 'بولاق الدكرور', 'Boulaq Dakrour', NULL, NULL),
(79, '2', 'الواحات البحرية', 'Al Wahat Al Baharia', NULL, NULL),
(80, '2', 'العمرانية', 'Omraneya', NULL, NULL),
(81, '2', 'المنيب', 'Moneeb', NULL, NULL),
(82, '2', 'بين السرايات', 'Bin Alsarayat', NULL, NULL),
(83, '2', 'الكيت كات', 'Kit Kat', NULL, NULL),
(84, '2', 'المهندسين', 'Mohandessin', NULL, NULL),
(85, '2', 'فيصل', 'Faisal', NULL, NULL),
(86, '2', 'أبو رواش', 'Abu Rawash', NULL, NULL),
(87, '2', 'حدائق الأهرام', 'Hadayek Alahram', NULL, NULL),
(88, '2', 'الحرانية', 'Haraneya', NULL, NULL),
(89, '2', 'حدائق اكتوبر', 'Hadayek October', NULL, NULL),
(90, '2', 'صفط اللبن', 'Saft Allaban', NULL, NULL),
(91, '2', 'القرية الذكية', 'Smart Village', NULL, NULL),
(92, '2', 'ارض اللواء', 'Ard Ellwaa', NULL, NULL),
(93, '3', 'ابو قير', 'Abu Qir', NULL, NULL),
(94, '3', 'الابراهيمية', 'Al Ibrahimeyah', NULL, NULL),
(95, '3', 'الأزاريطة', 'Azarita', NULL, NULL),
(96, '3', 'الانفوشى', 'Anfoushi', NULL, NULL),
(97, '3', 'الدخيلة', 'Dekheila', NULL, NULL),
(98, '3', 'السيوف', 'El Soyof', NULL, NULL),
(99, '3', 'العامرية', 'Ameria', NULL, NULL),
(100, '3', 'اللبان', 'El Labban', NULL, NULL),
(101, '3', 'المفروزة', 'Al Mafrouza', NULL, NULL),
(102, '3', 'المنتزه', 'El Montaza', NULL, NULL),
(103, '3', 'المنشية', 'Mansheya', NULL, NULL),
(104, '3', 'الناصرية', 'Naseria', NULL, NULL),
(105, '3', 'امبروزو', 'Ambrozo', NULL, NULL),
(106, '3', 'باب شرق', 'Bab Sharq', NULL, NULL),
(107, '3', 'برج العرب', 'Bourj Alarab', NULL, NULL),
(108, '3', 'ستانلى', 'Stanley', NULL, NULL),
(109, '3', 'سموحة', 'Smouha', NULL, NULL),
(110, '3', 'سيدى بشر', 'Sidi Bishr', NULL, NULL),
(111, '3', 'شدس', 'Shads', NULL, NULL),
(112, '3', 'غيط العنب', 'Gheet Alenab', NULL, NULL),
(113, '3', 'فلمينج', 'Fleming', NULL, NULL),
(114, '3', 'فيكتوريا', 'Victoria', NULL, NULL),
(115, '3', 'كامب شيزار', 'Camp Shizar', NULL, NULL),
(116, '3', 'كرموز', 'Karmooz', NULL, NULL),
(117, '3', 'محطة الرمل', 'Mahta Alraml', NULL, NULL),
(118, '3', 'مينا البصل', 'Mina El-Basal', NULL, NULL),
(119, '3', 'العصافرة', 'Asafra', NULL, NULL),
(120, '3', 'العجمي', 'Agamy', NULL, NULL),
(121, '3', 'بكوس', 'Bakos', NULL, NULL),
(122, '3', 'بولكلي', 'Boulkly', NULL, NULL),
(123, '3', 'كليوباترا', 'Cleopatra', NULL, NULL),
(124, '3', 'جليم', 'Glim', NULL, NULL),
(125, '3', 'المعمورة', 'Al Mamurah', NULL, NULL),
(126, '3', 'المندرة', 'Al Mandara', NULL, NULL),
(127, '3', 'محرم بك', 'Moharam Bek', NULL, NULL),
(128, '3', 'الشاطبي', 'Elshatby', NULL, NULL),
(129, '3', 'سيدي جابر', 'Sidi Gaber', NULL, NULL),
(130, '3', 'الساحل الشمالي', 'North Coast/sahel', NULL, NULL),
(131, '3', 'الحضرة', 'Alhadra', NULL, NULL),
(132, '3', 'العطارين', 'Alattarin', NULL, NULL),
(133, '3', 'سيدي كرير', 'Sidi Kerir', NULL, NULL),
(134, '3', 'الجمرك', 'Elgomrok', NULL, NULL),
(135, '3', 'المكس', 'Al Max', NULL, NULL),
(136, '3', 'مارينا', 'Marina', NULL, NULL),
(137, '4', 'المنصورة', 'Mansoura', NULL, NULL),
(138, '4', 'طلخا', 'Talkha', NULL, NULL),
(139, '4', 'ميت غمر', 'Mitt Ghamr', NULL, NULL),
(140, '4', 'دكرنس', 'Dekernes', NULL, NULL),
(141, '4', 'أجا', 'Aga', NULL, NULL),
(142, '4', 'منية النصر', 'Menia El Nasr', NULL, NULL),
(143, '4', 'السنبلاوين', 'Sinbillawin', NULL, NULL),
(144, '4', 'الكردي', 'El Kurdi', NULL, NULL),
(145, '4', 'بني عبيد', 'Bani Ubaid', NULL, NULL),
(146, '4', 'المنزلة', 'Al Manzala', NULL, NULL),
(147, '4', 'تمي الأمديد', 'tami al\'amdid', NULL, NULL),
(148, '4', 'الجمالية', 'aljamalia', NULL, NULL),
(149, '4', 'شربين', 'Sherbin', NULL, NULL),
(150, '4', 'المطرية', 'Mataria', NULL, NULL),
(151, '4', 'بلقاس', 'Belqas', NULL, NULL),
(152, '4', 'ميت سلسيل', 'Meet Salsil', NULL, NULL),
(153, '4', 'جمصة', 'Gamasa', NULL, NULL),
(154, '4', 'محلة دمنة', 'Mahalat Damana', NULL, NULL),
(155, '4', 'نبروه', 'Nabroh', NULL, NULL),
(156, '5', 'الغردقة', 'Hurghada', NULL, NULL),
(157, '5', 'رأس غارب', 'Ras Ghareb', NULL, NULL),
(158, '5', 'سفاجا', 'Safaga', NULL, NULL),
(159, '5', 'القصير', 'El Qusiar', NULL, NULL),
(160, '5', 'مرسى علم', 'Marsa Alam', NULL, NULL),
(161, '5', 'الشلاتين', 'Shalatin', NULL, NULL),
(162, '5', 'حلايب', 'Halaib', NULL, NULL),
(163, '5', 'الدهار', 'Aldahar', NULL, NULL),
(164, '6', 'دمنهور', 'Damanhour', NULL, NULL),
(165, '6', 'كفر الدوار', 'Kafr El Dawar', NULL, NULL),
(166, '6', 'رشيد', 'Rashid', NULL, NULL),
(167, '6', 'إدكو', 'Edco', NULL, NULL),
(168, '6', 'أبو المطامير', 'Abu al-Matamir', NULL, NULL),
(169, '6', 'أبو حمص', 'Abu Homs', NULL, NULL),
(170, '6', 'الدلنجات', 'Delengat', NULL, NULL),
(171, '6', 'المحمودية', 'Mahmoudiyah', NULL, NULL),
(172, '6', 'الرحمانية', 'Rahmaniyah', NULL, NULL),
(173, '6', 'إيتاي البارود', 'Itai Baroud', NULL, NULL),
(174, '6', 'حوش عيسى', 'Housh Eissa', NULL, NULL),
(175, '6', 'شبراخيت', 'Shubrakhit', NULL, NULL),
(176, '6', 'كوم حمادة', 'Kom Hamada', NULL, NULL),
(177, '6', 'بدر', 'Badr', NULL, NULL),
(178, '6', 'وادي النطرون', 'Wadi Natrun', NULL, NULL),
(179, '6', 'النوبارية الجديدة', 'New Nubaria', NULL, NULL),
(180, '6', 'النوبارية', 'Alnoubareya', NULL, NULL),
(181, '7', 'الفيوم', 'Fayoum', NULL, NULL),
(182, '7', 'الفيوم الجديدة', 'Fayoum El Gedida', NULL, NULL),
(183, '7', 'طامية', 'Tamiya', NULL, NULL),
(184, '7', 'سنورس', 'Snores', NULL, NULL),
(185, '7', 'إطسا', 'Etsa', NULL, NULL),
(186, '7', 'إبشواي', 'Epschway', NULL, NULL),
(187, '7', 'يوسف الصديق', 'Yusuf El Sediaq', NULL, NULL),
(188, '7', 'الحادقة', 'Hadqa', NULL, NULL),
(189, '7', 'اطسا', 'Atsa', NULL, NULL),
(190, '7', 'الجامعة', 'Algamaa', NULL, NULL),
(191, '7', 'السيالة', 'Sayala', NULL, NULL),
(192, '8', 'طنطا', 'Tanta', NULL, NULL),
(193, '8', 'المحلة الكبرى', 'Al Mahalla Al Kobra', NULL, NULL),
(194, '8', 'كفر الزيات', 'Kafr El Zayat', NULL, NULL),
(195, '8', 'زفتى', 'Zefta', NULL, NULL),
(196, '8', 'السنطة', 'El Santa', NULL, NULL),
(197, '8', 'قطور', 'Qutour', NULL, NULL),
(198, '8', 'بسيون', 'Basion', NULL, NULL),
(199, '8', 'سمنود', 'Samannoud', NULL, NULL),
(200, '9', 'الإسماعيلية', 'Ismailia', NULL, NULL),
(201, '9', 'فايد', 'Fayed', NULL, NULL),
(202, '9', 'القنطرة شرق', 'Qantara Sharq', NULL, NULL),
(203, '9', 'القنطرة غرب', 'Qantara Gharb', NULL, NULL),
(204, '9', 'التل الكبير', 'El Tal El Kabier', NULL, NULL),
(205, '9', 'أبو صوير', 'Abu Sawir', NULL, NULL),
(206, '9', 'القصاصين الجديدة', 'Kasasien El Gedida', NULL, NULL),
(207, '9', 'نفيشة', 'Nefesha', NULL, NULL),
(208, '9', 'الشيخ زايد', 'Sheikh Zayed', NULL, NULL),
(209, '10', 'شبين الكوم', 'Shbeen El Koom', NULL, NULL),
(210, '10', 'مدينة السادات', 'Sadat City', NULL, NULL),
(211, '10', 'منوف', 'Menouf', NULL, NULL),
(212, '10', 'سرس الليان', 'Sars El-Layan', NULL, NULL),
(213, '10', 'أشمون', 'Ashmon', NULL, NULL),
(214, '10', 'الباجور', 'Al Bagor', NULL, NULL),
(215, '10', 'قويسنا', 'Quesna', NULL, NULL),
(216, '10', 'بركة السبع', 'Berkat El Saba', NULL, NULL),
(217, '10', 'تلا', 'Tala', NULL, NULL),
(218, '10', 'الشهداء', 'Al Shohada', NULL, NULL),
(219, '11', 'المنيا', 'Minya', NULL, NULL),
(220, '11', 'المنيا الجديدة', 'Minya El Gedida', NULL, NULL),
(221, '11', 'العدوة', 'El Adwa', NULL, NULL),
(222, '11', 'مغاغة', 'Magagha', NULL, NULL),
(223, '11', 'بني مزار', 'Bani Mazar', NULL, NULL),
(224, '11', 'مطاي', 'Mattay', NULL, NULL),
(225, '11', 'سمالوط', 'Samalut', NULL, NULL),
(226, '11', 'المدينة الفكرية', 'Madinat El Fekria', NULL, NULL),
(227, '11', 'ملوي', 'Meloy', NULL, NULL),
(228, '11', 'دير مواس', 'Deir Mawas', NULL, NULL),
(229, '11', 'ابو قرقاص', 'Abu Qurqas', NULL, NULL),
(230, '11', 'ارض سلطان', 'Ard Sultan', NULL, NULL),
(231, '12', 'بنها', 'Banha', NULL, NULL),
(232, '12', 'قليوب', 'Qalyub', NULL, NULL),
(233, '12', 'شبرا الخيمة', 'Shubra Al Khaimah', NULL, NULL),
(234, '12', 'القناطر الخيرية', 'Al Qanater Charity', NULL, NULL),
(235, '12', 'الخانكة', 'Khanka', NULL, NULL),
(236, '12', 'كفر شكر', 'Kafr Shukr', NULL, NULL),
(237, '12', 'طوخ', 'Tukh', NULL, NULL),
(238, '12', 'قها', 'Qaha', NULL, NULL),
(239, '12', 'العبور', 'Obour', NULL, NULL),
(240, '12', 'الخصوص', 'Khosous', NULL, NULL),
(241, '12', 'شبين القناطر', 'Shibin Al Qanater', NULL, NULL),
(242, '12', 'مسطرد', 'Mostorod', NULL, NULL),
(243, '13', 'الخارجة', 'El Kharga', NULL, NULL),
(244, '13', 'باريس', 'Paris', NULL, NULL),
(245, '13', 'موط', 'Mout', NULL, NULL),
(246, '13', 'الفرافرة', 'Farafra', NULL, NULL),
(247, '13', 'بلاط', 'Balat', NULL, NULL),
(248, '13', 'الداخلة', 'Dakhla', NULL, NULL),
(249, '14', 'السويس', 'Suez', NULL, NULL),
(250, '14', 'الجناين', 'Alganayen', NULL, NULL),
(251, '14', 'عتاقة', 'Ataqah', NULL, NULL),
(252, '14', 'العين السخنة', 'Ain Sokhna', NULL, NULL),
(253, '14', 'فيصل', 'Faysal', NULL, NULL),
(254, '15', 'أسوان', 'Aswan', NULL, NULL),
(255, '15', 'أسوان الجديدة', 'Aswan El Gedida', NULL, NULL),
(256, '15', 'دراو', 'Drau', NULL, NULL),
(257, '15', 'كوم أمبو', 'Kom Ombo', NULL, NULL),
(258, '15', 'نصر النوبة', 'Nasr Al Nuba', NULL, NULL),
(259, '15', 'كلابشة', 'Kalabsha', NULL, NULL),
(260, '15', 'إدفو', 'Edfu', NULL, NULL),
(261, '15', 'الرديسية', 'Al-Radisiyah', NULL, NULL),
(262, '15', 'البصيلية', 'Al Basilia', NULL, NULL),
(263, '15', 'السباعية', 'Al Sibaeia', NULL, NULL),
(264, '15', 'ابوسمبل السياحية', 'Abo Simbl Al Siyahia', NULL, NULL),
(265, '15', 'مرسى علم', 'Marsa Alam', NULL, NULL),
(266, '16', 'أسيوط', 'Assiut', NULL, NULL),
(267, '16', 'أسيوط الجديدة', 'Assiut El Gedida', NULL, NULL),
(268, '16', 'ديروط', 'Dayrout', NULL, NULL),
(269, '16', 'منفلوط', 'Manfalut', NULL, NULL),
(270, '16', 'القوصية', 'Qusiya', NULL, NULL),
(271, '16', 'أبنوب', 'Abnoub', NULL, NULL),
(272, '16', 'أبو تيج', 'Abu Tig', NULL, NULL),
(273, '16', 'الغنايم', 'El Ghanaim', NULL, NULL),
(274, '16', 'ساحل سليم', 'Sahel Selim', NULL, NULL),
(275, '16', 'البداري', 'El Badari', NULL, NULL),
(276, '16', 'صدفا', 'Sidfa', NULL, NULL),
(277, '17', 'بني سويف', 'Bani Sweif', NULL, NULL),
(278, '17', 'بني سويف الجديدة', 'Beni Suef El Gedida', NULL, NULL),
(279, '17', 'الواسطى', 'Al Wasta', NULL, NULL),
(280, '17', 'ناصر', 'Naser', NULL, NULL),
(281, '17', 'إهناسيا', 'Ehnasia', NULL, NULL),
(282, '17', 'ببا', 'beba', NULL, NULL),
(283, '17', 'الفشن', 'Fashn', NULL, NULL),
(284, '17', 'سمسطا', 'Somasta', NULL, NULL),
(285, '17', 'الاباصيرى', 'Alabbaseri', NULL, NULL),
(286, '17', 'مقبل', 'Mokbel', NULL, NULL),
(287, '18', 'بورسعيد', 'PorSaid', NULL, NULL),
(288, '18', 'بورفؤاد', 'Port Fouad', NULL, NULL),
(289, '18', 'العرب', 'Alarab', NULL, NULL),
(290, '18', 'حى الزهور', 'Zohour', NULL, NULL),
(291, '18', 'حى الشرق', 'Alsharq', NULL, NULL),
(292, '18', 'حى الضواحى', 'Aldawahi', NULL, NULL),
(293, '18', 'حى المناخ', 'Almanakh', NULL, NULL),
(294, '18', 'حى مبارك', 'Mubarak', NULL, NULL),
(295, '19', 'دمياط', 'Damietta', NULL, NULL),
(296, '19', 'دمياط الجديدة', 'New Damietta', NULL, NULL),
(297, '19', 'رأس البر', 'Ras El Bar', NULL, NULL),
(298, '19', 'فارسكور', 'Faraskour', NULL, NULL),
(299, '19', 'الزرقا', 'Zarqa', NULL, NULL),
(300, '19', 'السرو', 'alsaru', NULL, NULL),
(301, '19', 'الروضة', 'alruwda', NULL, NULL),
(302, '19', 'كفر البطيخ', 'Kafr El-Batikh', NULL, NULL),
(303, '19', 'عزبة البرج', 'Azbet Al Burg', NULL, NULL),
(304, '19', 'ميت أبو غالب', 'Meet Abou Ghalib', NULL, NULL),
(305, '19', 'كفر سعد', 'Kafr Saad', NULL, NULL),
(306, '20', 'الزقازيق', 'Zagazig', NULL, NULL),
(307, '20', 'العاشر من رمضان', 'Al Ashr Men Ramadan', NULL, NULL),
(308, '20', 'منيا القمح', 'Minya Al Qamh', NULL, NULL),
(309, '20', 'بلبيس', 'Belbeis', NULL, NULL),
(310, '20', 'مشتول السوق', 'Mashtoul El Souq', NULL, NULL),
(311, '20', 'القنايات', 'Qenaiat', NULL, NULL),
(312, '20', 'أبو حماد', 'Abu Hammad', NULL, NULL),
(313, '20', 'القرين', 'El Qurain', NULL, NULL),
(314, '20', 'ههيا', 'Hehia', NULL, NULL),
(315, '20', 'أبو كبير', 'Abu Kabir', NULL, NULL),
(316, '20', 'فاقوس', 'Faccus', NULL, NULL),
(317, '20', 'الصالحية الجديدة', 'El Salihia El Gedida', NULL, NULL),
(318, '20', 'الإبراهيمية', 'Al Ibrahimiyah', NULL, NULL),
(319, '20', 'ديرب نجم', 'Deirb Negm', NULL, NULL),
(320, '20', 'كفر صقر', 'Kafr Saqr', NULL, NULL),
(321, '20', 'أولاد صقر', 'Awlad Saqr', NULL, NULL),
(322, '20', 'الحسينية', 'Husseiniya', NULL, NULL),
(323, '20', 'صان الحجر القبلية', 'san alhajar alqablia', NULL, NULL),
(324, '20', 'منشأة أبو عمر', 'Manshayat Abu Omar', NULL, NULL),
(325, '21', 'الطور', 'Al Toor', NULL, NULL),
(326, '21', 'شرم الشيخ', 'Sharm El-Shaikh', NULL, NULL),
(327, '21', 'دهب', 'Dahab', NULL, NULL),
(328, '21', 'نويبع', 'Nuweiba', NULL, NULL),
(329, '21', 'طابا', 'Taba', NULL, NULL),
(330, '21', 'سانت كاترين', 'Saint Catherine', NULL, NULL),
(331, '21', 'أبو رديس', 'Abu Redis', NULL, NULL),
(332, '21', 'أبو زنيمة', 'Abu Zenaima', NULL, NULL),
(333, '21', 'رأس سدر', 'Ras Sidr', NULL, NULL),
(334, '22', 'كفر الشيخ', 'Kafr El Sheikh', NULL, NULL),
(335, '22', 'وسط البلد كفر الشيخ', 'Kafr El Sheikh Downtown', NULL, NULL),
(336, '22', 'دسوق', 'Desouq', NULL, NULL),
(337, '22', 'فوه', 'Fooh', NULL, NULL),
(338, '22', 'مطوبس', 'Metobas', NULL, NULL),
(339, '22', 'برج البرلس', 'Burg Al Burullus', NULL, NULL),
(340, '22', 'بلطيم', 'Baltim', NULL, NULL),
(341, '22', 'مصيف بلطيم', 'Masief Baltim', NULL, NULL),
(342, '22', 'الحامول', 'Hamol', NULL, NULL),
(343, '22', 'بيلا', 'Bella', NULL, NULL),
(344, '22', 'الرياض', 'Riyadh', NULL, NULL),
(345, '22', 'سيدي سالم', 'Sidi Salm', NULL, NULL),
(346, '22', 'قلين', 'Qellen', NULL, NULL),
(347, '22', 'سيدي غازي', 'Sidi Ghazi', NULL, NULL),
(348, '23', 'مرسى مطروح', 'Marsa Matrouh', NULL, NULL),
(349, '23', 'الحمام', 'El Hamam', NULL, NULL),
(350, '23', 'العلمين', 'Alamein', NULL, NULL),
(351, '23', 'الضبعة', 'Dabaa', NULL, NULL),
(352, '23', 'النجيلة', 'Al-Nagila', NULL, NULL),
(353, '23', 'سيدي براني', 'Sidi Brani', NULL, NULL),
(354, '23', 'السلوم', 'Salloum', NULL, NULL),
(355, '23', 'سيوة', 'Siwa', NULL, NULL),
(356, '23', 'مارينا', 'Marina', NULL, NULL),
(357, '23', 'الساحل الشمالى', 'North Coast', NULL, NULL),
(358, '24', 'الأقصر', 'Luxor', NULL, NULL),
(359, '24', 'الأقصر الجديدة', 'New Luxor', NULL, NULL),
(360, '24', 'إسنا', 'Esna', NULL, NULL),
(361, '24', 'طيبة الجديدة', 'New Tiba', NULL, NULL),
(362, '24', 'الزينية', 'Al ziynia', NULL, NULL),
(363, '24', 'البياضية', 'Al Bayadieh', NULL, NULL),
(364, '24', 'القرنة', 'Al Qarna', NULL, NULL),
(365, '24', 'أرمنت', 'Armant', NULL, NULL),
(366, '24', 'الطود', 'Al Tud', NULL, NULL),
(367, '25', 'قنا', 'Qena', NULL, NULL),
(368, '25', 'قنا الجديدة', 'New Qena', NULL, NULL),
(369, '25', 'ابو طشت', 'Abu Tesht', NULL, NULL),
(370, '25', 'نجع حمادي', 'Nag Hammadi', NULL, NULL),
(371, '25', 'دشنا', 'Deshna', NULL, NULL),
(372, '25', 'الوقف', 'Alwaqf', NULL, NULL),
(373, '25', 'قفط', 'Qaft', NULL, NULL),
(374, '25', 'نقادة', 'Naqada', NULL, NULL),
(375, '25', 'فرشوط', 'Farshout', NULL, NULL),
(376, '25', 'قوص', 'Quos', NULL, NULL),
(377, '26', 'العريش', 'Arish', NULL, NULL),
(378, '26', 'الشيخ زويد', 'Sheikh Zowaid', NULL, NULL),
(379, '26', 'نخل', 'Nakhl', NULL, NULL),
(380, '26', 'رفح', 'Rafah', NULL, NULL),
(381, '26', 'بئر العبد', 'Bir al-Abed', NULL, NULL),
(382, '26', 'الحسنة', 'Al Hasana', NULL, NULL),
(383, '27', 'سوهاج', 'Sohag', NULL, NULL),
(384, '27', 'سوهاج الجديدة', 'Sohag El Gedida', NULL, NULL),
(385, '27', 'أخميم', 'Akhmeem', NULL, NULL),
(386, '27', 'أخميم الجديدة', 'Akhmim El Gedida', NULL, NULL),
(387, '27', 'البلينا', 'Albalina', NULL, NULL),
(388, '27', 'المراغة', 'El Maragha', NULL, NULL),
(389, '27', 'المنشأة', 'almunsha\'a', NULL, NULL),
(390, '27', 'دار السلام', 'Dar AISalaam', NULL, NULL),
(391, '27', 'جرجا', 'Gerga', NULL, NULL),
(392, '27', 'جهينة الغربية', 'Jahina Al Gharbia', NULL, NULL),
(393, '27', 'ساقلته', 'Saqilatuh', NULL, NULL),
(394, '27', 'طما', 'Tama', NULL, NULL),
(395, '27', 'طهطا', 'Tahta', NULL, NULL),
(396, '27', 'الكوثر', 'Alkawthar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_room`
--

CREATE TABLE `class_room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `status` int(11) INVISIBLE DEFAULT 1,
  `course_id` bigint(20) DEFAULT NULL,
  `lesson_id` bigint(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `lecture_type` tinyint(4) DEFAULT 2 COMMENT '1=free/show, 2=paid/lock',
  `file_path` varchar(191) DEFAULT NULL,
  `url_path` varchar(191) DEFAULT NULL,
  `file_size` varchar(191) DEFAULT NULL,
  `file_duration` varchar(191) DEFAULT NULL,
  `file_duration_second` double DEFAULT NULL,
  `type` varchar(100) DEFAULT 'uploaded_video' COMMENT 'video, youtube, vimeo, text, image, pdf, slide_document, audio',
  `vimeo_upload_type` tinyint(4) DEFAULT 1 COMMENT '1=video file upload, 2=vimeo uploaded video id',
  `text` longtext DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `pdf` varchar(191) DEFAULT NULL,
  `slide_document` varchar(191) DEFAULT NULL,
  `audio` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_room`
--

INSERT INTO `class_room` (`id`, `uuid`, `name`, `level_id`, `status`, `course_id`, `lesson_id`, `department_id`, `title`, `lecture_type`, `file_path`, `url_path`, `file_size`, `file_duration`, `file_duration_second`, `type`, `vimeo_upload_type`, `text`, `image`, `pdf`, `slide_document`, `audio`, `created_at`, `updated_at`) VALUES
(9, NULL, 'فصل قرءان ثاني', NULL, 1, NULL, NULL, 13, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'uploaded_video', 1, NULL, NULL, NULL, NULL, NULL, '2023-10-06 06:20:10', '2023-10-06 06:20:47'),
(10, NULL, 'فصل حضانة اول', NULL, 1, NULL, NULL, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'uploaded_video', 1, NULL, NULL, NULL, NULL, NULL, '2023-10-06 06:21:02', '2023-10-06 06:21:02'),
(11, NULL, 'فصل حضانة ثاني', NULL, 1, NULL, NULL, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'uploaded_video', 1, NULL, NULL, NULL, NULL, NULL, '2023-10-06 06:21:15', '2023-10-06 06:35:22'),
(13, NULL, 'فصل هجاء ثاني', NULL, 1, NULL, NULL, 14, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'uploaded_video', 1, NULL, NULL, NULL, NULL, NULL, '2023-10-06 06:21:30', '2023-10-06 06:35:12'),
(14, NULL, 'فصل هجاء اول', NULL, 0, NULL, NULL, 14, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'uploaded_video', 1, NULL, NULL, NULL, NULL, NULL, '2023-10-06 06:21:40', '2023-10-10 11:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_room_id` bigint(20) DEFAULT NULL,
  `subject_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `class_room_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(2, 14, 2, NULL, NULL),
(4, 13, 1, NULL, NULL),
(5, 13, 2, NULL, NULL),
(6, 13, 3, NULL, NULL),
(7, 11, 2, NULL, NULL),
(8, 11, 3, NULL, NULL),
(9, 14, 1, NULL, NULL),
(10, 14, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_logos`
--

CREATE TABLE `client_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_logos`
--

INSERT INTO `client_logos` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Ovita', 'uploads_demo/client-logo/1.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'Vigon', 'uploads_demo/client-logo/2.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'Betribe', 'uploads_demo/client-logo/3.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, 'Parsit', 'uploads_demo/client-logo/4.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, 'Karika', 'uploads_demo/client-logo/5.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_slots`
--

CREATE TABLE `consultation_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `day` tinyint(4) NOT NULL COMMENT '0=sunday,1=monday,2=tuesday,3=wednesday,4=thursday,5=friday,6=saturday',
  `time` varchar(191) NOT NULL,
  `duration` varchar(191) NOT NULL,
  `hour_duration` varchar(191) NOT NULL,
  `minute_duration` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact_us_issue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `sender_type` varchar(255) DEFAULT NULL,
  `reciever_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `receiver_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_seen` varchar(255) DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contact_us_issue_id`, `message`, `sender_id`, `sender_type`, `reciever_id`, `subject`, `receiver_type`, `created_at`, `updated_at`, `is_seen`) VALUES
(1, 'ىث', 'بيبيب', 1, 'اهلا', 5, '2', 1, 'ترحيب', '1', NULL, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_issues`
--

CREATE TABLE `contact_us_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) NOT NULL,
  `name_en` varchar(191) NOT NULL,
  `name_fr` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `name_fr`, `code`, `created_at`, `updated_at`) VALUES
(1, 'أندورا', 'Andorra', 'Andorre', 'ad', NULL, NULL),
(2, 'الإمارات العربية المتحدة', 'United Arab Emirates', 'Emirats Arabes Unis', 'ae', NULL, NULL),
(3, 'أفغانستان', 'Afghanistan', 'L\'Afghanistan', 'af', NULL, NULL),
(4, 'أنتيغوا وبربودا', 'Antigua and Barbuda', 'Antigua-et-Barbuda', 'ag', NULL, NULL),
(5, 'أنغيلا', 'Anguilla', 'Anguilla', 'ai', NULL, NULL),
(6, 'ألبانيا', 'Albania', 'Albanie', 'al', NULL, NULL),
(7, 'أرمينيا', 'Armenia', 'Arménie', 'am', NULL, NULL),
(8, 'جزر الأنتيل الهولندية', 'Netherlands Antilles', 'Antilles néerlandaises', 'an', NULL, NULL),
(9, 'أنغولا', 'Angola', 'Angola', 'ao', NULL, NULL),
(10, 'الأرجنتين', 'Argentina', 'Argentine', 'ar', NULL, NULL),
(11, 'النمسا', 'Austria', 'L\'Autriche', 'at', NULL, NULL),
(12, 'أستراليا', 'Australia', 'Australie', 'au', NULL, NULL),
(13, 'أروبا', 'Aruba', 'Aruba', 'aw', NULL, NULL),
(14, 'أذربيجان', 'Azerbaijan', 'Azerbaïdjan', 'az', NULL, NULL),
(15, 'البوسنة والهرسك', 'Bosnia and Herzegovina', 'Bosnie Herzégovine', 'ba', NULL, NULL),
(16, 'بربادوس', 'Barbados', 'La Barbade', 'bb', NULL, NULL),
(17, 'بنغلاديش', 'Bangladesh', 'Bangladesh', 'bd', NULL, NULL),
(18, 'بلجيكا', 'Belgium', 'Belgique', 'be', NULL, NULL),
(19, 'بوركينا فاسو', 'Burkina Faso', 'Burkina Faso', 'bf', NULL, NULL),
(20, 'بلغاريا', 'Bulgaria', 'Bulgarie', 'bg', NULL, NULL),
(21, 'البحرين', 'Bahrain', 'Bahreïn', 'bh', NULL, NULL),
(22, 'بوروندي', 'Burundi', 'Burundi', 'bi', NULL, NULL),
(23, 'بنين', 'Benin', 'Bénin', 'bj', NULL, NULL),
(24, 'برمودا', 'Bermuda', 'Bermudes', 'bm', NULL, NULL),
(25, 'بروناي دار السلام', 'Brunei Darussalam', 'Brunei Darussalam', 'bn', NULL, NULL),
(26, 'بوليفيا', 'Bolivia', 'Bolivie', 'bo', NULL, NULL),
(27, 'البرازيل', 'Brazil', 'Brésil', 'br', NULL, NULL),
(28, 'الباهاما', 'Bahamas', 'Bahamas', 'bs', NULL, NULL),
(29, 'بوتان', 'Bhutan', 'Bhoutan', 'bt', NULL, NULL),
(30, 'بوتسوانا', 'Botswana', 'Botswana', 'bw', NULL, NULL),
(31, 'روسيا البيضاء', 'Belarus', 'Biélorussie', 'by', NULL, NULL),
(32, 'بليز', 'Belize', 'Belize', 'bz', NULL, NULL),
(33, 'كندا', 'Canada', 'Canada', 'ca', NULL, NULL),
(34, 'جزر كوكوس (كيلينغ)', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)', 'cc', NULL, NULL),
(35, 'جمهورية الكونغو الديموقراطية', 'Democratic Republic of the Congo', 'République Démocratique du Congo', 'cd', NULL, NULL),
(36, 'جمهورية افريقيا الوسطى', 'Central African Republic', 'République centrafricaine', 'cf', NULL, NULL),
(37, 'الكونغو', 'Congo', 'Congo', 'cg', NULL, NULL),
(38, 'سويسرا', 'Switzerland', 'Suisse', 'ch', NULL, NULL),
(39, 'ساحل العاج (ساحل العاج)', 'Cote D\'Ivoire (Ivory Coast)', 'Cote D\'Ivoire (Côte d\'Ivoire)', 'ci', NULL, NULL),
(40, 'جزر كوك', 'Cook Islands', 'les Îles Cook', 'ck', NULL, NULL),
(41, 'تشيلي', 'Chile', 'Chili', 'cl', NULL, NULL),
(42, 'الكاميرون', 'Cameroon', 'Cameroun', 'cm', NULL, NULL),
(43, 'الصين', 'China', 'Chine', 'cn', NULL, NULL),
(44, 'كولومبيا', 'Colombia', 'Colombie', 'co', NULL, NULL),
(45, 'كوستا ريكا', 'Costa Rica', 'Costa Rica', 'cr', NULL, NULL),
(46, 'كوبا', 'Cuba', 'Cuba', 'cu', NULL, NULL),
(47, 'الرأس الأخضر', 'Cape Verde', 'Cap-Vert', 'cv', NULL, NULL),
(48, 'جزيرة الكريسماس', 'Christmas Island', 'L\'île de noël', 'cx', NULL, NULL),
(49, 'قبرص', 'Cyprus', 'Chypre', 'cy', NULL, NULL),
(50, 'جمهورية التشيك', 'Czech Republic', 'République Tchèque', 'cz', NULL, NULL),
(51, 'ألمانيا', 'Germany', 'Allemagne', 'de', NULL, NULL),
(52, 'جيبوتي', 'Djibouti', 'Djibouti', 'dj', NULL, NULL),
(53, 'الدنمارك', 'Denmark', 'Danemark', 'dk', NULL, NULL),
(54, 'دومينيكا', 'Dominica', 'Dominique', 'dm', NULL, NULL),
(55, 'جمهورية الدومنيكان', 'Dominican Republic', 'République Dominicaine', 'do', NULL, NULL),
(56, 'الجزائر', 'Algeria', 'Algérie', 'dz', NULL, NULL),
(57, 'الإكوادور', 'Ecuador', 'L\'Équateur', 'ec', NULL, NULL),
(58, 'استونيا', 'Estonia', 'Estonie', 'ee', NULL, NULL),
(59, 'مصر', 'Egypt', 'Egypte', 'eg', NULL, NULL),
(60, 'الصحراء الغربية', 'Western Sahara', 'Sahara occidental', 'eh', NULL, NULL),
(61, 'إريتريا', 'Eritrea', 'Erythrée', 'er', NULL, NULL),
(62, 'إسبانيا', 'Spain', 'Espagne', 'es', NULL, NULL),
(63, 'أثيوبيا', 'Ethiopia', 'Ethiopie', 'et', NULL, NULL),
(64, 'فنلندا', 'Finland', 'Finlande', 'fi', NULL, NULL),
(65, 'فيجي', 'Fiji', 'Fidji', 'fj', NULL, NULL),
(66, 'جزر فوكلاند (مالفيناس)', 'Falkland Islands (Malvinas)', 'Iles Malouines (Malouines)', 'fk', NULL, NULL),
(67, 'ولايات ميكرونيزيا الموحدة', 'Federated States of Micronesia', 'États fédérés de Micronésie', 'fm', NULL, NULL),
(68, 'جزر صناعية', 'Faroe Islands', 'Îles Féroé', 'fo', NULL, NULL),
(69, 'فرنسا', 'France', 'France', 'fr', NULL, NULL),
(70, 'الغابون', 'Gabon', 'Gabon', 'ga', NULL, NULL),
(71, 'بريطانيا العظمى (المملكة المتحدة)', 'Great Britain (UK)', 'Grande-Bretagne (UK)', 'gb', NULL, NULL),
(72, 'غرينادا', 'Grenada', 'Grenade', 'gd', NULL, NULL),
(73, 'جورجيا', 'Georgia', 'Géorgie', 'ge', NULL, NULL),
(74, 'غيانا الفرنسية', 'French Guiana', 'Guinée Française', 'gf', NULL, NULL),
(75, 'لا شيء', 'NULL', 'NUL', 'gg', NULL, NULL),
(76, 'غانا', 'Ghana', 'Ghana', 'gh', NULL, NULL),
(77, 'جبل طارق', 'Gibraltar', 'Gibraltar', 'gi', NULL, NULL),
(78, 'الأرض الخضراء', 'Greenland', 'Groenland', 'gl', NULL, NULL),
(79, 'غامبيا', 'Gambia', 'Gambie', 'gm', NULL, NULL),
(80, 'غينيا', 'Guinea', 'Guinée', 'gn', NULL, NULL),
(81, 'جوادلوب', 'Guadeloupe', 'La guadeloupe', 'gp', NULL, NULL),
(82, 'غينيا الإستوائية', 'Equatorial Guinea', 'Guinée Équatoriale', 'gq', NULL, NULL),
(83, 'اليونان', 'Greece', 'Grèce', 'gr', NULL, NULL),
(84, 'جورجيا وجزر ساندويتش', 'S. Georgia and S. Sandwich Islands', 'Géorgie du Sud et les îles Sandwich du Sud', 'gs', NULL, NULL),
(85, 'غواتيمالا', 'Guatemala', 'Guatemala', 'gt', NULL, NULL),
(86, 'غينيا بيساو', 'Guinea-Bissau', 'Guinée-Bissau', 'gw', NULL, NULL),
(87, 'غيانا', 'Guyana', 'Guyane', 'gy', NULL, NULL),
(88, 'هونغ كونغ', 'Hong Kong', 'Hong Kong', 'hk', NULL, NULL),
(89, 'هندوراس', 'Honduras', 'Honduras', 'hn', NULL, NULL),
(90, 'كرواتيا (هرفاتسكا)', 'Croatia (Hrvatska)', 'Croatie (Hrvatska)', 'hr', NULL, NULL),
(91, 'هايتي', 'Haiti', 'Haïti', 'ht', NULL, NULL),
(92, 'اليونان', 'Hungary', 'Hongrie', 'hu', NULL, NULL),
(93, 'أندونيسيا', 'Indonesia', 'Indonésie', 'id', NULL, NULL),
(94, 'أيرلندا', 'Ireland', 'Irlande', 'ie', NULL, NULL),
(96, 'الهند', 'India', 'Inde', 'in', NULL, NULL),
(97, 'العراق', 'Iraq', 'Irak', 'iq', NULL, NULL),
(98, 'إيران', 'Iran', 'Iran', 'ir', NULL, NULL),
(99, 'أيسلندا', 'Iceland', 'Islande', 'is', NULL, NULL),
(100, 'إيطاليا', 'Italy', 'Italie', 'it', NULL, NULL),
(101, 'جامايكا', 'Jamaica', 'Jamaïque', 'jm', NULL, NULL),
(102, 'الأردن', 'Jordan', 'Jordan', 'jo', NULL, NULL),
(103, 'اليابان', 'Japan', 'Japon', 'jp', NULL, NULL),
(104, 'كينيا', 'Kenya', 'Kenya', 'ke', NULL, NULL),
(105, 'قرغيزستان', 'Kyrgyzstan', 'Kirghizistan', 'kg', NULL, NULL),
(106, 'كمبوديا', 'Cambodia', 'Cambodge', 'kh', NULL, NULL),
(107, 'كيريباس', 'Kiribati', 'Kiribati', 'ki', NULL, NULL),
(108, 'جزر القمر', 'Comoros', 'Comores', 'km', NULL, NULL),
(109, 'سانت كيتس ونيفيس', 'Saint Kitts and Nevis', 'Saint-Christophe-et-Niévès', 'kn', NULL, NULL),
(110, 'كوريا الشمالية', 'Korea (North)', 'Corée du Nord', 'kp', NULL, NULL),
(111, 'كوريا، جنوب)', 'Korea (South)', 'COREE DU SUD)', 'kr', NULL, NULL),
(112, 'الكويت', 'Kuwait', 'Koweit', 'kw', NULL, NULL),
(113, 'جزر كايمان', 'Cayman Islands', 'Îles Caïmans', 'ky', NULL, NULL),
(114, 'كازاخستان', 'Kazakhstan', 'Le kazakhstan', 'kz', NULL, NULL),
(115, 'لاوس', 'Laos', 'Laos', 'la', NULL, NULL),
(116, 'لبنان', 'Lebanon', 'Liban', 'lb', NULL, NULL),
(117, 'القديسة لوسيا', 'Saint Lucia', 'Sainte-Lucie', 'lc', NULL, NULL),
(118, 'ليختنشتاين', 'Liechtenstein', 'Le Liechtenstein', 'li', NULL, NULL),
(119, 'سيريلانكا', 'Sri Lanka', 'Sri Lanka', 'lk', NULL, NULL),
(120, 'ليبيريا', 'Liberia', 'Libéria', 'lr', NULL, NULL),
(121, 'ليسوتو', 'Lesotho', 'Lesotho', 'ls', NULL, NULL),
(122, 'ليتوانيا', 'Lithuania', 'Lituanie', 'lt', NULL, NULL),
(123, 'لوكسمبورغ', 'Luxembourg', 'Luxembourg', 'lu', NULL, NULL),
(124, 'لاتفيا', 'Latvia', 'Lettonie', 'lv', NULL, NULL),
(125, 'ليبيا', 'Libya', 'Libye', 'ly', NULL, NULL),
(126, 'المغرب', 'Morocco', 'Maroc', 'ma', NULL, NULL),
(127, 'موناكو', 'Monaco', 'Monaco', 'mc', NULL, NULL),
(128, 'مولدوفا', 'Moldova', 'La Moldavie', 'md', NULL, NULL),
(129, 'مدغشقر', 'Madagascar', 'Madagascar', 'mg', NULL, NULL),
(130, 'جزر مارشال', 'Marshall Islands', 'Iles Marshall', 'mh', NULL, NULL),
(131, 'مقدونيا', 'Macedonia', 'Macédoine', 'mk', NULL, NULL),
(132, 'مالي', 'Mali', 'Mali', 'ml', NULL, NULL),
(133, 'ميانمار', 'Myanmar', 'Myanmar', 'mm', NULL, NULL),
(134, 'منغوليا', 'Mongolia', 'Mongolie', 'mn', NULL, NULL),
(135, 'ماكاو', 'Macao', 'Macao', 'mo', NULL, NULL),
(136, 'جزر مريانا الشمالية', 'Northern Mariana Islands', 'Îles Mariannes du Nord', 'mp', NULL, NULL),
(137, 'مارتينيك', 'Martinique', 'Martinique', 'mq', NULL, NULL),
(138, 'موريتانيا', 'Mauritania', 'Mauritanie', 'mr', NULL, NULL),
(139, 'مونتسيرات', 'Montserrat', 'Montserrat', 'ms', NULL, NULL),
(140, 'مالطا', 'Malta', 'Malte', 'mt', NULL, NULL),
(141, 'موريشيوس', 'Mauritius', 'Maurice', 'mu', NULL, NULL),
(142, 'جزر المالديف', 'Maldives', 'Maldives', 'mv', NULL, NULL),
(143, 'مالاوي', 'Malawi', 'Malawi', 'mw', NULL, NULL),
(144, 'المكسيك', 'Mexico', 'Mexique', 'mx', NULL, NULL),
(145, 'ماليزيا', 'Malaysia', 'Malaisie', 'my', NULL, NULL),
(146, 'موزمبيق', 'Mozambique', 'Mozambique', 'mz', NULL, NULL),
(147, 'ناميبيا', 'Namibia', 'Namibie', 'na', NULL, NULL),
(148, 'كاليدونيا الجديدة', 'New Caledonia', 'Nouvelle Calédonie', 'nc', NULL, NULL),
(149, 'النيجر', 'Niger', 'Niger', 'ne', NULL, NULL),
(150, 'جزيرة نورفولك', 'Norfolk Island', 'l\'ile de Norfolk', 'nf', NULL, NULL),
(151, 'نيجيريا', 'Nigeria', 'Nigeria', 'ng', NULL, NULL),
(152, 'نيكاراغوا', 'Nicaragua', 'Nicaragua', 'ni', NULL, NULL),
(153, 'هولندا', 'Netherlands', 'Pays-Bas', 'nl', NULL, NULL),
(154, 'النرويج', 'Norway', 'Norvège', 'no', NULL, NULL),
(155, 'نيبال', 'Nepal', 'Népal', 'np', NULL, NULL),
(156, 'ناورو', 'Nauru', 'Nauru', 'nr', NULL, NULL),
(157, 'نيوي', 'Niue', 'Niue', 'nu', NULL, NULL),
(158, 'نيوزيلندا (اوتياروا)', 'New Zealand (Aotearoa)', 'Nouvelle-Zélande (Aotearoa)', 'nz', NULL, NULL),
(159, 'سلطنة عمان', 'Oman', 'Oman', 'om', NULL, NULL),
(160, 'بناما', 'Panama', 'Panama', 'pa', NULL, NULL),
(161, 'بيرو', 'Peru', 'Pérou', 'pe', NULL, NULL),
(162, 'بولينيزيا الفرنسية', 'French Polynesia', 'Polynésie française', 'pf', NULL, NULL),
(163, 'بابوا غينيا الجديدة', 'Papua New Guinea', 'Papouasie Nouvelle Guinée', 'pg', NULL, NULL),
(164, 'الفلبين', 'Philippines', 'Philippines', 'ph', NULL, NULL),
(165, 'باكستان', 'Pakistan', 'Pakistan', 'pk', NULL, NULL),
(166, 'بولندا', 'Poland', 'Pologne', 'pl', NULL, NULL),
(167, 'سانت بيير وميكلون', 'Saint Pierre and Miquelon', 'Saint Pierre et Miquelon', 'pm', NULL, NULL),
(168, 'بيتكيرن', 'Pitcairn', 'Pitcairn', 'pn', NULL, NULL),
(169, 'الأراضي الفلسطينية', 'Palestinian Territory', 'Territoire Palestinien', 'ps', NULL, NULL),
(170, 'البرتغال', 'Portugal', 'le Portugal', 'pt', NULL, NULL),
(171, 'بالاو', 'Palau', 'Palau', 'pw', NULL, NULL),
(172, 'باراغواي', 'Paraguay', 'Paraguay', 'py', NULL, NULL),
(173, 'دولة قطر', 'Qatar', 'Qatar', 'qa', NULL, NULL),
(174, 'جمع شمل', 'Reunion', 'Réunion', 're', NULL, NULL),
(175, 'رومانيا', 'Romania', 'Roumanie', 'ro', NULL, NULL),
(176, 'الاتحاد الروسي', 'Russian Federation', 'Fédération Russe', 'ru', NULL, NULL),
(177, 'رواندا', 'Rwanda', 'Rwanda', 'rw', NULL, NULL),
(178, 'المملكة العربية السعودية', 'Saudi Arabia', 'Arabie Saoudite', 'sa', NULL, NULL),
(179, 'جزر سليمان', 'Solomon Islands', 'Les îles Salomon', 'sb', NULL, NULL),
(180, 'سيشيل', 'Seychelles', 'les Seychelles', 'sc', NULL, NULL),
(181, 'سودان', 'Sudan', 'Soudan', 'sd', NULL, NULL),
(182, 'السويد', 'Sweden', 'Suède', 'se', NULL, NULL),
(183, 'سنغافورة', 'Singapore', 'Singapour', 'sg', NULL, NULL),
(184, 'سانت هيلانة', 'Saint Helena', 'Sainte Hélène', 'sh', NULL, NULL),
(185, 'سلوفينيا', 'Slovenia', 'La slovénie', 'si', NULL, NULL),
(186, 'سفالبارد وجان مايان', 'Svalbard and Jan Mayen', 'Svalbard et Jan Mayen', 'sj', NULL, NULL),
(187, 'سلوفاكيا', 'Slovakia', 'La slovaquie', 'sk', NULL, NULL),
(188, 'سيرا ليون', 'Sierra Leone', 'Sierra Leone', 'sl', NULL, NULL),
(189, 'سان مارينو', 'San Marino', 'Saint Marin', 'sm', NULL, NULL),
(190, 'السنغال', 'Senegal', 'Sénégal', 'sn', NULL, NULL),
(191, 'الصومال', 'Somalia', 'Somalie', 'so', NULL, NULL),
(192, 'سورينام', 'Suriname', 'Suriname', 'sr', NULL, NULL),
(193, 'ساو تومي وبرنسيبي', 'Sao Tome and Principe', 'Sao Tomé et Principe', 'st', NULL, NULL),
(194, 'السلفادور', 'El Salvador', 'Le Salvador', 'sv', NULL, NULL),
(195, 'سوريا', 'Syria', 'Syrie', 'sy', NULL, NULL),
(196, 'سوازيلاند', 'Swaziland', 'Swaziland', 'sz', NULL, NULL),
(197, 'جزر تركس وكايكوس', 'Turks and Caicos Islands', 'îles Turques-et-Caïques', 'tc', NULL, NULL),
(198, 'تشاد', 'Chad', 'Le tchad', 'td', NULL, NULL),
(199, 'المناطق الجنوبية لفرنسا', 'French Southern Territories', 'Terres australes françaises', 'tf', NULL, NULL),
(200, 'ليذهب', 'Togo', 'Aller', 'tg', NULL, NULL),
(201, 'تايلاند', 'Thailand', 'Thaïlande', 'th', NULL, NULL),
(202, 'طاجيكستان', 'Tajikistan', 'Tadjikistan', 'tj', NULL, NULL),
(203, 'توكيلاو', 'Tokelau', 'Tokelau', 'tk', NULL, NULL),
(204, 'تركمانستان', 'Turkmenistan', 'Turkménistan', 'tm', NULL, NULL),
(205, 'تونس', 'Tunisia', 'Tunisie', 'tn', NULL, NULL),
(206, 'تونغا', 'Tonga', 'Tonga', 'to', NULL, NULL),
(207, 'ديك رومي', 'Turkey', 'dinde', 'tr', NULL, NULL),
(208, 'ترينداد وتوباغو', 'Trinidad and Tobago', 'Trinité-et-Tobago', 'tt', NULL, NULL),
(209, 'توفالو', 'Tuvalu', 'Tuvalu', 'tv', NULL, NULL),
(210, 'تايوان', 'Taiwan', 'Taïwan', 'tw', NULL, NULL),
(211, 'تنزانيا', 'Tanzania', 'Tanzanie', 'tz', NULL, NULL),
(212, 'أوكرانيا', 'Ukraine', 'Ukraine', 'ua', NULL, NULL),
(213, 'أوغندا', 'Uganda', 'Ouganda', 'ug', NULL, NULL),
(214, 'أوروغواي', 'Uruguay', 'Uruguay', 'uy', NULL, NULL),
(215, 'أوزبكستان', 'Uzbekistan', 'Ouzbékistan', 'uz', NULL, NULL),
(216, 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les-Grenadines', 'vc', NULL, NULL),
(217, 'فنزويلا', 'Venezuela', 'Venezuela', 've', NULL, NULL),
(218, 'جزر العذراء البريطانية)', 'Virgin Islands (British)', 'Îles vierges britanniques', 'vg', NULL, NULL),
(219, 'جزر فيرجن (الولايات المتحدة)', 'Virgin Islands (U.S.)', 'Îles Vierges (États-Unis)', 'vi', NULL, NULL),
(220, 'فيتنام', 'Viet Nam', 'Viet Nam', 'vn', NULL, NULL),
(221, 'فانواتو', 'Vanuatu', 'Vanuatu', 'vu', NULL, NULL),
(222, 'واليس وفوتونا', 'Wallis and Futuna', 'Wallis et Futuna', 'wf', NULL, NULL),
(223, 'ساموا', 'Samoa', 'Samoa', 'ws', NULL, NULL),
(224, 'اليمن', 'Yemen', 'Yémen', 'ye', NULL, NULL),
(225, 'مايوت', 'Mayotte', 'Mayotte', 'yt', NULL, NULL),
(226, 'جنوب أفريقيا', 'South Africa', 'Afrique du Sud', 'za', NULL, NULL),
(227, 'زامبيا', 'Zambia', 'Zambie', 'zm', NULL, NULL),
(228, 'زائير (سابقة)', 'Zaire (former)', 'Zaïre (ancien)', 'zr', NULL, NULL),
(229, 'زيمبابوي', 'Zimbabwe', 'Zimbabwe', 'zw', NULL, NULL),
(230, 'الولايات المتحدة', 'United States of America', 'les États-Unis d\'Amérique', 'us', NULL, NULL),
(231, 'غير معروف', 'unknown', 'unknown', 'null', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `coupon_code_name` varchar(191) NOT NULL,
  `coupon_type` tinyint(4) NOT NULL COMMENT '1=Global,2=Instructor, 3=Course',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=activate, 0=deactivated',
  `creator_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'creator_id=user_id',
  `percentage` decimal(8,2) DEFAULT 0.00,
  `minimum_amount` int(11) DEFAULT NULL,
  `maximum_use_limit` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_courses`
--

CREATE TABLE `coupon_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_instructors`
--

CREATE TABLE `coupon_instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `subcategory_id` bigint(20) DEFAULT NULL,
  `course_language_id` bigint(20) DEFAULT NULL,
  `type` int(11) DEFAULT 1,
  `level_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `feature_details` mediumtext DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `learner_accessibility` varchar(50) DEFAULT NULL COMMENT 'paid,free',
  `image` varchar(191) DEFAULT NULL,
  `intro_video_check` tinyint(4) DEFAULT NULL COMMENT '1=normal video, 2=youtube_video',
  `video` varchar(191) DEFAULT NULL,
  `youtube_video_id` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=published, 2=waiting_for_review, 3=hold, 4=draft',
  `average_rating` decimal(8,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `students_count` int(11) DEFAULT NULL,
  `instructor_id` int(11) NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `subscription_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `uuid`, `user_id`, `category_id`, `subcategory_id`, `course_language_id`, `type`, `level_id`, `title`, `subtitle`, `description`, `feature_details`, `price`, `learner_accessibility`, `image`, `intro_video_check`, `video`, `youtube_video_id`, `slug`, `status`, `average_rating`, `created_at`, `updated_at`, `code`, `content`, `time_from`, `time`, `date`, `students_count`, `instructor_id`, `day`, `subject_id`, `department_id`, `subscription_id`) VALUES
(14, '1281f479-f7c9-4eab-ae13-0b947ee6f17f', 1, NULL, NULL, NULL, 1, NULL, 'Temporibus excepteur', NULL, NULL, NULL, 571.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, '2023-09-23 08:08:30', '2023-09-23 08:08:30', 'DA-650ec72eb2c26', 'Sit sunt voluptatib', NULL, '15:00:00', '2023-10-10', NULL, 7, 'Sun', 2, 12, NULL),
(10, '5e35db80-bd6f-4024-9b6c-57205d4fb35e', 1, 1, NULL, NULL, 1, NULL, 'Velit ut atque cons', NULL, NULL, NULL, 517.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, '2023-05-25 15:22:12', '2023-05-25 15:22:12', 'Dolorum et reiciendi', 'Nulla itaque sit en', '00:00:00', NULL, '1975-08-14', NULL, 6, 'Mon', NULL, NULL, NULL),
(11, '854ea133-c392-4e54-ac53-4eee971cab2a', 6, NULL, NULL, NULL, 1, NULL, 'Id qui maiores est', 'Nesciunt expedita m', 'Repellendus Aut duc', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, 'id-qui-maiores-est', 4, 0.00, '2023-07-09 12:45:02', '2023-07-09 12:45:02', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Fri', NULL, NULL, NULL),
(12, 'ffec4473-1d6c-4ce5-b0b9-fd9972dc54e0', 3, 1, NULL, NULL, 1, NULL, 'النون الساكنة', NULL, NULL, NULL, 100.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, '2023-07-15 14:46:57', '2023-07-15 14:46:57', NULL, 'أحكام النون الساكنة والتنوين', '00:00:00', NULL, '2023-08-01', NULL, 10, 'Sat', NULL, NULL, NULL),
(13, '572c37a9-ebbe-458e-8926-e6a649af7683', 1, NULL, NULL, NULL, 1, NULL, 'Natus elit numquam', NULL, NULL, NULL, 244.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, '2023-09-23 07:21:12', '2023-09-23 07:48:06', 'DA-650ec266ef005', 'Earum totam dolorum', NULL, '17:47:00', '2022-02-13', NULL, 11, 'Sun', 3, 14, NULL),
(15, '19259c60-46dc-485d-8fc5-4ab7a5a42375', 1, NULL, NULL, NULL, 1, NULL, 'Elit assumenda nisi', NULL, NULL, NULL, 92.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, '2023-09-23 08:08:43', '2023-09-23 08:08:43', 'DA-650ec73b6af2f', 'Et esse est sit mo', NULL, '15:00:00', '2023-10-10', NULL, 6, 'Sun', 3, 14, NULL),
(16, 'ee782e9e-1e8c-4af3-a3ff-34d8a64dcfb2', 1, NULL, NULL, NULL, 1, NULL, 'Debitis non omnis of', NULL, NULL, NULL, 82.00, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-09-23 08:18:55', '2023-09-23 08:18:55', 'DA-650ec99f69f91', 'Incidunt sit corrup', NULL, '06:04:00', '2022-10-08', NULL, 9, 'Sat', 4, 14, NULL),
(17, '5fd33632-53b4-49b3-ac18-423969f80c1b', 1, NULL, NULL, NULL, 0, NULL, 'Neque sunt eum prae', NULL, NULL, NULL, 673.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, '2023-09-26 08:00:13', '2023-10-09 05:55:45', 'DA-6523c01171dc3', 'Vitae amet nisi dol', NULL, '09:20:00', '1996-06-20', NULL, 14, 'Thu', 3, 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_languages`
--

CREATE TABLE `course_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_languages`
--

INSERT INTO `course_languages` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(1, 'e89b07ea-c62a-4910-a6d0-fd3ea8c7460f', 'English', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'c09f3669-835d-466c-b94b-c34724aeed0b', 'Bangla', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, '06c57e4e-4220-499f-80a6-e929c8698aab', 'Hindi', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, 'bc389d60-db6f-4c2e-b22c-8dbd1590c770', 'Spanish', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, '7ead9125-98b9-4b0d-b697-8d9b4ed4138b', 'Arabic', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `course_lecture_views`
--

CREATE TABLE `course_lecture_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `course_lecture_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_lessons`
--

CREATE TABLE `course_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `short_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_resources`
--

CREATE TABLE `course_resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `original_filename` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_tags`
--

CREATE TABLE `course_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_upload_rules`
--

CREATE TABLE `course_upload_rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_code` varchar(191) NOT NULL,
  `symbol` varchar(191) NOT NULL,
  `currency_placement` varchar(191) NOT NULL DEFAULT 'before' COMMENT 'before, after',
  `current_currency` varchar(191) NOT NULL DEFAULT 'no' COMMENT 'on, off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_code`, `symbol`, `currency_placement`, `current_currency`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 'before', 'on', NULL, NULL),
(2, 'BDT', '৳', 'before', 'off', NULL, NULL),
(3, 'INR', '₹', 'before', 'off', NULL, NULL),
(4, 'GBP', '£', 'after', 'off', NULL, NULL),
(5, 'MXN', '$', 'before', 'off', NULL, NULL),
(6, 'SAR', 'SR', 'before', 'off', NULL, NULL),
(7, 'TRY', '₺', 'after', 'off', NULL, NULL),
(8, 'ARS', '$', 'before', 'off', NULL, NULL),
(9, 'EUR', '€', 'before', 'off', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `is_feature` varchar(10) DEFAULT 'no' COMMENT 'yes, no',
  `slug` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `uuid`, `name`, `image`, `is_feature`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(12, '4dc87b02-f901-4a97-a7cf-4557c94bdc94', 'الحضانة', NULL, 'no', 'الحضانة', 1, '2023-08-15 06:47:17', '2023-08-15 06:47:17'),
(13, '6bd8f1d3-6d7a-4bb4-b54b-7bc53d4f4e59', 'القرآن', NULL, 'no', 'القرآن', 1, '2023-08-15 06:47:28', '2023-08-15 06:47:28'),
(14, 'aae851bf-b47a-46f7-a7ac-021f9733b7e8', 'الهجاء', NULL, 'no', 'الهجاء', 1, '2023-08-15 06:47:33', '2023-08-15 06:47:33'),
(21, '398387a5-2e71-4b14-8152-dd1c5bdf15f8', 'قسم رابع', NULL, 'no', NULL, 1, '2023-10-04 14:06:00', '2023-10-04 14:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `difficulty_levels`
--

CREATE TABLE `difficulty_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `difficulty_levels`
--

INSERT INTO `difficulty_levels` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(1, 'c5441407-3d0f-4fd8-9482-63245883eca2', 'Higher', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, '9b37da16-b761-4a50-9f06-595e49fe2cd8', 'Medium', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` longtext NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 2=deactivate',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment_as` tinyint(4) NOT NULL COMMENT '1=Instructor, 2=Student',
  `view` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=seen,2=not seen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_notification_settings`
--

CREATE TABLE `email_notification_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `updates_from_classes` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `updates_from_teacher_discussion` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `activity_on_your_project` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `activity_on_your_discussion_comment` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `reply_comment` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `new_follower` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `new_class_by_someone_you_follow` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `new_live_session` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `body` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive, 1-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `qualification` varchar(191) NOT NULL,
  `university` varchar(191) NOT NULL,
  `graduation_date` date NOT NULL,
  `national_id` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `birthdate` date NOT NULL,
  `job_title` varchar(191) NOT NULL,
  `department_id` varchar(191) NOT NULL,
  `salary_cycle` varchar(191) NOT NULL,
  `hiring_date` date NOT NULL,
  `work_days` int(11) NOT NULL,
  `branch_id` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `management` text NOT NULL,
  `departure_time` text NOT NULL,
  `attendance_time` text NOT NULL,
  `image` text DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 = pending,\r\n1 = active,\r\n2 = archive',
  `level` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `qualification`, `university`, `graduation_date`, `national_id`, `email`, `phone`, `birthdate`, `job_title`, `department_id`, `salary_cycle`, `hiring_date`, `work_days`, `branch_id`, `password`, `created_at`, `updated_at`, `management`, `departure_time`, `attendance_time`, `image`, `type`, `status`, `level`) VALUES
(10, 'Demetrius Pennington', 'Hic veritatis ut arc', 'Voluptatum aliquip e', 'Nobis expedita nulla', '1990-08-12', 'Et est non rerum sim', 'taxuzys@mailinator.com', '+1 (535) 388-7821', '1992-12-23', 'teacher', '14', 'monthly', '1989-09-08', 1, '1', '$2y$10$1FcZAOcojiS7v2QtqaKvXO5UbnhTTCUSeyi5B5AMwQQtv1Fxn7Xcm', '2023-05-18 10:35:54', '2023-10-06 10:09:53', 'teacher-management', '07:53', '07:53', '6', 'instructor', 3, '7'),
(24, 'Griffith Nelson', 'Quae deserunt volupt', 'Dolor culpa esse mo', 'Non vel quis sint s', '2006-03-22', 'Velit facere et modi', 'veviqutydu@mailinator.com', '+1 (974) 305-6496', '2013-11-23', 'driver', '13', 'weekly', '2015-10-31', 22, '2', NULL, '2023-09-24 19:37:43', '2023-09-24 19:37:43', 'teacher-management', '15:50', '13:45', NULL, 'driver', NULL, 'Natus deserunt dolor'),
(11, 'Kyra Curry', 'Expedita delectus d', 'Cumque dignissimos q', 'Sint nulla delectus', '1977-01-06', 'Sit reprehenderit ob', 'maxa@mailinator.com', '+1 (126) 852-7915', '2006-02-15', 'driver', 'Irure dignissimos di', 'weekly', '1990-08-02', 24, 'Irure sequi impedit', '$2y$10$DVomOZbFC5LDde37OkIFVOMMLjNxKi7LFpszPPaABrRpHgM.QhitK', '2023-05-18 10:38:26', '2023-05-18 10:38:26', 'teacher-management', '``', '2007-08-08', '7', NULL, 1, NULL),
(9, 'Hassan Salah', '12 Helwan', 'Very Good', 'Helwan', '2023-12-31', '0123456', 'hassanteacher@daralanwar.com', '01125525425', '2023-12-31', 'teacher', '12', 'monthly', '2023-12-31', 25, '1', '$2y$10$CXxsAkVKx1H6cZ8dLowv8eI/1CfLUmkIpA4bF3n1KmUvcEnjn.yZ6', '2023-05-17 14:29:34', '2023-10-04 08:54:55', 'teacher-management', '14:54', '16:54', '5', 'instructor', 1, '5'),
(12, 'Ishmael Howe', 'Omnis sunt unde a b', 'Mollit quia iusto id', 'Eum labore sit moles', '2004-03-07', 'Cum id culpa commod', 'qelyko@mailinator.com', '+1 (219) 804-7479', '2002-10-26', 'driver', 'Minus rerum maiores', 'weekly', '1970-07-16', 7, 'Esse fugiat autem v', '$2y$10$13xT5pYsfUXwtP3o2W0z6OQNL4KPxaoyljERaJoC0oUkYcNFoFVLG', '2023-05-29 15:27:30', '2023-05-29 15:27:30', 'teacher-management', '', '2009-02-25', '9', NULL, 1, NULL),
(13, 'Violet Orr', 'Saepe est ut similiq', 'Itaque excepturi ist', 'Ut autem aspernatur', '1993-05-12', 'Qui cum commodo ipsa', 'qysopuvuxe@mailinator.com', '+1 (769) 215-1739', '2014-09-09', 'driver', 'Est minima possimus', 'daily', '2011-09-18', 4, 'Et est mollitia nece', '$2y$10$EbEuzrwJyVNxAL9.RSZpCuwgRvMFpaE7yp8HDlNpXMQvxv8W1chQu', '2023-05-29 15:29:38', '2023-05-29 15:29:38', 'teacher-management', '', '1999-05-10', '', NULL, 1, NULL),
(14, 'Grant Hernandez', 'Velit inventore rep', 'Inventore consequunt', 'Ducimus dolor sit', '2015-02-02', 'Illo velit tenetur', 'hohocope@mailinator.com', '+1 (592) 535-8574', '2004-03-23', 'driver', 'Id eos sequi eos rer', 'monthly', '2010-10-03', 26, 'Ut voluptates debiti', '$2y$10$be2FZ7r22In5CMHxTcbs2O5Ed4XyveX9jan0GGZOc1ZMqeS7GKfxC', '2023-05-29 15:31:55', '2023-05-29 15:31:55', 'teacher-management', '', '1978-03-20', '', NULL, 1, NULL),
(15, 'Teegan Wolfe', 'Illum amet cumque', 'Eum ipsa sunt repre', 'Quae maiores non mol', '1975-09-05', 'Voluptatem voluptat', 'vida@mailinator.com', '+1 (472) 775-4437', '1994-10-13', 'driver', 'Totam dolor modi sun', 'daily', '1981-12-20', 1, 'Quam dignissimos ven', '$2y$10$9y.RuPHEfhSomqZkiqPQXuQC3X0k5sqsGayM2soDYdcaLZdIA7cwS', '2023-05-29 15:32:26', '2023-05-29 15:32:26', 'driver-management', '', '1993-04-18', '', NULL, 1, NULL),
(16, 'Wynter Valentine', 'Omnis saepe ea repre', 'Deleniti exercitatio', 'Fugiat error quasi', '2019-12-28', 'Eius dolore fuga Of', 'cizel@mailinator.com', '+1 (319) 794-2724', '1990-10-23', 'driver', 'Deleniti cumque labo', 'monthly', '2007-07-13', 13, 'Reiciendis doloremqu', '$2y$10$tJdrNvSpHr1DFM6M71uYvuoNziYGNakefF/OXFk/HKZG68N9IY/Qy', '2023-05-29 15:33:39', '2023-05-29 15:33:39', 'driver-management', '', '1981-05-07', '', 'driver', 1, NULL),
(18, 'Robin Jimenez', 'Dolorem quis et sint', 'Non eius et voluptat', 'Ducimus nemo quam u', '1972-05-22', 'Aut consequatur vel', 'webari@mailinator.com', '+1 (145) 518-3965', '1998-04-28', 'teacher', 'Fuga Incididunt ea', 'weekly', '2017-11-03', 1, 'Minima in et anim er', '$2y$10$aP8yuIcSnF3yFaOMdXUZD.kjQS6q7MG7R5D0x2ggUD.kjqcRV9M6C', '2023-07-11 17:19:34', '2023-08-09 09:33:03', 'teacher-management', '', '2022-01-19', '12', NULL, 2, NULL),
(19, 'مروة قناوي', 'ميتغمر', 'حاسبات ومعلومات', 'جامعة المنصورة', '2020-06-01', '098765432112345', 'marwakenawi20@gmail.com', '01014893908', '1996-06-06', 'teacher', '12', 'monthly', '2023-07-13', 6, '1', '$2y$10$ifMAdwYvWFSTTQfHs/kPweVRkTzXh5AkhBusdOacM1t5qjQ3U/MOe', '2023-07-13 16:20:22', '2023-10-06 10:11:03', 'teacher-management', '16:08', '16:11', '13', 'instructor', 3, '21'),
(20, 'Roary Lindsay', 'Velit consequatur n', 'Perspiciatis ex lab', 'Et ut voluptatum com', '2019-11-07', 'Dolore sed ipsum su', 'tugyhojan@mailinator.com', '+1 (678) 505-7786', '2015-12-10', 'teacher', '14', 'monthly', '1970-12-08', 10, '2', '$2y$10$UUCp/l.QsHIWb2tgeeQjSuHNPC5HKxjI1QdAVsVGMOqznLwymnxUu', '2023-09-19 09:36:57', '2023-09-19 09:36:57', 'teacher-management', '23:44', '17:06', '44', NULL, NULL, 'Inventore blanditiis'),
(21, 'Hollee Rollins', 'Eu dolore eaque sequ', 'Quod recusandae Vel', 'Eaque molestiae mole', '2009-04-29', 'Explicabo Nihil ips', 'luka@mailinator.com', '+1 (729) 504-3249', '1972-07-05', 'teacher', '12', 'daily', '2014-03-07', 4, '3', '$2y$10$/.W.ywt.Cui70FJrLMFwTuwiVMFm2KIpkAHWQsA9/D.k6jvpWEdwS', '2023-09-19 09:37:54', '2023-09-19 09:37:54', 'driver-management', '18:44', '23:03', '45', NULL, NULL, 'Et deserunt velit a'),
(22, 'Jade Bates', 'Sint architecto aut', 'Quo veniam tempor s', 'Expedita ea non enim', '1986-12-17', 'Ut laboriosam qui e', 'cubavemaq@mailinator.com', '+1 (277) 516-8148', '2014-02-19', 'teacher', '14', 'monthly', '1979-02-04', 1, '1', '$2y$10$8RjY0bjSQiunm5OnNeoDBOKPnKKyAkg7u6ojRvfMjIefyarIq.CSe', '2023-09-19 09:38:53', '2023-09-19 09:38:53', 'teacher-management', '11:19', '12:41', '46', 'instructor', NULL, 'Non magna laborum qu'),
(23, 'Murphy Lane', 'Velit non vero volu', 'Iure quos corporis q', 'Illo id aliquip eu q', '1976-07-04', 'Sequi ratione cupida', 'hoboza@mailinator.com', '+1 (956) 399-9614', '1979-04-23', 'teacher', '14', 'monthly', '2004-05-08', 7, '1', '$2y$10$aQAfp3gHG2yBV11XeTdabOZwPA3.mo6zNapGpoIk6iiGVLMB0rOFe', '2023-09-19 09:41:01', '2023-09-19 14:01:38', 'teacher-management', '07:53', '14:30', '47', 'instructor', NULL, 'Error excepturi accu'),
(25, 'Jescie Manning', 'Et earum tenetur lab', 'Reiciendis omnis et', 'Aliquip accusantium', '1994-01-24', 'Consequatur nobis qu', 'ziwoxek@mailinator.com', '+1 (607) 816-3482', '1985-06-05', 'teacher', '14', 'daily', '2015-11-20', 2, '3', '$2y$10$UzlqMaUlc1W.qhhPjnQjs.kiHxl44nsayhVDcKQQLhp9s11GpbJyG', '2023-09-24 19:39:32', '2023-09-24 19:39:33', 'driver-management', '18:54', '20:41', NULL, 'instructor', NULL, 'Corporis quis nisi d'),
(26, 'Burton Murphy', 'Vel quis aut sequi c', 'Aut laborum adipisic', 'Dolore ut dolorum su', '2018-04-29', 'Sed beatae similique', 'medowega@mailinator.com', '+1 (866) 831-5212', '1978-09-22', 'teacher', '13', 'weekly', '2012-09-08', 22, '1', '$2y$10$SK9/jp9G49h8Zhih1wsrEu8XsRbB3WULMSztCe52ROCR0KCuGPDOi', '2023-09-26 07:24:35', '2023-09-26 07:24:35', 'driver-management', '16:38', '22:26', '57', 'instructor', NULL, 'Quibusdam ullamco to');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `short_description` mediumtext DEFAULT NULL,
  `marks_per_question` int(11) NOT NULL DEFAULT 0,
  `duration` int(11) NOT NULL DEFAULT 0,
  `type` varchar(50) DEFAULT NULL COMMENT 'multiple_choice, true_false',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=unpublish, 1=published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `uuid`, `user_id`, `course_id`, `name`, `short_description`, `marks_per_question`, `duration`, `type`, `status`, `created_at`, `updated_at`) VALUES
(3, '97819720-0e23-4ff3-934f-b5891074945e', 3, NULL, 'اختبار النون الساكنة والتنوين', NULL, 0, 0, '', 1, '2023-07-15 14:53:10', '2023-09-25 13:14:11'),
(4, 'b5b41278-78e6-42ac-bca1-1c6d76854b10', 1, 1, 'Exam 1', NULL, 0, 0, NULL, 1, '2023-08-21 07:17:32', '2023-08-21 07:17:32'),
(5, '2991aca7-dbe0-4f76-b2be-beb2b4fa6fcc', 1, 2, 'اختلار 1', NULL, 0, 0, NULL, 1, '2023-09-26 07:43:03', '2023-09-26 07:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `exams_results`
--

CREATE TABLE `exams_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` varchar(191) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams_results`
--

INSERT INTO `exams_results` (`id`, `goal_id`, `student_id`, `exam_id`, `question_id`, `answer`, `notes`, `created_at`, `updated_at`) VALUES
(1, 11, 229, 3, 2, '74', 'Distinctio Totam es', '2023-09-24 09:16:06', '2023-09-24 09:16:06'),
(2, 11, 229, 3, 3, '38', 'Quis illum fugiat', '2023-09-24 09:16:07', '2023-09-24 09:16:07'),
(3, 11, 229, 3, 4, '81', 'Reiciendis consequat', '2023-09-24 09:16:07', '2023-09-24 09:16:07'),
(4, 11, 229, 3, 5, '0', 'Culpa accusantium te', '2023-09-24 09:16:07', '2023-09-24 09:16:07'),
(5, 11, 229, 3, 2, '74', 'Distinctio Totam es', '2023-09-24 09:16:31', '2023-09-24 09:16:31'),
(6, 11, 229, 3, 3, '38', 'Quis illum fugiat', '2023-09-24 09:16:31', '2023-09-24 09:16:31'),
(7, 11, 229, 3, 4, '81', 'Reiciendis consequat', '2023-09-24 09:16:31', '2023-09-24 09:16:31'),
(8, 11, 229, 3, 5, '0', 'Culpa accusantium te', '2023-09-24 09:16:31', '2023-09-24 09:16:31'),
(9, 11, 229, 3, 2, '74', 'Distinctio Totam es', '2023-09-24 10:01:03', '2023-09-24 10:01:03'),
(10, 11, 229, 3, 3, '38', 'Quis illum fugiat', '2023-09-24 10:01:03', '2023-09-24 10:01:03'),
(11, 11, 229, 3, 4, '81', 'Reiciendis consequat', '2023-09-24 10:01:03', '2023-09-24 10:01:03'),
(12, 11, 229, 3, 5, '0', 'Culpa accusantium te', '2023-09-24 10:01:03', '2023-09-24 10:01:03'),
(13, 11, 229, 3, 2, '74', 'Distinctio Totam es', '2023-09-24 10:01:21', '2023-09-24 10:01:21'),
(14, 11, 229, 3, 3, '38', 'Quis illum fugiat', '2023-09-24 10:01:21', '2023-09-24 10:01:21'),
(15, 11, 229, 3, 4, '81', 'Reiciendis consequat', '2023-09-24 10:01:21', '2023-09-24 10:01:21'),
(16, 11, 229, 3, 5, '0', 'Culpa accusantium te', '2023-09-24 10:01:21', '2023-09-24 10:01:21'),
(17, 12, 5, 2, 1, '10', NULL, '2023-09-24 10:08:46', '2023-09-24 10:08:46'),
(18, 12, 229, 2, 1, '10', NULL, '2023-09-24 10:08:51', '2023-09-24 10:08:51'),
(19, 10, 5, 3, 2, '69', 'Ipsa autem libero v', '2023-09-24 10:13:04', '2023-09-24 10:13:04'),
(20, 10, 5, 3, 3, '89', 'Sunt id commodi sed', '2023-09-24 10:13:04', '2023-09-24 10:13:04'),
(21, 10, 5, 3, 4, '81', 'Mollit culpa distinc', '2023-09-24 10:13:04', '2023-09-24 10:13:04'),
(22, 10, 5, 3, 5, '2', 'Iste aut blanditiis', '2023-09-24 10:13:04', '2023-09-24 10:13:04'),
(23, 10, 5, 3, 2, '69', 'Ipsa autem libero v', '2023-09-24 10:13:57', '2023-09-24 10:13:57'),
(24, 10, 5, 3, 3, '89', 'Sunt id commodi sed', '2023-09-24 10:13:57', '2023-09-24 10:13:57'),
(25, 10, 5, 3, 4, '81', 'Mollit culpa distinc', '2023-09-24 10:13:57', '2023-09-24 10:13:57'),
(26, 10, 5, 3, 5, '2', 'Iste aut blanditiis', '2023-09-24 10:13:57', '2023-09-24 10:13:57'),
(27, 9, 229, 3, 2, '59', 'Exercitation nesciun', '2023-09-24 10:14:27', '2023-09-24 10:14:27'),
(28, 9, 229, 3, 3, '8', 'Do fuga Eveniet et', '2023-09-24 10:14:27', '2023-09-24 10:14:27'),
(29, 9, 229, 3, 4, '67', 'Nihil totam consecte', '2023-09-24 10:14:27', '2023-09-24 10:14:27'),
(30, 9, 229, 3, 5, '2', 'Provident dolor con', '2023-09-24 10:14:27', '2023-09-24 10:14:27'),
(31, 19, 5, 3, 23, '2', NULL, '2023-09-25 13:14:59', '2023-09-25 13:14:59'),
(32, 19, 5, 3, 22, '23', NULL, '2023-09-25 13:14:59', '2023-09-25 13:14:59'),
(33, 19, 5, 3, 20, '3', NULL, '2023-09-25 13:14:59', '2023-09-25 13:14:59'),
(34, 19, 5, 3, 21, '3232', NULL, '2023-09-25 13:14:59', '2023-09-25 13:14:59'),
(35, 22, 5, 5, 24, '1', NULL, '2023-09-26 07:44:46', '2023-09-26 07:44:46'),
(36, 22, 5, 5, 25, '2', NULL, '2023-09-26 07:44:46', '2023-09-26 07:44:46'),
(37, 22, 5, 5, 26, '1222', NULL, '2023-09-26 07:44:46', '2023-09-26 07:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_questions`
--

INSERT INTO `faq_questions` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `financial_accounts`
--

CREATE TABLE `financial_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `trans_no` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_type` enum('income','expense') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_amount` decimal(10,2) DEFAULT NULL,
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT '1 = subscription\n2 = book\n3 = stores\n4 = normal',
  `model_id` int(11) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financial_accounts`
--

INSERT INTO `financial_accounts` (`id`, `date`, `trans_no`, `student_id`, `branch_id`, `name`, `description`, `amount`, `transaction_type`, `created_at`, `updated_at`, `user_id`, `last_amount`, `account`, `type`, `model_id`, `product_id`) VALUES
(1, '2023-09-09 02:00:00', '1395', NULL, 1, 'Catherine Reeves', 'دفع الاشتراك', 504.00, 'income', '2023-09-09 17:39:59', '2023-09-09 17:39:59', 1, 0.00, NULL, NULL, NULL, NULL),
(2, '2023-09-10 03:00:00', '6459', NULL, 2, 'Catherine Reeves', 'دفع الاشتراك', -504.00, 'expense', '2023-09-09 17:40:28', '2023-09-09 17:40:28', 1, 504.00, NULL, NULL, NULL, NULL),
(3, '2023-09-11 01:00:00', '2064', NULL, 3, 'Catherine Reeves', 'دفع الاشتراك', 504.00, 'income', '2023-09-09 17:40:56', '2023-09-09 17:40:56', 1, 504.00, NULL, NULL, NULL, NULL),
(40, '2023-10-05 15:48:00', '1607', NULL, 1, 'جديد', NULL, 20.00, 'income', '2023-10-05 09:48:55', '2023-10-05 09:48:55', 1, 20.00, NULL, NULL, NULL, NULL),
(41, '2023-10-05 18:53:00', '145', NULL, 1, '20', NULL, 20.00, 'income', '2023-10-05 09:53:13', '2023-10-05 09:53:13', 1, 20.00, NULL, NULL, NULL, NULL),
(42, '2023-10-05 23:00:00', '1683', NULL, 1, '50', NULL, 50.00, 'income', '2023-10-05 09:53:40', '2023-10-05 09:53:40', 1, 50.00, NULL, NULL, NULL, NULL),
(43, '2023-10-04 16:13:00', '39de50d6-83ac-47fa-adea-6e9509a7c7e8', NULL, 1, 'Hassan Salah', NULL, 7.00, 'income', '2023-10-05 10:14:14', '2023-10-05 10:14:14', 1, 7.00, NULL, NULL, NULL, NULL),
(44, '2023-10-05 00:00:00', '2700', NULL, 1, 'حسن صلاح الدين حسن', 'دفع الاشتراك', 100.00, 'income', '2023-10-05 11:59:18', '2023-10-05 11:59:18', 1, 100.00, NULL, NULL, NULL, NULL),
(45, '2023-10-05 00:00:00', '9568', NULL, 1, 'حسن صلاح الدين حسن', 'دفع الاشتراك', 100.00, 'income', '2023-10-05 15:41:32', '2023-10-05 15:41:32', 1, 200.00, NULL, NULL, NULL, NULL),
(46, '2023-10-06 00:00:00', '8340', NULL, 1, 'شراء منتجات', 'شراء منتجات', 3000.00, 'income', NULL, '2023-10-05 22:13:39', 1, 200.00, 'خالد اشرف', NULL, NULL, '[\"13\",\"12\"]'),
(48, '2023-10-06 01:27:29', '3639', NULL, 1, 'بيع منتجات', 'بيع منتجات', -100.00, 'expense', NULL, '2023-10-05 22:27:29', 1, 200.00, '236', NULL, NULL, '[\"13\"]'),
(49, '2023-10-06 08:28:54', '5194', NULL, 1, 'بيع منتجات', 'بيع منتجات', -100.00, 'expense', NULL, '2023-10-06 05:28:54', 1, 200.00, '5', NULL, NULL, '[\"13\"]'),
(50, '2023-10-10 11:47:11', '5688', NULL, 1, 'بيع منتجات', 'بيع منتجات', -63406.00, 'income', NULL, '2023-10-10 08:47:11', 1, 200.00, '5', '[2]', NULL, '[\"12\"]'),
(51, '2023-10-10 14:07:06', '1650', NULL, 1, 'بيع منتجات', 'بيع منتجات', -1.00, 'income', NULL, '2023-10-10 11:07:06', 1, 200.00, '5', '[3]', NULL, '[\"21\"]'),
(52, '2023-10-10 15:01:46', '9919', NULL, 1, 'بيع منتجات', 'بيع منتجات', -2.00, 'income', NULL, '2023-10-10 12:01:46', 1, 200.00, '5', '[3]', NULL, '[\"21\"]');

-- --------------------------------------------------------

--
-- Table structure for table `followups`
--

CREATE TABLE `followups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) DEFAULT NULL,
  `class_id` bigint(20) DEFAULT NULL,
  `subject_id` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0-inactive 1-active',
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_number` bigint(20) DEFAULT NULL,
  `time_working` datetime DEFAULT NULL,
  `observer` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followups`
--

INSERT INTO `followups` (`id`, `instructor_id`, `class_id`, `subject_id`, `status`, `type`, `created_at`, `updated_at`, `class_number`, `time_working`, `observer`, `date`) VALUES
(5, 10, 1, 1, 1, 1, '2023-09-23 13:24:21', '2023-09-23 14:03:27', 707, '1993-09-17 22:10:00', 10, '2007-08-05 00:00:00'),
(6, 6, 1, 3, NULL, 2, '2023-09-23 13:24:44', '2023-09-23 13:24:44', 205, '2011-04-16 18:40:00', 10, '1975-01-06 00:00:00'),
(7, 6, 2, 1, NULL, 3, '2023-09-23 13:24:56', '2023-09-23 13:24:56', 314, '1985-09-10 03:16:00', 6, '2000-03-03 00:00:00'),
(8, 6, 1, 4, 1, 2, '2023-09-23 13:37:06', '2023-09-25 05:54:14', 573, '2022-03-23 17:44:00', 10, '1987-10-24 00:00:00'),
(9, 6, 2, 2, 0, 3, '2023-09-23 13:41:54', '2023-09-25 05:54:10', 972, '2021-10-20 12:48:00', 6, '1983-01-23 00:00:00'),
(10, 6, 2, 1, NULL, 3, '2023-09-25 05:54:46', '2023-09-25 05:54:46', 13, '2023-09-25 04:54:00', 6, '2023-09-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `followup_questions`
--

CREATE TABLE `followup_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `followup_id` varchar(255) DEFAULT NULL,
  `questions` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followup_questions`
--

INSERT INTO `followup_questions` (`id`, `followup_id`, `questions`, `type`, `created_at`, `updated_at`) VALUES
(1, 'follow_up_teacher', 'follow_up_teacher', 'follow_up_teacher', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `followup_responses`
--

CREATE TABLE `followup_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `followup_id` int(11) DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followup_responses`
--

INSERT INTO `followup_responses` (`id`, `question`, `followup_id`, `response`, `created_at`, `updated_at`) VALUES
(71, 'organizing_students_seating_and_bags', 4, 'Quod saepe illo sed', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(72, 'fairness_in_distributing_shares', 4, 'Ullam rerum proident', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(73, 'attract_the_attention_of_all_students', 4, 'Eiusmod excepturi oc', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(74, 'how_well_you_manage_time', 4, 'Sed ut sit velit nob', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(75, 'how_well_the_means_are_used', 4, 'Aut quam cum non mai', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(76, 'how_the_teacher_manages_the_evaluation_by_reviewing', 4, 'Quia molestiae est r', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(77, 'general_comments_about_students_level_of_review', 4, 'Enim atque repellend', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(78, 'how_well_it_introduces_the_new_and_links_with_previous_lessons', 4, 'Facere quaerat adipi', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(79, 'the_adequacy_of_explaining_the_new_lesson_and_the_variety_of_examples', 4, 'Enim totam id rerum', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(80, 'how_the_teacher_evaluates_the_level_of_students_understanding_of_the_new_lesson', 4, 'Nam tempore rerum o', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(81, 'feedback_on_students_understanding_of_the_new_lesson', 4, 'Voluptas laborum De', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(82, 'notes_about_the_level_of_some_students_and_their_notebooks', 4, 'Voluptatem Aut expl', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(83, 'teachers_comment', 4, 'Dolore rerum maxime', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(84, 'supervisor_recommendations', 4, 'Proident quis aute', '2023-09-23 13:16:54', '2023-09-23 13:16:54'),
(85, 'organizing_students_seating_and_bags', 5, 'Iusto nostrud ipsum', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(86, 'fairness_in_distributing_shares', 5, 'Quis alias ipsum dol', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(87, 'attract_the_attention_of_all_students', 5, 'Doloremque quo qui e', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(88, 'how_well_you_manage_time', 5, 'Expedita hic ea quo', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(89, 'how_well_the_means_are_used', 5, 'Sed nostrum quos in', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(90, 'how_the_teacher_manages_the_evaluation_by_reviewing', 5, 'Laudantium enim sap', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(91, 'general_comments_about_students_level_of_review', 5, 'Quasi eveniet quisq', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(92, 'how_well_it_introduces_the_new_and_links_with_previous_lessons', 5, 'Aut velit quasi est', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(93, 'the_adequacy_of_explaining_the_new_lesson_and_the_variety_of_examples', 5, 'Deserunt facere offi', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(94, 'how_the_teacher_evaluates_the_level_of_students_understanding_of_the_new_lesson', 5, 'Et magnam impedit d', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(95, 'feedback_on_students_understanding_of_the_new_lesson', 5, 'Aliqua Eaque proide', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(96, 'notes_about_the_level_of_some_students_and_their_notebooks', 5, 'Quibusdam eum deseru', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(97, 'teachers_comment', 5, 'Amet Nam aut offici', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(98, 'supervisor_recommendations', 5, 'Et qui aspernatur ni', '2023-09-23 13:24:21', '2023-09-23 13:24:21'),
(99, 'organizing_students_seating_and_bags', 6, 'Omnis ut voluptatem', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(100, 'fairness_in_distributing_shares', 6, 'Omnis minus et corpo', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(101, 'attract_the_attention_of_all_students', 6, 'Cupidatat architecto', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(102, 'how_well_you_manage_time', 6, 'Sint at culpa inci', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(103, 'how_well_the_means_are_used', 6, 'Sed est enim possim', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(104, 'how_the_teacher_manages_the_evaluation_by_reviewing', 6, 'Repudiandae officiis', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(105, 'general_comments_about_students_level_of_review', 6, 'Nostrum iure reprehe', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(106, 'how_well_it_introduces_the_new_and_links_with_previous_lessons', 6, 'Aut facere nihil aut', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(107, 'the_adequacy_of_explaining_the_new_lesson_and_the_variety_of_examples', 6, 'Iusto ipsum assumend', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(108, 'how_the_teacher_evaluates_the_level_of_students_understanding_of_the_new_lesson', 6, 'Sit provident inci', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(109, 'feedback_on_students_understanding_of_the_new_lesson', 6, 'Alias tempora fugit', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(110, 'notes_about_the_level_of_some_students_and_their_notebooks', 6, 'Tempora aliqua Iure', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(111, 'teachers_comment', 6, 'Non aute sapiente ac', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(112, 'supervisor_recommendations', 6, 'Cumque quae quis dol', '2023-09-23 13:24:44', '2023-09-23 13:24:44'),
(113, 'adherence_to_the_recitation_plan_and_the_amount_of_review_scheduled_for_the_students_records', 7, 'Tenetur adipisicing', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(114, 'proficiency_in_identifying_students_errors_during_listening_and_addressing_those_errors', 7, 'Repudiandae id aut', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(115, 'monitoring_students_regularity_and_attendance_on_time_and_following_up_on_absent_students', 7, 'Elit assumenda qui', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(116, 'commitment_to_restricting_grants_to_students_who_are_on_leave_and_at_the_levels_specified_for_the_leave', 7, 'Aliquid qui iste con', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(117, 'proficiency_among_those_who_have_weakness_in_reading_and_intonation', 7, 'Eum alias deserunt a', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(118, 'which_archives_exist_for_more_than_two_cycles_for_the_entire_archive', 7, 'Accusamus culpa lab', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(119, 'notes_about_the_level_of_some_students_and_their_notebookt', 7, 'Neque nostrud illum', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(120, 'teachers_comment', 7, 'Dolorem aut voluptat', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(121, 'supervisor_recommendations', 7, 'Repellendus Optio', '2023-09-23 13:24:56', '2023-09-23 13:24:56'),
(122, 'organizing_students_seating_and_bags', 8, 'Commodi suscipit ad', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(123, 'fairness_in_distributing_shares', 8, 'Dolorum inventore al', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(124, 'attract_the_attention_of_all_students', 8, 'Quo nihil dolores od', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(125, 'how_well_you_manage_time', 8, 'Magni voluptatum ips', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(126, 'how_well_the_means_are_used', 8, 'Illum ea sed dolore', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(127, 'how_the_teacher_manages_the_evaluation_by_reviewing', 8, 'Laborum Dolore maio', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(128, 'general_comments_about_students_level_of_review', 8, 'Non incididunt minus', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(129, 'how_well_it_introduces_the_new_and_links_with_previous_lessons', 8, 'Culpa nulla et volup', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(130, 'the_adequacy_of_explaining_the_new_lesson_and_the_variety_of_examples', 8, 'Qui lorem facilis co', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(131, 'how_the_teacher_evaluates_the_level_of_students_understanding_of_the_new_lesson', 8, 'Quo maxime culpa dis', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(132, 'feedback_on_students_understanding_of_the_new_lesson', 8, 'Maiores aut consecte', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(133, 'notes_about_the_level_of_some_students_and_their_notebooks', 8, 'Quibusdam voluptatem', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(134, 'teachers_comment', 8, 'Et amet recusandae', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(135, 'supervisor_recommendations', 8, 'Obcaecati minima dol', '2023-09-23 13:37:06', '2023-09-23 13:37:06'),
(136, 'adherence_to_the_recitation_plan_and_the_amount_of_review_scheduled_for_the_students_records', 9, 'Quo quia necessitati', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(137, 'proficiency_in_identifying_students_errors_during_listening_and_addressing_those_errors', 9, 'Aut mollitia qui lab', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(138, 'monitoring_students_regularity_and_attendance_on_time_and_following_up_on_absent_students', 9, 'Ut doloribus volupta', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(139, 'commitment_to_restricting_grants_to_students_who_are_on_leave_and_at_the_levels_specified_for_the_leave', 9, 'Provident voluptas', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(140, 'proficiency_among_those_who_have_weakness_in_reading_and_intonation', 9, 'Illum nesciunt qua', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(141, 'which_archives_exist_for_more_than_two_cycles_for_the_entire_archive', 9, 'Inventore quis quis', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(142, 'notes_about_the_level_of_some_students_and_their_notebookt', 9, 'Magna quod aspernatu', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(143, 'teachers_comment', 9, 'Autem illum ducimus', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(144, 'supervisor_recommendations', 9, 'Ex enim in in omnis', '2023-09-23 13:41:54', '2023-09-23 13:41:54'),
(145, 'adherence_to_the_recitation_plan_and_the_amount_of_review_scheduled_for_the_students_records', 10, 'Quo quia necessitati', '2023-09-25 05:54:46', '2023-09-25 05:54:46'),
(146, 'proficiency_in_identifying_students_errors_during_listening_and_addressing_those_errors', 10, 'Aut mollitia qui lab', '2023-09-25 05:54:46', '2023-09-25 05:54:46'),
(147, 'monitoring_students_regularity_and_attendance_on_time_and_following_up_on_absent_students', 10, 'Ut doloribus volupta', '2023-09-25 05:54:46', '2023-09-25 05:54:46'),
(148, 'commitment_to_restricting_grants_to_students_who_are_on_leave_and_at_the_levels_specified_for_the_leave', 10, 'Provident voluptas', '2023-09-25 05:54:46', '2023-09-25 05:54:46'),
(149, 'proficiency_among_those_who_have_weakness_in_reading_and_intonation', 10, 'Illum nesciunt qua', '2023-09-25 05:54:46', '2023-09-25 05:54:46'),
(150, 'which_archives_exist_for_more_than_two_cycles_for_the_entire_archive', 10, 'Inventore quis quis', '2023-09-25 05:54:46', '2023-09-25 05:54:46'),
(151, 'notes_about_the_level_of_some_students_and_their_notebookt', 10, 'Magna quod aspernatu', '2023-09-25 05:54:46', '2023-09-25 05:54:46'),
(152, 'teachers_comment', 10, 'Autem illum ducimus', '2023-09-25 05:54:46', '2023-09-25 05:54:46'),
(153, 'supervisor_recommendations', 10, 'Ex enim in in omnis', '2023-09-25 05:54:46', '2023-09-25 05:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `title` varchar(191) NOT NULL,
  `subtitle` varchar(191) NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text NOT NULL,
  `forum_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `total_seen` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_post_comments`
--

CREATE TABLE `forum_post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `forum_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` longtext NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `target_evaluation_date` date DEFAULT NULL,
  `test_description` longtext DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_room_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `name`, `target_evaluation_date`, `test_description`, `instructor_id`, `subject_id`, `class_room_id`, `date`, `exam_id`, `created_at`, `updated_at`, `department_id`, `course_id`) VALUES
(1, NULL, NULL, NULL, 10, NULL, 1, NULL, 2, NULL, '2023-09-24 07:14:41', NULL, NULL),
(2, NULL, NULL, NULL, 10, NULL, 1, NULL, 2, NULL, '2023-09-24 07:14:53', NULL, NULL),
(3, NULL, NULL, NULL, 10, NULL, 1, NULL, 2, NULL, '2023-09-24 07:14:53', NULL, NULL),
(4, NULL, NULL, NULL, 10, NULL, 1, NULL, 2, NULL, '2023-09-24 07:15:04', NULL, NULL),
(5, NULL, NULL, NULL, 10, NULL, 1, NULL, 2, NULL, '2023-09-24 07:15:04', NULL, NULL),
(6, NULL, NULL, NULL, 10, NULL, 1, NULL, 2, NULL, '2023-09-24 07:15:40', NULL, NULL),
(7, NULL, NULL, NULL, 10, NULL, 1, NULL, 3, NULL, '2023-09-24 07:15:40', NULL, NULL),
(8, '23', NULL, NULL, 10, NULL, 1, NULL, 2, NULL, '2023-09-24 07:15:49', NULL, NULL),
(9, '23', NULL, NULL, 10, NULL, 1, NULL, 3, NULL, '2023-09-24 07:15:49', NULL, NULL),
(10, 'gg', '2023-09-26', NULL, 10, NULL, 1, NULL, 3, '2023-09-23 21:00:00', '2023-09-24 07:33:10', NULL, NULL),
(11, 'gg', '2023-09-26', NULL, 10, NULL, 1, NULL, 3, '2023-09-23 21:00:00', '2023-09-24 07:33:10', NULL, NULL),
(12, 'E char', '2023-09-24', NULL, 10, NULL, 1, NULL, 2, '2023-09-23 21:00:00', '2023-09-24 09:30:14', NULL, NULL),
(13, 'Carlos Meyers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 13:41:46', NULL, NULL),
(14, 'Stacey Farley', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 13:41:46', NULL, NULL),
(15, 'Eden Barrett', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 13:41:46', NULL, NULL),
(16, 'Abraham Harris', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 13:49:01', NULL, NULL),
(17, 'Tatum Powell', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 13:49:01', NULL, NULL),
(18, 'Sarah Lott', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 13:49:01', NULL, NULL),
(19, 'E char', '2023-09-25', NULL, 10, NULL, 1, NULL, 3, '2023-09-24 21:00:00', '2023-09-25 13:12:16', NULL, NULL),
(20, 'حرف ن', '2023-09-25', NULL, 10, NULL, 1, NULL, 3, '2023-09-24 21:00:00', '2023-09-25 19:28:15', NULL, NULL),
(21, 'حرف ن', '2023-09-26', NULL, 10, NULL, 1, NULL, 3, '2023-09-25 21:00:00', '2023-09-26 06:09:28', NULL, NULL),
(22, 'التلاوة هدف', '2023-09-26', NULL, 10, NULL, 1, NULL, 5, '2023-09-25 21:00:00', '2023-09-26 07:43:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` int(10) UNSIGNED NOT NULL,
  `governorate_name_ar` varchar(191) NOT NULL,
  `governorate_name_en` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `governorate_name_ar`, `governorate_name_en`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', 'Cairo', NULL, NULL),
(2, 'الجيزة', 'Giza', NULL, NULL),
(3, 'الأسكندرية', 'Alexandria', NULL, NULL),
(4, 'الدقهلية', 'Dakahlia', NULL, NULL),
(5, 'البحر الأحمر', 'Red Sea', NULL, NULL),
(6, 'البحيرة', 'Beheira', NULL, NULL),
(7, 'الفيوم', 'Fayoum', NULL, NULL),
(8, 'الغربية', 'Gharbiya', NULL, NULL),
(9, 'الإسماعلية', 'Ismailia', NULL, NULL),
(10, 'المنوفية', 'Menofia', NULL, NULL),
(11, 'المنيا', 'Minya', NULL, NULL),
(12, 'القليوبية', 'Qaliubiya', NULL, NULL),
(13, 'الوادي الجديد', 'New Valley', NULL, NULL),
(14, 'السويس', 'Suez', NULL, NULL),
(15, 'اسوان', 'Aswan', NULL, NULL),
(16, 'اسيوط', 'Assiut', NULL, NULL),
(17, 'بني سويف', 'Beni Suef', NULL, NULL),
(18, 'بورسعيد', 'Port Said', NULL, NULL),
(19, 'دمياط', 'Damietta', NULL, NULL),
(20, 'الشرقية', 'Sharkia', NULL, NULL),
(21, 'جنوب سيناء', 'South Sinai', NULL, NULL),
(22, 'كفر الشيخ', 'Kafr Al sheikh', NULL, NULL),
(23, 'مطروح', 'Matrouh', NULL, NULL),
(24, 'الأقصر', 'Luxor', NULL, NULL),
(25, 'قنا', 'Qena', NULL, NULL),
(26, 'شمال سيناء', 'North Sinai', NULL, NULL),
(27, 'سوهاج', 'Sohag', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_mini_words_title` text DEFAULT NULL,
  `banner_first_line_title` varchar(191) DEFAULT NULL,
  `banner_second_line_title` varchar(191) DEFAULT NULL,
  `banner_second_line_changeable_words` text DEFAULT NULL,
  `banner_third_line_title` varchar(191) DEFAULT NULL,
  `banner_subtitle` text DEFAULT NULL,
  `banner_first_button_name` varchar(191) DEFAULT NULL,
  `banner_first_button_link` text DEFAULT NULL,
  `banner_second_button_name` varchar(191) DEFAULT NULL,
  `banner_second_button_link` text DEFAULT NULL,
  `banner_image` varchar(191) DEFAULT NULL,
  `special_feature_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `courses_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `bundle_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `top_category_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `consultation_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `instructor_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `video_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `customer_says_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `achievement_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `faq_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `instructor_support_area` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 2=disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `banner_mini_words_title`, `banner_first_line_title`, `banner_second_line_title`, `banner_second_line_changeable_words`, `banner_third_line_title`, `banner_subtitle`, `banner_first_button_name`, `banner_first_button_link`, `banner_second_button_name`, `banner_second_button_link`, `banner_image`, `special_feature_area`, `courses_area`, `bundle_area`, `top_category_area`, `consultation_area`, `instructor_area`, `video_area`, `customer_says_area`, `achievement_area`, `faq_area`, `instructor_support_area`, `created_at`, `updated_at`) VALUES
(1, '[\"Come\",\"for\",\"learn\"]', 'A Better', 'Learning', '[\"Future\",\"Platform\",\"Era\",\"Point\",\"Area\"]', 'Starts Here.', 'While the lovely valley teems with vapour around me, and the meridian sun strikes the upper', 'Take A Tour', '#', 'Popular Courses', '#', 'uploads_demo/home/hero-img.png', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE `homeworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(191) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `material` varchar(191) NOT NULL,
  `teacher_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`id`, `name`, `student_id`, `student_name`, `depart_id`, `material`, `teacher_name`, `created_at`, `updated_at`) VALUES
(3, 'Catherine Sykes', 123, 'Damian Petty', 0, 'Facilis nisi anim to', 'Gretchen Roy', '2023-07-10 15:42:26', '2023-07-10 16:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `home_special_features`
--

CREATE TABLE `home_special_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `province_id` bigint(20) DEFAULT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `professional_title` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `postal_code` varchar(100) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `about_me` mediumtext DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `social_link` mediumtext DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `is_private` varchar(10) DEFAULT 'no' COMMENT 'yes, no',
  `remove_from_web_search` varchar(10) DEFAULT 'no' COMMENT 'yes, no',
  `status` tinyint(4) DEFAULT 0 COMMENT '0=pending, 1=approved, 2=blocked',
  `consultation_available` tinyint(4) DEFAULT 0 COMMENT '1=yes, 0=no',
  `hourly_rate` int(11) DEFAULT NULL,
  `available_type` tinyint(4) DEFAULT 3 COMMENT '1=In-person, 0=Online, 3=Both',
  `cv_file` varchar(191) DEFAULT NULL,
  `cv_filename` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `employee_id` varchar(250) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `uuid`, `user_id`, `country_id`, `province_id`, `state_id`, `city_id`, `first_name`, `last_name`, `professional_title`, `phone_number`, `postal_code`, `address`, `about_me`, `gender`, `social_link`, `slug`, `is_private`, `remove_from_web_search`, `status`, `consultation_available`, `hourly_rate`, `available_type`, `cv_file`, `cv_filename`, `created_at`, `updated_at`, `email`, `password`, `employee_id`, `department_id`) VALUES
(6, '2d4fd4b6-1ae4-423b-ae95-ebc25dfd009d', 0, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 1, 0, NULL, 3, NULL, NULL, '2023-05-17 14:29:34', '2023-07-09 12:43:19', 'hassanteacher@daralanwar.com', '$2y$10$CXxsAkVKx1H6cZ8dLowv8eI/1CfLUmkIpA4bF3n1KmUvcEnjn.yZ6', '9', NULL),
(7, '92fdd4b5-5205-4677-83b3-9793d7492609', 0, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 0, 0, NULL, 3, NULL, NULL, '2023-05-18 10:35:54', '2023-08-10 05:37:38', 'taxuzys@mailinator.com', '$2y$10$1FcZAOcojiS7v2QtqaKvXO5UbnhTTCUSeyi5B5AMwQQtv1Fxn7Xcm', '10', NULL),
(9, '6004050d-d9a7-4ff8-878c-cb687ec83e5f', 0, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 0, 0, NULL, 3, NULL, NULL, '2023-07-11 17:19:34', '2023-08-09 09:33:03', 'webari@mailinator.com', '$2y$10$aP8yuIcSnF3yFaOMdXUZD.kjQS6q7MG7R5D0x2ggUD.kjqcRV9M6C', '18', NULL),
(10, '436e6182-3589-4acc-99ac-045df36935c9', 0, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 1, 0, NULL, 3, NULL, NULL, '2023-07-13 16:20:22', '2023-07-13 17:00:41', 'marwakenawi20@gmail.com', '$2y$10$ifMAdwYvWFSTTQfHs/kPweVRkTzXh5AkhBusdOacM1t5qjQ3U/MOe', '19', NULL),
(11, '33de17c1-b076-470f-bb2a-655d7bf0c4d0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 0, 0, NULL, 3, NULL, NULL, '2023-09-19 09:38:53', '2023-09-19 09:38:53', 'cubavemaq@mailinator.com', '$2y$10$8RjY0bjSQiunm5OnNeoDBOKPnKKyAkg7u6ojRvfMjIefyarIq.CSe', '22', NULL),
(12, '2f54e4d0-f6c7-4416-a7e7-29c3ccbcba53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 0, 0, NULL, 3, NULL, NULL, '2023-09-19 09:41:01', '2023-09-19 11:58:16', 'hoboza@mailinator.com', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', '23', NULL),
(13, '7fa38b06-2ae3-43c6-bf56-3b46dd4cbde4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 0, 0, NULL, 3, NULL, NULL, '2023-09-24 19:39:33', '2023-09-24 19:39:33', 'ziwoxek@mailinator.com', '$2y$10$UzlqMaUlc1W.qhhPjnQjs.kiHxl44nsayhVDcKQQLhp9s11GpbJyG', '25', NULL),
(14, '6a28e776-12dd-430b-93a8-9f313a423fe3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 0, 0, NULL, 3, NULL, NULL, '2023-09-26 07:24:35', '2023-09-26 07:24:35', 'medowega@mailinator.com', '$2y$10$SK9/jp9G49h8Zhih1wsrEu8XsRbB3WULMSztCe52ROCR0KCuGPDOi', '26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_awards`
--

CREATE TABLE `instructor_awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `instructor_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `winning_year` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_certificates`
--

CREATE TABLE `instructor_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `instructor_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `passing_year` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_consultation_day_statuses`
--

CREATE TABLE `instructor_consultation_day_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `day` tinyint(4) NOT NULL COMMENT '0=sunday,1=monday,2=tuesday,3=wednesday,4=thursday,5=friday,6=saturday',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_features`
--

CREATE TABLE `instructor_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor_features`
--

INSERT INTO `instructor_features` (`id`, `logo`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'uploads_demo/instructor_feature/build-brand.png', 'Build your Bran', 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'uploads_demo/instructor_feature/instructor-support-2.png', 'Inspire learners', 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'uploads_demo/instructor_feature/top-instructor-heading-img.png', 'Get rewarded', 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_notifications`
--

CREATE TABLE `instructor_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `text` varchar(191) NOT NULL,
  `target_url` varchar(191) DEFAULT NULL,
  `is_seen` varchar(191) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=instructor, 3=student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_procedures`
--

CREATE TABLE `instructor_procedures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subtitle` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor_procedures`
--

INSERT INTO `instructor_procedures` (`id`, `image`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'uploads_demo/instructor_procedure/become-instructor-1.jpg', 'Plan Your Curriculum', 'Serenity has taken possession of my entire soul, like these sweet mornings spring which I enjoy with my whole heart. I am alone, and feel the charm existence in this spot, which was created for the bliss of souls like mine so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'uploads_demo/instructor_procedure/become-instructor-2.jpg', 'Plan Your Curriculum', 'Serenity has taken possession of my entire soul, like these sweet mornings spring which I enjoy with my whole heart. I am alone, and feel the charm existence in this spot, which was created for the bliss of souls like mine so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'uploads_demo/instructor_procedure/become-instructor-3.jpg', 'Plan Your Curriculum', 'Serenity has taken possession of my entire soul, like these sweet mornings spring which I enjoy with my whole heart. I am alone, and feel the charm existence in this spot, which was created for the bliss of souls like mine so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_supports`
--

CREATE TABLE `instructor_supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `subtitle` varchar(191) NOT NULL,
  `button_name` varchar(191) DEFAULT NULL,
  `button_link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor_supports`
--

INSERT INTO `instructor_supports` (`id`, `logo`, `title`, `subtitle`, `button_name`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'uploads_demo/instructor_support/instructor-support-1.png', 'Courses', 'Single stroke at the present moment and yet I feel that was', 'Popular Courses', 'http://lmszai.zainiktheme.com/courses', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'uploads_demo/instructor_support/instructor-support-2.png', 'Expert instructor', 'Single stroke at the present moment and yet I feel that was', 'Explore Instructor', 'http://lmszai.zainiktheme.com/all-instructor', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'uploads_demo/instructor_support/instructor-support-3.png', '27/4 online support', 'Single stroke at the present moment and yet I feel that was', 'Support Center', 'http://lmszai.zainiktheme.com/support-ticket-faq', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `classroom` int(11) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `student_id`, `amount`, `paid_at`, `note`, `subscription_id`, `classroom`, `month`, `created_at`, `updated_at`, `user_id`) VALUES
(13, 236, 100.00, '2023-10-04 21:00:00', NULL, 9, 1, '10', '2023-10-05 15:41:32', '2023-10-05 15:41:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(191) NOT NULL,
  `iso_code` varchar(191) NOT NULL,
  `flag` varchar(191) DEFAULT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `default_language` varchar(191) DEFAULT NULL COMMENT 'on,off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `iso_code`, `flag`, `rtl`, `status`, `default_language`, `created_at`, `updated_at`) VALUES
(1, 'EN ( English )', 'en', 'uploads_demo/default/en.png', 0, 1, 'on', NULL, NULL),
(2, 'SA ( Arabic )', 'sa', 'uploads_demo/default/sa.png', 1, 1, 'off', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `learn_key_points`
--

CREATE TABLE `learn_key_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'المستوي 1', 1, NULL, '2023-09-18 16:23:02'),
(2, 'المستوي 2', 1, '2023-09-18 16:14:27', '2023-09-18 16:14:27'),
(3, 'المستوي 3', 1, '2023-09-18 16:14:53', '2023-09-18 16:14:53'),
(4, 'المستوي 4', 1, '2023-09-18 16:15:31', '2023-09-18 16:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `live_classes`
--

CREATE TABLE `live_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_topic` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` varchar(191) NOT NULL COMMENT 'duration must be minutes',
  `start_url` mediumtext DEFAULT NULL,
  `join_url` mediumtext DEFAULT NULL,
  `meeting_id` varchar(191) DEFAULT NULL,
  `meeting_password` varchar(191) DEFAULT NULL,
  `meeting_host_name` varchar(191) DEFAULT NULL COMMENT 'zoom,bbb,jitsi',
  `moderator_pw` varchar(191) DEFAULT NULL COMMENT 'use only for bbb',
  `attendee_pw` varchar(191) DEFAULT NULL COMMENT 'use only for bbb',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `url` bigint(20) UNSIGNED DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1=static, 2=dynamic',
  `status` tinyint(4) DEFAULT NULL COMMENT '1=active, 2=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `url`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blogs', 'blogs', NULL, 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'About', 'about', NULL, 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'Contact', 'contact', NULL, 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, 'Support', 'support-ticket-faq', NULL, 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, 'Privacy Policy', 'privacy-policy', NULL, 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(6, 'Cookie Policy', 'cookie-policy', NULL, 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(7, 'Terms & Conditions', 'terms-conditions', NULL, 1, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `url` varchar(191) DEFAULT NULL,
  `page_name` varchar(191) DEFAULT NULL,
  `meta_title` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `uuid`, `url`, `page_name`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'a37d5268-8ac4-4b1b-b793-5f2ec40c5e47', NULL, 'Home', 'Home', 'LMSZai Learning management system', 'Lmszai, Lms, Learning, Course', NULL, NULL),
(2, 'dbf712d0-fbc1-4450-ae6c-66e7c07ac04d', NULL, 'Courses', 'Courses', 'LMSZai Course List', 'Lmszai, Lms, Learning, Course', NULL, NULL),
(3, '7df3476a-5ad5-4713-9420-7e9959fa98bc', NULL, 'Courses Details', 'Courses Details', 'LMSZai Course List', 'Lmszai, Lms, Learning, Course', NULL, NULL),
(4, '3fe70894-6de4-4a60-b847-668d4afc7140', NULL, 'Category', 'Categories', 'All courses categories', 'course, category', NULL, NULL),
(5, '908afdd7-5542-4a2d-a522-87d783c0813f', NULL, 'Blog', 'Blog', 'LMSZAI Blog', 'blog, course', NULL, NULL),
(6, 'b5ddc7d2-aaca-4d42-ad86-660f324ca5a5', NULL, 'Blog Details', 'Blog Details', 'LMSZAI Blog Details', 'blog, blog details', NULL, NULL),
(7, '3cd3397a-d019-41fe-b342-292717b171ad', NULL, 'About Us', 'About Us', 'LMSZAI About Us', 'about us', NULL, NULL),
(8, '76141d4a-62ec-4b78-a517-298d43669793', NULL, 'Contact Us', 'Contact Us', 'LMSZAI contact us', 'lmszai, contact us', NULL, NULL),
(9, '1d03c7fb-7d2e-413e-82c4-8d34f5be3f4f', NULL, 'Support Ticket', 'Support', 'LMSZAI support ticket', 'lmszai, support, ticket', NULL, NULL),
(10, 'c0b1fd40-4498-4a72-9fcb-7b7c81ee3517', NULL, 'Privacy Policy', 'Privacy Policy', 'LMSZAI Privacy Policy', 'lmszai, privacy, policy', NULL, NULL),
(11, '18156724-6cbe-4264-80f7-6bf5eccc6983', NULL, 'Cookie Policy', 'Cookie Policy', 'LMSZAI Cookie Policy', 'lmszai, cookie, policy', NULL, NULL),
(12, '7fde0f5f-7813-4faf-9a98-73e16e9ccc31', NULL, 'FAQ', 'FAQ', 'LMSZAI FAQ', 'lmszai, faq', NULL, NULL),
(13, 'da48d632-e382-4e70-9c52-54e2e1c2078b', NULL, 'Terms & Conditions', 'Terms & Conditions', 'LMSZAI Terms & Conditions Policy', 'lmszai, terms, consitions', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2019_12_15_153218_create_admins_table', 1),
(6, '2022_03_08_120002_create_categories_table', 1),
(7, '2022_03_08_124911_create_blogs_table', 1),
(8, '2022_03_10_113530_create_subcategories_table', 1),
(9, '2022_03_10_114913_create_tags_table', 1),
(10, '2022_03_10_120141_create_difficulty_levels_table', 1),
(11, '2022_03_10_120351_create_course_languages_table', 1),
(12, '2022_03_12_120608_create_currencies_table', 1),
(13, '2022_03_13_084533_create_instructors_table', 1),
(14, '2022_03_13_084819_create_settings_table', 1),
(15, '2022_03_13_100229_create_instructor_certificates_table', 1),
(16, '2022_03_14_052503_create_instructor_awards_table', 1),
(17, '2022_03_14_123059_create_metas_table', 1),
(18, '2022_03_15_092420_create_languages_table', 1),
(19, '2022_03_21_105943_create_countries_table', 1),
(20, '2022_03_21_110018_create_states_table', 1),
(21, '2022_03_21_110027_create_cities_table', 1),
(22, '2022_03_22_123520_create_user_cards_table', 1),
(23, '2022_03_23_061124_create_email_notification_settings_table', 1),
(24, '2022_03_23_104316_create_courses_table', 1),
(25, '2022_03_23_104847_create_course_tags_table', 1),
(26, '2022_03_29_130632_create_course_lessons_table', 1),
(27, '2022_03_29_130734_create_course_lectures_table', 1),
(28, '2022_04_02_104955_create_exams_table', 1),
(29, '2022_04_02_111930_create_questions_table', 1),
(30, '2022_04_02_112024_create_question_options_table', 1),
(31, '2022_04_02_124631_create_take_exams_table', 1),
(32, '2022_04_02_131147_create_answers_table', 1),
(33, '2022_04_02_132217_create_course_lecture_views_table', 1),
(34, '2022_04_03_093413_create_products_table', 1),
(35, '2022_04_07_105025_create_cart_management_table', 1),
(36, '2022_04_08_081131_create_wishlists_table', 1),
(37, '2022_04_09_060811_create_contact_us_issues_table', 1),
(38, '2022_04_09_060926_create_contact_us_table', 1),
(39, '2022_04_11_041217_create_about_us_generals_table', 1),
(40, '2022_04_11_041343_create_our_histories_table', 1),
(41, '2022_04_11_041419_create_team_members_table', 1),
(42, '2022_04_11_043000_create_instructor_supports_table', 1),
(43, '2022_04_11_043147_create_client_logos_table', 1),
(44, '2022_04_14_094216_create_instructor_features_table', 1),
(45, '2022_04_14_094313_create_instructor_procedures_table', 1),
(46, '2022_04_15_051038_create_faq_questions_table', 1),
(47, '2022_04_15_075433_create_home_special_features_table', 1),
(48, '2022_04_15_093248_create_homes_table', 1),
(49, '2022_04_16_085648_create_blog_categories_table', 1),
(50, '2022_04_16_111415_create_blog_tags_table', 1),
(51, '2022_04_18_071259_create_blog_comments_table', 1),
(52, '2022_04_18_103636_create_students_table', 1),
(53, '2022_04_20_090721_create_assignments_table', 1),
(54, '2022_04_21_063711_create_assignment_submits_table', 1),
(55, '2022_04_21_072930_create_assignment_files_table', 1),
(56, '2022_04_22_084931_create_course_resources_table', 1),
(57, '2022_04_22_101227_create_notice_boards_table', 1),
(58, '2022_04_23_044138_create_live_classes_table', 1),
(59, '2022_04_24_121452_create_orders_table', 1),
(60, '2022_04_24_121712_create_order_items_table', 1),
(61, '2022_04_24_122152_create_order_billing_addresses_table', 1),
(62, '2022_04_26_143537_create_coupons_table', 1),
(63, '2022_04_26_145556_create_coupon_instructors_table', 1),
(64, '2022_04_26_145742_create_coupon_courses_table', 1),
(65, '2022_04_27_124958_create_withdraws_table', 1),
(66, '2022_04_29_140534_create_reviews_table', 1),
(67, '2022_04_30_140200_create_discussions_table', 1),
(68, '2022_05_01_015615_create_learn_key_points_table', 1),
(69, '2022_05_01_015853_add_average_rating_to_courses_table', 1),
(70, '2022_05_08_183053_create_certificates_table', 1),
(71, '2022_05_09_122033_create_ranking_levels_table', 1),
(72, '2022_05_10_130657_add_video_to_courses_table', 1),
(73, '2022_05_11_113029_add_original_name_and_size_to_assignments_table', 1),
(74, '2022_05_11_122523_add_original_name_and_size_to_assignment_submits_table', 1),
(75, '2022_05_11_182134_add_view_to_discussions_table', 1),
(76, '2022_05_11_192633_create_support_ticket_questions_table', 1),
(77, '2022_05_12_121255_create_tickets_table', 1),
(78, '2022_05_12_121306_create_ticket_messages_table', 1),
(79, '2022_05_12_121540_create_ticket_departments_table', 1),
(80, '2022_05_12_121557_create_ticket_related_services_table', 1),
(81, '2022_05_12_121621_create_ticket_priorities_table', 1),
(82, '2022_05_12_175640_create_certificate_by_instructors_table', 1),
(83, '2022_05_13_165207_create_chat_messages_table', 1),
(84, '2022_05_15_112035_create_permission_tables', 1),
(85, '2022_05_16_125530_add_provider_id_and_avatar_to_users_table', 1),
(86, '2022_05_18_125922_create_pages_table', 1),
(87, '2022_05_18_152824_create_notifications_table', 1),
(88, '2022_05_18_161357_create_menus_table', 1),
(89, '2022_05_19_192216_create_email_templates_table', 1),
(90, '2022_05_22_165419_create_user_paypals_table', 1),
(91, '2022_05_25_131858_add_images_to_about_us_generals_table', 1),
(92, '2022_05_25_220619_create_student_certificates_table', 1),
(93, '2022_05_26_171757_create_promotions_table', 1),
(94, '2022_05_26_172008_create_promotion_courses_table', 1),
(95, '2022_05_27_154633_create_special_promotion_tags_table', 1),
(96, '2022_05_27_154757_create_special_promotion_tag_courses_table', 1),
(97, '2022_05_28_185325_add_subtitle_to_courses', 1),
(98, '2022_05_28_191647_create_course_upload_rules_table', 1),
(99, '2022_05_31_131109_add_forgot_token_to_users', 1),
(100, '2022_06_01_114750_add_cv_file_and_filename_to_instructors', 1),
(101, '2022_06_13_132354_create_policies_table', 1),
(102, '2022_06_14_180425_add_conversion_rate_and_current_currency_and_currency_amount_to_orders', 1),
(103, '2022_06_15_181443_add_default_language_to_languages', 1),
(104, '2022_07_05_171632_create_banks_table', 1),
(105, '2022_07_06_171634_add_field_to_orders_table', 1),
(106, '2022_07_20_114546_add_meeting_host_name_and_moderator_pw_and_attendee_pw_to_live_classes_table', 1),
(107, '2022_07_22_123555_add_paystack_refrence_number_to_orders_table', 1),
(108, '2022_07_25_151244_add_intro_video_check_and_into_youtube_video_id_to_courses_table', 1),
(109, '2022_08_04_160730_add_city_id_to_instructors', 1),
(110, '2022_08_06_140811_create_bundles_table', 1),
(111, '2022_08_06_140834_create_bundle_courses_table', 1),
(112, '2022_08_08_134556_add_bundle_id_to_wishlists', 1),
(113, '2022_08_08_181304_add_bundle_id_and_bundle_course_ids_to_cart_management', 1),
(114, '2022_08_08_193241_add_bundle_id_to_order_items', 1),
(115, '2022_08_11_180251_create_forum_categories_table', 1),
(116, '2022_08_11_183543_create_forum_posts_table', 1),
(117, '2022_08_12_113405_create_forum_post_comments_table', 1),
(118, '2022_08_13_170419_add_available_and_hourly_rate_to_instructors_table', 1),
(119, '2022_08_13_175625_create_consultation_slots_table', 1),
(120, '2022_08_16_152302_create_instructor_consultation_day_statuses_table', 1),
(121, '2022_08_16_180220_create_booking_histories_table', 1),
(122, '2022_08_18_160213_add_consultation_slot_id_and_consultation_details_and_consultation_date_to_cart_management_table', 1),
(123, '2022_08_19_114213_add_consultation_slot_id_and_consultation_date_to_order_items_table', 1),
(124, '2022_08_22_160209_add_some_new_fields_to_course_lectures_table', 1),
(125, '2022_08_30_115403_add_new_attributes_to_homes_table', 1),
(126, '2022_09_07_185945_add_start_url_to_live_classes_table', 1),
(127, '2022_09_07_193347_add_start_url_to_booking_histories_table', 1),
(128, '2022_09_08_124610_add_is_affiliator_in_user_table', 1),
(129, '2022_09_08_124610_add_is_reference_in_cart_management_table', 1),
(130, '2022_09_08_124610_create_affiliate_request_table', 1),
(131, '2022_09_08_124610_create_zoom_settings_table', 1),
(132, '2022_09_24_121452_create_affiliate_history_table', 1),
(133, '2022_09_24_121452_create_transaction_table', 1),
(134, '2022_10_10_163914_add_vimeo_upload_type_to_course_lectures', 1),
(135, '2022_10_17_124610_add_error_msg_in_order_table', 1),
(136, '2023_03_29_191813_create_branches_table', 1),
(137, '2023_03_29_214431_create_sessions_table', 1),
(138, '2023_03_30_155844_create_parent_infos_table', 1),
(139, '2023_04_01_025039_create_governorates_table', 1),
(140, '2023_04_03_011953_create_employees_table', 1),
(141, '2023_05_18_153359_create_absences_table', 2),
(142, '2022_03_14_052503_create_homeworks_table', 3),
(143, '2014_10_12_000000_create_assign_homework_table', 4),
(144, '2014_10_12_000000_create_stores_table', 5),
(147, '2023_08_09_090838_create_salaries_table', 6),
(148, '2023_08_09_102620_create_attendances_leaves_table', 6),
(149, '2023_08_14_133651_create_subscriptions_table', 7),
(150, '2023_08_21_102552_create_goals_table', 8),
(151, '2023_08_27_090525_create_followups_table', 8),
(152, '2023_08_28_081905_create_followup_questions_table', 8),
(153, '2023_08_28_082113_add_column_to_followups_table', 8),
(154, '2023_08_28_094103_create_followup_responses_table', 8),
(155, '2023_09_02_144004_create_financial_accounts_table', 8),
(156, '2023_09_03_092137_create_balances_table', 8),
(157, '2023_09_04_140026_create_payments_table', 9),
(158, '2023_09_07_095650_create_subscription_user_table', 10),
(159, '2023_09_07_135333_add_status_to_subscriptions', 11),
(160, '2023_09_09_195609_create_invoices_table', 12),
(161, '2023_09_11_095323_create_store_transactions_table', 13),
(162, '2023_09_12_090250_create_store_names_table', 14),
(163, '2023_09_15_170139_create_student_subjects_table', 15),
(164, '2023_09_15_212259_create_student_buses_table', 16),
(165, '2023_09_15_215923_create_levels_table', 17),
(166, '2023_09_15_220021_create_student_levels_table', 17),
(167, '2023_09_17_115340_create_calenders_table', 18),
(168, '2023_09_18_081805_create_student_departments_table', 19),
(169, '2023_09_18_161537_create_student_duties_table', 20),
(170, '2023_09_20_085301_create_student_reveiws_table', 21),
(171, '2023_09_24_081343_create_student_goals_table', 22),
(172, '2023_09_24_120321_create_exams_results_table', 23),
(173, '2023_09_25_114734_create_product_invoices_table', 24),
(174, '2023_09_25_150435_create_student_reports_table', 24),
(175, '2023_10_06_092901_create_class_subjects_table', 25),
(176, '2023_10_06_135144_create_admin_settings_table', 26),
(177, '2023_10_06_170213_create_student_class_rooms_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 2),
(1, 'App\\Models\\Employee', 9),
(1, 'App\\Models\\Employee', 10),
(1, 'App\\Models\\Admin', 23),
(5, 'App\\Models\\Admin', 3),
(7, 'App\\Models\\Admin', 4),
(7, 'App\\Models\\Admin', 19),
(7, 'App\\Models\\Employee', 19),
(7, 'App\\Models\\Employee', 24);

-- --------------------------------------------------------

--
-- Table structure for table `notice_boards`
--

CREATE TABLE `notice_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topic` text NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_boards`
--

INSERT INTO `notice_boards` (`id`, `uuid`, `user_id`, `course_id`, `topic`, `details`, `created_at`, `updated_at`) VALUES
(1, '08d3aa2e-7ef5-465d-b23f-1acc97ff2d42', 2, 1, 'Topic for Notice Board', 'This is a description', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 = abscences\n2 = exam\n3 = subscription',
  `text` varchar(191) NOT NULL,
  `target_url` varchar(191) DEFAULT NULL,
  `is_seen` varchar(191) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=instructor, 3=student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `uuid`, `sender_id`, `user_id`, `type`, `text`, `target_url`, `is_seen`, `user_type`, `created_at`, `updated_at`) VALUES
(46, '5edd81c5-c414-4aec-85c6-4c3ca340b418', 1, 1, NULL, 'اهلا بك يا طاالب', NULL, 'yes', 1, '2023-09-16 11:42:38', '2023-09-16 14:21:00'),
(47, '55c1e9d1-3292-42c3-afde-e79c4a56e4a0', 1, 1, NULL, 'تأخير اشتراك', NULL, 'yes', 1, '2023-09-16 11:47:56', '2023-09-16 14:21:00'),
(48, '28f9a08f-a128-42ae-a735-345eb5d44026', 1, 1, NULL, 'تأخير اشتراك', NULL, 'yes', 1, '2023-09-16 11:48:02', '2023-09-16 14:20:59'),
(45, 'b5b4a032-64b4-4877-b544-abf132690935', 1, 1, NULL, 'warning_subscription_text', NULL, 'yes', 1, '2023-09-16 11:40:14', '2023-09-16 14:21:01'),
(40, '342128a0-04e3-4bae-8f0f-d4f31d83d991', 1, 1, NULL, 'Catherine Reevesغياب يومي متكرر لهذا الطالب : ', NULL, 'yes', 1, '2023-09-16 09:21:47', '2023-09-16 14:20:55'),
(41, 'd33bc7b0-15dd-4442-aa0e-41bd5c513054', 1, 1, NULL, 'Catherine Reevesهذا الطالب لم يسدد اشتراكاته : ', NULL, 'yes', 1, '2023-09-16 09:51:59', '2023-09-16 14:20:57'),
(42, '15dcd384-2d29-4aa9-8cd2-30cdee43ad2a', 1, 1, NULL, 'Palmer Robertsهذا الطالب لم يسدد اشتراكاته : ', NULL, 'yes', 1, '2023-09-16 09:52:12', '2023-09-16 14:20:58'),
(43, '4ed181e8-de21-4f24-a9d0-d7cd13245ead', 1, 1, NULL, 'subscriped', NULL, 'yes', 1, '2023-09-16 10:23:51', '2023-09-16 14:21:17'),
(44, 'f94d72e9-b969-41c8-93b9-2af7dd8d5592', 1, 1, NULL, 'warning_subscription_text', NULL, 'yes', 1, '2023-09-16 11:39:03', '2023-09-16 14:21:15'),
(49, '74e37da3-8bca-4ddd-b88b-1e0aa0ac7512', 1, 1, NULL, 'subscriped', NULL, 'yes', 1, '2023-09-16 11:49:07', '2023-09-16 14:15:10'),
(50, 'c103815a-ae31-4cde-9d23-6c571482d408', 1, 1, NULL, 'غيااااب', NULL, 'yes', 1, '2023-09-16 11:49:09', '2023-09-16 14:15:24'),
(51, 'c91e0fee-94c9-45da-9cef-cdd98f55165f', 1, 1, NULL, 'subscriped', NULL, 'yes', 2, '2023-09-16 14:21:39', '2023-09-24 13:48:30'),
(52, 'bb37ab2f-dd06-4ef3-a20c-ef76ffded50c', 1, 229, NULL, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-09-18 06:50:45', '2023-09-18 06:50:45'),
(53, '68b262c5-cde3-45fc-bfbe-aa1ae79bc7b2', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-09-24 13:41:33', '2023-09-24 13:48:28'),
(54, '18f349e1-3a93-4b98-8a8d-c73d829923ab', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-09-24 13:41:46', '2023-09-24 13:44:39'),
(55, '77ff7f0d-e21a-435c-8d03-9a85b426c413', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-09-24 13:41:46', '2023-09-24 13:48:25'),
(56, '7a345a59-2a66-49a7-8826-316fce32cb1b', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-09-24 13:42:40', '2023-09-24 13:44:26'),
(57, '09851037-e594-41a8-b57d-eb439040810c', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-09-24 13:48:30', '2023-09-25 19:14:01'),
(58, '45148f0f-8bb0-4f66-a678-cd6d61f414bb', 1, 1, NULL, 'dd', NULL, 'yes', 2, '2023-09-24 14:02:40', '2023-09-25 19:13:56'),
(59, '767cf8c1-6c03-4496-867f-96e64e97743f', 1, 1, NULL, 'subscriped', NULL, 'yes', 2, '2023-09-24 14:03:33', '2023-09-25 19:13:52'),
(60, 'f3896f7d-404a-4e75-9c60-02948cac0dc1', 1, 1, NULL, 'اهلا بك يا طاالب', NULL, 'yes', 2, '2023-09-24 14:04:21', '2023-09-25 19:13:50'),
(61, '546dfd93-f749-4bb0-aa31-5c995d82e15f', 1, 1, NULL, 'اهلا بك يا طاالب', NULL, 'yes', 2, '2023-09-24 14:04:23', '2023-09-25 19:13:49'),
(62, '5a68b5b7-7cac-42c5-b058-6cf2caa6fc8f', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-24 15:42:19', '2023-09-24 15:42:36'),
(63, '54fcf7f4-8f56-4a8c-97dd-1eb377039712', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-24 15:42:39', '2023-09-25 19:13:42'),
(64, 'a91b04f3-e016-4302-b00c-d8f9a3e8ea92', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-09-25 14:03:21', '2023-09-25 14:03:24'),
(65, '37f3ee6d-004c-4ace-9544-841a32c48426', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-25 19:13:43', '2023-09-25 19:13:47'),
(66, '48a70169-90bb-4aff-9283-42c82f39c366', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-25 19:13:48', '2023-09-25 19:13:54'),
(67, 'a7de842b-3d8e-4918-a3cd-b2ced3dd42f5', 1, 1, NULL, 'subscriped', NULL, 'yes', 2, '2023-09-25 19:13:54', '2023-10-04 05:35:00'),
(68, '93cf08ab-3c9b-4336-bbf0-670f4e934700', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-25 19:13:56', '2023-09-26 06:02:26'),
(69, 'dd16ea6b-1beb-4c2a-bc9e-08087552e5cf', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-09-25 19:14:03', '2023-09-26 17:42:38'),
(70, '7afc252e-18c4-41bf-89c8-a423594c8bdf', 1, 1, NULL, 'غيااااب', NULL, 'yes', 2, '2023-09-25 19:20:12', '2023-10-04 05:33:58'),
(71, '4cedb1de-4efb-40bd-8714-c5207257a694', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Catherine Reeves', NULL, 'yes', 2, '2023-09-25 19:20:26', '2023-09-25 19:20:33'),
(72, '2678c7df-a756-4de5-81ca-d488730d7412', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-09-25 19:26:47', '2023-09-26 17:42:29'),
(73, 'e3be7821-9d36-4d97-b668-36259fa066ed', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-09-25 19:27:07', '2023-09-25 19:27:10'),
(74, '2a8e08c4-81de-46b1-84f0-37f3ec2785f4', 1, 1, NULL, 'اهلا بك يا طاالب', NULL, 'yes', 2, '2023-09-26 05:51:44', '2023-09-26 17:42:11'),
(75, '8a5bbed2-5735-498e-b61f-2d893e7f42c1', 1, 1, NULL, 'غيااااب', NULL, 'yes', 2, '2023-09-26 05:52:17', '2023-09-26 17:42:04'),
(76, '49aa89a3-c3f1-4693-b4ec-8d9d415cc0e4', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 05:52:28', '2023-09-26 06:02:01'),
(77, '10c99648-09b6-41c6-9c65-395a76905f23', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 05:52:38', '2023-09-26 06:02:23'),
(78, 'ca0bb728-9812-418a-9894-e5e276c23770', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 06:02:26', '2023-09-26 17:42:00'),
(79, '6158826d-a94f-4b09-a9cd-fff996539444', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 06:02:32', '2023-09-26 06:02:34'),
(80, '248c254e-8dc2-4c0c-9b7c-6f5457d5d130', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 06:02:37', '2023-09-26 06:08:36'),
(81, '04c8590c-77db-46f8-b4af-482b02897c0c', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-09-26 06:08:28', '2023-09-26 06:08:32'),
(82, '17c0ebd6-dfe5-4d1f-9973-e9160e8f6199', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 06:08:46', '2023-09-26 06:10:54'),
(83, 'a0290a4e-2975-46b9-b291-95a26db1678f', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 06:09:28', '2023-09-26 17:41:58'),
(84, '99159272-cb69-4ec9-9e20-3e575e24d49f', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 06:09:28', '2023-09-26 17:41:53'),
(85, '22a4dcf0-ead8-4cec-b436-923336f8d3fc', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 06:11:02', '2023-09-26 06:11:14'),
(86, '0a2e0a55-1334-4d0f-8713-7a718a470cc2', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 06:11:16', '2023-09-26 06:11:35'),
(87, '29ae7851-3d6f-438a-8cc0-446ec9499b3f', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 06:11:36', '2023-09-26 06:21:45'),
(88, '5247a673-8911-4335-ad6a-02babadedc14', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Catherine Reeves', NULL, 'yes', 2, '2023-09-26 06:16:29', '2023-09-26 17:41:51'),
(89, '3a70bd23-05e6-4d9e-8d95-58454f4434d9', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Catherine Reeves', NULL, 'yes', 2, '2023-09-26 06:19:26', '2023-09-26 17:41:40'),
(90, '258bc329-e685-4662-a1ca-146edbbbbf7d', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Catherine Reeves', NULL, 'yes', 2, '2023-09-26 06:19:39', '2023-09-26 17:41:48'),
(91, '16b02a88-4520-449f-b658-3c22d5a73266', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 06:20:42', '2023-09-26 17:41:46'),
(92, 'f589a11c-854d-476e-b4be-e5f1c0e9a92f', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 06:20:42', '2023-09-26 17:41:43'),
(93, '9a15b835-d231-4034-ac14-05c58fbb42e9', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 06:21:49', '2023-09-26 07:07:41'),
(94, 'a269d113-816f-47a4-8b94-bd2df89bc76f', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-09-26 07:07:33', '2023-09-26 07:07:42'),
(95, '6af1ae75-b648-459f-98cb-57d2b39ab64b', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 07:07:42', '2023-09-26 07:10:09'),
(96, 'ba4d0db3-b7b0-4869-992e-1577a8d204c4', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 07:08:25', '2023-09-26 17:41:35'),
(97, 'e058054d-a6ec-4b56-bb61-35503b139d4e', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 07:08:25', '2023-09-26 17:41:24'),
(98, '4905a2ed-d4f6-416b-b304-016eb18c4091', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 07:10:14', '2023-09-26 17:41:21'),
(99, 'b57bcc2d-256b-44bc-aa6d-36a8a977b7e8', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 07:43:54', '2023-09-26 17:41:20'),
(100, '42582da6-75ba-424c-9ef3-ed00d821c320', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 07:43:54', '2023-09-26 17:41:18'),
(101, 'e20f4fdd-7b2f-478d-aee9-884b216d64a5', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:41:22', '2023-09-26 17:41:42'),
(102, '444bf71a-1f6b-4696-9e02-37367cd77ae9', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:41:43', '2023-09-26 17:41:45'),
(103, '165a283b-8aa3-47ed-841f-d711502a39a7', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:41:46', '2023-09-26 17:41:47'),
(104, '0160e4c8-09f7-4e2e-8813-43b3207136f0', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:41:48', '2023-09-26 17:41:49'),
(105, 'b87ea67f-3bf4-4d69-869f-e0ea09afe0b0', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:41:51', '2023-09-26 17:41:52'),
(106, 'ca9e3bf6-6090-4097-935a-5d1616a9e30a', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:41:53', '2023-09-26 17:41:54'),
(107, '0be27ad0-98ca-40ce-a5e1-76ba62b6d768', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:41:58', '2023-09-26 17:41:59'),
(108, '9c92839c-73c1-4d54-bd14-f1226d98984d', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:42:00', '2023-09-26 17:42:01'),
(109, 'c3eef9f3-249b-4c0d-81e8-38ef850b2a92', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 17:42:01', '2023-09-26 17:42:02'),
(110, '8db3276d-2c25-4ea8-b907-a5c108770eb2', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:42:02', '2023-09-26 17:42:03'),
(111, '0ff7f3bb-9f71-40ce-accc-9caf70bfa11f', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 17:42:03', '2023-09-26 17:42:09'),
(112, 'e9bb57a6-bddb-49b7-a75f-805adf0d9de0', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:42:04', '2023-09-26 17:42:08'),
(113, '1a7373ed-2ad3-46da-8091-3ee556d0a4e9', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:42:09', '2023-09-26 17:42:27'),
(114, '0b6947b0-b0e6-4d61-8042-d353738cb576', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 17:42:11', '2023-09-26 17:42:12'),
(115, 'd6ab15d3-d9f6-49b6-b78e-ca2ddaac8486', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 17:42:19', '2023-09-26 17:42:25'),
(116, 'b9626d47-4837-4213-8593-b40c783fb511', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 17:42:27', '2023-09-26 17:42:41'),
(117, '7b708cac-786c-4c1c-aa5a-94d7b570c9bc', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:42:28', '2023-09-26 17:42:32'),
(118, '4cd9a256-3581-41de-b4e1-7319aaacb8ea', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:42:34', '2023-09-26 17:42:36'),
(119, 'f3526805-2512-49f8-a6d7-55e130cacd46', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-09-26 17:42:38', '2023-10-04 05:33:55'),
(120, '9844abe2-5257-4d76-bb41-5610212c2db6', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-09-26 17:42:41', '2023-10-04 05:33:51'),
(121, 'ba15cda2-6366-4a8b-adbd-84aa7d183e3c', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-09-26 17:42:43', '2023-10-04 05:33:50'),
(122, '1cfee3b9-0c65-493a-a042-ad8bc1b2f25b', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-09-26 17:45:35', '2023-10-04 05:33:48'),
(123, '9c042d2d-890b-4371-9243-93e780593098', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-09-26 17:45:45', '2023-10-04 05:31:00'),
(124, '9a2fe0dd-c634-4cf1-abb0-29f27481ae9a', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 17:46:34', '2023-10-04 05:30:58'),
(125, 'c5fa8008-bb2b-407d-bc2c-92d76edf6439', 1, 1, NULL, 'لديك تقييمات اليوم', NULL, 'yes', 2, '2023-09-26 17:46:34', '2023-10-04 05:30:55'),
(126, '8fe57511-124f-4e4f-b5da-5a8e893ced42', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:33:51', '2023-10-04 05:33:52'),
(127, '0b5c86c5-b71f-4538-8c9c-5401b8625376', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-10-04 05:33:52', '2023-10-04 05:33:53'),
(128, '51d91967-5ae6-48a0-994b-a70bf8d2f352', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:33:53', '2023-10-04 05:35:11'),
(129, '49c556f3-ef48-4ecb-99b1-88de159ea5cc', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-10-04 05:33:55', '2023-10-04 05:33:56'),
(130, '5cb25c18-1f7a-4e14-bfa9-a97beb93238b', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-04 05:33:56', '2023-10-04 05:35:04'),
(131, '00ccac9c-a76e-490f-8e28-d4e012841097', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-10-04 05:33:57', '2023-10-04 05:35:08'),
(132, 'eb9b7cfd-e661-467f-a312-72506bbed936', 1, 1, NULL, 'غيااااب', NULL, 'yes', 2, '2023-10-04 05:35:00', '2023-10-04 05:45:53'),
(133, 'b593f133-a9b9-4359-ad70-501a0087f3f2', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-04 05:35:08', '2023-10-04 05:35:09'),
(134, '27cf8926-553b-479d-8cd0-4ecfe8a0487c', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-10-04 05:35:09', '2023-10-04 05:45:52'),
(135, '9fc96cd8-a011-4e2e-9b2d-04521ea0f214', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-04 05:35:11', '2023-10-04 05:35:16'),
(136, 'ed62cfd3-ce32-47e8-b5d2-aebdda183c7d', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:35:16', '2023-10-04 05:35:18'),
(137, '0cba9ea5-7237-4883-9baf-3295f7df8566', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-04 05:35:16', '2023-10-04 05:35:17'),
(138, 'e78692a7-226b-4a3c-8438-fe1e0f734229', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-04 05:35:18', '2023-10-04 05:45:50'),
(139, 'fc5a7ffd-df26-4414-aa0e-2deadb1c3ec4', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:35:19', '2023-10-04 05:37:51'),
(140, '497bb0d4-9528-4098-94d3-8f6fdf59e3b1', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:38:15', '2023-10-04 05:39:56'),
(141, '744e1c9d-6dde-4b1a-b18a-f3bad998baa7', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:40:03', '2023-10-04 05:40:46'),
(142, 'c5fc055c-d47e-4380-81a8-d4f0448919e1', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:41:34', '2023-10-04 05:44:10'),
(143, '6a2ea669-5995-4677-837c-06a39ba5c3d6', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:44:18', '2023-10-04 05:44:30'),
(144, '716ef202-18b9-447f-8411-68f414427c8b', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-10-04 05:46:50', '2023-10-04 05:46:53'),
(145, '25bf9b21-a957-4864-9cff-2c99cc82a1ad', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-10-04 05:46:54', '2023-10-04 05:46:57'),
(146, '8715eee3-1d5a-4675-9b4d-32d539397483', 1, 1, NULL, 'يوجد تقييم اليوم', NULL, 'yes', 2, '2023-10-04 05:47:00', '2023-10-04 05:50:11'),
(147, '6aa365c6-6b3a-4734-b30b-6cc11d4a9fe2', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-04 05:48:34', '2023-10-04 05:50:16'),
(148, '0fb42f7b-efcf-439b-b699-0a941be1261c', 1, 1, NULL, 'غيااااب', NULL, 'yes', 2, '2023-10-04 05:48:34', '2023-10-04 05:48:37'),
(149, '822b19db-7df7-4c85-acb1-e4bab8b0dbc6', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:48:34', '2023-10-04 05:48:36'),
(150, '90edfeae-4415-4c2a-b935-7f10dba0b873', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:48:37', '2023-10-04 05:51:43'),
(151, 'ceeb981a-537b-48e8-b908-1144444ebf26', 1, 1, NULL, 'غيااااب', NULL, 'yes', 2, '2023-10-04 05:48:39', '2023-10-04 05:51:41'),
(152, '0ca1dbee-6224-4140-a86f-15a36439b760', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-04 05:50:17', '2023-10-04 05:51:40'),
(153, '28bf4a30-cf80-411a-871a-05264747a14c', 1, 1, NULL, 'غيااااب', NULL, 'yes', 2, '2023-10-04 05:51:43', '2023-10-04 05:51:44'),
(154, '112d9b44-18c7-4b3b-b6c7-7675890fc558', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:51:44', '2023-10-04 05:54:08'),
(155, 'ec7aedfb-2f2c-4a99-be82-ca4216ec6833', 1, 1, NULL, 'غيااااب', NULL, 'yes', 2, '2023-10-04 05:51:45', '2023-10-04 05:52:26'),
(156, 'dd53268e-64c0-4e40-bac5-3cf9f80727f3', 1, 1, NULL, 'غيااااب', NULL, 'yes', 2, '2023-10-04 05:53:10', '2023-10-04 05:53:15'),
(157, 'dc42ce23-9da3-4056-b0de-000f0520bb21', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:54:10', '2023-10-04 05:54:25'),
(158, 'e58965df-6f71-4ae6-a14b-d859d312bf41', 1, 1, NULL, 'اشتراك', NULL, 'yes', 2, '2023-10-04 05:54:27', '2023-10-04 05:54:44'),
(159, '4470948b-6fda-4e58-ac06-19a2cb997e45', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-10-04 12:44:45', '2023-10-04 12:46:30'),
(160, 'ca9d9a0a-f9b4-4ded-b78d-fe8658437271', 1, 1, NULL, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-04 13:48:55', '2023-10-09 06:18:21'),
(161, 'ba3879cf-835a-4e28-aaeb-6f01ff1cffab', 1, 1, 1, 'غيااااب', NULL, 'yes', 2, '2023-10-06 08:09:12', '2023-10-09 06:18:20'),
(163, '8adb57d7-fc3c-427d-9c24-6bee034398b3', 1, 1, 4, 'لديك مهام اليوم', NULL, 'yes', 2, '2023-10-06 08:59:19', '2023-10-09 06:18:19'),
(164, 'ca92abb9-306e-4d3a-896f-4bdeb88b4f22', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-10-06 10:22:23', '2023-10-09 06:18:17'),
(165, '9e28685d-3770-43a0-a9d9-4c3b7ebfbb81', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'yes', 2, '2023-10-09 06:03:37', '2023-10-09 06:17:33'),
(166, '50b9c4ab-7e58-49de-8d53-79d0168bb53d', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'no', 2, '2023-10-10 11:48:10', '2023-10-10 11:48:10'),
(167, 'a1d016b5-10f7-4bd9-83da-babe25c8c668', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'no', 2, '2023-10-10 11:48:16', '2023-10-10 11:48:16'),
(168, 'e7504301-6c5b-4297-af6e-d404f4637189', 1, 1, NULL, 'هذا الطالب لديه غياب متكرر Daria Hays', NULL, 'no', 2, '2023-10-10 11:49:51', '2023-10-10 11:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_number` varchar(50) NOT NULL,
  `sub_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `platform_charge` decimal(8,2) NOT NULL DEFAULT 0.00,
  `current_currency` varchar(191) DEFAULT NULL,
  `grand_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `payment_currency` varchar(191) DEFAULT NULL,
  `conversion_rate` decimal(28,8) DEFAULT 0.00000000,
  `grand_total_with_conversation_rate` decimal(28,8) DEFAULT 0.00000000,
  `payment_method` varchar(100) DEFAULT NULL,
  `paystack_reference_number` varchar(191) DEFAULT NULL,
  `deposit_by` varchar(191) DEFAULT NULL,
  `deposit_slip` varchar(191) DEFAULT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_comment` mediumtext DEFAULT NULL,
  `payment_status` varchar(15) NOT NULL DEFAULT 'due' COMMENT 'paid, due, free, pending, cancelled',
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=complete',
  `created_by_type` tinyint(4) DEFAULT 1 COMMENT '1=student, 2=admin',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `error_msg` varchar(191) DEFAULT NULL,
  `payment_id` varchar(191) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_billing_addresses`
--

CREATE TABLE `order_billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `street_address` varchar(191) NOT NULL,
  `zip_code` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `set_as_shipping_address` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `owner_user_id` bigint(20) DEFAULT NULL,
  `bundle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `consultation_slot_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consultation_date` varchar(191) DEFAULT NULL,
  `unit` int(11) NOT NULL DEFAULT 1,
  `unit_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `admin_commission` decimal(8,2) NOT NULL DEFAULT 0.00,
  `owner_balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `sell_commission` int(11) NOT NULL DEFAULT 0 COMMENT 'How much percentage get admin and calculate in admin_commission',
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=course, 2=product, 3=bundle course, 4=consultation',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_histories`
--

CREATE TABLE `our_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subtitle` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_histories`
--

INSERT INTO `our_histories` (`id`, `year`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, '1998', 'Mere tranquil existence', 'Possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart am alone', NULL, NULL),
(2, '1998', 'Incapable of drawing', 'Exquisite sense of mere tranquil existence that I neglect my talents add should be incapable of drawing', NULL, NULL),
(3, '1998', 'Foliage access trees', 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my', NULL, NULL),
(4, '1998', 'Among grass trickling', 'Should be incapable of drawing a single stroke at the present moment; and yet I feel that I never', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `en_title` text DEFAULT NULL,
  `en_description` longtext DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `meta_keywords` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_infos`
--

CREATE TABLE `parent_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profession` varchar(191) DEFAULT NULL,
  `national_id` varchar(191) NOT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `whatsapp_number` varchar(191) DEFAULT NULL,
  `follow_up_person` varchar(191) DEFAULT NULL,
  `relationship` varchar(191) DEFAULT NULL,
  `relationship_type` varchar(255) DEFAULT NULL,
  `student_pickup_optional` tinyint(1) NOT NULL DEFAULT 0,
  `parents_marital_status` varchar(191) DEFAULT NULL,
  `parents_id_card` varchar(191) DEFAULT NULL,
  `whatsapp_number_check` int(11) DEFAULT NULL,
  `wallet` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_infos`
--

INSERT INTO `parent_infos` (`id`, `student_id`, `name`, `email`, `password`, `profession`, `national_id`, `phone_number`, `whatsapp_number`, `follow_up_person`, `relationship`, `relationship_type`, `student_pickup_optional`, `parents_marital_status`, `parents_id_card`, `whatsapp_number_check`, `wallet`, `created_at`, `updated_at`) VALUES
(1, 5, 'John Doe', 'peraciruv2@mailinator.com', NULL, 'Engineer', '12345678909', '01234567890', '01234567891', '1', '1', NULL, 1, '1', '1234567890123456', 0, NULL, '2023-04-03 13:37:53', '2023-10-04 10:40:24'),
(4, 5, 'Adele Deleon', 'peraciruv@mailinator.com', NULL, 'Quis in facere quos', '957', '+1 (841) 804-1525', '138', '1', '2', NULL, 0, '1', NULL, 0, NULL, '2023-05-17 11:19:49', '2023-10-04 10:40:24'),
(6, 227, 'حنان حالد', 'ashraf@gmail.com', NULL, 'موظف حكومي', '87654321235780084', '01012345678', '01012345678', '1', '1', NULL, 1, '1', NULL, 0, NULL, '2023-07-15 11:54:16', '2023-09-18 10:25:48'),
(5, 227, 'اشرف ذكي', 'ashraf@gmail.com', NULL, 'موظف حكومي', '87654321235780083', '01012345678', '01012345678', '1', '2', NULL, 1, '1', '1234567890123456', 0, NULL, NULL, NULL),
(323, 231, 'Martina Lopez', 'nysepunice@mailinator.com', NULL, 'Odio et repellendus', '238', '+1 (761) 303-3366', '936', '1', '3', NULL, 0, '2', NULL, 0, NULL, '2023-09-18 18:25:43', '2023-09-18 18:25:43'),
(324, 231, 'Tamara Mullen', 'muvutylu@mailinator.com', NULL, 'Consequatur excepteu', '790', '+1 (246) 178-9211', '569', '0', '2', NULL, 0, '2', NULL, 0, NULL, '2023-09-18 18:25:43', '2023-09-18 18:25:43'),
(325, 229, 'Hassan Salah', 'backend@corddigital.com', '$2y$10$sxRswXpmBqQe2/fb.BGTQO5jTwI2ajL0Uc1bKjblniwzNDkMh0dTy', 'Error doloremque del', '455', '1212121', '41', '1', '1', NULL, 0, '2', NULL, 0, NULL, '2023-09-18 18:34:55', '2023-09-23 06:31:07'),
(326, 233, 'Felicia Martinez', 'canireja@mailinator.com', NULL, 'Voluptas qui tenetur', '681', '+1 (702) 689-3796', '671', '1', '1', NULL, 1, NULL, NULL, 0, NULL, '2023-09-26 06:39:15', '2023-09-26 06:39:15'),
(327, 233, 'Demetrius Burch', 'xajyc@mailinator.com', NULL, 'Est magni cum at eve', '431111', '+1 (345) 742-3389', '159', '1', '2', NULL, 1, NULL, NULL, 0, NULL, '2023-09-26 06:39:15', '2023-09-26 06:39:15'),
(328, 233, 'Jin Henson', 'kiguqonedi@mailinator.com', NULL, 'Ut rerum velit facil', '94444496', '+1 (121) 432-3995', '525', '1', '3', NULL, 0, NULL, NULL, 0, NULL, '2023-09-26 06:39:15', '2023-09-26 06:39:15'),
(329, 234, 'Macey Odom', 'qaraxu@mailinator.com', NULL, 'Veritatis voluptatum', '929', '+1 (344) 366-7681', '105', '1', '1', NULL, 1, NULL, NULL, 0, NULL, '2023-09-26 07:15:12', '2023-09-26 07:15:12'),
(330, 234, 'Conan Whitehead', 'gacyp@mailinator.com', NULL, 'Excepturi harum qui', '235', '+1 (938) 339-2255', '999', '0', '2', NULL, 0, NULL, NULL, 0, NULL, '2023-09-26 07:15:12', '2023-09-26 07:15:12'),
(331, 235, 'Avye Steele', 'sazit@mailinator.com', NULL, 'Magnam iste esse re', '838', '+1 (256) 586-4203', '109', '1', '2', NULL, 1, NULL, NULL, 0, NULL, '2023-09-26 17:52:59', '2023-09-26 17:52:59'),
(332, 235, 'Rama Morgan', 'munavodev@mailinator.com', NULL, 'Eos totam laborum', '488', '+1 (956) 923-3525', '988', '0', '1', NULL, 0, NULL, NULL, 0, NULL, '2023-09-26 17:52:59', '2023-09-26 17:52:59'),
(333, 236, 'صلاح الدين حسن', 'backend@corddigital.com', NULL, 'محاسب', '2365562521', '01125525425', '01125525425', '1', '1', NULL, 1, NULL, NULL, 0, NULL, '2023-10-04 14:40:42', '2023-10-04 14:40:42'),
(334, 237, 'صلاح الدين حسن', 'dsdsdsdsdsd@dsdsds.com', '$2y$10$RoGxFKcHq8R61Gb3oRScceajHiT9/5VibwLy6itgui.JiD8F00F4O', 'محاسب', '21212112120', '01125525425', '01125525425', '1', '3', 'اخت', 1, NULL, NULL, 1, NULL, '2023-10-06 14:04:58', '2023-10-09 05:39:35'),
(335, 241, 'Brock Whitaker', '1', '1', 'Voluptatem necessita', '473', '+1 (161) 269-1873', '+1 (161) 269-1873', '0', '2', NULL, 1, NULL, NULL, 1, NULL, '2023-10-09 08:30:00', '2023-10-09 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `parent_notifications`
--

CREATE TABLE `parent_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `text` varchar(191) NOT NULL,
  `target_url` varchar(191) DEFAULT NULL,
  `is_seen` varchar(191) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=instructor, 3=student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(168, 'manage-admins', 'admins', NULL, NULL),
(169, 'all-admins', 'admins', NULL, NULL),
(170, 'create-admins', 'admins', NULL, NULL),
(1170, 'manage-employees', 'admins', NULL, NULL),
(1171, 'all-employees', 'admins', NULL, NULL),
(1172, 'create-employees', 'admins', NULL, NULL),
(174, 'manage-student', 'admins', NULL, NULL),
(175, 'all-student', 'admins', NULL, NULL),
(176, 'create-student', 'admins', NULL, NULL),
(1111, 'manage-absence', 'admins', NULL, NULL),
(1112, 'all-absence', 'admins', NULL, NULL),
(1117, 'create-absence', 'admins', NULL, NULL),
(1126, 'manage-course', 'admins', NULL, NULL),
(1127, 'all-course', 'admins', NULL, NULL),
(1128, 'create-course', 'admins', NULL, NULL),
(1161, 'manage-subject', 'admins', NULL, NULL),
(1130, 'delete-course', 'admins', NULL, NULL),
(1129, 'edit-course', 'admins', NULL, NULL),
(1131, 'manage-department', 'admins', NULL, NULL),
(1132, 'all-department', 'admins', NULL, NULL),
(1136, 'manage-exam', 'admins', NULL, NULL),
(1137, 'all-exam', 'admins', NULL, NULL),
(1154, 'edit-duties', 'admins', NULL, NULL),
(1144, 'edit-bus', 'admins', NULL, NULL),
(1145, 'delete-bus', 'admins', NULL, NULL),
(193, 'manage-contact', 'admins', NULL, NULL),
(194, 'send-contact', 'admins', NULL, NULL),
(195, 'receive-contact', 'admins', NULL, NULL),
(196, 'conversation-contact', 'admins', NULL, NULL),
(197, 'message-contact', 'admins', NULL, NULL),
(1146, 'manage-class_room', 'admins', NULL, NULL),
(1147, 'all-class_room', 'admins', NULL, NULL),
(1151, 'manage-duties', 'admins', NULL, NULL),
(1152, 'all-duties', 'admins', NULL, NULL),
(1153, 'create-duties', 'admins', NULL, NULL),
(203, 'manage-followup', 'admins', NULL, NULL),
(204, 'all-followup-index', 'admins', NULL, NULL),
(205, 'all-followup-create_class', 'admins', NULL, NULL),
(206, 'all-followup-reading', 'admins', NULL, NULL),
(207, 'all-followup-quran', 'admins', NULL, NULL),
(208, 'manage-finance', 'admins', NULL, NULL),
(209, 'all-finance-treasury', 'admins', NULL, NULL),
(210, 'all-finance-subscriptions', 'admins', NULL, NULL),
(211, 'all-finance-students_subscription', 'admins', NULL, NULL),
(212, 'all-finance-invoices', 'admins', NULL, NULL),
(213, 'all-finance-profit', 'admins', NULL, NULL),
(214, 'all-finance-stores_movement', 'admins', NULL, NULL),
(215, 'all-finance-product_movement', 'admins', NULL, NULL),
(216, 'all-finance-product_invoice_purchases', 'admins', NULL, NULL),
(217, 'all-finance-product_invoice_sales', 'admins', NULL, NULL),
(1156, 'manage-certificate', 'admins', NULL, NULL),
(1157, 'all-certificate', 'admins', NULL, NULL),
(1158, 'create-certificate', 'admins', NULL, NULL),
(221, 'manage-report', 'admins', NULL, NULL),
(222, 'all-report-students_ages', 'admins', NULL, NULL),
(223, 'all-report-parents', 'admins', NULL, NULL),
(224, 'all-report-subscribtions', 'admins', NULL, NULL),
(225, 'all-report-buses', 'admins', NULL, NULL),
(226, 'all-report-buses', 'admins', NULL, NULL),
(1173, 'edit-employees', 'admins', NULL, NULL),
(228, 'manage-parent', 'admins', NULL, NULL),
(1175, 'manage-role', 'admins', NULL, NULL),
(230, 'manage-goals', 'admins', NULL, NULL),
(171, 'edit-admins', 'admins', NULL, NULL),
(172, 'delete-admins', 'admins', NULL, NULL),
(1179, 'delete-role', 'admins', NULL, NULL),
(1177, 'create-role', 'admins', NULL, NULL),
(1178, 'edit-role', 'admins', NULL, NULL),
(1163, 'edit-subject', 'admins', NULL, NULL),
(1162, 'create-subject', 'admins', NULL, NULL),
(1164, 'delete-subject', 'admins', NULL, NULL),
(1133, 'create-department', 'admins', NULL, NULL),
(1135, 'delete-department', 'admins', NULL, NULL),
(1134, 'edit-department', 'admins', NULL, NULL),
(1138, 'create-exam', 'admins', NULL, NULL),
(1140, 'delete-exam', 'admins', NULL, NULL),
(1139, 'edit-exam', 'admins', NULL, NULL),
(1148, 'create-class_room', 'admins', NULL, NULL),
(1149, 'edit-class_room', 'admins', NULL, NULL),
(1150, 'delete-class_room', 'admins', NULL, NULL),
(1141, 'manage-bus', 'admins', NULL, NULL),
(1142, 'all-bus', 'admins', NULL, NULL),
(1143, 'create-bus', 'admins', NULL, NULL),
(1166, 'all-branch', 'admins', NULL, NULL),
(1165, 'manage-branch', 'admins', NULL, NULL),
(1168, 'edit-branch', 'admins', NULL, NULL),
(1169, 'delete-branch', 'admins', NULL, NULL),
(1167, 'create-branch', 'admins', NULL, NULL),
(256, 'manage-chats', 'admins', NULL, NULL),
(257, 'show-messages', 'admins', NULL, NULL),
(177, 'edit-student', 'admins', NULL, NULL),
(1115, 'edit-absence', 'admins', NULL, NULL),
(178, 'delete-student', 'admins', NULL, NULL),
(1116, 'delete-absence', 'admins', NULL, NULL),
(1176, 'all-role', 'admins', NULL, NULL),
(1155, 'delete-duties', 'admins', NULL, NULL),
(1159, 'edit-certificate', 'admins', NULL, NULL),
(1160, 'delete-certificate', 'admins', NULL, NULL),
(1174, 'delete-employees', 'admins', NULL, NULL),
(218, 'all-finance-product_create', 'admins', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=privacy, 2=cookie, 3=terms & conditions',
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `supplier` varchar(191) DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `meta_address` varchar(255) DEFAULT NULL,
  `unit` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=approved, 0=unapproved',
  `tags` varchar(255) DEFAULT NULL,
  `canonical` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `user_id` bigint(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parcode` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 = book\n2 = normal\n'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uuid`, `sku`, `description`, `name`, `image`, `supplier`, `meta_description`, `meta_address`, `unit`, `slug`, `status`, `tags`, `canonical`, `quantity`, `price`, `user_id`, `department_id`, `receiver`, `created_at`, `updated_at`, `parcode`, `type`) VALUES
(13, NULL, 'DA-54258854', 'Occaecati est ut enim temporibus non.', 'قلم', NULL, NULL, 'Exercitationem ut dolores consequuntur consequatur explicabo cum a.', 'Occaecati est ut enim temporibus non.', 'قطعة', 'corporis-sapiente-ut-culpa-et-quis-ducimus', 1, 'Sapiente ipsa necessitatibus ipsam non commodi et.', 'Est dolorem ducimus perferendis ad.', 581, 4.00, 1, 12, NULL, '2023-10-05 16:37:39', '2023-10-05 22:10:32', 'Occaecati est ut enim temporibus non.', NULL),
(9, NULL, 'DA-58963232', NULL, 'مسطرة', NULL, NULL, 'Occaecati veritatis fugiat modi quod quis.', 'Occaecati veritatis fugiat modi quod quis.', 'قطعة', 'quam-possimus-dolor-omnis-eligendi', 1, 'Ullam eos iusto necessitatibus qui laborum mollitia.', 'Neque non maiores quod ut.', 15, 68.00, 1, 14, NULL, '2023-10-05 16:37:39', '2023-10-05 22:09:03', 'Deserunt odio sint neque.', NULL),
(10, NULL, 'DA-89564521', NULL, 'استيكة', NULL, NULL, 'Incidunt deserunt rerum quis nisi.', 'Ipsum veritatis unde harum et fugiat ducimus architecto voluptatibus.', 'قطعة', 'dolores-qui-enim-a-quia-occaecati-inventore', 1, 'Omnis distinctio itaque numquam aliquam quo.', 'Tenetur ab sed architecto ullam dolores doloribus.', 659, 83.00, 1, 21, NULL, '2023-10-05 16:37:39', '2023-10-05 22:09:25', 'Ipsum veritatis unde harum et fugiat ducimus architecto voluptatibus.', NULL),
(11, NULL, 'DA-68745820', NULL, 'كشكول', NULL, NULL, 'Ad suscipit cumque voluptate iusto.', 'كشكول', 'قطعة', 'ullam-praesentium-exercitationem-labore-vero-sunt', 1, 'Autem rerum voluptatibus neque laudantium.', 'Reiciendis exercitationem ad dolores tempora vitae perferendis eius.', 911, 90.00, 1, 13, NULL, '2023-10-05 16:37:39', '2023-10-05 22:09:37', 'Eveniet atque nesciunt fugiat saepe laboriosam ad voluptate.', NULL),
(12, NULL, 'DA-87522825', NULL, 'كراسة', NULL, NULL, 'Voluptate tenetur perferendis repellendus non.', 'Consequuntur dolor esse aut ipsa.', 'قطعة', 'aut-molestias-quaerat-autem-nulla-est', 1, 'Voluptas placeat sed in quod aperiam.', 'Porro ipsam placeat consequatur ut laudantium dolor illo.', 24, 71.00, 1, 13, NULL, '2023-10-05 16:37:39', '2023-10-05 22:10:17', 'Consequuntur dolor esse aut ipsa.', NULL),
(14, NULL, 'DA-89512154', '', 'كرسي', NULL, NULL, 'Qui quasi sed aut.', NULL, 'متر (م)', 'quos-laudantium-ad-autem', 1, 'At quod doloremque eum voluptas fuga quia.', 'Voluptas consequatur quaerat hic rerum consequatur libero aliquid atque.', 932, 78.00, 1, 21, NULL, '2023-10-05 16:37:39', '2023-10-05 16:37:39', 'Mollitia sint id nulla aut saepe repudiandae.', NULL),
(15, NULL, 'DA-78552541', '', 'وجبة', NULL, NULL, 'Voluptas ad non et aut repudiandae iusto enim.', NULL, 'متر (م)', 'amet-doloremque-fuga-autem-deserunt-veniam-aut-impedit', 1, 'Consequatur inventore et corrupti necessitatibus.', 'Ab blanditiis ad ipsam et.', 212, 8.00, 1, 12, NULL, '2023-10-05 16:37:39', '2023-10-05 16:37:39', 'Est molestiae voluptas delectus necessitatibus tenetur praesentium ea aspernatur.', NULL),
(16, NULL, 'DA-71414141', NULL, 'عصير', NULL, NULL, 'Deleniti et voluptatem dolores officia architecto ut.', 'Est voluptates totam quo consequuntur illo dolorem est doloribus.', 'عبوة', 'nihil-quisquam-aspernatur-est-vel-culpa-qui', 1, 'Repellat laudantium qui nobis eius nostrum facere aliquam.', 'Earum tempora adipisci voluptatibus quae.', 941, 6.00, 1, 13, NULL, '2023-10-05 16:37:39', '2023-10-05 22:08:46', 'Odit quasi illum harum.', NULL),
(17, NULL, 'DA-89254524', NULL, 'كتاب الهجاء', NULL, NULL, 'Est voluptates totam quo consequuntur illo dolorem est doloribus.', 'Est voluptates totam quo consequuntur illo dolorem est doloribus.', 'قطعة', 'rerum-accusamus-non-et-nostrum-quis-dolorem-nobis', 1, 'Sit tempora magni id.', 'Recusandae doloremque est sint dolor.', 411, 98.00, 1, 14, NULL, '2023-10-05 16:37:39', '2023-10-05 22:08:30', 'Deserunt perferendis adipisci et rerum.', NULL),
(18, NULL, 'DA-56651323', NULL, 'كتاب التلاوة', '69', NULL, 'Consequuntur id modi vero et.', 'dsdsd', 'قطعة', 'impedit-exercitationem-quas-quibusdam-vel-illo-est-voluptas-et', 1, 'Velit amet at odit animi.', 'Inventore id nisi rerum voluptatem eveniet sequi.', 812, 45.00, 1, 12, NULL, '2023-10-05 16:37:39', '2023-10-05 22:08:12', 'Quidem optio quia eum ad.', NULL),
(20, NULL, 'Est voluptas a accu', 'Consequatur voluptat', 'Damon Steele', NULL, NULL, 'Magnam qui facilis o', 'Alias ipsum reiciend', 'صندوق', 'Explicabo Sed est a', 1, 'Est pariatur Dolore', 'Ipsum rerum molestia', 321, 839.00, 1, 13, NULL, '2023-10-10 09:05:51', '2023-10-10 09:05:51', 'Laudantium in deser', 2),
(21, NULL, 'Quam nisi totam mole', 'Eligendi nostrud dol', 'Quamar Orr', NULL, NULL, 'Consequuntur volupta', 'Nostrum id est illo', 'كيلوجرام (كجم)', 'Iusto est rem non in', 1, 'Quia dolor odit reic', 'Delectus nostrud te', 731, 956.00, 1, 13, NULL, '2023-10-10 11:04:29', '2023-10-10 11:04:29', 'Architecto non commo', 1),
(22, NULL, 'Nam in aperiam enim', 'Animi consectetur', 'Jared Gould', NULL, NULL, 'Consequatur mollit c', 'Quo dolor et id sit', 'طن (طن)', 'In anim odio quis in', 1, 'Ut quisquam delectus', 'Quia laborum Invent', 828, 527.00, 1, 12, NULL, '2023-10-10 11:06:05', '2023-10-10 11:06:05', 'Est commodo sunt ul', 1),
(23, NULL, 'Ad quia atque volupt', 'Perspiciatis cupidi', 'Melyssa Dejesus', NULL, NULL, 'Placeat dolore enim', 'Cillum enim repellen', 'صندوق', 'Eius consequuntur al', 1, 'Expedita eos nostrud', 'Quidem non architect', 447, 754.00, 1, 21, NULL, '2023-10-10 11:19:54', '2023-10-10 11:19:54', 'Excepteur ullam elig', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_invoices`
--

CREATE TABLE `product_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `start_date` varchar(191) DEFAULT NULL,
  `end_date` varchar(191) DEFAULT NULL,
  `percentage` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactivated',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_courses`
--

CREATE TABLE `promotion_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promotion_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `uuid`, `user_id`, `exam_id`, `name`, `created_at`, `updated_at`, `type`) VALUES
(24, '3820cfea-e480-4bce-92c4-d05c2442af31', 1, 5, 'سؤال 1', '2023-09-26 07:43:03', '2023-09-26 07:43:03', '1'),
(23, '3b92f3b7-eaf8-4435-a4a7-cee80d28a5bf', 1, 3, 'التقييم النهائي', '2023-09-25 13:14:11', '2023-09-25 13:14:11', '2'),
(22, '0e4780cb-ac4c-4e56-8000-fdb942519a4e', 1, 3, 'أذكر شاهد التحفة', '2023-09-25 13:14:11', '2023-09-25 13:14:11', '3'),
(20, '9c97a481-9ee2-43d5-b00f-3f14ad6d10e4', 1, 3, 'كم عدد أحكام النون الساكنة', '2023-09-25 13:14:11', '2023-09-25 13:14:11', '2'),
(21, '400f5710-fa05-4be3-bd5b-84f6773e0748', 1, 3, 'عرف الادغام', '2023-09-25 13:14:11', '2023-09-25 13:14:11', '3'),
(19, '9e71986d-e91a-4904-b9d8-3cfdf9352f84', 1, 4, 'Q 2', '2023-09-25 05:18:54', '2023-09-25 05:18:54', '2'),
(18, '6a72aec7-0e17-4a42-a451-cb1e1d9f703c', 1, 4, 'Q 1', '2023-09-25 05:18:54', '2023-09-25 05:18:54', '1'),
(17, 'fe920fb5-95d1-4cc9-9b9a-9debf64bf5f5', 1, 4, 'dsdsd', '2023-09-25 05:18:54', '2023-09-25 05:18:54', '1'),
(25, 'bb71eef2-3eb0-4af7-9a89-ade932bf0a17', 1, 5, 'سؤال 2', '2023-09-26 07:43:03', '2023-09-26 07:43:03', '2'),
(26, '6dad9543-2d7d-488a-97cc-6848cb452fd0', 1, 5, 'سؤال 3', '2023-09-26 07:43:03', '2023-09-26 07:43:03', '3');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `question_option_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `is_correct_answer` varchar(191) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranking_levels`
--

CREATE TABLE `ranking_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `badge_image` varchar(191) NOT NULL,
  `earning` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranking_levels`
--

INSERT INTO `ranking_levels` (`id`, `uuid`, `name`, `badge_image`, `earning`, `student`, `serial_no`, `created_at`, `updated_at`) VALUES
(1, '62e7cfdb-1058-4c95-9bfe-f74a59b0f666', 'Level 1', 'uploads_demo/ranking/level-1.png', 0, 0, 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'fc2c2893-2426-43bf-945e-994d60211cc1', 'Level 2', 'uploads_demo/ranking/level-2.png', 100, 10, 2, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'dd56f7a4-053a-41ff-a253-78dbddf1f38c', 'Level 3', 'uploads_demo/ranking/level-3.png', 200, 20, 3, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, '2643c5c7-3bc1-4661-b4c5-1bc4ba8802e0', 'Level 4', 'uploads_demo/ranking/level-4.png', 300, 30, 4, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, 'ac2ad155-85d7-497c-afdc-08bfa40a4338', 'Level 5', 'uploads_demo/ranking/level-5.png', 400, 40, 5, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(6, 'f09c3e3d-5027-4801-b7d4-608a31b1a9b4', 'Level 6', 'uploads_demo/ranking/level-6.png', 500, 50, 6, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(7, '2caf9645-7b49-4b6d-a815-3048c1d6adc8', 'Level 7', 'uploads_demo/ranking/level-7.png', 600, 60, 7, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(8, '8187c4db-c010-43e8-a3a5-3fd856fe9f86', 'Level 8', 'uploads_demo/ranking/level-8.png', 700, 70, 8, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(9, '0631bd9c-009b-4208-86a5-838c21c69508', 'Level 9', 'uploads_demo/ranking/level-9.png', 800, 80, 9, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(10, '2dab1016-d3ce-4b8f-a77d-0e282bedb314', 'Level 10', 'uploads_demo/ranking/level-10.png', 900, 90, 10, '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_parent_id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'الادمن الاساسي', 'admins', '2023-04-03 13:37:53', '2023-09-17 12:22:22'),
(7, 1, 'مجموعة 1', 'admins', '2023-09-17 11:03:30', '2023-09-17 12:22:28'),
(8, NULL, 'مجموعة فرعية', 'admins', '2023-10-04 13:58:33', '2023-10-04 13:58:33'),
(9, 1, 'Connor Strong', 'admins', '2023-10-08 12:50:19', '2023-10-08 12:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(218, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(228, 1),
(230, 1),
(256, 1),
(257, 1),
(1111, 1),
(1112, 1),
(1115, 1),
(1116, 1),
(1117, 1),
(1126, 1),
(1127, 1),
(1128, 1),
(1129, 1),
(1130, 1),
(1131, 1),
(1132, 1),
(1133, 1),
(1134, 1),
(1135, 1),
(1136, 1),
(1137, 1),
(1138, 1),
(1139, 1),
(1140, 1),
(1141, 1),
(1142, 1),
(1143, 1),
(1144, 1),
(1145, 1),
(1146, 1),
(1147, 1),
(1148, 1),
(1149, 1),
(1150, 1),
(1151, 1),
(1152, 1),
(1153, 1),
(1154, 1),
(1155, 1),
(1156, 1),
(1157, 1),
(1158, 1),
(1159, 1),
(1160, 1),
(1161, 1),
(1162, 1),
(1163, 1),
(1164, 1),
(1165, 1),
(1166, 1),
(1167, 1),
(1168, 1),
(1169, 1),
(1170, 1),
(1171, 1),
(1172, 1),
(1173, 1),
(1174, 1),
(1175, 1),
(1176, 1),
(1177, 1),
(1178, 1),
(1179, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) DEFAULT NULL,
  `salary` varchar(191) DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `salary`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, '9', '10000', '2023-10-04 11:54:55', NULL, '2023-08-09 08:08:52', '2023-10-04 08:54:55'),
(2, '11', '100000', '2023-08-09 12:32:04', NULL, '2023-08-09 09:32:04', '2023-09-24 19:54:15'),
(3, '10', '3320', '2023-10-06 13:09:53', NULL, '2023-08-09 09:37:07', '2023-10-06 10:09:53'),
(4, '23', '12000', '2023-09-19 17:00:48', NULL, '2023-09-19 09:41:01', '2023-09-19 14:00:48'),
(5, '24', '21', '2023-09-24 22:39:11', NULL, '2023-09-24 19:37:43', '2023-09-24 19:39:11'),
(6, '25', '82', '2023-09-24 22:39:33', NULL, '2023-09-24 19:39:33', '2023-09-24 19:39:33'),
(7, '26', '76', '2023-09-26 10:24:35', NULL, '2023-09-26 07:24:35', '2023-09-26 07:24:35'),
(8, '19', '5000', '2023-10-06 13:11:03', NULL, '2023-10-06 10:09:35', '2023-10-06 10:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_key` varchar(191) NOT NULL,
  `option_value` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'دار الانوار', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'app_email', 'info@dar-alanwar.com', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'app_contact_number', '0504880186', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, 'app_location', 'دماص - شارع حافظ ابو عيسي - خلف مسجد الفتح', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, 'app_date_format', 'd/m/Y', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(6, 'app_timezone', 'Asia/Dhaka', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(7, 'allow_preloader', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(8, 'app_preloader', 'uploads_demo/setting/preloader.gif', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(9, 'app_logo', 'uploads_demo/setting/logo.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(10, 'app_fav_icon', 'uploads_demo/setting/fav-icon.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(11, 'app_copyright', '© 2023 جميع الحقوق محقوظة دار الانوار', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(12, 'app_developed', 'دار الانوار', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(13, 'og_title', 'دار الانوار', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(14, 'og_description', 'دار الانوار', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(15, 'zoom_status', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(16, 'bbb_status', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(17, 'jitsi_status', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(18, 'jitsi_server_base_url', 'https://meet.jit.si/', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(19, 'registration_email_verification', '0', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(20, 'footer_quote', 'Mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(21, 'paystack_currency', 'NGN', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(22, 'paystack_conversion_rate', '420', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(23, 'paystack_status', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(24, 'PAYSTACK_PUBLIC_KEY', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(25, 'PAYSTACK_SECRET_KEY', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(26, 'paypal_currency', 'USD', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(27, 'paypal_conversion_rate', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(28, 'paypal_status', '0', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(29, 'PAYPAL_MODE', 'sandbox', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(30, 'PAYPAL_CLIENT_ID', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(31, 'PAYPAL_SECRET', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(32, 'stripe_currency', 'USD', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(33, 'stripe_conversion_rate', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(34, 'stripe_status', '0', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(35, 'STRIPE_MODE', 'sandbox', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(36, 'STRIPE_SECRET_KEY', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(37, 'STRIPE_PUBLIC_KEY', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(38, 'razorpay_currency', 'INR', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(39, 'razorpay_conversion_rate', '78.04', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(40, 'razorpay_status', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(41, 'RAZORPAY_KEY', 'rzp_test_jI4LNxngs3tF4n', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(42, 'RAZORPAY_SECRET', 'lZo8JpuK897uLRrnMB9imhIy', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(43, 'mollie_currency', 'EUR', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(44, 'mollie_conversion_rate', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(45, 'mollie_status', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(46, 'MOLLIE_KEY', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(47, 'im_currency', 'INR', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(48, 'im_conversion_rate', '79.84', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(49, 'im_status', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(50, 'IM_API_KEY', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(51, 'IM_AUTH_TOKEN', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(52, 'IM_URL', 'https://test.instamojo.com/api/1.1/payment-requests/', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(53, 'sslcommerz_currency', 'BDT', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(54, 'sslcommerz_conversion_rate', '92', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(55, 'sslcommerz_status', '0', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(56, 'sslcommerz_mode', 'sandbox', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(57, 'SSLCZ_STORE_ID', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(58, 'SSLCZ_STORE_PASSWD', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(59, 'MAIL_DRIVER', 'smtp', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(60, 'MAIL_HOST', 'mailhog', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(61, 'MAIL_PORT', '1025', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(62, 'MAIL_USERNAME', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(63, 'MAIL_PASSWORD', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(64, 'MAIL_ENCRYPTION', '', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(65, 'MAIL_FROM_ADDRESS', 'hello@example.com', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(66, 'MAIL_FROM_NAME', '${APP_NAME}', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(67, 'MAIL_MAILER', 'smtp', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(68, 'update', 'Save', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(69, 'sign_up_left_text', 'اكتشف أفضل الدورات التدريبية عبر الإنترنت في العالم هنا.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(70, 'sign_up_left_image', 'uploads_demo/home/hero-img.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(71, 'forgot_title', 'Forgot Password?', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(72, 'forgot_subtitle', 'Enter the email address you used when you joined and we’ll send you instructions to reset your password.\n            For security reasons, we do NOT store your password. So rest assured that we will never send your password via email.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(73, 'forgot_btn_name', 'Send Reset Instructions', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(74, 'facebook_url', '#', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(75, 'twitter_url', '#', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(76, 'linkedin_url', '#', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(77, 'pinterest_url', '#', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(78, 'app_instructor_footer_title', 'Join One Of The World’s Largest Learning Marketplaces.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(79, 'app_instructor_footer_subtitle', 'Donald valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my tree', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(80, 'get_in_touch_title', 'Get in Touch', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(81, 'send_us_msg_title', 'Send Us a Message', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(82, 'contact_us_location', '32 Yaool, myself down around dupal the street, London', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(83, 'contact_us_email_one', 'mail@lmszai.co.uk', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(84, 'contact_us_email_two', 'info@lmazaiinner.co.uk', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(85, 'contact_us_phone_one', '328-456-07875', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(86, 'contact_us_phone_two', '128-456-07875', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(87, 'contact_us_map_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1839.0179632416985!2d89.5538504127622!3d22.801132631062536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8f2b1098bf95%3A0xbce09c90b98f8380!2sJust%20Orders%20Khulna!5e0!3m2!1sen!2sbd!4v1636005141952!5m2!1sen!2sbd', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(88, 'contact_us_description', 'Strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal about the human. It might take 6 -12 hour to replay', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(89, 'faq_title', 'Frequently Ask Questions.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(90, 'faq_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(91, 'faq_image_title', 'Still no luck?', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(92, 'faq_image', 'uploads_demo/setting\\faq-img.jpg', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(93, 'faq_tab_first_title', 'Item Support', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(94, 'faq_tab_first_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(95, 'faq_tab_sec_title', 'Licensing', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(96, 'faq_tab_sec_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(97, 'faq_tab_third_title', 'Your Account', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(98, 'faq_tab_third_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(99, 'faq_tab_four_title', 'Tax & Complications', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(100, 'faq_tab_four_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(101, 'home_special_feature_first_logo', 'uploads_demo/setting\\feature-icon1.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(102, 'home_special_feature_first_title', 'Learn From Experts', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(103, 'home_special_feature_first_subtitle', 'Mornings of spring which I enjoy with my whole heart about the gen', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(104, 'home_special_feature_second_logo', 'uploads_demo/setting/feature-icon2.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(105, 'home_special_feature_second_title', 'Earn a Certificate', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(106, 'home_special_feature_second_subtitle', 'Mornings of spring which I enjoy with my whole heart about the gen', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(107, 'home_special_feature_third_logo', 'uploads_demo/setting\\feature-icon3.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(108, 'home_special_feature_third_title', '5000+ Courses', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(109, 'home_special_feature_third_subtitle', 'Serenity has taken possession of my entire soul, like these sweet spring', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(110, 'course_logo', 'uploads_demo/setting/courses-heading-img.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(111, 'course_title', 'A Broad Selection Of Courses', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(112, 'course_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(113, 'bundle_course_logo', 'uploads_demo/setting/bundle-courses-heading-img.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(114, 'bundle_course_title', 'Latest Bundle Courses', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(115, 'bundle_course_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(116, 'top_category_logo', 'uploads_demo/setting/categories-heading-img.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(117, 'top_category_title', 'Our Top Categories', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(118, 'top_category_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(119, 'top_instructor_logo', 'uploads_demo/setting\\top-instructor-heading-img.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(120, 'top_instructor_title', 'Top Rated Courses From Our Top Instructor.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(121, 'top_instructor_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(122, 'become_instructor_video', 'uploads_demo/setting/test.mp4', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(123, 'become_instructor_video_preview_image', 'uploads_demo/setting/video-poster.jpg', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(124, 'become_instructor_video_logo', 'uploads_demo/setting/top-instructor-heading-img.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(125, 'become_instructor_video_title', 'We Only Accept Professional Courses Form Professional Instructors', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(126, 'become_instructor_video_subtitle', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(127, 'customer_say_logo', 'uploads_demo/setting/customers-say-heading-img.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(128, 'customer_say_title', 'What Our Valuable Customers Say.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(129, 'customer_say_first_name', 'DANIEL JHON', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(130, 'customer_say_first_position', 'UI/UX DESIGNER', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(131, 'customer_say_first_comment_title', 'Great instructor, great course', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(132, 'customer_say_first_comment_description', 'Wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(133, 'customer_say_first_comment_rating_star', '5', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(134, 'customer_say_second_name', 'NORTH', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(135, 'customer_say_second_position', 'DEVELOPER', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(136, 'customer_say_second_comment_title', 'Awesome course & good response', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(137, 'customer_say_second_comment_description', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(138, 'customer_say_second_comment_rating_star', '4.5', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(139, 'customer_say_third_name', 'HIBRUPATH', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(140, 'customer_say_third_position', 'MARKETER', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(141, 'customer_say_third_comment_title', 'Fantastic course', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(142, 'customer_say_third_comment_description', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(143, 'customer_say_third_comment_rating_star', '5', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(144, 'achievement_first_logo', 'uploads_demo/setting\\1.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(145, 'achievement_first_title', 'Successfully trained', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(146, 'achievement_first_subtitle', '2000+ students', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(147, 'achievement_second_logo', 'uploads_demo/setting\\2.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(148, 'achievement_second_title', 'Video courses', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(149, 'achievement_second_subtitle', '2000+ students', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(150, 'achievement_third_logo', 'uploads_demo/setting\\3.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(151, 'achievement_third_title', 'Expert instructor', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(152, 'achievement_third_subtitle', '2000+ students', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(153, 'achievement_four_logo', 'uploads_demo/setting\\4.png', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(154, 'achievement_four_title', 'Proudly Received', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(155, 'achievement_four_title', 'Proudly Received', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(156, 'achievement_four_subtitle', '2000+ students', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(157, 'support_faq_title', 'Frequently Ask Questions. 2', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(158, 'support_faq_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS 3', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(159, 'ticket_title', 'Is That Helpful?', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(160, 'ticket_subtitle', 'Are You Still Confusion?', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(161, 'cookie_button_name', 'Allow cookies', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(162, 'cookie_msg', 'Your experience on this site will be improved by allowing cookies', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(163, 'COOKIE_CONSENT_STATUS', '1', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(164, 'platform_charge', '2', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(165, 'sell_commission', '0', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(166, 'app_version', '2', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(167, 'validate_abscent_times', '1', NULL, '2023-10-04 12:43:15'),
(168, 'warning_abscent_text', 'غيااااب', NULL, '2023-09-26 05:52:17'),
(169, 'warning_subscription_text', 'اشتراك', NULL, '2023-09-26 05:52:28'),
(170, 'warning_late_subscription_text', 'اشتراك', NULL, '2023-09-26 05:52:38'),
(171, 'warning_late_subscription_time', '0', NULL, NULL),
(177, 'welcome_text', 'اهلا بك يا طاالب', NULL, '2023-09-26 05:51:44'),
(178, 'welcome_time', '0', NULL, NULL),
(179, 'sending_way', '[\"1\",\"2\",\"3\"]', NULL, '2023-10-04 12:43:15'),
(180, 'send_user_type', '1', NULL, NULL),
(181, 'noting_messages', NULL, NULL, NULL),
(182, 'inq', '<p class=\"text-black fw-bold text-end mt-3\" style=\"text-align: right;\">-العمل تدار متواصل على مدار العام، ويوميا دا يوم الجمعة.</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- لا تقبل إدارة الدار المتاقشة في الأمور الفتية الخاصة ب كدراسة يالدار سواء من تاحية التصاب المقرر من الحصص الدراسية</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">أو المستوى المقرر التدق الطالب يه، أو ماهية المقررات الدراسية و ما يتطليه تحقيق أعداف تلك المقررات من إعداد و تحضير و طرائق تدريس و</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">أساليب تقويم و اختيارات و تصحيح و تشاط داخل الفصل و خارجه، و تحديد مطم أو معلمة دون أحرى .</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- يسدد الاشتراك شهريا والذي يطد تيعا لتقدم مستوى الفلب وعد الساعت الدراسية التي يقضيها الطالب لدار يداية كل شهر ميلادى ولن يقيل</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">تواجد الطالب يأتدار للشهر التالي يدون سداد إلا في حالات معيتة تقيلها إدارة الطالب وفى السوم لن يقيل تواجد الطتب أكثرمن شهرين يدون سداد</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">الاشتراك مهما كاتت الأسبب</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- الدار غر مشولة عن أي غيب للطلب خلال الشهر و لن يعوض يقيمة مالية الا في حكة الاتقطاع التام.</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- لا تقيل إدارة الدار المتاقشة في توعية و مستوى الكتب الدراسية المستخدمة، و يلتزم ولي الأمر يسداد شمن الكتب الدراسية التي ترى الإدارة</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">اضفتها تدشا لما سيق إقراره خلال \" IO \" أيام من تأريغ المطئية بالحضور لاستلام الكتب الدراسية المضافة، هذا و لا تد الدا مسئولة عن</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">ضيع الكتب الدراسية من الطالب لأي سبب كان سواء أخبر الطلب عن مكان احتمال ضياعه منه أو لم يخبر، كما لا يقل اليتة تواجد الطلب فى الدار</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">بغير الكتب الدراسية الخصة يه أو التواجد يكتب دراسية تتفة.</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- الالتزام يالحضور في الوقت المحدد للطتب ، و في حلة التأخير لأي سيب كان يحق لإدارة الدار رفض التحاق الطالب يمجموعته الدراسية ذلك</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">اليوم دون أدتى مسئولية عليها شي عدم دخول الطالب لمقر الدار ، إلا شي الحلات التي تقبلها إدارة الدار</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">، كما لا يقل الاتصراف قيل تهاية وفت المدارسة المحدد، إلا شي الحالات التي تقيلها دارة الدار .</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- لا يقيل اليتة الغيب يدون إنن معتمد من المشرفة المختصة، و لا يسمح يتكرار الغيب سواء يلنن أو يدون إذن يشكل يؤشر على مستوى الطالب.</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- يلتزم ولي الأمر يمتايعة واجبك الطالب، ومعاونة الدار في ضيط سلو كيات الطالب داخل الدار و خارجها..</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">يحدد ولي الأمر طريقة اتصراف الطلب من الدار يذتاه و لا تد الدار مسئولة اليتة ع الطالب خارج اركاتها .</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- فى حالة احتيا الطلب لدروات خاصة فى التخاطب أو صعويات التعلم يلزم الضلب يهذه الدورات كشرط أساسي للتواحد يالدار .وذلك من خلا</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">أخصانى تخطب متخصص وتتايع التتنج مع إدارة الدار .</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">- يلتزم ولي الأمر شي يداية كل عام ميلادى يسداد قيمة لاشتراك المقررة وذك تظير الاشتراك كبرتامج والموقع الالكتروتي الدار لما يأن المبلغ لا</p>\r\n<p class=\"text-black fw-bold text-end\" style=\"text-align: right;\">يسترد يأي حل.</p>', '2023-10-10 13:37:32', '2023-10-11 05:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `special_promotion_tags`
--

CREATE TABLE `special_promotion_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `color` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_promotion_tag_courses`
--

CREATE TABLE `special_promotion_tag_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `special_promotion_tag_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stokes`
--

CREATE TABLE `stokes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier` varchar(191) DEFAULT NULL,
  `receiver` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remain` decimal(8,2) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `creditor` varchar(250) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_code` varchar(255) DEFAULT NULL,
  `client_type` varchar(255) DEFAULT NULL,
  `trans_type` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stokes`
--

INSERT INTO `stokes` (`id`, `product_id`, `price`, `quantity`, `supplier`, `receiver`, `description`, `created_at`, `updated_at`, `remain`, `branch_id`, `creditor`, `student_id`, `store_id`, `total`, `client_name`, `client_code`, `client_type`, `trans_type`) VALUES
(40, 13, 10.00, 0, 'Willow Gallegos', NULL, NULL, '1981-07-19 21:00:00', '2023-10-06 05:28:54', NULL, 1, NULL, NULL, NULL, 100.00, '5', '5', 'student', 'income'),
(41, 12, 647.00, 2, 'Deborah Fowler', NULL, 'Accusamus consectetu', '1990-05-31 21:00:00', '2023-10-10 08:47:11', NULL, 1, NULL, NULL, NULL, 63406.00, '5', '5', 'student', 'income'),
(42, 21, 956.00, 731, NULL, NULL, 'Eligendi nostrud dol', '2023-10-10 11:04:29', '2023-10-10 11:04:29', NULL, 1, NULL, NULL, NULL, 698836.00, NULL, NULL, NULL, 'income'),
(43, 22, 527.00, 828, NULL, NULL, 'Animi consectetur', '2023-10-10 11:06:05', '2023-10-10 11:06:05', NULL, 1, NULL, NULL, NULL, 436356.00, NULL, NULL, NULL, 'income'),
(35, 1, 2000.00, 43, 'خالد اشرف', NULL, NULL, '2023-10-03 21:00:00', '2023-10-04 13:18:50', NULL, 1, NULL, NULL, NULL, 2000.00, '5', '5', 'student', 'income'),
(36, 13, 50.00, 20, 'خالد اشرف', 'سيد جمال', NULL, '2023-10-05 21:00:00', '2023-10-05 22:13:39', NULL, 1, NULL, NULL, NULL, 1000.00, NULL, NULL, NULL, 'expense'),
(37, 12, 20.00, 100, 'خالد اشرف', 'سيد جمال', NULL, '2023-10-05 21:00:00', '2023-10-05 22:13:39', NULL, 1, NULL, NULL, NULL, 2000.00, NULL, NULL, NULL, 'expense'),
(39, 13, 10.00, 10, 'خالد اشرف', NULL, NULL, '2023-10-05 21:00:00', '2023-10-05 22:27:29', NULL, 1, NULL, NULL, NULL, 100.00, '236', '236', 'student', 'income'),
(44, 21, 1.00, 730, 'Ima Contreras', NULL, 'Dolore in est conseq', '1970-01-06 22:00:00', '2023-10-10 11:07:06', NULL, 1, NULL, NULL, NULL, 1.00, '5', '5', 'student', 'income'),
(45, 23, 754.00, 447, NULL, NULL, 'Perspiciatis cupidi', '2023-10-10 11:19:54', '2023-10-10 11:19:54', NULL, 1, NULL, NULL, NULL, 337038.00, NULL, NULL, NULL, 'income'),
(46, 21, 2.00, 729, 'خالد اشرف', NULL, NULL, '2023-10-09 21:00:00', '2023-10-10 12:01:46', NULL, 1, NULL, NULL, NULL, 2.00, '5', '5', 'student', 'income');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_transactions`
--

CREATE TABLE `store_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_number` varchar(191) NOT NULL,
  `movement_type` varchar(191) NOT NULL,
  `product_id` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `movement_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `supplier` varchar(191) DEFAULT NULL,
  `receiver` varchar(191) DEFAULT NULL,
  `balance_after_movement` decimal(10,2) NOT NULL,
  `current_balance` decimal(10,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_transactions`
--

INSERT INTO `store_transactions` (`id`, `permission_number`, `movement_type`, `product_id`, `quantity`, `price`, `movement_date`, `supplier`, `receiver`, `balance_after_movement`, `current_balance`, `notes`, `created_at`, `updated_at`) VALUES
(1, '3043', 'income', '4', 10, 40.00, '2023-09-11 11:02:21', 'احمد سيد', 'حسن حسام', 40.00, 40.00, 'سيسيس', '2023-09-11 08:02:21', '2023-09-11 08:02:21'),
(2, '55', 'income', '4', 19, 76.00, '2023-09-11 11:05:55', 'احمد سيد', 'حسن حسام', 59.00, 59.00, 'dfdf', '2023-09-11 08:05:55', '2023-09-11 08:05:55'),
(3, '6904', 'income', '4', 30, 120.00, '2023-09-11 11:07:28', 'احمد سيد', 'حسن حسام', 89.00, 89.00, 'sss', '2023-09-11 08:07:28', '2023-09-11 08:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(30) NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1 => male, 2 => female',
  `birthdate` date NOT NULL,
  `city_id` varchar(191) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `about_me` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = active,\n3 = excluded,\n4 = converted,\n5 = suspend,',
  `branch_id` int(10) UNSIGNED NOT NULL,
  `period` tinyint(4) NOT NULL COMMENT '1=>morning, 2=>evening, 3=>both',
  `guardian_relationship` varchar(191) DEFAULT NULL,
  `guardian_name` varchar(191) DEFAULT NULL,
  `guardian_phone_number` varchar(191) DEFAULT NULL,
  `guardian_whatsapp_number` varchar(191) DEFAULT NULL,
  `bus` tinyint(1) NOT NULL DEFAULT 1,
  `how_did_you_hear_about_us` varchar(191) DEFAULT NULL,
  `personal_photo` varchar(191) DEFAULT NULL,
  `blood_type` varchar(191) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `joining_date` date DEFAULT NULL,
  `medical_history` longtext DEFAULT NULL,
  `id_number` int(11) DEFAULT NULL,
  `derpatment` varchar(250) DEFAULT NULL,
  `guardian_email` varchar(250) DEFAULT NULL,
  `profession` varchar(250) DEFAULT NULL,
  `receiving_officer` varchar(250) DEFAULT NULL,
  `followup_officer` varchar(250) DEFAULT NULL,
  `appointment` date DEFAULT NULL,
  `class_room_id` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `department_id` varchar(250) DEFAULT NULL,
  `birth_certificate` int(11) DEFAULT NULL,
  `parents_card_copy` varchar(255) DEFAULT NULL,
  `another_file` int(11) DEFAULT NULL,
  `level_id` varchar(250) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `wallet` decimal(10,2) DEFAULT NULL,
  `parents_marital_status` varchar(255) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `email_verified_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `code`, `gender`, `birthdate`, `city_id`, `user_id`, `phone_number`, `address`, `about_me`, `status`, `branch_id`, `period`, `guardian_relationship`, `guardian_name`, `guardian_phone_number`, `guardian_whatsapp_number`, `bus`, `how_did_you_hear_about_us`, `personal_photo`, `blood_type`, `parent_id`, `created_at`, `updated_at`, `email`, `password`, `joining_date`, `medical_history`, `id_number`, `derpatment`, `guardian_email`, `profession`, `receiving_officer`, `followup_officer`, `appointment`, `class_room_id`, `image`, `department_id`, `birth_certificate`, `parents_card_copy`, `another_file`, `level_id`, `subject_id`, `wallet`, `parents_marital_status`, `notes`, `email_verified_at`) VALUES
(5, 'Catherine Reeves', '202310231', 1, '1974-08-03', '173', NULL, NULL, 'Consectetur aut har', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 'Duis odio veniam er', NULL, 'Voluptate exercitati', NULL, '2023-05-17 11:19:27', '2023-10-04 10:44:22', 'hassanstudent2@daranwar.com', '$2y$10$XfPBzt8UGWt3f4QuVEQhe.X9/NOy0PXxfmwTnMJDct1qJbD/p5eSW', '2023-10-04', '1972-07-24', NULL, '14', NULL, NULL, NULL, NULL, '2020-02-05', NULL, '10', '12', NULL, NULL, NULL, NULL, 2, -504.00, '1', NULL, '2023-09-19'),
(7, 'آدم حسام عتمان', '2861', 1, '2018-01-01', '139', NULL, '01012345678', 'دماص', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 'من الأصدقاء', NULL, 'b', NULL, '2023-07-15 11:54:16', '2023-09-23 14:27:09', 'adam@gmail.com', '$2y$10$2aBAY8u8fXbmabf9/tv6T.Bq1DyxzXfkf3TSe4yo6kOkuy5Yb47Le', '2020-11-01', '2018-01-01', NULL, '13', NULL, NULL, NULL, NULL, '2018-11-11', '1', NULL, '13', NULL, NULL, NULL, NULL, 2, NULL, '1', NULL, '2023-09-19'),
(229, 'Daria Hays', '202320230', 1, '1994-03-26', '266', NULL, NULL, NULL, NULL, 3, 2, 1, NULL, NULL, NULL, NULL, 0, 'Voluptate sunt veri', NULL, 'admin@app.com', NULL, '2023-09-18 18:24:06', '2023-10-06 05:47:23', 'covufuvon@mailinator.com', '$2y$10$5V5y5AF5deeWUF6MUrI9sOdCt7.xG76yQiCZpMk34HjkW8EfJg/xy', '2023-09-23', 'Nulla quia voluptate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '32', NULL, 42, '[39,40,41]', 43, NULL, NULL, 11496.00, '1', 'Ut voluptatem dolore', '2023-09-19'),
(236, 'حسن صلاح الدين حسن', '202320237', 1, '2001-01-04', '12', NULL, NULL, '12', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 'fdfdfd', NULL, 'O', NULL, '2023-10-04 14:40:42', '2023-10-09 08:42:53', 'backend@corddigital.com', '$2y$10$7DdLA1oLFiMbcmBbNIQn8u1eN.NU9TYjer0Vaj54DjleOST89CaT2', '2023-10-04', 'تاريخ طبي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '63', NULL, 66, '[64,65]', NULL, NULL, NULL, NULL, '1', 'ليست', NULL),
(232, 'Sopoline Marquez', '202310230', 3, '2012-05-01', '110', NULL, NULL, 'Quia commodo nostrum', NULL, 5, 1, 1, NULL, NULL, NULL, NULL, 1, 'Nihil magni quis vol', NULL, 'Cumque voluptate eaq', NULL, '2023-09-26 06:06:38', '2023-09-26 06:41:36', 'guxuk@mailinator.com', '$2y$10$NfvqGTyK4XucEzZGltP4KO2mcCNa8n4TvGo7CLfeAk5BcFJJO0sMq', '1989-04-16', 'Blanditiis ut debiti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Dolor saepe quia asp', NULL),
(233, 'Zenaida Barlow', '202330233', 3, '1973-03-28', '39', NULL, NULL, 'Ut voluptates qui te', NULL, 5, 3, 2, NULL, NULL, NULL, NULL, 0, 'Beatae sit eiusmod e', NULL, 'Consequatur explicab', NULL, '2023-09-26 06:39:15', '2023-09-26 06:39:15', 'kika@mailinator.com', '$2y$10$TL0fdkWIOM.xSecM49e58etnMglyQX060IHr1F8Wz4JLGkONx4Lmy', '2014-01-28', 'Fuga Et quia aperia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '48', NULL, 51, '[49,50]', NULL, NULL, NULL, NULL, '1', 'Accusamus ea omnis h', NULL),
(234, 'Keely Morton', '202320234', 2, '1979-03-08', '165', NULL, NULL, 'Blanditiis perspicia', NULL, 3, 2, 3, NULL, NULL, NULL, NULL, 0, 'Nulla sit pariatur', NULL, 'Adipisci corporis al', NULL, '2023-09-26 07:15:12', '2023-10-06 09:41:19', 'voqunu@mailinator.com', '$2y$10$NMAqF2fanaoHNN11NK9U9OSH8F/IIB6uRDZ9WFv36cif8eSy2OmHO', '2021-01-12', 'Ea iure ullamco pers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '52', NULL, 56, '[53,54,55]', NULL, NULL, NULL, NULL, '2', 'Sed tempora rerum in', NULL),
(235, 'Alexandra Snider', '202330235', 2, '2017-10-31', '369', NULL, NULL, 'Aliqua Ratione quod', NULL, 4, 3, 1, NULL, NULL, NULL, NULL, 0, 'Temporibus debitis m', NULL, 'Consectetur illum c', NULL, '2023-09-26 17:52:59', '2023-10-06 09:42:01', 'kicum@mailinator.com', '$2y$10$DU820T85lA0mbAwI8WHpPOQYZF7mu73MZXLrqj684lLkh6d7bLmgS', '2023-09-26', 'Vel repellendus Rer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '58', NULL, 62, '[59,60,61]', NULL, NULL, NULL, NULL, '2', 'Consequuntur id iur', NULL),
(237, 'حسن صلاح الدين حسن', '202300237', 1, '2007-01-01', '1', NULL, NULL, '12', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 'ffdfdfdf', NULL, 'O-', NULL, '2023-10-06 14:04:58', '2023-10-09 07:03:21', 'admin2@app.com', '$2y$10$zlkZD62uDLkfYN0O7oiCguf8/roFY2rINf2ApfTLdr9rasvCquKnW', '2023-10-06', 'لا يوجد', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"10\",\"13\",\"14\"]', NULL, NULL, 71, '[70]', NULL, NULL, NULL, NULL, '1', 'sdsd', NULL),
(238, 'Danielle King', '202300238', 1, '2011-01-09', '164', NULL, NULL, 'Sunt dolores dolore', NULL, 1, 2, 2, NULL, NULL, NULL, NULL, 1, '5', NULL, 'Magni necessitatibus', NULL, '2023-10-09 08:28:16', '2023-10-09 08:28:16', 'doseciho@mailinator.com', '$2y$10$g2FwlYTcdn.CnITAPm0uI.KMzHDeXA2HrhAEuYIrL1DPBGy15ymM6', '2023-10-09', 'Inventore possimus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Quo earum consequatu', NULL),
(239, 'Danielle King', '202300239', 1, '2011-01-09', '164', NULL, NULL, 'Sunt dolores dolore', NULL, 1, 2, 2, NULL, NULL, NULL, NULL, 1, '5', NULL, 'Magni necessitatibus', NULL, '2023-10-09 08:29:17', '2023-10-09 08:29:17', 'doseciho@mailinator.com', '$2y$10$7Z0/nA/Rw/IO11vk/untf.OnBw7RiHT9o0rCFQ4mWdr1yh3LRgqU.', '2023-10-09', 'Inventore possimus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Quo earum consequatu', NULL),
(240, 'Danielle King', '202300240', 1, '2011-01-09', '164', NULL, NULL, 'Sunt dolores dolore', NULL, 1, 2, 2, NULL, NULL, NULL, NULL, 1, '5', NULL, 'Magni necessitatibus', NULL, '2023-10-09 08:29:35', '2023-10-09 08:29:35', 'doseciho@mailinator.com', '$2y$10$9LnvWnSLJFvkYxGy2gXyTesrG2B83oh3BxfuUQ.UMO.OrPRDQXPHS', '2023-10-09', 'Inventore possimus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Quo earum consequatu', NULL),
(241, 'Danielle King', '202300241', 1, '2011-01-09', '164', NULL, NULL, 'Sunt dolores dolore', NULL, 1, 2, 2, NULL, NULL, NULL, NULL, 1, '5', NULL, 'Magni necessitatibus', NULL, '2023-10-09 08:30:00', '2023-10-09 08:30:00', 'doseciho@mailinator.com', '$2y$10$NNdcXH3aG9JBvotTg1o.C.azc/M9j/MO7soN/FLbXMLP4.kbiO/0G', '2023-10-09', 'Inventore possimus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Quo earum consequatu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_buses`
--

CREATE TABLE `student_buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `bus_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_buses`
--

INSERT INTO `student_buses` (`id`, `student_id`, `bus_id`, `created_at`, `updated_at`) VALUES
(1, 5, 2, '2023-09-25 15:21:42', '2023-09-25 15:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_certificates`
--

CREATE TABLE `student_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `path` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_class_rooms`
--

CREATE TABLE `student_class_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `class_room_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_class_rooms`
--

INSERT INTO `student_class_rooms` (`id`, `student_id`, `class_room_id`, `created_at`, `updated_at`) VALUES
(2, 237, 10, NULL, NULL),
(4, 237, 13, NULL, NULL),
(5, 237, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `course_id`, `student_id`, `created_at`, `updated_at`) VALUES
(7, 10, 229, NULL, NULL),
(8, 12, 229, NULL, NULL),
(9, 14, 232, NULL, NULL),
(10, 13, 232, NULL, NULL),
(11, 13, 233, NULL, NULL),
(12, 10, 234, NULL, NULL),
(13, 12, 235, NULL, NULL),
(14, 13, 235, NULL, NULL),
(15, 14, 236, NULL, NULL),
(16, 12, 236, NULL, NULL),
(17, 10, 238, NULL, NULL),
(18, 12, 238, NULL, NULL),
(19, 13, 238, NULL, NULL),
(20, 17, 238, NULL, NULL),
(21, 10, 239, NULL, NULL),
(22, 12, 239, NULL, NULL),
(23, 13, 239, NULL, NULL),
(24, 17, 239, NULL, NULL),
(25, 10, 240, NULL, NULL),
(26, 12, 240, NULL, NULL),
(27, 13, 240, NULL, NULL),
(28, 17, 240, NULL, NULL),
(29, 10, 241, NULL, NULL),
(30, 12, 241, NULL, NULL),
(31, 13, 241, NULL, NULL),
(32, 17, 241, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_departments`
--

CREATE TABLE `student_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_departments`
--

INSERT INTO `student_departments` (`id`, `student_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 223, 12, NULL, NULL),
(2, 223, 14, NULL, NULL),
(3, 224, 12, NULL, NULL),
(4, 224, 14, NULL, NULL),
(5, 225, 14, NULL, NULL),
(6, 226, 12, NULL, NULL),
(7, 226, 13, NULL, NULL),
(8, 227, 12, NULL, NULL),
(9, 227, 13, NULL, NULL),
(10, 228, 13, NULL, NULL),
(11, 228, 14, NULL, NULL),
(14, 230, 13, NULL, NULL),
(15, 230, 14, NULL, NULL),
(16, 231, 13, NULL, NULL),
(17, 231, 14, NULL, NULL),
(19, 229, 14, NULL, NULL),
(20, 229, 12, NULL, NULL),
(21, 232, 13, NULL, NULL),
(22, 233, 12, NULL, NULL),
(23, 233, 13, NULL, NULL),
(24, 234, 12, NULL, NULL),
(25, 234, 13, NULL, NULL),
(26, 235, 12, NULL, NULL),
(27, 5, 12, NULL, NULL),
(28, 5, 13, NULL, NULL),
(29, 236, 13, NULL, NULL),
(30, 236, 21, NULL, NULL),
(31, 237, 12, NULL, NULL),
(32, 237, 14, NULL, NULL),
(33, 238, 12, NULL, NULL),
(34, 238, 21, NULL, NULL),
(35, 239, 12, NULL, NULL),
(36, 239, 21, NULL, NULL),
(37, 240, 12, NULL, NULL),
(38, 240, 21, NULL, NULL),
(39, 241, 12, NULL, NULL),
(40, 241, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_duties`
--

CREATE TABLE `student_duties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `marks` decimal(10,2) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_duties`
--

INSERT INTO `student_duties` (`id`, `student_id`, `assignment_id`, `marks`, `instructor_id`, `created_at`, `updated_at`) VALUES
(7, 5, 5, 10.00, 6, NULL, '2023-09-23 09:54:19'),
(9, 5, 9, 30.00, 6, NULL, '2023-09-23 10:04:19'),
(10, 5, 4, NULL, NULL, NULL, NULL),
(11, 5, 14, 3.00, NULL, NULL, '2023-10-01 07:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `student_goals`
--

CREATE TABLE `student_goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(191) DEFAULT NULL,
  `goal_id` varchar(191) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_goals`
--

INSERT INTO `student_goals` (`id`, `student_id`, `goal_id`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, '5', '2', NULL, 1, '2023-09-24 07:14:53', '2023-09-24 07:14:53'),
(2, '229', '3', NULL, 1, '2023-09-24 07:14:53', '2023-09-24 07:14:53'),
(3, '5', '4', NULL, 1, '2023-09-24 07:15:04', '2023-09-24 07:15:04'),
(4, '229', '5', NULL, 1, '2023-09-24 07:15:04', '2023-09-24 07:15:04'),
(5, '5', '6', NULL, 1, '2023-09-24 07:15:40', '2023-09-24 07:15:40'),
(6, '229', '7', NULL, 1, '2023-09-24 07:15:40', '2023-09-24 07:15:40'),
(7, '5', '8', NULL, 1, '2023-09-24 07:15:49', '2023-09-24 07:15:49'),
(8, '229', '9', NULL, 0, '2023-09-24 07:15:49', '2023-09-24 10:14:27'),
(9, '5', '10', NULL, 0, '2023-09-24 07:33:10', '2023-09-24 10:13:04'),
(10, '229', '11', NULL, 0, '2023-09-24 07:33:10', '2023-09-24 10:01:21'),
(11, '5', '12', NULL, 0, '2023-09-24 09:30:14', '2023-09-24 10:08:46'),
(12, '229', '12', NULL, 0, '2023-09-24 09:30:14', '2023-09-24 10:08:51'),
(13, '5', '13', 'Eum rem laborum Qui', 1, '2023-09-24 13:41:46', '2023-09-24 13:41:46'),
(14, '7', '14', 'Nisi numquam ipsum o', 1, '2023-09-24 13:41:46', '2023-09-24 13:41:46'),
(15, '229', '15', 'Beatae reprehenderit', 1, '2023-09-24 13:41:46', '2023-09-24 13:41:46'),
(16, '5', '16', 'Id et odio aut hic', 1, '2023-09-24 13:49:01', '2023-09-24 13:49:01'),
(17, '7', '17', 'Non sapiente omnis v', 1, '2023-09-24 13:49:01', '2023-09-24 13:49:01'),
(18, '229', '18', 'Corrupti ad quaerat', 1, '2023-09-24 13:49:01', '2023-09-24 13:49:01'),
(19, '5', '19', NULL, 0, '2023-09-25 13:12:16', '2023-09-25 13:14:59'),
(20, '229', '19', NULL, 1, '2023-09-25 13:12:16', '2023-09-25 13:12:16'),
(21, '5', '20', NULL, 1, '2023-09-25 19:28:15', '2023-09-25 19:28:15'),
(22, '5', '21', NULL, 1, '2023-09-26 06:09:28', '2023-09-26 06:09:28'),
(23, '229', '21', NULL, 1, '2023-09-26 06:09:28', '2023-09-26 06:09:28'),
(24, '5', '21', NULL, 1, '2023-09-26 06:20:42', '2023-09-26 06:20:42'),
(25, '229', '21', NULL, 1, '2023-09-26 06:20:42', '2023-09-26 06:20:42'),
(26, '5', '21', NULL, 1, '2023-09-26 07:08:25', '2023-09-26 07:08:25'),
(27, '229', '21', NULL, 1, '2023-09-26 07:08:25', '2023-09-26 07:08:25'),
(28, '5', '22', NULL, 0, '2023-09-26 07:43:54', '2023-09-26 07:44:46'),
(29, '229', '22', NULL, 1, '2023-09-26 07:43:54', '2023-09-26 07:43:54'),
(30, '5', '21', NULL, 1, '2023-09-26 17:46:34', '2023-09-26 17:46:34'),
(31, '229', '21', NULL, 1, '2023-09-26 17:46:34', '2023-09-26 17:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_levels`
--

CREATE TABLE `student_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_levels`
--

INSERT INTO `student_levels` (`id`, `student_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 227, 1, NULL, NULL),
(2, 228, 1, NULL, NULL),
(4, 230, 3, NULL, NULL),
(5, 231, 3, NULL, NULL),
(10, 229, 1, NULL, NULL),
(11, 232, 1, NULL, NULL),
(12, 233, 2, NULL, NULL),
(13, 234, 1, NULL, NULL),
(14, 235, 4, NULL, NULL),
(15, 5, 1, NULL, NULL),
(16, 236, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_notifications`
--

CREATE TABLE `student_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `text` varchar(191) NOT NULL,
  `target_url` varchar(191) DEFAULT NULL,
  `is_seen` varchar(191) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=instructor, 3=student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_notifications`
--

INSERT INTO `student_notifications` (`id`, `uuid`, `sender_id`, `user_id`, `text`, `target_url`, `is_seen`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'sdsdsd', 1, 229, 'sdsd', 'dsds', 'yes', 1, '2023-09-19 09:51:05', '2023-09-19 06:56:35'),
(2, '598b09a0-88ac-4246-a8fe-9b8745244ecf', 1, 229, 'تم اضافة واجب لك', NULL, 'no', 2, '2023-09-20 05:42:38', '2023-09-20 05:42:38'),
(3, 'f392794c-d32a-4e07-92e8-f9a3845c859b', 1, 5, 'تم اضافة واجب لك', NULL, 'no', 2, '2023-09-23 11:07:05', '2023-09-23 11:07:05'),
(4, '2646357c-72a4-441f-8ac7-e6b580d2d9cb', 1, 5, 'تم اضافة واجب لك', NULL, 'no', 2, '2023-09-25 05:53:22', '2023-09-25 05:53:22'),
(5, 'cd8d2aaa-191b-4d60-a07a-bb8e05114d7e', 1, 232, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-09-26 06:06:38', '2023-09-26 06:06:38'),
(6, '9ad6887f-dd0e-4896-ae22-bbe4bc80496a', 1, 233, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-09-26 06:39:15', '2023-09-26 06:39:15'),
(7, '8aedc71d-0b88-4adc-aaa0-7bdef94b2ce9', 1, 234, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-09-26 07:15:12', '2023-09-26 07:15:12'),
(8, 'fc71ee83-a2c9-47a6-be22-d945245008c4', 1, 5, 'تم اضافة واجب لك', NULL, 'no', 2, '2023-09-26 07:55:54', '2023-09-26 07:55:54'),
(9, 'e3efd18c-4317-4bd2-86ed-92d64f9b15b6', 1, 235, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-09-26 17:52:59', '2023-09-26 17:52:59'),
(10, 'f1426d2d-18f6-4737-b6cd-a8f2b693fc90', 1, 236, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-10-04 14:40:42', '2023-10-04 14:40:42'),
(11, '5fd9f0b4-c1b6-4e2f-aa1d-aea0ca78af8f', 1, 237, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-10-06 14:04:58', '2023-10-06 14:04:58'),
(12, '9b16899f-dc99-4737-b5af-31129f780d73', 1, 241, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-10-09 08:30:00', '2023-10-09 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_reports`
--

CREATE TABLE `student_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `paper_precent` int(11) DEFAULT NULL,
  `attitude` longtext DEFAULT NULL,
  `performance` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_reports`
--

INSERT INTO `student_reports` (`id`, `student_id`, `date_from`, `date_to`, `paper_precent`, `attitude`, `performance`, `created_at`, `updated_at`) VALUES
(2, 5, '1996-02-21', '1982-09-01', 16, 'Optio irure est cumfdfd', 'Aliquam ut aut exerc', '2023-09-25 12:38:52', '2023-09-25 12:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_reveiws`
--

CREATE TABLE `student_reveiws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_reveiws`
--

INSERT INTO `student_reveiws` (`id`, `student_id`, `department_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 229, NULL, 'speech_disorders', 'جيد', '2023-09-20 08:20:31', '2023-09-20 08:40:51'),
(2, 229, NULL, 'quran_memorization', 'جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(3, 229, NULL, 'practical_recitation', 'ليس جي]', '2023-09-20 08:20:31', '2023-09-25 19:15:46'),
(4, 229, NULL, 'sharia_sciences', 'ليس جيد<<<<', '2023-09-20 08:20:31', '2023-09-25 19:15:46'),
(5, 229, NULL, 'first-subject', 'ليس جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(6, 229, NULL, 'التلاوة', 'جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(7, 229, NULL, 'انجليزي', 'ليس جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(8, 229, NULL, 'hhhh', 'ليس جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(9, 229, NULL, 'enable_letters', 'جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(10, 229, NULL, 'Reading_the_structure_of_words', 'ليس جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(11, 229, NULL, 'assembly_of_sentences', 'جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(12, 229, NULL, 'filling', 'جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(13, 229, NULL, 'quran_diacritics', 'ليس جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(14, 229, NULL, 'quran_in_quran', 'جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(15, 229, NULL, 'islamic_etiquette', 'جيد', '2023-09-20 08:20:31', '2023-09-20 08:20:31'),
(16, 229, NULL, 'speech_disorders', 'جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(17, 229, NULL, 'quran_memorization', 'جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(18, 229, NULL, 'practical_recitation', 'ليس جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(19, 229, NULL, 'sharia_sciences', 'ليس جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(20, 229, NULL, 'first-subject', 'ليس جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(21, 229, NULL, 'التلاوة', 'جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(22, 229, NULL, 'انجليزي', 'ليس جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(23, 229, NULL, 'hhhh', 'ليس جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(24, 229, NULL, 'enable_letters', 'جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(25, 229, NULL, 'Reading_the_structure_of_words', 'ليس جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(26, 229, NULL, 'assembly_of_sentences', 'جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(27, 229, NULL, 'filling', 'جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(28, 229, NULL, 'quran_diacritics', 'ليس جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(29, 229, NULL, 'quran_in_quran', 'جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(30, 229, NULL, 'islamic_etiquette', 'جيد', '2023-09-20 08:24:52', '2023-09-20 08:24:52'),
(31, 229, NULL, 'speech_disorders', 'ليس', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(32, 229, NULL, 'quran_memorization', 'جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(33, 229, NULL, 'practical_recitation', 'ليس جيد<', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(34, 229, NULL, 'sharia_sciences', 'ليس جيد<', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(35, 229, NULL, 'first-subject', 'ليس جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(36, 229, NULL, 'التلاوة', 'جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(37, 229, NULL, 'انجليزي', 'ليس جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(38, 229, NULL, 'hhhh', 'ليس جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(39, 229, NULL, 'enable_letters', 'جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(40, 229, NULL, 'Reading_the_structure_of_words', 'ليس جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(41, 229, NULL, 'assembly_of_sentences', 'جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(42, 229, NULL, 'filling', 'جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(43, 229, NULL, 'quran_diacritics', 'ليس جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(44, 229, NULL, 'quran_in_quran', 'جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49'),
(45, 229, NULL, 'islamic_etiquette', 'جيد', '2023-09-20 08:33:49', '2023-09-20 08:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `abscence_count` int(11) DEFAULT 0,
  `attendanc_count` int(11) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `review_name` varchar(255) DEFAULT NULL,
  `grade` decimal(10,2) DEFAULT NULL,
  `precentage` decimal(10,2) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `student_id`, `subject_id`, `abscence_count`, `attendanc_count`, `review_date`, `review_name`, `grade`, `precentage`, `notes`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 2, NULL, '1975-01-22', 'Yuri Daniels', 13.00, 32.00, 'Commodi quas eligend', NULL, '2023-09-26 06:16:29'),
(2, 5, 2, 6, NULL, '2003-03-28', 'Connor Russo', 37.00, 87.00, 'Illum eum accusamus', '2023-09-15 17:05:00', '2023-09-26 06:19:39'),
(3, 229, 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-10 11:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `student_subscription`
--

CREATE TABLE `student_subscription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `rec_time` int(11) DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `active_days` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subscription`
--

INSERT INTO `student_subscription` (`id`, `student_id`, `subscription_id`, `rec_time`, `payment_status`, `active_days`, `created_at`, `updated_at`) VALUES
(9, 236, 23, 2, 'unpaid', 150, '2023-10-05 11:58:42', '2023-10-05 15:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `uuid`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, '57030da9-148f-47a2-9a43-4e5af775186f', 1, 'Web Development', 'web-development', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, '279ee00d-3d2f-4a60-a469-b331ac9389ae', 1, 'Data Science', 'data-science', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'e1a463de-5a0b-4789-b854-6ee05ab83844', 1, 'Mobile Development', 'mobile-development', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, '7fbdb18f-5379-4b27-8695-1695fe356b37', 1, 'Programming Language', 'programming-language', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, '1d9bf09a-bb93-4449-b86b-055af8c9f04c', 1, 'Game Development', 'game-development', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(6, '3a3dce12-91c7-40aa-a492-413d58beddba', 2, 'IT Certifications', 'it-certifications', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(7, '16a67c45-d17f-47ee-b278-983f225a97f0', 2, 'Network & Security', 'network-security', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(8, 'c09f4a6a-a536-46e0-aa18-e6c6b8deb90e', 2, 'Hardware', 'hardware', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(9, 'b415a36b-86c5-4c63-9cb7-d6e3abc8467f', 2, 'Operating System & Servers', 'operating-system-servers', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(10, 'b5e4251e-2eee-4ea9-b26f-11d9b92e5e58', 3, 'Microsoft', 'microsoft', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(11, 'b884544a-1e23-456e-b040-02bd4658b00f', 3, 'Apple', 'apple', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(12, '92e05a42-71bc-4be8-b61c-2a2ab5d599b9', 3, 'Google', 'google', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(13, '47ff505f-5093-4f49-a5e8-cfb60ed2ecfa', 4, 'Career Development', 'career-development', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(14, '947ad81e-88c9-47f4-9d54-affd9a791fa1', 4, 'Creativity', 'creativity', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(15, '0c27b6f2-562b-4f27-8f23-525d14fd3c35', 5, 'Communication', 'communication', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(16, '0fa90958-636c-4123-871c-31d363ba17c6', 5, 'Management', 'management', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(17, '69c887b8-4534-4c8f-a4d4-0677ab82ea6a', 5, 'Sales', 'sales', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(18, '8dced360-8282-4936-9d7c-c6bb9b176df8', 7, 'Web Design', 'web-design', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(19, '3779cb7d-1b7c-41b8-8c70-b9fe6cd4c827', 7, 'Graphic Design', 'graphic-design', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(20, '68f983d3-c736-414d-81a5-8f42d25d415b', 7, 'Game Design', 'game-design', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(21, '095eae58-c820-4415-b645-59653aadc51f', 7, 'Fashion Design', 'fashion-design', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(22, 'e0fd0044-154a-4549-8e63-b551e53f89f0', 7, 'User Experience Design', 'user-experience-design', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `department_id`, `instructor_id`, `created_at`, `Updated_at`) VALUES
(1, 'First Subject', 14, 12, '2023-09-24 09:42:28', '2023-08-15 07:03:53'),
(2, 'التلاوة', 13, 10, '2023-09-24 09:42:01', '2023-08-15 07:03:48'),
(3, 'انجليزي', 12, 6, '2023-09-25 07:33:28', '2023-09-25 04:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` bigint(255) DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `department_id` bigint(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `type` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `student_id`, `course_id`, `start_date`, `end_date`, `created_at`, `updated_at`, `subject_id`, `name`, `value`, `batch`, `department_id`, `status`, `type`, `code`) VALUES
(23, NULL, NULL, NULL, NULL, '2023-10-05 11:53:05', '2023-10-05 11:53:05', 2, 'اشتراك تلاوة', 100, 5, 12, 1, NULL, 'DA-651ecdd1a7188'),
(24, NULL, 17, '1996-06-20', NULL, '2023-10-09 05:55:45', '2023-10-09 05:55:45', 3, 'Neque sunt eum prae', 673, NULL, 14, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_courses`
--

CREATE TABLE `subscription_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_questions`
--

CREATE TABLE `support_ticket_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_ticket_questions`
--

INSERT INTO `support_ticket_questions` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Where can I see the status of my refund?', ' In the Refund Status column you can see the date your refund request was submitted or when it was processed.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'When will I receive my refund?', ' Refund requests are submitted immediately to your payment processor or financial institution after Udemy has received and processed your request. It may take  5 to 10 business days or longer to post the funds in your account, depending on your financial institution or location.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'Why was my refund request denied?', ' All eligible courses purchased on Udemy can be refunded within 30 days, provided the request meets the guidelines in our refund policy. ', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, 'What is a “credit refund”?', ' In cases where a transaction is not eligible for a refund to your original payment method, the refund will be granted using LMSZAI Credit', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, 'Where can I see the status of my refund?', ' In the Refund Status column you can see the date your refund request was submitted or when it was processed.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(6, 'When will I receive my refund?', ' Refund requests are submitted immediately to your payment processor or financial institution after Udemy has received and processed your request. It may take  5 to 10 business days or longer to post the funds in your account, depending on your financial institution or location.', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(7, 'Why was my refund request denied?', ' All eligible courses purchased on Udemy can be refunded within 30 days, provided the request meets the guidelines in our refund policy. ', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(8, 'What is a “credit refund”?', ' In cases where a transaction is not eligible for a refund to your original payment method, the refund will be granted using LMSZAI Credit', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `take_exams`
--

CREATE TABLE `take_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `number_of_correct_answer` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `image`, `name`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'uploads_demo/team_member/1.jpg', 'Arnold keens', 'CREATIVE DIRECTOR', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'uploads_demo/team_member/2.jpg', 'James Bond', 'Designer', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'uploads_demo/team_member/3.jpg', 'Ketty Perry', 'Customer Support', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, 'uploads_demo/team_member/4.jpg', 'Scarlett Johansson', 'CREATIVE DIRECTOR', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `ticket_number` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=Open, 2=Closed',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `priority_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sender_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply_admin_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_related_services`
--

CREATE TABLE `ticket_related_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hash` varchar(191) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `amount` decimal(12,3) NOT NULL DEFAULT 0.000,
  `narration` varchar(191) DEFAULT NULL,
  `reference` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_original_name` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file_original_name`, `file_name`, `user_id`, `file_size`, `extension`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'o', 'uploads/all/MNwVAxyv1PLRAwRmNVvPcleyzgletfrZSviu9Z0G.png', 7, 747832, 'png', 'image', '2023-05-11 15:39:53', '2023-05-11 15:39:53', NULL),
(2, 'o', 'uploads/all/HVlxqFPoRTpIRIJo3j1XRmNR0uIn0n3FldnblMpo.png', 8, 747832, 'png', 'image', '2023-05-15 15:43:05', '2023-05-15 15:43:05', NULL),
(3, 'P.P', 'uploads/all/vc7GFQPiwTwajrXha01XlBj2muEvoRtwOc0e5HEW.jpg', 5, 225378, 'jpg', 'image', '2023-05-17 11:19:27', '2023-05-17 11:19:27', NULL),
(4, 'P.P', 'uploads/all/EMWMzv02LXa2I83Ni1l9aFQbAESaJEl59eYx6PFD.jpg', 6, 225378, 'jpg', 'image', '2023-05-17 11:19:49', '2023-05-17 11:19:49', NULL),
(5, 'air-conditioner-2 (1)', 'uploads/all/uQtuhoAk4WeqAEyHOjY0ZEWea7zBEu0XDnTAquRL.jpg', 9, 208022, 'jpg', 'image', '2023-05-17 14:29:34', '2023-05-17 14:29:34', NULL),
(6, 'air-conditioner-2 (1)', 'uploads/all/NJveghiNuv920Nzh8fj1oxDekPqGdL6M9uObQgf2.jpg', 10, 208022, 'jpg', 'image', '2023-05-18 10:35:54', '2023-05-18 10:35:54', NULL),
(7, 'air-conditioner-2 (1)', 'uploads/all/U3rb9bC9hwqnkwJ2LI2LsaW6Ff8viMB7ezP6IM70.jpg', 11, 208022, 'jpg', 'image', '2023-05-18 10:38:26', '2023-05-18 10:38:26', NULL),
(8, 'Koolen_logo_png-01_9b513dfb-6d4f-4bf8-ba4b-b46a2c268a87', 'uploads/all/Y1XccOfAlKTXqF2qGwjf7O2BYvFsjbJYeQkcLHVM.png', 11, 42051, 'png', 'image', '2023-05-21 16:51:43', '2023-05-21 16:51:43', NULL),
(9, 'Koolen_logo_png-01_9b513dfb-6d4f-4bf8-ba4b-b46a2c268a87', 'uploads/all/tURonBwp4kWfOFX76E86ES7hJPmAed1zkrm8q97z.png', 12, 42051, 'png', 'image', '2023-05-29 15:27:30', '2023-05-29 15:27:30', NULL),
(10, 'Screenshot from 2023-06-01 15-04-04', 'uploads/all/W6NAbgnzhF7cCWPUfrrHG5fRO2jdcJS0pouGfQSG.png', 5, 32966, 'png', 'image', '2023-06-01 16:10:05', '2023-06-01 16:10:05', NULL),
(11, 'carrefour-2019-logo-ar-and-en-arabiccoupon-400x400', 'uploads/all/1almBhqAM42ttlHOwfGKnrJgUquVb1wbFEizmnmb.jpg', 17, 37049, 'jpg', 'image', '2023-06-11 13:02:53', '2023-06-11 13:02:53', NULL),
(12, 'Screenshot from 2023-07-10 00-13-04', 'uploads/all/EaU46FnMICpKZP7CuFfUPErWQwr9Vby7YJKfyLcg.png', 18, 116952, 'png', 'image', '2023-07-11 17:19:34', '2023-07-11 17:19:34', NULL),
(13, '1', 'uploads/all/YGpN5TTmnwcASdBt3uqcg7ORoftzm3rT3kzJhH23.jpg', 19, 179041, 'jpg', 'image', '2023-07-13 16:20:22', '2023-07-13 16:20:22', NULL),
(14, 'coffee-slider-_4', 'uploads/products/kL4ccDfAkYrL6FDENRij7JguOw9slS5QB0Y9Vuwk.jpg', 2, 548551, 'jpg', 'image', '2023-09-11 06:20:08', '2023-09-11 06:20:08', NULL),
(15, 'air-conditioner-slider_d46e949f-d786-4780-89e5-5e0989ca66a0', 'uploads/products/oMtHZZvVuxGuEPfejMg9S9u5UjVPwrho6PDCNR8S.jpg', 4, 763040, 'jpg', 'image', '2023-09-11 06:37:56', '2023-09-11 06:37:56', NULL),
(16, 'koolen 04', 'uploads/all/CHZd0C8b9c232zdzHVqd0RVl8hanvP4cU7LFqf8o.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:17:09', '2023-09-18 10:17:09', NULL),
(17, 'koolen 04', 'uploads/all/cvr1k5q9Y5xI7mCjkkdoQ0qZj0D7qIa1zo9UrYHl.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:18:19', '2023-09-18 10:18:19', NULL),
(18, 'koolen 04', 'uploads/all/FO8YCm8k64xr1tGxni2m2kLLzTCbcQko0ETgzuEg.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:18:27', '2023-09-18 10:18:27', NULL),
(19, 'koolen 04', 'uploads/all/4AqDJZPiwUy8R0pdd1l1YF4pPCsNsZUCtDABvuzO.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:21:05', '2023-09-18 10:21:05', NULL),
(20, 'koolen 04', 'uploads/all/IeFwTNAtT9o5l3Y6OypknuYfNZqeIjpuRFAkky5q.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:21:29', '2023-09-18 10:21:29', NULL),
(21, 'koolen 04', 'uploads/all/hDvsvpZkexkUdxvLncS3eKUshKV96nRxGN5dRRLc.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:24:07', '2023-09-18 10:24:07', NULL),
(22, 'koolen 04', 'uploads/all/QF2nxxA5kTli4qYorUZlq6uWuRDmJmRlPkF6moDb.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:24:41', '2023-09-18 10:24:41', NULL),
(23, 'koolen 04', 'uploads/all/a3gf3XwQw6aiPzmtR3Megxou8G9rzw6uZGhH05FP.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:25:36', '2023-09-18 10:25:36', NULL),
(24, 'koolen 04', 'uploads/all/wyzkUChoJoi2lvG3UAzGkQj5icmqRJDZJSaP1o9v.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:25:48', '2023-09-18 10:25:48', NULL),
(25, 'koolen 04', 'uploads/all/u5qZhD8W1JWAlBsyI4H9mKrFUhHq1zV3A8xNuwb9.jpg', 227, 613805, 'jpg', 'image', '2023-09-18 10:26:21', '2023-09-18 10:26:21', NULL),
(26, 'koolen 03', 'uploads/all/wVgLhig15gz0KD724aEVvc8l9IsSA9vtFJ9rUh22.jpg', 227, 537307, 'jpg', 'image', '2023-09-18 12:10:41', '2023-09-18 12:10:41', NULL),
(27, 'koolen 03', 'uploads/all/1BHuZrBihG3ZiZ3NmwejGdc6qiS4Z0xwPqUxsg3O.jpg', 227, 537307, 'jpg', 'image', '2023-09-18 12:11:17', '2023-09-18 12:11:17', NULL),
(28, 'koolen 02', 'uploads/all/0IZuMRomY5AbxS1ivH3r8lfEKukZwTpvzp4sHAuV.jpg', 227, 584395, 'jpg', 'image', '2023-09-18 12:11:17', '2023-09-18 12:11:17', NULL),
(29, 'koolen 02', 'uploads/all/72WFpLfcedTkauU2Wi94qyGkRAxmBxuM23yD2SPv.jpg', 227, 584395, 'jpg', 'image', '2023-09-18 12:21:36', '2023-09-18 12:21:36', NULL),
(30, 'koolen 03', 'uploads/all/emDMM4X97rJh9A8dFhxG6XFvXxAzlMPpA1v0Yk8Z.jpg', 227, 537307, 'jpg', 'image', '2023-09-18 12:49:11', '2023-09-18 12:49:11', NULL),
(31, '1', 'uploads/all/6xdtniS2L7xXmsalt8Cah0Nns1Fz2uJvS32JRFu6.jpg', 228, 913092, 'jpg', 'image', '2023-09-18 18:23:32', '2023-09-18 18:23:32', NULL),
(32, '1', 'uploads/all/KEVHtgoZUGpbT0G9HxCScpgfEIfx6X8D7JWiVrLW.jpg', 229, 913092, 'jpg', 'image', '2023-09-18 18:24:06', '2023-09-18 18:24:06', NULL),
(33, '1', 'uploads/all/hUaAye5f4UQFQ3OhhNRivOj64X5uByDw0pON4Gd4.jpg', 230, 913092, 'jpg', 'image', '2023-09-18 18:25:11', '2023-09-18 18:25:11', NULL),
(34, 'Screenshot from 2023-09-15 17-05-46', 'uploads/all/YlQwzz3YGywx0I1QTcQtPKfZ8JBouyDsb4DXMYus.png', 230, 181227, 'png', 'image', '2023-09-18 18:25:11', '2023-09-18 18:25:11', NULL),
(35, '1', 'uploads/all/0oESlZgZrUUmIz4qUEJ7jcDFkz9wUyexMuF2rmY7.jpg', 231, 913092, 'jpg', 'image', '2023-09-18 18:25:43', '2023-09-18 18:25:43', NULL),
(36, 'Screenshot from 2023-09-15 17-05-46', 'uploads/all/Egkcc1JiWMMzRhK7Z4wmhR7MkXgMRTrBp7SNzT7o.png', 231, 181227, 'png', 'image', '2023-09-18 18:25:43', '2023-09-18 18:25:43', NULL),
(37, 'Screenshot from 2022-12-10 15-04-51', 'uploads/all/tFAkwcIq1VmuTfUdvDQWOkB4Nf1wYtCkYxo4suvu.png', 231, 48652, 'png', 'image', '2023-09-18 18:25:43', '2023-09-18 18:25:43', NULL),
(38, 'Screenshot from 2022-12-10 15-04-51', 'uploads/all/ZRWdMyaZr8v0vVNCqZqBx4evJqcchwsKyB4Un3wL.png', 231, 48652, 'png', 'image', '2023-09-18 18:25:43', '2023-09-18 18:25:43', NULL),
(39, 'Screenshot from 2023-09-15 17-05-46', 'uploads/all/HlYkEXnBRA1ZIpcq4KgPkaw5j3ACmw9kVz2HTQEm.png', 229, 181227, 'png', 'image', '2023-09-18 18:28:43', '2023-09-18 18:28:43', NULL),
(40, 'Screenshot from 2022-12-10 15-04-51', 'uploads/all/pCjAQAumeTnvCJqV69ktqJh6NR7jrSznRcw40sqH.png', 229, 48652, 'png', 'image', '2023-09-18 18:28:43', '2023-09-18 18:28:43', NULL),
(41, 'Screenshot from 2023-09-18 22-09-56', 'uploads/all/f0jCjWxp42Jzkpcamz2Q3yjLq5BFNjb3jUf2DHq3.png', 229, 224627, 'png', 'image', '2023-09-18 18:28:43', '2023-09-18 18:28:43', NULL),
(42, 'Screenshot from 2022-12-10 15-04-51', 'uploads/all/6vboWBKMuKjigTJcP805QazAfoYXFq1aSIpeQwtm.png', 229, 48652, 'png', 'image', '2023-09-18 18:28:43', '2023-09-18 18:28:43', NULL),
(43, 'Screenshot from 2022-12-10 15-04-51', 'uploads/all/qUsyuchzhsDZCklyKG6c7pG6USd5g2pIasxYLYaI.png', 229, 48652, 'png', 'image', '2023-09-18 18:28:43', '2023-09-18 18:28:43', NULL),
(44, '1', 'uploads/all/2R3EnE4SGeW4Q28rSH23kCOLJStAObrQeLPAoNrX.jpg', 20, 913092, 'jpg', 'image', '2023-09-19 09:36:57', '2023-09-19 09:36:57', NULL),
(45, '1', 'uploads/all/uGzHQynJnsDzbNgoKwMVp9OhJsEvtk7AtIlEela3.jpg', 21, 913092, 'jpg', 'image', '2023-09-19 09:37:54', '2023-09-19 09:37:54', NULL),
(46, '1', 'uploads/all/78hxy8T4AuP1z9nRColGDsAWpk12hiuhAYrCsqc2.jpg', 22, 913092, 'jpg', 'image', '2023-09-19 09:38:53', '2023-09-19 09:38:53', NULL),
(47, 'Screenshot from 2023-09-09 16-26-19', 'uploads/all/x2GUxO21drPhcs8MjsXSgFkAQ6SSQuTfhHnF0SBJ.png', 23, 169217, 'png', 'image', '2023-09-19 09:41:01', '2023-09-19 09:41:01', NULL),
(48, 'Screenshot from 2023-09-26 12-14-42', 'uploads/all/cqUjuiGy2J5HBMmXLh8IqfW6Koh1ngax803OP1Dm.png', 233, 128789, 'png', 'image', '2023-09-26 06:39:15', '2023-09-26 06:39:15', NULL),
(49, 'Screenshot from 2023-09-26 12-14-42', 'uploads/all/pIFsAN9zHacm1iM7HeACRUWRtxckWPZVgV5XucJM.png', 233, 128789, 'png', 'image', '2023-09-26 06:39:15', '2023-09-26 06:39:15', NULL),
(50, 'Screenshot from 2023-09-25 20-12-38', 'uploads/all/vov8mxGyFfLhB0b6S8Rpz4dxYC8mR6pXUkz5a49D.png', 233, 1189508, 'png', 'image', '2023-09-26 06:39:15', '2023-09-26 06:39:15', NULL),
(51, 'Screenshot from 2023-09-26 12-14-42', 'uploads/all/mdV2sl9yXfX6bSoMQNSZhJrc8totmpMarap0YUSf.png', 233, 128789, 'png', 'image', '2023-09-26 06:39:15', '2023-09-26 06:39:15', NULL),
(52, 'Screenshot from 2023-09-26 12-14-42', 'uploads/all/Xzti6CET3zdGqu3F8MX6eWUMP15rbfKkJJIHwSSt.png', 234, 128789, 'png', 'image', '2023-09-26 07:15:12', '2023-09-26 07:15:12', NULL),
(53, 'Screenshot from 2023-09-25 20-12-38', 'uploads/all/AQDg70MlLk5tsqDkUzZQSCSSBm4PNwlbnlNplA0A.png', 234, 1189508, 'png', 'image', '2023-09-26 07:15:12', '2023-09-26 07:15:12', NULL),
(54, 'Screenshot from 2023-09-24 10-19-43', 'uploads/all/0KORaBrCzohr5BMlcv1oC27jjphvPKvSqlNh35uB.png', 234, 46317, 'png', 'image', '2023-09-26 07:15:12', '2023-09-26 07:15:12', NULL),
(55, 'Screenshot from 2023-09-23 18-02-19', 'uploads/all/T9iYw0ZF8tdFl8yvgIsaIhDLLRcO00tZHkcGEoWY.png', 234, 147932, 'png', 'image', '2023-09-26 07:15:12', '2023-09-26 07:15:12', NULL),
(56, 'Screenshot from 2023-09-26 12-14-42', 'uploads/all/5VwW1V4ZjLWPfPxeXMtUSCUJt5tugajDnNuaezvU.png', 234, 128789, 'png', 'image', '2023-09-26 07:15:12', '2023-09-26 07:15:12', NULL),
(57, 'Screenshot from 2023-09-23 18-02-19', 'uploads/all/q1scJpPS0pIgE3rPVIrVGkz8eJqMdKANygAaWxI6.png', 26, 147932, 'png', 'image', '2023-09-26 07:24:35', '2023-09-26 07:24:35', NULL),
(58, 'Screenshot from 2023-09-23 18-02-19', 'uploads/all/um0YTU6KtEDIb4eMjv0RzfdBPDiMoyBQjO4XguxP.png', 235, 147932, 'png', 'image', '2023-09-26 17:52:59', '2023-09-26 17:52:59', NULL),
(59, 'Screenshot from 2023-09-26 12-14-42', 'uploads/all/4PZBkhzlB0yHSO29e1rLdevqAtvTrha5oAvpBtuV.png', 235, 128789, 'png', 'image', '2023-09-26 17:52:59', '2023-09-26 17:52:59', NULL),
(60, 'Screenshot from 2023-09-25 20-12-38', 'uploads/all/F0czS1njsrZavMJIPLanb7HPB76OX7qJcno9vUi1.png', 235, 1189508, 'png', 'image', '2023-09-26 17:52:59', '2023-09-26 17:52:59', NULL),
(61, 'Screenshot from 2023-09-24 10-19-43', 'uploads/all/iShJF8JfY3bnkXXBCA92zexMA0g7BvX5EtxRSxey.png', 235, 46317, 'png', 'image', '2023-09-26 17:52:59', '2023-09-26 17:52:59', NULL),
(62, 'Screenshot from 2023-09-25 20-12-38', 'uploads/all/EwbT3uSyPjoynjucN8jWp8ULkE4kXGqc9fGF9SOa.png', 235, 1189508, 'png', 'image', '2023-09-26 17:52:59', '2023-09-26 17:52:59', NULL),
(63, 'WhatsApp Image 2023-10-04 at 7.57.50 PM', 'uploads/all/00HXIpnDvzQsT7GjvZKYAlktj6iQkexZ1FTwk756.jpg', 236, 157578, 'jpeg', 'image', '2023-10-04 14:40:42', '2023-10-04 14:40:42', NULL),
(64, 'WhatsApp Image 2023-10-04 at 7.57.50 PM', 'uploads/all/scKXQClnUeLOdCu88S4ZrW2cplcACqIfbNYTzTaB.jpg', 236, 157578, 'jpeg', 'image', '2023-10-04 14:40:42', '2023-10-04 14:40:42', NULL),
(65, 'WhatsApp Image 2023-10-04 at 6.02.20 PM', 'uploads/all/7FL2DBmGh2lduaSNssyZSZWDZlmY07DXv9jzCa2d.jpg', 236, 46852, 'jpeg', 'image', '2023-10-04 14:40:42', '2023-10-04 14:40:42', NULL),
(66, 'WhatsApp Image 2023-10-04 at 6.02.20 PM', 'uploads/all/Gvvk4KI3Xr6PKblxprJwethe1bpMAiuOwU68UZ4R.jpg', 236, 46852, 'jpeg', 'image', '2023-10-04 14:40:42', '2023-10-04 14:40:42', NULL),
(67, 'WhatsApp Image 2023-10-04 at 7.57.50 PM (1)', 'uploads/products/jFTQQQA86IDClzUcuw7ePq8ilU8LSuS8NQIDDd7N.jpg', 8, 157578, 'jpeg', 'image', '2023-10-05 16:17:52', '2023-10-05 16:17:52', NULL),
(68, 'WhatsApp Image 2023-10-04 at 7.57.50 PM (1)', 'uploads/products/DhdWAuV1jVxQqVkq5s68gtKvSor3cFdWP2WPwOFH.jpg', 19, 157578, 'jpeg', 'image', '2023-10-05 17:10:10', '2023-10-05 17:10:10', NULL),
(69, 'WhatsApp Image 2023-10-04 at 7.57.50 PM (1)', 'uploads/products/yTbT4ec94rhocagd9P0fFEKVaTuTmgWNKhqeyNo3.jpg', 18, 157578, 'jpeg', 'image', '2023-10-05 17:13:43', '2023-10-05 17:13:43', NULL),
(70, 'WhatsApp Image 2023-10-04 at 6.02.20 PM', 'uploads/all/iNx27WjkJnQhX0oPHOEmPWBkAFMzqEiFIk8pfi4l.jpg', 237, 46852, 'jpeg', 'image', '2023-10-06 14:04:58', '2023-10-06 14:04:58', NULL),
(71, 'WhatsApp Image 2023-10-04 at 7.57.50 PM (1)', 'uploads/all/Szxjijgb9cRbptqULMoMSsG6O471EA5ELByxMMMv.jpg', 237, 157578, 'jpeg', 'image', '2023-10-06 14:04:58', '2023-10-06 14:04:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=instructor, 3=student',
  `phone` varchar(50) DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `branch_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ms. Estell Wintheiser MD', 'yankunding', 'alanna.hahn@example.org', '2023-04-03 13:37:53', '$2y$10$DP6F1FSlYJO8efV9tAMHeuQRg5G0Tgc3ZcqGsTsN/hULV9heUPP8O', 1, '+17372604590', 1, 'qSR2Bn6jcA', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'Mr. Wallace Hermann', 'damon.murazik', 'xavier.kunze@example.com', '2023-04-03 13:37:53', '$2y$10$kF5fc6F.uXSoZBUIYEryjOMlPGfadmH8oSTYHCmRKg2jrG//FuOwS', 2, '239-295-9961', 2, 'ttvAd9nrnE', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'Prof. Houston Hoppe', 'cweissnat', 'laurence02@example.net', '2023-04-03 13:37:53', '$2y$10$1NbeaO08L/T4YCXFifZhXur/63WRZ6KuGRAneXHkNxqXnwJo8CZe6', 3, '(260) 583-3274', 3, 'zwfCqIRt2c', '2023-04-03 13:37:54', '2023-04-03 13:37:54'),
(4, 'Mr. Wallace Hermann', 'damon.murazik', 'admin@app.com', '2023-04-03 13:37:53', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', 2, '239-295-9961', 2, 'ttvAd9nrnE', '2023-04-03 13:37:53', '2023-04-03 13:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_cards`
--

CREATE TABLE `user_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `card_number` varchar(191) NOT NULL,
  `card_holder_name` varchar(191) NOT NULL,
  `month` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_paypals`
--

CREATE TABLE `user_paypals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bundle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `transection_id` varchar(80) NOT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `payment_method` varchar(100) DEFAULT NULL,
  `note` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=complete, 2=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zoom_settings`
--

CREATE TABLE `zoom_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `api_key` varchar(191) NOT NULL,
  `api_secret` varchar(191) NOT NULL,
  `timezone` varchar(191) NOT NULL,
  `host_video` varchar(191) NOT NULL DEFAULT '0' COMMENT 'true, false',
  `participant_video` varchar(191) NOT NULL DEFAULT '0' COMMENT 'true, false',
  `waiting_room` varchar(191) NOT NULL DEFAULT '0' COMMENT 'true, false',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=disable, 1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_generals`
--
ALTER TABLE `about_us_generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_has_permissions`
--
ALTER TABLE `admin_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliate_history`
--
ALTER TABLE `affiliate_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `affiliate_history_hash_unique` (`hash`);

--
-- Indexes for table `affiliate_request`
--
ALTER TABLE `affiliate_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_files`
--
ALTER TABLE `assignment_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_submits`
--
ALTER TABLE `assignment_submits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assignment_submits_uuid_unique` (`uuid`);

--
-- Indexes for table `assign_homeworks`
--
ALTER TABLE `assign_homeworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_homeworks_student_id_foreign` (`student_id`),
  ADD KEY `assign_homeworks_homework_id_foreign` (`homework_id`);

--
-- Indexes for table `attendances_leaves`
--
ALTER TABLE `attendances_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_uuid_unique` (`uuid`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_uuid_unique` (`uuid`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_histories`
--
ALTER TABLE `booking_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_histories_uuid_unique` (`uuid`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundles`
--
ALTER TABLE `bundles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bundles_uuid_unique` (`uuid`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calenders`
--
ALTER TABLE `calenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_management`
--
ALTER TABLE `cart_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificates_uuid_unique` (`uuid`);

--
-- Indexes for table `certificate_by_instructors`
--
ALTER TABLE `certificate_by_instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificate_by_instructors_uuid_unique` (`uuid`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_chat_thread_id_foreign` (`chat_thread_id`),
  ADD KEY `chats_sender_user_id_foreign` (`user_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_threads`
--
ALTER TABLE `chat_threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_threads_sender_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_room`
--
ALTER TABLE `class_room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_lectures_uuid_unique` (`uuid`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_issues`
--
ALTER TABLE `contact_us_issues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_us_issues_uuid_unique` (`uuid`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_uuid_unique` (`uuid`);

--
-- Indexes for table `coupon_courses`
--
ALTER TABLE `coupon_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_instructors`
--
ALTER TABLE `coupon_instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_uuid_unique` (`uuid`);

--
-- Indexes for table `course_languages`
--
ALTER TABLE `course_languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_languages_uuid_unique` (`uuid`);

--
-- Indexes for table `course_lecture_views`
--
ALTER TABLE `course_lecture_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_lessons`
--
ALTER TABLE `course_lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_lessons_uuid_unique` (`uuid`);

--
-- Indexes for table `course_resources`
--
ALTER TABLE `course_resources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_resources_uuid_unique` (`uuid`);

--
-- Indexes for table `course_tags`
--
ALTER TABLE `course_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_upload_rules`
--
ALTER TABLE `course_upload_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_uuid_unique` (`uuid`);

--
-- Indexes for table `difficulty_levels`
--
ALTER TABLE `difficulty_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `difficulty_levels_uuid_unique` (`uuid`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_notification_settings`
--
ALTER TABLE `email_notification_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_notification_settings_uuid_unique` (`uuid`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_templates_uuid_unique` (`uuid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_national_id_unique` (`national_id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exams_uuid_unique` (`uuid`);

--
-- Indexes for table `exams_results`
--
ALTER TABLE `exams_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_accounts`
--
ALTER TABLE `financial_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followups`
--
ALTER TABLE `followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followup_questions`
--
ALTER TABLE `followup_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followup_responses`
--
ALTER TABLE `followup_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_categories_uuid_unique` (`uuid`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_posts_uuid_unique` (`uuid`);

--
-- Indexes for table `forum_post_comments`
--
ALTER TABLE `forum_post_comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_post_comments_uuid_unique` (`uuid`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_special_features`
--
ALTER TABLE `home_special_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructors_uuid_unique` (`uuid`);

--
-- Indexes for table `instructor_awards`
--
ALTER TABLE `instructor_awards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructor_awards_uuid_unique` (`uuid`);

--
-- Indexes for table `instructor_certificates`
--
ALTER TABLE `instructor_certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructor_certificates_uuid_unique` (`uuid`);

--
-- Indexes for table `instructor_consultation_day_statuses`
--
ALTER TABLE `instructor_consultation_day_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_features`
--
ALTER TABLE `instructor_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_notifications`
--
ALTER TABLE `instructor_notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifications_uuid_unique` (`uuid`);

--
-- Indexes for table `instructor_procedures`
--
ALTER TABLE `instructor_procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_supports`
--
ALTER TABLE `instructor_supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_unique` (`language`),
  ADD UNIQUE KEY `languages_iso_code_unique` (`iso_code`);

--
-- Indexes for table `learn_key_points`
--
ALTER TABLE `learn_key_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_classes`
--
ALTER TABLE `live_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `live_classes_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metas_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notice_boards`
--
ALTER TABLE `notice_boards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notice_boards_uuid_unique` (`uuid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifications_uuid_unique` (`uuid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_uuid_unique` (`uuid`);

--
-- Indexes for table `order_billing_addresses`
--
ALTER TABLE `order_billing_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_histories`
--
ALTER TABLE `our_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_uuid_unique` (`uuid`);

--
-- Indexes for table `parent_infos`
--
ALTER TABLE `parent_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parent_infos_father_national_id_unique` (`national_id`);

--
-- Indexes for table `parent_notifications`
--
ALTER TABLE `parent_notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifications_uuid_unique` (`uuid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_uuid_unique` (`uuid`);

--
-- Indexes for table `product_invoices`
--
ALTER TABLE `product_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promotions_uuid_unique` (`uuid`);

--
-- Indexes for table `promotion_courses`
--
ALTER TABLE `promotion_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `questions_uuid_unique` (`uuid`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question_options_uuid_unique` (`uuid`);

--
-- Indexes for table `ranking_levels`
--
ALTER TABLE `ranking_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ranking_levels_uuid_unique` (`uuid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_promotion_tags`
--
ALTER TABLE `special_promotion_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `special_promotion_tags_uuid_unique` (`uuid`);

--
-- Indexes for table `special_promotion_tag_courses`
--
ALTER TABLE `special_promotion_tag_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stokes`
--
ALTER TABLE `stokes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_transactions`
--
ALTER TABLE `store_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `store_transactions_permission_number_unique` (`permission_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_code_unique` (`code`);

--
-- Indexes for table `student_buses`
--
ALTER TABLE `student_buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_certificates`
--
ALTER TABLE `student_certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_certificates_uuid_unique` (`uuid`);

--
-- Indexes for table `student_class_rooms`
--
ALTER TABLE `student_class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_departments`
--
ALTER TABLE `student_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_duties`
--
ALTER TABLE `student_duties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_goals`
--
ALTER TABLE `student_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_levels`
--
ALTER TABLE `student_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_notifications`
--
ALTER TABLE `student_notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifications_uuid_unique` (`uuid`);

--
-- Indexes for table `student_reports`
--
ALTER TABLE `student_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_reveiws`
--
ALTER TABLE `student_reveiws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_subscription`
--
ALTER TABLE `student_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_uuid_unique` (`uuid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_courses`
--
ALTER TABLE `subscription_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_ticket_questions`
--
ALTER TABLE `support_ticket_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_uuid_unique` (`uuid`);

--
-- Indexes for table `take_exams`
--
ALTER TABLE `take_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_priorities_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket_related_services`
--
ALTER TABLE `ticket_related_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_related_services_uuid_unique` (`uuid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_hash_unique` (`hash`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_cards`
--
ALTER TABLE `user_cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_cards_uuid_unique` (`uuid`);

--
-- Indexes for table `user_paypals`
--
ALTER TABLE `user_paypals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `withdraws_uuid_unique` (`uuid`);

--
-- Indexes for table `zoom_settings`
--
ALTER TABLE `zoom_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_generals`
--
ALTER TABLE `about_us_generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `affiliate_history`
--
ALTER TABLE `affiliate_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `affiliate_request`
--
ALTER TABLE `affiliate_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `assignment_files`
--
ALTER TABLE `assignment_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment_submits`
--
ALTER TABLE `assignment_submits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_homeworks`
--
ALTER TABLE `assign_homeworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances_leaves`
--
ALTER TABLE `attendances_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_histories`
--
ALTER TABLE `booking_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bundles`
--
ALTER TABLE `bundles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calenders`
--
ALTER TABLE `calenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart_management`
--
ALTER TABLE `cart_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `certificate_by_instructors`
--
ALTER TABLE `certificate_by_instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_threads`
--
ALTER TABLE `chat_threads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `class_room`
--
ALTER TABLE `class_room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_issues`
--
ALTER TABLE `contact_us_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_courses`
--
ALTER TABLE `coupon_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_instructors`
--
ALTER TABLE `coupon_instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course_languages`
--
ALTER TABLE `course_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_lecture_views`
--
ALTER TABLE `course_lecture_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_lessons`
--
ALTER TABLE `course_lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_resources`
--
ALTER TABLE `course_resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_tags`
--
ALTER TABLE `course_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_upload_rules`
--
ALTER TABLE `course_upload_rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `difficulty_levels`
--
ALTER TABLE `difficulty_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_notification_settings`
--
ALTER TABLE `email_notification_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams_results`
--
ALTER TABLE `exams_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `financial_accounts`
--
ALTER TABLE `financial_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `followup_questions`
--
ALTER TABLE `followup_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `followup_responses`
--
ALTER TABLE `followup_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_post_comments`
--
ALTER TABLE `forum_post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_special_features`
--
ALTER TABLE `home_special_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `instructor_awards`
--
ALTER TABLE `instructor_awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_certificates`
--
ALTER TABLE `instructor_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_consultation_day_statuses`
--
ALTER TABLE `instructor_consultation_day_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_features`
--
ALTER TABLE `instructor_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructor_notifications`
--
ALTER TABLE `instructor_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_procedures`
--
ALTER TABLE `instructor_procedures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructor_supports`
--
ALTER TABLE `instructor_supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learn_key_points`
--
ALTER TABLE `learn_key_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `live_classes`
--
ALTER TABLE `live_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `notice_boards`
--
ALTER TABLE `notice_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_billing_addresses`
--
ALTER TABLE `order_billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_histories`
--
ALTER TABLE `our_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_infos`
--
ALTER TABLE `parent_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `parent_notifications`
--
ALTER TABLE `parent_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1336;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_invoices`
--
ALTER TABLE `product_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_courses`
--
ALTER TABLE `promotion_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranking_levels`
--
ALTER TABLE `ranking_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `special_promotion_tags`
--
ALTER TABLE `special_promotion_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_promotion_tag_courses`
--
ALTER TABLE `special_promotion_tag_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stokes`
--
ALTER TABLE `stokes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_transactions`
--
ALTER TABLE `store_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `student_buses`
--
ALTER TABLE `student_buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_certificates`
--
ALTER TABLE `student_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_class_rooms`
--
ALTER TABLE `student_class_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student_departments`
--
ALTER TABLE `student_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `student_duties`
--
ALTER TABLE `student_duties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_goals`
--
ALTER TABLE `student_goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student_levels`
--
ALTER TABLE `student_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_notifications`
--
ALTER TABLE `student_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_reports`
--
ALTER TABLE `student_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_reveiws`
--
ALTER TABLE `student_reveiws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_subscription`
--
ALTER TABLE `student_subscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subscription_courses`
--
ALTER TABLE `subscription_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_ticket_questions`
--
ALTER TABLE `support_ticket_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `take_exams`
--
ALTER TABLE `take_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_related_services`
--
ALTER TABLE `ticket_related_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_cards`
--
ALTER TABLE `user_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_paypals`
--
ALTER TABLE `user_paypals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zoom_settings`
--
ALTER TABLE `zoom_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
