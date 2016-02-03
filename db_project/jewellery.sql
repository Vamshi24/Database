-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2014 at 08:01 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jewellery`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `pincode` mediumint(15) NOT NULL,
  `street` varchar(30) NOT NULL,
  `house_no` varchar(20) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'akhil', '1234'),
(2, 'vamshi', '1234'),
(3, 'cashier', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE IF NOT EXISTS `cashier` (
  `employee_id` int(11) NOT NULL,
  `houseno` varchar(20) NOT NULL,
  `pincode` mediumint(15) NOT NULL,
  KEY `employee_id` (`employee_id`),
  KEY `employee_id_2` (`employee_id`),
  KEY `employee_id_3` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `houseno` varchar(20) NOT NULL,
  `pincode` mediumint(15) NOT NULL,
  `DOB` date NOT NULL,
  `age` int(3) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `houseno`, `pincode`, `DOB`, `age`, `phone_no`) VALUES
(1, 'vamshi', '222', 509216, '1996-04-08', 19, '9949002424');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `houseno` varchar(20) NOT NULL,
  `pincode` mediumint(15) NOT NULL,
  `salary` mediumint(9) NOT NULL,
  `DOB` date NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `phone_no`, `houseno`, `pincode`, `salary`, `DOB`, `age`) VALUES
(17, 'vamshi', '9949002424', '222', 509216, 123456, '1996-04-08', 19);

-- --------------------------------------------------------

--
-- Table structure for table `existing_products`
--

CREATE TABLE IF NOT EXISTS `existing_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `style` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gold_smith`
--

CREATE TABLE IF NOT EXISTS `gold_smith` (
  `employee_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` enum('green','red') NOT NULL,
  KEY `employee_id` (`employee_id`),
  KEY `order_id` (`order_id`),
  KEY `employee_id_2` (`employee_id`),
  KEY `order_id_2` (`order_id`),
  KEY `employee_id_3` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Jewellery_Shop`
--

CREATE TABLE IF NOT EXISTS `Jewellery_Shop` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(20) NOT NULL,
  `houseno` varchar(20) NOT NULL,
  `pincode` mediumint(20) NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `technical_name` varchar(50) NOT NULL,
  `composition` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `status` enum('green','red') NOT NULL,
  `deliverystatus` enum('green','red') NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  KEY `customer_id_2` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `cashier_id` int(11) NOT NULL,
  `payment_status` enum('green','red') NOT NULL,
  `amount_given` mediumint(9) NOT NULL,
  `change_returned` smallint(6) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `cashier_id` (`cashier_id`),
  KEY `cashier_id_2` (`cashier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE IF NOT EXISTS `raw_materials` (
  `category_id` int(11) NOT NULL,
  `quantity_used` varchar(50) NOT NULL,
  `composition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `cashier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `cashier_id` (`cashier_id`),
  KEY `customer_id` (`customer_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE IF NOT EXISTS `security` (
  `employee_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `timings` varchar(50) NOT NULL,
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` enum('green','red') NOT NULL,
  `amount_paid` bigint(20) NOT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashier`
--
ALTER TABLE `cashier`
  ADD CONSTRAINT `cashier_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `cashier` (`employee_id`);

--
-- Constraints for table `gold_smith`
--
ALTER TABLE `gold_smith`
  ADD CONSTRAINT `gold_smith_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `gold_smith_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`cashier_id`) REFERENCES `cashier` (`employee_id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`cashier_id`) REFERENCES `cashier` (`employee_id`),
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);

--
-- Constraints for table `security`
--
ALTER TABLE `security`
  ADD CONSTRAINT `security_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
