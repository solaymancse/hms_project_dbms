-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2024 at 05:08 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `DOB` varchar(255) DEFAULT NULL,
  `e_type` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`, `DOB`, `e_type`, `qualification`, `phone_number`) VALUES
(2, 'Devonteddd nusrat', 'Carleton Collier', 'your.email+fakedata98093@gmail.com', '2024-07-04', 'Laboratorist', 'Bsc', '540990'),
(3, 'Nusrat', 'Jahan', 'fakedata19015@gmail.com', '2024-06-07', 'Receptionist', 'At delectus nisi ', '2997777'),
(4, 'Aurelie', 'Janie Spencer', 'your.email+fakedata39381@gmail.com', '2024-04-21', 'Laboratorist', 'Quae sed repudiandae.', '621'),
(5, 'Rupert', 'Camron Bailey', 'your.email+fakedata12865@gmail.com', '2023-09-18', 'Accountant', 'Et accusamus animi.', '7');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `h_provider_id` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `leave_reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`id`, `employee_id`, `h_provider_id`, `start_date`, `end_date`, `leave_reason`) VALUES
(1, 3, 2, '2024-04-13', '2024-04-27', 'harum omnis reprehenderit iure quos consectetur.'),
(2, 5, 2, '2024-04-13', '2024-04-27', 'Ab exercitationem dolor numquam quidem quo tenetur recusandae.');

-- --------------------------------------------------------

--
-- Table structure for table `healthcare_provider`
--

CREATE TABLE `healthcare_provider` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `dep_id` int DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `healthcare_provider`
--

INSERT INTO `healthcare_provider` (`id`, `first_name`, `last_name`, `qualification`, `phone_number`, `dep_id`, `address`, `gender`, `type`, `DOB`, `email`) VALUES
(2, 'John', 'Doe', 'MD', '123-456-7890', 1, '123 Main St, City, Country', 'Male', 'Doctor', '1980-05-15', 'john.doe@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `h_provider_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `patient_id`, `h_provider_id`, `title`, `STATUS`, `discount`) VALUES
(1, 3, 2, '644', '407', 234.00),
(3, 2, 2, 'Direct Intranet Specialist', 'Tennessee', 208.00),
(4, 3, 2, 'Harum quis expedita ', 'Voluptatibus qui ut ', 38.00);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `publish_date`, `description`) VALUES
(5, 'Human Applications Engineer', '2024-04-08', 'Doloremque voluptas quasi magnam quis laborum quae perferendis necessitatibus.'),
(6, 'International Mobility Representative', '2023-08-21', 'Ea ipsa culpa quisquam sit quasi repudiandae quia temporibus inventore.'),
(7, 'International Mobility Coordinator', '2023-05-10', 'Dignissimos deleniti officia deleniti.'),
(8, 'Global Identity Strategist', '2023-11-28', 'Dicta sequi occaecati soluta.'),
(9, 'new date title', '2024-04-19', 'fffff');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `DOB` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `balance_status` decimal(10,2) DEFAULT NULL,
  `due_balance` decimal(10,2) DEFAULT NULL,
  `paid_balance` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `first_name`, `last_name`, `gender`, `phone_number`, `DOB`, `address`, `balance_status`, `due_balance`, `paid_balance`) VALUES
(1, 'Shana', 'Vandervort', 'Female', '022-265-9490', '2024-01-12', '73231 Labadie Station', 34.00, 864.00, 5.00),
(2, 'Jazmin', 'Moore', 'other', '398', '2024-05-26', '238 Claire Trail', 247.00, 528.00, 521.00),
(3, 'Douglas', 'Ward', 'female', '318', '2023-09-09', '722 Conn Mountain', 534.00, 565.00, 501.00);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `h_provider_id` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `salary_status` varchar(50) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `salary_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee_id`, `h_provider_id`, `amount`, `salary_status`, `paid_amount`, `due_amount`, `salary_date`) VALUES
(1, 2, 2, 678.00, 'due paid', 53.00, 236.00, '2012-09-11'),
(2, 4, 2, 85.00, 'due paid', 47.00, 13.00, '1993-11-18'),
(3, 5, 2, 47.00, 'paid', 46.00, 332.00, '2009-06-09'),
(4, 4, 2, 77.00, 'due paid', 13.00, 372.00, '2009-04-25'),
(5, 4, 2, 288.00, 'paid', 34.00, 794.00, '2022-06-16'),
(6, 2, 2, 331.00, 'paid', 8889.00, 756.00, '2006-08-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `h_provider_id` (`h_provider_id`);

--
-- Indexes for table `healthcare_provider`
--
ALTER TABLE `healthcare_provider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `h_provider_id` (`h_provider_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `h_provider_id` (`h_provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `healthcare_provider`
--
ALTER TABLE `healthcare_provider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD CONSTRAINT `employee_leave_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `employee_leave_ibfk_2` FOREIGN KEY (`h_provider_id`) REFERENCES `healthcare_provider` (`id`);

--
-- Constraints for table `healthcare_provider`
--
ALTER TABLE `healthcare_provider`
  ADD CONSTRAINT `healthcare_provider_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD CONSTRAINT `lab_test_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `lab_test_ibfk_2` FOREIGN KEY (`h_provider_id`) REFERENCES `healthcare_provider` (`id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `salary_ibfk_2` FOREIGN KEY (`h_provider_id`) REFERENCES `healthcare_provider` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
