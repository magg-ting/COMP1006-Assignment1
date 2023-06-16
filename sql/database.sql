DROP DATABASE IF EXISTS Assignment1;
CREATE DATABASE Assignment1;
USE Assignment1;

-- This table is used to store employee info and will be used for data validation
CREATE TABLE Employee_Info(
    empID INT(4) ZEROFILL NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(64) NOT NULL,
    lname VARCHAR(64) NOT NULL,
    gender VARCHAR(8) NOT NULL,
    startDate DATE NOT NULL,
    dept VARCHAR(16) NOT NULL,
    position VARCHAR(64) NOT NULL,
    email VARCHAR(128) NOT NULL
);

-- This is the table where website user can add new entries
CREATE TABLE Timesheet(
    entryID INT(6) ZEROFILL NOT NULL PRIMARY KEY AUTO_INCREMENT,
    empID INT(4) ZEROFILL NOT NULL,
    workDate DATE NOT NULL,
    startTime TIME NOT NULL,
    endTime TIME NOT NULL,
    workHours TIME AS (TIMEDIFF(endTime, startTime)) NOT NULL,
    FOREIGN KEY(empID) REFERENCES Employee_Info(empID)
);

-- Insert entries to the emplopyee info table
INSERT INTO Employee_Info(fname, lname, gender, startDate, dept, position, email) 
VALUES
	('John', 'Doe', 'M', '2023-01-01', 'HRA', 'Manager', 'john.doe@abc.com'),
    ('Jane', 'Smith', 'F', '2023-01-15', 'FIN', 'Sr Officer', 'jane.smith@abc.com'),
    ('Michael', 'Johnson', 'M', '2023-02-01', 'SMP', 'Officer', 'michael.johnson@abc.com'),
    ('Emily', 'Brown', 'F', '2023-02-15', 'ITS', 'Assistant', 'emily.brown@abc.com'),
    ('David', 'Lee', 'M', '2023-03-01', 'HRA', 'Manager', 'david.lee@abc.com'),
    ('Jennifer', 'Wilson', 'F', '2023-03-15', 'FIN', 'Sr Officer', 'jennifer.wilson@abc.com'),
    ('Christopher', 'Taylor', 'M', '2023-04-01', 'SMP', 'Officer', 'christopher.taylor@abc.com'),
    ('Jessica', 'Anderson', 'F', '2023-04-15', 'ITS', 'Assistant', 'jessica.anderson@abc.com'),
    ('Andrew', 'Miller', 'M', '2023-05-01', 'HRA', 'Manager', 'andrew.miller@abc.com'),
    ('Sarah', 'Thomas', 'F', '2023-05-15', 'FIN', 'Sr Officer', 'sarah.thomas@abc.com'),
    ('Matthew', 'White', 'M', '2023-06-01', 'SMP', 'Officer', 'matthew.white@abc.com'),
    ('Stephanie', 'Clark', 'F', '2023-06-15', 'ITS', 'Assistant', 'stephanie.clark@abc.com'),
    ('Daniel', 'Harris', 'M', '2023-07-01', 'HRA', 'Manager', 'daniel.harris@abc.com'),
    ('Lauren', 'Lewis', 'F', '2023-07-15', 'FIN', 'Sr Officer', 'lauren.lewis@abc.com'),
    ('James', 'Hall', 'M', '2023-08-01', 'SMP', 'Officer', 'james.hall@abc.com'),
    ('Amanda', 'Moore', 'F', '2023-08-15', 'ITS', 'Assistant', 'amanda.moore@abc.com');

-- Optional: The query below inserts entries into the Timesheet table, in addition to those that will be input by website user
INSERT INTO Timesheet(empID, workDate, startTime, endTime)
VALUES
    ('0001', '2023-03-17', '09:00', '17:00'),
    ('0001', '2023-03-18', '09:00', '17:00'),
    ('0002', '2023-03-18', '17:00', '23:00'),
    ('0003', '2023-05-17', '07:00', '13:00');