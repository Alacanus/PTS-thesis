-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 06:43 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pts`
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

-- --------------------------------------------------------

--
-- Table structure for table `actiontype`
--

CREATE TABLE `actiontype` (
  `actionID` int(11) NOT NULL,
  `actionType` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roleType` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `auditID` int(11) NOT NULL,
  `Log` char(64) DEFAULT NULL,
  `tableName` char(64) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `actionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `availID` int(11) NOT NULL,
  `availableDate` varchar(16) DEFAULT NULL,
  `availableSlots` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `blacklistID` int(11) NOT NULL,
  `status` char(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificateID` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `learnerID` int(11) NOT NULL,
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
  `datePosted` varchar(16) DEFAULT NULL,
  `dateModified` varchar(16) DEFAULT NULL,
  `enrollmentID` int(11) NOT NULL,
  `meetingID` int(11) NOT NULL,
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
  `creationDate` varchar(16) DEFAULT NULL,
  `modefiedDate` varchar(16) DEFAULT NULL,
  `availID` int(11) NOT NULL,
  `reviewID` int(11) NOT NULL,
  `instructorID` int(11) NOT NULL,
  `classContentID` int(11) NOT NULL,
  `classProfileID` int(11) NOT NULL,
  `classStatusID` int(11) NOT NULL,
  `enrollmentID` int(11) NOT NULL,
  `mileStoneID` int(11) NOT NULL,
  `testID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classlist`
--

CREATE TABLE `classlist` (
  `classlistID` int(11) NOT NULL,
  `learnerID` int(11) NOT NULL,
  `enrollmentID` int(11) NOT NULL,
  `accessID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classprofile`
--

CREATE TABLE `classprofile` (
  `classProfileID` int(11) NOT NULL,
  `className` varchar(96) DEFAULT NULL,
  `classDescription` varchar(96) DEFAULT NULL,
  `classDate` varchar(16) DEFAULT NULL,
  `classStatus` varchar(25) DEFAULT NULL,
  `videoAddress` varchar(64) DEFAULT NULL,
  `imageAddress` varchar(64) DEFAULT NULL,
  `modifiedDate` varchar(16) DEFAULT NULL,
  `equivalentHours` varchar(64) DEFAULT NULL,
  `skillLevel` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classstatus`
--

CREATE TABLE `classstatus` (
  `classStatusID` int(11) NOT NULL,
  `coordinatorID` int(11) NOT NULL,
  `Cstatus` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `coordinatorID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roleType` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `deliveryID` int(11) NOT NULL,
  `deliveryDate` varchar(16) DEFAULT NULL,
  `packageID` int(11) NOT NULL,
  `learnerID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `procurementID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `enrollmentID` int(11) NOT NULL,
  `learnerID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `accessID` int(11) NOT NULL,
  `transactionID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `filecontent`
--

CREATE TABLE `filecontent` (
  `fileID` int(11) NOT NULL,
  `fileName` varchar(96) DEFAULT NULL,
  `filePath` varchar(96) DEFAULT NULL,
  `datePosted` varchar(16) DEFAULT NULL,
  `dateModified` varchar(16) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `classContentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructorID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roleType` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `learner`
--

CREATE TABLE `learner` (
  `learnerID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roleType` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meetingID` int(11) NOT NULL,
  `meetingLink` varchar(64) DEFAULT NULL,
  `TimeDate` varchar(16) DEFAULT NULL,
  `learnerID` int(11) NOT NULL,
  `instructorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE `milestone` (
  `mileStoneID` int(11) NOT NULL,
  `descriptoin` varchar(50) DEFAULT NULL,
  `Mtrigger` varchar(25) DEFAULT NULL,
  `classID` int(11) NOT NULL,
  `earnedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `milestoneearned`
--

CREATE TABLE `milestoneearned` (
  `earnedID` int(11) NOT NULL,
  `dateEarned` varchar(16) DEFAULT NULL,
  `learnerID` int(11) NOT NULL,
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
  `learnerID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `procurementID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(11) NOT NULL,
  `description` varchar(64) DEFAULT NULL
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
  `learnerID` int(11) NOT NULL
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
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `procurementID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roleType` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `profitID` int(11) NOT NULL,
  `profitDate` varchar(16) DEFAULT NULL,
  `profitStatus` varchar(96) DEFAULT NULL,
  `packageID` int(11) NOT NULL,
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
  `points` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refundID` int(11) NOT NULL,
  `reason` varchar(64) DEFAULT NULL,
  `evidence` varchar(64) DEFAULT NULL,
  `paymentAddress` varchar(96) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `enrollmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviewcards`
--

CREATE TABLE `reviewcards` (
  `reviewID` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `content` float DEFAULT NULL,
  `presentation` float DEFAULT NULL,
  `attendance` float DEFAULT NULL,
  `legibility` float DEFAULT NULL,
  `totalRating` float DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `scheduleID` int(11) NOT NULL,
  `startDate` varchar(16) DEFAULT NULL,
  `endDate` varchar(16) DEFAULT NULL
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
  `birthday` varchar(8) DEFAULT NULL,
  `address` char(64) DEFAULT NULL,
  `contactno` char(64) DEFAULT NULL,
  `aboutme` varchar(96) DEFAULT NULL,
  `creationDate` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` char(64) DEFAULT NULL,
  `password` char(64) DEFAULT NULL,
  `firstname` char(64) DEFAULT NULL,
  `lastName` char(64) DEFAULT NULL,
  `creationDate` varchar(16) DEFAULT NULL,
  `modifiedDate` varchar(16) DEFAULT NULL,
  `profileID` int(11) NOT NULL,
  `blacklistID` int(11) NOT NULL,
  `auditID` int(11) NOT NULL
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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD PRIMARY KEY (`auditID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `actionID` (`actionID`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availID`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`blacklistID`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificateID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `learnerID` (`learnerID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `fk_earnedID` (`earnedID`);

--
-- Indexes for table `classcontent`
--
ALTER TABLE `classcontent`
  ADD PRIMARY KEY (`classContentID`),
  ADD KEY `fk_enrollment_ID` (`enrollmentID`),
  ADD KEY `fk_meeting_ID` (`meetingID`),
  ADD KEY `fk_fileID_ID` (`fileID`),
  ADD KEY `fk_class_ID` (`classID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `fk_availID` (`availID`),
  ADD KEY `fk_reviewID` (`reviewID`),
  ADD KEY `fk_instructorID` (`instructorID`),
  ADD KEY `fk_classContentID` (`classContentID`),
  ADD KEY `fk_classProfileID` (`classProfileID`),
  ADD KEY `fk_classStatusID` (`classStatusID`),
  ADD KEY `fk_enrollmentID` (`enrollmentID`),
  ADD KEY `fk_milestoneID` (`mileStoneID`),
  ADD KEY `fk_testID` (`testID`);

--
-- Indexes for table `classlist`
--
ALTER TABLE `classlist`
  ADD PRIMARY KEY (`classlistID`),
  ADD KEY `learnerID` (`learnerID`),
  ADD KEY `enrollmentID` (`enrollmentID`),
  ADD KEY `accessID` (`accessID`);

--
-- Indexes for table `classprofile`
--
ALTER TABLE `classprofile`
  ADD PRIMARY KEY (`classProfileID`);

--
-- Indexes for table `classstatus`
--
ALTER TABLE `classstatus`
  ADD PRIMARY KEY (`classStatusID`),
  ADD KEY `coordinatorID` (`coordinatorID`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`coordinatorID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`deliveryID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `learnerID` (`learnerID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `procurementID` (`procurementID`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`enrollmentID`),
  ADD KEY `fk_accessID` (`accessID`),
  ADD KEY `fk_learnerID` (`learnerID`),
  ADD KEY `fk_classID` (`classID`),
  ADD KEY `fk_transactionID` (`transactionID`),
  ADD KEY `fk_scheduleID` (`scheduleID`);

--
-- Indexes for table `filecontent`
--
ALTER TABLE `filecontent`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `classContentID` (`classContentID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`learnerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meetingID`),
  ADD KEY `learnerID` (`learnerID`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`mileStoneID`);

--
-- Indexes for table `milestoneearned`
--
ALTER TABLE `milestoneearned`
  ADD PRIMARY KEY (`earnedID`),
  ADD KEY `learnerID` (`learnerID`),
  ADD KEY `milestoneID` (`milestoneID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `learnerID` (`learnerID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `procurementID` (`procurementID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `paymentrequest`
--
ALTER TABLE `paymentrequest`
  ADD PRIMARY KEY (`payRequestID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `learnerID` (`learnerID`);

--
-- Indexes for table `paymentstatus`
--
ALTER TABLE `paymentstatus`
  ADD PRIMARY KEY (`paymentStatusID`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`procurementID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`profitID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `transactionID` (`transactionID`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`questionnaireID`);

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
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `questionnaireID` (`questionnaireID`);

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
  ADD PRIMARY KEY (`profileID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `fk_profileID` (`profileID`),
  ADD KEY `fk_blacklistID` (`blacklistID`),
  ADD KEY `fk_auditID` (`auditID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `accessID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `actiontype`
--
ALTER TABLE `actiontype`
  MODIFY `actionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audittrail`
--
ALTER TABLE `audittrail`
  MODIFY `auditID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `availID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `blacklistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
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
-- AUTO_INCREMENT for table `classlist`
--
ALTER TABLE `classlist`
  MODIFY `classlistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classprofile`
--
ALTER TABLE `classprofile`
  MODIFY `classProfileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classstatus`
--
ALTER TABLE `classstatus`
  MODIFY `classStatusID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coordinator`
--
ALTER TABLE `coordinator`
  MODIFY `coordinatorID` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `filecontent`
--
ALTER TABLE `filecontent`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learner`
--
ALTER TABLE `learner`
  MODIFY `learnerID` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `procurementID` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD CONSTRAINT `audittrail_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `audittrail_ibfk_2` FOREIGN KEY (`actionID`) REFERENCES `actiontype` (`actionID`);

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`learnerID`) REFERENCES `learner` (`learnerID`),
  ADD CONSTRAINT `certificate_ibfk_3` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `fk_earnedID` FOREIGN KEY (`earnedID`) REFERENCES `milestoneearned` (`earnedID`);

--
-- Constraints for table `classcontent`
--
ALTER TABLE `classcontent`
  ADD CONSTRAINT `fk_class_ID` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `fk_enrollment_ID` FOREIGN KEY (`enrollmentID`) REFERENCES `enrolled` (`enrollmentID`),
  ADD CONSTRAINT `fk_fileID` FOREIGN KEY (`fileID`) REFERENCES `filecontent` (`fileID`),
  ADD CONSTRAINT `fk_fileID_ID` FOREIGN KEY (`fileID`) REFERENCES `filecontent` (`fileID`),
  ADD CONSTRAINT `fk_meetingID` FOREIGN KEY (`meetingID`) REFERENCES `meeting` (`meetingID`),
  ADD CONSTRAINT `fk_meeting_ID` FOREIGN KEY (`meetingID`) REFERENCES `meeting` (`meetingID`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `fk_availID` FOREIGN KEY (`availID`) REFERENCES `availability` (`availID`),
  ADD CONSTRAINT `fk_classContentID` FOREIGN KEY (`classContentID`) REFERENCES `classcontent` (`classContentID`),
  ADD CONSTRAINT `fk_classProfileID` FOREIGN KEY (`classProfileID`) REFERENCES `classprofile` (`classProfileID`),
  ADD CONSTRAINT `fk_classStatusID` FOREIGN KEY (`classStatusID`) REFERENCES `classstatus` (`classStatusID`),
  ADD CONSTRAINT `fk_enrollmentID` FOREIGN KEY (`enrollmentID`) REFERENCES `enrolled` (`enrollmentID`),
  ADD CONSTRAINT `fk_instructorID` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructorID`),
  ADD CONSTRAINT `fk_milestoneID` FOREIGN KEY (`mileStoneID`) REFERENCES `milestone` (`mileStoneID`),
  ADD CONSTRAINT `fk_reviewID` FOREIGN KEY (`reviewID`) REFERENCES `reviewcards` (`reviewID`),
  ADD CONSTRAINT `fk_testID` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`);

--
-- Constraints for table `classlist`
--
ALTER TABLE `classlist`
  ADD CONSTRAINT `classlist_ibfk_1` FOREIGN KEY (`learnerID`) REFERENCES `learner` (`learnerID`),
  ADD CONSTRAINT `classlist_ibfk_2` FOREIGN KEY (`enrollmentID`) REFERENCES `enrolled` (`enrollmentID`),
  ADD CONSTRAINT `classlist_ibfk_3` FOREIGN KEY (`accessID`) REFERENCES `accesslevel` (`accessID`);

--
-- Constraints for table `classstatus`
--
ALTER TABLE `classstatus`
  ADD CONSTRAINT `classstatus_ibfk_1` FOREIGN KEY (`coordinatorID`) REFERENCES `coordinator` (`coordinatorID`);

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `coordinator_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`learnerID`) REFERENCES `learner` (`learnerID`),
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `delivery_ibfk_4` FOREIGN KEY (`procurementID`) REFERENCES `procurement` (`procurementID`);

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `fk_accessID` FOREIGN KEY (`accessID`) REFERENCES `accesslevel` (`accessID`),
  ADD CONSTRAINT `fk_classID` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `fk_learnerID` FOREIGN KEY (`learnerID`) REFERENCES `learner` (`learnerID`),
  ADD CONSTRAINT `fk_scheduleID` FOREIGN KEY (`scheduleID`) REFERENCES `schedules` (`scheduleID`),
  ADD CONSTRAINT `fk_transactionID` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

--
-- Constraints for table `filecontent`
--
ALTER TABLE `filecontent`
  ADD CONSTRAINT `filecontent_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `filecontent_ibfk_2` FOREIGN KEY (`classContentID`) REFERENCES `classcontent` (`classContentID`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `learner`
--
ALTER TABLE `learner`
  ADD CONSTRAINT `learner_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`learnerID`) REFERENCES `learner` (`learnerID`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructorID`);

--
-- Constraints for table `milestoneearned`
--
ALTER TABLE `milestoneearned`
  ADD CONSTRAINT `milestoneearned_ibfk_1` FOREIGN KEY (`learnerID`) REFERENCES `learner` (`learnerID`),
  ADD CONSTRAINT `milestoneearned_ibfk_2` FOREIGN KEY (`milestoneID`) REFERENCES `milestone` (`mileStoneID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`learnerID`) REFERENCES `learner` (`learnerID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`procurementID`) REFERENCES `procurement` (`procurementID`);

--
-- Constraints for table `paymentrequest`
--
ALTER TABLE `paymentrequest`
  ADD CONSTRAINT `paymentrequest_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `paymentrequest_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `paymentrequest_ibfk_3` FOREIGN KEY (`learnerID`) REFERENCES `learner` (`learnerID`);

--
-- Constraints for table `procurement`
--
ALTER TABLE `procurement`
  ADD CONSTRAINT `procurement_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `profit`
--
ALTER TABLE `profit`
  ADD CONSTRAINT `profit_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `profit_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`),
  ADD CONSTRAINT `profit_ibfk_3` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

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
  ADD CONSTRAINT `reviewcards_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`questionnaireID`) REFERENCES `questionnaire` (`questionnaireID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`paymentStatusID`) REFERENCES `paymentstatus` (`paymentStatusID`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`transactiontypeID`) REFERENCES `transactiontype` (`transactionTypeID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_auditID` FOREIGN KEY (`auditID`) REFERENCES `audittrail` (`auditID`),
  ADD CONSTRAINT `fk_blacklistID` FOREIGN KEY (`blacklistID`) REFERENCES `blacklist` (`blacklistID`),
  ADD CONSTRAINT `fk_profileID` FOREIGN KEY (`profileID`) REFERENCES `userprofile` (`profileID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
