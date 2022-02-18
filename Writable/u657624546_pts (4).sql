-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 09:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u657624546_pts`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE `accesslevel` (
  `accessID` int(11) NOT NULL,
  `accessType` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`accessID`, `accessType`, `description`) VALUES
(1, 'Enrolled Learner', 'A Learner who has paid the course'),
(2, 'Pending Enrollment', 'A Learner who has not paid the course'),
(3, 'Cancel Enrollment', 'A Learner who does not want to continue the course');

-- --------------------------------------------------------

--
-- Table structure for table `actiontype`
--

CREATE TABLE `actiontype` (
  `actionID` int(11) NOT NULL,
  `actionType` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actiontype`
--

INSERT INTO `actiontype` (`actionID`, `actionType`) VALUES
(1, 'Click Button'),
(2, 'Login'),
(3, 'Logout'),
(4, 'Enrolled Class'),
(5, 'Attended Class');

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `auditID` int(11) NOT NULL,
  `logs` char(64) DEFAULT NULL,
  `tableName` char(64) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `actionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`auditID`, `logs`, `tableName`, `userID`, `actionID`) VALUES
(158, 'With IP: ::1<15/02/2022>= User has successfuly viewed the landin', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(159, 'With IP: ::1<15/02/2022>= User has successfuly viewed the landin', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(160, 'With IP: ::1<15/02/2022>= User has successfuly viewed the landin', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(161, 'With IP: ::1<15/02/2022>= User has successfuly viewed the landin', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(162, 'With IP: ::1<15/02/2022>= User has successfuly viewed the userpr', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(163, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(164, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(165, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(166, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(167, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(168, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(169, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(170, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(171, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(172, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(173, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(174, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(175, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(176, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(177, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(178, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(179, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(180, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(181, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(182, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(183, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(184, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(185, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(186, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(187, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(188, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(189, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(190, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(191, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(192, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(193, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(194, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(195, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(196, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(197, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(198, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(199, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(200, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(201, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(202, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(203, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(204, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(205, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(206, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(207, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(208, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(209, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(210, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(211, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(212, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(213, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(214, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(215, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(216, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(217, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(218, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(219, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(220, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(221, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(222, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(223, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(224, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(225, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(226, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(227, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(228, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(229, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(230, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(231, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(232, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(233, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(234, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(235, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(236, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(237, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(238, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(239, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(240, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(241, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(242, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(243, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(244, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(245, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(246, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(247, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(248, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(249, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(250, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(251, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(252, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(253, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(254, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(255, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(256, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(257, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(258, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(259, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(260, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(261, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(262, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(263, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(264, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(265, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(266, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(267, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(268, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(269, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(270, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(271, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(272, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(273, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(274, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(275, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(276, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(277, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(278, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(279, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(280, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(281, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(282, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(283, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(284, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(285, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(286, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(287, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(288, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(289, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(290, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(291, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(292, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(293, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(294, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(295, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(296, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(297, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(298, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(299, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(300, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(301, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(302, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(303, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(304, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(305, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(306, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(307, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(308, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(309, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(310, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(311, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(312, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(313, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(314, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(315, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(316, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(317, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(318, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(319, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(320, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(321, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(322, 'With IP: ::1<15/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(323, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(324, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(325, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(326, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(327, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(328, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(329, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(330, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(331, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(332, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(333, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(334, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(335, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(336, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(337, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(338, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(339, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(340, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(341, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(342, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(343, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(344, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(345, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(346, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(347, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(348, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(349, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(350, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(351, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(352, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(353, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(354, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(355, 'With IP: ::1<17/02/2022>= User has started Class Creation', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(356, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', '45jso3ljk90cmka3tdhh139ns0', 71, 2),
(357, 'With IP: ::1<17/02/2022>= User logouted of the system', '45jso3ljk90cmka3tdhh139ns0', 71, 3),
(358, 'With IP: ::1<17/02/2022>= user has login', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(359, 'With IP: ::1<17/02/2022>= user has passed 2fa', '8gfg19kqkb19pm23sloc38etb2', 72, 1),
(360, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(361, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(362, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(363, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(364, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(365, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(366, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(367, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(368, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(369, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(370, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(371, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(372, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(373, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(374, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(375, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(376, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(377, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(378, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(379, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(380, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(381, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(382, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(383, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(384, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(385, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(386, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(387, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(388, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(389, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(390, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(391, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(392, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(393, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(394, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(395, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(396, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(397, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(398, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(399, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(400, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(401, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(402, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(403, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(404, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(405, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(406, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(407, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(408, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(409, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(410, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(411, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(412, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(413, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(414, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(415, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(416, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(417, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(418, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(419, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(420, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(421, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(422, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(423, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(424, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(425, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(426, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(427, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(428, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(429, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(430, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(431, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(432, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(433, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(434, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(435, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(436, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(437, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(438, 'With IP: ::1<17/02/2022>= user has login', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(439, 'With IP: ::1<17/02/2022>= user has passed 2fa', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 1),
(440, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(441, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(442, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(443, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(444, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(445, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(446, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(447, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(448, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(449, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(450, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(451, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(452, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(453, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(454, 'With IP: ::1<17/02/2022>= User has visited AccountManagement', 'aibn3hmc2jgr3nf016b9vnm6kb', 71, 2),
(455, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(456, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(457, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(458, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(459, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(460, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(461, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(462, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(463, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(464, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(465, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(466, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(467, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(468, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(469, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(470, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(471, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(472, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(473, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(474, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(475, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(476, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(477, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(478, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(479, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(480, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(481, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(482, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(483, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(484, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(485, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(486, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(487, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(488, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(489, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(490, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(491, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(492, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(493, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(494, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(495, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(496, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(497, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(498, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(499, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(500, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(501, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(502, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(503, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(504, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(505, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(506, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(507, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(508, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(509, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(510, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(511, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(512, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(513, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(514, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(515, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(516, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(517, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(518, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(519, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(520, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(521, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(522, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(523, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(524, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(525, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(526, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(527, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(528, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(529, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(530, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(531, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(532, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(533, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(534, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(535, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(536, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(537, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(538, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(539, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(540, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(541, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(542, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(543, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(544, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(545, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(546, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(547, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(548, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(549, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(550, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(551, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(552, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(553, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(554, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(555, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(556, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(557, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(558, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(559, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(560, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(561, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(562, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(563, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(564, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(565, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(566, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(567, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(568, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(569, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(570, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(571, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(572, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(573, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(574, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(575, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(576, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(577, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(578, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(579, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(580, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(581, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(582, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(583, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(584, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(585, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(586, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(587, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(588, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(589, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(590, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(591, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(592, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(593, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(594, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(595, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(596, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(597, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(598, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(599, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(600, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(601, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(602, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(603, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(604, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(605, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(606, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(607, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(608, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(609, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(610, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(611, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(612, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(613, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(614, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(615, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(616, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(617, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(618, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(619, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(620, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(621, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(622, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(623, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(624, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(625, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(626, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(627, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(628, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(629, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(630, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(631, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(632, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(633, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(634, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(635, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(636, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(637, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(638, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(639, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(640, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(641, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(642, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(643, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(644, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(645, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(646, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(647, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(648, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(649, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(650, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(651, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(652, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(653, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2);
INSERT INTO `audittrail` (`auditID`, `logs`, `tableName`, `userID`, `actionID`) VALUES
(654, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(655, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(656, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(657, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(658, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(659, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(660, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(661, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(662, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(663, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(664, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(665, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(666, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(667, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(668, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(669, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(670, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(671, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(672, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(673, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(674, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(675, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(676, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(677, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(678, 'With IP: ::1<17/02/2022>= User has started Class Creation', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(679, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(680, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(681, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(682, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(683, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(684, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(685, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(686, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(687, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(688, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(689, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(690, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(691, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(692, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(693, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(694, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(695, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(696, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(697, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(698, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(699, 'With IP: ::1<17/02/2022>= User has procedeed step2', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(700, 'With IP: ::1<17/02/2022>= User has procedeed step 3', '8gfg19kqkb19pm23sloc38etb2', 72, 2),
(701, 'With IP: ::1<17/02/2022>= User logouted of the system', '8gfg19kqkb19pm23sloc38etb2', 72, 3),
(702, 'With IP: ::1<17/02/2022>= user has login', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(703, 'With IP: ::1<17/02/2022>= user has passed 2fa', 'hcqnvqsfjsoml9m94nn569hhea', 72, 1),
(704, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(705, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(706, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(707, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(708, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(709, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(710, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(711, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(712, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(713, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(714, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(715, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(716, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(717, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(718, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(719, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(720, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(721, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(722, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(723, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(724, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(725, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(726, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(727, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(728, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(729, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(730, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(731, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(732, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(733, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(734, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(735, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(736, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(737, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(738, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(739, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(740, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(741, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(742, 'With IP: ::1<17/02/2022>= User has started Class Creation', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(743, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(744, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(745, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(746, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(747, 'With IP: ::1<17/02/2022>= User has started Class Creation', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(748, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(749, 'With IP: ::1<17/02/2022>= User has started Class Creation', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(750, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(751, 'With IP: ::1<17/02/2022>= User has started Class Creation', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(752, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(753, 'With IP: ::1<17/02/2022>= User has started Class Creation', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(754, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(755, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(756, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(757, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(758, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(759, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(760, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(761, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(762, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(763, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(764, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(765, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(766, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(767, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(768, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(769, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(770, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(771, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(772, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(773, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(774, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(775, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(776, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(777, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(778, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(779, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(780, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(781, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(782, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(783, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(784, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(785, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(786, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(787, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(788, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(789, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(790, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(791, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(792, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(793, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(794, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(795, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(796, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(797, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(798, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(799, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(800, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(801, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(802, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(803, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(804, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(805, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(806, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(807, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(808, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(809, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(810, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(811, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(812, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(813, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(814, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(815, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(816, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(817, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(818, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(819, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(820, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(821, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(822, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(823, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(824, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(825, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(826, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(827, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(828, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(829, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(830, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(831, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(832, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(833, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(834, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(835, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(836, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(837, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(838, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(839, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(840, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(841, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(842, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(843, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(844, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(845, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(846, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(847, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(848, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(849, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(850, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(851, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(852, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(853, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(854, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(855, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(856, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(857, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(858, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(859, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(860, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(861, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(862, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(863, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(864, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(865, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(866, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(867, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(868, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(869, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(870, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(871, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(872, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(873, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(874, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(875, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(876, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(877, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(878, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(879, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(880, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(881, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(882, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(883, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(884, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(885, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(886, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(887, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(888, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(889, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(890, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(891, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(892, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(893, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(894, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(895, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(896, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(897, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(898, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(899, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(900, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(901, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(902, 'With IP: ::1<17/02/2022>= User has started Class Creation', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(903, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(904, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(905, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(906, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(907, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(908, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(909, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(910, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(911, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(912, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(913, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(914, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(915, 'With IP: ::1<17/02/2022>= User has started Class Creation', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(916, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(917, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(918, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(919, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(920, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(921, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(922, 'With IP: ::1<17/02/2022>= User has started Class Creation', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(923, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(924, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(925, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(926, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(927, 'With IP: ::1<17/02/2022>= User has procedeed step2', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(928, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(929, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(930, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(931, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(932, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(933, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(934, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(935, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(936, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(937, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(938, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(939, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(940, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(941, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(942, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(943, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(944, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(945, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(946, 'With IP: ::1<17/02/2022>= User has successfuly viewed the landin', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(947, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(948, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(949, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(950, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(951, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(952, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(953, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(954, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(955, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(956, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(957, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(958, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(959, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(960, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(961, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(962, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(963, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(964, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(965, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(966, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(967, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(968, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(969, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(970, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(971, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(972, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(973, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(974, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(975, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(976, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(977, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(978, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(979, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(980, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(981, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(982, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(983, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(984, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(985, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(986, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(987, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(988, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(989, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(990, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(991, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(992, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(993, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(994, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(995, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(996, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(997, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(998, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(999, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1000, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1001, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1002, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1003, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1004, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1005, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1006, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1007, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1008, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1009, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1010, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1011, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1012, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1013, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1014, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1015, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1016, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1017, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1018, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1019, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1020, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1021, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1022, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1023, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1024, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1025, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1026, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1027, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1028, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1029, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1030, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1031, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1032, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1033, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1034, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1035, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1036, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1037, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1038, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1039, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1040, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1041, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1042, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1043, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1044, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1045, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1046, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1047, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1048, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1049, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1050, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1051, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1052, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1053, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1054, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1055, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1056, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1057, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1058, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1059, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1060, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1061, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1062, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1063, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1064, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1065, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1066, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1067, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1068, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1069, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1070, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1071, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1072, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1073, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1074, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1075, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1076, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1077, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1078, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1079, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1080, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1081, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1082, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1083, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1084, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1085, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1086, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1087, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1088, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1089, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1090, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1091, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1092, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1093, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1094, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1095, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1096, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1097, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1098, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1099, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1100, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1101, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1102, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1103, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1104, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1105, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1106, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1107, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1108, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1109, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1110, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1111, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1112, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1113, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1114, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1115, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1116, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1117, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1118, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1119, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1120, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1121, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1122, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1123, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1124, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1125, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1126, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1127, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1128, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1129, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1130, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1131, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1132, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1133, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1134, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1135, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1136, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1137, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1138, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1139, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1140, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1141, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1142, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1143, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1144, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1145, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1146, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1147, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1148, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1149, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1150, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1151, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1152, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1153, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1154, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1155, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1156, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1157, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1158, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1159, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1160, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1161, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1162, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1163, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1164, 'With IP: ::1<17/02/2022>= User has procedeed step 3', 'hcqnvqsfjsoml9m94nn569hhea', 72, 2),
(1165, 'With IP: ::1<17/02/2022>= user has login', '5pmqsiq064gdq8gnb72bhccaul', 71, 2),
(1166, 'With IP: ::1<17/02/2022>= User logouted of the system', '5pmqsiq064gdq8gnb72bhccaul', 71, 3);
INSERT INTO `audittrail` (`auditID`, `logs`, `tableName`, `userID`, `actionID`) VALUES
(1167, 'With IP: ::1<17/02/2022>= user has login', '67m7bdktgh3dsf2fclcu42kk1j', 71, 2);

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `blacklistID` int(11) NOT NULL,
  `status` char(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blacklist`
--

INSERT INTO `blacklist` (`blacklistID`, `status`, `description`, `userID`) VALUES
(2, 'Banned', 'User can no longer use the web application', 0),
(3, 'Soft Ban', 'User cannot use the web application for a certain period of time', 0),
(4, 'Under Review', 'User can use the web application, but has limited access', 0),
(5, 'Warning', 'User can still use the web application', 0),
(6, 'Whitelisted', 'User is free to use the web application', 0);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `certificateID` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `evaluateID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `earnedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classcontent`
--

CREATE TABLE `classcontent` (
  `classContentID` int(11) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `datePosted` datetime DEFAULT current_timestamp(),
  `dateModified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enrollmentID` int(11) NOT NULL,
  `fileID` int(11) NOT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classID` int(11) NOT NULL,
  `className` varchar(64) DEFAULT NULL,
  `classStatus` varchar(64) DEFAULT NULL,
  `creationDate` datetime DEFAULT current_timestamp(),
  `modefiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL,
  `mileStoneID` int(11) NOT NULL,
  `testID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classevaluation`
--

CREATE TABLE `classevaluation` (
  `evaluateID` int(11) NOT NULL,
  `Cstatus` varchar(25) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classlist`
--

CREATE TABLE `classlist` (
  `classlistID` int(11) NOT NULL,
  `enrollmentID` int(11) NOT NULL,
  `accessID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classmodules`
--

CREATE TABLE `classmodules` (
  `moduleID` int(8) NOT NULL,
  `moduleName` varchar(255) DEFAULT NULL,
  `chapter` float DEFAULT NULL,
  `requirementID` int(8) DEFAULT NULL,
  `fileID` int(8) DEFAULT NULL,
  `classID` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classprofile`
--

CREATE TABLE `classprofile` (
  `classProfileID` int(11) NOT NULL,
  `className` varchar(96) DEFAULT NULL,
  `classDescription` varchar(96) DEFAULT NULL,
  `classDate` datetime DEFAULT NULL,
  `classStatus` varchar(25) DEFAULT NULL,
  `videoAddress` varchar(64) DEFAULT NULL,
  `imageAddress` varchar(64) DEFAULT NULL,
  `modifiedDate` varchar(16) DEFAULT NULL,
  `equivalentHours` varchar(64) DEFAULT NULL,
  `skillLevel` varchar(64) DEFAULT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classstones`
--

CREATE TABLE `classstones` (
  `classtone` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `mileStoneID` int(11) NOT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `debugfiles`
--

CREATE TABLE `debugfiles` (
  `fileID` int(11) NOT NULL,
  `fileName` varchar(196) DEFAULT NULL,
  `filePath` varchar(196) DEFAULT NULL,
  `datePosted` datetime DEFAULT current_timestamp(),
  `dateModified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL,
  `classID` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `deliveryID` int(11) NOT NULL,
  `deliveryDate` datetime DEFAULT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `enrollmentID` int(11) NOT NULL,
  `instructorApproval` float DEFAULT 0,
  `userID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `accessID` int(11) NOT NULL,
  `transactionID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `feeID` int(11) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `orderID` int(11) NOT NULL,
  `packageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `filecontent`
--

CREATE TABLE `filecontent` (
  `fileID` int(11) NOT NULL,
  `fileName` varchar(96) DEFAULT NULL,
  `filePath` varchar(96) DEFAULT NULL,
  `datePosted` datetime DEFAULT current_timestamp(),
  `dateModified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL,
  `classContentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meetingID` int(11) NOT NULL,
  `meetingLink` varchar(64) DEFAULT NULL,
  `TimeDate` datetime DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `classContentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE `milestone` (
  `mileStoneID` int(11) NOT NULL,
  `milestoneName` varchar(320) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `Mtrigger` varchar(25) DEFAULT NULL,
  `classID` int(11) NOT NULL,
  `enrollmentID` int(8) NOT NULL,
  `userID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milestone`
--

INSERT INTO `milestone` (`mileStoneID`, `milestoneName`, `description`, `Mtrigger`, `classID`, `enrollmentID`, `userID`) VALUES
(2, 'The acolyte', 'A Learner imbarking in a new lession', '0', 0, 0, 71),
(3, 'The acolyte', 'A Learner imbarking in a new lession', '0', 0, 0, 71);

-- --------------------------------------------------------

--
-- Table structure for table `milestoneearned`
--

CREATE TABLE `milestoneearned` (
  `earnedID` int(11) NOT NULL,
  `dateEarned` varchar(16) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `milestoneID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `dateRequest` varchar(16) DEFAULT NULL,
  `numberoforder` int(10) DEFAULT NULL,
  `orderStatus` varchar(64) DEFAULT NULL,
  `packageID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `profileID` int(11) NOT NULL,
  `enrollmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(11) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `amount` int(255) NOT NULL,
  `price` varchar(320) NOT NULL,
  `classID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `description`, `amount`, `price`, `classID`) VALUES
(1, 'Tomato', 0, '', NULL),
(2, 'Porkchop', 0, '', NULL),
(3, 'Beef', 0, '', NULL),
(4, 'Wagyu', 0, '', NULL),
(5, 'Eggs', 0, '', NULL),
(6, 'catsoup', 0, '12.1', NULL),
(9, 'fish', 1, '11.2', NULL),
(15, 'rice', 1, '11.2', NULL),
(16, 'popoto', 10, '22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paymentrequest`
--

CREATE TABLE `paymentrequest` (
  `payRequestID` int(11) NOT NULL,
  `amount` varchar(64) DEFAULT NULL,
  `paymentAddress` varchar(64) DEFAULT NULL,
  `fileAddress` varchar(64) DEFAULT NULL,
  `classID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `transactionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paymentstatus`
--

CREATE TABLE `paymentstatus` (
  `paymentStatusID` int(11) NOT NULL,
  `description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentstatus`
--

INSERT INTO `paymentstatus` (`paymentStatusID`, `description`) VALUES
(1, 'Fully Paid'),
(2, 'Pending'),
(3, 'Partial Payment'),
(4, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `profitID` int(11) NOT NULL,
  `profitDate` varchar(16) DEFAULT NULL,
  `profitStatus` varchar(96) DEFAULT NULL,
  `feeID` int(11) NOT NULL,
  `transactionID` int(11) NOT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `questionnaireID` int(11) NOT NULL,
  `question` char(64) DEFAULT NULL,
  `answer` varchar(96) DEFAULT NULL,
  `points` float DEFAULT NULL,
  `testID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`questionnaireID`, `question`, `answer`, `points`, `testID`) VALUES
(1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refundID` int(11) NOT NULL,
  `reason` varchar(64) DEFAULT NULL,
  `evidence` varchar(64) DEFAULT NULL,
  `paymentAddress` varchar(200) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `enrollmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviewcards`
--

CREATE TABLE `reviewcards` (
  `reviewID` int(11) NOT NULL,
  `modifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` varchar(50) DEFAULT NULL,
  `content` float DEFAULT NULL,
  `presentation` float DEFAULT NULL,
  `attendance` float DEFAULT NULL,
  `legibility` float DEFAULT NULL,
  `totalRating` float DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `scheduleID` int(11) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `startTime` timestamp NULL DEFAULT NULL,
  `endTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`scheduleID`, `startDate`, `endDate`, `startTime`, `endTime`) VALUES
(1, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `testID` int(11) NOT NULL,
  `testName` char(64) DEFAULT NULL,
  `testDescription` char(64) DEFAULT NULL,
  `testType` char(64) DEFAULT NULL,
  `meetingLink` varchar(64) DEFAULT NULL,
  `result` char(100) DEFAULT NULL,
  `questionnaireID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testID`, `testName`, `testDescription`, `testType`, `meetingLink`, `result`, `questionnaireID`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `dateOfPayment` varchar(16) DEFAULT NULL,
  `imageAddress` char(64) DEFAULT NULL,
  `paymentStatusID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `transactiontypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactiontype`
--

CREATE TABLE `transactiontype` (
  `transactionTypeID` int(11) NOT NULL,
  `description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactiontype`
--

INSERT INTO `transactiontype` (`transactionTypeID`, `description`) VALUES
(1, 'Order Request'),
(2, 'Confirmed Request'),
(3, 'Delivery Request'),
(4, 'Bought a Course'),
(5, 'Canceled a Course');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `profileID` int(11) NOT NULL,
  `age` char(2) DEFAULT NULL,
  `gender` char(6) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` char(64) DEFAULT NULL,
  `contactno` char(64) DEFAULT NULL,
  `aboutme` varchar(320) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`profileID`, `age`, `gender`, `birthday`, `address`, `contactno`, `aboutme`, `userID`) VALUES
(33, '21', 'mail', '2022-02-03', '52 kamagong', '22', '22', 71),
(34, NULL, NULL, NULL, NULL, NULL, NULL, 72);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `roleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roleType` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`roleID`, `userID`, `roleType`) VALUES
(2, 0, 'Admin'),
(3, 0, 'learner'),
(4, 0, 'Instructor'),
(5, 0, 'Coodinator'),
(6, 0, 'Procurement');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` char(64) DEFAULT NULL,
  `email` char(64) DEFAULT NULL,
  `password` char(200) DEFAULT NULL,
  `firstname` char(64) DEFAULT NULL,
  `lastName` char(64) DEFAULT NULL,
  `roleID` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `activation_code` varchar(255) NOT NULL,
  `activation_expiry` datetime NOT NULL,
  `activated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `firstname`, `lastName`, `roleID`, `active`, `activation_code`, `activation_expiry`, `activated_at`, `created_at`, `updated_at`) VALUES
(71, 'henrickL', 'markhenrick.linsangan@benilde.edu.ph', '$2y$10$oQADZSELzP.5ttBOYZYOcOQnUe6P6LqZfqD3xNP3WdAv6y9hzIdmC', 'mark henrick', 'linsangan', 2, 1, '$2y$10$Ncu/BWUGBY7TIbrQ3Zvuhe4s/j./GeUQjVTP45fPTHnSxIAfRiDHy', '2022-02-16 11:43:21', '2022-02-15 18:44:07', '2022-02-15 10:43:21', '2022-02-17 12:17:55'),
(72, 'Emailed', 'marklinsangan@pts-thesis.website', '$2y$10$6iGL/Ad/oAn6ATGiWcv3f.cCxK9zL.Kt9FmzF0HzmUOpcGbAceKqC', 'Oscar', 'Ruby', 4, 1, '', '0000-00-00 00:00:00', NULL, '2022-02-15 11:57:39', '2022-02-15 19:57:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`accessID`);

--
-- Indexes for table `actiontype`
--
ALTER TABLE `actiontype`
  ADD PRIMARY KEY (`actionID`);

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD PRIMARY KEY (`auditID`),
  ADD KEY `audittrail_ibfk_1` (`userID`),
  ADD KEY `audittrail_ibfk_2` (`actionID`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`blacklistID`),
  ADD KEY `fk_userIDBlack` (`userID`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`certificateID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `evaluateID` (`evaluateID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `earnedID` (`earnedID`);

--
-- Indexes for table `classcontent`
--
ALTER TABLE `classcontent`
  ADD PRIMARY KEY (`classContentID`),
  ADD KEY `fk_enrollment_ID` (`enrollmentID`),
  ADD KEY `fk_file_ID` (`fileID`),
  ADD KEY `fk_class_ID` (`classID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `fk_milestoneID` (`mileStoneID`),
  ADD KEY `fk_testID` (`testID`),
  ADD KEY `fk_userIDClass` (`userID`);

--
-- Indexes for table `classevaluation`
--
ALTER TABLE `classevaluation`
  ADD PRIMARY KEY (`evaluateID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `classlist`
--
ALTER TABLE `classlist`
  ADD PRIMARY KEY (`classlistID`),
  ADD KEY `enrollmentID` (`enrollmentID`),
  ADD KEY `accessID` (`accessID`);

--
-- Indexes for table `classmodules`
--
ALTER TABLE `classmodules`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `classprofile`
--
ALTER TABLE `classprofile`
  ADD PRIMARY KEY (`classProfileID`),
  ADD KEY `fk_classIDProf` (`classID`);

--
-- Indexes for table `classstones`
--
ALTER TABLE `classstones`
  ADD PRIMARY KEY (`classtone`);

--
-- Indexes for table `debugfiles`
--
ALTER TABLE `debugfiles`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`deliveryID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`enrollmentID`),
  ADD KEY `fk_accessID` (`accessID`),
  ADD KEY `fk_userIDEnroll` (`userID`),
  ADD KEY `fk_classID` (`classID`),
  ADD KEY `fk_transactionID` (`transactionID`),
  ADD KEY `fk_scheduleID` (`scheduleID`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`feeID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `fk_orderID` (`orderID`);

--
-- Indexes for table `filecontent`
--
ALTER TABLE `filecontent`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `classContentID` (`classContentID`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meetingID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `classContentID` (`classContentID`);

--
-- Indexes for table `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`mileStoneID`),
  ADD KEY `fk_classIDMile` (`classID`);

--
-- Indexes for table `milestoneearned`
--
ALTER TABLE `milestoneearned`
  ADD PRIMARY KEY (`earnedID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `milestoneID` (`milestoneID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `profileID` (`profileID`),
  ADD KEY `enrollmentID` (`enrollmentID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`),
  ADD KEY `fk_classIDPackage` (`classID`);

--
-- Indexes for table `paymentrequest`
--
ALTER TABLE `paymentrequest`
  ADD PRIMARY KEY (`payRequestID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `transactionID` (`transactionID`);

--
-- Indexes for table `paymentstatus`
--
ALTER TABLE `paymentstatus`
  ADD PRIMARY KEY (`paymentStatusID`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`profitID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `feeID` (`feeID`),
  ADD KEY `transactionID` (`transactionID`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`questionnaireID`),
  ADD KEY `fk_testIDQuest` (`testID`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refundID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `enrollmentID` (`enrollmentID`);

--
-- Indexes for table `reviewcards`
--
ALTER TABLE `reviewcards`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `fk_userIDRev` (`classID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `paymentStatusID` (`paymentStatusID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `transactiontypeID` (`transactiontypeID`);

--
-- Indexes for table `transactiontype`
--
ALTER TABLE `transactiontype`
  ADD PRIMARY KEY (`transactionTypeID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`profileID`),
  ADD KEY `fk_userID` (`userID`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`roleID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `fk_roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `accessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `actiontype`
--
ALTER TABLE `actiontype`
  MODIFY `actionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `audittrail`
--
ALTER TABLE `audittrail`
  MODIFY `auditID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1168;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `blacklistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `certificateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classcontent`
--
ALTER TABLE `classcontent`
  MODIFY `classContentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classevaluation`
--
ALTER TABLE `classevaluation`
  MODIFY `evaluateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classlist`
--
ALTER TABLE `classlist`
  MODIFY `classlistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classmodules`
--
ALTER TABLE `classmodules`
  MODIFY `moduleID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `classprofile`
--
ALTER TABLE `classprofile`
  MODIFY `classProfileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classstones`
--
ALTER TABLE `classstones`
  MODIFY `classtone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debugfiles`
--
ALTER TABLE `debugfiles`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `deliveryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `enrollmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `feeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filecontent`
--
ALTER TABLE `filecontent`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meetingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milestone`
--
ALTER TABLE `milestone`
  MODIFY `mileStoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `milestoneearned`
--
ALTER TABLE `milestoneearned`
  MODIFY `earnedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `paymentrequest`
--
ALTER TABLE `paymentrequest`
  MODIFY `payRequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentstatus`
--
ALTER TABLE `paymentstatus`
  MODIFY `paymentStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
  MODIFY `profitID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `questionnaireID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refundID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewcards`
--
ALTER TABLE `reviewcards`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactiontype`
--
ALTER TABLE `transactiontype`
  MODIFY `transactionTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD CONSTRAINT `audittrail_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audittrail_ibfk_2` FOREIGN KEY (`actionID`) REFERENCES `actiontype` (`actionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `certificates_ibfk_2` FOREIGN KEY (`evaluateID`) REFERENCES `classevaluation` (`evaluateID`),
  ADD CONSTRAINT `certificates_ibfk_3` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `certificates_ibfk_4` FOREIGN KEY (`earnedID`) REFERENCES `milestoneearned` (`earnedID`);

--
-- Constraints for table `classcontent`
--
ALTER TABLE `classcontent`
  ADD CONSTRAINT `fk_class_ID` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `fk_enrollment_ID` FOREIGN KEY (`enrollmentID`) REFERENCES `enrolled` (`enrollmentID`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `fk_testID` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`),
  ADD CONSTRAINT `fk_userIDClass` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `classevaluation`
--
ALTER TABLE `classevaluation`
  ADD CONSTRAINT `classevaluation_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `classlist`
--
ALTER TABLE `classlist`
  ADD CONSTRAINT `classlist_ibfk_1` FOREIGN KEY (`enrollmentID`) REFERENCES `enrolled` (`enrollmentID`),
  ADD CONSTRAINT `classlist_ibfk_2` FOREIGN KEY (`accessID`) REFERENCES `accesslevel` (`accessID`);

--
-- Constraints for table `classprofile`
--
ALTER TABLE `classprofile`
  ADD CONSTRAINT `fk_classIDProf` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `fk_accessID` FOREIGN KEY (`accessID`) REFERENCES `accesslevel` (`accessID`),
  ADD CONSTRAINT `fk_classID` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `fk_scheduleID` FOREIGN KEY (`scheduleID`) REFERENCES `schedules` (`scheduleID`),
  ADD CONSTRAINT `fk_transactionID` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`),
  ADD CONSTRAINT `fk_userIDEnroll` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`),
  ADD CONSTRAINT `fk_orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `filecontent`
--
ALTER TABLE `filecontent`
  ADD CONSTRAINT `filecontent_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `filecontent_ibfk_2` FOREIGN KEY (`classContentID`) REFERENCES `classcontent` (`classContentID`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`classContentID`) REFERENCES `classcontent` (`classContentID`);

--
-- Constraints for table `milestoneearned`
--
ALTER TABLE `milestoneearned`
  ADD CONSTRAINT `milestoneearned_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `milestoneearned_ibfk_2` FOREIGN KEY (`milestoneID`) REFERENCES `milestone` (`mileStoneID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`profileID`) REFERENCES `userprofile` (`profileID`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`enrollmentID`) REFERENCES `enrolled` (`enrollmentID`);

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `fk_classIDPackage` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`);

--
-- Constraints for table `paymentrequest`
--
ALTER TABLE `paymentrequest`
  ADD CONSTRAINT `paymentrequest_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `paymentrequest_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `paymentrequest_ibfk_3` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

--
-- Constraints for table `profit`
--
ALTER TABLE `profit`
  ADD CONSTRAINT `profit_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `profit_ibfk_2` FOREIGN KEY (`feeID`) REFERENCES `fees` (`feeID`),
  ADD CONSTRAINT `profit_ibfk_3` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `fk_testIDQuest` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`);

--
-- Constraints for table `refund`
--
ALTER TABLE `refund`
  ADD CONSTRAINT `refund_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `refund_ibfk_2` FOREIGN KEY (`enrollmentID`) REFERENCES `enrolled` (`enrollmentID`);

--
-- Constraints for table `reviewcards`
--
ALTER TABLE `reviewcards`
  ADD CONSTRAINT `fk_userIDRev` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `reviewcards_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`paymentStatusID`) REFERENCES `paymentstatus` (`paymentStatusID`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`transactiontypeID`) REFERENCES `transactiontype` (`transactionTypeID`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_roleID` FOREIGN KEY (`roleID`) REFERENCES `userroles` (`roleID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
