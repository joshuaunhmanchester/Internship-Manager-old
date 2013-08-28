-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2013 at 08:50 PM
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
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
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

INSERT INTO `student` (`student_id`, `last_name`, `first_name`, `email`) VALUES
(1, 'Anderson', 'Joshua', 'joshua.anderson@silvertech.com'),
(2, 'Zappala', 'Jessica', 'jnu45@wildcats.edu'),
(3, 'Anderson', 'Joe', 'joe.anderson@email.com'),
(5, 'Brown', 'Jay', 'jsa@email.com'),
(6, 'Test Last Name', 'Test Name', 'testemail@email.com'),
(7, '"Test"', 'Joshua', 'joshua.a@silvertech.com'),
(8, '"Test"', 'Another', 'anothertest@email.com'),
(9, 'Zappala', 'Mark', 'mzappala@email.com');
