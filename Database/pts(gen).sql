CREATE DATABASE pts;

CREATE TABLE classStatus (
  classStatusID int NOT NULL AUTO_INCREMENT,
  coordinatorID int NOT NULL,
  status varchar(25),
  PRIMARY KEY (classStatusID),
  FOREIGN KEY (coordinatorID) REFERENCES Coordinator(coordinatorID)
);

CREATE TABLE AccessLevel (
  accessID int NOT NULL AUTO_INCREMENT,
  accessType varchar(64),
  description varchar(64),
  PRIMARY KEY (accessID)
);

CREATE TABLE Enrolled (
  enrollmentID int NOT NULL AUTO_INCREMENT,
  learnerID int NOT NULL,
  classID int NOT NULL,
  accessID int NOT NULL,
  transcationID int NOT NULL,
  scheduleID int NOT NULL,
  PRIMARY KEY (enrollmentID),
  FOREIGN KEY (accessID) REFERENCES AccessLevel(accessID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (classID) REFERENCES Class(classID),
  FOREIGN KEY (transactionID) REFERENCES Transaction(transactionID),
  FOREIGN KEY (scheduleID) REFERENCES Schedule(scheduleID)
);

CREATE TABLE Blacklist (
  blacklistID int NOT NULL AUTO_INCREMENT,
  status char(64),
  description varchar(64),
  PRIMARY KEY (blacklistID)
);

CREATE TABLE Profile (
  profileID int NOT NULL AUTO_INCREMENT,
  age char(2),
  gender char(6),
  birthday date(10),
  address char(64),
  contactno char(64),
  aboutme varchar(96),
  creationDate datetime(23),
  PRIMARY KEY (profileID)
);

CREATE TABLE Users (
  userID int NOT NULL AUTO_INCREMENT,
  email char(64),
  password char(64),
  firstname char(64),
  lastName char(64),
  creationDate datetime(23),
  modifiedDate datetime(23),
  profileID int NOT NULL,
  blacklistID int NOT NULL,
  auditID int NOT NULL,
  PRIMARY KEY (userID),
  FOREIGN KEY (profileID) REFERENCES Profile(profileID),
  FOREIGN KEY (blacklistID) REFERENCES Blacklist(blacklistID),
  FOREIGN KEY (auditID) REFERENCES AuditTrail(auditID)
);

CREATE TABLE ReviewCards (
  reviewID int NOT NULL AUTO_INCREMENT,
  description varchar(50),
  content float(10),
  presentation float(10),
  attendance float(10),
  legibility float(10),
  totalRating float(2),
  userID int NOT NULL,
  PRIMARY KEY (reviewID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE ClassProfile (
  classProfileID int NOT NULL AUTO_INCREMENT,
  className varchar(96),
  classDescription varchar(96),
  classDate date(23),
  classStatus varchar(25),
  videoAddress varchar(64),
  imageAddress varchar(64),
  modifiedDate datetime(23),
  equivalentHours varchar(64),
  skillLevel varchar(64),
  PRIMARY KEY (classProfileID)
);

CREATE TABLE Instructor (
  instructorID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (instructorID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Class (
  classID int NOT NULL AUTO_INCREMENT,
  className varchar(64),
  classStatus varchar(64),
  creationDate datetime(23),
  modefiedDate datetime(23),
  availabilityID int NOT NULL,
  reviewID int NOT NULL,
  instructorID int NOT NULL,
  classContentID int NOT NULL,
  classProfileID int NOT NULL,
  classStatusID int NOT NULL,
  enrollmentID int NOT NULL,
  mileStoneID int NOT NULL,
  testID int NOT NULL,
  PRIMARY KEY (classID),
  FOREIGN KEY (availabilityID) REFERENCES Availability(availabilityID),
  FOREIGN KEY (reviewID) REFERENCES ReviewCards(reviewID),
  FOREIGN KEY (instructorID) REFERENCES Instructor(instructorID),
  FOREIGN KEY (classContentID) REFERENCES ClassContent(classContentID),
  FOREIGN KEY (classProfileID) REFERENCES ClassProfile(classprofileID),
  FOREIGN KEY (classStatusID) REFERENCES ClassStatus(classStatusID),
  FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID),
  FOREIGN KEY (mileStoneID) REFERENCES Milestone(mileStoneID),
  FOREIGN KEY (testID) REFERENCES Test(testID)
);

CREATE TABLE PaymentRequest (
  payRequestID int NOT NULL AUTO_INCREMENT,
  amount varchar(64),
  paymentAddress varchar(64),
  fileAddress varchar(64),
  classID int NOT NULL,
  userID int NOT NULL,
  learnerID int NOT NULL,
  PRIMARY KEY (payRequestID),
  FOREIGN KEY (classID) REFERENCES Class(classID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID)
);

CREATE TABLE ClassContent (
  classContentID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  datePosted datetime(23),
  dateModified datetime(23),
  enrollmentID int NOT NULL,
  meetingID int NOT NULL,
  fileID int NOT NULL,
  classID int NOT NULL,
  PRIMARY KEY (classContentID),
  FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID),
  FOREIGN KEY (meetingID) REFERENCES Meeting(meetingID),
  FOREIGN KEY (fileID) REFERENCES FileContent(fileID),
  FOREIGN KEY (classID) REFERENCES Class(classID)
);

CREATE TABLE Profit (
  profitID int NOT NULL AUTO_INCREMENT,
  profitDate datetime(23),
  profitStatus varchar(96),
  packageID int NOT NULL,
  transactionID int NOT NULL,
  classID int NOT NULL,
  PRIMARY KEY (profitID),
  FOREIGN KEY (classID) REFERENCES Class(classID),
  FOREIGN KEY (packageID) REFERENCES Package(packageID),
  FOREIGN KEY (transactionID) REFERENCES Transaction(transactionID)
);

CREATE TABLE FileContent (
  fileID int NOT NULL AUTO_INCREMENT,
  fileName varchar(96),
  filePath varchar(96),
  datePosted datetime(23),
  dateModified datetime(23),
  userID int NOT NULL,
  classContentID int NOT NULL,
  PRIMARY KEY (fileID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (classContentID) REFERENCES ClassContent(classContentID)
);

CREATE TABLE Learner (
  learnerID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (learnerID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE ActionType (
  actionID int NOT NULL AUTO_INCREMENT,
  actionType char(64),
  PRIMARY KEY (actionID)
);

CREATE TABLE PaymentStatus (
  paymentStatusID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  PRIMARY KEY (paymentStatusID)
);

CREATE TABLE Transaction (
  transactionID int NOT NULL AUTO_INCREMENT,
  dateOfPayment datetime(23),
  imageAddress char(64),
  paymentStatusID int NOT NULL,
  userID int NOT NULL,
  transactiontypeID int NOT NULL,
  PRIMARY KEY (transactionID),
  FOREIGN KEY (paymentStatusID) REFERENCES PaymentStatus(paymentStatusID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (transactiontypeID) REFERENCES TransactionType(transactionTypeID)
);

CREATE TABLE AuditTrail (
  auditID int NOT NULL AUTO_INCREMENT,
  Log char(64),
  tableName char(64),
  userID int NOT NULL,
  actionID int NOT NULL,
  PRIMARY KEY (auditID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (actionID) REFERENCES ActionType(actionID)
);

CREATE TABLE Coordinator (
  coordinatorID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (coordinatorID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Availability (
  availablityID int NOT NULL AUTO_INCREMENT,
  availableDate date(23),
  availableSlots int(2),
  PRIMARY KEY (availablityID)
);

CREATE TABLE Milestone (
  mileStoneID int NOT NULL AUTO_INCREMENT,
  descriptoin varchar(50),
  Mtrigger varchar(25),
  classID int NOT NULL,
  earnedID int NOT NULL,
  PRIMARY KEY (mileStoneID)
);

CREATE TABLE Certificate (
  certificateID int NOT NULL AUTO_INCREMENT,
  description varchar(50),
  userID int NOT NULL,
  learnerID int NOT NULL,
  classID int NOT NULL,
  earnedID int NOT NULL,
  PRIMARY KEY (certificateID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (classID) REFERENCES Class(classID),
  FOREIGN KEY (earnedID) REFERENCES MileStoneEarned(earnedID)
);

CREATE TABLE ClassList (
  classlistID int NOT NULL AUTO_INCREMENT,
  learnerID int NOT NULL,
  enrollmentID int NOT NULL,
  accessID int NOT NULL,
  PRIMARY KEY (classlistID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID),
  FOREIGN KEY (accessID) REFERENCES AccessLevel(accessID)
);

CREATE TABLE Refund (
  refundID int NOT NULL AUTO_INCREMENT,
  reason varchar(64),
  evidence varchar(64),
  paymentAddress varchar(96),
  userID int NOT NULL,
  enrollmentID int NOT NULL,
  PRIMARY KEY (refundID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID)
);

CREATE TABLE MileStoneEarned (
  earnedID int NOT NULL AUTO_INCREMENT,
  dateEarned datetime(23),
  learnerID int NOT NULL,
  milestoneID int NOT NULL,
  PRIMARY KEY (earnedID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (milestoneID) REFERENCES Milestone(milestoneID)
);

CREATE TABLE TransactionType (
  transactionTypeID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  PRIMARY KEY (transactionTypeID)
);

CREATE TABLE Package (
  packageID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  PRIMARY KEY (packageID)
);

CREATE TABLE Test (
  testID int NOT NULL AUTO_INCREMENT,
  testName char(64),
  testDescription char(64),
  testType char(64),
  meetingLink varchar(64),
  result char(100),
  questionnaireID iNT NOT NULL,
  PRIMARY KEY (testID),
  FOREIGN KEY (questionnaireID) REFERENCES Questionnaire(questionnaireID),
);

CREATE TABLE Questionnaire (
  questionnaireID int NOT NULL AUTO_INCREMENT,
  question char(64),
  answer varchar(96),
  points float(5),
  PRIMARY KEY (questionnaireID)
);

CREATE TABLE Schedule (
  scheduleID int NOT NULL AUTO_INCREMENT,
  startDate datetime(23),
  endDate datetime(23),
  PRIMARY KEY (scheduleID)
);

CREATE TABLE Meeting (
  meetingID int NOT NULL AUTO_INCREMENT,
  meetingLink varchar(64),
  TimeDate datetime(23),
  learnerID int NOT NULL,
  instructorID int NOT NULL,
  PRIMARY KEY (meetingID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (instructorID) REFERENCES Instructor(instructorID)
);

CREATE TABLE Order (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `dateRequest` <type>,
  `numberoforder` <type>,
  `orderStatus` <type>,
  `packageID` <type>,
  `learnerID` <type>,
  `classID` <type>,
  `procurementID` <type>,
  PRIMARY KEY (`orderID`),
  FOREIGN KEY (`orderID`) REFERENCES `Learner`(`learnerID`)
);

CREATE TABLE `Admin` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `userID` <type>,
  `roleType` <type>,
  PRIMARY KEY (`adminID`),
  FOREIGN KEY (`userID`) REFERENCES `Users`(`auditID`)
);

CREATE TABLE `Delivery` (
  `deliveryID` int NOT NULL AUTO_INCREMENT,
  `deliveryDate` <type>,
  `packageID` <type>,
  `learnerID` <type>,
  `orderID` <type>,
  `procurementID` <type>,
  PRIMARY KEY (`deliveryID`)
);

CREATE TABLE `Procurement` (
  `procurementID` int NOT NULL AUTO_INCREMENT,
  `userID` <type>,
  `roleType` <type>,
  PRIMARY KEY (`procurementID`)
);

