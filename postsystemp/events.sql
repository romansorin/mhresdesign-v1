-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2018 at 07:08 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `category` text,
  `description` text,
  `link` text,
  `event_date` date NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `author` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`category`, `description`, `link`, `event_date`, `date_created`, `date_modified`, `author`, `id`) VALUES
('CategorydsdjsandjabskfHJglAEGHVbejgveckdbvjkqdhvqevb', 'Descnhjkjk', NULL, '2018-12-03', NULL, NULL, '', 1),
('jndvbhsbhaHBAJDbrhjrsd¨ njew jsd hSeqfgslaSMjsglnfw=jbvkdxlqwfd bwf jkeqspwkfj', 'Ladakdsadaksd', 'https://reddit.com', '2018-12-04', NULL, NULL, '', 2),
('sdsdsd', NULL, NULL, '2018-12-07', NULL, NULL, '', 3),
(NULL, NULL, NULL, '2018-12-05', NULL, NULL, '', 4),
('ascs', 'vzvv', 'sadasd', '1970-01-01', NULL, NULL, '', 6),
('sadasdasd', 'asd', 'dasdasd', '1970-01-01', NULL, NULL, '', 7),
('', 'asd', 'dasdasd', '1970-01-01', NULL, NULL, '', 8),
('dasdsad', 'dqwds', 'cvadDs', '2018-12-27', NULL, NULL, '', 9),
('sadasd', 'qwdqwdsd', 'asdasdasd', '2018-12-27', NULL, NULL, '', 10),
('sdsad', 'sdasd', 'asdasdsadasd', '2018-12-20', NULL, NULL, 'roman', 12),
('asdfsf', 'safsdfsdf', 'google.com', '2018-12-28', NULL, NULL, 'admin', 13),
('sdasd', 'asdasdsad', 'sadasdas', '2018-06-16', '2018-12-28 14:16:48', NULL, 'admin', 15),
('asdasdas', 'dasdsadas', '', '2018-12-20', '2018-12-28 14:32:30', NULL, 'admin', 16),
('.;kh;viy;t7d', ';tulytuje5tagr', 'cnn.com', '2018-12-20', '2018-12-28 16:51:08', '2018-12-28 20:45:54', 'admin', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
