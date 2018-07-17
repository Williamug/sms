-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2017 at 03:18 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `allschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `as_attendence`
--

CREATE TABLE IF NOT EXISTS `as_attendence` (
  `as_attendence_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_studentno` varchar(11) NOT NULL,
  `as_attendence` varchar(8) NOT NULL,
  PRIMARY KEY (`as_attendence_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `as_attendence`
--

INSERT INTO `as_attendence` (`as_attendence_id`, `as_studentno`, `as_attendence`) VALUES
(1, '4941', 'Present'),
(2, '1', 'Present'),
(3, '1', 'Absent'),
(4, '1', 'Absent'),
(5, '2', 'Present'),
(6, '3', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `as_class`
--

CREATE TABLE IF NOT EXISTS `as_class` (
  `as_classid` int(11) NOT NULL AUTO_INCREMENT,
  `as_teachers_id` int(11) NOT NULL,
  `as_classname` varchar(32) NOT NULL,
  PRIMARY KEY (`as_classid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `as_class`
--

INSERT INTO `as_class` (`as_classid`, `as_teachers_id`, `as_classname`) VALUES
(1, 1, 'Baby'),
(2, 0, 'Middle'),
(3, 6, 'Top'),
(4, 1, 'P.1'),
(5, 0, 'P.2'),
(6, 5, 'P.3'),
(7, 5, 'P.4'),
(8, 5, 'P.5'),
(9, 1, 'P.6'),
(10, 6, 'P.7');

-- --------------------------------------------------------

--
-- Table structure for table `as_employee`
--

CREATE TABLE IF NOT EXISTS `as_employee` (
  `as_employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_address_id` int(11) NOT NULL,
  `as_surname` varchar(40) NOT NULL,
  `as_firstname` varchar(40) NOT NULL,
  `as_othername` varchar(40) NOT NULL,
  `as_gender` char(1) NOT NULL,
  `as_date_of_birth` date NOT NULL,
  `as_religion` varchar(10) NOT NULL,
  `as_staff_category` varchar(20) NOT NULL,
  `as_position` varchar(20) NOT NULL,
  `as_nationality` varchar(40) NOT NULL,
  `as_nin` varchar(20) NOT NULL,
  `as_core_subj` varchar(40) NOT NULL,
  `as_other_subj` varchar(40) NOT NULL,
  `as_date_joined` date NOT NULL,
  `as_photo` varchar(100) NOT NULL,
  `as_otherinfo` text NOT NULL,
  PRIMARY KEY (`as_employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `as_employee`
--


-- --------------------------------------------------------

--
-- Table structure for table `as_exam_set`
--

CREATE TABLE IF NOT EXISTS `as_exam_set` (
  `as_exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_name` varchar(32) NOT NULL,
  PRIMARY KEY (`as_exam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `as_exam_set`
--

INSERT INTO `as_exam_set` (`as_exam_id`, `as_name`) VALUES
(1, 'Beginning of Term'),
(2, 'Mid Term'),
(3, 'End of Term');

-- --------------------------------------------------------

--
-- Table structure for table `as_expenses`
--

CREATE TABLE IF NOT EXISTS `as_expenses` (
  `as_expenseid` int(11) NOT NULL AUTO_INCREMENT,
  `as_date` datetime NOT NULL,
  `as_qty` varchar(11) NOT NULL,
  `as_particular` text NOT NULL,
  `as_amount` varchar(40) NOT NULL,
  `as_comment` text NOT NULL,
  `as_authority` varchar(40) NOT NULL,
  PRIMARY KEY (`as_expenseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `as_expenses`
--

INSERT INTO `as_expenses` (`as_expenseid`, `as_date`, `as_qty`, `as_particular`, `as_amount`, `as_comment`, `as_authority`) VALUES
(2, '2017-06-18 17:34:19', '20', 'Teachers Pens', '10000', 'Pens bought', ''),
(3, '2017-06-18 18:17:11', '2', 'Teachers Allowances', '20000', 'Allowances given out', ''),
(4, '2017-06-18 18:19:42', '1', 'Teacher payment', '200000', 'Mr. Luba Peter is cleared', ''),
(5, '2017-06-18 19:09:57', '1trip', 'Firewood', '300000', 'One trip received from Mr. Kironde', ''),
(6, '2017-06-18 19:13:05', '200', 'Text Books', '20000000', 'Recieved', ''),
(7, '2017-06-18 19:16:50', '20', 'Reams of papers', '450000', 'Recieved', ''),
(8, '2017-06-18 19:21:00', '1', 'Salary', '250000', 'Salary paid to Mr. Tweheyo', ''),
(9, '2017-06-18 19:29:12', '1', 'Allowance', '5000', 'Mr. Kiku received allowance with thank.', ''),
(10, '2017-06-18 19:39:31', '1', 'science book', '20000', 'Not found', ''),
(11, '2017-06-19 15:48:35', '30', 'chairs', '20000000', 'Not yet received', ''),
(12, '2017-06-22 15:40:37', '2', 'Piono', '2000000', 'Recieved', '');

-- --------------------------------------------------------

--
-- Table structure for table `as_grading`
--

CREATE TABLE IF NOT EXISTS `as_grading` (
  `as_grading_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_grade_name` varchar(11) NOT NULL,
  `as_mark_from` int(11) NOT NULL,
  `as_mark_to` int(11) NOT NULL,
  PRIMARY KEY (`as_grading_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `as_grading`
--

INSERT INTO `as_grading` (`as_grading_id`, `as_grade_name`, `as_mark_from`, `as_mark_to`) VALUES
(1, 'D1', 75, 100),
(2, 'D2', 70, 74),
(3, 'C3', 65, 69),
(4, 'C4', 60, 64),
(5, 'C5', 55, 59),
(6, 'C6', 50, 54),
(7, 'P7', 40, 49),
(8, 'P8', 35, 39),
(9, 'F9', 0, 34);

-- --------------------------------------------------------

--
-- Table structure for table `as_library`
--

CREATE TABLE IF NOT EXISTS `as_library` (
  `as_bookno` int(11) NOT NULL,
  `as_book_name` varchar(100) NOT NULL,
  `as_author` varchar(32) NOT NULL,
  `as_subject_id` int(11) NOT NULL,
  `as_classid` int(11) NOT NULL,
  `as_total_copy` int(11) NOT NULL,
  `as_ISBN` varchar(32) NOT NULL,
  PRIMARY KEY (`as_bookno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_library`
--

INSERT INTO `as_library` (`as_bookno`, `as_book_name`, `as_author`, `as_subject_id`, `as_classid`, `as_total_copy`, `as_ISBN`) VALUES
(1, 'Introduction to primary one science', 'John Kibeti', 10, 4, 30, '99485-7364'),
(2, 'Introduction to primary one S.S.T', 'Mondo John Kenedy', 11, 4, 30, '88947-7362'),
(5, 'Learning the basics of computing', 'John Kenedy', 16, 9, 400, '9984-34123-847'),
(87, 'Rich Dad Poor Dad', 'Robert Kiyosaki', 16, 5, 400, '213-485');

-- --------------------------------------------------------

--
-- Table structure for table `as_marks`
--

CREATE TABLE IF NOT EXISTS `as_marks` (
  `as_marksid` int(11) NOT NULL AUTO_INCREMENT,
  `as_termid` int(11) NOT NULL,
  `as_studentno` int(11) NOT NULL,
  `as_subject_id` int(11) NOT NULL,
  `as_bot` int(11) NOT NULL,
  `as_mid` int(11) NOT NULL,
  `as_eot` int(11) NOT NULL,
  `as_comment` text NOT NULL,
  PRIMARY KEY (`as_marksid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `as_marks`
--

INSERT INTO `as_marks` (`as_marksid`, `as_termid`, `as_studentno`, `as_subject_id`, `as_bot`, `as_mid`, `as_eot`, `as_comment`) VALUES
(1, 1, 2, 1, 45, 0, 0, 'fair'),
(2, 1, 2, 1, 0, 70, 0, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `as_notice_board`
--

CREATE TABLE IF NOT EXISTS `as_notice_board` (
  `as_notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_notice` text NOT NULL,
  `as_date` date NOT NULL,
  `as_period` varchar(40) NOT NULL,
  PRIMARY KEY (`as_notice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `as_notice_board`
--


-- --------------------------------------------------------

--
-- Table structure for table `as_payments`
--

CREATE TABLE IF NOT EXISTS `as_payments` (
  `as_recieptid` int(11) NOT NULL AUTO_INCREMENT,
  `as_date` datetime NOT NULL,
  `as_studentno` int(11) NOT NULL,
  `as_amount` text NOT NULL,
  `as_reason` text NOT NULL,
  `as_totalbal` varchar(40) NOT NULL,
  `as_shs` varchar(40) NOT NULL,
  `as_balance` varchar(40) NOT NULL,
  `as_typeOfPayment` varchar(8) NOT NULL,
  `as_chequeno` varchar(40) NOT NULL,
  PRIMARY KEY (`as_recieptid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `as_payments`
--

INSERT INTO `as_payments` (`as_recieptid`, `as_date`, `as_studentno`, `as_amount`, `as_reason`, `as_totalbal`, `as_shs`, `as_balance`, `as_typeOfPayment`, `as_chequeno`) VALUES
(23, '2017-07-07 17:13:28', 4927, 'two hundred thousand shillings only', 'school fees', '300000', '200000', '100000', 'cheque', '885743'),
(70, '2017-07-10 00:45:05', 4929, 'Two hundred thousand shillings only', 'School Fees', '300000', '200000', '100000', 'cash', ''),
(71, '2017-07-10 01:52:37', 4929, 'Three hundred thousand shillings', 'School Fees', '300000', '300000', '0', 'cheque', '6675'),
(72, '2017-08-02 17:54:41', 1, 'Two hundred thousand shillings only', 'School fees', '300000', '200000', '100000', 'cheque', '3445'),
(73, '2017-08-02 18:21:17', 2, 'One hundred thousand shillings only', 'School fees', '300000', '200000', '100000', 'cash', ''),
(74, '2017-08-02 20:41:06', 1, 'Three hundred thousand shillings only', 'School fees', '300000', '300000', '0', 'cash', '');

-- --------------------------------------------------------

--
-- Table structure for table `as_students`
--

CREATE TABLE IF NOT EXISTS `as_students` (
  `as_studentno` int(11) NOT NULL AUTO_INCREMENT,
  `as_admission_date` date NOT NULL,
  `as_classid` int(11) NOT NULL,
  `as_surname` varchar(20) NOT NULL,
  `as_firstname` varchar(20) NOT NULL,
  `as_othername` varchar(20) NOT NULL,
  `as_gender` varchar(6) NOT NULL,
  `as_date_of_birth` date NOT NULL,
  `as_nationality` varchar(20) NOT NULL,
  `as_photo` varchar(100) NOT NULL,
  `as_religion` varchar(20) NOT NULL,
  `as_fathername` varchar(64) NOT NULL,
  `as_mothername` varchar(64) NOT NULL,
  `as_guardianname` varchar(64) NOT NULL,
  `as_physical_address` varchar(100) NOT NULL,
  `as_district` varchar(20) NOT NULL,
  `as_contact` varchar(20) NOT NULL,
  `as_mobile` varchar(20) NOT NULL,
  `as_email` varchar(100) NOT NULL,
  PRIMARY KEY (`as_studentno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `as_students`
--

INSERT INTO `as_students` (`as_studentno`, `as_admission_date`, `as_classid`, `as_surname`, `as_firstname`, `as_othername`, `as_gender`, `as_date_of_birth`, `as_nationality`, `as_photo`, `as_religion`, `as_fathername`, `as_mothername`, `as_guardianname`, `as_physical_address`, `as_district`, `as_contact`, `as_mobile`, `as_email`) VALUES
(2, '2017-09-12', 1, 'Kato', 'Isacca', '', 'Male', '2015-06-14', 'Ugandan', '1505229306_child.PNG', 'Christian', '', '', 'Lubwama Juma', 'Kamwokya', 'Kampala', '07897466194', '0705768765', ''),
(3, '2017-09-12', 1, 'Nakyanzi', 'Jane', '', 'Male', '2015-05-05', 'Ugandan', '1505229471_bits graduation.jpg', 'Christian', '', '', 'Nalumansi Joan', 'kavule', 'Kampala', '0410097665', '0399865789', '');

-- --------------------------------------------------------

--
-- Table structure for table `as_subjects`
--

CREATE TABLE IF NOT EXISTS `as_subjects` (
  `as_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_teachers_id` int(11) NOT NULL,
  `as_subjectname` varchar(20) NOT NULL,
  PRIMARY KEY (`as_subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `as_subjects`
--

INSERT INTO `as_subjects` (`as_subject_id`, `as_teachers_id`, `as_subjectname`) VALUES
(1, 5, 'Literacy one'),
(2, 4, 'Literacy Two'),
(5, 5, 'Mathematics'),
(6, 5, 'English'),
(7, 0, 'Luganda'),
(8, 0, 'IRE/CRE'),
(9, 0, 'P.E'),
(10, 0, 'Science'),
(11, 0, 'Social Studies'),
(16, 0, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `as_teacher`
--

CREATE TABLE IF NOT EXISTS `as_teacher` (
  `as_teachers_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_surname` varchar(40) NOT NULL,
  `as_firstname` varchar(40) NOT NULL,
  `as_othername` varchar(40) NOT NULL,
  `as_gender` varchar(10) NOT NULL,
  `as_dob` date NOT NULL,
  `as_religion` varchar(40) NOT NULL,
  `as_staff_catagory` varchar(40) NOT NULL,
  `as_position` varchar(40) NOT NULL,
  `as_national` varchar(40) NOT NULL,
  `as_core_subj` varchar(40) NOT NULL,
  `as_other_subj` varchar(40) NOT NULL,
  `as_date_join` datetime NOT NULL,
  `as_passport` varchar(100) NOT NULL,
  `as_physical_address` varchar(100) NOT NULL,
  `as_district` varchar(40) NOT NULL,
  `as_mobile1` varchar(20) NOT NULL,
  `as_mobile2` varchar(20) NOT NULL,
  `as_email` varchar(100) NOT NULL,
  PRIMARY KEY (`as_teachers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `as_teacher`
--

INSERT INTO `as_teacher` (`as_teachers_id`, `as_surname`, `as_firstname`, `as_othername`, `as_gender`, `as_dob`, `as_religion`, `as_staff_catagory`, `as_position`, `as_national`, `as_core_subj`, `as_other_subj`, `as_date_join`, `as_passport`, `as_physical_address`, `as_district`, `as_mobile1`, `as_mobile2`, `as_email`) VALUES
(1, 'Kakembo', 'Joseph', '', 'Male', '1990-02-20', 'Christian', 'Teaching Staff', 'Teacher', 'Uganda', 'Math', 'S.S.T', '2017-06-22 00:00:00', '1498121178_students in comp.jpg', 'Kawaala', 'Kampala', '0748446462748', '0763553433333', 'kakembo@mail.com'),
(2, 'Serumaga', 'John', 'William', 'Male', '1980-07-06', 'Christian', 'Non-teaching Staff', 'Driver', 'Ugandan', '', '', '2017-06-22 00:00:00', '1498125560_20170315_093328.jpg', 'Mpererwe', 'Wakiso', '07820978765', '07987654656', 'johnwilliam@gmail.com'),
(3, 'Nasazi', 'Rose', '', 'Female', '1970-06-04', 'Christian', 'Non-teaching Staff', 'Bursar', 'American', '', '', '2017-06-26 00:00:00', '1498495145_1(1).jpg', 'Kabalole', 'Kabalole', '043780987', '098765434', ''),
(4, 'Semujju', 'Isaac', 'Joel', 'Male', '1980-09-05', 'Christian', 'Teaching Staff', 'Teacher', 'Ugandan', 'English', '', '2017-06-26 00:00:00', '1498495429_IMG-20170122-WA0006.jpg', 'Kamwokya', 'Kampala', '078654327', '0786453213', ''),
(5, 'Semujju', 'Juma', 'Bwanika', 'Male', '2017-07-12', 'Muslim', 'Teaching Staff', 'Teacher', 'Ugandan', 'Math', 'Scince', '2017-07-12 00:00:00', '1499881598_IMG_20170102_165934.jpg', 'Wampewo', 'Wakiso', '07865432998', '07543654320', 'juma@gmail.com'),
(6, 'Lubowa', 'John', 'Paul', 'Male', '1987-03-02', 'Christian', 'Teaching Staff', 'Teacher', 'Ugandan', '7', 'English', '2017-07-13 00:00:00', '1499955370_psfoto.jpg', 'Kabulasoke', 'Bulemezi', '07820978765', '0786453213', 'lubo@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `as_term`
--

CREATE TABLE IF NOT EXISTS `as_term` (
  `as_termid` int(11) NOT NULL AUTO_INCREMENT,
  `as_term` varchar(20) NOT NULL,
  PRIMARY KEY (`as_termid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `as_term`
--

INSERT INTO `as_term` (`as_termid`, `as_term`) VALUES
(1, '1st Term'),
(2, '2nd Term'),
(3, '3rd Term');

-- --------------------------------------------------------

--
-- Table structure for table `as_timetable`
--

CREATE TABLE IF NOT EXISTS `as_timetable` (
  `as_timetable_id` int(11) NOT NULL,
  `as_subject_id` int(11) NOT NULL,
  `as_class_id` int(11) NOT NULL,
  `as_day` varchar(20) NOT NULL,
  `as_time` time NOT NULL,
  `as_teachers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_timetable`
--


-- --------------------------------------------------------

--
-- Table structure for table `as_transport`
--

CREATE TABLE IF NOT EXISTS `as_transport` (
  `as_tpid` int(11) NOT NULL AUTO_INCREMENT,
  `as_plateNo` varchar(11) NOT NULL,
  `as_teachers_id` int(11) NOT NULL,
  `as_route` varchar(100) NOT NULL,
  PRIMARY KEY (`as_tpid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `as_transport`
--

INSERT INTO `as_transport` (`as_tpid`, `as_plateNo`, `as_teachers_id`, `as_route`) VALUES
(3, 'UBA-123B', 2, 'Kampala-Wakiso'),
(4, 'UBA-123B', 2, 'Kampala-Wakiso'),
(5, 'UAQ-445J', 2, 'Masaka-Luwero'),
(6, 'UAQ-445J', 2, 'Munyonyo - Salam');

-- --------------------------------------------------------

--
-- Table structure for table `as_users`
--

CREATE TABLE IF NOT EXISTS `as_users` (
  `as_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_email` varchar(100) NOT NULL,
  `as_password` varchar(40) NOT NULL,
  `as_position` varchar(40) NOT NULL,
  `as_username` varchar(40) NOT NULL,
  PRIMARY KEY (`as_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `as_users`
--

INSERT INTO `as_users` (`as_user_id`, `as_email`, `as_password`, `as_position`, `as_username`) VALUES
(1, 'williamdk@creativesummitug.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'administrator', 'williamdk'),
(2, 'john@creativesummitug.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'class teacher', 'john'),
(3, 'allan@gmail.com', '2a48d74bab6ccea30bacd31c9be161121b8cdb4e', '', 'Allan'),
(4, 'eddie@gmail.com', '5b46d064eb6e04bd42e45cf3a34db708847a7c14', '', 'Eddie'),
(5, 'asabawilliamdk@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'williamAsaba');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `as_settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_schoolName` varchar(120) NOT NULL,
  `as_motto` varchar(40) NOT NULL,
  `as_physicalAddress` text NOT NULL,
  `as_boxno` varchar(120) NOT NULL,
  `as_tel1` int(20) NOT NULL,
  `as_tel2` int(20) NOT NULL,
  `as_email` varchar(100) NOT NULL,
  `as_website` varchar(100) NOT NULL,
  `as_logoUpload` varchar(120) NOT NULL,
  `as_beginOn` varchar(20) NOT NULL,
  `as_endOn` varchar(20) NOT NULL,
  PRIMARY KEY (`as_settings_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`as_settings_id`, `as_schoolName`, `as_motto`, `as_physicalAddress`, `as_boxno`, `as_tel1`, `as_tel2`, `as_email`, `as_website`, `as_logoUpload`, `as_beginOn`, `as_endOn`) VALUES
(1, 'AllSchool Academy', 'Education for All', 'Bombo road next to marie stopes', 'P.O.Box 0987 Kampala', 2147483647, 2147483647, 'info@allschoolacademy.com', 'www.allschoolademy.com', '1506350901_business-control.png', '2017-09-25', '2017-12-15');
