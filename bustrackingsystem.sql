-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 11:19 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bustrackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `vehicle_number` varchar(128) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `vehicle_number`, `driver_id`, `route_id`) VALUES
(1, 'MH 04 CH 1234', 1, 1),
(2, 'MH 04 CH 2354', 2, 1),
(3, 'MH 04 CH 2457', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bus_stop`
--

CREATE TABLE `bus_stop` (
  `id` bigint(20) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `lng` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_stop`
--

INSERT INTO `bus_stop` (`id`, `lat`, `lng`, `name`) VALUES
(1, '19.016933', '72.820082', 'Worli Village'),
(2, '19.016788', '72.818414', 'Adarsh Nagar'),
(3, '19.013450', '72.823486', 'Babasaheb Worlikar Chowk'),
(4, '19.015846', '72.827995', 'Prabhadevi'),
(5, '19.017143', '72.829983', 'Siddhivinayak Mandir'),
(6, '19.018852', '72.833146', 'Agar Bazar'),
(7, '19.019207', '72.836661', 'P Thakre Chowk Dadar'),
(8, '19.018778', '72.842255', 'Hanuman Mandir/Dsilva School');

-- --------------------------------------------------------

--
-- Table structure for table `bus_timing`
--

CREATE TABLE `bus_timing` (
  `bus_id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_timing`
--

INSERT INTO `bus_timing` (`bus_id`, `time`) VALUES
(1, '10:00:00'),
(2, '12:00:00'),
(3, '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(256) NOT NULL,
  `licence_no` varchar(128) NOT NULL,
  `phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `address`, `licence_no`, `phone`) VALUES
(1, 'Driver 1', 'Address', '123456', '9999999999'),
(2, 'Driver 2', 'Address 2', '32145684', '9999999999'),
(3, 'Driver 3', 'Address 3', '35487895', '3214569871');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` bigint(20) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `name`) VALUES
(1, 'C72'),
(2, '706 LTD');

-- --------------------------------------------------------

--
-- Table structure for table `route_stops`
--

CREATE TABLE `route_stops` (
  `route_id` int(11) NOT NULL,
  `stop_number` int(11) NOT NULL,
  `bus_stop_id` int(11) NOT NULL,
  `time_from_source` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_stops`
--

INSERT INTO `route_stops` (`route_id`, `stop_number`, `bus_stop_id`, `time_from_source`) VALUES
(1, 1, 1, 0),
(1, 2, 4, 30),
(1, 3, 7, 60),
(1, 4, 8, 90),
(2, 1, 2, 0),
(2, 2, 3, 15),
(2, 3, 4, 15),
(2, 4, 5, 15),
(2, 5, 6, 15),
(2, 6, 7, 15),
(2, 7, 8, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_stop`
--
ALTER TABLE `bus_stop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
