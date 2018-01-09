-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2018 at 09:55 PM
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
(7, 'aaa', 'A', 'Aa', 'aaa', 'a');

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
(21, 'aaa', 'a', 'aa', 18, '11/11/1999');

--
-- Triggers `engineer`
--
DELIMITER $$
CREATE TRIGGER `before_delete_engineer` BEFORE DELETE ON `engineer` FOR EACH ROW BEGIN 
DELETE FROM has WHERE id=20;
DELETE FROM phone WHERE id=20;
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
(21, 'web');

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
(7, 'df', 11, '11/11/1999');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `phone` int(10) UNSIGNED NOT NULL,
  `id` int(60) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'aaaaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 'a', 'aaaaaaaaaaaa'),
(8, 'sad', '11/11/1999', 'sd', 'sds');

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
(9, 'web', '11');

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
  MODIFY `id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `software_field`
--
ALTER TABLE `software_field`
  MODIFY `id` int(60) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
