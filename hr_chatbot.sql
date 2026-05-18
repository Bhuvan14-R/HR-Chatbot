-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 06:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `chat_logs`
--

CREATE TABLE `chat_logs` (
  `id` int(11) NOT NULL,
  `user_message` text DEFAULT NULL,
  `bot_response` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_logs`
--

INSERT INTO `chat_logs` (`id`, `user_message`, `bot_response`, `created_at`) VALUES
(1, 'leave', 'Employees receive 12 casual leaves and 10 sick leaves annually.', '2026-05-14 13:49:20'),
(2, 'policy', 'Sorry, I couldn\'t understand that question.', '2026-05-14 13:49:26'),
(3, 'hi', 'Sorry, I couldn\'t understand that question.', '2026-05-14 13:54:44'),
(4, 'hi', 'hello', '2026-05-14 14:20:05'),
(5, 'policy', 'just a policy', '2026-05-14 14:20:09'),
(6, 'hi', 'hello', '2026-05-14 14:31:05'),
(7, 'policy', 'just a policy', '2026-05-14 14:31:10'),
(8, 'hello', 'Sorry, I couldn\'t understand that question.', '2026-05-14 14:33:31'),
(9, 'h1', 'hello', '2026-05-14 15:40:02'),
(10, 'h2', 'hello', '2026-05-14 15:40:05'),
(11, 'ag', 'Sorry, I couldn\'t understand that question.', '2026-05-14 15:40:07'),
(12, 'tell me about maternity leave', 'Female employees are eligible for maternity leave benefits as per company regulations and applicable labor laws. Paid maternity leave may be granted for up to six months depending on employment status and documentation requirements.', '2026-05-14 15:44:10'),
(13, 'hi', 'Sorry, I couldn\'t understand that question.', '2026-05-14 15:50:20'),
(14, 'hi', 'hello', '2026-05-14 16:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`) VALUES
(1, 'Adarsh', 'adarsh@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `keyword_name` varchar(255) DEFAULT NULL,
  `response_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `keyword_name`, `response_text`) VALUES
(1, 'leave', '\r\nEmployees are entitled to 12 casual leaves and 10 sick leaves per calendar year. Leave requests must be submitted through the HR portal at least 24 hours in advance whenever possible. Unused casual leaves cannot be carried forward to the next year. Sick leave beyond three consecutive days may require medical documentation.'),
(2, 'salary', '\r\nEmployee salaries are processed and credited directly to registered bank accounts on the last working day of every month. Salary slips are generated digitally through the employee HR portal. Any discrepancies related to payroll must be reported to the HR department within five working days.'),
(3, 'work from home', '\r\nThe organization follows a hybrid work model that allows eligible employees to work remotely up to two days per week, subject to manager approval and project requirements. Employees working from home are expected to maintain regular communication, attend scheduled meetings, and complete assigned tasks within deadlines.'),
(4, 'attendance', '\r\nEmployees are required to maintain regular attendance and adhere to official working hours from 9:00 AM to 6:00 PM, Monday through Friday. Repeated late arrivals or unauthorized absences may impact performance evaluations and disciplinary actions.'),
(5, 'office timing', '\r\nStandard office timings are from 9:00 AM to 6:00 PM with a one-hour lunch break. Employees are expected to log attendance through the HR management system. Flexible work timings may be permitted for selected teams depending on operational requirements.'),
(6, 'insurance', '\r\nComprehensive health insurance coverage is provided to all full-time employees after successful completion of onboarding procedures. Insurance benefits include hospitalization coverage, emergency medical support, and annual health checkups as per company policy guidelines.'),
(7, 'dress code', '\r\nEmployees are expected to maintain a professional appearance during working hours. Formal or business-casual attire is mandatory for office premises and client meetings. Clothing containing inappropriate language or graphics is strictly prohibited.'),
(9, 'policy', 'just a policy'),
(10, 'hello', 'hello'),
(11, 'overtime', 'Overtime work must be approved in advance by the reporting manager. Eligible employees may receive compensatory leave or overtime compensation according to company regulations and workload requirements.'),
(12, 'probation', 'New employees are initially placed under a six-month probation period during which their performance, attendance, and conduct are evaluated. Successful completion of probation results in confirmation of permanent employment status.'),
(13, 'resignation', 'Employees intending to resign must provide a minimum notice period of 30 days. All company assets, credentials, and pending responsibilities must be cleared before the final settlement process is initiated by HR.'),
(14, 'maternity leave', 'Female employees are eligible for maternity leave benefits as per company regulations and applicable labor laws. Paid maternity leave may be granted for up to six months depending on employment status and documentation requirements.'),
(15, 'promotion', 'Employee promotions are determined based on annual performance reviews, project contributions, technical skills, teamwork, and managerial recommendations. Promotions are typically reviewed during the annual appraisal cycle.'),
(16, 'appraisal', 'Performance appraisals are conducted annually to evaluate employee contributions, productivity, communication skills, and goal completion. Salary revisions and promotion recommendations may be based on appraisal outcomes.'),
(17, 'grievance', 'Employees may formally report workplace grievances, harassment concerns, or professional disputes to the HR department through confidential grievance channels. All grievances are investigated according to company compliance policies.'),
(18, 'remote work security', 'Employees working remotely must follow company cybersecurity guidelines, including secure VPN access, password protection, device encryption, and restricted sharing of confidential organizational information.'),
(19, 'internet usage', 'Company internet resources are intended strictly for professional and authorized use. Accessing malicious, inappropriate, or unauthorized content using company systems may result in disciplinary action.'),
(20, 'employee conduct', 'Employees are expected to maintain professionalism, integrity, teamwork, and respectful workplace behavior at all times. Any form of discrimination, harassment, or misconduct violates company ethics policies.'),
(21, 'internship', 'Interns are expected to maintain professional conduct, complete assigned project work, and follow attendance guidelines throughout the internship duration. Internship performance may influence future employment opportunities.'),
(22, 'termination', 'Employment termination may occur due to policy violations, unethical conduct, repeated disciplinary issues, prolonged unauthorized absence, or organizational restructuring in accordance with HR regulations.'),
(23, 'data privacy', 'Employees are responsible for protecting sensitive company and customer data. Unauthorized disclosure, duplication, or misuse of confidential information may result in disciplinary and legal consequences.'),
(24, 'holiday policy', 'Employees are entitled to company-declared public holidays and festival holidays as published in the annual HR holiday calendar. Additional optional holidays may be approved based on regional requirements.'),
(25, 'travel reimbursement', 'Employees traveling for approved business purposes may claim reimbursement for transportation, accommodation, and eligible expenses upon submission of valid bills and managerial approval.'),
(26, 'training', 'Employees are encouraged to participate in professional development programs, technical workshops, and organizational training sessions to improve skills and career growth opportunities.'),
(27, 'hi', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `unanswered_questions`
--

CREATE TABLE `unanswered_questions` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_logs`
--
ALTER TABLE `chat_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unanswered_questions`
--
ALTER TABLE `unanswered_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_logs`
--
ALTER TABLE `chat_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `unanswered_questions`
--
ALTER TABLE `unanswered_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
