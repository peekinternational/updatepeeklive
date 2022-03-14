-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 07:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peekchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `archived_chats`
--

CREATE TABLE `archived_chats` (
  `id` int(11) NOT NULL,
  `message_group_id` varchar(255) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `archived_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'archive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat_friends`
--

CREATE TABLE `chat_friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_group_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_id` int(10) NOT NULL DEFAULT 0,
  `chatWithRefId` int(11) DEFAULT NULL,
  `updatedByMsg` timestamp NULL DEFAULT current_timestamp(),
  `message_status` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_friends`
--

INSERT INTO `chat_friends` (`id`, `sender_id`, `receiver_id`, `receiver_name`, `sender_name`, `sender_email`, `receiver_email`, `receiver_image`, `sender_image`, `product_name`, `message_group_id`, `message_id`, `chatWithRefId`, `updatedByMsg`, `message_status`, `created_at`, `updated_at`) VALUES
(1, 305, 0, '', 'Zee', '', '', '', '', '', '447508085', 0, NULL, '2021-08-17 08:19:14', 'unread', '2021-08-17 08:17:54', '2021-08-17 08:19:14'),
(2, 877, 0, '', 'Arslan', '', '', '', '', '', '2121014865', 0, NULL, '2021-08-17 08:27:46', 'unread', '2021-08-17 08:18:29', '2021-08-17 08:27:46'),
(3, 934, 0, '', 'test', '', '', '', '', '', '446227244', 0, NULL, '2021-08-18 03:18:24', 'unread', '2021-08-18 01:21:47', '2021-08-18 03:18:24'),
(4, 569, 0, '', 'tester', '', '', '', '', '', '931840992', 0, NULL, '2021-08-18 03:18:16', 'unread', '2021-08-18 01:24:53', '2021-08-18 03:18:16'),
(5, 120, 0, '', 'zeess', '', '', '', '', '', '1843051462', 0, NULL, '2021-09-01 02:50:44', 'unread', '2021-08-31 05:32:08', '2021-09-01 02:50:44'),
(6, 946, 0, '', 'zeeshan', '', '', '', '', '', '1951205098', 0, NULL, '2021-08-31 11:43:00', 'empty', '2021-08-31 06:43:00', '2021-08-31 06:43:00'),
(7, 679, 0, '', 'zeee', '', '', '', '', '', '2091309709', 0, NULL, '2021-09-01 05:18:32', 'unread', '2021-08-31 08:34:18', '2021-09-01 05:18:32'),
(8, 388, 0, '', 'tests', '', '', '', '', '', '241113428', 0, NULL, '2021-09-02 00:17:00', 'unread', '2021-09-01 00:27:40', '2021-09-02 00:17:00'),
(9, 924, 0, '', 'test data', '', '', '', '', '', '2022996148', 0, NULL, '2021-09-01 06:45:39', 'unread', '2021-09-01 06:05:43', '2021-09-01 06:45:39'),
(10, 622, 0, '', 'testing', '', '', '', '', '', '1482697807', 0, NULL, '2021-09-02 05:13:34', 'empty', '2021-09-02 00:13:34', '2021-09-02 00:13:34'),
(11, 225, 0, '', 'testUser', '', '', '', '', '', '1806885868', 0, NULL, '2021-09-03 01:04:10', 'unread', '2021-09-02 02:57:25', '2021-09-03 01:04:10'),
(12, 883, 0, '', 'test1', '', '', '', '', '', '1492428683', 0, NULL, '2021-09-02 03:17:25', 'unread', '2021-09-02 03:03:28', '2021-09-02 03:17:25'),
(13, 697, 0, '', 'test2', '', '', '', '', '', '336274660', 0, NULL, '2021-09-02 08:23:29', 'unread', '2021-09-02 05:28:42', '2021-09-02 08:23:29'),
(14, 677, 0, '', 'test4', '', '', '', '', '', '1298237802', 0, NULL, '2021-09-03 02:12:48', 'unread', '2021-09-03 00:23:48', '2021-09-03 02:12:48'),
(15, 655, 0, '', 'Test5', '', '', '', '', '', '1820087566', 0, NULL, '2021-09-03 02:15:18', 'unread', '2021-09-03 01:44:17', '2021-09-03 02:15:18'),
(16, 889, 0, '', 'tesst7', '', '', '', '', '', '1117767611', 0, NULL, '2021-09-03 05:23:22', 'unread', '2021-09-03 04:12:00', '2021-09-03 05:23:22'),
(17, 172, 0, '', 'test6', '', '', '', '', '', '166829457', 0, NULL, '2021-09-03 05:23:16', 'unread', '2021-09-03 04:12:09', '2021-09-03 05:23:16'),
(18, 700, 0, '', 'zee76', '', '', '', '', '', '1922226943', 0, NULL, '2021-09-06 05:12:33', 'empty', '2021-09-06 00:12:33', '2021-09-06 00:12:33'),
(19, 668, 0, '', 'test11', '', '', '', '', '', '1965773375', 14, NULL, '2021-09-07 07:30:27', 'unread', '2021-09-07 00:11:42', '2021-09-07 02:30:28'),
(20, 153, 0, '', 'test12', '', '', '', '', '', '1423808767', 13, NULL, '2021-09-07 07:01:18', 'unread', '2021-09-07 00:28:20', '2021-09-07 02:01:19'),
(21, 763, 0, '', 'zeeshan12', '', '', '', '', '', '125041217', 0, NULL, '2021-09-08 05:53:19', 'empty', '2021-09-08 00:53:19', '2021-09-08 00:53:19'),
(22, 825, 0, '', 'Zeeesss', '', '', '', '', '', '429976313', 0, NULL, '2021-09-08 12:17:36', 'empty', '2021-09-08 07:17:36', '2021-09-08 07:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_group` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_group_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chatType` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`message_id`, `sender_id`, `receiver_id`, `sender_name`, `receiver_name`, `is_group`, `group_id`, `message`, `file`, `message_type`, `message_group_id`, `commentId`, `chatType`, `is_deleted`, `file_type`, `message_status`, `sender_info`, `message_time`, `created_at`, `updated_at`) VALUES
(1, 20, 19, 'test12', 'test11', 0, 0, 'hy', NULL, '0', '1965773375', NULL, 0, 0, NULL, 'seen', NULL, '2021-9-7 11:3:43', '2021-09-07 01:03:43', '2021-09-08 00:55:04'),
(2, 19, 20, 'test11', 'test12', 0, 0, 'yes', NULL, '0', '1423808767', NULL, 0, 0, NULL, 'seen', NULL, '2021-9-7 11:3:49', '2021-09-07 01:03:49', '2021-09-08 00:56:32'),
(3, 19, 20, 'test11', 'test12', 0, 0, 'hi', NULL, '0', '1423808767', NULL, 0, 0, NULL, 'seen', NULL, '2021-9-7 11:4:13', '2021-09-07 01:04:13', '2021-09-08 00:56:32'),
(4, 20, 19, 'test12', 'test11', 0, 0, 'yes', NULL, '0', '1965773375', NULL, 0, 0, NULL, 'seen', NULL, '2021-9-7 11:6:29', '2021-09-07 01:06:29', '2021-09-08 00:55:04'),
(5, 19, 20, 'test11', 'test12', 0, 0, 'how', NULL, '0', '1423808767', NULL, 0, 0, NULL, 'seen', NULL, '2021-9-7 11:6:40', '2021-09-07 01:06:40', '2021-09-08 00:56:32'),
(6, 20, 19, 'test12', 'test11', 0, 0, NULL, '7 - Copy.jpg', '1', '1965773375', NULL, 0, 0, 'image', 'seen', NULL, '2021-9-7 11:6:51', '2021-09-07 01:06:52', '2021-09-08 00:55:04'),
(7, 20, 19, 'test12', 'test11', 0, 0, NULL, '6.jpg', '1', '1965773375', NULL, 0, 0, 'image', 'seen', NULL, '2021-9-7 11:8:36', '2021-09-07 01:08:36', '2021-09-08 00:55:04'),
(8, 20, 19, 'test12', 'test11', 0, 0, 's', NULL, '0', '1965773375', NULL, 0, 0, NULL, 'seen', NULL, '2021-9-7 11:8:49', '2021-09-07 01:08:49', '2021-09-08 00:55:04'),
(9, 19, 20, 'test11', 'test12', 0, 0, 'fdf', NULL, '0', '1423808767', NULL, 0, 0, NULL, 'seen', NULL, '2021-9-7 11:45:10', '2021-09-07 01:45:11', '2021-09-08 00:56:32'),
(10, 19, 20, 'test11', 'test12', 0, 0, NULL, '2.jpg', '1', '1423808767', NULL, 0, 0, 'image', 'seen', NULL, '2021-9-7 11:45:40', '2021-09-07 01:45:40', '2021-09-08 00:56:32'),
(11, 19, 20, 'test11', 'test12', 0, 0, NULL, 'laptop-user-1-1179329.png', '1', '1423808767', NULL, 0, 0, 'image', 'seen', NULL, NULL, '2021-09-07 01:47:32', '2021-09-08 00:56:32'),
(12, 19, 20, 'test11', 'test12', 0, 0, NULL, 'avatar-3637425_960_720.png', '1', '1423808767', NULL, 0, 0, 'image', 'seen', NULL, NULL, '2021-09-07 01:47:32', '2021-09-08 00:56:32'),
(13, 19, 20, 'test11', 'test12', 0, 0, NULL, 'card.png', '1', '1423808767', NULL, 0, 0, 'image', 'seen', NULL, '2021-9-7 12:1:18', '2021-09-07 02:01:19', '2021-09-08 00:56:32'),
(14, 20, 19, 'test12', 'test11', 0, 0, NULL, '4.png', '1', '1965773375', NULL, 0, 0, 'image', 'seen', NULL, '2021-9-7 12:30:27', '2021-09-07 02:30:28', '2021-09-08 00:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `chat_stars`
--

CREATE TABLE `chat_stars` (
  `id` int(11) NOT NULL,
  `message_group_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `friend_id` int(11) NOT NULL,
  `star_by` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delete_chats`
--

CREATE TABLE `delete_chats` (
  `id` int(11) NOT NULL,
  `message_group_id` varchar(255) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'delete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unread_chats`
--

CREATE TABLE `unread_chats` (
  `id` int(11) NOT NULL,
  `message_group_id` varchar(255) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `unread_by` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archived_chats`
--
ALTER TABLE `archived_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_friends`
--
ALTER TABLE `chat_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `chat_stars`
--
ALTER TABLE `chat_stars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delete_chats`
--
ALTER TABLE `delete_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unread_chats`
--
ALTER TABLE `unread_chats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archived_chats`
--
ALTER TABLE `archived_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_friends`
--
ALTER TABLE `chat_friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chat_stars`
--
ALTER TABLE `chat_stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delete_chats`
--
ALTER TABLE `delete_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unread_chats`
--
ALTER TABLE `unread_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
