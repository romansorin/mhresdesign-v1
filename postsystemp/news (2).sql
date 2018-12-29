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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` mediumtext COLLATE utf8mb4_unicode_ci,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`title`, `content`, `category`, `date_created`, `date_modified`, `image`, `author`, `id`) VALUES
('dasd', 'asdasd', 'asdasd', '2018-12-24 13:29:37', NULL, NULL, '', 1158),
('wqfqfqdasdas', 'asdasdasdsada', 'dadqdqwd', '2018-12-24 13:29:46', NULL, NULL, '', 1160),
('Another insert TETSTSA', 'aaaassgSbSn', 'a adasd qwd', '2018-12-24 17:47:52', NULL, NULL, '', 1164),
(' dfgfdgfd', 'vnvnxtgdg', 'gdfdfbdfn', '2018-12-24 17:47:56', NULL, NULL, '', 1165),
('13532535', 'bcvncmtmdytkyjtshehb', '4tegdrxgmdb', '2018-12-24 17:48:01', NULL, NULL, '', 1166),
('try', 'datetime purgsdgbseazHBsderhSZHBszhpsel', 'again', '2018-12-24 20:06:00', NULL, NULL, '', 1169),
('dasvdasd', 'rqahfkmjhjnrf', 'sadashsrhj', '2018-12-26 16:32:33', NULL, NULL, '', 1174),
('dasdaSF', 'dfaVEDQAdawd', 'asfdbandfa', '2018-12-26 19:08:38', NULL, NULL, '', 1175),
('hdjnhgwgf', 'fwfasf', 'efqwdfqwfqw', '2018-12-26 19:19:26', NULL, NULL, '', 1176),
('adasdaghba', 'afawdqW', 'fafag', '2018-12-26 19:37:05', NULL, NULL, '', 1177),
('egsdfasdfc', 'dqaDsd', 'cvxzcazscaws', '2018-12-26 20:20:28', NULL, NULL, '', 1179),
('dhbjdf', 'esfasfsDg', 'hw', '2018-12-26 20:23:51', NULL, NULL, 'admin', 1181),
('asfasgas', 'dawdawdasv', 'gasga', '2018-12-26 20:25:21', NULL, NULL, '', 1182),
('asfasgasdsadag', 'dawdawdasvasfsd', 'gasga', '2018-12-26 20:25:57', NULL, NULL, 'admin', 1183),
('dadascas', 'wgvSBA', 'asvv', '2018-12-27 14:54:57', NULL, NULL, 'roman', 1184),
('dsadasv', 'ASDasv ', 'sadsd', '2018-12-27 18:24:09', NULL, NULL, 'roman', 1186),
('asdas', 'dasdas', 'dasdsa', '2018-12-27 18:29:30', NULL, NULL, 'roman', 1187),
('sadsa', 'vbsd b', 'sdasba d', '2018-12-27 18:32:22', NULL, NULL, 'roman', 1188),
('HwfrgbG', 'gqrgq', 'ggwg', '2018-12-28 01:00:20', NULL, NULL, 'roman', 1189),
('asdasdeqwe', 'afasdsfwetgqereqwew', 'gvsgvsdasdsd', '2018-12-28 09:17:10', '2018-12-28 09:17:31', NULL, 'admin', 1190),
('asd', 'dassadassad', 'dsaadssadads', '2018-12-28 14:31:12', NULL, NULL, 'admin', 1191);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1193;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
