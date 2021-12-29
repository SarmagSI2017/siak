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
-- Table structure for table `akun_temp`
--

CREATE TABLE `akun_temp` (
  `no_reff` varchar(25) NOT NULL,
  `nama_reff` varchar(50) NOT NULL,
  `saldo_normal` varchar(25) NOT NULL COMMENT '1 debit 0 kredit',
  `keterangan` varchar(50) DEFAULT NULL,
  `unsur_laporan_keuangan` int(5) NOT NULL,
  `sub_unsur_laporan_keuangan` int(5) DEFAULT NULL,
  `induk` varchar(25) DEFAULT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_temp`
--

INSERT INTO `akun_temp` (`no_reff`, `nama_reff`, `saldo_normal`, `keterangan`, `unsur_laporan_keuangan`, `sub_unsur_laporan_keuangan`, `induk`, `status`) VALUES
('1-1000', 'Aset Lancar dan Kontra', 'Debit', NULL, 1, NULL, NULL, 1),
('1-1110', 'Kas', 'Debit', NULL, 1, 1, '1-1000', 1),
('1-1120', 'Kas Kecil', 'Debit', NULL, 1, 1, '1-1000', 1),
('1-1130', 'Investasi Jangka Pendek', 'Debit', NULL, 1, 1, '1-1000', 1),
('1-1210', 'Piutang Usaha', 'Debit', NULL, 1, 1, '1-1000', 1),
('1-1220', 'Cadangan Kerugian Piutang', 'Kredit', NULL, 1, 1, '1-1000', 1),
('1-1230', 'Piutang Wesel', 'Debit', NULL, 1, 1, '1-1000', 1),
('1-1300', 'Perlengkapan', 'Debit', NULL, 1, 1, '1-1000', 1),
('1-1400', 'Beban Sewa Dibayar Dimuka', 'Debit', NULL, 1, 1, '1-1000', 1),
('1-2000', 'Aset Tidak Lancar dan Kontra', 'Debit', NULL, 1, NULL, NULL, 1),
('1-2100', 'Properti, Mesin, dan Peralatan', 'Debit', NULL, 1, NULL, '1-2000', 1),
('1-2110', 'Tanah', 'Debit', NULL, 1, 2, '1-2100', 1),
('1-2121', 'Gedung', 'Debit', NULL, 1, 2, '1-2100', 1),
('1-2122', 'Akumulasi Depresiasi Gedung', 'Kredit', NULL, 1, 2, '1-2100', 1),
('1-2131', 'Kendaraan', 'Debit', NULL, 1, 2, '1-2100', 1),
('1-2132', 'Akumulasi Depresiasi Kendaraan', 'Kredit', NULL, 1, 2, '1-2100', 1),
('1-2141', 'Peralatan', 'Debit', NULL, 1, 2, '1-2100', 1),
('1-2142', 'Akumulasi Depresiasi Peralatan', 'Kredit', NULL, 1, 2, '1-2100', 1),
('1-2200', 'Aset Tidak Berwujud', 'Debit', NULL, 1, NULL, '1-2000', 1),
('1-2210', 'Paten', 'Debit', NULL, 1, 2, '1-2200', 1),
('1-2220', 'Merk Dagang', 'Debit', NULL, 1, 2, '1-2200', 1),
('1-2300', 'Investasi Jangka Panjang', 'Debit', NULL, 1, NULL, '1-2000', 1),
('1-2310', 'Investasi Obligasi Jangka Panjang', 'Debit', NULL, 1, 2, '1-2300', 1),
('2-1000', 'Liabilitas Lancar dan Kontra', 'Kredit', NULL, 2, NULL, NULL, 1),
('2-1100', 'Utang Usaha', 'Kredit', NULL, 2, 6, '2-1000', 1),
('2-1200', 'Utang Wesel', 'Kredit', NULL, 2, 6, '2-1000', 1),
('2-1300', 'Utang Beban', 'Kredit', NULL, 2, 6, '2-1000', 1),
('2-1400', 'Utang Jangka Panjang Jatuh Tempo', 'Kredit', NULL, 2, 6, '2-1000', 1),
('2-1500', 'Pendapatan Diterima Dimuka', 'Kredit', NULL, 2, 6, '2-1000', 1),
('2-1600', 'Pendapatan Sewa Diterima Dimuka', 'Kredit', NULL, 2, 6, '2-1000', 1),
('2-1700', 'Utang Pajak', 'Kredit', NULL, 2, 6, '2-1000', 1),
('2-2000', 'Liabilitas Tidak Lancar dan Kontra', 'Kredit', NULL, 2, NULL, NULL, 1),
('2-2100', 'Utang Bank', 'Kredit', NULL, 2, 6, '2-2000', 1),
('2-2200', 'Utang Hipotek', 'Kredit', NULL, 2, 6, '2-2000', 1),
('2-2300', 'Utang Obligasi', 'Kredit', NULL, 2, 6, '2-2000', 1),
('3-1000', 'Ekuitas Pemilik dan Kontra', 'Kredit', NULL, 3, NULL, NULL, 1),
('3-1110', 'Modal Pemilik', 'Kredit', NULL, 3, 6, '3-1000', 1),
('3-1120', 'Prive', 'Debit', NULL, 3, 6, '3-1000', 1),
('3-1210', 'Saham Biasa', 'Kredit', NULL, 3, 6, '3-1000', 1),
('3-1220', 'Agio - Saham Biasa', 'Kredit', NULL, 3, 6, '3-1000', 1),
('3-1310', 'Saham Preferen', 'Kredit', NULL, 3, 6, '3-1000', 1),
('3-1320', 'Agio - Saham Preferen', 'Kredit', NULL, 3, 6, '3-1000', 1),
('3-1410', 'Saham Tresuri', 'Debit', NULL, 3, 6, '3-1000', 1),
('3-1420', 'Agio - Saham Tresuri', 'Kredit', NULL, 3, 6, '3-1000', 1),
('3-1500', 'Tambahan Modal Disetor', 'Kredit', NULL, 3, 6, '3-1000', 1),
('3-1600', 'Dividen', 'Debit', NULL, 3, 6, '3-1000', 1),
('3-2000', 'Ekuitas Lainnya dan Kontra', 'Kredit', NULL, 3, NULL, NULL, 1),
('3-2100', 'Saldo Laba', 'Kredit', NULL, 3, 2, '3-2000', 1),
('3-2200', 'Ikhtisar Laba Rugi', 'Debit/Kredit', NULL, 3, 2, '3-2000', 1),
('4-1000', 'Penghasilan Operasional dan Kontra', 'Kredit', NULL, 4, NULL, NULL, 1),
('4-1100', 'Pendapatan Jasa', 'Kredit', NULL, 4, 9, '4-1000', 1),
('4-1200', 'Diskon Pendapatan', 'Debit', NULL, 4, 9, '4-1000', 1),
('4-2000', 'Penghasilan Non-Operasional dan Kontra', 'Kredit', NULL, 4, NULL, NULL, 1),
('4-2100', 'Penjualan Aset', 'Kredit', NULL, 4, 6, '4-2000', 1),
('4-2200', 'Pendapatan Lain-Lain', 'Kredit', NULL, 4, 6, '4-2000', 1),
('5-1000', 'Beban Operasional dan Kontra', 'Debit', NULL, 5, NULL, NULL, 1),
('5-1110', 'Beban Gaji dan Honorarium', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1120', 'Beban Utilitas', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1130', 'Beban Kerugian Piutang', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1140', 'Beban Perlengkapan', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1150', 'Beban Sewa', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1160', 'Beban Iklan', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1170', 'Beban Asuransi', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1180', 'Beban Depresiasi', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1190', 'Beban Transportasi', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1210', 'Beban Pemeliharaan dan Perbaikan', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-1220', 'Beban Amortisasi', 'Debit', NULL, 5, 2, '5-1000', 1),
('5-2000', 'Beban Non-Operasional dan Kontra', 'Debit', NULL, 5, NULL, NULL, 1),
('5-2100', 'Beban Bunga', 'Debit', NULL, 5, 2, '5-2000', 1),
('5-2200', 'Beban Pajak Penghasilan', 'Debit', NULL, 5, 2, '5-2000', 1),
('5-2300', 'Beban Lain-Lain', 'Debit', NULL, 5, 2, '5-2000', 1);

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
