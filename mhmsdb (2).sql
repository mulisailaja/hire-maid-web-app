-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 10:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cussignup`
--

CREATE TABLE `cussignup` (
  `id` int(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` bigint(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cussignup`
--

INSERT INTO `cussignup` (`id`, `name`, `email`, `number`, `password`) VALUES
(4, 'aswini', 'ashusrini07@gmail.com', 5675675675, '1234'),
(5, 'sssss', 'admin@gmail.com', 5675675675, 'asdf'),
(6, 'aswini', 'ashu@gmail.com', 6383788106, 'ashu'),
(7, 'sailaja', 'sailu123@gmail.com', 9550234318, 'sailu');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `feedback` text NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `feedback`, `suggestions`) VALUES
(2, 'pavi', 'Sailusubbareddy333@gmail.com', '6786786787', 'excellent', 'hiii');

-- --------------------------------------------------------

--
-- Table structure for table `maid`
--

CREATE TABLE `maid` (
  `id` int(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` bigint(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maid`
--

INSERT INTO `maid` (`id`, `name`, `email`, `number`, `password`) VALUES
(1, 'aswini', 'ashu@gmail.com', 6786786786, 'ashu'),
(3, 'sailaja', 'sailu123@gmail.com', 9550234318, 'sailu'),
(7, 'pavi', 'pavi@gmail.com', 4564564564, 'pavi');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `user` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user`, `message`, `uid`) VALUES
(1, 'ak', 'hii', 5),
(2, 'Ashu', 'hello', 5),
(3, 'Admin', 'hii', 1),
(4, 'Ashu', 'hello', 1),
(5, 'Ashu', 'hi', 1),
(6, 'aswini', 'hello', 2),
(7, 'Ashu', 'hii', 3),
(8, 'Ashu', 'hii', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `amount`, `product_id`) VALUES
(1, '1', 'pay_NBIEBYQ2niEKTT', '3000', '1'),
(2, '1', 'pay_NBIFHmEUwZkw1r', '3000', '1'),
(3, '1', 'pay_NC4fnB685q8mjt', '2500', '1'),
(4, '1', 'pay_NDewmwNurOFR5D', '3000', '1'),
(5, '1', 'pay_NDfr7e5smyN9mf', '3000', '1'),
(6, '1', 'pay_NDfsLh3OTAF9kG', '3000', '1'),
(7, '1', 'pay_NDgVlBslxTAmZK', '3000', '1'),
(8, '1', 'pay_NDgc4rxOi3Hqzs', '3000', '312412279'),
(9, '1', 'pay_NDge1HTWYb5vnP', '2500', '879426864'),
(10, '1', 'pay_NDgiLmf5X6ySJG', '3000', '312412279'),
(11, '1', 'pay_NDgtIr9Z7Pw4HW', '2500', '1'),
(12, '1', 'pay_NDh3zuWVKU4DOk', '3000', '312412279'),
(13, '1', 'pay_NDhEG8B1F5aw7j', '2000', '362524320'),
(14, '1', 'pay_NDhjKBlGx0lHWK', '5000', '400996306'),
(15, '1', 'pay_NK2mYlSMtbcpUm', '9000', '168427245'),
(16, '1', 'pay_NKqezc6Ok0OQcL', '500', '379057886');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(10) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `number` bigint(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `number`, `email`, `password`) VALUES
(1, 'Admin User', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(2, 'sailaja', 4564564564, 'sailu@gmail.com', 'sailu'),
(3, 'aswini', 4564564566, 'ashu@gmail.com', 'ashu'),
(4, 'sailaja', 9550234318, 'sailu123@gmail.com', 'sailu');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(5) NOT NULL,
  `CategoryName` varchar(250) DEFAULT NULL,
  `perhouramount` int(255) NOT NULL,
  `monthlyamount` int(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `perhouramount`, `monthlyamount`, `CreationDate`) VALUES
(1, 'Cooking', 200, 3000, '2023-03-31 12:52:51'),
(3, 'House Keeping', 1000, 4000, '2023-03-31 12:52:51'),
(6, 'Laundry', 500, 5500, '2023-03-31 12:52:51'),
(15, 'Bathroom cleaning', 300, 5000, '2024-01-03 07:52:50'),
(16, 'sweeping', 250, 3500, '2024-01-03 07:53:06'),
(17, 'kitchen cleaning', 350, 4000, '2024-01-03 07:53:43'),
(18, 'utensils cleaning', 350, 4500, '2024-01-03 07:54:14'),
(20, 'mopping', 400, 5000, '2024-01-03 07:55:19'),
(21, 'Baby care', 300, 6000, '2024-01-03 07:55:46'),
(22, 'Deep cleaning', 1000, 4000, '2024-01-03 07:56:07'),
(23, 'Ironing and Folding', 700, 6500, '2024-01-03 08:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblmaid`
--

CREATE TABLE `tblmaid` (
  `ID` int(5) NOT NULL,
  `CatID` varchar(255) DEFAULT NULL,
  `MaidId` varchar(250) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Gender` varchar(250) DEFAULT NULL,
  `Experience` varchar(250) DEFAULT NULL,
  `Dateofbirth` date DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `willingToWork` varchar(255) NOT NULL,
  `preferredLocations` varchar(255) NOT NULL,
  `ProfilePic` varchar(250) DEFAULT NULL,
  `IdProof` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmaid`
--

INSERT INTO `tblmaid` (`ID`, `CatID`, `MaidId`, `Name`, `Email`, `ContactNumber`, `Gender`, `Experience`, `Dateofbirth`, `Address`, `willingToWork`, `preferredLocations`, `ProfilePic`, `IdProof`, `RegDate`) VALUES
(1, '1', 'Meena1234', 'Meena Das', 'meena@gmail.com', 8979879797, 'Male', '2.5', '1989-09-06', 'J-890, Kasi basti Wesbengal', '', '', '3dfb1c8dbdcc05745b5fefc573a2a85f1680270088.png', '008301d87dab266223707a580dbb35771680270088.jpg', '2023-03-31 13:41:28'),
(2, '6', 'mh123', 'Neena', 'neena@gmail.com', 9779789879, 'Female', '3', '1986-02-06', 'K-908', '', '', 'ac510893dc8d91e7a0d7b9f4d7c45e221680333111.jpg', '3f72678c4339b844781889070368cc631680333512.jpg', '2023-03-31 14:39:09'),
(3, '5', 'm1234', 'Krisha', 'krisha@gmail.com', 8789789789, 'Female', '12', '1978-01-05', 'nangloi NewDelhi', '', '', '3f3141ed3b2293aaa6b66587343daa091680536067.jpg', '57a88eacc86363dbe4ea87c74b4bfc991680536067.png', '2023-04-03 15:34:27'),
(4, '2', 'm12', 'Ramu', 'ramu@gmail.com', 1231231230, 'Male', '10', '2011-01-05', 'kanakna goi Bihar', '', '', 'fc5bf5c9948c416f7c1046c8f91ba9a91680536429.png', '48828368a938efd32d079dd542c28ebf1680536429.png', '2023-04-03 15:40:29'),
(6, '2', '2', 'hari', 'hari@gmail.com', 7897897897, 'Male', '2 yrs', '2023-12-14', 'chennai', '', '', 'ec59be518c5c5ed8befd6a26a31651ab1701593235.png', 'ec59be518c5c5ed8befd6a26a31651ab1701593235.png', '2023-12-03 08:47:15'),
(7, '1', '4', 'Devi', 'devi@gmail.com', 4564564564, 'Female', '3yrs', '2023-12-10', 'salem', '', '', '2ca66a8cc11610d3dc40d65cda41eced1701593528.png', '2ca66a8cc11610d3dc40d65cda41eced1701593528.png', '2023-12-03 08:52:08'),
(8, 'House Keeping', '5', 'aswini', 'aswini@gmail.com', 8768768768, 'Female', '1 year', '2023-12-10', 'krishnagiri', '', '', 'ec59be518c5c5ed8befd6a26a31651ab1701593903.png', 'ec59be518c5c5ed8befd6a26a31651ab1701593903.png', '2023-12-03 08:58:23'),
(9, 'Cooking', '6', 'aswini', 'ashusri@gmail.com', 9879879879, 'Female', '3yrs', '2023-12-12', 'chennai', '', '', 'ec59be518c5c5ed8befd6a26a31651ab1701786388.png', 'ec59be518c5c5ed8befd6a26a31651ab1701786388.png', '2023-12-05 14:26:28'),
(10, 'Laundry', '1234', 'Ramya ', 'ramya@gmail.com', 9550234318, 'Female', '1 year', '2000-12-12', 'rajampet', '', '', '2ca66a8cc11610d3dc40d65cda41eced1702355824.png', '2ca66a8cc11610d3dc40d65cda41eced1702355824.png', '2023-12-12 04:37:04'),
(11, 'Gardening', '543', 'sailaja', 'sailu@gmail.com', 8978978979, 'Female', '1 year', '2023-12-18', 'chennai', '', '', 'db609ee928c230ec0e7fd23e7eca753e1702871606.jpg', 'db609ee928c230ec0e7fd23e7eca753e1702871606.jpg', '2023-12-18 03:53:26'),
(12, 'House Keeping', '23', 'pavi', 'pavi@gmail.com', 6788907890, 'Female', '4', '2024-01-02', 'banglore', 'yes', 'chennai', '2aba55f5c4239f1f26797ed2ec31576f1704186593jpeg', '999a83615a93a13efe85c35ecf99cf181704186593jpeg', '2024-01-02 09:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblmaidbooking`
--

CREATE TABLE `tblmaidbooking` (
  `ID` int(5) NOT NULL,
  `BookingID` int(10) DEFAULT NULL,
  `CatID` varchar(255) DEFAULT NULL,
  `Amount` int(255) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `WorkingShiftFrom` time DEFAULT NULL,
  `WorkingShiftTo` time DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `Enddate` date NOT NULL,
  `Notes` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT 'Pending',
  `AssignTo` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmaidbooking`
--

INSERT INTO `tblmaidbooking` (`ID`, `BookingID`, `CatID`, `Amount`, `Name`, `ContactNumber`, `Email`, `Address`, `Gender`, `WorkingShiftFrom`, `WorkingShiftTo`, `StartDate`, `Enddate`, `Notes`, `BookingDate`, `Remark`, `Status`, `AssignTo`, `UpdationDate`) VALUES
(25, 919667027, 'Gardening', 3500, 'ashu', 9550234318, 'ashusrini07@gmail.com', 'chennai', 'Female', '08:50:00', '09:50:00', '2023-12-18', '0000-00-00', 'hiii', '2023-12-18 03:20:52', NULL, 'Approved', 'Krisha', '2024-03-12 09:09:16'),
(26, 362524320, 'Electrician', 2000, 'Aswini', 6383788106, 'ashusrini07@gmail.com', 'chennai', 'Female', '11:10:00', '11:10:00', '0000-00-00', '0000-00-00', '', '2023-12-18 05:40:05', NULL, 'Paid', 'aswini', '2023-12-18 05:41:00'),
(27, 148855247, 'Painting ', 5500, 'radha', 9550234318, 'radha@gmail.com', 'chennai', 'Female', '12:30:00', '13:30:00', '2023-12-19', '0000-00-00', '', '2023-12-18 06:04:04', NULL, 'Approved', 'pavi', '2024-01-05 09:11:00'),
(28, 967455738, 'Plumbing ', 3500, 'ramu', 1234567891, 'ramu@gmail.com', 'kadapa', 'Male', '13:40:00', '14:40:00', '2023-12-20', '0000-00-00', '', '2023-12-18 06:09:05', NULL, 'Approved', 'hari', '2023-12-18 06:09:27'),
(29, 491666962, 'Gardening', 3500, 'radha', 6383788106, 'radha@gmail.com', '3/82', 'Female', '13:30:00', '14:30:00', '2023-12-19', '0000-00-00', '', '2023-12-18 06:15:44', NULL, 'Approved', 'Krisha', '2023-12-18 06:16:16'),
(30, 387787073, 'Cooking', 3000, 'meena', 987654321, 'Sailusubbareddy333@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '15:33:00', '16:33:00', '2024-01-09', '0000-00-00', 'asd', '2024-01-03 06:03:33', NULL, 'Approved', 'aswini', '2024-01-03 09:54:11'),
(31, 979107444, 'House Keeping', 5000, 'sailu', 3453453453, 'sailu@gmail.com', 'chennai', 'Female', '12:00:00', '13:00:00', '2024-01-10', '0000-00-00', 'hii', '2024-01-03 06:30:40', NULL, 'Approved', 'hari', '2024-01-03 06:31:46'),
(32, 168427245, 'Cooking', 9000, 'sailaja', 9550234318, 'Sailusubbareddy333@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '13:02:00', '16:02:00', '2024-01-03', '0000-00-00', 'jii', '2024-01-03 06:32:55', NULL, 'Paid', 'hari', '2024-01-03 06:40:01'),
(33, 379057886, 'sweeping', 500, 'Sailaja', 9550234318, 'Sailusubbareddy333@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '08:47:00', '10:47:00', '2024-01-04', '0000-00-00', 'hiii', '2024-01-04 03:18:34', NULL, 'Paid', 'pavi', '2024-01-05 07:27:36'),
(34, 317292854, 'Laundry', 1000, 'Sailaja', 9550234318, 'sailu123@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '11:47:00', '13:47:00', '2024-01-05', '0000-00-00', NULL, '2024-01-05 06:17:33', NULL, 'Approved', 'pavi', '2024-01-05 06:52:20'),
(35, 836047772, 'Cooking', 800, 'Sailaja', 9550234318, 'sailu123@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '13:00:00', '17:00:00', '2024-01-24', '0000-00-00', NULL, '2024-01-23 07:34:41', NULL, 'Approved', 'Ramya ', '2024-01-23 07:39:23'),
(36, 129152994, 'Cooking', 600, 'Sailaja ', 9550234318, 'Sailu123@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '13:20:00', '16:20:00', '2024-01-26', '0000-00-00', NULL, '2024-01-25 06:51:02', NULL, 'Approved', 'Ramu', '2024-01-25 08:01:07'),
(37, 696528553, 'House Keeping', 1017, 'Sailaja', 9550234318, 'Sailusubbareddy333@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '16:42:00', '17:43:00', '2024-02-02', '0000-00-00', NULL, '2024-01-30 09:13:14', NULL, 'Approved', 'pavi', '2024-01-30 09:44:59'),
(38, 174719178, 'Laundry', 500, 'aswini', 9550234318, 'Sailusubbareddy333@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '08:00:00', '15:00:00', '2024-02-01', '0000-00-00', NULL, '2024-01-30 09:32:00', NULL, 'Cancelled', '', '2024-01-30 09:45:12'),
(39, 647014716, 'sweeping', 3250, 'aswini', 9550234318, 'Sailusubbareddy333@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '09:30:00', '22:30:00', '2024-02-02', '0000-00-00', NULL, '2024-01-30 10:00:33', 'not available', 'Cancelled', NULL, '2024-01-30 10:05:56'),
(40, 781163607, 'Cooking', 200, 'sailaja', 9550234318, 'Sailu123@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '00:30:00', '04:30:00', '2024-02-06', '0000-00-00', NULL, '2024-02-03 06:07:48', 'not feeling well', 'Cancelled', NULL, '2024-02-03 06:10:33'),
(41, 795552131, 'Laundry', 500, 'Sailaja ', 9550234318, 'sailu123@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '00:37:00', '01:38:00', '2024-02-23', '0000-00-00', NULL, '2024-02-22 06:07:26', 'health problem', 'Cancelled', NULL, '2024-02-22 06:11:15'),
(42, 290982431, 'Laundry', 500, 'sailaja', 9550234318, 'sailu123@gmail.com', '5/627, Suddaguntalu Street, Rajampet', 'Female', '13:10:00', '15:12:00', '2024-02-28', '0000-00-00', NULL, '2024-02-26 06:40:03', 'health issue', 'Cancelled', NULL, '2024-02-26 06:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'HIRE MAID..!', 'Quick and quality services from house cleaning...', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'Tata santroni,korfos-101,chennai,Tamil Nadu.', 'Sailusubbareddy333@gmail.com', 9550234318, NULL, '10:30 am to 7:30 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cussignup`
--
ALTER TABLE `cussignup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maid`
--
ALTER TABLE `maid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblmaid`
--
ALTER TABLE `tblmaid`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblmaidbooking`
--
ALTER TABLE `tblmaidbooking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cussignup`
--
ALTER TABLE `cussignup`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblmaid`
--
ALTER TABLE `tblmaid`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblmaidbooking`
--
ALTER TABLE `tblmaidbooking`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
