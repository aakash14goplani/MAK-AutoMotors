-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2014 at 04:43 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `c_contact` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `password`, `email`, `c_contact`, `dob`, `address`) VALUES
(2, 'Aakash Goplani', '1234', 'goplaniaakash14@gmail.com', 8600223633, '1993-11-14', 'Ulhasnagar'),
(3, 'Mohit Gurbani', 'abcd', 'nickeycaliber@gmail.com', 9096333263, '1993-11-18', 'Kalyan'),
(4, 'Mohit Goplani', 'mohit', 'mohitgoplani9@gmail.com', 7875477430, '1997-09-02', 'Ulhasnagar-2'),
(5, 'Kashish Kukreja', '456', 'kashish.kukreja@ymail.com', 9969543210, '1993-12-22', 'Mulund'),
(7, 'Mukesh Goplani', 'mukesh', 'muk@gmail.com', 9503885805, '1993-11-15', 'Siru Chowk'),
(8, 'Dharamdas Goplani', 'dharamdas', 'goplaniaakash14@gmail.com', 950532145, '1943-01-01', 'Ulhasnagar');

-- --------------------------------------------------------

--
-- Table structure for table `fourwheel`
--

CREATE TABLE IF NOT EXISTS `fourwheel` (
  `f_modelNo` varchar(20) NOT NULL,
  `c_id` int(11) NOT NULL,
  `f_gearType` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_price` bigint(20) NOT NULL,
  `f_color` varchar(20) NOT NULL,
  PRIMARY KEY (`f_modelNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fourwheel`
--

INSERT INTO `fourwheel` (`f_modelNo`, `c_id`, `f_gearType`, `f_name`, `f_price`, `f_color`) VALUES
('595lts', 2, '6+speed', 'Toyota Etios G+', 600000, 'white'),
('S350', 3, '9+speed', 'Mercedes Benz', 3500000, 'gray');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `c_id` int(11) NOT NULL,
  `paytype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`c_id`, `paytype`) VALUES
(2, 'cheque'),
(3, 'loan');

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE IF NOT EXISTS `salesperson` (
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `target` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`s_id`, `c_id`, `name`, `city`, `contact`, `target`, `sales`) VALUES
(1604, 2, 'Pankaj Badgujar', 'Kalyan', 1234567890, 1234, 1234),
(1605, 3, 'Navin Aswani', 'Ulhasnagar-1', 9765352696, 5000, 5500),
(1624, 2, 'Darshan Gerra', 'Ulhasnagar-5', 8007139783, 7000, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `twowheel`
--

CREATE TABLE IF NOT EXISTS `twowheel` (
  `t_modelNo` varchar(20) NOT NULL,
  `c_id` int(11) NOT NULL,
  `t_gearType` varchar(50) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_price` bigint(20) NOT NULL,
  `t_color` varchar(20) NOT NULL,
  PRIMARY KEY (`t_modelNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `twowheel`
--

INSERT INTO `twowheel` (`t_modelNo`, `c_id`, `t_gearType`, `t_name`, `t_price`, `t_color`) VALUES
('1581K', 2, 'automatic', 'Honda Activa', 60000, 'black'),
('DTSi-150', 3, '5-speed', 'Bajaj Pulsar', 90000, 'red');
