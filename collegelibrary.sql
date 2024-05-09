-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2019 at 02:14 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegelibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `contact`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '9998887776');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `title` varchar(50) NOT NULL,
  `author` varchar(40) NOT NULL,
  `category` varchar(20) NOT NULL,
  `serial` varchar(10) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `issueable` varchar(5) NOT NULL,
  `publyear` varchar(10) NOT NULL,
  `edition` varchar(10) NOT NULL,
  `volume` varchar(10) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`title`, `author`, `category`, `serial`, `isbn`, `price`, `issueable`, `publyear`, `edition`, `volume`) VALUES
('C++', 'E.Balagurusamy', 'computer science', '1', '123abc', 1999, 'yes', '2010', 'first', 'ii'),
('Java Primer', 'E.Balagurusamy', 'computer science', '2', '456def', 499, 'no', '2010', 'first', 'i'),
('Computer organization and its architecture', 'Sumita Arora', 'computer science', '3', '123ijh', 399, 'no', '2018', 'third', 'i'),
('Let us C', 'Yashawant Kanetkar', 'computer science', '4', '123abg', 750, 'no', '2012', 'second', 'ii'),
('General Mathematices', 'R.D Sharma', 'Mathematices', 'abc123', '202020', 500, 'yes', '2017', 'first', '2');

-- --------------------------------------------------------

--
-- Table structure for table `books_issued`
--

DROP TABLE IF EXISTS `books_issued`;
CREATE TABLE IF NOT EXISTS `books_issued` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `student` varchar(30) NOT NULL,
  `book` varchar(10) NOT NULL,
  `issue_date` date NOT NULL,
  `renew_date` date NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`serial`),
  UNIQUE KEY `book` (`book`) USING BTREE,
  KEY `student` (`student`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_issued`
--

INSERT INTO `books_issued` (`serial`, `student`, `book`, `issue_date`, `renew_date`, `return_date`) VALUES
(1, '1234', '2', '2019-07-09', '2019-07-23', '2019-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `mname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `address` varchar(70) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `mname`, `lname`, `address`, `contact`, `email_id`, `password`) VALUES
(16, 'Donald', '', 'Mahanta', 'Kaliabor college boys hostel, kuwaritol., Kuwaritol Tiniali', '08136028282', 'admin@gmail.com', 'admin'),
(17, 'Donald', '', 'Mahanta', 'Kaliabor college boys hostel, kuwaritol., Kuwaritol Tiniali', '08136028282', 'donald@gmail.com', 'donald'),
(18, 'Donald', 'ooo', 'Mahanta', 'Kaliabor college boys hostel, kuwaritol., Kuwaritol Tiniali', '08136028282', 'example@gmail.com', 'example');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `c_type` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `status`, `name`, `address`, `student_id`, `roll_no`, `c_type`, `course`, `semester`, `gender`, `email_id`, `phone`, `password`) VALUES
(1, 'waiting', 'Donald', '', '1234', '4', '', '', '', '', '', '7896123456', 'donald'),
(2, 'waiting', 'Ananta Nayak', 'Kaliabor college boys hostel, kuwaritol.', '456', '2', '1', 'BCA', '5', '1', 'ananta@gmail.com', '9898776332', 'ananta');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_issued`
--
ALTER TABLE `books_issued`
  ADD CONSTRAINT `books_issued_ibfk_2` FOREIGN KEY (`book`) REFERENCES `book` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_issued_ibfk_3` FOREIGN KEY (`student`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
