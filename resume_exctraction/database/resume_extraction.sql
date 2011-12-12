-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2011 at 04:49 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resume_extraction`
--

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `college` varchar(20) NOT NULL,
  `college_dates` varchar(20) NOT NULL,
  `awards` varchar(1000) NOT NULL,
  `skills` varchar(1000) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`uid`, `rid`, `last_name`, `first_name`, `address`, `city`, `state`, `zip`, `phone`, `email`, `degree`, `college`, `college_dates`, `awards`, `skills`) VALUES
(1, 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 2, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 3, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 4, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 5, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 6, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 7, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 8, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 9, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 10, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 11, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 12, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 13, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 14, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 15, 'Â«Last_nameÂ»', 'Â«First_nameÂ»', '', '', '', '', '', '', '', '', '', '', ''),
(1, 16, 'Â«Last_nameÂ»', 'Â«First_nameÂ»', 'Â«street_addressÂ»', ' Â«CityÂ»', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `mail` varchar(200) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `pass`, `mail`) VALUES
(1, 'admin', '63a9f0ea7bb98050796b649e85481845', 'rahul_simhadri@yahoo.co.in');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
