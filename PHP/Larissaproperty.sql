-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 12:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyid`, `address1`, `town`, `county`, `price`, `bedrooms`, `shortdescription`, `longdescription`, `image`, `categoryid`, `vendor_email`) VALUES
(1, '32 Street, Dublin', 'Dublin', 'Dublin1', 240000, 3, 'For Sale.\r\n3 Bed . 2 Bath . House', 'Step into a delightful terraced house offering a comfortable and inviting living space. With a well-designed layout, this charming property features a cozy living area, a modern kitchen, and bright bedrooms, creating a warm and welcoming atmosphere. Its convenient location ensures easy access to a range of amenities, including shops, schools, and parks, making it an ideal choice for families seeking a vibrant community.', 'images/house.png', 1, 'john@gordons.com'),
(2, 'Church Lane', 'Dublin', 'Dublin 11', 1500000, 0, '0.56 ac - Development Land', 'Sale Type: For Sale by Private Treaty\r\nOverall Floor Area: 0.56 ac\r\nThe property comprises 4 industrial units, extending to c. 15,230 sq. ft. (c. 1,415 sq. m.) on a site of c. 0.564 acres with offices in the units.\r\nStreet parking is provided in the yard to the front of the warehouses. ', 'images/site.jpg', 3, 'paddy@hotmail.com'),
(5, '33 Street, Dublin', 'Dublin', 'Dublin 2', 250000, 3, 'For Sale.\r\n3 Bed . 2 Bath . House', 'Step into a delightful terraced house offering a comfortable and inviting living space. With a well-designed layout, this charming property features a cozy living area, a modern kitchen, and bright bedrooms, creating a warm and welcoming atmosphere. Its convenient location ensures easy access to a range of amenities, including shops, schools, and parks, making it an ideal choice for families seeking a vibrant community.', 'images/house2.jpg', 1, 'paddy@hotmail.com'),
(6, '34 Street, Dublin', 'Dublin', 'Dublin 3', 255000, 3, 'For Sale.\r\n3 Bed . 2 Bath . House', 'Step into a delightful terraced house offering a comfortable and inviting living space. With a well-designed layout, this charming property features a cozy living area, a modern kitchen, and bright bedrooms, creating a warm and welcoming atmosphere. Its convenient location ensures easy access to a range of amenities, including shops, schools, and parks, making it an ideal choice for families seeking a vibrant community.', 'images/house3.jpg', 1, 'john@gordons.com'),
(7, '35 Street, Dublin', 'Dublin', 'Dublin 4', 259000, 2, 'For Sale.\r\n2 Bed . 2 Bath . House', 'Step into a delightful terraced house offering a comfortable and inviting living space. With a well-designed layout, this charming property features a cozy living area, a modern kitchen, and bright bedrooms, creating a warm and welcoming atmosphere. Its convenient location ensures easy access to a range of amenities, including shops, schools, and parks, making it an ideal choice for families seeking a vibrant community.', 'images/house4.jpg', 1, 'paddy@hotmail.com'),
(9, '6000 Dorset Street Upper', 'Dublin', 'Dublin 22', 850000, 0, 'Sale - Commercial\r\n2500 sq. ft. Investment Property\r\nNo tenants', 'Discover a remarkable commercial property in a prime location, offering great investment or business potential. With its spacious interior and versatile layout, it\'s ideal for various business ventures. Whether you\'re planning a retail store, office space, or a vibrant restaurant, this property provides an exciting opportunity to thrive in a bustling business district.', 'images/commercial.jpg', 2, 'paddy@hotmail.com'),
(10, '6001 Dorset Street Upper', 'Dublin', 'Dublin 18', 850000, 0, 'Sale - Commercial\r\n2700 sq. ft. Investment Property\r\nNo tenants', 'Discover a remarkable commercial property in a prime location, offering great investment or business potential. With its spacious interior and versatile layout, it\'s ideal for various business ventures. Whether you\'re planning a retail store, office space, or a vibrant restaurant, this property provides an exciting opportunity to thrive in a bustling business district.', 'images/commercial4.jpg', 2, 'paddy@hotmail.com'),
(11, '6002 Dorset Street Upper', 'Dublin', 'Dublin 15', 935000, 0, 'Sale - Commercial\r\n2700 sq. ft. Investment Property\r\nNo tenants', 'Discover a remarkable commercial property in a prime location, offering great investment or business potential. With its spacious interior and versatile layout, it\'s ideal for various business ventures. Whether you\'re planning a retail store, office space, or a vibrant restaurant, this property provides an exciting opportunity to thrive in a bustling business district.', 'images/commercial3.jpg', 2, 'john@gordons.com'),
(16, 'Church Lane', 'Dublin', 'Dublin 11', 1500000, 0, '0.58 ac - Development Land', 'Sale Type: For Sale by Private Treaty\r\nOverall Floor Area: 0.58 ac\r\nThe property comprises 4 industrial units, extending to c. 15,200 sq. ft. (c. 1,415 sq. m.) on a site of c. 0.564 acres with offices in the units.\r\nStreet parking is provided in the yard to the front of the warehouses. ', 'images/site1.jpg', 3, 'paddy@hotmail.com'),
(17, 'Lane', 'Dublin', 'Dublin 12', 1600000, 0, '0.50 ac - Development Land', 'Sale Type: For Sale by Private Treaty\r\nOverall Floor Area: 0.50 ac\r\nThe property comprises 4 industrial units, extending to c. 15,700 sq. ft. (c. 1,415 sq. m.) on a site of c. 0.564 acres with offices in the units.\r\nStreet parking is provided in the yard to the front of the warehouses. ', 'images/site2.jpg', 3, 'john@gordons.com'),
(18, 'Church Street', 'Dublin', 'Dublin 10', 1400000, 0, '0.53 ac - Development Land', 'Sale Type: For Sale by Private Treaty\r\nOverall Floor Area: 0.53 ac\r\nThe property comprises 4 industrial units, extending to c. 15,200 sq. ft. (c. 1,415 sq. m.) on a site of c. 0.564 acres with offices in the units.\r\nStreet parking is provided in the yard to the front of the warehouses. ', 'images/site3.jpg', 3, 'paddy@hotmail.com'),
(19, '30 Street, Dublin', 'Dublin', 'Dublin1', 290000, 3, 'For Sale.\r\n3 Bed . 2 Bath . House', 'Step into a delightful terraced house offering a comfortable and inviting living space. With a well-designed layout, this charming property features a cozy living area, a modern kitchen, and bright bedrooms, creating a warm and welcoming atmosphere. Its convenient location ensures easy access to a range of amenities, including shops, schools, and parks, making it an ideal choice for families seeking a vibrant community.', 'images/house5.jpg', 1, 'john@gordons.com'),
(20, '9000 Dorset Street Upper', 'Dublin', 'Dublin 12', 870000, 0, 'Sale - Commercial\r\n2500 sq. ft. Investment Property\r\nNo tenants', 'Discover a remarkable commercial property in a prime location, offering great investment or business potential. With its spacious interior and versatile layout, it\'s ideal for various business ventures. Whether you\'re planning a retail store, office space, or a vibrant restaurant, this property provides an exciting opportunity to thrive in a bustling business district.', 'images/commercial2.jpg', 2, 'paddy@hotmail.com'),
(22, 'test 1', 'Dublin', '', 1900000, 0, 'test 1', 'adsadas', 'images/house.png', 0, 'aaaaaa@hotmail.com'),
(23, 'test 2', 'Dublin', '', 2, 0, 'test 2', 'asdfasdf', 'images/house.png', 1, 'aaaaaa@hotmail.com'),
(25, 'test 3', 'Dublin', 'Dublin 15', 6, 2, 'test 3', 'test 3', 'images/house.png', 1, 'aaaaaa@hotmail.com'),
(29, 'test 4', 'Galway', 'Galway', 4, 2, 'test 4', 'asas', 'images/commercial.jpg', 2, 'aaaaaa@hotmail.com'),
(30, 'test 5', 'Galway', '', 5, 2, 'Galway test5', 'fdgdfg', 'images/commercial.jpg', 2, 'aaaaaa@hotmail.com'),
(31, 'Test 6', 'Galway', 'du', 1900001, 1, 'Test 6', 'Test 6', 'images/house.png', 1, 'aaaaaa@hotmail.com'),
(33, 'test 1 site', 'Dublin', 'Dublin 11', 1500000, 0, '0.56 ac - Development Land', 'Sale Type: For Sale by Private Treaty\r\nOverall Floor Area: 0.56 ac\r\nThe property comprises 4 industrial units, extending to c. 15,230 sq. ft. (c. 1,415 sq. m.) on a site of c. 0.564 acres with offices in the units.\r\nStreet parking is provided in the yard to the front of the warehouses. ', 'images/site.jpg', 3, 'paddy@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propertyid`),
  ADD KEY `vendor_email` (`vendor_email`),
  ADD KEY `categoryid` (`categoryid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propertyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
