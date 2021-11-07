-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 07:40 PM
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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archive` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `picture`, `date`, `archive`) VALUES
(1, 'Održan 12. Dan infrastruktura prostornih podataka 2021.', 'Dvanaesta konferencija posve?ena infrastrukturama prostornih podataka održana je 20. listopada 2021. godine u Rovinju u organizaciji Državne geodetske uprave.', 'news_1_1.jpg', '2021-10-20 22:00:00', 'N'),
(2, 'Održani sastanci sa predstavnicima JLS-a na temu „Uspostave e-registra zgrada', 'Dana 12. i 13. listopada 2021. godine održani su sastanci sa predstavnicima gradova i op?ina sa podru?ja Varaždinske županije vezano za provedbu ugovora „Geoinformati?ke usluge na uspostavi registra zgrada za podru?je Varaždinske županije i izrade višenamjenskog informacijskog sustava registra zgrada', 'news_2.jpg', '2021-10-12 22:00:00', 'N'),
(3, 'Objavljen Višegodišnji program katastarskih izmjera gra?evinskih podru?ja za razdoblje 2021. – 2030.', 'U „Narodnim novinama“ broj 109/2021 od 8. listopada 2021. godine objavljen je Višegodišnji program katastarskih izmjera gra?evinskih podru?ja za razdoblje 2021. – 2030.', 'news_3.jpg', '2021-10-10 22:00:00', 'N');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
