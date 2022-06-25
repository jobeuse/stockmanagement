-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 05:34 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(11, 'banana'),
(12, 'meat');

-- --------------------------------------------------------

--
-- Table structure for table `imported`
--

CREATE TABLE `imported` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `measure` varchar(24) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_category` varchar(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `date_e` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imported`
--

INSERT INTO `imported` (`p_id`, `p_name`, `p_quantity`, `measure`, `p_price`, `p_category`, `total_price`, `exp_date`, `date_e`) VALUES
(13, 'ibitonki', 765, 'Kg', 87654, 'food', 67055310, '', '2021-01-02'),
(14, 'banana', 21, 'Kg', 100, 'banana', 2100, '', '2021-01-03'),
(15, 'intoryi', 100, 'Kg', 100, 'meat', 10000, '', '2021-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `login_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `telephone`, `login_status`) VALUES
(29, 'admin', 'me', '0780809031', '0'),
(30, 'bukerap0343', 'bukerap', '078080891', '0'),
(31, 'siraha5758', 'siraha', '911', '0'),
(32, 'jojo2502', 'jklpo', '078898787', '0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `namaa`
-- (See below for the actual view)
--
CREATE TABLE `namaa` (
`p_name` varchar(255)
,`trans` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `measure` varchar(24) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `trans` varchar(255) NOT NULL,
  `exp_date` date NOT NULL,
  `date_e` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`p_id`, `p_name`, `p_quantity`, `measure`, `p_price`, `p_category`, `total_price`, `trans`, `exp_date`, `date_e`) VALUES
(1, 'banana', 786, 'lt', 67, 'food', 52662, 'imported', '2021-02-20', '2021-02-03'),
(2, 'banana', 786, 'lt', 67, 'food', 52662, 'imported', '2021-02-20', '2020-12-30'),
(3, 'tomato', 765, 'Kg', 54, 'food', 41310, 'imported', '2021-02-20', '2020-12-30'),
(4, 'tomato', 765, 'Kg', 54, 'food', 41310, 'imported', '2021-02-20', '2020-12-30'),
(5, 'ibitonki', 7654, 'Kg', 654, 'food', 5005716, 'imported', '2021-02-20', '2020-12-30'),
(6, 'ibitonki', 7654, 'Kg', 654, 'food', 5005716, 'imported', '2021-02-20', '2020-12-30'),
(7, 'ibitonki', 7654, 'Kg', 654, 'food', 5005716, 'imported', '2021-02-20', '2020-12-30'),
(8, 'ibitonki', 7654, 'Kg', 654, 'food', 5005716, 'imported', '2021-02-20', '2020-12-30'),
(9, 'ibitonki', 7654, 'Kg', 654, 'food', 5005716, 'imported', '2021-02-20', '2020-12-30'),
(10, 'ibitonki', 7654, 'Kg', 654, 'food', 5005716, 'imported', '2021-02-20', '2020-12-30'),
(11, 'beefburger', 7654, 'Kg', 6543, 'food', 50080122, 'imported', '2021-02-20', '2020-12-30'),
(12, 'beefburger', 7654, 'Kg', 6543, 'food', 50080122, 'imported', '2021-02-20', '2020-12-30'),
(13, 'beefburger', 7654, 'Kg', 6543, 'food', 50080122, 'imported', '2021-02-20', '2020-12-30'),
(14, 'beefburger', 7654, 'Kg', 6543, 'food', 50080122, 'imported', '2021-02-20', '2020-12-30'),
(15, 'beefburger', 7654, 'Kg', 6543, 'food', 50080122, 'imported', '2021-02-20', '2020-12-30'),
(16, 'banana', 987655, 'Kg', 765, 'fruits', 755556075, 'imported', '2021-02-20', '2020-12-30'),
(17, 'banana', 987655, 'Kg', 765, 'fruits', 755556075, 'imported', '2021-02-20', '2020-12-30'),
(18, 'banana', 987655, 'Kg', 765, 'fruits', 755556075, 'imported', '2021-02-20', '2020-12-30'),
(19, 'banana', 987655, 'Kg', 765, 'fruits', 755556075, 'imported', '2021-02-20', '2020-12-30'),
(27, 'ibitonki', 53683, '', 7654, 'food', 410889682, 'imported', '2045-09-24', '2020-12-30'),
(28, 'ibitonki', 0, 'Kg', 7654, 'food', 0, 'imported', '2045-09-24', '2020-12-30'),
(29, 'ibitonki', 0, 'Kg', 7654, 'food', 0, 'imported', '2045-09-24', '2020-12-30'),
(30, 'ibitonki', 0, 'Kg', 7654, 'food', 0, 'imported', '2045-09-24', '2020-12-30'),
(31, 'ibitonki', 21389821, 'Kg', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-30'),
(32, 'chicken', 6, 'Kg', 1000, 'food', 6000, 'imported', '0000-00-00', '2020-12-30'),
(33, 'ibitonki', 354, '', 7654, 'food', 0, 'imported', '0000-00-00', '2020-12-31'),
(34, 'ibitonki', 354, '', 7654, 'food', 0, 'imported', '2045-09-24', '2020-12-31'),
(35, 'ibitonki', 354, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(36, 'ibitonki', 678, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(37, 'ibitonki', 678, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(38, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(39, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(40, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(41, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(42, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(43, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(44, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(45, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(46, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(47, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(48, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(49, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(50, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(51, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(52, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(53, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(54, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(55, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(56, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(57, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(58, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(59, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(60, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(61, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(62, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(63, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(64, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(65, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(66, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(67, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(68, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(69, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(70, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(71, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(72, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(73, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(74, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(75, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(76, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(77, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(78, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(79, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(80, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(81, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(82, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(83, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(84, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(85, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(86, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(87, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(88, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(89, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(90, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(91, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(92, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(93, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(94, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(95, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(96, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(97, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(98, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(99, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(100, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(101, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(102, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(103, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(104, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(105, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(106, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(107, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(108, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(109, 'ibitonki', 78, '', 7654, 'food', 2147483647, 'imported', '2045-09-24', '2020-12-31'),
(110, 'ibitonki', 87654, 'Kg', 875, 'food', 76697250, 'imported', '0000-00-00', '2021-01-01'),
(111, 'ibitonki', 765, 'Kg', 87654, 'food', 67055310, 'imported', '0000-00-00', '2021-01-02'),
(115, 'intoryi', 100, 'Kg', 100, 'meat', 10000, 'imported', '0000-00-00', '2021-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `skeys`
--

CREATE TABLE `skeys` (
  `id` int(6) UNSIGNED NOT NULL,
  `keyname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skeys`
--

INSERT INTO `skeys` (`id`, `keyname`) VALUES
(1, 'jkdsjfkdks'),
(2, 'jkdsjfkdks'),
(3, 'jkdsjfkdks'),
(4, 'kasjdh,jgsyfgugdiusfhijds');

-- --------------------------------------------------------

--
-- Structure for view `namaa`
--
DROP TABLE IF EXISTS `namaa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `namaa`  AS  select `imported`.`p_name` AS `p_name`,`notification`.`trans` AS `trans` from (`notification` left join `imported` on((`imported`.`p_name` = `notification`.`p_name`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imported`
--
ALTER TABLE `imported`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `skeys`
--
ALTER TABLE `skeys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `imported`
--
ALTER TABLE `imported`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `skeys`
--
ALTER TABLE `skeys`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
