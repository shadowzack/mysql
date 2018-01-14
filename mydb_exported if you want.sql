-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 05:21 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `development_stages`
--

CREATE TABLE `development_stages` (
  `id` int(60) UNSIGNED NOT NULL,
  `project_id` int(60) UNSIGNED DEFAULT NULL,
  `stage_name` varchar(30) DEFAULT NULL,
  `tool_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `development_stages`
--

INSERT INTO `development_stages` (`id`, `project_id`, `stage_name`, `tool_name`) VALUES
(1, 1, 'tests', 'lint'),
(2, 1, 'unit_testing', 'junit'),
(3, 1, 'design', 'client side'),
(4, 1, 'con_management', 'Github'),
(5, 1, 'requirements', 'doors'),
(6, 1, 'coding', 'eclipse'),
(7, 1, 'tests', 'jira'),
(8, 1, 'unit_testing', 'unit'),
(9, 1, 'design', 'server side'),
(10, 1, 'coding', 'intellgie'),
(11, 1, 'tests', 'Asana'),
(12, 2, 'tests', 'klocwork'),
(13, 2, 'unit_testing', 'junit'),
(14, 2, 'design', 'linux'),
(15, 2, 'con_management', 'jira'),
(16, 2, 'requirements', 'Machine learning'),
(17, 2, 'coding', 'visual'),
(18, 2, 'coding', 'c'),
(19, 2, 'unit_testing', 'nunit');

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE `engineer` (
  `id` int(60) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `addresss` varchar(50) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `birthdate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engineer`
--

INSERT INTO `engineer` (`id`, `firstname`, `lastname`, `addresss`, `age`, `birthdate`) VALUES
(1, 'mahmod', 'hasan', 'haifa', 20, '06/19/1997'),
(2, 'avi', 'ytsak', 'tel-aviv', 27, '12/12/1990'),
(3, 'jolyana', 'bder', 'tira', 24, '12/11/1993'),
(4, 'mechal', 'lorn', 'hdera', 31, '05/22/1986'),
(5, 'omer', 'peli', 'haifa', 23, '01/24/1994'),
(6, 'mohamd', 'amer', 'nazerah', 25, '03/06/1992'),
(7, 'ytask', 'merkav', 'htzfon', 21, '06/06/1996'),
(8, 'yoni', 'rbin', 'nharya', 18, '03/07/1999'),
(9, 'ahmad', 'mhamid', 'kfar kra', 24, '10/22/1993'),
(10, 'david', 'jack', 'hertslya', 29, '02/19/1988');

--
-- Triggers `engineer`
--
DELIMITER $$
CREATE TRIGGER `before_delete_engineer` BEFORE DELETE ON `engineer` FOR EACH ROW BEGIN 
DELETE FROM has WHERE id=10;
DELETE FROM phone WHERE id=10;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `has`
--

CREATE TABLE `has` (
  `id` int(60) UNSIGNED NOT NULL,
  `field_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `has`
--

INSERT INTO `has` (`id`, `field_name`) VALUES
(1, 'client side'),
(2, 'client side'),
(3, 'data base mangment'),
(5, 'fullstack'),
(7, 'meanstack'),
(4, 'moblie'),
(8, 'moblie'),
(6, 'server side'),
(9, 'unix'),
(10, 'unix kernel');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(11) UNSIGNED NOT NULL,
  `project_id` int(60) UNSIGNED DEFAULT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `budget` int(100) DEFAULT NULL,
  `datee` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `project_id`, `product_name`, `budget`, `datee`) VALUES
(1, 1, 'first', 200000, '12/12/1999'),
(2, 2, 'produ', 5220, '04/05/2001'),
(3, 3, 'straming', 5515521, '12/12/1997'),
(4, 4, 'ech srveer', 53456, '02/22/2005'),
(5, 5, 'java', 252515, '01/04/1988'),
(6, 6, 'wirless', 56454, '04/06/2007'),
(7, 7, 'auto driveing', 4531, '12/08/2013'),
(8, 8, 'social', 521111, '05/07/2009'),
(9, 9, 'drive onlie ', 400000, '12/09/2001'),
(10, 10, 'x linux', 1, '01/15/2018'),
(11, 1, 'second', 2000000, '11/19/2012');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `phone` int(10) UNSIGNED NOT NULL,
  `id` int(60) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`phone`, `id`) VALUES
(75867857, 1),
(972456945, 1),
(4294967295, 1),
(665546, 2),
(5478567, 2),
(4526456, 4),
(47475, 5),
(5464785, 6),
(4757486, 7),
(424536465, 8),
(7578, 10),
(7865787, 10),
(475647567, 10);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(60) UNSIGNED NOT NULL,
  `project_name` varchar(30) DEFAULT NULL,
  `starting_time` varchar(20) DEFAULT NULL,
  `customer_name` varchar(40) DEFAULT NULL,
  `taoor` varchar(260) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `starting_time`, `customer_name`, `taoor`) VALUES
(1, 'web os', '11/11/2000', 'yoni', 'web opreation system'),
(2, 'virtual one', '12/05/2005', 'noamn', 'windows virtual os'),
(3, 'x stramer', '03/12/2007', 'amer', 'online stramer for web aplications'),
(4, 'draw 3d', '11/05/2001', 'mohamd', 'drawing 3d objects'),
(5, 'controlless', '12/22/2004', 'tmir', 'conrtol planes wirlessly'),
(6, 'charge free', '02/22/1999', 'moamin', 'wirless charging'),
(7, 'hands free', '05/06/2009', 'omar', 'autonomis driving'),
(8, 'live', '05/05/2013', 'mahmod', 'social media with every thing live'),
(9, 'mega drive', '06/06/1999', 'keli', 'cloud storage sulition'),
(10, 'linux x', '08/08/2018', 'mahmod hasan', 'Linux destro our final project');

-- --------------------------------------------------------

--
-- Table structure for table `software_field`
--

CREATE TABLE `software_field` (
  `id` int(60) UNSIGNED NOT NULL,
  `field_name` varchar(30) NOT NULL,
  `expertise` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_field`
--

INSERT INTO `software_field` (`id`, `field_name`, `expertise`) VALUES
(1, 'web', 'low'),
(2, 'unix', 'low'),
(3, 'fullstack', 'hight'),
(4, 'meanstack', 'low'),
(5, 'unix kernel', 'very hieght'),
(6, 'server side', 'low'),
(7, 'client side', 'hight'),
(8, 'windows server', 'maduim'),
(9, 'moblie', 'student'),
(10, 'data base mangment', 'height');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(60) UNSIGNED NOT NULL,
  `stage_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `stage_name`) VALUES
(6, 'coding'),
(4, 'con_management'),
(3, 'design'),
(5, 'requirements'),
(1, 'tests'),
(2, 'unit_testing');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(60) UNSIGNED NOT NULL,
  `tool_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `tool_name`) VALUES
(24, 'Asana'),
(41, 'c'),
(45, 'client side'),
(35, 'codeblocks'),
(31, 'doors'),
(34, 'eclipse'),
(23, 'Github'),
(36, 'intellgie'),
(32, 'jira'),
(30, 'junit'),
(39, 'klocwork'),
(40, 'lint'),
(43, 'linux'),
(28, 'Machine learning'),
(37, 'nunit'),
(38, 'quality center'),
(44, 'server side'),
(25, 'Swift'),
(47, 'ui'),
(29, 'unit'),
(42, 'unix'),
(46, 'ux'),
(33, 'visual');

--
-- Triggers `tools`
--
DELIMITER $$
CREATE TRIGGER `before_delete_tool` BEFORE DELETE ON `tools` FOR EACH ROW BEGIN 
DELETE FROM development_stages WHERE tool_name='cccccccccccccccccccccccccccccc';

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `project_id` int(60) UNSIGNED NOT NULL,
  `engineer_id` int(60) UNSIGNED NOT NULL,
  `grade` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`project_id`, `engineer_id`, `grade`) VALUES
(1, 1, 7),
(1, 2, 1),
(1, 5, 4),
(2, 1, 5),
(2, 4, 2),
(2, 10, 5),
(3, 1, 3),
(3, 4, 1),
(3, 8, 5),
(3, 9, 5),
(3, 10, 8),
(4, 1, 1),
(4, 5, 5),
(4, 7, 5),
(5, 1, 6),
(5, 7, 5),
(6, 1, 5),
(6, 4, 2),
(7, 1, 5),
(7, 3, 5),
(8, 1, 6),
(8, 3, 4),
(8, 5, 4),
(8, 6, 4),
(8, 8, 7),
(8, 9, 8),
(9, 1, 5),
(10, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `development_stages`
--
ALTER TABLE `development_stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stage_name` (`stage_name`),
  ADD KEY `tool_name` (`tool_name`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `engineer`
--
ALTER TABLE `engineer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_name` (`field_name`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phone`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `software_field`
--
ALTER TABLE `software_field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `field_name` (`field_name`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stage_name` (`stage_name`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tool_name` (`tool_name`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`project_id`,`engineer_id`),
  ADD KEY `Constr_engineer_project_engineer_id_fk` (`engineer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `development_stages`
--
ALTER TABLE `development_stages`
  MODIFY `id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `engineer`
--
ALTER TABLE `engineer`
  MODIFY `id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `software_field`
--
ALTER TABLE `software_field`
  MODIFY `id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `development_stages`
--
ALTER TABLE `development_stages`
  ADD CONSTRAINT `development_stages_ibfk_1` FOREIGN KEY (`stage_name`) REFERENCES `stages` (`stage_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `development_stages_ibfk_2` FOREIGN KEY (`tool_name`) REFERENCES `tools` (`tool_name`),
  ADD CONSTRAINT `development_stages_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE;

--
-- Constraints for table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`id`) REFERENCES `engineer` (`id`),
  ADD CONSTRAINT `has_ibfk_2` FOREIGN KEY (`field_name`) REFERENCES `software_field` (`field_name`) ON UPDATE CASCADE;

--
-- Constraints for table `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestones_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`id`) REFERENCES `engineer` (`id`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `Constr_engineer_project_engineer_id_fk` FOREIGN KEY (`engineer_id`) REFERENCES `engineer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Constr_engineer_works_project_id_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
