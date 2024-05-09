-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2024 at 08:23 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(27, 'admin', 'admin', 'Teofredo', 'Mataganas', 'Gamale'),
(28, 'admin1', 'admin', 'LANCE', 'VILLASAN', 'ORGANIZA');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_id` int(20) NOT NULL,
  `barcode_id` varchar(20) NOT NULL,
  `faculty_no` varchar(20) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `sex` text NOT NULL,
  `course_section` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `datereg` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attendance`
--


-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE IF NOT EXISTS `barcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode_id` text,
  `faculty_no` int(50) NOT NULL,
  `name` text,
  `sex` text,
  `course_section` text,
  `department` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `datereg` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `barcode_id`, `faculty_no`, `name`, `sex`, `course_section`, `department`, `type`, `datereg`) VALUES
(1, '953754', 0, 'TEOFREDO MATAGANAS GAMALE JR.', 'Male', 'BSCS-4B', 'CTAS', 'student', '2024-04-05 17:42:42'),
(2, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 17:42:57'),
(3, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 17:43:01'),
(4, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 17:44:44'),
(5, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 17:47:49'),
(6, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 17:50:57'),
(7, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 17:57:28'),
(8, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 17:58:02'),
(9, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 18:00:07'),
(10, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 18:00:50'),
(11, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 18:04:47'),
(12, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-05 18:09:03'),
(13, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:07:45'),
(14, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:07:49'),
(15, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:07:50'),
(16, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:07:51'),
(17, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:08:12'),
(18, '202308050131', 0, '', '', '', '', 'Student from other school', '2024-04-08 09:08:59'),
(19, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:21:56'),
(20, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:23:07'),
(21, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:28:12'),
(22, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:28:13'),
(23, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:28:19'),
(24, '202308050131', 0, '', '', '', '', 'Student from other school', '2024-04-08 09:28:24'),
(25, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:29:25'),
(26, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:30:30'),
(27, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:31:57'),
(28, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:33:44'),
(29, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:33:51'),
(30, '953754', 0, 'TEOFREDO MATAGANAS GAMALE JR.', 'Male', 'BSCS-4B', 'CTAS', 'student', '2024-04-08 09:34:28'),
(31, '953754', 0, 'TEOFREDO MATAGANAS GAMALE JR.', 'Male', 'BSCS-4B', 'CTAS', 'student', '2024-04-08 09:34:35'),
(32, '202308050131', 0, '', '', '', '', 'Student from other school', '2024-04-08 09:34:44'),
(33, '202308050131', 0, '', '', '', '', 'Student from other school', '2024-04-08 09:36:25'),
(34, '0', 0, '', '', '', '', 'Student from other school', '2024-04-08 09:38:49'),
(35, '953754', 0, 'TEOFREDO MATAGANAS GAMALE JR.', 'Male', 'BSCS-4B', 'CTAS', 'student', '2024-04-08 09:41:11'),
(36, '953754', 0, 'TEOFREDO MATAGANAS GAMALE JR.', 'Male', 'BSCS-4B', 'CTAS', 'student', '2024-04-08 09:41:19'),
(37, '0', 0, '', '', '', '', 'Student from other school', '2024-04-08 09:41:25'),
(38, '0', 0, '', '', '', '', 'Student from other school', '2024-04-08 09:45:00'),
(39, '0', 0, '', '', '', '', 'Student from other school', '2024-04-08 09:45:52'),
(40, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:51:26'),
(41, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:51:51'),
(42, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:51:53'),
(43, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:52:07'),
(44, '0', 0, '', '', '', '', 'Faculty', '2024-04-08 09:53:45'),
(45, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 09:53:52'),
(46, '0', 0, '', '', '', '', 'Faculty', '2024-04-08 09:55:20'),
(47, '0', 0, '', '', '', '', 'Faculty', '2024-04-08 09:56:25'),
(48, '', 0, '', '', '', '', 'Student from other school', '2024-04-08 10:02:29'),
(49, '953754', 0, 'ARJAY M BATAUSA', 'MALE', '', '', 'student from other school', '2024-04-08 10:02:37'),
(50, '953754', 0, 'TEOFREDO MATAGANAS GAMALE JR.', 'Male', 'BSCS-4B', 'CTAS', 'student', '2024-04-08 10:02:54'),
(51, '976822', 0, 'CHRISTIAN RENZO JAMERO', 'MALE', 'bscs-4A', 'CTAS', 'student', '2024-04-11 10:36:18'),
(52, '650092', 0, 'GEE ANN G. VISTAL', 'FEMALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-11 10:37:28'),
(53, '287947', 0, 'Yvonne Cagande', 'FEMALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-11 10:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(40) NOT NULL,
  `author` varchar(30) NOT NULL,
  `call_num` varchar(40) NOT NULL,
  `accession_num` varchar(40) NOT NULL,
  `published_date` date NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author`, `call_num`, `accession_num`, `published_date`, `date_added`) VALUES
(7, 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-02 17:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `books_report`
--

CREATE TABLE IF NOT EXISTS `books_report` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(40) NOT NULL,
  `author` varchar(20) NOT NULL,
  `call_num` varchar(40) NOT NULL,
  `accession_num` varchar(40) NOT NULL,
  `published_date` date NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `books_report`
--

INSERT INTO `books_report` (`book_id`, `book_title`, `author`, `call_num`, `accession_num`, `published_date`, `date_added`) VALUES
(1, 'PROGRAMMING', 'GAMALE', '233-22--2', '23002302', '2024-04-02', '2024-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `course_section` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `book_title` varchar(40) NOT NULL,
  `author` varchar(40) NOT NULL,
  `call_num` varchar(30) NOT NULL,
  `accession_num` varchar(30) NOT NULL,
  `published_date` date NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `date_return` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `student_id`, `name`, `sex`, `course_section`, `department`, `book_title`, `author`, `call_num`, `accession_num`, `published_date`, `date_borrowed`, `date_return`, `status`) VALUES
(1, '953754', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '0000-00-00 00:00:00', '2024-04-01', 'Borrowed'),
(2, '242', 'Mark Jhon Doria Baslot', 'FEMALE', 'BSCS-1A', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '0000-00-00 00:00:00', '2024-03-28', 'Borrowed'),
(3, '423428764623485', 'erfsdf', 'sdf', 'dsf', 'sdf', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '0000-00-00 00:00:00', '2024-04-02', 'Borrowed'),
(4, '953754', 'BERNS KABAW JORDAN', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '0000-00-00 00:00:00', '2024-04-01', 'Borrowed'),
(5, '9537541', 'gg', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '0000-00-00 00:00:00', '2024-03-31', 'Borrowed'),
(6, '95375412', 'gg', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '0000-00-00 00:00:00', '2024-04-02', 'Borrowed'),
(7, '95375412', 'gg', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '0000-00-00 00:00:00', '2024-04-02', 'Borrowed'),
(8, '1', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '0000-00-00 00:00:00', '2024-04-02', 'Borrowed'),
(9, '123', 'sample', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '0000-00-00 00:00:00', '2024-04-01', 'Borrowed'),
(10, '123454', 'sample again', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '0000-00-00 00:00:00', '2024-03-30', 'Borrowed'),
(11, '123454', 'sample again', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '0000-00-00 00:00:00', '2024-04-03', 'Borrowed'),
(12, '1234541', 'sample again', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-04 14:38:27', '2024-04-04', 'Borrowed'),
(13, '953754', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-08 02:05:14', '2024-04-07', 'Borrowed'),
(14, '9537541', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-08', '2024-04-08 02:41:49', '2024-04-08', 'Borrowed'),
(15, '9537541', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-08', '2024-04-08 02:43:19', '2024-04-08', 'Borrowed'),
(16, '95375433', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-11 07:45:43', '2024-04-19', 'Borrowed'),
(17, '95375433', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-11 07:48:27', '2024-04-10', 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE IF NOT EXISTS `borrowed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `course_section` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `book_title` varchar(60) NOT NULL,
  `author` varchar(40) NOT NULL,
  `call_num` varchar(20) NOT NULL,
  `accession_num` varchar(20) NOT NULL,
  `published_date` date NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `date_return` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`id`, `student_id`, `name`, `sex`, `course_section`, `department`, `book_title`, `author`, `call_num`, `accession_num`, `published_date`, `date_borrowed`, `date_return`, `status`) VALUES
(162, '9537541', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-08', '2024-04-08 02:41:49', '2024-04-08', 'Overdue'),
(163, '9537541', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-08', '2024-04-08 02:43:19', '2024-04-08', 'Overdue');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_visitor`
--

CREATE TABLE IF NOT EXISTS `faculty_visitor` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_no` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faculty_visitor`
--

INSERT INTO `faculty_visitor` (`faculty_id`, `faculty_no`, `name`, `sex`, `type`, `date_added`) VALUES
(1, '9537541', 'ARJAY M BATAUSA', 'MALE', 'student from other school', '2024-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_visitor_report`
--

CREATE TABLE IF NOT EXISTS `faculty_visitor_report` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_no` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faculty_visitor_report`
--

INSERT INTO `faculty_visitor_report` (`faculty_id`, `faculty_no`, `name`, `sex`, `type`, `date_added`) VALUES
(1, 213414, 'hahahah', 'male', 'student', '2024-04-01'),
(2, 2147483647, 'BERNS KABAW JORDAN', 'FEMALE', 'student from other school', '2024-04-01'),
(3, 953754, 'ARJAY M BATAUSA', 'MALE', 'student from other school', '2024-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `note`) VALUES
(7, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE IF NOT EXISTS `penalty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `course_section` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `author` varchar(20) NOT NULL,
  `call_num` varchar(20) NOT NULL,
  `accession_num` varchar(20) NOT NULL,
  `published_date` date NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `date_return` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`id`, `student_id`, `name`, `sex`, `course_section`, `department`, `book_title`, `author`, `call_num`, `accession_num`, `published_date`, `date_borrowed`, `date_return`, `status`) VALUES
(39, '953754', 'TEOFREDO MATAGANAS G', 'MALE', 'BSCS-4B', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-08 02:05:14', '2024-04-07', 'Overdue'),
(40, '9537541', 'TEOFREDO MATAGANAS G', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-08', '2024-04-08 02:41:49', '2024-04-08', 'Overdue');

-- --------------------------------------------------------

--
-- Table structure for table `penalty_report`
--

CREATE TABLE IF NOT EXISTS `penalty_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `course_section` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `author` varchar(20) NOT NULL,
  `call_num` varchar(20) NOT NULL,
  `accession_num` varchar(20) NOT NULL,
  `published_date` date NOT NULL,
  `date_return` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `penalty_report`
--

INSERT INTO `penalty_report` (`id`, `student_id`, `name`, `sex`, `course_section`, `department`, `book_title`, `author`, `call_num`, `accession_num`, `published_date`, `date_return`, `status`) VALUES
(1, '43213423', 'ARJAY M BATAUSA', 'MALE', 'BSCS-4a', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-02', 'Overdue'),
(2, '953754', 'TEOFREDO MATAGANAS G', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-01', 'Overdue'),
(3, '242', 'Mark Jhon Doria Basl', 'FEMALE', 'BSCS-1A', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-03-28', 'Overdue'),
(4, '4.2342876462348E+14', 'erfsdf', 'sdf', 'dsf', 'sdf', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-02', 'Overdue'),
(5, '953754', 'BERNS KABAW JORDAN', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-01', 'Overdue'),
(6, '9537541', 'gg', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-03-31', 'Overdue'),
(7, '95375412', 'gg', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-02', 'Overdue'),
(8, '1', 'TEOFREDO MATAGANAS G', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-02', 'Overdue'),
(9, '123', 'sample', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-01', 'Overdue'),
(10, '123454', 'sample again', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-03-30', 'Overdue'),
(11, '9537541', 'TEOFREDO MATAGANAS G', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-08', '2024-04-08', 'Overdue'),
(12, '95375433', 'TEOFREDO MATAGANAS G', 'MALE', 'BSCS-4B', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-10', 'Overdue');

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE IF NOT EXISTS `returned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `course_section` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `call_num` varchar(50) NOT NULL,
  `accession_num` varchar(50) NOT NULL,
  `published_date` date NOT NULL,
  `date_return` date NOT NULL,
  `returned_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `returned`
--

INSERT INTO `returned` (`id`, `student_id`, `name`, `sex`, `course_section`, `department`, `book_title`, `author`, `call_num`, `accession_num`, `published_date`, `date_return`, `returned_date`, `status`) VALUES
(1, '423428764623485', 'erfsdf', 'sdf', 'dsf', 'sdf', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-02', '2024-04-03', 'Returned'),
(2, '953754', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-01', '2024-04-03', 'Returned'),
(3, '242', 'Mark Jhon Doria Baslot', 'FEMALE', 'BSCS-1A', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-03-28', '2024-04-03', 'Returned'),
(4, '43213423', 'ARJAY M BATAUSA', 'MALE', 'BSCS-4a', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-04', '2024-04-03', 'Returned'),
(5, '953754', 'BERNS KABAW JORDAN', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-01', '2024-04-03', 'Returned'),
(6, '9537541', 'gg', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-03-31', '2024-04-03', 'Returned'),
(7, '95375412', 'gg', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-02', '2024-04-03', 'Returned'),
(8, '95375412', 'gg', 'MALE', 'BSCS-4C', 'coas', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-02', '2024-04-04', 'Returned'),
(9, '1', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-02', '2024-04-04', 'Returned'),
(10, '123', 'sample', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-01', '2024-04-04', 'Returned'),
(11, '123454', 'sample again', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-03-30', '2024-04-04', 'Returned'),
(12, '1234541', 'sample again', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-04', '2024-04-04', 'Returned'),
(13, '123454', 'sample again', 'MALE', 'BSCS-4C', 'coas', 'MATHEMATICS', 'LANCE', '432-2343-3', '012345', '2024-04-03', '2024-04-03', '2024-04-05', 'Returned'),
(14, '95375433', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-19', '2024-04-11', 'Returned'),
(15, '953754', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-07', '2024-04-11', 'Returned'),
(16, '95375433', 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'PROGRAMMINGs', 'GAMALEs', '233-22--21', '230023021', '2024-04-03', '2024-04-10', '2024-04-11', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_no` varchar(20) NOT NULL,
  `faculty_no` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `course_section` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_no`, `faculty_no`, `name`, `sex`, `course_section`, `department`, `type`, `date_added`) VALUES
(5, '527139', '', 'ARJAY BATAUSA', 'MALE', 'bscs-4a', 'CTAS', 'student', '2024-04-03'),
(6, '789052', '', 'Mark Jhon Doria Baslot', 'MALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-03'),
(7, '777181', '', 'CRISTINE ORAPA ', 'FEMALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-03'),
(9, '9537541', '', 'TEOFREDO MATAGANAS GAMALE JR.', 'Male', 'BSCS-4B', 'CTAS', 'student', '2024-04-08'),
(10, '976822', '', 'CHRISTIAN RENZO JAMERO', 'MALE', 'bscs-4A', 'CTAS', 'student', '2024-04-11'),
(11, '650092', '', 'GEE ANN G. VISTAL', 'FEMALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-11'),
(12, '287947', '', 'Yvonne Cagande', 'FEMALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-11'),
(13, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(14, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(15, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(16, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(17, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(18, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(19, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(20, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(21, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(22, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(23, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(24, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(25, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(26, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(27, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(28, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(29, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(30, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(31, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(32, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(33, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(34, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(35, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(36, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(37, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(38, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(39, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(40, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(41, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(42, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(43, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(44, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(45, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(46, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(47, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(48, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(49, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(50, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(51, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(52, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(53, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(54, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(55, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(56, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(57, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(58, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(59, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(60, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(61, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(62, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(63, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(64, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(65, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(66, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(67, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(68, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(69, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(70, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(71, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(72, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(73, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(74, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(75, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(76, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(77, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(78, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(79, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(80, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(81, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(82, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(83, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(84, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(85, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(86, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(87, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(88, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(89, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(90, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(91, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(92, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(93, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(94, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(95, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(96, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(97, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(98, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(99, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(100, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(101, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(102, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(103, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(104, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(105, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(106, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(107, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(108, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(109, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(110, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(111, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(112, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(113, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(114, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(115, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(116, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(117, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(118, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(119, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(120, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(121, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(122, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(123, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(124, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(125, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(126, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(127, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(128, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(129, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(130, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(131, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(132, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(133, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(134, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(135, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(136, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(137, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(138, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(139, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(140, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(141, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(142, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(143, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(144, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(145, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(146, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(147, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(148, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(149, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(150, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(151, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(152, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(153, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(154, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(155, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(156, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(157, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(158, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(159, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(160, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(161, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(162, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(163, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(164, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(165, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(166, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(167, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(168, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(169, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(170, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(171, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(172, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(173, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(174, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(175, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(176, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(177, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(178, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(179, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(180, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(181, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(182, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(183, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(184, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(185, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(186, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(187, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(188, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(189, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(190, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(191, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(192, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(193, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(194, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(195, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(196, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(197, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(198, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(199, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(200, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(201, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(202, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(203, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(204, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(205, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(206, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(207, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(208, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(209, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(210, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(211, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(212, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(213, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(214, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(215, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(216, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(217, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(218, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(219, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(220, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(221, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(222, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(223, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(224, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(225, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(226, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(227, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(228, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(229, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(230, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(231, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(232, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(233, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(234, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(235, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(236, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(237, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(238, '123345', '', 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(239, '432124', '', 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(240, '563454', '', 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `students_report`
--

CREATE TABLE IF NOT EXISTS `students_report` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_no` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `course_section` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=236 ;

--
-- Dumping data for table `students_report`
--

INSERT INTO `students_report` (`student_id`, `student_no`, `name`, `sex`, `course_section`, `department`, `type`, `date_added`) VALUES
(1, 953754, 'TEOFREDO MATAGANAS GAMALE JR.', 'MALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-01'),
(2, 527139, 'ARJAY BATAUSA', 'MALE', 'bscs-4a', 'CTAS', 'student', '2024-04-03'),
(3, 789052, 'Mark Jhon Doria Baslot', 'MALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-03'),
(4, 777181, 'CRISTINE ORAPA ', 'FEMALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-03'),
(5, 976822, 'CHRISTIAN RENZO JAMERO', 'MALE', 'bscs-4A', 'CTAS', 'student', '2024-04-11'),
(6, 650092, 'GEE ANN G. VISTAL', 'FEMALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-11'),
(7, 287947, 'Yvonne Cagande', 'FEMALE', 'BSCS-4B', 'CTAS', 'student', '2024-04-11'),
(8, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(9, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(10, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(11, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(12, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(13, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(14, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(15, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(16, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(17, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(18, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(19, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(20, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(21, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(22, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(23, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(24, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(25, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(26, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(27, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(28, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(29, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(30, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(31, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(32, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(33, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(34, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(35, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(36, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(37, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(38, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(39, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(40, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(41, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(42, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(43, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(44, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(45, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(46, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(47, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(48, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(49, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(50, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(51, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(52, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(53, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(54, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(55, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(56, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(57, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(58, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(59, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(60, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(61, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(62, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(63, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(64, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(65, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(66, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(67, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(68, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(69, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(70, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(71, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(72, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(73, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(74, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(75, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(76, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(77, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(78, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(79, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(80, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(81, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(82, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(83, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(84, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(85, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(86, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(87, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(88, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(89, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(90, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(91, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(92, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(93, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(94, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(95, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(96, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(97, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(98, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(99, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(100, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(101, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(102, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(103, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(104, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(105, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(106, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(107, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(108, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(109, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(110, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(111, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(112, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(113, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(114, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(115, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(116, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(117, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(118, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(119, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(120, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(121, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(122, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(123, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(124, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(125, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(126, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(127, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(128, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(129, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(130, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(131, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(132, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(133, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(134, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(135, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(136, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(137, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(138, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(139, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(140, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(141, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(142, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(143, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(144, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(145, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(146, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(147, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(148, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(149, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(150, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(151, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(152, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(153, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(154, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(155, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(156, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(157, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(158, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(159, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(160, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(161, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(162, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(163, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(164, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(165, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(166, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(167, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(168, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(169, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(170, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(171, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(172, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(173, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(174, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(175, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(176, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(177, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(178, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(179, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(180, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(181, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(182, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(183, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(184, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(185, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(186, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(187, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(188, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(189, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(190, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(191, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(192, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(193, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(194, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(195, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(196, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(197, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(198, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(199, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(200, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(201, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(202, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(203, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(204, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(205, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(206, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(207, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(208, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(209, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(210, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(211, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(212, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(213, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(214, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(215, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(216, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(217, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(218, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(219, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(220, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(221, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(222, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(223, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(224, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(225, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(226, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(227, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(228, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(229, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(230, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(231, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(232, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11'),
(233, 123345, 'Mark Jhon Baslot', 'Male', 'BSCS-1b', 'CANR', 'Student', '2024-04-11'),
(234, 432124, 'Lance Organiza', 'Female', 'educ-2b', 'cte', 'student', '2024-04-11'),
(235, 563454, 'iverson parocha', 'male', 'agri4c', 'ctas', 'student', '2024-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE IF NOT EXISTS `stuff` (
  `stuff_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  PRIMARY KEY (`stuff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`stuff_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(20, 'staff', 'staff', 'Teofredo', 'Mataganas ', 'Gamale'),
(21, 'staff1', 'staff', 'LANCE', 'VILLASAN', 'ORGANIZA');

-- --------------------------------------------------------

--
-- Table structure for table `visitant`
--

CREATE TABLE IF NOT EXISTS `visitant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode_id` varchar(20) NOT NULL,
  `student_no` varchar(50) NOT NULL,
  `faculty_no` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `course_section` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `visitant`
--

INSERT INTO `visitant` (`id`, `barcode_id`, `student_no`, `faculty_no`, `name`, `sex`, `course_section`, `type`, `date_added`) VALUES
(4, '2023080501312', '', '', '', '', '', 'Faculty', '2024-04-08');
