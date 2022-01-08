-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2022 at 10:15 AM
-- Server version: 10.3.31-MariaDB-0+deb10u1
-- PHP Version: 7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak`
--

-- --------------------------------------------------------

--
-- Table structure for table `unsur_laporan_keuangan`
--

CREATE TABLE `unsur_laporan_keuangan` (
  `no_unsur` int(11) NOT NULL,
  `nama_unsur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unsur_laporan_keuangan`
--

INSERT INTO `unsur_laporan_keuangan` (`no_unsur`, `nama_unsur`) VALUES
(1, 'Aset'),
(2, 'Liability'),
(3, 'Aset Neto'),
(4, 'Pendapatan'),
(5, 'Beban'),
(6, 'Dengan Pembatasan dari Pemberi Sumber Daya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `unsur_laporan_keuangan`
--
ALTER TABLE `unsur_laporan_keuangan`
  ADD PRIMARY KEY (`no_unsur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `unsur_laporan_keuangan`
--
ALTER TABLE `unsur_laporan_keuangan`
  MODIFY `no_unsur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
