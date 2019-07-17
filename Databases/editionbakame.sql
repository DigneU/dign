-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 08:31 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `editionbakame`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`) VALUES
(1, 'digne', 'digne');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `inventory_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `detaills` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `copy` int(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`inventory_id`, `book_title`, `author`, `price`, `cover`, `detaills`, `description`, `copy`, `time`) VALUES
(2, 'Water', 'Inyange Industry', '500', 'water.jpg', '', 'Water from Inyange Industry', 50, '26/06/2019'),
(16, 'cheese', 'Sarah', '500', 'cheese.jpg', 'Employers reminded to guarantee Health and Safety at workplaces.pdf', '', 20, '06/26/2019');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `username`, `password`, `firstname`, `lastname`, `id_number`, `address`, `email`, `phone`) VALUES
(1, 'Didi', '12345678', 'Diane', 'Uwamahoro', '199870048497179', 'Nyarugenge', 'uwamahorodiane@gmail.com', '0789966741'),
(3, 'digne1', 'mmmmmmmmmmR1', 'DianeO', 'UwamahoroO', '1199870048497179', 'JIJI', 'umwaliwasedigne@akilahinstitute.org', '0789977841'),
(4, 'digne2', '123456789', 'DianEU', 'UwamahoroA', '1199870049487172', 'Rwanda Country ,Kigali City, kicukiro District', 'uweragloria123@gmail.com', '0789977841'),
(5, 'AssoumptaI', 'imbabazizayo', 'Assoumpta', 'Imbabazizayo', '1199870040487179', 'Rwanda Country ,Kigali City, kicukiro District', 'imbabazizayoasoumpta@akilahinstitute.org', '0728802489'),
(6, 'Joselyne2', '123456789', 'Joselyne', 'Uwamahoro', '1199800494892979', 'Rwanda Country ,Kigali City, kicukiro District', 'umwaliwasedigne@akilahinstitute.org', '0789977841');

-- --------------------------------------------------------

--
-- Table structure for table `messade`
--

CREATE TABLE `messade` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messade`
--

INSERT INTO `messade` (`id`, `user_id`, `email`, `subjects`) VALUES
(7, 1, 'uwamahorodiane@gmail.com', 'helloo'),
(8, 3, 'umwaliwasedigne@akilahinstitute.org', 'hello this is message from admin of the system'),
(9, 3, 'umwaliwasedigne@akilahinstitute.org', 'hjsgfsjhfbsjdfzbnsdjkfbsdz\r\nsdjxmnsdk,mndsx '),
(10, 1, 'uwamahorodiane@gmail.com', 'hello weeeeee');

-- --------------------------------------------------------

--
-- Table structure for table `sold_books`
--

CREATE TABLE `sold_books` (
  `sold_id` int(11) NOT NULL,
  `book` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `messade`
--
ALTER TABLE `messade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_books`
--
ALTER TABLE `sold_books`
  ADD PRIMARY KEY (`sold_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messade`
--
ALTER TABLE `messade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sold_books`
--
ALTER TABLE `sold_books`
  MODIFY `sold_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
