CREATE DATABASE pts;

CREATE TABLE classStatus (
  classStatusID int NOT NULL,
  coordinatorID int NOT NULL,
  status varchar(25),
  PRIMARY KEY (classStatusID),
  FOREIGN KEY (coordinatorID) REFERENCES Coordinator(coordinatorID)
);

CREATE TABLE AccessLevel (
  accessID int NOT NULL,
  accessType varchar(64),
  description varchar(64),
  PRIMARY KEY (`accessID`)
);

CREATE TABLE Enrolled (
  enrollmentID int NOT NULL,
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
  blacklistID int NOT NULL,
  status char(64),
  description varchar(64),
  PRIMARY KEY (`blacklistID`)
);

CREATE TABLE Profile (
  profileID int NOT NULL,
  age char(2),
  gender char(6),
  birthday date(10),
  address char(64),
  contactno char(64),
  aboutme varchar(96),
  creationDate datetime(23),
  PRIMARY KEY (`profileID`)
);

CREATE TABLE Users (
  userID int NOT NULL,
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
  reviewID int NOT NULL,
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

CREATE TABLE `Class Profile` (
  classProfileID int NOT NULL,
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
  instructorID int NOT NULL,
  userID int NOT NULL,
  roleType char(64),
  PRIMARY KEY (instructorID),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Class (
  classID int NOT NULL,
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