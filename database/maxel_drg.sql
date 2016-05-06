-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2016 at 04:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxel_drg`
--
CREATE DATABASE IF NOT EXISTS `maxel_drg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `maxel_drg`;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `pasien_id` int(11) NOT NULL,
  `pasien_nama` varchar(100) DEFAULT NULL,
  `pasien_alamat` varchar(100) DEFAULT NULL,
  `pasien_hp` varchar(25) DEFAULT NULL,
  `pasien_email` varchar(100) DEFAULT NULL,
  `pasien_lahir_tanggal` date DEFAULT NULL,
  `pasien_usia` int(11) DEFAULT '1',
  `pasien_status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_username` varchar(15) DEFAULT NULL,
  `user_password` varchar(32) DEFAULT NULL,
  `user_alamat` varchar(100) DEFAULT NULL,
  `user_hp` varchar(25) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_tipe` tinyint(4) DEFAULT '3' COMMENT '1=Admin, 2=Dokter. 3=Resepsionis',
  `role_id` tinyint(4) DEFAULT '1',
  `user_status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_alamat`, `user_hp`, `user_email`, `user_tipe`, `role_id`, `user_status`) VALUES
(1, 'coolermaster', 'cooler', 'cooler', 'banyu urip kidul ', '0821319722222', 'cooler@asd.com', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasien_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `pasien_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
