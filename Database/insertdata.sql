/* ----- TransactionType Data ----- */

INSERT INTO TransactionType (description) VALUES ('Order Request');
INSERT INTO TransactionType (description) VALUES ('Confirmed Request');
INSERT INTO TransactionType (description) VALUES ('Delivery Request');
INSERT INTO TransactionType (description) VALUES ('Bought a Course');
INSERT INTO TransactionType (description) VALUES ('Canceled a Course');

/* ----- Schedules Data ----- */

INSERT INTO Schedules (startDate, endDate, startTime, endTime) VALUES ('', '', '', '');
INSERT INTO Schedules (startDate, endDate, startTime, endTime) VALUES ('', '', '', '');
INSERT INTO Schedules (startDate, endDate, startTime, endTime) VALUES ('', '', '', '');
INSERT INTO Schedules (startDate, endDate, startTime, endTime) VALUES ('', '', '', '');
INSERT INTO Schedules (startDate, endDate, startTime, endTime) VALUES ('', '', '', '');

/* ----- Access Level Data ----- */

INSERT INTO ActionType (actionType) VALUES ('Click Button');
INSERT INTO ActionType (actionType) VALUES ('Login');
INSERT INTO ActionType (actionType) VALUES ('Logout');
INSERT INTO ActionType (actionType) VALUES ('Enrolled Class');
INSERT INTO ActionType (actionType) VALUES ('Attended Class');

/* ----- PaymentStatus Data ----- */

INSERT INTO PaymentStatus (description) VALUES ('Fully Paid');
INSERT INTO PaymentStatus (description) VALUES ('Pending');
INSERT INTO PaymentStatus (description) VALUES ('Partial Payment');
INSERT INTO PaymentStatus (description) VALUES ('Canceled');

/* ----- Access Level Data ----- */

INSERT INTO AccessLevel (accessType, description) VALUES ('Enrolled Learner', 'A Learner who has paid the course');
INSERT INTO AccessLevel (accessType, description) VALUES ('Pending Enrollment', 'A Learner who has not paid the course');
INSERT INTO AccessLevel (accessType, description) VALUES ('Cancel Enrollment', 'A Learner who does not want to continue the course');

/* ----- userrole Data ----- */
INSERT INTO userroles (roleType) VALUES ('Admin');
INSERT INTO userroles (roleType) VALUES ('Learner');
INSERT INTO userroles (roleType) VALUES ('Instructor');
INSERT INTO userroles (roleType) VALUES ('Coodinator');
INSERT INTO userroles (roleType) VALUES ('Procurement');

/* ----- Users Data ----- */

INSERT INTO Users (username, email, password, firstname, lastname, roleID, active, activation_code) 
VALUES ('genesis', 'genesis.fragas@benilde.edu.ph', 'Zxcvbnmz12#', 'Genesis', 'Fragas', 1, 1, '0000');
INSERT INTO Users (username, email, password, firstname, lastname, roleID, active, activation_code) 
VALUES ('dennie', 'dennnie.go@benilde.edu.ph', 'Zxcvbnmz12#', 'Dennie', 'Go', 1, 1, '0000');
INSERT INTO Users (username, email, password, firstname, lastname, roleID, active, activation_code) 
VALUES ('Samboi', 'samuelnarbuada@benilde.edu.ph', 'Zxcvbnmz12#', 'Samuel', 'Narbuada', 1, 1, '0000');
INSERT INTO Users (username, email, password, firstname, lastname, roleID, active, activation_code) 
VALUES ('Markku', 'markhenrick.linsangan@benilde.edu.ph', 'Zxcvbnmz12#', 'Mark', 'Linsangan', 1, 1, '0000');
INSERT INTO Users (username, email, password, firstname, lastname , roleID, active, activation_code) 
VALUES ('shadowpick', 'shadow.pick@benilde.edu.ph', 'Zxcvbnmz12#', 'Shadow', 'Pick', 1, 1, '0000');

/* ----- UserProfile Data ----- */

INSERT INTO UserProfile (age, gender, birthday, address, contactno, aboutme, userID) 
VALUES ('22', 'M', '01/04/2000', '#00 St. Galor Westmanor Maybuhay Pasig City', '639', 'A person you can vibe with', 2);
INSERT INTO UserProfile (age, gender, birthday, address, contactno, aboutme, userID) 
VALUES ('23', 'M', '06/12/1999', '#00 St. Galor Westmanor Maybuhay Pasig City', '639', 'A person you can vibe with', 3);
INSERT INTO UserProfile (age, gender, birthday, address, contactno, aboutme, userID) 
VALUES ('24', 'M', '12/05/1998', '#00 St. Galor Westmanor Maybuhay Pasig City', '639', 'A person you can vibe with', 4);
INSERT INTO UserProfile (age, gender, birthday, address, contactno, aboutme, userID) 
VALUES ('21', 'M', '05/02/2001', '#00 St. Galor Westmanor Maybuhay Pasig City', '639', 'A person you can vibe with', 5);
INSERT INTO UserProfile (age, gender, birthday, address, contactno, aboutme, userID) 
VALUES ('20', 'F', '02/16/2002', '#00 St. Galor Westmanor Maybuhay Pasig City', '639', 'A person you can vibe with', 6);

/* ----- BlackList Data ----- */

INSERT INTO Blacklist (status, description) VALUES ('Banned', 'User can no longer use the web application');
INSERT INTO Blacklist (status, description) VALUES ('Soft Ban', 'User cannot use the web application for a certain period of time');
INSERT INTO Blacklist (status, description) VALUES ('Under Review', 'User can use the web application, but has limited access');
INSERT INTO Blacklist (status, description) VALUES ('Warning', 'User can still use the web application');
INSERT INTO Blacklist (status, description) VALUES ('Whitelisted', 'User is free to use the web application');

/* ----- AuditTrail Data ----- */

INSERT INTO AuditTrail (logs, tableName, userID, actionID) VALUES ('', '', 2, 2);
INSERT INTO AuditTrail (logs, tableName, userID, actionID) VALUES ('', '', 3, 2);
INSERT INTO AuditTrail (logs, tableName, userID, actionID) VALUES ('', '', 6, 2);
INSERT INTO AuditTrail (logs, tableName, userID, actionID) VALUES ('', '', 5, 2);
INSERT INTO AuditTrail (logs, tableName, userID, actionID) VALUES ('', '', 4, 2);

/* ----- Packages Data ----- */

INSERT INTO Package (description) VALUES ('Tomato');
INSERT INTO Package (description) VALUES ('Porkchop');
INSERT INTO Package (description) VALUES ('Beef');
INSERT INTO Package (description) VALUES ('Wagyu');
INSERT INTO Package (description) VALUES ('Eggs');



