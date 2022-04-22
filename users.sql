-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 11:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `diaryentries`
--

CREATE TABLE `diaryentries` (
  `diaryTitle` text NOT NULL,
  `diaryDate` date NOT NULL,
  `diaryEntry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diaryentries`
--

INSERT INTO `diaryentries` (`diaryTitle`, `diaryDate`, `diaryEntry`) VALUES
('Title', '2022-04-28', 'Diary Entry, Today i.... \"This is a quote\" and here is some more text to fill space in!'),
('Title 2', '2022-03-06', 'This is a second entry to show that it can hold multiple entries');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `exerciseTitle` text NOT NULL,
  `hours` int(10) NOT NULL,
  `minutes` int(10) NOT NULL,
  `caloriesBurnt` int(10) NOT NULL,
  `completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`exerciseTitle`, `hours`, `minutes`, `caloriesBurnt`, `completed`) VALUES
('Title', 1, 30, 60, 0),
('Title2', 2, 24, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fooddiary`
--

CREATE TABLE `fooddiary` (
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `Dinner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooddiary`
--

INSERT INTO `fooddiary` (`breakfast`, `lunch`, `Dinner`) VALUES
('Today i had blah blah blah!', 'Today i had blah blah \"blah\"', 'Today i had blah! blah blah'),
('Even more blah blah blah!', 'Even more blah with a side of blah blah!', 'Even more blah but had no blah blah this time!');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `goal` text NOT NULL,
  `dueDate` date NOT NULL,
  `note` text NOT NULL,
  `completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`goal`, `dueDate`, `note`, `completed`) VALUES
('Title', '2022-04-29', 'Plan to lose 400 Calories total!', 0),
('Title2', '2022-03-06', 'Lift the heaviest of weights', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nutrition`
--

CREATE TABLE `nutrition` (
  `glassesofWater` int(10) NOT NULL,
  `fruit` int(10) NOT NULL,
  `veg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutrition`
--

INSERT INTO `nutrition` (`glassesofWater`, `fruit`, `veg`) VALUES
(2, 5, 5),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `physiologicaldata`
--

CREATE TABLE `physiologicaldata` (
  `Id` int(10) NOT NULL,
  `heartRate` int(10) NOT NULL,
  `bloodPressure` int(10) NOT NULL,
  `bloodTemperature` int(10) NOT NULL,
  `bloodOxygen` int(10) NOT NULL,
  `respirationRate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physiologicaldata`
--

INSERT INTO `physiologicaldata` (`Id`, `heartRate`, `bloodPressure`, `bloodTemperature`, `bloodOxygen`, `respirationRate`) VALUES
(1, 100, 10, 10, 100, 100),
(2, 80, 20, 20, 120, 100);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(10) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `reminderTitle` text NOT NULL,
  `reminderTime` time NOT NULL,
  `reminderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminderTitle`, `reminderTime`, `reminderDate`) VALUES
('Title1', '12:30:00', '2022-04-25'),
('Title2', '04:12:00', '2022-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `sex` smallint(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `age` int(10) NOT NULL,
  `role` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `secondname`, `sex`, `email`, `password`, `phone`, `age`, `role`) VALUES
(1, 'Liam', 'Durie', 0, 'liamdurie@live.co.uk', 'Password2\"', '123456789', 20, 0),
(2, 'Jessica', 'Doe', 1, 'JessDoe@hotmail.com', 'passWord2$', '987654321', 16, 0),
(3, 'John', 'Smith', 0, 'JohnS@Happyhealth.com', 'JohnSmith4%', '246813579', 32, 1),
(4, 'Eva', 'Violet', 1, 'EvaV@Happyhealth.com', 'EvaViolet5#', '135792468', 26, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `physiologicaldata`
--
ALTER TABLE `physiologicaldata`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `physiologicaldata`
--
ALTER TABLE `physiologicaldata`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
