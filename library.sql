-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 06:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvedbookdata`
--

CREATE TABLE `approvedbookdata` (
  `bNo` int(111) NOT NULL,
  `bName` varchar(255) NOT NULL,
  `bAuthor` varchar(255) NOT NULL,
  `bShelfNo` varchar(255) NOT NULL,
  `bCategory` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `returnDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `approvedrequests`
--

CREATE TABLE `approvedrequests` (
  `bNo` int(11) NOT NULL,
  `bName` varchar(255) NOT NULL,
  `bAuthor` varchar(255) NOT NULL,
  `bShelfNo` varchar(255) NOT NULL,
  `bCategory` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `bookdata`
--

CREATE TABLE `bookdata` (
  `SL` varchar(255) NOT NULL,
  `bNo` varchar(255) NOT NULL,
  `bName` varchar(255) NOT NULL,
  `bAuthor` varchar(255) NOT NULL,
  `bShelfNo` varchar(255) NOT NULL,
  `bCategory` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rqty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bNo` int(11) NOT NULL,
  `bName` varchar(255) NOT NULL,
  `bAuthor` varchar(255) NOT NULL,
  `bShelfNo` varchar(255) NOT NULL,
  `bCategory` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `rqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `bNo` int(11) NOT NULL,
  `bName` varchar(255) NOT NULL,
  `bAuthor` varchar(255) NOT NULL,
  `bShelfNo` varchar(255) NOT NULL,
  `bCategory` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvedrequests`
--
ALTER TABLE `approvedrequests`
  ADD KEY `bNo` (`bNo`) USING BTREE;

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bNo`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD KEY `bNo` (`bNo`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD UNIQUE KEY `SL` (`SL`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `bNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
