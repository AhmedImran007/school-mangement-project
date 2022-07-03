-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 04:58 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `std_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_student`
--

CREATE TABLE `add_student` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `sections` varchar(10) NOT NULL,
  `roll` int(50) NOT NULL,
  `b_date` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_phone` varchar(255) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_student`
--

INSERT INTO `add_student` (`id`, `s_name`, `f_name`, `m_name`, `class`, `sections`, `roll`, `b_date`, `gender`, `s_address`, `s_email`, `s_phone`, `s_password`, `photo`) VALUES
(3, 'atikur rahman', 'mizanuar rahman', 'rashida begum', '01', 'B', 89636, '2017-08-15', '1', 'Mirpur', 'atikur@gmail.com', '4674646', '123456 khhkj', '3.jpg'),
(4, 'fjksajfd', 'njk', 'j', '01', 'A', 248852, '2017-08-22', '1', ' ghhgcgh', 'dcdf@gmail.com', '81558', '0557', '4.jpg'),
(5, 'cs d ffz', ' zddzfd', ' fdsdf', 'two', 'B', 14654, '2017-08-29', '1', 'Mirpur', '', '4674646', '123456', 'Tulips.jpg'),
(7, 'cs d ffz', 'mizanuar rahman', 'rashida begum', 'two', 'B', 248852, '2017-08-21', '1', 'fbsr', 'ngd@jmj.com', '5020', '4414', 'Jellyfish.jpg'),
(8, 'atiu', 'avf', 'avf', 'two', 'B', 0, '2017-08-16', '1', 'afd', 'nhfvvnh@mjm.ckfdl', '652663', 'afb', 'Jellyfish.jpg'),
(9, 'rtbtrb', ' g', ' g', 'two', 'B', 353, '2017-08-23', '1', 'fgbfgb', 'atikurmm@mgs.vjj', '03034', '50', 'Hydrangeas.jpg'),
(10, 'cs d ffz', 'avf', 'avf', 'two', 'B', 248852, '2017-08-21', '2', 'g365', 'saima@gmail.com', '365', 'adminhrm', 'Jellyfish.jpg'),
(12, 'aVSC vs', ' vs v', ' s ', 'one', 'B', 5, '2017-08-22', '1', 'gfggfgf', 'vfgfcgfc@cgbcbgf.ffv', '22542', 'bbbrxffvgtdtgfgffvb', 'Penguins.jpg'),
(13, 'oiun c aek j', 'cwrcr', 'vrfqecfc', 'one', 'A', 744, '2017-08-08', '1', 'btdtvdfgt', 'sjvns@gmak.com', '87524785', '10452515', 'Jellyfish.jpg'),
(14, 'akas', 'akas', 'akas', '01', 'A', 102, '2017-08-02', '2', 'mirpur', 'akas@gmail.cm', '102', '18965', '14.jpg'),
(15, 'anik islam', 'anik islam', 'anik islam', 'two', 'B', 103, '2017-08-05', '1', 'mipur', 'islam@gmail.com', '101101101', '123456', 'Desert.jpg'),
(16, 'b4er', 'abrsfan', 'abrf', '01', 'A', 52, '2017-08-09', '1', 'l6dfgut', 'brtfg@gmail.com', '18652', '1985', '16.jpg'),
(17, 'brth', 'sntrhg', 'sntrdhg', 'one', 'A', 952, '2017-08-01', '2', 'ntrgh', 'btdfg@gmail.com', '16456', '16526', '17.jpg'),
(18, 'vs ms vm', 'avfvfg', 'abvfrvf', '01', 'A', 105, '2017-08-22', '1', 'Mirpur', 'nuhj@gmail.com', '28585', '175558', '18.jpg'),
(19, ' asfdv', ' asdfv', ' sadfcv', '01', 'A', 157613, '2017-08-16', '1', 'x fb', 'ojmm@gmail.com', '2785', '17774564654', '19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admission_fee`
--

CREATE TABLE `admission_fee` (
  `id` int(10) NOT NULL,
  `class_name` varchar(15) NOT NULL,
  `addmission_fee` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission_fee`
--

INSERT INTO `admission_fee` (`id`, `class_name`, `addmission_fee`) VALUES
(2, 'two', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `admission_form_fee`
--

CREATE TABLE `admission_form_fee` (
  `id` int(20) NOT NULL,
  `class_name` varchar(15) NOT NULL,
  `form_fee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission_form_fee`
--

INSERT INTO `admission_form_fee` (`id`, `class_name`, `form_fee`) VALUES
(2, 'two', 250);

-- --------------------------------------------------------

--
-- Table structure for table `bookcases`
--

CREATE TABLE `bookcases` (
  `user_email` varchar(50) NOT NULL,
  `bookcase` varchar(50) NOT NULL,
  `shelf_count` int(5) NOT NULL,
  `shelf_cap` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcases`
--

INSERT INTO `bookcases` (`user_email`, `bookcase`, `shelf_count`, `shelf_cap`) VALUES
('', 'abc', 3, 50),
('', 'dfff', 3, 30),
('', 'abc', 3, 50),
('', 'abc', 3, 50),
('', 'brsv', 0, 0),
('', 'ajkaj', 9, 785),
('', 'abc', 3, 50),
('', 'abc', 3, 50),
('', 'afaf', 0, 0),
('', 'ey thb', 0, 0),
('atikur', 'abc', 3, 50),
('atikur', 'ajhdfakdfk', 2, 7454);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `user_email` varchar(20) NOT NULL,
  `bookcase` varchar(20) NOT NULL,
  `shelf_id` int(5) NOT NULL,
  `title` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `gener` varchar(20) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`user_email`, `bookcase`, `shelf_id`, `title`, `author`, `gener`, `isbn`, `price`) VALUES
('', 'abc', 2, 'ajkljfkajfak ajffak', 'atikur', 'abcd', 'hajdhfakjhfaahah', 150);

-- --------------------------------------------------------

--
-- Table structure for table `books_author`
--

CREATE TABLE `books_author` (
  `id` int(10) NOT NULL,
  `author_name` varchar(30) NOT NULL,
  `numaric_num` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_author`
--

INSERT INTO `books_author` (`id`, `author_name`, `numaric_num`) VALUES
(2, 'bappy', 101),
(3, 'sopon', 102),
(4, 'akas', 103);

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE `book_list` (
  `id` int(10) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(9) NOT NULL,
  `class_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`id`, `book_name`, `author`, `description`, `price`, `class_name`) VALUES
(2, 'abcdefcer', 'bappy', 'abcd', 130, 'five');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(3) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `cl_numeric` int(10) NOT NULL,
  `t_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `cl_numeric`, `t_name`) VALUES
(8, 'two', 102, 'Katrina'),
(14, 'three', 103, 'Katrina'),
(15, 'five', 105, 'rfsfs'),
(16, 'one', 101, 'rfsfs'),
(17, 'four', 104, 'Katrina'),
(18, 'six', 106, 'Katrina');

-- --------------------------------------------------------

--
-- Table structure for table `class_fee`
--

CREATE TABLE `class_fee` (
  `id` int(11) NOT NULL,
  `class_name` varchar(11) NOT NULL,
  `monthly_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_fee`
--

INSERT INTO `class_fee` (`id`, `class_name`, `monthly_fee`) VALUES
(3, 'three', 250),
(4, 'five', 310);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `id` int(10) NOT NULL,
  `class_name` varchar(15) NOT NULL,
  `subject_name` varchar(30) NOT NULL,
  `sec_name` varchar(5) NOT NULL,
  `teacher_name` varchar(30) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`id`, `class_name`, `subject_name`, `sec_name`, `teacher_name`, `time`) VALUES
(2, 'one', 'Accounting', 'C', 'rfsfs', '10am-10.45am'),
(3, 'two', 'Bangla', 'A', 'Katrina', '9.00am-10.00am'),
(4, 'two', 'English', 'A', 'rfsfs', '10am-10.45am'),
(5, 'two', 'Math', 'B', 'Katrina', '9.00am-10.00am'),
(6, 'two', 'Accounting', 'C', 'rfsfs', '10am-11am');

-- --------------------------------------------------------

--
-- Table structure for table `cl_section`
--

CREATE TABLE `cl_section` (
  `id` int(3) NOT NULL,
  `sec_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cl_section`
--

INSERT INTO `cl_section` (`id`, `sec_name`) VALUES
(1, 'A'),
(2, 'B'),
(4, 'C'),
(5, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `exam_fee`
--

CREATE TABLE `exam_fee` (
  `id` int(4) NOT NULL,
  `class_name` varchar(15) NOT NULL,
  `exam_name` varchar(30) NOT NULL,
  `exam_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_fee`
--

INSERT INTO `exam_fee` (`id`, `class_name`, `exam_name`, `exam_fee`) VALUES
(2, 'two', 'tutorial', 101),
(3, 'two', 'tutorial', 7852);

-- --------------------------------------------------------

--
-- Table structure for table `ge_setting`
--

CREATE TABLE `ge_setting` (
  `id` int(10) NOT NULL,
  `logo` text NOT NULL,
  `sch_name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` text NOT NULL,
  `fax` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `web_url` varchar(40) NOT NULL,
  `trade_license` text NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `tin_num` text NOT NULL,
  `establish_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ge_setting`
--

INSERT INTO `ge_setting` (`id`, `logo`, `sch_name`, `description`, `address`, `telephone`, `fax`, `email`, `web_url`, `trade_license`, `owner_name`, `tin_num`, `establish_date`) VALUES
(1, '7.jpg', 'abc school', 'fsadfnjh', 'green road,dhaka', '8751255', '22727', 'abcl@gmail.com', 'http://abc.bd', '2580125012', 'abc', '54854545', '2018-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `event_name`, `description`, `start_date`, `end_date`) VALUES
(1, 'xgfxghdfh', 'hdgjstyjstykjdtukkdl', '2017-08-01', '2017-08-22'),
(2, 'snertbhg', 's rnt', '2017-08-08', '2017-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `late_fee`
--

CREATE TABLE `late_fee` (
  `id` int(10) NOT NULL,
  `late_fee` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `late_fee`
--

INSERT INTO `late_fee` (`id`, `late_fee`) VALUES
(2, 120);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `user`, `subject`, `Description`, `Date`) VALUES
(6, 'niki@gmail.com', 'adfdfdfdfd', 'bbbbbbbb', '2016-07-31 15:38:35'),
(7, 'taslima@gmail.com', 'akasur rahman', 'akasur rahman', '2016-07-31 15:38:35'),
(8, 'atikur@gmail.com', 'abc', 'atikjfa\r\n', '2017-08-15 13:42:00'),
(9, 'atikur@gmail.com', 'abc', ' c,fthe4, dbhj4e,5ghb5e,. g', '2017-08-15 17:12:30'),
(10, 'atikur@gmail.com', 'abc', ' c,fthe4, dbhj4e,5ghb5e,. g', '2017-08-15 17:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam`
--

CREATE TABLE `online_exam` (
  `id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `answer` text NOT NULL,
  `options` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_exam`
--

INSERT INTO `online_exam` (`id`, `questions`, `answer`, `options`, `option1`, `option2`) VALUES
(1, 'HTML stant for?', 'Hypertext Markup Language', 'Higher Markup Language', 'Hige Markup Language', 'Hibrid Markup Language'),
(2, 'Sky colour is?', 'Blue', 'Red', 'Black', 'White'),
(3, 'HTML stander version is?', 'HTML5', 'HTML 4.01', 'XHTML', 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `parent_id` int(20) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `f_phone` varchar(20) NOT NULL,
  `m_phone` varchar(20) NOT NULL,
  `p_email` varchar(50) NOT NULL,
  `p_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `parent_id`, `f_name`, `m_name`, `address`, `profession`, `f_phone`, `m_phone`, `p_email`, `p_password`) VALUES
(2, 555555, 'wrwrwfgdfg', 'Fatema', 'Barisal', 'fgdfgd', '554254', '123121', 'sdfgfdg@ggf.com', 'gjhgj');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `staff_id` int(20) NOT NULL,
  `st_name` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `responsibility` varchar(100) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `staff_type` varchar(20) NOT NULL,
  `numeric_code` int(50) NOT NULL,
  `st_gender` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `st_phone` varchar(20) NOT NULL,
  `st_email` varchar(50) NOT NULL,
  `st_password` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_id`, `st_name`, `qualification`, `responsibility`, `f_name`, `m_name`, `birth_date`, `join_date`, `staff_type`, `numeric_code`, `st_gender`, `address`, `st_phone`, `st_email`, `st_password`, `photo`) VALUES
(1, 1222, 'Nasir', 'HSC', '02', 'akkas', 'ddhhd', '2017-08-28', '2017-08-28', '01', 22, '1', 'Barisal', '65154', 'rsrsrgdf@ghfg.dtht', 'srhgdhdhd', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stu_attend`
--

CREATE TABLE `stu_attend` (
  `id` int(30) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `roll` int(10) NOT NULL,
  `class` varchar(3) NOT NULL,
  `sections` varchar(2) NOT NULL,
  `attend` varchar(8) NOT NULL,
  `att_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stu_attend`
--

INSERT INTO `stu_attend` (`id`, `s_name`, `roll`, `class`, `sections`, `attend`, `att_time`) VALUES
(1, 'atiu', 0, '02', 'B', 'present', '2017-08-09'),
(2, 'rtbtrb', 353, '02', 'B', 'present', '2017-08-16'),
(3, 'cs d ffz', 1741, '02', 'B', 'present', '2017-08-08'),
(4, 'nxfgnt', 66566, '01', 'A', 'absent', '2017-08-10'),
(5, 'aVSC vs', 5, '01', 'B', 'present', '2017-08-16'),
(6, 'oiun c aek j', 744, '01', 'A', 'absent', '2017-08-03'),
(7, 'rb5dryn6b', 174174, '03', 'B', 'absent', '0000-00-00'),
(8, 'any', 1545, '02', 'B', 'absent', '0000-00-00'),
(9, 'rdbvf', 24, '02', 'B', 'present', '2017-08-14'),
(10, 'zdcfvrf', 2424, '02', 'B', 'present', '2017-08-14'),
(11, 'ffssf', 65565, '02', 'B', 'absent', '2017-08-14'),
(12, 'kjjkjh', 55, '02', 'B', 'present', '2017-08-14'),
(13, 'hjuhju', 66, '02', 'B', 'present', '2017-08-14'),
(14, 'chgg ', 705, '02', 'B', 'absent', '2017-08-14'),
(15, ' brv', 4, '02', 'B', 'absent', '2017-08-14'),
(16, 'nserbhg', 19845, '02', 'B', 'present', '2017-08-14'),
(17, 'cv78ofg', 0, '02', 'B', 'present', '2017-08-14'),
(18, 'vbuh', 9165, '02', 'B', 'present', '2017-08-14'),
(19, '7cvfg', 961, '02', 'B', 'absent', '2017-08-14'),
(20, '7cvfg', 916, '02', 'B', 'absent', '2017-08-14'),
(21, 'vg', 914, '02', 'B', 'present', '2017-08-14'),
(22, 'abir', 53, '02', 'B', '', '0000-00-00'),
(23, 'abcdd', 1474, '01', 'A', '', '0000-00-00'),
(24, '2jh', 25052, '01', 'A', '', '0000-00-00'),
(25, 'b4er', 52, '02', 'A', '', '0000-00-00'),
(26, 'brth', 952, '01', 'A', '', '0000-00-00'),
(27, 'vs ms vm', 105, '01', 'A', '', '0000-00-00'),
(28, ' asfdv', 157613, '01', 'A', '', '0000-00-00'),
(29, ' asfdv', 248852, '01', 'A', 'present', '2017-08-16'),
(30, ' asfdv', 744, '01', 'A', 'absent', '2017-08-16'),
(31, ' asfdv', 102, '01', 'A', 'present', '2017-08-16'),
(32, ' asfdv', 952, '01', 'A', 'absent', '2017-08-16'),
(33, ' asfdv', 105, '01', 'A', 'present', '2017-08-16'),
(34, ' asfdv', 157613, '01', 'A', 'absent', '2017-08-16'),
(35, ' asfdv', 248852, '01', 'A', 'present', '2017-08-16'),
(36, ' asfdv', 744, '01', 'A', 'absent', '2017-08-16'),
(37, ' asfdv', 102, '01', 'A', 'present', '2017-08-16'),
(38, ' asfdv', 952, '01', 'A', 'absent', '2017-08-16'),
(39, ' asfdv', 105, '01', 'A', 'present', '2017-08-16'),
(40, ' asfdv', 157613, '01', 'A', 'absent', '2017-08-16'),
(41, 'aVSC vs', 5, '01', 'B', 'present', '2017-08-16'),
(42, ' asfdv', 248852, '01', 'A', 'present', '2017-08-16'),
(43, ' asfdv', 744, '01', 'A', 'absent', '2017-08-16'),
(44, ' asfdv', 102, '01', 'A', 'present', '2017-08-16'),
(45, ' asfdv', 952, '01', 'A', 'absent', '2017-08-16'),
(46, ' asfdv', 105, '01', 'A', 'present', '2017-08-16'),
(47, ' asfdv', 157613, '01', 'A', 'absent', '2017-08-16'),
(48, ' asfdv', 248852, '01', 'A', 'present', '2017-08-16'),
(49, ' asfdv', 744, '01', 'A', 'present', '2017-08-16'),
(50, ' asfdv', 102, '01', 'A', 'present', '2017-08-16'),
(51, ' asfdv', 952, '01', 'A', 'present', '2017-08-16'),
(52, ' asfdv', 105, '01', 'A', 'present', '2017-08-16'),
(53, ' asfdv', 157613, '01', 'A', 'present', '2017-08-16'),
(54, ' asfdv', 248852, '01', 'A', 'present', '2017-08-16'),
(55, ' asfdv', 744, '01', 'A', 'absent', '2017-08-16'),
(56, ' asfdv', 102, '01', 'A', 'present', '2017-08-16'),
(57, ' asfdv', 952, '01', 'A', 'absent', '2017-08-16'),
(58, ' asfdv', 105, '01', 'A', 'present', '2017-08-16'),
(59, ' asfdv', 157613, '01', 'A', 'absent', '2017-08-16'),
(60, ' asfdv', 248852, '01', 'A', 'present', '2017-08-16'),
(61, ' asfdv', 744, '01', 'A', 'present', '2017-08-16'),
(62, ' asfdv', 102, '01', 'A', 'present', '2017-08-16'),
(63, ' asfdv', 952, '01', 'A', 'present', '2017-08-16'),
(64, ' asfdv', 105, '01', 'A', 'present', '2017-08-16'),
(65, ' asfdv', 157613, '01', 'A', 'present', '2017-08-16'),
(66, 'b4er', 52, '02', 'A', 'present', '2017-08-16'),
(67, 'anik islam', 14654, '02', 'B', 'present', '2017-09-16'),
(68, 'anik islam', 0, '02', 'B', 'present', '2017-09-16'),
(69, 'anik islam', 353, '02', 'B', 'present', '2017-09-16'),
(70, 'anik islam', 248852, '02', 'B', 'present', '2017-09-16'),
(71, 'anik islam', 103, '02', 'B', 'present', '2017-09-16'),
(72, 'b4er', 52, '02', 'A', 'present', '2017-09-17'),
(73, 'b4er', 52, 'two', 'A', 'present', '2017-09-17'),
(74, 'b4er', 52, 'two', 'A', 'absent', '2017-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(3) NOT NULL,
  `subject_name` varchar(25) NOT NULL,
  `su_numeric` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `su_numeric`) VALUES
(2, 'Bangla', 101),
(3, 'English', 102),
(4, 'Math', 103),
(5, 'Accounting', 104);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `responsibility` varchar(100) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `teacher_type` varchar(20) NOT NULL,
  `numeric_code` int(50) NOT NULL,
  `t_gender` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `t_phone` varchar(20) NOT NULL,
  `t_email` varchar(50) NOT NULL,
  `t_password` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_id`, `t_name`, `qualification`, `responsibility`, `f_name`, `m_name`, `birth_date`, `join_date`, `teacher_type`, `numeric_code`, `t_gender`, `address`, `t_phone`, `t_email`, `t_password`, `photo`) VALUES
(2, 24, 'Farid Rahman', 'BSc', '01', 'Hashem', 'Taslima', '2017-08-08', '2017-08-08', '01', 467, '2', 'Barisal', '6779979', 'maddfd@fdgfdg.sff', 'tgfjf', '2.jpg'),
(3, 1233, 'ASA Mamun', 'BSc', 'Math', 'Father', 'Mother', '2017-09-11', '2017-09-11', '01', 10111, '1', 'dhaka', '011145544', 'fdhfdh@gmail.com', 'desgfds', '3.jpg'),
(4, 1237, 'Asad', 'BA', 'Bangla', 'Fathersss', 'Mothersss', '2017-09-06', '2017-09-18', '01', 122, '2', 'dhaka', '0111455444', 'dgfdgfdg@ghffgh.fdhf', 'gdsgds', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE `useronline` (
  `session` varchar(255) NOT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useronline`
--

INSERT INTO `useronline` (`session`, `time`) VALUES
('4nfhj37ge6a2hnjur4o0jd5bf4', 1503384026),
('4nfhj37ge6a2hnjur4o0jd5bf4', 1503384076),
('4nfhj37ge6a2hnjur4o0jd5bf4', 1503384370),
('4nfhj37ge6a2hnjur4o0jd5bf4', 1503384452),
('4nfhj37ge6a2hnjur4o0jd5bf4', 1503384508);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `Skills` varchar(100) NOT NULL,
  `Location` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `fullname`, `experience`, `Skills`, `Location`) VALUES
(1, 'atikur', 'atikur@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', ''),
(2, 'imran', 'imran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', ''),
(3, 'taslima', 'taslima@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_student`
--
ALTER TABLE `add_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_fee`
--
ALTER TABLE `admission_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_form_fee`
--
ALTER TABLE `admission_form_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_author`
--
ALTER TABLE `books_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_fee`
--
ALTER TABLE `class_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_section`
--
ALTER TABLE `cl_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_fee`
--
ALTER TABLE `exam_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ge_setting`
--
ALTER TABLE `ge_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `late_fee`
--
ALTER TABLE `late_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `online_exam`
--
ALTER TABLE `online_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_attend`
--
ALTER TABLE `stu_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_student`
--
ALTER TABLE `add_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `admission_fee`
--
ALTER TABLE `admission_fee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admission_form_fee`
--
ALTER TABLE `admission_form_fee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `books_author`
--
ALTER TABLE `books_author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book_list`
--
ALTER TABLE `book_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `class_fee`
--
ALTER TABLE `class_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cl_section`
--
ALTER TABLE `cl_section`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `exam_fee`
--
ALTER TABLE `exam_fee`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ge_setting`
--
ALTER TABLE `ge_setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `late_fee`
--
ALTER TABLE `late_fee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `online_exam`
--
ALTER TABLE `online_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stu_attend`
--
ALTER TABLE `stu_attend`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
