-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2022 at 11:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseLevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseDuration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `courseCode`, `faculty`, `courseLevel`, `courseDuration`) VALUES
('1', 'BSc (Hons) in Software Engineering', 'BSCSE', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('10', 'BSc (Hons) in Information Technology with a specialism in Network Computing', 'BSCITNC', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('11', 'BSc (Hons) in Information Technology with a specialism in Mobile Technology', 'BSCITMBT', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('12', 'BSc (Hons) in Information Technology with a specialism in Internet of Things', 'BSCITIOT', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('13', 'BSc (Hons) in Information Technology with a specialism in Digital Transformation', 'BSCITDIT', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('14', 'BSc (Hons) in Information Technology with a specialism in Financial Technology', 'BSCITFT', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('15', 'BSc (Hons) in Information Technology with a specialism in Business Information Systems', 'BSCITBIS', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('16', 'BSc (Hons) in Multimedia Technology', 'BSCMT', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('17', 'BSc (Hons) in Multimedia Technology with a specialism in VR/AR', 'BSCMTVRAR', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('18', 'BSc (Hons) in Computer Games Development', 'BSCCGD', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('19', 'Bachelor of Arts (Honours) in Visual Effects', 'BAVE', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('2', 'BSc (Hons) in Computer Science', 'BSCCS', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('20', 'Bachelor of Arts (Honours) in Animation', 'BAA', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('21', 'BA (Hons) in Business Management', 'BABM', 'Business, Management, Marketing & Tourism', 'Undergraduate Degree', '3 years'),
('22', 'BA (Hons) Human Resource Management', 'BAHRM', 'Business, Management, Marketing & Tourism', 'Undergraduate Degree', '3 years'),
('23', 'BA (Hons) in Marketing Management', 'BAMM', 'Business, Management, Marketing & Tourism', 'Undergraduate Degree', '3 years'),
('24', 'BA (Hons) in Tourism Management', 'BATM', 'Business, Management, Marketing & Tourism', 'Undergraduate Degree', '3 years'),
('25', 'Diploma in Software Engineering', 'DIPSE', 'Computing, Technology & Games Development', 'Pre-Univeristy Diploma', '2 years'),
('3', 'BSc (Hons) in Information Technology', 'BSCIT', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('4', 'BSc (Hons) in Computer Science with a specialism in Data Analytics', 'BSCCSDA', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('5', 'BSc (Hons) in Computer Science with a specialism in Digital Forensics', 'BSCCSDF', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('6', 'BSc (Hons) in Computer Science with a specialism in Cyber Security', 'BSCCSCYB', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('7', 'BSc (Hons) in Computer Science with a specialism in Intelligent Systems', 'BSCCSIS', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('8', 'BSc (Hons) in Information Technology with a specialism in Information System Security', 'BSCITISS', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years'),
('9', 'BSc (Hons) in Information Technology with a specialism in Cloud Engineering', 'BSCITCE', 'Computing, Technology & Games Development', 'Undergraduate Degree', '3 years');

-- --------------------------------------------------------

--
-- Table structure for table `exam_marks`
--

CREATE TABLE `exam_marks` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examMark` double NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_marks`
--

INSERT INTO `exam_marks` (`id`, `studentID`, `courseID`, `subjectID`, `examMark`, `grade`, `gpa`) VALUES
('1', '1', '1', '1', 75, 'A (Distinction)', 3.7),
('11', '6', '25', '18', 80, 'A+ (Distinction)', 4),
('12', '6', '25', '19', 75, 'A (Distinction)', 3.7),
('2', '1', '1', '2', 80, 'A+ (Distinction)', 4),
('3', '2', '3', '4', 63, 'C+ (Pass)', 2.7),
('4', '2', '3', '6', 72, 'B+ (Credit)', 3.3),
('5', '3', '2', '3', 82, 'A+ (Distinction)', 4),
('6', '3', '2', '5', 76, 'A (Distinction)', 3.7),
('7', '4', '2', '3', 86, 'A+ (Distinction)', 4),
('8', '4', '2', '5', 69, 'B (Credit)', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateEnrollment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `dob`, `gender`, `email`, `phoneNumber`, `address`, `courseID`, `dateEnrollment`) VALUES
('1', 'Jacqueline', '2001-06-12', 'Female', 'jacqueline@mail.com', '0123847913', 'Kuala Lumpur', '1', '2022-01-03'),
('2', 'John Doe', '2000-10-20', 'Male', 'johndoe@mail.com', '0172761826', 'Kuala Lumpur', '3', '2022-03-01'),
('3', 'Mark', '2000-05-17', 'Male', 'mark@mail.com', '0166289572', 'Cheras', '2', '2022-02-05'),
('4', 'Rachel', '2001-08-30', 'Female', 'rachel@mail.com', '0136728362', 'Petaling Jaya', '2', '2022-02-05'),
('6', 'Hayley', '2001-09-06', 'Female', 'hayley@mail.com', '0162837452', 'Kajang', '25', '2022-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectName`, `subjectCode`, `courseID`) VALUES
('1', 'Mobile App Engineering', 'MAE', '1'),
('10', 'Research Methods for Computing and Technology', 'RMCT', '3'),
('11', 'Enterprise Systems', 'ENTS', '1'),
('12', 'Software Architecture and Testing', 'SAT', '1'),
('13', 'Programming for Data Analysis', 'PFDA', '1'),
('14', 'Programming for Data Analysis', 'PFDA', '4'),
('15', 'Requirements Engineering', 'RENG', '1'),
('16', 'Data Structures', 'DSTR', '2'),
('17', 'Mobile App Engineering', 'MAE', '11'),
('18', 'Operating Systems', 'OS', '25'),
('19', 'Database Systems', 'DAS', '25'),
('2', 'Data Structures', 'DSTR', '1'),
('3', 'Computing Theory', 'COMT', '2'),
('4', 'Data Structures', 'DSTR', '3'),
('5', 'Concurrent Programming', 'CCP', '2'),
('6', 'Further Web Design & Development', 'FWDD', '3'),
('7', 'Design Methods', 'DMTD', '1'),
('8', 'Research Methods for Computing and Technology', 'RMCT', '1'),
('9', 'Research Methods for Computing and Technology', 'RMCT', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_marks`
--
ALTER TABLE `exam_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
