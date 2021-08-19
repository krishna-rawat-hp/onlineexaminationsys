-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 04:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branchid` int(10) UNSIGNED NOT NULL,
  `branchname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchid`, `branchname`) VALUES
(1, 'Information Technology'),
(2, 'Computer Science Engineering'),
(3, 'Electrical Engineering'),
(4, 'Machenical Engineering'),
(5, 'Civil Engineering'),
(6, 'Hotel Management & Catering Technology'),
(7, 'Textile Technology');

-- --------------------------------------------------------

--
-- Table structure for table `examresult`
--

CREATE TABLE `examresult` (
  `resultid` int(10) UNSIGNED NOT NULL,
  `studentid` varchar(100) NOT NULL,
  `paperid` int(10) UNSIGNED NOT NULL,
  `correctanswer` varchar(100) NOT NULL,
  `wronganswer` varchar(100) NOT NULL,
  `notattempted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `HODid` int(10) NOT NULL,
  `branchid` int(10) UNSIGNED NOT NULL,
  `HODname` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contactno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`HODid`, `branchid`, `HODname`, `password`, `contactno`) VALUES
(1, 1, 'Shailendra Satyarthi', '12345', 0),
(2, 3, 'Narendra Pratap Pateriya', '12345', 987654210),
(3, 4, 'Mr. Dharmendra Mittal', '12345', 1245678909),
(4, 5, 'Mrigendra Singh Raghuvanshi', '12345', 1245678909),
(5, 6, 'HARIOM KUMAR SINGHAL', '12345', 1245678909),
(6, 7, 'Alok Agrawal', '12345', 1245678909);

-- --------------------------------------------------------

--
-- Table structure for table `paperdetails`
--

CREATE TABLE `paperdetails` (
  `paperid` int(10) UNSIGNED NOT NULL,
  `sessionid` int(10) UNSIGNED NOT NULL,
  `branchid` int(10) UNSIGNED NOT NULL,
  `semesterid` int(10) UNSIGNED NOT NULL,
  `subjectid` int(10) UNSIGNED NOT NULL,
  `examdate` varchar(10) NOT NULL,
  `questioncount` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `passcode` varchar(200) NOT NULL,
  `teacherid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questionpaper`
--

CREATE TABLE `questionpaper` (
  `paperid` int(10) NOT NULL,
  `questionid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionid` int(10) UNSIGNED NOT NULL,
  `subjectid` int(10) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `a` varchar(1000) NOT NULL,
  `b` varchar(1000) NOT NULL,
  `c` varchar(1000) NOT NULL,
  `d` varchar(1000) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionid`, `subjectid`, `question`, `a`, `b`, `c`, `d`, `answer`, `date`) VALUES
(12, 13, 'Communication is a non stop _____________.', 'Paper', 'Process', 'Program', 'Plan', 'b', '2019-04-09'),
(14, 14, 'Which instrument is used to measure altitudes in aircraft\'s ? ', 'Audiometer', 'Ammeter', 'Altimeter', 'Anemometer', 'c', '2019-04-09'),
(15, 14, 'Which instrument is used to measure depth of ocean ?', 'Galvanometer', 'Fluxmeter', 'Endoscope', 'Fathometer', 'c', '2019-04-09'),
(16, 15, 'First generation of computer was based on  which technology?', 'Transistor', 'LSI', 'VLSI ', 'Vacuum Tube', 'd', '2019-04-09'),
(17, 15, 'Second generation computers are made of .......?', 'Vacuum Tubes', 'Transistors', 'LSI', 'VLSI', 'b', '2019-04-09'),
(18, 15, 'Which of the following memory is non- volatile?', 'SRAM', 'DRAM', 'ROM', 'All of the above', 'c', '2019-04-09'),
(19, 16, 'If the letters of word SACHIN are arranged in all possible ways and these words are written out as in dictionary, then the word SACHIN appears at serial number', '601', '600', ' 603', '604', 'a', '2019-04-09'),
(20, 28, 'Full form of DES', 'DATA ENTRY STANDARD', 'DATA ENCRYPTION STANDARD ', 'DATA ENCRYPT STANDARD ', 'NONE OF THESE', 'b', '2019-04-12'),
(21, 15, 'Which is a output device.', 'keyboard', 'mouse', 'monitor', 'joystick', 'c', '2019-04-25'),
(22, 15, 'which is a input device?', 'monitor', 'printer', 'scanner', 'mouse', 'd', '2019-04-25'),
(23, 15, 'A monitor is a .......... device.', 'input ', 'output', 'both', 'none of these', 'b', '2019-04-25'),
(24, 15, 'printer used for ...........?', 'print', 'scan', 'read', 'write', 'a', '2019-04-25'),
(25, 15, 'keyboard is a ............. device?', 'input', 'output', 'scanning', 'printing', 'a', '2019-04-25'),
(26, 15, 'how many type printer used ?', '1', '2', '5', '3', 'b', '2019-04-25'),
(27, 15, 'which is a type of printer ?', 'inkjet', 'black', 'writer', 'environmental', 'a', '2019-04-25'),
(28, 15, 'RAM is a ............. memory.', 'secondary', 'primary', 'both', 'none of these', 'b', '2019-04-25'),
(29, 15, 'which memory is called fast memory?', 'RAM', 'hard disk', 'cache', 'floppy disk', 'c', '2019-04-25'),
(30, 15, 'full form of cpu is.......................', 'central process unit', 'central properties unit', 'central performance unit', 'central processing unit', 'd', '2019-04-25'),
(31, 13, 'what is the good way to respective call..', 'may', 'can', 'both', 'nine', 'a', '2019-05-04'),
(32, 15, 'A binary number hold ......... digit?', '1', '8', '10', '2', 'd', '2019-05-09'),
(33, 28, 'Full form of DES?', 'Digital Enter System', 'Digital Encryption Standard ', 'Digital Encryption System', 'Data Encryption Standard', 'd', '2019-05-16'),
(34, 19, 'Full form of EPROM?', 'Electrical Programmable Right Only Memory.', 'Erasable Programmable Right Only Memory.', 'Erasable Programmable Read Only Memory.', 'None of These', 'c', '2019-05-16'),
(35, 19, 'Compare Register and Counter?', 'Register is a group of flip flop and counter is counting data circuit.', 'Register is a group of data and counter is counting data circuit.', 'Register is a group of flip flop and counter is counting digital circuit.', 'Register is a group of multiplexer and counter is counting decoder circuit.', 'c', '2019-05-16'),
(36, 40, 'full form of DM ?', 'data main', 'data means', 'data mining', 'date manager', 'c', '2019-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semesterid` int(10) UNSIGNED NOT NULL,
  `semestername` varchar(50) NOT NULL,
  `branchid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semesterid`, `semestername`, `branchid`) VALUES
(95, '1st', 1),
(97, '2nd', 1),
(98, '3rd', 1),
(99, '4th', 1),
(100, '5th', 1),
(101, '6th', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionid` int(10) UNSIGNED NOT NULL,
  `sessionname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionid`, `sessionname`) VALUES
(5, 'july-dec 2018'),
(6, 'jan-jun 2019'),
(7, 'jul-dec-2019');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `rollno` varchar(100) NOT NULL,
  `studentname` varchar(200) NOT NULL,
  `fathername` varchar(200) NOT NULL,
  `branchid` varchar(100) NOT NULL,
  `semesterid` varchar(100) NOT NULL,
  `sessionid` varchar(100) NOT NULL,
  `addmissionbranch` varchar(100) NOT NULL,
  `addmissionsemester` varchar(100) NOT NULL,
  `addmissionsession` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contactno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`rollno`, `studentname`, `fathername`, `branchid`, `semesterid`, `sessionid`, `addmissionbranch`, `addmissionsemester`, `addmissionsession`, `password`, `contactno`) VALUES
('16017I04032', 'Krishna Kant Rawat', 'Babulal Rawat', '1', '52', '1', '1', '47', '1', '12321', 8959979123);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectid` int(10) UNSIGNED NOT NULL,
  `subjectname` varchar(100) NOT NULL,
  `semesterid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectid`, `subjectname`, `semesterid`) VALUES
(44, 'IC', 65),
(46, 'Communication Skills', 95),
(47, 'Physics', 95),
(48, 'Computer Fundamentals and its Applications', 95),
(50, 'Programming in C', 97),
(51, 'Environemental Engineering & safety', 97),
(52, 'Digital Techniques', 97),
(53, 'Basics of Electrical, Electronics & Measurement', 97),
(54, 'Computer Architecture', 98),
(55, 'Operating System', 98),
(56, 'Networking Essential', 98),
(57, 'Data Structurese and Algorithms', 98),
(58, 'Object Oriented Programming Using C++', 98),
(59, 'Enterpreneurship', 99),
(60, 'Marketing Management', 99),
(61, 'Information Security', 99),
(62, 'Database Management System With Query Language', 99),
(63, 'Linux and Shell Programming', 99),
(64, 'Web Programming', 99),
(65, 'Networking with TCP/IP', 100),
(66, 'Dot Net Technologies', 100),
(67, 'Advance web Technology', 100),
(68, 'Wireless Communication and Mobile Computing', 100),
(69, 'Software Engineering', 100),
(70, 'Java Programming', 100),
(71, 'Computer Graphics, Multimedia & Animation', 101),
(72, 'Linux Server Administration', 101),
(73, 'Data Mining & Data Warehousing', 101),
(74, 'Artificial Intelligence & Expert System(AI & ES)', 101),
(75, 'Hardware Maintenence & Microprocessor', 101),
(77, 'Mathematics', 95);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherid` int(10) UNSIGNED NOT NULL,
  `teachername` varchar(200) NOT NULL,
  `branchid` int(10) UNSIGNED NOT NULL,
  `semesterid` int(10) UNSIGNED DEFAULT NULL,
  `subjectid` int(10) UNSIGNED DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `contactno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherid`, `teachername`, `branchid`, `semesterid`, `subjectid`, `password`, `contactno`) VALUES
(1, 'rinki baghel', 1, NULL, NULL, '368629', 4678899),
(3, 'Devideen Ahirwar', 1, NULL, NULL, '12345', 765837902);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `examresult`
--
ALTER TABLE `examresult`
  ADD PRIMARY KEY (`resultid`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`HODid`),
  ADD UNIQUE KEY `HODname` (`HODname`),
  ADD KEY `branchid` (`branchid`);

--
-- Indexes for table `paperdetails`
--
ALTER TABLE `paperdetails`
  ADD PRIMARY KEY (`paperid`),
  ADD KEY `session` (`sessionid`),
  ADD KEY `branch` (`branchid`),
  ADD KEY `semester` (`semesterid`),
  ADD KEY `subject` (`subjectid`);

--
-- Indexes for table `questionpaper`
--
ALTER TABLE `questionpaper`
  ADD KEY `paperid` (`paperid`),
  ADD KEY `questionid` (`questionid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionid`),
  ADD KEY `subjectid` (`subjectid`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semesterid`),
  ADD KEY `branchid` (`branchid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rollno`),
  ADD KEY `branchid` (`branchid`),
  ADD KEY `semesterid` (`sessionid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectid`),
  ADD KEY `semesterid` (`semesterid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherid`),
  ADD UNIQUE KEY `teachername` (`teachername`),
  ADD KEY `branchid` (`branchid`),
  ADD KEY `semesterid` (`semesterid`),
  ADD KEY `subjectid` (`subjectid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branchid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `examresult`
--
ALTER TABLE `examresult`
  MODIFY `resultid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `HODid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paperdetails`
--
ALTER TABLE `paperdetails`
  MODIFY `paperid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semesterid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessionid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hod`
--
ALTER TABLE `hod`
  ADD CONSTRAINT `branch_id_fk` FOREIGN KEY (`branchid`) REFERENCES `branches` (`branchid`);

--
-- Constraints for table `paperdetails`
--
ALTER TABLE `paperdetails`
  ADD CONSTRAINT `paper_branch_fk` FOREIGN KEY (`branchid`) REFERENCES `branches` (`branchid`),
  ADD CONSTRAINT `paper_semester_fk` FOREIGN KEY (`semesterid`) REFERENCES `semesters` (`semesterid`),
  ADD CONSTRAINT `paper_session_fk` FOREIGN KEY (`sessionid`) REFERENCES `sessions` (`sessionid`),
  ADD CONSTRAINT `paper_subject_fk` FOREIGN KEY (`subjectid`) REFERENCES `subjects` (`subjectid`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `que_sub_fk` FOREIGN KEY (`subjectid`) REFERENCES `subjects` (`subjectid`);

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `sem_branch_fk` FOREIGN KEY (`branchid`) REFERENCES `branches` (`branchid`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `sub_sem_fk` FOREIGN KEY (`semesterid`) REFERENCES `semesters` (`semesterid`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `semesterid` FOREIGN KEY (`semesterid`) REFERENCES `semesters` (`semesterid`),
  ADD CONSTRAINT `subjectid` FOREIGN KEY (`subjectid`) REFERENCES `subjects` (`subjectid`),
  ADD CONSTRAINT `tech_branch_fk` FOREIGN KEY (`branchid`) REFERENCES `branches` (`branchid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
