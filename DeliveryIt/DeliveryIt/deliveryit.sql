-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 10:36 AM
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
(36, 'Chicken'),
(38, 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `foodanddrink`
--

CREATE TABLE `foodanddrink` (
  `FoodId` int(255) NOT NULL,
  `FoodOrDrinkName` text NOT NULL,
  `Price` double(10,2) NOT NULL,
  `FoodOrDrinkImage` blob NOT NULL,
  `RestaurantId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodanddrink`
--

INSERT INTO `foodanddrink` (`FoodId`, `FoodOrDrinkName`, `Price`, `FoodOrDrinkImage`, `RestaurantId`) VALUES
(81, 'Milo', 1.00, 0x6b66632e706e67, 37),
(82, 'Chicken', 1.00, 0x6b66632e706e67, 37),
(83, 'Pizza', 1.00, 0x70697a7a616875742e706e67, 38);

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
('Murphy', 'murphy', '', '', 0),
('Felix', 'felix', '', '', 0),
('Fong Ching Lin', 'fcl', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestaurantId` int(255) NOT NULL,
  `RestaurantName` text NOT NULL,
  `ratingNumber` int(255) NOT NULL,
  `star` int(255) NOT NULL,
  `RestaurantImage` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestaurantId`, `RestaurantName`, `ratingNumber`, `star`, `RestaurantImage`) VALUES
(37, 'KFC', 0, 0, 0x6b66632e706e67),
(38, 'Pizza Hut', 0, 0, 0x70697a7a616875742e706e67);

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
('Evelyn', 'evelyn', 'Evelyn Fong Ching Har', 'evelynfong@hotmail.com', 123456789),
('Lucille', 'lucille', 'Lucille Lim Swee Yong', 'lsy@gmail.com', 123661628),
('Fong Keng Lun', 'fkl', 'Fong Keng Lun', 'fongkenglun@gmail.com', 192891628);

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
  `user` text NOT NULL,
  `Rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`OrderId`, `RestaurantName`, `FoodName`, `FoodNumber`, `TotalPrice`, `Status`, `user`, `Rating`) VALUES
(52, 'Pizza Hut', 'Pizza', 1, 1.00, 'Complete', 'Grace', 0),
(57, 'KFC', 'Chicken', 1, 1.00, 'Complete', 'Grace', 0),
(59, 'KFC', 'Chicken', 1, 1.00, 'Complete', 'Grace', 0),
(61, 'KFC', 'Chicken', 1, 1.00, 'Complete', 'Grace', 0),
(63, 'KFC', 'Chicken', 1, 1.00, 'Complete', 'Grace', 0);

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
  MODIFY `FavouriteID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `foodanddrink`
--
ALTER TABLE `foodanddrink`
  MODIFY `FoodId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestaurantId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `OrderId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
