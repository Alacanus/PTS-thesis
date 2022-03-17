-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 10:13 AM
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
Create Database `u657624546_pts`;
use Database `u657624546_pts`;
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
-- Table structure for table `addresstable`
--

CREATE TABLE `addresstable` (
  `addressID` int(11) NOT NULL,
  `line1` varchar(30) NOT NULL,
  `line2` varchar(30) NOT NULL,
  `line3` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `country` varchar(56) NOT NULL,
  `otherInfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `auditID` int(11) NOT NULL,
  `logs` char(64) DEFAULT NULL,
  `sessionID` char(64) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `actionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`auditID`, `logs`, `sessionID`, `userID`, `actionID`) VALUES
(1333, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1334, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1335, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1336, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1337, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1338, 'With IP: ::1<20/02/2022>= User has successfuly viewed the landin', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1339, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1340, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1341, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1342, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1343, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1344, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1345, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1346, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1347, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1348, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1349, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1350, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1351, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1352, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1353, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1354, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1355, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1356, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1357, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1358, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1359, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1360, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1361, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1362, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1363, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1364, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1365, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1366, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1367, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1368, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1369, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1370, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1371, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1372, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1373, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1374, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1375, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1376, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1377, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1378, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1379, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1380, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1381, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1382, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1383, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1384, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1385, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1386, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1387, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1388, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1389, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1390, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1391, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1392, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', '4uv43fiipul5d2t80b3njvienk', 71, 2),
(1393, 'With IP: ::1<20/02/2022>= user has login', 'rlgq5l2v0vf9edvjt25ebdca8u', 72, 2),
(1394, 'With IP: ::1<20/02/2022>= user has passed 2fa', 'rlgq5l2v0vf9edvjt25ebdca8u', 72, 1),
(1395, 'With IP: ::1<20/02/2022>= User has successfuly viewed the landin', 'rlgq5l2v0vf9edvjt25ebdca8u', 72, 2),
(1396, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', 'rlgq5l2v0vf9edvjt25ebdca8u', 72, 2),
(1397, 'With IP: ::1<20/02/2022>= User has successfuly viewed the userpr', 'rlgq5l2v0vf9edvjt25ebdca8u', 72, 2),
(1398, 'With IP: ::1<20/02/2022>= User has successfuly viewed the landin', 'rlgq5l2v0vf9edvjt25ebdca8u', 72, 2),
(1399, 'With IP: 127.0.0.1<21/02/2022>= user has login', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1400, 'With IP: 127.0.0.1<21/02/2022>= user has passed 2fa', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 1),
(1401, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1402, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1403, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1404, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1405, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1406, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1407, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1408, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1409, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1410, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1411, 'With IP: 127.0.0.1<21/02/2022>= User has successfuly viewed the', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 2),
(1412, 'With IP: 127.0.0.1<21/02/2022>= User logouted of the system', 'nhaicr7kf4nm1kqfbvsfrjoci6', 71, 3),
(1413, 'With IP: 127.0.0.1<21/02/2022>= user has login', 'uthjs803750rv18i1ojv0obhfh', 71, 2),
(1414, 'With IP: 127.0.0.1<22/02/2022>= User logouted of the system', 'uthjs803750rv18i1ojv0obhfh', 71, 3),
(1415, 'With IP: 127.0.0.1<24/02/2022>= user has login', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1416, 'With IP: 127.0.0.1<24/02/2022>= user has passed 2fa', 'o7orqi8a4mnufrecre65ve91ui', 71, 1),
(1417, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1418, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1419, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1420, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1421, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1422, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1423, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1424, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1425, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1426, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1427, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1428, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1429, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1430, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'o7orqi8a4mnufrecre65ve91ui', 71, 2),
(1431, 'With IP: 127.0.0.1<24/02/2022>= User logouted of the system', 'o7orqi8a4mnufrecre65ve91ui', 71, 3),
(1432, 'With IP: 127.0.0.1<24/02/2022>= User logouted of the system', 'o7orqi8a4mnufrecre65ve91ui', 71, 3),
(1433, 'With IP: 127.0.0.1<24/02/2022>= user has login', 'co43ftgrtq121pcb3a9fntkj8t', 71, 2),
(1434, 'With IP: 127.0.0.1<24/02/2022>= User logouted of the system', 'co43ftgrtq121pcb3a9fntkj8t', 71, 3),
(1435, 'With IP: 127.0.0.1<24/02/2022>= user has login', 'l130gnb566f7i38f1cl7iqabah', 71, 2),
(1436, 'With IP: 127.0.0.1<24/02/2022>= user has passed 2fa', 'l130gnb566f7i38f1cl7iqabah', 71, 1),
(1437, 'With IP: 127.0.0.1<24/02/2022>= User has successfuly viewed the', 'l130gnb566f7i38f1cl7iqabah', 71, 2),
(1438, 'With IP: 127.0.0.1<25/02/2022>= User logouted of the system', 'l130gnb566f7i38f1cl7iqabah', 71, 3),
(1439, 'With IP: 127.0.0.1<25/02/2022>= user has login', '26s3bmte829fidainjqcrv9gk7', 71, 2),
(1440, 'With IP: 127.0.0.1<25/02/2022>= user has passed 2fa', '26s3bmte829fidainjqcrv9gk7', 71, 1),
(1441, 'With IP: 127.0.0.1<25/02/2022>= User has successfuly viewed the', '26s3bmte829fidainjqcrv9gk7', 71, 2),
(1442, 'With IP: 127.0.0.1<25/02/2022>= User has successfuly viewed the', '26s3bmte829fidainjqcrv9gk7', 71, 2),
(1443, 'With IP: 127.0.0.1<25/02/2022>= User has successfuly viewed the', '26s3bmte829fidainjqcrv9gk7', 71, 2),
(1444, 'With IP: 127.0.0.1<26/02/2022>= User has successfuly viewed the', '26s3bmte829fidainjqcrv9gk7', 71, 2),
(1445, 'With IP: 127.0.0.1<01/03/2022>= User has successfuly viewed the', '26s3bmte829fidainjqcrv9gk7', 71, 2),
(1446, 'With IP: 127.0.0.1<01/03/2022>= User logouted of the system', '26s3bmte829fidainjqcrv9gk7', 71, 3),
(1447, 'With IP: 127.0.0.1<01/03/2022>= user has login', '4e3r2hvhr2egu1fq126gjt6gce', 74, 2),
(1448, 'With IP: 127.0.0.1<01/03/2022>= user has passed 2fa', '4e3r2hvhr2egu1fq126gjt6gce', 74, 1),
(1449, 'With IP: 127.0.0.1<01/03/2022>= User has successfuly viewed the', '4e3r2hvhr2egu1fq126gjt6gce', 74, 2),
(1450, 'With IP: 127.0.0.1<01/03/2022>= User logouted of the system', '4e3r2hvhr2egu1fq126gjt6gce', 74, 3),
(1451, 'With IP: 127.0.0.1<01/03/2022>= user has login', '7s3bnps1ou4k90coh098soq026', 75, 2),
(1452, 'With IP: 127.0.0.1<01/03/2022>= User logouted of the system', '7s3bnps1ou4k90coh098soq026', 75, 3),
(1453, 'With IP: 127.0.0.1<03/03/2022>= user has login', 'qgdgl664851c16trfib0c8r86d', 71, 2),
(1454, 'With IP: 127.0.0.1<03/03/2022>= user has passed 2fa', 'qgdgl664851c16trfib0c8r86d', 71, 1),
(1455, 'With IP: 127.0.0.1<03/03/2022>= User has successfuly viewed the', 'qgdgl664851c16trfib0c8r86d', 71, 2);

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
  `earnedDate` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `evaluateID` int(11) DEFAULT NULL,
  `classID` int(11) DEFAULT NULL,
  `earnedID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`certificateID`, `description`, `earnedDate`, `userID`, `evaluateID`, `classID`, `earnedID`) VALUES
(1, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classcontent`
--

CREATE TABLE `classcontent` (
  `classContentID` int(11) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `datePosted` datetime DEFAULT current_timestamp(),
  `dateModified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL,
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
  `mileStoneID` int(11) DEFAULT NULL,
  `testID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classID`, `className`, `classStatus`, `creationDate`, `modefiedDate`, `userID`, `mileStoneID`, `testID`) VALUES
(3, 'Cooking 101', 'UNVERIFIED', '2022-02-24 23:49:49', '2022-02-24 23:49:49', 71, NULL, NULL),
(4, 'Fresh Baking', 'UNVERIFIED', '2022-02-25 00:23:19', '2022-02-25 00:23:19', 71, NULL, NULL),
(10, 'Stew Delight', 'UNVERIFIED', '2022-02-25 12:25:46', '2022-02-25 12:25:46', 71, NULL, NULL),
(11, 'Create Ice creams', 'UNVERIFIED', '2022-02-25 16:02:53', '2022-02-25 16:02:53', 71, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classevaluation`
--

CREATE TABLE `classevaluation` (
  `evaluateID` int(11) NOT NULL,
  `Cstatus` varchar(25) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `classID` int(11) NOT NULL
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

--
-- Dumping data for table `classmodules`
--

INSERT INTO `classmodules` (`moduleID`, `moduleName`, `chapter`, `requirementID`, `fileID`, `classID`) VALUES
(27, 'intro', 1, NULL, 79, '0dab0364ee24770562f25456cfb50c56'),
(28, 'Sand and See', 1, NULL, 84, '484300b82a726cc2cf005727fff46954');

-- --------------------------------------------------------

--
-- Table structure for table `classprofile`
--

CREATE TABLE `classprofile` (
  `classProfileID` int(11) NOT NULL,
  `className` varchar(96) DEFAULT NULL,
  `classDescription` varchar(96) DEFAULT NULL,
  `classDate` datetime DEFAULT NULL,
  `videoAddress` varchar(320) DEFAULT NULL,
  `imageAddress` varchar(320) DEFAULT NULL,
  `availableSlot` varchar(2) NOT NULL DEFAULT '20',
  `modifiedDate` varchar(16) DEFAULT NULL,
  `equivalentHours` varchar(64) DEFAULT NULL,
  `skillLevel` varchar(64) DEFAULT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classprofile`
--

INSERT INTO `classprofile` (`classProfileID`, `className`, `classDescription`, `classDate`, `videoAddress`, `imageAddress`, `availableSlot`, `modifiedDate`, `equivalentHours`, `skillLevel`, `classID`) VALUES
(1, 'Cooking 101', 'Cooking 101', NULL, 'lR-u5iHozBo', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../public/Writable/R.jpg', '', NULL, NULL, NULL, 3),
(2, 'Fresh Baking', 'Fresh Baking', NULL, 'lR-u5iHozBo', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../public/Writable/R.jpg', '', NULL, NULL, NULL, 4),
(3, 'Stew Delight', 'Home to all thing Stewed', NULL, 'Y_rjAgzwKDA', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../public/Writable/Capture33.PNG', ' ', NULL, '3hr', 'Begginer', 10),
(4, 'Create Ice creams', 'Gelatos and sweets', NULL, 'VUbTYrGPOY8', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../public/Writable/ice_cream.jpg', ' ', NULL, '16hr', 'Expert', 11);

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
  `filePath` varchar(320) DEFAULT NULL,
  `datePosted` datetime DEFAULT current_timestamp(),
  `dateModified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL,
  `classID` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debugfiles`
--

INSERT INTO `debugfiles` (`fileID`, `fileName`, `filePath`, `datePosted`, `dateModified`, `userID`, `classID`) VALUES
(75, 'SM-placeholder.png', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../public/Writable/SM-placeholder.png', '2022-02-20 19:52:29', '2022-02-20 19:52:29', 71, ''),
(79, 'Weekly Status Report Template.docx', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../Writable/Weekly Status Report Template.docx', '2022-02-20 22:38:36', '2022-02-20 22:38:36', 72, '0dab0364ee24770562f25456cfb50c56'),
(80, 'arcane-arc-3-jinx-social.jpg', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../public/Writable/arcane-arc-3-jinx-social.jpg', '2022-02-20 22:59:14', '2022-02-20 22:59:14', 72, ''),
(84, 'u657624546_pts (6).sql', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../Writable/u657624546_pts (6).sql', '2022-02-24 21:45:33', '2022-02-24 21:45:33', 71, '484300b82a726cc2cf005727fff46954'),
(88, 'Capture33.PNG', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../public/Writable/Capture33.PNG', '2022-02-25 13:00:10', '2022-02-25 13:00:10', 71, ''),
(89, 'ice_cream.jpg', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../public/Writable/ice_cream.jpg', '2022-02-25 16:11:13', '2022-02-25 16:11:13', 71, '');

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
-- Table structure for table `equivalenthours`
--

CREATE TABLE `equivalenthours` (
  `equivalentHoursID` int(11) NOT NULL,
  `Label` varchar(320) NOT NULL,
  `Duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equivalenthours`
--

INSERT INTO `equivalenthours` (`equivalentHoursID`, `Label`, `Duration`) VALUES
(1, '1hr', 3600),
(2, '2hr', 7200),
(3, '3hr', 10800),
(4, '4hr', 14400),
(5, '5hr', 18000),
(6, '6hr', 21600),
(7, '7hr', 25200),
(8, '8hr', 28800),
(9, '9hr', 32400),
(10, '10hr', 36000),
(11, '11hr', 39600),
(12, '12hr', 43200),
(13, '13hr', 46800),
(14, '14hr', 50400),
(15, '15hr', 54000),
(16, '16hr', 57600),
(17, '17hr', 61200),
(18, '18hr', 64800),
(19, '19hr', 68400),
(20, '20hr', 72000),
(21, '21hr', 75600),
(22, '22hr', 79200),
(23, '23hr', 82800),
(24, '24hr', 86400),
(25, '25hr', 90000),
(26, '26hr', 93600),
(27, '27hr', 97200),
(28, '28hr', 100800),
(29, '29hr', 104400),
(30, '30hr', 108000),
(31, '31hr', 111600),
(32, '32hr', 115200),
(33, '33hr', 118800),
(34, '34hr', 122400),
(35, '35hr', 126000),
(36, '36hr', 129600),
(37, '37hr', 133200),
(38, '38hr', 136800),
(39, '39hr', 140400),
(40, '40hr', 144000);

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
(5, 'The attended', 'A Learner imbarking in a new lession', '0', 0, 0, 71),
(10, 'The attended', 'test your skills', '5', 0, 0, 72),
(11, 'Shadow', 'sneak 100', '3', 0, 0, 72);

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
  `IngredientName` varchar(320) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `amount` int(255) NOT NULL,
  `price` varchar(320) NOT NULL,
  `unitMID` int(11) NOT NULL,
  `classID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `IngredientName`, `description`, `amount`, `price`, `unitMID`, `classID`) VALUES
(19, 'beef', 'lean', 1, '4332', 10, 10),
(20, 'milk', 'non-fat', 1, '232', 10, 10),
(21, 'spinach', 'fresh', 2, '1123', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `paymentlist`
--

CREATE TABLE `paymentlist` (
  `paylistID` int(11) NOT NULL,
  `paymentName` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentlist`
--

INSERT INTO `paymentlist` (`paylistID`, `paymentName`) VALUES
(1, 'Paymaya'),
(2, 'Gcash'),
(3, 'Bank Transfer'),
(4, 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `paymethodID` int(11) NOT NULL,
  `accountName` varchar(320) NOT NULL,
  `accountDetail` varchar(320) NOT NULL,
  `paylistID` int(11) NOT NULL,
  `methodfileID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `description` varchar(255) DEFAULT NULL,
  `content` varchar(320) DEFAULT NULL,
  `presentation` varchar(320) DEFAULT NULL,
  `attendance` varchar(320) DEFAULT NULL,
  `legibility` varchar(320) DEFAULT NULL,
  `totalRating` varchar(320) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewcards`
--

INSERT INTO `reviewcards` (`reviewID`, `modifiedDate`, `description`, `content`, `presentation`, `attendance`, `legibility`, `totalRating`, `userID`, `classID`) VALUES
(4, '2022-03-04 04:51:03', 'totalRatingtotalRatingtotalRatingtotalRatingtotalR', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-half\"></i><i class=\"bi bi-star\"></i>', 71, 11),
(7, '2022-03-04 05:00:20', 'Stevie made each lesson a fun and informative experience! She was ver encouraging and great in explaining things in a simple and direct way that made each dish a rewarding experience. By the end of the lesson I felt like I really accomplished something!', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-half\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', 71, 11),
(8, '2022-03-04 05:02:07', 'viewClassIDviewClassIDviewClassIDviewClassIDviewClassID', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', 71, 11),
(12, '2022-03-04 05:45:45', 'Not a Good Class', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i><i class=\"bi bi-star\"></i>', 71, 11),
(13, '2022-03-04 15:08:28', 'Awesome class', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star\"></i>', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-half\"></i>', 71, 11);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `scheduleID` int(11) NOT NULL,
  `Day` char(9) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `startTime` timestamp NULL DEFAULT NULL,
  `endTime` timestamp NULL DEFAULT NULL,
  `classID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`scheduleID`, `Day`, `startDate`, `endDate`, `startTime`, `endTime`, `classID`) VALUES
(1, NULL, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, NULL, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, NULL, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, NULL, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, NULL, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skilllevels`
--

CREATE TABLE `skilllevels` (
  `skillLevelID` int(11) NOT NULL,
  `SkillName` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skilllevels`
--

INSERT INTO `skilllevels` (`skillLevelID`, `SkillName`) VALUES
(1, 'Expert'),
(2, 'Proficient'),
(3, 'Novice'),
(4, 'Begginer');

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
-- Table structure for table `unitofmeasurement`
--

CREATE TABLE `unitofmeasurement` (
  `unitMID` int(11) NOT NULL,
  `unitName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unitofmeasurement`
--

INSERT INTO `unitofmeasurement` (`unitMID`, `unitName`) VALUES
(1, 'tonne'),
(2, 'kilogram'),
(3, 'hectogram'),
(4, 'decagram'),
(5, 'gram'),
(6, 'decigram'),
(7, 'centigram'),
(8, 'milligram'),
(9, 'teaspoon'),
(10, 'tablespoon'),
(11, 'saltspoon'),
(12, 'coffeespoon'),
(13, 'fluid dram'),
(14, 'fluid ounce'),
(15, 'gill'),
(16, 'cup'),
(17, 'pint'),
(18, 'quart'),
(19, 'gallon'),
(20, 'milliliter'),
(21, 'liter'),
(22, 'deciliter'),
(23, 'pound'),
(24, 'ounce'),
(25, 'millimeter'),
(26, 'centimeter'),
(27, 'meter'),
(28, 'inch'),
(29, 'drop'),
(30, 'pinch'),
(31, 'dash'),
(32, 'smidgen');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `profileID` int(11) NOT NULL,
  `age` char(2) DEFAULT NULL,
  `gender` char(6) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `addressID` int(11) DEFAULT NULL,
  `contactno` char(64) DEFAULT NULL,
  `aboutme` varchar(320) DEFAULT NULL,
  `pictureID` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`profileID`, `age`, `gender`, `birthday`, `addressID`, `contactno`, `aboutme`, `pictureID`, `userID`) VALUES
(33, '21', 'mail', '2022-02-03', 52, '223', '22333', 83, 71),
(34, '21', 'mail', '2022-02-03', 0, '224', '223', NULL, 72),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 74),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75);

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
(72, 'Emailed', 'marklinsangan@pts-thesis.website', '$2y$10$siyrr8YoaHgT4i8LoNXEDuWTYctRDrsIx3P8j1rzU1kyL8Pl4dtju', 'Oscar', 'Ruby', 4, 1, '', '0000-00-00 00:00:00', NULL, '2022-02-15 11:57:39', '2022-02-19 02:29:10'),
(73, 'henrickL35', 'markhenrick.linsangan@gmail.com', '$2y$10$HDhZdfIQSl9JzyrOz865Hu71WOYYtTpg2liD8o2odxR8Fx1F4sIMG', 'mark', 'linsangan', 4, 0, '$2y$10$w6JyeTk8n0z4rpnCBwj7OeldJpvmS3gbGqa94sz4WYecmSO05JfFa', '2022-02-19 09:08:12', NULL, '2022-02-18 08:08:12', '2022-02-18 16:08:12'),
(74, 'Gen', 'genesisfragas8972@gmail.com', '$2y$10$F.EfebxFOxbOZ2/PNcS1QeqgnuvMi/OcP18Xh8unl8tXlOC/2jEkq', 'Genesis', 'Fragas', 4, 1, '$2y$10$GslqMVdYVkqbvRxynsJP1e.7Efd7u0rL8kRkBhyrOZtL5og6P4q66', '2022-03-02 12:01:13', '2022-03-01 19:02:09', '2022-03-01 11:01:13', '2022-03-01 19:02:09'),
(75, 'lolgen', 'lolplayer545@gmail.com', '$2y$10$UMHR75Ur0664Pm.5HtT/yuffk201TpzPd/VG9g4QHgLDe.NAwG.c2', 'Genesis', 'Fragas', 3, 1, '$2y$10$BerfOPTrvJtZl3TBFCnG.eE8BUFtxbUrfoFLc3GlVjsZHbZsMFzeC', '2022-03-02 12:06:16', '2022-03-01 19:08:13', '2022-03-01 11:06:16', '2022-03-01 19:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `videofiles`
--

CREATE TABLE `videofiles` (
  `vidID` int(11) NOT NULL,
  `vidTitle` varchar(320) NOT NULL,
  `vidDesc` varchar(320) NOT NULL,
  `vidTags` varchar(320) NOT NULL,
  `vidPath` varchar(320) NOT NULL,
  `youtubeVidID` varchar(12) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videofiles`
--

INSERT INTO `videofiles` (`vidID`, `vidTitle`, `vidDesc`, `vidTags`, `vidPath`, `youtubeVidID`, `userID`) VALUES
(1, 'sample', 'sample', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpC9B1.tmp', '', 0),
(2, 'sample', 'saee', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php26AE.tmp', '', 0),
(3, 'sample', 'ewefawf', 'aewf', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php80CC.tmp', '', 0),
(4, 'samplewq', 'dsaef', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php7CF.tmp', '', 0),
(5, 'sample', 'jknwaef', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpD5DA.tmp', '', 0),
(6, 'sample', 'jnbjhbjh', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php5CEA.tmp', '', 0),
(7, 'sample', 'awewefaw', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpFB8F.tmp', '', 0),
(8, 'sample', 'awefawef', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpCF4B.tmp', '', 0),
(9, 'sample', 'arergaer', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php4324.tmp', '', 0),
(10, 'sample', 'gvkghvkhgvkhgv', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpCF6D.tmp', '', 0),
(11, 'sample', 'gvkghvkhgvkhgv', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php6277.tmp', '', 0),
(12, 'sample', 'igvigvig', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpCFCC.tmp', '', 0),
(13, 'sample', 'jlknvlkjnfb', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php103C.tmp', '', 0),
(14, 'sample', 'kjnkjnjnjknxccc', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php32DA.tmp', '', 0),
(15, 'sample', 'xXvvvvff', 'aewf', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php5043.tmp', '', 0),
(16, 'sample', 'xkjjnjn nohjohj ohojhb', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php8A47.tmp', '', 0),
(17, 'sample', '2/22/2022', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php7F39.tmp', '', 0),
(18, 'samuel&#39;s Triple kill', '2/22/2022 terrence&#39;s 3 kill in valorant', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php968E.tmp', '', 0),
(19, 'samuel&#39;s Triple kill', '2/22/2022 terrence&#39;s 3 kill in valorant', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php71E6.tmp', '', 0),
(20, 'samuel&#39;s Triple kill', '2/22/2022 terrence&#39;s 3 kill in valorant', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpF673.tmp', '', 0),
(21, 'samuel&#39;s Triple kill', '2/22/2022 terrence&#39;s 3 kills in valorant', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php33B7.tmp', '', 0),
(22, 'samuel&#39;s Triple kill', '2/22/2022 terrence&#39;s 3 kills in valorant', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php537.tmp', '', 0),
(23, 'samuel&#39;s Triple kill', '2/22/2022 terrence&#39;s 3 kills in valorant', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpDCAC.tmp', '', 0),
(24, 'samuel&#39;s Triple kill', '2/22/2022 Terrence&#39;s 3 kill in valorant', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php616F.tmp', '', 0),
(25, 'free', 'mmndnjd ipjniojnew ionoawj', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php957D.tmp', '', 0),
(26, 'proof of cheating in unranked', 'Proof of cheating in R6 unranked captured by Denbaster', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php21A7.tmp', '', 0),
(27, 'proof of cheating in unranked', 'Proof of cheating in R6 unranked captured by Denbaster', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php23B6.tmp', '', 0),
(28, 'proof of cheating in unranked', 'Proof of cheating in R6 unranked captured by Denbaster', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpD17B.tmp', '', 0),
(29, 'proof of cheating in unranked', 'Proof of cheating in R6 unranked captured by Denbaster', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php528E.tmp', '', 0),
(30, 'Samuel&#39;s Wining Round', 'Kill n defuse in valorant captured', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php9EC0.tmp', '', 0),
(31, 'Samuel&#39;s Wining Round', 'Kill n defuse in valorant captured', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/phpFB58.tmp', '', 0),
(32, 'sample', 'Proof of cheating in R6 unranked captured by Denbaster', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php13C8.tmp', '0j8vOtqn6kw', 0),
(33, 'Valorant defuse twitch', 'twitch capture of terrence&#39;s defuse in valorant', 'valorant', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php2F2E.tmp', 'Yj3xmVo0A5k', 0),
(34, 'Dark Room', 'sample video of a dark room', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php2A6A.tmp', '', 0),
(35, 'Dark Room', 'sample video of a dark room', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php3782.tmp', '', 0),
(36, 'Dark Room', 'sample of YOUTUBE API insert', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php9622.tmp', '', 0),
(37, 'Dark Room', 'sample youtube api insert', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php3BE1.tmp', 'lR-u5iHozBo', 0),
(38, 'Stew Delight_intro', 'intro vid of stew Delight', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php60B0.tmp', 'chgqMTBn-Pg', 0),
(39, 'Stew Delight_intro2', 'Home to all thing Stewed', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php5A3E.tmp', 'Y_rjAgzwKDA', 0),
(40, 'Make ice Cream', 'a short video in the subject of ice cream making', 'sample', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\loggedin/../../public/Writable/php430B.tmp', 'VUbTYrGPOY8', 0);

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
  ADD KEY `fk_file_ID` (`fileID`),
  ADD KEY `fk_class_ID` (`classID`),
  ADD KEY `fk_enrollment_ID` (`userID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `fk_milestoneID` (`mileStoneID`),
  ADD KEY `fk_userIDClass` (`userID`),
  ADD KEY `fk_testID` (`testID`);

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
-- Indexes for table `equivalenthours`
--
ALTER TABLE `equivalenthours`
  ADD PRIMARY KEY (`equivalentHoursID`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`feeID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `fk_orderID` (`orderID`);

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
-- Indexes for table `paymentlist`
--
ALTER TABLE `paymentlist`
  ADD PRIMARY KEY (`paylistID`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`paymethodID`);

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
-- Indexes for table `skilllevels`
--
ALTER TABLE `skilllevels`
  ADD PRIMARY KEY (`skillLevelID`);

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
-- Indexes for table `unitofmeasurement`
--
ALTER TABLE `unitofmeasurement`
  ADD PRIMARY KEY (`unitMID`);

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
-- Indexes for table `videofiles`
--
ALTER TABLE `videofiles`
  ADD PRIMARY KEY (`vidID`);

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
  MODIFY `auditID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1456;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `blacklistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classcontent`
--
ALTER TABLE `classcontent`
  MODIFY `classContentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `moduleID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `classprofile`
--
ALTER TABLE `classprofile`
  MODIFY `classProfileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classstones`
--
ALTER TABLE `classstones`
  MODIFY `classtone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debugfiles`
--
ALTER TABLE `debugfiles`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
-- AUTO_INCREMENT for table `equivalenthours`
--
ALTER TABLE `equivalenthours`
  MODIFY `equivalentHoursID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `feeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meetingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milestone`
--
ALTER TABLE `milestone`
  MODIFY `mileStoneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `paymentlist`
--
ALTER TABLE `paymentlist`
  MODIFY `paylistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `paymethodID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skilllevels`
--
ALTER TABLE `skilllevels`
  MODIFY `skillLevelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `unitofmeasurement`
--
ALTER TABLE `unitofmeasurement`
  MODIFY `unitMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `videofiles`
--
ALTER TABLE `videofiles`
  MODIFY `vidID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  ADD CONSTRAINT `certificates_ibfk_3` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `certificates_ibfk_4` FOREIGN KEY (`earnedID`) REFERENCES `milestoneearned` (`earnedID`);

--
-- Constraints for table `classcontent`
--
ALTER TABLE `classcontent`
  ADD CONSTRAINT `fk_class_ID` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `fk_enrollment_ID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
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
