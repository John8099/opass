-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql113.epizy.com
-- Generation Time: Apr 07, 2022 at 01:28 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30390914_opass`
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
(112682, NULL, 'Jembier', 'P', 'Tiansing', 69, 'tiansingjembier@gmail.com', '09302423049', 'Bacolod City', 'Monday,Tuesday,Frida', '10', 13, 'Jembier69', '$2y$10$2N1Bc.A.89hfh/OGtwZGuu6GkbKsRm.aMUip4pBlfNa1tZyK2YXEK'),
(328960, NULL, 'Jenelyn', 'Santiso', 'Gonzales', 35, 'jenelyngonzales133@gmail.com', '09480569160', 'Bacolod', 'M W F', '8', 7, 'jenelyn', '$2y$10$F5mA6a.JZadCQlDKGwLeZeTQuGgPeoCCe4lTU6rgisU1k/Wu3/v/C'),
(6114952, NULL, 'Luzviminda', 'Quitallan', 'Nagum', 39, 'drellbatarian@gmail.com', '09162583868', 'Bacolod City', 'M, W, F', '12', 7399369, 'Luzviminda', '$2y$10$k9Rp4p7i/FEmO1eTxQP3M.KxCFnj6aKfLfzO8zzpFRvN8H5xYrL7i'),
(6433470, NULL, 'test', 'test', 'test', 46, 'test@test.com', '0987623414', 'awd1', 'Monday', '25 years', 50902, 'uname123', '$2y$10$NVK9dVLSnjklNliI27RuruwnaDvCwpJ1fXTLGOSf7HG7sZtzi1Isy'),
(89237846, NULL, 'Jenelyn', 'Padilla', 'Gonzales', 56, 'Jen@gmail.com', '0945454454', 'Bacolod City', 'Monday, Wednesday', '2', 50902, 'jenX', '$2y$10$cJjGzBlb3g51nigbsZ7z9.0plLH0KAUEvauIWAlVMVw4cZ.nAxTtq'),
(185469993, NULL, 'Jenelyn ', 'Santiso', 'Gonzales', 28, 'jen@gmail.com', '09090909099', 'Bacolod', 'M W F', '2', 13, 'Jen', '$2y$10$UCzWFesdv0cWKUG2gXd81uVC4sOR0AmFMFOKkbdu5LfghvYW5snMO'),
(578574033, 'profile-photo/11152021-113201_5.png', 'test1', 'test atty', 'test1', 451, 'test@gmail.com', '0945454454', 'jaro', 'Monday, Wednesday', '2', 7399369, 'uname', '$2y$10$kk1jzOG0X7W/veF6c8ohP.G134xq2xZ0bTSFiOop/.ODJIhEOK7FG'),
(1042606505, NULL, 'Jembier', 'Patenio', 'Tiansing', 30, 'jenelyn.gonzales133@gmail.com', '09480569160', 'La', 'M', '2', 16, 'JembierTiansing', '$2y$10$Bir3W6SklD/ew64kVBwjUOdEdyxU7kbRg9CwpTWZKfVvWX3bFgKxC'),
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
(57, '578574033', '8389', 'ZUhrZitoSUw1cmJKenR2TlV0QlkxejRZTzd1Yzczb00veDZYQlhOMzQ0UT0=', '2021-11-18 02:04:20'),
(61, '7971952', '6433470', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 11:43:57'),
(62, '7971952', '6433470', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 12:03:29'),
(63, '6433470', '7971952', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 12:07:27'),
(64, '6433470', '7971952', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 15:24:31'),
(65, '7971952', '6433470', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 15:53:32'),
(67, '6433470', '7971952', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 15:57:02'),
(68, '7971952', '6433470', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 15:57:07'),
(69, '7971952', '6433470', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 15:58:51'),
(70, '6433470', '7971952', 'THdMamJTcUVIeGNEbWR1R0g1YkowQT09', '2021-11-23 15:59:23'),
(71, '7971952', '6433470', 'N3IvaCtjKzNSOHlWMVphTTZoeGV1dz09', '2021-11-23 16:04:33'),
(72, '7971952', '6433470', 'TkdKekF6aXVhdEc3eTBtRGhucFpWdz09', '2021-11-23 16:04:48'),
(73, '6433470', '7971952', 'clgycnRxa3d5aEtkcmNLMTJXWjZLQT09', '2021-11-23 16:05:01'),
(74, '6114952', '85456', 'dG5Hd1EzbGhYY1NjS1BkQXRhUVhYZz09', '2021-11-24 07:06:26'),
(75, '6114952', '85456', 'bTJLcENmMm5hTWNVR2lhVnBSdDZDZz09', '2021-11-24 07:07:12'),
(76, '85456', '6114952', 'RGxmQmExSklURm9zblRTcU1OaVRrZz09', '2021-11-24 07:07:35'),
(77, '6114952', '85456', 'K2YxQkV5UFd4RndNSDhoa3FIcHN4R0FqbVNjQWFlcmJNaTUxQkYwWkUrYz0=', '2021-11-24 07:08:01'),
(78, '26765', '6114952', 'NS85dUlLZWNVVWY1TTdTZTB1S1U4QT09', '2021-11-27 05:36:51'),
(79, '6114952', '26765', 'V2ZjUFVXYTRDaEttM21Wdnh6dVgrWlVoOExLT0ZDZmVlWEx4cW1tMkhaQT0=', '2021-11-27 05:37:10'),
(80, '26765', '6114952', 'Mk5RRWVXOFJQei9vdXF2RkJxcGtYVktsSEt6RmpYMlZyZFpyUGxoL1pqSWcxdGlBWTZDcVFSckt6dGVpTmljSQ==', '2021-11-27 05:37:27'),
(81, '26765', '6114952', 'MDhPTjZ2dnUzV3ppR2ZoekVvSkVIY2ZhdTd1UXdoelVZM3hseG5ub0dJWT0=', '2021-11-27 05:37:33'),
(82, '26765', '6114952', 'dTlMbWZpZm5adFMwUm1tSE1xN0Ftd0d2bUVmVkcxUE5uRXhnMGl2dUZWRT0=', '2021-11-27 05:37:41'),
(83, '6114952', '85456', 'b1BLRnRXZW9GSmVnTkM3VlZ0RTF4UT09', '2021-11-27 05:38:31'),
(84, '26765', '6114952', 'Uk5ydUh0Z24xUkxUNzRJS3FhVS8wQT09', '2021-12-13 14:04:20'),
(85, '26765', '6114952', 'NS85dUlLZWNVVWY1TTdTZTB1S1U4QT09', '2021-12-13 14:04:43'),
(86, '6114952', '85456', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-01-07 14:10:47'),
(87, '6114952', '85456', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-01-07 14:11:00'),
(88, '6114952', '85456', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-01-07 14:11:32'),
(89, '6114952', '26765', 'NlpuVmZCSjZ4b1JuQVpPakVGdzk4QT09', '2022-01-07 14:11:54'),
(90, '51668', '6114952', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-01-07 14:21:11'),
(91, '6114952', '51668', 'RGxmQmExSklURm9zblRTcU1OaVRrZz09', '2022-01-07 14:21:35'),
(92, '328960', '56297', 'RFZqWCtSY1ZTRVp1MUJsYTdJQjNxNFg5N1lucitSaFlHR1grUmdXbDdIVT0=', '2022-01-20 07:49:50'),
(93, '56297', '328960', 'NlpuVmZCSjZ4b1JuQVpPakVGdzk4QT09', '2022-01-20 07:50:20'),
(94, '1042606505', '56297', 'eWpmVWRBOXh3RVdMMXV1UGkwZWd2c1ptM28xYjhOTC8wOWlQY0ZwMlMvZz0=', '2022-01-25 06:13:06'),
(95, '56297', '1042606505', 'VDJuR1huTU1salU2RmtaZjZVVnZjUT09', '2022-01-25 06:14:28'),
(96, '56297', '1042606505', 'UnhqRzFpUEJIOUZlWjU3dGtLSWU3Zz09', '2022-01-28 08:31:58'),
(97, '56297', '4850', 'elZHTmpwQXdaRmpTS0twMlNVOUlZYjgybHJaY2p2eFNkZ0VFZnJ6RnkrYz0=', '2022-02-08 08:54:08'),
(98, '4850', '56297', 'UWczYnltdENzb2pMWW9tTVNEZlUwRlR1VVJHRVlhYi9nS1pUU1VmdHZsQT0=', '2022-02-08 08:54:43'),
(99, '4850', '56297', 'RFZqWCtSY1ZTRVp1MUJsYTdJQjNxNFg5N1lucitSaFlHR1grUmdXbDdIVT0=', '2022-02-08 08:56:03'),
(100, '56297', '4850', 'c3FkM1dUTCs4cXhNdUNQU2VPLzZuZG9SOGd5WHlWYlgwU1NoOUNWZno2dUlTVVRaSkNvTjYyRFFHOXZ1SlV3MA==', '2022-02-08 08:56:20'),
(101, '1042606505', '56297', 'RGxmQmExSklURm9zblRTcU1OaVRrZz09', '2022-03-15 00:26:51'),
(102, '1042606505', '56297', 'RGxmQmExSklURm9zblRTcU1OaVRrZz09', '2022-03-15 00:26:51'),
(103, '1042606505', '56297', 'UEtiR0pveHRhK3AzZnJyRzE3RDEydzhjLzJvWU1FT1VrR1U5bnB3cE92VT0=', '2022-04-06 10:06:01'),
(104, '56297', '328960', 'NkRyREpUeDhxRXB0UjJVcVFQbm1KWDdUYkU4MkZNdUpMRzR5emh4YVgrZ0puV29MZFpUK3ZEdUVmMTlCSERadQ==', '2022-04-06 10:06:50'),
(105, '56297', '4850', 'dW1nQTI2N2g0WUhJOVEzUTF5ZXhrSkZ2V3ZTa0FNcG90L2o0cjZRUkxvU2d4ZTZOeURTeG1UQ1JFQlBydWtJUg==', '2022-04-06 10:08:04'),
(106, '56297', '4850', 'dDdUUzRFaS9zR2QzNkhMaHl4RG92QT09', '2022-04-06 10:08:54'),
(107, '56297', '4850', 'aXJ0bDFHblVnUmdEaFAzSURKRW14UT09', '2022-04-06 10:18:13'),
(108, '42081', '56297', 'SFo2M3FsY05DNys2N0tYUndoS2ljdz09', '2022-04-06 10:18:33'),
(109, '42081', '56297', 'RFZqWCtSY1ZTRVp1MUJsYTdJQjNxNFg5N1lucitSaFlHR1grUmdXbDdIVT0=', '2022-04-06 10:18:53'),
(110, '56297', '4850', 'V0lkeGRUcjZzV2kwLzZZQWdDQ095QT09', '2022-04-06 10:19:16'),
(111, '56297', '42081', 'TFB5WlJ5UkpOdzRBL1ZsdHNOR1RQZz09', '2022-04-06 10:20:25'),
(112, '56297', '42081', 'N3NjN3c1ZGlmN0IyTmdJanR0bTFKZ1AvR2w2ZVB5M21CSXo1UEVRUGRaUT0=', '2022-04-06 10:20:45'),
(113, '42081', '56297', 'Si8ranZEZWw3MVI5VncwVXFkSG8yQT09', '2022-04-06 10:20:56'),
(114, '42081', '56297', 'THpEZWIzRWVjbm02L1NJNFhRMndBRVdzMElqaE1RNGgremk2YVpNNUFsTDZueGtZcXIybWdYbEFrUmZkMC82Rw==', '2022-04-06 10:21:48'),
(115, '328960', '56297', 'RFZqWCtSY1ZTRVp1MUJsYTdJQjNxNFg5N1lucitSaFlHR1grUmdXbDdIVT0=', '2022-04-06 10:30:17'),
(116, '56297', '328960', 'Nko5bEtueUdzNi9FWmd3bzBkTk93dz09', '2022-04-06 10:33:59'),
(117, '185469993', '', 'RFZqWCtSY1ZTRVp1MUJsYTdJQjNxNFg5N1lucitSaFlHR1grUmdXbDdIVT0=', '2022-04-06 10:34:16'),
(118, '56297', '328960', 'b1dOUVQ2Wmh4QzBJUk1vd002TlRrdz09', '2022-04-06 10:34:43'),
(119, '185469993', '56297', 'RnBmZ2c2Y1UrVXhZRk9KbWtpVmpGUT09', '2022-04-06 10:34:56'),
(120, '56297', '185469993', 'TVV5SXZjdDRkQmY0ZnExMkNzNFNKdz09', '2022-04-06 10:35:22'),
(121, '56297', '185469993', 'WHc5RTArUHEvNlJxa1NOSVIyTXkvdz09', '2022-04-06 10:36:05'),
(122, '185469993', '569580745', 'RXFEOXNLMngyODZqNnFLbEptbFZXOTBjOUthQlJoemJZQWFjei81dTYxbz0=', '2022-04-06 10:38:24'),
(123, '569580745', '185469993', 'aXJ0bDFHblVnUmdEaFAzSURKRW14UT09', '2022-04-06 10:38:43'),
(124, '185469993', '', 'Si8ranZEZWw3MVI5VncwVXFkSG8yQT09', '2022-04-06 10:39:13'),
(125, '185469993', '', 'VHpodE5OQSthM2s1N1NiVUxOdWh0QT09', '2022-04-06 10:39:21'),
(126, '185469993', '', 'RVBnWGM3dnI4L2JOZy9KeDZwelM0UT09', '2022-04-06 10:39:26'),
(127, '569580745', '185469993', 'ajQ4M2ZmVVQvVis4YTZySGdVdGQ2Zz09', '2022-04-06 10:39:35'),
(128, '185469993', '', 'aVM2a3pIanFYanVLZE9UWEZzelBNZz09', '2022-04-06 10:39:39'),
(129, '185469993', '', 'THpEZWIzRWVjbm02L1NJNFhRMndBRTZ5VDcxV3hBRldjdHJWazJKcGxIZz0=', '2022-04-06 10:39:53'),
(130, '185469993', '', 'aVM2a3pIanFYanVLZE9UWEZzelBNZz09', '2022-04-06 10:40:10'),
(131, '185469993', '569580745', 'M2lGRUxNb0xqakVQT1dMZktUK1d0QT09', '2022-04-06 10:40:18'),
(132, '569580745', '185469993', 'Si8ranZEZWw3MVI5VncwVXFkSG8yQT09', '2022-04-06 10:40:29'),
(133, '185469993', '569580745', 'amgzZ0JjNm95V3RTWXRhWHlnNS9hbTlLbFYzZnUrU1NpU3hSSG1KNmhUcz0=', '2022-04-06 10:40:44'),
(134, '569580745', '185469993', 'YzNJTlpNRGR1WXh5QUtEQ0gzOGY1Zz09', '2022-04-06 10:40:53'),
(135, '185469993', '2449', 'YitIUEg1RmI0WkUvMUFKOFJCNHNSS2IwZzhLUWU5M1M2S1BIWXRNdVhUeS9YazRCMUNra29SZ1lZMUgzcEVQNmJYUXFMMTJqOHhYRGptNUlTYWZnUWc9PQ==', '2022-04-06 10:43:05'),
(136, '2449', '185469993', 'Q2xGK28zT1l4T2V2Q1c4NUZFeHY5UT09', '2022-04-06 10:43:40'),
(137, '2449', '185469993', 'bGozNGJDQTRjdnJGR09uaTRPdk5RN0piaHZiQ1N5VWZKSmViRFo0Y0JETT0=', '2022-04-06 10:43:51'),
(138, '185469993', '', 'eGZyZlQ2bVptckRwcktzRklxYUMxUT09', '2022-04-06 10:44:02'),
(139, '185469993', '2449', 'bFppNFFTY3pUcGY0bEtud0pERXBHdz09', '2022-04-06 10:44:32'),
(140, '2449', '185469993', 'QTM5VVpBbVRPTE9CV3AwT21XVXNzdHpmRTZ1dENKVVo3bUJuVGs1a0VzUT0=', '2022-04-06 10:44:50'),
(141, '2449', '185469993', 'THpEZWIzRWVjbm02L1NJNFhRMndBQnRrREt0VWtjQ1JtN1ZLTGs5dlZLU01GTVVSSEFjckl2WWVwT3lqY0JSaQ==', '2022-04-06 10:45:15'),
(142, '185469993', '', 'MDNRQkxOWlAyREdvSVBqUEpsejlldz09', '2022-04-06 10:45:53'),
(143, '185469993', '2449', 'SS95Qkluem10N3lMYVFQWWpmai9BanVKNkUyVXhyRmxWSUR2dXNtWUp2az0=', '2022-04-06 10:46:27'),
(144, '2449', '185469993', 'TW9DYWphZ2QwbXROVlNtYitQUW1nZXpubHErU2RMYlV2K0FYM1BvYXM0RT0=', '2022-04-06 10:46:43'),
(145, '185469993', '2449', 'Q2xGK28zT1l4T2V2Q1c4NUZFeHY5UT09', '2022-04-06 10:47:15'),
(146, '2449', '185469993', 'K1lUOFF4UDEyYWYxMVorODlpZ25yQT09', '2022-04-06 10:47:31'),
(147, '185469993', '2449', 'S2REaFdDUzErNmFZN0kxYWMxdVcxZnQ2VmhvejdaakFxcnZPTGhxcGhaQXBrQ0VNdHQwSnlrY1BUN3h6ME9Law==', '2022-04-06 10:48:48'),
(148, '2449', '185469993', 'SW5yMW1uaitsUjJBclU3MDVTaU1RUT09', '2022-04-06 10:49:01'),
(149, '185469993', '2449', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-04-06 10:49:33'),
(150, '2449', '185469993', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-04-06 10:49:40'),
(151, '185469993', '2449', 'UWVYMDRCRkFsZ294KzNIcjdWOFZuUkx3ZFNsUzRwRnE1WmV4bTV3dGdmNU1jcUNGcG5yVW5kZzdoTEx5bndDZA==', '2022-04-06 10:49:59'),
(152, '185469993', '', 'THpEZWIzRWVjbm02L1NJNFhRMndBQ2Nib3pRUnBZZkY5Ujg5Y3hIY1VpNnFZSkMxaUJhNTFTb05pVjhxV1BHdA==', '2022-04-06 10:50:24'),
(153, '2449', '185469993', 'THpEZWIzRWVjbm02L1NJNFhRMndBTWNONDVQWVZ3VGNqenIyN0w4UmF1N0pIdTI1OU5YbXUrVm1Jb3JmbmlSeA==', '2022-04-06 10:50:41'),
(154, '1042606505', '56297', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-04-07 02:40:58'),
(155, '1042606505', '569580745', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-04-07 02:46:16'),
(156, '569580745', '1042606505', 'ZERMclNFL0daZFlFNzVEV0Z1dGtrdz09', '2022-04-07 02:47:15'),
(157, '569580745', '1042606505', 'd2JML1JZWmkzdnNtV2dkdVJ2ZTNGdz09', '2022-04-07 02:48:00'),
(158, '1042606505', '7971952', 'NlpuVmZCSjZ4b1JuQVpPakVGdzk4QT09', '2022-04-07 05:19:30');

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
(535, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', '15', '2022-03-21', '10 AM', NULL, 'done', NULL, '2022-03-11 09:47:24', '2022-03-11 17:51:24', '2022-03-15 20:12:55'),
(538, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem Ipsum', '2022-01-31', '11 AM', NULL, 'done', NULL, '2022-01-27 06:47:43', '2022-01-27 14:48:49', '2022-01-27 16:30:18'),
(558, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test6', '2022-03-02', '11 AM', 'test3', 'cancelled', NULL, '2022-02-02 09:26:22', NULL, NULL),
(585, 1042606505, 28149, 'Shan', 'Paige', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test1', '2022-02-02', '10 am', NULL, 'done', NULL, '2022-01-29 09:27:07', '2022-01-29 17:28:27', '2022-01-31 00:22:54'),
(588, 1042606505, 56297, 'Arvee', 'Lozada', 'Arvee@gmail.com', 'Bacolod City', 'fafafasfasfasfasf', '2022-04-30', '10 AM', NULL, 'accepted', NULL, '2022-04-07 02:40:24', '2022-04-07 10:45:24', NULL),
(763, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', 'test13', '2022-03-02', '10 PM', '', 'cancelled', NULL, '2022-03-01 15:24:53', NULL, NULL),
(774, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', 'test9', '2022-03-25', '10 AM', NULL, 'done', NULL, '2022-02-21 05:54:29', '2022-02-21 13:56:57', '2022-02-21 13:58:12'),
(878, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test5', '2022-02-21', '9 AM', NULL, 'done', NULL, '2022-02-01 05:39:12', '2022-02-01 13:40:42', '2022-02-01 13:41:35'),
(3345, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Qwertyy', '2022-02-25', '3 PM', NULL, 'done', NULL, '2022-02-17 08:22:51', '2022-02-17 16:25:04', '2022-02-20 00:27:53'),
(4555, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem Ipsum', '2022-02-02', '11 AM', NULL, 'done', NULL, '2022-01-29 09:16:40', '2022-01-29 17:17:58', '2022-01-29 17:20:33'),
(6374, 6114952, 26765, 'Jembier', 'Tiansing', 'Jembier71@gmail.com', 'La castellana', 'Test', '2021-11-30', '10 AM', NULL, 'accepted', NULL, '2021-11-27 05:34:28', '2021-11-26 13:01:02', NULL),
(6845, 185469993, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod', 'qwertyuiop', '2022-04-22', '12 nn', NULL, 'done', NULL, '2022-04-06 10:33:33', '2022-04-06 18:38:20', '2022-04-06 18:41:07'),
(7543, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem', '2022-02-23', '11 AM', NULL, 'done', NULL, '2022-02-04 08:54:39', '2022-02-04 16:56:40', '2022-02-05 22:53:09'),
(8536, 4850, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod', 'test', '2022-04-15', '10 am', NULL, 'done', NULL, '2022-04-02 07:04:50', '2022-04-02 15:09:54', '2022-04-06 18:09:05'),
(33565, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Qwerty', '2022-02-21', '9 AM', NULL, 'done', NULL, '2022-02-13 18:11:07', '2022-02-14 02:13:41', '2022-02-17 16:25:12'),
(35358, 185469993, 569580745, 'Xian', 'Ledesma', 'xian@gmail.com', 'Bacolod', 'qweertyui', '2022-04-15', '12 nn', '', 'accepted', 'Done', '2022-04-06 10:38:01', '2022-04-06 18:42:50', NULL),
(44374, 42081, 56297, 'Arvee', 'Lozada', 'jen@gmail.com', 'Bacolod', 'qwerty', '2022-04-08', '12 ', NULL, 'accepted', NULL, '2022-04-06 10:17:44', '2022-04-06 18:22:35', NULL),
(54554, 185469993, 2449, 'Shannen', 'Gonzales', 'drellbatarian@gmail.com', 'Bacolod', 'asasasas', '2022-04-08', '12 nn', NULL, 'accepted', NULL, '2022-04-06 10:42:24', '2022-04-06 18:47:08', NULL),
(76545, 6114952, 85456, 'Jenelyn', 'Gonzales', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Would like to discuss about family matter', '2021-12-01', '10 am', '', 'done', 'Done', '2021-11-23 10:28:13', '2021-11-23 18:27:59', '2021-11-23 18:59:05'),
(84586, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test10', '2022-02-28', '11 AM', NULL, 'done', NULL, '2022-02-23 09:37:30', '2022-02-23 17:40:27', '2022-02-25 16:23:55'),
(87656, 6114952, 51668, 'Shannen', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem Ipsum', '2022-01-14', '3pm', NULL, 'accepted', NULL, '2022-01-07 14:18:46', '2022-01-07 22:20:23', NULL),
(346885, 1042606505, 7971952, 'test', 'Test', 'test@gmail.com', 'test', 'test request', '2022-04-29', '12 pm', NULL, 'accepted', NULL, '2022-04-07 05:18:29', '2022-04-07 13:23:43', NULL),
(365468, 112682, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Jsjsjs', '2022-03-30', '3 PM', NULL, 'pending', NULL, '2022-03-19 15:02:10', NULL, NULL),
(378534, 112682, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Qwe', '2022-03-28', '3 PM', NULL, 'pending', NULL, '2022-03-19 15:04:00', NULL, NULL),
(386463, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem aipsum', '2022-02-11', '9 AM', NULL, 'done', NULL, '2022-01-30 16:20:59', '2022-01-31 00:22:46', '2022-01-31 23:11:31'),
(473535, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Would like to discuss about realty concern', '2022-01-28', '10 am', NULL, 'done', NULL, '2022-01-26 06:41:16', '2022-01-26 14:43:48', '2022-01-27 14:47:37'),
(566567, 6433470, 7971952, 'test', 'Test', 'Test@test.com', 'Test', 'Test', '2021-11-30', '12pm', NULL, 'accepted', NULL, '2021-11-23 11:23:19', '2021-11-23 19:21:59', NULL),
(587377, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', '16', '2022-03-21', '9 AM', NULL, 'done', NULL, '2022-03-09 11:24:28', '2022-03-09 19:28:18', '2022-03-11 17:51:35'),
(663886, 1042606505, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod', 'teeeeeest', '2022-04-27', '2 PM', NULL, 'done', NULL, '2022-04-02 07:06:45', '2022-04-02 15:11:51', '2022-04-06 18:10:13'),
(684446, 1042606505, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod', 'sasasasasaasaasasasas', '2022-04-08', '12 nn', NULL, 'accepted', NULL, '2022-04-06 10:05:25', '2022-04-06 18:10:18', NULL),
(746556, 578574033, 8389, 'test', 'test', 'test@gmail.com', 'test', 'test test test ', '2021-11-25', '10 am', NULL, 'accepted', NULL, '2021-11-18 02:21:13', '2021-11-18 10:23:38', NULL),
(748566, 4850, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Tesst', '2022-03-30', '10 am', NULL, 'done', NULL, '2022-03-28 22:00:04', '2022-03-29 06:05:02', '2022-04-06 18:09:07'),
(764633, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test', '2022-02-18', '11 AM', NULL, 'done', NULL, '2022-01-31 15:10:04', '2022-01-31 23:11:40', '2022-01-31 23:16:49'),
(777686, 6114952, 85456, 'Jenelyn', 'Gonzales', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem Ipsum', '2021-11-29', '3 PM', NULL, 'accepted', NULL, '2021-11-24 07:05:19', '2021-11-24 15:04:03', NULL),
(844786, 1042606505, 28149, 'Shan', 'Paige', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test2', '2022-02-25', '9 AM', 'Test2', 'cancelled', NULL, '2022-01-31 15:13:21', NULL, NULL),
(886853, 6114952, 26765, 'Jembier', 'Tiansing', 'Jembier71@gmail.com', 'La castellana', 'Test', '2021-11-30', '10 am', NULL, 'accepted', NULL, '2021-11-23 11:01:06', '2021-11-23 19:00:15', NULL),
(4565843, 1042606505, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod City', 'Lorem Ipsum', '2022-02-04', '4 PM', NULL, 'done', NULL, '2022-01-28 08:31:06', '2022-01-28 16:32:30', '2022-01-29 17:17:52'),
(4765344, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test5', '2022-02-07', '3 PM', 'test3', 'cancelled', NULL, '2022-02-01 05:40:21', NULL, NULL),
(4788663, 4850, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod', 'asaasasasasasasasasa', '2022-04-11', '8 am', NULL, 'accepted', NULL, '2022-04-06 10:07:27', '2022-04-06 18:12:15', NULL),
(5783835, 1042606505, 569580745, 'Xian', 'Ledesma', 'Xian@gmail.com', 'Bacolod City', 'asfasfsfsdfsdfsdfsdfsdf', '2022-04-27', '12 PM', NULL, 'accepted', NULL, '2022-04-07 02:45:33', '2022-04-07 10:50:40', NULL),
(6446366, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', '18', '2022-03-25', '10 AM', '', 'cancelled', NULL, '2022-03-15 12:08:11', NULL, NULL),
(6876454, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test3', '2022-02-18', '9 AM', 'Test3', 'cancelled', NULL, '2022-01-31 15:15:32', NULL, NULL),
(7673335, 328960, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '2022-01-26', '3 pm', '', 'accepted', 'Done', '2022-01-20 07:48:07', '2022-01-20 15:49:02', NULL),
(33576833, 4850, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod', 'I would like to have an attorney for an assault case', '2022-02-24', '3 PM', NULL, 'done', NULL, '2022-02-08 08:48:31', '2022-02-08 16:54:04', '2022-02-08 16:58:14'),
(33774635, 4850, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod', 'asasasasas', '2022-03-30', '3PM', NULL, 'done', NULL, '2022-03-24 12:15:14', '2022-03-24 20:19:27', '2022-04-06 18:09:10'),
(64533784, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Qw', '2022-02-21', '11 AM', NULL, 'done', NULL, '2022-02-05 14:51:25', '2022-02-05 22:53:02', '2022-02-09 18:35:51'),
(67388578, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', 'test11', '2022-04-06', '10 AM', '', 'cancelled', NULL, '2022-02-25 08:21:04', NULL, NULL),
(67435376, 4850, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', 'juan1', '2022-03-30', '3PM', NULL, 'done', NULL, '2022-03-19 15:07:41', '2022-03-19 23:11:36', '2022-04-06 18:09:12'),
(74438858, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem ipsum', '2022-01-31', '11 AM', NULL, 'done', NULL, '2022-01-29 09:19:23', '2022-01-29 17:20:40', '2022-01-29 17:24:05'),
(74554854, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem Ipsum Lorem Ipsum', '2022-01-28', '9 AM', NULL, 'done', NULL, '2022-01-25 06:09:51', '2022-01-25 14:11:34', '2022-01-26 14:43:43'),
(83465835, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Ddeee', '2022-02-11', '3 PM', NULL, 'done', NULL, '2022-01-29 09:23:46', '2022-01-29 17:24:58', '2022-01-29 17:28:22'),
(86858655, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Lorem', '2022-02-25', '10 am', NULL, 'done', NULL, '2022-02-11 16:51:40', '2022-02-12 00:53:30', '2022-02-14 02:13:49'),
(335884487, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test4', '2022-02-25', '11 AM', NULL, 'done', NULL, '2022-01-31 15:17:12', '2022-01-31 23:18:27', '2022-02-01 13:40:37'),
(385488757, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', 'test12', '2022-03-07', '10 AM', NULL, 'done', NULL, '2022-02-27 14:59:24', '2022-02-27 23:02:29', '2022-03-01 23:26:48'),
(486764874, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Would like to discuss matter about real estate', '2022-01-28', '3 PM', NULL, 'done', NULL, '2022-01-24 05:40:40', '2022-01-24 13:41:54', '2022-01-25 14:09:26'),
(553653864, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test13', '2022-02-28', '3 PM', NULL, 'done', NULL, '2022-02-27 15:30:55', '2022-02-27 23:34:43', '2022-03-01 23:26:51'),
(564636785, 1042606505, 56297, 'Arvee', 'Lozada', 'drellbatarian@gmail.com', 'Bacolod', 'Test7', '2022-02-25', '10 AM', NULL, 'done', NULL, '2022-02-09 10:34:07', '2022-02-09 18:35:57', '2022-02-12 00:53:35'),
(735356473, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod', 'qwqwqqwq', '2022-03-07', '10 AM', NULL, 'done', NULL, '2022-03-05 10:47:41', '2022-03-05 18:51:04', '2022-03-11 17:51:31'),
(765647767, 1042606505, 2449, 'Shannen', 'Gonzales', 'jenelyn.gonzales133@gmail.com', 'Bacolod City', 'Lorem Ipsum', '2022-01-28', '10 AM', NULL, 'done', NULL, '2022-01-27 08:29:05', '2022-01-27 16:30:22', '2022-01-28 16:32:26'),
(835356756, 1042606505, 56297, 'Arvee', 'Lozada', 'jentakugonzales5@gmail.com', 'Bacolod City', 'Test8', '2022-03-02', '10 am', NULL, 'done', NULL, '2022-02-19 16:25:00', '2022-02-20 00:27:57', '2022-02-21 13:56:54'),
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
(1, 'Animal Law', 'The primary objective will be to stand for the rights of animals along with the organizations and allies that serve and represent them. '),
(2, 'Bankruptcy Law', 'A legal proceeding that involves a person or business that is unable to repay outstanding debts.'),
(3, 'Banking and Finance Law', 'A legal practice that oversees “the organization, ownership, and operation of banks and depository institutions, mortgage banks, other providers of financial services regulated or licensed by state or federal banking regulators and holding companies.'),
(4, 'Civil Rights Law', 'Civil rights law guarantees the right for individuals to receive equal treatment and prohibits discrimination.'),
(5, 'Corporate Law', 'Corporate law is the field of law that establishes the rules and regulations needed for corporations to form and function. Working in corporate law means your primary objective will be addressing all aspects of a corporation’s legal administration.'),
(6, 'Criminal Law', 'Criminal law, as distinguished from civil law, is a system of laws concerned with punishment of individuals who commit crimes. '),
(7, 'Education Law', 'Education law is the field of law that covers legal matters related to schools, their students, and their staff. Duties of an education attorney include advocating for students’ and teachers’ rights, exposing tuition fraud, and developing new education policies.'),
(8, 'Employment Law', 'Addresses the rights of workers and the relationships they share with their employers. Duties of a labor law attorney include representing clients within issues ranging from wages and compensation to harassment and discrimination.'),
(9, 'Environmental & Natural Resources Law', 'Examines the ways humans interact with and impact the environment. Duties of an environmental law attorney include defending clients in areas of practice such as air and water quality, mining, deforestation, pollution, and more.'),
(11, 'Family Law', 'Addresses relational problems that arise in a familial context. Duties of a family law lawyer include working on varied cases involving areas of practice like divorce. However, although people often think of family law in the context of divorce, it is not limited to when a marriage dissolves.'),
(12, 'Health Law', 'Concerns the health of individuals and concentrates on policies implemented in the healthcare industry. '),
(13, 'Immigration Law', 'The primary objective will be to serve immigrant clients at all points of their naturalization process, as well as refugee and asylum seekers and individuals who have entered the country without the proper documentation.'),
(14, 'Intellectual Property Law\r\n', 'Encompasses the protection of creative works and symbols uniquely developed by individual persons or groups of people. Working in intellectual property law means your primary objective will align within a particular domain of practice, such as patent law or copyright law,'),
(15, 'Personal Injury Law', 'Personal injury lawyers deliver legal aid and counsel to clients who have experienced injury (mental, emotional, physical) due to the negligence or malpractice of another party.'),
(16, 'Real Estate Law', 'Concerns land, homes, construction, your neighbor’s property, legal solutions for construction defects like poor infrastructure, mold, or improperly installed fixtures, and more.');

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

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`todo_ID`, `Attorney_id`, `todotitle`, `date`) VALUES
(1, 112682, 'Meeting 10 PM', '2022-03-14 05:15:32');

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
(2449, NULL, 'Shannen', 'Paige', 'Gonzales', '09480569160', 'jenelyn.gonzales133@gmail.com', 25, 'Bacolod City', 'Shannen', '$2y$10$Bgq1pDlTdNHUL08mlHy1NujwsFBtgB60iRDpArPoCuTqNYEwJGHJS'),
(8389, 'profile-photo/11162021-120151_6.png', 'test', 'test', 'test', '0945454454', 'test@gmail.com', 20, 'Jaro', 'uname1', '$2y$10$FfM9w0ihs5ER.2f9OwRN4.YmVzDigPCzcw0GFBGhCRgK9xwgIW15G'),
(26765, 'profile-photo/11232021-070125_IMG_20211114_165708.jpg', 'Jembier', 'Pizon', 'Tiansing', '09302423049', 'Jembier71@gmail.com', 21, 'La', 'Jembier32', '$2y$10$JCqmzxRG5YtykH6CQFWfd.lLwpujUuTZ4.sP5HKMv1ZCoLcT7pE8y'),
(28149, NULL, 'Shan', 'Nen', 'Paige', '09480569160', 'jentakugonzales5@gmail.com', 26, 'Bacolod', 'Shan', '$2y$10$r0mws7r4sw4UNDOSrbHfketAAm49tSKPTGGnzgOJEXlpudf7bOum6'),
(51668, NULL, 'Shannen', 'Gonzales', 'Lozada', '09162583868', 'jentakugonzales5@gmail.com', 22, 'Bacolod City', 'shann', '$2y$10$PY0w5Z/zS5WRM1caiWdNzuGBo6Bx7Hf2GmTaTsfpO7phPWeJOVIV.'),
(56297, NULL, 'Arvee', 'Nayo', 'Lozada', '09162583868', 'jentakugonzales5@gmail.com', 38, 'Bacolod City', 'Arvee', '$2y$10$7o6jJSa8RWASARJY1rFzhegUeYVYf8ei7aCIOIzhtgDcKS6.7xuqa'),
(85456, NULL, 'Jenelyn', 'Santiso', 'Gonzales', '09162583868', 'jengonzales133@gmail.com', 22, 'Bacolod City', 'jen_gon', '$2y$10$6uZfbthw03tlUQ.VqWae/ezrGC/9g6rjChvnA7jUoeaHlwFFIhTTO'),
(491949, NULL, 'Jerold', 'Tolentino', 'Arnaiz', '0945454454', 'Jerold@gmail.com', 21, 'Bacolod City', 'Jerold69', '$2y$10$nRSsJMX.eJJe5a5QLu02nualGr72QQSQr2sE13MW2eHogHyV9QsTa'),
(7971952, NULL, 'test', 'Test', 'Test', '0945454454', 'test@test.com', 25, 'Test', 'Uname', '$2y$10$Bir3W6SklD/ew64kVBwjUOdEdyxU7kbRg9CwpTWZKfVvWX3bFgKxC'),
(27769741, NULL, 'Jembier', 'P.', 'Tiansing', '09302423049', 'tiansingjembier@gmail.com', 45, 'Bacolod City', 'Jembier21', '$2y$10$GN2GPZ4NmeZ6Q.Uxl./AU.B4W6k.6n736Prs4JJpiJ2cM1XTgAwU.'),
(569580745, NULL, 'Xian', 'Gaza', 'Ledesma', '09090909090', 'Xian@gmail.com', 25, 'Bacolod', 'Xian', '$2y$10$E4QQ/HyVsh3Lry2QbbcJGODt7/L2B0a82lbjNF2MoAEsxHfevFnyy');

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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `twofa`
--
ALTER TABLE `twofa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
