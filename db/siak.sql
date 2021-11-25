-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2020 pada 10.42
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `no_reff` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_reff` varchar(40) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
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
-- Struktur dari tabel `transaksi`
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

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `no_reff`, `tgl_input`, `tgl_transaksi`, `jenis_saldo`, `saldo`) VALUES
(15, 1, 111, '2021-11-26 17:45:45', '2021-11-03', 'debit', 80000000),
(16, 1, 311, '2021-11-26 17:45:45', '2021-11-03', 'kredit', 80000000),
(17, 1, 121, '2021-11-26 17:46:37', '2021-11-03', 'debit', 35000000),
(18, 1, 311, '2021-11-26 17:46:37', '2021-11-03', 'kredit', 35000000),
(19, 1, 512, '2021-11-26 17:49:00', '2021-11-04', 'debit', 6000000),
(20, 1, 111, '2021-11-26 17:49:00', '2021-11-04', 'kredit', 6000000),
(21, 1, 111, '2021-11-26 17:52:00', '2021-11-05', 'kredit', 1900000),
(22, 1, 113, '2021-11-26 17:52:00', '2021-11-05', 'debit', 1900000),
(23, 1, 121, '2021-11-26 17:55:08', '2021-11-08', 'debit', 2000000),
(24, 1, 211, '2021-11-26 17:55:08', '2021-11-08', 'kredit', 2000000),
(25, 1, 411, '2021-11-26 17:57:04', '2021-11-10', 'kredit', 950000),
(26, 1, 112, '2021-11-26 17:57:04', '2021-11-10', 'debit', 950000),
(27, 1, 111, '2021-11-26 17:57:49', '2021-11-12', 'debit', 2500000),
(28, 1, 411, '2021-11-26 17:57:49', '2021-11-12', 'kredit', 2500000),
(29, 1, 211, '2021-11-26 17:59:24', '2021-11-15', 'debit', 200000),
(30, 1, 111, '2021-11-26 17:59:24', '2021-11-15', 'kredit', 200000),
(31, 1, 312, '2021-11-26 18:05:40', '2021-11-20', 'debit', 750000),
(32, 1, 111, '2021-11-26 18:05:40', '2021-11-20', 'kredit', 750000),
(33, 1, 111, '2021-11-26 18:06:13', '2021-11-28', 'debit', 750000),
(34, 1, 112, '2021-11-26 18:06:13', '2021-11-28', 'kredit', 750000),
(35, 1, 511, '2021-11-26 18:10:23', '2021-11-29', 'debit', 900000),
(36, 1, 111, '2021-11-26 18:10:23', '2021-11-29', 'kredit', 900000),
(37, 1, 514, '2021-11-26 18:10:57', '2021-11-30', 'debit', 1600000),
(38, 1, 111, '2021-11-26 18:10:57', '2021-11-30', 'kredit', 1600000),
(39, 1, 515, '2021-11-26 18:12:55', '2021-11-30', 'debit', 1150000),
(40, 1, 113, '2021-11-26 18:12:55', '2021-11-30', 'kredit', 1150000),
(41, 1, 513, '2021-11-26 18:14:43', '2021-11-30', 'debit', 250000),
(42, 1, 122, '2021-11-26 18:14:43', '2021-11-30', 'kredit', 250000),
(43, 1, 512, '2021-11-26 18:15:20', '2021-11-26', 'debit', 500000),
(44, 1, 111, '2021-11-26 18:15:20', '2021-11-26', 'kredit', 500000),
(45, 1, 111, '2021-11-28 10:40:25', '2019-11-30', 'debit', 2000000),
(46, 1, 112, '2021-11-28 10:40:25', '2019-11-30', 'kredit', 2000000),
(47, 1, 514, '2021-11-29 12:56:41', '2021-10-01', 'debit', 1000),
(48, 1, 111, '2021-11-29 12:56:41', '2021-10-01', 'kredit', 1000),
(49, 1, 112, '2021-11-28 12:15:31', '2021-10-02', 'debit', 2000000),
(50, 1, 113, '2021-11-28 12:15:31', '2021-10-02', 'kredit', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jk`, `alamat`, `email`, `username`, `password`, `last_login`) VALUES
(1, 'Hidayat Chandra', 'laki-laki', 'JL.H.B Jassin No.337', 'hidayatchandra08@gmail.com', 'admin', '69005bb62e9622ee1de61958aacf0f63', '2020-02-08 17:42:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_reff`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `no_reff` (`no_reff`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
