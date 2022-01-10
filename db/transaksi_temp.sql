-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 04:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `transaksi_temp`
--

CREATE TABLE `transaksi_temp` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_reff` varchar(25) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_saldo` enum('debit','kredit','','') NOT NULL,
  `saldo` int(11) NOT NULL,
  `Keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_temp`
--

INSERT INTO `transaksi_temp` (`id_transaksi`, `id_user`, `no_reff`, `tgl_input`, `tgl_transaksi`, `jenis_saldo`, `saldo`, `Keterangan`) VALUES
(1, 1, '1-1100', '2022-01-08 15:58:56', '2022-01-08', 'debit', 20000, ''),
(2, 1, '4-1000', '2022-01-06 22:19:16', '2022-01-08', 'kredit', 20000, 'Sumbangan Gunung Ken'),
(3, 1, '5-1000', '2022-01-08 16:27:07', '2021-12-22', 'debit', 2000, 'Beban barang'),
(4, 1, '1-1100', '2022-01-08 16:28:50', '2021-12-29', 'kredit', 2000, ''),
(5, 1, '6-1100', '2022-01-08 18:21:34', '2021-12-01', 'kredit', 6000, 'Sumbangan UG'),
(6, 1, '1-1100', '2022-01-08 18:21:34', '2021-12-01', 'debit', 6000, 'Sumbangan UG'),
(7, 1, '6-1100', '2022-01-08 18:42:22', '2021-11-01', 'kredit', 50000, 'Saldo Awal'),
(8, 1, '1-1100', '2022-01-08 18:42:22', '2021-11-01', 'debit', 50000, 'Saldo Awal'),
(9, 1, '4-1000', '2021-11-01 00:47:10', '2021-11-01', 'kredit', 8000, 'Saldo Awal'),
(10, 1, '1-1100', '2022-01-08 18:47:10', '2021-11-01', 'debit', 8000, 'Saldo Awal'),
(11, 1, '1-1100', '2022-01-09 07:10:45', '2021-12-14', 'debit', 9000, 'Jual Rumah'),
(12, 1, '4-1000', '2022-01-09 07:10:45', '2021-12-14', 'kredit', 9000, 'Jual Rumah'),
(13, 1, '1-1100', '2022-01-09 07:12:41', '2021-12-15', 'debit', 500, 'Jual Permen'),
(14, 1, '4-1000', '2022-01-09 07:12:41', '2021-12-15', 'kredit', 500, 'Jual Permen'),
(15124, 1, '1-1100', '2022-01-09 15:41:53', '2022-01-09', 'debit', 1000, ''),
(15125, 1, '4-1000', '2022-01-09 15:41:53', '2022-01-09', 'kredit', 1000, ''),
(15126, 1, '1-1100', '2022-01-09 15:57:12', '2022-01-09', 'debit', 3000, 'Jasa Pengantaran'),
(15127, 1, '4-2000', '2022-01-09 15:57:12', '2022-01-09', 'kredit', 3000, 'Jasa Pengantaran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `no_reff` (`no_reff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
