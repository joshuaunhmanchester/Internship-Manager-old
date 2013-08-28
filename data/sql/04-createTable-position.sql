-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2013 at 08:52 PM
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
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `term`, `year`, `fk_student_id`, `fk_company_id`, `fk_supervisor_id`, `is_paid`, `est_hours_per_week`) VALUES
(1, 'Software Engineer Intern', 'Fall', '2013', 9, 3, 2, '', '15'),
(2, 'Web Design Intern', 'Fall', '2013', 1, 1, 1, '', '15'),
(3, 'Web Design Intern', 'Fall', '2013', 3, 2, 2, '', '10');

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
