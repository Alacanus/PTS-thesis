-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 12:33 PM
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
  `youtubeChannel` varchar(320) NOT NULL,
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

--
-- Dumping data for table `debugfiles`
--

INSERT INTO `debugfiles` (`fileID`, `fileName`, `filePath`, `datePosted`, `dateModified`, `userID`, `classID`) VALUES
(73, 'SM-placeholder.png', 'C:\\xampp\\htdocs\\PTS-thesis\\src\\inc/../../Writable/SM-placeholder.png', '2022-02-20 19:29:59', '2022-02-20 19:30:41', 0, '');

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
  `pictureID` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `auditID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `blacklistID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `moduleID` int(8) NOT NULL AUTO_INCREMENT;

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
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meetingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milestone`
--
ALTER TABLE `milestone`
  MODIFY `mileStoneID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentrequest`
--
ALTER TABLE `paymentrequest`
  MODIFY `payRequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentstatus`
--
ALTER TABLE `paymentstatus`
  MODIFY `paymentStatusID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
  MODIFY `profitID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `questionnaireID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactiontype`
--
ALTER TABLE `transactiontype`
  MODIFY `transactionTypeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

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
