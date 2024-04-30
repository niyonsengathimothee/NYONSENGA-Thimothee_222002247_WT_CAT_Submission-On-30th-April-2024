-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 04:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_reservation_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(7) NOT NULL,
  `fname` varchar(18) NOT NULL,
  `lname` varchar(18) NOT NULL,
  `email` varchar(35) NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fname`, `lname`, `email`, `telephone`) VALUES
(1, 'uwera', 'Rukundo', 'mine@gmail.com', '999999999999999'),
(2, 'fname', 'yyyyyyyyyyyyyyyyyy', 'email', 'telephone'),
(3, 'wertyuytrtyut', 'dfghjsdfghjh', 'sdfdsdffdtdr@gmail', '098765'),
(4, 'fname', 'lname', 'email', 'telephone'),
(5, 'fname', 'lname', 'email', 'telephone'),
(6, 'fname', 'lname', 'telephone', 'email@gmail'),
(7, 'Alise', 'Rukundo', 'email@gmail', 'telephone'),
(12, 'sammy', 'niyomu', 'sam@gmail.com', '0788201441'),
(76, 'ntwari', 'Thimothee', 'niyonsengathimothee2000@gmail.com', '234555');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `paymentmethod` char(50) NOT NULL,
  `paymentamount` int(20) NOT NULL,
  `paymentstatus` varchar(100) NOT NULL,
  `paymentdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `paymentmethod`, `paymentamount`, `paymentstatus`, `paymentdate`) VALUES
(5, 'momo', 5000, '0', '0000-00-00'),
(12, 'Bank', 234500, '0', '2024-04-26'),
(14, 'Bank', 4500, '0', '0000-00-00'),
(15, 'Bank', 4500, '0', '0000-00-00'),
(16, 'Bank', 4500, '0', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `checkin_date` date DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `customer_id`, `checkin_date`, `checkout_date`, `booking_date`, `total_price`) VALUES
(1, 3, '2024-04-21', '2024-04-28', '2024-05-12', 2147483647),
(2, 3, '2024-04-30', '2024-04-30', '2024-04-30', 3000),
(4, 2, '2024-04-29', '2024-04-11', '2024-04-04', 3000),
(5, 2, '2024-04-29', '2024-04-11', '2024-04-04', 3000),
(7, 1, '2024-04-30', '2024-04-18', '2024-05-10', 3000),
(67, 1, '2024-04-29', '2024-04-29', '2024-04-29', 3000),
(78, 2, '2024-04-10', '2024-04-05', '2024-04-01', 1700800);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Roomtype` varchar(18) NOT NULL,
  `Pricepernight` varchar(21) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Roomtype`, `Pricepernight`, `Description`, `customer_id`, `room_id`) VALUES
('35', '900', 'regular', 2, 3),
('two', '80000000009', 'vip', 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `fname` varchar(11) NOT NULL,
  `lname` varchar(11) NOT NULL,
  `email` varchar(11) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `fname`, `lname`, `email`, `telephone`, `payment_id`) VALUES
(66, 'uwase', 'Nicki', 'lolo@gmail.', '789654321', 35),
(3459, 'John', 'Doe john', '+123456789', 'john.doe@ex', 38),
(3460, 'Jane', 'Smith', 'jane.smith@', '+987654321', 35),
(3461, 'Michael', 'Johnson', 'michael.joh', '+1122334455', 39),
(3462, 'Emily', 'Brown', 'emily.brown', '+9988776655', 37),
(3464, 'John', 'Doe', 'john.doe@ex', '+123456789', 38),
(3465, 'Jane', 'Smith', 'jane.smith@', '+987654321', 35),
(3466, 'Michael', 'Johnson', 'michael.joh', '+1122334455', 39),
(3467, 'Emily', 'Brown', 'emily.brown', '+9988776655', 37),
(3468, 'David', 'Taylor', 'david.taylo', '07896754321', 35);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(40) NOT NULL,
  `username` varchar(35) NOT NULL,
  `gender` varchar(21) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telephone` int(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `activation_code` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `gender`, `email`, `telephone`, `password`, `activation_code`) VALUES
(1, 'NIYONSENGA', 'Thimothee', 'xcfgfhjgfd', 'male', 'niyonsengathimothee2', 5678945, '0', 345),
(2, 'NIYONSENGA', 'Thimothee', 'NIYONSENGA thimothee ', 'male', 'lolo@gmail.com', 787205393, '$2y$10$pnQ3t3wCFWCKyerdruFwjePVQj2LnfGF1jhxGcGQYbjeyWeD9iR6O', 1),
(3, 'NIYONSENGA', 'Thimothee', 'NIYONSENGA thimothee ', 'male', 'lolo@gmail.com', 787205393, '$2y$10$h.cfHCsCCJYWRFOMuTvgaugg00bz9ikmlhwPnloBkmyXwr44WC97m', 1),
(4, 'dfghj', 'Thimothee', '222002247', 'female', 'lolo@gmail.com', 787205393, '$2y$10$N95t/46/j9dt9Ni7cyZxY.LC9QRz3ctiooFxZ5kv2SdOD2gnlre96', 55),
(5, 'uwera', 'jaki', 'jakiwe', 'female', 'fghj@gmbvg', 789654321, '$2y$10$p9kKGNWFwggz1l3cWYIScuWOfRaSyC5Ftv7aAkGWy9zeeyNElrA2e', 654),
(6, 'emmy', 'kalinda', 'kaliemmy', 'male', 'timo@gmail', 787205393, '$2y$10$0gD/3GugJaKMB9qxwtwK3.v7vCznwY56i4Q6zjqbTgO3pgIUWrU8y', 22),
(7, 'uwera', 'sala', 'salawera', 'female', 'timo@gmail', 1234, '$2y$10$nZXT3WLJLeclu8DQePUOIOq99fL2Cmusgw0uvPMhD8SnkxhQOXbAu', 23),
(8, 'NIYONSENGA', 'Thimothee', 'timo', 'male', 'tnhbhj@gmail.com', 787205393, '$2y$10$VdEOXvA5eTvuRg2bS2Cst.g6VylyRSBRy7Y3Uikbu6wXVAXEeXrwu', 123),
(9, 'uwase', 'Nicki', 'uwanicki', 'female', 'timo@gmail', 787205393, '$2y$10$fAI9GVMsLb.FT6e1wmVzgueUA7d8rbfOQtYheqyph13x3nVF1Zbnu', 1),
(10, 'uwase', 'Nicki', 'uwanicki', 'female', 'timo@gmail', 787205393, '$2y$10$Ex55ofeCpMiS/T7zTSM.2eaOgYtK/6rRkWb00WDIlfn1figwsPp1u', 3),
(11, 'uwase', 'Nicki', '222002247', 'female', 'timo@gmail', 787205393, '$2y$10$toj/FgnJ1DJeWivFl7AwOOHd0krWpZIms5S3rpAGKCAehz40NXQBu', 56),
(12, 'uwase', 'Nicki', 'uwanicki', 'female', 'timo@gmail', 789654321, '$2y$10$J1Cqf4AnxxXV4N7V2m31UuotZ/2qj/7uYDNDzl7rcwiUoddISkYBq', 3),
(13, 'uwase', 'Nicki', '222002247', 'female', 'timo@gmail', 787205393, '$2y$10$jJxOD0q5BeWM.m4V3ZaSkOCZp2OEnv2of4Qsl.rWK/KfgEOTbcr8e', 2),
(14, 'uwase', 'Nicki', '222002247', 'female', 'timo@gmail', 787205393, '$2y$10$gFYuq3GspNnhZW5ApsHVHuWlpQqeiqp1bhhxrltAQhaln1ZAwIirC', 2),
(15, 'NIYONSENGA', 'Nicki', '222002247', 'male', 'timo@gmail', 787205393, '$2y$10$rcSch1xtqa9LR1wcOcntWeMGobNXTkPZmoSy0sJOcTSJ///dyaYAS', 3),
(16, 'uwase', 'veve', '222002247', 'female', 'veve12@gmail.com', 787205393, '$2y$10$ChsVJg9Q00kUaGtFwQSh8eW9BJh36oOETEJXFl05yd0WvC2KsUApq', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `fk_room_customer` (`customer_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `fk_staff_payment` (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123446;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=655;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3470;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_staff_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
