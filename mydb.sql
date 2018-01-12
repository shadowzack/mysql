-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2018 at 11:24 PM
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
  `project_id` int(60) UNSIGNED NOT NULL,
  `tests` varchar(30) DEFAULT NULL,
  `design` varchar(100) DEFAULT NULL,
  `con_management` varchar(60) DEFAULT NULL,
  `requirements` varchar(60) DEFAULT NULL,
  `coding` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `development_stages`
--

INSERT INTO `development_stages` (`project_id`, `tests`, `design`, `con_management`, `requirements`, `coding`) VALUES
(1, 'visual', 'mvc', 'git', 'server side', 'c'),
(2, 'vsiual', 'oop', 'git', 'server clinet', 'php mysl'),
(3, 'code blocks', 'oop', 'git bash', 'linux', 'c,c++'),
(4, 'vs code', 'mvc', 'srver echo', 'linux', 'php'),
(5, 'eclipse', 'play framework', 'git', 'scala', 'scala java'),
(6, 'xcode', 'nfc', 'github', 'nfc compatible', 'swift java'),
(7, 'street of curse', 'sensor api', 'git lib', 'sensor machine learing', 'any'),
(8, 'atom', 'mvc', 'git hub', 'server clint', 'php mysql '),
(9, 'visual', 'mvc', 'git lib phmyadmin', 'storage server', 'php mysql'),
(10, 'no test ', 'unix bsd', 'command', 'unix knoledge', 'c');

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
  `project_id` int(60) UNSIGNED NOT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `budget` int(100) DEFAULT NULL,
  `datee` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`project_id`, `product_name`, `budget`, `datee`) VALUES
(1, 'pp', 200000, '12/12/1999'),
(2, 'produ', 5220, '04/05/2001'),
(3, 'straming', 5515521, '12/12/1997'),
(4, 'ech srveer', 53456, '02/22/2005'),
(5, 'java', 252515, '01/04/1988'),
(6, 'wirless', 56454, '04/06/2007'),
(7, 'auto driveing', 4531, '12/08/2013'),
(8, 'social', 521111, '05/07/2009'),
(9, 'drive onlie ', 400000, '12/09/2001'),
(10, 'x linux', 1, '01/15/2018');

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
(5, 1, 3),
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
  ADD PRIMARY KEY (`project_id`);

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
  ADD PRIMARY KEY (`project_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

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
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`project_id`,`engineer_id`),
  ADD KEY `Constr_engineer_project_engineer_id_fk` (`engineer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `engineer`
--
ALTER TABLE `engineer`
  MODIFY `id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `development_stages`
--
ALTER TABLE `development_stages`
  ADD CONSTRAINT `development_stages_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`id`) REFERENCES `engineer` (`id`),
  ADD CONSTRAINT `has_ibfk_2` FOREIGN KEY (`field_name`) REFERENCES `software_field` (`field_name`);

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
