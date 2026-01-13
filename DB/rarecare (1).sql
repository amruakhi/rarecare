-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2024 at 10:41 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rarecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `amounts`
--

CREATE TABLE IF NOT EXISTS `amounts` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `did` int(5) NOT NULL,
  `user` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `amounts`
--

INSERT INTO `amounts` (`id`, `did`, `user`, `name`, `amount`) VALUES
(2, 2, 'neraj@gmail.com', 'neraj', 4000),
(5, 2, 'neraj@gmail.com', 'neraj', 2000),
(6, 2, 'neraj@gmail.com', 'dsm  nm', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `patient` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` varchar(10) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `hsptl` varchar(30) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient`, `date`, `time`, `dept`, `hsptl`, `doctor`, `status`) VALUES
(20, 'athul@gmail.com', '2024-07-15', '05:00', 'Dermatology', 'anandhu@gmail.com', 'indra@gmail.com', 1),
(21, 'athul@gmail.com', '2024-07-14', '15:34', 'Orthology', 'nikhil@gmail.com', 'rakesh@gmail.com', 0),
(22, 'rose@gmail.com', '2024-07-17', '05:56', 'Dermatology', 'anandhu@gmail.com', 'indra@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `senderid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(200) NOT NULL,
  `label` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `senderid`, `name`, `email`, `message`, `label`, `status`) VALUES
(7, 15, 'Neraj Lal', 'anandhu@gmail.com', 'Good quality glasses', 'positive', 1),
(8, 10, 'test', 'neraj@gmail.com', 'Product is not good', 'positive', 1),
(10, 16, 'Neraj Lal', 'neraj@gmail.com', 'bad Quality', 'negative', 1),
(11, 10, 'Neraj Lal', 'neraj@gmail.com', 'waste of money', 'negative', 1),
(12, 15, 'Check', 'anandhu@gmail.com', 'nice one', 'positive', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `loginid` int(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL DEFAULT 'nil',
  `address` varchar(300) NOT NULL,
  `phno` bigint(50) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `loginid` (`loginid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `loginid`, `name`, `email`, `city`, `address`, `phno`) VALUES
(9, 10, 'Neraj Lal', 'neraj@gmail.com', 'nil', 'lal bhavan mukkoodu p.o mulavana', 8547470675),
(10, 32, 'Athul', 'athul@gmail.com', 'nil', 'athul bhavan Mukkoodu p.o Mulavana', 8765456888),
(11, 35, 'Rose', 'rose@gmail.com', 'nil', 'rose bhavan mukkoodu p.o mulavana', 8765456000),
(20, 15, 'LMS Hospital', 'anandhu@gmail.com', 'nil', 'Anandhu Nivas', 8765456888),
(21, 39, 'Meditrina Hospital', 'syam@gmail.com', 'nil', 'syam bhavan Mukkoodu p.o Mulavana', 6549873215),
(22, 40, 'Medicity Hospital', 'nikhil@gmail.com', 'nil', 'NIkhil Bhavan', 7885126984);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `dated` varchar(20) NOT NULL,
  `status` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `name`, `mail`, `doctor`, `disease`, `stage`, `amount`, `dated`, `status`) VALUES
(2, 'Athul', 'athul@gmail.com', 'anandhu@gmail.com', 'Cancer', '2', 35000, '07/07/2024', 1),
(3, 'Rose', 'rose@gmail.com', 'anandhu@gmail.com', 'Heart Dicease', '1', 20000, '07/07/2024', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dreg`
--

CREATE TABLE IF NOT EXISTS `dreg` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(20) NOT NULL,
  `spec` varchar(20) NOT NULL,
  `hospital` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dreg`
--

INSERT INTO `dreg` (`cid`, `name`, `email`, `address`, `spec`, `hospital`) VALUES
(4, 'Indrajith', 'indra@gmail.com', 'Indra Nivas', 'Dermatology', 'anandhu@gmail.com'),
(8, 'Jack', 'jack@gmail.com', 'Jack home', 'Dermatology', 'syam@gmail.com'),
(9, 'Rakesh', 'rakesh@gmail.com', 'Rakesh NIvas', 'Orthology', 'nikhil@gmail.com'),
(10, 'Deva', 'deva@gmail.com', 'Deva Nivas', 'pediatritian', 'nikhil@gmail.com'),
(11, 'Sujin', 'sujin@gmail.com', 'Sujin NIvas', 'Therapist', 'anandhu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `p_id` int(5) NOT NULL,
  `feed` varchar(25) NOT NULL,
  `label` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `p_id`, `feed`, `label`) VALUES
(1, 32, 'good', 'positive'),
(2, 32, 'bad', 'negative'),
(3, 31, 'bad one', 'negative'),
(4, 33, 'good one', 'positive'),
(5, 33, 'good for use', 'positive'),
(6, 33, 'bad for using', 'negative'),
(7, 33, 'great good one', 'positive');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `city` varchar(25) NOT NULL,
  `institution_type` varchar(20) NOT NULL,
  `institution_name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `pic` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `city`, `institution_type`, `institution_name`, `username`, `phone`, `pic`) VALUES
(11, 'kollam', 'Hospital', 'LMS', 'hospital@gmail.com', 91854747067, 'pic/hos.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `lid` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  `user` varchar(30) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `email`, `password`, `status`, `user`) VALUES
(10, 'neraj@gmail.com', 'Neraj123@', 1, 'user'),
(2, 'admin@gmail.com', 'Admin123@', 3, 'admin'),
(15, 'anandhu@gmail.com', 'Anandhu123@', 1, 'hospital'),
(32, 'athul@gmail.com', 'Athul123@', 1, 'patient'),
(35, 'rose@gmail.com', 'Rose123@', 1, 'patient'),
(40, 'nikhil@gmail.com', 'Nikhil123@', 1, 'hospital'),
(39, 'syam@gmail.com', 'Syam123@', 1, 'hospital');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `author` varchar(10) NOT NULL DEFAULT 'Admin',
  `senderid` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`author`, `senderid`, `message`) VALUES
('Admin', 'hospital@gmail.com', 'working'),
('Admin', 'anandhu@gmail.com', 'ðŸ‘ ok'),
('Admin', 'hospital@gmail.com', 'jnjk'),
('Admin', 'anandhu@gmail.com', 'good'),
('Admin', 'neraj@gmail.com', 'hoo');
