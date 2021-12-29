-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2021 at 09:07 PM
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
-- Table structure for table `sub_unsur_laporan_keuangan`
--

CREATE TABLE `sub_unsur_laporan_keuangan` (
  `no_sub` int(11) NOT NULL,
  `nama_sub` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_unsur_laporan_keuangan`
--

INSERT INTO `sub_unsur_laporan_keuangan` (`no_sub`, `nama_sub`) VALUES
(1, 'Aset Lancar'),
(2, 'Aset Tidak Lancar'),
(3, 'Liabilitas Lancar'),
(4, 'Liabilitas Tidak Lancar'),
(5, 'Ekuitas Pemilik'),
(6, 'Ekuitas Lainnya'),
(7, 'Penghasilan Operasional'),
(8, 'Penghasilan Non Operasional'),
(9, 'Beban Operasional'),
(10, 'Beban Non Operasional');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_unsur_laporan_keuangan`
--
ALTER TABLE `sub_unsur_laporan_keuangan`
  ADD PRIMARY KEY (`no_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_unsur_laporan_keuangan`
--
ALTER TABLE `sub_unsur_laporan_keuangan`
  MODIFY `no_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
