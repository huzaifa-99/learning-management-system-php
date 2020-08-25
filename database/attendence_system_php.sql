-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 08:41 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence_system_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_reg_data`
--

CREATE TABLE `admin_reg_data` (
  `Id` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_reg_data`
--

INSERT INTO `admin_reg_data` (`Id`, `First_Name`, `Last_Name`, `Email`, `Password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answerpapers_projects2`
--

CREATE TABLE `answerpapers_projects2` (
  `A_Id` int(11) NOT NULL,
  `Semester_No` varchar(50) NOT NULL,
  `Course_No` varchar(50) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `Q_Id` int(11) NOT NULL,
  `Chosen_Answer` text NOT NULL,
  `Actual_Answer` text NOT NULL,
  `Result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignments_project2`
--

CREATE TABLE `assignments_project2` (
  `Id` int(11) NOT NULL,
  `Student_ID` int(10) NOT NULL,
  `Student_Email` varchar(50) NOT NULL,
  `Semester_No` int(10) NOT NULL,
  `Course_No` varchar(50) NOT NULL,
  `Assignment_No` int(10) NOT NULL,
  `Assignment_FileN` varchar(250) NOT NULL,
  `Assignment_FileD` longblob NOT NULL,
  `Upload_Date` varchar(50) NOT NULL,
  `Marks` varchar(10) NOT NULL,
  `Check_Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `given_assignments_project2`
--

CREATE TABLE `given_assignments_project2` (
  `Id` int(11) NOT NULL,
  `Semester_No` varchar(20) NOT NULL,
  `Course_No` varchar(20) NOT NULL,
  `Assign_No` int(11) NOT NULL,
  `Assign_Topic` varchar(50) NOT NULL,
  `Assign_Marks` varchar(20) NOT NULL,
  `Dategiven` varchar(50) NOT NULL,
  `Deadline` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `given_assignments_project2`
--

INSERT INTO `given_assignments_project2` (`Id`, `Semester_No`, `Course_No`, `Assign_No`, `Assign_Topic`, `Assign_Marks`, `Dategiven`, `Deadline`) VALUES
(1, '1', 'CS-512', 1, 'C++', '15', '2020-08-25 10:55:56', '2021-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` longblob NOT NULL,
  `description` text NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questionpapers_project2`
--

CREATE TABLE `questionpapers_project2` (
  `Q_Id` int(11) NOT NULL,
  `Semester_No` varchar(50) NOT NULL,
  `Course_No` varchar(50) NOT NULL,
  `Question` text NOT NULL,
  `Op1` text NOT NULL,
  `Op2` text NOT NULL,
  `Op3` text NOT NULL,
  `Op4` text NOT NULL,
  `Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_course_project2`
--

CREATE TABLE `semester_course_project2` (
  `Id` int(11) NOT NULL,
  `Semester_No` varchar(10) NOT NULL,
  `Course_No` varchar(15) NOT NULL,
  `Credit_Hours` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester_course_project2`
--

INSERT INTO `semester_course_project2` (`Id`, `Semester_No`, `Course_No`, `Credit_Hours`) VALUES
(1, '1', 'CS-512', '3'),
(2, '1', 'CS-700', '2');

-- --------------------------------------------------------

--
-- Table structure for table `subject_project2`
--

CREATE TABLE `subject_project2` (
  `S_Id` int(11) NOT NULL,
  `S_Name` varchar(50) NOT NULL,
  `S_Marks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Confirm Passowrd` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_attend`
--

CREATE TABLE `user_attend` (
  `key` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Attendence` varchar(20) NOT NULL,
  `Timee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_attend`
--

INSERT INTO `user_attend` (`key`, `Id`, `Email`, `Password`, `Attendence`, `Timee`) VALUES
(1, 1, 'testuser@gmail.com', 'testuser', 'Present', '2020-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `user_leave`
--

CREATE TABLE `user_leave` (
  `key` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Attendence_Status` varchar(20) NOT NULL,
  `Timee` varchar(20) NOT NULL,
  `Reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_reg_data`
--

CREATE TABLE `user_reg_data` (
  `Id` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Image_Name` varchar(250) NOT NULL DEFAULT 'none',
  `Image_Data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg_data`
--

INSERT INTO `user_reg_data` (`Id`, `First_Name`, `Last_Name`, `Email`, `Password`, `Image_Name`, `Image_Data`) VALUES
(1, 'testuser', 'testuser', 'testuser@gmail.com', 'testuser', 'green.jpg', 0xffd8ffe000104a46494600010101006000600000ffe100224578696600004d4d002a00000008000101120003000000010001000000000000ffdb0043000201010201010202020202020202030503030303030604040305070607070706070708090b0908080a0807070a0d0a0a0b0c0c0c0c07090e0f0d0c0e0b0c0c0cffdb004301020202030303060303060c0807080c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0cffc00011080064006403012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00cba28a2bf173f80c28a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a00ffd9),
(2, 'admin', 'admin', 'admin@gmail.com', 'admin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg_data_project2`
--

CREATE TABLE `user_reg_data_project2` (
  `Id` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Image_Name` varchar(250) NOT NULL,
  `Image_Data` longblob NOT NULL,
  `User_Type` varchar(20) NOT NULL,
  `Enrolled_In_Semester` varchar(10) NOT NULL,
  `User_Reg_By_Admin_Id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg_data_project2`
--

INSERT INTO `user_reg_data_project2` (`Id`, `First_Name`, `Last_Name`, `Email`, `Password`, `Image_Name`, `Image_Data`, `User_Type`, `Enrolled_In_Semester`, `User_Reg_By_Admin_Id`) VALUES
(5, 'admin', 'admin', 'admin@gmail.com', 'admin', '', 0xffd8ffe000104a46494600010101006000600000ffe100224578696600004d4d002a00000008000101120003000000010001000000000000ffdb0043000201010201010202020202020202030503030303030604040305070607070706070708090b0908080a0807070a0d0a0a0b0c0c0c0c07090e0f0d0c0e0b0c0c0cffdb004301020202030303060303060c0807080c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0cffc00011080064006403012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd68a28a2bfc133f680a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803fffd9, 'Admin', '', 0),
(6, 'testuser', 'testuser', 'testuser@gmail.com', 'testuser', 'black.jpg', 0xffd8ffe000104a46494600010101006000600000ffdb0043000201010201010202020202020202030503030303030604040305070607070706070708090b0908080a0807070a0d0a0a0b0c0c0c0c07090e0f0d0c0e0b0c0c0cffdb004301020202030303060303060c0807080c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0cffc00011080064006403012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fe7fe8a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a00ffd9, 'Student', '1', 5),
(7, 'teacher', 'teacher', 'teacher@gmail.com', 'teacher', 'green.jpg', 0xffd8ffe000104a46494600010101006000600000ffe100224578696600004d4d002a00000008000101120003000000010001000000000000ffdb0043000201010201010202020202020202030503030303030604040305070607070706070708090b0908080a0807070a0d0a0a0b0c0c0c0c07090e0f0d0c0e0b0c0c0cffdb004301020202030303060303060c0807080c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0cffc00011080064006403012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00cba28a2bf173f80c28a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a00ffd9, 'Teacher', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `keypk` int(11) NOT NULL,
  `Id` int(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Login_time` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Logout_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`keypk`, `Id`, `Email`, `Password`, `Login_time`, `Status`, `Logout_time`) VALUES
(1, 1, 'testuser@gmail.com', 'testuser', '2020-08-25 09:58:43', 'Offline', '2020-08-25 09:59:05'),
(2, 1, 'testuser@gmail.com', 'testuser', '2020-08-25 10:02:54', 'Offline', '2020-08-25 10:17:47'),
(3, 2, 'admin@gmail.com', 'admin', '2020-08-25 10:17:48', 'Offline', '2020-08-25 10:17:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_reg_data`
--
ALTER TABLE `admin_reg_data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `answerpapers_projects2`
--
ALTER TABLE `answerpapers_projects2`
  ADD PRIMARY KEY (`A_Id`);

--
-- Indexes for table `assignments_project2`
--
ALTER TABLE `assignments_project2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `given_assignments_project2`
--
ALTER TABLE `given_assignments_project2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionpapers_project2`
--
ALTER TABLE `questionpapers_project2`
  ADD PRIMARY KEY (`Q_Id`);

--
-- Indexes for table `semester_course_project2`
--
ALTER TABLE `semester_course_project2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subject_project2`
--
ALTER TABLE `subject_project2`
  ADD PRIMARY KEY (`S_Id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_attend`
--
ALTER TABLE `user_attend`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `user_leave`
--
ALTER TABLE `user_leave`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `user_reg_data`
--
ALTER TABLE `user_reg_data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_reg_data_project2`
--
ALTER TABLE `user_reg_data_project2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`keypk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_reg_data`
--
ALTER TABLE `admin_reg_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answerpapers_projects2`
--
ALTER TABLE `answerpapers_projects2`
  MODIFY `A_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments_project2`
--
ALTER TABLE `assignments_project2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `given_assignments_project2`
--
ALTER TABLE `given_assignments_project2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionpapers_project2`
--
ALTER TABLE `questionpapers_project2`
  MODIFY `Q_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester_course_project2`
--
ALTER TABLE `semester_course_project2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject_project2`
--
ALTER TABLE `subject_project2`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_attend`
--
ALTER TABLE `user_attend`
  MODIFY `key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_leave`
--
ALTER TABLE `user_leave`
  MODIFY `key` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_reg_data`
--
ALTER TABLE `user_reg_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_reg_data_project2`
--
ALTER TABLE `user_reg_data_project2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `keypk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
