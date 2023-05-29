-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 03:18 AM
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
(6, 6, 'Region 5', 'Camarines Sur', 'Naga', 'Sta Cruz');

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
(1, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-24 08:22:04'),
(2, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-25 00:50:26'),
(3, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-25 05:53:27'),
(4, 2, 'Logged In', 'http://localhost:8000/livewire/message/admin.login', '2023-05-29 00:56:09');

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
(44, 2, 1, 'sdssd', 'hfhgfh', '<p>adsadasdd</p>\n', 'Anonymous', 1, '2023-05-02 13:50:50', '2023-05-03 00:00:47', '2023-05-24 08:39:19'),
(49, 2, 2, 'zxc', 'asdasdsad', '<p>asdadsd</p>\n', 'John Doe', 1, '2023-05-04 16:36:21', '2023-05-23 01:30:42', '2023-05-24 08:41:18');

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
(3, 'Wifi4All');

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
(4, 6, NULL, '2023-05-13 17:19:02', NULL, 5, 0);

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
(8, 4, 'sdsfsdfsd_psa_2305081683546071.png', 'Image', 'psa');

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
(4, 4, 'sfdsfsdf', 'sdfsdfs', '2');

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
(7, 6, 'Python', 'DICT R-5', '128');

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
  `date_accomplish` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `user_login_id`, `email`, `fname`, `lname`, `mname`, `place_of_birth`, `date_of_birth`, `gender`, `citizenship`, `civil_status`, `contact_number`, `present_office`, `designation`, `telephone_number`, `office_address`, `office_category`, `no_of_years_in_pos`, `programming_langs`, `e_sign`, `year_level`, `current_status`, `add_info`, `date_accomplish`, `timestamp`) VALUES
(4, 1, NULL, 'JC', 'sdsfsdfsd', 'fsfsdf', 'fsfsfsd', '2023-05-23', 'female', 'fsdfsdf', 'single', '09078522583', '', '', '0', '', '', '', 'c++', 'data:image/png;base64,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', 2, 'student', NULL, '2023-05-08 11:41:11', '2023-05-08 11:41:11'),
(6, 2, NULL, 'John', 'Doe', 'Daddy', 'Canada USA', '2023-05-17', 'male', 'American', 'Single', '09912345678', 'Accenture', 'Developer', '0453-78565', 'Juan Dela cruz St. Canada City', 'Private', '5', 'c++', 'data:image/png;base64,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', NULL, 'professional', NULL, '2023-05-13 11:14:14', '2023-05-13 09:16:51');

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
(1, 6, '2023-05-25 07:51:36', '2023-05-25 07:51:36', '2023-05-25 07:51:36', '1', 'wfdgdg', 1, 'passed', '2023-05-25 05:52:24'),
(2, 4, '2023-05-25 07:51:36', '2023-05-25 07:51:36', '2023-05-25 07:51:36', '2', 'sdfsfsfd', 2, 'passed', '2023-06-20 05:51:37');

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
(1, 7, 500, 155);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tertiary_edu`
--
ALTER TABLE `tertiary_edu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `training_seminars`
--
ALTER TABLE `training_seminars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `failed_history_ibfk_1` FOREIGN KEY (`history_id`) REFERENCES `failed_history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
