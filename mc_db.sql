-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 07:46 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customerdetails`
--

CREATE TABLE `tbl_customerdetails` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `Customer_Type` varchar(255) NOT NULL,
  `Date_Of_Birth` varchar(255) NOT NULL,
  `Date_Incorp` varchar(255) NOT NULL,
  `Address_Line1` varchar(255) NOT NULL,
  `Address_Line2` varchar(255) NOT NULL,
  `Town_City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Contact_Name` varchar(255) NOT NULL,
  `Contact_Number` varchar(255) NOT NULL,
  `Num_Shares` varchar(255) NOT NULL,
  `Share_Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customerdetails`
--
ALTER TABLE `tbl_customerdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customerdetails`
--
ALTER TABLE `tbl_customerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
