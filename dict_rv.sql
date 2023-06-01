-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 03:27 AM
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
-- Database: `dict_rv`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `region` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `municipality` varchar(250) NOT NULL,
  `barangay` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `region`, `province`, `municipality`, `barangay`) VALUES
(4, 4, 'Region X (Northern Mindanao)', 'Camiguin', 'Guinsiliban', 'Cantaan'),
(6, 6, 'Region 5', 'Camarines Sur', 'Naga', 'Sta Cruz'),
(7, 7, 'Region VII (Central Visayas)', 'Cebu', 'Compostela', 'Bagalnga');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `end_point` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_id`, `activity`, `end_point`, `timestamp`) VALUES
(13, 1, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-30 03:06:07'),
(14, 1, 'update user 7', 'http://localhost:8000/admin/examinee/7/update-examinee', '2023-05-30 03:20:03'),
(15, 1, 'update user 7', 'http://localhost:8000/admin/examinee/7/update-examinee', '2023-05-30 03:23:03'),
(16, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-30 03:28:17'),
(17, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-30 12:09:15'),
(18, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-30 12:35:44'),
(19, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-30 12:35:45'),
(20, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-30 12:37:20'),
(21, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-31 01:16:00'),
(22, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-31 06:03:31'),
(23, 2, 'created announcement', 'http://localhost:8000/livewire/message/cms.announcements', '2023-05-31 06:23:06'),
(24, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-31 21:32:59'),
(25, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-06-01 00:41:32'),
(26, 2, 'deleted a course', 'http://localhost:8000/livewire/message/c-m-s.tech4-ed', '2023-06-01 00:48:34'),
(27, 2, 'created a course', 'http://localhost:8000/livewire/message/c-m-s.tech4-ed', '2023-06-01 00:56:42'),
(28, 2, 'created a course', 'http://localhost:8000/livewire/message/c-m-s.tech4-ed', '2023-06-01 00:57:09'),
(29, 2, 'created a category', 'http://localhost:8000/livewire/message/c-m-s.category', '2023-06-01 00:59:42'),
(30, 2, 'deleted a course', 'http://localhost:8000/livewire/message/c-m-s.tech4-ed', '2023-06-01 01:00:12'),
(31, 2, 'created a course', 'http://localhost:8000/livewire/message/c-m-s.tech4-ed', '2023-06-01 01:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(250) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `start_duration` datetime NOT NULL,
  `end_duration` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `cat_id`, `admin_id`, `title`, `excerpt`, `content`, `author`, `status`, `start_duration`, `end_duration`, `timestamp`) VALUES
(44, 2, 1, 'sdssd', 'hfhgfh', '<p>adsadasdd</p>\n', 'Anonymous', 1, '2023-05-02 13:50:50', '2023-05-03 00:00:47', '2023-05-31 06:22:27'),
(49, 2, 2, 'zxc', 'asdasdsad', '<p>asdadsd</p>\n', 'John Doe', 1, '2023-05-04 16:36:21', '2023-05-23 01:30:42', '2023-05-24 08:41:18'),
(50, 2, 2, 'erewrer', 'werwerwer', '<p>ewrwrwerewrwerwrwe</p>\n', 'John Doe', 1, '2023-05-31 14:22:14', '2023-05-31 02:00:00', '2023-05-31 06:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(250) NOT NULL,
  `button_links` varchar(250) NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `image`, `button_links`, `timestamp`) VALUES
(8, 'dict_rv', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut ', '1683528329_5J5U1xch.jpg', 'https://loremipsum.io/', '2023-05-08 06:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `event` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `count_users`
--

CREATE TABLE `count_users` (
  `total_visitor` int(11) NOT NULL,
  `all_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dict_admins`
--

CREATE TABLE `dict_admins` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` longtext NOT NULL,
  `name` varchar(250) NOT NULL,
  `office` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `remember_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dict_admins`
--

INSERT INTO `dict_admins` (`id`, `email`, `password`, `name`, `office`, `role`, `designation`, `remember_token`) VALUES
(1, 'sample@gmail.com', '$2y$10$NeYLbNVa3qiR4VcjkcC8GO7G3p/qeQydo4eJUJ0RAbB1E33qlDF5u', 'Edgar Reyes', '1', 200, '1', NULL),
(2, 'jd@gmail.com', '$2y$10$NeYLbNVa3qiR4VcjkcC8GO7G3p/qeQydo4eJUJ0RAbB1E33qlDF5u', 'John Doe', 'DICT', 100, 'checker', NULL),
(3, 'creator@gmail.com', '$2y$10$NeYLbNVa3qiR4VcjkcC8GO7G3p/qeQydo4eJUJ0RAbB1E33qlDF5u', 'Creator Co', 'DICT R-5', 300, 'Writer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

CREATE TABLE `exam_schedules` (
  `id` int(11) NOT NULL,
  `exam_set` varchar(15) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_history`
--

CREATE TABLE `failed_history` (
  `id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `part_1` varchar(100) NOT NULL,
  `part_2` varchar(100) NOT NULL,
  `part_3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `content` text DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `cp_number` varchar(50) DEFAULT NULL,
  `is_read` int(11) DEFAULT 0,
  `is_archived` int(2) NOT NULL DEFAULT 0,
  `is_tech4ed` tinyint(2) NOT NULL DEFAULT 0,
  `organization` varchar(255) DEFAULT NULL,
  `tech4ed_course_training` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `intended_for` varchar(250) NOT NULL,
  `is_archived` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `excerpt` text NOT NULL,
  `thumbnail` text NOT NULL,
  `content` longtext DEFAULT NULL,
  `vid_link` text NOT NULL,
  `author` varchar(250) NOT NULL,
  `status` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `admin_id`, `title`, `excerpt`, `thumbnail`, `content`, `vid_link`, `author`, `status`, `timestamp`) VALUES
(3, 1, 2, 'sds', 'adasd', '1683187088_OhoLvSli.jpg', 'sffsf Updtaeed', 'http://localhost:8000/admin/cms/posts', 'John Doe', 1, '2023-05-04 07:58:08'),
(4, 2, 2, 'Test Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut', '1683521716_k4giA2Sf.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://localhost:8000/admin/cms/posts', 'John Doe', 1, '2023-05-08 04:55:17'),
(5, 1, 1, 'Test Post by normal admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet dictum sit amet justo. In hendrerit gravida rutrum quisque non. Arcu felis bibendum ut tristique et egestas quis ipsum suspendisse.  ', '1683534231_Q9XPNbrz.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio pellentesque diam volutpat commodo sed egestas egestas. Venenatis cras sed felis eget velit aliquet. Semper viverra nam libero justo laoreet sit amet cursus. Felis donec et odio pellentesque diam volutpat. Ullamcorper velit sed ullamcorper morbi. In hendrerit gravida rutrum quisque non tellus. Nunc sed velit dignissim sodales ut eu sem integer. Velit euismod in pellentesque massa placerat duis ultricies lacus sed. Ut pharetra sit amet aliquam id. Erat velit scelerisque in dictum non. Convallis posuere morbi leo urna molestie. Habitant morbi tristique senectus et netus et malesuada fames. Blandit massa enim nec dui nunc mattis. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu feugiat. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat in. Id venenatis a condimentum vitae sapien pellentesque habitant. In hac habitasse platea dictumst.\n\nUrna nunc id cursus metus aliquam eleifend mi in. Semper feugiat nibh sed pulvinar proin. Felis bibendum ut tristique et egestas quis. Vestibulum lectus mauris ultrices eros in. Eu scelerisque felis imperdiet proin. Ultricies mi quis hendrerit dolor. Netus et malesuada fames ac turpis egestas maecenas pharetra. Eros donec ac odio tempor orci dapibus ultrices in iaculis. At consectetur lorem donec massa sapien faucibus et. Eget lorem dolor sed viverra ipsum nunc aliquet bibendum enim. Gravida arcu ac tortor dignissim convallis aenean et tortor.', '', 'Edgar Reyes', 1, '2023-05-08 08:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category`) VALUES
(1, 'Announcement'),
(2, 'News'),
(3, 'Wifi4All'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image_filename` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `image_filename`, `timestamp`) VALUES
(3, 3, '1683187088_jaNLpZEo.png', '2023-05-04 07:58:08'),
(4, 4, '1683521717_3Fsxk1Np.jpg', '2023-05-08 04:55:17'),
(5, 5, '1683534231_3oh7IJgy.jpg', '2023-05-08 08:23:51'),
(6, 3, '1683537798_tpPTLnjd.jpg', '2023-05-08 09:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `reg_details`
--

CREATE TABLE `reg_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_schedule_id` int(11) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 3,
  `apply` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reg_details`
--

INSERT INTO `reg_details` (`id`, `user_id`, `exam_schedule_id`, `reg_date`, `approved_date`, `status`, `apply`) VALUES
(4, 6, NULL, '2023-05-13 17:19:02', NULL, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `submitted_files`
--

CREATE TABLE `submitted_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `file_type` varchar(250) NOT NULL,
  `requirement_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submitted_files`
--

INSERT INTO `submitted_files` (`id`, `user_id`, `file_name`, `file_type`, `requirement_type`) VALUES
(7, 4, 'sdsfsdfsd_passport_2305081683546071.jpg', 'Image', 'passport'),
(8, 4, 'sdsfsdfsd_psa_2305081683546071.png', 'Image', 'psa'),
(12, 7, 'asdasd_passport_2305301685416476.jpg', 'Image', 'passport'),
(13, 7, 'asdasd_psa_2305301685416477.png', 'Image', 'psa'),
(14, 7, 'asdasd_coe_2305301685416477.png', 'Image', 'coe');

-- --------------------------------------------------------

--
-- Table structure for table `tech4ed`
--

CREATE TABLE `tech4ed` (
  `id` int(11) NOT NULL,
  `courses` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tech4ed`
--

INSERT INTO `tech4ed` (`id`, `courses`, `timestamp`) VALUES
(3, 'Course34', '2023-06-01 01:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `tertiary_edu`
--

CREATE TABLE `tertiary_edu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_attended` varchar(250) NOT NULL,
  `degree` text NOT NULL,
  `inclusive_years` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tertiary_edu`
--

INSERT INTO `tertiary_edu` (`id`, `user_id`, `school_attended`, `degree`, `inclusive_years`) VALUES
(4, 4, 'sfdsfsdf', 'sdfsdfs', '2'),
(6, 6, 'sdfdfdf', 'sfdsdfsfd', '2'),
(7, 7, 'aeaad', 'sdasdas', '6');

-- --------------------------------------------------------

--
-- Table structure for table `training_seminars`
--

CREATE TABLE `training_seminars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course` varchar(250) NOT NULL,
  `center` text NOT NULL,
  `hours` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `training_seminars`
--

INSERT INTO `training_seminars` (`id`, `user_id`, `course`, `center`, `hours`) VALUES
(5, 4, 'sdsdasd', 'adads', '2'),
(7, 6, 'Python', 'DICT R-5', '128'),
(8, 7, 'asdasd', 'adasd', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `user_login_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `place_of_birth` varchar(250) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(250) NOT NULL,
  `citizenship` varchar(250) NOT NULL,
  `civil_status` varchar(250) NOT NULL,
  `contact_number` varchar(250) NOT NULL,
  `present_office` varchar(250) DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `telephone_number` varchar(250) DEFAULT NULL,
  `office_address` varchar(250) DEFAULT NULL,
  `office_category` varchar(250) DEFAULT NULL,
  `no_of_years_in_pos` varchar(10) DEFAULT NULL,
  `programming_langs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `e_sign` longtext NOT NULL,
  `year_level` int(11) DEFAULT NULL,
  `current_status` varchar(50) DEFAULT NULL,
  `add_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`add_info`)),
  `is_retaker` varchar(5) NOT NULL DEFAULT 'no',
  `date_accomplish` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `user_login_id`, `email`, `fname`, `lname`, `mname`, `place_of_birth`, `date_of_birth`, `gender`, `citizenship`, `civil_status`, `contact_number`, `present_office`, `designation`, `telephone_number`, `office_address`, `office_category`, `no_of_years_in_pos`, `programming_langs`, `e_sign`, `year_level`, `current_status`, `add_info`, `is_retaker`, `date_accomplish`, `timestamp`) VALUES
(4, 1, NULL, 'JC', 'sdsfsdfsd', 'fsfsdf', 'fsfsfsd', '2023-05-23', 'female', 'fsdfsdf', 'single', '09078522583', '', '', '0', '', '', '', 'c++', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAADICAYAAADGFbfiAAAAAXNSR0IArs4c6QAAIABJREFUeF7tnXvwh9lcx9+mwixiC8PaoSwa17A7ZU2TakzYXSSXUgoRWqxLlKKUQi7ZWFZWbKJhllmRWyMjksss0bhEibQuhdly2bH5R/Nqz4ezz/6+3+/zfb7P5ZzzvM/Mb77f3+/3POc553XOc97nfM45n3MFOZiACZiACZjAAAJXGHCPbzEBEzABEzABWUBcCUzABEzABAYRsIAMwuabTMAETMAELCCuAyZgAiZgAoMIWEAGYfNNJmACJmACFhDXARMwARMwgUEELCCDsPkmEzABEzABC4jrgAmYgAmYwCACFpBB2HyTCZiACZiABcR1wARMwARMYBABC8ggbL7JBEzABEzAAuI6YAImYAImMIiABWQQNt9kAiZgAiZgAXEdMAETMAETGETAAjIIm28yARMwAROwgLgOmIAJmIAJDCJgARmErbibriHpByTx+a30yXfC/3Q+31Fc6p0gEzCBKglYQJYvtp9IjT4podHPf+Jv8YlIROA7P/8r6UoDsvEhSf8uic+/k/SV9H1AVL7FBExgjQQsIPOUOqJwB0m3Tj80/HwfI3xZ0jVTRIhAjDhCdK6+50MQkxAW4vpMEpg9o/HlJmACrROwgExXwgjE/SUxwtgmFjT6NNi5qYnv/C0Cv2/76ZMLRCzSQZpiBIOw7QoXSfqqpAskXUsSZjCE5guSPrHrZv/fBEygTQIWkHHLNUTjZ1IDHbGHeSh693kPf9wUDIuNdCMwIXYxn3KDHtG9T9I3JJ0t6V1JVHrc5ktMwARqJ2ABObwEwzz1e52RBr30v0o9deYZag0xWrmapNtKesCOjLxE0nskvV7Sl2rNtNNtAiawm4AFZDejTVfQa797alBjcvt1kv48iUY+FzH8KeXeeaKkG0o6ZYOoXCzp1ZJe5jmUcgvRKTOBQwhYQPanR4/8yZJuKunKaa4C0eCnddHYRuv4JCY/JulOkq6dXfyvkt6YxKTm0dj+tcV3mEDDBCwg/QsX082jkpnqnyS9RtIbvPT1SIA/ksSEOZSuyQsBQWwZreULBfqXhK80ARMogoAFZHcxMCHOiAOTFcJB4/cnu2/zFYnArSQ9TRIjk+6SYuaIQkwMzARMoDICFpDNBcbk+LmSEBD2QjBJTmPnMIwA80SwfLSk7uouRiLwZVSyZjPgMLK+ywQWImABORo8jd0H09JWJoF3rTxaqPiqfSzzSDBln0weEJIHetK92nJ1wldGwAJy+QKncXutJNjQyGFmcZiGAELNiIS5pTww0vt9z5FMA92xmsBYBCwglyXJPMfbk3hgbmHjn8P0BDAXIhosi47g0cj03P0EEziIgAXkO/hoxD6dxINRiJebHlS1Bt0Md4QknyNhwQKjEc+NDELqm0xgOgIWkO+wZbSBX6h72Gw1XYXrGTOigfkwVm0xGjlV0sd63u/LTMAEZiBgAbkUMg0WdvjnJpv8DOj9iB0EGI2wMit39niWpDNMzgRMoAwCFpBLe7os18V3FY2WQzkEMCs+RdIjsyRhzsLM5U2I5ZSTU7JSAmsXkFhxxT4PvtvOXuaLQNkg8uFzDHPjT5aZVKfKBNZDYM0CQmPEiis+j7V4FF/p7yjprVkqcdR4n+JT7QSaQMME1iogIR4Ih1dc1VXBz5N075RkzFnMkziYgAksQGCNAoJdnZHHD3qj4AI17vBH/qik8yUdl6JiPoTd6w4mYAIzE1ibgDDyeLmk60p6nJfrzlzbxnvczSR9NIsOUxYmLQcTMIEZCaxJQBAPXJSw29x7PWasZBM9CtMVXpIjMKluzwETwXa0JnAUgbUICKLBKh4+3dC08y4wF8KcSITbSeKMdgcTMIEZCKxBQOzfaoaKtOAjzsw2f14oiTmSLyyYHj/aBFZDoHUBwSEiZiv2efDd/q3arNovkHR6lrXW63WbpehcVUeg5RcNN+H0Ti0e1VXLQQm+QNJJ6U4m1Cn79wyKyTeZgAn0ItCqgHCGB67BOYKWkYfdXvSqDlVfxEZD5rmOz0TEGw2rLlInvnQCrQkIezwwWbE5EN9WiIfdk5ReC8dL32mSXirpWjZnjQfVMZnAJgItCUjumsTH0K63zp8o6fXZRkNItFTP11uyznlxBFp5sVhpxcgDEbF7i+Kq2ewJOlnSu7OnMhdy+9lT4QeaQOMEWhCQfOTxmHS2R+PF5uz1IIAZE5cn+DsjPFTSOT3u8yUmYAI9CdQuIBaPngW90stwV/OslHfmwkJMVorD2TaBcQnULiBxDC3O9HCq52ACXQI4zoyDwjh18nlGZAImMA6BmgUkjqH1hPk4daHVWLqOF2uu862WkfNVKYFaX6bYYc4+DybQHUxgG4GPSLp5uuCXJL3CuEzABA4nUKuAfCvtMMc04U2Ch9eD1mP4ZUmMVAlnS3p46xl2/kxgDgI1CkjsMrdX3TlqSDvPiJMMvaS3nTJ1ThYmUJuAPCC5q3hu5oF1YYR+fCUEHpkm0BmxchqlgwmYwIEEahKQ75X0NknHSDrVpqsDS359t+Mr663pJMNbrC/7zrEJjE+gJgF5kaSHSPLxpePXgzXEiHuTu0o6S9IZa8iw82gCUxOoRUBOkfQSSR9PJwpOzcXxt0UgP7nwxpI+2Vb2nBsTWIZALQIS51974nyZelLzU/HQzEFiN/AKrJqL0WkvkUAtAvL3kug5XqdEiE5T0QSi80Eij/Nxt0WXlRNXGYEaBOSmknBZwvJdHOI5mEBfAvhK+3S62O5u+lLzdSUS4NhmTLHvlXS3UhJYg4BEI4CvKxoBBxPoSwAX/3gtwGMBm059uFhfcr5uXwInSLqTpGunDi+d3rECdRefbhGKObKiBgEJeBQIcyAOJtCHQP7See6sDzFfsy8B5tfuLOkPJN2oc/PnJb1B0r9J+jNJF+0beXZ9V0CeIOkZB8Q32q01CYhHIKMVe/MR8WLTY8NPmp1tNl/cs2eQI5PvIenX9vDFd8ioge0LbGOI8AhJmLQWDzUISHhTfbkkfBo5mMAuAo+WdKakr6QX3P7SdhHz//sSYFHG/dPpp33vievoBP+upAv3vDH2wMVtxczn1SAg+fCthvTuWTd8+cgEGH0wcc7nIb2+kZPl6ConQDv0bEknbsjHmyU9M/2PazFhPUnS1VJdzG9jI+tf7+FNg/rMXHCEkyR9oASeNTTIsQnsU5KYqHIwgW0E6OXRQ7Srf9eTMQhgBn2sJI4B6AbaJCwjzHF8dsPDaPgRkp894kRMNkdztMCuCfeugNA5YnS9eKhBQCi4v0jL105enJgTUDIBXvYPpgR64rzkkqojbXReGVXkvX9S/glJr0rzEl/omRWW3jKXgR+/bmCkjJBs8pDA8RV5KKbdLiYhWwohNoJ5Er1nTV3xZXF87evS8t0Vo3DWDyTQXflEdPT6z5f0KwfETSf4vpLwDp2HTRaWYzsruIpajVqDgESjUBS4AyqQb52GQLj6J3bctXvifBrOa4iVTuvpklhtFYEjtNnM/I6RAPyQpIcdcSxFd+RMOvIVV0XN65UuILhwx/73fZ4QHanathkNNmFMV5gaHiOJl93BBIYQyB1vcn/McyAqU4TTJL1Q0vFZ5LeT9D5Jv54m7r8p6Yrp/+w7+ZspEjIkztIFhJ2db0kZs017SAmv4x4E41GeOF9HYU+Yyz+S9JtZ/Kx0YsXT1AFvCdRhHH4S3p9GHeemyflLso2K7HT/0tQJ6ht/6QIS8x//ZUeKfYt0ddd54nx1RT56hq+bVu49PYuZlVfsJZorPFjSi7OHXSzpKmkjLKsKIxTVka5FQD4qyafIzVWV63oOpitExMcc11VuJaX2vOSokDT9o6Q/lIQftblD13z21SRiT84SUlSbXVRijiitfEjJygWWzjmYQBCIHeefSSJiZ4muG/sQwH/V0zLxYKHOPQ/0W7XP87vXMhLC2+71s398WNItLSDDsOZL6b6ednUOi8l3tUaACXNGH0ygFzWsbw10w/n5XDojhiy+Oh2XvVR2aeswVbGacFsoqtNfVGI2UKNXcIf0PzvGW6p6l/fcMF25TpRXNqWn6I5pboEDxghLL43NnSXSGcLawt+64ZzSzkSqQUDyQ4EA6t5m6a/n9OmLxRWYrrq7hKd/up9QM4G7SHpTloH7pNHHUnlipRWjDjrK7HrHp1Y3jZE2/GcVc5gUiapBQEhnLNPkOxvE2CjmsE4CPudjneU+Vq7zCfMlRx6IBnuWmCjnbA/ODskDIoeQ5GHJ9B7JvxYBoZeJQsc6aa+4Get1qiuefMNgcS9TXShXmdrnZS5E/lLS/RagwIpBlgfTEdrWjsUo2wIyUiGx2SZfWncbSR8aKW5HUwcB+7qqo5yWTiVnCMXRspGWfIns2ZIePnMi6fyw2ZWRBz61+NzWfrEzvXtuCP6znj9zurc+rpYRSGQCXzR3T78AHxFxWAcBem0s2/WS3XLKm970D6d5KKwE/NBQxmeeUpZY85P7KIvf8+XXfCeOuJ7vPAe/VOzQJrDc9Sbpe8THprubS7qepKun/3EmB76r6HjmXnXnbvcYbTDXwXMxx/d1tfN6SXfNIHoO5MC6T8VEOKKC2EPvgUAruT0cJfqEweUKjHcPsaAxpEHns5ZAvYk2A7MV5qs5Qm6uYrUgZql9nHx2Nxbi7v3GcyS87zPmVuK+6dp2XdeUZed5Y1AtNw5eQkxX3u8xbxkhEMw58r7xHWd+x+xIAg11jCYor2i050355qfNNW+G2GKuYsTMwWa7zFWbUpy76eEafGBhmism1CggwItT5wKkl/YWU6VGTUi+WXCul3/UDFQUGSLBfis+jxpdcIjSx1MPGpGIU/ToUffpVYeJCyRHmbn4W/yvi+2qyYRFR4KACSv2SeQmLASONu2ijndb7sFFyabjaMcqJvKA2xEEg3QgILRVh4TuYVJFtXW1CggFks+H8HtRYA+pMb732w0JDYb9XE1XIRhdMKfIZzTg8TQO5UIkMBnvOnJ1uhQeFnPe+E55RkwuHIzCEI0x3L/f64g9KkW12UUlZs+6QqFRUDGpTq+IQmNpnEP9BJj4pGFjErQme3sN5HlPcJuRb8LE1EKnDLGoVTBy9kw4c9YG4W2S2H0+doAfIw7qKcLB5Dht0lg+2X5e0is7iS6qzS4qMQNKFxGh0oerE6LwnMgAkIXdEhtHEQ9ezrFeyMKyOXtyYMlqthAOVrTFSXt9zFCzJ3jgA3PXIDTs3dHVwGi/fRuj4liSGwzHFI54EG3Zc7LE4miRI3GLCbULSIDMd6rzN0QF+C29FMVUmokTEh52efFp6CwehwOHI8tIYyTHaAPOLYw0unQYXdG4h2iwDLa7y3soUQSYuOFI5wbROHSOY1taTu2k/SxJZwxN/BT3tSIgsGHiisoTu9Wx3T7Qmw2nqDaTxenluuOjRSgws9CgxgY2OlitBVyzP77jhPClkh40QkYRDhgy8mA5Lh3WuTYxv1HSKZJYxPDjkr44Qn5Gi6IlAQEKPS0KN58XYSQyZS9htMJYeUTh44pGju9zvaCtYkcwmEeKUQcNH2LS2ogu5iHCDfrfZvMdtANsxhsS4IdpnPbk2GxifAl+bI7E9XxxoTUBCcDdM4Zt0iqu6l0mQbHXg/pIQ9BiD3nOEoiRHM/ERh/eXudMw5TPQjR4x1kIQN3BFMfcDo4J8XfFAUxDzzPP42bl1hhLcadksWjcrQpIjEaoVFQ0AvMhmLjoiTmUQ4AGgJ4yLy4mR48WDyub2CMVy0lpAFsJjKaYg+CdRhjpaJDfGK3eKm3cI7/np9MF98k7ow2ewShj6vmNfdJV7LUtC0g+GqEyxK5Yj0bKqY6IxzvTSZNePXdYucASFx04EmSSnM5SCyM58oUpCiHErBR5Y9TRNSflG4zZVPiNHkjpuCAadDaZGOc5XnzTAxyXrEFAAkV39zq9DXY3L2HT7Fk8TV+Wn+vhUwWHF3VsYouRxrMlPbXyek2eEA1Mb9STGG3wzm5r3GPjYJ8zg2Ip7j3SCAbBbXFV2vCa1ePONQkIOLpzI4gHlZLNhxaSHhVmpEtyf2b0KHmZHfYnkC/PpZGFa62LD0I0yENszGMEFT+76OQnl27bL5Hv4aDjQsfSwrGL7ob/r01AAkPsNYjfLSQDK9CA2/J1+t7rMQBguiWfO8LtSI2ml65okDXyEnMb+9DBvTtLXSN0D4xiJMNS3NjD4RHHPnQtIJcjQOWNxiz/Jz0SRiS19uRGqBaTRAFv7Myx3NLLdYdjzsWjtuW5jBTC/xaNOfVgn5HGJmo4WOT8jzxwPgjuz3nPYcYch4VjeL273J1rHYHkIKjQ9N5o2HL30wgIYkKPyJNqh1W6rgsNYrPzy2FMqa84meSzlqOdEQrOEuE9I90xp4HpaMyJ/hdIOj1hxSMvCzSoey0tKhhWaya6ywJyWbCICJWcyp6H6CF5CfB+FRGemA1yp30eeezHsHs1jS4b3OjYwLfEubvYhMeybN4lNuLljhqn7JA9UdKTJF05CRXv85gidVjpNXa3BeToAmW4y8tJ7yVco3BlrA+n5zflS1BzNdvmIvyQw3VqZjJW2jG/IMj04OnVl1QH6STwzvDu8MO7EqLBaH5qoWNTIWLBs+Fj4Rir1m2JxwKyG3KISdfExcvBMuC1z5WETTsOIjrK8ymjDhq/vmdB7y6V9V2RL3suxfxHo32b7Az0WIzS95CpMUoxFw7qmXeOj0G1ZxwWkJ6g0mX0rhGS8LXFnzEpICRrWQoY5ok46hQ/Pd+zAWN4LEVsp+6B7leSdV0N8w+mhnrJkxnpTGE+o+yjpx/mXURjzjJGOOiUxJwK3+3FYOZ6bQEZBrw78R7DdV7ukswKw3J3+bviqNNoOLbFGyfZ0bC0yGIspvvEE6dvYgIMVxv73D/02tilTYeJ59JexMQ3I++5R98IaYw4LBxDS3XE+ywgh8NkyMxPzJXEqYhz9sYOz8VlY4ieJo1G+BLb9IyvSXqTpFelxqXmfI/NcYz44qwbzDOUy9SiHGJBuXdXTB3lPmSMPO6Kg3TEAU6ICHMcHnHsojbD/y0g40HOV3DRM2OivZYhNS9oPsrYdYIbPWEak9yR3XgkHVMQyL3q4nJjitVE3c4CQhWjDD6nFqxtpU0HhhFH7B3yPo7C3g0LyLgFQsN7L0n4I2JPCUKCWWuKF/+QlOeCwUuaL7PdFG/sEF66UTkk3zXdS6P5dEnXSXWIHvcYIQSDT0YZ4aAwzkJfuq6GmSpWdJHnuQ9xGoPzKuKwgExXzJgeYuXW0h6AuxPffQQDM0H0RJduVKYrpTJjvrekZyZhZ/f+Yw9IZr5KDtHgd0aQdG5imW0JZsc4GCpEjfrHCJf3qIT0HVAE7d5qAZm2bHkp6DkyDCfM5QE4H2HEuvw+OcVEkE+S9rnH14xLAPE4L0V5jqSH7hl9mCJjWTW3h8kR0ShpBEnHJsxU4UAxPEDUYv7ds3jautwCMk950ojzQrArl95UHGw1Vs+K+Ik7Go0+IwxyHqOMEI2x0jMP1faecm5m76e+/I6kz27JJg1wXu5xfG3eEZh7eW2fUkHkwlU7dZV5FzpX5HnJOZc+afc1GQELyHzVgZc93MnH/Airt3jZ9wmbGo2+cXiU0ZfUvNfFLnOe+gxJTzji8TGajA4Dm/gI+Y7vuZfW9qUUprSY2xjLiWLf5/u6CQhYQCaAuiPKrhdgel3b9o+EOYpGgx7mvmdn5I7rllqGOT/lup74cEnPT0mOjYLUk5hQ5j2Nk/mYUI49GHPu+B5ClPRzPvlTUvrJB2lmtOHNpUOIFnaPBWS5Atlk1mJ4Hz1NBGPXktqjchCb+RCMUnuky5Ev78lxkt4Fkv4huQfBnEjZh3sQPmspS+b8cnPqRyS9JM2/1JKH8mpJgSmygCxXKGGKYoPUqZKueEBSmCTNvZ0eEJVvnYFAboZ8iKTj0jP/Q9Jrs7mAWuak4mAoRCP2bJCloYdDzVAEfsQYBCwgY1DsF0esjsEktc/KqKNit2D0Y17KVfmoMi975qP4H4HDkPArVlOIg6Fi6S1pZ24jlt96Qrym0hyQVgvIAGg9btnUYPS49chLYuI7TFK19EyH5rfm+yj78CGViwVzUbGMNsrxREnvT5k9WxJzISWHfKSRiwZpplPjuY2SS2+CtFlADoc6tljQg/t61hulN8fBPA7lEYhd3TGqjGW0pBTRzwXjKNHPXZVQxiXufcg3Inb9onm0UV6dnDVFFpD9cOduIA41Q8WTY1dw9EpjkpH4mdfASSOmABqYtbiM369U5rl6mwkyyjAEo+9Ecb5psJSOQu61YFMd99zGPHWu+KdYQDYX0aHLZ4+KmR5b14yxyxyV7w+Yayd78RV3wgRS7rE5L0YW+cbMXCyiLA9JTqzA+pSkEw6JaOC9uTBu84sWouHltwNBt3ibBeTSUo1eV+y1yE0Rh5R7zF3k6/aHxJcv+SUuRiN9e7lDnreGeyjz6CTEnAWfsWw6F3tGgFOdf8HS3ZMS8JtL+thE8GPlV74Zcdueotwrr0VjokKpPdq1CkhuiurrjXZXWef+hqZobGgA4uwReq2MRnAZv2sEsyvda/h/jCQwB0Z5R+NJQ5kLBN/n3HB5iaQrpUKIs8Mp03BBEpsF4zCnPuVF3shrvvl0136icGuzrxmuT3p8TaME1iAguUkiXqhDi3OozfvQ53K/RyPbzY7BCNPMsUkw4rCvWAkVAs/nkktNmZRm38e+IReY2LFOHPv4QAsG4VxxSQ775t/XF0KgRQEJlw8xVO/7Um0qkrzRKWUZLY0GK3iYH8Gv1mPSiKSQajV5MqKHnc9R8LfoZV8oiTmFML3EqGLyhO35gKEC0vcxYYYLoYxPi0Vfgr5uK4HaBaQ7d5E3IkOKPuy+pfRQd+WBBpRGkknf1uZGyFuYYcLtN59du31X4Ev3D9UtU8qN8hsjwOLdkphXYWRjoRiDquPYSKAmAbmxpKukly33FXVI8U49b3FI2va5Nx+N4IyP+ZEaAuXICIpPBCMmsTctYqC8Yr6ilNHgGJxj5BQT+7lQBpejnhNzJi2xGIOn45iJQA0Cgq8odugiIIeEfHQRx3ceEl9p99LQIBy4lyB/mLVKWKkVIhGOIXOx2MSQnnSYnWJE4T0wpdU4p2f1BEoXkBdKetjAUoqdwKWdwjYwO71vw67Oai0mkZkjYUQyR+B50XPuM/+Ur36KUQWTwxaKOUrLzzCBEQi0IiD5mn0EY+1neDMawaz1ZElvlYTH1zHs4WFiwWYfI4n43FQdEfJwRR6jiTC9jFCFHYUJmMBSBEoXEHrTJ0s6XdJVM0gxcRouzMdoHJcqgymfS4MPIxp5zFv87No3EianfE4CwbitJPafHLWfIF/tE6MIi8SUJeu4TaAAAqULSI6IBoxzE97VoxEsAG1RSYgNiN8l6U/TOdshEDFxvW1XcmQmn8QOs1OJZ24XBd+JMYFWCdQkIK2WwVT5yn15DdlAmbsfRyTWbhacqpwcrwlUS8ACUm3RXS7h4Z4ljhLd5boij4B5itydh81P7dQL58QEJiNgAZkM7eQR/5SkWyZXHbsmsrsmKMQCz6+n2VX85OXkB5hAswQsIPUULWdHMLq4SfLxxGl220LuHG+T23Hi4xwKdnxjosLL765J9nqIOaUmYAKTErCATIr34MjvKunOaRXarsgQjFiVtq83WVZnsWET8WDvCF5+HUzABExgKwELSLkV5BmSfmNL8v5T0ifS0twxvMrmXn4RIEYjXh5dbv1wykxgcQIWkMWL4HIJwET1omSu6v7zo5JeIem9E+3YDi+/Z3o0Ul7FcIpMoDQCFpCySuS+kp4oiZPp8sA8xbMmPK2uS8GjkbLqhVNjAkUSsICUUyw4jGQu4ruzJGFKYj5iiT0YcQIi7lAIuEZ5WTm4nBITMIGlCVhAli6BS59/N0m/mpbVRopwgsiE9tKBlVqkA2eJCBlefj03snSp+PkmUAABC0gBhSDpBZ2VVvz+iDKS9v+pYFc77lBYqcU8zPMknVNQ+pwUEzCBBQhYQBaAfsQjvyjpWunvNNC3l/TVMpJ2mVSclHxpsQcF09pTJF1UYDqdJBMwgRkIWEBmgLzjEZiI3p5dU4rpaluyXyXp59Jo5DWFmNqWL0mnwARWRsACsnyB1yggUPttSU9Nnn0fK+nVy6N0CkzABOYkYAGZk/bRz2J+4dPZv9jAx7LdGgLuVZ4j6fi0L4XRk08UrKHknEYTGIGABWQEiCNEwUFNEU6V9KYR4pwrCkZQLPXl8z1pZGIRmYu+n2MCCxKwgCwIPz36upI+nyUDFyb8/PfySeudAsTj/mmvCIsAWEFmEemNzxeaQJ0ELCBllNuHJd0iS8p9Kp1TODeJCFmpYTFAGaXvVJhApQQsIGUUHBsJ7yeJOYUI15b0pTKSt1cq8kUBbEBkcv1je8Xgi03ABKogYAEpp5hwFfK4zA/WKyX9QjnJ2yslCOGDJf10Ms89VNIb9orBF5uACRRPwAJSVhE9QdLTU5I+IImNe7WGG0k6Q9IjJX1d0h9LerGkz9WaIafbBEzgsgQsIOXViHxFFg3wWeUlca8UYcYKh4yflPTm7GeviHyxCZhAWQQsIGWVB6nJG1x+x7V7C3MIjDyOy3C/SxInLvoI3fLqoFNkAr0IWEB6YZr9oo90zgQ5tpGGFk++vygpP8/ddXD26uUHmsA4BPzyjsNx7Fi6E+rE38qyWHbeXyDpmgka8yNvkXRepUuXxy57x2cC1RCwgJRbVJxO+FuSbpklkc1575D0KUnvrOxcDrwNsyz58ZKeeQT28yXds9zicMpMwAS6BCwg5dcJzD5MptNz74aLU6PMAU/MJXwou4Df+Tv35fMM3e/E8RlJ15d0tXQ997Gfgx3y/5LiDHfzfOJ+nrpzlfQMznFnfoP7rpi+3yy5qL+epG+mv2GK2xTwB3bD8ovDKTQBEwgCFpB66gJmrZPT/MENMhNQPTkJDnEKAAACfElEQVTYntJ/loToOJiACVRCwAJSSUEdkcxbSTpF0nUk3Tr9XL3S7HxN0oM8B1Jp6TnZqyVgAWmv6DE9RbiGJH4IXdMVpi3+9/2SLkyjm7gPkxZnoGOS4jshTFiMEr6czFjHpP+fnv4fJiwcQWLe+rikE5IJK9yyYCZjFVbM5/D5XkmXtFcUzpEJtE3AAtJ2+Tp3JmACJjAZAQvIZGgdsQmYgAm0TcAC0nb5OncmYAImMBkBC8hkaB2xCZiACbRNwALSdvk6dyZgAiYwGQELyGRoHbEJmIAJtE3AAtJ2+Tp3JmACJjAZAQvIZGgdsQmYgAm0TcAC0nb5OncmYAImMBkBC8hkaB2xCZiACbRNwALSdvk6dyZgAiYwGQELyGRoHbEJmIAJtE3AAtJ2+Tp3JmACJjAZAQvIZGgdsQmYgAm0TcAC0nb5OncmYAImMBkBC8hkaB2xCZiACbRNwALSdvk6dyZgAiYwGQELyGRoHbEJmIAJtE3AAtJ2+Tp3JmACJjAZAQvIZGgdsQmYgAm0TcAC0nb5OncmYAImMBkBC8hkaB2xCZiACbRNwALSdvk6dyZgAiYwGQELyGRoHbEJmIAJtE3AAtJ2+Tp3JmACJjAZAQvIZGgdsQmYgAm0TcAC0nb5OncmYAImMBkBC8hkaB2xCZiACbRNwALSdvk6dyZgAiYwGQELyGRoHbEJmIAJtE3AAtJ2+Tp3JmACJjAZAQvIZGgdsQmYgAm0TcAC0nb5OncmYAImMBkBC8hkaB2xCZiACbRNwALSdvk6dyZgAiYwGQELyGRoHbEJmIAJtE3AAtJ2+Tp3JmACJjAZAQvIZGgdsQmYgAm0TeD/AMEx2hQAAlnzAAAAAElFTkSuQmCC', 2, 'student', NULL, 'yes', '2023-05-08 11:41:11', '2023-05-30 12:40:02'),
(6, 2, NULL, 'John', 'Doe', 'Daddy', 'Canada USA', '2023-05-17', 'male', 'American', 'Single', '09912345678', 'Accenture', 'Developer', '0453-78565', 'Juan Dela cruz St. Canada City', 'Private', '5', 'c++', 'data:image/png;base64,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', NULL, 'professional', NULL, 'no', '2023-05-13 11:14:14', '2023-05-30 12:40:06'),
(7, NULL, 'sample@gmail.com', 'daadasd', 'asdasd', 'adasd', 'bato', '0020-11-07', 'female', 'Filipino', 'widowed', '09123456789', NULL, NULL, NULL, NULL, NULL, NULL, 'C++', 'data:image/png;base64,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', 4, 'student', '[\"Senior Citizen\"]', 'no', '2023-05-30 03:23:03', '2023-05-30 12:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `registration_date` datetime NOT NULL,
  `approved_date` datetime NOT NULL,
  `schedule` datetime NOT NULL,
  `exam_set` varchar(50) NOT NULL,
  `venue` varchar(250) NOT NULL,
  `status` int(1) NOT NULL,
  `exam_result` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`id`, `user_id`, `registration_date`, `approved_date`, `schedule`, `exam_set`, `venue`, `status`, `exam_result`, `timestamp`) VALUES
(1, 6, '2023-05-25 07:51:36', '2023-05-25 07:51:36', '2023-05-25 07:51:36', '1', 'wfdgdg', 1, 'passed', '2023-05-25 05:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `google_id` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `is_active` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `google_id`, `email`, `fname`, `lname`, `is_active`) VALUES
(1, 'sdsfsfd', 'dsad', 'asdad', 'asdads', 1),
(2, 'dads', 'adad', 'adasd', 'adad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `end_point` text NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_count`
--

CREATE TABLE `visitor_count` (
  `id` int(11) NOT NULL,
  `visitors` int(11) NOT NULL DEFAULT 0,
  `applicants` int(11) NOT NULL,
  `passers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitor_count`
--

INSERT INTO `visitor_count` (`id`, `visitors`, `applicants`, `passers`) VALUES
(1, 11, 500, 155);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_logs` (`admin_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `dict_admins`
--
ALTER TABLE `dict_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_history`
--
ALTER TABLE `failed_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_id` (`history_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `cat_id` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `reg_details`
--
ALTER TABLE `reg_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `exam_schedule_id` (`exam_schedule_id`);

--
-- Indexes for table `submitted_files`
--
ALTER TABLE `submitted_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tech4ed`
--
ALTER TABLE `tech4ed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tertiary_edu`
--
ALTER TABLE `tertiary_edu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `training_seminars`
--
ALTER TABLE `training_seminars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_login_id` (`user_login_id`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `visitor_count`
--
ALTER TABLE `visitor_count`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dict_admins`
--
ALTER TABLE `dict_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_history`
--
ALTER TABLE `failed_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reg_details`
--
ALTER TABLE `reg_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `submitted_files`
--
ALTER TABLE `submitted_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tech4ed`
--
ALTER TABLE `tech4ed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tertiary_edu`
--
ALTER TABLE `tertiary_edu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `training_seminars`
--
ALTER TABLE `training_seminars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor_count`
--
ALTER TABLE `visitor_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD CONSTRAINT `admin_logs` FOREIGN KEY (`admin_id`) REFERENCES `dict_admins` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `post_categories` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `announcements_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `dict_admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `dict_admins` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `calendar_ibfk_2` FOREIGN KEY (`category`) REFERENCES `post_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `failed_history`
--
ALTER TABLE `failed_history`
  ADD CONSTRAINT `failed_history_ibfk_1` FOREIGN KEY (`history_id`) REFERENCES `user_history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `dict_admins` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reg_details`
--
ALTER TABLE `reg_details`
  ADD CONSTRAINT `reg_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reg_details_ibfk_2` FOREIGN KEY (`exam_schedule_id`) REFERENCES `exam_schedules` (`id`);

--
-- Constraints for table `submitted_files`
--
ALTER TABLE `submitted_files`
  ADD CONSTRAINT `submitted_files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tertiary_edu`
--
ALTER TABLE `tertiary_edu`
  ADD CONSTRAINT `tertiary_edu_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_seminars`
--
ALTER TABLE `training_seminars`
  ADD CONSTRAINT `training_seminars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_data`
--
ALTER TABLE `users_data`
  ADD CONSTRAINT `users_data_ibfk_1` FOREIGN KEY (`user_login_id`) REFERENCES `user_login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `user_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
