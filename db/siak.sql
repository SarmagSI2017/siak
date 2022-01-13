-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2022 at 11:18 AM
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
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `no_reff` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_reff` varchar(40) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`no_reff`, `id_user`, `nama_reff`, `keterangan`) VALUES
(111, 1, 'Kas', 'Kas'),
(112, 1, 'Piutang', 'Piutang Usaha'),
(113, 1, 'Perlengkapan', 'Perlengkapan Perusahaan'),
(121, 1, 'Peralatan', 'Peralatan Perusahaan'),
(122, 1, 'Akumulasi Peralatan', 'Akumulasi Peralatan'),
(211, 1, 'Utang Usaha', 'Utang Usaha'),
(311, 1, 'Modal', 'Modal'),
(312, 1, 'Prive', 'Prive'),
(411, 1, 'Pendapatan', 'Pendapatan'),
(511, 1, 'Beban Gaji', 'Beban Gaji'),
(512, 1, 'Beban Sewa', 'Beban Sewa'),
(513, 1, 'Beban Penyusutan Peralatan', 'Beban Penyusutan Peralatan'),
(514, 1, 'Beban Lat', 'Beban Lat'),
(515, 1, 'Beban Perlengkapan', 'Beban Perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `akun_temp`
--

CREATE TABLE `akun_temp` (
  `no_reff` varchar(25) NOT NULL,
  `nama_reff` varchar(50) NOT NULL,
  `saldo_normal` varchar(25) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `unsur_laporan_keuangan` int(5) NOT NULL,
  `induk` varchar(25) DEFAULT NULL,
  `is_atomic` int(5) NOT NULL COMMENT 'yang bisa transaksi 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_temp`
--

INSERT INTO `akun_temp` (`no_reff`, `nama_reff`, `saldo_normal`, `keterangan`, `unsur_laporan_keuangan`, `induk`, `is_atomic`) VALUES
('1-1000', 'Kas dan Setara Kas', 'Debit', NULL, 1, NULL, 0),
('1-1100', 'Kas Kecil', 'Debit', NULL, 1, '1-1000', 1),
('1-1200', 'Setara Kas', 'Debit', NULL, 1, '1-1000', 0),
('1-1210', 'Deposito', 'Debit', NULL, 1, '1-1200', 0),
('1-1211', 'Deposito A', 'Debit', NULL, 1, '1-1210', 1),
('1-1212', 'Deposito B', 'Debit', NULL, 1, '1-1210', 1),
('1-1220', 'Giro/Tabungan', 'Debit', NULL, 1, '1-1200', 0),
('1-1221', 'Giro A', 'Debit', NULL, 1, '1-1220', 1),
('1-1222', 'Giro B', 'Debit', NULL, 1, '1-1220', 1),
('1-1223', 'Giro C', 'Debit', NULL, 1, '1-1220', 1),
('1-1224', 'Giro D', 'Debit', '', 1, NULL, 1),
('1-2000', 'Persediaan', 'Debit', NULL, 1, NULL, 1),
('1-3000', 'Piutang', 'Debit', NULL, 1, NULL, 0),
('1-3100', 'Piutang Karyawan', 'Debit', NULL, 1, '1-3000', 1),
('1-3200', 'Piutang Usaha', 'Debit', NULL, 1, '1-3000', 1),
('1-3300', 'Piutang Lain-lain', 'Debit', NULL, 1, '1-3000', 1),
('2-1000', 'Liability Jangka Pendek', 'Kredit', NULL, 2, NULL, 0),
('2-1100', 'Utang Gaji', 'Kredit', NULL, 2, '2-1000', 1),
('2-1200', 'Uang Muka', 'Kredit', NULL, 2, '2-1000', 1),
('2-1300', 'Utang Bank Jatuh Tempo', 'Kredit', NULL, 2, '2-1000', 1),
('2-2000', 'Liability Jangka Panjang', 'Kredit', NULL, 2, NULL, 0),
('2-2100', 'Utang Bank', 'Kredit', NULL, 2, '2-2000', 1),
('2-2200', 'Utang A', 'Kredit', NULL, 2, '2-2000', 1),
('3-1000', 'Aset Tanpa Pembatasan', 'Debit', NULL, 3, NULL, 1),
('3-2000', 'Aset dengan Pembatasan', 'Debit', NULL, 3, NULL, 1),
('4-1000', 'Sumbangan', 'Kredit', NULL, 4, NULL, 1),
('4-2000', 'Jasa', 'Kredit', NULL, 4, NULL, 1),
('5-1000', 'Beban A', 'Debit', '', 5, NULL, 1),
('5-2000', 'Beban B', 'Debit', '', 5, NULL, 1),
('6-1000', 'Pendapatan', 'Kredit', NULL, 6, NULL, 0),
('6-1100', 'Pendapatan A', 'Kredit', NULL, 6, '6-1000', 1),
('6-1200', 'Pendapatan B', 'Kredit', NULL, 6, '6-1000', 1),
('6-2000', 'Beban', 'Debit', NULL, 6, NULL, 0),
('6-2100', 'Beban A', 'Debit', NULL, 6, '6-2000', 1),
('6-2200', 'Beban B', 'Debit', NULL, 6, '6-2000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_reff` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_saldo` enum('debit','kredit','','') NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(15127, 1, '4-2000', '2022-01-09 15:57:12', '2022-01-09', 'kredit', 3000, 'Jasa Pengantaran'),
(15128, 1, '1-1100', '2022-01-12 12:14:33', '2022-01-12', 'debit', 20000, ''),
(15129, 1, '2-1100', '2022-01-12 12:14:33', '2022-01-12', 'kredit', 20000, ''),
(15130, 1, '1-1100', '2022-01-12 12:15:31', '2021-02-01', 'debit', 20000, ''),
(15131, 1, '2-1100', '2022-01-12 12:15:31', '2021-02-01', 'kredit', 20000, ''),
(15132, 1, '6-2100', '2022-01-12 12:38:47', '2022-01-12', 'debit', 20000, ''),
(15133, 1, '1-1100', '2022-01-12 12:38:47', '2022-01-12', 'kredit', 20000, ''),
(15134, 1, '6-2100', '2022-01-12 12:39:19', '2021-02-03', 'debit', 20000, ''),
(15135, 1, '1-1100', '2022-01-12 12:39:19', '2021-02-03', 'kredit', 20000, ''),
(15136, 1, '1-1100', '2022-01-13 11:17:44', '2022-01-13', 'debit', 1000000, ''),
(15137, 1, '1-3200', '2022-01-13 11:17:44', '2022-01-13', 'kredit', 1000000, ''),
(15138, 1, '1-1100', '2022-01-13 11:36:59', '2017-12-03', 'debit', 1500000, ''),
(15139, 1, '1-3300', '2022-01-13 11:36:59', '2017-12-03', 'kredit', 1500000, ''),
(15142, 1, '6-2100', '2022-01-13 11:40:13', '2017-12-05', 'debit', 500000, ''),
(15143, 1, '1-1100', '2022-01-13 11:40:13', '2017-12-05', 'kredit', 500000, ''),
(15144, 1, '1-1100', '2022-01-13 11:41:15', '2017-12-04', 'debit', 1000000, ''),
(15145, 1, '4-1000', '2022-01-13 11:41:15', '2017-12-04', 'kredit', 1000000, ''),
(15146, 1, '5-1000', '2022-01-13 11:42:16', '2018-11-03', 'debit', 500000, ''),
(15147, 1, '1-1100', '2022-01-13 11:42:16', '2018-11-03', 'kredit', 500000, ''),
(15148, 1, '2-1100', '2022-01-13 11:43:13', '2018-11-04', 'debit', 1000000, ''),
(15149, 1, '1-1100', '2022-01-13 11:43:13', '2018-11-04', 'kredit', 1000000, ''),
(15153, 1, '1-1100', '2022-01-13 11:45:53', '2018-11-05', 'debit', 2000000, ''),
(15154, 1, '4-1000', '2022-01-13 11:45:53', '2018-11-05', 'kredit', 1000000, ''),
(15155, 1, '4-2000', '2022-01-13 11:45:53', '2018-11-05', 'kredit', 1000000, ''),
(15156, 1, '1-2000', '2022-01-13 11:47:16', '2019-12-03', 'debit', 750000, ''),
(15157, 1, '2-2100', '2022-01-13 11:47:16', '2019-12-03', 'kredit', 750000, ''),
(15158, 1, '1-1100', '2022-01-13 11:51:40', '2019-12-05', 'debit', 2000000, ''),
(15159, 1, '4-2000', '2022-01-13 11:51:40', '2019-12-05', 'kredit', 2000000, ''),
(15160, 1, '5-2000', '2022-01-13 11:52:07', '2019-12-07', 'debit', 1000000, ''),
(15161, 1, '1-1100', '2022-01-13 11:52:07', '2019-12-07', 'kredit', 1000000, ''),
(15162, 1, '2-2100', '2022-01-13 11:53:52', '2020-10-03', 'debit', 2000000, ''),
(15163, 1, '1-1100', '2022-01-13 11:53:52', '2020-10-03', 'kredit', 2000000, ''),
(15164, 1, '1-1100', '2022-01-13 11:55:54', '2020-10-14', 'debit', 1100000, ''),
(15165, 1, '4-1000', '2022-01-13 11:55:54', '2020-10-14', 'kredit', 1100000, ''),
(15166, 1, '5-1000', '2022-01-13 11:56:13', '2022-01-13', 'debit', 500000, ''),
(15167, 1, '1-1100', '2022-01-13 11:56:13', '2022-01-13', 'kredit', 500000, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('laki-laki','perempuan','','') NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jk`, `alamat`, `email`, `username`, `password`, `last_login`) VALUES
(1, 'Admin Sarmag', 'laki-laki', 'JL.H.B Jassin No.337', 'sarmag@gmail.com', 'admin', '69005bb62e9622ee1de61958aacf0f63', '2022-01-13 11:51:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_reff`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `akun_temp`
--
ALTER TABLE `akun_temp`
  ADD UNIQUE KEY `no_reff` (`no_reff`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `no_reff` (`no_reff`);

--
-- Indexes for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `no_reff` (`no_reff`);

--
-- Indexes for table `unsur_laporan_keuangan`
--
ALTER TABLE `unsur_laporan_keuangan`
  ADD PRIMARY KEY (`no_unsur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15168;
--
-- AUTO_INCREMENT for table `unsur_laporan_keuangan`
--
ALTER TABLE `unsur_laporan_keuangan`
  MODIFY `no_unsur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
