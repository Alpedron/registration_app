-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2026 at 02:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`course_id`, `course_code`, `course_name`, `credits`) VALUES
(1, 'CIS 1200', 'Introduction to Database Systems', 4),
(2, 'CIS 1440', 'Front-End Web Technologies (HTML, CSS, JavaScript)', 4),
(3, 'CIS 1512', 'Principles of Software Engineering', 3),
(4, 'CIS 2131', 'Python Programming', 4),
(5, 'CIS 2141', 'R Programming for Data Science', 4),
(6, 'CIS 2151', 'Java Programming', 4),
(7, 'CIS 2252', 'C++ Programming', 4),
(8, 'CIS 2757', 'C# Programming', 4),
(9, 'CIS 2353', 'Data Structures', 4),
(10, 'CIS 2454', 'Full Stack Web Development', 4),
(11, 'CIS 2777', 'Introduction to Applied AI', 4),
(12, 'CIS 2241', 'Discrete Structures', 4),
(13, 'CIS 2541', 'Introduction to Machine Learning', 4),
(14, 'CIS 2637', 'Big Data and NoSQL Systems', 3),
(15, 'LIB 1100', 'Information Research Methods', 2),
(16, 'COM 1290', 'Interpersonal Communication', 3),
(17, 'ENG 1510', 'Composition I', 3),
(18, 'ENG 1510E', 'Composition I Enhanced', 4),
(19, 'MAT 1150', 'Intermediate Algebra', 4),
(20, 'PHI 1710', 'Introduction to Informal Logic', 3),
(21, 'PHI 2710', 'Introduction to Formal Logic', 3),
(22, 'CIS 2850', 'Introduction to Graphics Modeling Software', 4),
(23, 'CIS 2859', 'Foundations of Game Software Development', 4),
(24, 'CIS 2862', 'Game Design', 3),
(25, 'CIS 2818', 'Mobile Application Development (Android)', 4),
(26, 'CIS 2858', 'Cloud Native Systems and Integration', 4),
(27, 'CIS 2878', 'DevOps Engineering', 3),
(28, 'CIS 2991', 'Software Engineering Capstone', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Enrollment`
--

CREATE TABLE `Enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Enrollment`
--

INSERT INTO `Enrollment` (`enrollment_id`, `student_id`, `section_id`, `enrollment_date`) VALUES
(13, 3, 15, '2026-03-30'),
(14, 3, 2, '2026-03-30'),
(15, 4, 12, '2026-03-30'),
(16, 3, 3, '2026-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

CREATE TABLE `Faculty` (
  `faculty_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(100) DEFAULT 'CIS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Faculty`
--

INSERT INTO `Faculty` (`faculty_id`, `first_name`, `last_name`, `email`, `department`) VALUES
(1, 'Brian', 'McAllister', 'bmcallister@occ.edu', 'CIS'),
(2, 'Hassan', 'Nasser', 'hnasser@occ.edu', 'CIS'),
(3, 'Eric', 'Charnesky', 'echarnesky@occ.edu', 'CIS'),
(4, 'Ruth', 'Tennison', 'rtennison@occ.edu', 'General'),
(5, 'Nancy', 'Mitchell', 'nmitchell@occ.edu', 'General'),
(6, 'Liam', 'Wicklund', 'lwicklund@occ.edu', 'General'),
(7, 'Brian', 'Hoag', 'bhoag@occ.edu', 'General'),
(8, 'David', 'Strand', 'dstrand@occ.edu', 'General'),
(9, 'William', 'Isanhart', 'wisan@occ.edu', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `Section`
--

CREATE TABLE `Section` (
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_number` varchar(10) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `schedule` varchar(50) NOT NULL,
  `modality` varchar(10) NOT NULL,
  `capacity` int(11) NOT NULL,
  `seats_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Section`
--

INSERT INTO `Section` (`section_id`, `course_id`, `section_number`, `semester`, `year`, `faculty_id`, `schedule`, `modality`, `capacity`, `seats_available`) VALUES
(1, 1, 'A1214', 'Fall', 2026, 1, 'Online (9/23-12/16)', 'Online', 30, 30),
(2, 1, 'A1257', 'Fall', 2026, 1, 'Online (9/22-12/15)', 'Online', 30, 30),
(3, 1, 'A1294', 'Fall', 2026, 1, 'Online (9/23-12/16)', 'Online', 30, 30),
(4, 2, 'O1555', 'Fall', 2026, 2, 'Online (8/31-12/21)', 'Online', 30, 30),
(5, 2, 'R1587', 'Fall', 2026, 2, 'Online (8/31-12/21)', 'Online', 30, 29),
(6, 2, 'R1588', 'Fall', 2026, 2, 'Online (8/31-12/21)', 'Online', 30, 30),
(7, 2, 'R1589', 'Fall', 2026, 2, 'Online (8/31-12/21)', 'Online', 30, 30),
(8, 3, '01531', 'Fall', 2026, 2, 'M 6:00PM-8:45PM', 'Hybrid', 30, 30),
(9, 3, '01591', 'Fall', 2026, 2, 'Online (8/31-12/21)', 'Online', 30, 29),
(10, 3, '01592', 'Fall', 2026, 2, 'Online (8/31-12/21)', 'Online', 30, 30),
(11, 4, '01504', 'Fall', 2026, 3, 'T 6:00PM-9:45PM', 'Hybrid', 24, 24),
(12, 4, '01529', 'Fall', 2026, 3, 'Online (8/31-12/21)', 'Online', 30, 29),
(13, 4, '01585', 'Fall', 2026, 3, 'Online (8/31-12/21)', 'Online', 30, 28),
(14, 6, '01531', 'Fall', 2026, 1, 'Online (8/31-12/21)', 'Online', 30, 29),
(15, 6, '01593', 'Fall', 2026, 1, 'Online (9/1-12/15)', 'Online', 30, 30),
(16, 7, '01531', 'Fall', 2026, 2, 'Online (9/1-12/15)', 'Online', 30, 27),
(17, 7, '01532', 'Fall', 2026, 2, 'Online (8/31-12/21)', 'Online', 30, 30),
(18, 9, '01532', 'Fall', 2026, 1, 'Online (8/31-12/21)', 'Online', 30, 28),
(19, 9, '01597', 'Fall', 2026, 1, 'Online (8/31-12/21)', 'Online', 30, 30),
(20, 9, '01598', 'Fall', 2026, 1, 'W 6:00PM-9:45PM', 'Hybrid', 24, 24),
(21, 9, 'R1589', 'Fall', 2026, 1, 'Online (8/31-12/21)', 'Online', 30, 30),
(22, 10, '01531', 'Fall', 2026, 3, 'Th 6:00PM-9:45PM', 'Hybrid', 24, 24),
(23, 24, 'R1592', 'Fall', 2026, 2, 'Online (8/31-12/21)', 'Online', 30, 25),
(24, 25, '01531', 'Fall', 2026, 1, 'Online (9/3-12/17)', 'Online', 30, 30),
(25, 25, '01559', 'Fall', 2026, 1, 'Online (8/31-12/21)', 'Online', 30, 30),
(26, 20, 'A1501', 'Fall', 2026, 9, 'T/Th 10:00AM-11:20AM', 'In-Person', 30, 30),
(27, 20, 'A1502', 'Fall', 2026, 9, 'M/W 10:00AM-11:20AM', 'In-Person', 30, 29),
(28, 20, '01200', 'Fall', 2026, 8, 'T/Th 1:00PM-2:40PM', 'In-Person', 30, 30),
(29, 20, '01201', 'Fall', 2026, 9, 'Online (9/28-12/21)', 'Online', 30, 29),
(30, 20, '01500', 'Fall', 2026, 9, 'Online (8/31-12/21)', 'Online', 30, 29),
(31, 19, 'A1221', 'Fall', 2026, 7, 'T/Th 1:00PM-3:25PM', 'In-Person', 25, 25),
(32, 19, 'A1501', 'Fall', 2026, 7, 'T/Th 5:30PM-7:20PM', 'In-Person', 25, 25),
(33, 19, 'A1502', 'Fall', 2026, 6, 'Online (8/31-12/21)', 'Online', 30, 28),
(34, 19, 'A1505', 'Fall', 2026, 7, 'M/W 1:00PM-2:50PM', 'In-Person', 25, 24),
(35, 19, 'A1506', 'Fall', 2026, 7, 'M/W 10:00AM-11:50AM', 'In-Person', 25, 25),
(36, 17, 'A1202', 'Fall', 2026, 5, 'Online (9/28-12/21)', 'Online', 22, 19),
(37, 17, 'A1203', 'Fall', 2026, 5, 'Online (9/28-12/21)', 'Online', 22, 22),
(38, 17, 'A1204', 'Fall', 2026, 5, 'T/Th 10:00AM-11:40AM', 'In-Person', 22, 21),
(39, 17, 'A1205', 'Fall', 2026, 5, 'Online (9/28-12/21)', 'Online', 22, 22),
(40, 17, 'A1206', 'Fall', 2026, 5, 'M/W 1:00PM-2:40PM', 'In-Person', 22, 22),
(41, 16, 'A1501', 'Fall', 2026, 4, 'T 10:00AM-12:50PM', 'In-Person', 22, 22),
(42, 16, 'A1502', 'Fall', 2026, 4, 'Th 1:00PM-3:50PM', 'In-Person', 22, 21),
(43, 16, 'A1503', 'Fall', 2026, 4, 'T 6:00PM-8:50PM', 'In-Person', 22, 22),
(44, 16, 'A1504', 'Fall', 2026, 4, 'W 1:00PM-3:50PM', 'In-Person', 22, 21),
(45, 15, 'R1004', 'Fall', 2026, 6, 'Online (10/5-12/21)', 'Online', 30, 30),
(46, 15, 'R1006', 'Fall', 2026, 6, 'Online (8/31-11/9)', 'Online', 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`student_id`, `first_name`, `last_name`, `email`, `program`) VALUES
(3, 'Adrianna Michelle', 'Pedron', 'pedron.adriannamiche@student.oaklandcc.edu', 'Software Engineering'),
(4, 'Caroline', 'Bortman', 'Cbort@gmail.com', 'ASC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `fk_enrollment_student` (`student_id`),
  ADD KEY `fk_enrollment_section` (`section_id`);

--
-- Indexes for table `Faculty`
--
ALTER TABLE `Faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `fk_section_course` (`course_id`),
  ADD KEY `fk_section_faculty` (`faculty_id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Course`
--
ALTER TABLE `Course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Enrollment`
--
ALTER TABLE `Enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Faculty`
--
ALTER TABLE `Faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Section`
--
ALTER TABLE `Section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD CONSTRAINT `fk_enrollment_section` FOREIGN KEY (`section_id`) REFERENCES `Section` (`section_id`),
  ADD CONSTRAINT `fk_enrollment_student` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`);

--
-- Constraints for table `Section`
--
ALTER TABLE `Section`
  ADD CONSTRAINT `fk_section_course` FOREIGN KEY (`course_id`) REFERENCES `Course` (`course_id`),
  ADD CONSTRAINT `fk_section_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `Faculty` (`faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
