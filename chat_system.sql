-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2017 at 11:06 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ChatId` int(11) NOT NULL,
  `ChatUserId` int(11) NOT NULL,
  `ChatText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ChatId`, `ChatUserId`, `ChatText`) VALUES
(9, 2, 'yo1'),
(22, 1, 'sga'),
(23, 1, 'sga'),
(24, 1, 'sga'),
(30, 1, '			hi\n'),
(31, 1, '			hiiiiii\n'),
(36, 1, '			ji\n'),
(37, 1, '			ji\n'),
(38, 1, '			doo\n'),
(39, 1, '			do1\n'),
(40, 1, '			plz\n'),
(41, 1, 'q\n'),
(42, 1, '			qu\n'),
(43, 1, '			sdfh\n'),
(44, 1, '			please\n'),
(45, 1, '			yo\n'),
(46, 2, '			what please\n'),
(47, 2, 'hi\n'),
(48, 1, '			what hi\n'),
(49, 2, 'i just said hi\n'),
(52, 4, 'hey'),
(53, 1, 'ya say\n'),
(54, 4, '			i have a room for you\n'),
(55, 3, 'hello'),
(56, 2, '			hey\n'),
(57, 1, '			hi\n'),
(58, 2, 'wassup??\n'),
(59, 1, 'nothing much\n'),
(60, 2, 'u say\n'),
(61, 2, '			??\n'),
(62, 1, '			ya ya say\n'),
(63, 6, 'YO'),
(64, 6, 'hi'),
(65, 3, '			ha bol\n'),
(66, 6, '			sun na\n'),
(67, 3, 'ha bol\n'),
(68, 6, 'hi'),
(69, 6, '			ha bol\n'),
(70, 4, '			hey\n'),
(71, 4, 'hi\n'),
(72, 6, 'hi'),
(73, 3, '			hey\n'),
(74, 6, '			ya say\n'),
(75, 9, 'hi'),
(76, 7, '			ha bol\n'),
(77, 9, '			actually i wanted to know something\n'),
(78, 9, 'hi'),
(79, 9, '			hey\n'),
(80, 8, '			ha bol\n'),
(81, 9, 'hi'),
(82, 2, '			hey\n'),
(83, 9, '			ha bol\n'),
(84, 9, 'hi\n'),
(85, 2, '			hi\n'),
(86, 1, '			yo\n'),
(87, 9, 'hi\n'),
(88, 9, 'yo\n'),
(89, 9, '	kuch nahi\n		'),
(90, 9, 'hi'),
(91, 9, 'yo'),
(92, 9, 'hey'),
(93, 9, 'yo');

-- --------------------------------------------------------

--
-- Table structure for table `credintials`
--

CREATE TABLE `credintials` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `foreign_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credintials`
--

INSERT INTO `credintials` (`id`, `username`, `password`, `role`, `foreign_id`) VALUES
(1, 'hds@gsx.com', 'abc123', 10, 2),
(2, 'dsh@g.com', 'abc123', 20, 7),
(3, 'asfd', 'abc123', 20, 6),
(4, 'dfhs', 'abc123', 20, 5),
(5, 'admin', 'abc123', 30, 1),
(6, 'nik@v.com', 'abc123', 10, 3),
(7, 'abc@abc.com', 'abc123', 20, 8),
(8, 'bcd@bcd.com', 'abc123', 20, 9),
(9, 'jatin@mail.com', 'abc123', 10, 4),
(10, 'harshada@mail.com', 'abc123', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `chat_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `c_id`, `p_id`, `chat_id`) VALUES
(1, 1, 1, '24,45'),
(2, 1, 2, '25,29,50,51,56,57,58,59,60,61,62,85,86'),
(3, 1, 4, '52,53,54'),
(4, 1, 3, '55'),
(5, 6, 2, '63'),
(7, 6, 4, '68,69,70,71'),
(8, 6, 3, '72,73,74'),
(9, 9, 7, '75,76,77,87,88,90,91,92'),
(10, 9, 8, '78,79,80,89'),
(11, 9, 2, '81,82,83,84,93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatId`);

--
-- Indexes for table `credintials`
--
ALTER TABLE `credintials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ChatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `credintials`
--
ALTER TABLE `credintials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
