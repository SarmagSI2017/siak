-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2022 at 10:13 AM
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
-- Table structure for table `akun_temp`
--

DROP TABLE IF EXISTS `akun_temp`;
CREATE TABLE `akun_temp` (
  `no_reff` varchar(25) NOT NULL,
  `nama_reff` varchar(50) NOT NULL,
  `saldo_normal` varchar(25) NOT NULL COMMENT '1 debit 0 kredit',
  `keterangan` varchar(50) DEFAULT NULL,
  `unsur_laporan_keuangan` int(5) NOT NULL,
  `induk` varchar(25) DEFAULT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_temp`
--

INSERT INTO `akun_temp` (`no_reff`, `nama_reff`, `saldo_normal`, `keterangan`, `unsur_laporan_keuangan`, `induk`, `status`) VALUES
('1-1000', 'Kas dan Setara Kas', 'Debit', NULL, 1, NULL, 1),
('1-1100', 'Kas Kecil', 'Debit', NULL, 1, '1-1000', 1),
('1-1200', 'Setara Kas', 'Debit', NULL, 1, '1-1000', 1),
('1-1210', 'Deposito', 'Debit', NULL, 1, '1-1200', 1),
('1-1211', 'Deposito A', 'Debit', NULL, 1, '1-1210', 1),
('1-1212', 'Deposito B', 'Debit', NULL, 1, '1-1210', 1),
('1-1220', 'Giro/Tabungan', 'Debit', NULL, 1, '1-1200', 1),
('1-1221', 'Giro A', 'Debit', NULL, 1, '1-1220', 1),
('1-1222', 'Giro B', 'Debit', NULL, 1, '1-1220', 1),
('1-1223', 'Giro C', 'Debit', NULL, 1, '1-1220', 1),
('1-2000', 'Persediaan', 'Debit', NULL, 1, NULL, 1),
('1-3000', 'Piutang', 'Debit', NULL, 1, NULL, 1),
('1-3100', 'Piutang Karyawan', 'Debit', NULL, 1, '1-3000', 1),
('1-3200', 'Piutang Usaha', 'Debit', NULL, 1, '1-3000', 1),
('1-3300', 'Piutang Lain-lain', 'Debit', NULL, 1, '1-3000', 1),
('2-1000', 'Liability Jangka Pendek', 'Kredit', NULL, 2, NULL, 1),
('2-1100', 'Utang Gaji', 'Kredit', NULL, 2, '2-1000', 1),
('2-1200', 'Uang Muka', 'Kredit', NULL, 2, '2-1000', 1),
('2-1300', 'Utang Bank Jatuh Tempo', 'Kredit', NULL, 2, '2-1000', 1),
('2-2000', 'Liability Jangka Panjang', 'Kredit', NULL, 2, NULL, 1),
('2-2100', 'Utang Bank', 'Kredit', NULL, 2, '2-2000', 1),
('2-2200', 'Utang A', 'Kredit', NULL, 2, '2-2000', 1),
('3-1000', 'Aset Tanpa Pembatasan', 'Debit', NULL, 3, NULL, 1),
('3-2000', 'Aset dengan Pembatasan', 'Debit', NULL, 3, NULL, 1),
('4-1000', 'Sumbangan', 'Kredit', NULL, 4, NULL, 1),
('4-2000', 'Jasa', 'Kredit', NULL, 4, NULL, 1),
('5-1000', 'Beban A', 'Debit', NULL, 5, NULL, 1),
('5-2000', 'Beban B', 'Debit', NULL, 5, NULL, 1),
('6-1000', 'Pendapatan', 'Kredit', NULL, 6, NULL, 1),
('6-1100', 'Pendapatan A', 'Kredit', NULL, 6, '6-1000', 1),
('6-1200', 'Pendapatan B', 'Kredit', NULL, 6, '6-1000', 1),
('6-2000', 'Beban', 'Debit', NULL, 6, NULL, 1),
('6-2100', 'Beban A', 'Debit', NULL, 6, '6-2000', 1),
('6-2200', 'Beban B', 'Debit', NULL, 6, '6-2000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_temp`
--
ALTER TABLE `akun_temp`
  ADD UNIQUE KEY `no_reff` (`no_reff`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
