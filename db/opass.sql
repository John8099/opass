-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 03:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opass`
--

-- --------------------------------------------------------

--
-- Table structure for table `attorney`
--

CREATE TABLE `attorney` (
  `attorney_ID` int(12) NOT NULL,
  `profile` text DEFAULT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `Schedule` varchar(20) NOT NULL,
  `Y_Exp` varchar(200) NOT NULL,
  `Specialization_ID` int(11) NOT NULL,
  `Attorney_username` varchar(20) NOT NULL,
  `Attorney_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attorney`
--

INSERT INTO `attorney` (`attorney_ID`, `profile`, `firstname`, `middlename`, `lastname`, `age`, `email`, `contact`, `address`, `Schedule`, `Y_Exp`, `Specialization_ID`, `Attorney_username`, `Attorney_password`) VALUES
(76842, NULL, 'Christian', 'Paul', 'Obahib', 46, 'Christian@gmail.com', '0945454454', 'Bacolod City', 'Monday, Wednesday, F', '2', 8070273, 'Xtian', '$2y$10$gtljKAX1KD66L.3G1O5t8.hbB4qJXgiF0JrHmtzlExg88XufMdeMK'),
(89237846, NULL, 'Jenelyn', 'Padilla', 'Gonzales', 56, 'Jen@gmail.com', '0945454454', 'Bacolod City', 'Monday, Wednesday', '2', 50902, 'jenX', '$2y$10$cJjGzBlb3g51nigbsZ7z9.0plLH0KAUEvauIWAlVMVw4cZ.nAxTtq'),
(578574033, 'profile-photo/11152021-113201_5.png', 'test1', 'test atty', 'test1', 451, 'test@gmail.com', '0945454454', 'jaro', 'Monday, Wednesday', '2', 7399369, 'uname', '$2y$10$kk1jzOG0X7W/veF6c8ohP.G134xq2xZ0bTSFiOop/.ODJIhEOK7FG'),
(2147483647, NULL, 'Jembier', 'Pizon', 'Tiansing', 56, 'Jembier@gmail.com', '0945454454', 'Bacolod City', 'Monday', '2', 7399369, 'Jembier69', '$2y$10$l0Lhje1ncfXYBxhaN33ICeylUnEVMskgR47sGZe07wQENAu/UIh7y');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `sender_id` text DEFAULT NULL,
  `send_to` text NOT NULL,
  `content` text NOT NULL,
  `send_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `sender_id`, `send_to`, `content`, `send_time`) VALUES
(1, '578574033', '8389', 'MUJ3eTE0V3UxQkdjRG9IWGtUTFdTUT09', '2021-11-11 03:30:52'),
(2, '8389', '578574033', 'Wk5TWXZnVDhTam5nWU05TjRoMjBCQT09', '2021-11-11 03:30:52'),
(5, '89237846', '8389', 'Wk5TWXZnVDhTam5nWU05TjRoMjBCQT09', '2021-11-11 03:30:52'),
(6, '8389', '578574033', 'YXArZ3dDV0NhWHovNFFXZmw5T1d4UT09', '2021-11-11 03:30:52'),
(8, '578574033', '8389', 'MUJ3eTE0V3UxQkdjRG9IWGtUTFdTUT09', '2021-11-11 03:30:52'),
(12, '578574033', '8389', 'MUJ3eTE0V3UxQkdjRG9IWGtUTFdTUT09', '2021-11-17 23:44:05'),
(13, '578574033', '8389', 'MUJ3eTE0V3UxQkdjRG9IWGtUTFdTUT09', '2021-11-17 23:44:05'),
(14, '578574033', '8389', 'MUJ3eTE0V3UxQkdjRG9IWGtUTFdTUT09', '2021-11-17 23:44:05'),
(15, '578574033', '8389', 'MUJ3eTE0V3UxQkdjRG9IWGtUTFdTUT09', '2021-11-17 23:44:05'),
(50, '578574033', '8389', 'MHpRcmJpZ0J5QXJyNEZ5RHpmMXhyQT09', '2021-11-18 01:32:09'),
(52, '578574033', '8389', 'bFFWa2lpV2RNeFpRS1d6SERMM2Zndz09', '2021-11-18 01:37:16'),
(53, '578574033', '8389', 'Qmc2eFpBODFyME51QVg4K0RoVTl1VmhmdWl2NHYyNFRGamZUaXdIdHZkVT0=', '2021-11-18 02:00:43'),
(54, '578574033', '8389', 'ZHFOcFZoL3VlbVpXSXVqa1o0a3FJZz09', '2021-11-18 01:43:40'),
(55, '578574033', '8389', 'ZUhrZitoSUw1cmJKenR2TlV0QlkxNWd1T1lnUHpXOWJ3U2ExbDNqcXFabz0=', '2021-11-18 02:03:09'),
(57, '578574033', '8389', 'ZUhrZitoSUw1cmJKenR2TlV0QlkxejRZTzd1Yzczb00veDZYQlhOMzQ0UT0=', '2021-11-18 02:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `request_form`
--

CREATE TABLE `request_form` (
  `Request_ID` int(12) NOT NULL,
  `Attorney_ID` int(11) NOT NULL,
  `Client_ID` int(12) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `request_name` text NOT NULL,
  `Appointment_date` date NOT NULL,
  `Appointment_Time` varchar(20) NOT NULL,
  `Cancellation_reason` varchar(200) DEFAULT NULL,
  `status` varchar(11) NOT NULL,
  `user_status` varchar(10) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_accepted` datetime DEFAULT NULL,
  `date_ended` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_form`
--

INSERT INTO `request_form` (`Request_ID`, `Attorney_ID`, `Client_ID`, `fname`, `lname`, `email`, `address`, `request_name`, `Appointment_date`, `Appointment_Time`, `Cancellation_reason`, `status`, `user_status`, `date_created`, `date_accepted`, `date_ended`) VALUES
(746556, 578574033, 8389, 'test', 'test', 'test@gmail.com', 'test', 'test test test ', '2021-11-25', '10 am', NULL, 'accepted', NULL, '2021-11-18 02:21:13', '2021-11-18 10:23:38', NULL),
(2147483641, 578574033, 8389, 'test', 'test', 'test@gmail.com', 'awd', 'awdawdawd', '2021-11-26', ' 12pm', NULL, 'done', NULL, '2021-11-18 13:12:50', '2021-11-05 21:12:56', '2021-11-11 11:48:20'),
(2147483642, 578574033, 8389, 'test', 'test', 'test@gmail.com', 'awd', 'awdawdawd', '2021-11-26', '12 am', NULL, 'done', NULL, '2021-11-18 13:12:50', '2021-11-05 21:12:56', '2021-11-11 11:48:21'),
(2147483647, 578574033, 8389, 'test', 'test', 'test@gmail.com', 'test', 'test request', '2021-11-26', '12 pm', NULL, 'pending', NULL, '2021-11-18 02:17:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_provided`
--

CREATE TABLE `service_provided` (
  `ServiceProvided_ID` int(12) NOT NULL,
  `Appointment_ID` int(11) NOT NULL,
  `Service_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `Specialization_ID` int(12) NOT NULL,
  `Specialization_name` text NOT NULL,
  `spec_description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`Specialization_ID`, `Specialization_name`, `spec_description`) VALUES
(50902, 'Family Law', 'Focuses on law related to family issues.'),
(7399369, 'International Law', 'Focuses on law related to International issues.'),
(8070273, 'Intellectual Property Law', 'Focuses on law related to ownership  ');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `todo_ID` int(11) NOT NULL,
  `Attorney_id` int(12) NOT NULL,
  `todotitle` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `twofa`
--

CREATE TABLE `twofa` (
  `id` int(11) NOT NULL,
  `user_id` int(32) NOT NULL,
  `code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Client_ID` int(12) NOT NULL,
  `profile` text DEFAULT NULL,
  `c_fname` text NOT NULL,
  `c_mname` text NOT NULL,
  `c_lname` text NOT NULL,
  `c_number` text NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_age` int(3) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Client_ID`, `profile`, `c_fname`, `c_mname`, `c_lname`, `c_number`, `c_email`, `c_age`, `c_address`, `Username`, `Password`) VALUES
(8389, 'profile-photo/11162021-120151_6.png', 'test', 'test', 'test', '0945454454', 'test@gmail.com', 20, 'Jaro', 'uname1', '$2y$10$FfM9w0ihs5ER.2f9OwRN4.YmVzDigPCzcw0GFBGhCRgK9xwgIW15G'),
(491949, NULL, 'Jerold', 'Tolentino', 'Arnaiz', '0945454454', 'Jerold@gmail.com', 21, 'Bacolod City', 'Jerold69', '$2y$10$nRSsJMX.eJJe5a5QLu02nualGr72QQSQr2sE13MW2eHogHyV9QsTa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attorney`
--
ALTER TABLE `attorney`
  ADD PRIMARY KEY (`attorney_ID`),
  ADD KEY `Specialization_ID` (`Specialization_ID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `request_form`
--
ALTER TABLE `request_form`
  ADD PRIMARY KEY (`Request_ID`),
  ADD KEY `Attorney_ID` (`Attorney_ID`),
  ADD KEY `Client_ID` (`Client_ID`);

--
-- Indexes for table `service_provided`
--
ALTER TABLE `service_provided`
  ADD PRIMARY KEY (`ServiceProvided_ID`),
  ADD KEY `Service_ID` (`Appointment_ID`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`Specialization_ID`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_ID`),
  ADD KEY `Admin_login_ID` (`Attorney_id`);

--
-- Indexes for table `twofa`
--
ALTER TABLE `twofa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Client_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `twofa`
--
ALTER TABLE `twofa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attorney`
--
ALTER TABLE `attorney`
  ADD CONSTRAINT `attorney_ibfk_2` FOREIGN KEY (`Specialization_ID`) REFERENCES `specialization` (`Specialization_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_form`
--
ALTER TABLE `request_form`
  ADD CONSTRAINT `request_form_ibfk_1` FOREIGN KEY (`Attorney_ID`) REFERENCES `attorney` (`attorney_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_form_ibfk_2` FOREIGN KEY (`Client_ID`) REFERENCES `user` (`Client_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_provided`
--
ALTER TABLE `service_provided`
  ADD CONSTRAINT `service_provided_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `request_form` (`Request_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`Attorney_id`) REFERENCES `attorney` (`attorney_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
