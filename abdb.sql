-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 07:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `sid` int(10) NOT NULL,
  `usrid` varchar(100) NOT NULL,
  `inv` int(50) NOT NULL,
  `custname` varchar(200) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `itname` varchar(200) NOT NULL,
  `quantity` int(50) NOT NULL,
  `amt` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`sid`, `usrid`, `inv`, `custname`, `mobile`, `itname`, `quantity`, `amt`, `date`) VALUES
(1, 'aditya', 1000, 'Aditya mahilane', 0, 'kurkure', 5, 50, '0000-00-00 00:00:00'),
(2, 'aditya', 1001, 'Aditya mahilane', 0, 'parle ', 3, 15, '2021-11-20 18:30:00'),
(6, 'aditya', 1008, 'suruchi', 0, 'soya sticks', 3, 15, '2021-11-24 18:30:00'),
(100, 'aditya', 1011, 'aditya', 11111, 'parleBiscuit', 10, 50, '2021-11-26 11:29:12'),
(103, 'aditya', 1013, 'chintu', 11111, 'parleBiscuit', 2, 10, '2021-11-27 10:57:25'),
(104, 'aditya', 1013, 'chintu', 11111, 'parleBiscuit', 2, 10, '2021-11-27 10:58:26'),
(105, 'aditya', 1013, 'chintu', 11111, 'parleBiscuit', 2, 10, '2021-11-27 10:59:51'),
(115, 'sonu', 1008, 'didi', 1, 'kurkure', 1, 10, '2021-11-27 21:01:32'),
(127, 'aditya', 1014, 'bhancha', 6265763626, 'soya sticks', 3, 30, '2021-11-28 17:53:45'),
(128, 'aditya', 1014, 'bhancha', 6265763626, 'parleBiscuit', 5, 25, '2021-11-28 17:53:54'),
(129, 'aditya', 1014, 'bhancha', 6265763626, 'soya sticks', 6, 60, '2021-11-28 17:56:00'),
(130, 'aditya', 1015, 'preeti', 1234567890, 'Bingo mad Angles ', 5, 50, '2021-11-29 15:01:59'),
(131, 'aditya', 1015, 'preeti', 1234567890, 'soya sticks    ', 3, 30, '2021-11-29 15:02:24'),
(132, 'aditya', 1015, 'preeti', 1234567890, 'parleBiscuit ', 2, 20, '2021-11-29 15:02:32'),
(133, 'aditya', 1016, 'bhancha', 6265763626, 'parleBiscuit ', 5, 50, '2021-11-29 15:04:08'),
(134, 'aditya', 1017, 'nandu', 11111, 'parleBiscuit ', 5, 50, '2021-11-29 15:04:45'),
(135, 'aditya', 1017, 'nandu', 11111, 'soya sticks    ', 1, 10, '2021-11-29 15:04:55'),
(136, 'aditya', 1018, 'nidhi', 0, 'Bingo mad Angles ', 5, 50, '2021-11-29 15:06:55'),
(137, 'aditya', 1019, 'nidhi', 0, 'Bingo mad Angles ', 5, 50, '2021-11-29 15:07:31'),
(138, 'aditya', 1020, 'nidhi', 0, 'Bingo mad Angles ', 5, 50, '2021-11-29 15:07:54'),
(139, 'aditya', 1021, 'manoj', 9111203808, 'soya sticks     ', 5, 50, '2021-11-30 14:43:06'),
(140, 'aditya', 1021, 'manoj', 9111203808, 'Bingo mad Angles  ', 5, 50, '2021-11-30 14:43:14'),
(141, 'aditya', 1021, 'manoj', 9111203808, 'parleBiscuit ', 3, 30, '2021-11-30 14:43:19'),
(142, 'aditya', 1021, 'manoj', 9111203808, 'soya sticks     ', 2, 20, '2021-11-30 14:43:25'),
(143, 'aditya', 1022, 'manoj', 9111203808, 'parleBiscuit ', 5, 50, '2021-11-30 14:46:41'),
(144, 'aditya', 1023, 'aditya', 1234, 'soya sticks     ', 5, 50, '2021-12-01 10:44:18'),
(145, 'aditya', 1023, 'aditya', 1234, 'soya sticks     ', 4, 40, '2021-12-01 10:44:29'),
(146, 'aditya', 1024, 'asdsfs', 0, 'soya sticks     ', 5, 50, '2021-12-04 18:56:23'),
(147, 'aditya', 1024, 'asdsfs', 0, 'soya sticks     ', 6, 60, '2021-12-04 18:56:31'),
(148, 'sonu', 1009, 'kamlesh', 7974182248, 'kurkure', 4, 40, '2021-12-12 11:45:38'),
(149, 'sonu', 1009, 'kamlesh', 7974182248, 'lays', 2, 20, '2021-12-12 11:45:44'),
(150, 'sonu', 1009, 'kamlesh', 7974182248, 'Tata salt', 2, 20, '2021-12-12 11:45:51'),
(151, 'sonu', 1009, 'kamlesh', 7974182248, 'bhujia', 3, 15, '2021-12-12 11:45:57'),
(152, 'aditya', 1025, 'nabonit', 90909090, 'Parle', 5, 25, '2021-12-16 05:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(15) NOT NULL,
  `usrid` varchar(200) NOT NULL,
  `iname` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `stock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `usrid`, `iname`, `price`, `stock`) VALUES
(1, 'sonu', 'kurkure', 10, 46),
(2, 'sonu', 'lays', 10, 48),
(3, 'sonu', 'bhujia', 5, 17),
(4, 'aditya', 'parleBiscuit ', 10, 30),
(5, 'MAYANK', 'SAMOSA', 5, 10),
(11, 'aditya', 'soya sticks      ', 10, 70),
(64, 'sonu', 'Tata salt', 10, 28),
(65, 'sonu', 'samosa', 5, 20),
(66, 'sonu', 'Tata salt', 10, 28),
(67, 'sonu', 'Rasgulla', 100, 20),
(68, 'aditya', 'Bingo mad Angles  ', 10, 45),
(69, 'aditya', 'Parle', 5, 15),
(70, 'aditya', 'maggi', 20, 20),
(71, 'aditya', 'samosa', 10, 100),
(72, 'aditya', 'kaju katli', 700, 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `usrid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usrid`, `password`) VALUES
(1, 'aditya', '12345'),
(2, 'sonu', '123'),
(3, 'mayank', '0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
