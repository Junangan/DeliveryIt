-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 07:21 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deliveryit`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `FavouriteID` int(255) NOT NULL,
  `FoodOrDrinkName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`FavouriteID`, `FoodOrDrinkName`) VALUES
(29, 'Chicken'),
(30, 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `foodanddrink`
--

CREATE TABLE `foodanddrink` (
  `FoodId` int(255) NOT NULL,
  `FoodOrDrinkName` text NOT NULL,
  `Price` double(10,2) NOT NULL,
  `RestaurantId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodanddrink`
--

INSERT INTO `foodanddrink` (`FoodId`, `FoodOrDrinkName`, `Price`, `RestaurantId`) VALUES
(28, 'Chicken', 5.00, 19),
(29, 'Milo', 1.00, 19),
(30, 'Spaghetti', 20.00, 20),
(31, 'Pizza', 20.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Fullname` text NOT NULL,
  `Email` text NOT NULL,
  `Phone` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Username`, `Password`, `Fullname`, `Email`, `Phone`) VALUES
('Grace', 'grace', 'Grace Fong Ching Lin', 'gracefongcl@gmail.com', 132091628),
('Evelyn', 'evelyn', '', '', 0),
('Lucille', 'lucille', '', '', 0),
('Fong Keng Lun', 'fkl', '', '', 0),
('Murphy', 'murphy', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestaurantId` int(255) NOT NULL,
  `RestaurantName` text NOT NULL,
  `ratingNumber` int(255) NOT NULL,
  `star` int(255) NOT NULL,
  `Image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestaurantId`, `RestaurantName`, `ratingNumber`, `star`, `Image`) VALUES
(19, 'KFC', 0, 0, 0x6b66632e706e67),
(20, 'Pizza Hut', 0, 0, 0x70697a7a616875742e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Fullname` text NOT NULL,
  `Email` text NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Fullname`, `Email`, `Phone`) VALUES
('Grace', 'grace', 'Grace Fong Ching Lin', 'gracefongcl@gmail.com', 132091628),
('Evelyn', 'evelyn', 'Evelyn Fong Ching Har', 'evelynfong@hotmail.com', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `OrderId` int(255) NOT NULL,
  `RestaurantName` text NOT NULL,
  `FoodName` text NOT NULL,
  `FoodNumber` int(255) NOT NULL,
  `TotalPrice` double(10,2) NOT NULL,
  `Status` text NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`OrderId`, `RestaurantName`, `FoodName`, `FoodNumber`, `TotalPrice`, `Status`, `user`) VALUES
(14, 'KFC', 'Chicken', 1, 5.00, 'pending', 'Grace'),
(15, 'Pizza Hut', 'Pizza', 1, 20.00, 'pending', 'Grace');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`FavouriteID`);

--
-- Indexes for table `foodanddrink`
--
ALTER TABLE `foodanddrink`
  ADD PRIMARY KEY (`FoodId`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestaurantId`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`OrderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `FavouriteID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `foodanddrink`
--
ALTER TABLE `foodanddrink`
  MODIFY `FoodId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestaurantId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `OrderId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
