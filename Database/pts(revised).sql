CREATE DATABASE pts;

USE pts;

/* ---- Tables without Foreign Key ---- */
CREATE TABLE TransactionType (
  transactionTypeID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  PRIMARY KEY (transactionTypeID)
);

CREATE TABLE Schedules (
  scheduleID int NOT NULL AUTO_INCREMENT,
  startDate date NULL,
  endDate date NULL,
  startTime timestamp NULL,
  endTime timestamp NULL,
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

CREATE TABLE AccessLevel (
  accessID int NOT NULL AUTO_INCREMENT,
  accessType varchar(64),
  description varchar(64),
  PRIMARY KEY (accessID)
);

/* ---- Users, Audit, & Type of Users Table ---- */

CREATE TABLE Users (
  userID int AUTO_INCREMENT,
  username char(64) DEFAULT NULL,
  email char(64) DEFAULT NULL,
  password char(200) DEFAULT NULL,
  firstname char(64) DEFAULT NULL,
  lastName char(64) DEFAULT NULL,
  roleID int NOT NULL,
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
  userID int NOT NULL,
  PRIMARY KEY (profileID)
);

CREATE TABLE UserRoles (
  roleID int NOT NULL AUTO_INCREMENT,
  roleType char(64),
  PRIMARY KEY (roleID)
);

CREATE TABLE AuditTrail (
  auditID int NOT NULL AUTO_INCREMENT,
  logs char(64),
  tableName char(64),
  userID int NOT NULL,
  actionID int NOT NULL,
  PRIMARY KEY (auditID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (actionID) REFERENCES ActionType(actionID)
);

CREATE TABLE Blacklist (
  blacklistID int NOT NULL AUTO_INCREMENT,
  status char(64),
  description varchar(64),
  userID int NOT NULL,
  PRIMARY KEY (blacklistID)
);

ALTER TABLE Blacklist ADD CONSTRAINT fk_userIDBlack FOREIGN KEY (userID) REFERENCES Users(userID); 

ALTER TABLE UserProfile ADD CONSTRAINT fk_userID FOREIGN KEY (userID) REFERENCES Users(userID);
ALTER TABLE Users ADD CONSTRAINT fk_roleID FOREIGN KEY (roleID) REFERENCES UserRoles(roleID);

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
  classID int NOT NULL,
  PRIMARY KEY (classProfileID)
);

CREATE TABLE ClassEvaluation (
  evaluateID int NOT NULL AUTO_INCREMENT,
  coordinatorID int NOT NULL,
  Cstatus varchar(25),
  userID int NOT NULL,
  PRIMARY KEY (evaluateID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE ReviewCards (
  reviewID int NOT NULL AUTO_INCREMENT,
  modifiedDate datetime NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  description varchar(50),
  content float(10),
  presentation float(10),
  attendance float(10),
  legibility float(10),
  totalRating float(2),
  userID int NOT NULL,
  classID int NOT NULL,
  PRIMARY KEY (reviewID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Classes (
  classID int NOT NULL AUTO_INCREMENT,
  className varchar(64),
  classStatus varchar(64),
  creationDate datetime NULL DEFAULT current_timestamp(),
  modefiedDate datetime NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  userID int NOT NULL,
  mileStoneID int NOT NULL,
  testID int NOT NULL,
  PRIMARY KEY (classID)
);

CREATE TABLE Package (
  packageID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  classID int NULL,
  PRIMARY KEY (packageID)
);

CREATE TABLE Milestone (
  mileStoneID int NOT NULL AUTO_INCREMENT,
  description varchar(50),
  Mtrigger varchar(25),
  classID int NOT NULL,
  PRIMARY KEY (mileStoneID)
);

CREATE TABLE Questionnaire (
  questionnaireID int NOT NULL AUTO_INCREMENT,
  question char(64),
  answer varchar(96),
  points float(5),
  testID int NOT NULL,
  PRIMARY KEY (questionnaireID)
);

CREATE TABLE Enrolled (
  enrollmentID int NOT NULL AUTO_INCREMENT,
  instructorApproval float DEFAULT 0,
  userID int NOT NULL,
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
  PRIMARY KEY (testID)
);

CREATE TABLE ClassContent (
  classContentID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  datePosted datetime NULL DEFAULT current_timestamp(),
  dateModified datetime NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  enrollmentID int NOT NULL,
  fileID int NOT NULL,
  classID int NOT NULL,
  PRIMARY KEY (classContentID)
);

CREATE TABLE Meeting (
  meetingID int NOT NULL AUTO_INCREMENT,
  meetingLink varchar(64),
  TimeDate datetime NULL,
  userID int NOT NULL,
  classContentID int NOT NULL,
  PRIMARY KEY (meetingID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (classContentID) REFERENCES ClassContent(classContentID)
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

ALTER TABLE ClassProfile ADD CONSTRAINT fk_classIDProf FOREIGN KEY (classID) REFERENCES Classes(classID);
ALTER TABLE ReviewCards ADD CONSTRAINT fk_userIDRev FOREIGN KEY (classID) REFERENCES Classes(classID);

ALTER TABLE Enrolled ADD CONSTRAINT fk_accessID FOREIGN KEY (accessID) REFERENCES AccessLevel(accessID);
ALTER TABLE Enrolled ADD CONSTRAINT fk_userIDEnroll FOREIGN KEY (userID) REFERENCES Users(userID);
ALTER TABLE Enrolled ADD CONSTRAINT fk_classID FOREIGN KEY (classID) REFERENCES Classes(classID);
ALTER TABLE Enrolled ADD CONSTRAINT fk_transactionID FOREIGN KEY (transactionID) REFERENCES Transactions(transactionID);
ALTER TABLE Enrolled ADD CONSTRAINT fk_scheduleID FOREIGN KEY (scheduleID) REFERENCES Schedules(scheduleID);

ALTER TABLE Classes ADD CONSTRAINT fk_userIDClass FOREIGN KEY (userID) REFERENCES Users(userID);
ALTER TABLE Classes ADD CONSTRAINT fk_milestoneID FOREIGN KEY (mileStoneID) REFERENCES Milestone(mileStoneID);
ALTER TABLE Classes ADD CONSTRAINT fk_testID FOREIGN KEY (testID) REFERENCES Test(testID);

ALTER TABLE ClassContent ADD CONSTRAINT fk_enrollment_ID FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID);
ALTER TABLE ClassContent ADD CONSTRAINT fk_file_ID FOREIGN KEY (fileID) REFERENCES FileContent(fileID);
ALTER TABLE ClassContent ADD CONSTRAINT fk_class_ID FOREIGN KEY (classID) REFERENCES Classes(classID);

ALTER TABLE Package ADD CONSTRAINT fk_classIDPackage FOREIGN KEY (classID) REFERENCES Classes(classID);
ALTER TABLE Questionnaire ADD CONSTRAINT fk_testIDQuest FOREIGN KEY (testID) REFERENCES Test(testID);
ALTER TABLE Milestone ADD CONSTRAINT fk_classIDMile FOREIGN KEY (classID) REFERENCES Classes(ClassID);

/* ---- Transactions ---- */

CREATE TABLE Fees (
  feeID int NOT NULL AUTO_INCREMENT,
  description varchar(64),
  amount int(11),
  orderID int NOT NULL,
  packageID int NOT NULL,
  PRIMARY KEY (feeID),
  FOREIGN KEY (packageID) REFERENCES Package(packageID)
);

CREATE TABLE PaymentRequest (
  payRequestID int NOT NULL AUTO_INCREMENT,
  amount varchar(64),
  paymentAddress varchar(64),
  fileAddress varchar(64),
  classID int NOT NULL,
  userID int NOT NULL,
  transactionID int NOT NULL,
  PRIMARY KEY (payRequestID),
  FOREIGN KEY (classID) REFERENCES Classes(classID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (transactionID) REFERENCES Transactions(transactionID)
);


CREATE TABLE Profit (
  profitID int NOT NULL AUTO_INCREMENT,
  profitDate varchar(16),
  profitStatus varchar(96),
  feeID int NOT NULL,
  transactionID int NOT NULL,
  classID int NOT NULL,
  PRIMARY KEY (profitID),
  FOREIGN KEY (classID) REFERENCES Classes(classID),
  FOREIGN KEY (feeID) REFERENCES Fees(feeID),
  FOREIGN KEY (transactionID) REFERENCES Transactions(transactionID)
);

CREATE TABLE MileStoneEarned (
  earnedID int NOT NULL AUTO_INCREMENT,
  dateEarned varchar(16),
  userID int NOT NULL,
  milestoneID int NOT NULL,
  PRIMARY KEY (earnedID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (milestoneID) REFERENCES Milestone(milestoneID)
);

CREATE TABLE Certificates (
  certificateID int NOT NULL AUTO_INCREMENT,
  description varchar(50),
  userID int NOT NULL,
  evaluateID int NOT NULL,
  classID int NOT NULL,
  earnedID int NOT NULL,
  PRIMARY KEY (certificateID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (evaluateID) REFERENCES ClassEvaluation(evaluateID),
  FOREIGN KEY (classID) REFERENCES Classes(classID),
  FOREIGN KEY (earnedID) REFERENCES MileStoneEarned(earnedID)
);

CREATE TABLE ClassList (
  classlistID int NOT NULL AUTO_INCREMENT,
  enrollmentID int NOT NULL,
  accessID int NOT NULL,
  PRIMARY KEY (classlistID),
  FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID),
  FOREIGN KEY (accessID) REFERENCES AccessLevel(accessID)
);

CREATE TABLE Refund (
  refundID int NOT NULL AUTO_INCREMENT,
  reason varchar(64),
  evidence varchar(64),
  paymentAddress varchar(200),
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
  userID int NOT NULL,
  profileID int NOT NULL,
  enrollmentID int NOT NULL,
  PRIMARY KEY (orderID),
  FOREIGN KEY (packageID) REFERENCES Package(packageID),
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (profileID) REFERENCES UserProfile(profileID),
  FOREIGN KEY (enrollmentID) REFERENCES Enrolled(enrollmentID)
);

CREATE TABLE Delivery (
  deliveryID int NOT NULL AUTO_INCREMENT,
  deliveryDate datetime NULL,
  orderID int NOT NULL,
  PRIMARY KEY (deliveryID),
  FOREIGN KEY (orderID) REFERENCES Orders(orderID)
);

ALTER TABLE Fees ADD CONSTRAINT fk_orderID FOREIGN KEY (orderID) REFERENCES Orders(orderID);