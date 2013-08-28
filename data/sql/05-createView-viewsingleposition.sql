-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2013 at 08:53 PM
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
-- Stand-in structure for view `getsingleposition`
--
DROP VIEW IF EXISTS `getsingleposition`;
CREATE TABLE IF NOT EXISTS `getsingleposition` (
`student_first_name` varchar(100)
,`student_last_name` varchar(100)
,`student_email` varchar(150)
,`company_name` varchar(100)
,`website_url` varchar(100)
,`company_city` varchar(100)
,`company_state` varchar(50)
,`supervisor_first_name` varchar(100)
,`supervisor_last_name` varchar(100)
,`supervisor_email` varchar(150)
,`supervisor_phone` varchar(11)
,`position_id` int(11)
,`position_title` varchar(100)
,`term` varchar(50)
,`year` varchar(50)
,`is_paid` bit(1)
,`est_hours_per_week` varchar(50)
);
-- --------------------------------------------------------

--
-- Structure for view `getsingleposition`
--
DROP TABLE IF EXISTS `getsingleposition`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getsingleposition` AS select `s`.`first_name` AS `student_first_name`,`s`.`last_name` AS `student_last_name`,`s`.`email` AS `student_email`,`c`.`name` AS `company_name`,`c`.`website_url` AS `website_url`,`c`.`city` AS `company_city`,`c`.`state` AS `company_state`,`sv`.`first_name` AS `supervisor_first_name`,`sv`.`last_name` AS `supervisor_last_name`,`sv`.`email` AS `supervisor_email`,`sv`.`phone` AS `supervisor_phone`,`p`.`position_id` AS `position_id`,`p`.`position_title` AS `position_title`,`p`.`term` AS `term`,`p`.`year` AS `year`,`p`.`is_paid` AS `is_paid`,`p`.`est_hours_per_week` AS `est_hours_per_week` from (((`position` `p` join `student` `s` on((`p`.`fk_student_id` = `s`.`student_id`))) join `company` `c` on((`p`.`fk_company_id` = `c`.`company_id`))) join `supervisor` `sv` on((`p`.`fk_supervisor_id` = `sv`.`supervisor_id`)));
