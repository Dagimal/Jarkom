-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2017 at 11:50 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tag` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `isi`, `waktu`, `tag`, `gambar`) VALUES
(110, 'background gelap bikin hemat baterai???', '<p><img alt="" src="/bootstrap%20jarkom/ckeditor/kcfinder/upload/images/download%20(1).jpg" style="height:248px; width:400px" /></p>\r\n\r\n<hr />\r\n<p>Pasti diantara kalian pernah denger kalo pasang background yang gelap pada PC atau laptop kita bakal bikin perangkat tersebut jadi awet baterai :p ,disini saya mau ngasih tau aja kalo itu semua <strong>SALAH KAPRAH,&nbsp;</strong>kenapa saya bilang salah? Itu karena background gelap nggak berpengaruh sama sekali dengan keawetan baterai kalian, sebuah perangkat memancarkan cahaya dari backlight layar perangkat tersebut ,jadi walaupun background nya gelap tetep aja kalo brightness nya terang ya sama aja gan&nbsp;</p>\r\n\r\n<p>Jadi intinya background gelap <strong>SAMA SEKALI NGGAK BERPENGARUH&nbsp;</strong>dengan ketahanan baterai perangkat yang kalian pakai, yang mempengaruhi ketahanan baterai perangkat kalian ya backlight itu sendiri, semakin terang semakin <s>baik</s>&nbsp;boros baterai :)</p>\r\n\r\n<p>Sekian artikel dari saya, dan sampai berjumpa di artikel2 berikutnya :)</p>\r\n', '2017-03-07 11:37:38', 'Komputer', '7368-programmer-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'dagimal', 'dagimal102938', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;--
-- Database: `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
