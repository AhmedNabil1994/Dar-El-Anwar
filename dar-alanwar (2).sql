-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2023 at 08:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
(49, '2023-09-11', 12, NULL, 6, 3, 5, NULL, '2023-09-16 08:25:31', '2023-09-16 08:25:31', '11:25:22'),
(53, '2023-09-12', 12, NULL, 6, 3, 5, NULL, NULL, NULL, NULL),
(54, '2023-09-13', 12, NULL, 6, 3, 5, NULL, NULL, NULL, NULL),
(55, '2023-09-14', 12, NULL, 6, 3, 5, NULL, NULL, NULL, NULL);

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
  `position` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `phone`, `role`, `password`, `private_user`, `hidden`, `status`, `image`, `created_at`, `updated_at`, `position`) VALUES
(1, 'Admin User', 'admin@app.com', 'admin', '1234567890', '1', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', 1, 1, 1, NULL, '2023-04-03 13:37:53', '2023-09-18 04:20:45', NULL),
(2, 'Hassan Admin', 'hassanadmin@gmail.com', 'Hassan125', '11235556554', '2', '$2y$10$IUUaMCdTeqCbqDmNL4JKl.ua68cAmG8ZJn.dTJXmKgq8FeVL5hzDW', NULL, 1, 1, NULL, '2023-05-18 10:53:57', '2023-05-18 10:53:57', NULL),
(3, 'هبة أحمد جليلة', 'hebaahmed221@gmail.com', 'هبة أحمد', '01551067448', '2', '$2y$10$sZgLMu55ZIyDR8Gf.UubA.WVfZc2o/Ch5aXfE9hE8/1AELVSRsFXa', NULL, 1, 1, NULL, '2023-07-13 15:41:54', '2023-07-13 15:41:54', NULL),
(4, 'مروة قناوي', 'marwakenawi20@gmail.com', 'مروة', '01014893908', '2', '$2y$10$Bx7p6L9iOxWRgvpNgnswreZvgXwnbaTgy/f91gcUy8uqPp.nKNium', NULL, 1, 1, NULL, '2023-07-13 15:46:22', '2023-07-13 15:46:22', NULL);

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
  `student_id` varchar(250) DEFAULT NULL,
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

INSERT INTO `assignments` (`id`, `student_id`, `subject_id`, `name`, `department_id`, `marks`, `instructor_id`, `status`, `created_at`, `updated_at`) VALUES
(3, '5', 2, NULL, '12', '{\"1\":\"10\",\"8\":\"12\",\"10\":\"15\"}', '7', 1, '2023-08-24 09:38:14', '2023-08-24 11:25:50');

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
(2, '11', '2023-08-09T15:32', '2023-08-09T20:32', NULL, 'attend', 'uu', '2023-08-09 09:32:36', '2023-08-09 09:32:36');

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
(1, '2023-09-16', '1000.00', NULL, '2023-09-15 20:26:57', '2023-09-15 20:26:57');

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
  `address` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Branch 1', '123 Main St, city_id', 'branch1.jpg', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'Branch 2', '456 Park Ave, Town', 'branch2.jpg', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'Branch 3', '789 Broadway, Village', 'branch3.jpg', 1, '2023-04-03 13:37:53', '2023-04-03 13:37:53');

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
-- Table structure for table `bundle_courses`
--

CREATE TABLE `bundle_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bundle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
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
(2, 1, 'Hiroko Burns', 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `calenders`
--

CREATE TABLE `calenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calenders`
--

INSERT INTO `calenders` (`id`, `title`, `user_id`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'ffgfg', NULL, '2023-09-17 00:00:00', '2023-09-17 00:00:00', '2023-09-17 09:30:22', '2023-09-17 09:30:22'),
(2, 'ffgfg', NULL, '2023-09-17 00:00:00', '2023-09-17 00:00:00', '2023-09-17 09:31:01', '2023-09-17 09:31:01'),
(3, 'بيبي', NULL, '2023-09-17 00:00:00', '2023-09-17 00:00:00', '2023-09-17 09:31:12', '2023-09-17 09:31:12'),
(4, 'dfdf', NULL, '2023-09-17 00:00:00', '2023-09-17 00:00:00', '2023-09-17 09:34:50', '2023-09-17 09:34:50'),
(5, 'dsds', NULL, '2023-09-17 00:00:00', '2023-09-17 00:00:00', '2023-09-17 09:43:49', '2023-09-17 09:43:49');

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
(4, '5b77ed47-6316-4995-8e4e-bbcc1077a7e7', '3410923', 'uploads/certificate/1694608340-46elp50bfa.jpg', 'yes', 0, 631, 526, '#85eeb8', 'Deleniti aut deserun', 0, 50, 27, '#ce0509', 'yes', 0, 8, 17, '#e42a9e', 'yes', 0, 15, 12, '#0107e6', NULL, '80.00', 13, NULL, '6.00', '#419caa', 'Irure ipsa officia', 80, 0, 34, 0, '#a940f9', 'Quo et reiciendis oc', 'uploads/certificate/1694608341-KbdAjdFkiQ.jpg', 16, 10, 9, '#342dee', 'Repellendus Est inc', 0, 2, 97, '#6d9d06', '/uploads/certificate/certificate-5b77ed47-6316-4995-8e4e-bbcc1077a7e7.pdf', NULL, NULL, '2023-09-13 09:32:21', '2023-09-13 09:32:21', '208'),
(5, 'e3e9310e-9266-4e70-86f1-fab9be2b62b5', '6862629', 'uploads/certificate/1694608607-ywGlxyfaHc.jpg', 'no', 0, 900, 571, '#ac49d9', 'Nam rerum pariatur', 0, 52, 50, '#fc20f9', 'no', 0, 85, 21, '#a7ab9d', 'yes', 0, 92, 100, '#f573d4', NULL, '89.00', 13, NULL, '20.00', '#7218ba', 'Dolor sint consequu', 80, 0, 14, 86, '#90310e', 'Delectus eos rerum', 'uploads/certificate/1694608607-HVtM3cree1.jpg', 16, 94, 30, '#5a384b', 'Non ea pariatur Seq', 0, 57, 70, '#eb9f10', '/uploads/certificate/certificate-e3e9310e-9266-4e70-86f1-fab9be2b62b5.pdf', NULL, NULL, '2023-09-13 09:36:47', '2023-09-13 09:36:47', '7'),
(6, '98990bec-df34-4134-aaae-ef4f42d3a28b', '6784702', 'uploads/certificate/1694608607-cjalwfCOns.jpg', 'no', 0, 900, 571, '#ac49d9', 'Nam rerum pariatur', 0, 52, 50, '#fc20f9', 'no', 0, 85, 21, '#a7ab9d', 'yes', 0, 92, 100, '#f573d4', NULL, '89.00', 13, NULL, '20.00', '#7218ba', 'Dolor sint consequu', 80, 0, 14, 86, '#90310e', 'Delectus eos rerum', 'uploads/certificate/1694608608-3ZXbsFiDIP.jpg', 16, 94, 30, '#5a384b', 'Non ea pariatur Seq', 0, 57, 70, '#eb9f10', '/uploads/certificate/certificate-98990bec-df34-4134-aaae-ef4f42d3a28b.pdf', NULL, NULL, '2023-09-13 09:36:48', '2023-09-13 09:36:48', '7'),
(7, '3de51583-abea-4509-8c31-70d62650063d', '6586119', 'uploads/certificate/1694608693-MZXF9T8H1I.jpg', 'no', 0, 20, 20, '#ac49d9', 'Nam rerum pariatur', 0, 30, 20, '#fc20f9', 'yes', 0, 40, 20, '#a7ab9d', 'yes', 0, 30, 20, '#f573d4', NULL, '30.00', 13, NULL, '30.00', '#7218ba', 'Dolor sint consequu', 80, 0, 20, 20, '#90310e', 'Delectus eos rerum', 'uploads/certificate/1694608693-fwD5wVTDaO.jpg', 16, 55, 20, '#5a384b', 'Non ea pariatur Seq', 0, 55, 20, '#eb9f10', '/uploads/certificate/certificate-3de51583-abea-4509-8c31-70d62650063d.pdf', NULL, NULL, '2023-09-13 09:38:13', '2023-09-13 09:38:13', '7'),
(8, 'da391707-ed37-4954-a798-1a859ce0b49c', '7378498', 'uploads/certificate/1694613608-oAMIDkynSk.png', 'no', 0, 620, 81, '#20e52d', 'Aliquid placeat vel', 0, 91, 55, '#cdee38', 'no', 0, 72, 37, '#1d033d', 'yes', 0, 46, 86, '#042fa9', NULL, '50.00', 12, NULL, '97.00', '#fe84c8', 'Ut similique volupta', 80, 0, 82, 54, '#b914c5', 'Ad sit sunt volupta', 'uploads/certificate/1694613609-GsE0oQ06b0.jpg', 16, 74, 24, '#f4c2d3', 'Enim quo corrupti d', 0, 0, 67, '#a704d9', '/uploads/certificate/certificate-da391707-ed37-4954-a798-1a859ce0b49c.pdf', 'yes', 'hand', '2023-09-13 11:00:09', '2023-09-13 11:00:09', '6');

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
  `status` int(11) DEFAULT NULL,
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
(1, NULL, 'فصل 1', 1, 1, NULL, NULL, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'uploaded_video', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'فصل 2', 1, 1, NULL, NULL, 12, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'uploaded_video', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `subject` varchar(250) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `students_count` int(11) DEFAULT NULL,
  `instructor_id` int(11) NOT NULL,
  `day` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `uuid`, `user_id`, `category_id`, `subcategory_id`, `course_language_id`, `level_id`, `title`, `subtitle`, `description`, `feature_details`, `price`, `learner_accessibility`, `image`, `intro_video_check`, `video`, `youtube_video_id`, `slug`, `status`, `average_rating`, `created_at`, `updated_at`, `code`, `subject`, `content`, `time_from`, `time_to`, `date`, `students_count`, `instructor_id`, `day`) VALUES
(9, '63b7d279-5bad-4466-90fb-06492b7e0b73', 1, 1, NULL, NULL, NULL, 'In tempor quis bland', NULL, NULL, NULL, '331.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.00', '2023-05-25 15:22:04', '2023-05-25 15:22:04', 'Maiores maxime nulla', NULL, 'Quis libero qui sint', '00:00:00', NULL, '2002-07-22', NULL, 6, NULL),
(10, '5e35db80-bd6f-4024-9b6c-57205d4fb35e', 1, 1, NULL, NULL, NULL, 'Velit ut atque cons', NULL, NULL, NULL, '517.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.00', '2023-05-25 15:22:12', '2023-05-25 15:22:12', 'Dolorum et reiciendi', NULL, 'Nulla itaque sit en', '00:00:00', NULL, '1975-08-14', NULL, 6, NULL),
(11, '854ea133-c392-4e54-ac53-4eee971cab2a', 6, NULL, NULL, NULL, NULL, 'Id qui maiores est', 'Nesciunt expedita m', 'Repellendus Aut duc', NULL, '0.00', NULL, NULL, NULL, NULL, NULL, 'id-qui-maiores-est', 4, '0.00', '2023-07-09 12:45:02', '2023-07-09 12:45:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(12, 'ffec4473-1d6c-4ce5-b0b9-fd9972dc54e0', 3, 1, NULL, NULL, NULL, 'النون الساكنة', NULL, NULL, NULL, '100.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.00', '2023-07-15 14:46:57', '2023-07-15 14:46:57', NULL, '2', 'أحكام النون الساكنة والتنوين', '00:00:00', NULL, '2023-08-01', NULL, 10, NULL);

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
  `is_feature` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `slug` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `uuid`, `name`, `image`, `is_feature`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(12, '4dc87b02-f901-4a97-a7cf-4557c94bdc94', 'الحضانة', NULL, 'no', 'الحضانة', 1, '2023-08-15 06:47:17', '2023-08-15 06:47:17'),
(13, '6bd8f1d3-6d7a-4bb4-b54b-7bc53d4f4e59', 'القرآن', NULL, 'no', 'القرآن', 1, '2023-08-15 06:47:28', '2023-08-15 06:47:28'),
(14, 'aae851bf-b47a-46f7-a7ac-021f9733b7e8', 'الهجاء', NULL, 'no', 'الهجاء', 1, '2023-08-15 06:47:33', '2023-08-15 06:47:33');

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
  `department` varchar(191) NOT NULL,
  `salary_cycle` varchar(191) NOT NULL,
  `hiring_date` date NOT NULL,
  `work_days` int(11) NOT NULL,
  `branch` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `management` text NOT NULL,
  `departure_time` text NOT NULL,
  `attendance_time` text NOT NULL,
  `image` text NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 = pending,\r\n1 = active,\r\n2 = archive',
  `level` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `qualification`, `university`, `graduation_date`, `national_id`, `email`, `phone`, `birthdate`, `job_title`, `department`, `salary_cycle`, `hiring_date`, `work_days`, `branch`, `password`, `created_at`, `updated_at`, `management`, `departure_time`, `attendance_time`, `image`, `type`, `status`, `level`) VALUES
(10, 'Demetrius Pennington', 'Hic veritatis ut arc', 'Voluptatum aliquip e', 'Nobis expedita nulla', '1990-08-12', 'Et est non rerum sim', 'taxuzys@mailinator.com', '+1 (535) 388-7821', '1992-12-23', 'teacher', 'Qui aut dolore odit', 'monthly', '1989-09-08', 1, 'Fuga Velit laborum', '$2y$10$1FcZAOcojiS7v2QtqaKvXO5UbnhTTCUSeyi5B5AMwQQtv1Fxn7Xcm', '2023-05-18 10:35:54', '2023-08-10 05:37:38', 'teacher-management', '2023-08-10T01:35', '2023-08-10T03:39', '6', 'driver', 1, '7'),
(11, 'Kyra Curry', 'Expedita delectus d', 'Cumque dignissimos q', 'Sint nulla delectus', '1977-01-06', 'Sit reprehenderit ob', 'maxa@mailinator.com', '+1 (126) 852-7915', '2006-02-15', 'driver', 'Irure dignissimos di', 'weekly', '1990-08-02', 24, 'Irure sequi impedit', '$2y$10$DVomOZbFC5LDde37OkIFVOMMLjNxKi7LFpszPPaABrRpHgM.QhitK', '2023-05-18 10:38:26', '2023-05-18 10:38:26', 'teacher-management', '1989-04-11', '2007-08-08', '7', NULL, 1, NULL),
(9, 'Hassan Salah', '12 Helwan', 'Very Good', 'Helwan', '2023-12-31', '0123456', 'hassanteacher@daralanwar.com', '01125525425', '2023-12-31', 'teacher', 'Science', 'monthly', '2023-12-31', 25, 'Helwan', '$2y$10$CXxsAkVKx1H6cZ8dLowv8eI/1CfLUmkIpA4bF3n1KmUvcEnjn.yZ6', '2023-05-17 14:29:34', '2023-05-17 15:44:10', 'teacher-management', '2021-10-30', '2023-12-31', '5', NULL, 1, NULL),
(12, 'Ishmael Howe', 'Omnis sunt unde a b', 'Mollit quia iusto id', 'Eum labore sit moles', '2004-03-07', 'Cum id culpa commod', 'qelyko@mailinator.com', '+1 (219) 804-7479', '2002-10-26', 'driver', 'Minus rerum maiores', 'weekly', '1970-07-16', 7, 'Esse fugiat autem v', '$2y$10$13xT5pYsfUXwtP3o2W0z6OQNL4KPxaoyljERaJoC0oUkYcNFoFVLG', '2023-05-29 15:27:30', '2023-05-29 15:27:30', 'teacher-management', '1984-07-04', '2009-02-25', '9', NULL, 1, NULL),
(13, 'Violet Orr', 'Saepe est ut similiq', 'Itaque excepturi ist', 'Ut autem aspernatur', '1993-05-12', 'Qui cum commodo ipsa', 'qysopuvuxe@mailinator.com', '+1 (769) 215-1739', '2014-09-09', 'driver', 'Est minima possimus', 'daily', '2011-09-18', 4, 'Et est mollitia nece', '$2y$10$EbEuzrwJyVNxAL9.RSZpCuwgRvMFpaE7yp8HDlNpXMQvxv8W1chQu', '2023-05-29 15:29:38', '2023-05-29 15:29:38', 'teacher-management', '2008-04-12', '1999-05-10', '', NULL, 1, NULL),
(14, 'Grant Hernandez', 'Velit inventore rep', 'Inventore consequunt', 'Ducimus dolor sit', '2015-02-02', 'Illo velit tenetur', 'hohocope@mailinator.com', '+1 (592) 535-8574', '2004-03-23', 'driver', 'Id eos sequi eos rer', 'monthly', '2010-10-03', 26, 'Ut voluptates debiti', '$2y$10$be2FZ7r22In5CMHxTcbs2O5Ed4XyveX9jan0GGZOc1ZMqeS7GKfxC', '2023-05-29 15:31:55', '2023-05-29 15:31:55', 'teacher-management', '2001-03-15', '1978-03-20', '', NULL, 1, NULL),
(15, 'Teegan Wolfe', 'Illum amet cumque', 'Eum ipsa sunt repre', 'Quae maiores non mol', '1975-09-05', 'Voluptatem voluptat', 'vida@mailinator.com', '+1 (472) 775-4437', '1994-10-13', 'driver', 'Totam dolor modi sun', 'daily', '1981-12-20', 1, 'Quam dignissimos ven', '$2y$10$9y.RuPHEfhSomqZkiqPQXuQC3X0k5sqsGayM2soDYdcaLZdIA7cwS', '2023-05-29 15:32:26', '2023-05-29 15:32:26', 'driver-management', '2017-08-15', '1993-04-18', '', NULL, 1, NULL),
(16, 'Wynter Valentine', 'Omnis saepe ea repre', 'Deleniti exercitatio', 'Fugiat error quasi', '2019-12-28', 'Eius dolore fuga Of', 'cizel@mailinator.com', '+1 (319) 794-2724', '1990-10-23', 'driver', 'Deleniti cumque labo', 'monthly', '2007-07-13', 13, 'Reiciendis doloremqu', '$2y$10$tJdrNvSpHr1DFM6M71uYvuoNziYGNakefF/OXFk/HKZG68N9IY/Qy', '2023-05-29 15:33:39', '2023-05-29 15:33:39', 'driver-management', '2004-11-17', '1981-05-07', '', 'driver', 1, NULL),
(18, 'Robin Jimenez', 'Dolorem quis et sint', 'Non eius et voluptat', 'Ducimus nemo quam u', '1972-05-22', 'Aut consequatur vel', 'webari@mailinator.com', '+1 (145) 518-3965', '1998-04-28', 'teacher', 'Fuga Incididunt ea', 'weekly', '2017-11-03', 1, 'Minima in et anim er', '$2y$10$aP8yuIcSnF3yFaOMdXUZD.kjQS6q7MG7R5D0x2ggUD.kjqcRV9M6C', '2023-07-11 17:19:34', '2023-08-09 09:33:03', 'teacher-management', '2008-10-30', '2022-01-19', '12', NULL, 2, NULL),
(19, 'مروة قناوي', 'ميتغمر', 'حاسبات ومعلومات', 'جامعة المنصورة', '2020-06-01', '098765432112345', 'marwakenawi20@gmail.com', '01014893908', '1996-06-06', 'teacher', 'المكتب التنفيذي', 'monthly', '2023-07-13', 6, 'الرئيسي', '$2y$10$ifMAdwYvWFSTTQfHs/kPweVRkTzXh5AkhBusdOacM1t5qjQ3U/MOe', '2023-07-13 16:20:22', '2023-07-13 16:20:22', 'teacher-management', '2023-07-13', '2023-07-13', '13', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
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
(1, 'a3a232c6-aa0c-4f32-9d1f-17ec1880d719', 1, 9, 'Exam 1', NULL, 0, 0, '', 1, '2023-06-06 16:54:09', '2023-06-06 16:54:09'),
(2, 'ea03f0f9-2c70-488e-9bdf-f98df0fa3d4c', 1, 10, 'Exam 2', NULL, 0, 0, '', 1, '2023-06-06 16:55:43', '2023-06-06 16:55:43'),
(3, '97819720-0e23-4ff3-934f-b5891074945e', 3, 12, 'اختبار النون الساكنة والتنوين', NULL, 0, 0, '', 1, '2023-07-15 14:53:10', '2023-07-15 14:53:10'),
(4, 'b5b41278-78e6-42ac-bca1-1c6d76854b10', 1, 1, 'Exam 1', NULL, 0, 0, NULL, 1, '2023-08-21 07:17:32', '2023-08-21 07:17:32');

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
  `date` date DEFAULT NULL,
  `trans_no` bigint(20) DEFAULT NULL,
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
  `product_type` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financial_accounts`
--

INSERT INTO `financial_accounts` (`id`, `date`, `trans_no`, `student_id`, `branch_id`, `name`, `description`, `amount`, `transaction_type`, `created_at`, `updated_at`, `user_id`, `last_amount`, `account`, `product_type`, `model_id`, `product_id`) VALUES
(1, '2023-09-09', 1395, NULL, 1, 'Catherine Reeves', 'دفع الاشتراك', '504.00', 'income', '2023-09-09 17:39:59', '2023-09-09 17:39:59', 1, '0.00', NULL, NULL, NULL, NULL),
(2, '2023-09-09', 6459, NULL, 2, 'Catherine Reeves', 'دفع الاشتراك', '504.00', 'income', '2023-09-09 17:40:28', '2023-09-09 17:40:28', 1, '504.00', NULL, NULL, NULL, NULL),
(3, '2023-09-09', 2064, NULL, 3, 'Catherine Reeves', 'دفع الاشتراك', '504.00', 'income', '2023-09-09 17:40:56', '2023-09-09 17:40:56', 1, '504.00', NULL, NULL, NULL, NULL),
(6, '2023-09-12', 358, NULL, NULL, 'شراء منتجات', 'شراء منتجات', '671648.00', 'expense', NULL, '2023-09-12 07:08:38', 1, '504.00', 'Ralph Larsen', NULL, NULL, '[\"2\",\"2\",\"4\"]'),
(7, '2023-09-12', 4711, NULL, NULL, 'بيع منتجات', 'بيع منتجات', '551082.00', 'income', NULL, '2023-09-12 10:07:32', 1, '504.00', '6', NULL, NULL, '[\"2\",\"1\",\"1\"]'),
(8, '2023-09-12', 2007, NULL, NULL, 'بيع منتجات', 'بيع منتجات', '15310.00', 'income', NULL, '2023-09-12 10:07:56', 1, '504.00', '5', NULL, NULL, '[\"2\",\"1\",\"1\"]'),
(9, '2023-09-12', 9970, NULL, NULL, 'شراء منتجات', 'شراء منتجات', '1000.00', 'expense', NULL, '2023-09-12 10:18:44', 1, '504.00', 'Kylan Morin', NULL, NULL, '[\"1\",\"4\"]'),
(10, '2023-09-12', 3202, NULL, NULL, 'شراء منتجات', 'شراء منتجات', '5500.00', 'expense', NULL, '2023-09-12 10:20:20', 1, '504.00', 'Odysseus Cotton', NULL, NULL, '[\"4\",\"1\"]'),
(11, '2023-09-12', 2918, NULL, NULL, 'بيع منتجات', 'بيع منتجات', '200.00', 'income', NULL, '2023-09-12 10:21:08', 1, '504.00', '6', NULL, NULL, '[\"4\"]'),
(12, '2023-09-16', 2852, NULL, NULL, 'opening_balance', NULL, '1000.00', 'income', '2023-09-15 20:26:57', '2023-09-15 20:26:57', 1, '0.00', NULL, NULL, NULL, NULL),
(13, '2023-09-16', 9130, NULL, NULL, NULL, NULL, '1000.00', 'income', '2023-09-15 20:27:15', '2023-09-15 20:27:15', 1, '0.00', NULL, NULL, NULL, NULL),
(14, '2023-09-16', 6177, NULL, NULL, NULL, NULL, '1000.00', 'income', '2023-09-15 20:27:54', '2023-09-15 20:27:54', 1, '0.00', NULL, NULL, NULL, NULL),
(15, '2023-09-16', 1630, NULL, NULL, NULL, NULL, '1000.00', 'income', '2023-09-15 20:28:06', '2023-09-15 20:28:06', 1, '0.00', NULL, NULL, NULL, NULL),
(16, '2023-09-16', 6030, NULL, NULL, NULL, NULL, '1000.00', 'income', '2023-09-15 20:28:24', '2023-09-15 20:28:24', 1, '0.00', NULL, NULL, NULL, NULL),
(17, '2023-09-16', 9372, NULL, NULL, NULL, NULL, '1000.00', 'income', '2023-09-15 20:28:36', '2023-09-15 20:28:36', 1, '0.00', NULL, NULL, NULL, NULL),
(18, '2023-09-16', 2903, NULL, NULL, NULL, NULL, '1000.00', 'income', '2023-09-15 20:28:58', '2023-09-15 20:28:58', 1, '0.00', NULL, NULL, NULL, NULL),
(19, '2023-09-17', 3433, NULL, NULL, 'شراء منتجات', 'شراء منتجات', '10000.00', 'expense', '2023-09-17 08:52:03', '2023-09-17 08:52:05', 1, '0.00', 'sdsd', NULL, NULL, NULL);

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
  `observer` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `question_id` bigint(20) DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `user_id` bigint(20) NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `province_id` bigint(20) DEFAULT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `professional_title` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `postal_code` varchar(100) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `about_me` mediumtext DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `social_link` mediumtext DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `is_private` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `remove_from_web_search` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=approved, 2=blocked',
  `consultation_available` tinyint(4) DEFAULT 0 COMMENT '1=yes, 0=no',
  `hourly_rate` int(11) DEFAULT NULL,
  `available_type` tinyint(4) DEFAULT 3 COMMENT '1=In-person, 0=Online, 3=Both',
  `cv_file` varchar(191) DEFAULT NULL,
  `cv_filename` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
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
(10, '436e6182-3589-4acc-99ac-045df36935c9', 0, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 1, 0, NULL, 3, NULL, NULL, '2023-07-13 16:20:22', '2023-07-13 17:00:41', 'marwakenawi20@gmail.com', '$2y$10$ifMAdwYvWFSTTQfHs/kPweVRkTzXh5AkhBusdOacM1t5qjQ3U/MOe', '19', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `student_id`, `amount`, `paid_at`, `note`, `subscription_id`, `classroom`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 5, '504.00', '2023-09-08 21:00:00', NULL, 1, NULL, '2023-09-09 17:40:56', '2023-09-09 17:40:56', NULL);

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
(1, 'المستوي الاول', 1, NULL, NULL);

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
(169, '2023_09_18_161537_create_student_duties_table', 20);

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
(5, 'App\\Models\\Admin', 3),
(7, 'App\\Models\\Admin', 4);

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

INSERT INTO `notifications` (`id`, `uuid`, `sender_id`, `user_id`, `text`, `target_url`, `is_seen`, `user_type`, `created_at`, `updated_at`) VALUES
(46, '5edd81c5-c414-4aec-85c6-4c3ca340b418', 1, 1, 'اهلا بك يا طاالب', NULL, 'yes', 1, '2023-09-16 11:42:38', '2023-09-16 14:21:00'),
(47, '55c1e9d1-3292-42c3-afde-e79c4a56e4a0', 1, 1, 'تأخير اشتراك', NULL, 'yes', 1, '2023-09-16 11:47:56', '2023-09-16 14:21:00'),
(48, '28f9a08f-a128-42ae-a735-345eb5d44026', 1, 1, 'تأخير اشتراك', NULL, 'yes', 1, '2023-09-16 11:48:02', '2023-09-16 14:20:59'),
(45, 'b5b4a032-64b4-4877-b544-abf132690935', 1, 1, 'warning_subscription_text', NULL, 'yes', 1, '2023-09-16 11:40:14', '2023-09-16 14:21:01'),
(40, '342128a0-04e3-4bae-8f0f-d4f31d83d991', 1, 1, 'Catherine Reevesغياب يومي متكرر لهذا الطالب : ', NULL, 'yes', 1, '2023-09-16 09:21:47', '2023-09-16 14:20:55'),
(41, 'd33bc7b0-15dd-4442-aa0e-41bd5c513054', 1, 1, 'Catherine Reevesهذا الطالب لم يسدد اشتراكاته : ', NULL, 'yes', 1, '2023-09-16 09:51:59', '2023-09-16 14:20:57'),
(42, '15dcd384-2d29-4aa9-8cd2-30cdee43ad2a', 1, 1, 'Palmer Robertsهذا الطالب لم يسدد اشتراكاته : ', NULL, 'yes', 1, '2023-09-16 09:52:12', '2023-09-16 14:20:58'),
(43, '4ed181e8-de21-4f24-a9d0-d7cd13245ead', 1, 1, 'subscriped', NULL, 'yes', 1, '2023-09-16 10:23:51', '2023-09-16 14:21:17'),
(44, 'f94d72e9-b969-41c8-93b9-2af7dd8d5592', 1, 1, 'warning_subscription_text', NULL, 'yes', 1, '2023-09-16 11:39:03', '2023-09-16 14:21:15'),
(49, '74e37da3-8bca-4ddd-b88b-1e0aa0ac7512', 1, 1, 'subscriped', NULL, 'yes', 1, '2023-09-16 11:49:07', '2023-09-16 14:15:10'),
(50, 'c103815a-ae31-4cde-9d23-6c571482d408', 1, 1, 'غيااااب', NULL, 'yes', 1, '2023-09-16 11:49:09', '2023-09-16 14:15:24'),
(51, 'c91e0fee-94c9-45da-9cef-cdd98f55165f', 1, 1, 'subscriped', NULL, 'no', 2, '2023-09-16 14:21:39', '2023-09-16 14:21:39'),
(52, 'bb37ab2f-dd06-4ef3-a20c-ef76ffded50c', 1, 1, 'اهلا بك يا طاالب', NULL, 'no', 2, '2023-09-18 06:50:45', '2023-09-18 06:50:45');

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
  `profession` varchar(191) DEFAULT NULL,
  `national_id` varchar(191) NOT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `whatsapp_number` varchar(191) DEFAULT NULL,
  `follow_up_person` varchar(191) DEFAULT NULL,
  `relationship` varchar(191) DEFAULT NULL,
  `student_pickup_optional` tinyint(1) NOT NULL DEFAULT 0,
  `parents_marital_status` varchar(191) DEFAULT NULL,
  `parents_id_card` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_infos`
--

INSERT INTO `parent_infos` (`id`, `student_id`, `name`, `profession`, `national_id`, `phone_number`, `whatsapp_number`, `follow_up_person`, `relationship`, `student_pickup_optional`, `parents_marital_status`, `parents_id_card`, `created_at`, `updated_at`, `email`) VALUES
(1, 5, 'John Doe', 'Engineer', '12345678909', '01234567890', '01234567891', '1', '1', 0, 'Married', '1234567890123456', '2023-04-03 13:37:53', '2023-04-03 13:37:53', 'peraciruv2@mailinator.com'),
(4, 5, 'Adele Deleon', 'Quis in facere quos', '957', '+1 (841) 804-1525', '138', '1', '2', 1, 'Temporibus dolor off', NULL, '2023-05-17 11:19:49', '2023-05-17 11:19:49', 'peraciruv@mailinator.com'),
(6, 227, 'حنان حالد', 'موظف حكومي', '87654321235780084', '01012345678', '01012345678', '1', '1', 1, 'متزوجين', NULL, '2023-07-15 11:54:16', '2023-09-18 10:25:48', 'ashraf@gmail.com'),
(5, 227, 'اشرف ذكي', 'موظف حكومي', '87654321235780083', '01012345678', '01012345678', '1', '2', 1, '1', '1234567890123456', NULL, NULL, 'ashraf@gmail.com'),
(8, 226, 'Lance Garrison', 'Dolor adipisicing mo', '812', '+1 (505) 737-4284', '641', '0', '1', 0, '1', NULL, '2023-09-18 07:05:42', '2023-09-18 07:05:42', 'dafici@mailinator.com');

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
(1, 'manage_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(2, 'pending_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(3, 'hold_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(4, 'approved_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(5, 'all_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(6, 'manage_course_reference', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(7, 'manage_course_category', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(8, 'manage_course_subcategory', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(9, 'manage_course_tag', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(10, 'manage_course_language', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(11, 'manage_course_difficulty_level', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(12, 'manage_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(13, 'pending_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(14, 'approved_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(15, 'all_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(16, 'add_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(17, 'manage_student', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(18, 'manage_coupon', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(19, 'manage_promotion', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(20, 'manage_blog', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(21, 'payout', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(22, 'finance', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(23, 'manage_certificate', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(24, 'ranking_level', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(25, 'manage_language', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(26, 'account_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(27, 'support_ticket', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(28, 'manage_contact', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(29, 'application_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(30, 'global_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(31, 'home_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(32, 'mail_configuration', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(33, 'payment_option', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(34, 'content_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(35, 'user_management', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(36, 'manage_affiliate', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(37, 'create-admins', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(38, 'edit-admins', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(39, 'delete-admins', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(40, 'manage-admins', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(41, 'manage_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(42, 'pending_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(43, 'hold_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(44, 'approved_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(45, 'all_course', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(46, 'manage_course_reference', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(47, 'manage_course_category', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(48, 'manage_course_subcategory', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(49, 'manage_course_tag', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(50, 'manage_course_language', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(51, 'manage_course_difficulty_level', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(52, 'manage_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(53, 'pending_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(54, 'approved_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(55, 'all_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(56, 'add_instructor', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(57, 'manage_student', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(58, 'manage_coupon', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(59, 'manage_promotion', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(60, 'manage_blog', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(61, 'payout', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(62, 'finance', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(63, 'manage_certificate', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(64, 'ranking_level', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(65, 'manage_language', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(66, 'account_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(67, 'support_ticket', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(68, 'manage_contact', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(69, 'application_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(70, 'global_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(71, 'home_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(72, 'mail_configuration', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(73, 'payment_option', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(74, 'content_setting', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(75, 'user_management', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(76, 'manage_affiliate', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(77, 'create-admins', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(78, 'edit-admins', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(79, 'delete-admins', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(80, 'manage-admins', 'admins', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
(81, 'manage_absence', 'admins', '2023-09-17 14:49:01', '2023-09-17 14:49:03'),
(82, 'manage_subject', 'admins', '2023-09-17 14:48:57', '2023-09-17 14:49:04'),
(83, 'manage_department', 'admins', '2023-09-17 14:48:59', '2023-09-17 14:49:05'),
(84, 'manage_exam', 'admins', '2023-09-17 14:49:31', '2023-09-17 14:49:29'),
(85, 'manage_bus', 'admins', '2023-09-17 14:49:59', '2023-09-17 14:50:00'),
(86, 'manage_report', 'admins', '2023-09-17 14:50:28', '2023-09-17 14:50:29'),
(87, 'manage_duties', 'admins', '2023-09-17 14:53:29', '2023-09-17 14:53:32'),
(88, 'manage_followup', 'admins', '2023-09-17 14:53:28', '2023-09-17 14:53:35'),
(89, 'manage_finance', 'admins', '2023-09-17 14:53:31', '2023-09-17 14:53:36'),
(90, 'manage_class_room', 'admins', '2023-09-17 16:01:09', '2023-09-17 16:01:10');

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
  `description` longtext NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `supplier` varchar(191) DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `unit` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=approved, 0=unapproved',
  `tags` varchar(255) DEFAULT NULL,
  `canonical` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parcode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uuid`, `sku`, `description`, `name`, `image`, `supplier`, `meta_description`, `unit`, `slug`, `status`, `tags`, `canonical`, `quantity`, `price`, `user_id`, `department_id`, `receiver`, `created_at`, `updated_at`, `parcode`) VALUES
(1, NULL, 'Eu minim lorem rem l', 'Obcaecati tempora qu', 'Harrison Wooten', NULL, 'Magni eligendi adipi', 'Deserunt eveniet su', 'لتر (لتر)', 'Ad pariatur Ullamco', 1, 'Quasi porro ipsum es', 'Ut accusantium molli', 718, '1.00', 1, NULL, NULL, '2023-09-11 06:18:24', '2023-09-11 06:18:24', NULL),
(2, NULL, 'Eu minim lorem rem l', 'Obcaecati tempora qu', 'Harrison Wooten', '14', 'Magni eligendi adipi', 'Deserunt eveniet su', 'لتر (لتر)', 'Ad pariatur Ullamco', 1, 'Quasi porro ipsum es', 'Ut accusantium molli', 718, '1.00', 1, NULL, NULL, '2023-09-11 06:20:07', '2023-09-11 06:20:08', NULL),
(3, NULL, 'Non ea ullamco nulla', 'Incidunt deserunt d', 'Tanya Maxwell', NULL, 'Et ut quo ea dolor r', 'Natus optio delenit', 'عبوة', 'Nulla in necessitati', 1, 'Consequatur placeat', 'Praesentium quo dolo', 475, '2.00', 1, NULL, NULL, '2023-09-11 06:24:14', '2023-09-11 06:24:14', NULL),
(4, NULL, 'منتج جديد', 'منتج جديد منتج جديد منتج جديد منتج جديد', '2543', '15', 'احمد سيد', 'منتج جديد منتج جديد منتج جديد', 'كيلوجرام (كجم)', 'منتج-جديد', 1, 'منتج جديد', 'منتج جديد', 89, '4.00', 1, 12, 'خالد اشرف', '2023-09-11 06:37:56', '2023-09-11 08:07:28', NULL);

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
(1, 'fac4a55a-a8eb-4829-b6d5-65f94a94ff99', 1, 2, '2', '2023-06-06 16:55:43', '2023-06-06 16:55:43', '3'),
(2, 'd2a5e4ba-d07d-4fa7-a2d9-14aeadb6818f', 3, 3, 'كم عدد أحكام النون الساكنة', '2023-07-15 14:53:10', '2023-07-15 14:53:10', '3'),
(3, '0cbb4d7b-7fd2-4f1d-8fa4-cc8289517068', 3, 3, 'عرف الادغام', '2023-07-15 14:53:10', '2023-07-15 14:53:10', '3'),
(4, '8a9a4a5a-adfb-4f73-b5d0-cfe2a6b0fc1c', 3, 3, 'أذكر شاهد التحفة', '2023-07-15 14:53:10', '2023-07-15 14:53:10', '3'),
(5, '38db0ba5-abfd-4523-b9e0-5c5b2f334e2c', 3, 3, 'التقييم النهائي', '2023-07-15 14:53:10', '2023-07-15 14:53:10', '2'),
(6, 'd1deacab-c2df-4af5-b0ce-0a24a549efac', 1, 4, 'Q 1', '2023-08-21 07:17:32', '2023-08-21 07:17:32', '1'),
(7, '92fcd6e0-0245-40eb-bf44-0f4bc65f1155', 1, 4, 'Q 2', '2023-08-21 07:17:32', '2023-08-21 07:17:32', '2'),
(8, 'c7dd4762-380e-42cd-9d41-f2ccedfcc6a5', 1, 4, 'Q 3', '2023-08-21 07:17:32', '2023-08-21 07:17:32', '3');

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
(7, 1, 'مجموعة 1', 'admins', '2023-09-17 11:03:30', '2023-09-17 12:22:28');

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
(1, 1),
(1, 7),
(2, 1),
(2, 7),
(3, 1),
(3, 7),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1);

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
(1, '9', '10000', '2023-08-09 11:08:52', NULL, '2023-08-09 08:08:52', '2023-08-09 08:08:52'),
(2, '11', '3000', '2023-08-09 12:32:04', NULL, '2023-08-09 09:32:04', '2023-08-09 09:32:04'),
(3, '10', '3300', '2023-08-09 12:37:07', NULL, '2023-08-09 09:37:07', '2023-08-09 09:37:07');

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
(69, 'sign_up_left_text', 'Discover world best online courses here. 24k online course is waiting for you', '2023-04-03 13:37:53', '2023-04-03 13:37:53'),
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
(167, 'validate_abscent_times', '3', NULL, NULL),
(168, 'warning_abscent_text', 'غيااااب', NULL, '2023-09-16 11:49:09'),
(169, 'warning_subscription_text', 'subscriped', NULL, '2023-09-16 11:49:07'),
(170, 'warning_late_subscription_text', 'تأخير اشتراك', NULL, '2023-09-16 11:48:02'),
(171, 'warning_late_subscription_time', '20', NULL, NULL),
(177, 'welcome_text', 'اهلا بك يا طاالب', NULL, '2023-09-16 11:42:38'),
(178, 'welcome_time', '0', NULL, NULL),
(179, 'sending_way', '1,2,3', NULL, NULL),
(180, 'send_user_type', '1', NULL, NULL),
(181, 'noting_messages', NULL, NULL, NULL);

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
(31, 4, '50.00', 100, 'Odysseus Cotton', 'Lorem necessitatibus', 'Facilis reiciendis q', '2011-06-06 22:00:00', '2023-09-12 10:20:20', NULL, NULL, NULL, NULL, NULL, '5000.00', NULL, NULL, NULL, 'expense'),
(32, 1, '10.00', 50, 'Odysseus Cotton', 'Lorem necessitatibus', NULL, '2011-06-06 22:00:00', '2023-09-12 10:20:20', NULL, NULL, NULL, NULL, NULL, '500.00', NULL, NULL, NULL, 'expense'),
(33, 4, '10.00', 80, 'Malik Alvarado', NULL, 'Harum itaque nulla e', '1996-09-02 21:00:00', '2023-09-12 10:21:08', NULL, NULL, NULL, NULL, NULL, '200.00', '6', '6', 'student', 'income');

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
(1, '3043', 'income', '4', 10, '40.00', '2023-09-11 11:02:21', 'احمد سيد', 'حسن حسام', '40.00', '40.00', 'سيسيس', '2023-09-11 08:02:21', '2023-09-11 08:02:21'),
(2, '55', 'income', '4', 19, '76.00', '2023-09-11 11:05:55', 'احمد سيد', 'حسن حسام', '59.00', '59.00', 'dfdf', '2023-09-11 08:05:55', '2023-09-11 08:05:55'),
(3, '6904', 'income', '4', 30, '120.00', '2023-09-11 11:07:28', 'احمد سيد', 'حسن حسام', '89.00', '89.00', 'sss', '2023-09-11 08:07:28', '2023-09-11 08:07:28');

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
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = suspend,\r\n1 = active,\r\n3 = excluded,\r\n4 = converted',
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
  `notes` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `code`, `gender`, `birthdate`, `city_id`, `user_id`, `phone_number`, `address`, `about_me`, `status`, `branch_id`, `period`, `guardian_relationship`, `guardian_name`, `guardian_phone_number`, `guardian_whatsapp_number`, `bus`, `how_did_you_hear_about_us`, `personal_photo`, `blood_type`, `parent_id`, `created_at`, `updated_at`, `email`, `password`, `joining_date`, `medical_history`, `id_number`, `derpatment`, `guardian_email`, `profession`, `receiving_officer`, `followup_officer`, `appointment`, `class_room_id`, `image`, `department_id`, `birth_certificate`, `parents_card_copy`, `another_file`, `level_id`, `subject_id`, `wallet`, `parents_marital_status`, `notes`) VALUES
(5, 'Catherine Reeves', '11111111111', 1, '1974-08-03', '173', NULL, '+1 (842) 632-6725', 'Consectetur aut har', NULL, 0, 1, 1, NULL, NULL, NULL, NULL, 1, 'Duis odio veniam er', NULL, 'Voluptate exercitati', NULL, '2023-05-17 11:19:27', '2023-09-09 17:29:52', 'hassanstudent2@daranwar.com', '$2y$10$WtfGDRRiUVt6RF63TDVpMO5HnTkIWTtKdDy.fW2I6nqURgrSTBgvm', '2013-11-14', '1972-07-24', NULL, '14', NULL, NULL, NULL, NULL, '2020-02-05', '1', '10', '12', NULL, NULL, NULL, NULL, 2, '-504.00', '1', NULL),
(7, 'آدم حسام عتمان', '2861', 1, '2018-01-01', '139', NULL, '01012345678', 'دماص', NULL, 3, 1, 1, NULL, NULL, NULL, NULL, 0, 'من الأصدقاء', NULL, 'b', NULL, '2023-07-15 11:54:16', '2023-07-15 11:54:16', 'adam@gmail.com', '$2y$10$2aBAY8u8fXbmabf9/tv6T.Bq1DyxzXfkf3TSe4yo6kOkuy5Yb47Le', '2020-11-01', '2018-01-01', NULL, '13', NULL, NULL, NULL, NULL, '2018-11-11', '1', NULL, '13', NULL, NULL, NULL, NULL, 2, NULL, '1', NULL),
(227, 'حسن صلاح الدين حسن محجوب', '202320227', 1, '2000-05-12', '1', NULL, NULL, '2 ش انطون سانت', NULL, 1, 2, 1, NULL, NULL, NULL, NULL, 0, 'لينكد ان', NULL, 'O', NULL, '2023-09-18 07:55:07', '2023-09-18 13:02:02', 'Aboali@gmail.com', '$2y$10$bp5PFh6CkAO18o73n2ig4uk60KIGnqmtBdF3D3GlJBg8jnER6O9RG', '2023-09-18', 'تاريخ مرضيي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '30', NULL, 25, '[27,28]', 29, NULL, NULL, NULL, '2', NULL);

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
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, 227, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_duties`
--

CREATE TABLE `student_duties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 227, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `abscence_count` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `student_id`, `subject_id`, `abscence_count`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 0, NULL, NULL),
(2, 5, 2, 0, '2023-09-15 17:05:00', '2023-09-15 17:05:01'),
(3, 5, 3, 3, NULL, '2023-09-16 08:26:37');

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
(1, 6, 1, 1, 'paid', 12, '2023-09-09 17:09:07', '2023-09-09 17:40:56');

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
(1, 'First Subject', 14, 8, '2023-08-24 10:05:33', '2023-08-15 07:03:53'),
(2, 'التلاوة', 13, 7, '2023-08-24 10:05:35', '2023-08-15 07:03:48'),
(3, 'انجليزي', 12, 6, '2023-08-24 10:05:30', '2023-08-15 07:03:19'),
(4, 'hhhh', 12, 6, '2023-08-15 07:16:26', '2023-08-15 07:16:26');

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
  `department_id` bigint(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `student_id`, `course_id`, `start_date`, `end_date`, `created_at`, `updated_at`, `subject_id`, `name`, `value`, `department_id`, `status`, `type`) VALUES
(1, NULL, NULL, NULL, NULL, '2023-09-06 12:29:15', '2023-09-07 10:33:43', 3, 'Ralph Brooks', 504, 13, 1, NULL);

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
(30, 'koolen 03', 'uploads/all/emDMM4X97rJh9A8dFhxG6XFvXxAzlMPpA1v0Yk8Z.jpg', 227, 537307, 'jpg', 'image', '2023-09-18 12:49:11', '2023-09-18 12:49:11', NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assignments_uuid_unique` (`student_id`);

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
-- Indexes for table `bundle_courses`
--
ALTER TABLE `bundle_courses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_levels`
--
ALTER TABLE `student_levels`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bundles`
--
ALTER TABLE `bundles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bundle_courses`
--
ALTER TABLE `bundle_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calenders`
--
ALTER TABLE `calenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `class_room`
--
ALTER TABLE `class_room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followup_questions`
--
ALTER TABLE `followup_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `followup_responses`
--
ALTER TABLE `followup_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `notice_boards`
--
ALTER TABLE `notice_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `student_buses`
--
ALTER TABLE `student_buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_certificates`
--
ALTER TABLE `student_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_departments`
--
ALTER TABLE `student_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_duties`
--
ALTER TABLE `student_duties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_levels`
--
ALTER TABLE `student_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_subscription`
--
ALTER TABLE `student_subscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
