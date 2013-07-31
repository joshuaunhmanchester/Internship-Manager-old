-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2013 at 04:39 PM
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

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `website_url` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `name` (`name`,`city`,`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `website_url`, `city`, `state`) VALUES
(1, 'SilverTech Inc.', 'silvertech.com', 'Manchester', 'NH');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `position`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `last_name`, `first_name`, `email`) VALUES
(1, 'Anderson', 'Joshua', 'joshua.anderson@silvertech.com'),
(2, 'Zappala', 'Jessica', 'jnu45@wildcats.edu'),
(3, 'Anderson', 'Joe', 'joe.anderson@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE IF NOT EXISTS `supervisor` (
  `supervisor_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `fk_company_id` int(11) NOT NULL,
  PRIMARY KEY (`supervisor_id`),
  UNIQUE KEY `last_name` (`last_name`,`first_name`,`email`,`fk_company_id`),
  KEY `fk_company_id` (`fk_company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `supervisor`
--


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
