-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 03:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_email`, `password`, `firstname`, `surname`) VALUES
('admin@lyit.ie', 'password', 'joe', 'bloggs');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`) VALUES
(1, 'Residential'),
(2, 'Commercial'),
(3, 'Sites');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','planned') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `title`, `content`, `author_name`, `author_email`, `created_at`, `status`) VALUES
(1, 'test', 'test', 'test', 'test@test', '2017-02-14 16:33:28', 'planned'),
(10, 'This is a test', 'This is a test', 'testing', 'test@hotmail.com', '2017-02-14 19:23:40', 'planned'),
(21, 'hi', 'hello there', 'evelyn', 'evelyn@test.com', '2017-02-16 13:40:51', 'pending'),
(23, 'Great service!', 'Thanks for all your help! It made getting my foot on the property ladder much easier.', 'Joe', 'joe@hotmail.com', '2017-02-19 10:37:23', 'pending'),
(24, 'Love this Site', 'Great company. Customer service second to none!', 'Les', 'Les@lse.uk', '2017-02-19 11:30:00', 'planned');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propertyid` int(11) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `bedrooms` int(2) DEFAULT NULL,
  `shortdescription` text NOT NULL,
  `longdescription` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `vendor_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyid`, `address1`, `town`, `county`, `price`, `bedrooms`, `shortdescription`, `longdescription`, `image`, `categoryid`, `vendor_email`) VALUES
(1, '32 Erne Heights', 'Letterkenny', 'Donegal', 139000, 3, 'Well-maintained family home. Has to be viewed.', 'This three-bedroomed property sits on an elevated site in a quiet cul-de-sac. The open plan kitchen diner boasts a fully-fitted high-shine kitchen with top quality appliances. The sitting room has a wood-burning stove and marble fireplace.......\r\n\r\nmore information can go in here about the number of bathrooms, size of rooms, etc etc', 'images/31erneheights.png', 2, 'john@gordons.com'),
(2, 'Cloghan', 'Donegal', 'Donegal', 10000, 0, 'site', 'this site is elevated.....', 'images/site.jpg', 3, 'paddy@hotmail.com'),
(3, 'Any street', 'mytown', 'donegal', 200000, 2, 'ajsfakjfakakhgadg', 'sdgsjghsdjghsdjghsjghsghsgsgsgsg', 'images/test.jpg', 1, 'john@gordons.com'),
(4, 'test', 'test', 'test', 500000, 1, 'test', 'test', 'images/test.jpg', 1, 'paddy@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_email` varchar(30) NOT NULL,
  `vendor_firstname` varchar(20) NOT NULL,
  `vendor_surname` varchar(20) NOT NULL,
  `vendor_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_email`, `vendor_firstname`, `vendor_surname`, `vendor_phone`) VALUES
('john@gordons.com', 'John', 'Daly', '0874463453'),
('paddy@hotmail.com', 'Paddy', 'Brady', '0863456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propertyid`),
  ADD KEY `vendor_email` (`vendor_email`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propertyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`vendor_email`) REFERENCES `vendor` (`vendor_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
