-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2014 at 04:44 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `we`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `password`, `email`, `contact`, `dob`, `address`) VALUES
(2, 'Aakash Goplani', '1234', 'goplaniaakash14@gmail.com', 8600223633, '1993-11-14', 'Ulhasnagar-1'),
(3, 'Mohit Gurbani', 'abcd', 'nickeycaliber@gmail.com', 9096333263, '1993-11-18', 'Kalyan'),
(4, 'Mohit Goplani', 'mohit', 'mohitgoplani9@gmail.com', 7875477430, '1997-09-02', 'Ulhasnagar-2'),
(10, 'Yugal K', '789', 'ybk@gmail.com', 1234567898, '2012-12-12', 'Mulund'),
(12, 'Raju G', '789', 'as@g.com', 1234567898, '1778-11-11', 'mnbvcxz'),
(13, 'Bhawna Goplani', '0000000000', 'a@g.c', 789654123, '1212-12-12', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `fourwheel`
--

CREATE TABLE IF NOT EXISTS `fourwheel` (
  `modelNo` varchar(20) NOT NULL,
  `c_id` int(11) NOT NULL,
  `gearType` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` bigint(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`modelNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fourwheel`
--

INSERT INTO `fourwheel` (`modelNo`, `c_id`, `gearType`, `name`, `price`, `color`) VALUES
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
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`s_id`, `c_id`, `name`, `city`, `contact`) VALUES
(1604, 2, 'Pankaj Badgujar', 'Kalyan', 1234567890),
(1624, 2, 'Darshan Gerra', 'Ulhasnagar-5', 8007139783),
(1629, 3, 'Navin Aswani', 'Ulhasnagar-1', 9765352696);

-- --------------------------------------------------------

--
-- Table structure for table `twowheel`
--

CREATE TABLE IF NOT EXISTS `twowheel` (
  `modelNo` varchar(20) NOT NULL,
  `c_id` int(11) NOT NULL,
  `gearType` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` bigint(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`modelNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `twowheel`
--

INSERT INTO `twowheel` (`modelNo`, `c_id`, `gearType`, `name`, `price`, `color`) VALUES
('1581K', 2, 'automatic', 'Honda Activa', 60000, 'black'),
('DTSi-150', 3, '5-speed', 'Bajaj Pulsar', 90000, 'red');
