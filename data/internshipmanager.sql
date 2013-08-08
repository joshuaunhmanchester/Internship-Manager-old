-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2013 at 04:54 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `internshipmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `website_url` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `name` (`name`,`city`,`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT IGNORE INTO `company` (`company_id`, `name`, `website_url`, `city`, `state`) VALUES
(1, 'SilverTech Inc.', 'silvertech.com', 'Manchester', 'NH'),
(2, 'Ektron', 'ektron.com', 'Nashua', 'NH'),
(3, 'Dyn Inc.', 'dyn.com', 'Manchester', 'NH');

-- --------------------------------------------------------

--
-- Table structure for table `getsingleposition`
--

DROP TABLE IF EXISTS `getsingleposition`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `internshipmanager`.`getsingleposition` AS select `s`.`first_name` AS `student_first_name`,`s`.`last_name` AS `student_last_name`,`s`.`email` AS `student_email`,`c`.`name` AS `company_name`,`c`.`website_url` AS `website_url`,`c`.`city` AS `company_city`,`c`.`state` AS `company_state`,`sv`.`first_name` AS `supervisor_first_name`,`sv`.`last_name` AS `supervisor_last_name`,`sv`.`email` AS `supervisor_email`,`sv`.`phone` AS `supervisor_phone`,`p`.`position_id` AS `position_id`,`p`.`position_title` AS `position_title`,`p`.`term` AS `term`,`p`.`year` AS `year`,`p`.`is_paid` AS `is_paid`,`p`.`est_hours_per_week` AS `est_hours_per_week` from (((`internshipmanager`.`position` `p` join `internshipmanager`.`student` `s` on((`p`.`fk_student_id` = `s`.`student_id`))) join `internshipmanager`.`company` `c` on((`p`.`fk_company_id` = `c`.`company_id`))) join `internshipmanager`.`supervisor` `sv` on((`p`.`fk_supervisor_id` = `sv`.`supervisor_id`)));

--
-- Dumping data for table `getsingleposition`
--

INSERT IGNORE INTO `getsingleposition` (`student_first_name`, `student_last_name`, `student_email`, `company_name`, `website_url`, `company_city`, `company_state`, `supervisor_first_name`, `supervisor_last_name`, `supervisor_email`, `supervisor_phone`, `position_id`, `position_title`, `term`, `year`, `is_paid`, `est_hours_per_week`) VALUES
('Mark', 'Zappala', 'mzappala@email.com', 'Dyn Inc.', 'dyn.com', 'Manchester', 'NH', 'Smithson', 'Mr. Dyn', 'mrdyn@dyn.com', '6035565444', 1, 'Software Engineer Intern', 'Fall', '2013', '', '15'),
('Joshua', 'Anderson', 'joshua.anderson@silvertech.com', 'SilverTech Inc.', 'silvertech.com', 'Manchester', 'NH', 'Smith', 'Jason', 'jsmith@email.com', '5644445566', 2, 'Web Design Intern', 'Fall', '2013', '', '15'),
('Joe', 'Anderson', 'joe.anderson@email.com', 'Ektron', 'ektron.com', 'Nashua', 'NH', 'Smithson', 'Mr. Dyn', 'mrdyn@dyn.com', '6035565444', 3, 'Web Design Intern', 'Fall', '2013', '', '10');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_title` varchar(100) NOT NULL,
  `term` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `fk_student_id` int(11) NOT NULL,
  `fk_company_id` int(11) NOT NULL,
  `fk_supervisor_id` int(11) NOT NULL,
  `is_paid` bit(1) DEFAULT NULL,
  `est_hours_per_week` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`position_id`),
  UNIQUE KEY `term` (`term`,`year`,`fk_student_id`),
  KEY `fk_student_id` (`fk_student_id`),
  KEY `fk_company_id` (`fk_company_id`),
  KEY `fk_supervisor_id` (`fk_supervisor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `position`
--

INSERT IGNORE INTO `position` (`position_id`, `position_title`, `term`, `year`, `fk_student_id`, `fk_company_id`, `fk_supervisor_id`, `is_paid`, `est_hours_per_week`) VALUES
(1, 'Software Engineer Intern', 'Fall', '2013', 9, 3, 2, '', '15'),
(2, 'Web Design Intern', 'Fall', '2013', 1, 1, 1, '', '15'),
(3, 'Web Design Intern', 'Fall', '2013', 3, 2, 2, '', '10');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `student`
--

INSERT IGNORE INTO `student` (`student_id`, `last_name`, `first_name`, `email`) VALUES
(1, 'Anderson', 'Joshua', 'joshua.anderson@silvertech.com'),
(2, 'Zappala', 'Jessica', 'jnu45@wildcats.edu'),
(3, 'Anderson', 'Joe', 'joe.anderson@email.com'),
(5, 'Brown', 'Jay', 'jsa@email.com'),
(6, 'Test Last Name', 'Test Name', 'testemail@email.com'),
(7, '"Test"', 'Joshua', 'joshua.a@silvertech.com'),
(8, '"Test"', 'Another', 'anothertest@email.com'),
(9, 'Zappala', 'Mark', 'mzappala@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
CREATE TABLE `supervisor` (
  `supervisor_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `fk_company_id` int(11) NOT NULL,
  PRIMARY KEY (`supervisor_id`),
  UNIQUE KEY `last_name` (`last_name`,`first_name`,`email`,`fk_company_id`),
  KEY `fk_company_id` (`fk_company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supervisor`
--

INSERT IGNORE INTO `supervisor` (`supervisor_id`, `last_name`, `first_name`, `email`, `phone`, `fk_company_id`) VALUES
(1, 'Jason', 'Smith', 'jsmith@email.com', '5644445566', 2),
(2, 'Mr. Dyn', 'Smithson', 'mrdyn@dyn.com', '6035565444', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`fk_student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`fk_company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `position_ibfk_3` FOREIGN KEY (`fk_supervisor_id`) REFERENCES `supervisor` (`supervisor_id`) ON DELETE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`fk_company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE;
