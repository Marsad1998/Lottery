-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 08:27 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supirior_clg`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` text NOT NULL,
  `about_description` text NOT NULL,
  `about_qualification` text NOT NULL,
  `about_experience` text NOT NULL,
  `about_skills` text NOT NULL,
  `about_contact` text NOT NULL,
  `about_pic` text NOT NULL,
  `about_active` int(11) NOT NULL DEFAULT 0,
  `about_add_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_description`, `about_qualification`, `about_experience`, `about_skills`, `about_contact`, `about_pic`, `about_active`, `about_add_date`) VALUES
(1, 'Tameem sajid', 'web developer', 'Bscs ', '3 year + Experience in web development ', ' HTML Css PHP MYSqli Jquery Java Script', 'Name: Tameem sajid\r\nPhone: 03457573667\r\nURL: thewebconcept.com\r\nEmail: imsami67@gmail.com\r\nAddress: Sadhar Faisalabad', 'b914b3c9aad6ebf720f80ca0702852da.jpg', 1, '2018-06-27 18:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_ fname` varchar(200) NOT NULL,
  `admin_lname` varchar(200) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `admin_cnic_no` varchar(15) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_ fname`, `admin_lname`, `admin_email`, `admin_password`, `admin_phone`, `admin_cnic_no`, `admin_address`, `admin_add_date`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', '03220000000', '000000000000', 'jinnah colony fsd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `chat_msg` longtext NOT NULL,
  `chat_msg_details` timestamp NOT NULL DEFAULT current_timestamp(),
  `chat_seen` int(11) NOT NULL DEFAULT 0,
  `student_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_msg`, `chat_msg_details`, `chat_seen`, `student_id`, `admin_id`, `teacher_id`) VALUES
(2, '0', '2018-02-21 20:11:24', 1, 7, NULL, NULL),
(3, 'hi', '2018-02-21 20:12:16', 0, 8, NULL, NULL),
(4, '&lt;?php\r\n include_once &quot;../../connect/db.php&quot;;\r\n\r\n  $chat_msg= mysqli_real_escape_string($dbc,htmlentities($_REQUEST[\'chat_msg\']));\r\n   $student_id= $_REQUEST[\'student_id\'];\r\n   if ($chat_msg AND $student_id) {\r\n    # code...\r\n     if(mysqli_query($dbc,&quot;INSERT INTO chat(student_id,chat_msg) VALUES(\'$student_id\',\'$chat_msg\')&quot;)){\r\n       \r\n    }else{\r\n      echo mysqli_error($dbc);\r\n    }\r\n   }else{\r\n    echo &quot;Something went wrong. Make sure you don\'t left the message empty or properly logged in ...&quot;;\r\n   }\r\n ?&gt;', '2018-02-21 20:12:29', 1, 7, NULL, NULL),
(5, 'sasa', '2018-02-21 20:26:10', 1, 7, NULL, NULL),
(6, 'd', '2018-02-21 20:26:41', 1, 7, NULL, NULL),
(7, 'sd', '2018-02-21 20:26:57', 1, 7, NULL, NULL),
(8, 'dssdds', '2018-02-21 20:27:30', 1, 7, NULL, NULL),
(9, 'dsdsds', '2018-02-21 20:28:00', 1, 7, NULL, NULL),
(10, 'dsdssd', '2018-02-21 20:28:07', 1, 7, NULL, NULL),
(11, 'sass', '2018-02-21 20:28:28', 1, 7, NULL, NULL),
(12, 'ss', '2018-02-21 20:37:31', 1, 7, NULL, NULL),
(13, 'dsds', '2018-02-21 20:38:56', 1, 7, NULL, NULL),
(14, 'hahah', '2018-02-21 20:39:52', 1, 5, NULL, NULL),
(15, 'jk\r\n', '2018-02-21 20:40:06', 1, 7, NULL, NULL),
(16, 'dsds', '2018-02-21 20:40:29', 1, 5, NULL, NULL),
(17, 'sddsds', '2018-02-21 21:19:36', 1, 7, NULL, NULL),
(18, 'ss', '2018-02-21 21:20:16', 1, 7, NULL, NULL),
(19, 'ss', '2018-02-21 21:20:19', 1, 7, NULL, NULL),
(20, 'saassa', '2018-02-21 21:20:25', 1, 7, NULL, NULL),
(21, 'dsdd', '2018-02-21 21:21:06', 1, 7, NULL, NULL),
(22, 'dsds', '2018-02-21 21:21:23', 1, 7, NULL, NULL),
(23, 'ddssddsds', '2018-02-21 21:21:27', 1, 7, NULL, NULL),
(24, 'moiz iqbal', '2018-02-21 21:21:35', 1, 7, NULL, NULL),
(25, 'yes sir', '2018-02-21 21:21:44', 1, 7, NULL, NULL),
(26, 'sdd', '2018-02-21 21:27:17', 1, 7, NULL, NULL),
(27, 'vvc\r\n', '2018-02-24 18:13:56', 1, 7, NULL, NULL),
(28, 'yes', '2018-02-24 18:14:02', 1, 7, NULL, NULL),
(29, 'hi', '2018-02-24 18:15:00', 1, 7, NULL, NULL),
(30, 'dssd', '2018-02-24 18:15:17', 1, 7, NULL, NULL),
(31, 'dsdsd', '2018-02-24 18:15:21', 1, 7, NULL, NULL),
(32, 'hahahha', '2018-02-24 18:15:50', 1, 7, NULL, NULL),
(33, 'hi', '2018-02-24 18:19:14', 1, 5, NULL, NULL),
(35, 'im good how are you ayesha ', '2018-02-24 18:21:07', 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `class_status` int(11) NOT NULL DEFAULT 1,
  `class_add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_status`, `class_add_date`) VALUES
(13, 'BSCS 4th', 1, '2018-06-27 14:39:47'),
(14, '12th icsss', 1, '2019-11-20 09:31:15'),
(15, 'ics eve', 0, '2019-11-27 08:32:56'),
(16, 'bscs', 1, '2019-11-27 08:33:46'),
(17, 'ALi', 1, '2019-11-27 09:00:23'),
(18, 'sami', 1, '2019-11-27 09:01:14'),
(19, 'ahsan', 1, '2019-11-27 09:01:27'),
(20, 'new', 1, '2019-11-27 09:01:57'),
(22, 'my', 1, '2019-11-27 09:03:01'),
(23, 'check', 0, '2019-11-27 09:03:39'),
(24, 'ok', 1, '2019-11-27 09:04:26'),
(25, 'again', 1, '2019-11-27 09:04:41'),
(26, 'agina', 1, '2019-11-27 09:05:39'),
(27, 'my new', 1, '2019-11-27 09:05:46'),
(28, 'abc', 1, '2019-11-28 06:24:10'),
(29, 'nfdsdf', 1, '2019-11-28 06:29:56'),
(31, 'ojhg', 0, '2019-11-28 06:36:19'),
(35, 'bac', 0, '2019-11-28 07:03:18'),
(36, 'back', 1, '2019-11-28 07:03:54'),
(37, 'neew n nw w', 1, '2019-11-28 07:06:21'),
(39, 'howm', 1, '2019-11-28 07:08:35'),
(40, 'hahaha', 0, '2019-11-28 07:08:44'),
(42, 'ko', 1, '2019-11-28 07:15:12'),
(43, 'ij', 1, '2019-11-28 07:15:21'),
(45, '', 0, '2019-11-28 07:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `company_phone` varchar(100) NOT NULL,
  `personal_phone` varchar(100) NOT NULL,
  `email` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `address`, `company_phone`, `personal_phone`, `email`) VALUES
(5, 'Superior College', '34235dcd476c3b26b.jpg', 'Faisalabad', '123456789', '123456789', '12356');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(300) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_email`, `contact_message`, `contact_add_date`) VALUES
(1, 'M.sami', 'abcd@gmail.com', 'hi sir can you guide me about the file uploading.', '2018-02-16 21:21:42'),
(2, 'M.sami', 'abcd@gmail.com', 'sdjknkjdsnjkds\r\nds;kdsnk;ds\r\nds\r\ndsd\r\ns\r\nds\r\nds', '2018-02-16 21:26:41'),
(3, 'abcd', 'imsami67@gmail.com', 'ajbds', '2019-11-15 18:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(2000) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_phone` varchar(13) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_active` int(255) NOT NULL,
  `customer_add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_active`, `customer_add_date`, `customer_type`) VALUES
(1, 'Moiz Iqbal', 'moixx.ansari43@gmail.com', '3226224202', 'Gulberg Colony', 1, '2018-07-28 10:40:03', NULL),
(2, 'tajamal motor Market', 'abcd@gmail.com', '1234567', 'main bazar sadhar faisalabad', 1, '2019-04-18 13:39:49', NULL),
(3, 'suter kirop', 'suterkirop@gmill.com', '1234567', 'abcd', 1, '2019-09-23 08:01:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sect_id` int(11) NOT NULL,
  `sect_name` varchar(255) NOT NULL,
  `sect_sts` int(11) NOT NULL,
  `sect_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sect_id`, `sect_name`, `sect_sts`, `sect_time`) VALUES
(1, 'abc', 1, '2019-11-28 07:18:22'),
(2, 'eve', 1, '2019-11-28 07:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `session_sts` int(11) NOT NULL,
  `session_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_name`, `session_sts`, `session_time`) VALUES
(1, 'abc', 0, '2019-11-28 07:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_fname` varchar(200) NOT NULL,
  `student_lname` varchar(300) NOT NULL,
  `student_class` varchar(300) NOT NULL,
  `student_gender` varchar(100) NOT NULL,
  `student_phone` varchar(15) NOT NULL,
  `student_email` varchar(300) NOT NULL,
  `student_password` text NOT NULL,
  `student_address` text NOT NULL,
  `student_dob` date NOT NULL,
  `student_pic` text NOT NULL,
  `student_add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_rollno` varchar(255) NOT NULL,
  `student_section` varchar(244) NOT NULL,
  `student_session` varchar(233) NOT NULL,
  `student_fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_fname`, `student_lname`, `student_class`, `student_gender`, `student_phone`, `student_email`, `student_password`, `student_address`, `student_dob`, `student_pic`, `student_add_date`, `student_rollno`, `student_section`, `student_session`, `student_fee`) VALUES
(8, 'Tameem', 'sajid', 'BSCS 4th', 'male', '03457573667', 'imsami67@gmail.com', '11223344', 'main bazar sadhar faisalabad', '1998-10-21', '81aabd121450179bd2882ac529427643.jpg', '2018-06-27 14:40:54', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `att_id` int(11) NOT NULL,
  `att_sts` varchar(100) NOT NULL,
  `att_date` date NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`att_id`, `att_sts`, `att_date`, `student_id`, `teacher_id`) VALUES
(3, '1', '2018-02-13', '3', '5'),
(4, '1', '2018-02-13', '5', '5'),
(5, '1', '2018-02-13', '6', '5'),
(6, '1', '2018-02-13', '7', '5'),
(7, '0', '2018-02-22', '6', '5'),
(8, '1', '2018-06-26', '8', '6'),
(9, '0', '2018-06-27', '8', '6'),
(10, '1', '2019-11-13', '8', '6');

-- --------------------------------------------------------

--
-- Table structure for table `study_group`
--

CREATE TABLE `study_group` (
  `study_group_id` int(11) NOT NULL,
  `study_group_name` varchar(300) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` varchar(300) NOT NULL,
  `study_group_add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_group`
--

INSERT INTO `study_group` (`study_group_id`, `study_group_name`, `teacher_id`, `class_id`, `study_group_add_date`) VALUES
(16, 'portal ', 6, 'BSCS 4th', '2018-06-27 14:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_fname` varchar(200) NOT NULL,
  `teacher_lname` varchar(200) NOT NULL,
  `teacher_email` varchar(200) NOT NULL,
  `teacher_password` text NOT NULL,
  `teacher_qualification` text NOT NULL,
  `teacher_address` text NOT NULL,
  `teacher_phone` varchar(20) NOT NULL,
  `teacher_cnic` varchar(15) NOT NULL,
  `teacher_gender` varchar(100) NOT NULL,
  `teacher_pic` text NOT NULL,
  `teacher_add_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_fname`, `teacher_lname`, `teacher_email`, `teacher_password`, `teacher_qualification`, `teacher_address`, `teacher_phone`, `teacher_cnic`, `teacher_gender`, `teacher_pic`, `teacher_add_date`) VALUES
(6, 'sami', '..', 'imsami67@gmail.com', '11223344', 'PHD', 'sadhar faisalbad', '03137573667', '33100-9196937-9', 'male', '834d52e5b1bce01b144925d7967240ac.png', '2019-11-20 09:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_remarks` text NOT NULL,
  `transaction_add_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_type` text DEFAULT NULL,
  `transaction_from` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `debit`, `credit`, `balance`, `customer_id`, `transaction_remarks`, `transaction_add_date`, `transaction_type`, `transaction_from`) VALUES
(3, '1000', '0', '0', 1, '_', '2019-11-13 14:26:55', 'Genreal', 'Voucher Added'),
(4, '0', '1000', '0', 2, '_', '2019-11-13 14:26:55', 'Genreal', 'Voucher Added'),
(5, '1000', '0', '0', 2, '_cash from hand', '2019-11-13 14:28:39', 'Genreal', 'Voucher Added'),
(6, '0', '1000', '0', 1, '_cash from hand', '2019-11-13 14:28:40', 'Genreal', 'Voucher Added'),
(7, '1000', '0', '0', 2, '_cash from hand', '2019-11-13 14:28:51', 'Genreal', 'Voucher Added'),
(8, '0', '1000', '0', 1, '_cash from hand', '2019-11-13 14:28:51', 'Genreal', 'Voucher Added'),
(9, '1000', '0', '0', 2, '_cash from hand', '2019-11-13 14:29:51', 'Genreal', 'Voucher Added'),
(10, '0', '1000', '0', 1, '_cash from hand', '2019-11-13 14:29:52', 'Genreal', 'Voucher Added'),
(11, '500', '0', '0', 1, '_', '2019-11-14 18:53:13', '1', 'Voucher Added'),
(12, '0', '500', '0', 2, '_', '2019-11-14 18:53:13', '1', 'Voucher Added'),
(13, '500', '0', '0', 1, 'transfer to cash ', '2019-11-14 19:13:51', '1', 'Voucher Added'),
(14, '0', '500', '0', 3, 'transfer to cash ', '2019-11-14 19:13:51', '1', 'Voucher Added'),
(15, '500', '0', '0', 1, 'Transfer to  suket', '2019-11-14 19:47:35', 'General Voucher', 'Voucher Added'),
(16, '0', '500', '0', 3, 'Transfer to  suket', '2019-11-14 19:47:35', 'General Voucher', 'Voucher Added'),
(17, '100', '0', '0', 1, 'transfer to abcd', '2019-11-14 19:57:17', 'General Voucher', 'Voucher Added'),
(18, '0', '100', '0', 2, 'transfer to EFGH', '2019-11-14 19:57:18', 'General Voucher', 'Voucher Added'),
(19, '100', '0', '0', 1, '_abcd', '2019-11-14 19:57:56', 'General Voucher', 'Voucher Added'),
(20, '0', '100', '0', 2, 'efgh', '2019-11-14 19:57:56', 'General Voucher', 'Voucher Added'),
(21, '100', '0', '0', 1, 'transfer to this', '2019-11-14 19:59:15', 'General Voucher', 'Voucher Added'),
(22, '0', '0', '0', 1, 'abcd', '2019-11-14 19:59:15', 'General Voucher', 'Voucher Added'),
(23, '100', '0', '0', 1, 'abcd', '2019-11-14 20:00:42', 'General Voucher', 'Voucher Added'),
(24, '0', '100', '0', 3, 'abcdefg', '2019-11-14 20:00:42', 'General Voucher', 'Voucher Added'),
(25, '1000', '0', '0', 1, '_', '2019-11-15 08:17:32', 'General Voucher', 'Voucher Added'),
(26, '0', '1000', '0', 1, '_', '2019-11-15 08:17:32', 'General Voucher', 'Voucher Added'),
(27, '100', '0', '0', 1, '_', '2019-11-15 08:43:50', 'General Voucher', 'Voucher Added'),
(28, '0', '100', '0', 3, '_', '2019-11-15 08:43:50', 'General Voucher', 'Voucher Added'),
(29, '100', '0', '0', 1, '_', '2019-11-15 08:44:40', 'General Voucher', 'Voucher Added'),
(30, '0', '100', '0', 3, '_', '2019-11-15 08:44:40', 'General Voucher', 'Voucher Added'),
(31, '100', '0', '0', 1, '_', '2019-11-15 09:31:59', 'General Voucher', 'Voucher Added'),
(32, '0', '100', '0', 3, '_', '2019-11-15 09:31:59', 'General Voucher', 'Voucher Added'),
(33, '10', '0', '0', 1, '12', '2019-11-15 09:32:52', 'General Voucher', 'Voucher Added'),
(34, '0', '10', '0', 2, '_', '2019-11-15 09:32:52', 'General Voucher', 'Voucher Added'),
(35, '10', '0', '0', 1, '_', '2019-11-15 09:45:31', 'General Voucher', 'Voucher Added'),
(36, '0', '10', '0', 2, '_', '2019-11-15 09:45:31', 'General Voucher', 'Voucher Added'),
(37, '400', '0', '0', 3, '_', '2019-11-15 09:47:23', 'General Voucher', 'Voucher Added'),
(38, '0', '400', '0', 1, '_', '2019-11-15 09:47:23', 'General Voucher', 'Voucher Added'),
(39, '80', '0', '0', 1, '_', '2019-11-15 09:47:44', 'General Voucher', 'Voucher Added'),
(40, '0', '80', '0', 2, '_', '2019-11-15 09:47:44', 'General Voucher', 'Voucher Added'),
(41, '50', '0', '0', 1, '_', '2019-11-15 09:48:27', 'General Voucher', 'Voucher Added'),
(42, '0', '50', '0', 2, '_', '2019-11-15 09:48:27', 'General Voucher', 'Voucher Added'),
(43, '10', '0', '0', 1, '_', '2019-11-15 09:49:27', 'General Voucher', 'Voucher Added'),
(44, '0', '10', '0', 2, '_', '2019-11-15 09:49:27', 'General Voucher', 'Voucher Added'),
(45, '10', '0', '0', 1, '_', '2019-11-15 09:50:05', 'General Voucher', 'Voucher Added'),
(46, '0', '10', '0', 2, '_', '2019-11-15 09:50:05', 'General Voucher', 'Voucher Added'),
(47, '1000', '0', '0', 2, '_', '2019-11-20 10:28:59', 'General Voucher', 'Voucher Added'),
(48, '0', '1000', '0', 3, '_', '2019-11-20 10:29:00', 'General Voucher', 'Voucher Added');

-- --------------------------------------------------------

--
-- Table structure for table `upload_issues`
--

CREATE TABLE `upload_issues` (
  `issue_id` int(11) NOT NULL,
  `issue_title` varchar(300) NOT NULL,
  `issue_description` text NOT NULL,
  `issue_file` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `issue_add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_issues`
--

INSERT INTO `upload_issues` (`issue_id`, `issue_title`, `issue_description`, `issue_file`, `student_id`, `lecture_id`, `issue_add_date`) VALUES
(1, 'file uploading issue', 'sir i need you to guide me in the file uploading code\r\nThanks.', '1edaf2703c43392395f97909c5f2bb26.gif', 7, 4, '2018-02-16 20:15:05'),
(2, 'jkhfjk', 'jlkehkje', '', 7, 4, '2018-02-19 12:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `upload_lectures`
--

CREATE TABLE `upload_lectures` (
  `upload_lecture_id` int(11) NOT NULL,
  `upload_lecture_title` text NOT NULL,
  `upload_lecture_description` text NOT NULL,
  `upload_lecture_file` text NOT NULL,
  `class_id` varchar(300) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `upload_lecture_add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_lectures`
--

INSERT INTO `upload_lectures` (`upload_lecture_id`, `upload_lecture_title`, `upload_lecture_description`, `upload_lecture_file`, `class_id`, `teacher_id`, `upload_lecture_add_date`) VALUES
(4, 'Bootstrap', 'abc', 'ec86d23699291bb3fa9f1622a57c4f1f.pdf', 'Web Development (Feb-18 to May-18)', 5, '2018-02-13 18:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `address`, `phone`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'sami@gmail.com', '234', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucher_id` int(11) NOT NULL,
  `customer_id` varchar(300) NOT NULL,
  `nuration` text NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `voucher_date` text NOT NULL,
  `voucher_this_id` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_id`, `customer_id`, `nuration`, `transaction_id`, `voucher_date`, `voucher_this_id`) VALUES
(6, '2', '_cash from hand', 9, '0000-00-00', 1),
(7, '1', '_cash from hand', 10, '0000-00-00', 1),
(8, '1', '_', 11, '0000-00-00', 1),
(9, '2', '_', 12, '0000-00-00', 1),
(10, '1', 'transfer to cash ', 13, '0000-00-00', 1),
(11, '3', 'transfer to cash ', 14, '0000-00-00', 1),
(12, '1', 'Transfer to  suket', 15, '0000-00-00', 0),
(13, '3', 'Transfer to  suket', 16, '0000-00-00', 0),
(14, '1', 'transfer to abcd', 17, '0000-00-00', 0),
(15, '2', '', 18, '0000-00-00', 0),
(16, '1', '_abcd', 19, '0000-00-00', 0),
(17, '2', 'efgh', 20, '0000-00-00', 0),
(18, '1', 'transfer to this', 21, '0000-00-00', 0),
(19, '1', 'abcd', 22, '0000-00-00', 0),
(20, '1', 'abcd', 23, '0000-00-00', 0),
(21, '3', 'abcdefg', 24, '0000-00-00', 0),
(22, '1', '_', 25, '0000-00-00', 0),
(23, '1', '_', 26, '0000-00-00', 0),
(24, '1', '_', 27, '0000-00-00', 0),
(25, '3', '_', 28, '0000-00-00', 0),
(26, '1', '_', 29, '0000-00-00', 0),
(27, '3', '_', 30, '0000-00-00', 0),
(28, '1', '_', 31, '0000-00-00', 0),
(29, '3', '_', 32, '0000-00-00', 0),
(30, '1', '12', 33, '0000-00-00', 0),
(31, '2', '_', 34, '0000-00-00', 0),
(32, '1', '_', 35, '0000-00-00', 0),
(33, '2', '_', 36, '0000-00-00', 0),
(34, '3', '_', 37, '0000-00-00', 0),
(35, '1', '_', 38, '0000-00-00', 0),
(36, '1', '_', 39, '0000-00-00', 0),
(37, '2', '_', 40, '0000-00-00', 0),
(38, '1', '_', 41, '0000-00-00', 0),
(39, '2', '_', 42, '0000-00-00', 0),
(40, '1', '_', 43, '0000-00-00', 0),
(41, '2', '_', 44, '0000-00-00', 0),
(42, '1', '_', 45, '15-11-2019', 0),
(43, '2', '_', 46, '15-11-2019', 0),
(44, '2', '_', 47, '20-11-2019', 0),
(45, '3', '_', 48, '20-11-2019', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_type`
--

CREATE TABLE `voucher_type` (
  `voucher_type_id` int(100) NOT NULL,
  `voucher_type_name` text NOT NULL,
  `voucher_type_status` text NOT NULL,
  `voucher_type_adddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_type`
--

INSERT INTO `voucher_type` (`voucher_type_id`, `voucher_type_name`, `voucher_type_status`, `voucher_type_adddate`) VALUES
(1, 'General Voucher', '1', '2019-11-14 18:51:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_cnic_no` (`admin_cnic_no`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sect_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_email` (`student_email`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `study_group`
--
ALTER TABLE `study_group`
  ADD PRIMARY KEY (`study_group_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_email` (`teacher_email`),
  ADD UNIQUE KEY `teacher_cnic` (`teacher_cnic`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `upload_issues`
--
ALTER TABLE `upload_issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `upload_lectures`
--
ALTER TABLE `upload_lectures`
  ADD PRIMARY KEY (`upload_lecture_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`),
  ADD KEY `voucher_this_id` (`voucher_this_id`);

--
-- Indexes for table `voucher_type`
--
ALTER TABLE `voucher_type`
  ADD PRIMARY KEY (`voucher_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `study_group`
--
ALTER TABLE `study_group`
  MODIFY `study_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `upload_issues`
--
ALTER TABLE `upload_issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upload_lectures`
--
ALTER TABLE `upload_lectures`
  MODIFY `upload_lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `voucher_type`
--
ALTER TABLE `voucher_type`
  MODIFY `voucher_type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
