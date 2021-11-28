-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 12:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprog`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` char(2) NOT NULL,
  `gender` enum('muško','žensko') NOT NULL,
  `about` text NOT NULL,
  `role` text NOT NULL DEFAULT 'User',
  `valid` int(11) DEFAULT 0,
  `create` tinyint(1) NOT NULL,
  `modificate` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `country`, `gender`, `about`, `role`, `valid`, `create`, `modificate`, `date`) VALUES
(1, 'Jelena', 'Berković', 'jberkovic93@gmail.com', 'Jelena', '$2y$12$67sjCiOdCsiQKOkMB4TsJ.ciQVD29UYxF9DWebPspapaVPrhAeeuW', 'HR', 'žensko', '', 'Admin', 1, 0, 0, '2021-11-28 09:00:22'),
(8, 'Mario', 'Berkovic', 'mario.berkovic@gmail.com', 'Marioo', '$2y$12$qXVuzHsBgMd/kfDqBHLMDuN2PbwO6laLEqAATmqZvM.EIEIUVPHlq', 'HR', 'muško', '', 'Editor', 1, 0, 0, '2021-11-27 17:25:45'),
(9, 'Zrinka', 'Perić', 'zrinka@gmail.com', 'Zrine', '$2y$12$.SZxr47kD9jPamu42lVcUe6yhrzivYvojVe0e5OXylu/U9OrWt7ni', 'BR', 'žensko', '', 'User', 1, 0, 0, '2021-11-27 17:21:57'),
(10, 'Ante', 'Antić', 'ante@gmail.com', 'Antee', '$2y$12$KzMZm75QyZkL1NmMFyRb5OkOlIK2s9Dvputbp2lDD45y2uSji6g7O', 'AR', 'muško', '', 'User', 0, 0, 0, '2021-11-27 17:17:23'),
(13, 'Matee', 'Matić', 'matemate@gmail.com', 'Matee', '$2y$12$/.CdUjA0ytedLHvUBCLEWuMVhUKKdBc3U.q0WpnTu.wBPWNPHbOh2', 'TD', 'muško', '', 'User', NULL, 0, 0, '2021-11-27 17:17:35'),
(15, 'Doris', 'Pavić', 'doris@gmail.com', 'doris', '$2y$12$R0zr156KfGIaWlC6XY78D.GoeRFU6ud5ieRRLNpWQrFO4Baef5IwS', 'NO', 'žensko', '', 'User', NULL, 0, 0, '2021-11-28 08:28:32'),
(16, 'Mijo', 'Erak', 'mijo@gmail.com', 'mijoo', '$2y$12$keP/MNu6TLmV3C5a2mtFR.YwEmUcdGavb4ZwEb9GxByb/hl/ldUCC', 'TH', 'muško', '', 'User', NULL, 0, 0, '2021-11-27 17:18:08'),
(20, 'gdygr', 'drhrt', 'sgfe@egsd', 'segds', '$2y$12$MyFD6M6jxPTL1hwUx3gdhebxqMdANPVMq5pKG4vct/7UohONQltTy', 'AG', 'žensko', '', '', 1, 0, 0, '2021-11-28 09:23:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_key` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
