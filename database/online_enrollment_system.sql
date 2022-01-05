-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 02:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_enrollment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(20) NOT NULL,
  `reg_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `address_residence` varchar(100) NOT NULL,
  `address_city` varchar(100) NOT NULL,
  `address_neighborhood` varchar(100) NOT NULL,
  `address_street` varchar(100) NOT NULL,
  `address_mail_box` int(20) DEFAULT NULL,
  `address_phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admission_fee`
--

CREATE TABLE `admission_fee` (
  `admission_id` int(20) NOT NULL,
  `admission_type` varchar(100) NOT NULL,
  `admission_nationality` varchar(100) NOT NULL,
  `admission_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_fee`
--

INSERT INTO `admission_fee` (`admission_id`, `admission_type`, `admission_nationality`, `admission_value`) VALUES
(1, 'قبول موحد', 'أردنية', 50),
(2, 'قبول موحد', 'أخرى', 50),
(3, 'موازي', 'أردنية', 100),
(4, 'موازي', 'أخرى', 250);

-- --------------------------------------------------------

--
-- Table structure for table `collage`
--

CREATE TABLE `collage` (
  `collage_id` int(20) NOT NULL,
  `collage_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collage`
--

INSERT INTO `collage` (`collage_id`, `collage_name`) VALUES
(1, 'كلية اصول الدين'),
(2, 'الشيخ نوح القضاة للشريعة والقانون'),
(3, 'الفقه الحنفي'),
(4, 'الفقه المالكي'),
(5, 'الفقه الشافعي'),
(6, 'الفنون والعمارة الاسلامية'),
(7, 'الاداب والعلوم'),
(8, 'العلوم التربوية'),
(9, 'المال والاعمال'),
(10, 'تكنولوجيا المعلومات');

-- --------------------------------------------------------

--
-- Table structure for table `desired_majors`
--

CREATE TABLE `desired_majors` (
  `reg_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `desired_majors_id` int(20) NOT NULL,
  `desired_majors_name` varchar(255) NOT NULL,
  `desired_majors_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(20) NOT NULL,
  `reg_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `pdf_name` varchar(20) NOT NULL,
  `pdf_file` mediumblob NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams_fee`
--

CREATE TABLE `exams_fee` (
  `exams_id` int(20) NOT NULL,
  `exams_type` varchar(100) NOT NULL,
  `exams_nationality` varchar(100) NOT NULL,
  `exams_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams_fee`
--

INSERT INTO `exams_fee` (`exams_id`, `exams_type`, `exams_nationality`, `exams_value`) VALUES
(1, 'قبول موحد', 'أردنية', 45),
(2, 'قبول موحد', 'أخرى', 45),
(3, 'موازي', 'أردنية', 60),
(4, 'موازي', 'أخرى', 90);

-- --------------------------------------------------------

--
-- Table structure for table `high_school_certificate`
--

CREATE TABLE `high_school_certificate` (
  `reg_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `certificate_id` int(20) NOT NULL,
  `certificate_type` varchar(20) NOT NULL,
  `certificate_avg` float NOT NULL,
  `certificate_place` varchar(20) NOT NULL,
  `certificate_year` int(4) NOT NULL,
  `certificate_city` varchar(20) NOT NULL,
  `certificate_town` varchar(20) NOT NULL,
  `certificate_branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `collage_id` int(20) NOT NULL,
  `major_id` int(20) NOT NULL,
  `major_name` varchar(100) NOT NULL,
  `major_branch` varchar(100) NOT NULL,
  `major_minimum_avg_2` int(11) NOT NULL,
  `major_minimum_avg` int(11) NOT NULL,
  `jordanian_fees` int(20) NOT NULL,
  `non_jordanians_fees` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`collage_id`, `major_id`, `major_name`, `major_branch`, `major_minimum_avg_2`, `major_minimum_avg`, `jordanian_fees`, `non_jordanians_fees`) VALUES
(1, 1, 'اصول_الدين', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 75, 75, 15, 21),
(1, 2, 'القراءات_التراثية', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 75, 75, 15, 21),
(2, 3, 'الفقه_واصوله', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 75, 75, 15, 21),
(2, 4, 'القانون', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 65, 65, 40, 60),
(3, 5, 'الفقه_الحنفي', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 75, 75, 10, 15),
(3, 6, 'القضاء_والافتاء', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 75, 75, 10, 15),
(3, 7, 'الاصلاح_والوفاق_الاسري_الشرعي', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 75, 75, 10, 15),
(4, 8, 'الفقه_المالكي', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 75, 75, 10, 15),
(5, 9, 'الفقه_الشافعي', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 75, 75, 10, 15),
(6, 10, 'الفنون_الاسلامية_والتطبيقية', 'علمي ادبي شرعي معلوماتية تعليم صحي شامل', 65, 65, 40, 60),
(7, 11, 'اللغة_العربية', 'علمي ادبي شرعي معلوماتية', 60, 65, 30, 45),
(7, 12, 'اللغة_الانجليزية', 'علمي ادبي شرعي معلوماتية ', 60, 65, 40, 65),
(7, 13, 'التاريخ_والحضارة_الاسلامية', 'علمي ادبي شرعي معلوماتية اقتصاد منزلي', 60, 65, 30, 45),
(8, 14, 'الارشاد_والصحة_النفسية', 'علمي ادبي شرعي معلوماتية اقتصاد منزلي تعليم صحي شامل', 60, 65, 35, 50),
(8, 15, 'معلم_الصف', 'علمي ادبي شرعي معلوماتية اقتصاد منزلي تعليم صحي شامل', 60, 65, 35, 50),
(8, 16, 'تربية_خاصة ', 'علمي ادبي شرعي معلوماتية اقتصاد منزلي تعليم صحي شامل', 60, 65, 35, 50),
(9, 17, 'محاسبة', 'علمي ادبي شرعي معلوماتية فندقي تعليم صحي شامل', 60, 65, 60, 90),
(9, 18, 'ادارة_اعمال', 'علمي ادبي شرعي معلوماتية فندقي تعليم صحي شامل', 60, 65, 50, 70),
(9, 19, 'العلوم_المالية_والمصرفية', 'علمي ادبي شرعي معلوماتية فندقي تعليم صحي شامل', 60, 65, 50, 70),
(9, 20, 'المصارف_الاسلامية', 'علمي ادبي شرعي معلوماتية فندقي تعليم صحي شامل', 60, 65, 40, 60),
(9, 21, 'نظم_المعلومات_الادارية', 'علمي ادبي شرعي معلوماتية فندقي تعليم صحي شامل', 60, 65, 50, 70),
(10, 22, 'علم_الحاسوب', 'علمي معلوماتية صناعي زراعي تعليم صحي شامل', 60, 65, 60, 85),
(10, 23, 'نظم_شبكات_الحاسوب', 'علمي معلوماتية صناعي زراعي تعليم صحي شامل', 60, 65, 60, 85),
(10, 24, 'هندسة_البرمجيات', 'علمي معلوماتية صناعي زراعي تعليم صحي شامل', 60, 65, 60, 85),
(10, 25, 'امن_وسرية_المعلومات_والشبكات', 'علمي معلوماتية صناعي زراعي تعليم صحي شامل', 60, 65, 60, 85),
(10, 26, 'مرفوض', 'مرفوض', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parents_id` int(20) NOT NULL,
  `reg_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `parents_name` varchar(100) NOT NULL,
  `parents_phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `reg_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `admission_id` int(20) NOT NULL,
  `service_id` int(20) NOT NULL,
  `exams_id` int(20) NOT NULL,
  `insurances_id` int(20) NOT NULL,
  `hour_fee` int(20) NOT NULL,
  `pay_status` tinyint(1) NOT NULL DEFAULT 0,
  `delivered` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_request`
--

CREATE TABLE `payment_request` (
  `id` int(20) NOT NULL,
  `reg_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `request_id` int(20) NOT NULL,
  `pay_status` tinyint(4) NOT NULL DEFAULT 0,
  `year_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refunded_insurances_fee`
--

CREATE TABLE `refunded_insurances_fee` (
  `insurances_id` int(20) NOT NULL,
  `insurances_type` varchar(100) NOT NULL,
  `insurances_nationality` varchar(100) NOT NULL,
  `insurances_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refunded_insurances_fee`
--

INSERT INTO `refunded_insurances_fee` (`insurances_id`, `insurances_type`, `insurances_nationality`, `insurances_value`) VALUES
(1, 'قبول موحد', 'أردنية', 50),
(2, 'قبول موحد', 'أخرى', 50),
(3, 'موازي', 'أردنية', 50),
(4, 'موازي', 'أخرى', 100);

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE `registeration` (
  `id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'admin1', 'admin1@example.com', '$2y$10$DLnBFPQaI3XM9jh5btfBNOIxgfHI52Y2lsPWJ4ju0LVUeR/lmikOq', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `request_fee`
--

CREATE TABLE `request_fee` (
  `request_id` int(20) NOT NULL,
  `request_type` varchar(100) NOT NULL,
  `request_nationality` varchar(100) NOT NULL,
  `request_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_fee`
--

INSERT INTO `request_fee` (`request_id`, `request_type`, `request_nationality`, `request_value`) VALUES
(1, 'قبول موحد', 'أردنية', 15),
(2, 'قبول موحد', 'أخرى', 15),
(3, 'موازي', 'أردنية', 25),
(4, 'موازي', 'أخرى', 70);

-- --------------------------------------------------------

--
-- Table structure for table `service_fees`
--

CREATE TABLE `service_fees` (
  `service_id` int(20) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `service_nationality` varchar(100) NOT NULL,
  `service_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_fees`
--

INSERT INTO `service_fees` (`service_id`, `service_type`, `service_nationality`, `service_value`) VALUES
(1, 'قبول موحد', 'أردنية', 125),
(2, 'قبول موحد', 'أخرى', 125),
(3, 'موازي', 'أردنية', 200),
(4, 'موازي', 'أخرى', 300);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `reg_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `student_a_name` varchar(100) NOT NULL,
  `student_e_name` varchar(100) NOT NULL,
  `student_nationality` varchar(20) NOT NULL,
  `student_nationality_id` varchar(20) NOT NULL,
  `student_religion` varchar(20) NOT NULL,
  `student_acceptance` varchar(30) NOT NULL,
  `student_gender` varchar(20) NOT NULL,
  `student_birthdate` date NOT NULL,
  `student_birthplace` varchar(100) NOT NULL,
  `student_social_status` varchar(20) NOT NULL,
  `major_id` int(20) DEFAULT NULL,
  `student_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(20) NOT NULL,
  `year_year` int(4) NOT NULL,
  `year_semester` int(4) NOT NULL,
  `year_effective` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year_year`, `year_semester`, `year_effective`) VALUES
(1, 2021, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `student_id` (`student_id`) USING BTREE,
  ADD KEY `reg_id` (`reg_id`) USING BTREE;

--
-- Indexes for table `admission_fee`
--
ALTER TABLE `admission_fee`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `collage`
--
ALTER TABLE `collage`
  ADD PRIMARY KEY (`collage_id`);

--
-- Indexes for table `desired_majors`
--
ALTER TABLE `desired_majors`
  ADD PRIMARY KEY (`desired_majors_id`),
  ADD KEY `student_id` (`student_id`) USING BTREE,
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`) USING BTREE,
  ADD KEY `reg_id` (`reg_id`) USING BTREE;

--
-- Indexes for table `exams_fee`
--
ALTER TABLE `exams_fee`
  ADD PRIMARY KEY (`exams_id`);

--
-- Indexes for table `high_school_certificate`
--
ALTER TABLE `high_school_certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`),
  ADD KEY `collage_id` (`collage_id`),
  ADD KEY `major_name` (`major_name`) USING BTREE;

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parents_id`),
  ADD KEY `reg_id` (`reg_id`) USING BTREE,
  ADD KEY `student_id` (`student_id`) USING BTREE;

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`reg_id`,`student_id`);

--
-- Indexes for table `payment_request`
--
ALTER TABLE `payment_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `reg_id` (`reg_id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `refunded_insurances_fee`
--
ALTER TABLE `refunded_insurances_fee`
  ADD PRIMARY KEY (`insurances_id`);

--
-- Indexes for table `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_email` (`email`);

--
-- Indexes for table `request_fee`
--
ALTER TABLE `request_fee`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `service_fees`
--
ALTER TABLE `service_fees`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`) USING BTREE,
  ADD UNIQUE KEY `student_nationality_id` (`student_nationality_id`),
  ADD UNIQUE KEY `student_email` (`student_email`),
  ADD KEY `reg_id` (`reg_id`),
  ADD KEY `major_id` (`major_id`) USING BTREE;

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `admission_fee`
--
ALTER TABLE `admission_fee`
  MODIFY `admission_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collage`
--
ALTER TABLE `collage`
  MODIFY `collage_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `desired_majors`
--
ALTER TABLE `desired_majors`
  MODIFY `desired_majors_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `exams_fee`
--
ALTER TABLE `exams_fee`
  MODIFY `exams_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parents_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `payment_request`
--
ALTER TABLE `payment_request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `refunded_insurances_fee`
--
ALTER TABLE `refunded_insurances_fee`
  MODIFY `insurances_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registeration`
--
ALTER TABLE `registeration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `request_fee`
--
ALTER TABLE `request_fee`
  MODIFY `request_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_fees`
--
ALTER TABLE `service_fees`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `registeration` (`id`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `desired_majors`
--
ALTER TABLE `desired_majors`
  ADD CONSTRAINT `desired_majors_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `desired_majors_ibfk_2` FOREIGN KEY (`reg_id`) REFERENCES `registeration` (`id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `registeration` (`id`),
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `high_school_certificate`
--
ALTER TABLE `high_school_certificate`
  ADD CONSTRAINT `high_school_certificate_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `registeration` (`id`),
  ADD CONSTRAINT `high_school_certificate_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `major`
--
ALTER TABLE `major`
  ADD CONSTRAINT `collage_id` FOREIGN KEY (`collage_id`) REFERENCES `collage` (`collage_id`);

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_id` FOREIGN KEY (`reg_id`) REFERENCES `registeration` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`reg_id`,`student_id`) REFERENCES `student` (`reg_id`, `student_id`);

--
-- Constraints for table `payment_request`
--
ALTER TABLE `payment_request`
  ADD CONSTRAINT `payment_request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `payment_request_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `year` (`year_id`),
  ADD CONSTRAINT `reg_id` FOREIGN KEY (`reg_id`) REFERENCES `registeration` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`reg_id`) REFERENCES `registeration` (`id`),
  ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
