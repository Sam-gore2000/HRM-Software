-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 06:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hrmsoftwere`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(10) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `activityby` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `ip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `datetime`, `activityby`, `name`, `activity`, `ip`) VALUES
(1, '2023-10-01 17:40:00.000000', 'emp', ' sudesh', ' report', '193.34.23.0'),
(4, '2023-10-08 17:46:00.000000', 'user', 'Samadhan', ' report', '193.34.34.55'),
(12, '2023-10-03 14:00:00.000000', 'user', 'Rohan', 'task completed', '193.34.34.55'),
(18, '2023-10-03 14:28:00.000000', 'emp', 'Shubham', 'monthly performance ', '193.34.34.55'),
(19, '2023-10-03 00:00:00.000000', 'user', 'sudesh', ' report', '193.34.34.55');

-- --------------------------------------------------------

--
-- Table structure for table `add_birthday`
--

CREATE TABLE `add_birthday` (
  `id` int(11) NOT NULL,
  `birth_date` varchar(10) NOT NULL,
  `birthday_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_birthday`
--

INSERT INTO `add_birthday` (`id`, `birth_date`, `birthday_message`) VALUES
(5, '2023-11-10', 'Happy Birthday Sudesh'),
(9, '2024-02-01', 'Happy Birthday Vishal sir'),
(11, '2023-12-14', 'Happy Birthday Mayuresh sir'),
(16, '2023-10-20', 'happy Birthday Pradnya'),
(19, '2023-10-18', 'Happy birthday Shubham'),
(26, '2023-10-20', 'happy Birthday Samadhan'),
(29, '2023-10-25', 'Happy birthday kiran'),
(31, '2023-11-10', 'Happy Birthday Samadhan'),
(45, '2023-10-25', 'HHHHHHHHHHHHHHHHH');

-- --------------------------------------------------------

--
-- Table structure for table `add_employe`
--

CREATE TABLE `add_employe` (
  `id` int(30) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emp_dob` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `emp_password` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `emp_mob1` varchar(10) NOT NULL,
  `emp_mob2` int(10) NOT NULL,
  `emp_add` varchar(300) NOT NULL,
  `emp_padd` varchar(300) NOT NULL,
  `married_status` varchar(50) NOT NULL,
  `uploadfile` varchar(400) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `ac_num` varchar(20) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `bank_code` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_employe`
--

INSERT INTO `add_employe` (`id`, `emp_name`, `email`, `emp_dob`, `designation`, `emp_id`, `emp_password`, `gender`, `emp_mob1`, `emp_mob2`, `emp_add`, `emp_padd`, `married_status`, `uploadfile`, `comment`, `ac_num`, `bank_name`, `branch_name`, `bank_code`) VALUES
(53, 'Samadhan Gore', 'sam1073@gmail.com', '2023-10-19', 'HR', 'SCS005', '123', '', '989897687', 989897687, 'Mumbai', 'Ahemdnagar', '', '../image/1R5A2721.JPG', 'Hello', '88878777', 'HRM', 'pune', 'HDFC009'),
(54, 'Rohan kadam', 'rohan@123', '2023-11-15', 'Back-End Developer', 'SCS006', 'SCS006', 'Female', '989897687', 989897687, 'pune Hinjawdi', 'mumbai', 'Other', '../image/IMG_1591----.jpg', 'Hello Connection', '4445355', 'HRM', 'Ruichhattishi', 'HRM0888'),
(59, 'Mr.Vishal Barage', 'vb@gmail.com', '1994-04-10', 'Front-End Developer', 'scs100', 'vb100', 'Male', '9665998581', 2147483647, 'kharadi pune.', 'shivaji peth , kolhapur.', 'Married', '../image/profile-img.jpg', 'all is well.', '63251478910', 'IDFC', 'nigadi', 'idfc23654'),
(60, 'rohit sharma', 'rs@gmail.com', '1992-01-30', 'Front-End Developer', 'scs450', 'rs4545', 'Male', '0992214805', 1020304050, 'kharadi pune.', 'mumbai', 'Single', '../image/messages-3.jpg', 'lllllllllllllllllllllllllllllllllll', '6767777777', 'bank of baroda', 'nigadi', '10203010'),
(66, 'Ashok pawar', 'ash123@gmail.com', '2012-11-17', 'Manager', 'SCS0013', 'AP0011', 'Male', '7768969620', 2147483647, 'pune', 'mumbai', 'Single', '../image/IMG_1190-----01.jpeg', 'heyy', '345645432', 'hrm', 'latur', 'LLP4565'),
(67, 'mahi patil', 'samadhangore1910@gmail.com', '2023-11-07', 'Softwere Developer', 'SCS0014', 'MP0014', 'Male', '989897687', 989897687, 'Hinjewadi', 'Ahemdnagar', 'Single', '../image/IMG_1191---.jpg', 'Hey i am softwere developer', '23232322', 'HDFC', 'pune', 'CBIN0000'),
(69, 'mayur sonawne', 'samadhangore1910@gmail.com', '2023-11-20', 'Manager', 'SCS010', 'MS010', 'Male', '0776896962', 989897687, 'Hinjewadi', 'mumbai', 'Married', '../image/IMG_20220626_161438.jpg', 'kkkkkkkkkkkkkkkkkkkkkkk', '8787865', 'Central Bank Of India', 'Ruichhattishi', 'HDFC009'),
(73, 'Akshay pawar', 'mahi@gmail.com', '2010-11-27', 'Softwere Developer', 'SCS020', '1234', 'Male', '7768969620', 2147483647, 'Hinjewadi', 'mumbai', 'Single', '../image/IMG_1191---.jpg', 'Hello', '77898987978', 'HRM', 'Ruichhattishi', 'CBIN0282899');

-- --------------------------------------------------------

--
-- Table structure for table `add_holiday`
--

CREATE TABLE `add_holiday` (
  `id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `holiday_name` varchar(500) NOT NULL,
  `status` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_holiday`
--

INSERT INTO `add_holiday` (`id`, `from_date`, `to_date`, `holiday_name`, `status`) VALUES
(55, '2023-11-02', '2023-11-03', 'Holiday5', NULL),
(56, '2023-10-04', '2023-10-05', 'Shivjayanti', NULL),
(57, '2023-10-04', '2023-10-04', 'Diwali', NULL),
(60, '2023-10-12', '2023-10-21', 'Gandhi Jayanti', NULL),
(61, '2023-10-13', '2023-10-18', 'Holiday for tour', NULL),
(63, '2023-10-18', '2023-10-18', 'Dashera...............', NULL),
(64, '2023-10-18', '2023-10-13', 'Holiday of Ganesh Chaturthi', 1),
(69, '2023-10-13', '2023-10-13', 'Happy diwali', NULL),
(81, '2023-10-14', '2023-10-19', 'Holiday', 1),
(89, '2023-11-21', '2023-11-30', 'hello', 1),
(100, '2023-11-27', '2023-11-28', 'today all have holiday', NULL),
(101, '2023-11-28', '2023-11-29', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `add_query`
--

CREATE TABLE `add_query` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(25) NOT NULL,
  `ondate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_query`
--

INSERT INTO `add_query` (`id`, `emp_id`, `emp_name`, `subject`, `email`, `contact`, `message`, `status`, `ondate`) VALUES
(58, 'ETIS-007', 'Virat Kohli', 'Technical Issue', 'vk@gmail.com', '7894563210', 'Laptop Is shutting down Without any command.', 'Done', '2023-11-09'),
(59, 'ETIS-007', 'Virat Kohli', 'Sakal News Paper For Daily News', 'vk@gmail.com', '7894563210', 'Not received the Paper today.', 'Done', '2023-11-09'),
(60, 'ETIS-007', 'Virat Kohli', 'MANUAL TESTING', 'vk@gmail.com', '7894563210', 'r', 'Done', '2023-11-09'),
(65, 'SCS003', 'pranav sankpal', 'dddddddddddddddd', 'pranav123@gmail.com', '961790887', 'ffffffffffffffffffffffffffffff', 'Reject', '2023-11-14'),
(66, 'SCS003', 'pranav sankpal', 'ttttttttttttttttttttttttttt', 'pranav123@gmail.com', '961790887', 'rrrrrrrrrrrrrrrrrrrrrrrrrr', 'Reject', '2023-11-14'),
(67, 'SCS003', 'pranav sankpal', 'ssssssssssssssssssssssssssss', 'pranav123@gmail.com', '961790887', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'Done', '2023-11-17'),
(68, 'SCS003', 'pranav sankpal', 'nskskcs csiili lilnlilc cicsl silnsn sknnsils csjinjlkhg jgyms s iljlijkkjudc shluj klsnnsuhy', 'pranav123@gmail.com', '961790887', 'jjclkjm knjcsa canm o;osc cjnhcsc nciuohc cjhnnkjkhk cbhkhba ca njnsjlcjl jncjsnjcnja', 'Done', '2023-11-17'),
(69, 'SCS003', 'pranav sankpal', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'pranav123@gmail.com', '961790887', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'Pending', '2023-11-17'),
(70, 'SCS020', 'Akshay pawar', 'payment issue', 'mahi@gmail.com', '7768969620', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'Done', '2023-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `add_quote`
--

CREATE TABLE `add_quote` (
  `id` int(11) NOT NULL,
  `quote_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_quote`
--

INSERT INTO `add_quote` (`id`, `quote_desc`) VALUES
(33, 'jyfyfyhrshfy'),
(36, 'hi kiran'),
(40, 'kiran'),
(41, 'Sudesh'),
(42, 'Rohan'),
(43, 'Shubham'),
(44, 'Be ready'),
(45, 'Do work'),
(46, 'Keep silence'),
(47, '“Love the giver more than the gift.”—Brigham Young.'),
(48, '“Peace on earth will come to stay, when we live Christmas every day.”—Helen Steiner Rice.\r\n'),
(49, 'Your greatest asset is your earning ability. ...\r\n'),
(50, 'You can only manage time if you track it right. - ...\r\n'),
(51, 'Concentrate all your thoughts upon the work in and. ...\r\n'),
(52, 'The secret of your future is hidden in your daily routine. -Mike Murdock'),
(53, 'It’s not the daily increase but daily decrease. Hack away at the unessential. -Bruce Lee'),
(54, 'Once you have mastered time, you will understand how true it is that most people overestimate what they can accomplish in a year – and underestimate what they can achieve in a decade! -Anthony Robbins'),
(56, 'fwfwfw'),
(57, 'Happy Diwali'),
(58, 'Be polite'),
(59, 'Keep Quite');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'sam1073@gmail.com', '1234'),
(2, 'ash123@gmail.com', '2002'),
(3, 'admin@123', '1010'),
(4, 'swapnil@123', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `attend_form`
--

CREATE TABLE `attend_form` (
  `id` int(5) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `attendby` varchar(20) NOT NULL,
  `shifttype` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `checkin` varchar(20) NOT NULL,
  `checkout` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `uploadfile` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attend_form`
--

INSERT INTO `attend_form` (`id`, `emp_id`, `emp_name`, `attendby`, `shifttype`, `date`, `checkin`, `checkout`, `status`, `uploadfile`) VALUES
(62, 'ETIS-3003', 'BHARATI MHASKE', 'HR-Admin', 'General Shift', '2023-09-07', '09:00', '18:00', 'Absent', ''),
(63, 'SCS-9009', 'JOE ROOT', 'HR-Admin', 'Night Shift', '2023-10-06', '09:03', '18:30', 'Select', ''),
(64, 'ETIS-9009', 'ABHAY KHADE', 'HR-Admin', 'General Shift', '2023-10-10', '09:45', '19:00', 'On-Leave', ''),
(65, 'SCS003', 'pranav sankpal', 'HR-Admin', 'General Shift', '2023-10-17', '', '', 'Present', ''),
(66, 'SCS001', 'mahi patil', 'HR-Admin', 'Morning Shift', '2023-10-17', '03:25', '19:24', 'Absent', ''),
(70, 'SCS005', 'Samadhan Gore', 'HR-Admin', 'Morning Shift', '2023-10-13', '08:42', '18:35', 'Present', ''),
(71, 'SCS005', 'Samadhan Gore', 'HR-Admin', 'Morning Shift', '2023-10-14', '08:32', '18:50', 'Present', ''),
(72, 'SCS005', 'Samadhan Gore', 'HR-Admin', 'General Shift', '2023-09-20', '18:34', '19:34', 'Absent', ''),
(73, 'SCS005', 'Samadhan Gore', 'HR-Admin', 'General Shift', '2023-09-21', '21:37', '07:37', 'Absent', ''),
(74, 'scs500', 'Rahul patil', 'HR-Admin', 'General Shift', '2023-10-01', '09:33', '18:34', 'Present', ''),
(75, 'scs500', 'Rahul patil', 'HR-Admin', 'General Shift', '2023-10-02', '08:36', '18:46', 'Present', ''),
(77, 'scs500', 'Rahul patil', 'HR-Admin', 'General Shift', '2023-10-05', '09:45', '18:48', 'Present', ''),
(79, 'scs500', 'Rahul patil', 'HR-Admin', 'General Shift', '2023-10-14', '21:00', '18:00', 'Absent', ''),
(80, 'SCS003', 'pranav sankpal', 'HR-Admin', 'General Shift', '2023-10-25', '08:10', '19:05', 'Half Day', ''),
(81, 'scs100', 'Vishal Barage', 'HR-Admin', 'General Shift', '2023-10-25', '08:35', '19:14', 'Present', ''),
(82, 'scs100', 'Mr.Vishal Barage', 'HR-Admin', 'General Shift', '2023-10-24', '08:33', '18:40', 'Present', ''),
(83, 'scs100', 'Mr.Vishal Barage', 'HR-Admin', 'Morning Shift', '2023-10-30', '09:06', '20:08', 'Present', '../files&img/product-4.jpg'),
(84, 'scs500', 'Mr.Rahul patil', 'HR-Admin', 'Morning Shift', '2023-11-01', '08:22', '19:22', 'Present', '../files&img/team3.jpg'),
(85, 'scs450', 'rohit sharma', 'HR-Admin', 'General Shift', '2023-11-01', '05:48', '04:48', 'Present', '../files&img/Panchagavya.jpg'),
(86, 'SCS003', 'pranav sankpal', 'HR-Admin', 'General Shift', '2023-11-03', '19:13', '06:13', 'Present', '../files&img/1R5A2721.JPG'),
(88, 'SCS003', 'pranav sankpal', 'HR-Admin', 'Morning Shift', '2023-11-07', '06:26', '22:26', 'Present', ''),
(89, 'SCS002', 'Mahesh Gore', 'HR-Admin', 'General Shift', '2023-11-08', '06:30', '17:00', 'Present', ''),
(90, 'SCS002', 'Mahesh Gore', 'HR-Admin', 'General Shift', '2023-11-09', '08:07', '18:00', 'Present', '../files&img/1R5A2721.JPG'),
(91, 'SCS003', 'pranav sankpal', 'HR-Admin', 'General Shift', '2023-11-08', '16:34', '07:34', 'Present', ''),
(93, 'SCS020', 'Akshay pawar', 'HR-Admin', 'General Shift', '2023-11-27', '09:30', '18:02', 'Present', '../files&img/1R5A2721.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(32) NOT NULL,
  `ac_name` varchar(255) NOT NULL,
  `ac_num` varchar(100) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `bank_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `ac_name`, `ac_num`, `bank_name`, `branch_name`, `bank_code`) VALUES
(1, 'samadhan gore', '9898756755343', 'SBI bank', 'Ahmednagar', 'CBIN0282899'),
(2, 'akanksha gore', '994349494888', 'SBI', 'ddskdnjdd', 'xnxk3333'),
(4, 'mahi Gore', '87878675665', 'HDFC', 'Hinjawadi', 'HDFC09898'),
(5, 'mahi Gore', '87878675665', 'HDFC', 'Hinjawadi', 'HDFC09898'),
(7, 'sam gore', '667646644', 'central bank', 'nagar', 'ng0876'),
(8, 'mayur sonawane', '998098767', 'central bank', 'ruichhattishi', 'CBIN0989898'),
(9, 'mayur sonawane', '9898765554', 'SBI bank', 'pune', '87865');

-- --------------------------------------------------------

--
-- Table structure for table `db_table`
--

CREATE TABLE `db_table` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `uploadfile` varchar(400) NOT NULL,
  `uploadfile1` varchar(1000) NOT NULL,
  `uploadfile2` varchar(400) NOT NULL,
  `uploadfile3` varchar(1000) NOT NULL,
  `uploadfile4` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_table`
--

INSERT INTO `db_table` (`id`, `emp_id`, `emp_name`, `email`, `contact_no`, `uploadfile`, `uploadfile1`, `uploadfile2`, `uploadfile3`, `uploadfile4`) VALUES
(31, '1111', 'Rutu', 'rutu@gmail.com', '0', 'images/Aadhar Card.pdf', 'images/Pan card.pdf', 'images/Graduation Certificate.jpg', 'images/10th Marksheet.jpg', 'images/12th Marksheet.jpg'),
(33, '3333', 'Shiv', 'shiv@gmail.com', '0', 'images/Aadhar Card.pdf', 'images/Pan card.pdf', 'images/Graduation Certificate.jpg', 'images/10th Marksheet.jpg', 'images/12th Marksheet.jpg'),
(34, '4444', 'Shree', 'shree@gmail.com', '0', 'images/', 'images/', 'images/', 'images/', 'images/'),
(35, '5555', 'Manju', 'mita@gmail.com', '0', 'images/', 'images/', 'images/', 'images/', 'images/'),
(44, '5454', 'Chini', 'ch@gmail.com', '2147483647', 'images/', 'images/', 'images/', 'images/', 'images/'),
(46, 'SCS010', 'samadhan gore', 'sam1073@gmail.com', '2147483647', 'images/IMG_1190---- (1).jpg', 'images/IMG_1181---01.jpg', 'images/', 'images/', 'images/');

-- --------------------------------------------------------

--
-- Table structure for table `emp_activity`
--

CREATE TABLE `emp_activity` (
  `id` int(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `emp_notice` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_activity`
--

INSERT INTO `emp_activity` (`id`, `date`, `emp_notice`) VALUES
(27, '2023-10-16', 'weekly task competition starts from today onwards..........'),
(34, '2023-11-27', 'tommarow all employees wear black shirt');

-- --------------------------------------------------------

--
-- Table structure for table `emp_docs`
--

CREATE TABLE `emp_docs` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `myfile` varchar(500) NOT NULL,
  `myfile1` varchar(500) NOT NULL,
  `myfile2` varchar(500) NOT NULL,
  `myfile3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_docs`
--

INSERT INTO `emp_docs` (`id`, `emp_id`, `emp_name`, `myfile`, `myfile1`, `myfile2`, `myfile3`) VALUES
(14, 'scs500', 'Rahul patil', '../files&img/4k-happy-diwali-wallpa.jpg', '../files&img/pan-card.jpg', '../files&img/bitnami.ico', '../files&img/istockphoto-1279761238-612x612.jpg'),
(26, 'scs450', 'rohit sharma', '../files&img/about.jpg', '../files&img/blog3.jpg', '../files&img/blog-single.jpg', '../files&img/top2.jpg'),
(27, 'SCS003', 'pranav sankpal', '../files&img/4k-happy-diwali-wallpa.jpg', '../files&img/101fe0f9software certi.jpg', '../files&img/blog3.jpg', '../files&img/blog-single.jpg'),
(28, 'SCS0013', 'Ashok pawar', '../files&img/1R5A2721.JPG', '../files&img/IMG_6613-01.jpeg', '../files&img/1 001.jpg', '../files&img/1R5A2721.JPG'),
(29, 'SCS002', 'Mahesh Gore', '../files&img/1R5A2721.JPG', '../files&img/1R5A2721.JPG', '../files&img/IMG_1191---.jpg', '../files&img/1R5A2721.JPG'),
(31, 'SCS020', 'Akshay pawar', '../files&img/1666195174009.jpg', '../files&img/IMG_1594----.jpg', '../files&img/IMG_1190-----01.jpeg', '../files&img/sam---.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emp_notice`
--

CREATE TABLE `emp_notice` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(200) NOT NULL,
  `myfile` varchar(500) NOT NULL,
  `emp_notice` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_notice`
--

INSERT INTO `emp_notice` (`id`, `date`, `subject`, `myfile`, `emp_notice`) VALUES
(56, '2023-10-24', 'diwali vacation..', '../files&img/istockphoto-1279761238-612x612.jpg', 'happy diwali all of you,,,,'),
(65, '2023-11-07', 'Diwali Notice', '', '10/11/2023 to 15/11/2023 all have Diwali Holiday'),
(69, '2023-11-27', 'holiday', '', 'today all have holiday ');

-- --------------------------------------------------------

--
-- Table structure for table `emp_rating`
--

CREATE TABLE `emp_rating` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `dept` varchar(30) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `emp_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_rating`
--

INSERT INTO `emp_rating` (`id`, `emp_id`, `emp_name`, `date`, `dept`, `shift`, `emp_status`) VALUES
(52, 'scs100', 'Mr.Vishal Barage', '2023-10-25', 'Software Developer', 'General Shift', '6'),
(53, 'scs100', 'Mr.Vishal Barage', '2023-04-30', 'Software Developer', 'General Shift', '7'),
(59, 'scs500', 'Mr.Rahul patil', '2023-10-30', 'Software Developer', 'General Shift', '2'),
(60, 'scs500', 'Mr.Rahul patil', '2023-09-30', 'Software Developer', 'Day Shift', '10'),
(61, 'scs500', 'Mr.Rahul patil', '2023-01-01', 'Software Developer', 'Day Shift', '1'),
(64, 'scs500', 'Mr.Rahul patil', '2023-10-31', 'Software Developer', 'Day Shift', '1'),
(70, 'SCS003', 'pranav sankpal', '2023-11-07', 'Software Developer', 'General Shift', '8'),
(71, 'SCS005', 'Samadhan Gore', '2023-11-08', 'Software Developer', 'General Shift', '8'),
(72, 'SCS005', 'Samadhan Gore', '2023-11-27', 'Software Developer', 'General Shift', '8'),
(73, 'SCS020', 'Akshay pawar', '2023-11-28', 'Software Developer', 'General Shift', '8'),
(74, 'SCS020', 'Akshay pawar', '2023-11-29', 'HR Department', 'Day Shift', '6'),
(75, 'SCS005', 'Samadhan Gore', '2024-02-16', 'Software Engineer', 'Day Shift', '6');

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `id` int(5) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `pday` varchar(10) NOT NULL,
  `basicsalary` varchar(20) NOT NULL,
  `allowances` varchar(20) NOT NULL,
  `da` varchar(20) NOT NULL,
  `esi` varchar(20) NOT NULL,
  `pf` varchar(20) NOT NULL,
  `conveyance` varchar(20) NOT NULL,
  `medicalallowance` varchar(20) NOT NULL,
  `hra` varchar(20) NOT NULL,
  `tds` varchar(20) NOT NULL,
  `in_hand` varchar(20) NOT NULL,
  `netsalary` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`id`, `emp_id`, `emp_name`, `month`, `pday`, `basicsalary`, `allowances`, `da`, `esi`, `pf`, `conveyance`, `medicalallowance`, `hra`, `tds`, `in_hand`, `netsalary`) VALUES
(5, 'etis-2000', 'Travis Head', '2023-11', '0', '25000', '1000', '1000', '5000', '2000', '1000', '1000', '1000', '2000', '', '39000'),
(7, 'etis-5000', 'Rally Gold', '2023-12', '0', '35000', '1000', '1000', '1000', '1000', '1000', '1000', '1000', '1000', '', '43000'),
(8, 'SCS010', 'mayur sonawne', '', '27', '25000', '1000', '550', '240', '1500', '1000', '1750', '1000', '500', '27270.00', '32540.00'),
(9, 'SCS010', 'mayur sonawne', '2023-11', '25', '25000', '500', '1250', '600', '2000', '1000', '1500', '2500', '1500', '26458.33', '35850.00'),
(10, 'scs100', '27', '2023-12', '28', '10000', '1500', '800', '500', '1500', '1000', '1200', '10000', '1250', '22866.67', '27750.00'),
(11, 'scs450', 'rohit sharma', '2023-10', '23', '10000', '1000', '1500', '1000', '2000', '1200', '1200', '15000', '1200', '22923.33', '34100.00');

-- --------------------------------------------------------

--
-- Table structure for table `leaveform`
--

CREATE TABLE `leaveform` (
  `id` int(5) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `leavetype` varchar(50) NOT NULL,
  `frmdate` date NOT NULL,
  `todate` date NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaveform`
--

INSERT INTO `leaveform` (`id`, `emp_id`, `emp_name`, `leavetype`, `frmdate`, `todate`, `reason`, `status`) VALUES
(27, 'ETIS-3003', 'BHARATI MHASKE', 'Casual Leave', '2023-10-22', '2023-10-28', 'FAMILY FUCNTION', 'Accept'),
(39, 'ETIS-133', 'Sagar Pardeshi', 'Sick Leave', '2023-10-18', '2023-10-23', 'hi', 'Accept'),
(40, 'SCS005', 'Samadhan Gore', 'Sick Leave', '2023-10-18', '2023-10-25', 'i have a feve', 'Accept'),
(41, 'SCS006', 'Rohan kadam', 'Casual Leave', '2023-10-19', '2023-10-20', 'Family Function', 'Accept'),
(43, 'scs500', 'Rahul patil', 'Sick Leave', '2023-10-19', '2023-10-20', 'hospital emergency', 'Accept'),
(57, 'scs500', 'Rahul patil', 'Casual Leave', '2023-10-25', '2023-10-27', 'JJJJJJJJJJJJJJJJJJJJJJJ', 'Accept'),
(59, 'scs450', 'rohit sharma', 'Casual Leave', '2023-10-24', '2023-10-27', 'fffffffffffffffff', 'Accept'),
(62, 'scs500', 'Mr.Rahul patil', 'Sick Leave', '2023-10-31', '2023-11-04', 'mmm\r\n', 'Reject'),
(63, 'scs500', 'Mr.Rahul patil', 'Bereavement Leave', '2023-11-01', '2023-11-02', 'not accept....', 'Accept'),
(64, 'scs500', 'Mr.Rahul patil', 'Sick Leave', '2023-11-02', '2023-11-06', 'plese aprove my leave...', 'Reject'),
(82, 'SCS0013', 'Ashok pawar', 'Sick Leave', '2023-11-08', '2023-11-10', 'Fever', 'Reject'),
(84, 'SCS002', 'Mahesh Gore', 'Casual Leave', '2023-11-08', '2023-11-09', 'Family function', 'Accept'),
(85, 'SCS003', 'pranav sankpal', 'Casual Leave', '2023-11-08', '2023-11-10', 'Family function', 'Reject'),
(87, 'SCS003', 'pranav sankpal', 'Casual Leave', '2023-11-14', '2023-11-23', 'sssssssssssssssssssssssssssss', 'Accept'),
(88, 'SCS003', 'pranav sankpal', 'Sick Leave', '2023-11-27', '2023-11-28', 'hhhhhhhhhhhhhhhhhh', 'Accept'),
(89, 'SCS020', 'Akshay pawar', 'Sick Leave', '2023-11-27', '2024-02-27', 'ddddddddddddddddddddddddddd', 'Accept'),
(90, 'SCS020', 'Akshay pawar', 'Compensatory Off', '2023-11-27', '2023-12-01', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'Accept'),
(91, 'SCS005', 'Samadhan Gore', 'Bereavement Leave', '2024-02-26', '2024-02-28', 'xyz', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `manager_login`
--

CREATE TABLE `manager_login` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager_login`
--

INSERT INTO `manager_login` (`id`, `email`, `password`) VALUES
(1, 'vishal@123', '1234'),
(2, 'SCS002', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` varchar(455) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `emp_id`, `to_id`, `message`, `status`) VALUES
(11, 2, 1, 'How Are you', 0),
(17, 0, 0, 'hello\r\n', 1),
(18, 0, 0, 'hhhhhhhhhhhhhhhhhhhhhh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_project`
--

CREATE TABLE `new_project` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `project_name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `project_manager` varchar(40) NOT NULL,
  `members` varchar(500) NOT NULL,
  `team_size` int(40) NOT NULL,
  `links` varchar(255) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_project`
--

INSERT INTO `new_project` (`id`, `emp_id`, `emp_name`, `project_name`, `description`, `start_date`, `end_date`, `project_manager`, `members`, `team_size`, `links`, `status`) VALUES
(150, 'SCS003', 'pranav sankpal', 'HRM softwere', 'Related manpower manegment', '2023-11-24', '2023-11-30', 'SCS0013', '', 4, '', 'Pending'),
(151, 'SCS003', 'pranav sankpal', 'Meshoo', 'E-commerce Website', '2023-11-24', '2023-12-06', 'SCS002', 'SCS0014-mahi patil, scs100-Mr.Vishal Barage, SCS003-pranav sankpal, SCS006-Rohan kadam', 4, '', 'Pending'),
(153, 'SCS005', 'Samadhan Gore', 'siyasil official web', 'Related manpower manegment', '2023-11-27', '2023-12-07', 'SCS010', 'SCS0014-mahi patil, scs100-Mr.Vishal Barage, SCS003-pranav sankpal, SCS006-Rohan kadam', 4, '', 'Pending'),
(154, 'SCS005', 'Samadhan Gore', 'Meshoo', 'Related manpower manegment', '2023-11-28', '2023-11-29', 'SCS0013', 'scs100-Mr.Vishal Barage', 2, '', ''),
(155, 'SCS0014', 'mahi patil', 'Meshoo', 'Related manpower manegment', '2023-11-27', '2023-11-28', 'SCS002', 'SCS0014-mahi patil, scs100-Mr.Vishal Barage', 2, '', ''),
(157, 'SCS020', 'Akshay pawar', 'Patil mens Ware', 'Daynamic Web', '2023-11-28', '2023-11-28', 'SCS0013', 'SCS020-Akshay pawar, SCS0014-mahi patil, scs100-Mr.Vishal Barage', 3, '', 'Pending'),
(158, 'SCS005', 'Samadhan Gore', 'Patil mens Ware', 'Related manpower manegment', '2023-12-18', '2023-12-27', 'SCS0013', 'SCS020-Akshay pawar, SCS0014-mahi patil, scs100-Mr.Vishal Barage', 3, '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `new_task`
--

CREATE TABLE `new_task` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(40) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `description` varchar(40) NOT NULL,
  `a_task` varchar(40) NOT NULL,
  `project_manager` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `project_member` varchar(40) NOT NULL,
  `upload` varchar(100) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_task`
--

INSERT INTO `new_task` (`id`, `emp_id`, `emp_name`, `project_name`, `description`, `a_task`, `project_manager`, `start_date`, `end_date`, `project_member`, `upload`, `status`) VALUES
(69, 'scs450', 'rohit sharma', 'Sanskrati', 'related to manpower management.......', 'create conctact page', '', '2023-11-02', '2023-11-18', '', ' ../files&img/dhup.webp', 'Pending'),
(70, 'SCS006', 'Rohan kadam', 'banking sector', 'xxxxxxxxxxxxxxxxx', 'home page', '', '2023-11-02', '2023-11-16', '', '../files&img/1 001.jpg', 'Pending'),
(71, 'SCS003', 'pranav sankpal', 'banking sector', 'read more.', 'project and task page', '', '2023-11-08', '2023-11-11', '', '../files&img/skype.jpg', 'Pending'),
(73, 'SCS005', 'Samadhan Gore', 'HRM Softeware', 'read all details', 'project and task page', '', '2023-11-08', '2023-11-16', '', '../files&img/', 'Done'),
(74, 'SCS003', 'pranav sankpal', 'HRM Softeware', 'read all details', 'create home page', '', '2023-11-09', '2023-11-15', '', '../files&img/', 'Done'),
(75, 'SCS003', 'pranav sankpal', 'HRM Softeware', 'read more.', 'project and task page', '', '2023-11-23', '2023-11-23', '', '../files&img/', 'Done'),
(76, 'SCS005', 'Samadhan Gore', 'siyasil official web', 'Daynamic Web', 'Creat home page And Contact Page', '', '2023-11-27', '2023-12-06', '', '../files&img/', 'Pending'),
(77, 'SCS003', 'pranav sankpal', 'Meshoo', 'Related manpower manegment', 'create home page', 'SCS0013', '2023-11-27', '2023-11-30', '', ' ../files&img/', 'Pending'),
(78, 'SCS020', 'Akshay pawar', 'Meshoo', 'read all details', 'create home page', '', '2023-11-27', '2023-11-29', '', '../files&img/', 'Pending'),
(79, 'SCS020', 'Akshay pawar', 'Meshoo', 'Related manpower manegment', 'Creat home page And Contact Page', 'SCS0013', '2023-11-27', '2023-11-30', '', ' ../files&img/', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(30) NOT NULL,
  `emp` varchar(30) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `month` varchar(15) NOT NULL,
  `rating` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `emp`, `dept`, `shift`, `month`, `rating`) VALUES
(18, 'SCS005', 'Software Engineer', 'General Shift', 'July', '6'),
(19, 'SCS009', 'Software Engineer', 'General Shift', 'September', '8'),
(20, 'SCS008', 'Software Engineer', 'General Shift', 'August', '8'),
(21, 'SCS002', 'Software Developer', 'Day Shift', 'August', '7'),
(26, 'SCS001', 'Software Engineer', 'General Shift', 'July', '5'),
(27, 'SCS004', 'Software Engineer', 'General Shift', '10', '6'),
(28, 'SCS008', 'Software Developer', 'Night Shift', '2023-10-07', '5'),
(29, 'SCS003', 'Software Engineer', 'General Shift', '2023-10-07', '4');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE `timesheet` (
  `id` int(5) NOT NULL,
  `link` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id`, `link`, `subject`) VALUES
(3, 'https://forms.gle/w3eEPeZMYp2kCUHV7', 'Attendence Link'),
(15, 'https://forms.gle/usB6W5CGm9w7Smds6 ', 'Hello Everyone,  Kindly fill in the details and submit the form between 6:00 pm to 6:30 pm regularly and also follow the same time for today.  https://forms.gle/usB6W5CGm9w7Smds6  And Monday To Friday (01/11/23 to 30/11/23) follow the same link and time. '),
(16, 'https://forms.gle/usB6W5CGm9w7Smds6', 'meeting'),
(20, 'https://meet.google.com/mbw-uyym-qog', 'join meeting APAS');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `email`, `password`) VALUES
(1, 'SCS010', '1234'),
(2, 'sc123@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_birthday`
--
ALTER TABLE `add_birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_employe`
--
ALTER TABLE `add_employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_holiday`
--
ALTER TABLE `add_holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_query`
--
ALTER TABLE `add_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_quote`
--
ALTER TABLE `add_quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attend_form`
--
ALTER TABLE `attend_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_table`
--
ALTER TABLE `db_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_activity`
--
ALTER TABLE `emp_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_docs`
--
ALTER TABLE `emp_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_notice`
--
ALTER TABLE `emp_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_rating`
--
ALTER TABLE `emp_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaveform`
--
ALTER TABLE `leaveform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager_login`
--
ALTER TABLE `manager_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_project`
--
ALTER TABLE `new_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_task`
--
ALTER TABLE `new_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `add_birthday`
--
ALTER TABLE `add_birthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `add_employe`
--
ALTER TABLE `add_employe`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `add_holiday`
--
ALTER TABLE `add_holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `add_query`
--
ALTER TABLE `add_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `add_quote`
--
ALTER TABLE `add_quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attend_form`
--
ALTER TABLE `attend_form`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `db_table`
--
ALTER TABLE `db_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `emp_activity`
--
ALTER TABLE `emp_activity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `emp_docs`
--
ALTER TABLE `emp_docs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `emp_notice`
--
ALTER TABLE `emp_notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `emp_rating`
--
ALTER TABLE `emp_rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leaveform`
--
ALTER TABLE `leaveform`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `manager_login`
--
ALTER TABLE `manager_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `new_project`
--
ALTER TABLE `new_project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `new_task`
--
ALTER TABLE `new_task`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
