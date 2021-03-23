-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 10:41 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcp_user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `ans_to_q_id` int(11) NOT NULL,
  `author_mcp_id` int(11) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `author_mcp_id` int(11) NOT NULL,
  `owner_mcp_id` int(11) DEFAULT NULL COMMENT 'mcp_id of owner organization',
  `title` text COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `tags` text COLLATE utf8_bin NOT NULL COMMENT 'comma is delimmeter',
  `theme` varchar(255) COLLATE utf8_bin NOT NULL,
  `location` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'city'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_mcp_id` varchar(12) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `mcp_employee`
--

CREATE TABLE `mcp_employee` (
  `mcp_id` int(11) NOT NULL,
  `employed_by_ua` varchar(12) COLLATE utf8_bin NOT NULL,
  `reg_mob_num` varchar(10) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `employee_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `designation` varchar(255) COLLATE utf8_bin NOT NULL,
  `employee_id` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `mcp_member`
--

CREATE TABLE `mcp_member` (
  `mcp_id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'md5',
  `member` varchar(12) COLLATE utf8_bin NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mcp_member`
--

INSERT INTO `mcp_member` (`mcp_id`, `password`, `member`, `create_time`) VALUES
(1, 'iammsme', '123456123456', '2019-03-03 02:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `mcp_organization`
--

CREATE TABLE `mcp_organization` (
  `mcp_id` int(11) NOT NULL,
  `organization_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `udyog_aadhaar` varchar(12) COLLATE utf8_bin NOT NULL,
  `signatory_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `signatory_mob_num` varchar(10) COLLATE utf8_bin NOT NULL,
  `signatory_aadhaar` varchar(12) COLLATE utf8_bin NOT NULL,
  `major_activity` varchar(255) COLLATE utf8_bin NOT NULL,
  `organization_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `emp_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mcp_organization`
--

INSERT INTO `mcp_organization` (`mcp_id`, `organization_name`, `udyog_aadhaar`, `signatory_name`, `signatory_mob_num`, `signatory_aadhaar`, `major_activity`, `organization_type`, `emp_count`) VALUES
(1, 'Ambika Enterprise', '123456123456', 'Harshit Jaiswal', '8519046205', '654321654321', 'Manufacturer', 'Private Limited', 9);

-- --------------------------------------------------------

--
-- Table structure for table `mcp_post`
--

CREATE TABLE `mcp_post` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `assigned_to` int(11) NOT NULL COMMENT 'article_id or question id or answer id',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_mcp_id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL COMMENT 'question',
  `context` text COLLATE utf8_bin NOT NULL COMMENT 'some detail or reference or link about question',
  `tags` text COLLATE utf8_bin NOT NULL COMMENT 'comma as delimmiter',
  `location` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'city'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `registered_employee`
--

CREATE TABLE `registered_employee` (
  `reg_mob_num` varchar(10) COLLATE utf8_bin NOT NULL,
  `employed_by_ua` varchar(12) COLLATE utf8_bin NOT NULL,
  `employee_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `change_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `registered_employee`
--

INSERT INTO `registered_employee` (`reg_mob_num`, `employed_by_ua`, `employee_id`, `change_emp`) VALUES
('', '1', '', 0),
('0123456789', '1', '', 0),
('1111122222', '1', '', 0),
('1234567890', '1', '', 0),
('4545451212', '1', '', 0),
('7845259632', '1', '', 0),
('7848182536', '1', '', 0),
('7894561230', '1', '', 0),
('8519046205', '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_organization`
--

CREATE TABLE `registered_organization` (
  `udyog_aadhaar` varchar(12) COLLATE utf8_bin NOT NULL,
  `organization_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `signatory_aadhaar` varchar(12) COLLATE utf8_bin NOT NULL,
  `signatory_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `signatory_mob_num` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This Dataset is assumed to be provided by Ministry of MSME';

--
-- Dumping data for table `registered_organization`
--

INSERT INTO `registered_organization` (`udyog_aadhaar`, `organization_name`, `signatory_aadhaar`, `signatory_name`, `signatory_mob_num`) VALUES
('123456123456', 'Ambika Enterprise', '654321654321', 'Harshit Jaiswal', '8519046205');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `mcp_employee`
--
ALTER TABLE `mcp_employee`
  ADD PRIMARY KEY (`mcp_id`);

--
-- Indexes for table `mcp_member`
--
ALTER TABLE `mcp_member`
  ADD PRIMARY KEY (`mcp_id`);

--
-- Indexes for table `mcp_organization`
--
ALTER TABLE `mcp_organization`
  ADD PRIMARY KEY (`mcp_id`);

--
-- Indexes for table `mcp_post`
--
ALTER TABLE `mcp_post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `assigned_to` (`assigned_to`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `registered_employee`
--
ALTER TABLE `registered_employee`
  ADD PRIMARY KEY (`reg_mob_num`);

--
-- Indexes for table `registered_organization`
--
ALTER TABLE `registered_organization`
  ADD PRIMARY KEY (`udyog_aadhaar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcp_member`
--
ALTER TABLE `mcp_member`
  MODIFY `mcp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mcp_post`
--
ALTER TABLE `mcp_post`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
