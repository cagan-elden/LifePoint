-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 06:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifepoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `photoId` int(11) NOT NULL,
  `photo` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chore`
--

CREATE TABLE `chore` (
  `choreId` int(11) NOT NULL,
  `chore` varchar(75) NOT NULL,
  `status` enum('done','not') NOT NULL,
  `time` varchar(13) NOT NULL,
  `date` varchar(10) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chore`
--

INSERT INTO `chore` (`choreId`, `chore`, `status`, `time`, `date`, `userId`) VALUES
(15, 'Wake Up', 'not', '08.00 - 08.30', '14.08.2024', 1),
(16, 'Work Out', 'not', '08.30 - 10.00', '14.08.2024', 1),
(18, 'Wake Up / Skin Care', 'not', '07:00 - 09:00', '18.08.2024', 1),
(19, 'Work Out', 'not', '09:00 - 10:30', '18.08.2024', 1),
(20, 'Shower', 'not', '10:30 - 11:00', '18.08.2024', 1),
(21, 'Breakfast', 'not', '11:00 - 11:30', '18.08.2024', 1),
(22, 'Reading', 'not', '11:30 - 12:00', '18.08.2024', 1),
(23, 'Programming', 'not', '12:00 - 13:30', '18.08.2024', 1),
(24, 'Lunch', 'not', '13:30 - 14:00', '18.08.2024', 1),
(25, 'Programming', 'not', '14:00 - 19:00', '18.08.2024', 1),
(26, 'Drawing', 'not', '19:00 - 20:00', '18.08.2024', 1),
(27, 'Anime', 'not', '20:00 - 22:00', '18.08.2024', 1),
(28, 'Journaling', 'not', '22:00 - 23:00', '18.08.2024', 1),
(32, 'Morning Yoga/Stretching', 'not', '06:30 - 07:00', '20.08.2024', 1),
(33, 'Freshen Up/Skincare Routine', 'not', '07:00 - 07:30', '20.08.2024', 1),
(34, 'Breakfast (Oatmeal, Fruit, Coffee)', 'not', '07:30 - 08:00', '20.08.2024', 1),
(35, 'Work on Project A', 'not', '08:00 - 09:30', '20.08.2024', 1),
(36, 'Coffee Break', 'not', '09:30 - 10:00', '20.08.2024', 1),
(37, 'Team Meeting/Collaborative Work', 'not', '10:00 - 11:00', '20.08.2024', 1),
(38, 'Work on Project B', 'not', '11:00 - 12:30', '20.08.2024', 1),
(39, 'Lunch Break (Salad, Grilled Chicken, Water)', 'not', '12:30 - 13:30', '20.08.2024', 1),
(40, 'Client Calls/Follow-ups', 'not', '13:30 - 15:00', '20.08.2024', 1),
(41, 'Afternoon Walk', 'not', '15:00 - 15:30', '20.08.2024', 1),
(42, 'Wrap Up Work/Prepare for Next Day', 'not', '15:30 - 17:00', '20.08.2024', 1),
(43, 'Gym/Exercise Session', 'not', '17:00 - 18:00', '20.08.2024', 1),
(46, 'Wake Up/Skin Care', 'not', '07:30 - 08:00', '28.08.2024', 1),
(47, ' Work Out', 'not', '08:00 - 09:00', '28.08.2024', 1),
(48, 'Breakfast', 'not', '09:00 - 09:30', '28.08.2024', 1),
(49, 'Jogging', 'not', '09:30 - 10:00', '28.08.2024', 1),
(50, 'Chess', 'not', '10:00 - 11:00', '28.08.2024', 1),
(51, 'Skin Care', 'not', '07:30 - 08:00', '29.08.2024', 1),
(52, 'Sport', 'not', '08:00 - 09:00', '29.08.2024', 1),
(53, 'Breakfast', 'not', '09:00 - 10:00', '29.08.2024', 1),
(54, 'Chess', 'not', '10:00 - 11:00', '29.08.2024', 1),
(55, 'School', 'not', '11:00 - 16:30', '29.08.2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `detailId` int(11) NOT NULL,
  `keyword1` varchar(250) NOT NULL,
  `keyword2` varchar(250) NOT NULL,
  `keyword3` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `diaryId` int(11) NOT NULL,
  `diary` text NOT NULL,
  `date` date NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friendId` int(11) NOT NULL,
  `friendOutro` int(11) NOT NULL,
  `friendIntro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `keywordId` int(11) NOT NULL,
  `keyword` varchar(250) NOT NULL,
  `keywordLen` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `displayName` varchar(300) NOT NULL,
  `username` varchar(500) NOT NULL,
  `profilePic` varchar(500) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `daystreak` int(11) NOT NULL,
  `lifePoint` int(11) NOT NULL,
  `type` enum('private','public','ban','company') NOT NULL,
  `rememberToken` varchar(255) NOT NULL,
  `rememberTokenExpire` datetime NOT NULL,
  `keyword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `displayName`, `username`, `profilePic`, `Email`, `password`, `daystreak`, `lifePoint`, `type`, `rememberToken`, `rememberTokenExpire`, `keyword`) VALUES
(1, 'John Doe', 'johndoe', '../source/image/profile/default.jpg', 'johndoe@gmail.com', '$2y$10$yChoT1BOeUBDcx06EhiOputo5/kL4cRlGi64gbY/AVVpgr8fOcunW', 1, 1, 'private', '435b061b7d31e8154bd3fefaf18392f1', '2024-09-28 16:56:45', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`photoId`);

--
-- Indexes for table `chore`
--
ALTER TABLE `chore`
  ADD PRIMARY KEY (`choreId`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`detailId`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`diaryId`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friendId`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`keywordId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `photoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chore`
--
ALTER TABLE `chore`
  MODIFY `choreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `detailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `diaryId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `friendId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `keywordId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
