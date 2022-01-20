CREATE DATABASE pts;

USE pts;

/* ---- Tables without Foreign Key ---- */
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

CREATE TABLE Questionnaire (
  questionnaireID int NOT NULL AUTO_INCREMENT,
  question char(64),
  answer varchar(96),
  points float(5),
  PRIMARY KEY (questionnaireID)
);

CREATE TABLE Schedules (
  scheduleID int NOT NULL AUTO_INCREMENT,
  startDate datetime NULL,
  endDate datetime NULL,
  PRIMARY KEY (scheduleID)
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

CREATE TABLE Blacklist (
  blacklistID int NOT NULL AUTO_INCREMENT,
  status char(64),
  description varchar(64),
  PRIMARY KEY (blacklistID)
);

CREATE TABLE Availability (
  availID int NOT NULL AUTO_INCREMENT,
  availableDate date NULL,
  availableTime timestamp NULL,
  availableSlots int(2),
  PRIMARY KEY (availID)
);

CREATE TABLE AccessLevel (
  accessID int NOT NULL AUTO_INCREMENT,
  accessType varchar(64),
  description varchar(64),
  PRIMARY KEY (accessID)
);

CREATE TABLE Milestone (
  mileStoneID int NOT NULL AUTO_INCREMENT,
  descriptoin varchar(50),
  Mtrigger varchar(25),
  classID int NOT NULL,
  earnedID int NOT NULL,
  PRIMARY KEY (mileStoneID)
);

/* ---- Users, Audit, & Type of Users Table ---- */

CREATE TABLE Users (
  userID int AUTO_INCREMENT,
  username char(64) DEFAULT NULL,
  email char(64) DEFAULT NULL,
  password char(64) DEFAULT NULL,
  firstname char(64) DEFAULT NULL,
  lastName char(64) DEFAULT NULL,
  profileID int(11) NOT NULL,
  blacklistID int(11) NOT NULL,
  auditID int(11) NOT NULL,
  active tinyint(1) DEFAULT 0,
  activation_code varchar(255) NOT NULL,
  activation_expiry datetime NOT NULL,
  activated_at datetime DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (userID)
);

CREATE TABLE UserProfile (
  profileID int NOT NULL AUTO_INCREMENT,
  age char(2),
  gender char(6),
  birthday date NULL,
  address char(64),
  contactno char(64),
  aboutme varchar(96),
  creationDate datetime,
  PRIMARY KEY (profileID)
);

CREATE TABLE Instructor (
  instructorID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (instructorID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Learner (
  learnerID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (learnerID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Procurement (
  procurementID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (procurementID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Admin (
  adminID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (adminID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Coordinator (
  coordinatorID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (coordinatorID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
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

ALTER TABLE Users ADD CONSTRAINT fk_profileID FOREIGN KEY (profileID) REFERENCES UserProfile(profileID);
ALTER TABLE Users ADD CONSTRAINT fk_blacklistID FOREIGN KEY (blacklistID) REFERENCES Blacklist(blacklistID);
ALTER TABLE Users ADD CONSTRAINT fk_auditID FOREIGN KEY (auditID) REFERENCES AuditTrail(auditID);

/* ---- Class Tables ---- */

CREATE TABLE ClassProfile (
  classProfileID int NOT NULL AUTO_INCREMENT,
  className varchar(96),
  classDescription varchar(96),
  classDate datetime NULL,
  classStatus varchar(25),
  videoAddress varchar(64),
  imageAddress varchar(64),
  modifiedDate varchar(16),
  equivalentHours varchar(64),
  skillLevel varchar(64),
  PRIMARY KEY (classProfileID)
);

CREATE TABLE classStatus (
  classStatusID int NOT NULL AUTO_INCREMENT,
  coordinatorID int NOT NULL,
  Cstatus varchar(25),
  PRIMARY KEY (classStatusID),
  FOREIGN KEY (coordinatorID) REFERENCES Coordinator(coordinatorID)
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

CREATE TABLE Classes (
  classID int NOT NULL AUTO_INCREMENT,
  className varchar(64),
  classStatus varchar(64),
  creationDate datetime NULL DEFAULT current_timestamp(),
  modefiedDate datetime NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  availID int NOT NULL,
  reviewID int NOT NULL,
  instructorID int NOT NULL,
  classContentID int NOT NULL,
  classProfileID int NOT NULL,
  classStatusID int NOT NULL,
  enrollmentID int NOT NULL,
  mileStoneID int NOT NULL,
  testID int NOT NULL,
  PRIMARY KEY (classID)
);

CREATE TABLE Enrolled (
  enrollmentID int NOT NULL AUTO_INCREMENT,
  learnerID int NOT NULL,
  classID int NOT NULL,
  accessID int NOT NULL,
  transactionID int NOT NULL,
  scheduleID int NOT NULL,
  PRIMARY KEY (enrollmentID)
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
  FOREIGN KEY (questionnaireID) REFERENCES Questionnaire(questionnaireID)
);

CREATE TABLE ClassContent (
  classContentID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  datePosted datetime NULL DEFAULT current_timestamp(),
  dateModified datetime NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  enrollmentID int NOT NULL,
  meetingID int NOT NULL,
  fileID int NOT NULL,
  classID int NOT NULL,
  PRIMARY KEY (classContentID)
);

CREATE TABLE Meeting (
  meetingID int NOT NULL AUTO_INCREMENT,
  meetingLink varchar(64),
  TimeDate datetime NULL,
  learnerID int NOT NULL,
  instructorID int NOT NULL,
  PRIMARY KEY (meetingID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (instructorID) REFERENCES Instructor(instructorID)
);

CREATE TABLE FileContent (
  fileID int NOT NULL AUTO_INCREMENT,
  fileName varchar(96),
  filePath varchar(96),
  datePosted datetime NULL DEFAULT current_timestamp(),
  dateModified datetime NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  userID int NOT NULL,
  classContentID int NOT NULL,
  PRIMARY KEY (fileID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (classContentID) REFERENCES ClassContent(classContentID)
);

CREATE TABLE Transactions (
  transactionID int NOT NULL AUTO_INCREMENT,
  dateOfPayment varchar(16),
  imageAddress char(64),
  paymentStatusID int NOT NULL,
  userID int NOT NULL,
  transactiontypeID int NOT NULL,
  PRIMARY KEY (transactionID),
  FOREIGN KEY (paymentStatusID) REFERENCES PaymentStatus(paymentStatusID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (transactiontypeID) REFERENCES TransactionType(transactionTypeID)
);

ALTER TABLE Enrolled ADD CONSTRAINT fk_accessID FOREIGN KEY (accessID) REFERENCES AccessLevel(accessID);
ALTER TABLE Enrolled ADD CONSTRAINT fk_learnerID FOREIGN KEY (learnerID) REFERENCES Learner(learnerID);
ALTER TABLE Enrolled ADD CONSTRAINT fk_classID FOREIGN KEY (classID) REFERENCES Classes(classID);
ALTER TABLE Enrolled ADD CONSTRAINT fk_transactionID FOREIGN KEY (transactionID) REFERENCES Transactions(transactionID);
ALTER TABLE Enrolled ADD CONSTRAINT fk_scheduleID FOREIGN KEY (scheduleID) REFERENCES Schedules(scheduleID);

ALTER TABLE Classes ADD CONSTRAINT fk_availID FOREIGN KEY (availID) REFERENCES Availability(availID);
ALTER TABLE Classes ADD CONSTRAINT fk_reviewID FOREIGN KEY (reviewID) REFERENCES ReviewCards(reviewID);
ALTER TABLE Classes ADD CONSTRAINT fk_instructorID FOREIGN KEY (instructorID) REFERENCES Instructor(instructorID);
ALTER TABLE Classes ADD CONSTRAINT fk_classContentID FOREIGN KEY (classContentID) REFERENCES ClassContent(classContentID);
ALTER TABLE Classes ADD CONSTRAINT fk_classProfileID FOREIGN KEY (classProfileID) REFERENCES ClassProfile(classprofileID);
ALTER TABLE Classes ADD CONSTRAINT fk_classStatusID FOREIGN KEY (classStatusID) REFERENCES ClassStatus(classStatusID);
ALTER TABLE Classes ADD CONSTRAINT fk_enrollmentID FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID);
ALTER TABLE Classes ADD CONSTRAINT fk_milestoneID FOREIGN KEY (mileStoneID) REFERENCES Milestone(mileStoneID);
ALTER TABLE Classes ADD CONSTRAINT fk_testID FOREIGN KEY (testID) REFERENCES Test(testID);

ALTER TABLE ClassContent ADD CONSTRAINT fk_enrollment_ID FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID);
ALTER TABLE ClassContent ADD CONSTRAINT fk_meeting_ID FOREIGN KEY (meetingID) REFERENCES Meeting(meetingID);
ALTER TABLE ClassContent ADD CONSTRAINT fk_file_ID FOREIGN KEY (fileID) REFERENCES FileContent(fileID);
ALTER TABLE ClassContent ADD CONSTRAINT fk_class_ID FOREIGN KEY (classID) REFERENCES Classes(classID);
/* ---- Transactions ---- */

CREATE TABLE PaymentRequest (
  payRequestID int NOT NULL AUTO_INCREMENT,
  amount varchar(64),
  paymentAddress varchar(64),
  fileAddress varchar(64),
  classID int NOT NULL,
  userID int NOT NULL,
  learnerID int NOT NULL,
  PRIMARY KEY (payRequestID),
  FOREIGN KEY (classID) REFERENCES Classes(classID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID)
);


CREATE TABLE Profit (
  profitID int NOT NULL AUTO_INCREMENT,
  profitDate varchar(16),
  profitStatus varchar(96),
  packageID int NOT NULL,
  transactionID int NOT NULL,
  classID int NOT NULL,
  PRIMARY KEY (profitID),
  FOREIGN KEY (classID) REFERENCES Classes(classID),
  FOREIGN KEY (packageID) REFERENCES Package(packageID),
  FOREIGN KEY (transactionID) REFERENCES Transactions(transactionID)
);

CREATE TABLE MileStoneEarned (
  earnedID int NOT NULL AUTO_INCREMENT,
  dateEarned varchar(16),
  learnerID int NOT NULL,
  milestoneID int NOT NULL,
  PRIMARY KEY (earnedID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (milestoneID) REFERENCES Milestone(milestoneID)
);

CREATE TABLE Certificates (
  certificateID int NOT NULL AUTO_INCREMENT,
  description varchar(50),
  userID int NOT NULL,
  learnerID int NOT NULL,
  classID int NOT NULL,
  earnedID int NOT NULL,
  PRIMARY KEY (certificateID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (classID) REFERENCES Classes(classID),
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

CREATE TABLE Orders (
  orderID int NOT NULL AUTO_INCREMENT,
  dateRequest varchar(16),
  numberoforder int(10),
  orderStatus varchar(64),
  packageID int NOT NULL,
  learnerID int NOT NULL,
  classID int NOT NULL,
  procurementID int NOT NULL,
  PRIMARY KEY (orderID),
  FOREIGN KEY (packageID) REFERENCES Package(packageID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (classID) REFERENCES Classes(classID),
  FOREIGN KEY (procurementID) REFERENCES Procurement(procurementID)
);

CREATE TABLE Delivery (
  deliveryID int NOT NULL AUTO_INCREMENT,
  deliveryDate datetime NULL,
  packageID int NOT NULL,
  learnerID int NOT NULL,
  orderID int NOT NULL,
  procurementID int NOT NULL,
  PRIMARY KEY (deliveryID),
  FOREIGN KEY (packageID) REFERENCES Package(packageID),
  FOREIGN KEY (learnerID) REFERENCES Learner(learnerID),
  FOREIGN KEY (orderID) REFERENCES Orders(orderID),
  FOREIGN KEY (procurementID) REFERENCES Procurement(procurementID)
);